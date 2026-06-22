<?php

namespace App\Http\Controllers;

use App\Models\MaladieChronique;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MaladieChroniqueController extends Controller
{
    protected $calculationService;

    public function __construct(\App\Services\NutritionCalculationService $calculationService)
    {
        $this->middleware('auth:api');
        $this->calculationService = $calculationService;
    }
    
    /**
     * @OA\Post(
     *     path="/api/user_infos/maladie-chronique",
     *     tags={"User Infos"},
     *     security={{"BearerToken":{}}},
     *     summary="Associer maladie chorinique à l'utilisateur",
     *     description="Associate a disease to the user",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"name", "email", "password"},
     *             @OA\Property(property="type_maladie_chronique", type="string", example="obésité")
     *         )
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Maladie chronique associée avec succès",
     *         @OA\JsonContent(
     *             @OA\Property(property="success", type="boolean", example=true),
     *             @OA\Property(property="message", type="string", example="Type de maladie chronique enregistré..."),
     *             @OA\Property(
     *                 property="data",
     *                 type="object",
     *                 @OA\Property(property="maladie_chronique", type="object"),
     *                 @OA\Property(property="utilisateur", type="object"),
     *                 @OA\Property(property="nutrition_metrics", type="object")
     *             )
     *         )
     *     ),
     * )
    */
    public function store(Request $request)
    {
        //$utilisateur = Utilisateur::find(Auth::id());
         $utilisateur = $request->user();

        if (!$utilisateur) {
        return response()->json([
            'success' => false,
            'message' => 'Utilisateur non authentifié',
        ], 401);
        } 
        
        if (!$utilisateur) {
            Log::warning('Tentative d\'association de maladie chronique sans utilisateur authentifié');
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur non authentifié',
            ], 401);
        }

        $request->validate([
            'type_maladie_chronique' => 'required|string|in:obésité modérée,obésité sévère',
        ]);

        $maladieChronique = MaladieChronique::where('type', $request->type_maladie_chronique)->first();
        if(!$maladieChronique) {
            return response()->json([
                'success' => false,
                'message' => "Cette maladie n'est pas prise en compte pas le systeme",
            ], 500);
        }

        $utilisateur->maladie_chronique_id = $maladieChronique->id;
        $utilisateur->save();

        $utilisateur = $utilisateur->fresh();

        if ($utilisateur->maladie_chronique_id !== $maladieChronique->id) {
            Log::error('Échec de la mise à jour de maladie_chronique_id pour l\'utilisateur', [
                'utilisateur_id' => $utilisateur->id,
                'maladie_chronique_id' => $maladieChronique->id,
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors de l\'association de la maladie chronique à l\'utilisateur',
            ], 500);
        }

        Log::info('Maladie chronique associée à l\'utilisateur : ', [
            'utilisateur_id' => $utilisateur->id,
            'maladie_chronique_id' => $maladieChronique->id,
            'type' => $maladieChronique->type
        ]);

        // Trigger nutrition calculation directly via Service
        try {
            $calcData = $this->calculationService->calculateForUser($utilisateur);
        } catch (\Exception $e) {
            Log::error('Erreur lors du calcul nutritionnel après association de maladie', [
                'error' => $e->getMessage(),
                'user_id' => $utilisateur->id
            ]);
            $calcData = ['success' => false, 'message' => 'Calcul impossible : ' . $e->getMessage()];
        }

        return response()->json([
            'success' => true,
            'message' => 'Type de maladie chronique enregistré et associé à l\'utilisateur avec succès. Calculs nutritionnels mis à jour.',
            'data' => [
                'maladie_chronique' => $maladieChronique,
                'utilisateur' => $utilisateur->only(['id', 'maladie_chronique_id']),
                'nutrition_metrics' => $calcData
            ],
        ], 201);
    }
}