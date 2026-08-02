<?php

namespace App\Services;

class FitnessNoPathologyNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            // ==================================================================
            // NIVEAU SÉDENTAIRE
            // ==================================================================
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs (akassa)', 'base' => 200, 'p' => 2.0, 'g' => 28.0, 'l' => 0.5],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 11.0],
                            ['nom' => 'Arachides grillées', 'base' => 25, 'p' => 6.0, 'g' => 5.0, 'l' => 13.0],
                            ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Sauce graine', 'base' => 100, 'p' => 4.0, 'g' => 5.0, 'l' => 15.0],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Huile d\'arachide', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs (télibo)', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Sauce d\'arachide', 'base' => 100, 'p' => 6.0, 'g' => 5.0, 'l' => 15.0],
                            ['nom' => 'Bœuf', 'base' => 100, 'p' => 26.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Œufs brouillés (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 11.0],
                            ['nom' => 'Tomates, oignons, piment', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 1.5],
                            ['nom' => 'Huile de palme', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 8.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 4.0, 'g' => 45.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Poulet', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akpan', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade concombre et tomate', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Arachides', 'base' => 25, 'p' => 6.0, 'g' => 5.0, 'l' => 13.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca (gari)', 'base' => 100, 'p' => 1.5, 'g' => 80.0, 'l' => 0.2],
                            ['nom' => 'Œufs pochés (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Sauce tomate pimentée', 'base' => 50, 'p' => 1.0, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.0, 'g' => 3.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Amiwo (maïs foncé)', 'base' => 150, 'p' => 4.0, 'g' => 105.0, 'l' => 2.0],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 1.5, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Crabe', 'base' => 100, 'p' => 19.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Poisson fumé', 'base' => 50, 'p' => 12.0, 'g' => 0.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs', 'base' => 150, 'p' => 4.0, 'g' => 105.0, 'l' => 2.0],
                            ['nom' => 'Sauce d\'arachide', 'base' => 50, 'p' => 10.0, 'g' => 5.0, 'l' => 20.0],
                            ['nom' => 'Poulet (sans peau)', 'base' => 100, 'p' => 23.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho', 'base' => 200, 'p' => 4.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Lait en poudre (reconstitué)', 'base' => 30, 'p' => 10.0, 'g' => 15.0, 'l' => 2.0],
                            ['nom' => 'Pâte d\'arachide', 'base' => 15, 'p' => 4.0, 'g' => 2.0, 'l' => 8.0],
                            ['nom' => 'Mangue', 'base' => 100, 'p' => 0.5, 'g' => 15.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 33.0, 'l' => 0.2],
                            ['nom' => 'Sauce claire aux légumes', 'base' => 100, 'p' => 2.0, 'g' => 10.0, 'l' => 0.5],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Huile d\'arachide', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 2.0, 'g' => 105.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 2.0, 'g' => 8.0, 'l' => 0.2],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Poisson fumé', 'base' => 50, 'p' => 12.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Orange', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.2],
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.0, 'g' => 14.0, 'l' => 0.2],
                    ['nom' => 'Carottes', 'base' => 100, 'p' => 1.0, 'g' => 8.0, 'l' => 0.1],
                    ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 1.0, 'g' => 31.0, 'l' => 0.2],
                ]
            ],

            // ==================================================================
            // NIVEAU LÉGÈREMENT ACTIF
            // ==================================================================
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 4.0, 'g' => 28.0, 'l' => 1.0],
                            ['nom' => 'Œufs à la coque (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.0, 'g' => 31.0, 'l' => 0.0],
                            ['nom' => 'Arachides', 'base' => 25, 'p' => 6.0, 'g' => 5.0, 'l' => 13.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.0, 'g' => 45.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Poisson frais', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.0],
                            ['nom' => 'Huile d\'arachide', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 2.0, 'l' => 0.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 36.0, 'l' => 2.0],
                            ['nom' => 'Omelette aux légumes', 'base' => 120, 'p' => 12.0, 'g' => 4.0, 'l' => 11.0],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 15.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 34.0, 'l' => 0.0],
                            ['nom' => 'Sauce graine', 'base' => 100, 'p' => 6.0, 'g' => 6.0, 'l' => 8.0],
                            ['nom' => 'Bœuf maigre', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Sauce d\'arachide', 'base' => 100, 'p' => 6.0, 'g' => 6.0, 'l' => 8.0],
                            ['nom' => 'Poulet', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 4.0, 'g' => 42.0, 'l' => 0.5],
                            ['nom' => 'Œufs brouillés (2)', 'base' => 100, 'p' => 12.5, 'g' => 1.0, 'l' => 9.5],
                            ['nom' => 'Banane plantain frite', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 7.5],
                            ['nom' => 'Arachides', 'base' => 25, 'p' => 6.3, 'g' => 3.0, 'l' => 12.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Haricots rouges (cuits)', 'base' => 150, 'p' => 10.0, 'g' => 22.5, 'l' => 0.5],
                            ['nom' => 'Riz complet (cuit)', 'base' => 150, 'p' => 3.2, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce d\'arachide', 'base' => 100, 'p' => 8.0, 'g' => 6.0, 'l' => 14.0],
                            ['nom' => 'Viande (bœuf maigre)', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 200, 'p' => 2.5, 'g' => 40.0, 'l' => 0.5],
                            ['nom' => 'Lait en poudre (reconstitué)', 'base' => 150, 'p' => 5.0, 'g' => 7.5, 'l' => 3.5],
                            ['nom' => 'Pâte d\'arachide', 'base' => 10, 'p' => 2.5, 'g' => 1.0, 'l' => 5.0],
                            ['nom' => 'Banane douce', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Wagasi grillé', 'base' => 100, 'p' => 18.0, 'g' => 2.0, 'l' => 20.0],
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate aux légumes', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 2.0],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce gombo au crabe', 'base' => 150, 'p' => 10.0, 'g' => 6.0, 'l' => 5.0],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Arachides', 'base' => 25, 'p' => 6.0, 'g' => 5.0, 'l' => 13.0],
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.0],
                    ['nom' => 'Bananes douces', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.2],
                    ['nom' => 'Avocat', 'base' => 50, 'p' => 0.5, 'g' => 3.0, 'l' => 7.5],
                ]
            ],

            // ==================================================================
            // NIVEAU MODÉRÉMENT ACTIF
            // ==================================================================
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 4.0, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 11.0],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.0, 'g' => 31.0, 'l' => 0.2],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 12.0, 'l' => 0.2],
                            ['nom' => 'Arachides', 'base' => 25, 'p' => 6.0, 'g' => 5.0, 'l' => 13.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (cuit)', 'base' => 150, 'p' => 4.0, 'g' => 45.0, 'l' => 0.4],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                            ['nom' => 'Poulet', 'base' => 100, 'p' => 23.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Huile d\'arachide', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce tomate', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 34.0, 'l' => 1.0],
                            ['nom' => 'Omelette aux légumes', 'base' => 100, 'p' => 13.0, 'g' => 3.0, 'l' => 11.0],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.0, 'g' => 31.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs (cuit)', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Sauce graine', 'base' => 100, 'p' => 6.0, 'g' => 5.0, 'l' => 12.0],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 33.0, 'l' => 0.2],
                            ['nom' => 'Sauce d\'arachide', 'base' => 50, 'p' => 3.0, 'g' => 3.0, 'l' => 6.0],
                            ['nom' => 'Viande maigre', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca', 'base' => 100, 'p' => 1.0, 'g' => 27.0, 'l' => 0.0],
                            ['nom' => 'Œufs pochés (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Sauce tomate', 'base' => 50, 'p' => 0.5, 'g' => 3.0, 'l' => 0.1],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.0, 'g' => 31.0, 'l' => 0.2],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.0, 'g' => 4.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (cuit)', 'base' => 150, 'p' => 4.0, 'g' => 37.0, 'l' => 0.5],
                            ['nom' => 'Haricots rouges (sec)', 'base' => 50, 'p' => 12.0, 'g' => 34.0, 'l' => 0.5],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs (cuit)', 'base' => 150, 'p' => 4.0, 'g' => 36.0, 'l' => 0.5],
                            ['nom' => 'Sauce d\'arachide', 'base' => 50, 'p' => 12.0, 'g' => 4.0, 'l' => 20.0],
                            ['nom' => 'Poulet', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho', 'base' => 100, 'p' => 4.0, 'g' => 70.0, 'l' => 1.0],
                            ['nom' => 'Lait en poudre', 'base' => 20, 'p' => 6.0, 'g' => 10.0, 'l' => 2.0],
                            ['nom' => 'Pâte d\'arachide', 'base' => 10, 'p' => 2.0, 'g' => 1.0, 'l' => 5.0],
                            ['nom' => 'Mangue', 'base' => 100, 'p' => 0.5, 'g' => 15.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Amiwo', 'base' => 100, 'p' => 4.0, 'g' => 27.0, 'l' => 0.0],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 1.0],
                            ['nom' => 'Crabe', 'base' => 100, 'p' => 18.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Wagasi grillé', 'base' => 100, 'p' => 20.0, 'g' => 2.0, 'l' => 15.0],
                            ['nom' => 'Pâte de maïs', 'base' => 100, 'p' => 2.0, 'g' => 27.0, 'l' => 0.2],
                            ['nom' => 'Sauce tomate', 'base' => 50, 'p' => 0.5, 'g' => 3.0, 'l' => 0.1],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 5.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.3],
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.2],
                    ['nom' => 'Banane douce', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.2],
                    ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.0],
                    ['nom' => 'Orange', 'base' => 100, 'p' => 1.0, 'g' => 12.0, 'l' => 0.1],
                ]
            ],

            // ==================================================================
            // NIVEAU TRÈS ACTIF
            // ==================================================================
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 150, 'p' => 4.5, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.3, 'g' => 16.0, 'l' => 0.2],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.0, 'g' => 6.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (cuit)', 'base' => 150, 'p' => 3.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 0.2],
                            ['nom' => 'Poulet maigre', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 3.0, 'g' => 36.0, 'l' => 0.5],
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 0.2],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 32.0, 'l' => 1.5],
                            ['nom' => 'Omelette (2 œufs)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                            ['nom' => 'Mangue', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 4.0, 'g' => 32.0, 'l' => 0.5],
                            ['nom' => 'Sauce graine', 'base' => 100, 'p' => 10.0, 'g' => 6.0, 'l' => 14.0],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce d\'arachide', 'base' => 100, 'p' => 10.0, 'g' => 6.0, 'l' => 14.0],
                            ['nom' => 'Viande maigre', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 3.6, 'g' => 44.0, 'l' => 0.4],
                            ['nom' => 'Œufs brouillés (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Banane plantain frite', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                            ['nom' => 'Orange', 'base' => 100, 'p' => 0.9, 'g' => 12.0, 'l' => 0.1],
                            ['nom' => 'Arachides', 'base' => 30, 'p' => 7.5, 'g' => 4.0, 'l' => 14.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (cuit)', 'base' => 150, 'p' => 3.0, 'g' => 39.0, 'l' => 0.6],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Poisson (tilapia grillé)', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce d\'arachide', 'base' => 50, 'p' => 6.0, 'g' => 4.0, 'l' => 14.0],
                            ['nom' => 'Poulet (blanc grillé)', 'base' => 120, 'p' => 28.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 200, 'p' => 2.0, 'g' => 36.0, 'l' => 0.5],
                            ['nom' => 'Lait en poudre', 'base' => 30, 'p' => 10.0, 'g' => 12.0, 'l' => 1.0],
                            ['nom' => 'Pâte d\'arachide', 'base' => 15, 'p' => 3.0, 'g' => 2.0, 'l' => 7.0],
                            ['nom' => 'Mangue', 'base' => 100, 'p' => 0.8, 'g' => 15.0, 'l' => 0.2],
                            ['nom' => 'Banane', 'base' => 100, 'p' => 1.1, 'g' => 23.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Amiwo', 'base' => 150, 'p' => 4.0, 'g' => 36.0, 'l' => 0.5],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Crabe', 'base' => 100, 'p' => 18.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.4],
                            ['nom' => 'Sauce tomate légère', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 0.1],
                            ['nom' => 'Wagasi', 'base' => 50, 'p' => 12.0, 'g' => 1.0, 'l' => 20.0],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 18.0, 'g' => 0.0, 'l' => 5.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.3],
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.2],
                    ['nom' => 'Banane douce', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.3],
                    ['nom' => 'Avocat', 'base' => 50, 'p' => 0.6, 'g' => 3.0, 'l' => 7.5],
                    ['nom' => 'Noix de cajou', 'base' => 20, 'p' => 5.0, 'g' => 5.0, 'l' => 11.0],
                ]
            ],

            // ==================================================================
            // NIVEAU EXTRÊMEMENT ACTIF
            // ==================================================================
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 6.8, 'g' => 30.0, 'l' => 2.6],
                            ['nom' => 'Œufs durs', 'base' => 120, 'p' => 15.6, 'g' => 1.4, 'l' => 12.0],
                            ['nom' => 'Banane plantain', 'base' => 120, 'p' => 1.5, 'g' => 31.0, 'l' => 0.4],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 11.0, 'l' => 0.2],
                            ['nom' => 'Arachides', 'base' => 30, 'p' => 7.8, 'g' => 4.8, 'l' => 15.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (cuit)', 'base' => 180, 'p' => 4.5, 'g' => 41.0, 'l' => 1.8],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Poulet maigre', 'base' => 100, 'p' => 27.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 2.5, 'g' => 40.0, 'l' => 0.6],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Sauce tomate légère', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Salade de légumes', 'base' => 100, 'p' => 1.5, 'g' => 4.0, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 80, 'p' => 7.6, 'g' => 33.0, 'l' => 2.4],
                            ['nom' => 'Omelette aux légumes (2 œufs)', 'base' => 140, 'p' => 14.0, 'g' => 2.0, 'l' => 11.5],
                            ['nom' => 'Plantain bouilli', 'base' => 120, 'p' => 1.5, 'g' => 31.0, 'l' => 0.4],
                            ['nom' => 'Mangue', 'base' => 200, 'p' => 1.6, 'g' => 30.0, 'l' => 0.8],
                            ['nom' => 'Banane douce', 'base' => 120, 'p' => 1.3, 'g' => 27.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.5, 'g' => 36.0, 'l' => 1.5],
                            ['nom' => 'Sauce aux légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 0.4],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 100, 'p' => 1.5, 'g' => 23.0, 'l' => 0.2],
                            ['nom' => 'Sauce légère', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Viande maigre', 'base' => 100, 'p' => 26.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 0.4],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari (tapioca)', 'base' => 150, 'p' => 1.2, 'g' => 36.0, 'l' => 0.6],
                            ['nom' => 'Œufs pochés', 'base' => 120, 'p' => 15.6, 'g' => 1.4, 'l' => 12.0],
                            ['nom' => 'Banane plantain', 'base' => 120, 'p' => 1.5, 'g' => 31.0, 'l' => 0.4],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 11.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (cuit)', 'base' => 180, 'p' => 4.5, 'g' => 41.0, 'l' => 1.8],
                            ['nom' => 'Haricots rouges (cuits)', 'base' => 150, 'p' => 13.0, 'g' => 24.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 0.4],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs', 'base' => 150, 'p' => 3.0, 'g' => 36.0, 'l' => 1.2],
                            ['nom' => 'Sauce ultra-légère', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.5],
                            ['nom' => 'Poulet maigre', 'base' => 100, 'p' => 27.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 0.4],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho', 'base' => 200, 'p' => 6.0, 'g' => 32.0, 'l' => 2.4],
                            ['nom' => 'Lait en poudre (reconstitué)', 'base' => 200, 'p' => 6.6, 'g' => 9.6, 'l' => 2.0],
                            ['nom' => 'Pâte d\'arachide', 'base' => 30, 'p' => 7.5, 'g' => 5.0, 'l' => 15.0],
                            ['nom' => 'Mangue', 'base' => 200, 'p' => 1.6, 'g' => 30.0, 'l' => 0.8],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Amiwo (maïs)', 'base' => 150, 'p' => 3.5, 'g' => 35.0, 'l' => 1.5],
                            ['nom' => 'Sauce légère', 'base' => 100, 'p' => 1.5, 'g' => 4.0, 'l' => 1.0],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 0.4],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.5, 'g' => 36.0, 'l' => 1.5],
                            ['nom' => 'Sauce tomate légère', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 0.4],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue', 'base' => 200, 'p' => 1.6, 'g' => 30.0, 'l' => 0.8],
                    ['nom' => 'Arachides', 'base' => 30, 'p' => 7.8, 'g' => 4.8, 'l' => 15.3],
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.2, 'g' => 16.0, 'l' => 0.3],
                    ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 11.0, 'l' => 0.2],
                    ['nom' => 'Banane douce', 'base' => 120, 'p' => 1.3, 'g' => 27.0, 'l' => 0.3],
                    ['nom' => 'Avocat', 'base' => 150, 'p' => 3.0, 'g' => 12.0, 'l' => 22.0],
                ]
            ],
        ];
    }
}