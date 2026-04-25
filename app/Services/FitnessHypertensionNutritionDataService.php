<?php

namespace App\Services;

class FitnessHypertensionNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs fermenté', 'base' => 200, 'p' => 4.6, 'g' => 20.0, 'l' => 1.0],
                            ['nom' => 'Œuf poché', 'base' => 50, 'p' => 6.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Avocat (1/4)', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 10.0],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet cuit', 'base' => 150, 'p' => 3.8, 'g' => 34.5, 'l' => 1.5],
                            ['nom' => 'Sauce graine légère', 'base' => 50, 'p' => 4.0, 'g' => 3.0, 'l' => 7.5],
                            ['nom' => 'Poisson fumé', 'base' => 80, 'p' => 18.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Tomate + Concombre + Haricots verts', 'base' => 300, 'p' => 3.5, 'g' => 14.5, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.25, 'g' => 40.5, 'l' => 0.3],
                            ['nom' => 'Sauce tomate au maquereau', 'base' => 150, 'p' => 30.0, 'g' => 7.0, 'l' => 19.5],
                            ['nom' => 'Salade verte + Aubergines grillées', 'base' => 200, 'p' => 2.4, 'g' => 8.9, 'l' => 3.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil non sucrée', 'base' => 200, 'p' => 5.0, 'g' => 36.0, 'l' => 1.0],
                            ['nom' => 'Sardines grillées', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 11.0],
                            ['nom' => 'Tomate concassée', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Ablo', 'base' => 150, 'p' => 3.0, 'g' => 28.5, 'l' => 1.5],
                            ['nom' => 'Sauce arachide légère', 'base' => 50, 'p' => 4.0, 'g' => 3.0, 'l' => 7.5],
                            ['nom' => 'Poulet maigre', 'base' => 100, 'p' => 31.0, 'g' => 0.0, 'l' => 3.6],
                            ['nom' => 'Épinards sautés + Carotte râpée', 'base' => 200, 'p' => 3.8, 'g' => 13.2, 'l' => 4.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akpan (bouillie légère)', 'base' => 200, 'p' => 6.0, 'g' => 15.0, 'l' => 4.0],
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade composée (laitue/tomate/oignon)', 'base' => 150, 'p' => 1.5, 'g' => 7.0, 'l' => 0.3],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari trempé léger', 'base' => 100, 'p' => 1.3, 'g' => 85.0, 'l' => 0.5],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 6.8, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Banane plantain bouillie', 'base' => 120, 'p' => 1.6, 'g' => 31.0, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio cuit', 'base' => 200, 'p' => 5.2, 'g' => 42.0, 'l' => 1.2],
                            ['nom' => 'Crabe', 'base' => 100, 'p' => 19.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Gombo', 'base' => 100, 'p' => 1.9, 'g' => 7.5, 'l' => 0.2],
                            ['nom' => 'Feuilles de baobab', 'base' => 50, 'p' => 2.0, 'g' => 5.0, 'l' => 0.4],
                            ['nom' => 'Chou cru', 'base' => 100, 'p' => 1.4, 'g' => 6.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de maïs', 'base' => 200, 'p' => 6.0, 'g' => 46.0, 'l' => 1.8],
                            ['nom' => 'Poulet sans peau', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes ragoût', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'Salade verte', 'base' => 50, 'p' => 0.6, 'g' => 1.5, 'l' => 0.1],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Soja (sec)', 'base' => 40, 'p' => 14.8, 'g' => 12.0, 'l' => 7.8],
                            ['nom' => 'Pain complet', 'base' => 40, 'p' => 3.8, 'g' => 19.0, 'l' => 1.2],
                            ['nom' => 'Beurre de cacahuète', 'base' => 5, 'p' => 1.3, 'g' => 1.0, 'l' => 2.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Haricots rouges cuits', 'base' => 150, 'p' => 12.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Plantain mûr bouilli', 'base' => 180, 'p' => 2.3, 'g' => 47.0, 'l' => 0.6],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.8],
                            ['nom' => 'Carotte crue', 'base' => 80, 'p' => 0.7, 'g' => 7.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce bouillie', 'base' => 200, 'p' => 2.8, 'g' => 42.0, 'l' => 0.4],
                            ['nom' => 'Poisson sauce claire', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Légumes vapeur', 'base' => 150, 'p' => 3.0, 'g' => 8.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix de cajou', 'base' => 15, 'p' => 2.5, 'g' => 8.0, 'l' => 12.0],
                    ['nom' => 'Arachides grillées', 'base' => 20, 'p' => 5.2, 'g' => 3.0, 'l' => 9.8],
                    ['nom' => 'Mandarine', 'base' => 100, 'p' => 0.8, 'g' => 13.0, 'l' => 0.2],
                    ['nom' => 'Bissap nature sans sucre', 'base' => 200, 'p' => 0.0, 'g' => 1.0, 'l' => 0.0],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 150, 'p' => 5.0, 'g' => 30.0, 'l' => 2.0],
                            ['nom' => 'Œufs brouillés (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Avocat (1/3)', 'base' => 60, 'p' => 1.0, 'g' => 3.0, 'l' => 12.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local cuit', 'base' => 150, 'p' => 3.5, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Sauce arachide modérée', 'base' => 50, 'p' => 4.0, 'g' => 3.0, 'l' => 7.0],
                            ['nom' => 'Poulet maigre', 'base' => 100, 'p' => 31.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Épinards + Salade mixte', 'base' => 200, 'p' => 3.9, 'g' => 6.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte rouge (atassi)', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate au crabe', 'base' => 150, 'p' => 15.0, 'g' => 5.0, 'l' => 7.0],
                            ['nom' => 'Salade verte + Haricots verts', 'base' => 200, 'p' => 2.8, 'g' => 10.0, 'l' => 0.4],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 4.0, 'g' => 28.0, 'l' => 1.0],
                            ['nom' => 'Haricots rouges en sauce tomate', 'base' => 100, 'p' => 8.0, 'g' => 15.0, 'l' => 1.0],
                            ['nom' => 'Banane plantain mûre bouillie', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.3, 'g' => 40.0, 'l' => 0.3],
                            ['nom' => 'Sauce graine au poisson', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 8.0],
                            ['nom' => 'Légumes variés (gombo, carotte, aubergine)', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de manioc', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Ragout de légumes au poisson fumé', 'base' => 150, 'p' => 12.0, 'g' => 5.0, 'l' => 6.0],
                            ['nom' => 'Salade concombre', 'base' => 100, 'p' => 0.7, 'g' => 3.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho', 'base' => 200, 'p' => 5.0, 'g' => 38.0, 'l' => 1.0],
                            ['nom' => 'Lait écrémé', 'base' => 150, 'p' => 5.0, 'g' => 7.0, 'l' => 0.3],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.0, 'g' => 3.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio cuit', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce gombo au poulet', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Feuilles de manioc', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akpan enrichi', 'base' => 150, 'p' => 4.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Sardines grillées', 'base' => 80, 'p' => 15.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Salade composée', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari trempé', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Tomate', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                            ['nom' => 'Avocat (1/4)', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 12.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.5, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate légère aux crevettes', 'base' => 100, 'p' => 8.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Sauce claire haricots + poisson', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Galette de mil maison', 'base' => 30, 'p' => 2.0, 'g' => 20.0, 'l' => 0.5],
                    ['nom' => 'Yaourt nature', 'base' => 125, 'p' => 5.0, 'g' => 6.0, 'l' => 3.0],
                    ['nom' => 'Noix mélangées', 'base' => 25, 'p' => 5.0, 'g' => 5.0, 'l' => 12.0],
                    ['nom' => 'Smoothie fruit local sans sucre', 'base' => 200, 'p' => 2.0, 'g' => 20.0, 'l' => 0.2],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 200, 'p' => 5.0, 'g' => 30.0, 'l' => 2.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Pain complet', 'base' => 30, 'p' => 3.0, 'g' => 15.0, 'l' => 1.0],
                            ['nom' => 'Avocat (60g)', 'base' => 60, 'p' => 1.0, 'g' => 3.0, 'l' => 12.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 200, 'p' => 5.0, 'g' => 46.0, 'l' => 1.0],
                            ['nom' => 'Sauce arachide au poulet', 'base' => 100, 'p' => 8.0, 'g' => 4.0, 'l' => 7.0],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes variés', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Ragoût de légumes au crabe', 'base' => 150, 'p' => 12.0, 'g' => 8.0, 'l' => 5.0],
                            ['nom' => 'Feuilles de baobab', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 4.0, 'g' => 28.0, 'l' => 1.0],
                            ['nom' => 'Haricots en sauce', 'base' => 100, 'p' => 8.0, 'g' => 15.0, 'l' => 1.0],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 40.0, 'l' => 0.3],
                            ['nom' => 'Sauce graine au poisson', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 8.0],
                            ['nom' => 'Épinards', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Gombo', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate au maquereau', 'base' => 150, 'p' => 15.0, 'g' => 5.0, 'l' => 7.0],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 5.0, 'g' => 38.0, 'l' => 1.0],
                            ['nom' => 'Lait', 'base' => 150, 'p' => 5.0, 'g' => 7.0, 'l' => 0.3],
                            ['nom' => 'Arachides', 'base' => 30, 'p' => 7.5, 'g' => 4.5, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 200, 'p' => 5.0, 'g' => 46.0, 'l' => 1.0],
                            ['nom' => 'Sauce gombo au poulet', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Carotte', 'base' => 50, 'p' => 0.5, 'g' => 4.0, 'l' => 0.1],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce', 'base' => 200, 'p' => 2.0, 'g' => 40.0, 'l' => 0.2],
                            ['nom' => 'Sauce claire haricots + sardines', 'base' => 150, 'p' => 15.0, 'g' => 5.0, 'l' => 8.0],
                            ['nom' => 'Salade complete', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Œufs brouillés', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Avocat (1/2)', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 20.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous de maïs', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Sauce arachide légère au poisson', 'base' => 100, 'p' => 8.0, 'g' => 5.0, 'l' => 4.0],
                            ['nom' => 'Légumes varies', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akpan enrichi', 'base' => 150, 'p' => 4.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Poisson braise', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mandarine', 'base' => 100, 'p' => 1.0, 'g' => 10.0, 'l' => 0.2],
                    ['nom' => 'Arachides', 'base' => 25, 'p' => 5.0, 'g' => 5.0, 'l' => 12.0],
                    ['nom' => 'Noix', 'base' => 30, 'p' => 7.0, 'g' => 6.0, 'l' => 14.0],
                    ['nom' => 'Bissap nature', 'base' => 200, 'p' => 0.5, 'g' => 15.0, 'l' => 0.0],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 200, 'p' => 5.0, 'g' => 30.0, 'l' => 2.0],
                            ['nom' => 'Œufs (3)', 'base' => 150, 'p' => 18.0, 'g' => 1.0, 'l' => 15.0],
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 2.0],
                            ['nom' => 'Avocat (1/2)', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 20.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (250g)', 'base' => 250, 'p' => 6.0, 'g' => 57.0, 'l' => 1.0],
                            ['nom' => 'Sauce arachide modérée au poulet', 'base' => 100, 'p' => 8.0, 'g' => 4.0, 'l' => 7.0],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes variés', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate aux crevettes', 'base' => 150, 'p' => 12.0, 'g' => 5.0, 'l' => 4.0],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 5.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                            ['nom' => 'Arachides', 'base' => 30, 'p' => 7.5, 'g' => 4.5, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio copieux', 'base' => 200, 'p' => 5.0, 'g' => 46.0, 'l' => 0.5],
                            ['nom' => 'Sauce graine au poisson', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 8.0],
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Épinards', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Gombo', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de manioc', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Ragoût de légumes au poulet', 'base' => 150, 'p' => 12.0, 'g' => 8.0, 'l' => 5.0],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho enrichie', 'base' => 200, 'p' => 6.0, 'g' => 38.0, 'l' => 1.0],
                            ['nom' => 'Œufs (3)', 'base' => 150, 'p' => 18.0, 'g' => 1.0, 'l' => 15.0],
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 2.0],
                            ['nom' => 'Beurre de cacahuète', 'base' => 10, 'p' => 2.5, 'g' => 1.0, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local (grande portion)', 'base' => 250, 'p' => 6.0, 'g' => 57.0, 'l' => 1.0],
                            ['nom' => 'Sauce gombo au crabe', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes variés', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio (bonne portion)', 'base' => 200, 'p' => 5.0, 'g' => 46.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate au maquereau', 'base' => 150, 'p' => 12.0, 'g' => 5.0, 'l' => 4.0],
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari copieux', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 0.2],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 20.0],
                            ['nom' => 'Tomate', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce arachide légère au poisson fumé', 'base' => 100, 'p' => 8.0, 'g' => 5.0, 'l' => 4.0],
                            ['nom' => 'Légumes multiples', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akpan enrichi', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Sardines grillées', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Galette de mil', 'base' => 50, 'p' => 3.0, 'g' => 25.0, 'l' => 1.0],
                    ['nom' => 'Noix (35g)', 'base' => 35, 'p' => 7.0, 'g' => 6.0, 'l' => 14.0],
                    ['nom' => 'Noix mélangées (40g)', 'base' => 40, 'p' => 8.0, 'g' => 6.0, 'l' => 16.0],
                    ['nom' => 'Yaourt', 'base' => 125, 'p' => 4.0, 'g' => 6.0, 'l' => 2.0],
                    ['nom' => 'Bissap', 'base' => 200, 'p' => 0.5, 'g' => 15.0, 'l' => 0.0],
                    ['nom' => 'Arachides', 'base' => 30, 'p' => 7.0, 'g' => 4.0, 'l' => 15.0],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs très enrichie', 'base' => 250, 'p' => 7.5, 'g' => 47.5, 'l' => 2.5],
                            ['nom' => 'Œufs (3-4)', 'base' => 180, 'p' => 22.0, 'g' => 1.2, 'l' => 18.0],
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 2.0],
                            ['nom' => 'Avocat (1/2)', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 20.0],
                            ['nom' => 'Arachides', 'base' => 30, 'p' => 7.0, 'g' => 4.5, 'l' => 15.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (très grande portion)', 'base' => 300, 'p' => 7.2, 'g' => 68.0, 'l' => 1.2],
                            ['nom' => 'Sauce arachide légère au poulet', 'base' => 100, 'p' => 8.0, 'g' => 4.0, 'l' => 7.0],
                            ['nom' => 'Igname', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes variés', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs (grande portion)', 'base' => 150, 'p' => 3.0, 'g' => 30.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate aux crevettes', 'base' => 150, 'p' => 12.0, 'g' => 5.0, 'l' => 4.0],
                            ['nom' => 'Légumes abondants', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa copieux', 'base' => 200, 'p' => 5.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Haricots rouges abondants', 'base' => 120, 'p' => 10.0, 'g' => 24.0, 'l' => 0.5],
                            ['nom' => 'Plantain bouilli (grand)', 'base' => 150, 'p' => 1.5, 'g' => 30.0, 'l' => 0.3],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio très copieux', 'base' => 250, 'p' => 6.0, 'g' => 57.5, 'l' => 0.6],
                            ['nom' => 'Sauce graine modérée au poisson', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 8.0],
                            ['nom' => 'Plantain', 'base' => 150, 'p' => 1.5, 'g' => 30.0, 'l' => 0.3],
                            ['nom' => 'Épinards', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Gombo', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                            ['nom' => 'Carotte', 'base' => 50, 'p' => 0.5, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de manioc copieux', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Ragoût au poulet', 'base' => 150, 'p' => 12.0, 'g' => 8.0, 'l' => 5.0],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes variés', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil très enrichie', 'base' => 250, 'p' => 7.5, 'g' => 47.5, 'l' => 2.5],
                            ['nom' => 'Œufs (4)', 'base' => 180, 'p' => 22.0, 'g' => 1.2, 'l' => 18.0],
                            ['nom' => 'Pain complet (2-3 tranches)', 'base' => 75, 'p' => 7.5, 'g' => 37.5, 'l' => 2.5],
                            ['nom' => 'Beurre de cacahuète', 'base' => 10, 'p' => 2.5, 'g' => 1.0, 'l' => 5.0],
                            ['nom' => 'Noix', 'base' => 30, 'p' => 6.0, 'g' => 4.0, 'l' => 12.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local (très grande portion)', 'base' => 300, 'p' => 7.2, 'g' => 68.0, 'l' => 1.2],
                            ['nom' => 'Sauce gombo au crabe', 'base' => 100, 'p' => 10.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Salade complète', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Légumes multiples', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio (grande portion)', 'base' => 200, 'p' => 5.0, 'g' => 46.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate au maquereau', 'base' => 150, 'p' => 12.0, 'g' => 5.0, 'l' => 4.0],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari très copieux', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 0.2],
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Œufs (2)', 'base' => 90, 'p' => 11.0, 'g' => 0.6, 'l' => 9.0],
                            ['nom' => 'Avocat (1/2)', 'base' => 100, 'p' => 2.0, 'g' => 4.0, 'l' => 20.0],
                            ['nom' => 'Tomate', 'base' => 50, 'p' => 0.5, 'g' => 2.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce arachide légère au poisson', 'base' => 100, 'p' => 8.0, 'g' => 5.0, 'l' => 4.0],
                            ['nom' => 'Patate douce', 'base' => 150, 'p' => 2.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Légumes abondants', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akpan très enrichi', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Sardines grillées', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Haricots en sauce', 'base' => 100, 'p' => 7.0, 'g' => 10.0, 'l' => 3.0],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.1],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Galette de mil', 'base' => 50, 'p' => 3.0, 'g' => 25.0, 'l' => 1.0],
                    ['nom' => 'Noix (40g)', 'base' => 40, 'p' => 8.0, 'g' => 6.0, 'l' => 16.0],
                    ['nom' => 'Noix (45g)', 'base' => 45, 'p' => 9.0, 'g' => 7.0, 'l' => 18.0],
                    ['nom' => 'Bissap + galette maison', 'base' => 150, 'p' => 4.0, 'g' => 25.0, 'l' => 2.0],
                ]
            ],
        ];
    }
}
