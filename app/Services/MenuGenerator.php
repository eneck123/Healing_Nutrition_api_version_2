<?php

namespace App\Services;

class MenuGenerator
{
    protected array $userMacros;
    protected array $baseMenu;
    protected string $activity;
    protected int $days;

    protected array $pathologies;

    // Flattened meal pools
    protected array $breakfasts = [];
    protected array $lunches = [];
    protected array $dinners = [];
    protected array $collations = [];

    public function __construct(array $userMacros, array $baseMenu, string $activity, int $days = 90, array $pathologies = [])
    {
        $this->userMacros = $userMacros; 
        $this->activity = $activity;
        // Correctly filter base menu by activity level
        $this->baseMenu = $baseMenu[$activity] ?? ($baseMenu['Sédentaire'] ?? []);
        $this->days = $days;
        $this->pathologies = $pathologies;

        $this->flattenMeals();
    }

    protected function flattenMeals()
    {
        // Extract all unique meal options from the base menu structure
        foreach (['jour1', 'jour2'] as $day) {
            if (!isset($this->baseMenu[$day])) continue;
            
            foreach (['Option A', 'Option B'] as $option) {
                if (!isset($this->baseMenu[$day][$option])) continue;
                
                $meals = $this->baseMenu[$day][$option];
                if (isset($meals['Petit-déjeuner'])) $this->breakfasts[] = $meals['Petit-déjeuner'];
                if (isset($meals['Déjeuner'])) $this->lunches[] = $meals['Déjeuner'];
                if (isset($meals['Dîner'])) $this->dinners[] = $meals['Dîner'];
            }
        }

        if (isset($this->baseMenu['collations'])) {
            $this->collations = $this->baseMenu['collations'];
        }
    }

    /**
     * Génère les menus pour la durée spécifiée
     */
    public function generate(): array
    {
        $menu90Jours = [];
        $globalFactors = ['g' => 0, 'p' => 0, 'l' => 0];

        // Generate all possible unique combinations indices [b, l, d]
        $combinations = [];
        $bCount = count($this->breakfasts);
        $lCount = count($this->lunches);
        $dCount = count($this->dinners);

        if ($bCount === 0 || $lCount === 0 || $dCount === 0) {
            // Fallback if data is missing
            return ['menu' => [], 'average_factors' => $globalFactors];
        }

        for ($b = 0; $b < $bCount; $b++) {
            for ($l = 0; $l < $lCount; $l++) {
                for ($d = 0; $d < $dCount; $d++) {
                    $combinations[] = [$b, $l, $d];
                }
            }
        }

        // Shuffle to randomize the order of unique days
        shuffle($combinations);

        for ($i = 1; $i <= $this->days; $i++) {
            // Pick a combination. If we run out, loop back to the start (smart repetition)
            $comboIndex = ($i - 1) % count($combinations);
            $indices = $combinations[$comboIndex];

            $dailyMeals = [
                'Petit-déjeuner' => $this->breakfasts[$indices[0]],
                'Déjeuner' => $this->lunches[$indices[1]],
                'Dîner' => $this->dinners[$indices[2]]
            ];

            // Generate snacks
            $snackCount = $this->getSnackCount();
            $snacks = [];
            if ($snackCount > 0 && !empty($this->collations)) {
                // Random snacks each day to add variety even if main meals repeat
                $selectedIndices = (array) array_rand($this->collations, min($snackCount, count($this->collations)));
                foreach ($selectedIndices as $idx) {
                    $snacks[] = $this->collations[$idx];
                }
            }

            // Adjust portions
            $dayMenu = $this->adjustDailyMenu($dailyMeals, $snacks);

            if (!$dayMenu) {
                 // Retry with relaxed constraints
                 $dayMenu = $this->adjustDailyMenu($dailyMeals, $snacks, true);
            }

            if (!$dayMenu) {
                // Fallback: If still no combination works, we return the base combination without adjustment
                // This ensures the user gets A menu, even if it's not perfectly macro-optimized
                $dayMenu = [
                    'type' => 'Standard (Non optimisé)',
                    'repas' => $dailyMeals,
                    'collations' => $snacks,
                    'factors' => ['glucides' => 1.0, 'proteines' => 1.0, 'lipides' => 1.0]
                ];
                
                // Add portions to the fallback menu consistent with the expected structure
                foreach ($dayMenu['repas'] as $type => &$items) {
                    foreach ($items as &$item) {
                        $item['portion_recommandee'] = ($item['base'] ?? 100) . ' g';
                    }
                }
                foreach ($dayMenu['collations'] as &$item) {
                     $item['portion'] = ($item['base'] ?? 100) . ' g';
                }
            }

            $menu90Jours[] = array_merge(['jour' => $i], $dayMenu);

            $globalFactors['g'] += $dayMenu['factors']['glucides'] ?? 1.0;
            $globalFactors['p'] += $dayMenu['factors']['proteines'] ?? 1.0;
            $globalFactors['l'] += $dayMenu['factors']['lipides'] ?? 1.0;
        }

        return [
            'menu' => $menu90Jours,
            'average_factors' => [
                'glucides' => round($globalFactors['g'] / $this->days, 3),
                'proteines' => round($globalFactors['p'] / $this->days, 3),
                'lipides' => round($globalFactors['l'] / $this->days, 3),
            ]
        ];
    }

    protected function adjustDailyMenu(array $dailyMeals, array $snacks, bool $relax = false): ?array
    {
        $hasDiabetes = $this->pathologies['diabetes'] ?? false;
        $isCardio = $this->pathologies['cardio'] ?? false;
        $isHypertension = $this->pathologies['hypertension'] ?? false;

        // PRIORITÉ DIABÈTE (Priorité maximale aux Glucides)
        if ($hasDiabetes) {
            $result = $this->scaleAndValidate($dailyMeals, $snacks, false);
            if ($result) return $result;

            if ($relax) {
                // Relaxation hiérarchique Diabète : 1. Lipides, 2. Protéines, 3. Glucides (dernier recours)
                $res1 = $this->scaleAndValidate($dailyMeals, $snacks, true, 1);
                if ($res1) return $res1;
                $res2 = $this->scaleAndValidate($dailyMeals, $snacks, true, 2);
                if ($res2) return $res2;
                $res3 = $this->scaleAndValidate($dailyMeals, $snacks, true, 3);
                if ($res3) return $res3;
            }
        } elseif ($isCardio) {
            // PRIORITÉ CARDIO (Priorité maximale aux Lipides)
            $result = $this->scaleAndValidate($dailyMeals, $snacks, false);
            if ($result) return $result;

            if ($relax) {
                $r1 = $this->scaleAndValidate($dailyMeals, $snacks, true, 1);
                if ($r1) return $r1;
                $r2 = $this->scaleAndValidate($dailyMeals, $snacks, true, 2);
                if ($r2) return $r2;
                $r3 = $this->scaleAndValidate($dailyMeals, $snacks, true, 3);
                if ($r3) return $r3;
            }
        } elseif ($isHypertension) {
            // PRIORITÉ HYPERTENSION
            $result = $this->scaleAndValidate($dailyMeals, $snacks, false);
            if ($result) return $result;

            if ($relax) {
                $res1 = $this->scaleAndValidate($dailyMeals, $snacks, true, 1);
                if ($res1) return $res1;
                $res2 = $this->scaleAndValidate($dailyMeals, $snacks, true, 2);
                if ($res2) return $res2;
                $res3 = $this->scaleAndValidate($dailyMeals, $snacks, true, 3);
                if ($res3) return $res3;
            }
        } else {
            // STRATÉGIE SANS PATHOLOGIES (Défaut) - Glucides > Protéines > Lipides
            $result = $this->scaleAndValidate($dailyMeals, $snacks, false);
            if ($result) return $result;
            if ($relax) {
                // Relaxation hiérarchique : 1. Protéines, 2. Lipides, 3. Glucides (dernier recours)
                $r1 = $this->scaleAndValidate($dailyMeals, $snacks, true, 1);
                if ($r1) return $r1;
                $r2 = $this->scaleAndValidate($dailyMeals, $snacks, true, 2);
                if ($r2) return $r2;
                $r3 = $this->scaleAndValidate($dailyMeals, $snacks, true, 3);
                if ($r3) return $r3;
            }
        }
        
        return null;
    }

    protected function getSnackCount(): int
    {
        switch ($this->activity) {
            case 'Sédentaire': return rand(0, 1);
            case 'Légèrement actif': return 1;
            case 'Modérément actif': return rand(1, 2);
            case 'Très actif': return 2;
            case 'Extrêmement actif': return 2;
            default: return 1;
        }
    }

    protected function scaleAndValidate(array $meals, array $snacks, bool $relax, int $relaxLevel = 0): ?array
    {
        // 1. Calculer les macros des snacks (fixes)
        $snackTotals = ['g' => 0, 'p' => 0, 'l' => 0];
        foreach ($snacks as $s) {
            $snackTotals['g'] += $s['g'];
            $snackTotals['p'] += $s['p'];
            $snackTotals['l'] += $s['l'];
        }

        // 2. Déterminer les cibles pour les repas principaux
        $targetG = max(0, $this->userMacros['glucides'] - $snackTotals['g']);
        $targetP = max(0, $this->userMacros['proteines'] - $snackTotals['p']);
        $targetL = max(0, $this->userMacros['lipides'] - $snackTotals['l']);

        // 3. Calculer les totaux de base des repas choisis
        $baseTotals = ['g' => 0, 'p' => 0, 'l' => 0];
        foreach ($meals as $items) {
            foreach ($items as $it) {
                $baseTotals['g'] += $it['g'];
                $baseTotals['p'] += $it['p'];
                $baseTotals['l'] += $it['l'];
            }
        }

        // 4. Calculer les facteurs initiaux
        $fG = $targetG / max(1, $baseTotals['g']);
        $fP = $targetP / max(1, $baseTotals['p']);
        $fL = $targetL / max(1, $baseTotals['l']);

        // Facteur final = min des facteurs (Méthode par priorité appliquée)
        $fFinal = min($fG, $fP, $fL);

        // 5. Validation par priorité
        if (!$this->isValid($fFinal, $fFinal, $fFinal, $relax, $relaxLevel)) {
            return null;
        }

        // 6. Application du facteur final ajusté
        $f = max(0.4, min(1.8, $fFinal));

        $adjustedMeals = [];
        foreach ($meals as $moment => $items) {
            $momentAdjusted = [];
            foreach ($items as $item) {
                $momentAdjusted[] = [
                    'nom' => $item['nom'],
                    'portion_recommandee' => round($item['base'] * $f) . ' g',
                    'details' => "Macros: ".round($item['p']*$f,1)."g P, ".round($item['g']*$f,1)."g G, ".round($item['l']*$f,1)."g L"
                ];
            }
            $adjustedMeals[$moment] = $momentAdjusted;
        }

        $adjustedSnacks = [];
        foreach ($snacks as $s) {
            $adjustedSnacks[] = [
                'nom' => $s['nom'],
                'portion' => ($s['base'] ?? 100) . ' g',
                'details' => "Macros: {$s['p']}g P, {$s['g']}g G, {$s['l']}g L"
            ];
        }

        return [
            'type' => $relax ? 'Ajusté (Relaxé Niv. '.$relaxLevel.')' : 'Ajusté (Optimal)',
            'repas' => $adjustedMeals,
            'collations' => $adjustedSnacks,
            'factors' => ['glucides' => $f, 'proteines' => $f, 'lipides' => $f]
        ];
    }

    protected function isValid(float $fG, float $fP, float $fL, bool $relax, int $relaxLevel = 0): bool
    {
        $hasDiabetes = $this->pathologies['diabetes'] ?? false;
        $isCardio = $this->pathologies['cardio'] ?? false;
        $isHypertension = $this->pathologies['hypertension'] ?? false;

        $avgFactor = ($fG + $fP + $fL) / 3;
        if ($avgFactor < 0.01) return false;

        $nG = $fG / $avgFactor;
        $nP = $fP / $avgFactor;
        $nL = $fL / $avgFactor;

        // === STRATÉGIE DIABÈTE (Selon document utilisateur) ===
        if ($hasDiabetes) {
            // 1. Glucides (Priorité maximale - Contrôle glycémique)
            $gMin = 0.85; $gMax = 1.05; $gRejet = 1.10;
            // 2. Protéines (Satiété et maintien musculaire)
            $pMin = 0.85; $pMax = 1.20;
            // 3. Lipides (Variable d'ajustement)
            $lMin = 0.70; $lMax = 1.15; $lRejet = 1.20;

            // Seuils avant relaxation
            $currLMin = 0.75; $currPMin = 0.90; $currGMin = 0.90;

            if ($relax) {
                if ($relaxLevel >= 1) $currLMin = 0.70; // 1. Relâcher Lipides
                if ($relaxLevel >= 2) $currPMin = 0.85; // 2. Relâcher Protéines
                if ($relaxLevel >= 3) $currGMin = 0.85; // 3. Relâcher Glucides (Dernier recours)
            }

            // Filtrage Glucides (Priorité absolue)
            if ($nG > $gRejet || $nG < $currGMin || $nG > $gMax) return false;
            // Filtrage Protéines
            if ($nP < $currPMin || $nP > $pMax) return false;
            // Filtrage Lipides
            if ($nL < $currLMin || $nL > $lRejet) return false;

            return true;
        }

        // === STRATÉGIE HYPERTENSION (Selon document utilisateur) ===
        if ($isHypertension && !$isCardio) {
            $lMin = 0.85; $lMax = 1.05; $lRejet = 1.10;
            $gMin = 0.80; $gMax = 1.10; $gRejet = 1.15;
            $pMin = 0.75; $pMax = 1.20;

            $currLMin = 0.90; $currGMin = 0.85; $currPMin = 0.80;

            if ($relax) {
                if ($relaxLevel >= 1) $currPMin = 0.75;
                if ($relaxLevel >= 2) $currGMin = 0.80;
                if ($relaxLevel >= 3) $currLMin = 0.85;
            }

            if ($nL < $currLMin || $nL > $lMax) {
                if ($nL > $lRejet) return false;
                if (!$relax) return false;
            }
            if ($nG > $gRejet) return false;
            if (!$relax && ($nG < $currGMin || $nG > $gMax)) return false;
            if (!$relax && ($nP < $currPMin || $nP > $pMax)) return false;

            return true;
        }

        // === STRATÉGIE SANS PATHOLOGIES (Défaut) - Selon document utilisateur ===
        // 1. Glucides (Priorité maximale - Déficit calorique)
        $gMin = 0.75; $gMax = 1.15; $gRejet = 1.15;
        // 2. Protéines (Satiété / Muscle)
        $pMin = 0.70; $pMax = 1.25;
        // 3. Lipides (Variable d'ajustement)
        $lMin = 0.70; $lMax = 1.20; $lRejet = 1.25;

        // Seuils avant relaxation
        $currGMin = 0.85; $currPMin = 0.80; $currLMin = 0.80;

        if ($relax) {
            if ($relaxLevel >= 1) $currPMin = 0.70; // 1. Relâcher Protéines
            if ($relaxLevel >= 2) $currLMin = 0.70; // 2. Relâcher Lipides
            if ($relaxLevel >= 3) $currGMin = 0.75; // 3. Relâcher Glucides (Besoin extrême)
        }

        // Filtrage Glucides (Hard filter)
        if ($nG > $gRejet || $nG < $currGMin || $nG > $gMax) return false;
        // Filtrage Protéines
        if ($nP < $currPMin || $nP > $pMax) return false;
        // Filtrage Lipides
        if ($nL < $currLMin || $nL > $lMax) return false;

        return true;
    }
}
