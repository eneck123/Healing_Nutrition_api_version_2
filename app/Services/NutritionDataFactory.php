<?php

namespace App\Services;

class NutritionDataFactory
{
    /**
     * Résout le service de données nutritionnelles approprié selon le profil.
     *
     * @param string $objective L'objectif principal (ex: "Perte de poids", "Améliorer votre forme physique")
     * @param array $pathologies Tableau contenant les booléens 'diabetes', 'hypertension', 'cardio'
     * @param string $weightLossRange La tranche de poids à perdre
     * @return NutritionDataServiceInterface
     */
    public static function make(string $objective, array $pathologies, string $weightLossRange): NutritionDataServiceInterface
    {
        $isWeightLoss = (stripos($objective, 'perte') !== false || stripos($objective, 'poids') !== false);
        $hasDiabetes = $pathologies['diabetes'] ?? false;
        $hasHypertension = $pathologies['hypertension'] ?? false;
        $hasCardio = $pathologies['cardio'] ?? false;

        // --- OBJECTIF AMÉLIORER SA FORME PHYSIQUE ---
        if (stripos($objective, 'forme') !== false || stripos($objective, 'fitness') !== false) {
            if ($hasDiabetes) {
                return new FitnessDiabetesNutritionDataService();
            }
            if ($hasHypertension) {
                return new FitnessHypertensionNutritionDataService();
            }
            if ($hasCardio) {
                return new FitnessCardioNutritionDataService();
            }
            return new FitnessNoPathologyNutritionDataService();
        }

        // --- TRANCHE MOINS DE 5KG ---
        if (stripos($weightLossRange, 'moins de 5') !== false) {
            if ($isWeightLoss && $hasDiabetes) {
                return new WeightLossUnder5DiabetesNutritionDataService();
            }
            if ($isWeightLoss && $hasHypertension) {
                return new WeightLossUnder5HypertensionNutritionDataService();
            }
            if ($isWeightLoss && $hasCardio) {
                return new WeightLossUnder5CardioNutritionDataService();
            }
            if ($isWeightLoss && !$hasDiabetes && !$hasHypertension && !$hasCardio) {
                return new WeightLossUnder5NoPathologyNutritionDataService();
            }
        }

        // --- TRANCHE 5 À 10KG ---
        if (stripos($weightLossRange, '5') !== false && stripos($weightLossRange, '10') !== false) {
            if ($isWeightLoss && $hasDiabetes) {
                return new WeightLoss5To10DiabetesNutritionDataService();
            }
            if ($isWeightLoss && $hasHypertension) {
                return new WeightLoss5To10HypertensionNutritionDataService();
            }
            if ($isWeightLoss && $hasCardio) {
                return new WeightLoss5To10CardioNutritionDataService();
            }
            if ($isWeightLoss && !$hasDiabetes && !$hasHypertension && !$hasCardio) {
                return new WeightLoss5To10NoPathologyNutritionDataService();
            }
        }

        // --- TRANCHE PLUS DE 10KG ---
        if (stripos($weightLossRange, 'plus de 10') !== false) {
            if ($isWeightLoss && $hasDiabetes) {
                return new WeightLossOver10DiabetesNutritionDataService();
            }
            if ($isWeightLoss && $hasHypertension) {
                return new WeightLossOver10HypertensionNutritionDataService();
            }
            if ($isWeightLoss && $hasCardio) {
                return new WeightLossOver10CardioNutritionDataService();
            }
            if ($isWeightLoss && !$hasDiabetes && !$hasHypertension && !$hasCardio) {
                return new WeightLossOver10NoPathologyNutritionDataService();
            }
        }

        // Cas Fallback : Si aucune pathologie (ou cas non encore implémenté spécifiquement)
        if (!$hasDiabetes && !$hasHypertension && !$hasCardio) {
            return new NoPathologyNutritionDataService();
        }

        // Par défaut, retourner le service générique
        return new NutritionDataService();
    }
}
