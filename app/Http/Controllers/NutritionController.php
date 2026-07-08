<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;


class NutritionController extends Controller
{
    protected $calculationService;

    public function __construct(
        \App\Services\NutritionCalculationService $calculationService
    ) {
        $this->calculationService = $calculationService;
    }
    /**
     * @OA\Post(
     *     path="/api/nutrition/calculate",
     *     summary="Calculer les indicateurs nutritionnels (IMC, RTH, IMG, BMR, TDEE)",
     *     description="Effectue les calculs nutritionnels basés sur les données stockées de l'utilisateur (poids, taille, tours, etc.). Compare également le résultat avec le type d'obésité déclaré par l'utilisateur (via sa maladie chronique) et envoie un email en cas d'incohérence.",
     *     tags={"Nutrition"},
     *     security={{"BearerToken":{}}},
     *     @OA\RequestBody(
     *         description="Exemple de corps de requête pour tester (user_id est optionnel si authentifié)",
     *         required=false,
     *         @OA\JsonContent(
     *             @OA\Property(
     *                 property="user_id", 
     *                 type="integer", 
     *                 example=1, 
     *                 description="Id de l'utilisateur si la requête est faite par un admin, sinon l'utilisateur authentifié est utilisé"
     *             )
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Calculs réussis",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="user_id", type="integer", example=1),
     *             @OA\Property(property="imc", type="number", format="float", example=31.02),
     *             @OA\Property(property="rth", type="number", format="float", example=0.77),
     *             @OA\Property(property="img", type="number", format="float", example=28.5),
     *             @OA\Property(property="bmr", type="integer", example=1850),
     *             @OA\Property(property="tdee", type="integer", example=2500),
     *             @OA\Property(property="status", type="string", example="Obese", description="Statut calculé par l'algorithme"),
     *             @OA\Property(property="grade_imc", type="string", example="Obésité modérée (Grade 1)", description="Grade selon l'IMC"),
     *             @OA\Property(property="declared_type", type="string", example="Obésité modérée", description="Type déclaré dans Maladie Chronique"),
     *             @OA\Property(property="message", type="string", example="D’après vos mesures..."),
     *             @OA\Property(property="consistent", type="boolean", example=true, description="Indique si le type déclaré correspond au calcul")
     *         )
     *     ),
     *     @OA\Response(
     *         response=400,
     *         description="Données manquantes ou ID requis"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Utilisateur non trouvé"
     *     )
     * )
     */
    public function calculate(Request $request)
    {

        //$userId = $request->user_id ?? auth()->id();
        $userId = auth()->id();

        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Non authentifié'], 401);
        }

        $user = \App\Models\Utilisateur::with('maladieChronique')->find($userId);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        try {
            $result = $this->calculationService->calculateForUser($user);
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * @OA\Post(
     *     path="/api/nutrition/recommandation",
     *     summary="Obtenir des recommandations nutritionnelles personnalisées",
     *     description="Calcule l'apport calorique quotidien et la répartition des macronutriments en fonction de l'objectif de l'utilisateur, de ses pathologies et de son niveau d'activité.",
     *     tags={"Nutrition"},
     *     security={{"BearerToken":{}}},
     *     @OA\RequestBody(
     *         description="Données pour la génération du plan. Si submission_id est omis, la dernière soumission est utilisée.",
     *         required=false,
     *         @OA\JsonContent(
     *             @OA\Property(property="submission_id", type="string", example="550e8400-e29b-41d4-a716-446655440000", description="ID de la soumission du questionnaire")
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Recommandations générées",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="tdee", type="number", example=2500),
     *             @OA\Property(property="apport_calorique", type="number", example=2000),
     *             @OA\Property(property="deficit_calorique", type="integer", example=500),
     *             @OA\Property(
     *                 property="macronutriments",
     *                 type="object",
     *                 @OA\Property(property="distribution", type="object"),
     *                 @OA\Property(property="grammes", type="object")
     *             )
     *         )
     *     )
     * )
     */
    public function recommandation(Request $request)
    {
        $userId = auth()->id();

        if (!$userId) {
            return response()->json(['success' => false, 'message' => 'Non authentifié'], 401);
        }

        $user = \App\Models\Utilisateur::with(['maladieChronique', 'reponse.question'])->find($userId);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        if ($user->maladie_chronique_id != 1 && $user->maladie_chronique_id != 2 && !empty($user->maladie_chronique_id)) {
            return response()->json([
                'success' => false,
                'message' => 'La logique de recommandation avancée est actuellement limitée aux profils avec obésité modérée (ID 1), obésité sévère (ID 2) ou sans pathologie déclarée.'
            ], 403);
        }

        // BMR/TDEE Calculation
        try {
            $metrics = $this->calculationService->getBasicMetrics($user);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }

        $tdee = $metrics['tdee'];
        $isMale = $metrics['is_male'];

        // ----------------------------------------------------------------
        // Résolution du submission_id :
        // Si fourni dans la requête → on filtre sur ce groupe de réponses précis.
        // Sinon → on utilise le submission_id le plus récent de l'utilisateur.
        // Cela garantit que chaque plan est basé sur une seule soumission de formulaire.
        // ----------------------------------------------------------------
        $submissionId = $request->input('submission_id');

        if (!$submissionId) {
            // Trouver le dernier submission_id de cet utilisateur
            $latestReponse = \App\Models\Reponse::where('utilisateur_id', $userId)
                ->whereNotNull('submission_id')
                ->latest()
                ->first();
            $submissionId = $latestReponse ? $latestReponse->submission_id : null;
        }

        // Filtrer uniquement les réponses de cette soumission
        $reponses = $submissionId
            ? $user->reponse->where('submission_id', $submissionId)
            : $user->reponse;

        // Extract Advanced Info from Reponses
        $objective = '';
        $deficitValue = 0;
        $weightLossRange = 'Non pris en charge par le système suite à votre réponse';
        $pathologies = ['diabetes' => false, 'hypertension' => false, 'cardio' => false];
        $responsesMap = [];
        $questionnaireObesite = [];

        $mapping = $this->resolveDynamicMapping($user->maladie_chronique_id);
        $reverseMapping = array_flip($mapping);

        foreach ($reponses as $rep) {
            $qid = $rep->question_id;

            // Utiliser le texte de la question déjà chargé via eager load (reponse.question)
            $questionText = $rep->question ? $rep->question->texte_question : 'Question ' . $qid;

            $text = $rep->description ?: '';
            $answerId = $rep->question_possible_answer_id;

            if ($answerId) {
                $possibleAnswer = \App\Models\QuestionPossibleAnswer::find($answerId);
                if ($possibleAnswer)
                    $text = $possibleAnswer->value;
            }

            $responsesMap[$qid] = [
                'text' => $text,
                'id' => $answerId,
                'question' => $questionText
            ];

            // All responses for the requested data section
            $questionnaireObesite[] = [
                'question' => $questionText,
                'reponse' => $text
            ];

            if (isset($reverseMapping[$qid])) {
                $key = $reverseMapping[$qid];
                switch ($key) {
                    case 'objectif_principal':
                        $objective = $text;
                        break;
                    case 'poids_a_perdre':
                        $weightLossRange = $text;
                        break;
                    case 'niveau_changement':
                        if (preg_match('/([\d\.]+)\s*kcal/i', $text, $matches)) {
                            $deficitValue = floatval($matches[1]);
                        }
                        break;
                    case 'antecedents_lequel':
                        if (stripos($text, 'diabète') !== false)
                            $pathologies['diabetes'] = true;
                        if (stripos($text, 'hypertension') !== false || stripos($text, 'tension') !== false)
                            $pathologies['hypertension'] = true;
                        if (stripos($text, 'cardio') !== false || stripos($text, 'coeur') !== false)
                            $pathologies['cardio'] = true;
                        break;
                    case 'meds_types':
                    case 'plan_deja_texte':
                        if (stripos($text, 'Insuline') !== false || stripos($text, 'glycémie') !== false)
                            $pathologies['diabetes'] = true;
                        if (stripos($text, 'tension artérielle') !== false)
                            $pathologies['hypertension'] = true;
                        if (stripos($text, 'cholestérol') !== false || stripos($text, 'cardiaque') !== false)
                            $pathologies['cardio'] = true;
                        break;
                }
            }
        }

        // Si aucun objectif trouvé dans les réponses, fallback neutre
        if (empty($objective)) {
            $objective = 'Non renseigné';
        }

        $isWeightLoss = (stripos($objective, 'Perte') !== false || stripos($objective, 'Perdre') !== false);
        $isFitness = (stripos($objective, 'forme physique') !== false);

        // Apport Calorique Calculation
        $apportCalorique = $tdee - $deficitValue;

        if ($isFitness) {
            $pct = ($tdee < 2000) ? 0.05 : (($tdee <= 3000) ? 0.04 : 0.03);
            $calcDeficit = $tdee * $pct;
            $deficitValue = min(300, $calcDeficit);
            $apportCalorique = $tdee - $deficitValue;
        }

        // ----------------------------------------------------------------
        // Ajustement fin RÉSERVÉ À LA PERTE DE POIDS UNIQUEMENT.
        // Si l'apport calorique calculé tombe juste sous le seuil de
        // sécurité (1495-1499 kcal homme / 1195-1199 kcal femme), on
        // l'arrondit à la dizaine la plus proche pour éviter de déclencher
        // inutilement le garde-fou ci-dessous.
        // NE S'APPLIQUE PAS au cas "forme physique" (fitness) : pour ce
        // dernier, l'email d'alerte LowCalorieWarningMail continue de se
        // déclencher normalement si l'apport est trop bas.
        // ----------------------------------------------------------------
        // Ajustement fin supprimé pour garder les vrais résultats


        // Safety Check
        $minThreshold = $isMale ? 1500 : 1200;
        $lowCalNotification = false;

        if ($apportCalorique < $minThreshold) {
            $warningData = [
                'gender' => $isMale ? 'Homme' : 'Femme',
                'objectif' => $objective,
                'tdee' => $tdee,
                'deficit' => $deficitValue,
                'apport' => $apportCalorique
            ];
            Mail::to($user->email)->send(new \App\Mail\LowCalorieWarningMail($user->nom . ' ' . $user->prenom, $warningData, $minThreshold));
            $lowCalNotification = true;

            return response()->json([
                'success' => false,
                'message' => 'Plan non généré, votre apport calorique est trop bas, veuillez augmenter votre apport calorique.',
                'data' => [
                    'warning_data' => $warningData,
                    'low_cal_notification' => $lowCalNotification,
                ]
            ], 500);
        }

        // Macronutrients Distribution
        $macros = $this->calculateMacrosEnhanced($user, $user->niveau_d_activite_physique, $deficitValue, $isWeightLoss, $isFitness, $apportCalorique, $weightLossRange, $pathologies);
        $planIntervention = $this->generateNutritionInterventionPlan($user, $metrics, $responsesMap, $pathologies);

        // Pour l'obésité sévère (ID 2), le menu journalier algorithmique n'est pas applicable.
        // Le plan de recommandations est géré via la table recommendations (seeder SevereObesitySeeder).
        $isSevereObesity = ($user->maladie_chronique_id == 2);

        if ($isSevereObesity) {
            $guideData = [
                'menu_journalier' => null,
                'facteurs' => null,
                'conseils' => 'Pour l\'obésité sévère, les recommandations alimentaires personnalisées sont intégrées dans votre plan d\'intervention ci-dessus. Veuillez consulter un diététicien-nutritionniste pour un menu journalier adapté à votre situation clinique spécifique.',
            ];
        } else {
            $guideData = $this->generateDynamicFoodGuide($user, $macros['grammes'], $pathologies, $objective, $weightLossRange);
        }

        return response()->json([
            'success' => true,
            'submission_id' => $submissionId,
            'user_profile' => [
                'nom' => $user->nom,
                'prenom' => $user->prenom,
                'sexe' => $isMale ? 'Homme' : 'Femme',
                'objectif' => $objective,
                'pathologies_detectees' => array_keys(array_filter($pathologies)),
                'donnees_obesite' => $questionnaireObesite
            ],
            'tdee' => $tdee,
            'apport_calorique' => $apportCalorique,
            'deficit_calorique' => $deficitValue,
            'unite_calorique' => 'kcal',
            'macronutriments' => $macros,
            'low_calorie_notification' => $lowCalNotification,
            'suivi_hebdomadaire' => [
                'colonnes' => ['Semaine', 'Poids (kg)', 'Tour de taille (cm)', 'Energie (1-5)', 'Faim (1-5)', 'Activité physique (heure)', 'Humeur', 'Remarque/Ajustements'],
                'legendes' => [
                    'Énergie' => '1 = épuisé·e, 5 = en pleine forme',
                    'Faim' => '1 = jamais faim, 5 = toujours faim',
                    'Activité physique' => 'total en heures (ou nombre de séances)',
                    'Humeur' => 'bonne humeur, neutre ou fatigué·e/irritable'
                ],
                'utilisation' => 'À remplir chaque fin de semaine (par ex. dimanche matin) pour surveiller les tendances : stagnation, fatigue, besoin d\'ajustement.'
            ],
            'plan_intervention' => $planIntervention,
            'menu_journalier' => $guideData['menu_journalier'],
            'facteurs_ajustement' => $guideData['facteurs'],
            'conseils_personnalises' => $guideData['conseils'],
            'pdf_url' => $this->generateAndSavePdf($user, $metrics, $objective, $weightLossRange, $deficitValue, $apportCalorique, $macros, $guideData, $planIntervention, $submissionId, $reponses)
        ]);
    }

    private function generateAndSavePdf($user, $metrics, $objective, $weightLossRange, $deficitValue, $apportCalorique, $macros, $guideData, $planIntervention, $submissionId = null, $reponses = null)
    {
        // Utiliser les réponses filtrées par submission_id passées en paramètre.
        // Si non fournies (appel legacy), fallback sur toutes les réponses de l'utilisateur.
        if ($reponses === null) {
            $reponses = $user->reponse;
        }

        $qaData = [];
        $mapping = $this->resolveDynamicMapping($user->maladie_chronique_id);

        $labels = [
            'antecedents_diag' => "Antécédents médicaux et risques",
            'antecedents_lequel' => "Détails des antécédents",
            'chirurgie' => "Chirurgie bariatrique",
            'restrictions' => "Restrictions alimentaires",
            'restrictions_lesquelles' => "Détails des restrictions",
            'calories_vides' => "Consommation d'aliments caloriques",
            'plan_deja' => "Plan nutritionnel déjà suivi",
            'plan_deja_texte' => "Détails du plan précédent",
            'boissons' => "Boissons sucrées ou alcoolisées",
            'boissons_details' => "Détails (Quand/Quantité)",
            'sommeil' => "Heures de sommeil par nuit",
            'apnee' => "Apnée du sommeil",
            'douleurs' => "Douleurs articulaires",
            'douleurs_frequence' => "Fréquence des douleurs",
            'regime_recent' => "Régime de perte de poids récent",
            'poids_perdu' => "Poids perdu (Historique)",
            'jours_sport' => "Fréquence d'activité physique",
            'sedentarite' => "Position assise chaque jour",
            'activites_preferees' => "Activités physiques appréciées",
            'fc_connaissance' => "Connaissance de la fréquence cardiaque",
            'fc_valeur' => "Valeur de la FC au repos",
            'ressenti' => "Ressenti par rapport au poids",
            'stress_ennui' => "Manger par stress ou ennui",
            'finir_assiette' => "Tendance à finir son assiette",
            'emotions' => "Habitudes liées aux émotions",
            'programme_deja' => "Tentatives de perte de poids passées",
        ];

        $responsesMap = [];
        $pathologies = ['diabetes' => false, 'hypertension' => false, 'cardio' => false];
        $antecedentsQid = $mapping['antecedents_lequel'] ?? null;

        foreach ($reponses as $rep) {
            $qid = $rep->question_id;
            $text = $rep->description ?: '';

            // Utiliser l'eager load si disponible, sinon requête DB
            if ($rep->question_possible_answer_id) {
                if ($rep->questionPossibleAnswer) {
                    $text = $rep->questionPossibleAnswer->value;
                } else {
                    $possibleAnswer = \App\Models\QuestionPossibleAnswer::find($rep->question_possible_answer_id);
                    if ($possibleAnswer)
                        $text = $possibleAnswer->value;
                }
            }

            $responsesMap[$qid] = ['text' => $text];

            // Détection des pathologies
            if ($antecedentsQid && $qid == $antecedentsQid) {
                if (stripos($text, 'diabète') !== false)
                    $pathologies['diabetes'] = true;
                if (stripos($text, 'hypertension') !== false || stripos($text, 'tension') !== false)
                    $pathologies['hypertension'] = true;
                if (stripos($text, 'cardio') !== false || stripos($text, 'coeur') !== false)
                    $pathologies['cardio'] = true;
            }
        }

        $qaData = [];
        foreach ($reponses as $rep) {
            $text = $rep->description ?: '';
            if ($rep->question_possible_answer_id) {
                if ($rep->questionPossibleAnswer) {
                    $text = $rep->questionPossibleAnswer->value;
                } else {
                    $pa = \App\Models\QuestionPossibleAnswer::find($rep->question_possible_answer_id);
                    if ($pa)
                        $text = $pa->value;
                }
            }

            $recommandation = '';
            $qText = $rep->question ? $rep->question->texte_question : '';
            if ($user->maladie_chronique_id == 2) {
                $recommandation = $this->getSevereRecommendation($qText, $text, $pathologies);
            } else if ($user->maladie_chronique_id == 1) {
                $recommandation = $this->getModerateRecommendation($qText, $text, $responsesMap, $pathologies, $user, $objective, $weightLossRange);
            }

            $qaData[] = [
                'question' => $rep->question ? $rep->question->texte_question : "Question {$rep->question_id}",
                'reponse' => $text,
                'recommandation' => $recommandation
            ];
        }

        // Niveau de changement depuis les réponses filtrées
        $niveauChangementQid = $mapping['niveau_changement'] ?? null;
        $niveauChangementText = $niveauChangementQid && isset($responsesMap[$niveauChangementQid])
            ? $responsesMap[$niveauChangementQid]['text']
            : ($deficitValue . ' kcal');

        $data = [
            'user' => $user,
            'metrics' => $metrics,
            'goals' => [
                'objectif' => $objective,
                'perte_poids' => $weightLossRange,
                'niveau_changement' => $niveauChangementText,
            ],
            'recommendations' => [
                'calories' => $apportCalorique,
                'macros_p_percent' => $macros['distribution']['proteines_percent'],
                'macros_g_percent' => $macros['distribution']['glucides_percent'],
                'macros_l_percent' => $macros['distribution']['lipides_percent'],
                'macros_p_grams' => $macros['grammes']['proteines'],
                'macros_g_grams' => $macros['grammes']['glucides'],
                'macros_l_grams' => $macros['grammes']['lipides'],
            ],
            'qa' => $qaData,
            'menu' => $guideData['menu_journalier'],
            'plan_intervention' => [], // <-- Laissé vide car les reco sont passées dans $qa

            'show_diabetes_fitness_extras' => (stripos($objective, 'forme physique') !== false && $pathologies['diabetes']),
            'show_hypertension_fitness_extras' => (stripos($objective, 'forme physique') !== false && $pathologies['hypertension']),
            'show_cardio_fitness_extras' => (stripos($objective, 'forme physique') !== false && $pathologies['cardio']),
            'show_weight_loss_under_5_diabetes_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'moins de 5') !== false && $pathologies['diabetes'],
            'show_weight_loss_under_5_hypertension_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'moins de 5') !== false && $pathologies['hypertension'],
            'show_weight_loss_under_5_cardio_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'moins de 5') !== false && $pathologies['cardio'],
            'show_weight_loss_5_10_diabetes_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, '5 - 10') !== false && $pathologies['diabetes'],
            'show_weight_loss_5_10_hypertension_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, '5 - 10') !== false && $pathologies['hypertension'],
            'show_weight_loss_5_10_cardio_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, '5 - 10') !== false && $pathologies['cardio'],
            'show_weight_loss_over_10_diabetes_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'plus de 10') !== false && $pathologies['diabetes'],
            'show_weight_loss_over_10_hypertension_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'plus de 10') !== false && $pathologies['hypertension'],
            'show_weight_loss_over_10_cardio_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'plus de 10') !== false && $pathologies['cardio'],

            'show_weight_loss_under_5_no_pathology_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'moins de 5') !== false && !$pathologies['diabetes'] && !$pathologies['hypertension'] && !$pathologies['cardio'],
            'show_weight_loss_5_10_no_pathology_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, '5 - 10') !== false && !$pathologies['diabetes'] && !$pathologies['hypertension'] && !$pathologies['cardio'],
            'show_weight_loss_over_10_no_pathology_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'plus de 10') !== false && !$pathologies['diabetes'] && !$pathologies['hypertension'] && !$pathologies['cardio'],
            'show_fitness_no_pathology_extras' => (stripos($objective, 'forme physique') !== false && !$pathologies['diabetes'] && !$pathologies['hypertension'] && !$pathologies['cardio']),


            'severe_advice' => null,
        ];

        $viewName = $user->maladie_chronique_id == 2 ? 'pdf.nutrition_guide_severe' : 'pdf.nutrition_guide';
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView($viewName, $data);

        // Nom de fichier unique par soumission
        $fileName = 'Guide_Nutritionnel_' . $user->id . '_' . time() . '.pdf';
        $path = storage_path('app/public/pdfs');
        if (!file_exists($path)) {
            mkdir($path, 0755, true);
        }
        $fullPath = $path . '/' . $fileName;
        $pdf->save($fullPath);

        // Créer un NOUVEAU plan nutritionnel pour chaque soumission (pas updateOrCreate).
        // Chaque soumission génère son propre plan distinct lié à son submission_id.
        \App\Models\PlanNutritionnel::create([
            'utilisateur_id' => $user->id,
            'submission_id' => $submissionId,
            'description' => 'Guide nutritionnel de 90 jours généré le ' . date('d/m/Y'),
            'pdf_path' => 'storage/pdfs/' . $fileName,
        ]);

        // Send Email
        if ($user->email) {
            try {
                \Illuminate\Support\Facades\Mail::to($user->email)->send(new \App\Mail\NutritionGuideMail($user, $fullPath));
            } catch (\Exception $e) {
                \Illuminate\Support\Facades\Log::error("Failed to send nutrition guide email: " . $e->getMessage());
            }
        }

        return url('storage/pdfs/' . $fileName);
    }

    /**
     * @OA\Get(
     *     path="/api/nutrition/download-stored-pdf",
     *     summary="Télécharger le dernier Guide Nutritionnel enregistré",
     *     description="Récupère et télécharge le dernier fichier PDF généré enregistré en base de données pour l'utilisateur connecté.",
     *     tags={"Nutrition"},
     *     security={{"BearerToken":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="Fichier PDF",
     *         @OA\MediaType(
     *             mediaType="application/pdf"
     *         )
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Plan non trouvé"
     *     )
     * )
     */
    public function downloadStoredPdf(Request $request)
    {
        $userId = auth()->id();
        $user = \App\Models\Utilisateur::find($userId);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Restriction check
        if ($user->maladie_chronique_id != 1 && $user->maladie_chronique_id != 2 && !empty($user->maladie_chronique_id)) {
            return response()->json([
                'success' => false,
                'message' => 'Le téléchargement du guide nutritionnel complet est actuellement limité aux profils avec obésité modérée (ID 1), obésité sévère (ID 2) ou sans pathologie déclarée.'
            ], 403);
        }

        $plan = \App\Models\PlanNutritionnel::where('utilisateur_id', $userId)->first();

        if (!$plan || !$plan->pdf_path) {
            return response()->json(['success' => false, 'message' => 'Aucun plan nutritionnel trouvé ou généré pour cet utilisateur.'], 404);
        }

        $filePath = public_path($plan->pdf_path);

        if (!file_exists($filePath)) {
            // Tentative via storage_path si public_path échoue (dépend de la config symlink)
            $storagePath = storage_path('app/public/' . str_replace('storage/', '', $plan->pdf_path));
            if (file_exists($storagePath)) {
                $filePath = $storagePath;
            } else {
                return response()->json(['success' => false, 'message' => 'Le fichier PDF n\'existe plus sur le serveur.'], 404);
            }
        }

        return response()->download($filePath, 'Guide_Nutritionnel_' . $userId . '.pdf');
    }

    /**
     * @OA\Get(
     *     path="/api/nutrition/download-pdf",
     *     summary="Télécharger le Guide Nutritionnel en PDF",
     *     description="Génère et télécharge le guide nutritionnel complet (Profil, Calculs, Recommandations, Plan 90 jours) au format PDF.",
     *     tags={"Nutrition"},
     *     security={{"BearerToken":{}}},
     *     @OA\Parameter(
     *         name="user_id",
     *         in="query",
     *         description="ID de l'utilisateur (optionnel pour admin)",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Fichier PDF",
     *         @OA\MediaType(
     *             mediaType="application/pdf"
     *         )
     *     )
     * )
     */
    public function downloadPdf(Request $request)
    {
        //$userId = $request->user_id ?? auth()->id();
         $userId = auth()->id();
         if (!$userId) {
        return response()->json(['success' => false, 'message' => 'Non authentifié'], 401);
        }

        $user = \App\Models\Utilisateur::with(['maladieChronique', 'reponse.question'])->find($userId);

        if (!$user) {
            return response()->json(['success' => false, 'message' => 'User not found'], 404);
        }

        // Restriction check
        if ($user->maladie_chronique_id != 1 && $user->maladie_chronique_id != 2 && !empty($user->maladie_chronique_id)) {
            return response()->json([
                'success' => false,
                'message' => 'La génération du guide nutritionnel complet est actuellement limitée aux profils avec obésité modérée (ID 1), obésité sévère (ID 2) ou sans pathologie déclarée.'
            ], 403);
        }

        // 1. Metrics
        try {
            $metrics = $this->calculationService->getBasicMetrics($user);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()], 400);
        }
        $tdee = $metrics['tdee'];
        $isMale = $metrics['is_male'];

        // 2. Responses & Pathologies
        $objective = 'Perte de poids';
        $deficitValue = 0;
        $weightLossRange = 'Non pris en charge par le système suite à votre réponse';
        $pathologies = ['diabetes' => false, 'hypertension' => false, 'cardio' => false];
        $qa = [];

        foreach ($user->reponse as $rep) {
            $qid = $rep->question_id;
            $question = DB::table('questions')->where('id', $qid)->first();
            $questionText = $question ? $question->texte_question : 'Question ' . $qid;

            $text = $rep->description ?: '';
            $answerId = $rep->question_possible_answer_id;
            if ($answerId) {
                $possibleAnswer = DB::table('question_possible_answers')->where('id', $answerId)->first();
                if ($possibleAnswer)
                    $text = $possibleAnswer->value;
            }

            // Populate Q&A for PDF
            // We need to fetch specific recommendations. For now, we'll iterate later or use a helper
            // But to simplify, let's just store the response text. 
            // In a real scenario, we'd reuse the logic from generateNutritionInterventionPlan to map each Q to a recommendation text.
            // For this implementation, I will call generateNutritionInterventionPlan to get the structured advice 
            // and I will also pass the raw Q&A.

            $mapping = $this->resolveDynamicMapping($user->maladie_chronique_id);
            $reverseMapping = array_flip($mapping);

            if (isset($reverseMapping[$qid])) {
                $key = $reverseMapping[$qid];
                switch ($key) {
                    case 'objectif_principal':
                        $objective = $text;
                        break;
                    case 'poids_a_perdre':
                        $weightLossRange = $text;
                        break;
                    case 'niveau_changement':
                        if (preg_match('/([\d\.]+)\s*kcal/i', $text, $matches))
                            $deficitValue = floatval($matches[1]);
                        break;
                    case 'antecedents_lequel':
                        if (stripos($text, 'diabète') !== false)
                            $pathologies['diabetes'] = true;
                        if (stripos($text, 'hypertension') !== false || stripos($text, 'tension') !== false)
                            $pathologies['hypertension'] = true;
                        if (stripos($text, 'cardio') !== false || stripos($text, 'coeur') !== false)
                            $pathologies['cardio'] = true;
                        break;
                    case 'meds_types':
                    case 'plan_deja_texte':
                        if (stripos($text, 'Insuline') !== false || stripos($text, 'glycémie') !== false)
                            $pathologies['diabetes'] = true;
                        if (stripos($text, 'tension') !== false)
                            $pathologies['hypertension'] = true;
                        if (stripos($text, 'cholestérol') !== false || stripos($text, 'cardiaque') !== false)
                            $pathologies['cardio'] = true;
                        break;
                }
            }
        }

        $isWeightLoss = (stripos($objective, 'Perte') !== false || stripos($objective, 'Perdre') !== false);
        $isFitness = (stripos($objective, 'forme physique') !== false);

        // 3. Calories
        $apportCalorique = $tdee - $deficitValue;
        if ($isFitness) {
            $pct = ($tdee < 2000) ? 0.05 : (($tdee <= 3000) ? 0.04 : 0.03);
            $calcDeficit = $tdee * $pct;
            $deficitValue = min(300, $calcDeficit);
            $apportCalorique = $tdee - $deficitValue;
        }

        // Ajustement fin (arrondi) pour la perte de poids
        // Même logique que dans recommandation() pour garantir la cohérence
        // entre l'API JSON et le PDF téléchargé via cette route.
        // Ajustement fin supprimé pour garder les vrais résultats

        // 4. Macros
        $macros = $this->calculateMacrosEnhanced($user, $user->niveau_d_activite_physique, $deficitValue, $isWeightLoss, $isFitness, $apportCalorique, $weightLossRange, $pathologies);
        
        // 5. Menu
        $guideData = $this->generateDynamicFoodGuide($user, $macros['grammes'], $pathologies);

        // 6. Detailed Q&A Recommendation Construction (Simulated from existing methods or logic)
        // Since we have specific methods for specific sections, we can build the Q&A array by matching QIDs
        // For the PDF, I will map the 'responses' to 'recommendations' using the logic available in various private methods
        // This is a bit complex to reconstruct perfectly line-by-line from OK.txt without a dedicated mapping engine.
        // Strategy: Use the Sections generated by generateNutritionInterventionPlan as the "Recommendations".
        $interventionPlan = $this->generateNutritionInterventionPlan($user, $metrics, [], $pathologies); // Passing [] for responsesMap if not strictly needed or handle it

        // Re-gathering responses map for the plan generation correctly
        $responsesMap = [];
        foreach ($user->reponse as $rep) {
            $qid = $rep->question_id;
            $text = $rep->description ?: '';
            if ($rep->question_possible_answer_id) {
                $pa = DB::table('question_possible_answers')->where('id', $rep->question_possible_answer_id)->first();
                if ($pa)
                    $text = $pa->value;
            }
            $responsesMap[$qid] = ['text' => $text];
        }

        $qaData = [];
        $mapping = $this->resolveDynamicMapping($user->maladie_chronique_id);

        $labels = [
            'antecedents_diag' => "Antécédents médicaux et risques",
            'antecedents_lequel' => "Détails des antécédents",
            'chirurgie' => "Chirurgie bariatrique",
            'restrictions' => "Restrictions alimentaires",
            'restrictions_lesquelles' => "Détails des restrictions",
            'calories_vides' => "Consommation d'aliments caloriques",
            'plan_deja' => "Plan nutritionnel déjà suivi",
            'plan_deja_texte' => "Détails du plan précédent",
            'boissons' => "Boissons sucrées ou alcoolisées",
            'boissons_details' => "Détails (Quand/Quantité)",
            'sommeil' => "Heures de sommeil par nuit",
            'apnee' => "Apnée du sommeil",
            'douleurs' => "Douleurs articulaires",
            'douleurs_frequence' => "Fréquence des douleurs",
            'regime_recent' => "Régime de perte de poids récent",
            'poids_perdu' => "Poids perdu (Historique)",
            'jours_sport' => "Fréquence d'activité physique",
            'sedentarite' => "Position assise chaque jour",
            'activites_preferees' => "Activités physiques appréciées",
            'fc_connaissance' => "Connaissance de la fréquence cardiaque",
            'fc_valeur' => "Valeur de la FC au repos",
            'ressenti' => "Ressenti par rapport au poids",
            'stress_ennui' => "Manger par stress ou ennui",
            'finir_assiette' => "Tendance à finir son assiette",
            'emotions' => "Habitudes liées aux émotions",
            'programme_deja' => "Tentatives de perte de poids passées",
        ];

        foreach ($mapping as $key => $qid) {
            if (isset($responsesMap[$qid]) && isset($labels[$key])) {
                $respText = $responsesMap[$qid]['text'];
                $question = \App\Models\Question::find($qid);
                $qText = $question ? $question->texte_question : '';

                $recommendation = ($user->maladie_chronique_id == 2)
                    ? $this->getSevereRecommendation($qText, $respText, $pathologies)
                    : $this->getModerateRecommendation($qText, $respText, $responsesMap, $pathologies, $user, $objective, $weightLossRange);

                $qaData[] = [
                    'question' => $labels[$key],
                    'reponse' => $respText,
                    'recommandation' => $recommendation
                ];
            }
        }

        // Prepare View Data
        $data = [
            'user' => $user,
            'metrics' => $metrics,
            'goals' => [
                'objectif' => $objective,
                'perte_poids' => $weightLossRange,
                'niveau_changement' => $user->reponse->where('question_id', 91)->first()->description ?? ($deficitValue . ' kcal')
            ],
            'recommendations' => [
                'calories' => $apportCalorique,
                'macros_p_percent' => $macros['distribution']['proteines_percent'],
                'macros_g_percent' => $macros['distribution']['glucides_percent'],
                'macros_l_percent' => $macros['distribution']['lipides_percent'],
                'macros_p_grams' => $macros['grammes']['proteines'],
                'macros_g_grams' => $macros['grammes']['glucides'],
                'macros_l_grams' => $macros['grammes']['lipides'],
            ],
            'qa' => $qaData, // Or populated better
            'menu' => $guideData['menu_journalier'],
            'plan_intervention' => $interventionPlan, // We can pass this to the view to render specific advice blocks
            'show_diabetes_fitness_extras' => (stripos($objective, 'forme physique') !== false && $pathologies['diabetes']),
            'show_hypertension_fitness_extras' => (stripos($objective, 'forme physique') !== false && $pathologies['hypertension']),
            'show_cardio_fitness_extras' => (stripos($objective, 'forme physique') !== false && $pathologies['cardio']),
            'show_weight_loss_under_5_diabetes_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'moins de 5') !== false && $pathologies['diabetes'],
            'show_weight_loss_under_5_hypertension_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'moins de 5') !== false && $pathologies['hypertension'],
            'show_weight_loss_under_5_cardio_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, 'moins de 5') !== false && $pathologies['cardio'],
            'show_weight_loss_5_10_diabetes_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, '5 - 10') !== false && $pathologies['diabetes'],
            'show_weight_loss_5_10_hypertension_extras' => (stripos($objective, 'perte') !== false || stripos($objective, 'perdre') !== false) && stripos($weightLossRange, '5 - 10') !== false && $pathologies['hypertension'],
        ];

        // Enhance Q&A: Try to map the specific advice blocks from $interventionPlan to the Q&A if possible
        // For now, the "Plan d'intervention" section in the PDF can just iterate over $plan_intervention items.

        $viewName = $user->maladie_chronique_id == 2 ? 'pdf.nutrition_guide_severe' : 'pdf.nutrition_guide';
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView($viewName, $data);
        return $pdf->download('Guide_Nutritionnel_' . $user->nom . '.pdf');
    }


    private function calculateMacrosEnhanced($user, $activity, $deficit, $isWeightLoss, $isFitness, $apportCalorique, $weightLossRange, $pathologies)
    {
        // Default Distribution (General Case / Fallback)
        $pProt = 30;
        $pGlu = 40;
        $pLip = 30;

        $hasDiabetes = $pathologies['diabetes'];
        $hasHypertension = $pathologies['hypertension'];
        $hasCardio = $pathologies['cardio'];

        if ($isWeightLoss) {
            // Determine Range Category
            $range = 'low'; // < 5kg
            if (stripos($weightLossRange, 'Plus de 10 kg') !== false) {
                $range = 'high';
            } elseif (stripos($weightLossRange, '5-10 kg') !== false) {
                $range = 'mid';
            } elseif (stripos($weightLossRange, 'Moins de 5 kg') !== false) {
                $range = 'low';
            } else {
                if ($deficit >= 700)
                    $range = 'high';
                elseif ($deficit >= 500)
                    $range = 'mid';
            }

            if ($hasDiabetes) {
                // TABLES 9, 12, 15
                if ($range === 'low') { // Table 9
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 35;
                        $pLip = 35;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 30;
                        $pGlu = 40;
                        $pLip = 30;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 25;
                        $pGlu = 45;
                        $pLip = 30;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 48;
                        $pLip = 27;
                    } else {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    }
                } elseif ($range === 'mid') { // Table 12
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 35;
                        $pLip = 35;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 30;
                        $pGlu = 40;
                        $pLip = 30;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 25;
                        $pGlu = 45;
                        $pLip = 30;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 48;
                        $pLip = 27;
                    } else {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    }
                } else { // Table 15
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 35;
                        $pLip = 35;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 28;
                        $pGlu = 40;
                        $pLip = 32;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 25;
                        $pGlu = 43;
                        $pLip = 32;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 48;
                        $pLip = 27;
                    } else {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    }
                }
            } elseif ($hasHypertension) {
                // TABLES 10, 13, 16
                if ($range === 'low') { // Table 10
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 40;
                        $pLip = 30;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 28;
                        $pGlu = 44;
                        $pLip = 28;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 25;
                        $pGlu = 45;
                        $pLip = 30;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 48;
                        $pLip = 27;
                    } else {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    }
                } elseif ($range === 'mid') { // Table 13
                    if ($activity === "Sédentaire") {
                        $pProt = 29;
                        $pGlu = 41;
                        $pLip = 30;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 29;
                        $pGlu = 44;
                        $pLip = 30;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 25;
                        $pGlu = 45;
                        $pLip = 30;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 48;
                        $pLip = 27;
                    } else {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    }
                } else { // Table 16
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 40;
                        $pLip = 30;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 28;
                        $pGlu = 44;
                        $pLip = 28;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 25;
                        $pGlu = 45;
                        $pLip = 30;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 48;
                        $pLip = 27;
                    } else {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    }
                }
            } elseif ($hasCardio) {
                // TABLES 11, 14, 17
                if ($range === 'low') { // Table 11
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 40;
                        $pLip = 30;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 30;
                        $pGlu = 44;
                        $pLip = 26;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 25;
                        $pGlu = 45;
                        $pLip = 30;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 48;
                        $pLip = 27;
                    } else {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    }
                } elseif ($range === 'mid') { // Table 14
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 41;
                        $pLip = 29;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 28;
                        $pGlu = 45;
                        $pLip = 27;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 25;
                        $pGlu = 45;
                        $pLip = 30;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 48;
                        $pLip = 27;
                    } else {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    }
                } else { // Table 17
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 40;
                        $pLip = 30;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 28;
                        $pGlu = 45;
                        $pLip = 27;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 25;
                        $pGlu = 45;
                        $pLip = 30;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 48;
                        $pLip = 27;
                    } else {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    }
                }
            } else {
                // NO PATHOLOGY (Tables 21, 22, 23)
                if ($range === 'low') { // Table 21
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 35;
                        $pLip = 35;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 30;
                        $pGlu = 40;
                        $pLip = 30;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 27;
                        $pGlu = 45;
                        $pLip = 28;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    } else {
                        $pProt = 25;
                        $pGlu = 55;
                        $pLip = 20;
                    }
                } elseif ($range === 'mid') { // Table 22
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 35;
                        $pLip = 35;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 30;
                        $pGlu = 40;
                        $pLip = 30;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 26;
                        $pGlu = 45;
                        $pLip = 29;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    } else {
                        $pProt = 25;
                        $pGlu = 55;
                        $pLip = 20;
                    }
                } else { // Table 23
                    if ($activity === "Sédentaire") {
                        $pProt = 30;
                        $pGlu = 35;
                        $pLip = 35;
                    } elseif ($activity === "Légèrement actif") {
                        $pProt = 30;
                        $pGlu = 40;
                        $pLip = 30;
                    } elseif ($activity === "Modérément actif") {
                        $pProt = 27;
                        $pGlu = 45;
                        $pLip = 28;
                    } elseif ($activity === "Très actif") {
                        $pProt = 25;
                        $pGlu = 50;
                        $pLip = 25;
                    } else {
                        $pProt = 25;
                        $pGlu = 55;
                        $pLip = 20;
                    }
                }
            }
        } elseif ($isFitness) {
            // FITNESS LOGIC
            if ($hasDiabetes) { // Tableau 28
                if ($activity === "Sédentaire") {
                    $pProt = 27;
                    $pGlu = 35;
                    $pLip = 38;
                } elseif ($activity === "Légèrement actif") {
                    $pProt = 27;
                    $pGlu = 38;
                    $pLip = 35;
                } elseif ($activity === "Modérément actif") {
                    $pProt = 27;
                    $pGlu = 40;
                    $pLip = 33;
                } elseif ($activity === "Très actif") {
                    $pProt = 27;
                    $pGlu = 43;
                    $pLip = 30;
                } else {
                    $pProt = 27;
                    $pGlu = 45;
                    $pLip = 28;
                }
            } elseif ($hasHypertension) { // Tableau 29
                if ($activity === "Sédentaire") {
                    $pProt = 28;
                    $pGlu = 37;
                    $pLip = 30;
                } elseif ($activity === "Légèrement actif") {
                    $pProt = 27;
                    $pGlu = 44;
                    $pLip = 29;
                } elseif ($activity === "Modérément actif") {
                    $pProt = 25;
                    $pGlu = 45;
                    $pLip = 25;
                } elseif ($activity === "Très actif") {
                    $pProt = 25;
                    $pGlu = 50;
                    $pLip = 22;
                } else {
                    $pProt = 25;
                    $pGlu = 45;
                    $pLip = 20;
                }
            } elseif ($hasCardio) { // Cardio
                if ($activity === "Sédentaire") {
                    $pProt = 27;
                    $pGlu = 37;
                    $pLip = 30;
                } elseif ($activity === "Légèrement actif") {
                    $pProt = 28;
                    $pGlu = 42;
                    $pLip = 28;
                } elseif ($activity === "Modérément actif") {
                    $pProt = 25;
                    $pGlu = 45;
                    $pLip = 25;
                } elseif ($activity === "Très actif") {
                    $pProt = 25;
                    $pGlu = 45;
                    $pLip = 25;
                } else {
                    $pProt = 25;
                    $pGlu = 45;
                    $pLip = 25;
                }
            } else { // No pathology (Tableau 33)
                if ($activity === "Sédentaire") {
                    $pProt = 30;
                    $pGlu = 35;
                    $pLip = 35;
                } elseif ($activity === "Légèrement actif") {
                    $pProt = 30;
                    $pGlu = 42;
                    $pLip = 28;
                } elseif ($activity === "Modérément actif") {
                    $pProt = 30;
                    $pGlu = 48;
                    $pLip = 22;
                } elseif ($activity === "Très actif") {
                    $pProt = 30;
                    $pGlu = 53;
                    $pLip = 17;
                } else {
                    $pProt = 30;
                    $pGlu = 58;
                    $pLip = 12;
                }
            }
        }

        // Final conversion to Grams
        $gProt = ($apportCalorique * ($pProt / 100)) / 4;
        $gGlu = ($apportCalorique * ($pGlu / 100)) / 4;
        $gLip = ($apportCalorique * ($pLip / 100)) / 9;

        return [
            'distribution' => [
                'proteines_percent' => $pProt,
                'glucides_percent' => $pGlu,
                'lipides_percent' => $pLip
            ],
            'grammes' => [
                'proteines' => $gProt,
                'glucides' => $gGlu,
                'lipides' => $gLip
            ]
        ];
    }

    private function generateNutritionInterventionPlan($user, $metrics, $responses, $pathologies)
    {
        $sections = [];
        $isFitness = false;
        $mapping = $this->resolveDynamicMapping($user->maladie_chronique_id);
        $objId = $mapping['objectif_principal'] ?? 89;

        foreach ($user->reponse as $rep) {
            if ($rep->question_id == $objId && stripos($rep->description ?: '', 'forme physique') !== false) {
                $isFitness = true;
                break;
            }
            if ($rep->question_id == $objId && $rep->question_possible_answer_id) {
                $pa = DB::table('question_possible_answers')->where('id', $rep->question_possible_answer_id)->first();
                if ($pa && stripos($pa->value, 'forme physique') !== false) {
                    $isFitness = true;
                    break;
                }
            }
        }

        // 1. Antécédents & Diabète + RTH Constat
        $sections[] = $this->getAntecedentsAdvice($metrics, $responses, $pathologies);

        // 2. Médicaments (Enriched)
        $sections[] = $this->getMedicationAdvice($responses, $user->maladie_chronique_id);

        // 3. Fitness Specific Advice (New)
        if ($isFitness) {
            $sections[] = $this->getFitnessAdvice();
        }

        // 4. Collation Table (New)
        $sections[] = $this->getCollationAdvice($user->niveau_d_activite_physique);

        // 5. Habitudes Alimentaires (Fruits/Légumes, Grignotage, Boissons)
        $sections[] = $this->getDietaryHabitsAdvice($responses, $user->maladie_chronique_id);

        // 6. Mode de vie (Sommeil, Apnée, Sédentarité)
        $sections[] = $this->getLifestyleAdvice($responses, $user->maladie_chronique_id);

        // 7. Comportement (Stress, Satiété)
        $sections[] = $this->getBehavioralAdvicePlan($responses, $user->maladie_chronique_id);

        // 8. Activité Physique & Postures
        $sections[] = $this->getPhysicalActivityAdvice($user, $responses, $user->maladie_chronique_id);

        // 9. Aide et Gestion du Poids (Historique)
        $sections[] = $this->getWeightManagementHistoryAdvice($responses, $user->maladie_chronique_id);

        // 10. Psychologique et Soutien
        $sections[] = $this->getPsychologicalAdvice($responses, $user->maladie_chronique_id);

        // 11. Surveillance Santé
        $sections[] = $this->getHealthMonitoringAdvice($responses, $user->maladie_chronique_id);

        // 12. Principes Transversaux et Encouragements
        $sections[] = $this->getTransversalAdvice($user->maladie_chronique_id);

        return array_filter($sections);
    }

    private function getFitnessAdvice()
    {
        $content = "🌟 CONSEILS TRANSVERSAUX POUR LA FORME PHYSIQUE :\n\n";
        $content .= "💧 HYDRATATION : Objectif 2-3L eau/jour. Verre au réveil, avant chaque repas, et pendant l'effort.\n";
        $content .= "😴 SOMMEIL : 7-8h/nuit essentiels pour la récupération musculaire et la régulation hormonale.\n";
        $content .= "🧘 GESTION DU STRESS : Méditation, respiration ou activité physique douce pour abaisser le cortisol.\n";
        $content .= "👫 SOUTIEN SOCIAL : Impliquez vos proches ou rejoignez un groupe de marche/sport.\n";
        $content .= "📊 SUIVI : Pesée hebdomadaire et prise de mesures (taille, hanches) une fois par mois.\n";
        $content .= "⏳ PATIENCE : Visez une progression durable (0.5 - 1kg/semaine max). Les résultats pérennes prennent du temps.\n";

        return ['titre' => "Optimisation de la Forme Physique", 'contenu' => $content];
    }

    private function getCollationAdvice($activity)
    {
        $table = [
            "Sédentaire" => "0 – 1 collation / jour",
            "Légèrement actif" => "1 collation / jour",
            "Modérément actif" => "1 – 2 collations / jour",
            "Très actif" => "2 collations / jour",
            "Extrêmement actif" => "2 collations (nécessaires) / jour"
        ];

        $recommendation = $table[$activity] ?? "1 – 2 collations / jour";

        $content = "🍎 GESTION DES COLLATIONS :\n";
        $content .= "En fonction de votre niveau d'activité ($activity), nous recommandons : **$recommendation**.\n";
        $content .= "Privilégiez les fruits frais, les noix de cajou nature ou un œuf dur.\n";

        return ['titre' => "Structure des Repas", 'contenu' => $content];
    }

    private function getAntecedentsAdvice($metrics, $responses, $pathologies)
    {
        $rth = $metrics['rth'] ?? 0;
        $threshold = $metrics['rth_threshold'] ?? 0.85;
        $gender = ($metrics['is_male'] ?? false) ? 'homme' : 'femme';

        $title = "Antécédents et Risques Métaboliques";
        $content = "";

        if ($pathologies['diabetes']) {
            $content .= "✅ SI OUI - Diabète type 2 présent :\n";
            $content .= "• Privilégier les glucides à index glycémique bas.\n";
            $content .= "• Fractionner les repas (éviter les gros volumes).\n";
            $content .= "• Surveiller les portions de féculents.\n";
            $content .= "• Augmenter les fibres (légumes verts).\n\n";

            $content .= "📢 CONSTAT CAPITAL : D'après le calcul de votre RTH ($rth) sur la base de vos données personnelles par notre système, nous remarquons une évidence par rapport à votre profil (seuil $threshold pour un(e) $gender), ce qui confirme nos affirmations sur les risques accourus au diabète de type 2. De ce fait, nous vous exhortons à prendre en compte nos conseils et notre guide alimentaire.\n\n";
        }

        if ($pathologies['hypertension']) {
            $content .= "❤️ HYPERTENSION ARTÉRIELLE :\n";
            $content .= "• Réduire drastiquement le sel < 5g/jour.\n";
            $content .= "• Privilégier les aliments riches en potassium (banane, avocat, épinards).\n";
            $content .= "• Éviter les graisses saturées et la friture (sauce graine, huile de palme).\n\n";
        }

        if ($pathologies['cardio']) {
            $content .= "💙 MALADIES CARDIOVASCULAIRES :\n";
            $content .= "• Réduire les graisses saturées et trans.\n";
            $content .= "• Privilégier les oméga-3 (poissons gras locaux : maquereau, sardines fraîches).\n\n";
        }

        if (!$pathologies['diabetes'] && !$pathologies['hypertension'] && !$pathologies['cardio']) {
            $content .= "✅ SI NON - Aucun antécédent :\n";
            $content .= "• Maintenir une alimentation équilibrée actuelle.\n";
            $content .= "• Privilégier les aliments peu transformés et rester actif physiquement.\n";
            $content .= "• Hydratation : Boire au moins 1.5L à 2L d'eau par jour.\n";
            $content .= "• Sommeil : Viser 7 à 9 heures de sommeil réparateur pour favoriser le métabolisme.\n";
        }

        return ['titre' => $title, 'contenu' => $content];
    }

    private function getMedicationAdvice($responses, $diseaseId)
    {
        $mapping = $this->resolveDynamicMapping($diseaseId);
        $q70 = $responses[$mapping['meds_types'] ?? 70]['text'] ?? '';
        $q69 = $responses[$mapping['meds_lies'] ?? 69]['text'] ?? '';

        if (empty($q70) && empty($q69)) {
            $content = "❌ SI NON - Aucun médicament :\n";
            $content .= "• Prévention pure par l'alimentation et surveillance régulière de la glycémie.\n";
            $content .= "• Favoriser les glucides à IG bas et répartir les apports sur la journée.\n";
            $content .= "• Éviter les sucres rapides et augmenter les fibres.\n";
            $content .= "• Repas type : Riz complet + sauce tomate maison + poulet + légumes variés.\n";
            return ['titre' => "Adaptations liées aux Médicaments", 'contenu' => $content];
        }

        $content = "💊 ADAPTATIONS LIÉES À VOS MÉDICAMENTS :\n\n";
        $combinedText = $q70 . ' ' . $q69;

        // TYPE 1 : Glycémie / Metformine
        if (preg_match('/Metformine|Glimepiride|Gliclazide|Sitagliptine|Empagliflozine|Dapagliflozine|Liraglutide|Semaglutide/i', $combinedText)) {
            $content .= "🟦 RÉGULATION DE LA GLYCÉMIE :\n";
            if (stripos($combinedText, 'Metformine') !== false) {
                $content .= "• **Metformine** : Prendre impérativement AU MILIEU du repas pour réduire les troubles digestifs.\n";
                $content .= "• Repas suggéré : Riz complet + sauce légumes + poisson + salade.\n";
                $content .= "• Éviter les repas trop gras qui aggravent les nausées.\n";
            }
            $content .= "• Soutien SGLT2 (Dapagliflozine, etc.) : Hydratation accrue (2.5L/jour).\n\n";
        }

        // TYPE 2 : Insuline
        if (preg_match('/Insuline|Humalog|Novorapid|Lantus|Tresiba/i', $combinedText)) {
            $content .= "🟨 INSULINE (RÈGLE ABSOLUE) :\n";
            $content .= "• **Injection rapide** : MANGER impérativement dans les 15-30 min suivant l'injection.\n";
            $content .= "• Portions de glucides FIXES et RÉGULIÈRES (ex: Akassa 150g ou Riz 150g cuit).\n";
            $content .= "• Collations (10h, 16h, 22h) obligatoires pour éviter l'hypoglycémie.\n";
            $content .= "🎒 KIT URGENCE : Toujours avoir 3 morceaux de sucre + jus d'orange sur soi.\n\n";
        }

        // TYPE 3 : Tension / Diurétiques
        if (preg_match('/IEC|Ramipril|ARA2|Losartan|Bêta-bloquants|Bisoprolol|Diurétiques|Furosémide/i', $combinedText)) {
            $content .= "🟥 TENSION ARTÉRIELLE :\n";
            if (preg_match('/Diurétiques|Furosémide/i', $combinedText)) {
                $content .= "• **Diurétiques** : Risque de perte de potassium. Augmenter : bananes, avocat, oranges, épinards.\n";
            }
            if (preg_match('/IEC|Ramipril|ARA2|Losartan/i', $combinedText)) {
                $content .= "• **IEC/ARA2** : Attention, ne pas surconsommer de potassium sans avis médical.\n";
            }
            if (stripos($combinedText, 'Bêta-bloquants') !== false) {
                $content .= "• **Bêta-bloquants** : Attention, ils masquent les signes cardiaques de l'hypoglycémie.\n";
            }
            $content .= "• Sel : ZÉRO ajouté. Utiliser épices (gingembre, ail, oignon).\n\n";
        }

        // TYPE 4 : Cholestérol
        if (preg_match('/Statines|Atorvastatine|Simvastatine|cholestérol/i', $combinedText)) {
            $content .= "🟩 CHOLESTÉROL (STATINES) :\n";
            $content .= "• **INTERDICTION ABSOLUE : Pamplemousse** (fruit et jus). Risque d'interaction dangereuse.\n";
            $content .= "• Aliments anti-cholestérol : Avoine, haricots rouges, maquereau, sardines.\n";
            $content .= "• Limiter l'huile de palme rouge et les viandes grasses.\n\n";
        }

        // TYPE 5 : Perte de poids (Orlistat)
        if (stripos($combinedText, 'Orlistat') !== false) {
            $content .= "🟧 ORLISTAT (Xenical) :\n";
            $content .= "• Bloque 30% des graisses : Limiter les graisses à 15g par repas pour éviter les coliques.\n\n";
        }

        return ['titre' => "Gestion des Médicaments", 'contenu' => $content];
    }

    private function getDietaryHabitsAdvice($responses, $diseaseId)
    {
        $mapping = $this->resolveDynamicMapping($diseaseId);
        $q71 = $responses[$mapping['journee_typique'] ?? 71]['text'] ?? '';
        $q72 = $responses[$mapping['fruits_legumes'] ?? 72]['text'] ?? '';
        $q73 = $responses[$mapping['grignotage'] ?? 73]['text'] ?? '';
        $q75 = $responses[$mapping['boissons'] ?? 75]['text'] ?? '';

        $content = "";

        // Typical Day (Q71)
        if (!empty($q71) && stripos($q71, 'Aucun') === false) {
            $content .= "🍽️ ANALYSE DE VOTRE JOURNÉE : Vos habitudes ($q71) permettent de cerner vos réalités quotidiennes pour mieux vous orienter.\n\n";
        }

        // Fruits & Légumes (Q72)
        if (stripos($q72, '1-2') !== false) {
            $content .= "🥦 FRUITS & LÉGUMES (INSUFFISANT) : Objectif 5 portions min. Commencez par papaye + concombre en collation, et carotte + mangue verte le soir.\n";
        } elseif (stripos($q72, '3-4') !== false) {
            $content .= "🥦 FRUITS & LÉGUMES (BON DÉBUT) : Optimisez vers 5-7 portions. Intégrez des légumes dans toutes les sauces (concombre, tomate) et un fruit à chaque collation.\n";
        } elseif (stripos($q72, '5') !== false) {
            $content .= "🥦 FRUITS & LÉGUMES (EXCELLENT) : Focus sur la variété. Privilégiez les légumes verts (épinards, gboma dessi) et crucifères (chou). Limitez les fruits à 2-3 max/jour.\n";
        }
        $content .= "\n";

        // Grignotage (Q73/Q74)
        if (stripos($q73, 'Oui') !== false) {
            $q74 = $responses[74]['text'] ?? '';
            $content .= "🍿 STRATÉGIE GRIGNOTAGE (PLAN 4 SEMAINES) :\n";
            if (preg_match('/sucré|gras|beignets|galettes|sodas|bonbons/i', $q74)) {
                $content .= "• Transition : Remplacer beignets (akara frit) par akara au four, et sodas par bissap maison non sucré.\n";
                $content .= "• Semaine 1 : Remplacer 1 grignotage/jour. Semaine 3 : Tous remplacés. Semaine 4 : Consolidation.\n";
            } else {
                $content .= "• Vos choix (fruits, noix) sont bons. Attention aux portions : 30g max pour les noix (creux de la main).\n";
            }
            $content .= "\n";
        }

        // Boissons (Q75)
        if (stripos($q75, 'Tous les jours') !== false) {
            $content .= "🥤 SEVRAGE BOISSONS (PLAN 4 SEMAINES) :\n";
            $content .= "• Semaine 1 : Alterner 1 jour sucré / 1 jour substitut (Eau de coco, Jus gingembre-citron).\n";
            $content .= "• Semaine 2-3 : Diluer vos jus à 50% avec de l'eau.\n";
            $content .= "• Semaine 4+ : Élimination complète. Boissons sucrées = occasionnelles uniquement.\n";
        } elseif (stripos($q75, 'Une fois par semaine') !== false) {
            $content .= "🥤 BOISSONS : Acceptable si modéré. Privilégiez le jus de baobab (vitamines, fibres) ou de bissap peu sucré en fin de repas.\n";
        }
        $content .= "\n";

        return $content ? ['titre' => "Habitudes Alimentaires", 'contenu' => $content] : null;
    }

    private function getLifestyleAdvice($responses, $diseaseId)
    {
        $mapping = $this->resolveDynamicMapping($diseaseId);
        $q76 = $responses[$mapping['sommeil'] ?? 76]['text'] ?? '';
        $q77 = $responses[$mapping['apnee'] ?? 77]['text'] ?? '';
        $q81 = $responses[$mapping['sedentarite'] ?? 81]['text'] ?? '';

        $content = "";

        // Sommeil (Q76)
        if (stripos($q76, 'Moins de 6') !== false || stripos($q76, '6h-7h') !== false) {
            $content .= "😴 PLAN D'ACTION SOMMEIL (7-8H) :\n";
            $content .= "• Étape 1 : Identifier les causes (écrans, café après 14h, stress).\n";
            $content .= "• Étape 2 : Avancer l'heure du coucher de 15 min/semaine.\n";
            $content .= "• Dîner anti-insomnie : Soupe de légumes verts tiède + poisson grillé + patate douce (150g).\n\n";
        }

        // Apnée (Q77)
        if (stripos($q77, 'Oui') !== false) {
            $content .= "🌬️ STRATÉGIE ANTI-APNÉE :\n";
            $content .= "• Dîner ultra-léger AVANT 18H : Soupe claire + poisson vapeur + salade (PAS de féculents le soir).\n";
            $content .= "• Position : Dormir sur le côté, surélever la tête de lit de 15-20 cm. Arrêt alcool complet.\n\n";
        }

        // Sédentarité (Q81)
        if (stripos($q81, '8h') !== false) {
            $content .= "💺 SÉDENTARITÉ EXTRÊME (PLAN DE TRANSFORMATION) :\n";
            $content .= "• Règle d'or : JAMAIS plus de 50 min assis continu. Réglez une alarme chaque heure.\n";
            $content .= "• Bureautique active : Téléphonez debout, utilisez les escaliers, marchez aux pauses.\n\n";
        } elseif (stripos($q81, '6h-8h') !== false) {
            $content .= "💺 SÉDENTARITÉ : Position assise prolongée. Levez-vous toutes les 30 min. 45-60 min d'activité modérée quotidienne obligatoire pour compenser.\n\n";
        }

        return $content ? ['titre' => "Mode de Vie", 'contenu' => $content] : null;
    }

    private function getPhysicalActivityAdvice($user, $responses, $diseaseId)
    {
        $mapping = $this->resolveDynamicMapping($diseaseId);
        $q84 = $responses[$mapping['fc_valeur'] ?? 84]['text'] ?? '';
        $q81 = $responses[$mapping['sedentarite'] ?? 81]['text'] ?? '';
        $q82 = $responses[$mapping['activites_preferees'] ?? 82]['text'] ?? '';
        $q80 = $responses[$mapping['poids_perdu'] ?? 80]['text'] ?? '';

        $activityLevel = $user->niveau_d_activite_physique;
        $age = $user->age ?? 30;

        // Tanaka Formula: FCmax = 208 - 0.7 * age
        $fcMax = 208 - (0.7 * $age);

        $content = "ACTIVITÉ PHYSIQUE ET POSTURES :\n\n";
        $content .= "VOS ZONES DE FRÉQUENCE CARDIAQUE (Tanaka) :\n";
        $content .= "• FC Maximale : $fcMax bpm.\n";
        $content .= "• Zone 1 (50-60%) : " . ($fcMax * 0.5) . "-" . ($fcMax * 0.6) . " bpm (Échauffement/Récupération).\n";
        $content .= "• Zone 2 (60-70%) : " . ($fcMax * 0.6) . "-" . ($fcMax * 0.7) . " bpm (Brûle-graisses/Endurance).\n";
        $content .= "• Zone 3 (70-80%) : " . ($fcMax * 0.7) . "-" . ($fcMax * 0.8) . " bpm (Amélioration cardio).\n";
        $content .= "• Échelle RPE (1-10) : Visez un effort de 4-6 (essoufflement léger, peut parler).\n\n";

        if ($activityLevel === 'Sédentaire') {
            $content .= "📅 PROGRAMME 'ZÉRO VERS ACTIF' (12 SEMAINES) :\n";
            $content .= "• Semaines 1-4 : 3x15 min de marche lente (Zone 1).\n";
            $content .= "• Semaines 5-8 : 3x30 min de marche rapide (Zone 2).\n";
            $content .= "• Semaines 9-12 : 4x40 min (Alterner Zone 2 et 3).\n\n";
        }

        $content .= "🥣 NUTRITION SPORTIVE BÉNINOISE :\n";
        $content .= "• Pré-effort (2h avant) : 1 banane douce ou bouillie de mil légère (sans sucre ajouté).\n";
        $content .= "• Post-effort (30-60 min) : 1 œuf bouilli ou 20g de noix de cajou nature + 300ml d'eau.\n\n";

        if (!empty($q82) && stripos($q82, 'Aucun') === false) {
            $content .= "• Vos Loisirs ($q82) : Intégrez-les comme séances de plaisir le week-end.\n";
        }

        return ['titre' => "Activité Physique", 'contenu' => $content];
    }

    private function getWeightManagementHistoryAdvice($responses, $diseaseId)
    {
        $mapping = $this->resolveDynamicMapping($diseaseId);
        $q79 = $responses[$mapping['regime_recent'] ?? 79]['text'] ?? ''; // Tentatives de perte de poids
        $q801 = $responses[$mapping['poids_perdu'] ?? 107]['text'] ?? ''; // Méthode utilisée ou Poids perdu

        $content = "⚖️ GESTION DU POIDS :\n";

        if (stripos($q79, 'Plusieurs') !== false || stripos($q79, 'Oui') !== false) {
            $content .= "• Historique : Le fameux 'effet yoyo' est souvent dû à des régimes trop restrictifs. Notre approche se veut durable.\n";
        }

        if (!empty($q801)) {
            $content .= "• Analyse de vos méthodes passées ($q801) : Nous allons corriger les erreurs de répartition des macronutriments pour stabiliser votre métabolisme.\n";
        }

        return ['titre' => "Aide et Gestion du Poids", 'contenu' => $content];
    }

    private function getBehavioralAdvicePlan($responses, $diseaseId)
    {
        $mapping = $this->resolveDynamicMapping($diseaseId);
        $q85 = $responses[$mapping['stress_ennui'] ?? 85]['text'] ?? '';
        $q86 = $responses[$mapping['finir_assiette'] ?? 86]['text'] ?? '';

        $content = "🧠 COMPORTEMENT ET SATIÉTÉ (WWW.txt) :\n\n";

        if (stripos($q85, 'Oui') !== false) {
            $content .= "⚠️ TECHNIQUE HALT (Faim Émotionnelle) :\n";
            $content .= "• Avant de manger hors repas, posez-vous la question : AI-JE FAIM ?\n";
            $content .= "• H (Hungry) : Faim réelle ? A (Angry) : En colère ? L (Lonely) : Seul(e) ? T (Tired) : Fatigué(e) ?\n";
            $content .= "• Si AL ou T : Remplacez la nourriture par 10 min de marche, appel à un ami ou repos.\n\n";
        }

        if (stripos($q86, 'Oui') !== false) {
            $content .= "🍽️ REDÉCOUVERTE DE LA FAIM (PLAN 4 SEMAINES) :\n";
            $content .= "• Semaine 1 : Posez vos couverts entre chaque bouchée. Mâchez 20 fois.\n";
            $content .= "• Semaine 2 : Évaluez votre faim (1 à 10) avant et après chaque repas.\n";
            $content .= "• Semaine 3-4 : Arrêtez-vous dès la première impression de satiété (Règle d'or).\n\n";
        }

        return $content ? ['titre' => "Gestion des Comportements", 'contenu' => $content] : null;
    }

    private function getPsychologicalAdvice($responses, $diseaseId)
    {
        $mapping = $this->resolveDynamicMapping($diseaseId);
        $q87 = $responses[$mapping['regime_particulier'] ?? 87]['text'] ?? '';
        $q88 = $responses[$mapping['regime_efficacite'] ?? 88]['text'] ?? '';

        $content = "🤝 MOTIVATION ET PSYCHOLOGIE :\n\n";

        if (stripos($q87, 'Oui') !== false) {
            $content .= "🧐 ANALYSE DE VOS RÉGIMES PASSÉS :\n";
            if (preg_match('/Restrictif|Hypocalorique|Privation/i', $q88)) {
                $content .= "• Régimes restrictifs : Ils ralentissent votre métabolisme. Ici, nous misons sur la qualité.\n";
            }
            if (preg_match('/Keto|Cétogène|Sans sucre/i', $q88)) {
                $content .= "• Keto/Sans sucre : Difficiles à tenir socialement. Notre guide réintègre les bons glucides béninois.\n";
            }
            if (preg_match('/Jeûne|Intermittent|IF|Omad/i', $q88)) {
                $content .= "• Jeûne intermittent : Peut causer des compulsions le soir. Le fractionnement 3 repas + 2 collations est préférable ici.\n";
            }
        }

        $content .= "\n💪 VOTRE FORCE : Vos tentatives passées ne sont pas des échecs, mais des apprentissages. Cette fois est la bonne car elle est progressive et adaptée à VOTRE culture.\n";

        return ['titre' => "Accompagnement Psychologique", 'contenu' => $content];
    }

    private function getTransversalAdvice($diseaseId)
    {
        $content = "🌟 RÉSUMÉ ET PRINCIPES TRANSVERSAUX (WWW.txt) :\n\n";
        $content .= "✅ À PRIVILÉGIER : Igname, Patate douce, Riz complet, Fonio, Poisson frais, Avocat, Noix de cajou nature.\n";
        $content .= "❌ À LIMITER : Fritures (Aloco, beignets), Cubes bouillon (Jumbo), Pain blanc, Boissons gazeuses.\n";
        $content .= "🧂 RÉDUCTION DU SEL : Utilisez Ail, Oignon, Gingembre, Citron et Herbes pour le goût.\n\n";

        $content .= "⚖️ NOTICES RÉGLEMENTAIRES :\n";
        $content .= "• Ce programme est un soutien nutritionnel et ne remplace pas une consultation médicale.\n";
        $content .= "• En cas de malaise ou douleur inhabituelle lors de l'activité physique, arrêtez immédiatement et consultez.\n\n";

        $content .= "🌟 MESSAGE D'ENCOURAGEMENT : Vous faites cela pour votre SANTÉ et votre ÉNERGIE. Chaque petit pas compte. Vous méritez de vous sentir bien dans votre corps. Vous êtes CAPABLE de réussir !";

        return ['titre' => "Principes Transversaux", 'contenu' => $content];
    }

    private function getHealthMonitoringAdvice($responses, $diseaseId)
    {
        $mapping = $this->resolveDynamicMapping($diseaseId);
        $q83 = $responses[$mapping['fc_connaissance'] ?? 83]['text'] ?? '';
        $q84 = $responses[$mapping['fc_valeur'] ?? 84]['text'] ?? '';

        $content = "📊 SURVEILLANCE SANTÉ :\n";

        if (stripos($q83, 'Oui') !== false) {
            $content .= "• Votre fréquence cardiaque au repos (FCR) est de $q84 bpm. ";
            $content .= "Une baisse de la FCR avec le temps est signe d'une meilleure forme cardiovasculaire.\n";
            $content .= "• Monitoring : Mesurez votre FCR le matin au réveil sur 3-5 jours pour une référence stable.\n";
        } else {
            $content .= "• Nous recommandons de mesurer votre FCR (le matin au réveil) pour suivre l'impact de l'activité physique sur votre cœur.\n";
        }

        return ['titre' => "Surveillance Santé", 'contenu' => $content];
    }

    private function generateDynamicFoodGuide($user, $macroGrams, $pathologies, $objective = '', $weightLossRange = '')
    {
        $dataService = \App\Services\NutritionDataFactory::make($objective, $pathologies, $weightLossRange);
        $menus = $dataService->getMenus();

        $generator = new \App\Services\MenuGenerator($macroGrams, $menus, $user->niveau_d_activite_physique, 30, $pathologies);
        $result = $generator->generate();

        return [
            'menu_journalier' => $result['menu'],
            'facteurs' => $result['average_factors'],
            'conseils' => "Votre guide alimentaire sur 30 jours a été généré via notre algorithme de précision. Les portions sont ajustées dynamiquement pour votre TDEE et vos objectifs cliniques spécifiquement pour un profil {$user->niveau_d_activite_physique}."
        ];
    }

    /**
     * Génère une recommandation spécifique pour l'obésité sévère basée sur la question et la réponse.
     */
    private function getSevereRecommendation($questionText, $answerText, $pathologies)
    {
        if (empty($questionText))
            return 'Aucun';

        // Priorité des pathologies pour l'obésité sévère
        $pathoSlug = 'none';
        if ($pathologies['diabetes'])
            $pathoSlug = 'diabetes';
        elseif ($pathologies['hypertension'])
            $pathoSlug = 'hypertension';
        elseif ($pathologies['cardio'])
            $pathoSlug = 'hypercholestérolémie';

        $recommendation = \App\Models\Recommendation::where('maladie_chronique_id', 2)
            ->where('question_text', $questionText)
            ->where(function ($q) use ($answerText) {
                $q->where('answer_value', $answerText)->orWhereNull('answer_value');
            })
            ->where(function ($q) use ($pathoSlug) {
                $q->where('pathology', $pathoSlug)->orWhere('pathology', 'all');
            })
            ->orderByRaw('answer_value IS NOT NULL DESC') // Priorité au match exact
            ->first();

        return $recommendation ? $recommendation->content : 'Aucune recommandation spécifique.';
    }

    private function getModerateRecommendation($questionText, $answerText, $responsesMap, $pathologies, $user, $objective, $weightLossRange = '')
    {
        if (empty($questionText))
            return '';

        // 1. Déterminer le slug de l'objectif
        $objSlug = (stripos($objective, 'forme physique') !== false) ? 'fitness' : 'weight_loss';

        // 2. Déterminer le slug de la tranche de poids
        $rangeSlug = 'all';
        if ($objSlug === 'weight_loss') {
            if (stripos($weightLossRange, 'moins de 5') !== false)
                $rangeSlug = 'under_5';
            elseif (stripos($weightLossRange, '5') !== false && stripos($weightLossRange, '10') !== false)
                $rangeSlug = '5_10';
            elseif (stripos($weightLossRange, 'plus de 10') !== false)
                $rangeSlug = 'over_10';
        }

        // 3. Déterminer le slug de la pathologie (Priorité : Diabète > Hypertension > Cardio > None)
        $pathoSlug = 'none';
        if ($pathologies['diabetes'])
            $pathoSlug = 'diabetes';
        elseif ($pathologies['hypertension'])
            $pathoSlug = 'hypertension';
        elseif ($pathologies['cardio'])
            $pathoSlug = 'cardio';

        // 4. Requête en base de données
        $recommendation = \App\Models\Recommendation::where('maladie_chronique_id', 1)
            ->where('question_text', $questionText)
            ->where(function ($q) use ($answerText) {
                $q->where('answer_value', $answerText)->orWhereNull('answer_value');
            })
            ->where(function ($q) use ($objSlug) {
                $q->where('objective', $objSlug)->orWhere('objective', 'both');
            })
            ->where(function ($q) use ($rangeSlug) {
                $q->where('weight_loss_range', $rangeSlug)->orWhere('weight_loss_range', 'all');
            })
            ->where(function ($q) use ($pathoSlug) {
                $q->where('pathology', $pathoSlug)->orWhere('pathology', 'all');
            })
            ->orderByRaw('answer_value IS NOT NULL DESC') // Priorité au match exact
            ->first();

        $content = $recommendation ? $recommendation->content : "";

        // Remplacement dynamique de la variable {valeur_tanaka} par le vrai calcul
        if (!empty($content) && strpos($content, '{valeur_tanaka}') !== false) {
            $age = $user->age ?? 30; // Âge par défaut si non renseigné
            $fcMax = 208 - (0.7 * $age);
            $content = str_replace('{valeur_tanaka}', $fcMax, $content);
        }

        return $content;
    }

    /**
     * Résout les IDs de questions dynamiquement par leur texte pour éviter les cassures après re-seed.
     */
    private function resolveDynamicMapping($diseaseId)
    {
        $mappingTexts = [
            1 => [ // Obésité Modérée
                'antecedents_diag' => 'Avez-vous des antécédents de diabète de type 2, d\'hypertension artérielle ou de maladies cardiovasculaires ?',
                'antecedents_lequel' => 'Si oui, lequel ?',
                'meds_lies' => 'Prenez-vous actuellement des médicaments qui sont liés à votre antécédent précédent ?',
                'meds_types' => 'Prenez-vous actuellement l\'un des types de médicaments suivants ?',
                'journee_typique' => 'Pouvez-vous décrire une journée typique de vos repas et collations ?',
                'fruits_legumes' => 'Combien de portions de fruits et légumes consommez-vous par jour ?',
                'grignotage' => 'Grignotez-vous entre les repas ?',
                'aliments_grignotes' => 'Si oui, quels aliments consommez-vous ?',
                'boissons' => 'A quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?',
                'sommeil' => 'Combien d\'heures de sommeil avez-vous par nuit ?',
                'apnee' => 'Avez-vous l\'apnée du sommeil ?',
                'regime_recent' => 'Avez-vous récemment fait un régime de perte du poids ?',
                'sedentarite' => 'Combien de temps passez-vous en position assise chaque jour ?',
                'activites_preferees' => 'Quelles activités physiques appréciez-vous ?',
                'fc_connaissance' => 'Connaissez-vous votre fréquence cardiaque au repos ?',
                'fc_valeur' => 'Si oui, veuillez- nous la donner ?',
                'stress_ennui' => 'Mangez-vous souvent par stress ou ennui ?',
                'finir_assiette' => 'Avez-vous tendance à finir votre assiette même si vous n\'avez plus faim ?',
                'regime_particulier' => 'Avez-vous déjà suivi un régime alimentaire particulier ?',
                'regime_efficacite' => 'Si oui, lequel, et a-t-il été efficace pour vous ? Pourquoi ?',
                'objectif_principal' => 'Quel est votre objectif principal en matière de santé ?',
                'poids_a_perdre' => 'Combien de kg voulez-vous perdre ?',
                'niveau_changement' => 'Selon votre objectif de perte de poids, quel niveau de changement êtes-vous prêt à suivre ?',
            ],
            2 => [ // Obésité Sévère
                'antecedents_diag' => "Avez-vous été diagnostiqué avec des problèmes de santé liés à l'obésité, comme le diabète de type 2, l'hypertension ou l'hypercholestérolémie ?",
                'antecedents_lequel' => 'Si oui lequel ?',
                'chirurgie' => 'Avez-vous subi des opérations chirurgicales liées à votre poids comme une chirurgie bariatrique ?',
                'restrictions' => 'Avez-vous des restrictions alimentaires ?',
                'restrictions_lesquelles' => 'Si oui, choisissez l\'option qui s\'appliquent ?',
                'calories_vides' => 'Consommez-vous régulièrement des aliments riches en calories vides, comme les boissons sucrées, les fast-foods, ou les desserts ?',
                'plan_deja' => 'Suivez-vous déjà un plan nutritionnel ou avez-vous consulté un diététicien auparavant ?',
                'plan_deja_texte' => 'Si oui, parlez-nous de ça brièvement en quelques lignes',
                'boissons' => 'Buvez-vous régulièrement des boissons sucrées ou alcoolisées ?',
                'boissons_details' => 'Si oui, Quand ? Quelle quantité ?',
                'sommeil' => 'Combien d\' heures de sommeil avez-vous par nuit ?',
                'apnee' => 'Avez-vous l\'apnée du sommeil ?',
                'douleurs' => 'Avez-vous des douleurs articulaires ou des limitations de mobilité ?',
                'douleurs_frequence' => 'Si oui, A quelle fréquence ?',
                'regime_recent' => 'Avez-vous récemment fait un régime de perte du poids ?',
                'regime_poids_perdu' => 'Si oui, combien de poids avez-vous perdu ?',
                'jours_sport' => 'Combien de jours par semaine pratiquez-vous une activité physique ?',
                'sedentarite' => 'Combien de temps passez-vous en position assise chaque jour ?',
                'activites_preferees' => 'Quelles activités physiques appréciez-vous ?',
                'fc_connaissance' => 'Connaissez-vous votre fréquence cardiaque au repos ?',
                'fc_valeur' => 'Si oui, veuillez- nous la donner ?',
                'ressenti' => 'Comment décririez-vous votre ressenti personnel par rapport à votre poids ?',
                'stress_ennui' => 'Mangez-vous souvent par stress ou ennui ?',
                'finir_assiette' => 'Avez-vous tendance à finir votre assiette même si vous n\'avez plus faim ?',
                'emotions' => 'Avez-vous des habitudes alimentaires liées à des émotions, comme le stress ou la dépression ?',
                'programme_deja' => 'Avez-vous déjà suivi un programme ou tenté de perdre du poids auparavant ?',
            ]
        ];

        $texts = $mappingTexts[$diseaseId] ?? [];
        $resolvedMapping = [];

        foreach ($texts as $key => $text) {
            $question = \App\Models\Question::where('maladie_chronique_id', $diseaseId)
                ->where('texte_question', $text)
                ->first();
            if ($question) {
                $resolvedMapping[$key] = $question->id;
            }
        }

        return $resolvedMapping;
    }
}
