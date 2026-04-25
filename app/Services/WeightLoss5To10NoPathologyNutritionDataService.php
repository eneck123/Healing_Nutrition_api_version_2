<?php

namespace App\Services;

class WeightLoss5To10NoPathologyNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie d’avoine', 'base' => 250, 'p' => 7.5, 'g' => 32.0, 'l' => 4.5],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.2, 'g' => 3.2, 'l' => 9.8],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 6.8, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 4.0, 'g' => 36.0, 'l' => 1.2],
                            ['nom' => 'Sauce tomate légumes', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.5],
                            ['nom' => 'Salade concombre', 'base' => 150, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.5, 'g' => 0.0, 'l' => 3.2],
                            ['nom' => 'Fonio cuit', 'base' => 120, 'p' => 4.0, 'g' => 30.0, 'l' => 0.6],
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 2.5, 'g' => 6.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de millet', 'base' => 250, 'p' => 6.0, 'g' => 34.5, 'l' => 2.5],
                            ['nom' => 'Œuf dur (1)', 'base' => 60, 'p' => 6.5, 'g' => 0.6, 'l' => 5.3],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 0.7, 'g' => 16.5, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.5, 'g' => 0.0, 'l' => 3.2],
                            ['nom' => 'Fonio cuit', 'base' => 120, 'p' => 4.0, 'g' => 30.0, 'l' => 0.6],
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 2.5, 'g' => 6.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 150, 'p' => 12.0, 'g' => 27.0, 'l' => 0.8],
                            ['nom' => 'Igname', 'base' => 80, 'p' => 1.2, 'g' => 20.0, 'l' => 0.2],
                            ['nom' => 'Légumes verts', 'base' => 150, 'p' => 2.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Nékô (maïs fermenté)', 'base' => 250, 'p' => 5.5, 'g' => 45.0, 'l' => 1.2],
                            ['nom' => 'Œuf dur', 'base' => 60, 'p' => 7.8, 'g' => 0.6, 'l' => 6.0],
                            ['nom' => 'Légumes verts (okra, crin-crin)', 'base' => 150, 'p' => 3.0, 'g' => 7.0, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.5, 'g' => 41.0, 'l' => 1.6],
                            ['nom' => 'Haricots rouges', 'base' => 150, 'p' => 13.5, 'g' => 30.0, 'l' => 0.8],
                            ['nom' => 'Sauce tomate légère', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Légumes verts sautés', 'base' => 150, 'p' => 2.5, 'g' => 6.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 250, 'p' => 4.8, 'g' => 42.0, 'l' => 0.9],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce feuilles gombo', 'base' => 200, 'p' => 3.0, 'g' => 7.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho', 'base' => 250, 'p' => 6.0, 'g' => 44.0, 'l' => 1.5],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 6.8, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Banane', 'base' => 100, 'p' => 1.1, 'g' => 23.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.1, 'g' => 37.5, 'l' => 0.3],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce feuilles', 'base' => 200, 'p' => 3.0, 'g' => 7.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade composée', 'base' => 150, 'p' => 2.5, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 120, 'p' => 15.6, 'g' => 1.2, 'l' => 12.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Yaourt + cajou', 'base' => 140, 'p' => 6.5, 'g' => 8.0, 'l' => 7.5],
                    ['nom' => 'Fruits + eau de coco', 'base' => 400, 'p' => 1.2, 'g' => 28.0, 'l' => 0.5],
                    ['nom' => 'Galette de mil', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 5.0],
                    ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 7.8, 'g' => 5.1, 'l' => 14.7],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa au lait', 'base' => 200, 'p' => 3.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.0, 'g' => 0.5, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 7.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Foutou d’igname', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce claire aux légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson frais', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Couscous de manioc', 'base' => 150, 'p' => 1.0, 'g' => 36.0, 'l' => 0.5],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme rouge', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 4.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de millet', 'base' => 200, 'p' => 5.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Yaourt nature', 'base' => 100, 'p' => 4.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Fruits frais (papaye)', 'base' => 100, 'p' => 1.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Riz complet', 'base' => 120, 'p' => 3.0, 'g' => 27.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate légère', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots', 'base' => 100, 'p' => 7.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Pâte de maïs', 'base' => 120, 'p' => 3.0, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Sauce légumes feuilles', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte d’igname', 'base' => 150, 'p' => 2.0, 'g' => 32.0, 'l' => 0.2],
                            ['nom' => 'Sauce tomate aux légumes', 'base' => 100, 'p' => 1.2, 'g' => 6.0, 'l' => 1.5],
                            ['nom' => 'Œuf poché', 'base' => 50, 'p' => 6.0, 'g' => 0.6, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz au gras léger', 'base' => 150, 'p' => 3.0, 'g' => 40.0, 'l' => 5.0],
                            ['nom' => 'Poulet maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Salade de légumes', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akpan (maïs fermenté)', 'base' => 150, 'p' => 3.0, 'g' => 32.0, 'l' => 0.5],
                            ['nom' => 'Sauce arachide légère', 'base' => 100, 'p' => 5.0, 'g' => 8.0, 'l' => 9.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 200, 'p' => 4.0, 'g' => 42.0, 'l' => 1.0],
                            ['nom' => 'Arachides', 'base' => 15, 'p' => 3.8, 'g' => 1.2, 'l' => 7.0],
                            ['nom' => 'Fruits frais', 'base' => 100, 'p' => 0.5, 'g' => 13.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.5, 'g' => 33.0, 'l' => 0.6],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Banane + amandes', 'base' => 115, 'p' => 5.0, 'g' => 25.0, 'l' => 7.0],
                    ['nom' => 'Bissap + biscuits de mil', 'base' => 180, 'p' => 3.0, 'g' => 25.0, 'l' => 2.0],
                    ['nom' => 'Fromage local', 'base' => 50, 'p' => 6.0, 'g' => 1.0, 'l' => 5.0],
                    ['nom' => 'Boulettes de haricots rouges', 'base' => 50, 'p' => 6.0, 'g' => 15.0, 'l' => 1.0],
                    ['nom' => 'Beignets de manioc', 'base' => 50, 'p' => 2.0, 'g' => 20.0, 'l' => 2.0],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Lait écrémé', 'base' => 150, 'p' => 5.0, 'g' => 7.0, 'l' => 0.5],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.0, 'g' => 2.0, 'l' => 10.0],
                            ['nom' => 'Miel local', 'base' => 10, 'p' => 0.0, 'g' => 8.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Viande de bœuf maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Riz au gras allégé', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 4.0],
                            ['nom' => 'Salade de crudités', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Sauce aux légumes feuilles', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de millet', 'base' => 200, 'p' => 5.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Yaourt nature', 'base' => 150, 'p' => 5.0, 'g' => 7.0, 'l' => 3.0],
                            ['nom' => 'Fruits', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Sauce légumes', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.1],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de millet', 'base' => 250, 'p' => 7.0, 'g' => 53.0, 'l' => 3.0],
                            ['nom' => 'Yaourt nature', 'base' => 125, 'p' => 5.0, 'g' => 6.0, 'l' => 3.0],
                            ['nom' => 'Fruits frais', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.0, 'g' => 40.0, 'l' => 0.5],
                            ['nom' => 'Poisson bouilli', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce gombo + légumes', 'base' => 150, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Foutou banane plantain', 'base' => 200, 'p' => 2.0, 'g' => 48.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate maigre', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 1.5, 'g' => 32.0, 'l' => 0.2],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.3],
                            ['nom' => 'Viande blanche', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce légumes feuilles', 'base' => 150, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de manioc', 'base' => 180, 'p' => 2.0, 'g' => 42.0, 'l' => 0.3],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Fruits secs locaux', 'base' => 30, 'p' => 3.0, 'g' => 20.0, 'l' => 1.0],
                    ['nom' => 'Galette de haricots', 'base' => 50, 'p' => 5.0, 'g' => 25.0, 'l' => 2.0],
                    ['nom' => 'Smoothie de fruits au lait', 'base' => 200, 'p' => 5.0, 'g' => 20.0, 'l' => 1.0],
                    ['nom' => 'Fruits secs (noix, arachides)', 'base' => 30, 'p' => 6.0, 'g' => 5.0, 'l' => 12.0],
                    ['nom' => 'Boulettes maïs/légumes', 'base' => 50, 'p' => 3.0, 'g' => 20.0, 'l' => 2.0],
                    ['nom' => 'Smoothie fruits béninois', 'base' => 150, 'p' => 2.0, 'g' => 20.0, 'l' => 1.0],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa enrichi', 'base' => 150, 'p' => 3.0, 'g' => 32.0, 'l' => 0.5],
                            ['nom' => 'Œufs', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 11.0],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 0.7, 'g' => 4.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé (tilapia)', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Igname bouillie', 'base' => 140, 'p' => 1.0, 'g' => 32.0, 'l' => 0.2],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'Tubercules variés (igname, patate)', 'base' => 140, 'p' => 1.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Sauce légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 200, 'p' => 4.0, 'g' => 42.0, 'l' => 1.0],
                            ['nom' => 'Omelette légumes', 'base' => 120, 'p' => 14.0, 'g' => 3.0, 'l' => 11.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Couscous manioc', 'base' => 160, 'p' => 3.0, 'g' => 36.0, 'l' => 0.2],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 4.0, 'g' => 160.0, 'l' => 1.0],
                            ['nom' => 'Sauce poisson', 'base' => 50, 'p' => 8.0, 'g' => 2.0, 'l' => 4.0],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 180, 'p' => 4.0, 'g' => 130.0, 'l' => 1.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce tomate + légumes', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 180, 'p' => 5.0, 'g' => 130.0, 'l' => 1.0],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce feuilles locales', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie enrichie', 'base' => 200, 'p' => 6.0, 'g' => 150.0, 'l' => 2.0],
                            ['nom' => 'Œufs', 'base' => 120, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Fruits (mangue/papaye)', 'base' => 100, 'p' => 1.0, 'g' => 15.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname bouillie', 'base' => 200, 'p' => 2.0, 'g' => 45.0, 'l' => 0.0],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 4.0, 'g' => 160.0, 'l' => 1.0],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Viande blanche', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Banane plantain + noix', 'base' => 150, 'p' => 2.0, 'g' => 36.0, 'l' => 6.0],
                    ['nom' => 'Boisson de mil + fruits', 'base' => 200, 'p' => 4.0, 'g' => 30.0, 'l' => 1.0],
                    ['nom' => 'Galette patate douce + lait', 'base' => 120, 'p' => 3.0, 'g' => 28.0, 'l' => 4.0],
                    ['nom' => 'Beignets banane plantain', 'base' => 50, 'p' => 1.0, 'g' => 25.0, 'l' => 5.0],
                    ['nom' => 'Fruits frais', 'base' => 150, 'p' => 1.0, 'g' => 25.0, 'l' => 0.0],
                    ['nom' => 'Boulettes manioc + légumes', 'base' => 80, 'p' => 2.0, 'g' => 15.0, 'l' => 1.0],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie enrichie', 'base' => 300, 'p' => 6.0, 'g' => 60.0, 'l' => 2.0],
                            ['nom' => 'Tubercules (igname, patate)', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Protéines variées (poisson, poulet)', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Glucides complexes (riz, couscous)', 'base' => 200, 'p' => 4.0, 'g' => 150.0, 'l' => 1.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 5.0, 'g' => 120.0, 'l' => 1.0],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce feuilles', 'base' => 150, 'p' => 3.0, 'g' => 8.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de maïs', 'base' => 250, 'p' => 5.0, 'g' => 55.0, 'l' => 1.0],
                            ['nom' => 'Œufs', 'base' => 120, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Banane douce', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.0, 'g' => 140.0, 'l' => 1.0],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 23.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce légumes', 'base' => 150, 'p' => 3.0, 'g' => 8.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 5.0, 'g' => 120.0, 'l' => 1.0],
                            ['nom' => 'Viande blanche', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Légumes verts', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de maïs', 'base' => 250, 'p' => 5.0, 'g' => 55.0, 'l' => 1.0],
                            ['nom' => 'Œuf dur', 'base' => 60, 'p' => 6.0, 'g' => 1.0, 'l' => 5.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.0, 'g' => 140.0, 'l' => 1.0],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 23.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce arachide', 'base' => 50, 'p' => 5.0, 'g' => 5.0, 'l' => 10.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 5.0, 'g' => 120.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate + légumes', 'base' => 150, 'p' => 2.0, 'g' => 15.0, 'l' => 2.0],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de millet', 'base' => 250, 'p' => 6.0, 'g' => 50.0, 'l' => 1.0],
                            ['nom' => 'Lait', 'base' => 150, 'p' => 5.0, 'g' => 7.0, 'l' => 3.0],
                            ['nom' => 'Fruits', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous manioc', 'base' => 180, 'p' => 4.0, 'g' => 140.0, 'l' => 1.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Sauce gombo', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 0.5],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Fruits + céréales', 'base' => 150, 'p' => 2.0, 'g' => 30.0, 'l' => 0.5],
                    ['nom' => 'Boissons naturelles', 'base' => 200, 'p' => 1.0, 'g' => 10.0, 'l' => 0.0],
                    ['nom' => 'Collation glucidique', 'base' => 50, 'p' => 1.0, 'g' => 12.0, 'l' => 0.2],
                    ['nom' => 'Fruits frais', 'base' => 150, 'p' => 1.0, 'g' => 20.0, 'l' => 0.0],
                    ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 8.0, 'g' => 6.0, 'l' => 14.0],
                    ['nom' => 'Boulettes de maïs', 'base' => 50, 'p' => 2.0, 'g' => 20.0, 'l' => 0.5],
                ]
            ],
        ];
    }
}
