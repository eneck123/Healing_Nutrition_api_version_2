<?php

namespace App\Http\Controllers;

use App\Models\Reponse;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


/**
 * @OA\Tag(
 *     name="Réponses",
 *     description="API Endpoints pour la gestion des réponses utilisateurs"
 * )
 */
class ReponseController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/reponses",
     *     summary="Lister les réponses de l'utilisateur connecté",
     *     description="Récupère les réponses de l'utilisateur actuellement authentifié.",
     *     tags={"Réponses"},
     *     security={{"BearerToken":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Liste des réponses récupérée avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Liste des réponses récupérée avec succès"),
     *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Reponse"))
     *         )
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Non authentifié"
     *     )
     * )
     */
    public function index(Request $request)
    {
        $utilisateur = Auth::user();
  
        if (!$utilisateur) {
             return response()->json([
                'success' => false,
                'message' => 'Utilisateur non authentifié',
            ], 401);
        }

        $reponses = Reponse::with('question')->where('utilisateur_id', $utilisateur->id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Liste des réponses récupérée avec succès',
            'data' => $reponses,
        ], 200);
    }

    
    /**
     * @OA\Post(
     *     path="/api/reponses",
     *     summary="Enregistrer de nouvelles réponses",
     *     description="Enregistre une ou plusieurs réponses pour l'utilisateur connecté.",
     *     tags={"Réponses"},
     *     security={{"BearerToken":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"reponses"},
     *             @OA\Property(
     *                 property="reponses",
     *                 type="array",
     *                 description="Liste des réponses à enregistrer",
     *                 @OA\Items(
     *                     type="object",
     *                     required={"question_id"},
     *                     @OA\Property(
     *                         property="question_id",
     *                         type="integer",
     *                         example=5,
     *                         description="ID de la question"
     *                     ),
     *                     @OA\Property(
     *                         property="reponse",
     *                         type="string",
     *                         nullable=true,
     *                         example="Ma réponse textuelle",
     *                         description="Obligatoire si la question n'a pas de choix possibles"
     *                     ),
     *                     @OA\Property(
     *                         property="question_possible_answer_id",
     *                         type="integer",
     *                         nullable=true,
     *                         example=10,
     *                         description="Obligatoire si la question possède des choix possibles"
     *                     )
     *                 )
     *             ),
     *
     *             example={
     *                 "reponses": {
     *                     {
     *                         "question_id": 5,
     *                         "reponse": "Ma réponse textuelle pour une question sans choix"
     *                     },
     *                     {
     *                         "question_id": 10,
     *                         "question_possible_answer_id": 3
     *                     },
     *                     {
     *                         "question_id": 12,
     *                         "reponse": "Une autre réponse texte"
     *                     }
     *                 }
     *             }
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=201,
     *         description="Réponses enregistrées avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Réponses enregistrées avec succès")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=400,
     *         description="Erreur de validation",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=false),
     *             @OA\Property(property="message", type="string", example="Erreur de validation des réponses"),
     *             @OA\Property(property="errors", type="object")
     *         )
     *     ),
     *
     *     @OA\Response(
     *         response=401,
     *         description="Non authentifié"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur non authentifié',
            ], 401);
        }

        $utilisateurId = $utilisateur->id;

        $validator = Validator::make($request->all(), [
            'reponses' => 'required|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation initiale',
                'errors'  => $validator->errors(),
            ], 400);
        }

        $reponsesData = $request->input('reponses');

        // ----------------------------------------------------------------
        // ÉTAPE 1 : Charger toutes les questions de la maladie de l'utilisateur
        // ----------------------------------------------------------------
        $allQuestions = Question::where('maladie_chronique_id', $utilisateur->maladie_chronique_id)
            ->get()
            ->keyBy('id');

        // ----------------------------------------------------------------
        // ÉTAPE 2 : Construire un map { question_id => réponse soumise }
        // ----------------------------------------------------------------
        $submittedMap = collect($reponsesData)->keyBy('question_id');

        // ----------------------------------------------------------------
        // ÉTAPE 3 : Filtrage silencieux des réponses enfants ignorées
        // Si le parent a reçu une réponse différente de trigger_answer (ex: "Non"),
        // on retire silencieusement la réponse enfant du payload.
        // ----------------------------------------------------------------
        foreach ($allQuestions as $question) {
            if (!is_null($question->parent_question_id) && !is_null($question->trigger_answer)) {
                $parentResponse = $submittedMap->get($question->parent_question_id);

                if (!$parentResponse) {
                    // Parent non répondu : enfant ignorée
                    $submittedMap->forget($question->id);
                    continue;
                }

                // Récupérer la valeur textuelle de la réponse parente
                $parentAnswerValue = null;
                if (!empty($parentResponse['question_possible_answer_id'])) {
                    $possibleAnswer = \App\Models\QuestionPossibleAnswer::find(
                        $parentResponse['question_possible_answer_id']
                    );
                    $parentAnswerValue = $possibleAnswer ? $possibleAnswer->value : null;
                } elseif (!empty($parentResponse['reponse'])) {
                    $parentAnswerValue = $parentResponse['reponse'];
                }

                // Si la réponse parente != trigger_answer → enfant ignorée silencieusement
                if ($parentAnswerValue !== $question->trigger_answer) {
                    $submittedMap->forget($question->id);
                }
            }
        }

        // ----------------------------------------------------------------
        // ÉTAPE 4 : Calculer les questions obligatoires actives
        // = questions sans parent  +  questions enfants dont le parent a déclenché
        // ----------------------------------------------------------------
        $activeRequiredQuestionIds = $allQuestions->filter(function ($question) use ($submittedMap, $allQuestions) {
            // Question indépendante : toujours obligatoire
            if (is_null($question->parent_question_id)) {
                return true;
            }
            // Question enfant : obligatoire seulement si elle est encore dans le map (non filtrée)
            return $submittedMap->has($question->id);
        })->pluck('id')->toArray();

        // ----------------------------------------------------------------
        // ÉTAPE 5 : Vérifier les questions obligatoires manquantes
        // ----------------------------------------------------------------
        $submittedQuestionIds = $submittedMap->keys()->toArray();
        $missingQuestionIds   = array_diff($activeRequiredQuestionIds, $submittedQuestionIds);

        if (!empty($missingQuestionIds)) {
            $missingQuestions = Question::whereIn('id', $missingQuestionIds)->pluck('texte_question');
            return response()->json([
                'success'           => false,
                'message'           => 'Veuillez répondre à toutes les questions obligatoires.',
                'missing_questions' => $missingQuestions,
            ], 422);
        }

        // ----------------------------------------------------------------
        // ÉTAPE 6 : Valider chaque réponse individuellement
        // ----------------------------------------------------------------
        $errors       = [];
        $validReponses = [];

        foreach ($submittedMap as $questionId => $responseData) {
            if (!isset($responseData['question_id'])) {
                $errors[] = "question_id manquant dans une entrée.";
                continue;
            }

            $question = $allQuestions->get($questionId);

            if (!$question) {
                $errors[] = "La question avec l'ID {$questionId} n'existe pas ou ne correspond pas à votre profil.";
                continue;
            }

            if ($question->has_possible_answers) {
                if (empty($responseData['question_possible_answer_id'])) {
                    $errors[] = "Veuillez sélectionner une option pour la question \u00ab {$question->texte_question} \u00bb.";
                } else {
                    $validReponses[] = [
                        'question_id'                => $question->id,
                        'utilisateur_id'             => $utilisateurId,
                        'question_possible_answer_id' => $responseData['question_possible_answer_id'],
                        'description'                => null,
                    ];
                }
            } else {
                if (empty($responseData['reponse'])) {
                    $errors[] = "Veuillez fournir une réponse textuelle pour la question \u00ab {$question->texte_question} \u00bb.";
                } else {
                    $validReponses[] = [
                        'question_id'                => $question->id,
                        'utilisateur_id'             => $utilisateurId,
                        'question_possible_answer_id' => null,
                        'description'                => $responseData['reponse'],
                    ];
                }
            }
        }

        if (!empty($errors)) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation des réponses',
                'errors'  => $errors,
            ], 422);
        }

        // ----------------------------------------------------------------
        // ÉTAPE 7 : Sauvegarde atomique — tout ou rien
        // ----------------------------------------------------------------
        DB::transaction(function () use ($validReponses) {
            foreach ($validReponses as $reponseAttributes) {
                Reponse::create($reponseAttributes);
            }
        });

        return response()->json([
            'success' => true,
            'message' => 'Réponses enregistrées avec succès',
        ], 201);
    }

    /**
     * @OA\Get(
     *     path="/api/reponses/{id}",
     *     summary="Afficher une réponse spécifique",
     *     tags={"Réponses"},
     *     security={{"BearerToken":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la réponse",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Réponse récupérée avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Réponse récupérée avec succès"),
     *             @OA\Property(property="data", ref="#/components/schemas/Reponse")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Réponse non trouvée"
     *     )
     * )
     */
    public function show($id)
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur non authentifié',
            ], 401);
        }

        $reponse = Reponse::where('utilisateur_id', $utilisateur->id)->find($id);

        if (!$reponse) {
            return response()->json([
                'success' => false,
                'message' => 'Réponse non trouvée',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Réponse récupérée avec succès',
            'data' => $reponse,
        ], 200);
    }

    /**
     * @OA\Put(
     *     path="/api/reponses/{id}",
     *     summary="Mettre à jour une réponse",
     *     description="Met à jour une réponse en respectant la logique de validation (texte vs choix).",
     *     tags={"Réponses"},
     *     security={{"BearerToken":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la réponse",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             @OA\Property(property="question_id", type="integer", description="Optionnel. ID de la question pour réassocier.", example=5),
     *             @OA\Property(property="reponse", type="string", description="Nouveau texte (si question ouverte)", example="Réponse modifiée"),
     *             @OA\Property(property="question_possible_answer_id", type="integer", description="Nouvel ID de choix (si question à choix)", example=12)
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Réponse mise à jour avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Réponse mise à jour avec succès"),
     *             @OA\Property(property="data", ref="#/components/schemas/Reponse")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Erreur de validation"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Réponse non trouvée"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur non authentifié',
            ], 401);
        }

        $reponseModel = Reponse::where('utilisateur_id', $utilisateur->id)->find($id);

        if (!$reponseModel) {
            return response()->json([
                'success' => false,
                'message' => 'Réponse non trouvée',
            ], 404);
        }

        $questionId = $request->input('question_id') ?? $reponseModel->question_id;
        $question = Question::find($questionId);

        if (!$question) {
            return response()->json([
                'success' => false,
                'message' => 'Question non trouvée',
            ], 404);
        }
        

        $updates = [];
        $errors = [];

        if($request->has('question_id')) {
            $updates['question_id'] = $questionId;
        }

        if ($question->has_possible_answers) {
            $possibleAnswerId = $request->input('question_possible_answer_id');
            
            if ($request->has('question_possible_answer_id')) {
                if (empty($possibleAnswerId)) {
                    $errors['question_possible_answer_id'] = ["Veuillez sélectionner une option valide."];
                } else {
                    $updates['question_possible_answer_id'] = $possibleAnswerId;
                    $updates['description'] = null; // Reset description if switching or ensuring consistency
                }
            } elseif ($request->has('reponse')) {
                // User trying to send text for a choice question
                $errors['question_possible_answer_id'] = ["Cette question nécessite une option, pas du texte."];
            } else {
                
                if ($reponseModel->question_id != $questionId && is_null($reponseModel->question_possible_answer_id)){
                    $errors['question_possible_answer_id'] = ["Veuillez fournir une option pour la nouvelle question sélectionnée."];
                }
            }

        } else {
            $fieldText = $request->input('reponse');

            if ($request->has('reponse')) {
                if (empty($fieldText)) {
                    $errors['reponse'] = ["Veuillez fournir une réponse textuelle."];
                } else {
                    $updates['description'] = $fieldText;
                    $updates['question_possible_answer_id'] = null; // Reset choice
                }
            } elseif ($request->has('question_possible_answer_id')) {
                $errors['reponse'] = ["Cette question nécessite une réponse textuelle."];
            } else {
                if ($reponseModel->question_id != $questionId && is_null($reponseModel->description)){
                    $errors['reponse'] = ["Veuillez fournir une réponse textuelle pour la nouvelle question sélectionnée."];
                }
            }
        }

        if (!empty($errors)) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur de validation',
                'errors' => $errors,
            ], 400);
        }

        $reponseModel->update($updates);

        return response()->json([
            'success' => true,
            'message' => 'Réponse mise à jour avec succès',
            'data' => $reponseModel,
        ], 200);
    }

    /**
     * @OA\Delete(
     *     path="/api/reponses/{id}",
     *     summary="Supprimer une réponse",
     *     tags={"Réponses"},
     *     security={{"BearerToken":{}}},
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID de la réponse",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Réponse supprimée avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Réponse supprimée avec succès")
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Réponse non trouvée"
     *     )
     * )
     */
    public function destroy($id)
    {
        $utilisateur = Auth::user();

        if (!$utilisateur) {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur non authentifié',
            ], 401);
        }

        $reponse = Reponse::where('utilisateur_id', $utilisateur->id)->find($id);

        if (!$reponse) {
            return response()->json([
                'success' => false,
                'message' => 'Réponse non trouvée',
            ], 404);
        }

        $reponse->delete();

        return response()->json([
            'success' => true,
            'message' => 'Réponse supprimée avec succès',
        ], 200);
    }
}
