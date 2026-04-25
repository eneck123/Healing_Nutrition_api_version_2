<?php

namespace App\Services;

class FitnessDiabetesNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 250, 'p' => 4.5, 'g' => 38.0, 'l' => 1.5],
                            ['nom' => 'Omelette aux légumes (2 œufs)', 'base' => 100, 'p' => 14.0, 'g' => 3.0, 'l' => 20.0],
                            ['nom' => 'Avocat', 'base' => 70, 'p' => 1.4, 'g' => 6.0, 'l' => 10.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 200, 'p' => 5.0, 'g' => 46.0, 'l' => 1.8],
                            ['nom' => 'Sauce graine légère', 'base' => 100, 'p' => 6.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'Poisson fumé', 'base' => 80, 'p' => 18.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Haricots verts sautés + Salade', 'base' => 150, 'p' => 3.0, 'g' => 7.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ablo', 'base' => 200, 'p' => 6.0, 'g' => 42.0, 'l' => 1.5],
                            ['nom' => 'Soupe de légumes', 'base' => 100, 'p' => 3.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 300, 'p' => 6.0, 'g' => 45.0, 'l' => 2.0],
                            ['nom' => 'Sardines grillées', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 11.0],
                            ['nom' => 'Salade concombre-tomates', 'base' => 100, 'p' => 1.5, 'g' => 4.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname bouillie', 'base' => 250, 'p' => 4.0, 'g' => 56.0, 'l' => 0.4],
                            ['nom' => 'Sauce tomate arachide', 'base' => 100, 'p' => 8.0, 'g' => 10.0, 'l' => 14.0],
                            ['nom' => 'Poulet grillé sans peau', 'base' => 150, 'p' => 33.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Épinards', 'base' => 100, 'p' => 3.0, 'g' => 4.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 250, 'p' => 3.5, 'g' => 58.0, 'l' => 0.6],
                            ['nom' => 'Sauce aubergine', 'base' => 100, 'p' => 4.0, 'g' => 7.0, 'l' => 6.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 13.0, 'g' => 2.0, 'l' => 10.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca', 'base' => 200, 'p' => 0.4, 'g' => 38.0, 'l' => 0.2],
                            ['nom' => 'Poisson frit', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio cuit', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Sauce feuilles baobab', 'base' => 100, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Bœuf maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Légumes grillés', 'base' => 100, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Semoule de maïs', 'base' => 200, 'p' => 6.0, 'g' => 46.0, 'l' => 1.5],
                            ['nom' => 'Sauce tomate/champignons', 'base' => 100, 'p' => 2.5, 'g' => 6.0, 'l' => 0.8],
                            ['nom' => 'Sardines', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 11.0],
                            ['nom' => 'Concombre', 'base' => 50, 'p' => 0.8, 'g' => 2.0, 'l' => 0.1],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 100, 'p' => 8.5, 'g' => 45.0, 'l' => 2.5],
                            ['nom' => 'Haricots rouges', 'base' => 150, 'p' => 12.0, 'g' => 24.0, 'l' => 0.8],
                            ['nom' => 'Tomates', 'base' => 100, 'p' => 1.0, 'g' => 3.5, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Patate douce', 'base' => 200, 'p' => 2.5, 'g' => 42.0, 'l' => 0.4],
                            ['nom' => 'Poisson', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Gombo', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.2],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Manioc', 'base' => 200, 'p' => 2.0, 'g' => 48.0, 'l' => 0.5],
                            ['nom' => 'Soupe de légumes', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Poulet rôti', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Crudités', 'base' => 100, 'p' => 1.5, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 7.5, 'g' => 4.5, 'l' => 15.0],
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.3],
                    ['nom' => 'Mangue verte', 'base' => 150, 'p' => 1.2, 'g' => 20.0, 'l' => 0.6],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de millet', 'base' => 150, 'p' => 5.0, 'g' => 28.5, 'l' => 1.5],
                            ['nom' => 'Omelette aux légumes (2 œufs)', 'base' => 100, 'p' => 12.0, 'g' => 2.0, 'l' => 10.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local complet', 'base' => 150, 'p' => 3.5, 'g' => 40.0, 'l' => 0.5],
                            ['nom' => 'Sauce d’arachide légère', 'base' => 150, 'p' => 6.0, 'g' => 8.0, 'l' => 10.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs', 'base' => 150, 'p' => 5.0, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Ragoût légumes + poisson', 'base' => 150, 'p' => 10.0, 'g' => 8.0, 'l' => 5.0],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 2.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 4.5, 'g' => 31.0, 'l' => 0.5],
                            ['nom' => 'Haricots blancs en sauce', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 1.0],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce feuilles + poisson fumé', 'base' => 150, 'p' => 12.0, 'g' => 3.0, 'l' => 7.0],
                            ['nom' => 'Salade de carottes', 'base' => 100, 'p' => 1.0, 'g' => 7.0, 'l' => 0.2],
                            ['nom' => 'Gombo frais', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate aux champignons', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 2.0],
                            ['nom' => 'Œufs pochés', 'base' => 100, 'p' => 12.0, 'g' => 2.0, 'l' => 10.0],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 3.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca', 'base' => 100, 'p' => 1.5, 'g' => 27.0, 'l' => 0.1],
                            ['nom' => 'Poisson grillé', 'base' => 80, 'p' => 18.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 7.0],
                            ['nom' => 'Piment + tomates', 'base' => 50, 'p' => 0.5, 'g' => 3.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz basmati', 'base' => 150, 'p' => 3.0, 'g' => 41.0, 'l' => 0.5],
                            ['nom' => 'Sauce graine', 'base' => 100, 'p' => 3.0, 'g' => 4.0, 'l' => 6.0],
                            ['nom' => 'Viande maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 2.0, 'g' => 34.0, 'l' => 0.2],
                            ['nom' => 'Soupe légumes verts', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Poulet sans peau', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Salade mixte', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 150, 'p' => 3.0, 'g' => 33.0, 'l' => 0.5],
                            ['nom' => 'Sardines', 'base' => 80, 'p' => 17.0, 'g' => 0.0, 'l' => 9.0],
                            ['nom' => 'Concombre', 'base' => 50, 'p' => 0.3, 'g' => 1.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 1.5, 'g' => 34.0, 'l' => 0.1],
                            ['nom' => 'Sauce feuilles amarante', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 3.0],
                            ['nom' => 'Poisson fumé', 'base' => 80, 'p' => 18.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes grillés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Semoule de mil', 'base' => 150, 'p' => 3.0, 'g' => 33.0, 'l' => 0.5],
                            ['nom' => 'Sauce aubergine', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Œufs durs (2 œufs)', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 11.0],
                            ['nom' => 'Crudités', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 1.0, 'g' => 30.0, 'l' => 0.2],
                    ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 7.5, 'g' => 5.0, 'l' => 15.0],
                    ['nom' => 'Jus de bissap sans sucre', 'base' => 200, 'p' => 0.0, 'g' => 6.0, 'l' => 0.0],
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.0],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 200, 'p' => 3.0, 'g' => 38.0, 'l' => 1.0],
                            ['nom' => 'Omelette 2 œufs aux légumes', 'base' => 100, 'p' => 12.0, 'g' => 2.0, 'l' => 10.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet cuit', 'base' => 200, 'p' => 4.0, 'g' => 56.0, 'l' => 0.8],
                            ['nom' => 'Sauce d’arachide', 'base' => 150, 'p' => 10.0, 'g' => 10.0, 'l' => 15.0],
                            ['nom' => 'Poulet rôti', 'base' => 150, 'p' => 31.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.3],
                            ['nom' => 'Plantain mûr', 'base' => 100, 'p' => 1.0, 'g' => 31.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio cuit', 'base' => 200, 'p' => 5.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Ragoût légumes + poisson', 'base' => 150, 'p' => 10.0, 'g' => 8.0, 'l' => 5.0],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 3.0, 'g' => 40.0, 'l' => 0.6],
                            ['nom' => 'Haricots rouges en sauce', 'base' => 150, 'p' => 11.0, 'g' => 32.0, 'l' => 1.0],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname bouillie', 'base' => 200, 'p' => 2.5, 'g' => 50.0, 'l' => 0.3],
                            ['nom' => 'Sauce graine au poisson', 'base' => 150, 'p' => 9.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 21.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Salade de chou', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Gombo frais', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de manioc', 'base' => 200, 'p' => 6.0, 'g' => 58.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate enrichie', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 2.0],
                            ['nom' => 'Viande maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 3.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari trempé', 'base' => 200, 'p' => 2.0, 'g' => 48.0, 'l' => 0.4],
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 8.0],
                            ['nom' => 'Piment et oignon', 'base' => 30, 'p' => 0.5, 'g' => 3.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 150, 'p' => 4.0, 'g' => 45.0, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles baobab', 'base' => 100, 'p' => 3.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Bœuf maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Haricots verts', 'base' => 80, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Carottes râpées', 'base' => 50, 'p' => 0.5, 'g' => 4.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Soupe légumes verts', 'base' => 150, 'p' => 2.0, 'g' => 6.0, 'l' => 0.3],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Salade mixte', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 0.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 220, 'p' => 5.0, 'g' => 40.0, 'l' => 1.5],
                            ['nom' => 'Œufs brouillés 2 œufs', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Légumes (tomates, oignon)', 'base' => 80, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Patate douce', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 0.3],
                            ['nom' => 'Sauce tomate aux champignons', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes grillés', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Semoule de maïs', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce aubergine', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 3.0],
                            ['nom' => 'Sardines', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Crudités', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 0.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 7.5, 'g' => 5.0, 'l' => 15.0],
                    ['nom' => 'Mangue', 'base' => 150, 'p' => 1.2, 'g' => 20.0, 'l' => 0.6],
                    ['nom' => 'Noix de cajou', 'base' => 30, 'p' => 5.0, 'g' => 9.0, 'l' => 15.0],
                    ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.0],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Omelette 3 œufs + légumes', 'base' => 180, 'p' => 21.0, 'g' => 3.0, 'l' => 15.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 7.0],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 5.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Jus de bissap', 'base' => 200, 'p' => 0.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 10.0, 'g' => 110.0, 'l' => 2.0],
                            ['nom' => 'Sauce d’arachide légère', 'base' => 50, 'p' => 10.0, 'g' => 5.0, 'l' => 8.0],
                            ['nom' => 'Poulet grillé', 'base' => 150, 'p' => 31.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Igname bouillie', 'base' => 200, 'p' => 2.0, 'g' => 40.0, 'l' => 0.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 5.0, 'g' => 110.0, 'l' => 1.0],
                            ['nom' => 'Ragoût de légumes', 'base' => 100, 'p' => 3.0, 'g' => 10.0, 'l' => 3.0],
                            ['nom' => 'Poisson braisé', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 0.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 0.0],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Banane plantain bouillie', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Salade (tomate, concombre, carotte)', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 200, 'p' => 2.0, 'g' => 40.0, 'l' => 0.0],
                            ['nom' => 'Sauce graine au poisson', 'base' => 50, 'p' => 10.0, 'g' => 5.0, 'l' => 8.0],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Gombo frais', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de manioc', 'base' => 150, 'p' => 4.0, 'g' => 115.0, 'l' => 0.0],
                            ['nom' => 'Sauce tomate enrichie', 'base' => 100, 'p' => 2.0, 'g' => 10.0, 'l' => 2.0],
                            ['nom' => 'Viande maigre', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Légumes grillés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Manioc bouilli', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari', 'base' => 200, 'p' => 2.0, 'g' => 150.0, 'l' => 0.5],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 7.0],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.2],
                            ['nom' => 'Tomates', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                            ['nom' => 'Piment', 'base' => 10, 'p' => 0.2, 'g' => 1.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz basmati', 'base' => 150, 'p' => 4.0, 'g' => 115.0, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Bœuf maigre', 'base' => 150, 'p' => 31.0, 'g' => 0.0, 'l' => 7.0],
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 1.5, 'g' => 36.0, 'l' => 0.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 3.0, 'g' => 100.0, 'l' => 0.5],
                            ['nom' => 'Soupe nutritive', 'base' => 200, 'p' => 5.0, 'g' => 15.0, 'l' => 3.0],
                            ['nom' => 'Poisson fumé', 'base' => 150, 'p' => 28.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Manioc', 'base' => 150, 'p' => 1.5, 'g' => 36.0, 'l' => 0.0],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 5.0, 'g' => 36.0, 'l' => 1.0],
                            ['nom' => 'Œufs', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 4.0, 'g' => 25.0, 'l' => 1.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 5.0, 'g' => 110.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate champignons', 'base' => 100, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Poulet', 'base' => 150, 'p' => 31.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Igname', 'base' => 150, 'p' => 1.5, 'g' => 36.0, 'l' => 0.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Semoule de maïs', 'base' => 150, 'p' => 3.0, 'g' => 110.0, 'l' => 0.5],
                            ['nom' => 'Sauce aubergine enrichie', 'base' => 150, 'p' => 3.0, 'g' => 8.0, 'l' => 5.0],
                            ['nom' => 'Sardines', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Plantain', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.2],
                            ['nom' => 'Crudités', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.0, 'g' => 25.0, 'l' => 0.0],
                    ['nom' => 'Mangue', 'base' => 100, 'p' => 1.0, 'g' => 15.0, 'l' => 0.0],
                    ['nom' => 'Papaye + Eau de coco', 'base' => 300, 'p' => 1.5, 'g' => 35.0, 'l' => 0.2],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 2.0],
                            ['nom' => 'Omelette 3 œufs + légumes', 'base' => 180, 'p' => 18.0, 'g' => 3.0, 'l' => 15.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 7.0],
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 2.0],
                            ['nom' => 'Banane plantain bouillie', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Sauce d\'arachide', 'base' => 50, 'p' => 12.0, 'g' => 6.0, 'l' => 20.0],
                            ['nom' => 'Poulet grillé', 'base' => 150, 'p' => 32.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 1.0, 'g' => 30.0, 'l' => 0.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 100, 'p' => 4.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Ragoût de légumes complet', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 5.0],
                            ['nom' => 'Poisson braisé', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Manioc bouilli', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Plantain', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 0.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 3.0, 'g' => 45.0, 'l' => 0.0],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Plantain bouilli', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Salade complète', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Sauce graine enrichie', 'base' => 50, 'p' => 10.0, 'g' => 5.0, 'l' => 18.0],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Fonio', 'base' => 100, 'p' => 4.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Salade complète', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 0.0],
                            ['nom' => 'Gombo', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous manioc', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Sauce tomate enrichie', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 2.0],
                            ['nom' => 'Viande maigre', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Riz', 'base' => 100, 'p' => 2.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Légumes grillés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Crudités', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 0.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari trempé', 'base' => 150, 'p' => 1.5, 'g' => 50.0, 'l' => 0.2],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 7.0],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.0, 'g' => 25.0, 'l' => 0.3],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.0, 'g' => 0.6, 'l' => 5.0],
                            ['nom' => 'Tomates', 'base' => 50, 'p' => 0.5, 'g' => 3.0, 'l' => 0.1],
                            ['nom' => 'Légumes', 'base' => 50, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz basmati', 'base' => 150, 'p' => 6.0, 'g' => 45.0, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles enrichie', 'base' => 100, 'p' => 3.0, 'g' => 8.0, 'l' => 4.0],
                            ['nom' => 'Bœuf maigre', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 7.0],
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.0, 'g' => 27.0, 'l' => 0.1],
                            ['nom' => 'Igname', 'base' => 150, 'p' => 2.0, 'g' => 28.0, 'l' => 0.1],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Soupe nutritive', 'base' => 200, 'p' => 5.0, 'g' => 10.0, 'l' => 5.0],
                            ['nom' => 'Poisson fumé', 'base' => 150, 'p' => 25.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Riz', 'base' => 150, 'p' => 6.0, 'g' => 45.0, 'l' => 0.5],
                            ['nom' => 'Plantain', 'base' => 100, 'p' => 1.0, 'g' => 25.0, 'l' => 0.3],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 5.0, 'g' => 45.0, 'l' => 1.0],
                            ['nom' => 'Omelette 3 œufs', 'base' => 150, 'p' => 18.0, 'g' => 1.8, 'l' => 15.0],
                            ['nom' => 'Pain complet', 'base' => 100, 'p' => 6.0, 'g' => 30.0, 'l' => 3.0],
                            ['nom' => 'Haricots', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 7.0, 'g' => 40.0, 'l' => 0.4],
                            ['nom' => 'Sauce tomate champignons', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 2.0],
                            ['nom' => 'Poulet', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Manioc', 'base' => 150, 'p' => 1.0, 'g' => 30.0, 'l' => 0.1],
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Semoule de maïs', 'base' => 150, 'p' => 7.0, 'g' => 45.0, 'l' => 0.5],
                            ['nom' => 'Sauce aubergine enrichie', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 4.0],
                            ['nom' => 'Sardines', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 7.0],
                            ['nom' => 'Igname', 'base' => 150, 'p' => 2.0, 'g' => 28.0, 'l' => 0.1],
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 7.0, 'g' => 40.0, 'l' => 0.4],
                            ['nom' => 'Crudités', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Arachides', 'base' => 30, 'p' => 8.0, 'g' => 4.0, 'l' => 14.0],
                    ['nom' => 'Mangue', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.0],
                    ['nom' => 'Poisson séché', 'base' => 50, 'p' => 15.0, 'g' => 0.0, 'l' => 1.0],
                    ['nom' => 'Papaye', 'base' => 150, 'p' => 1.0, 'g' => 15.0, 'l' => 0.0],
                    ['nom' => 'Mélange noix', 'base' => 30, 'p' => 5.0, 'g' => 10.0, 'l' => 15.0],
                ]
            ],
        ];
    }
}
