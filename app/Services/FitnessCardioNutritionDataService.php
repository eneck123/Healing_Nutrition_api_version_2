<?php

namespace App\Services;

/**
 * NOTE IMPORTANTE :
 * Les valeurs de ce fichier ont été reconstruites à partir du document de référence
 * "NIVEAU 1 à 5" fourni par l'utilisateur. Une correction a été apportée :
 *  - "Modérément actif / jour2" : les valeurs ont été retrouvées (elles étaient placées
 *    par erreur sous l'en-tête "Très actif / jour1" dans le document original) et ont
 *    été réintégrées ici à leur place logique.
 *  - "Très actif / jour1" et ses collations : mis à jour avec les valeurs officielles
 *    CIQUAL 2025 fournies par l'utilisateur (plus d'estimation).
 */
class FitnessCardioNutritionDataService implements NutritionDataServiceInterface
{
    public function getMenus(): array
    {
        return [

            // =====================================================================
            // NIVEAU 1 : SÉDENTAIRE (27% Protéines / 37% Glucides / 30% Lipides)
            // =====================================================================
            'Sédentaire' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs allégée (akassa)', 'base' => 200, 'p' => 6, 'g' => 38, 'l' => 2],
                            ['nom' => 'Omelette aux légumes (tomates, oignons, poivrons)', 'base' => 100, 'p' => 7, 'g' => 3, 'l' => 7],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs (ablo)', 'base' => 150, 'p' => 3, 'g' => 30, 'l' => 1],
                            ['nom' => 'Sauce gombo aux crabes', 'base' => 100, 'p' => 8, 'g' => 5, 'l' => 3],
                            ['nom' => 'Épinards sautés', 'base' => 100, 'p' => 2, 'g' => 3, 'l' => 0.5],
                            ['nom' => 'Pomme', 'base' => 100, 'p' => 0.3, 'g' => 14, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de poisson (yêkê) aux légumes variés', 'base' => 200, 'p' => 12, 'g' => 8, 'l' => 3],
                            ['nom' => 'Igname bouillie', 'base' => 100, 'p' => 1, 'g' => 27, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de soja nature', 'base' => 200, 'p' => 14, 'g' => 10, 'l' => 6],
                            ['nom' => 'Poisson grillé (chinchard)', 'base' => 100, 'p' => 20, 'g' => 0, 'l' => 5],
                            ['nom' => 'Salade de concombre et tomates', 'base' => 100, 'p' => 1, 'g' => 4, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet (petit bol)', 'base' => 150, 'p' => 3.6, 'g' => 34, 'l' => 0.6],
                            ['nom' => 'Sauce arachide légère au poulet maigre', 'base' => 100, 'p' => 8, 'g' => 4, 'l' => 6],
                            ['nom' => 'Salade de carottes râpées', 'base' => 100, 'p' => 1, 'g' => 8, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de haricots rouges', 'base' => 100, 'p' => 8, 'g' => 20, 'l' => 1],
                            ['nom' => 'Plantain mûr grillé (1/2 banane)', 'base' => 75, 'p' => 0.75, 'g' => 20, 'l' => 0.1],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Galette de haricots (akara) au four', 'base' => 120, 'p' => 12, 'g' => 20, 'l' => 8],
                            ['nom' => 'Salade d\'avocat (1/4)', 'base' => 50, 'p' => 1, 'g' => 4, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous de manioc (attiéké)', 'base' => 200, 'p' => 3, 'g' => 52, 'l' => 0.5],
                            ['nom' => 'Poisson braisé', 'base' => 120, 'p' => 24, 'g' => 0, 'l' => 6],
                            ['nom' => 'Sauce tomate aux légumes', 'base' => 100, 'p' => 2, 'g' => 6, 'l' => 1.5],
                            ['nom' => 'Salade de chou', 'base' => 100, 'p' => 1.5, 'g' => 6, 'l' => 0.3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe légère de légumes variés', 'base' => 250, 'p' => 4, 'g' => 10, 'l' => 1],
                            ['nom' => 'Poulet grillé sans peau', 'base' => 120, 'p' => 27, 'g' => 0, 'l' => 4],
                            ['nom' => 'Patate douce bouillie (petite portion)', 'base' => 100, 'p' => 1.5, 'g' => 20, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 250, 'p' => 7.5, 'g' => 47.5, 'l' => 2.5],
                            ['nom' => 'Lait écrémé', 'base' => 200, 'p' => 7, 'g' => 10, 'l' => 0.3],
                            ['nom' => 'Poisson fumé émietté', 'base' => 50, 'p' => 15, 'g' => 0, 'l' => 4],
                            ['nom' => 'Ananas', 'base' => 100, 'p' => 0.5, 'g' => 13, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs (owo)', 'base' => 100, 'p' => 2, 'g' => 22, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles d\'amarante au crabe', 'base' => 120, 'p' => 12, 'g' => 5, 'l' => 3],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce tomate au poisson', 'base' => 100, 'p' => 18, 'g' => 5, 'l' => 4],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2, 'g' => 7, 'l' => 0.2],
                            ['nom' => 'Riz brun cuit (1/2 tasse)', 'base' => 100, 'p' => 2.5, 'g' => 23, 'l' => 1],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix de cajou grillées sans sel (15-20 unités)', 'base' => 20, 'p' => 5, 'g' => 10, 'l' => 10],
                    ['nom' => 'Mangue verte', 'base' => 100, 'p' => 0.5, 'g' => 15, 'l' => 0.2],
                    ['nom' => 'Bâtonnets de carotte et concombre', 'base' => 150, 'p' => 2, 'g' => 8, 'l' => 0.2],
                    ['nom' => 'Lait caillé (wagashi) nature', 'base' => 150, 'p' => 6, 'g' => 7, 'l' => 3],
                ]
            ],

            // =====================================================================
            // NIVEAU 2 : LÉGÈREMENT ACTIF (28% Protéines / 42% Glucides / 28% Lipides)
            // =====================================================================
            'Légèrement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 250, 'p' => 4.5, 'g' => 28, 'l' => 1.5],
                            ['nom' => 'Œufs brouillés', 'base' => 120, 'p' => 15, 'g' => 1.5, 'l' => 13],
                            ['nom' => 'Tomates', 'base' => 50, 'p' => 0.5, 'g' => 2, 'l' => 0.1],
                            ['nom' => 'Banane moyenne', 'base' => 150, 'p' => 1.5, 'g' => 33, 'l' => 0.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local cuit', 'base' => 200, 'p' => 5, 'g' => 56, 'l' => 0.6],
                            ['nom' => 'Poulet en sauce tomate', 'base' => 120, 'p' => 27, 'g' => 0, 'l' => 4.5],
                            ['nom' => 'Sauce tomate', 'base' => 100, 'p' => 2, 'g' => 6, 'l' => 3],
                            ['nom' => 'Haricots verts sautés', 'base' => 100, 'p' => 2, 'g' => 4, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte rouge (owo)', 'base' => 250, 'p' => 5, 'g' => 58, 'l' => 1.2],
                            ['nom' => 'Crabe (sauce gombo)', 'base' => 100, 'p' => 18, 'g' => 0, 'l' => 1.5],
                            ['nom' => 'Sauce gombo', 'base' => 100, 'p' => 2, 'g' => 6, 'l' => 3],
                            ['nom' => 'Épinards', 'base' => 100, 'p' => 3, 'g' => 4, 'l' => 0.4],
                            ['nom' => 'Ananas frais', 'base' => 150, 'p' => 0.8, 'g' => 20, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 250, 'p' => 3.5, 'g' => 30, 'l' => 1],
                            ['nom' => 'Sardines grillées', 'base' => 100, 'p' => 25, 'g' => 0, 'l' => 11],
                            ['nom' => 'Salade mixte', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                            ['nom' => 'Orange', 'base' => 150, 'p' => 1.2, 'g' => 18, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée (télibo)', 'base' => 250, 'p' => 4, 'g' => 60, 'l' => 0.5],
                            ['nom' => 'Sauce d\'arachide légère au poisson', 'base' => 100, 'p' => 6, 'g' => 8, 'l' => 12],
                            ['nom' => 'Poisson', 'base' => 120, 'p' => 26, 'g' => 0, 'l' => 2],
                            ['nom' => 'Salade de laitue', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Couscous de manioc', 'base' => 200, 'p' => 3, 'g' => 55, 'l' => 0.5],
                            ['nom' => 'Ragoût de poisson aux légumes', 'base' => 120, 'p' => 26, 'g' => 0, 'l' => 2],
                            ['nom' => 'Légumes du ragoût', 'base' => 100, 'p' => 2, 'g' => 5, 'l' => 3],
                            ['nom' => 'Salade de tomates', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de soja', 'base' => 250, 'p' => 10, 'g' => 30, 'l' => 5],
                            ['nom' => 'Pain complet maison', 'base' => 40, 'p' => 4, 'g' => 20, 'l' => 1],
                            ['nom' => 'Beurre d\'arachide maison', 'base' => 5, 'p' => 1.2, 'g' => 0.5, 'l' => 3],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet cuit', 'base' => 150, 'p' => 4, 'g' => 40, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles', 'base' => 100, 'p' => 3, 'g' => 5, 'l' => 3],
                            ['nom' => 'Poulet sans peau', 'base' => 120, 'p' => 27, 'g' => 0, 'l' => 4.5],
                            ['nom' => 'Légumes vapeur', 'base' => 100, 'p' => 2, 'g' => 4, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de légumes complète', 'base' => 300, 'p' => 4, 'g' => 15, 'l' => 2],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2, 'g' => 35, 'l' => 0.5],
                            ['nom' => 'Poulet grillé', 'base' => 120, 'p' => 27, 'g' => 0, 'l' => 4.5],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Ablo', 'base' => 250, 'p' => 4, 'g' => 58, 'l' => 1],
                            ['nom' => 'Poisson grillé', 'base' => 130, 'p' => 27, 'g' => 0, 'l' => 7],
                            ['nom' => 'Salade d\'avocat (1/3)', 'base' => 70, 'p' => 1, 'g' => 4, 'l' => 7],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Attiéké', 'base' => 200, 'p' => 3, 'g' => 50, 'l' => 0.5],
                            ['nom' => 'Poisson braisé', 'base' => 130, 'p' => 27, 'g' => 0, 'l' => 7],
                            ['nom' => 'Sauce tomate légère', 'base' => 100, 'p' => 1, 'g' => 6, 'l' => 1],
                            ['nom' => 'Salade de chou', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges mijotés', 'base' => 150, 'p' => 9, 'g' => 25, 'l' => 0.5],
                            ['nom' => 'Plantain grillé (1/2)', 'base' => 80, 'p' => 1, 'g' => 22, 'l' => 0.2],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Fruit frais + quelques noix', 'base' => 170, 'p' => 4, 'g' => 22, 'l' => 10],
                    ['nom' => 'Galette de mil nature (petite)', 'base' => 50, 'p' => 3.5, 'g' => 30, 'l' => 2],
                    ['nom' => 'Cacahuètes grillées sans huile', 'base' => 30, 'p' => 7.5, 'g' => 5, 'l' => 15],
                    ['nom' => 'Lait caillé', 'base' => 200, 'p' => 7, 'g' => 10, 'l' => 4],
                ]
            ],

            // =====================================================================
            // NIVEAU 3 : MODÉRÉMENT ACTIF (25% Protéines / 45% Glucides / 25% Lipides)
            // =====================================================================
            'Modérément actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 250, 'p' => 7.5, 'g' => 38, 'l' => 4],
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 80, 'p' => 8, 'g' => 40, 'l' => 2],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 13, 'g' => 1, 'l' => 10],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet cuit', 'base' => 150, 'p' => 4, 'g' => 40, 'l' => 0.5],
                            ['nom' => 'Sauce arachide au poulet', 'base' => 150, 'p' => 20, 'g' => 8, 'l' => 12],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2, 'g' => 5, 'l' => 0.2],
                            ['nom' => 'Carotte', 'base' => 80, 'p' => 0.6, 'g' => 7, 'l' => 0.1],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.5, 'g' => 11, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 200, 'p' => 3, 'g' => 50, 'l' => 1],
                            ['nom' => 'Sauce tomate au crabe', 'base' => 150, 'p' => 15, 'g' => 10, 'l' => 6],
                            ['nom' => 'Épinards', 'base' => 100, 'p' => 3, 'g' => 3, 'l' => 0.5],
                            ['nom' => 'Patate douce bouillie', 'base' => 150, 'p' => 1.5, 'g' => 30, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 250, 'p' => 4, 'g' => 58, 'l' => 1],
                            ['nom' => 'Akara au four', 'base' => 80, 'p' => 5, 'g' => 10, 'l' => 4],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 22, 'g' => 0, 'l' => 6],
                            ['nom' => 'Salade + avocat (1/3)', 'base' => 100, 'p' => 1, 'g' => 4, 'l' => 7],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2, 'g' => 35, 'l' => 0.5],
                            ['nom' => 'Sauce gombo riche en légumes', 'base' => 150, 'p' => 4, 'g' => 10, 'l' => 3],
                            ['nom' => 'Poisson grillé', 'base' => 130, 'p' => 27, 'g' => 0, 'l' => 7],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 200, 'p' => 3, 'g' => 50, 'l' => 0.5],
                            ['nom' => 'Ragoût de poulet aux légumes', 'base' => 150, 'p' => 20, 'g' => 8, 'l' => 10],
                            ['nom' => 'Plantain grillé (1 unité)', 'base' => 120, 'p' => 1.5, 'g' => 30, 'l' => 0.5],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 250, 'p' => 6, 'g' => 45, 'l' => 3],
                            ['nom' => 'Lait entier', 'base' => 150, 'p' => 5, 'g' => 7, 'l' => 5],
                            ['nom' => 'Œufs brouillés (2)', 'base' => 100, 'p' => 13, 'g' => 1, 'l' => 10],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 5, 'g' => 25, 'l' => 1.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local cuit', 'base' => 150, 'p' => 4, 'g' => 40, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles d\'amarante', 'base' => 150, 'p' => 5, 'g' => 8, 'l' => 3],
                            ['nom' => 'Poulet grillé', 'base' => 130, 'p' => 27, 'g' => 0, 'l' => 7],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2, 'g' => 5, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de légumes', 'base' => 200, 'p' => 3, 'g' => 10, 'l' => 1],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2, 'g' => 35, 'l' => 0.5],
                            ['nom' => 'Patate douce bouillie', 'base' => 150, 'p' => 1.5, 'g' => 30, 'l' => 0.2],
                            ['nom' => 'Poisson grillé', 'base' => 130, 'p' => 27, 'g' => 0, 'l' => 7],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Ablo', 'base' => 200, 'p' => 3.5, 'g' => 50, 'l' => 0.5],
                            ['nom' => 'Sardines grillées', 'base' => 100, 'p' => 22, 'g' => 0, 'l' => 6],
                            ['nom' => 'Avocat (1/3)', 'base' => 70, 'p' => 1, 'g' => 4, 'l' => 7],
                            ['nom' => 'Salade de tomates', 'base' => 100, 'p' => 1, 'g' => 4, 'l' => 0.2],
                            ['nom' => 'Jus naturel', 'base' => 150, 'p' => 1, 'g' => 15, 'l' => 0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Télibo (igname pilée)', 'base' => 150, 'p' => 2, 'g' => 35, 'l' => 0.5],
                            ['nom' => 'Sauce tomate au poisson', 'base' => 150, 'p' => 20, 'g' => 8, 'l' => 6],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2, 'g' => 5, 'l' => 0.2],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 150, 'p' => 10, 'g' => 27, 'l' => 0.5],
                            ['nom' => 'Riz brun', 'base' => 150, 'p' => 4, 'g' => 40, 'l' => 0.5],
                            ['nom' => 'Plantain', 'base' => 120, 'p' => 1.5, 'g' => 30, 'l' => 0.2],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Mélange de noix', 'base' => 30, 'p' => 7.5, 'g' => 5, 'l' => 15],
                    ['nom' => 'Pain de soja + beurre d\'arachide', 'base' => 50, 'p' => 6, 'g' => 20, 'l' => 8],
                    ['nom' => 'Banane', 'base' => 100, 'p' => 1, 'g' => 23, 'l' => 0.2],
                    ['nom' => 'Noix de cajou', 'base' => 30, 'p' => 7.5, 'g' => 5, 'l' => 15],
                    ['nom' => 'Graines (sésame, tournesol, etc.)', 'base' => 20, 'p' => 4, 'g' => 3, 'l' => 10],
                    ['nom' => 'Lait caillé', 'base' => 100, 'p' => 3, 'g' => 5, 'l' => 2],
                ]
            ],

            // =====================================================================
            // NIVEAU 4 : TRÈS ACTIF (25% Protéines / 45% Glucides / 25% Lipides)
            // =====================================================================
            'Très actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs enrichie', 'base' => 200, 'p' => 5.0, 'g' => 35.0, 'l' => 2.0],
                            ['nom' => 'Pain complet (2 tranches)', 'base' => 60, 'p' => 6.0, 'g' => 29.0, 'l' => 2.0],
                            ['nom' => 'Œufs durs (2)', 'base' => 100, 'p' => 12.6, 'g' => 1.1, 'l' => 10.6],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet cuit', 'base' => 150, 'p' => 4.0, 'g' => 35.0, 'l' => 1.2],
                            ['nom' => 'Sauce arachide au poulet', 'base' => 100, 'p' => 15.0, 'g' => 7.0, 'l' => 13.0],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2.0, 'g' => 7.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Pâte de maïs', 'base' => 150, 'p' => 3.0, 'g' => 36.0, 'l' => 0.5],
                            ['nom' => 'Sauce tomate au crabe', 'base' => 100, 'p' => 14.0, 'g' => 6.0, 'l' => 3.0],
                            ['nom' => 'Épinards', 'base' => 100, 'p' => 3.0, 'g' => 4.0, 'l' => 0.4],
                            ['nom' => 'Patate douce bouillie', 'base' => 100, 'p' => 1.6, 'g' => 20.0, 'l' => 0.1],
                            ['nom' => 'Ananas', 'base' => 150, 'p' => 0.8, 'g' => 19.0, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Akassa', 'base' => 200, 'p' => 3.0, 'g' => 42.0, 'l' => 0.5],
                            ['nom' => 'Akara au four', 'base' => 90, 'p' => 10.0, 'g' => 18.0, 'l' => 8.0],
                            ['nom' => 'Poisson fumé', 'base' => 100, 'p' => 24.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                            ['nom' => 'Avocat', 'base' => 50, 'p' => 1.0, 'g' => 4.0, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Igname pilée', 'base' => 150, 'p' => 2.2, 'g' => 41.0, 'l' => 0.3],
                            ['nom' => 'Sauce gombo riche en légumes', 'base' => 100, 'p' => 4.0, 'g' => 8.0, 'l' => 3.0],
                            ['nom' => 'Poisson grillé', 'base' => 100, 'p' => 22.0, 'g' => 0.0, 'l' => 5.0],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                            ['nom' => 'Orange', 'base' => 150, 'p' => 1.2, 'g' => 15.0, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Attiéké', 'base' => 150, 'p' => 2.4, 'g' => 54.0, 'l' => 0.5],
                            ['nom' => 'Ragoût de poulet aux légumes', 'base' => 100, 'p' => 18.0, 'g' => 6.0, 'l' => 6.0],
                            ['nom' => 'Plantain grillé', 'base' => 120, 'p' => 1.5, 'g' => 38.0, 'l' => 0.4],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1.0, 'g' => 4.0, 'l' => 0.2],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 250, 'p' => 6, 'g' => 45, 'l' => 3],
                            ['nom' => 'Lait entier', 'base' => 150, 'p' => 5, 'g' => 7, 'l' => 5],
                            ['nom' => 'Œufs brouillés (2)', 'base' => 100, 'p' => 13, 'g' => 1, 'l' => 10],
                            ['nom' => 'Pain complet', 'base' => 50, 'p' => 5, 'g' => 25, 'l' => 1.5],
                            ['nom' => 'Fruit (banane)', 'base' => 100, 'p' => 1, 'g' => 23, 'l' => 0.2],
                            ['nom' => 'Infusion (thé/herbes)', 'base' => 200, 'p' => 0, 'g' => 0, 'l' => 0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz local cuit', 'base' => 150, 'p' => 4, 'g' => 40, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles d\'amarante', 'base' => 150, 'p' => 5, 'g' => 8, 'l' => 3],
                            ['nom' => 'Poulet grillé', 'base' => 130, 'p' => 27, 'g' => 0, 'l' => 7],
                            ['nom' => 'Légumes variés', 'base' => 100, 'p' => 2, 'g' => 5, 'l' => 0.2],
                            ['nom' => 'Mangue', 'base' => 100, 'p' => 0.8, 'g' => 15, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe complète de légumes', 'base' => 200, 'p' => 3, 'g' => 10, 'l' => 1],
                            ['nom' => 'Igname bouillie', 'base' => 150, 'p' => 2, 'g' => 35, 'l' => 0.5],
                            ['nom' => 'Patate douce bouillie', 'base' => 150, 'p' => 1.5, 'g' => 30, 'l' => 0.2],
                            ['nom' => 'Poisson grillé', 'base' => 130, 'p' => 27, 'g' => 0, 'l' => 7],
                            ['nom' => 'Fruit (papaye)', 'base' => 100, 'p' => 0.8, 'g' => 11, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Ablo', 'base' => 200, 'p' => 3.5, 'g' => 50, 'l' => 0.5],
                            ['nom' => 'Sardines grillées', 'base' => 100, 'p' => 22, 'g' => 0, 'l' => 6],
                            ['nom' => 'Avocat (1/3)', 'base' => 70, 'p' => 1, 'g' => 4, 'l' => 7],
                            ['nom' => 'Salade de tomates', 'base' => 100, 'p' => 1, 'g' => 4, 'l' => 0.2],
                            ['nom' => 'Jus naturel', 'base' => 150, 'p' => 1, 'g' => 15, 'l' => 0],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Télibo (igname pilée)', 'base' => 150, 'p' => 2, 'g' => 35, 'l' => 0.5],
                            ['nom' => 'Sauce tomate au poisson', 'base' => 150, 'p' => 20, 'g' => 8, 'l' => 6],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2, 'g' => 5, 'l' => 0.2],
                            ['nom' => 'Salade', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                            ['nom' => 'Orange', 'base' => 100, 'p' => 1, 'g' => 12, 'l' => 0.1],
                        ],
                        'Dîner' => [
                            ['nom' => 'Haricots rouges', 'base' => 150, 'p' => 10, 'g' => 27, 'l' => 0.5],
                            ['nom' => 'Riz brun', 'base' => 150, 'p' => 4, 'g' => 40, 'l' => 0.5],
                            ['nom' => 'Plantain', 'base' => 120, 'p' => 1.5, 'g' => 30, 'l' => 0.2],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                            ['nom' => 'Papaye', 'base' => 100, 'p' => 0.8, 'g' => 11, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Smoothie maison (fruit + lait + graines)', 'base' => 250, 'p' => 8.0, 'g' => 30.0, 'l' => 7.0],
                    ['nom' => 'Mélange de noix et fruits secs', 'base' => 30, 'p' => 5.0, 'g' => 16.0, 'l' => 15.0],
                    ['nom' => 'Pain de soja + beurre d\'arachide', 'base' => 60, 'p' => 10.0, 'g' => 22.0, 'l' => 9.0],
                    ['nom' => 'Banane + arachides', 'base' => 140, 'p' => 6.0, 'g' => 34.0, 'l' => 10.0],
                    ['nom' => 'Galette de mil + lait caillé', 'base' => 250, 'p' => 10.0, 'g' => 33.0, 'l' => 6.0], 
                ]
            ],

            // =====================================================================
            // NIVEAU 5 : EXTRÊMEMENT ACTIF (25% Protéines / 45% Glucides / 25% Lipides)
            // =====================================================================
            'Extrêmement actif' => [
                'jour1' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de maïs fermenté (akassa) allégée', 'base' => 200, 'p' => 5, 'g' => 28, 'l' => 1],
                            ['nom' => 'Omelette 2 œufs aux légumes', 'base' => 100, 'p' => 12, 'g' => 3, 'l' => 10],
                            ['nom' => 'Petite orange', 'base' => 100, 'p' => 1, 'g' => 12, 'l' => 0.1],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs (ablo)', 'base' => 150, 'p' => 3, 'g' => 35, 'l' => 0.5],
                            ['nom' => 'Sauce gombo aux crabes', 'base' => 100, 'p' => 8, 'g' => 3, 'l' => 3],
                            ['nom' => 'Épinards sautés à l\'ail', 'base' => 100, 'p' => 3, 'g' => 4, 'l' => 1],
                            ['nom' => 'Pomme', 'base' => 100, 'p' => 0.3, 'g' => 14, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe de poisson (yêkê) aux légumes variés', 'base' => 200, 'p' => 15, 'g' => 8, 'l' => 5],
                            ['nom' => 'Igname bouillie', 'base' => 80, 'p' => 1.5, 'g' => 18, 'l' => 0.2],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de soja nature', 'base' => 200, 'p' => 7, 'g' => 6, 'l' => 4],
                            ['nom' => 'Poisson grillé (chinchard)', 'base' => 100, 'p' => 20, 'g' => 0, 'l' => 5],
                            ['nom' => 'Salade concombre-tomates', 'base' => 100, 'p' => 1, 'g' => 4, 'l' => 0.2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Riz complet cuit', 'base' => 100, 'p' => 2.5, 'g' => 23, 'l' => 0.3],
                            ['nom' => 'Sauce arachide légère au poulet maigre (2 c. à soupe)', 'base' => 50, 'p' => 8, 'g' => 6, 'l' => 5],
                            ['nom' => 'Salade de carottes râpées', 'base' => 100, 'p' => 1, 'g' => 5, 'l' => 0.2],
                            ['nom' => 'Haricots verts', 'base' => 100, 'p' => 2, 'g' => 5, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Ragoût de haricots rouges', 'base' => 150, 'p' => 10, 'g' => 27, 'l' => 1],
                            ['nom' => 'Plantain mûr grillé (1/2)', 'base' => 100, 'p' => 1, 'g' => 25, 'l' => 0.2],
                            ['nom' => 'Salade verte', 'base' => 100, 'p' => 1, 'g' => 3, 'l' => 0.2],
                            ['nom' => 'Orange', 'base' => 100, 'p' => 1, 'g' => 12, 'l' => 0.1],
                        ]
                    ]
                ],
                'jour2' => [
                    'Option A' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Galette de haricots (akara), 3 pièces', 'base' => 120, 'p' => 18, 'g' => 30, 'l' => 6],
                            ['nom' => 'Salade d\'avocat (1/4)', 'base' => 50, 'p' => 1, 'g' => 3, 'l' => 7.5],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Couscous de manioc (attiéké)', 'base' => 150, 'p' => 1.5, 'g' => 38, 'l' => 0.5],
                            ['nom' => 'Poisson braisé (tilapia)', 'base' => 120, 'p' => 24, 'g' => 0, 'l' => 5],
                            ['nom' => 'Sauce tomate légère aux légumes', 'base' => 100, 'p' => 2, 'g' => 5, 'l' => 2],
                            ['nom' => 'Salade de chou', 'base' => 100, 'p' => 1, 'g' => 4, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Soupe légère de légumes variés', 'base' => 200, 'p' => 3, 'g' => 10, 'l' => 1],
                            ['nom' => 'Poulet grillé sans peau', 'base' => 100, 'p' => 22, 'g' => 0, 'l' => 4],
                            ['nom' => 'Patate douce bouillie', 'base' => 80, 'p' => 1, 'g' => 18, 'l' => 0.1],
                        ]
                    ],
                    'Option B' => [
                        'Petit-déjeuner' => [
                            ['nom' => 'Bouillie de mil', 'base' => 200, 'p' => 5, 'g' => 28, 'l' => 1],
                            ['nom' => 'Lait écrémé', 'base' => 100, 'p' => 3.4, 'g' => 5, 'l' => 0.1],
                            ['nom' => 'Poisson fumé émietté', 'base' => 50, 'p' => 12, 'g' => 0, 'l' => 2],
                        ],
                        'Déjeuner' => [
                            ['nom' => 'Pâte de maïs (owo)', 'base' => 100, 'p' => 2, 'g' => 23, 'l' => 0.5],
                            ['nom' => 'Sauce feuilles d\'amarante au crabe', 'base' => 100, 'p' => 8, 'g' => 3, 'l' => 3],
                            ['nom' => 'Carottes vapeur', 'base' => 100, 'p' => 1, 'g' => 8, 'l' => 0.2],
                        ],
                        'Dîner' => [
                            ['nom' => 'Sauce tomate au poisson (maquereau)', 'base' => 100, 'p' => 20, 'g' => 0, 'l' => 5],
                            ['nom' => 'Haricots verts sautés', 'base' => 100, 'p' => 2, 'g' => 5, 'l' => 0.2],
                            ['nom' => 'Riz brun cuit', 'base' => 80, 'p' => 1.8, 'g' => 18, 'l' => 0.2],
                        ]
                    ]
                ],
                'collations' => [
                    ['nom' => 'Noix de cajou grillées sans sel (15 unités)', 'base' => 25, 'p' => 5.5, 'g' => 6, 'l' => 12],
                    ['nom' => 'Goyave', 'base' => 100, 'p' => 1, 'g' => 14, 'l' => 0.2],
                    ['nom' => 'Arachides bouillies', 'base' => 30, 'p' => 7.5, 'g' => 4, 'l' => 8],
                    ['nom' => 'Bâtonnets de carotte et concombre', 'base' => 150, 'p' => 1, 'g' => 10, 'l' => 0.1],
                    ['nom' => 'Banane moyenne', 'base' => 100, 'p' => 1, 'g' => 23, 'l' => 0.2],
                    ['nom' => 'Amandes grillées (10)', 'base' => 12, 'p' => 2.5, 'g' => 2, 'l' => 5.5],
                ]
            ],
        ];
    }
}