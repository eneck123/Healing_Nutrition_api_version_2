<?php

namespace App\Services;

class WeightLossUnder5HypertensionNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs sans sucre ajouté', 'base' => 200, 'p' => 4.0, 'g' => 36.0, 'l' => 2.0, 'video' => 'bouillie de maïs / akassa'],
                            ['nom' => '2 œufs durs', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.5, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs (akassa)', 'base' => 100, 'p' => 2.3, 'g' => 21.0, 'l' => 1.0, 'video' => 'akassa/ablo'],
                            ['nom' => 'Sauce graine (peu d\'huile de palme)', 'base' => 150, 'p' => 3.0, 'g' => 9.0, 'l' => 15.0, 'video' => 'sauce graine béninoise'],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Légumes verts (épinards)', 'base' => 200, 'p' => 5.0, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Salade de carottes râpées', 'base' => 100, 'p' => 1.0, 'g' => 9.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de légumes variés (gombo, tomates, oignons)', 'base' => 300, 'p' => 4.0, 'g' => 12.0, 'l' => 3.0, 'video' => 'soupe de légumes gombo'],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 8.0],
                            ['nom' => 'Igname bouillie', 'base' => 80, 'p' => 1.2, 'g' => 21.6, 'l' => 0.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 3.5, 'g' => 31.5, 'l' => 1.5],
                            ['nom' => 'Poisson grillé (maquereau)', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 13.0, 'video' => 'poisson grillé + salade'],
                            ['nom' => 'Salade de tomates et concombres', 'base' => 150, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2, 'video' => 'salade concombre-tomate-avocat'],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Amiwo (pâte rouge)', 'base' => 150, 'p' => 3.0, 'g' => 33.0, 'l' => 6.0, 'video' => 'préparation de l’amiwo'],
                            ['nom' => 'Viande maigre (poulet)', 'base' => 150, 'p' => 32.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Sauce tomate maison', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 3.0],
                            ['nom' => 'Salade verte abondante', 'base' => 200, 'p' => 2.0, 'g' => 8.0, 'l' => 0.4, 'video' => 'salade fraîche – laitue, concombres, tomates, avocat'],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade composée (laitue, tomates, concombres, carottes)', 'base' => 250, 'p' => 3.0, 'g' => 10.0, 'l' => 0.5, 'video' => 'salade composée avec avocat'],
                            ['nom' => 'Haricots rouges cuits', 'base' => 150, 'p' => 10.0, 'g' => 27.0, 'l' => 1.0],
                            ['nom' => '1 œuf dur', 'base' => 50, 'p' => 6.0, 'g' => 1.0, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.5, 'l' => 7.5],
                        ]
                    ],
                    'Option C' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie d’avoine', 'base' => 250, 'p' => 7.5, 'g' => 32.0, 'l' => 4.5],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.2, 'g' => 3.2, 'l' => 9.8],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 6.8, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Plantain bouilli', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.5],
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 4.0, 'g' => 36.0, 'l' => 1.2],
                            ['nom' => 'Sauce tomate légumes', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.5],
                            ['nom' => 'Salade concombre', 'base' => 150, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.5, 'g' => 0.0, 'l' => 3.2],
                            ['nom' => 'Fonio cuit', 'base' => 120, 'p' => 4.0, 'g' => 30.0, 'l' => 0.6],
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 2.5, 'g' => 6.0, 'l' => 2.0],
                        ]
                    ],
                    'Option D' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de millet', 'base' => 250, 'p' => 6.0, 'g' => 34.5, 'l' => 2.5],
                            ['nom' => 'Œuf dur (1)', 'base' => 60, 'p' => 6.5, 'g' => 0.6, 'l' => 5.3],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 0.7, 'g' => 16.5, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.5, 'g' => 0.0, 'l' => 3.2],
                            ['nom' => 'Fonio cuit', 'base' => 120, 'p' => 4.0, 'g' => 30.0, 'l' => 0.6],
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 2.5, 'g' => 6.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 150, 'p' => 12.0, 'g' => 27.0, 'l' => 0.8],
                            ['nom' => 'Igname', 'base' => 80, 'p' => 1.2, 'g' => 20.0, 'l' => 0.2],
                            ['nom' => 'Légumes verts', 'base' => 150, 'p' => 2.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'Huile de palme', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie d\'avoine (sans sucre)', 'base' => 200, 'p' => 5.6, 'g' => 23.4, 'l' => 2.6],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 7.0, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Arachides grillées', 'base' => 20, 'p' => 5.1, 'g' => 2.8, 'l' => 10.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (portion réduite)', 'base' => 150, 'p' => 3.6, 'g' => 34.0, 'l' => 1.2],
                            ['nom' => 'Sauce tomate aux légumes (aubergines)', 'base' => 100, 'p' => 1.5, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Poisson grillé (maquereau)', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Salade de concombre et tomate', 'base' => 150, 'p' => 2.0, 'g' => 4.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouilli (petite portion)', 'base' => 120, 'p' => 1.6, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Sauce arachide allégée', 'base' => 60, 'p' => 4.0, 'g' => 4.0, 'l' => 10.0],
                            ['nom' => 'Poulet grillé sans peau', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Légumes verts (épinards, oseille)', 'base' => 200, 'p' => 4.0, 'g' => 8.0, 'l' => 0.6],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Omelette aux légumes', 'base' => 100, 'p' => 12.5, 'g' => 1.0, 'l' => 10.5],
                            ['nom' => 'Pain complet (1 tranche)', 'base' => 40, 'p' => 4.3, 'g' => 18.0, 'l' => 1.0],
                            ['nom' => 'Avocat (quelques tranches)', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.0, 'g' => 36.0, 'l' => 1.5],
                            ['nom' => 'Sauce gombo légère', 'base' => 120, 'p' => 2.0, 'g' => 4.0, 'l' => 1.5],
                            ['nom' => 'Poulet grillé (sans peau)', 'base' => 150, 'p' => 32.0, 'g' => 0.0, 'l' => 4.0, 'video' => 'poulet au gombo'],
                        ],
                        'Dîner' => [
                            ['nom' => 'Patate douce bouillie (petite portion)', 'base' => 150, 'p' => 2.0, 'g' => 32.0, 'l' => 0.2],
                            ['nom' => 'Sauce tomate aux haricots verts', 'base' => 120, 'p' => 3.0, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Poisson braisé (tilapia)', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 7.0],
                            ['nom' => 'Salade verte (laitue, concombre)', 'base' => 150, 'p' => 2.0, 'g' => 4.0, 'l' => 0.3],
                        ]
                    ],
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Nékô (maïs fermenté)', 'base' => 250, 'p' => 5.5, 'g' => 45.0, 'l' => 1.2],
                            ['nom' => 'Œuf dur', 'base' => 60, 'p' => 7.8, 'g' => 0.6, 'l' => 6.0],
                            ['nom' => 'Légumes verts (okra, crin-crin)', 'base' => 150, 'p' => 3.0, 'g' => 7.0, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.5, 'g' => 41.0, 'l' => 1.6],
                            ['nom' => 'Haricots rouges', 'base' => 150, 'p' => 13.5, 'g' => 30.0, 'l' => 0.8],
                            ['nom' => 'Sauce tomate légère', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Légumes verts sautés', 'base' => 150, 'p' => 2.5, 'g' => 6.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 250, 'p' => 4.8, 'g' => 42.0, 'l' => 0.9],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce feuilles gombo', 'base' => 200, 'p' => 3.0, 'g' => 7.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de sorgho', 'base' => 250, 'p' => 6.0, 'g' => 44.0, 'l' => 1.5],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 6.8, 'g' => 10.0, 'l' => 0.4],
                            ['nom' => 'Banane', 'base' => 100, 'p' => 1.1, 'g' => 23.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.1, 'g' => 37.5, 'l' => 0.3],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce feuilles', 'base' => 200, 'p' => 3.0, 'g' => 7.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Salade composée', 'base' => 150, 'p' => 2.5, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 120, 'p' => 15.6, 'g' => 1.2, 'l' => 12.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Pamplemousse entier', 'base' => 150, 'p' => 1.0, 'g' => 18.0, 'l' => 0.0],
                    ['nom' => 'Yaourt nature maison', 'base' => 125, 'p' => 4.3, 'g' => 4.8, 'l' => 1.2],
                    ['nom' => 'Yaourt + cajou', 'base' => 140, 'p' => 6.5, 'g' => 8.0, 'l' => 7.5],
                    ['nom' => 'Fruits + eau de coco', 'base' => 400, 'p' => 1.2, 'g' => 28.0, 'l' => 0.5],
                    ['nom' => 'Galette de mil', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 5.0],
                    ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 7.8, 'g' => 5.1, 'l' => 14.7],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil avec lait écrémé', 'base' => 250, 'p' => 6.0, 'g' => 52.5, 'l' => 1.5, 'video' => 'Préparation de la bouillie de mil'],
                            ['nom' => 'Œuf', 'base' => 50, 'p' => 6.5, 'g' => 0.3, 'l' => 5.0],
                            ['nom' => 'Fromage local allégé', 'base' => 30, 'p' => 6.0, 'g' => 0.6, 'l' => 3.0],
                            ['nom' => 'Banane plantain mûre bouillie', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz blanc cuit', 'base' => 180, 'p' => 4.0, 'g' => 48.6, 'l' => 0.3, 'video' => 'Riz complet avec sauce tomate et légumes'],
                            ['nom' => 'Sauce tomate-légumes avec viande maigre', 'base' => 120, 'p' => 15.0, 'g' => 8.0, 'l' => 5.0],
                            ['nom' => 'Haricots verts et carottes', 'base' => 150, 'p' => 3.0, 'g' => 9.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Tapioca', 'base' => 150, 'p' => 0.3, 'g' => 36.0, 'l' => 0.1],
                            ['nom' => 'Sauce d\'arachide', 'base' => 100, 'p' => 25.0, 'g' => 20.0, 'l' => 50.0],
                            ['nom' => 'Viande de volaille', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Légumes sautés', 'base' => 200, 'p' => 4.0, 'g' => 12.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 30.0, 'l' => 1.5],
                            ['nom' => 'Omelette aux légumes', 'base' => 120, 'p' => 12.0, 'g' => 3.0, 'l' => 9.0],
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
                    ],
                    'Option C' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa au lait', 'base' => 200, 'p' => 3.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.0, 'g' => 0.5, 'l' => 5.0],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 7.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Foutou d’igname', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Sauce claire aux légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson frais', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Couscous de manioc', 'base' => 150, 'p' => 1.0, 'g' => 36.0, 'l' => 0.5],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Huile de palme rouge', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 4.5],
                        ]
                    ],
                    'Option D' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de millet', 'base' => 200, 'p' => 5.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Yaourt nature', 'base' => 100, 'p' => 4.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Fruits frais (papaye)', 'base' => 100, 'p' => 1.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Riz complet', 'base' => 120, 'p' => 3.0, 'g' => 27.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate légère', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots', 'base' => 100, 'p' => 7.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Pâte de maïs', 'base' => 120, 'p' => 3.0, 'g' => 30.0, 'l' => 0.5],
                            ['nom' => 'Sauce légumes feuilles', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0],
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
                    ],
                    'Option C' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte d’igname', 'base' => 150, 'p' => 2.0, 'g' => 32.0, 'l' => 0.2],
                            ['nom' => 'Sauce tomate aux légumes', 'base' => 100, 'p' => 1.2, 'g' => 6.0, 'l' => 1.5],
                            ['nom' => 'Œuf poché', 'base' => 50, 'p' => 6.0, 'g' => 0.6, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz au gras léger', 'base' => 150, 'p' => 3.0, 'g' => 40.0, 'l' => 5.0],
                            ['nom' => 'Poulet maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Salade de légumes', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akpan (maïs fermenté)', 'base' => 150, 'p' => 3.0, 'g' => 32.0, 'l' => 0.5],
                            ['nom' => 'Sauce arachide légère', 'base' => 100, 'p' => 5.0, 'g' => 8.0, 'l' => 9.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ]
                    ],
                    'Option D' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 200, 'p' => 4.0, 'g' => 42.0, 'l' => 1.0],
                            ['nom' => 'Arachides', 'base' => 15, 'p' => 3.8, 'g' => 1.2, 'l' => 7.0],
                            ['nom' => 'Fruits frais', 'base' => 100, 'p' => 0.5, 'g' => 13.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.5, 'g' => 33.0, 'l' => 0.6],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Banane', 'base' => 100, 'p' => 1.3, 'g' => 23.0, 'l' => 0.3],
                    ['nom' => 'Bissap sans sucre', 'base' => 200, 'p' => 0.0, 'g' => 1.0, 'l' => 0.0],
                    ['nom' => 'Banane + amandes', 'base' => 115, 'p' => 5.0, 'g' => 25.0, 'l' => 7.0],
                    ['nom' => 'Bissap + biscuits de mil', 'base' => 180, 'p' => 3.0, 'g' => 25.0, 'l' => 2.0],
                    ['nom' => 'Fromage local', 'base' => 50, 'p' => 6.0, 'g' => 1.0, 'l' => 5.0],
                    ['nom' => 'Boulettes de haricots rouges', 'base' => 50, 'p' => 6.0, 'g' => 15.0, 'l' => 1.0],
                    ['nom' => 'Beignets de manioc', 'base' => 50, 'p' => 2.0, 'g' => 20.0, 'l' => 2.0],
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
                            ['nom' => 'Thé au gingembre', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
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
                            ['nom' => 'Légumes sautés (poivrons, aubergines)', 'base' => 200, 'p' => 2.0, 'g' => 10.0, 'l' => 5.0],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 15.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa (bouillie de maïs)', 'base' => 200, 'p' => 5.0, 'g' => 44.0, 'l' => 0.5],
                            ['nom' => 'Haricots en sauce', 'base' => 100, 'p' => 8.0, 'g' => 15.0, 'l' => 2.5],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.5, 'g' => 0.3, 'l' => 5.0],
                            ['nom' => 'Jus de fruits frais (orange)', 'base' => 200, 'p' => 1.0, 'g' => 20.0, 'l' => 0.2],
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
                    ],
                    'Option C' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 1.0],
                            ['nom' => 'Lait écrémé', 'base' => 150, 'p' => 5.0, 'g' => 7.0, 'l' => 0.5],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.0, 'g' => 2.0, 'l' => 10.0],
                            ['nom' => 'Miel local', 'base' => 10, 'p' => 0.0, 'g' => 8.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Viande de bœuf maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Riz au gras allégé', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 4.0],
                            ['nom' => 'Salade de crudités', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Sauce aux légumes feuilles', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                        ]
                    ],
                    'Option D' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de millet', 'base' => 200, 'p' => 5.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Yaourt nature', 'base' => 150, 'p' => 5.0, 'g' => 7.0, 'l' => 3.0],
                            ['nom' => 'Fruits', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Sauce légumes', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.1],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
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
                            ['nom' => 'Œuf (50g)', 'base' => 50, 'p' => 6.0, 'g' => 0.0, 'l' => 5.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.2],
                            ['nom' => 'Sauce claire au poisson', 'base' => 150, 'p' => 10.0, 'g' => 5.0, 'l' => 5.0],
                            ['nom' => 'Légumes feuilles', 'base' => 50, 'p' => 1.0, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Huile de palme (2 c. à café)', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 180, 'p' => 3.6, 'g' => 40.0, 'l' => 0.5],
                            ['nom' => 'Haricots blancs', 'base' => 100, 'p' => 7.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate + légumes', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0],
                            ['nom' => 'Huile d\'arachide (1 c. à café)', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 5.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 1.5, 'g' => 40.0, 'l' => 0.2],
                            ['nom' => 'Sauce viande maigre', 'base' => 150, 'p' => 15.0, 'g' => 5.0, 'l' => 5.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option C' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de millet', 'base' => 250, 'p' => 7.0, 'g' => 53.0, 'l' => 3.0],
                            ['nom' => 'Yaourt nature', 'base' => 125, 'p' => 5.0, 'g' => 6.0, 'l' => 3.0],
                            ['nom' => 'Fruits frais', 'base' => 150, 'p' => 1.0, 'g' => 35.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.0, 'g' => 40.0, 'l' => 0.5],
                            ['nom' => 'Poisson bouilli', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce gombo + légumes', 'base' => 150, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Foutou banane plantain', 'base' => 200, 'p' => 2.0, 'g' => 48.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate maigre', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                        ]
                    ],
                    'Option D' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 1.5, 'g' => 32.0, 'l' => 0.2],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.3],
                            ['nom' => 'Viande blanche', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce légumes feuilles', 'base' => 150, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de manioc', 'base' => 180, 'p' => 2.0, 'g' => 42.0, 'l' => 0.3],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mangue ou papaye', 'base' => 150, 'p' => 1.0, 'g' => 25.0, 'l' => 0.2],
                    ['nom' => 'Noix mélangées', 'base' => 25, 'p' => 5.0, 'g' => 3.0, 'l' => 12.0],
                    ['nom' => 'Klui-klui (boulettes cacahuète)', 'base' => 30, 'p' => 7.0, 'g' => 5.0, 'l' => 10.0],
                    ['nom' => 'Fromage local + concombre', 'base' => 80, 'p' => 6.5, 'g' => 3.0, 'l' => 5.1],
                    ['nom' => 'Fruits secs locaux', 'base' => 30, 'p' => 3.0, 'g' => 20.0, 'l' => 1.0],
                    ['nom' => 'Galette de haricots', 'base' => 50, 'p' => 5.0, 'g' => 25.0, 'l' => 2.0],
                    ['nom' => 'Smoothie de fruits au lait', 'base' => 200, 'p' => 5.0, 'g' => 20.0, 'l' => 1.0],
                    ['nom' => 'Fruits secs (noix, arachides)', 'base' => 30, 'p' => 6.0, 'g' => 5.0, 'l' => 12.0],
                    ['nom' => 'Boulettes maïs/légumes', 'base' => 50, 'p' => 3.0, 'g' => 20.0, 'l' => 2.0],
                    ['nom' => 'Smoothie fruits béninois', 'base' => 150, 'p' => 2.0, 'g' => 20.0, 'l' => 1.0],
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
                            ['nom' => 'Légumes varies', 'base' => 250, 'p' => 5.0, 'g' => 15.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ignames bouillies', 'base' => 200, 'p' => 2.0, 'g' => 50.0, 'l' => 0.0],
                            ['nom' => 'Sauce d\'arachide', 'base' => 130, 'p' => 13.0, 'g' => 12.0, 'l' => 18.0],
                            ['nom' => 'Poulet grille', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
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
                    ],
                    'Option C' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa enrichi', 'base' => 150, 'p' => 3.0, 'g' => 32.0, 'l' => 0.5],
                            ['nom' => 'Œufs', 'base' => 100, 'p' => 13.0, 'g' => 1.0, 'l' => 11.0],
                            ['nom' => 'Banane plantain', 'base' => 100, 'p' => 1.3, 'g' => 31.0, 'l' => 0.3],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 0.7, 'g' => 4.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé (tilapia)', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Riz complet', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Igname bouillie', 'base' => 140, 'p' => 1.0, 'g' => 32.0, 'l' => 0.2],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'Tubercules variés (igname, patate)', 'base' => 140, 'p' => 1.0, 'g' => 30.0, 'l' => 0.2],
                            ['nom' => 'Sauce légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option D' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 200, 'p' => 4.0, 'g' => 42.0, 'l' => 1.0],
                            ['nom' => 'Omelette légumes', 'base' => 120, 'p' => 14.0, 'g' => 3.0, 'l' => 11.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Couscous manioc', 'base' => 160, 'p' => 3.0, 'g' => 36.0, 'l' => 0.2],
                            ['nom' => 'Légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 0.5],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 25.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
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
                            ['nom' => 'Sauce gombo', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 2.0, 'video' => 'Voir la vidéo de la sauce gombo'],
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
                            ['nom' => 'Légumes varies', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 0.3],
                        ]
                    ],
                    'Option C' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 4.0, 'g' => 160.0, 'l' => 1.0],
                            ['nom' => 'Sauce poisson', 'base' => 50, 'p' => 8.0, 'g' => 2.0, 'l' => 4.0],
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 180, 'p' => 4.0, 'g' => 130.0, 'l' => 1.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Sauce tomate + légumes', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 180, 'p' => 5.0, 'g' => 130.0, 'l' => 1.0],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce feuilles locales', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 2.0],
                        ]
                    ],
                    'Option D' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie enrichie', 'base' => 200, 'p' => 6.0, 'g' => 150.0, 'l' => 2.0],
                            ['nom' => 'Œufs', 'base' => 120, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Fruits (mangue/papaye)', 'base' => 100, 'p' => 1.0, 'g' => 15.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname bouillie', 'base' => 200, 'p' => 2.0, 'g' => 45.0, 'l' => 0.0],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 4.0, 'g' => 160.0, 'l' => 1.0],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 2.0, 'g' => 6.0, 'l' => 1.0],
                            ['nom' => 'Viande blanche', 'base' => 120, 'p' => 25.0, 'g' => 0.0, 'l' => 3.0],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Smoothie énergétique (banane, papaye, lait, arachides)', 'base' => 300, 'p' => 6.0, 'g' => 35.0, 'l' => 6.0],
                    ['nom' => 'Akara (2 pièces)', 'base' => 60, 'p' => 6.0, 'g' => 15.0, 'l' => 6.0],
                    ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 1.0, 'g' => 27.0, 'l' => 0.1],
                    ['nom' => 'Graines de tournesol', 'base' => 20, 'p' => 4.0, 'g' => 2.0, 'l' => 6.0],
                    ['nom' => 'Jus de bissap + dattes', 'base' => 170, 'p' => 1.0, 'g' => 15.0, 'l' => 0.1],
                    ['nom' => 'Banane plantain + noix', 'base' => 150, 'p' => 2.0, 'g' => 36.0, 'l' => 6.0],
                    ['nom' => 'Boisson de mil + fruits', 'base' => 200, 'p' => 4.0, 'g' => 30.0, 'l' => 1.0],
                    ['nom' => 'Galette patate douce + lait', 'base' => 120, 'p' => 3.0, 'g' => 28.0, 'l' => 4.0],
                    ['nom' => 'Beignets banane plantain', 'base' => 50, 'p' => 1.0, 'g' => 25.0, 'l' => 5.0],
                    ['nom' => 'Fruits frais', 'base' => 150, 'p' => 1.0, 'g' => 25.0, 'l' => 0.0],
                    ['nom' => 'Boulettes manioc + légumes', 'base' => 80, 'p' => 2.0, 'g' => 15.0, 'l' => 1.0],
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
                    ],
                    'Option C' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie enrichie', 'base' => 300, 'p' => 6.0, 'g' => 60.0, 'l' => 2.0],
                            ['nom' => 'Tubercules (igname, patate)', 'base' => 150, 'p' => 1.5, 'g' => 35.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Protéines variées (poisson, poulet)', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Glucides complexes (riz, couscous)', 'base' => 200, 'p' => 4.0, 'g' => 150.0, 'l' => 1.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 5.0, 'g' => 120.0, 'l' => 1.0],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce feuilles', 'base' => 150, 'p' => 3.0, 'g' => 8.0, 'l' => 2.0],
                        ]
                    ],
                    'Option D' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de maïs', 'base' => 250, 'p' => 5.0, 'g' => 55.0, 'l' => 1.0],
                            ['nom' => 'Œufs', 'base' => 120, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'Banane douce', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.0, 'g' => 140.0, 'l' => 1.0],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 23.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce légumes', 'base' => 150, 'p' => 3.0, 'g' => 8.0, 'l' => 2.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio', 'base' => 150, 'p' => 5.0, 'g' => 120.0, 'l' => 1.0],
                            ['nom' => 'Viande blanche', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Légumes verts', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 0.5],
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
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5, 'video' => 'Akassa'],
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
                            ['nom' => 'Akassa enrichi', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5, 'video' => 'Akassa enrichi'],
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
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 0.5, 'video' => 'Pâte de Maïs // WÔ // ACOUNMAIN'],
                            ['nom' => 'Sauce poisson', 'base' => 150, 'p' => 20.0, 'g' => 5.0, 'l' => 5.0],
                            ['nom' => 'Légumes sautés', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 3.0],
                        ]
                    ],
                    'Option C' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Porridge de maïs', 'base' => 250, 'p' => 5.0, 'g' => 55.0, 'l' => 1.0],
                            ['nom' => 'Œuf dur', 'base' => 60, 'p' => 6.0, 'g' => 1.0, 'l' => 5.0],
                            ['nom' => 'Légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 180, 'p' => 4.0, 'g' => 140.0, 'l' => 1.0],
                            ['nom' => 'Poisson grillé', 'base' => 120, 'p' => 23.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Sauce arachide', 'base' => 50, 'p' => 5.0, 'g' => 5.0, 'l' => 10.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 150, 'p' => 5.0, 'g' => 120.0, 'l' => 1.0],
                            ['nom' => 'Sauce tomate + légumes', 'base' => 150, 'p' => 2.0, 'g' => 15.0, 'l' => 2.0],
                            ['nom' => 'Haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 0.5],
                        ]
                    ],
                    'Option D' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de millet', 'base' => 250, 'p' => 6.0, 'g' => 50.0, 'l' => 1.0],
                            ['nom' => 'Lait', 'base' => 150, 'p' => 5.0, 'g' => 7.0, 'l' => 3.0],
                            ['nom' => 'Fruits', 'base' => 100, 'p' => 1.0, 'g' => 20.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous manioc', 'base' => 180, 'p' => 4.0, 'g' => 140.0, 'l' => 1.0],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Légumes', 'base' => 150, 'p' => 2.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2.0, 'g' => 35.0, 'l' => 0.0],
                            ['nom' => 'Sauce gombo', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 0.5],
                            ['nom' => 'Poisson fumé', 'base' => 120, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
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
                    ['nom' => 'Fruits + céréales', 'base' => 150, 'p' => 2.0, 'g' => 30.0, 'l' => 0.5],
                    ['nom' => 'Boissons naturelles', 'base' => 200, 'p' => 1.0, 'g' => 10.0, 'l' => 0.0],
                    ['nom' => 'Collation glucidique', 'base' => 50, 'p' => 1.0, 'g' => 12.0, 'l' => 0.2],
                    ['nom' => 'Fruits frais', 'base' => 150, 'p' => 1.0, 'g' => 20.0, 'l' => 0.0],
                    ['nom' => 'Arachides grillées', 'base' => 30, 'p' => 8.0, 'g' => 6.0, 'l' => 14.0],
                    ['nom' => 'Boulettes de maïs', 'base' => 50, 'p' => 2.0, 'g' => 20.0, 'l' => 0.5],
                ]
            ],
        ];
    }
}
