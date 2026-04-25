<?php

namespace App\Services;

class FitnessNoPathologyNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs avec lait', 'base' => 200, 'p' => 6.5, 'g' => 38.0, 'l' => 3.5],
                            ['nom' => 'Œufs au plat (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 14.0],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 4.5, 'g' => 25.0, 'l' => 1.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local au gras', 'base' => 200, 'p' => 5.0, 'g' => 45.0, 'l' => 8.0],
                            ['nom' => 'Poulet braisé', 'base' => 150, 'p' => 38.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 2.0, 'g' => 8.0, 'l' => 5.0],
                            ['nom' => 'Salade composée', 'base' => 150, 'p' => 2.0, 'g' => 6.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 200, 'p' => 3.0, 'g' => 56.0, 'l' => 0.3],
                            ['nom' => 'Poisson frit', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 15.0],
                            ['nom' => 'Légumes sautés', 'base' => 150, 'p' => 3.0, 'g' => 8.0, 'l' => 5.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca au lait/sucre', 'base' => 200, 'p' => 5.0, 'g' => 50.0, 'l' => 3.0],
                            ['nom' => 'Beignets (doukourou)', 'base' => 100, 'p' => 6.0, 'g' => 45.0, 'l' => 12.0],
                            ['nom' => 'Fruit (Orange)', 'base' => 150, 'p' => 1.5, 'g' => 18.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké', 'base' => 200, 'p' => 3.0, 'g' => 48.0, 'l' => 0.5],
                            ['nom' => 'Poisson braisé', 'base' => 150, 'p' => 33.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Aloco (banane frite)', 'base' => 100, 'p' => 1.5, 'g' => 35.0, 'l' => 10.0],
                            ['nom' => 'Salade de crudités', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 5.0, 'g' => 46.0, 'l' => 1.5],
                            ['nom' => 'Sauce gombo à la viande', 'base' => 150, 'p' => 25.0, 'g' => 6.0, 'l' => 12.0],
                            ['nom' => 'Manioc bouilli', 'base' => 100, 'p' => 1.0, 'g' => 36.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Soja bouilli', 'base' => 100, 'p' => 16.0, 'g' => 10.0, 'l' => 9.0],
                            ['nom' => 'Gari (foufou)', 'base' => 50, 'p' => 0.5, 'g' => 40.0, 'l' => 0.1],
                            ['nom' => 'Mangue', 'base' => 150, 'p' => 1.2, 'g' => 25.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio aux légumes', 'base' => 200, 'p' => 5.0, 'g' => 44.0, 'l' => 1.5],
                            ['nom' => 'Filet de bœuf grillé', 'base' => 150, 'p' => 35.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Haricots verts sautés', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce frite', 'base' => 200, 'p' => 3.0, 'g' => 45.0, 'l' => 10.0],
                            ['nom' => 'Sardines grillées', 'base' => 120, 'p' => 30.0, 'g' => 0.0, 'l' => 15.0],
                            ['nom' => 'Soupe de légumes', 'base' => 200, 'p' => 3.0, 'g' => 12.0, 'l' => 1.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 80, 'p' => 7.2, 'g' => 40.0, 'l' => 2.5],
                            ['nom' => 'Omelette fromage (2 œufs)', 'base' => 120, 'p' => 18.0, 'g' => 2.0, 'l' => 20.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.5, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous de blé', 'base' => 200, 'p' => 7.5, 'g' => 46.0, 'l' => 1.0],
                            ['nom' => 'Mouton en sauce', 'base' => 150, 'p' => 30.0, 'g' => 5.0, 'l' => 15.0],
                            ['nom' => 'Légumes variés', 'base' => 200, 'p' => 4.0, 'g' => 12.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Semoule de mil', 'base' => 150, 'p' => 4.5, 'g' => 34.0, 'l' => 1.2],
                            ['nom' => 'Brochettes de poulet', 'base' => 150, 'p' => 38.0, 'g' => 2.0, 'l' => 8.0],
                            ['nom' => 'Salade et frites de plantain', 'base' => 200, 'p' => 3.0, 'g' => 40.0, 'l' => 10.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Arachides salées', 'base' => 30, 'p' => 7.5, 'g' => 4.5, 'l' => 15.0],
                    ['nom' => 'Papaye', 'base' => 200, 'p' => 1.2, 'g' => 22.0, 'l' => 0.1],
                    ['nom' => 'Yaourt sucré', 'base' => 125, 'p' => 4.5, 'g' => 18.0, 'l' => 4.0],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs avec lait et sucre', 'base' => 200, 'p' => 7.0, 'g' => 45.0, 'l' => 4.0],
                            ['nom' => 'Œufs au plat (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 14.0],
                            ['nom' => 'Pain complet', 'base' => 60, 'p' => 5.5, 'g' => 30.0, 'l' => 1.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local au gras', 'base' => 200, 'p' => 5.0, 'g' => 45.0, 'l' => 10.0],
                            ['nom' => 'Poulet rôti', 'base' => 150, 'p' => 38.0, 'g' => 0.0, 'l' => 12.0],
                            ['nom' => 'Sauce graine', 'base' => 100, 'p' => 5.0, 'g' => 7.0, 'l' => 15.0],
                            ['nom' => 'Salade riche', 'base' => 200, 'p' => 3.0, 'g' => 8.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée', 'base' => 200, 'p' => 3.0, 'g' => 55.0, 'l' => 0.4],
                            ['nom' => 'Poisson frit', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 18.0],
                            ['nom' => 'Sauce tomate/oignon', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 6.0],
                            ['nom' => 'Banane plantain vapeur', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.4],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca au lait complet', 'base' => 200, 'p' => 6.0, 'g' => 52.0, 'l' => 6.0],
                            ['nom' => 'Doukourou (beignets)', 'base' => 150, 'p' => 9.0, 'g' => 65.0, 'l' => 18.0],
                            ['nom' => 'Ananas', 'base' => 150, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké gras', 'base' => 250, 'p' => 4.0, 'g' => 60.0, 'l' => 5.0],
                            ['nom' => 'Poisson braisé', 'base' => 180, 'p' => 40.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Aloco', 'base' => 150, 'p' => 2.0, 'g' => 52.0, 'l' => 15.0],
                            ['nom' => 'Crudités', 'base' => 150, 'p' => 1.5, 'g' => 6.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 5.5, 'g' => 48.0, 'l' => 1.8],
                            ['nom' => 'Sauce gombo à la viande', 'base' => 150, 'p' => 28.0, 'g' => 7.0, 'l' => 15.0],
                            ['nom' => 'Manioc bouilli', 'base' => 150, 'p' => 1.5, 'g' => 54.0, 'l' => 0.3],
                            ['nom' => 'Gombo frais extra', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Arachides et Noix de coco', 'base' => 50, 'p' => 8.0, 'g' => 8.0, 'l' => 22.0],
                    ['nom' => 'Banane mûre', 'base' => 150, 'p' => 1.8, 'g' => 34.5, 'l' => 0.5],
                    ['nom' => 'Yaourt aux fruits', 'base' => 125, 'p' => 4.0, 'g' => 20.0, 'l' => 4.5],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie au lait', 'base' => 250, 'p' => 8.5, 'g' => 52.0, 'l' => 6.0],
                            ['nom' => 'Œufs au plat (3)', 'base' => 150, 'p' => 18.0, 'g' => 1.5, 'l' => 21.0],
                            ['nom' => 'Pain complet', 'base' => 80, 'p' => 7.2, 'g' => 40.0, 'l' => 2.5],
                            ['nom' => 'Banane', 'base' => 150, 'p' => 1.8, 'g' => 34.5, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local au gras extra', 'base' => 250, 'p' => 6.5, 'g' => 56.5, 'l' => 12.5],
                            ['nom' => 'Poulet rôti copieux', 'base' => 200, 'p' => 50.0, 'g' => 0.0, 'l' => 16.0],
                            ['nom' => 'Sauce graine riche', 'base' => 150, 'p' => 7.5, 'g' => 10.5, 'l' => 22.5],
                            ['nom' => 'Salade nutritive', 'base' => 200, 'p' => 4.0, 'g' => 12.0, 'l' => 8.0],
                            ['nom' => 'Attiéké', 'base' => 100, 'p' => 1.5, 'g' => 24.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée copieuse', 'base' => 250, 'p' => 3.8, 'g' => 68.8, 'l' => 0.5],
                            ['nom' => 'Poisson frit riche', 'base' => 200, 'p' => 40.0, 'g' => 0.0, 'l' => 24.0],
                            ['nom' => 'Sauce tomate riche', 'base' => 150, 'p' => 3.0, 'g' => 9.0, 'l' => 9.0],
                            ['nom' => 'Banane plantain frite', 'base' => 150, 'p' => 2.0, 'g' => 52.5, 'l' => 15.0],
                            ['nom' => 'Légumes variés sautés', 'base' => 150, 'p' => 3.0, 'g' => 9.0, 'l' => 7.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca enrichi', 'base' => 250, 'p' => 7.5, 'g' => 65.0, 'l' => 10.0],
                            ['nom' => 'Doukourou (plusieurs)', 'base' => 200, 'p' => 12.0, 'g' => 90.0, 'l' => 24.0],
                            ['nom' => 'Mangue ou Ananas', 'base' => 200, 'p' => 1.5, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Arachides', 'base' => 30, 'p' => 7.5, 'g' => 4.5, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké gras copieux', 'base' => 300, 'p' => 5.0, 'g' => 72.0, 'l' => 7.5],
                            ['nom' => 'Poisson braisé large', 'base' => 250, 'p' => 55.0, 'g' => 0.0, 'l' => 15.0],
                            ['nom' => 'Aloco généreux', 'base' => 200, 'p' => 3.0, 'g' => 70.0, 'l' => 20.0],
                            ['nom' => 'Fonio aux légumes', 'base' => 150, 'p' => 4.0, 'g' => 33.0, 'l' => 1.5],
                            ['nom' => 'Salade complète', 'base' => 200, 'p' => 2.5, 'g' => 8.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs copieuse', 'base' => 250, 'p' => 7.0, 'g' => 60.0, 'l' => 2.5],
                            ['nom' => 'Sauce gombo à la viande extra', 'base' => 200, 'p' => 35.0, 'g' => 10.0, 'l' => 20.0],
                            ['nom' => 'Manioc bouilli riche', 'base' => 200, 'p' => 2.0, 'g' => 72.0, 'l' => 0.5],
                            ['nom' => 'Patate douce frite', 'base' => 150, 'p' => 2.5, 'g' => 33.0, 'l' => 12.0],
                            ['nom' => 'Crudités variées', 'base' => 150, 'p' => 2.0, 'g' => 6.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix et Fruits secs', 'base' => 60, 'p' => 10.0, 'g' => 20.0, 'l' => 25.0],
                    ['nom' => 'Yaourt grec sucré', 'base' => 170, 'p' => 12.0, 'g' => 25.0, 'l' => 8.0],
                    ['nom' => 'Biscottes et fromage local', 'base' => 100, 'p' => 15.0, 'g' => 30.0, 'l' => 15.0],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie (lait/sucre)', 'base' => 300, 'p' => 10.5, 'g' => 70.0, 'l' => 8.0],
                            ['nom' => 'Œufs au plat (4)', 'base' => 200, 'p' => 24.0, 'g' => 2.0, 'l' => 28.0],
                            ['nom' => 'Pain complet (large)', 'base' => 120, 'p' => 10.8, 'g' => 60.0, 'l' => 4.0],
                            ['nom' => 'Banane (2)', 'base' => 300, 'p' => 3.6, 'g' => 69.0, 'l' => 1.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local au gras (très grande portion)', 'base' => 350, 'p' => 9.0, 'g' => 79.0, 'l' => 17.5],
                            ['nom' => 'Poulet rôti entier (quart)', 'base' => 250, 'p' => 62.5, 'g' => 0.0, 'l' => 20.0],
                            ['nom' => 'Sauce graine extra', 'base' => 200, 'p' => 10.0, 'g' => 14.0, 'l' => 30.0],
                            ['nom' => 'Salade nutritive large', 'base' => 300, 'p' => 6.0, 'g' => 18.0, 'l' => 12.0],
                            ['nom' => 'Attiéké copieux', 'base' => 150, 'p' => 2.3, 'g' => 36.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée (X-large)', 'base' => 350, 'p' => 5.2, 'g' => 96.0, 'l' => 0.7],
                            ['nom' => 'Poisson frit riche (2 parts)', 'base' => 300, 'p' => 60.0, 'g' => 0.0, 'l' => 36.0],
                            ['nom' => 'Sauce tomate riche', 'base' => 200, 'p' => 4.0, 'g' => 12.0, 'l' => 12.0],
                            ['nom' => 'Banane plantain frite (X-large)', 'base' => 250, 'p' => 3.3, 'g' => 87.5, 'l' => 25.0],
                            ['nom' => 'Légumes variés copieux', 'base' => 250, 'p' => 5.0, 'g' => 15.0, 'l' => 12.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca enrichi (X-large)', 'base' => 350, 'p' => 11.0, 'g' => 95.0, 'l' => 15.0],
                            ['nom' => 'Doukourou (grande portion)', 'base' => 300, 'p' => 18.0, 'g' => 135.0, 'l' => 36.0],
                            ['nom' => 'Mangue/Ananas large', 'base' => 300, 'p' => 2.5, 'g' => 45.0, 'l' => 1.0],
                            ['nom' => 'Arachides salées', 'base' => 60, 'p' => 15.0, 'g' => 9.0, 'l' => 30.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké gras (X-large)', 'base' => 400, 'p' => 6.5, 'g' => 96.0, 'l' => 10.0],
                            ['nom' => 'Poisson braisé entier', 'base' => 350, 'p' => 77.0, 'g' => 0.0, 'l' => 21.0],
                            ['nom' => 'Aloco (portion XXL)', 'base' => 300, 'p' => 4.5, 'g' => 105.0, 'l' => 30.0],
                            ['nom' => 'Fonio complet large', 'base' => 200, 'p' => 5.5, 'g' => 44.0, 'l' => 2.0],
                            ['nom' => 'Salade riche complète', 'base' => 300, 'p' => 4.0, 'g' => 12.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs (portion XXL)', 'base' => 350, 'p' => 10.0, 'g' => 84.0, 'l' => 3.5],
                            ['nom' => 'Sauce gombo à la viande extra (XXL)', 'base' => 300, 'p' => 52.5, 'g' => 15.0, 'l' => 30.0],
                            ['nom' => 'Manioc bouilli riche (large)', 'base' => 300, 'p' => 3.0, 'g' => 108.0, 'l' => 0.8],
                            ['nom' => 'Patate douce frite large', 'base' => 250, 'p' => 4.2, 'g' => 55.0, 'l' => 20.0],
                            ['nom' => 'Crudités et légumes vapeur', 'base' => 300, 'p' => 4.0, 'g' => 12.0, 'l' => 1.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix, Fruits secs et Graines', 'base' => 100, 'p' => 18.0, 'g' => 35.0, 'l' => 45.0],
                    ['nom' => 'Yaourt grec entier + fruits', 'base' => 250, 'p' => 20.0, 'g' => 45.0, 'l' => 12.0],
                    ['nom' => 'Galettes énergétiques locales', 'base' => 150, 'p' => 15.0, 'g' => 80.0, 'l' => 25.0],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs très riche', 'base' => 400, 'p' => 14.0, 'g' => 95.0, 'l' => 12.0],
                            ['nom' => 'Œufs au plat (5)', 'base' => 250, 'p' => 30.0, 'g' => 2.5, 'l' => 35.0],
                            ['nom' => 'Pain complet (portion XXL)', 'base' => 150, 'p' => 13.5, 'g' => 75.0, 'l' => 5.0],
                            ['nom' => 'Banane (3)', 'base' => 450, 'p' => 5.4, 'g' => 103.5, 'l' => 1.5],
                            ['nom' => 'Beurre de cacahuète', 'base' => 40, 'p' => 10.0, 'g' => 8.0, 'l' => 20.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local au gras (portion gargantuesque)', 'base' => 500, 'p' => 12.5, 'g' => 112.5, 'l' => 25.0],
                            ['nom' => 'Poulet rôti (demi-poulet)', 'base' => 400, 'p' => 100.0, 'g' => 0.0, 'l' => 32.0],
                            ['nom' => 'Sauce graine XXL', 'base' => 300, 'p' => 15.0, 'g' => 21.0, 'l' => 45.0],
                            ['nom' => 'Salade riche XXL', 'base' => 400, 'p' => 8.0, 'g' => 24.0, 'l' => 16.0],
                            ['nom' => 'Attiéké XXL', 'base' => 250, 'p' => 3.8, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Plantain frit extra', 'base' => 200, 'p' => 2.6, 'g' => 70.0, 'l' => 20.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée (portion XXL)', 'base' => 500, 'p' => 7.5, 'g' => 140.0, 'l' => 1.0],
                            ['nom' => 'Poisson frit geant', 'base' => 400, 'p' => 80.0, 'g' => 0.0, 'l' => 48.0],
                            ['nom' => 'Sauce tomate/crevettes riche', 'base' => 300, 'p' => 35.0, 'g' => 20.0, 'l' => 18.0],
                            ['nom' => 'Banane plantain frite XXL', 'base' => 300, 'p' => 4.0, 'g' => 105.0, 'l' => 30.0],
                            ['nom' => 'Fonio aux légumes XXL', 'base' => 250, 'p' => 7.0, 'g' => 55.0, 'l' => 2.5],
                            ['nom' => 'Légumes variés sautés XXL', 'base' => 300, 'p' => 6.0, 'g' => 18.0, 'l' => 15.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca XXL enrichi', 'base' => 450, 'p' => 14.5, 'g' => 125.0, 'l' => 20.0],
                            ['nom' => 'Doukourou XXL', 'base' => 400, 'p' => 24.0, 'g' => 180.0, 'l' => 48.0],
                            ['nom' => 'Fruits variés (Mangue, Ananas, Papaye)', 'base' => 500, 'p' => 4.5, 'g' => 75.0, 'l' => 2.0],
                            ['nom' => 'Arachides salées large', 'base' => 100, 'p' => 25.0, 'g' => 15.0, 'l' => 50.0],
                            ['nom' => 'Yaourt entier sucré', 'base' => 250, 'p' => 9.0, 'g' => 36.0, 'l' => 8.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké gras XXL', 'base' => 500, 'p' => 8.0, 'g' => 120.0, 'l' => 12.5],
                            ['nom' => 'Poisson braisé XXL entier', 'base' => 500, 'p' => 110.0, 'g' => 0.0, 'l' => 30.0],
                            ['nom' => 'Aloco XXL', 'base' => 400, 'p' => 6.0, 'g' => 140.0, 'l' => 40.0],
                            ['nom' => 'Fonio complet XXL', 'base' => 300, 'p' => 8.0, 'g' => 66.0, 'l' => 3.0],
                            ['nom' => 'Manioc bouilli large', 'base' => 300, 'p' => 3.0, 'g' => 108.0, 'l' => 0.8],
                            ['nom' => 'Salade riche XXL complète', 'base' => 400, 'p' => 5.0, 'g' => 16.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs XXL', 'base' => 450, 'p' => 13.0, 'g' => 108.0, 'l' => 4.5],
                            ['nom' => 'Sauce gombo à la viande XXL riche', 'base' => 400, 'p' => 70.0, 'g' => 20.0, 'l' => 40.0],
                            ['nom' => 'Manioc bouilli XXL riche', 'base' => 400, 'p' => 4.0, 'g' => 144.0, 'l' => 1.0],
                            ['nom' => 'Patate douce frite XXL', 'base' => 350, 'p' => 6.0, 'g' => 77.0, 'l' => 25.0],
                            ['nom' => 'Igname pilée large', 'base' => 300, 'p' => 4.5, 'g' => 82.5, 'l' => 0.4],
                            ['nom' => 'Crudités et légumes vapeur XXL', 'base' => 400, 'p' => 5.5, 'g' => 16.0, 'l' => 1.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mix de noix, graines et fruits secs XXL', 'base' => 150, 'p' => 25.0, 'g' => 55.0, 'l' => 70.0],
                    ['nom' => 'Smoothie protéiné géant local aux fruits', 'base' => 750, 'p' => 40.0, 'g' => 120.0, 'l' => 30.0],
                    ['nom' => 'Gros sandwich pain complet/fromage/œufs', 'base' => 300, 'p' => 35.0, 'g' => 90.0, 'l' => 35.0],
                ]
            ],
        ];
    }
}
