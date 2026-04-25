<?php

namespace App\Services;

class WeightLossOver10CardioNutritionDataService implements NutritionDataServiceInterface
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
                            ['nom' => 'Poitrine de poulet grillée', 'base' => 120, 'p' => 31.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Quinoa cuit', 'base' => 150, 'p' => 6.0, 'g' => 32.0, 'l' => 3.0],
                            ['nom' => 'Brocolis à la vapeur', 'base' => 200, 'p' => 5.0, 'g' => 14.0, 'l' => 0.0],
                            ['nom' => 'Huile d\'olive', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
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
                            ['nom' => 'Tranches de tomate', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Salade de thon', 'base' => 150, 'p' => 35.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Poisson thon cuit', 'base' => 120, 'p' => 28.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Légumes verts', 'base' => 200, 'p' => 4.0, 'g' => 8.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Tofu sauté', 'base' => 150, 'p' => 12.0, 'g' => 3.0, 'l' => 7.0],
                            ['nom' => 'Courgettes', 'base' => 200, 'p' => 2.5, 'g' => 6.5, 'l' => 0.5],
                            ['nom' => 'Salade de concombres', 'base' => 150, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Smoothie aux baies', 'base' => 250, 'p' => 4.0, 'g' => 20.0, 'l' => 5.0],
                            ['nom' => 'Lait d\'amande sans sucre', 'base' => 200, 'p' => 1.5, 'g' => 2.0, 'l' => 3.0],
                            ['nom' => 'Graines de lin', 'base' => 10, 'p' => 1.8, 'g' => 3.0, 'l' => 4.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Lentilles cuites', 'base' => 150, 'p' => 13.5, 'g' => 30.0, 'l' => 0.8],
                            ['nom' => 'Épinards frais', 'base' => 200, 'p' => 5.8, 'g' => 7.2, 'l' => 0.8],
                            ['nom' => 'Poisson colin', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Quinoa cuit', 'base' => 80, 'p' => 3.0, 'g' => 17.0, 'l' => 1.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de légumes', 'base' => 300, 'p' => 4.5, 'g' => 21.0, 'l' => 3.0],
                            ['nom' => 'Poulet poché', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Salade verte', 'base' => 150, 'p' => 1.5, 'g' => 3.0, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 40, 'p' => 4.0, 'g' => 20.0, 'l' => 1.0],
                            ['nom' => 'Fromage blanc 0%', 'base' => 150, 'p' => 12.0, 'g' => 6.0, 'l' => 0.2],
                            ['nom' => 'Amandes', 'base' => 15, 'p' => 3.2, 'g' => 3.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson blanc vapeur', 'base' => 150, 'p' => 33.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Patate douce', 'base' => 100, 'p' => 2.0, 'g' => 20.0, 'l' => 0.1],
                            ['nom' => 'Haricots verts', 'base' => 200, 'p' => 3.5, 'g' => 14.0, 'l' => 0.4],
                        ],
                        'Dîner' => [
                            ['nom' => 'Omelette (2 œufs)', 'base' => 100, 'p' => 12.5, 'g' => 1.0, 'l' => 10.5],
                            ['nom' => 'Tomates et champignons poêlés', 'base' => 200, 'p' => 5.0, 'g' => 10.0, 'l' => 0.5],
                            ['nom' => 'Salade de carottes râpées', 'base' => 100, 'p' => 1.0, 'g' => 10.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Une poignée d\'amandes', 'base' => 20, 'p' => 4.0, 'g' => 4.0, 'l' => 10.0],
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
                            ['nom' => 'Poitrine de poulet grillée', 'base' => 150, 'p' => 39.0, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Riz complet cuit', 'base' => 200, 'p' => 5.0, 'g' => 45.0, 'l' => 1.5],
                            ['nom' => 'Brocolis vapeur', 'base' => 250, 'p' => 6.0, 'g' => 18.0, 'l' => 1.0],
                            ['nom' => 'Huile d\'olive', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Saumon grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Quinoa cuit', 'base' => 120, 'p' => 5.0, 'g' => 26.0, 'l' => 2.5],
                            ['nom' => 'Asperges', 'base' => 200, 'p' => 4.5, 'g' => 8.0, 'l' => 0.5],
                            ['nom' => 'Salade de chou', 'base' => 200, 'p' => 2.0, 'g' => 6.0, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 80, 'p' => 8.0, 'g' => 40.0, 'l' => 2.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.1, 'l' => 10.0],
                            ['nom' => 'Tranches de tomate', 'base' => 150, 'p' => 1.5, 'g' => 6.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson blanc (ex. tilapia)', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Patate douce cuite', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Haricots verts sautés', 'base' => 200, 'p' => 3.5, 'g' => 14.0, 'l' => 0.5],
                            ['nom' => 'Huile d\'arachide', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade niçoise (thon, haricots verts, œufs)', 'base' => 300, 'p' => 30.0, 'g' => 12.0, 'l' => 15.0],
                            ['nom' => 'Pain complet (1 tranche)', 'base' => 30, 'p' => 3.0, 'g' => 15.0, 'l' => 0.8],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Yogourt nature 0%', 'base' => 200, 'p' => 10.0, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Noix mélangées', 'base' => 30, 'p' => 5.0, 'g' => 5.0, 'l' => 15.0],
                            ['nom' => 'Melon (OU mangue 150g)', 'base' => 150, 'p' => 1.5, 'g' => 12.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Dinde grillée', 'base' => 150, 'p' => 45.0, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Lentilles cuites', 'base' => 200, 'p' => 18.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Courgettes rôties', 'base' => 250, 'p' => 3.0, 'g' => 8.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de lentilles et légumes', 'base' => 350, 'p' => 20.0, 'g' => 35.0, 'l' => 5.0],
                            ['nom' => 'Salade verte acidulée', 'base' => 200, 'p' => 2.0, 'g' => 4.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Banane plantain vapeur', 'base' => 100, 'p' => 1.3, 'g' => 32.0, 'l' => 0.3],
                            ['nom' => 'Poisson thon cuit', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Huile d\'arachide', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.3, 'l' => 7.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Abats de poulet poêlés', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Légumes feuilles sautés', 'base' => 250, 'p' => 5.0, 'g' => 8.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Crevettes vapeur', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Fonio cuit', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Salade riche aux légumes frais', 'base' => 300, 'p' => 3.0, 'g' => 10.0, 'l' => 1.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Fruit de saison', 'base' => 150, 'p' => 1.5, 'g' => 18.0, 'l' => 0.3],
                    ['nom' => 'Poignée de graines de lin ou tournesol', 'base' => 20, 'p' => 4.0, 'g' => 4.0, 'l' => 10.0],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Avoine cuite', 'base' => 300, 'p' => 9.0, 'g' => 36.0, 'l' => 6.0],
                            ['nom' => 'Lait écrémé', 'base' => 300, 'p' => 10.5, 'g' => 15.0, 'l' => 0.6],
                            ['nom' => 'Mangue (OU papaye 150g)', 'base' => 150, 'p' => 1.5, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Amandes', 'base' => 15, 'p' => 3.0, 'g' => 3.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poitrine de poulet grillée', 'base' => 180, 'p' => 46.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Riz complet cuit', 'base' => 250, 'p' => 6.0, 'g' => 56.0, 'l' => 1.8],
                            ['nom' => 'Brocolis vapeur', 'base' => 300, 'p' => 7.0, 'g' => 21.0, 'l' => 1.0],
                            ['nom' => 'Huile d\'olive', 'base' => 15, 'p' => 0.0, 'g' => 0.0, 'l' => 15.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Saumon poêlé', 'base' => 150, 'p' => 33.0, 'g' => 0.0, 'l' => 15.0],
                            ['nom' => 'Quinoa cuit', 'base' => 150, 'p' => 6.0, 'g' => 32.0, 'l' => 3.0],
                            ['nom' => 'Asperges', 'base' => 250, 'p' => 5.5, 'g' => 10.0, 'l' => 0.5],
                            ['nom' => 'Salade de concombres', 'base' => 200, 'p' => 2.0, 'g' => 6.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Omelette aux champignons et épinards (3 œufs)', 'base' => 200, 'p' => 20.0, 'g' => 4.0, 'l' => 15.0],
                            ['nom' => 'Pain complet', 'base' => 100, 'p' => 10.0, 'g' => 50.0, 'l' => 2.0],
                            ['nom' => 'Pamplemousse', 'base' => 200, 'p' => 1.5, 'g' => 18.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Dinde grillée', 'base' => 180, 'p' => 54.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Haricots blancs cuits', 'base' => 150, 'p' => 12.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Légumes grillés (poivrons, courgettes)', 'base' => 300, 'p' => 6.0, 'g' => 15.0, 'l' => 5.0],
                            ['nom' => 'Huile d\'arachide', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Thon en conserve (au naturel)', 'base' => 150, 'p' => 35.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Patates douces rôties', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 0.5],
                            ['nom' => 'Salade verte avec carottes râpées', 'base' => 250, 'p' => 3.0, 'g' => 15.0, 'l' => 5.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tofu sauté aux légumes', 'base' => 200, 'p' => 16.0, 'g' => 5.0, 'l' => 10.0],
                            ['nom' => 'Pain multicéréales', 'base' => 100, 'p' => 12.0, 'g' => 45.0, 'l' => 4.0],
                            ['nom' => 'Orange', 'base' => 150, 'p' => 1.5, 'g' => 18.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Légumineuses mélangées (pois chiches, lentilles)', 'base' => 250, 'p' => 20.0, 'g' => 45.0, 'l' => 2.0],
                            ['nom' => 'Poisson blanc vapeur', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Salade verte variée', 'base' => 250, 'p' => 3.0, 'g' => 6.0, 'l' => 0.4],
                            ['nom' => 'Huile de tournesol', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de pois cassés', 'base' => 400, 'p' => 25.0, 'g' => 45.0, 'l' => 5.0],
                            ['nom' => 'Salade de thon légère', 'base' => 200, 'p' => 25.0, 'g' => 4.0, 'l' => 5.0],
                            ['nom' => 'Tranche de pain complet', 'base' => 40, 'p' => 4.0, 'g' => 20.0, 'l' => 1.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa (portion modérée)', 'base' => 100, 'p' => 2.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce poisson et légumes', 'base' => 150, 'p' => 20.0, 'g' => 5.0, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 80, 'p' => 1.2, 'g' => 5.0, 'l' => 12.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Viande de bœuf maigre poêlée', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce graine légère', 'base' => 80, 'p' => 1.5, 'g' => 2.0, 'l' => 8.0],
                            ['nom' => 'Légumes feuilles sautés', 'base' => 300, 'p' => 6.0, 'g' => 10.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio sauté aux crevettes et légumes', 'base' => 350, 'p' => 35.0, 'g' => 40.0, 'l' => 10.0],
                            ['nom' => 'Fruit local frais', 'base' => 200, 'p' => 1.5, 'g' => 30.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Yogourt nature 0%', 'base' => 200, 'p' => 10.0, 'g' => 10.0, 'l' => 0.4],
                    ['nom' => 'Poignée de noix ou graines', 'base' => 30, 'p' => 6.0, 'g' => 5.0, 'l' => 15.0],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Avoine cuite', 'base' => 400, 'p' => 12.0, 'g' => 48.0, 'l' => 8.0],
                            ['nom' => 'Lait écrémé', 'base' => 400, 'p' => 14.0, 'g' => 20.0, 'l' => 0.8],
                            ['nom' => 'Mangue', 'base' => 200, 'p' => 2.0, 'g' => 30.0, 'l' => 0.7],
                            ['nom' => 'Beurre d\'arachide (sans sucre)', 'base' => 30, 'p' => 8.0, 'g' => 6.0, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poitrine de poulet grillée', 'base' => 220, 'p' => 57.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Riz complet cuit', 'base' => 350, 'p' => 8.5, 'g' => 80.0, 'l' => 2.5],
                            ['nom' => 'Légumes variés sautés', 'base' => 400, 'p' => 10.0, 'g' => 30.0, 'l' => 10.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Saumon grillé', 'base' => 180, 'p' => 40.0, 'g' => 0.0, 'l' => 18.0],
                            ['nom' => 'Quinoa cuit', 'base' => 200, 'p' => 8.0, 'g' => 42.0, 'l' => 4.0],
                            ['nom' => 'Asperges rôties', 'base' => 300, 'p' => 6.5, 'g' => 12.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Omelette (4 œufs)', 'base' => 200, 'p' => 25.0, 'g' => 1.5, 'l' => 20.0],
                            ['nom' => 'Pain complet', 'base' => 150, 'p' => 15.0, 'g' => 75.0, 'l' => 3.0],
                            ['nom' => 'Avocat', 'base' => 100, 'p' => 2.0, 'g' => 8.0, 'l' => 15.0],
                            ['nom' => 'Orange', 'base' => 150, 'p' => 1.5, 'g' => 18.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Dinde grillée', 'base' => 220, 'p' => 66.0, 'g' => 0.0, 'l' => 7.0],
                            ['nom' => 'Patates douces rôties', 'base' => 300, 'p' => 6.0, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Épinards sautés', 'base' => 400, 'p' => 12.0, 'g' => 15.0, 'l' => 8.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade niçoise riche', 'base' => 450, 'p' => 45.0, 'g' => 25.0, 'l' => 20.0],
                            ['nom' => 'Pain complet', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 1.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Muesli aux fruits et noix', 'base' => 150, 'p' => 12.0, 'g' => 85.0, 'l' => 15.0],
                            ['nom' => 'Lait d\'amande', 'base' => 250, 'p' => 2.5, 'g' => 3.0, 'l' => 6.0],
                            ['nom' => 'Yaourt nature sans gras', 'base' => 200, 'p' => 10.0, 'g' => 10.0, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Steak de thon grillé', 'base' => 200, 'p' => 46.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Lentilles mijotées aux légumes', 'base' => 300, 'p' => 25.0, 'g' => 60.0, 'l' => 2.0],
                            ['nom' => 'Salade de crudités', 'base' => 300, 'p' => 4.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'Huile de cameline', 'base' => 15, 'p' => 0.0, 'g' => 0.0, 'l' => 15.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet sauté au gingembre et légumes', 'base' => 400, 'p' => 55.0, 'g' => 25.0, 'l' => 10.0],
                            ['nom' => 'Riz complet', 'base' => 200, 'p' => 5.0, 'g' => 45.0, 'l' => 1.5],
                            ['nom' => 'Fruit de saison', 'base' => 200, 'p' => 2.0, 'g' => 30.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Igname pilée (portion généreuse)', 'base' => 250, 'p' => 2.5, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Sauce poisson gras (maquereau)', 'base' => 200, 'p' => 30.0, 'g' => 8.0, 'l' => 20.0],
                            ['nom' => 'Banane petite', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 4.0, 'g' => 45.0, 'l' => 1.0],
                            ['nom' => 'Sauce arachide et viande de chèvre', 'base' => 250, 'p' => 35.0, 'g' => 15.0, 'l' => 30.0],
                            ['nom' => 'Gombo vapeur', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.3],
                            ['nom' => 'Légumes feuilles', 'base' => 200, 'p' => 4.0, 'g' => 8.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Riz rouge sauté aux crevettes et légumes', 'base' => 450, 'p' => 45.0, 'g' => 70.0, 'l' => 15.0],
                            ['nom' => 'Salade de papaye verte', 'base' => 200, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Smoothie protéiné aux fruits', 'base' => 400, 'p' => 25.0, 'g' => 45.0, 'l' => 8.0],
                    ['nom' => 'Poignée d\'olives ou de graines', 'base' => 50, 'p' => 4.0, 'g' => 2.0, 'l' => 15.0],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge d\'avoine géant', 'base' => 500, 'p' => 15.0, 'g' => 60.0, 'l' => 10.0],
                            ['nom' => 'Lait écrémé', 'base' => 500, 'p' => 17.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Bananes (2)', 'base' => 240, 'p' => 2.5, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Beurre de noix de cajou', 'base' => 40, 'p' => 8.0, 'g' => 12.0, 'l' => 18.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poitrine de poulet grillée', 'base' => 250, 'p' => 65.0, 'g' => 0.0, 'l' => 7.0],
                            ['nom' => 'Riz complet cuit', 'base' => 450, 'p' => 11.0, 'g' => 105.0, 'l' => 3.5],
                            ['nom' => 'Légumes variés vapeur', 'base' => 500, 'p' => 12.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Huile d\'olive', 'base' => 25, 'p' => 0.0, 'g' => 0.0, 'l' => 25.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Steak de saumon', 'base' => 200, 'p' => 45.0, 'g' => 0.0, 'l' => 20.0],
                            ['nom' => 'Quinoa cuit', 'base' => 250, 'p' => 10.0, 'g' => 53.0, 'l' => 5.0],
                            ['nom' => 'Asperges ou brocolis', 'base' => 400, 'p' => 10.0, 'g' => 20.0, 'l' => 1.0],
                            ['nom' => 'Salade de kale aux noix', 'base' => 200, 'p' => 8.0, 'g' => 15.0, 'l' => 20.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Omelette (5 œufs) avec légumes', 'base' => 300, 'p' => 35.0, 'g' => 5.0, 'l' => 25.0],
                            ['nom' => 'Pain complet', 'base' => 200, 'p' => 20.0, 'g' => 100.0, 'l' => 4.0],
                            ['nom' => 'Avocat entier', 'base' => 150, 'p' => 3.0, 'g' => 12.0, 'l' => 22.0],
                            ['nom' => 'Pamplemousse', 'base' => 200, 'p' => 1.5, 'g' => 18.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Dinde grillée', 'base' => 250, 'p' => 75.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Patates douces au four', 'base' => 400, 'p' => 8.0, 'g' => 80.0, 'l' => 0.5],
                            ['nom' => 'Haricots verts sautés', 'base' => 500, 'p' => 12.0, 'g' => 30.0, 'l' => 15.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Thon rouge grillé', 'base' => 200, 'p' => 46.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Lentilles cuites', 'base' => 300, 'p' => 25.0, 'g' => 60.0, 'l' => 2.0],
                            ['nom' => 'Grande salade composée salée/sucrée (fruits, noix)', 'base' => 400, 'p' => 15.0, 'g' => 35.0, 'l' => 25.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain perdu au lait d\'amande', 'base' => 200, 'p' => 15.0, 'g' => 60.0, 'l' => 15.0],
                            ['nom' => 'Œufs (3)', 'base' => 150, 'p' => 18.0, 'g' => 1.0, 'l' => 15.0],
                            ['nom' => 'Fromage de chèvre', 'base' => 50, 'p' => 10.0, 'g' => 1.0, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet aux fruits de mer', 'base' => 400, 'p' => 45.0, 'g' => 85.0, 'l' => 15.0],
                            ['nom' => 'Légumes croquants', 'base' => 300, 'p' => 5.0, 'g' => 15.0, 'l' => 5.0],
                            ['nom' => 'Huile de noix', 'base' => 20, 'p' => 0.0, 'g' => 0.0, 'l' => 20.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Tofu et tempeh grillés', 'base' => 300, 'p' => 45.0, 'g' => 10.0, 'l' => 25.0],
                            ['nom' => 'Quinoa et légumes rôtis', 'base' => 400, 'p' => 20.0, 'g' => 70.0, 'l' => 20.0],
                            ['nom' => 'Dessert aux chia et fruits', 'base' => 200, 'p' => 8.0, 'g' => 25.0, 'l' => 12.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Fufu d\'igname (grosse portion)', 'base' => 300, 'p' => 4.0, 'g' => 75.0, 'l' => 0.5],
                            ['nom' => 'Sauce gombo au poisson et viande', 'base' => 300, 'p' => 45.0, 'g' => 15.0, 'l' => 20.0],
                            ['nom' => 'Avocat entier', 'base' => 150, 'p' => 3.0, 'g' => 12.0, 'l' => 22.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz au gras léger (viande blanche)', 'base' => 400, 'p' => 55.0, 'g' => 80.0, 'l' => 25.0],
                            ['nom' => 'Haricots blancs', 'base' => 150, 'p' => 12.0, 'g' => 30.0, 'l' => 1.5],
                            ['nom' => 'Salade de tomates et oignons', 'base' => 200, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs et sauce feuilles riche', 'base' => 450, 'p' => 50.0, 'g' => 75.0, 'l' => 30.0],
                            ['nom' => 'Poisson grillé entier', 'base' => 200, 'p' => 45.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Salade de fruits locaux', 'base' => 300, 'p' => 3.0, 'g' => 45.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix et fruits secs mixtes', 'base' => 100, 'p' => 15.0, 'g' => 30.0, 'l' => 45.0],
                    ['nom' => 'Boisson de récupération protéinée', 'base' => 500, 'p' => 30.0, 'g' => 40.0, 'l' => 5.0],
                ]
            ],
        ];
    }
}
