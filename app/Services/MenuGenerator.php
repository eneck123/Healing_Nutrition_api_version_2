<?php

namespace App\Services;

class MenuGenerator
{
    protected array $userMacros;
    protected array $baseMenu;
    protected string $activity;
    protected int $days;
    protected array $pathologies;

    protected array $breakfasts = [];
    protected array $lunches    = [];
    protected array $dinners    = [];
    protected array $collations = [];

    private const WINDOW_SIZE = 6;

    public function __construct(
        array  $userMacros,
        array  $baseMenu,
        string $activity,
        int    $days,
        array  $pathologies = []
    ) {
        $this->userMacros  = $userMacros;
        $this->activity    = $activity;
        $this->baseMenu    = $baseMenu[$activity] ?? ($baseMenu['Sédentaire'] ?? []);
        $this->days        = 30;
        $this->pathologies = $pathologies;

        $this->flattenMeals();
    }

    // -------------------------------------------------------------------------
    // APLATISSEMENT DES REPAS
    // -------------------------------------------------------------------------

    protected function flattenMeals(): void
    {
        foreach (['jour1', 'jour2'] as $day) {
            if (!isset($this->baseMenu[$day])) continue;

            foreach (['Option A', 'Option B'] as $option) {
                if (!isset($this->baseMenu[$day][$option])) continue;

                $meals = $this->baseMenu[$day][$option];

                if (isset($meals['Petit-déjeuner'])) $this->breakfasts[] = $meals['Petit-déjeuner'];
                if (isset($meals['Déjeuner']))       $this->lunches[]    = $meals['Déjeuner'];
                if (isset($meals['Dîner']))          $this->dinners[]    = $meals['Dîner'];
            }
        }

        if (isset($this->baseMenu['collations'])) {
            $this->collations = $this->baseMenu['collations'];
        }
    }

    // -------------------------------------------------------------------------
    // GÉNÉRATION PRINCIPALE
    // -------------------------------------------------------------------------

    public function generate(): array
    {
        $menuJours     = [];
        $globalFactors = ['g' => 0, 'p' => 0, 'l' => 0];

        $bCount = count($this->breakfasts);
        $lCount = count($this->lunches);
        $dCount = count($this->dinners);

        if ($bCount === 0 || $lCount === 0 || $dCount === 0) {
            return ['menu' => [], 'average_factors' => $globalFactors];
        }

        $allCombinations = [];
        for ($b = 0; $b < $bCount; $b++) {
            for ($l = 0; $l < $lCount; $l++) {
                for ($d = 0; $d < $dCount; $d++) {
                    $allCombinations[] = [$b, $l, $d];
                }
            }
        }

        $sequence = $this->buildCycleSequence($allCombinations, $this->days);

        foreach ($sequence as $dayIndex => $indices) {
            $dailyMeals = [
                'Petit-déjeuner' => $this->breakfasts[$indices[0]],
                'Déjeuner'       => $this->lunches[$indices[1]],
                'Dîner'          => $this->dinners[$indices[2]],
            ];

            $snacks = $this->pickSnacks();

            $dayMenu = $this->adjustDailyMenu($dailyMeals, $snacks)
                ?? $this->buildFallbackMenu($dailyMeals, $snacks);

            $menuJours[] = array_merge(['jour' => $dayIndex + 1], $dayMenu);

            $globalFactors['g'] += $dayMenu['factors']['glucides']  ?? 1.0;
            $globalFactors['p'] += $dayMenu['factors']['proteines'] ?? 1.0;
            $globalFactors['l'] += $dayMenu['factors']['lipides']   ?? 1.0;
        }

        return [
            'menu'            => $menuJours,
            'average_factors' => [
                'glucides'  => round($globalFactors['g'] / $this->days, 3),
                'proteines' => round($globalFactors['p'] / $this->days, 3),
                'lipides'   => round($globalFactors['l'] / $this->days, 3),
            ],
        ];
    }

    // -------------------------------------------------------------------------
    // FENÊTRE GLISSANTE
    // -------------------------------------------------------------------------

    private function buildCycleSequence(array $allCombinations, int $days): array
    {
        shuffle($allCombinations);

        $sequence   = [];
        $recentB    = [];
        $recentL    = [];
        $recentD    = [];
        $pool       = $allCombinations;
        $usedInPool = [];

        for ($day = 0; $day < $days; $day++) {

            if (empty($pool)) {
                $pool       = $allCombinations;
                $usedInPool = [];
                shuffle($pool);
            }

            $chosen    = null;
            $bestScore = PHP_INT_MAX;
            $bestIndex = -1;

            foreach ($pool as $idx => $combo) {
                $comboKey = implode('-', $combo);
                if (isset($usedInPool[$comboKey])) continue;

                $score = 0;
                if (in_array($combo[0], $recentB, true)) $score++;
                if (in_array($combo[1], $recentL, true)) $score++;
                if (in_array($combo[2], $recentD, true)) $score++;

                if ($score === 0) {
                    $chosen    = $combo;
                    $bestIndex = $idx;
                    break;
                }

                if ($score < $bestScore) {
                    $bestScore = $score;
                    $chosen    = $combo;
                    $bestIndex = $idx;
                }
            }

            if ($chosen === null) {
                $chosen    = reset($pool);
                $bestIndex = key($pool);
            }

            $sequence[]                        = $chosen;
            $usedInPool[implode('-', $chosen)] = true;

            $recentB[] = $chosen[0];
            $recentL[] = $chosen[1];
            $recentD[] = $chosen[2];

            if (count($recentB) > self::WINDOW_SIZE) array_shift($recentB);
            if (count($recentL) > self::WINDOW_SIZE) array_shift($recentL);
            if (count($recentD) > self::WINDOW_SIZE) array_shift($recentD);

            unset($pool[$bestIndex]);
            $pool = array_values($pool);
        }

        return $sequence;
    }

    // -------------------------------------------------------------------------
    // COLLATIONS
    // -------------------------------------------------------------------------

    private function pickSnacks(): array
    {
        $snackCount = $this->getSnackCount();
        $snacks     = [];

        if ($snackCount > 0 && !empty($this->collations)) {
            $selectedIndices = (array) array_rand(
                $this->collations,
                min($snackCount, count($this->collations))
            );
            foreach ($selectedIndices as $idx) {
                $snacks[] = $this->collations[$idx];
            }
        }

        return $snacks;
    }

    protected function getSnackCount(): int
    {
        return match ($this->activity) {
            'Sédentaire'        => rand(0, 1),
            'Légèrement actif'  => 1,
            'Modérément actif'  => rand(1, 2),
            'Très actif',
            'Extrêmement actif' => 2,
            default             => 1,
        };
    }

    // -------------------------------------------------------------------------
    // AJUSTEMENT DES PORTIONS — POINT D'ENTRÉE
    // -------------------------------------------------------------------------

    /**
     * Tente d'ajuster le menu journalier en appliquant un relâchement progressif
     * des contraintes selon la pathologie détectée.
     *
     * Ordre de relâchement par pathologie :
     *
     *  Diabète          : Lipides (70%→65%) → Protéines (85%→80%) [jamais glucides en premier]
     *  Hypertension     : Protéines (75%→70%) → Glucides (80%→75%) → Lipides en dernier recours
     *  Cardio           : Protéines (75%→70%) → Glucides (80%→75%) → Lipides en dernier recours
     *  Sans pathologie  : Protéines (70%→65%) → Lipides (70%→65%) → Glucides seulement si extrême
     */
    protected function adjustDailyMenu(array $dailyMeals, array $snacks): ?array
    {
        // relaxLevel 0 = contraintes strictes, niveaux suivants = relâchement progressif
        foreach ([0, 1, 2, 3] as $relaxLevel) {
            $result = $this->scaleAndValidate($dailyMeals, $snacks, $relaxLevel);
            if ($result !== null) {
                return $result;
            }
        }

        return null;
    }

    // -------------------------------------------------------------------------
    // MENU DE SECOURS
    // -------------------------------------------------------------------------

    private function buildFallbackMenu(array $dailyMeals, array $snacks): array
    {
        $repas = [];
        foreach ($dailyMeals as $type => $items) {
            $adjusted = [];
            foreach ($items as $item) {
                $adjusted[] = array_merge($item, [
                    'portion_recommandee' => ($item['base'] ?? 100) . ' g',
                ]);
            }
            $repas[$type] = $adjusted;
        }

        $collations = [];
        foreach ($snacks as $item) {
            $collations[] = array_merge($item, [
                'portion' => ($item['base'] ?? 100) . ' g',
            ]);
        }

        return [
            'type'       => 'Standard (Non optimisé)',
            'repas'      => $repas,
            'collations' => $collations,
            'factors'    => ['glucides' => 1.0, 'proteines' => 1.0, 'lipides' => 1.0],
        ];
    }

    // -------------------------------------------------------------------------
    // CALCUL & VALIDATION
    // -------------------------------------------------------------------------

    /**
     * Calcule les facteurs spécifiques par macronutriment (Image 1 & 3) :
     *   fG = G_cible / G_comb
     *   fP = P_cible / P_comb
     *   fL = L_cible / L_comb
     *   facteur_final = min(fG, fP, fL)
     *
     * Les collations sont soustraites des cibles AVANT le calcul du facteur
     * (elles ne participent pas au calcul du facteur d'ajustement principal).
     */
    protected function scaleAndValidate(array $meals, array $snacks, int $relaxLevel = 0): ?array
    {
        // 1. Macros fixes des collations (hors calcul du facteur)
        $snackTotals = ['g' => 0, 'p' => 0, 'l' => 0];
        foreach ($snacks as $s) {
            $snackTotals['g'] += $s['g'];
            $snackTotals['p'] += $s['p'];
            $snackTotals['l'] += $s['l'];
        }

        // 2. Cibles nettes pour les repas principaux
        $targetG = max(0, $this->userMacros['glucides']  - $snackTotals['g']);
        $targetP = max(0, $this->userMacros['proteines'] - $snackTotals['p']);
        $targetL = max(0, $this->userMacros['lipides']   - $snackTotals['l']);

        // 3. Totaux de base de la combinaison (G_comb, P_comb, L_comb)
        $baseTotals = ['g' => 0, 'p' => 0, 'l' => 0];
        foreach ($meals as $items) {
            foreach ($items as $it) {
                $baseTotals['g'] += $it['g'];
                $baseTotals['p'] += $it['p'];
                $baseTotals['l'] += $it['l'];
            }
        }

        // 4. Facteurs spécifiques par macronutriment
        $fG = $targetG / max(1, $baseTotals['g']);
        $fP = $targetP / max(1, $baseTotals['p']);
        $fL = $targetL / max(1, $baseTotals['l']);

        // 5. Validation par priorité selon la pathologie
        if (!$this->isValid($fG, $fP, $fL, $relaxLevel)) {
            return null;
        }

        // 6. facteur_final = min(fG, fP, fL), clampé entre 0.4 et 1.8
        $fFinal = max(0.4, min(1.8, min($fG, $fP, $fL)));

        // 7. Application du facteur
        $adjustedMeals = [];
        foreach ($meals as $moment => $items) {
            $momentAdjusted = [];
            foreach ($items as $item) {
                $momentAdjusted[] = [
                    'nom'                 => $item['nom'],
                    'portion_recommandee' => round($item['base'] * $fFinal) . ' g',
                    'details'             => sprintf(
                        'Macros: %.1fg P, %.1fg G, %.1fg L',
                        $item['p'] * $fFinal,
                        $item['g'] * $fFinal,
                        $item['l'] * $fFinal
                    ),
                ];
            }
            $adjustedMeals[$moment] = $momentAdjusted;
        }

        $adjustedSnacks = [];
        foreach ($snacks as $s) {
            $adjustedSnacks[] = [
                'nom'     => $s['nom'],
                'portion' => ($s['base'] ?? 100) . ' g',
                'details' => "Macros: {$s['p']}g P, {$s['g']}g G, {$s['l']}g L",
            ];
        }

        $label = $relaxLevel === 0
            ? 'Ajusté (Optimal)'
            : 'Ajusté (Relaxé Niv. ' . $relaxLevel . ')';

        return [
            'type'       => $label,
            'repas'      => $adjustedMeals,
            'collations' => $adjustedSnacks,
            'factors'    => [
                'glucides'  => $fFinal,
                'proteines' => $fFinal,
                'lipides'   => $fFinal,
            ],
        ];
    }

    // -------------------------------------------------------------------------
    // VALIDATION PAR PRIORITÉ SELON PATHOLOGIE
    // -------------------------------------------------------------------------

    /**
     * Délègue la validation au bloc correspondant à la pathologie.
     *
     * Les facteurs fG, fP, fL représentent le ratio cible/base pour chaque macro.
     * On vérifie que chaque facteur se situe dans la fenêtre de tolérance admise
     * au niveau de relâchement courant.
     *
     * relaxLevel :
     *   0 → contraintes strictes (seuils nominaux)
     *   1 → relâchement macro de priorité basse
     *   2 → relâchement macro de priorité intermédiaire
     *   3 → relâchement macro de priorité haute (dernier recours)
     */
    protected function isValid(float $fG, float $fP, float $fL, int $relaxLevel = 0): bool
    {
        // Rejet si facteurs nuls ou négatifs
        if ($fG <= 0 || $fP <= 0 || $fL <= 0) {
            return false;
        }

        $hasDiabetes    = $this->pathologies['diabetes']     ?? false;
        $isCardio       = $this->pathologies['cardio']       ?? false;
        $isHypertension = $this->pathologies['hypertension'] ?? false;

        if ($hasDiabetes) {
            return $this->isValidDiabetes($fG, $fP, $fL, $relaxLevel);
        }

        if ($isCardio) {
            return $this->isValidCardio($fG, $fP, $fL, $relaxLevel);
        }

        if ($isHypertension) {
            return $this->isValidHypertension($fG, $fP, $fL, $relaxLevel);
        }

        return $this->isValidDefault($fG, $fP, $fL, $relaxLevel);
    }

    // -------------------------------------------------------------------------
    // BLOC DIABÈTE
    // -------------------------------------------------------------------------

    /**
     * Priorités : Glucides (1er) → Protéines (2e) → Lipides (variable)
     *
     * Seuils nominaux (Image 2) :
     *   Glucides  : ≥ 90 %,  ≤ 110 % (rejet > 110 %)
     *   Protéines : ≥ 85 %,  ≤ 120 %
     *   Lipides   : ≥ 70 %,  ≤ 120 % (rejet > 120 %)
     *
     * Relâchement progressif (jamais les glucides en premier) :
     *   Niveau 1 → Lipides    : min 70 % → 65 %
     *   Niveau 2 → Protéines  : min 85 % → 80 %
     *   Niveau 3 → Glucides   : min 90 % → 85 %  (dernier recours)
     */
    private function isValidDiabetes(float $fG, float $fP, float $fL, int $relaxLevel): bool
    {
        // --- Glucides : priorité 1, hard filter ---
        $gMin = $relaxLevel >= 3 ? 0.85 : 0.90;
        $gMax = 1.10;
        $gRejet = 1.10;

        if ($fG > $gRejet || $fG < $gMin || $fG > $gMax) {
            return false;
        }

        // --- Protéines : priorité 2 ---
        $pMin = $relaxLevel >= 2 ? 0.80 : 0.85;
        $pMax = 1.20;

        if ($fP < $pMin || $fP > $pMax) {
            return false;
        }

        // --- Lipides : variable d'ajustement, relâché en premier ---
        $lMin = $relaxLevel >= 1 ? 0.65 : 0.70;
        $lMax = 1.20;
        $lRejet = 1.20;

        if ($fL > $lRejet || $fL < $lMin || $fL > $lMax) {
            return false;
        }

        return true;
    }

    // -------------------------------------------------------------------------
    // BLOC HYPERTENSION
    // -------------------------------------------------------------------------

    /**
     * Priorités : Lipides (1er) → Glucides (2e) → Protéines (variable)
     *
     * Seuils nominaux :
     *   Lipides   : ≥ 85 %,  ≤ 105 % (rejet > 110 %)   — hard filter
     *   Glucides  : ≥ 80 %,  ≤ 110 % (rejet > 115 %)
     *   Protéines : ≥ 75 %,  ≤ 120 %
     *
     * Relâchement progressif (lipides en dernier) :
     *   Niveau 1 → Protéines  : min 75 % → 70 %
     *   Niveau 2 → Glucides   : min 80 % → 75 %
     *   Niveau 3 → Lipides    : min 85 % → 80 %  (dernier recours, très léger)
     */
    private function isValidHypertension(float $fG, float $fP, float $fL, int $relaxLevel): bool
    {
        // --- Lipides : priorité absolue, hard filter ---
        $lMin   = $relaxLevel >= 3 ? 0.80 : 0.85;
        $lMax   = 1.05;
        $lRejet = 1.10;

        if ($fL > $lRejet || $fL < $lMin || $fL > $lMax) {
            return false;
        }

        // --- Glucides : priorité 2 ---
        $gMin   = $relaxLevel >= 2 ? 0.75 : 0.80;
        $gMax   = 1.10;
        $gRejet = 1.15;

        if ($fG > $gRejet || $fG < $gMin || $fG > $gMax) {
            return false;
        }

        // --- Protéines : variable d'ajustement, relâchée en premier ---
        $pMin = $relaxLevel >= 1 ? 0.70 : 0.75;
        $pMax = 1.20;

        if ($fP < $pMin || $fP > $pMax) {
            return false;
        }

        return true;
    }

    // -------------------------------------------------------------------------
    // BLOC CARDIO
    // -------------------------------------------------------------------------

    /**
     * Priorités : Lipides (1er) → Glucides (2e) → Protéines (variable)
     *
     * Seuils nominaux :
     *   Lipides   : ≥ 80 %,  ≤ 100 % (rejet > 105 %)   — hard filter
     *   Glucides  : ≥ 75 %,  ≤ 110 % (rejet > 115 %)
     *   Protéines : ≥ 70 %,  ≤ 120 %
     *
     * Relâchement progressif (lipides en dernier) :
     *   Niveau 1 → Protéines  : min 70 % → 65 %
     *   Niveau 2 → Glucides   : min 75 % → 70 %
     *   Niveau 3 → Lipides    : min 80 % → 75 %  (dernier recours, très léger)
     */
    private function isValidCardio(float $fG, float $fP, float $fL, int $relaxLevel): bool
    {
        // --- Lipides : priorité absolue, hard filter ---
        $lMin   = $relaxLevel >= 3 ? 0.75 : 0.80;
        $lMax   = 1.00;
        $lRejet = 1.05;

        if ($fL > $lRejet || $fL < $lMin || $fL > $lMax) {
            return false;
        }

        // --- Glucides : priorité 2 ---
        $gMin   = $relaxLevel >= 2 ? 0.70 : 0.75;
        $gMax   = 1.10;
        $gRejet = 1.15;

        if ($fG > $gRejet || $fG < $gMin || $fG > $gMax) {
            return false;
        }

        // --- Protéines : variable d'ajustement, relâchée en premier ---
        $pMin = $relaxLevel >= 1 ? 0.65 : 0.70;
        $pMax = 1.20;

        if ($fP < $pMin || $fP > $pMax) {
            return false;
        }

        return true;
    }

    // -------------------------------------------------------------------------
    // BLOC SANS PATHOLOGIE (obésité générale)
    // -------------------------------------------------------------------------

    /**
     * Priorités : Glucides (1er) → Protéines (2e) → Lipides (variable)
     *
     * Seuils nominaux :
     *   Glucides  : ≥ 75 %,  ≤ 115 % (rejet > 115 %)   — hard filter
     *   Protéines : ≥ 70 %,  ≤ 125 %
     *   Lipides   : ≥ 70 %,  ≤ 120 %  — jamais rejet immédiat
     *
     * Relâchement progressif (glucides en dernier) :
     *   Niveau 1 → Protéines  : min 70 % → 65 %
     *   Niveau 2 → Lipides    : min 70 % → 65 %
     *   Niveau 3 → Glucides   : min 75 % → 70 %  (besoin extrême seulement)
     */
    private function isValidDefault(float $fG, float $fP, float $fL, int $relaxLevel): bool
    {
        // --- Glucides : priorité 1, hard filter ---
        $gMin   = $relaxLevel >= 3 ? 0.70 : 0.75;
        $gMax   = 1.15;
        $gRejet = 1.15;

        if ($fG > $gRejet || $fG < $gMin) {
            return false;
        }

        // --- Protéines : priorité 2, relâchée en premier ---
        $pMin = $relaxLevel >= 1 ? 0.65 : 0.70;
        $pMax = 1.25;

        if ($fP < $pMin || $fP > $pMax) {
            return false;
        }

        // --- Lipides : variable d'ajustement flexible ---
        $lMin = $relaxLevel >= 2 ? 0.65 : 0.70;
        $lMax = 1.20;

        if ($fL < $lMin || $fL > $lMax) {
            return false;
        }

        return true;
    }
}