<?php

namespace App\Services;

class WeightLossUnder5NoPathologyNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Omelette aux légumes (2 œufs, tomates, oignons, poivrons)', 'base' => 150, 'p' => 12.6, 'g' => 3.0, 'l' => 10.2],
                            ['nom' => 'Pain complet (petite tranche)', 'base' => 30, 'p' => 2.4, 'g' => 12.0, 'l' => 0.9],
                            ['nom' => 'Salade de papaye verte', 'base' => 100, 'p' => 0.5, 'g' => 10.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce graine (poisson fumé, peu d\'huile)', 'base' => 200, 'p' => 12.0, 'g' => 10.0, 'l' => 14.0],
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.2, 'g' => 39.0, 'l' => 1.4],
                            ['nom' => 'Salade concombre-tomates', 'base' => 150, 'p' => 1.0, 'g' => 8.0, 'l' => 0.2],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 4.8],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de poisson + légumes', 'base' => 300, 'p' => 9.0, 'g' => 12.0, 'l' => 6.0],
                            ['nom' => 'Igname bouillie', 'base' => 100, 'p' => 1.4, 'g' => 26.0, 'l' => 0.2],
                            ['nom' => 'Salade d\'avocat', 'base' => 100, 'p' => 1.6, 'g' => 8.0, 'l' => 10.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 150, 'p' => 2.0, 'g' => 20.0, 'l' => 1.0],
                            ['nom' => 'Lait concentré non sucré', 'base' => 50, 'p' => 1.5, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 9.0, 'g' => 9.0, 'l' => 15.0],
                            ['nom' => 'Avocat', 'base' => 70, 'p' => 1.1, 'g' => 6.0, 'l' => 13.3],
                            ['nom' => 'Eau citronnée', 'base' => 250, 'p' => 0.0, 'g' => 1.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Ragoût de légumes', 'base' => 250, 'p' => 5.0, 'g' => 20.0, 'l' => 5.0],
                            ['nom' => 'Poulet DG modifié (moins d\'huile)', 'base' => 120, 'p' => 26.4, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Riz blanc cuit', 'base' => 100, 'p' => 2.5, 'g' => 28.0, 'l' => 0.3],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.1, 'g' => 2.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges en sauce tomate', 'base' => 180, 'p' => 11.0, 'g' => 30.0, 'l' => 3.0],
                            ['nom' => 'Alloco (plantain frit modéré)', 'base' => 80, 'p' => 1.2, 'g' => 24.0, 'l' => 8.0],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Salade de laitue', 'base' => 100, 'p' => 0.9, 'g' => 1.5, 'l' => 0.1],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa (maïs fermenté)', 'base' => 200, 'p' => 3.2, 'g' => 34.0, 'l' => 2.0],
                            ['nom' => 'Sauce d\'arachide légère', 'base' => 120, 'p' => 6.0, 'g' => 8.0, 'l' => 10.0],
                            ['nom' => 'Œuf dur (1)', 'base' => 50, 'p' => 6.3, 'g' => 0.6, 'l' => 5.3],
                            ['nom' => 'Orange pressée (sans sucre)', 'base' => 250, 'p' => 1.7, 'g' => 22.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce d\'arachide allégée', 'base' => 180, 'p' => 8.0, 'g' => 12.0, 'l' => 14.0],
                            ['nom' => 'Bœuf maigre', 'base' => 120, 'p' => 26.4, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Igname (pâte)', 'base' => 120, 'p' => 1.7, 'g' => 31.2, 'l' => 0.2],
                            ['nom' => 'Salade de carottes râpées', 'base' => 150, 'p' => 1.2, 'g' => 11.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce tomate aux légumes', 'base' => 250, 'p' => 4.0, 'g' => 20.0, 'l' => 6.0],
                            ['nom' => 'Couscous de maïs', 'base' => 100, 'p' => 3.2, 'g' => 70.0, 'l' => 1.8],
                            ['nom' => 'Poulet grillé (sans peau)', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Salade mixte', 'base' => 150, 'p' => 1.6, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akoumé (pâte de maïs)', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 2.0],
                            ['nom' => 'Soupe de poisson légère', 'base' => 300, 'p' => 18.0, 'g' => 6.0, 'l' => 4.0],
                            ['nom' => 'Avocat', 'base' => 70, 'p' => 1.1, 'g' => 6.0, 'l' => 13.3],
                            ['nom' => 'Infusion de gingembre', 'base' => 250, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Atassi (riz + haricots)', 'base' => 150, 'p' => 6.8, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Poisson frit', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Salade de chou', 'base' => 150, 'p' => 1.3, 'g' => 7.0, 'l' => 0.2],
                            ['nom' => 'Tomates fraîches', 'base' => 100, 'p' => 0.9, 'g' => 3.9, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de gombos', 'base' => 350, 'p' => 7.0, 'g' => 10.0, 'l' => 3.5],
                            ['nom' => 'Foufou d\'igname', 'base' => 100, 'p' => 1.4, 'g' => 26.0, 'l' => 0.3],
                            ['nom' => 'Crabe ou crevettes', 'base' => 80, 'p' => 17.6, 'g' => 0.0, 'l' => 1.6],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix de cajou', 'base' => 20, 'p' => 4.0, 'g' => 8.0, 'l' => 12.0],
                    ['nom' => 'Petit fruit (ex. mandarine)', 'base' => 100, 'p' => 0.8, 'g' => 12.0, 'l' => 0.2],
                    ['nom' => 'Yaourt nature', 'base' => 125, 'p' => 5.5, 'g' => 7.0, 'l' => 3.5],
                    ['nom' => 'Ananas frais', 'base' => 100, 'p' => 0.8, 'g' => 12.0, 'l' => 0.2],
                    ['nom' => 'Arachides bouillies', 'base' => 30, 'p' => 6.0, 'g' => 5.0, 'l' => 15.0],
                    ['nom' => 'Mangue fraîche', 'base' => 150, 'p' => 1.2, 'g' => 25.0, 'l' => 0.6],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 2.8, 'g' => 36.0, 'l' => 2.0],
                            ['nom' => 'Egg coque (œuf)', 'base' => 60, 'p' => 7.6, 'g' => 0.66, 'l' => 6.36],
                            ['nom' => 'Plantain bouilli', 'base' => 80, 'p' => 0.64, 'g' => 23.1, 'l' => 0.14],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Rice jollof', 'base' => 180, 'p' => 5.0, 'g' => 50.4, 'l' => 0.54],
                            ['nom' => 'Poulet grillé', 'base' => 140, 'p' => 37.8, 'g' => 0.0, 'l' => 4.2],
                            ['nom' => 'Salade', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 0.3],
                            ['nom' => 'Light vinaigrette', 'base' => 15, 'p' => 0.0, 'g' => 3.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce feuilles + arachide', 'base' => 150, 'p' => 6.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'Igname pilée', 'base' => 120, 'p' => 2.0, 'g' => 33.4, 'l' => 0.24],
                            ['nom' => 'Chèvre grillé', 'base' => 100, 'p' => 27.0, 'g' => 0.0, 'l' => 14.0],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 60, 'p' => 5.4, 'g' => 24.0, 'l' => 2.4],
                            ['nom' => 'Omelette', 'base' => 100, 'p' => 12.6, 'g' => 1.1, 'l' => 10.6],
                            ['nom' => 'Avocat', 'base' => 70, 'p' => 1.4, 'g' => 6.3, 'l' => 10.5],
                            ['nom' => 'Bissap jus', 'base' => 200, 'p' => 0.0, 'g' => 8.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Red pasta + sauce gombo', 'base' => 180, 'p' => 7.2, 'g' => 60.0, 'l' => 1.8],
                            ['nom' => 'Poisson braisé', 'base' => 140, 'p' => 28.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots blancs ragoût', 'base' => 150, 'p' => 13.2, 'g' => 30.0, 'l' => 0.75],
                            ['nom' => 'Gari', 'base' => 100, 'p' => 0.3, 'g' => 28.0, 'l' => 0.1],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes crus', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 0.3],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akpan (maïs fermenté)', 'base' => 200, 'p' => 3.0, 'g' => 30.0, 'l' => 2.0],
                            ['nom' => 'Beignet haricot (2 petits)', 'base' => 50, 'p' => 7.0, 'g' => 20.0, 'l' => 3.0],
                            ['nom' => 'Orange', 'base' => 150, 'p' => 1.35, 'g' => 16.5, 'l' => 0.15],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz cuit (tchep adapt)', 'base' => 180, 'p' => 5.0, 'g' => 50.4, 'l' => 0.54],
                            ['nom' => 'Poisson', 'base' => 140, 'p' => 37.8, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Salade de carottes', 'base' => 50, 'p' => 0.45, 'g' => 5.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce arachide légère', 'base' => 100, 'p' => 6.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'Couscous de manioc', 'base' => 120, 'p' => 0.48, 'g' => 33.6, 'l' => 0.12],
                            ['nom' => 'Poulet villageois', 'base' => 120, 'p' => 32.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 60, 'p' => 5.4, 'g' => 24.0, 'l' => 2.4],
                            ['nom' => 'Sardines', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Tomates + oignons (sandwich)', 'base' => 40, 'p' => 0.4, 'g' => 3.0, 'l' => 0.1],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 0.75, 'g' => 16.5, 'l' => 0.15],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Spaghetti cuit', 'base' => 150, 'p' => 7.5, 'g' => 45.0, 'l' => 1.5],
                            ['nom' => 'Sauce tomate', 'base' => 50, 'p' => 0.5, 'g' => 2.5, 'l' => 0.25],
                            ['nom' => 'Viande hachée', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de crabe', 'base' => 200, 'p' => 30.0, 'g' => 16.0, 'l' => 6.0],
                            ['nom' => 'Foufou de maïs', 'base' => 120, 'p' => 1.8, 'g' => 33.6, 'l' => 0.6],
                            ['nom' => 'Salade avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 11.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Fruit 100g + peanuts 25g', 'base' => 125, 'p' => 9.0, 'g' => 28.0, 'l' => 14.2],
                    ['nom' => 'Soy galette', 'base' => 50, 'p' => 10.5, 'g' => 4.0, 'l' => 3.5],
                    ['nom' => 'Noix de coco', 'base' => 50, 'p' => 1.0, 'g' => 5.0, 'l' => 3.0],
                    ['nom' => 'Yaourt local', 'base' => 125, 'p' => 4.0, 'g' => 6.0, 'l' => 3.0],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie maïs', 'base' => 250, 'p' => 3.75, 'g' => 37.5, 'l' => 2.5],
                            ['nom' => 'Pain complet', 'base' => 70, 'p' => 6.3, 'g' => 28.0, 'l' => 2.8],
                            ['nom' => 'Beurre cacahuète', 'base' => 20, 'p' => 5.0, 'g' => 4.0, 'l' => 10.0],
                            ['nom' => 'Banane', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.2],
                            ['nom' => 'Lait', 'base' => 200, 'p' => 6.6, 'g' => 9.6, 'l' => 6.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz blanc', 'base' => 200, 'p' => 5.6, 'g' => 56.0, 'l' => 0.6],
                            ['nom' => 'Sauce tomate-poisson', 'base' => 100, 'p' => 5.0, 'g' => 10.0, 'l' => 2.0],
                            ['nom' => 'Poisson braisé', 'base' => 150, 'p' => 40.5, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Alloco', 'base' => 100, 'p' => 1.0, 'g' => 30.0, 'l' => 8.0],
                            ['nom' => 'Grande salade', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots en sauce', 'base' => 200, 'p' => 16.0, 'g' => 40.0, 'l' => 2.0],
                            ['nom' => 'Gari', 'base' => 120, 'p' => 0.36, 'g' => 33.6, 'l' => 0.12],
                            ['nom' => 'Viande bœuf grillée', 'base' => 120, 'p' => 31.2, 'g' => 0.0, 'l' => 9.6],
                            ['nom' => 'Salade chou', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 2.25, 'g' => 22.5, 'l' => 1.5],
                            ['nom' => 'Sauce arachide', 'base' => 50, 'p' => 3.0, 'g' => 4.0, 'l' => 6.0],
                            ['nom' => 'Œufs brouillés', 'base' => 100, 'p' => 12.6, 'g' => 1.1, 'l' => 10.6],
                            ['nom' => 'Avocat', 'base' => 70, 'p' => 1.4, 'g' => 6.3, 'l' => 10.5],
                            ['nom' => 'Jus d’orange', 'base' => 150, 'p' => 0.9, 'g' => 15.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte igname', 'base' => 180, 'p' => 3.06, 'g' => 50.4, 'l' => 0.36],
                            ['nom' => 'Sauce graine', 'base' => 100, 'p' => 6.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'Poisson fumé', 'base' => 130, 'p' => 26.0, 'g' => 0.0, 'l' => 2.6],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Atassi complet', 'base' => 200, 'p' => 6.0, 'g' => 50.0, 'l' => 1.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 32.4, 'g' => 0.0, 'l' => 3.6],
                            ['nom' => 'Alloco', 'base' => 80, 'p' => 0.8, 'g' => 24.0, 'l' => 6.4],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.1, 'g' => 2.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 250, 'p' => 3.75, 'g' => 37.5, 'l' => 2.5],
                            ['nom' => 'Lait concentré', 'base' => 50, 'p' => 3.5, 'g' => 12.0, 'l' => 4.0],
                            ['nom' => 'Beignet haricot (3 petits)', 'base' => 75, 'p' => 10.5, 'g' => 30.0, 'l' => 4.5],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz jollof', 'base' => 220, 'p' => 6.16, 'g' => 61.6, 'l' => 0.66],
                            ['nom' => 'Poulet braisé', 'base' => 150, 'p' => 40.5, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Salade composée', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.0, 'g' => 30.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous manioc', 'base' => 150, 'p' => 1.5, 'g' => 42.0, 'l' => 0.15],
                            ['nom' => 'Ragoût viande', 'base' => 120, 'p' => 18.0, 'g' => 6.0, 'l' => 9.6],
                            ['nom' => 'Salade d’avocat', 'base' => 100, 'p' => 4.0, 'g' => 8.0, 'l' => 22.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 70, 'p' => 6.3, 'g' => 28.0, 'l' => 2.8],
                            ['nom' => 'Œuf', 'base' => 100, 'p' => 6.3, 'g' => 0.6, 'l' => 5.3],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.5, 'l' => 7.5],
                            ['nom' => 'Tomate', 'base' => 50, 'p' => 0.45, 'g' => 1.95, 'l' => 0.1],
                            ['nom' => 'Banane', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.2],
                            ['nom' => 'Thé au lait', 'base' => 150, 'p' => 0.75, 'g' => 7.5, 'l' => 3.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 3.0, 'g' => 56.0, 'l' => 0.6],
                            ['nom' => 'Sauce gombo-crabe', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Poisson fumé', 'base' => 140, 'p' => 28.0, 'g' => 0.0, 'l' => 2.8],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.25, 'g' => 42.0, 'l' => 0.3],
                            ['nom' => 'Sauce feuilles amarante', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 32.4, 'g' => 0.0, 'l' => 3.6],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Dattes + arachides', 'base' => 125, 'p' => 8.0, 'g' => 41.0, 'l' => 14.2],
                    ['nom' => 'Smoothie fruits locaux', 'base' => 200, 'p' => 2.0, 'g' => 20.0, 'l' => 1.0],
                    ['nom' => 'Fruits secs + noix', 'base' => 70, 'p' => 5.5, 'g' => 45.0, 'l' => 14.2],
                    ['nom' => 'Yaourt + granola', 'base' => 150, 'p' => 7.0, 'g' => 26.0, 'l' => 8.0],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 300, 'p' => 4.5, 'g' => 45.0, 'l' => 3.0],
                            ['nom' => 'Pain complet', 'base' => 80, 'p' => 7.2, 'g' => 32.0, 'l' => 3.2],
                            ['nom' => 'Œufs (2)', 'base' => 100, 'p' => 12.6, 'g' => 1.2, 'l' => 10.6],
                            ['nom' => 'Banane', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.2],
                            ['nom' => 'Jus d’ananas', 'base' => 150, 'p' => 0.75, 'g' => 18.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz blanc', 'base' => 250, 'p' => 7.0, 'g' => 70.0, 'l' => 0.75],
                            ['nom' => 'Sauce tomate-viande', 'base' => 140, 'p' => 11.2, 'g' => 7.0, 'l' => 5.6],
                            ['nom' => 'Alloco', 'base' => 120, 'p' => 1.2, 'g' => 36.0, 'l' => 9.6],
                            ['nom' => 'Grande salade', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Atassi', 'base' => 250, 'p' => 15.0, 'g' => 125.0, 'l' => 2.5],
                            ['nom' => 'Poulet grillé', 'base' => 130, 'p' => 35.1, 'g' => 0.0, 'l' => 3.9],
                            ['nom' => 'Plantain bouilli', 'base' => 120, 'p' => 1.2, 'g' => 36.0, 'l' => 0.24],
                            ['nom' => 'Salade composée', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akpan', 'base' => 300, 'p' => 4.5, 'g' => 45.0, 'l' => 3.0],
                            ['nom' => 'Beignet haricot (4 petits)', 'base' => 100, 'p' => 14.0, 'g' => 40.0, 'l' => 6.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.5, 'l' => 7.5],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte d’igname', 'base' => 230, 'p' => 3.91, 'g' => 64.4, 'l' => 0.46],
                            ['nom' => 'Sauce arachide + poisson', 'base' => 140, 'p' => 14.0, 'g' => 11.2, 'l' => 16.8],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Mangue', 'base' => 100, 'p' => 0.5, 'g' => 15.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Spaghetti', 'base' => 200, 'p' => 10.0, 'g' => 50.0, 'l' => 2.0],
                            ['nom' => 'Sauce tomate-viande', 'base' => 120, 'p' => 9.6, 'g' => 6.0, 'l' => 4.8],
                            ['nom' => 'Viande hachée', 'base' => 120, 'p' => 31.2, 'g' => 0.0, 'l' => 9.6],
                            ['nom' => 'Pain petit', 'base' => 30, 'p' => 2.7, 'g' => 6.0, 'l' => 0.6],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 300, 'p' => 4.5, 'g' => 45.0, 'l' => 3.0],
                            ['nom' => 'Omelette (2 œufs)', 'base' => 100, 'p' => 6.3, 'g' => 1.0, 'l' => 5.5],
                            ['nom' => 'Pain complet', 'base' => 70, 'p' => 6.3, 'g' => 28.0, 'l' => 2.8],
                            ['nom' => 'Orange', 'base' => 150, 'p' => 1.35, 'g' => 18.0, 'l' => 0.15],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz jollof', 'base' => 270, 'p' => 7.56, 'g' => 75.6, 'l' => 0.81],
                            ['nom' => 'Poulet braisé', 'base' => 150, 'p' => 40.5, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Alloco', 'base' => 120, 'p' => 1.2, 'g' => 36.0, 'l' => 9.6],
                            ['nom' => 'Salade', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                            ['nom' => 'Ananas', 'base' => 100, 'p' => 0.5, 'g' => 13.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée', 'base' => 200, 'p' => 3.0, 'g' => 56.0, 'l' => 0.4],
                            ['nom' => 'Sauce feuilles d’épinard', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Viande de bœuf', 'base' => 130, 'p' => 33.8, 'g' => 0.0, 'l' => 10.4],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akoumé', 'base' => 300, 'p' => 4.5, 'g' => 60.0, 'l' => 1.5],
                            ['nom' => 'Sauce poisson', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Avocat', 'base' => 100, 'p' => 2.0, 'g' => 9.0, 'l' => 15.0],
                            ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 1.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Jus de bissap', 'base' => 150, 'p' => 0.75, 'g' => 18.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte rouge', 'base' => 250, 'p' => 3.75, 'g' => 70.0, 'l' => 0.75],
                            ['nom' => 'Sauce graine + crabe', 'base' => 150, 'p' => 15.0, 'g' => 12.0, 'l' => 18.0],
                            ['nom' => 'Poisson fumé', 'base' => 130, 'p' => 26.0, 'g' => 0.0, 'l' => 2.6],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous manioc', 'base' => 180, 'p' => 1.8, 'g' => 50.4, 'l' => 0.18],
                            ['nom' => 'Ragoût poulet + légumes', 'base' => 140, 'p' => 21.0, 'g' => 7.0, 'l' => 11.2],
                            ['nom' => 'Gari', 'base' => 50, 'p' => 0.5, 'g' => 14.0, 'l' => 0.05],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Smoothie banane-arachide-lait', 'base' => 250, 'p' => 3.0, 'g' => 25.0, 'l' => 10.0],
                    ['nom' => 'Pain + beurre d’arachide + fruits', 'base' => 150, 'p' => 34.5, 'g' => 60.0, 'l' => 52.2],
                    ['nom' => 'Barre énergétique maison', 'base' => 60, 'p' => 5.0, 'g' => 40.0, 'l' => 12.0],
                    ['nom' => 'Yaourt + granola', 'base' => 150, 'p' => 7.0, 'g' => 26.0, 'l' => 8.0],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 350, 'p' => 5.25, 'g' => 52.5, 'l' => 3.5],
                            ['nom' => 'Pain complet', 'base' => 100, 'p' => 9.0, 'g' => 40.0, 'l' => 4.0],
                            ['nom' => 'Œufs (2)', 'base' => 100, 'p' => 12.6, 'g' => 1.2, 'l' => 10.6],
                            ['nom' => 'Bananes (2)', 'base' => 200, 'p' => 2.0, 'g' => 46.0, 'l' => 0.4],
                            ['nom' => 'Lait entier', 'base' => 200, 'p' => 6.4, 'g' => 9.6, 'l' => 7.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz blanc', 'base' => 300, 'p' => 8.4, 'g' => 84.0, 'l' => 0.9],
                            ['nom' => 'Sauce tomate-poisson', 'base' => 150, 'p' => 15.0, 'g' => 7.5, 'l' => 6.0],
                            ['nom' => 'Alloco', 'base' => 150, 'p' => 1.5, 'g' => 45.0, 'l' => 12.0],
                            ['nom' => 'Igname bouillie', 'base' => 100, 'p' => 1.5, 'g' => 28.0, 'l' => 0.2],
                            ['nom' => 'Grande salade', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Atassi copieux', 'base' => 300, 'p' => 18.0, 'g' => 150.0, 'l' => 3.0],
                            ['nom' => 'Poulet grillé', 'base' => 140, 'p' => 37.8, 'g' => 0.0, 'l' => 4.2],
                            ['nom' => 'Alloco', 'base' => 100, 'p' => 1.0, 'g' => 30.0, 'l' => 8.0],
                            ['nom' => 'Salade composée', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                            ['nom' => 'Pain', 'base' => 50, 'p' => 4.5, 'g' => 20.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 350, 'p' => 5.25, 'g' => 70.0, 'l' => 1.75],
                            ['nom' => 'Sauce arachide', 'base' => 100, 'p' => 10.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'Beignet haricot (5)', 'base' => 125, 'p' => 17.5, 'g' => 50.0, 'l' => 7.5],
                            ['nom' => 'Avocat', 'base' => 100, 'p' => 2.0, 'g' => 9.0, 'l' => 15.0],
                            ['nom' => 'Papaye entera', 'base' => 150, 'p' => 0.75, 'g' => 16.5, 'l' => 0.15],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de igname', 'base' => 280, 'p' => 4.76, 'g' => 78.4, 'l' => 0.56],
                            ['nom' => 'Sauce graine', 'base' => 150, 'p' => 15.0, 'g' => 12.0, 'l' => 18.0],
                            ['nom' => 'Poisson braisé', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Légumes + Mangue', 'base' => 200, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Spaghetti', 'base' => 250, 'p' => 12.5, 'g' => 62.5, 'l' => 2.5],
                            ['nom' => 'Sauce viande', 'base' => 130, 'p' => 13.0, 'g' => 6.5, 'l' => 5.2],
                            ['nom' => 'Pain complet', 'base' => 60, 'p' => 5.4, 'g' => 24.0, 'l' => 2.4],
                            ['nom' => 'Grande salade', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 350, 'p' => 5.25, 'g' => 52.5, 'l' => 3.5],
                            ['nom' => 'Pain complet', 'base' => 100, 'p' => 9.0, 'g' => 40.0, 'l' => 4.0],
                            ['nom' => 'Beurre d’arachide', 'base' => 20, 'p' => 5.0, 'g' => 4.0, 'l' => 10.0],
                            ['nom' => 'Omelette 3 œufs', 'base' => 150, 'p' => 9.45, 'g' => 0.9, 'l' => 7.95],
                            ['nom' => 'Banane plantain bouillie', 'base' => 120, 'p' => 1.2, 'g' => 36.0, 'l' => 0.24],
                            ['nom' => 'Jus d’orange', 'base' => 200, 'p' => 1.0, 'g' => 24.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz jollof', 'base' => 320, 'p' => 8.96, 'g' => 89.6, 'l' => 0.96],
                            ['nom' => 'Poulet braisé', 'base' => 160, 'p' => 43.2, 'g' => 0.0, 'l' => 4.8],
                            ['nom' => 'Alloco', 'base' => 150, 'p' => 1.5, 'g' => 45.0, 'l' => 12.0],
                            ['nom' => 'Salade', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                            ['nom' => 'Pain', 'base' => 50, 'p' => 4.0, 'g' => 25.0, 'l' => 0.75],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée', 'base' => 250, 'p' => 3.75, 'g' => 70.0, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles', 'base' => 150, 'p' => 3.0, 'g' => 7.5, 'l' => 0.75],
                            ['nom' => 'Viande de bœuf', 'base' => 140, 'p' => 36.4, 'g' => 0.0, 'l' => 11.2],
                            ['nom' => 'Gari', 'base' => 50, 'p' => 0.5, 'g' => 14.0, 'l' => 0.05],
                            ['nom' => 'Salade', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akoumé', 'base' => 350, 'p' => 5.25, 'g' => 70.0, 'l' => 1.75],
                            ['nom' => 'Sauce poisson', 'base' => 150, 'p' => 15.0, 'g' => 7.5, 'l' => 4.5],
                            ['nom' => 'Avocat', 'base' => 100, 'p' => 2.0, 'g' => 9.0, 'l' => 15.0],
                            ['nom' => 'Igname bouillie', 'base' => 100, 'p' => 1.5, 'g' => 28.0, 'l' => 0.2],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 0.75, 'g' => 16.5, 'l' => 0.15],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte rouge', 'base' => 300, 'p' => 4.5, 'g' => 84.0, 'l' => 0.9],
                            ['nom' => 'Sauce gombo-crabe', 'base' => 150, 'p' => 15.0, 'g' => 12.0, 'l' => 18.0],
                            ['nom' => 'Poisson fumé', 'base' => 150, 'p' => 30.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Plantain', 'base' => 100, 'p' => 1.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous manioc', 'base' => 220, 'p' => 2.2, 'g' => 61.6, 'l' => 0.22],
                            ['nom' => 'Ragoût poulet', 'base' => 150, 'p' => 22.5, 'g' => 5.0, 'l' => 12.0],
                            ['nom' => 'Riz blanc', 'base' => 100, 'p' => 2.8, 'g' => 28.0, 'l' => 0.3],
                            ['nom' => 'Légumes sautés', 'base' => 150, 'p' => 1.5, 'g' => 7.5, 'l' => 0.3],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Smoothie bowl', 'base' => 250, 'p' => 3.0, 'g' => 25.0, 'l' => 10.0],
                    ['nom' => 'Mix noix', 'base' => 50, 'p' => 15.0, 'g' => 10.0, 'l' => 50.0],
                    ['nom' => 'Dattes', 'base' => 100, 'p' => 2.0, 'g' => 70.0, 'l' => 0.5],
                    ['nom' => 'Barre énergétique + banane + lait', 'base' => 300, 'p' => 7.0, 'g' => 80.0, 'l' => 14.0],
                    ['nom' => 'Yaourt + granola + fruits + miel', 'base' => 250, 'p' => 14.5, 'g' => 121.0, 'l' => 8.1],
                    ['nom' => 'Sandwich beurre d’arachide + confiture', 'base' => 120, 'p' => 10.0, 'g' => 50.0, 'l' => 20.0],
                ]
            ],
        ];
    }
}
