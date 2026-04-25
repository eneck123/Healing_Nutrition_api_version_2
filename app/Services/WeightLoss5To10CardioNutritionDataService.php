<?php

namespace App\Services;

class WeightLoss5To10CardioNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de millet au lait écrémé', 'base' => 250, 'p' => 10.8, 'g' => 44.5, 'l' => 1.9],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 0.7, 'g' => 16.5, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Riz complet', 'base' => 120, 'p' => 3.2, 'g' => 28.8, 'l' => 1.0],
                            ['nom' => 'Épinards sautés', 'base' => 150, 'p' => 4.5, 'g' => 6.0, 'l' => 0.8],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet vapeur (sans peau)', 'base' => 120, 'p' => 31.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Fonio cuit', 'base' => 100, 'p' => 3.3, 'g' => 25.0, 'l' => 0.5],
                            ['nom' => 'Soupe de légumes claire', 'base' => 200, 'p' => 2.0, 'g' => 10.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie d’avoine', 'base' => 250, 'p' => 7.5, 'g' => 32.0, 'l' => 4.5],
                            ['nom' => 'Noix de cajou non salées', 'base' => 20, 'p' => 3.6, 'g' => 6.0, 'l' => 8.8],
                            ['nom' => 'Pomme (ou fruit local)', 'base' => 100, 'p' => 0.5, 'g' => 14.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Blancs de poulet grillés', 'base' => 120, 'p' => 28.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Lentilles cuites', 'base' => 150, 'p' => 13.5, 'g' => 30.0, 'l' => 1.2],
                            ['nom' => 'Salade de crudités', 'base' => 150, 'p' => 1.5, 'g' => 4.5, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson vapeur', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Haricots verts sautés', 'base' => 200, 'p' => 4.0, 'g' => 14.0, 'l' => 0.4],
                            ['nom' => 'Une petite pomme de terre bouillie', 'base' => 80, 'p' => 1.6, 'g' => 16.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 3.8, 'g' => 34.0, 'l' => 0.7],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Sauce feuilles sésame', 'base' => 150, 'p' => 2.0, 'g' => 11.0, 'l' => 4.8],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 4.2, 'g' => 36.0, 'l' => 1.2],
                            ['nom' => 'Haricots rouges', 'base' => 120, 'p' => 10.8, 'g' => 24.0, 'l' => 0.6],
                            ['nom' => 'Légumes verts vapeur', 'base' => 150, 'p' => 2.5, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Arachides grillées (petit sachet)', 'base' => 15, 'p' => 3.9, 'g' => 2.5, 'l' => 7.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes verts (chou, carotte)', 'base' => 200, 'p' => 2.5, 'g' => 10.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho', 'base' => 250, 'p' => 6.0, 'g' => 44.0, 'l' => 1.5],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 6.8, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Banane', 'base' => 100, 'p' => 1.1, 'g' => 23.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname bouillie', 'base' => 120, 'p' => 1.7, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce feuilles', 'base' => 150, 'p' => 2.5, 'g' => 6.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade composée (sans mayo)', 'base' => 200, 'p' => 4.0, 'g' => 10.0, 'l' => 3.5],
                            ['nom' => 'Blanc de poulet grillé', 'base' => 120, 'p' => 31.0, 'g' => 0.0, 'l' => 3.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Yaourt 0%', 'base' => 125, 'p' => 5.2, 'g' => 6.5, 'l' => 0.5],
                    ['nom' => 'Fruit frais locale', 'base' => 150, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                    ['nom' => 'Amandes nature (7)', 'base' => 10, 'p' => 2.1, 'g' => 2.2, 'l' => 5.0],
                    ['nom' => 'Bissap sans sucre', 'base' => 250, 'p' => 0.0, 'g' => 0.5, 'l' => 0.0],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 120, 'p' => 2.3, 'g' => 20.4, 'l' => 0.4],
                            ['nom' => 'Œuf poché', 'base' => 50, 'p' => 6.5, 'g' => 0.6, 'l' => 5.3],
                            ['nom' => 'Tranche de papaye', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Blancs de poulet grillés', 'base' => 120, 'p' => 31.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Patates douces bouillies', 'base' => 150, 'p' => 2.4, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Sauce claire aux légumes', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson frais vapeur', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Fonio vapeur', 'base' => 120, 'p' => 4.0, 'g' => 30.0, 'l' => 0.6],
                            ['nom' => 'Épinards à l’ail', 'base' => 150, 'p' => 3.5, 'g' => 5.0, 'l' => 1.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Flocons d’avoine au lait écrémé', 'base' => 200, 'p' => 10.5, 'g' => 28.5, 'l' => 4.5],
                            ['nom' => 'Pomme', 'base' => 100, 'p' => 0.3, 'g' => 14.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Riz complet', 'base' => 120, 'p' => 3.2, 'g' => 28.8, 'l' => 1.0],
                            ['nom' => 'Salade de tomates et oignons', 'base' => 150, 'p' => 1.5, 'g' => 6.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots blancs à la tomate', 'base' => 150, 'p' => 12.0, 'g' => 28.0, 'l' => 1.5],
                            ['nom' => 'Pâte de maïs locale', 'base' => 120, 'p' => 3.2, 'g' => 26.0, 'l' => 0.5],
                            ['nom' => 'Légumes verts sautés', 'base' => 150, 'p' => 2.5, 'g' => 6.0, 'l' => 1.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de millet', 'base' => 200, 'p' => 5.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Yaourt 0%', 'base' => 125, 'p' => 5.2, 'g' => 6.5, 'l' => 0.5],
                            ['nom' => 'Quelques noix de cajou', 'base' => 10, 'p' => 1.8, 'g' => 3.0, 'l' => 4.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz au gras léger', 'base' => 180, 'p' => 4.5, 'g' => 40.0, 'l' => 6.0],
                            ['nom' => 'Poulet vapeur', 'base' => 120, 'p' => 30.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes vapeur', 'base' => 150, 'p' => 2.5, 'g' => 6.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Akpan', 'base' => 150, 'p' => 3.0, 'g' => 32.0, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles gombo', 'base' => 150, 'p' => 2.5, 'g' => 5.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs fermenté', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Arachides grillées', 'base' => 15, 'p' => 3.9, 'g' => 2.5, 'l' => 7.3],
                            ['nom' => 'Fruit de saison', 'base' => 100, 'p' => 0.8, 'g' => 15.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio complet', 'base' => 150, 'p' => 5.0, 'g' => 38.0, 'l' => 0.8],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Haricots verts sautés', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 1.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.1, 'g' => 37.5, 'l' => 0.3],
                            ['nom' => 'Lentilles à la tomate', 'base' => 150, 'p' => 13.5, 'g' => 30.0, 'l' => 1.2],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Tranches de melon', 'base' => 200, 'p' => 1.2, 'g' => 16.0, 'l' => 0.4],
                    ['nom' => 'Galettes de son d’avoine', 'base' => 40, 'p' => 4.0, 'g' => 20.0, 'l' => 3.0],
                    ['nom' => 'Dattes (2) + Eau de coco', 'base' => 250, 'p' => 0.6, 'g' => 21.0, 'l' => 0.1],
                    ['nom' => 'Amandes non salées', 'base' => 15, 'p' => 3.2, 'g' => 3.3, 'l' => 7.5],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de millet au lait écrémé', 'base' => 250, 'p' => 10.8, 'g' => 44.5, 'l' => 1.9],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 0.7, 'g' => 16.5, 'l' => 0.2],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.0, 'g' => 0.5, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Blanc de poulet grillé', 'base' => 120, 'p' => 31.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Riz complet', 'base' => 160, 'p' => 4.3, 'g' => 38.4, 'l' => 1.3],
                            ['nom' => 'Légumes grillés', 'base' => 150, 'p' => 3.0, 'g' => 7.5, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Fonio', 'base' => 140, 'p' => 4.6, 'g' => 35.0, 'l' => 0.7],
                            ['nom' => 'Soupe de légumes riche', 'base' => 250, 'p' => 3.0, 'g' => 15.0, 'l' => 1.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge d’avoine', 'base' => 250, 'p' => 7.5, 'g' => 32.0, 'l' => 4.5],
                            ['nom' => 'Yaourt nature 0%', 'base' => 150, 'p' => 6.2, 'g' => 7.8, 'l' => 0.6],
                            ['nom' => 'Noix mélangées', 'base' => 20, 'p' => 4.0, 'g' => 6.0, 'l' => 12.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Lentilles', 'base' => 180, 'p' => 16.2, 'g' => 36.0, 'l' => 1.4],
                            ['nom' => 'Salade composée', 'base' => 200, 'p' => 2.0, 'g' => 6.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots verts sautés', 'base' => 200, 'p' => 4.0, 'g' => 14.0, 'l' => 2.0],
                            ['nom' => 'Poulet vapeur', 'base' => 120, 'p' => 30.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Patates douces bouillies', 'base' => 100, 'p' => 1.6, 'g' => 20.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 3.8, 'g' => 34.0, 'l' => 0.7],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Sauce feuilles sésame', 'base' => 150, 'p' => 2.0, 'g' => 11.0, 'l' => 4.8],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 5.0, 'g' => 41.0, 'l' => 1.5],
                            ['nom' => 'Haricots rouges', 'base' => 150, 'p' => 13.5, 'g' => 30.0, 'l' => 0.8],
                            ['nom' => 'Légumes verts vapeur', 'base' => 150, 'p' => 2.5, 'g' => 6.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes verts sautés', 'base' => 250, 'p' => 3.0, 'g' => 12.0, 'l' => 2.5],
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
                            ['nom' => 'Sauce feuilles', 'base' => 200, 'p' => 3.2, 'g' => 8.0, 'l' => 2.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade composée protéinée (sans mayo)', 'base' => 250, 'p' => 15.0, 'g' => 15.0, 'l' => 5.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 31.0, 'g' => 0.0, 'l' => 3.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Smoothie vert (sans sucre ajouté)', 'base' => 250, 'p' => 2.0, 'g' => 15.0, 'l' => 0.5],
                    ['nom' => 'Galettes de millet', 'base' => 50, 'p' => 5.0, 'g' => 30.0, 'l' => 2.0],
                    ['nom' => 'Fromage blanc 0%', 'base' => 150, 'p' => 12.0, 'g' => 6.0, 'l' => 0.5],
                    ['nom' => 'Amandes effilées non salées', 'base' => 20, 'p' => 4.2, 'g' => 4.4, 'l' => 10.0],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bol de millet au lait écrémé', 'base' => 300, 'p' => 13.0, 'g' => 53.0, 'l' => 2.2],
                            ['nom' => 'Banane douce et papaye', 'base' => 200, 'p' => 1.8, 'g' => 38.0, 'l' => 0.5],
                            ['nom' => 'Une poignée d’amandes', 'base' => 15, 'p' => 3.2, 'g' => 3.3, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé extra portion', 'base' => 150, 'p' => 32.5, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Riz complet infusé', 'base' => 200, 'p' => 5.4, 'g' => 48.0, 'l' => 1.6],
                            ['nom' => 'Poêlée de légumes forestière', 'base' => 200, 'p' => 4.0, 'g' => 12.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Blanc de dinde ou poulet grillé', 'base' => 150, 'p' => 38.0, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Fonio aux herbes', 'base' => 180, 'p' => 6.0, 'g' => 45.0, 'l' => 0.9],
                            ['nom' => 'Soupe de légumes énergisante', 'base' => 300, 'p' => 4.0, 'g' => 20.0, 'l' => 1.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa au lait de soja', 'base' => 250, 'p' => 8.5, 'g' => 42.0, 'l' => 4.0],
                            ['nom' => 'Œufs (2) pochés', 'base' => 100, 'p' => 13.0, 'g' => 1.2, 'l' => 10.6],
                            ['nom' => 'Fruits frais', 'base' => 150, 'p' => 1.2, 'g' => 25.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Patates douces au four', 'base' => 200, 'p' => 3.2, 'g' => 40.0, 'l' => 0.2],
                            ['nom' => 'Daurade grillée', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Sauté de légumes arc-en-ciel', 'base' => 200, 'p' => 4.0, 'g' => 10.0, 'l' => 2.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Lentilles mijotées', 'base' => 200, 'p' => 18.0, 'g' => 40.0, 'l' => 1.5],
                            ['nom' => 'Pain de mil complet', 'base' => 80, 'p' => 8.0, 'g' => 40.0, 'l' => 3.0],
                            ['nom' => 'Salade de crudités assaisonnée au citron', 'base' => 200, 'p' => 2.0, 'g' => 8.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Muesli local (mil, dattes, cajou)', 'base' => 100, 'p' => 12.0, 'g' => 55.0, 'l' => 15.0],
                            ['nom' => 'Lait écrémé', 'base' => 250, 'p' => 8.5, 'g' => 12.5, 'l' => 0.5],
                            ['nom' => 'Fruit frais', 'base' => 150, 'p' => 1.0, 'g' => 30.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet vapeur', 'base' => 200, 'p' => 5.4, 'g' => 48.0, 'l' => 1.6],
                            ['nom' => 'Poisson braisé', 'base' => 150, 'p' => 32.5, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Légumes verts vapeur', 'base' => 200, 'p' => 4.0, 'g' => 10.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet grillé', 'base' => 150, 'p' => 38.0, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Fonio', 'base' => 180, 'p' => 6.0, 'g' => 45.0, 'l' => 0.9],
                            ['nom' => 'Salade de tomates et oignons', 'base' => 150, 'p' => 1.8, 'g' => 7.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de millet', 'base' => 300, 'p' => 7.5, 'g' => 52.5, 'l' => 1.5],
                            ['nom' => 'Yaourt nature', 'base' => 200, 'p' => 10.0, 'g' => 12.0, 'l' => 6.0],
                            ['nom' => 'Une poignée d’arachides grillées', 'base' => 20, 'p' => 5.2, 'g' => 3.4, 'l' => 9.8],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 150, 'p' => 32.5, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Couscous de manioc', 'base' => 200, 'p' => 2.0, 'g' => 48.0, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles riche', 'base' => 200, 'p' => 4.0, 'g' => 12.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patates douces bouillies', 'base' => 200, 'p' => 3.2, 'g' => 40.0, 'l' => 0.2],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.2, 'l' => 10.6],
                            ['nom' => 'Légumes sautés au gingembre', 'base' => 200, 'p' => 3.0, 'g' => 8.0, 'l' => 3.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Sandwich pain complet (poisson/poulet)', 'base' => 120, 'p' => 15.0, 'g' => 40.0, 'l' => 10.0],
                    ['nom' => 'Banane mûre + beurre d’arachide (1 c. à café)', 'base' => 110, 'p' => 4.0, 'g' => 25.0, 'l' => 5.0],
                    ['nom' => 'Boisson énergisante naturelle (gingembre, citron, miel)', 'base' => 300, 'p' => 0.5, 'g' => 15.0, 'l' => 0.0],
                    ['nom' => 'Poignée de noix', 'base' => 25, 'p' => 5.2, 'g' => 5.5, 'l' => 12.5],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie enrichie (mil, soja, arachide)', 'base' => 350, 'p' => 18.0, 'g' => 65.0, 'l' => 12.0],
                            ['nom' => 'Tubercules variés (plantain, igname)', 'base' => 200, 'p' => 2.4, 'g' => 45.0, 'l' => 0.5],
                            ['nom' => 'Œufs au plat (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.2, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Mix de protéines (poisson, poulet grillé)', 'base' => 200, 'p' => 45.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Riz complet / Couscous de manioc', 'base' => 250, 'p' => 6.0, 'g' => 60.0, 'l' => 2.0],
                            ['nom' => 'Légumes du marché poêlés', 'base' => 250, 'p' => 4.5, 'g' => 15.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson braisé à l’ail', 'base' => 180, 'p' => 38.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Fonio impérial (aux légumes)', 'base' => 200, 'p' => 6.5, 'g' => 50.0, 'l' => 1.2],
                            ['nom' => 'Bol de fruits frais exotiques', 'base' => 250, 'p' => 2.5, 'g' => 40.0, 'l' => 0.8],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Muesli de mil au lait d’amande', 'base' => 300, 'p' => 15.0, 'g' => 60.0, 'l' => 10.0],
                            ['nom' => 'Bananes (2) et miel', 'base' => 200, 'p' => 2.0, 'g' => 50.0, 'l' => 0.5],
                            ['nom' => 'Fromage blanc 0%', 'base' => 200, 'p' => 15.0, 'g' => 8.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 250, 'p' => 6.5, 'g' => 60.0, 'l' => 2.0],
                            ['nom' => 'Poisson braisé entier', 'base' => 200, 'p' => 40.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Sauté de légumes variés', 'base' => 250, 'p' => 5.0, 'g' => 12.0, 'l' => 4.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 250, 'p' => 8.0, 'g' => 60.0, 'l' => 1.5],
                            ['nom' => 'Blancs de poulet rôtis', 'base' => 150, 'p' => 38.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade composée géante', 'base' => 300, 'p' => 4.0, 'g' => 15.0, 'l' => 1.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho enrichie', 'base' => 300, 'p' => 10.0, 'g' => 55.0, 'l' => 4.0],
                            ['nom' => 'Omelette (3 œufs) aux légumes', 'base' => 150, 'p' => 18.0, 'g' => 5.0, 'l' => 15.0],
                            ['nom' => 'Mango / Papaye', 'base' => 200, 'p' => 1.5, 'g' => 35.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé extra', 'base' => 200, 'p' => 42.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Igname et patate douce grillées', 'base' => 250, 'p' => 4.0, 'g' => 60.0, 'l' => 2.0],
                            ['nom' => 'Assortiment de légumes vapeur', 'base' => 250, 'p' => 5.0, 'g' => 12.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 250, 'p' => 6.0, 'g' => 55.0, 'l' => 1.5],
                            ['nom' => 'Sauce gombo riche (poisson, crevettes)', 'base' => 250, 'p' => 35.0, 'g' => 15.0, 'l' => 10.0],
                            ['nom' => 'Fruits frais', 'base' => 200, 'p' => 1.5, 'g' => 30.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Granola local + Lait écrémé', 'base' => 250, 'p' => 15.0, 'g' => 50.0, 'l' => 12.0],
                            ['nom' => 'Muffins de mil aux dattes', 'base' => 100, 'p' => 8.0, 'g' => 45.0, 'l' => 6.0],
                            ['nom' => 'Smoothie aux fruits tropicaux', 'base' => 250, 'p' => 3.0, 'g' => 35.0, 'l' => 1.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké complet', 'base' => 250, 'p' => 4.0, 'g' => 65.0, 'l' => 1.0],
                            ['nom' => 'Poulet braisé (sans peau)', 'base' => 200, 'p' => 45.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Crudenesse (tomate, oignon, concombre)', 'base' => 250, 'p' => 3.0, 'g' => 10.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Risotto de riz local aux champignons locaux', 'base' => 250, 'p' => 10.0, 'g' => 55.0, 'l' => 8.0],
                            ['nom' => 'Poisson grillé', 'base' => 150, 'p' => 32.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Salade de fruits frais au gingembre', 'base' => 200, 'p' => 1.5, 'g' => 30.0, 'l' => 0.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Barre de céréales maison', 'base' => 60, 'p' => 6.0, 'g' => 35.0, 'l' => 5.0],
                    ['nom' => 'Yaourt grec 0% + Miel', 'base' => 200, 'p' => 18.0, 'g' => 15.0, 'l' => 0.4],
                    ['nom' => 'Jus de fruits naturels fraîchement pressés', 'base' => 350, 'p' => 1.0, 'g' => 40.0, 'l' => 0.0],
                    ['nom' => 'Mélange de graines et baies', 'base' => 40, 'p' => 6.0, 'g' => 10.0, 'l' => 15.0],
                ]
            ],
        ];
    }
}
