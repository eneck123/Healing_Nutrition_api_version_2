<?php

namespace App\Services;

class WeightLoss5To10DiabetesNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Haricots rouges mijotés', 'base' => 150, 'p' => 13.5, 'g' => 27.0, 'l' => 0.8],
                            ['nom' => 'Igname bouillie', 'base' => 100, 'p' => 1.5, 'g' => 23.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme rouge', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Légumes verts gboma sautés', 'base' => 100, 'p' => 3.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Tilapia grillé', 'base' => 100, 'p' => 26.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Akassa', 'base' => 80, 'p' => 1.6, 'g' => 16.8, 'l' => 0.5],
                            ['nom' => 'Sauce arachide allégée', 'base' => 30, 'p' => 4.0, 'g' => 6.0, 'l' => 8.0],
                            ['nom' => 'Tomate + concombre', 'base' => 150, 'p' => 2.0, 'g' => 6.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Œufs (2 moyens)', 'base' => 120, 'p' => 13.0, 'g' => 1.0, 'l' => 11.0],
                            ['nom' => 'Patate douce', 'base' => 70, 'p' => 1.1, 'g' => 14.0, 'l' => 0.1],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                            ['nom' => 'Légumes feuilles', 'base' => 100, 'p' => 3.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa / pâte de maïs fermentée', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.6],
                            ['nom' => 'Haricots rouges cuits', 'base' => 150, 'p' => 13.5, 'g' => 27.0, 'l' => 0.8],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 3.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.3, 'g' => 34.5, 'l' => 0.3],
                            ['nom' => 'Sauce légumes feuilles', 'base' => 100, 'p' => 3.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Poulet sans peau', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 100, 'p' => 2.5, 'g' => 22.0, 'l' => 0.8],
                            ['nom' => 'Sauce tomate légère', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 1.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5],
                            ['nom' => 'Lait écrémé', 'base' => 100, 'p' => 3.4, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 7.8, 'g' => 4.8, 'l' => 14.7],
                            ['nom' => 'Œuf dur (1)', 'base' => 60, 'p' => 6.5, 'g' => 0.6, 'l' => 5.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Igname bouillie', 'base' => 100, 'p' => 1.5, 'g' => 27.0, 'l' => 0.2],
                            ['nom' => 'Sauce tomate + légumes', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 2.0],
                            ['nom' => 'Salade concombre', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges cuits', 'base' => 100, 'p' => 8.7, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'Riz complet cuit', 'base' => 100, 'p' => 2.7, 'g' => 23.0, 'l' => 0.9],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 1.5],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5],
                            ['nom' => 'Omelette légumes (2 œufs)', 'base' => 120, 'p' => 13.0, 'g' => 2.0, 'l' => 11.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio cuit', 'base' => 100, 'p' => 2.0, 'g' => 20.0, 'l' => 0.3],
                            ['nom' => 'Haricots', 'base' => 100, 'p' => 8.7, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 1.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix de cajou grillées + goyave', 'base' => 30, 'p' => 6.0, 'g' => 20.0, 'l' => 13.0],
                    ['nom' => 'Bouillie de mil + lait de coco', 'base' => 250, 'p' => 5.0, 'g' => 28.0, 'l' => 9.0],
                    ['nom' => 'Arachides grillées + orange', 'base' => 30, 'p' => 8.0, 'g' => 18.0, 'l' => 14.0],
                    ['nom' => 'Arachides', 'base' => 30, 'p' => 7.8, 'g' => 4.8, 'l' => 14.7],
                    ['nom' => 'Fruit + noix de cajou', 'base' => 165, 'p' => 3.9, 'g' => 22.5, 'l' => 6.9],
                    ['nom' => 'Fromage local + concombre', 'base' => 100, 'p' => 9.5, 'g' => 4.0, 'l' => 10.1],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte de maïs (ablo)', 'base' => 120, 'p' => 3.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Poisson fumé', 'base' => 80, 'p' => 18.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Légumes variés', 'base' => 150, 'p' => 3.0, 'g' => 8.0, 'l' => 0.5],
                            ['nom' => 'Huile de palme', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet cuit', 'base' => 180, 'p' => 4.5, 'g' => 41.0, 'l' => 1.5],
                            ['nom' => 'Bœuf maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Sauce légumes', 'base' => 150, 'p' => 3.0, 'g' => 7.0, 'l' => 1.0],
                            ['nom' => 'Huile d’arachide', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio cuit', 'base' => 150, 'p' => 4.0, 'g' => 34.0, 'l' => 1.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 1.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 120, 'p' => 2.0, 'g' => 28.0, 'l' => 0.5],
                            ['nom' => 'Œufs', 'base' => 120, 'p' => 14.0, 'g' => 1.0, 'l' => 12.0],
                            ['nom' => 'Avocat', 'base' => 30, 'p' => 0.6, 'g' => 2.0, 'l' => 4.5],
                            ['nom' => 'Bissap sans sucre', 'base' => 250, 'p' => 0.0, 'g' => 1.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 120, 'p' => 3.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Sauce arachide', 'base' => 180, 'p' => 10.0, 'g' => 8.0, 'l' => 18.0],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 9.0],
                            ['nom' => 'Épinards', 'base' => 150, 'p' => 4.0, 'g' => 4.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée', 'base' => 120, 'p' => 2.0, 'g' => 32.0, 'l' => 0.5],
                            ['nom' => 'Viande grillée', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Sauce claire', 'base' => 150, 'p' => 2.0, 'g' => 4.0, 'l' => 1.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.5, 'g' => 3.0, 'l' => 0.3],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 60, 'p' => 5.4, 'g' => 27.0, 'l' => 2.0],
                            ['nom' => 'Œufs brouillés', 'base' => 120, 'p' => 14.0, 'g' => 1.0, 'l' => 12.0],
                            ['nom' => 'Avocat', 'base' => 35, 'p' => 0.7, 'g' => 2.5, 'l' => 5.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet cuit', 'base' => 150, 'p' => 4.0, 'g' => 34.0, 'l' => 1.3],
                            ['nom' => 'Sauce graine allégée', 'base' => 200, 'p' => 6.0, 'g' => 8.0, 'l' => 14.0],
                            ['nom' => 'Crabe', 'base' => 100, 'p' => 19.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Légumes verts', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce', 'base' => 120, 'p' => 1.8, 'g' => 24.0, 'l' => 0.3],
                            ['nom' => 'Haricots cuits', 'base' => 100, 'p' => 8.5, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.5, 'g' => 3.0, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 5.0, 'g' => 42.0, 'l' => 2.0],
                            ['nom' => 'Lait', 'base' => 150, 'p' => 5.0, 'g' => 7.5, 'l' => 4.5],
                            ['nom' => 'Dattes', 'base' => 20, 'p' => 0.4, 'g' => 15.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous de manioc', 'base' => 120, 'p' => 2.0, 'g' => 33.0, 'l' => 0.5],
                            ['nom' => 'Sauce gombo', 'base' => 180, 'p' => 3.0, 'g' => 7.0, 'l' => 1.5],
                            ['nom' => 'Poulet', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Carottes', 'base' => 100, 'p' => 1.0, 'g' => 7.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio cuit', 'base' => 120, 'p' => 3.0, 'g' => 27.0, 'l' => 0.8],
                            ['nom' => 'Sauce feuilles', 'base' => 180, 'p' => 4.0, 'g' => 6.0, 'l' => 2.0],
                            ['nom' => 'Viande maigre', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.3],
                    ['nom' => 'Noix de cajou', 'base' => 20, 'p' => 3.6, 'g' => 6.0, 'l' => 8.8],
                    ['nom' => 'Arachides bouillies', 'base' => 40, 'p' => 7.0, 'g' => 6.0, 'l' => 8.0],
                    ['nom' => 'Orange', 'base' => 180, 'p' => 1.5, 'g' => 18.0, 'l' => 0.3],
                    ['nom' => 'Cacahuètes grillées', 'base' => 25, 'p' => 6.5, 'g' => 4.0, 'l' => 12.5],
                    ['nom' => 'Bissap sans sucre', 'base' => 60, 'p' => 0.0, 'g' => 1.0, 'l' => 0.0],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.5, 'g' => 36.0, 'l' => 0.6],
                            ['nom' => 'Poisson (sauce claire)', 'base' => 80, 'p' => 17.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes feuilles', 'base' => 150, 'p' => 3.5, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Huile de palme', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz cuit', 'base' => 180, 'p' => 4.0, 'g' => 41.0, 'l' => 0.6],
                            ['nom' => 'Haricots blancs', 'base' => 150, 'p' => 12.0, 'g' => 23.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate/légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Huile d’arachide', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 2.5, 'g' => 35.0, 'l' => 0.6],
                            ['nom' => 'Viande maigre', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Légumes verts', 'base' => 150, 'p' => 3.5, 'g' => 6.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 2.5, 'g' => 35.0, 'l' => 0.6],
                            ['nom' => 'Œufs', 'base' => 120, 'p' => 14.0, 'g' => 1.0, 'l' => 12.0],
                            ['nom' => 'Avocat', 'base' => 30, 'p' => 0.6, 'g' => 2.0, 'l' => 4.5],
                            ['nom' => 'Pain complet', 'base' => 30, 'p' => 3.0, 'g' => 13.0, 'l' => 1.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.5, 'g' => 37.0, 'l' => 1.0],
                            ['nom' => 'Sauce arachide', 'base' => 200, 'p' => 12.0, 'g' => 9.0, 'l' => 20.0],
                            ['nom' => 'Poisson', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Igname', 'base' => 50, 'p' => 0.8, 'g' => 12.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.5, 'g' => 36.0, 'l' => 0.6],
                            ['nom' => 'Viande', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Sauce claire', 'base' => 180, 'p' => 2.0, 'g' => 4.0, 'l' => 1.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.5, 'g' => 3.0, 'l' => 0.3],
                            ['nom' => 'Plantain', 'base' => 50, 'p' => 0.7, 'g' => 15.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 70, 'p' => 7.0, 'g' => 35.0, 'l' => 1.5],
                            ['nom' => 'Œufs', 'base' => 120, 'p' => 14.0, 'g' => 1.0, 'l' => 12.0],
                            ['nom' => 'Avocat', 'base' => 35, 'p' => 0.7, 'g' => 2.5, 'l' => 5.3],
                            ['nom' => 'Orange', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.0, 'g' => 41.0, 'l' => 0.6],
                            ['nom' => 'Sauce graine', 'base' => 250, 'p' => 12.0, 'g' => 10.0, 'l' => 25.0],
                            ['nom' => 'Crabe', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Plantain', 'base' => 50, 'p' => 0.7, 'g' => 15.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.0, 'g' => 30.0, 'l' => 0.1],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 7.5, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Attiéké', 'base' => 50, 'p' => 1.0, 'g' => 12.0, 'l' => 0.1],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 250, 'p' => 6.0, 'g' => 55.0, 'l' => 1.0],
                            ['nom' => 'Lait écrémé', 'base' => 150, 'p' => 5.0, 'g' => 7.5, 'l' => 0.5],
                            ['nom' => 'Arachides', 'base' => 25, 'p' => 6.0, 'g' => 4.5, 'l' => 12.5],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous manioc', 'base' => 150, 'p' => 2.5, 'g' => 35.0, 'l' => 0.3],
                            ['nom' => 'Sauce gombo', 'base' => 200, 'p' => 3.0, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Poulet', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Igname', 'base' => 50, 'p' => 0.8, 'g' => 12.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.5, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles', 'base' => 200, 'p' => 3.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Viande', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Riz', 'base' => 50, 'p' => 1.1, 'g' => 12.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.3],
                    ['nom' => 'Noix de cajou', 'base' => 15, 'p' => 2.7, 'g' => 4.5, 'l' => 6.6],
                    ['nom' => 'Pain complet', 'base' => 30, 'p' => 3.0, 'g' => 13.0, 'l' => 1.2],
                    ['nom' => 'Orange', 'base' => 100, 'p' => 0.7, 'g' => 12.0, 'l' => 0.1],
                    ['nom' => 'Noix', 'base' => 20, 'p' => 4.0, 'g' => 4.0, 'l' => 11.0],
                    ['nom' => 'Banane plantain grillée', 'base' => 70, 'p' => 1.0, 'g' => 28.0, 'l' => 0.3],
                    ['nom' => 'Mangue', 'base' => 100, 'p' => 0.5, 'g' => 15.0, 'l' => 0.2],
                    ['nom' => 'Cajou', 'base' => 15, 'p' => 2.7, 'g' => 4.5, 'l' => 6.6],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 4.8, 'g' => 44.0, 'l' => 0.6],
                            ['nom' => 'Sauce poisson', 'base' => 150, 'p' => 15.0, 'g' => 4.0, 'l' => 2.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 4.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.0, 'g' => 41.0, 'l' => 0.6],
                            ['nom' => 'Ragoût de porc maigre', 'base' => 120, 'p' => 20.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Sauce tomate légumes', 'base' => 150, 'p' => 2.0, 'g' => 7.0, 'l' => 1.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 1.8, 'g' => 33.0, 'l' => 0.2],
                            ['nom' => 'Œuf', 'base' => 60, 'p' => 7.0, 'g' => 0.5, 'l' => 6.0],
                            ['nom' => 'Salade de crudités', 'base' => 150, 'p' => 1.5, 'g' => 5.0, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 180, 'p' => 4.3, 'g' => 39.6, 'l' => 0.5],
                            ['nom' => 'Œufs', 'base' => 180, 'p' => 21.0, 'g' => 1.5, 'l' => 18.0],
                            ['nom' => 'Avocat', 'base' => 30, 'p' => 0.6, 'g' => 2.2, 'l' => 4.5],
                            ['nom' => 'Igname bouillie', 'base' => 80, 'p' => 1.2, 'g' => 17.6, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 180, 'p' => 4.3, 'g' => 39.6, 'l' => 0.5],
                            ['nom' => 'Sauce arachide', 'base' => 200, 'p' => 14.0, 'g' => 10.0, 'l' => 20.0],
                            ['nom' => 'Poisson', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Igname', 'base' => 100, 'p' => 1.5, 'g' => 22.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 2.2, 'g' => 35.0, 'l' => 0.3],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Sauce', 'base' => 150, 'p' => 2.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 0.2],
                            ['nom' => 'Riz', 'base' => 80, 'p' => 1.8, 'g' => 18.0, 'l' => 0.3],
                            ['nom' => 'Plantain', 'base' => 50, 'p' => 0.7, 'g' => 15.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 80, 'p' => 8.0, 'g' => 44.0, 'l' => 1.0],
                            ['nom' => 'Œufs', 'base' => 180, 'p' => 21.0, 'g' => 1.5, 'l' => 18.0],
                            ['nom' => 'Avocat', 'base' => 35, 'p' => 0.7, 'g' => 2.6, 'l' => 5.3],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 12.0, 'l' => 0.2],
                            ['nom' => 'Bouillie (maïs)', 'base' => 100, 'p' => 2.0, 'g' => 20.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 200, 'p' => 4.5, 'g' => 46.0, 'l' => 0.6],
                            ['nom' => 'Sauce graine', 'base' => 250, 'p' => 14.0, 'g' => 15.0, 'l' => 20.0],
                            ['nom' => 'Crabe', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Plantain', 'base' => 80, 'p' => 1.2, 'g' => 28.0, 'l' => 0.2],
                            ['nom' => 'Igname', 'base' => 50, 'p' => 0.7, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce', 'base' => 180, 'p' => 3.0, 'g' => 41.0, 'l' => 0.3],
                            ['nom' => 'Haricots', 'base' => 120, 'p' => 9.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Attiéké', 'base' => 80, 'p' => 1.2, 'g' => 18.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 300, 'p' => 6.0, 'g' => 54.0, 'l' => 0.6],
                            ['nom' => 'Lait (écrémé)', 'base' => 200, 'p' => 6.8, 'g' => 9.6, 'l' => 0.6],
                            ['nom' => 'Arachides', 'base' => 30, 'p' => 7.5, 'g' => 4.5, 'l' => 15.0],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 0.8, 'g' => 15.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous manioc', 'base' => 180, 'p' => 2.0, 'g' => 43.0, 'l' => 0.2],
                            ['nom' => 'Sauce gombo', 'base' => 200, 'p' => 3.0, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Poulet', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Patate', 'base' => 100, 'p' => 2.0, 'g' => 20.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 180, 'p' => 6.3, 'g' => 133.0, 'l' => 0.3],
                            ['nom' => 'Sauce feuilles', 'base' => 200, 'p' => 3.0, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Viande', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Riz', 'base' => 80, 'p' => 1.8, 'g' => 18.0, 'l' => 0.3],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 0.8, 'g' => 15.0, 'l' => 0.2],
                    ['nom' => 'Pain complet', 'base' => 40, 'p' => 4.0, 'g' => 20.0, 'l' => 0.8],
                    ['nom' => 'Noix', 'base' => 20, 'p' => 4.0, 'g' => 4.0, 'l' => 11.0],
                    ['nom' => 'Mangue', 'base' => 150, 'p' => 0.8, 'g' => 22.5, 'l' => 0.3],
                    ['nom' => 'Noix de cajou', 'base' => 25, 'p' => 4.5, 'g' => 7.5, 'l' => 10.5],
                    ['nom' => 'Orange + pain complet', 'base' => 80, 'p' => 4.0, 'g' => 24.0, 'l' => 0.8],
                    ['nom' => 'Noix', 'base' => 25, 'p' => 4.5, 'g' => 5.0, 'l' => 11.0],
                    ['nom' => 'Banane + arachides', 'base' => 105, 'p' => 4.0, 'g' => 25.0, 'l' => 15.0],
                    ['nom' => 'Bissap + plantain grillé', 'base' => 180, 'p' => 0.2, 'g' => 20.0, 'l' => 0.2],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte d’igname', 'base' => 200, 'p' => 2.0, 'g' => 46.0, 'l' => 0.2],
                            ['nom' => 'Sauce poisson fumé', 'base' => 50, 'p' => 10.0, 'g' => 2.0, 'l' => 3.0],
                            ['nom' => 'Légumes verts', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 4.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.3],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate légère', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 3.0],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.5, 'g' => 109.0, 'l' => 0.6],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 350, 'p' => 6.0, 'g' => 77.0, 'l' => 1.5],
                            ['nom' => 'Lait', 'base' => 200, 'p' => 6.6, 'g' => 10.0, 'l' => 6.0],
                            ['nom' => 'Arachides', 'base' => 25, 'p' => 6.25, 'g' => 4.0, 'l' => 12.5],
                            ['nom' => 'Banane', 'base' => 100, 'p' => 1.1, 'g' => 23.0, 'l' => 0.3],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 5.0, 'g' => 25.0, 'l' => 1.5],
                            ['nom' => 'Œuf', 'base' => 50, 'p' => 6.3, 'g' => 0.4, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 230, 'p' => 4.6, 'g' => 54.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate', 'base' => 250, 'p' => 3.0, 'g' => 16.0, 'l' => 4.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Haricots', 'base' => 150, 'p' => 12.0, 'g' => 33.0, 'l' => 1.0],
                            ['nom' => 'Plantain', 'base' => 100, 'p' => 1.0, 'g' => 27.0, 'l' => 0.2],
                            ['nom' => 'Patate', 'base' => 80, 'p' => 1.0, 'g' => 17.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 180, 'p' => 3.0, 'g' => 39.0, 'l' => 0.2],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce + légumes', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Riz', 'base' => 100, 'p' => 2.0, 'g' => 23.0, 'l' => 0.3],
                            ['nom' => 'Plantain', 'base' => 80, 'p' => 0.8, 'g' => 21.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 90, 'p' => 9.0, 'g' => 46.0, 'l' => 2.0],
                            ['nom' => 'Œufs', 'base' => 150, 'p' => 18.0, 'g' => 1.0, 'l' => 15.0],
                            ['nom' => 'Avocat', 'base' => 25, 'p' => 0.3, 'g' => 1.3, 'l' => 4.5],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 12.0, 'l' => 0.2],
                            ['nom' => 'Bouillie', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 1.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 230, 'p' => 5.0, 'g' => 50.0, 'l' => 1.5],
                            ['nom' => 'Sauce graine', 'base' => 250, 'p' => 10.0, 'g' => 5.0, 'l' => 20.0],
                            ['nom' => 'Crabe', 'base' => 120, 'p' => 23.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 7.0, 'l' => 0.5],
                            ['nom' => 'Plantain', 'base' => 100, 'p' => 1.0, 'g' => 27.0, 'l' => 0.2],
                            ['nom' => 'Igname', 'base' => 80, 'p' => 1.0, 'g' => 18.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce', 'base' => 200, 'p' => 2.0, 'g' => 40.0, 'l' => 0.0],
                            ['nom' => 'Haricots', 'base' => 120, 'p' => 8.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Salade', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 0.2],
                            ['nom' => 'Attiéké', 'base' => 100, 'p' => 2.0, 'g' => 23.0, 'l' => 0.2],
                            ['nom' => 'Plantain', 'base' => 50, 'p' => 0.5, 'g' => 13.0, 'l' => 0.1],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 350, 'p' => 10.5, 'g' => 80.0, 'l' => 3.5],
                            ['nom' => 'Lait', 'base' => 200, 'p' => 6.8, 'g' => 9.6, 'l' => 7.4],
                            ['nom' => 'Arachides', 'base' => 30, 'p' => 7.5, 'g' => 4.0, 'l' => 14.0],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 0.7, 'g' => 10.0, 'l' => 0.2],
                            ['nom' => 'Pain', 'base' => 40, 'p' => 4.0, 'g' => 20.0, 'l' => 0.9],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous manioc', 'base' => 200, 'p' => 4.0, 'g' => 48.0, 'l' => 0.6],
                            ['nom' => 'Sauce gombo', 'base' => 200, 'p' => 5.0, 'g' => 10.0, 'l' => 6.0],
                            ['nom' => 'Poulet', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 7.0, 'l' => 0.5],
                            ['nom' => 'Patate', 'base' => 120, 'p' => 2.0, 'g' => 27.0, 'l' => 0.0],
                            ['nom' => 'Riz', 'base' => 50, 'p' => 1.0, 'g' => 11.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 200, 'p' => 6.0, '40.0', 'l' => 1.0],
                            ['nom' => 'Sauce feuilles', 'base' => 200, 'p' => 5.0, 'g' => 10.0, 'l' => 6.0],
                            ['nom' => 'Viande', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 3.0, 'g' => 7.0, 'l' => 0.5],
                            ['nom' => 'Riz', 'base' => 80, 'p' => 2.0, 'g' => 18.0, 'l' => 0.2],
                            ['nom' => 'Igname', 'base' => 50, 'p' => 0.5, 'g' => 11.0, 'l' => 0.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Papaye + pain + noix + bouillie', 'base' => 350, 'p' => 7.0, 'g' => 85.0, 'l' => 15.0],
                    ['nom' => 'Banane + arachides', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 12.0],
                    ['nom' => 'Mangue + cajou + akassa', 'base' => 200, 'p' => 4.0, 'g' => 55.0, 'l' => 12.0],
                    ['nom' => 'Orange + pain + noix + bouillie', 'base' => 100, 'p' => 11.0, 'g' => 60.0, 'l' => 12.0],
                    ['nom' => 'Banane + arachides (Bis)', 'base' => 100, 'p' => 5.0, 'g' => 45.0, 'l' => 14.0],
                    ['nom' => 'Bissap + plantain + akassa', 'base' => 100, 'p' => 4.0, 'g' => 50.0, 'l' => 1.0],
                ]
            ],
        ];
    }
}
