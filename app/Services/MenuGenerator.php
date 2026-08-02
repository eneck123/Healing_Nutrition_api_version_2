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

    // Historique d'utilisation par créneau : index => dernier jour utilisé
    protected array $breakfastLastUsed = [];
    protected array $lunchLastUsed     = [];
    protected array $dinnerLastUsed    = [];

    // Nombre de fois où chaque repas a été utilisé (équilibre d'usage)
    protected array $breakfastUseCount = [];
    protected array $lunchUseCount     = [];
    protected array $dinnerUseCount    = [];

    // Toutes les combinaisons (bIdx, lIdx, dIdx) possibles, calculées une seule fois
    protected array $allCombos = [];

    // Combinaisons déjà servies : clé unique (basée sur les repas) => dernier jour utilisé
    protected array $usedCombinations = [];

    private const NEVER_USED = -999;

    // Fenêtre glissante d'exclusion : une combinaison servie il y a moins de
    // WINDOW_SIZE jours ne peut pas être reproposée.
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
        $this->days        = $days;
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

        // Initialiser l'historique : tout le monde "jamais utilisé"
        foreach (array_keys($this->breakfasts) as $i) {
            $this->breakfastLastUsed[$i]  = self::NEVER_USED;
            $this->breakfastUseCount[$i]  = 0;
        }
        foreach (array_keys($this->lunches) as $i) {
            $this->lunchLastUsed[$i] = self::NEVER_USED;
            $this->lunchUseCount[$i] = 0;
        }
        foreach (array_keys($this->dinners) as $i) {
            $this->dinnerLastUsed[$i] = self::NEVER_USED;
            $this->dinnerUseCount[$i] = 0;
        }

        // Construire une bonne fois pour toutes l'ensemble des combinaisons
        // (petit-déjeuner, déjeuner, dîner) possibles, sans mélanger les
        // aliments à l'intérieur d'un même repas.
        $this->allCombos = [];
        foreach (array_keys($this->breakfasts) as $bIdx) {
            foreach (array_keys($this->lunches) as $lIdx) {
                foreach (array_keys($this->dinners) as $dIdx) {
                    $this->allCombos[] = [$bIdx, $lIdx, $dIdx];
                }
            }
        }
    }

    public function generate(): array
    {
        $menuJours = [];

        $globalFactors = [
            'g' => 0,
            'p' => 0,
            'l' => 0
        ];

        $bCount = count($this->breakfasts);
        $lCount = count($this->lunches);
        $dCount = count($this->dinners);

        if ($bCount === 0 || $lCount === 0 || $dCount === 0) {
            return [
                'menu' => [],
                'average_factors' => [
                    'glucides' => 0,
                    'proteines' => 0,
                    'lipides' => 0
                ]
            ];
        }

        for ($day = 1; $day <= $this->days; $day++) {

            $snacks    = $this->pickSnacks();
            $validMenu = $this->buildDayOptimal($day, $snacks);

            if ($validMenu !== null) {
                $menuJours[] = array_merge(['jour' => $day], $validMenu);

                $globalFactors['g'] += $validMenu['factors']['glucides']  ?? 1;
                $globalFactors['p'] += $validMenu['factors']['proteines'] ?? 1;
                $globalFactors['l'] += $validMenu['factors']['lipides']   ?? 1;
            } else {
                // Dernier recours absolu : menu de secours non optimisé,
                // mais toujours composé des créneaux les moins récemment utilisés
                $bIdx = $this->pickLRU($this->breakfastLastUsed);
                $lIdx = $this->pickLRU($this->lunchLastUsed);
                $dIdx = $this->pickLRU($this->dinnerLastUsed);

                $fallbackMeals = [
                    'Petit-déjeuner' => $this->breakfasts[$bIdx],
                    'Déjeuner'       => $this->lunches[$lIdx],
                    'Dîner'          => $this->dinners[$dIdx],
                ];
                $fallback = $this->buildFallbackMenu($fallbackMeals, $snacks);

                $this->markUsed($this->breakfastLastUsed, $bIdx, $day);
                $this->markUsed($this->lunchLastUsed, $lIdx, $day);
                $this->markUsed($this->dinnerLastUsed, $dIdx, $day);
                $this->incrementUseCount($bIdx, $lIdx, $dIdx);
                $this->usedCombinations[$this->comboKey($bIdx, $lIdx, $dIdx)] = $day;

                $menuJours[] = array_merge(['jour' => $day], $fallback);

                $globalFactors['g'] += 1;
                $globalFactors['p'] += 1;
                $globalFactors['l'] += 1;
            }
        }

        return [
            'menu' => $menuJours,
            'average_factors' => [
                'glucides'  => round($globalFactors['g'] / $this->days, 3),
                'proteines' => round($globalFactors['p'] / $this->days, 3),
                'lipides'   => round($globalFactors['l'] / $this->days, 3),
            ],
        ];
    }

    // -------------------------------------------------------------------------
    // CONSTRUCTION D'UN JOUR : RECHERCHE GLOBALE + SCORING DE DIVERSITÉ
    // -------------------------------------------------------------------------

    /**
     * 1. Construit toutes les combinaisons (petit-déj, déjeuner, dîner) valides
     *    nutritionnellement (via scaleAndValidate / règles de pathologie).
     * 2. Écarte celles déjà servies dans la fenêtre glissante récente.
     * 3. Attribue un score de diversité à chacune des combinaisons restantes.
     * 4. Retient la meilleure et applique l'ajustement des portions.
     */
    private function buildDayOptimal(int $day, array $snacks): ?array
    {
        $candidates = $this->collectCandidates($day, $snacks, excludeRecentlyUsed: true);

        // Si la contrainte "pas récemment servi" élimine tout le monde,
        // on la relâche pour ne garder que la validité nutritionnelle.
        if (empty($candidates)) {
            $candidates = $this->collectCandidates($day, $snacks, excludeRecentlyUsed: false);
        }

        if (empty($candidates)) {
            return null;
        }

        usort($candidates, fn($a, $b) => $b['score'] <=> $a['score']);
        $best = $candidates[0];

        $this->markUsed($this->breakfastLastUsed, $best['bIdx'], $day);
        $this->markUsed($this->lunchLastUsed, $best['lIdx'], $day);
        $this->markUsed($this->dinnerLastUsed, $best['dIdx'], $day);
        $this->incrementUseCount($best['bIdx'], $best['lIdx'], $best['dIdx']);
        $this->usedCombinations[$best['key']] = $day;

        return $best['result'];
    }

    /**
     * Parcourt toutes les combinaisons possibles, filtre celles qui échouent
     * à la validation nutritionnelle et (optionnellement) celles récemment
     * servies, puis calcule leur score de diversité.
     */
    private function collectCandidates(int $day, array $snacks, bool $excludeRecentlyUsed): array
    {
        $candidates = [];

        foreach ($this->allCombos as [$bIdx, $lIdx, $dIdx]) {
            $key = $this->comboKey($bIdx, $lIdx, $dIdx);

            if ($excludeRecentlyUsed) {
                $lastUsedDay = $this->usedCombinations[$key] ?? self::NEVER_USED;
                if ($lastUsedDay !== self::NEVER_USED && ($day - $lastUsedDay) < self::WINDOW_SIZE) {
                    continue;
                }
            }

            $evaluation = $this->evaluateCombo($bIdx, $lIdx, $dIdx, $snacks);
            if ($evaluation === null) continue;

            $candidates[] = [
                'bIdx'   => $bIdx,
                'lIdx'   => $lIdx,
                'dIdx'   => $dIdx,
                'key'    => $key,
                'result' => $evaluation['result'],
                'score'  => $this->scoreCombo($bIdx, $lIdx, $dIdx, $day, $evaluation['relaxLevel']),
            ];
        }

        return $candidates;
    }

    /**
     * Teste une combinaison de repas fixes (aucun mélange d'aliments à
     * l'intérieur d'un repas) à travers les niveaux de relaxation nutritionnelle.
     */
    private function evaluateCombo(int $bIdx, int $lIdx, int $dIdx, array $snacks): ?array
    {
        $meals = [
            'Petit-déjeuner' => $this->breakfasts[$bIdx],
            'Déjeuner'       => $this->lunches[$lIdx],
            'Dîner'          => $this->dinners[$dIdx],
        ];

        foreach ([0, 1, 2, 3] as $relaxLevel) {
            $result = $this->scaleAndValidate($meals, $snacks, $relaxLevel);
            if ($result !== null) {
                return ['result' => $result, 'relaxLevel' => $relaxLevel];
            }
        }

        return null;
    }

    /**
     * Score de diversité d'une combinaison :
     *  - fraîcheur (LRU) de chacun des 3 créneaux : plus c'est ancien, mieux c'est
     *  - équilibre d'usage : pénalise les repas déjà beaucoup servis
     *  - niveau de relaxation nutritionnelle : pénalise légèrement le fait
     *    d'avoir dû s'éloigner de l'optimal
     *  - variété des aliments : bonus pour le nombre d'aliments distincts
     *    composant la combinaison (départage les égalités)
     */
    private function scoreCombo(int $bIdx, int $lIdx, int $dIdx, int $day, int $relaxLevel): float
    {
        $recency = $this->recencyValue($this->breakfastLastUsed[$bIdx], $day)
                 + $this->recencyValue($this->lunchLastUsed[$lIdx], $day)
                 + $this->recencyValue($this->dinnerLastUsed[$dIdx], $day);

        $usageCount = $this->breakfastUseCount[$bIdx]
                    + $this->lunchUseCount[$lIdx]
                    + $this->dinnerUseCount[$dIdx];

        $allItems = array_merge(
            $this->breakfasts[$bIdx],
            $this->lunches[$lIdx],
            $this->dinners[$dIdx]
        );
        $variety = count(array_unique(array_column($allItems, 'nom')));

        return $recency
             - ($usageCount * 15)
             - ($relaxLevel * 50)
             + ($variety * 2);
    }

    private function recencyValue(int $lastUsed, int $day): int
    {
        return $lastUsed === self::NEVER_USED ? 1000 : ($day - $lastUsed);
    }

    private function incrementUseCount(int $bIdx, int $lIdx, int $dIdx): void
    {
        $this->breakfastUseCount[$bIdx]++;
        $this->lunchUseCount[$lIdx]++;
        $this->dinnerUseCount[$dIdx]++;
    }

    /**
     * Clé unique d'une combinaison, basée sur l'identité des repas
     * (noms des aliments qui les composent) — jamais sur les portions,
     * qui varient d'un jour à l'autre selon les besoins de l'utilisateur.
     */
    private function comboKey(int $bIdx, int $lIdx, int $dIdx): string
    {
        return $this->mealKey($this->breakfasts[$bIdx]) . '||'
             . $this->mealKey($this->lunches[$lIdx]) . '||'
             . $this->mealKey($this->dinners[$dIdx]);
    }

    private function mealKey(array $items): string
    {
        $names = array_column($items, 'nom');
        sort($names);
        return implode('+', $names);
    }

    // -------------------------------------------------------------------------
    // HELPERS LRU (utilisés uniquement pour le menu de secours)
    // -------------------------------------------------------------------------

    /**
     * Retourne les indices triés du moins récemment utilisé au plus récent.
     * En cas d'égalité (ex: plusieurs "jamais utilisés"), mélange aléatoire pour varier.
     */
    private function orderByLRU(array $lastUsedMap): array
    {
        $indices = array_keys($lastUsedMap);
        shuffle($indices); // casse les égalités de façon aléatoire

        usort($indices, function ($a, $b) use ($lastUsedMap) {
            return $lastUsedMap[$a] <=> $lastUsedMap[$b];
        });

        return $indices;
    }

    private function pickLRU(array $lastUsedMap): int
    {
        return $this->orderByLRU($lastUsedMap)[0];
    }

    private function markUsed(array &$lastUsedMap, int $idx, int $day): void
    {
        $lastUsedMap[$idx] = $day;
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

        // 4. Facteurs bruts par macronutriment
        $fG = $targetG / max(1, $baseTotals['g']);
        $fP = $targetP / max(1, $baseTotals['p']);
        $fL = $targetL / max(1, $baseTotals['l']);

        if ($fG <= 0 || $fP <= 0 || $fL <= 0) {
            return null;
        }

        // 5. facteur_final = min(fG, fP, fL), clampé entre 0.4 et 1.8
        $fFinal = max(0.4, min(1.8, min($fG, $fP, $fL)));

        // 6. Ratios de délivrance réelle après application de fFinal
        $ratioG = $fFinal / $fG;
        $ratioP = $fFinal / $fP;
        $ratioL = $fFinal / $fL;

        // 7. Validation par priorité selon la pathologie, sur les RATIOS
        if (!$this->isValid($ratioG, $ratioP, $ratioL, $relaxLevel)) {
            return null;
        }

        // 8. Application du facteur
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
    // VALIDATION PAR PRIORITÉ SELON PATHOLOGIE (sur les RATIOS post-scaling)
    // -------------------------------------------------------------------------

    protected function isValid(float $ratioG, float $ratioP, float $ratioL, int $relaxLevel = 0): bool
    {

        if ($ratioG > 1.6 || $ratioP > 1.6 || $ratioL > 1.6) {
            return false;
        }

        $hasDiabetes    = $this->pathologies['diabetes']     ?? false;
        $isCardio       = $this->pathologies['cardio']       ?? false;
        $isHypertension = $this->pathologies['hypertension'] ?? false;

        if ($hasDiabetes) {
            return $this->isValidDiabetes($ratioG, $ratioP, $ratioL, $relaxLevel);
        }

        if ($isCardio) {
            return $this->isValidCardio($ratioG, $ratioP, $ratioL, $relaxLevel);
        }

        if ($isHypertension) {
            return $this->isValidHypertension($ratioG, $ratioP, $ratioL, $relaxLevel);
        }

        return $this->isValidDefault($ratioG, $ratioP, $ratioL, $relaxLevel);
    }

    // -------------------------------------------------------------------------
    // BLOC DIABÈTE
    // -------------------------------------------------------------------------

    /**
     * Priorités : Glucides (1er, critique) → Protéines (2e) → Lipides (variable)
     *
     * Planchers de délivrance nominaux (ratio post-scaling) :
     *   Glucides  : ≥ 90 % (jamais relâché avant le dernier recours)
     *   Protéines : ≥ 85 %
     *   Lipides   : ≥ 70 % (relâché en premier)
     *
     * Plafond de sécurité sur Glucides : jamais > 115 % délivré
     * (un diabétique ne doit jamais recevoir significativement plus de
     * glucides que sa cible, même si le clamp le permettrait techniquement).
     */
    private function isValidDiabetes(float $ratioG, float $ratioP, float $ratioL, int $relaxLevel): bool
    {
        // --- Glucides : priorité 1, relâché en dernier recours seulement ---
        $gFloor = $relaxLevel >= 3 ? 0.85 : 0.90;
        $gCeil  = 1.15;

        if ($ratioG < $gFloor || $ratioG > $gCeil) {
            return false;
        }

        // --- Protéines : priorité 2 ---
        $pFloor = $relaxLevel >= 2 ? 0.80 : 0.85;

        if ($ratioP < $pFloor) {
            return false;
        }

        // --- Lipides : variable d'ajustement, relâchée en premier ---
        $lFloor = $relaxLevel >= 1 ? 0.65 : 0.70;

        if ($ratioL < $lFloor) {
            return false;
        }

        return true;
    }

    // -------------------------------------------------------------------------
    // BLOC HYPERTENSION
    // -------------------------------------------------------------------------

    /**
     * Priorités : Lipides (1er, critique) → Glucides (2e) → Protéines (variable)
     *
     * Planchers de délivrance nominaux :
     *   Lipides   : ≥ 85 % (relâché en dernier recours)
     *   Glucides  : ≥ 80 %
     *   Protéines : ≥ 75 % (relâchée en premier)
     *
     * Plafond de sécurité sur Lipides : jamais > 115 % délivré.
     */
    private function isValidHypertension(float $ratioG, float $ratioP, float $ratioL, int $relaxLevel): bool
    {
        // --- Lipides : priorité absolue, relâché en dernier recours ---
        $lFloor = $relaxLevel >= 3 ? 0.80 : 0.85;
        $lCeil  = 1.15;

        if ($ratioL < $lFloor || $ratioL > $lCeil) {
            return false;
        }

        // --- Glucides : priorité 2 ---
        $gFloor = $relaxLevel >= 2 ? 0.75 : 0.80;

        if ($ratioG < $gFloor) {
            return false;
        }

        // --- Protéines : variable d'ajustement, relâchée en premier ---
        $pFloor = $relaxLevel >= 1 ? 0.70 : 0.75;

        if ($ratioP < $pFloor) {
            return false;
        }

        return true;
    }

    // -------------------------------------------------------------------------
    // BLOC CARDIO
    // -------------------------------------------------------------------------

    /**
     * Priorités : Lipides (1er, critique) → Glucides (2e) → Protéines (variable)
     *
     * Planchers de délivrance nominaux :
     *   Lipides   : ≥ 80 % (relâché en dernier recours)
     *   Glucides  : ≥ 75 %
     *   Protéines : ≥ 70 % (relâchée en premier)
     *
     * Plafond de sécurité sur Lipides : jamais > 110 % délivré.
     */
    private function isValidCardio(float $ratioG, float $ratioP, float $ratioL, int $relaxLevel): bool
    {
        // --- Lipides : priorité absolue, relâché en dernier recours ---
        $lFloor = $relaxLevel >= 3 ? 0.75 : 0.80;
        $lCeil  = 1.10;

        if ($ratioL < $lFloor || $ratioL > $lCeil) {
            return false;
        }

        // --- Glucides : priorité 2 ---
        $gFloor = $relaxLevel >= 2 ? 0.70 : 0.75;

        if ($ratioG < $gFloor) {
            return false;
        }

        // --- Protéines : variable d'ajustement, relâchée en premier ---
        $pFloor = $relaxLevel >= 1 ? 0.65 : 0.70;

        if ($ratioP < $pFloor) {
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
     * Planchers de délivrance nominaux :
     *   Glucides  : ≥ 75 % (relâché en dernier recours seulement)
     *   Protéines : ≥ 70 % (relâchée en premier)
     *   Lipides   : ≥ 70 %
     *
     * Pas de plafond strict sur Glucides ici (contrainte moins critique
     * qu'en cas de diabète) — seul le garde-fou global (1.6) s'applique.
     */
    private function isValidDefault(float $ratioG, float $ratioP, float $ratioL, int $relaxLevel): bool
    {
        // --- Glucides : priorité 1, relâché en dernier recours ---
        $gFloor = $relaxLevel >= 3 ? 0.70 : 0.75;

        if ($ratioG < $gFloor) {
            return false;
        }

        // --- Protéines : priorité 2, relâchée en premier ---
        $pFloor = $relaxLevel >= 1 ? 0.65 : 0.70;

        if ($ratioP < $pFloor) {
            return false;
        }

        // --- Lipides : variable d'ajustement flexible ---
        $lFloor = $relaxLevel >= 2 ? 0.65 : 0.70;

        if ($ratioL < $lFloor) {
            return false;
        }

        return true;
    }
}