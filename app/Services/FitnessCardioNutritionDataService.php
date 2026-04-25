<?php

namespace App\Services;

class FitnessCardioNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 4.6, 'g' => 20.0, 'l' => 1.0],
                            ['nom' => 'Œuf poché', 'base' => 50, 'p' => 6.3, 'g' => 0.4, 'l' => 5.0],
                            ['nom' => 'Avocat (1/4 moyen)', 'base' => 50, 'p' => 1.0, 'g' => 4.3, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet cuit', 'base' => 150, 'p' => 3.8, 'g' => 34.5, 'l' => 1.5],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 30.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Sauce graine légère', 'base' => 100, 'p' => 5.0, 'g' => 15.0, 'l' => 20.0],
                            ['nom' => 'Épinards sautés', 'base' => 150, 'p' => 4.5, 'g' => 5.7, 'l' => 0.8],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.5, 'g' => 2.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.25, 'g' => 40.5, 'l' => 0.3],
                            ['nom' => 'Sauce tomate au maquereau', 'base' => 150, 'p' => 30.0, 'g' => 7.0, 'l' => 19.5],
                            ['nom' => 'Légumes variés grillés', 'base' => 200, 'p' => 3.0, 'g' => 12.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 3.0, 'g' => 28.5, 'l' => 1.5],
                            ['nom' => 'Sardines grillées', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 11.5],
                            ['nom' => 'Salade concombre-tomate', 'base' => 100, 'p' => 1.5, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Ablo', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Poulet grillé sans peau', 'base' => 150, 'p' => 33.0, 'g' => 0.0, 'l' => 4.5],
                            ['nom' => 'Sauce d’arachide légère', 'base' => 100, 'p' => 5.0, 'g' => 10.0, 'l' => 12.0],
                            ['nom' => 'Gombo frais', 'base' => 150, 'p' => 3.0, 'g' => 11.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.3],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Ragoût de légumes verts', 'base' => 150, 'p' => 4.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1.5, 'g' => 4.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Soja bouilli', 'base' => 100, 'p' => 16.0, 'g' => 10.0, 'l' => 9.0],
                            ['nom' => 'Tapioca', 'base' => 50, 'p' => 0.5, 'g' => 14.5, 'l' => 0.1],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 0.0],
                            ['nom' => 'Crevettes grillées', 'base' => 120, 'p' => 24.0, 'g' => 1.0, 'l' => 1.2],
                            ['nom' => 'Sauce feuilles de baobab', 'base' => 100, 'p' => 3.5, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Haricots verts', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs', 'base' => 150, 'p' => 3.5, 'g' => 32.0, 'l' => 1.0],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Soupe de légumes', 'base' => 200, 'p' => 3.0, 'g' => 12.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet', 'base' => 60, 'p' => 5.4, 'g' => 27.0, 'l' => 2.0],
                            ['nom' => 'Beurre de cacahuète nature', 'base' => 10, 'p' => 2.5, 'g' => 2.0, 'l' => 5.0],
                            ['nom' => 'Orange', 'base' => 100, 'p' => 1.0, 'g' => 12.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.3, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Lentilles (ou haricots rouges)', 'base' => 100, 'p' => 9.0, 'g' => 20.0, 'l' => 0.4],
                            ['nom' => 'Sauce tomate', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 1.0],
                            ['nom' => 'Crucifères (chou, brocoli)', 'base' => 150, 'p' => 3.5, 'g' => 7.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Semoule de mil', 'base' => 150, 'p' => 4.5, 'g' => 34.0, 'l' => 1.2],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 13.0, 'g' => 1.2, 'l' => 10.0],
                            ['nom' => 'Ragoût de légumes', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 1.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Arachides grillées', 'base' => 20, 'p' => 5.0, 'g' => 3.0, 'l' => 10.0],
                    ['nom' => 'Noix de cajou', 'base' => 15, 'p' => 2.7, 'g' => 4.5, 'l' => 7.5],
                    ['nom' => 'Banane', 'base' => 100, 'p' => 1.2, 'g' => 23.0, 'l' => 0.3],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho', 'base' => 150, 'p' => 5.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Poisson grillé', 'base' => 80, 'p' => 18.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Avocat (50g)', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz basmati', 'base' => 150, 'p' => 3.5, 'g' => 40.0, 'l' => 0.5],
                            ['nom' => 'Poisson en sauce (non frit)', 'base' => 120, 'p' => 28.0, 'g' => 5.0, 'l' => 6.0],
                            ['nom' => 'Gombo', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.2],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.5, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Sauce d’arachide légère', 'base' => 150, 'p' => 6.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 3.5, 'g' => 32.0, 'l' => 0.5],
                            ['nom' => 'Haricots blancs cuits', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 0.8],
                            ['nom' => 'Salade de tomates', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.5, 'g' => 40.0, 'l' => 0.3],
                            ['nom' => 'Sauce feuilles au poulet', 'base' => 150, 'p' => 15.0, 'g' => 5.0, 'l' => 4.0],
                            ['nom' => 'Carottes cuites', 'base' => 100, 'p' => 1.0, 'g' => 8.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Bouillie de maïs fermenté', 'base' => 200, 'p' => 5.0, 'g' => 40.0, 'l' => 1.5],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Légumes grillés', 'base' => 150, 'p' => 2.5, 'g' => 10.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix mélangées', 'base' => 30, 'p' => 5.0, 'g' => 5.0, 'l' => 15.0],
                    ['nom' => 'Galette de mil maison', 'base' => 50, 'p' => 3.5, 'g' => 25.0, 'l' => 5.0],
                    ['nom' => 'Fruit de saison', 'base' => 150, 'p' => 1.0, 'g' => 25.0, 'l' => 0.0],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Fonio aux petits légumes', 'base' => 100, 'p' => 4.0, 'g' => 42.0, 'l' => 1.0],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Avocat (70g)', 'base' => 70, 'p' => 1.4, 'g' => 5.9, 'l' => 14.0],
                            ['nom' => 'Papaye', 'base' => 120, 'p' => 0.6, 'g' => 12.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.8, 'g' => 34.5, 'l' => 1.5],
                            ['nom' => 'Sauce graine au poulet', 'base' => 150, 'p' => 12.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'Légumes variés sautés', 'base' => 200, 'p' => 4.0, 'g' => 12.0, 'l' => 2.0],
                            ['nom' => 'Plantain mûr bouilli', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.4],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 3.0, 'g' => 28.5, 'l' => 1.5],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Feuilles d’amarante sautées', 'base' => 150, 'p' => 3.8, 'g' => 7.0, 'l' => 0.6],
                            ['nom' => 'Lentilles', 'base' => 100, 'p' => 9.0, 'g' => 20.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 200, 'p' => 7.5, 'g' => 45.0, 'l' => 2.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 13.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Orange', 'base' => 100, 'p' => 1.0, 'g' => 12.0, 'l' => 0.1],
                            ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 7.5, 'g' => 4.0, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname bouillie', 'base' => 200, 'p' => 4.0, 'g' => 56.0, 'l' => 0.4],
                            ['nom' => 'Crevettes en sauce tomate', 'base' => 120, 'p' => 24.0, 'g' => 5.0, 'l' => 2.5],
                            ['nom' => 'Gombo frais', 'base' => 150, 'p' => 3.0, 'g' => 11.0, 'l' => 0.3],
                            ['nom' => 'Patate douce', 'base' => 100, 'p' => 1.6, 'g' => 20.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de mil', 'base' => 150, 'p' => 4.5, 'g' => 34.0, 'l' => 1.2],
                            ['nom' => 'Poulet ragoût léger', 'base' => 120, 'p' => 27.0, 'g' => 4.0, 'l' => 3.5],
                            ['nom' => 'Légumes variés vapeur', 'base' => 200, 'p' => 4.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'Banane plantain vapeur', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.4],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Yaourt maison nature', 'base' => 125, 'p' => 4.4, 'g' => 6.0, 'l' => 4.0],
                    ['nom' => 'Noix de cajou', 'base' => 25, 'p' => 4.5, 'g' => 7.5, 'l' => 12.5],
                    ['nom' => 'Smoothie mangue-baobab', 'base' => 200, 'p' => 2.0, 'g' => 25.0, 'l' => 0.5],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Fonio complet', 'base' => 150, 'p' => 6.0, 'g' => 63.0, 'l' => 1.5],
                            ['nom' => 'Poisson grillé copieux', 'base' => 150, 'p' => 33.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Avocat (1 moyen)', 'base' => 200, 'p' => 4.0, 'g' => 17.0, 'l' => 40.0],
                            ['nom' => 'Mangue', 'base' => 150, 'p' => 1.5, 'g' => 30.0, 'l' => 0.6],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet copieux', 'base' => 200, 'p' => 5.0, 'g' => 46.0, 'l' => 2.0],
                            ['nom' => 'Poulet ragoût aux légumes', 'base' => 200, 'p' => 45.0, 'g' => 12.0, 'l' => 7.0],
                            ['nom' => 'Haricots verts sautés', 'base' => 200, 'p' => 4.0, 'g' => 12.0, 'l' => 2.0],
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 3.0, 'g' => 42.0, 'l' => 0.3],
                            ['nom' => 'Plantain bouilli', 'base' => 150, 'p' => 2.0, 'g' => 47.0, 'l' => 0.6],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 200, 'p' => 4.0, 'g' => 38.0, 'l' => 2.0],
                            ['nom' => 'Poisson braisé copieux', 'base' => 200, 'p' => 40.0, 'g' => 0.0, 'l' => 8.4],
                            ['nom' => 'Sauce feuilles-crevettes', 'base' => 200, 'p' => 15.0, 'g' => 10.0, 'l' => 12.0],
                            ['nom' => 'Lentilles cuites', 'base' => 150, 'p' => 13.5, 'g' => 30.0, 'l' => 0.8],
                            ['nom' => 'Salade de fruits (Papaye, Banane)', 'base' => 200, 'p' => 2.5, 'g' => 35.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho enrichie', 'base' => 300, 'p' => 11.0, 'g' => 68.0, 'l' => 3.0],
                            ['nom' => 'Œufs durs (3)', 'base' => 150, 'p' => 19.5, 'g' => 1.8, 'l' => 15.0],
                            ['nom' => 'Noix de cajou', 'base' => 40, 'p' => 7.2, 'g' => 12.0, 'l' => 20.0],
                            ['nom' => 'Banane', 'base' => 150, 'p' => 1.8, 'g' => 34.5, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Manioc bouilli', 'base' => 300, 'p' => 4.0, 'g' => 80.0, 'l' => 0.6],
                            ['nom' => 'Poisson en sauce graine', 'base' => 200, 'p' => 40.0, 'g' => 11.0, 'l' => 15.0],
                            ['nom' => 'Feuilles d\'amarante sautées', 'base' => 200, 'p' => 5.0, 'g' => 13.0, 'l' => 1.0],
                            ['nom' => 'Patate douce rôtie', 'base' => 200, 'p' => 3.0, 'g' => 40.0, 'l' => 0.3],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 8.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs', 'base' => 250, 'p' => 7.5, 'g' => 57.0, 'l' => 2.0],
                            ['nom' => 'Bœuf maigre sauté aux légumes', 'base' => 200, 'p' => 44.0, 'g' => 10.0, 'l' => 12.0],
                            ['nom' => 'Gombo et crevettes', 'base' => 200, 'p' => 15.0, 'g' => 12.0, 'l' => 4.0],
                            ['nom' => 'Plantain mûr bouilli', 'base' => 200, 'p' => 2.6, 'g' => 62.0, 'l' => 0.8],
                            ['nom' => 'Salade mixte copieuse', 'base' => 200, 'p' => 3.0, 'g' => 8.0, 'l' => 0.4],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Yaourt local au miel', 'base' => 200, 'p' => 8.0, 'g' => 25.0, 'l' => 6.0],
                    ['nom' => 'Galette de mil aux graines de sésame', 'base' => 60, 'p' => 5.0, 'g' => 35.0, 'l' => 7.0],
                    ['nom' => 'Smoothie banane-papaye-avocat', 'base' => 300, 'p' => 5.0, 'g' => 50.0, 'l' => 15.0],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Fonio complet très copieux', 'base' => 250, 'p' => 10.0, 'g' => 105.0, 'l' => 2.5],
                            ['nom' => 'Poisson grillé (200g)', 'base' => 200, 'p' => 44.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Avocat (2 moyens)', 'base' => 400, 'p' => 8.0, 'g' => 34.0, 'l' => 80.0],
                            ['nom' => 'Banane', 'base' => 200, 'p' => 2.4, 'g' => 46.0, 'l' => 0.6],
                            ['nom' => 'Arachides', 'base' => 50, 'p' => 12.5, 'g' => 7.0, 'l' => 25.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (350g)', 'base' => 350, 'p' => 8.8, 'g' => 80.5, 'l' => 3.5],
                            ['nom' => 'Poulet ragoût riche', 'base' => 250, 'p' => 55.0, 'g' => 15.0, 'l' => 10.0],
                            ['nom' => 'Légumes variés sautés', 'base' => 300, 'p' => 6.0, 'g' => 18.0, 'l' => 3.0],
                            ['nom' => 'Igname pilée', 'base' => 250, 'p' => 5.0, 'g' => 70.0, 'l' => 0.5],
                            ['nom' => 'Plantain mûr bouilli', 'base' => 250, 'p' => 3.3, 'g' => 77.5, 'l' => 1.0],
                            ['nom' => 'Lentilles', 'base' => 100, 'p' => 9.0, 'g' => 20.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké copieux', 'base' => 300, 'p' => 6.0, 'g' => 57.0, 'l' => 2.5],
                            ['nom' => 'Poisson braisé (250g)', 'base' => 250, 'p' => 50.0, 'g' => 0.0, 'l' => 10.5],
                            ['nom' => 'Sauce feuilles-crevettes riche', 'base' => 250, 'p' => 20.0, 'g' => 15.0, 'l' => 18.0],
                            ['nom' => 'Manioc bouilli', 'base' => 200, 'p' => 3.0, 'g' => 54.0, 'l' => 0.4],
                            ['nom' => 'Banane plantain vapeur', 'base' => 200, 'p' => 2.6, 'g' => 62.0, 'l' => 0.8],
                            ['nom' => 'Salade de fruits riche', 'base' => 300, 'p' => 4.0, 'g' => 55.0, 'l' => 1.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho très riche', 'base' => 400, 'p' => 15.0, 'g' => 90.0, 'l' => 4.0],
                            ['nom' => 'Œufs durs (4-5)', 'base' => 220, 'p' => 28.5, 'g' => 2.6, 'l' => 22.0],
                            ['nom' => 'Noix de cajou (60g)', 'base' => 60, 'p' => 10.8, 'g' => 18.0, 'l' => 30.0],
                            ['nom' => 'Orange (2)', 'base' => 200, 'p' => 2.0, 'g' => 24.0, 'l' => 0.2],
                            ['nom' => 'Beurre de cacahuète', 'base' => 20, 'p' => 5.0, 'g' => 4.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Manioc bouilli copieux', 'base' => 400, 'p' => 5.5, 'g' => 107.0, 'l' => 0.8],
                            ['nom' => 'Poisson riche en sauce graine', 'base' => 250, 'p' => 50.0, 'g' => 14.0, 'l' => 20.0],
                            ['nom' => 'Feuilles d\'amarante sautées', 'base' => 300, 'p' => 7.5, 'g' => 19.5, 'l' => 1.5],
                            ['nom' => 'Patate douce rôtie large', 'base' => 300, 'p' => 4.5, 'g' => 60.0, 'l' => 0.5],
                            ['nom' => 'Avocat large', 'base' => 100, 'p' => 2.0, 'g' => 8.5, 'l' => 16.0],
                            ['nom' => 'Haricots blancs', 'base' => 150, 'p' => 12.0, 'g' => 30.0, 'l' => 0.6],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs copieux', 'base' => 350, 'p' => 10.5, 'g' => 80.0, 'l' => 3.0],
                            ['nom' => 'Bœuf ragoût riche aux légumes', 'base' => 250, 'p' => 55.0, 'g' => 13.0, 'l' => 15.0],
                            ['nom' => 'Gombo aux crevettes copieux', 'base' => 250, 'p' => 20.0, 'g' => 16.0, 'l' => 5.5],
                            ['nom' => 'Igname pilée large', 'base' => 200, 'p' => 4.0, 'g' => 56.0, 'l' => 0.4],
                            ['nom' => 'Salade mixte très complète', 'base' => 300, 'p' => 4.5, 'g' => 12.0, 'l' => 0.6],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mélange noix et fruits secs', 'base' => 80, 'p' => 15.0, 'g' => 40.0, 'l' => 35.0],
                    ['nom' => 'Smoothie géant protéiné local', 'base' => 500, 'p' => 25.0, 'g' => 80.0, 'l' => 20.0],
                    ['nom' => 'Galettes et Yaourt entier', 'base' => 300, 'p' => 12.0, 'g' => 60.0, 'l' => 10.0],
                ]
            ],
        ];
    }
}
