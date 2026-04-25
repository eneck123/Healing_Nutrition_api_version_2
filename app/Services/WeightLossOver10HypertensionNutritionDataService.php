<?php

namespace App\Services;

class WeightLossOver10HypertensionNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 200, 'p' => 4.0, 'g' => 36.0, 'l' => 2.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.5, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 100, 'p' => 2.3, 'g' => 21.0, 'l' => 1.0],
                            ['nom' => 'Sauce graine', 'base' => 150, 'p' => 3.0, 'g' => 9.0, 'l' => 15.0],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Épinards', 'base' => 200, 'p' => 5.0, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Carottes', 'base' => 100, 'p' => 1.0, 'g' => 9.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe légumes', 'base' => 300, 'p' => 4.0, 'g' => 12.0, 'l' => 3.0],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Igname bouillie', 'base' => 80, 'p' => 1.2, 'g' => 21.6, 'l' => 0.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 3.5, 'g' => 31.5, 'l' => 1.5],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 13.0],
                            ['nom' => 'Salade légumes', 'base' => 150, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Amiwo (farine de maïs)', 'base' => 150, 'p' => 3.0, 'g' => 33.0, 'l' => 6.0],
                            ['nom' => 'Poulet', 'base' => 150, 'p' => 32.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 3.0],
                            ['nom' => 'Salade', 'base' => 200, 'p' => 2.0, 'g' => 8.0, 'l' => 0.4],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade légumes', 'base' => 250, 'p' => 3.0, 'g' => 10.0, 'l' => 0.5],
                            ['nom' => 'Haricots rouges', 'base' => 150, 'p' => 10.0, 'g' => 27.0, 'l' => 1.0],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.0, 'g' => 1.0, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.5, 'l' => 7.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Avoine cuite', 'base' => 200, 'p' => 5.6, 'g' => 23.4, 'l' => 2.6],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 7.0, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Arachides grillées', 'base' => 20, 'p' => 5.1, 'g' => 2.8, 'l' => 10.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.6, 'g' => 34.0, 'l' => 1.2],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 1.5, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Poisson maquereau', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Salade', 'base' => 150, 'p' => 2.0, 'g' => 4.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 120, 'p' => 1.6, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Sauce arachide allégée', 'base' => 60, 'p' => 4.0, 'g' => 4.0, 'l' => 10.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Légumes verts', 'base' => 200, 'p' => 4.0, 'g' => 8.0, 'l' => 0.6],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Omelette (2 œufs)', 'base' => 100, 'p' => 12.5, 'g' => 1.0, 'l' => 10.5],
                            ['nom' => 'Pain complet', 'base' => 40, 'p' => 4.3, 'g' => 18.0, 'l' => 1.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.0, 'g' => 36.0, 'l' => 1.5],
                            ['nom' => 'Sauce gombo', 'base' => 120, 'p' => 2.0, 'g' => 4.0, 'l' => 1.5],
                            ['nom' => 'Poulet grillé', 'base' => 150, 'p' => 32.0, 'g' => 0.0, 'l' => 4.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.0, 'g' => 32.0, 'l' => 0.2],
                            ['nom' => 'Sauce tomate haricots verts', 'base' => 120, 'p' => 3.0, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 7.0],
                            ['nom' => 'Salade verte', 'base' => 150, 'p' => 2.0, 'g' => 4.0, 'l' => 0.3],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Pamplemousse entier', 'base' => 200, 'p' => 1.0, 'g' => 18.0, 'l' => 0.0],
                    ['nom' => 'Yaourt nature', 'base' => 125, 'p' => 4.3, 'g' => 4.8, 'l' => 1.2],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil avec lait écrémé', 'base' => 250, 'p' => 6.0, 'g' => 52.5, 'l' => 1.5],
                            ['nom' => 'Œuf', 'base' => 50, 'p' => 6.5, 'g' => 0.3, 'l' => 5.0],
                            ['nom' => 'Fromage local allégé', 'base' => 30, 'p' => 6.0, 'g' => 0.6, 'l' => 3.0],
                            ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz blanc cuit', 'base' => 180, 'p' => 4.0, 'g' => 48.6, 'l' => 0.3],
                            ['nom' => 'Sauce tomate-légumes + viande maigre', 'base' => 120, 'p' => 15.0, 'g' => 8.0, 'l' => 5.0],
                            ['nom' => 'Haricots verts et carottes', 'base' => 150, 'p' => 3.0, 'g' => 9.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Tapioca', 'base' => 150, 'p' => 0.3, 'g' => 36.0, 'l' => 0.1],
                            ['nom' => 'Sauce d’arachide', 'base' => 100, 'p' => 25.0, 'g' => 20.0, 'l' => 50.0],
                            ['nom' => 'Viande de volaille', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes sautés', 'base' => 200, 'p' => 4.0, 'g' => 12.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain (2 tranches, complet)', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 1.5],
                            ['nom' => 'Omelette aux légumes (2 œufs + légumes)', 'base' => 120, 'p' => 12.0, 'g' => 3.0, 'l' => 9.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs complet', 'base' => 150, 'p' => 4.5, 'g' => 33.0, 'l' => 1.5],
                            ['nom' => 'Sauce feuilles (kpété)', 'base' => 200, 'p' => 4.0, 'g' => 10.0, 'l' => 5.0],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Crabe', 'base' => 50, 'p' => 6.0, 'g' => 0.0, 'l' => 0.5],
                            ['nom' => 'Salade de concombres', 'base' => 50, 'p' => 0.5, 'g' => 1.5, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 120, 'p' => 9.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Riz', 'base' => 100, 'p' => 2.2, 'g' => 28.0, 'l' => 0.3],
                            ['nom' => 'Sauce tomate maison', 'base' => 80, 'p' => 1.0, 'g' => 4.0, 'l' => 2.0],
                            ['nom' => 'Poisson fumé', 'base' => 80, 'p' => 16.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 0.5, 'g' => 1.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa (bouillie de maïs fermenté)', 'base' => 200, 'p' => 5.0, 'g' => 44.0, 'l' => 0.5],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 6.6, 'g' => 9.6, 'l' => 0.2],
                            ['nom' => 'Œuf à la coque', 'base' => 50, 'p' => 6.5, 'g' => 0.3, 'l' => 5.0],
                            ['nom' => 'Avocat (1/4 fruit)', 'base' => 50, 'p' => 0.6, 'g' => 3.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz étuvé', 'base' => 180, 'p' => 4.0, 'g' => 48.6, 'l' => 0.3],
                            ['nom' => 'Sauce tomate aux légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 3.0],
                            ['nom' => 'Poisson braisé (tilapia)', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs (portion modérée)', 'base' => 150, 'p' => 3.0, 'g' => 33.0, 'l' => 1.0],
                            ['nom' => 'Sauce légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 2.0],
                            ['nom' => 'Viande de bœuf maigre grillée', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie d\'avoine', 'base' => 200, 'p' => 6.0, 'g' => 34.0, 'l' => 3.0],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 6.6, 'g' => 9.6, 'l' => 0.2],
                            ['nom' => 'Arachides grillées', 'base' => 20, 'p' => 5.0, 'g' => 2.0, 'l' => 10.0],
                            ['nom' => 'Banane petite', 'base' => 100, 'p' => 1.3, 'g' => 23.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio cuit', 'base' => 150, 'p' => 4.0, 'g' => 33.0, 'l' => 0.5],
                            ['nom' => 'Sauce gombo légère', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Poulet grillé sans peau', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Salade concombre et tomate', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouilli', 'base' => 150, 'p' => 1.2, 'g' => 33.0, 'l' => 0.2],
                            ['nom' => 'Sauce arachide allégée', 'base' => 100, 'p' => 25.0, 'g' => 20.0, 'l' => 50.0],
                            ['nom' => 'Poisson grillé (maquereau)', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes verts (épinards, oseille)', 'base' => 150, 'p' => 4.0, 'g' => 7.0, 'l' => 0.3],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Banane', 'base' => 100, 'p' => 1.3, 'g' => 23.0, 'l' => 0.3],
                    ['nom' => 'Bissap sans sucre', 'base' => 200, 'p' => 0.0, 'g' => 1.0, 'l' => 0.0],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie d\'avoine', 'base' => 300, 'p' => 9.0, 'g' => 51.0, 'l' => 6.0],
                            ['nom' => 'Œufs brouillés', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.2],
                            ['nom' => 'Avocat', 'base' => 40, 'p' => 0.5, 'g' => 2.4, 'l' => 6.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 200, 'p' => 4.0, 'g' => 52.0, 'l' => 0.5],
                            ['nom' => 'Sauce gombo fraîche', 'base' => 250, 'p' => 3.0, 'g' => 10.0, 'l' => 3.0],
                            ['nom' => 'Viande de bœuf maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Poisson fumé', 'base' => 50, 'p' => 12.0, 'g' => 0.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Riz rouge', 'base' => 180, 'p' => 4.0, 'g' => 41.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate-poisson', 'base' => 150, 'p' => 12.0, 'g' => 8.0, 'l' => 3.0],
                            ['nom' => 'Légumes sautés', 'base' => 200, 'p' => 2.0, 'g' => 10.0, 'l' => 5.0],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 15.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa (bouillie de maïs)', 'base' => 200, 'p' => 5.0, 'g' => 44.0, 'l' => 0.5],
                            ['nom' => 'Haricots en sauce', 'base' => 100, 'p' => 8.0, 'g' => 15.0, 'l' => 2.5],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.5, 'g' => 0.3, 'l' => 5.0],
                            ['nom' => 'Jus d\'orange frais', 'base' => 200, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Ignames pilées', 'base' => 180, 'p' => 2.0, 'g' => 40.0, 'l' => 0.3],
                            ['nom' => 'Sauce d\'arachide (huile contrôlée)', 'base' => 120, 'p' => 15.0, 'g' => 12.0, 'l' => 18.0],
                            ['nom' => 'Viande de cabri maigre', 'base' => 100, 'p' => 24.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Légumes feuilles', 'base' => 200, 'p' => 3.0, 'g' => 7.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attièkè ou tapioca', 'base' => 150, 'p' => 2.0, 'g' => 34.0, 'l' => 0.5],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce tomate-oignon', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 2.0],
                            ['nom' => 'Salade chou râpé', 'base' => 150, 'p' => 1.0, 'g' => 7.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari (farine de cassava)', 'base' => 100, 'p' => 1.2, 'g' => 80.0, 'l' => 0.5],
                            ['nom' => 'Légumes variés', 'base' => 50, 'p' => 1.0, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Fruit local (banane/papaye)', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz brun', 'base' => 180, 'p' => 3.6, 'g' => 40.0, 'l' => 0.5],
                            ['nom' => 'Sauce mixte (légumes + légumineuses)', 'base' => 200, 'p' => 8.0, 'g' => 15.0, 'l' => 5.0],
                            ['nom' => 'Viande blanche maigre', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs / yam dough', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce légumes', 'base' => 150, 'p' => 3.0, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Œuf ou poisson', 'base' => 50, 'p' => 6.0, 'g' => 0.0, 'l' => 5.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce claire au poisson', 'base' => 150, 'p' => 10.0, 'g' => 5.0, 'l' => 5.0],
                            ['nom' => 'Légumes feuilles', 'base' => 50, 'p' => 1.0, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Huile de palme', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 180, 'p' => 3.6, 'g' => 40.0, 'l' => 0.5],
                            ['nom' => 'Haricots blancs', 'base' => 100, 'p' => 7.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate + légumes', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Huile d\'arachide', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 1.5, 'g' => 40.0, 'l' => 0.2],
                            ['nom' => 'Sauce viande maigre', 'base' => 150, 'p' => 15.0, 'g' => 5.0, 'l' => 5.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue ou papaye', 'base' => 150, 'p' => 1.0, 'g' => 25.0, 'l' => 0.2],
                    ['nom' => 'Noix mélangées', 'base' => 25, 'p' => 5.0, 'g' => 3.0, 'l' => 12.0],
                    ['nom' => 'Klui-klui (cacahuète)', 'base' => 30, 'p' => 7.0, 'g' => 5.0, 'l' => 10.0],
                    ['nom' => 'Fromage local + concombre', 'base' => 80, 'p' => 6.5, 'g' => 3.0, 'l' => 5.1],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 350, 'p' => 8.0, 'g' => 75.0, 'l' => 3.0],
                            ['nom' => 'Œufs (2 entiers + 1 blanc)', 'base' => 180, 'p' => 19.0, 'g' => 1.0, 'l' => 14.0],
                            ['nom' => 'Banane plantain', 'base' => 120, 'p' => 1.0, 'g' => 31.0, 'l' => 0.0],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 7.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz', 'base' => 250, 'p' => 5.0, 'g' => 70.0, 'l' => 0.0],
                            ['nom' => 'Haricots', 'base' => 100, 'p' => 8.0, 'g' => 18.0, 'l' => 1.0],
                            ['nom' => 'Sauce viande-légumes', 'base' => 150, 'p' => 15.0, 'g' => 10.0, 'l' => 8.0],
                            ['nom' => 'Légumes variés', 'base' => 250, 'p' => 5.0, 'g' => 15.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ignames bouillies', 'base' => 200, 'p' => 2.0, 'g' => 50.0, 'l' => 0.0],
                            ['nom' => 'Sauce d\'arachide', 'base' => 130, 'p' => 13.0, 'g' => 12.0, 'l' => 18.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Salade mixte', 'base' => 200, 'p' => 2.0, 'g' => 10.0, 'l' => 0.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 90, 'p' => 9.0, 'g' => 48.0, 'l' => 3.0],
                            ['nom' => 'Omelette 3 œufs + légumes', 'base' => 180, 'p' => 19.0, 'g' => 2.0, 'l' => 15.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 7.0],
                            ['nom' => 'Banane', 'base' => 120, 'p' => 1.0, 'g' => 31.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 4.0, 'g' => 48.0, 'l' => 0.0],
                            ['nom' => 'Sauce graine', 'base' => 120, 'p' => 6.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'Sauce feuilles', 'base' => 150, 'p' => 4.0, 'g' => 6.0, 'l' => 2.0],
                            ['nom' => 'Viande (120g) + poisson (80g)', 'base' => 200, 'p' => 42.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Légumes verts', 'base' => 150, 'p' => 4.0, 'g' => 8.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Riz rouge', 'base' => 220, 'p' => 5.0, 'g' => 55.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate-poisson-viande', 'base' => 200, 'p' => 25.0, 'g' => 10.0, 'l' => 10.0],
                            ['nom' => 'Légumes sautés', 'base' => 250, 'p' => 5.0, 'g' => 15.0, 'l' => 5.0],
                            ['nom' => 'Salade verte', 'base' => 150, 'p' => 2.0, 'g' => 5.0, 'l' => 0.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 110.0, 'l' => 0.5],
                            ['nom' => 'Haricots rouges', 'base' => 50, 'p' => 3.5, 'g' => 10.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce gombo', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Poisson frais', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Riz local', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Patate douce', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce feuilles', 'base' => 150, 'p' => 3.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Viande de chèvre', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Tubercules mélangés', 'base' => 150, 'p' => 2.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.1],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa enrichie aux arachides', 'base' => 150, 'p' => 4.0, 'g' => 110.0, 'l' => 5.0],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 4.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Œuf brouillé', 'base' => 60, 'p' => 7.0, 'g' => 1.0, 'l' => 5.0],
                            ['nom' => 'Légumes (tomate, oignon)', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Viande de bœuf grillée', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce palme légère', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 5.0],
                            ['nom' => 'Salade crudités', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Crevettes sautées', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Riz rouge', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Légumes variés', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 0.3],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Smoothie énergétique', 'base' => 300, 'p' => 6.0, 'g' => 35.0, 'l' => 6.0],
                    ['nom' => 'Akara (2 pièces)', 'base' => 60, 'p' => 6.0, 'g' => 15.0, 'l' => 6.0],
                    ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 1.0, 'g' => 27.0, 'l' => 0.1],
                    ['nom' => 'Graines de tournesol', 'base' => 20, 'p' => 4.0, 'g' => 2.0, 'l' => 6.0],
                    ['nom' => 'Jus de bissap + dattes', 'base' => 170, 'p' => 1.0, 'g' => 15.0, 'l' => 0.1],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 400, 'p' => 12.0, 'g' => 80.0, 'l' => 4.0],
                            ['nom' => 'Œufs entiers (3)', 'base' => 150, 'p' => 18.0, 'g' => 1.0, 'l' => 15.0],
                            ['nom' => 'Banane plantain', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.3],
                            ['nom' => 'Avocat', 'base' => 60, 'p' => 1.0, 'g' => 3.0, 'l' => 10.0],
                            ['nom' => 'Lait', 'base' => 200, 'p' => 7.0, 'g' => 10.0, 'l' => 2.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 300, 'p' => 7.0, 'g' => 75.0, 'l' => 2.0],
                            ['nom' => 'Haricots', 'base' => 150, 'p' => 10.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Sauce viande-poisson', 'base' => 200, 'p' => 25.0, 'g' => 10.0, 'l' => 12.0],
                            ['nom' => 'Légumes', 'base' => 300, 'p' => 4.0, 'g' => 15.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ignames', 'base' => 250, 'p' => 2.0, 'g' => 60.0, 'l' => 0.3],
                            ['nom' => 'Sauce riche', 'base' => 150, 'p' => 10.0, 'g' => 5.0, 'l' => 10.0],
                            ['nom' => 'Viande + poisson', 'base' => 150, 'p' => 35.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Légumes', 'base' => 250, 'p' => 3.0, 'g' => 10.0, 'l' => 1.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa (pâte de maïs)', 'base' => 250, 'p' => 5.0, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Haricots', 'base' => 150, 'p' => 10.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Œufs (2)', 'base' => 100, 'p' => 12.0, 'g' => 0.5, 'l' => 10.0],
                            ['nom' => 'Fruits variés', 'base' => 200, 'p' => 2.0, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Boisson énergétique', 'base' => 200, 'p' => 1.0, 'g' => 20.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 250, 'p' => 5.0, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Sauce graine + feuilles', 'base' => 300, 'p' => 15.0, 'g' => 12.0, 'l' => 15.0],
                            ['nom' => 'Viande', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Poisson', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Riz rouge', 'base' => 280, 'p' => 7.0, 'g' => 70.0, 'l' => 1.5],
                            ['nom' => 'Sauce tomate-viande', 'base' => 200, 'p' => 20.0, 'g' => 10.0, 'l' => 8.0],
                            ['nom' => 'Légumes sautés', 'base' => 300, 'p' => 4.0, 'g' => 15.0, 'l' => 5.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari porridge', 'base' => 100, 'p' => 2.0, 'g' => 27.0, 'l' => 0.5],
                            ['nom' => 'Banane', 'base' => 120, 'p' => 1.3, 'g' => 27.0, 'l' => 0.3],
                            ['nom' => 'Lait léger', 'base' => 200, 'p' => 6.6, 'g' => 9.6, 'l' => 3.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce légumes', 'base' => 200, 'p' => 5.0, 'g' => 20.0, 'l' => 5.0],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.0, 'g' => 38.0, 'l' => 1.0],
                            ['nom' => 'Légumineuses', 'base' => 100, 'p' => 7.0, 'g' => 15.0, 'l' => 0.8],
                            ['nom' => 'Légumes cuits', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 0.2],
                            ['nom' => 'Yaourt nature', 'base' => 100, 'p' => 3.5, 'g' => 4.5, 'l' => 3.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa enrichi', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Œufs (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Banane plantain', 'base' => 120, 'p' => 1.3, 'g' => 27.0, 'l' => 0.3],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.0, 'g' => 38.0, 'l' => 1.0],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Légumes variés', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce poisson', 'base' => 150, 'p' => 20.0, 'g' => 5.0, 'l' => 5.0],
                            ['nom' => 'Légumes sautés', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 3.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Galette de maïs', 'base' => 50, 'p' => 2.0, 'g' => 35.0, 'l' => 1.0],
                    ['nom' => 'Noix', 'base' => 40, 'p' => 8.0, 'g' => 4.0, 'l' => 20.0],
                    ['nom' => 'Fruit (mangue/papaye)', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.3],
                    ['nom' => 'Cacahuètes grillées', 'base' => 30, 'p' => 8.0, 'g' => 5.0, 'l' => 14.0],
                    ['nom' => 'Galette patate douce', 'base' => 50, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                    ['nom' => 'Lait', 'base' => 100, 'p' => 3.3, 'g' => 4.8, 'l' => 1.6],
                    ['nom' => 'Fromage local', 'base' => 30, 'p' => 7.0, 'g' => 0.5, 'l' => 6.0],
                    ['nom' => 'Concombre', 'base' => 50, 'p' => 0.3, 'g' => 2.0, 'l' => 0.1],
                ]
            ],
        ];
    }
}
