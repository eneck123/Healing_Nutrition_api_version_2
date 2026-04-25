<?php

namespace App\Services;

class WeightLossOver10NoPathologyNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Avoine cuite', 'base' => 200, 'p' => 6.0, 'g' => 24.0, 'l' => 4.0],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 7.0, 'g' => 10.0, 'l' => 0.5],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 1.5, 'g' => 4.5, 'l' => 1.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 31.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.5, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Brocolis à la vapeur', 'base' => 200, 'p' => 5.0, 'g' => 14.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Saumon grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Asperges', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.0],
                            ['nom' => 'Salade de chou', 'base' => 150, 'p' => 1.5, 'g' => 4.5, 'l' => 0.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 1.5],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Tomate', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Thon au naturel', 'base' => 150, 'p' => 35.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Légumes verts', 'base' => 200, 'p' => 4.0, 'g' => 8.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Tofu sauté', 'base' => 150, 'p' => 12.0, 'g' => 3.0, 'l' => 7.0],
                            ['nom' => 'Courgettes', 'base' => 200, 'p' => 2.5, 'g' => 6.5, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Smoothie aux baies', 'base' => 250, 'p' => 4.0, 'g' => 20.0, 'l' => 5.0],
                            ['nom' => 'Lait d\'amande', 'base' => 200, 'p' => 1.5, 'g' => 2.0, 'l' => 3.0],
                            ['nom' => 'Graines de lin', 'base' => 10, 'p' => 1.8, 'g' => 3.0, 'l' => 4.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Lentilles cuites', 'base' => 150, 'p' => 13.5, 'g' => 30.0, 'l' => 0.8],
                            ['nom' => 'Épinards', 'base' => 200, 'p' => 5.8, 'g' => 7.2, 'l' => 0.8],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de légumes', 'base' => 300, 'p' => 4.5, 'g' => 21.0, 'l' => 3.0],
                            ['nom' => 'Poulet poché', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 4.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Fromage blanc 0%', 'base' => 150, 'p' => 12.0, 'g' => 6.0, 'l' => 0.2],
                            ['nom' => 'Amandes', 'base' => 15, 'p' => 3.2, 'g' => 3.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson blanc vapeur', 'base' => 150, 'p' => 33.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Haricots verts', 'base' => 200, 'p' => 3.5, 'g' => 14.0, 'l' => 0.4],
                        ],
                        'Dîner' => [
                            ['nom' => 'Omelette (2 œufs)', 'base' => 100, 'p' => 12.5, 'g' => 1.0, 'l' => 10.5],
                            ['nom' => 'Champignons poêlés', 'base' => 200, 'p' => 5.0, 'g' => 10.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Amandes', 'base' => 20, 'p' => 4.0, 'g' => 4.0, 'l' => 10.0],
                    ['nom' => 'Yaourt nature sans sucre', 'base' => 125, 'p' => 4.5, 'g' => 5.0, 'l' => 1.5],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Avoine cuite', 'base' => 250, 'p' => 8.0, 'g' => 30.0, 'l' => 5.0],
                            ['nom' => 'Lait écrémé', 'base' => 250, 'p' => 8.6, 'g' => 12.6, 'l' => 0.6],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 1.5, 'g' => 5.5, 'l' => 1.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 150, 'p' => 39.0, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Riz complet', 'base' => 200, 'p' => 5.0, 'g' => 48.0, 'l' => 1.5],
                            ['nom' => 'Brocolis vapeur', 'base' => 250, 'p' => 6.0, 'g' => 18.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Saumon grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Quinoa', 'base' => 120, 'p' => 5.0, 'g' => 26.0, 'l' => 2.5],
                            ['nom' => 'Asperges', 'base' => 200, 'p' => 4.5, 'g' => 8.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 80, 'p' => 8.0, 'g' => 40.0, 'l' => 2.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.1, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson blanc', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Patates douces', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Haricots verts sautés', 'base' => 200, 'p' => 3.5, 'g' => 14.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade niçoise (thon, haricots, œufs)', 'base' => 300, 'p' => 30.0, 'g' => 12.0, 'l' => 15.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Yogourt nature 0%', 'base' => 200, 'p' => 10.0, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Noix mélangées', 'base' => 30, 'p' => 5.0, 'g' => 5.0, 'l' => 15.0],
                            ['nom' => 'Melon', 'base' => 150, 'p' => 1.5, 'g' => 12.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Dinde grillée', 'base' => 150, 'p' => 45.0, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Lentilles', 'base' => 200, 'p' => 18.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Courgettes rôties', 'base' => 250, 'p' => 3.0, 'g' => 8.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de lentilles et légumes', 'base' => 350, 'p' => 20.0, 'g' => 35.0, 'l' => 5.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Banane plantain vapeur', 'base' => 100, 'p' => 1.3, 'g' => 32.0, 'l' => 0.3],
                            ['nom' => 'Thon cuit', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 1.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Abats de poulet poêlés', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce feuilles sautées', 'base' => 250, 'p' => 5.0, 'g' => 8.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Crevettes vapeur', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Fonio cuit', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Fruit de saison', 'base' => 150, 'p' => 1.5, 'g' => 18.0, 'l' => 0.3],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Avoine cuite', 'base' => 300, 'p' => 9.0, 'g' => 30.0, 'l' => 6.0],
                            ['nom' => 'Lait écrémé', 'base' => 300, 'p' => 10.5, 'g' => 15.0, 'l' => 0.6],
                            ['nom' => 'Mangue', 'base' => 150, 'p' => 1.5, 'g' => 20.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 180, 'p' => 46.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Riz complet', 'base' => 250, 'p' => 6.0, 'g' => 56.0, 'l' => 1.8],
                            ['nom' => 'Brocolis vapeur', 'base' => 300, 'p' => 7.0, 'g' => 21.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Saumon grillé', 'base' => 150, 'p' => 33.0, 'g' => 0.0, 'l' => 15.0],
                            ['nom' => 'Quinoa', 'base' => 150, 'p' => 6.0, 'g' => 32.0, 'l' => 3.0],
                            ['nom' => 'Asperges', 'base' => 250, 'p' => 5.5, 'g' => 10.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Omelette aromatisée (3 œufs)', 'base' => 200, 'p' => 20.0, 'g' => 4.0, 'l' => 15.0],
                            ['nom' => 'Pain complet', 'base' => 100, 'p' => 10.0, 'g' => 50.0, 'l' => 2.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Dinde grillée', 'base' => 180, 'p' => 54.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Haricots blancs', 'base' => 150, 'p' => 12.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Légumes grillés', 'base' => 300, 'p' => 6.0, 'g' => 15.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Thon au naturel', 'base' => 150, 'p' => 35.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Patates douces rôties', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tofu sauté', 'base' => 200, 'p' => 16.0, 'g' => 5.0, 'l' => 10.0],
                            ['nom' => 'Pain multicéréales', 'base' => 100, 'p' => 12.0, 'g' => 45.0, 'l' => 4.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Légumineuses (pois chiches, lentilles)', 'base' => 250, 'p' => 20.0, 'g' => 45.0, 'l' => 2.0],
                            ['nom' => 'Poisson blanc', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de pois cassés', 'base' => 400, 'p' => 25.0, 'g' => 45.0, 'l' => 5.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.1],
                            ['nom' => 'Sauce poisson et légumes', 'base' => 150, 'p' => 20.0, 'g' => 5.0, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Bœuf maigre poêlé', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Légumes feuilles sautés', 'base' => 300, 'p' => 6.0, 'g' => 10.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio sauté aux crevettes', 'base' => 350, 'p' => 35.0, 'g' => 40.0, 'l' => 10.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Yogourt 0%', 'base' => 200, 'p' => 10.0, 'g' => 10.0, 'l' => 0.4],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Avoine cuite', 'base' => 400, 'p' => 12.0, 'g' => 48.0, 'l' => 8.0],
                            ['nom' => 'Lait écrémé', 'base' => 400, 'p' => 14.0, 'g' => 20.0, 'l' => 0.8],
                            ['nom' => 'Mangue', 'base' => 200, 'p' => 2.0, 'g' => 30.0, 'l' => 0.7],
                            ['nom' => 'Beurre d\'arachide', 'base' => 30, 'p' => 8.0, 'g' => 6.0, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 220, 'p' => 57.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Riz complet', 'base' => 350, 'p' => 8.5, 'g' => 80.0, 'l' => 2.5],
                            ['nom' => 'Légumes variés sautés', 'base' => 400, 'p' => 10.0, 'g' => 30.0, 'l' => 10.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Saumon grillé', 'base' => 180, 'p' => 40.0, 'g' => 0.0, 'l' => 18.0],
                            ['nom' => 'Quinoa', 'base' => 200, 'p' => 8.0, 'g' => 42.0, 'l' => 4.0],
                            ['nom' => 'Asperges rôties', 'base' => 300, 'p' => 6.5, 'g' => 12.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Omelette (4 œufs)', 'base' => 200, 'p' => 25.0, 'g' => 1.5, 'l' => 20.0],
                            ['nom' => 'Pain complet', 'base' => 150, 'p' => 15.0, 'g' => 75.0, 'l' => 3.0],
                            ['nom' => 'Avocat', 'base' => 100, 'p' => 2.0, 'g' => 8.0, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Dinde grillée', 'base' => 220, 'p' => 66.0, 'g' => 0.0, 'l' => 7.0],
                            ['nom' => 'Patates douces', 'base' => 300, 'p' => 6.0, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Épinards sautés', 'base' => 400, 'p' => 12.0, 'g' => 15.0, 'l' => 8.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade niçoise riche', 'base' => 450, 'p' => 45.0, 'g' => 25.0, 'l' => 20.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Muesli fruits/noix', 'base' => 150, 'p' => 12.0, 'g' => 85.0, 'l' => 15.0],
                            ['nom' => 'Yaourt 0%', 'base' => 200, 'p' => 10.0, 'g' => 10.0, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Steak de thon', 'base' => 200, 'p' => 46.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Lentilles mijotées', 'base' => 300, 'p' => 25.0, 'g' => 60.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet sauté au gingembre', 'base' => 400, 'p' => 55.0, 'g' => 25.0, 'l' => 10.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 250, 'p' => 2.5, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Sauce poisson (maquereau)', 'base' => 200, 'p' => 30.0, 'g' => 8.0, 'l' => 20.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 4.0, 'g' => 45.0, 'l' => 1.0],
                            ['nom' => 'Sauce arachide et cabri', 'base' => 250, 'p' => 35.0, 'g' => 15.0, 'l' => 30.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Riz rouge sauté aux crevettes', 'base' => 450, 'p' => 45.0, 'g' => 70.0, 'l' => 15.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Smoothie protéiné', 'base' => 400, 'p' => 25.0, 'g' => 45.0, 'l' => 8.0],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Avoine géant', 'base' => 500, 'p' => 15.0, 'g' => 60.0, 'l' => 10.0],
                            ['nom' => 'Lait écrémé', 'base' => 500, 'p' => 17.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Bananes (2)', 'base' => 240, 'p' => 2.5, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Beurre de noix', 'base' => 40, 'p' => 8.0, 'g' => 12.0, 'l' => 18.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 250, 'p' => 65.0, 'g' => 0.0, 'l' => 7.0],
                            ['nom' => 'Riz complet', 'base' => 450, 'p' => 11.0, 'g' => 105.0, 'l' => 3.5],
                            ['nom' => 'Légumes variés vapeur', 'base' => 500, 'p' => 12.0, 'g' => 35.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Steak de saumon', 'base' => 200, 'p' => 45.0, 'g' => 0.0, 'l' => 20.0],
                            ['nom' => 'Quinoa', 'base' => 250, 'p' => 10.0, 'g' => 53.0, 'l' => 5.0],
                            ['nom' => 'Grande salade de kale aux noix', 'base' => 200, 'p' => 8.0, 'g' => 15.0, 'l' => 20.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Omelette (5 œufs)', 'base' => 300, 'p' => 35.0, 'g' => 5.0, 'l' => 25.0],
                            ['nom' => 'Pain complet', 'base' => 200, 'p' => 20.0, 'g' => 100.0, 'l' => 4.0],
                            ['nom' => 'Avocat entier', 'base' => 150, 'p' => 3.0, 'g' => 12.0, 'l' => 22.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Dinde grillée', 'base' => 250, 'p' => 75.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Patates douces', 'base' => 400, 'p' => 8.0, 'g' => 80.0, 'l' => 0.5],
                            ['nom' => 'Haricots verts sautés', 'base' => 500, 'p' => 12.0, 'g' => 30.0, 'l' => 15.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Thon rouge grillé', 'base' => 200, 'p' => 46.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Lentilles cuites', 'base' => 300, 'p' => 25.0, 'g' => 60.0, 'l' => 2.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain perdu au lait d\'amande', 'base' => 200, 'p' => 15.0, 'g' => 60.0, 'l' => 15.0],
                            ['nom' => 'Œufs (3)', 'base' => 150, 'p' => 18.0, 'g' => 1.0, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet aux fruits de mer', 'base' => 400, 'p' => 45.0, 'g' => 85.0, 'l' => 15.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Tofu et tempeh grillés', 'base' => 300, 'p' => 45.0, 'g' => 10.0, 'l' => 25.0],
                            ['nom' => 'Quinoa et légumes rôtis', 'base' => 400, 'p' => 20.0, 'g' => 70.0, 'l' => 20.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Fufu d\'igname', 'base' => 300, 'p' => 4.0, 'g' => 75.0, 'l' => 0.5],
                            ['nom' => 'Sauce gombo au poisson et viande', 'base' => 300, 'p' => 45.0, 'g' => 15.0, 'l' => 20.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz au gras léger', 'base' => 400, 'p' => 55.0, 'g' => 80.0, 'l' => 25.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs et sauce feuilles riche', 'base' => 450, 'p' => 50.0, 'g' => 75.0, 'l' => 30.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix et fruits secs mixtes', 'base' => 100, 'p' => 15.0, 'g' => 30.0, 'l' => 45.0],
                ]
            ],
        ];
    }
}
