<?php

namespace App\Services;

class WeightLossUnder5CardioNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs non sucrée', 'base' => 200, 'p' => 6.8, 'g' => 42.0, 'l' => 3.6, 'video' => 'bouillie de maïs / akassa'],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.3, 'g' => 0.35, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.25, 'l' => 7.5],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 10.8, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 22.8, 'g' => 0.0, 'l' => 9.6, 'video' => 'poisson grillé + salade'],
                            ['nom' => 'Sauce tomate aux légumes (gombo, tomate, oignon)', 'base' => 100, 'p' => 2.0, 'g' => 4.5, 'l' => 0.5],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.25, 'g' => 41.25, 'l' => 0.3],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.4, 'g' => 2.9, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de poisson', 'base' => 150, 'p' => 15.0, 'g' => 3.0, 'l' => 6.0],
                            ['nom' => 'Patate douce bouillie', 'base' => 100, 'p' => 1.6, 'g' => 20.1, 'l' => 0.1],
                            ['nom' => 'Concombre + tomate', 'base' => 100, 'p' => 1.6, 'g' => 7.5, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Haricots rouges en sauce légère', 'base' => 150, 'p' => 13.05, 'g' => 34.2, 'l' => 0.75],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 4.0, 'g' => 23.0, 'l' => 1.75],
                            ['nom' => 'Thé vert sans sucre', 'base' => 0, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet sans peau grillé', 'base' => 120, 'p' => 37.2, 'g' => 0.0, 'l' => 4.32],
                            ['nom' => 'Riz complet', 'base' => 100, 'p' => 2.6, 'g' => 28.2, 'l' => 1.0],
                            ['nom' => 'Sauce d\'arachide légère', 'base' => 30, 'p' => 5.4, 'g' => 4.5, 'l' => 15.0],
                            ['nom' => 'Légumes vapeur (carotte, chou)', 'base' => 100, 'p' => 1.2, 'g' => 6.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Œufs brouillés aux légumes', 'base' => 120, 'p' => 15.6, 'g' => 4.5, 'l' => 12.0],
                            ['nom' => 'Plantain mûr grillé', 'base' => 80, 'p' => 1.04, 'g' => 25.5, 'l' => 0.32],
                            ['nom' => 'Tisane de citronnelle', 'base' => 0, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Yaourt nature', 'base' => 150, 'p' => 5.25, 'g' => 7.05, 'l' => 4.95],
                            ['nom' => 'Banane', 'base' => 60, 'p' => 0.66, 'g' => 13.68, 'l' => 0.18],
                            ['nom' => 'Amandes effilées', 'base' => 10, 'p' => 2.1, 'g' => 0.4, 'l' => 4.9],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Ragoût de bœuf maigre', 'base' => 100, 'p' => 26.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Pâte de maïs (akpan)', 'base' => 120, 'p' => 4.08, 'g' => 25.2, 'l' => 2.16, 'video' => 'akpan'],
                            ['nom' => 'Sauce claire aux légumes verts', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Omelette aux champignons et poivrons', 'base' => 120, 'p' => 15.12, 'g' => 0.84, 'l' => 12.0],
                            ['nom' => 'Igname pilée', 'base' => 100, 'p' => 1.5, 'g' => 27.5, 'l' => 0.2],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1.0, 'g' => 2.5, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 150, 'p' => 5.1, 'g' => 31.5, 'l' => 2.7],
                            ['nom' => 'Lait écrémé', 'base' => 100, 'p' => 3.4, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Noix de cajou', 'base' => 15, 'p' => 2.7, 'g' => 4.5, 'l' => 6.6],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 10.8, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Couscous de manioc (tapioca)', 'base' => 120, 'p' => 0.24, 'g' => 33.6, 'l' => 0.0],
                            ['nom' => 'Sauce tomate légère', 'base' => 50, 'p' => 0.25, 'g' => 1.5, 'l' => 0.1],
                            ['nom' => 'Salade', 'base' => 50, 'p' => 0.5, 'g' => 1.25, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet grillé', 'base' => 100, 'p' => 31.0, 'g' => 0.0, 'l' => 3.6],
                            ['nom' => 'Haricots blancs', 'base' => 80, 'p' => 5.6, 'g' => 17.6, 'l' => 0.4],
                            ['nom' => 'Légumes sautés à l\'huile d\'olive', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 5.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue', 'base' => 100, 'p' => 0.8, 'g' => 14.9, 'l' => 0.4],
                    ['nom' => 'Ananas frais', 'base' => 100, 'p' => 0.5, 'g' => 13.0, 'l' => 0.1],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 250, 'p' => 8.5, 'g' => 52.5, 'l' => 4.5],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 12.6, 'g' => 0.7, 'l' => 20.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.25, 'l' => 7.5],
                            ['nom' => 'Orange', 'base' => 100, 'p' => 0.9, 'g' => 11.8, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson braisé', 'base' => 130, 'p' => 24.7, 'g' => 0.0, 'l' => 10.4],
                            ['nom' => 'Riz complet', 'base' => 120, 'p' => 3.12, 'g' => 33.84, 'l' => 1.2],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Carotte râpée', 'base' => 50, 'p' => 0.3, 'g' => 3.8, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de poisson', 'base' => 120, 'p' => 22.8, 'g' => 2.4, 'l' => 6.0],
                            ['nom' => 'Pâte de maïs', 'base' => 140, 'p' => 4.76, 'g' => 29.4, 'l' => 2.52],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 70, 'p' => 5.6, 'g' => 32.2, 'l' => 2.45],
                            ['nom' => 'Sardines à la tomate', 'base' => 80, 'p' => 20.0, 'g' => 0.0, 'l' => 8.8],
                            ['nom' => 'Tomate', 'base' => 50, 'p' => 0.45, 'g' => 1.95, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 130, 'p' => 40.3, 'g' => 0.0, 'l' => 4.68],
                            ['nom' => 'Igname bouillie', 'base' => 180, 'p' => 2.7, 'g' => 49.5, 'l' => 0.36],
                            ['nom' => 'Sauce tomate légère', 'base' => 50, 'p' => 0.25, 'g' => 1.5, 'l' => 0.1],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 0.7, 'g' => 1.45, 'l' => 0.15],
                        ],
                        'Dîner' => [
                            ['nom' => 'Œufs pochés (2)', 'base' => 100, 'p' => 12.6, 'g' => 0.7, 'l' => 10.0],
                            ['nom' => 'Patate douce', 'base' => 120, 'p' => 1.92, 'g' => 24.12, 'l' => 0.12],
                            ['nom' => 'Salade d\'avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.25, 'l' => 7.65],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 6.8, 'g' => 42.0, 'l' => 3.6],
                            ['nom' => 'Lait', 'base' => 100, 'p' => 3.4, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Amandes', 'base' => 15, 'p' => 3.15, 'g' => 0.6, 'l' => 7.35],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 10.8, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Bœuf maigre grillé', 'base' => 120, 'p' => 31.2, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Riz de maïs', 'base' => 130, 'p' => 4.42, 'g' => 27.3, 'l' => 2.34],
                            ['nom' => 'Sauce arachide légère', 'base' => 50, 'p' => 1.0, 'g' => 2.5, 'l' => 4.0],
                            ['nom' => 'Chou sauté', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet sans peau', 'base' => 110, 'p' => 34.1, 'g' => 0.0, 'l' => 3.96],
                            ['nom' => 'Igname pilée', 'base' => 120, 'p' => 1.8, 'g' => 33.0, 'l' => 0.24],
                            ['nom' => 'Sauce claire', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 6.8, 'g' => 42.0, 'l' => 3.6],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'Huile de palme rouge', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 26.4, 'g' => 0.0, 'l' => 4.8],
                            ['nom' => 'Couscous de manioc', 'base' => 140, 'p' => 0.28, 'g' => 39.2, 'l' => 0.0],
                            ['nom' => 'Sauce tomate', 'base' => 50, 'p' => 0.25, 'g' => 1.5, 'l' => 0.1],
                            ['nom' => 'Salade', 'base' => 50, 'p' => 0.5, 'g' => 1.25, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Omelette', 'base' => 100, 'p' => 12.6, 'g' => 0.7, 'l' => 10.0],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1.0, 'g' => 2.5, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue', 'base' => 120, 'p' => 0.96, 'g' => 17.88, 'l' => 0.48],
                    ['nom' => 'Noix de cajou', 'base' => 20, 'p' => 3.6, 'g' => 6.0, 'l' => 8.8],
                    ['nom' => 'Ananas', 'base' => 100, 'p' => 0.5, 'g' => 13.0, 'l' => 0.1],
                    ['nom' => 'Graines de tournesol', 'base' => 15, 'p' => 3.15, 'g' => 3.0, 'l' => 7.65],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 280, 'p' => 9.52, 'g' => 58.8, 'l' => 5.04],
                            ['nom' => 'Œufs (2)', 'base' => 100, 'p' => 12.6, 'g' => 0.7, 'l' => 20.0],
                            ['nom' => 'Avocat (1/3)', 'base' => 80, 'p' => 1.6, 'g' => 6.8, 'l' => 12.0],
                            ['nom' => 'Banane', 'base' => 120, 'p' => 1.32, 'g' => 27.36, 'l' => 0.36],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 22.8, 'g' => 0.0, 'l' => 9.6],
                            ['nom' => 'Riz blanc/complet mélangé', 'base' => 150, 'p' => 3.8, 'g' => 42.3, 'l' => 0.75],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Salade', 'base' => 50, 'p' => 0.7, 'g' => 1.45, 'l' => 0.15],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de poisson', 'base' => 110, 'p' => 20.9, 'g' => 2.2, 'l' => 5.5],
                            ['nom' => 'Pâte de maïs', 'base' => 160, 'p' => 5.44, 'g' => 33.6, 'l' => 2.88],
                            ['nom' => 'Sauce claire', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 80, 'p' => 6.4, 'g' => 36.8, 'l' => 2.8],
                            ['nom' => 'Omelette (2 œufs)', 'base' => 100, 'p' => 12.6, 'g' => 0.7, 'l' => 10.0],
                            ['nom' => 'Tomate', 'base' => 80, 'p' => 0.72, 'g' => 3.12, 'l' => 0.16],
                            ['nom' => 'Thé au lait écrémé', 'base' => 0, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 37.2, 'g' => 0.0, 'l' => 4.32],
                            ['nom' => 'Igname bouillie', 'base' => 200, 'p' => 3.0, 'g' => 55.0, 'l' => 0.4],
                            ['nom' => 'Sauce arachide (2 c. à soupe)', 'base' => 30, 'p' => 5.4, 'g' => 4.5, 'l' => 15.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Œufs brouillés (2)', 'base' => 100, 'p' => 12.6, 'g' => 0.7, 'l' => 10.0],
                            ['nom' => 'Patate douce', 'base' => 140, 'p' => 2.24, 'g' => 28.14, 'l' => 0.14],
                            ['nom' => 'Avocat (1/3)', 'base' => 80, 'p' => 1.6, 'g' => 6.8, 'l' => 12.0],
                            ['nom' => 'Salade', 'base' => 50, 'p' => 0.7, 'g' => 1.45, 'l' => 0.15],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 250, 'p' => 8.5, 'g' => 52.5, 'l' => 4.5],
                            ['nom' => 'Lait écrémé', 'base' => 120, 'p' => 4.1, 'g' => 6.0, 'l' => 0.1],
                            ['nom' => 'Noix (amandes)', 'base' => 20, 'p' => 4.2, 'g' => 0.8, 'l' => 9.8],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 10.8, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Bœuf maigre', 'base' => 110, 'p' => 28.6, 'g' => 0.0, 'l' => 5.5],
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.9, 'g' => 42.3, 'l' => 1.5],
                            ['nom' => 'Sauce tomate', 'base' => 50, 'p' => 0.25, 'g' => 1.5, 'l' => 0.1],
                            ['nom' => 'Salade de chou', 'base' => 80, 'p' => 1.12, 'g' => 2.32, 'l' => 0.24],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet grillé', 'base' => 100, 'p' => 31.0, 'g' => 0.0, 'l' => 3.6],
                            ['nom' => 'Igname pilée', 'base' => 140, 'p' => 2.1, 'g' => 38.5, 'l' => 0.28],
                            ['nom' => 'Sauce claire', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 250, 'p' => 8.5, 'g' => 52.5, 'l' => 4.5],
                            ['nom' => 'Haricots', 'base' => 120, 'p' => 10.44, 'g' => 27.36, 'l' => 0.6],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson fumé', 'base' => 110, 'p' => 24.2, 'g' => 0.0, 'l' => 4.4],
                            ['nom' => 'Couscous manioc', 'base' => 160, 'p' => 0.32, 'g' => 44.8, 'l' => 0.0],
                            ['nom' => 'Sauce légumes', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Carotte', 'base' => 80, 'p' => 0.48, 'g' => 6.08, 'l' => 0.16],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 19.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Haricots blancs', 'base' => 100, 'p' => 7.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'Plantain', 'base' => 80, 'p' => 1.04, 'g' => 25.52, 'l' => 0.32],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue', 'base' => 150, 'p' => 1.20, 'g' => 22.35, 'l' => 0.6],
                    ['nom' => 'Arachides', 'base' => 25, 'p' => 6.25, 'g' => 4.0, 'l' => 12.25],
                    ['nom' => 'Orange + Ananas (mix)', 'base' => 150, 'p' => 1.0, 'g' => 9.9, 'l' => 13.0],
                    ['nom' => 'Amandes', 'base' => 20, 'p' => 4.2, 'g' => 0.8, 'l' => 9.8],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 300, 'p' => 6.0, 'g' => 54.0, 'l' => 3.0],
                            ['nom' => 'Œufs (2)', 'base' => 120, 'p' => 15.0, 'g' => 2.0, 'l' => 20.0],
                            ['nom' => 'Avocat (1/4)', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                            ['nom' => 'Banane', 'base' => 120, 'p' => 1.3, 'g' => 27.0, 'l' => 0.4],
                            ['nom' => 'Noix', 'base' => 15, 'p' => 2.3, 'g' => 2.0, 'l' => 9.8],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Riz complet cuit', 'base' => 180, 'p' => 4.8, 'g' => 41.0, 'l' => 1.8],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 3.0],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.5],
                            ['nom' => 'Salade', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de poisson', 'base' => 110, 'p' => 23.0, 'g' => 2.0, 'l' => 5.0],
                            ['nom' => 'Pâte de maïs', 'base' => 180, 'p' => 4.0, 'g' => 45.0, 'l' => 1.0],
                            ['nom' => 'Sauce légumes', 'base' => 120, 'p' => 2.0, 'g' => 6.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 100, 'p' => 9.0, 'g' => 45.0, 'l' => 2.5],
                            ['nom' => 'Sardines', 'base' => 80, 'p' => 20.0, 'g' => 0.0, 'l' => 9.0],
                            ['nom' => 'Tomate', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.2, 'g' => 15.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Igname bouillie', 'base' => 220, 'p' => 3.0, 'g' => 60.0, 'l' => 0.6],
                            ['nom' => 'Sauce arachide légère', 'base' => 60, 'p' => 5.0, 'g' => 6.0, 'l' => 8.0],
                            ['nom' => 'Chou sauté', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Œufs', 'base' => 2, 'p' => 15.0, 'g' => 2.0, 'l' => 20.0],
                            ['nom' => 'Patate douce', 'base' => 160, 'p' => 2.5, 'g' => 33.0, 'l' => 0.4],
                            ['nom' => 'Avocat (1/3)', 'base' => 70, 'p' => 1.4, 'g' => 6.0, 'l' => 10.5],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 280, 'p' => 7.0, 'g' => 63.0, 'l' => 3.6],
                            ['nom' => 'Lait demi-écrémé', 'base' => 150, 'p' => 5.0, 'g' => 7.5, 'l' => 2.3],
                            ['nom' => 'Amandes', 'base' => 20, 'p' => 4.2, 'g' => 4.4, 'l' => 10.6],
                            ['nom' => 'Fruits frais', 'base' => 120, 'p' => 1.0, 'g' => 14.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Bœuf maigre', 'base' => 110, 'p' => 26.0, 'g' => 0.0, 'l' => 7.7],
                            ['nom' => 'Riz complet cuit', 'base' => 180, 'p' => 4.9, 'g' => 41.4, 'l' => 1.6],
                            ['nom' => 'Sauce tomate + légumes + salade', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet', 'base' => 100, 'p' => 23.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Igname pilée', 'base' => 160, 'p' => 2.4, 'g' => 42.0, 'l' => 0.3],
                            ['nom' => 'Sauce + légumes verts', 'base' => 180, 'p' => 3.0, 'g' => 10.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa / bouillie de maïs', 'base' => 280, 'p' => 5.6, 'g' => 61.6, 'l' => 2.8],
                            ['nom' => 'Haricots cuits', 'base' => 140, 'p' => 12.6, 'g' => 21.0, 'l' => 0.7],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Banane', 'base' => 120, 'p' => 1.3, 'g' => 27.0, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson', 'base' => 110, 'p' => 24.0, 'g' => 0.0, 'l' => 3.3],
                            ['nom' => 'Couscous de manioc', 'base' => 180, 'p' => 2.7, 'g' => 68.4, 'l' => 0.5],
                            ['nom' => 'Sauce légumes + carotte', 'base' => 150, 'p' => 1.8, 'g' => 9.0, 'l' => 0.6],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.8],
                            ['nom' => 'Haricots cuits', 'base' => 120, 'p' => 10.8, 'g' => 18.0, 'l' => 0.6],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.2, 'g' => 31.0, 'l' => 0.4],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue + papaye', 'base' => 150, 'p' => 1.0, 'g' => 22.0, 'l' => 0.4],
                    ['nom' => 'Arachides', 'base' => 25, 'p' => 6.5, 'g' => 4.0, 'l' => 12.5],
                    ['nom' => 'Ananas frais', 'base' => 120, 'p' => 0.6, 'g' => 15.0, 'l' => 0.1],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 350, 'p' => 8.8, 'g' => 78.0, 'l' => 4.2],
                            ['nom' => 'Œufs (2)', 'base' => 120, 'p' => 15.0, 'g' => 2.0, 'l' => 20.0],
                            ['nom' => 'Avocat (1/4)', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                            ['nom' => 'Banane', 'base' => 120, 'p' => 1.3, 'g' => 27.0, 'l' => 0.4],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.2, 'g' => 15.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Riz complet cuit', 'base' => 200, 'p' => 5.5, 'g' => 46.0, 'l' => 2.0],
                            ['nom' => 'Sauce gombo + légumes', 'base' => 150, 'p' => 2.0, 'g' => 7.0, 'l' => 1.5],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de poisson', 'base' => 110, 'p' => 23.0, 'g' => 2.0, 'l' => 5.0],
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 4.5, 'g' => 50.0, 'l' => 1.0],
                            ['nom' => 'Sauce légumes + salade', 'base' => 150, 'p' => 2.0, 'g' => 6.0, 'l' => 1.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 120, 'p' => 10.8, 'g' => 54.0, 'l' => 3.0],
                            ['nom' => 'Omelette (2 œufs)', 'base' => 120, 'p' => 15.0, 'g' => 2.0, 'l' => 20.0],
                            ['nom' => 'Tomate', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                            ['nom' => 'Fruits (mélange)', 'base' => 120, 'p' => 1.0, 'g' => 14.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Igname bouillie', 'base' => 250, 'p' => 3.5, 'g' => 68.0, 'l' => 1.0],
                            ['nom' => 'Sauce arachide légère', 'base' => 50, 'p' => 4.0, 'g' => 5.0, 'l' => 7.0],
                            ['nom' => 'Légumes variés', 'base' => 150, 'p' => 2.0, 'g' => 6.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Œufs (2)', 'base' => 120, 'p' => 15.0, 'g' => 2.0, 'l' => 20.0],
                            ['nom' => 'Patate douce', 'base' => 180, 'p' => 3.0, 'g' => 37.0, 'l' => 0.6],
                            ['nom' => 'Avocat (1/4)', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 320, 'p' => 8.0, 'g' => 71.0, 'l' => 3.2],
                            ['nom' => 'Lait demi-écrémé', 'base' => 150, 'p' => 5.0, 'g' => 7.5, 'l' => 2.3],
                            ['nom' => 'Noix', 'base' => 20, 'p' => 4.0, 'g' => 4.0, 'l' => 10.0],
                            ['nom' => 'Fruits variés', 'base' => 120, 'p' => 1.0, 'g' => 14.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Bœuf maigre', 'base' => 110, 'p' => 26.0, 'g' => 0.0, 'l' => 7.7],
                            ['nom' => 'Riz complet cuit', 'base' => 200, 'p' => 5.5, 'g' => 46.0, 'l' => 2.0],
                            ['nom' => 'Sauce tomate + légumes', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet (sans peau)', 'base' => 100, 'p' => 23.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Igname pilée', 'base' => 180, 'p' => 2.7, 'g' => 47.0, 'l' => 0.4],
                            ['nom' => 'Sauce + légumes verts', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa / bouillie de maïs', 'base' => 300, 'p' => 6.0, 'g' => 66.0, 'l' => 3.0],
                            ['nom' => 'Haricots cuits', 'base' => 150, 'p' => 13.5, 'g' => 22.5, 'l' => 0.8],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Banane', 'base' => 120, 'p' => 1.3, 'g' => 27.0, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson', 'base' => 110, 'p' => 24.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Couscous manioc', 'base' => 200, 'p' => 3.0, 'g' => 76.0, 'l' => 0.6],
                            ['nom' => 'Sauce légumes + carotte', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.8],
                            ['nom' => 'Haricots cuits', 'base' => 130, 'p' => 11.7, 'g' => 15.6, 'l' => 0.7],
                            ['nom' => 'Plantain bouilli', 'base' => 120, 'p' => 1.5, 'g' => 37.2, 'l' => 0.3],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue', 'base' => 150, 'p' => 1.0, 'g' => 22.0, 'l' => 0.2],
                    ['nom' => 'Arachides', 'base' => 20, 'p' => 5.2, 'g' => 3.2, 'l' => 10.0],
                    ['nom' => 'Ananas + papaye', 'base' => 150, 'p' => 1.0, 'g' => 22.0, 'l' => 0.2],
                    ['nom' => 'Graines', 'base' => 20, 'p' => 5.0, 'g' => 3.0, 'l' => 10.0],
                ]
            ],
        ];
    }
}
