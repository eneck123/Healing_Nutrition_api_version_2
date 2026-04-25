<?php

namespace App\Services;

class WeightLossUnder5DiabetesNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Neko (porridge de maïs fermenté) non sucré', 'base' => 200, 'p' => 4.0, 'g' => 40.0, 'l' => 1.2, 'video' => 'Recette de porridge de maïs fermenté'],
                            ['nom' => 'Salade de légumes (okra/crin-crin)', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.4],
                            ['nom' => '1 œuf dur', 'base' => 50, 'p' => 6.3, 'g' => 0.6, 'l' => 5.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs (akassa) en portion réduite', 'base' => 150, 'p' => 3.0, 'g' => 21.0, 'l' => 0.8, 'video' => "Recette d'Akassa haïtien"],
                            ['nom' => 'Sauce tomate aux légumes', 'base' => 100, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Poisson tilapia grillé', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0, 'video' => 'Recette de tilapia grillé'],
                            ['nom' => 'Légumes verts vapeur', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Riz complet (portion modérée)', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'Sauce d’amarante ou fonman', 'base' => 100, 'p' => 3.0, 'g' => 6.0, 'l' => 4.0, 'video' => 'Recette de sauce d’amarante'],
                            ['nom' => 'Poulet grillé sans peau', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 4.0, 'video' => 'Recette de poulet grillé'],
                            ['nom' => 'Crudités', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Haricots rouges mijotés', 'base' => 150, 'p' => 12.0, 'g' => 27.0, 'l' => 1.2, 'video' => 'haricots rouges sautés'],
                            ['nom' => 'Petite portion d\'igname bouillie', 'base' => 100, 'p' => 1.5, 'g' => 27.9, 'l' => 0.2],
                            ['nom' => 'Huile de palme rouge (1 c. à soupe)', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'Légumes verts sautés (épinards, gboma)', 'base' => 100, 'p' => 2.5, 'g' => 4.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé (tilapia)', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Akassa nature', 'base' => 150, 'p' => 3.0, 'g' => 21.0, 'l' => 0.8, 'video' => 'recette d’Akassa / pâte de maïs'],
                            ['nom' => 'Sauce arachide allégée (2 c. à soupe)', 'base' => 30, 'p' => 4.0, 'g' => 3.0, 'l' => 6.0],
                            ['nom' => 'Salade de tomates et concombres', 'base' => 100, 'p' => 1.2, 'g' => 4.0, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Œufs brouillés (2 œufs)', 'base' => 100, 'p' => 12.6, 'g' => 1.2, 'l' => 10.6, 'video' => 'œufs brouillés aux légumes'],
                            ['nom' => 'Patate douce bouillie', 'base' => 70, 'p' => 1.1, 'g' => 14.0, 'l' => 0.1],
                            ['nom' => 'Avocat (1/4 fruit)', 'base' => 50, 'p' => 1.0, 'g' => 4.3, 'l' => 7.4],
                            ['nom' => 'Légumes feuilles (oseille, amarante)', 'base' => 100, 'p' => 2.5, 'g' => 4.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie d\'avoine aux arachides (sans sucre)', 'base' => 100, 'p' => 2.4, 'g' => 12.3, 'l' => 1.4, 'video' => 'Recette de bouillie d\'avoine'],
                            ['nom' => 'Arachides grillées non salées', 'base' => 30, 'p' => 7.7, 'g' => 4.8, 'l' => 14.8],
                            ['nom' => 'œuf dur', 'base' => 50, 'p' => 6.3, 'g' => 0.6, 'l' => 5.3],
                            ['nom' => 'mangue verte en tranches', 'base' => 100, 'p' => 0.8, 'g' => 15.0, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce graine aux épinards', 'base' => 100, 'p' => 6.0, 'g' => 10.0, 'l' => 10.0, 'video' => 'Recette de sauce graine'],
                            ['nom' => 'poisson fumé', 'base' => 100, 'p' => 30.0, 'g' => 0.0, 'l' => 15.0],
                            ['nom' => 'petit tubercule d\'igname', 'base' => 100, 'p' => 1.5, 'g' => 27.9, 'l' => 0.2],
                            ['nom' => 'avocat', 'base' => 100, 'p' => 2.0, 'g' => 8.5, 'l' => 14.7],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce tomate légère', 'base' => 100, 'p' => 1.5, 'g' => 8.0, 'l' => 0.5, 'video' => 'Recette de sauce tomate à la viande de bœuf'],
                            ['nom' => 'viande de bœuf maigre', 'base' => 100, 'p' => 26.0, 'g' => 0.0, 'l' => 15.0],
                            ['nom' => 'riz complet (portion réduite)', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'légumes verts (gombo + carotte)', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa (bouillie de maïs)', 'base' => 100, 'p' => 2.0, 'g' => 14.0, 'l' => 0.5, 'video' => 'recette d’Akassa / pâte de maïs'],
                            ['nom' => 'lait écrémé', 'base' => 100, 'p' => 3.4, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'arachides grillées non salée', 'base' => 30, 'p' => 7.7, 'g' => 4.8, 'l' => 14.8],
                            ['nom' => '1 œuf dur', 'base' => 50, 'p' => 6.3, 'g' => 0.6, 'l' => 5.3],
                            ['nom' => 'thé vert sans sucre', 'base' => 200, 'p' => 0.1, 'g' => 0.5, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé (maquereau ou sardine)', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 13.0],
                            ['nom' => 'igname bouillie (portion réduite)', 'base' => 100, 'p' => 1.5, 'g' => 27.9, 'l' => 0.2],
                            ['nom' => 'sauce tomate aux légumes verts (épinards)', 'base' => 100, 'p' => 2.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'salade de concombre', 'base' => 100, 'p' => 0.8, 'g' => 3.6, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges mijotés', 'base' => 150, 'p' => 12.0, 'g' => 27.0, 'l' => 1.2],
                            ['nom' => 'riz complet (petite portion)', 'base' => 80, 'p' => 2.8, 'g' => 25.0, 'l' => 0.8],
                            ['nom' => 'légumes sautés (gombo + carotte)', 'base' => 150, 'p' => 3.0, 'g' => 10.0, 'l' => 1.0],
                            ['nom' => 'avocat (1/4 fruit)', 'base' => 50, 'p' => 1.0, 'g' => 4.25, 'l' => 7.35],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Arachides grillées non salées + orange', 'base' => 130, 'p' => 7.7, 'g' => 15.0, 'l' => 14.8],
                    ['nom' => 'Boulettes de manioc cuit (boulangère) + melon', 'base' => 100, 'p' => 4.0, 'g' => 14.0, 'l' => 10.0, 'video' => 'Recette de boulettes de manioc'],
                    ['nom' => 'Bouillie de mil sans sucre + lait de coco', 'base' => 100, 'p' => 6.0, 'g' => 28.0, 'l' => 12.0],
                    ['nom' => 'Yaourt nature + noix de coco râpée', 'base' => 135, 'p' => 5.0, 'g' => 7.0, 'l' => 3.5],
                    ['nom' => 'Goyave + noix de cajou', 'base' => 115, 'p' => 3.5, 'g' => 12.0, 'l' => 7.0],
                    ['nom' => 'Fromage local + concombre en bâtonnets', 'base' => 80, 'p' => 5.0, 'g' => 1.0, 'l' => 6.0],
                ]
            ],
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'millet porridge', 'base' => 100, 'p' => 3.0, 'g' => 23.0, 'l' => 1.0],
                            ['nom' => 'fruit à IG bas (papaye)', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'wassa-wassa (igname couscous)', 'base' => 100, 'p' => 1.5, 'g' => 27.0, 'l' => 0.2, 'video' => 'Wassa-Wassa'],
                            ['nom' => 'sauce de gombo', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0, 'video' => 'Voir la vidéo de la sauce gombo'],
                            ['nom' => 'poisson maigre (tilapia)', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 3.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'riz complet', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'sauce de haricots', 'base' => 100, 'p' => 8.0, 'g' => 20.0, 'l' => 1.5],
                            ['nom' => 'légumes à feuilles', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte de maïs (ablo)', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5, 'video' => 'recette d’Ablo'],
                            ['nom' => 'sauce poisson fumé + légumes variés', 'base' => 100, 'p' => 3.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'huile de palme (2 c. à café)', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local complet', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'ragout de bœuf maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'légumes sauce (gombo, tomates)', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 1.0],
                            ['nom' => 'huile d\'arachide (1 c. à café)', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 4.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio préparé', 'base' => 100, 'p' => 3.0, 'g' => 25.0, 'l' => 0.5, 'video' => 'fonio stir-fry'],
                            ['nom' => 'poulet de race grillé', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'sauce légère aux légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa (pâte de maïs fermenté)', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5],
                            ['nom' => 'lait caillé', 'base' => 100, 'p' => 3.5, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'banane plantain grillée (petite portion)', 'base' => 80, 'p' => 1.0, 'g' => 20.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce okra', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'crevettes', 'base' => 100, 'p' => 24.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'igname bouillie', 'base' => 100, 'p' => 1.5, 'g' => 27.9, 'l' => 0.2],
                            ['nom' => 'huile de palme (modérée)', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 4.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce d\'arachide allégée', 'base' => 100, 'p' => 8.0, 'g' => 12.0, 'l' => 10.0, 'video' => 'fonio au ragoût d’arachide'],
                            ['nom' => 'poulet sans peau', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'fonio', 'base' => 100, 'p' => 3.0, 'g' => 25.0, 'l' => 0.5],
                            ['nom' => 'carotte et haricots verts', 'base' => 100, 'p' => 1.5, 'g' => 8.0, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte de maïs (ablo)', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5, 'video' => 'recette d’Ablo'],
                            ['nom' => 'sauce poisson fumé + légumes variés', 'base' => 100, 'p' => 3.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'Huile de palme (2 c. à café)', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local complet', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'ragout de bœuf maigre', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'légumes sauce (gombo, tomates)', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 1.0],
                            ['nom' => 'huile d\'arachide (1 c. à café)', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 4.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Fonio préparé', 'base' => 100, 'p' => 3.0, 'g' => 25.0, 'l' => 0.5, 'video' => 'fonio stir-fry'],
                            ['nom' => 'poulet de race grillé', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'sauce légère aux légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'akara grillé (non frit)', 'base' => 30, 'p' => 5.0, 'g' => 8.0, 'l' => 2.0],
                    ['nom' => 'yaourt nature', 'base' => 125, 'p' => 5.0, 'g' => 7.0, 'l' => 3.0],
                    ['nom' => 'fruits locaux (ananas)', 'base' => 100, 'p' => 0.5, 'g' => 13.0, 'l' => 0.1],
                    ['nom' => 'Galette de mil + lait caillé', 'base' => 180, 'p' => 4.0, 'g' => 28.0, 'l' => 2.0],
                    ['nom' => 'Beignet de haricot (petit) + thé', 'base' => 240, 'p' => 3.0, 'g' => 15.0, 'l' => 2.0],
                    ['nom' => 'Fruits de baobab + eau', 'base' => 100, 'p' => 1.5, 'g' => 16.0, 'l' => 0.5, 'video' => 'Voir la vidéo sur les bienfaits'],
                    ['nom' => 'Boules de mil soufflé maison', 'base' => 30, 'p' => 2.0, 'g' => 20.0, 'l' => 0.3, 'video' => 'Voir la vidéo de préparation'],
                    ['nom' => 'Mangue verte + sel', 'base' => 100, 'p' => 0.8, 'g' => 15.0, 'l' => 0.4],
                ]
            ],
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'farine de sorgho/cassava (gari) avec légumes', 'base' => 100, 'p' => 1.0, 'g' => 80.0, 'l' => 0.5],
                            ['nom' => 'Légumes feuilles cuits', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'Fruit (papaye/ananas)', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'riz brun', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'sauce mixte (légumes, légumineuses)', 'base' => 100, 'p' => 6.0, 'g' => 15.0, 'l' => 3.0],
                            ['nom' => 'viande blanche maigre', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 4.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'pâte de maïs ou yam dough (telibô)', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5, 'video' => 'préparation du telibô'],
                            ['nom' => 'sauce aux légumes', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 1.0],
                            ['nom' => 'œuf ou poisson', 'base' => 50, 'p' => 6.0, 'g' => 0.0, 'l' => 5.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 100, 'p' => 1.5, 'g' => 28.0, 'l' => 0.2, 'video' => 'igne sous sauce claire au maquereau'],
                            ['nom' => 'sauce claire au poisson', 'base' => 100, 'p' => 3.0, 'g' => 5.0, 'l' => 2.0],
                            ['nom' => 'légumes feuilles', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'huile de palme (2 c. à café)', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0, 'video' => 'riz aux haricots blancs, style Waakye / Ayimolou'],
                            ['nom' => 'haricots blancs', 'base' => 100, 'p' => 7.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'légumes sauce tomate', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'huile d\'arachide (1 c. à café)', 'base' => 5, 'p' => 0.0, 'g' => 0.0, 'l' => 4.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Akassa', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5],
                            ['nom' => 'sauce viande maigre', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 10.0],
                            ['nom' => 'légumes verts variés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5],
                            ['nom' => 'haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'huile de palme (10 g)', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                            ['nom' => 'papaye', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0, 'video' => 'Voir la vidéo de la sauce gombo'],
                            ['nom' => 'poisson frais', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'riz local', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'patate douce (portion modérée)', 'base' => 100, 'p' => 1.5, 'g' => 20.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'viande de chèvre', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'tubercules mélangés', 'base' => 100, 'p' => 2.0, 'g' => 25.0, 'l' => 0.5],
                            ['nom' => 'légumes', 'base' => 100, 'p' => 1.5, 'g' => 5.0, 'l' => 0.3],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa enrichie aux arachides', 'base' => 100, 'p' => 5.0, 'g' => 22.0, 'l' => 6.0],
                            ['nom' => 'Pain complet local', 'base' => 50, 'p' => 4.0, 'g' => 25.0, 'l' => 1.0],
                            ['nom' => 'Œuf brouillé aux légumes', 'base' => 100, 'p' => 6.0, 'g' => 3.0, 'l' => 5.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Viande de bœuf grillée', 'base' => 120, 'p' => 26.0, 'g' => 0.0, 'l' => 6.0],
                            ['nom' => 'Igname pilée (portion normale)', 'base' => 100, 'p' => 1.5, 'g' => 28.0, 'l' => 0.2],
                            ['nom' => 'Sauce palme légère', 'base' => 50, 'p' => 1.0, 'g' => 2.0, 'l' => 4.0],
                            ['nom' => 'Salade de crudités variées', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Crevettes sautées', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Riz rouge du Bénin', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 1.5, 'g' => 7.0, 'l' => 0.5],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'klui-klui (boulettes de cacahuète)', 'base' => 30, 'p' => 5.0, 'g' => 8.0, 'l' => 5.0, 'video' => 'Voir la vidéo de préparation'],
                    ['nom' => 'Banane plantain bouillie (petite)', 'base' => 100, 'p' => 1.0, 'g' => 27.0, 'l' => 0.3],
                    ['nom' => 'Graines de tournesol locales', 'base' => 30, 'p' => 6.0, 'g' => 5.0, 'l' => 10.0],
                    ['nom' => 'Jus de bissap sans sucre + dattes', 'base' => 220, 'p' => 0.5, 'g' => 10.0, 'l' => 0.2, 'video' => 'Voir la vidéo de préparation'],
                ]
            ],
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'gari porridge', 'base' => 100, 'p' => 1.0, 'g' => 80.0, 'l' => 0.5],
                            ['nom' => 'banane', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.2],
                            ['nom' => 'lait léger', 'base' => 100, 'p' => 3.5, 'g' => 5.0, 'l' => 1.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'akassa', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5, 'video' => 'Voir la vidéo du repas (Akassa)'],
                            ['nom' => 'sauce légumes', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 1.0],
                            ['nom' => 'poisson', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'salade', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'riz complet', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'légumineuses (haricots rouges)', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                            ['nom' => 'légumes cuits', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'yaourt nature', 'base' => 100, 'p' => 3.5, 'g' => 5.0, 'l' => 3.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa enrichi', 'base' => 100, 'p' => 4.0, 'g' => 22.0, 'l' => 5.0],
                            ['nom' => 'œufs', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'banane plantain', 'base' => 100, 'p' => 1.0, 'g' => 31.0, 'l' => 0.3],
                            ['nom' => 'avocat (portion normale)', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'riz complet', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'igname bouillie', 'base' => 100, 'p' => 1.5, 'g' => 28.0, 'l' => 0.2],
                            ['nom' => 'légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5, 'video' => 'Pâte de Maïs // WÔ // ACOUNMAIN'],
                            ['nom' => 'sauce poisson', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 100, 'p' => 3.0, 'g' => 22.0, 'l' => 1.0, 'video' => 'Banana & Peanut porridge'],
                            ['nom' => 'lait', 'base' => 100, 'p' => 3.5, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'banane', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.2],
                            ['nom' => 'arachides', 'base' => 30, 'p' => 7.5, 'g' => 5.0, 'l' => 14.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce palava', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'poisson', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'riz', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                            ['nom' => 'igname', 'base' => 100, 'p' => 1.5, 'g' => 28.0, 'l' => 0.2],
                            ['nom' => 'huile modérée', 'base' => 10, 'p' => 0.0, 'g' => 0.0, 'l' => 9.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de légumes', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'viande', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'fonio', 'base' => 100, 'p' => 3.5, 'g' => 27.0, 'l' => 0.5],
                            ['nom' => 'tubercules variés', 'base' => 100, 'p' => 1.5, 'g' => 20.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0, 'video' => 'RIZ AU POULET ET SAUCE TOMATE TRÈS SIMPLE'],
                            ['nom' => 'poulet grillé', 'base' => 100, 'p' => 23.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'sauce tomate', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'légumes variés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5],
                            ['nom' => 'sauce tomate', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'légumes sautés', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'haricots rouges', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Porridge de maïs', 'base' => 100, 'p' => 3.0, 'g' => 21.0, 'l' => 1.0],
                            ['nom' => 'œuf dur', 'base' => 50, 'p' => 6.0, 'g' => 0.5, 'l' => 5.0],
                            ['nom' => 'légumes verts', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'fruit (mangue, papaye)', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                    ['nom' => 'quelques cacahuètes grillées', 'base' => 30, 'p' => 7.5, 'g' => 5.0, 'l' => 14.0],
                    ['nom' => 'Galette de patate douce + lait', 'base' => 100, 'p' => 2.8, 'g' => 17.5, 'l' => 0.7],
                    ['nom' => 'Fruits secs locaux mélangés', 'base' => 30, 'p' => 2.0, 'g' => 15.0, 'l' => 5.0],
                    ['nom' => 'Galette de mil (petite, peu sucrée)', 'base' => 50, 'p' => 2.0, 'g' => 25.0, 'l' => 0.5],
                    ['nom' => 'Eau de coco + quelques noix', 'base' => 210, 'p' => 0.5, 'g' => 6.0, 'l' => 3.0],
                    ['nom' => 'Beignets de banane plantain au four', 'base' => 50, 'p' => 1.0, 'g' => 15.0, 'l' => 3.0, 'video' => 'COMMENT FAIRE LES BEIGNETS DE BANANES PLANTIN'],
                ]
            ],
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Wassa-wassa de maïs', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5, 'video' => 'préparation du Wassa wassa'],
                            ['nom' => 'œufs brouillés', 'base' => 100, 'p' => 12.0, 'g' => 1.0, 'l' => 10.0],
                            ['nom' => 'avocat', 'base' => 50, 'p' => 1.0, 'g' => 3.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0, 'video' => 'riz + poisson + haricots / sauce tomate'],
                            ['nom' => 'sauce tomate enrichie aux légumes', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.5],
                            ['nom' => 'poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'haricots blancs (niébé)', 'base' => 100, 'p' => 8.0, 'g' => 22.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Wassa-wassa de cossette d’igname', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5, 'video' => 'préparation de Wassa wassa / couscous local'],
                            ['nom' => 'sauce légumes verts (gboma)', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'poisson fumé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs fermenté (koko) enrichie au lait', 'base' => 200, 'p' => 6.5, 'g' => 27.0, 'l' => 2.0],
                            ['nom' => 'omelette aux légumes', 'base' => 100, 'p' => 12.0, 'g' => 1.5, 'l' => 10.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs (pâte rouge)', 'base' => 100, 'p' => 2.0, 'g' => 21.0, 'l' => 0.5, 'video' => 'sauce arachide aux légumes'],
                            ['nom' => 'sauce arachide aux légumes', 'base' => 100, 'p' => 8.0, 'g' => 8.0, 'l' => 12.0],
                            ['nom' => 'viande de bœuf ou poisson fumé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'riz local en accompagnement', 'base' => 100, 'p' => 3.5, 'g' => 31.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname pilée (foutou d’igname)', 'base' => 100, 'p' => 1.5, 'g' => 28.0, 'l' => 0.2],
                            ['nom' => 'sauce légumes (feuilles vertes)', 'base' => 100, 'p' => 2.0, 'g' => 5.0, 'l' => 1.0],
                            ['nom' => 'poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 2.0],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa enrichi', 'base' => 200, 'p' => 4.0, 'g' => 44.0, 'l' => 0.8],
                            ['nom' => 'omelette aux légumes', 'base' => 120, 'p' => 15.6, 'g' => 1.2, 'l' => 10.6],
                            ['nom' => 'Légumes (tomate, oignon)', 'base' => 50, 'p' => 1.5, 'g' => 6.0, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs (pâte rouge)', 'base' => 200, 'p' => 4.4, 'g' => 46.0, 'l' => 1.0],
                            ['nom' => 'sauce légumes (feuilles de patate)', 'base' => 100, 'p' => 3.5, 'g' => 6.0, 'l' => 0.4, 'video' => 'sauce feuilles de patate / légumes'],
                            ['nom' => 'viande blanche', 'base' => 120, 'p' => 27.0, 'g' => 0.0, 'l' => 3.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Légumes sautés', 'base' => 100, 'p' => 3.0, 'g' => 10.0, 'l' => 3.5],
                            ['nom' => 'banane plantain bouillie', 'base' => 150, 'p' => 1.8, 'g' => 46.0, 'l' => 0.4],
                            ['nom' => 'poisson', 'base' => 120, 'p' => 24.0, 'g' => 0.0, 'l' => 2.0],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 6.2, 'g' => 42.0, 'l' => 2.2],
                            ['nom' => 'arachides grillées (portion modérée)', 'base' => 30, 'p' => 7.8, 'g' => 4.5, 'l' => 15.6],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local', 'base' => 200, 'p' => 5.0, 'g' => 56.0, 'l' => 0.8],
                            ['nom' => 'sauce tomate aux légumes', 'base' => 100, 'p' => 2.5, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'poulet grillé', 'base' => 120, 'p' => 27.6, 'g' => 0.0, 'l' => 4.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Igname bouillie', 'base' => 200, 'p' => 3.2, 'g' => 52.0, 'l' => 0.4],
                            ['nom' => 'sauce légumes verts', 'base' => 100, 'p' => 3.0, 'g' => 6.0, 'l' => 0.5],
                            ['nom' => 'poisson grillé', 'base' => 110, 'p' => 24.0, 'g' => 0.0, 'l' => 2.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Arachides grillées + orange', 'base' => 130, 'p' => 8.3, 'g' => 17.0, 'l' => 14.2],
                    ['nom' => 'Bouillie légère de sorgho + lait', 'base' => 200, 'p' => 6.5, 'g' => 27.0, 'l' => 2.0],
                    ['nom' => 'Igname bouillie (petite portion) + avocat', 'base' => 150, 'p' => 2.5, 'g' => 31.0, 'l' => 7.7],
                    ['nom' => 'Arachides grillées + boisson moringa', 'base' => 30, 'p' => 7.8, 'g' => 4.5, 'l' => 15.6, 'video' => 'préparation de la boisson à base de moringa'],
                ]
            ],
        ];
    }
}
