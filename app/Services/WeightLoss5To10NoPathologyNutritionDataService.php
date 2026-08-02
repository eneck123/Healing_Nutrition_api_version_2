<?php

namespace App\Services;

class WeightLoss5To10NoPathologyNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs (akassa) sans sucre ajouté', 'base' => 150, 'p' => 3.0, 'g' => 35.0, 'l' => 1.0],
                            ['nom' => 'Lait écrémé', 'base' => 100, 'p' => 3.4, 'g' => 5.0, 'l' => 0.1],
                            ['nom' => 'Œuf dur', 'base' => 50, 'p' => 6.3, 'g' => 0.6, 'l' => 5.3],
                            ['nom' => 'Papaye fraîche', 'base' => 100, 'p' => 0.5, 'g' => 11.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce gombo avec poisson fumé maigre', 'base' => 200, 'p' => 18.0, 'g' => 6.0, 'l' => 2.0],
                            ['nom' => 'Pâte de maïs', 'base' => 100, 'p' => 2.7, 'g' => 27.0, 'l' => 0.5],
                            ['nom' => 'Salade de tomates, oignons, concombre', 'base' => 150, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de poisson (tilapia) avec légumes variés', 'base' => 300, 'p' => 20.0, 'g' => 10.0, 'l' => 3.0],
                            ['nom' => 'Igname bouillie', 'base' => 80, 'p' => 1.2, 'g' => 20.0, 'l' => 0.1],
                            ['nom' => 'Épinards sautés à l\'ail avec huile de palme rouge', 'base' => 100, 'p' => 2.5, 'g' => 3.0, 'l' => 4.5],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil non sucrée', 'base' => 150, 'p' => 3.5, 'g' => 32.0, 'l' => 0.5],
                            ['nom' => 'Arachides grillées sans huile', 'base' => 15, 'p' => 3.8, 'g' => 1.5, 'l' => 7.0],
                            ['nom' => 'Orange', 'base' => 150, 'p' => 1.2, 'g' => 12.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Ragoût de légumes (aubergines, tomates, poivrons)', 'base' => 250, 'p' => 3.0, 'g' => 15.0, 'l' => 2.0],
                            ['nom' => 'Poulet grillé sans peau', 'base' => 80, 'p' => 20.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Riz complet ou étuvé', 'base' => 80, 'p' => 6.0, 'g' => 58.0, 'l' => 0.5],
                            ['nom' => 'Salade verte au vinaigre', 'base' => 50, 'p' => 0.5, 'g' => 1.0, 'l' => 0.1],
                            ['nom' => 'Eau de bissap sans sucre', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges en sauce tomate légère', 'base' => 100, 'p' => 7.0, 'g' => 20.0, 'l' => 0.5],
                            ['nom' => 'Poisson grillé', 'base' => 70, 'p' => 16.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Patate douce bouillie', 'base' => 80, 'p' => 1.0, 'g' => 17.0, 'l' => 0.0],
                            ['nom' => 'Salade de chou', 'base' => 100, 'p' => 1.0, 'g' => 6.0, 'l' => 0.2],
                            ['nom' => 'Eau plate', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                    ],
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Tapioca (gari) trempé dans l\'eau', 'base' => 100, 'p' => 0.2, 'g' => 27.0, 'l' => 0.0],
                            ['nom' => 'Lait fermenté non sucré', 'base' => 150, 'p' => 4.5, 'g' => 6.0, 'l' => 2.3],
                            ['nom' => 'Avocat', 'base' => 30, 'p' => 0.4, 'g' => 1.6, 'l' => 4.5],
                            ['nom' => 'Banane plantain mûre bouillie', 'base' => 50, 'p' => 0.5, 'g' => 13.0, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce d\'arachide allégée avec viande de bœuf maigre', 'base' => 150, 'p' => 12.0, 'g' => 6.0, 'l' => 7.0],
                            ['nom' => 'Foufou de manioc', 'base' => 80, 'p' => 0.8, 'g' => 65.0, 'l' => 0.0],
                            ['nom' => 'Salade de carottes râpées', 'base' => 100, 'p' => 0.9, 'g' => 10.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de légumes verts (feuilles d\'amarante)', 'base' => 300, 'p' => 2.0, 'g' => 8.0, 'l' => 1.0],
                            ['nom' => 'Poulet bouilli sans peau', 'base' => 60, 'p' => 12.0, 'g' => 0.0, 'l' => 1.5],
                            ['nom' => 'Manioc bouilli', 'base' => 70, 'p' => 0.5, 'g' => 17.0, 'l' => 0.0],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.3],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de soja', 'base' => 100, 'p' => 3.5, 'g' => 6.0, 'l' => 2.0],
                            ['nom' => 'Pain complet grillé', 'base' => 40, 'p' => 4.5, 'g' => 21.0, 'l' => 0.7],
                            ['nom' => 'Tomate en tranche', 'base' => 50, 'p' => 0.3, 'g' => 1.1, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Ragoût de niébé (haricots)', 'base' => 150, 'p' => 9.0, 'g' => 27.0, 'l' => 0.5],
                            ['nom' => 'Poisson braisé', 'base' => 80, 'p' => 17.0, 'g' => 0.0, 'l' => 1.2],
                            ['nom' => 'Couscous de manioc (attiéké)', 'base' => 100, 'p' => 1.0, 'g' => 28.0, 'l' => 0.1],
                            ['nom' => 'Légumes crus (tomates, concombre)', 'base' => 150, 'p' => 1.2, 'g' => 7.0, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce tomate aux champignons', 'base' => 200, 'p' => 3.0, 'g' => 10.0, 'l' => 0.5],
                            ['nom' => 'Poisson maigre grillé', 'base' => 70, 'p' => 15.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Riz étuvé', 'base' => 70, 'p' => 5.0, 'g' => 50.0, 'l' => 0.2],
                            ['nom' => 'Crudités variées', 'base' => 150, 'p' => 1.5, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Eau de rônier sans sucre', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                    ],
                ],
                'collations' => [
                    ['nom' => 'Mangue verte avec piment', 'base' => 100, 'p' => 0.6, 'g' => 15.0, 'l' => 0.2],
                    ['nom' => 'Noix de cajou nature', 'base' => 15, 'p' => 4.5, 'g' => 2.5, 'l' => 7.5],
                    ['nom' => 'Cacahuètes bouillies', 'base' => 30, 'p' => 7.5, 'g' => 6.0, 'l' => 14.0],
                    ['nom' => 'Goyave fraîche', 'base' => 150, 'p' => 1.5, 'g' => 14.0, 'l' => 0.5],
                ],
            ],

            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 200, 'p' => 4.0, 'g' => 44.0, 'l' => 1.0],
                            ['nom' => 'Lait demi-écrémé', 'base' => 120, 'p' => 4.0, 'g' => 6.0, 'l' => 2.0],
                            ['nom' => 'Œufs brouillés (1 œuf + 1 blanc)', 'base' => 60, 'p' => 8.0, 'g' => 1.0, 'l' => 6.0],
                            ['nom' => 'Banane (1 petite)', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.0],
                            ['nom' => 'Thé au gingembre', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce gombo-feuilles avec crabe', 'base' => 250, 'p' => 5.0, 'g' => 15.0, 'l' => 5.0],
                            ['nom' => 'Crabe', 'base' => 80, 'p' => 18.0, 'g' => 0.0, 'l' => 1.0],
                            ['nom' => 'Pâte de maïs', 'base' => 120, 'p' => 3.0, 'g' => 28.0, 'l' => 0.0],
                            ['nom' => 'Salade verte abondante', 'base' => 200, 'p' => 2.0, 'g' => 4.0, 'l' => 0.0],
                            ['nom' => 'Poisson fumé', 'base' => 40, 'p' => 10.0, 'g' => 0.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de poisson avec légumes', 'base' => 350, 'p' => 20.0, 'g' => 10.0, 'l' => 5.0],
                            ['nom' => 'Igname pilée', 'base' => 100, 'p' => 2.0, 'g' => 27.0, 'l' => 0.0],
                            ['nom' => 'Légumes sautés (épinards, gombo)', 'base' => 150, 'p' => 3.0, 'g' => 7.0, 'l' => 3.0],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 3.0, 'g' => 46.0, 'l' => 0.0],
                            ['nom' => 'Lait caillé', 'base' => 100, 'p' => 3.0, 'g' => 5.0, 'l' => 3.0],
                            ['nom' => 'Arachides grillées', 'base' => 20, 'p' => 5.0, 'g' => 3.0, 'l' => 10.0],
                            ['nom' => 'Papaye', 'base' => 120, 'p' => 1.0, 'g' => 11.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz sauce tomate (riz + sauce)', 'base' => 300, 'p' => 6.0, 'g' => 45.0, 'l' => 3.0],
                            ['nom' => 'Poulet grillé', 'base' => 90, 'p' => 19.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Haricots verts sautés', 'base' => 150, 'p' => 4.0, 'g' => 7.0, 'l' => 0.0],
                            ['nom' => 'Salade de concombre', 'base' => 150, 'p' => 1.0, 'g' => 3.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de haricots', 'base' => 120, 'p' => 8.0, 'g' => 22.0, 'l' => 3.0],
                            ['nom' => 'Poisson braisé', 'base' => 80, 'p' => 16.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Patate douce', 'base' => 100, 'p' => 2.0, 'g' => 20.0, 'l' => 0.0],
                            ['nom' => 'Salade de tomate-oignon', 'base' => 150, 'p' => 1.0, 'g' => 4.0, 'l' => 0.0],
                        ],
                    ],
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 6.0, 'g' => 40.0, 'l' => 2.0],
                            ['nom' => 'Lait fermenté', 'base' => 150, 'p' => 5.0, 'g' => 7.0, 'l' => 4.0],
                            ['nom' => 'Avocat', 'base' => 40, 'p' => 0.5, 'g' => 2.0, 'l' => 6.0],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 13.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce d\'arachide modérée', 'base' => 180, 'p' => 10.0, 'g' => 8.0, 'l' => 16.0],
                            ['nom' => 'Viande de bœuf maigre', 'base' => 80, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Foufou', 'base' => 100, 'p' => 1.0, 'g' => 27.0, 'l' => 0.2],
                            ['nom' => 'Salade de carottes', 'base' => 150, 'p' => 1.0, 'g' => 9.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de légumes variés', 'base' => 350, 'p' => 5.0, 'g' => 15.0, 'l' => 2.0],
                            ['nom' => 'Poulet grillé', 'base' => 70, 'p' => 15.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Manioc bouilli', 'base' => 90, 'p' => 0.9, 'g' => 23.0, 'l' => 0.1],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1.0, 'g' => 3.0, 'l' => 0.2],
                            ['nom' => 'Tisane de gingembre', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari trempé', 'base' => 120, 'p' => 2.0, 'g' => 96.0, 'l' => 0.5],
                            ['nom' => 'Lait de soja', 'base' => 150, 'p' => 5.0, 'g' => 3.0, 'l' => 3.0],
                            ['nom' => 'Banane plantain bouillie', 'base' => 60, 'p' => 0.7, 'g' => 18.0, 'l' => 0.2],
                            ['nom' => 'Mangue', 'base' => 80, 'p' => 0.5, 'g' => 12.0, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké', 'base' => 120, 'p' => 2.0, 'g' => 27.0, 'l' => 0.2],
                            ['nom' => 'Poisson grillé', 'base' => 90, 'p' => 20.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Sauce tomate aux légumes', 'base' => 200, 'p' => 2.0, 'g' => 15.0, 'l' => 2.0],
                            ['nom' => 'Avocat', 'base' => 40, 'p' => 0.5, 'g' => 2.0, 'l' => 6.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de niébé', 'base' => 140, 'p' => 9.0, 'g' => 24.0, 'l' => 0.5],
                            ['nom' => 'Poisson fumé', 'base' => 70, 'p' => 15.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Riz complet', 'base' => 90, 'p' => 7.0, 'g' => 62.0, 'l' => 0.7],
                            ['nom' => 'Légumes crus', 'base' => 200, 'p' => 2.0, 'g' => 8.0, 'l' => 0.5],
                            ['nom' => 'Eau de rônier sans sucre', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                    ],
                ],
                'collations' => [
                    ['nom' => 'Fruit de la passion (2 unités)', 'base' => 100, 'p' => 1.0, 'g' => 23.0, 'l' => 0.0],
                    ['nom' => 'Arachides grillées', 'base' => 15, 'p' => 4.0, 'g' => 2.0, 'l' => 8.0],
                    ['nom' => 'Noix de cajou', 'base' => 12, 'p' => 4.0, 'g' => 4.0, 'l' => 7.0],
                    ['nom' => 'Ananas frais', 'base' => 100, 'p' => 0.5, 'g' => 13.0, 'l' => 0.1],
                ],
            ],

            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 220, 'p' => 4.4, 'g' => 34.0, 'l' => 1.3],
                            ['nom' => 'Lait entier', 'base' => 100, 'p' => 3.2, 'g' => 4.8, 'l' => 3.6],
                            ['nom' => 'Œufs au plat (1 œuf, cuisson minimum huile)', 'base' => 60, 'p' => 7.5, 'g' => 0.6, 'l' => 6.0],
                            ['nom' => 'Avocat (1/3)', 'base' => 70, 'p' => 1.4, 'g' => 5.6, 'l' => 10.5],
                            ['nom' => 'Banane (1 moyenne)', 'base' => 120, 'p' => 1.3, 'g' => 27.6, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce gombo riche avec poisson et viande', 'base' => 300, 'p' => 6.0, 'g' => 18.0, 'l' => 9.0],
                            ['nom' => 'Poisson + viande', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Pâte de maïs', 'base' => 140, 'p' => 3.5, 'g' => 32.2, 'l' => 0.7],
                            ['nom' => 'Salade d\'avocat-tomate', 'base' => 150, 'p' => 2.0, 'g' => 8.0, 'l' => 8.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe épaisse de poisson', 'base' => 400, 'p' => 18.0, 'g' => 6.0, 'l' => 6.0],
                            ['nom' => 'Igname pilée', 'base' => 120, 'p' => 1.8, 'g' => 33.6, 'l' => 0.4],
                            ['nom' => 'Épinards à l\'huile de palme', 'base' => 100, 'p' => 3.0, 'g' => 4.0, 'l' => 5.0],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 220, 'p' => 3.3, 'g' => 36.3, 'l' => 0.9],
                            ['nom' => 'Yaourt nature', 'base' => 120, 'p' => 4.2, 'g' => 5.4, 'l' => 4.2],
                            ['nom' => 'Arachides grillées', 'base' => 25, 'p' => 6.3, 'g' => 4.0, 'l' => 12.5],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 0.9, 'g' => 16.5, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz sauce d\'arachide (riz + sauce)', 'base' => 320, 'p' => 13.0, 'g' => 45.6, 'l' => 20.4],
                            ['nom' => 'Poulet', 'base' => 90, 'p' => 19.8, 'g' => 0.0, 'l' => 3.6],
                            ['nom' => 'Légumes sautés', 'base' => 200, 'p' => 4.0, 'g' => 10.0, 'l' => 3.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 5.0, 'l' => 0.2],
                            ['nom' => 'Eau plate', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges en sauce', 'base' => 150, 'p' => 12.0, 'g' => 27.0, 'l' => 1.2],
                            ['nom' => 'Poisson grillé', 'base' => 90, 'p' => 20.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Patate douce', 'base' => 120, 'p' => 1.8, 'g' => 28.8, 'l' => 0.4],
                            ['nom' => 'Salade mixte', 'base' => 200, 'p' => 3.0, 'g' => 8.0, 'l' => 1.0],
                        ],
                    ],
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 220, 'p' => 6.4, 'g' => 46.9, 'l' => 2.6],
                            ['nom' => 'Lait caillé', 'base' => 150, 'p' => 5.1, 'g' => 7.2, 'l' => 4.5],
                            ['nom' => 'Banane plantain bouillie', 'base' => 80, 'p' => 1.0, 'g' => 25.6, 'l' => 0.3],
                            ['nom' => 'Avocat', 'base' => 40, 'p' => 0.8, 'g' => 3.6, 'l' => 6.0],
                            ['nom' => 'Infusion', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce d\'arachide complète', 'base' => 200, 'p' => 14.0, 'g' => 10.0, 'l' => 26.0],
                            ['nom' => 'Viande de bœuf', 'base' => 90, 'p' => 18.9, 'g' => 0.0, 'l' => 9.0],
                            ['nom' => 'Foufou de manioc', 'base' => 120, 'p' => 1.6, 'g' => 45.6, 'l' => 0.4],
                            ['nom' => 'Salade de légumes variés', 'base' => 200, 'p' => 2.6, 'g' => 8.0, 'l' => 0.4],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de feuilles', 'base' => 400, 'p' => 6.0, 'g' => 8.0, 'l' => 4.0],
                            ['nom' => 'Poulet', 'base' => 80, 'p' => 17.6, 'g' => 0.0, 'l' => 2.8],
                            ['nom' => 'Manioc bouilli', 'base' => 100, 'p' => 1.2, 'g' => 38.0, 'l' => 0.3],
                            ['nom' => 'Salade verte abondante', 'base' => 200, 'p' => 2.2, 'g' => 4.0, 'l' => 0.2],
                            ['nom' => 'Tisane de citronnelle', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari', 'base' => 140, 'p' => 2.0, 'g' => 109.2, 'l' => 0.6],
                            ['nom' => 'Lait de soja enrichi', 'base' => 150, 'p' => 5.4, 'g' => 4.2, 'l' => 2.7],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.2, 'g' => 3.2, 'l' => 9.8],
                            ['nom' => 'Orange (1 grosse)', 'base' => 180, 'p' => 1.6, 'g' => 16.2, 'l' => 0.3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké', 'base' => 140, 'p' => 2.1, 'g' => 52.5, 'l' => 0.4],
                            ['nom' => 'Poisson braisé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Sauce tomate-légumes', 'base' => 250, 'p' => 3.5, 'g' => 12.5, 'l' => 5.0],
                            ['nom' => 'Avocat (1/3)', 'base' => 50, 'p' => 1.0, 'g' => 4.5, 'l' => 7.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de niébé', 'base' => 160, 'p' => 13.0, 'g' => 32.0, 'l' => 3.0],
                            ['nom' => 'Poisson fumé', 'base' => 80, 'p' => 19.2, 'g' => 0.0, 'l' => 6.4],
                            ['nom' => 'Riz étuvé', 'base' => 100, 'p' => 2.6, 'g' => 28.0, 'l' => 0.4],
                            ['nom' => 'Crudités', 'base' => 200, 'p' => 2.4, 'g' => 8.0, 'l' => 0.4],
                        ],
                    ],
                ],
                'collations' => [
                    ['nom' => 'Fruit de baobab (pain de singe)', 'base' => 30, 'p' => 0.8, 'g' => 23.0, 'l' => 0.2],
                    ['nom' => 'Goyave', 'base' => 150, 'p' => 3.9, 'g' => 21.0, 'l' => 1.5],
                    ['nom' => 'Mangue mûre', 'base' => 150, 'p' => 1.0, 'g' => 22.0, 'l' => 0.6],
                    ['nom' => 'Mélange arachides-cajou', 'base' => 20, 'p' => 4.0, 'g' => 5.0, 'l' => 10.0],
                ],
            ],

            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 250, 'p' => 3.0, 'g' => 27.5, 'l' => 1.0],
                            ['nom' => 'Lait demi-écrémé', 'base' => 150, 'p' => 4.9, 'g' => 7.5, 'l' => 2.3],
                            ['nom' => 'Œufs (2 blancs + 1 œuf entier)', 'base' => 140, 'p' => 13.0, 'g' => 1.0, 'l' => 7.0],
                            ['nom' => 'Banane (1 grosse)', 'base' => 120, 'p' => 1.3, 'g' => 26.4, 'l' => 0.4],
                            ['nom' => 'Pain complet', 'base' => 40, 'p' => 3.2, 'g' => 20.0, 'l' => 1.2],
                            ['nom' => 'Thé au gingembre', 'base' => 200, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce gombo avec poisson maigre', 'base' => 300, 'p' => 6.0, 'g' => 15.0, 'l' => 3.0],
                            ['nom' => 'Poisson maigre', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Pâte de maïs', 'base' => 160, 'p' => 3.2, 'g' => 41.6, 'l' => 1.6],
                            ['nom' => 'Salade verte', 'base' => 200, 'p' => 2.2, 'g' => 4.0, 'l' => 0.6],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.2, 'g' => 12.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de poisson riche', 'base' => 400, 'p' => 24.0, 'g' => 8.0, 'l' => 6.0],
                            ['nom' => 'Igname bouillie', 'base' => 140, 'p' => 2.0, 'g' => 32.0, 'l' => 0.2],
                            ['nom' => 'Légumes sautés', 'base' => 200, 'p' => 3.0, 'g' => 12.0, 'l' => 4.0],
                            ['nom' => 'Avocat (1/4)', 'base' => 50, 'p' => 0.8, 'g' => 4.0, 'l' => 7.0],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 250, 'p' => 4.0, 'g' => 42.5, 'l' => 2.5],
                            ['nom' => 'Yaourt nature', 'base' => 150, 'p' => 6.0, 'g' => 7.2, 'l' => 2.4],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 5.0, 'g' => 5.0, 'l' => 10.0],
                            ['nom' => 'Papaye', 'base' => 150, 'p' => 1.2, 'g' => 12.0, 'l' => 0.4],
                            ['nom' => 'Miel (1 c. à café)', 'base' => 7, 'p' => 0.0, 'g' => 5.9, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 140, 'p' => 4.5, 'g' => 30.6, 'l' => 1.1],
                            ['nom' => 'Sauce tomate-légumes', 'base' => 250, 'p' => 4.0, 'g' => 20.0, 'l' => 6.0],
                            ['nom' => 'Poulet grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Haricots verts', 'base' => 150, 'p' => 4.5, 'g' => 7.5, 'l' => 0.5],
                            ['nom' => 'Salade', 'base' => 200, 'p' => 2.2, 'g' => 4.0, 'l' => 0.6],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 180, 'p' => 12.6, 'g' => 24.3, 'l' => 1.4],
                            ['nom' => 'Poisson braisé', 'base' => 90, 'p' => 17.1, 'g' => 0.0, 'l' => 2.7],
                            ['nom' => 'Patate douce', 'base' => 140, 'p' => 2.8, 'g' => 30.8, 'l' => 0.2],
                            ['nom' => 'Salade mixte', 'base' => 200, 'p' => 2.2, 'g' => 4.0, 'l' => 0.6],
                            ['nom' => 'Jus dilué sans sucre', 'base' => 250, 'p' => 0.0, 'g' => 10.0, 'l' => 0.0],
                        ],
                    ],
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 250, 'p' => 3.0, 'g' => 24.0, 'l' => 1.5],
                            ['nom' => 'Lait fermenté', 'base' => 150, 'p' => 4.5, 'g' => 7.5, 'l' => 3.5],
                            ['nom' => 'Banane plantain', 'base' => 90, 'p' => 0.9, 'g' => 22.0, 'l' => 0.2],
                            ['nom' => 'Avocat', 'base' => 40, 'p' => 0.6, 'g' => 3.4, 'l' => 7.6],
                            ['nom' => 'Pain complet', 'base' => 40, 'p' => 3.2, 'g' => 20.0, 'l' => 1.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce d\'arachide', 'base' => 180, 'p' => 8.0, 'g' => 10.0, 'l' => 18.0],
                            ['nom' => 'Viande maigre', 'base' => 90, 'p' => 18.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Foufou (manioc)', 'base' => 140, 'p' => 1.8, 'g' => 32.0, 'l' => 0.3],
                            ['nom' => 'Salade de carottes', 'base' => 200, 'p' => 2.0, 'g' => 14.0, 'l' => 0.5],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de légumes', 'base' => 400, 'p' => 6.0, 'g' => 12.0, 'l' => 4.0],
                            ['nom' => 'Poulet grillé', 'base' => 90, 'p' => 20.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Manioc bouilli', 'base' => 120, 'p' => 1.7, 'g' => 28.8, 'l' => 0.2],
                            ['nom' => 'Salade verte', 'base' => 200, 'p' => 2.2, 'g' => 4.0, 'l' => 0.6],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari', 'base' => 160, 'p' => 2.0, 'g' => 130.0, 'l' => 0.6],
                            ['nom' => 'Lait de soja', 'base' => 200, 'p' => 6.8, 'g' => 6.0, 'l' => 7.0],
                            ['nom' => 'Arachides grillées', 'base' => 25, 'p' => 6.0, 'g' => 6.0, 'l' => 12.5],
                            ['nom' => 'Mangue', 'base' => 120, 'p' => 1.0, 'g' => 18.0, 'l' => 0.6],
                            ['nom' => 'Miel (1 c. à café)', 'base' => 7, 'p' => 0.0, 'g' => 5.9, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké', 'base' => 160, 'p' => 3.4, 'g' => 36.8, 'l' => 0.8],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 3.5],
                            ['nom' => 'Sauce tomate riche en légumes', 'base' => 250, 'p' => 4.0, 'g' => 20.0, 'l' => 6.0],
                            ['nom' => 'Avocat (1/3)', 'base' => 70, 'p' => 1.1, 'g' => 6.0, 'l' => 13.3],
                            ['nom' => 'Eau de bissap', 'base' => 250, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de niébé', 'base' => 180, 'p' => 11.5, 'g' => 27.0, 'l' => 1.5],
                            ['nom' => 'Poisson fumé', 'base' => 80, 'p' => 15.2, 'g' => 0.0, 'l' => 5.6],
                            ['nom' => 'Riz étuvé', 'base' => 120, 'p' => 3.9, 'g' => 26.4, 'l' => 0.9],
                            ['nom' => 'Crudités', 'base' => 200, 'p' => 2.2, 'g' => 4.0, 'l' => 0.6],
                        ],
                    ],
                ],
                'collations' => [
                    ['nom' => 'Banane plantain mûre bouillie', 'base' => 80, 'p' => 0.6, 'g' => 20.0, 'l' => 0.1],
                    ['nom' => 'Noix mélangées', 'base' => 20, 'p' => 4.0, 'g' => 2.0, 'l' => 10.0],
                    ['nom' => 'Ananas frais', 'base' => 150, 'p' => 0.8, 'g' => 20.7, 'l' => 0.2],
                    ['nom' => 'Cacahuètes bouillies', 'base' => 40, 'p' => 8.0, 'g' => 3.2, 'l' => 13.2],
                ],
            ],

            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs', 'base' => 280, 'p' => 3.36, 'g' => 30.8, 'l' => 1.12],
                            ['nom' => 'Lait demi-écrémé', 'base' => 150, 'p' => 4.9, 'g' => 7.5, 'l' => 2.3],
                            ['nom' => 'Blancs d\'œufs (3)', 'base' => 100, 'p' => 10.8, 'g' => 0.7, 'l' => 0.3],
                            ['nom' => 'Jaune d\'œuf (1)', 'base' => 20, 'p' => 2.7, 'g' => 0.2, 'l' => 4.5],
                            ['nom' => 'Banane (grosse)', 'base' => 120, 'p' => 1.3, 'g' => 26.4, 'l' => 0.4],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 4.0, 'g' => 25.0, 'l' => 1.5],
                            ['nom' => 'Miel (1 c. à café)', 'base' => 7, 'p' => 0.0, 'g' => 5.9, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce gombo avec poisson maigre', 'base' => 350, 'p' => 7.0, 'g' => 17.5, 'l' => 3.5],
                            ['nom' => 'Poisson maigre', 'base' => 110, 'p' => 22.0, 'g' => 0.0, 'l' => 2.2],
                            ['nom' => 'Pâte de maïs', 'base' => 180, 'p' => 3.6, 'g' => 46.8, 'l' => 1.8],
                            ['nom' => 'Salade verte', 'base' => 200, 'p' => 2.2, 'g' => 4.0, 'l' => 0.6],
                            ['nom' => 'Oranges (2)', 'base' => 260, 'p' => 2.4, 'g' => 24.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de poisson', 'base' => 450, 'p' => 27.0, 'g' => 9.0, 'l' => 6.0],
                            ['nom' => 'Igname pilée', 'base' => 160, 'p' => 2.3, 'g' => 36.8, 'l' => 0.3],
                            ['nom' => 'Légumes sautés légers', 'base' => 200, 'p' => 3.0, 'g' => 12.0, 'l' => 4.0],
                            ['nom' => 'Fruit (ex: orange)', 'base' => 130, 'p' => 0.6, 'g' => 12.0, 'l' => 0.2],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 280, 'p' => 4.5, 'g' => 47.6, 'l' => 2.8],
                            ['nom' => 'Yaourt maigre', 'base' => 150, 'p' => 6.0, 'g' => 7.2, 'l' => 0.4],
                            ['nom' => 'Arachides', 'base' => 15, 'p' => 3.0, 'g' => 3.0, 'l' => 7.5],
                            ['nom' => 'Papaye', 'base' => 180, 'p' => 1.4, 'g' => 14.4, 'l' => 0.5],
                            ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 0.8, 'g' => 24.5, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet', 'base' => 160, 'p' => 5.2, 'g' => 34.4, 'l' => 1.2],
                            ['nom' => 'Sauce tomate-légumes', 'base' => 300, 'p' => 4.8, 'g' => 24.0, 'l' => 7.2],
                            ['nom' => 'Poulet sans peau', 'base' => 100, 'p' => 22.0, 'g' => 0],
                                                    ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 200, 'p' => 14.0, 'g' => 27.0, 'l' => 1.6],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 19.0, 'g' => 0.0, 'l' => 2.0],
                            ['nom' => 'Patate douce', 'base' => 160, 'p' => 3.2, 'g' => 35.2, 'l' => 0.3],
                            ['nom' => 'Salade abondante', 'base' => 250, 'p' => 2.8, 'g' => 5.0, 'l' => 0.8],
                        ],
                    ],
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 280, 'p' => 3.36, 'g' => 30.8, 'l' => 1.12],
                            ['nom' => 'Lait fermenté', 'base' => 150, 'p' => 4.5, 'g' => 7.5, 'l' => 3.5],
                            ['nom' => 'Banane plantain bouillie', 'base' => 100, 'p' => 0.8, 'g' => 24.5, 'l' => 0.2],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 4.0, 'g' => 25.0, 'l' => 1.5],
                            ['nom' => 'Avocat', 'base' => 30, 'p' => 0.45, 'g' => 2.55, 'l' => 5.7],
                            ['nom' => 'Miel (1 c. à café)', 'base' => 7, 'p' => 0.0, 'g' => 5.9, 'l' => 0.0],
                            ['nom' => 'Infusion', 'base' => 250, 'p' => 0.0, 'g' => 0.0, 'l' => 0.0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Sauce d\'arachide légère', 'base' => 180, 'p' => 8.0, 'g' => 10.0, 'l' => 15.0],
                            ['nom' => 'Viande maigre', 'base' => 100, 'p' => 20.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Foufou', 'base' => 160, 'p' => 2.0, 'g' => 36.8, 'l' => 0.4],
                            ['nom' => 'Salade de légumes', 'base' => 250, 'p' => 2.8, 'g' => 12.0, 'l' => 1.0],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe riche en légumes', 'base' => 450, 'p' => 6.0, 'g' => 12.0, 'l' => 4.0],
                            ['nom' => 'Poulet grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 4.0],
                            ['nom' => 'Manioc bouilli', 'base' => 140, 'p' => 2.0, 'g' => 33.0, 'l' => 0.2],
                            ['nom' => 'Salade', 'base' => 200, 'p' => 2.2, 'g' => 4.0, 'l' => 0.5],
                        ],
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Gari', 'base' => 180, 'p' => 2.25, 'g' => 146.4, 'l' => 0.7],
                            ['nom' => 'Lait de soja', 'base' => 200, 'p' => 6.8, 'g' => 6.0, 'l' => 7.0],
                            ['nom' => 'Arachides', 'base' => 20, 'p' => 4.8, 'g' => 4.8, 'l' => 10.0],
                            ['nom' => 'Mangue', 'base' => 150, 'p' => 1.0, 'g' => 18.0, 'l' => 0.6],
                            ['nom' => 'Banane (grosse)', 'base' => 120, 'p' => 1.3, 'g' => 26.4, 'l' => 0.4],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké', 'base' => 180, 'p' => 3.8, 'g' => 41.4, 'l' => 0.9],
                            ['nom' => 'Poisson grillé', 'base' => 110, 'p' => 23.1, 'g' => 0.0, 'l' => 3.85],
                            ['nom' => 'Sauce tomate', 'base' => 300, 'p' => 4.0, 'g' => 20.0, 'l' => 6.0],
                            ['nom' => 'Avocat (1/4)', 'base' => 50, 'p' => 0.75, 'g' => 4.25, 'l' => 9.5],
                            ['nom' => 'Orange', 'base' => 130, 'p' => 1.0, 'g' => 13.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de niébé', 'base' => 200, 'p' => 12.8, 'g' => 30.0, 'l' => 1.5],
                            ['nom' => 'Poisson', 'base' => 90, 'p' => 19.0, 'g' => 0.0, 'l' => 3.0],
                            ['nom' => 'Riz étuvé', 'base' => 140, 'p' => 4.5, 'g' => 30.8, 'l' => 1.05],
                            ['nom' => 'Crudités', 'base' => 250, 'p' => 2.75, 'g' => 5.0, 'l' => 0.6],
                        ],
                    ],
                ],
                'collations' => [
                    ['nom' => 'Mélange fruits frais', 'base' => 180, 'p' => 1.5, 'g' => 25.0, 'l' => 0.5],
                    ['nom' => 'Noix nature', 'base' => 15, 'p' => 3.0, 'g' => 2.5, 'l' => 7.5],
                    ['nom' => 'Banane plantain', 'base' => 100, 'p' => 0.8, 'g' => 20.0, 'l' => 0.2],
                    ['nom' => 'Fruits frais variés', 'base' => 150, 'p' => 1.2, 'g' => 20.0, 'l' => 0.2],
                ],
            ],
        ];
    }
}
                            