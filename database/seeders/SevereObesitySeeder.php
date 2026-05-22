<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recommendation;
use Illuminate\Support\Facades\DB;

class SevereObesitySeeder extends Seeder
{
    public function run(): void
    {
        // On ne vide que les recommandations pour l'ID 2
        DB::table('recommendations')->where('maladie_chronique_id', 2)->delete();

        $donnees = [
            // =========================================================================
            // 2. OBÉSITÉ SÉVÈRE (ID 2)
            // =========================================================================

            [
                'maladie_id' => 2,
                'question' => "Avez-vous été diagnostiqué avec des problèmes de santé liés à l'obésité, comme le diabète de type 2, l'hypertension ou l'hypercholestérolémie ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Aucun",
                                'diabetes' => "Aucun",
                                'hypertension' => "Aucun",
                                'cholesterol' => "Aucun"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Aucun",
                                'diabetes' => "Conseils : Même en l'absence de comorbidité diagnostiquée, l'obésité sévère représente un risque important. Il est fortement recommandé de consulter un médecin pour un bilan complet (glycémie, tension artérielle, cholestérol, bilan rénal et hépatique). Une prise en charge préventive nutritionnelle doit être amorcée immédiatement.",
                                'hypertension' => "Aucun",
                                'cholesterol' => "Même en l'absence de comorbidité diagnostiquée officiellement, une personne souffrant d'obésité sévère avec hypercholestérolémie est à haut risque de développer ces pathologies dans les mois ou années à venir. Il est fortement recommandé de réaliser des bilans de santé préventifs incluant la glycémie à jeun, la tension artérielle, le bilan lipidique complet et une évaluation de la fonction hépatique (stéatose hépatique fréquente dans ce contexte)."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Si oui lequel ?",
                'reponses' => [
                    null => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Aucun",
                                'diabetes' => "Conseils et recommandations :
Le diabète de type 2 associé à l'obésité sévère nécessite une prise en charge globale et rigoureuse. La priorité est de stabiliser la glycémie tout en favorisant une perte de poids progressive (0,5 à 1 kg/semaine). Il faut absolument éviter les sucres rapides, les farines raffinées, les boissons sucrées et les aliments à index glycémique élevé. La régularité des repas (3 repas par jour à heures fixes, sans grignotage) est essentielle pour éviter les pics glycémiques.
🍽️ Proposition de repas béninois adaptés :
Petit-déjeuner :
•	Bouillie de maïs non sucrée (akassa non fermenté) avec du lait de soja non sucré
•	Ou galette de sorgho (ablo non sucrée) avec une tisane de feuilles de goyavier (antidiabétique naturel)
Déjeuner :
•	Sauce de gombo avec poisson fumé sans huile ajoutée, accompagné de pâte d'igname en petite portion
•	Ou haricots rouges (atassi) bien cuits sans huile de palme en excès, avec légumes verts (feuilles de patate douce)
Dîner :
•	Soupe légère de légumes locaux (tomate, oignon, piment doux, chou, carotte) avec viande maigre (poulet sans peau grillé)
•	Ou akassa nature (petite portion) avec sauce d'arachide allégée et légumes
🥜 Collations béninoises adaptées :
•	Quelques cacahuètes non salées (petite poignée)
•	Tranche de papaye ou d'ananas (en petite quantité)
•	Concombre frais nature
",
                                'hypertension' => "Conseils et recommandations :
•	Réduire drastiquement la consommation de sel (< 5 g/jour, soit environ 1 cuillère à café)
•	Éviter les condiments très salés, les bouillons en cube (Maggi, etc.) en grande quantité
•	Consommer des aliments riches en potassium : bananes, haricots, légumes verts
•	Prendre les médicaments antihypertenseurs de façon régulière sans interruption
•	Surveiller la tension artérielle quotidiennement, matin et soir
•	Éviter le stress, le tabac et l'alcool qui aggravent l'hypertension
•	Pratiquer des exercices de relaxation ou de respiration profonde
🍽️ Propositions de repas adaptés (hypertension) :
Repas	Proposition
Petit-déjeuner	Bouillie de mil ou de sorgho non salée + fruit frais (papaye)
Déjeuner	Sauce d'arachide légère (peu d'huile, peu de sel) + légumes verts + poisson cuit à la vapeur
Dîner	Haricots rouges en sauce tomate maison (sans sel ajouté) + feuilles de baobab (kponsou)
Collation matin	Papaye fraîche ou mangue
Collation soir	Noix de cajou non salées (petite quantité)
",
                                'cholesterol' => "Comorbidité concernée : Hypercholestérolémie 
Conseils et recommandations spécifiques :
•	Consulter un cardiologue et un endocrinologue en priorité pour un bilan lipidique complet (LDL, HDL, triglycérides) et un bilan cardiovasculaire
•	Adopter un régime pauvre en graisses saturées et en cholestérol alimentaire
•	Réduire les huiles de palme en excès, les fritures répétées et les abats qui sont très fréquents dans l'alimentation béninois
•	Privilegier les huiles végétales insaturées comme l'huile d'arachide non raffinée en petite quantité
•	Augmenter la consommation de fibres solubles qui captent le cholestérol dans l'intestin
•	Ne jamais arrêter un traitement médicamenteux (statines) sans avis médical
•	Surveiller régulièrement la glycémie car l'hypercholestérolémie est souvent associée au prédiabète chez les personnes obèses
"
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Avez-vous subi des opérations chirurgicales liées à votre poids comme une chirurgie bariatrique ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	Respecter impérativement les phases alimentaires post-opératoires prescrites par le chirurgien
•	Phase liquide (semaines 1–2) : bouillons, eau, jus de légumes maison non sucrés
•	Phase semi-liquide (semaines 3–4) : purées lisses, yaourt maison, bouillie de sorgho
•	Phase solide progressive (mois 2+) : aliments mous en très petites portions (max 150ml/repas)
•	Mastiquer chaque bouchée au moins 30 fois
•	Ne jamais boire pendant les repas (attendre 30 min après)
•	Prendre des suppléments nutritionnels (fer, vitamine B12, calcium) prescrits
•	Éviter absolument : sucres concentrés (dumping syndrome), alcool, fritures, aliments fibreux durs
•	Faire des bilans nutritionnels tous les 3 mois
🍽️ Propositions de repas post-bariatrique :
Phase	Repas	Préparation
Liquide	Bouillon de légumes maison	Tomates, oignons, ail, herbes — filtré, sans sel
Liquide	Eau de coco fraîche	Hydratation naturelle, riche en minéraux
Semi-liquide	Bouillie de sorgho lisse	Sorgho très bien cuit, mixé, sans sucre
Semi-liquide	Purée d'igname + jus de légumes	Igname mixée très fine avec bouillon de légumes
Solide progressif	Niébé mixé en purée	Haricots très cuits, mixés, petite portion
Solide progressif	Poisson vapeur émietté	Tilapia vapeur effiloché, très mou, sans arêtes
",
                                'diabetes' => "Conseils : Après une chirurgie bariatrique, le régime alimentaire est très spécifique. Les repas doivent être fractionnés en 5 à 6 petites prises par jour. Les aliments doivent être bien mâchés, à texture molle au début. Il faut éviter les boissons pendant les repas, et veiller aux apports en protéines, vitamines et minéraux (carence en B12, fer, calcium fréquente). Un suivi médical et diététique régulier est obligatoire.
🍽️ Propositions adaptées (post-opératoire) :
•	Purée de haricots bien cuits (niébé mixé) en petite portion
•	Bouillie légère d'igname avec un peu de poisson effiloché
•	Soupe mixée de légumes locaux (carotte, courgette, épinards)
",
                                'hypertension' => "Conseils et recommandations :
•	Respecter scrupuleusement le régime post-opératoire prescrit par le chirurgien
•	Fractionner obligatoirement les repas en 5 à 6 petites prises par jour
•	Mâcher lentement et longuement chaque bouchée (30 mastications minimum)
•	Complémentation obligatoire en vitamines et minéraux (B12, fer, calcium, vitamine D)
•	Éviter les liquides pendant les repas (boire 30 minutes avant ou après)
•	Suivre régulièrement un suivi nutritionnel et médical post-opératoire
🍽️ Propositions de repas adaptés (post-chirurgie bariatrique) :
Repas	Proposition
Repas 1 (7h)	Bouillie de maïs très lisse et fluide, non sucrée
Repas 2 (10h)	Purée de haricots noirs très fine + quelques gouttes d'huile d'olive
Repas 3 (13h)	Poisson blanc cuit à la vapeur émietté + purée d'igname lisse (petite portion)
Repas 4 (16h)	Tisane de gingembre + 1 petit bout de banane plantain mûre bien cuite
Repas 5 (19h)	Soupe de légumes mixée (feuilles de moringa, épinards) + petite portion de protéines
Repas 6 (21h)	Lait de soja maison tiède non sucré
",
                                'cholesterol' => "La chirurgie bariatrique (bypass gastrique, sleeve gastrectomie, anneau gastrique) modifie profondément la prise en charge nutritionnelle. Après l'opération, les besoins alimentaires changent radicalement et les risques de carences nutritionnelles deviennent importants.
Recommandations post-chirurgie bariatrique :
•	Fractionner les repas en 5 à 6 petites prises par jour au lieu de 3 grands repas
•	Prioriser absolument les protéines à chaque repas pour éviter la fonte musculaire
•	Prendre des suppléments vitaminiques prescrits par le médecin (vitamine B12, fer, calcium, vitamine D) car l'absorption intestinale est réduite
•	Boire lentement et séparément des repas, jamais pendant le repas
•	Éviter les aliments sucrés et gras qui peuvent provoquer le syndrome de dumping (malaise, sueurs, diarrhées)
•	Continuer le suivi médical régulier et les bilans biologiques tous les 3 à 6 mois
•	Le cholestérol peut s'améliorer significativement après la chirurgie mais doit rester surveillé
Propositions de repas adaptés post-bariatrique :
•	Petite portion de purée d'igname très lisse avec un peu de sauce légère sans huile et une cuillère à soupe de haricots mixés pour les protéines
•	Bouillie de maïs enrichie aux arachides mixées pour apporter des protéines végétales en texture douce
•	Collation béninoise post-bariatrique : Yaourt local nature (fromage de lait caillé sans sucre), une petite tranche de papaye très mûre et douce
"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	La chirurgie bariatrique peut être envisagée si l'IMC est ≥ 40 ou ≥ 35 avec comorbidités
•	En attendant ou en alternative, adopter un programme alimentaire structuré
•	Consulter un chirurgien bariatrique pour évaluer si l'option chirurgicale est indiquée
•	Suivre un programme de perte de poids encadré par une équipe médicale pluridisciplinaire
•	Des changements alimentaires progressifs et durables restent la base de la prise en charge
",
                                'diabetes' => "Conseils : La chirurgie bariatrique peut être envisagée si l'IMC > 40 kg/m² (ou > 35 avec comorbidités) et que les traitements conventionnels ont échoué. Il est conseillé d'en discuter avec un médecin spécialiste. En attendant, une prise en charge nutritionnelle et physique sérieuse doit être mise en place.",
                                'hypertension' => "Conseils et recommandations :
•	La chirurgie bariatrique peut être envisagée si l'IMC est ≥ 40 kg/m² ou ≥ 35 avec comorbidités résistantes aux traitements
•	Discuter avec le médecin traitant des options disponibles (sleeve gastrectomie, bypass gastrique)
•	En attendant, s'engager dans un programme de perte de poids supervisé (médecin + diététicien + psychologue)
•	Des changements alimentaires et d'activité physique restent possibles et efficaces sans chirurgie si bien suivis
",
                                'cholesterol' => "La prise en charge est alors exclusivement médicale, nutritionnelle et comportementale. La chirurgie bariatrique peut être envisagée si l'IMC dépasse 40 kg/m² (ou 35 avec comorbidités graves) et que les autres traitements ont échoué. Le patient doit être informé de cette option par son médecin spécialiste."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Avez-vous des restrictions alimentaires ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Aucun",
                                'diabetes' => "Aucun",
                                'hypertension' => "Aucun",
                                'cholesterol' => "Aucun"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	L'absence de restriction est une opportunité pour diversifier l'alimentation sainement
•	Exploiter toute la richesse des aliments locaux béninois
•	Introduire progressivement les aliments complets, les légumineuses et les légumes variés
•	Éviter les aliments ultra-transformés même en l'absence de restriction
",
                                'diabetes' => "Conseil : L'absence de restriction représente une opportunité pour construire un plan nutritionnel varié et équilibré en s'appuyant sur toute la richesse de la cuisine béninoise traditionnelle.",
                                'hypertension' => "Conseils et recommandations :
•	Profiter de cette liberté alimentaire pour diversifier au maximum son alimentation
•	Introduire des légumes variés à chaque repas
•	Alterner les sources de protéines : poisson, poulet, haricots, œufs
",
                                'cholesterol' => "L'absence de restrictions alimentaires facilite grandement la mise en place d'un plan nutritionnel varié, équilibré et adapté. Cela permet une plus grande flexibilité dans le choix des aliments bénéfiques pour réduire le cholestérol et perdre du poids progressivement. C'est une opportunité à saisir pour diversifier au maximum l'alimentation avec tous les groupes d'aliments sains disponibles localement au Bénin."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Si oui, choisissez l'option qui s'appliquent ?",
                'reponses' => [
                    'Allergies' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	Identifier précisément les allergènes (faire un test allergologique si non encore fait)
•	Lire attentivement les étiquettes des produits transformés
•	Toujours avoir un antihistaminique prescrit par le médecin en cas de réaction accidentelle
•	Substituer les aliments allergènes par des alternatives locales béninoises
🍽️ Exemples d'alternatives selon l'allergie :
Allergie	Aliment évité	Alternative béninoise
Arachides	Huile d'arachide, pâte d'arachide	Huile de coco locale, sauce au sésame
Gluten	Blé, semoule de blé	Tô de maïs, atchèkè, riz local, igname
Lactose	Lait de vache	Lait de soja maison, lait de coco
Crustacés	Crevettes, écrevisses	Poisson d'eau douce local (tilapia, silure)
Maïs	Farine de maïs, tô	Igname pilée, riz complet, sorgho
",
                                'diabetes' => "Conseils : Identifier précisément l'allergène (arachide, gluten, lactose, fruits de mer, etc.) et l'éliminer totalement de l'alimentation. Consulter un allergologue et un diététicien pour trouver des substituts adaptés, en veillant à ne pas créer de carences nutritionnelles.
🍽️ Exemple (allergie aux arachides) : Remplacer les sauces à base d'arachide par des sauces à base de graines de courge (egusi), de sésame ou de tomates fraîches.
",
                                'hypertension' => "Conseils et recommandations :
•	Identifier précisément les allergènes (test d'allergie avec un allergologue)
•	Toujours lire les étiquettes des produits transformés
•	Avoir toujours sur soi un antihistaminique ou un auto-injecteur d'adrénaline si allergie sévère
•	Informer le diététicien de toutes les allergies pour adapter le plan alimentaire
🍽️ Exemple d'adaptation de repas (allergie aux arachides) :
Repas	Proposition sans arachides
Déjeuner	Sauce gombo + poisson grillé + igname bouillie
Dîner	Sauce tomate maison + haricots + riz complet (petite portion)
Collation	Papaye fraîche ou mangue
",
                                'cholesterol' => "Option A — Allergies alimentaires
Les allergies les plus fréquentes en Afrique de l'Ouest concernent les arachides, certains poissons, les crustacés et parfois le gluten. En cas d'allergie confirmée par un médecin allergologue, il est absolument impératif d'éviter l'aliment concerné et de lire les étiquettes des produits transformés. Pour les personnes souffrant d'obésité et d'hypercholestérolémie, l'allergie aux arachides est particulièrement contraignante car les arachides sont une source importante de protéines végétales saines dans le régime béninois. Dans ce cas, les substituts recommandés sont les graines de sésame, les graines de courge, le soja local et les légumineuses comme le niébé.
Propositions de repas sans arachides :
•	Sauce de gombo au poisson fumé modéré (peu de sel) avec pâte de maïs
•	Soupe de haricots niébé aux épices locales (ail, gingembre, piment doux) sans huile de palme en excès
"
                            ]
                        ],
                        'Intolérances' => [
                            'weight_loss' => [
                                'all' => [
                                    'none' => "Conseils et recommandations :
•	Distinguer l'intolérance (digestive, graduelle) de l'allergie (immunologique, immédiate)
•	L'intolérance au lactose est très fréquente en Afrique de l'Ouest — opter pour le yaourt maison
•	L'intolérance au gluten (maladie cœliaque) nécessite l'élimination totale du gluten
•	Tenir un journal alimentaire pour identifier les aliments déclencheurs de symptômes
🍽️ Repas adaptés aux intolérances :
Intolérance	Repas recommandé	Conseil
Lactose	Tô + sauce légumes sans lait	Cuisine traditionnelle béninoise naturellement adaptée
Gluten	Igname bouillie + poisson grillé	L'igname est naturellement sans gluten
Gluten	Riz local + sauce arachide maison	Le riz local est sans gluten
Fructose	Légumes cuits + niébé	Éviter les fruits sucrés, les jus
",
                                    'diabetes' => "Conseils : Les intolérances alimentaires, contrairement aux allergies, peuvent parfois être tolérées en petites quantités. En cas d'intolérance au lactose, opter pour le lait de soja ou de coco non sucré. En cas d'intolérance au gluten, éviter le blé, l'orge, le seigle — le maïs, le riz et l'igname sont naturellement sans gluten et très présents dans la cuisine béninoise.
🍽️ Exemples :
•	Akassa (base de maïs fermenté) : sans gluten, adapté
•	Pâte de maïs blanc : sans gluten, bonne option
",
                                    'hypertension' => "Conseils et recommandations :
•	Intolérance au lactose : remplacer le lait par du lait de soja maison ou du lait de noix de coco en petite quantité
•	Intolérance au gluten : éviter le pain de blé, les pâtes ; privilégier le maïs, le mil, le sorgho qui sont naturellement sans gluten
•	Consulter un gastro-entérologue pour un diagnostic précis
🍽️ Repas béninois adaptés (intolérance au gluten) :
Repas	Proposition
Petit-déjeuner	Bouillie de mil ou de sorgho + fruits frais
Déjeuner	Pâte de maïs (akassa) + sauce légumes + poisson
Dîner	Haricots en sauce + légumes verts bouillis
",
                                    'cholesterol' => "L'intolérance au lactose est assez répandue en Afrique sub-saharienne. Elle ne représente pas un obstacle majeur car les produits laitiers ne sont pas fondamentaux dans le régime béninois traditionnel. L'intolérance au gluten (maladie cœliaque ou sensibilité) est moins fréquente mais possible. Dans ce cas, le maïs, l'igname, le manioc, le sorgho et le mil qui sont des bases de l'alimentation béninoise sont naturellement sans gluten et constituent donc d'excellentes alternatives adaptées."
                                ]
                            ],
                            'Préférences culturelles' => [
                                'weight_loss' => [
                                    'all' => [
                                        'none' => "Conseils et recommandations :
•	Respecter les préférences culturelles tout en adaptant les préparations pour la perte de poids
•	Réduire les quantités de graisses (huile de palme, beurre de karité) utilisées dans la cuisine traditionnelle
•	Remplacer les fritures par les cuissons à l'eau, à la vapeur ou au four
•	Conserver les saveurs authentiques en utilisant les épices et condiments naturels locaux
🍽️ Plats culturels béninois adaptés à l'obésité :
Plat traditionnel	Adaptation recommandée
Sauce arachide grasse	Réduire la pâte d'arachide de 50%, ajouter plus de légumes
Tô de maïs en grande portion	Réduire la portion à 150g, augmenter la sauce de légumes
Riz gras de fête	Riz cuit à l'eau + sauce légumes séparée en petite quantité
Poisson frit	Poisson grillé ou bouilli avec les mêmes épices
Soupe de viande grasse	Dégraisser le bouillon après refroidissement
",
                                        'diabetes' => "Conseils : Les préférences culturelles béninoises sont un atout : la cuisine traditionnelle est riche en légumineuses, légumes, tubercules et poissons, aliments qui peuvent s'intégrer parfaitement dans un régime thérapeutique. Il faut adapter les méthodes de cuisson (moins d'huile de palme, moins de sel, cuisson à la vapeur ou à l'eau plutôt que la friture).",
                                        'hypertension' => "Conseils et recommandations :
•	Les habitudes alimentaires culturelles béninoises peuvent tout à fait être maintenues tout en étant adaptées pour être plus saines
•	Réduire les quantités d'huile de palme dans les sauces
•	Augmenter la part des légumes dans chaque plat
•	Diminuer les portions de féculents (igname, gari, riz) et augmenter celles des protéines et légumes
",
                                        'cholesterol' => "Certains groupes ethniques au Bénin ont des traditions alimentaires spécifiques. Les Fon, Adja, Yoruba, Bariba, Peulh ont chacun leurs aliments de base et leurs préparations traditionnelles. La prise en charge nutritionnelle doit absolument respecter ces identités culturelles. Un diététicien doit adapter le plan alimentaire en intégrant les aliments culturellement acceptés plutôt qu'imposer des aliments étrangers qui ne seront pas suivis sur le long terme."
                                    ]
                                ],
                                'Religieuses' => [
                                    'weight_loss' => [
                                        'all' => [
                                            'none' => "Conseils et recommandations pour les pratiques religieuses courantes :
Islam (Halal) :
•	Tous les poissons et légumes béninois sont naturellement halal
•	Éviter les viandes non abattues rituellement
•	Le jeûne du Ramadan doit être discuté avec le médecin en cas d'obésité sévère avec diabète
•	Si jeûne autorisé : privilégier les légumineuses et protéines maigres pour l'iftar
Christianisme (jours de jeûne ou d'abstinence) :
•	Les jours sans viande sont une opportunité pour les repas végétariens riches en légumineuses
•	Niébé, soja local, lentilles comme sources de protéines
Religions traditionnelles / Vodoune :
•	Certains aliments peuvent être tabous — adapter le plan alimentaire en respectant ces interdits
•	Consulter le diététicien pour trouver des substituts adéquats
",
                                            'diabetes' => "Conseils : Les alternatives protéinées adaptées et conformes aux restrictions religieuses dans la cuisine béninoise incluent : poulet, pintade, poisson frais ou fumé, œufs, légumineuses (haricots, lentilles, niébé). Ces aliments sont facilement accessibles et compatibles avec un régime diabétique.",
                                            'hypertension' => "Conseils et recommandations :
•	Musulman (halal) : éviter le porc et l'alcool — facile à respecter avec les recettes béninoises à base de poisson, bœuf halal, poulet
•	Chrétien pratiquant (carême) : les jours de jeûne, veiller à ne pas compenser avec des repas trop riches après
•	Animiste / tradition locale : respecter les interdits tout en veillant à une alimentation variée et équilibrée
",
                                            'cholesterol' => "Pour les patients musulmans, l'alimentation halal est respectée. Le porc et ses dérivés, ainsi que l'alcool, sont prohibés. Cette restriction est en réalité bénéfique pour la santé cardiovasculaire car elle élimine naturellement les charcuteries et les viandes grasses très transformées. Pour les chrétiens évangéliques pratiquant des jeûnes religieux, il faut veiller à ce que les jeûnes prolongés n'aggravent pas les déséquilibres lipidiques et glycémiques. Les catholiques pratiquant l'abstinence de viande le vendredi peuvent profiter de cette contrainte pour augmenter la consommation de poissons maigres bénéfiques."
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Consommez-vous régulièrement des aliments riches en calories vides, comme les boissons sucrées, les fast-foods, ou les desserts ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	Identifier et lister tous les aliments « calories vides » consommés habituellement
•	Remplacer progressivement (pas brutalement) les aliments caloriques vides par des alternatives nutritives
•	La règle des 80/20 : 80% aliments sains, 20% plaisir contrôlé
•	Ne pas supprimer totalement pour éviter la frustration et les craquages
•	Tenir un journal alimentaire pour prendre conscience des quantités réelles consommées
 Remplacement des calories vides par des alternatives :
Aliment à calories vides	Alternative béninoise saine
Sodas sucrés (Coca, Fanta)	Eau infusée au gingembre-citron-menthe, eau de coco fraîche
Biscuits industriels	Arachides grillées non salées (petite poignée), noix de cajou nature
Fast-food / fritures	Poisson grillé local avec légumes, brochettes de poulet grillé
Bonbons et sucreries	Morceau de papaye, mangue ou goyave fraîche
Pain blanc beurré	Bouillie de sorgho légère sans sucre
Maïs grillé nature (sans beurre)	Maïs grillé nature (sans beurre)
",
                                'diabetes' => "Conseils et recommandations : Les aliments à calories vides (boissons sucrées, fast-foods, desserts industriels, chips) sont particulièrement dangereux en cas de diabète de type 2 car ils provoquent des pics glycémiques brutaux et favorisent le stockage des graisses. Il est indispensable de les éliminer progressivement en les remplaçant par des aliments nutritifs locaux.
Stratégie de substitution :
•	Au lieu d'une boisson sucrée → eau de coco naturelle fraîche ou eau infusée au gingembre et citron
•	Au lieu de biscuits industriels → quelques cacahuètes non salées ou une tranche de fruit frais
•	Au lieu de fast-food → sandwich à base de galette de maïs avec poulet grillé et légumes
",
                                'hypertension' => "Conseils et recommandations :
•	Réduire progressivement puis éliminer les boissons sucrées (sodas, jus industriels, bissap sucré en excès)
•	Limiter les fast-foods et les fritures (beignets, chin-chin, aloko en excès)
•	Remplacer les desserts sucrés par des fruits frais locaux (mangue, papaye, ananas)
•	Tenir un journal alimentaire pour prendre conscience des quantités consommées
•	Boire de l'eau ou de l'eau infusée (gingembre, citron) à la place des boissons sucrées
•	Ne pas interdire brutalement ces aliments pour éviter les frustrations : diminuer progressivement
🍽️ Collations saines de substitution :
À éviter	À privilégier
Sodas, jus en sachet	Eau fraîche, jus de citron maison sans sucre, infusion de bissap peu sucrée
Beignets frits	Patate douce bouillie, petite portion d'igname bouillie
Chin-chin sucré	Poignée de noix de cajou ou arachides non salées (en petite quantité)
Chocolats industriels	Fruits frais (mangue, papaye, banane)
Gâteaux de fête	1 petite portion de gâteau de maïs maison (peu sucré)
",
                                'cholesterol' => "C'est l'un des facteurs les plus aggravants de l'obésité sévère et de l'hypercholestérolémie. Les boissons sucrées (sodas, bissap sucré industriel, jus en sachet), les fast-foods (brochettes très grasses, fritures de rue), les desserts sucrés et les biscuits industriels apportent des calories sans aucune valeur nutritive et favorisent la résistance à l'insuline, l'élévation des triglycérides et la prise de poids viscérale.
Recommandations urgentes :
•	Éliminer progressivement (pas brutalement pour éviter les craquages) les boissons sucrées industrielles et les remplacer par de l'eau, des infusions de gingembre-citron non sucrées, ou du zobo (hibiscus) sans sucre ajouté
•	Réduire les fritures de rue à zéro ou maximum une fois par semaine en phase de transition
•	Préparer les repas à la maison le plus souvent possible pour contrôler les ingrédients
•	Lire les étiquettes des produits emballés et rejeter tout produit avec sucre ou sirop de glucose dans les 3 premiers ingrédients
Collations saines de substitution :
•	Arachides grillées à sec (sans huile ni sel) en petite quantité (une poignée)
•	Papaye, mangue ou banane plantain bouillie (non frite)
•	Maïs bouilli (non sucré) à la sauce de gombo légère
•	Kocoye (noix de coco fraîche) en petite portion
"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	Maintenir cette bonne habitude et la renforcer
•	Rester vigilant lors des événements sociaux et fêtes où ces aliments sont souvent présents
•	Continuer à privilégier les aliments nutritifs et naturels
",
                                'diabetes' => "Conseil : Félicitations pour cette habitude positive. Maintenir cette vigilance est essentiel. Vérifier tout de même les étiquettes des aliments transformés éventuellement consommés et rester attentif aux sucres cachés.",
                                'hypertension' => "Conseils et recommandations :
•	Excellente habitude à maintenir et à renforcer
•	Rester vigilant lors des fêtes, cérémonies ou sorties sociales où ces aliments sont souvent proposés
•	Continuer à privilégier les aliments entiers, peu transformés
",
                                'cholesterol' => "C'est un atout considérable dans la prise en charge. Ce comportement alimentaire sain doit être encouragé, valorisé et renforcé. Le patient doit être félicité et informé que cette habitude protège son cœur et facilite la perte de poids. Il faut renforcer cette bonne pratique avec de l'éducation nutritionnelle pour qu'elle soit maintenue dans le temps."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Suivez-vous déjà un plan nutritionnel ou avez-vous consulté un diététicien auparavant ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Aucun",
                                'diabetes' => "Aucun",
                                'hypertension' => "Aucun",
                                'cholesterol' => "Aucun"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	La consultation d'un diététicien est fortement recommandée dans l'obésité sévère
•	Un plan nutritionnel personnalisé est bien plus efficace qu'un régime improvisé
•	Chercher un diététicien ou nutritionniste au CNHU de Cotonou ou dans les hôpitaux de zone
•	En attendant la consultation, commencer par les bases : réduire les portions, éliminer les sodas, boire plus d'eau
",
                                'diabetes' => "Conseil : La consultation d'un diététicien ou nutritionniste est vivement recommandée. En l'absence d'accès à un professionnel, ce programme personnalisé peut servir de guide. Il est conseillé de tenir un journal alimentaire quotidien pour prendre conscience des habitudes.",
                                'hypertension' => "Conseils et recommandations :
•	Consulter un diététicien-nutritionniste dès que possible : c'est l'un des piliers du traitement de l'obésité
•	Sans suivi professionnel, les régimes faits maison peuvent entraîner des carences nutritionnelles
•	Chercher un professionnel de santé formé à la nutrition clinique au Bénin (CNHU, cliniques privées)
•	En attendant, commencer par réduire les portions de féculents et augmenter légumes et protéines
",
                                'cholesterol' => "❌ RÉPONSE : NON — Jamais consulté de diététicien
Il est fortement recommandé de consulter un diététicien-nutritionniste dès que possible. Cette consultation est particulièrement importante car l'obésité sévère associée à l'hypercholestérolémie nécessite une approche nutritionnelle médicalisée et personnalisée. 
"
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Si oui, parlez-nous de ça brièvement en quelques lignes",
                'reponses' => [
                    null => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils selon les situations fréquentes décrites :
Cas 1 — Plan suivi mais résultats insuffisants :
•	Réévaluer le plan avec le diététicien pour l'ajuster
•	Vérifier l'adhérence réelle au plan (journal alimentaire honnête)
•	Identifier les moments de dérapage et les raisons (stress, fêtes, fatigue)
•	Introduire de l'activité physique si absente
Cas 2 — Plan abandonné en cours de route :
•	Analyser les raisons d'abandon (trop strict, monotone, coût, manque de soutien)
•	Créer un nouveau plan plus réaliste, progressif et culturellement adapté
•	Impliquer la famille dans les changements alimentaires
Cas 3 — Plan suivi avec succès mais plateau atteint :
•	Modifier le plan pour sortir du plateau (varier les aliments, ajuster les calories)
•	Augmenter l'activité physique
•	Consulter à nouveau le diététicien pour réévaluation
",
                                'diabetes' => "Conseils : La reprise de poids après l'arrêt d'un régime est un phénomène très courant appelé effet yo-yo. Il traduit souvent un régime trop restrictif ou non adapté au mode de vie. Il est recommandé de reprendre un suivi diététique régulier, mais cette fois avec une approche à long terme, progressive, intégrant les habitudes alimentaires culturelles et tenant compte des contraintes émotionnelles et sociales. L'objectif n'est pas un régime temporaire mais un changement durable des habitudes de vie.",
                                'hypertension' => "Conseils et recommandations :
•	Reprendre le suivi avec le diététicien en expliquant les difficultés rencontrées
•	Demander un plan nutritionnel adapté aux aliments locaux béninois pour une meilleure adhérence
•	Comprendre que la fatigue initiale est souvent transitoire lors de la réduction calorique
•	Ne pas viser un déficit trop brutal : 300 à 500 kcal/jour de déficit est suffisant et durable
•	La régularité sur le long terme est plus efficace que les régimes stricts et temporaires
",
                                'cholesterol' => "Analyse et recommandations :
Il faut reprendre le suivi avec un diététicien en insistant sur la personnalisation culturelle du plan alimentaire et le soutien psychologique pour maintenir la motivation sur le long terme.
"
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Buvez-vous régulièrement des boissons sucrées ou alcoolisées ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Aucun",
                                'diabetes' => "Aucun",
                                'hypertension' => "Aucun",
                                'cholesterol' => "Aucun"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils :
•	Excellente habitude à maintenir
•	S'assurer de boire suffisamment d'eau : minimum 1,5 à 2 litres par jour
•	Infusions de gingembre, citronelle ou moringa peuvent être consommées librement
",
                                'diabetes' => "Conseil : Excellent réflexe de santé. Maintenir une bonne hydratation avec 1,5 à 2L d'eau par jour. Prioriser les boissons locales sans sucre ajouté.",
                                'hypertension' => "Conseils :
•	Très bonne habitude à maintenir
•	Rester vigilant lors des fêtes et cérémonies où l'alcool et les boissons sucrées sont souvent offerts
•	Continuer à s'hydrater avec de l'eau, des tisanes légères ou des jus naturels maison sans sucre ajouté
",
                                'cholesterol' => "Excellente habitude. L'absence de consommation de boissons sucrées et alcoolisées est un facteur protecteur important pour le contrôle du cholestérol et du poids. Cette habitude doit être maintenue et renforcée."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Si oui, Quand ? Quelle quantité ?",
                'reponses' => [
                    null => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Si boissons sucrées (sodas, jus industriels, bissap sucré) :
Quand ? (ex : à chaque repas, au travail, le soir) Quelle quantité ? (ex : 1 à 2 bouteilles par jour)
Recommandations :
•	Chaque litre de soda contient environ 100g de sucre soit 400 kcal vides
•	Réduire progressivement : semaine 1 = moitié de la quantité habituelle, semaine 2 = quart, etc.
•	Remplacer par de l'eau infusée au gingembre et citron, de l'eau de coco naturelle ou du bissap sans sucre
🍺 Si boissons alcoolisées (bière, sodabi, vin de palme) :
Quand ? (ex : le week-end, lors des cérémonies, le soir) Quelle quantité ? (ex : 2 à 3 bières le week-end)
Recommandations :
•	L'alcool est très calorique (7 kcal/g) et favorise le stockage des graisses abdominales
•	Le sodabi local est particulièrement fort en alcool et calories
•	Objectif : réduire à 0 consommation ou maximum 1 verre ocasionnel
•	L'alcool aggrave le foie gras (stéatose hépatique), fréquent dans l'obésité sévère
•	Alternatives festives béninoises : bissap sans sucre, jus de tamarin naturel, eau de coco
",
                                'diabetes' => "Cas 1 — Boissons sucrées (ex : sodas, jus industriels, bissap sucré) Fréquence : tous les jours — Quantité : 2 à 3 verres/jour
Conseils : Une canette de soda contient l'équivalent de 7 à 10 morceaux de sucre. Pour un diabétique, c'est une catastrophe glycémique. Remplacer immédiatement par de l'eau pure, de l'eau de coco fraîche non sucrée, ou des infusions locales non sucrées (hibiscus/bissap sans sucre, citronnelle, gingembre).
Cas 2 — Boissons alcoolisées (ex : sodabi, bière locale, vin de palme) Fréquence : weekends — Quantité : 2 à 3 verres
Conseils : L'alcool est contre-indiqué en cas de diabète de type 2 car il perturbe la glycémie (risque d'hypoglycémie différée), apporte des calories vides et favorise la résistance à l'insuline. Il est fortement conseillé d'arrêter totalement ou de réduire à l'occasion exceptionnelle avec l'avis du médecin.
",
                                'hypertension' => "Cas A : Boissons sucrées — Tous les jours, 2 à 3 verres/jour
Conseils :
•	Chaque verre de soda = 150 kcal vides → 3 verres/jour = 450 kcal inutiles = prise de poids assurée
•	Remplacer progressivement : commencer par supprimer 1 verre par semaine
•	Objectif final : 0 boisson sucrée industrielle par jour
•	Boire de l'eau infusée au gingembre, citron ou feuilles de menthe pour compenser l'envie de saveur
Cas B : Alcool — Le week-end, 2 à 4 bières
Conseils :
•	L'alcool est à la fois calorique (7 kcal/g) et mauvais pour la tension artérielle
•	Limiter à 1 verre maximum occasionnellement puis viser l'arrêt complet
•	La bière augmente la triglycéridémie et favorise le stockage abdominal des graisses
•	L'alcool interagit négativement avec certains médicaments antihypertenseurs et antidiabétiques
•	Remplacer la bière par de l'eau gazeuse ou du bissap peu sucré lors des sorties sociales
",
                                'cholesterol' => "Cas A — Boissons sucrées en semaine, environ 2 à 3 verres par jour
Une consommation quotidienne de boissons sucrées (sodas, jus industriels, thé sucré) à raison de 2 à 3 verres par jour représente un apport en sucre excessif d'environ 60 à 90 grammes de sucre supplémentaire par jour. Cela favorise la prise de poids abdominale, élève les triglycérides et aggrave l'hypercholestérolémie. L'objectif est de réduire à zéro progressivement sur 4 à 6 semaines.
Cas B — Boissons alcoolisées (bière locale tchoukoutou, sodabi, bière industrielle) le week-end
L'alcool est riche en calories vides (7 kcal/g) et élève les triglycérides de manière significative. La consommation régulière même modérée est incompatible avec le traitement de l'hypercholestérolémie. Il est recommandé d'arrêter complètement l'alcool ou de le limiter à des occasions exceptionnelles très rares (maximum un verre par occasion), en informant le médecin traitant.
Substituts de boissons recommandés:
•	Eau fraîche avec rondelles de citron ou de gingembre
•	Zobo (infusion de fleurs d'hibiscus) sans sucre ajouté, légèrement refroidi
•	Infusion de citronnelle ou de feuilles de moringa non sucrée
•	Lait de soja maison peu sucré
"
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Combien d' heures de sommeil avez-vous par nuit ?",
                'reponses' => [
                    'Moins de 6 h' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	Le manque de sommeil augmente la ghréline (hormone de la faim) et diminue la leptine (satiété)
•	Il favorise la prise de poids et rend la perte de poids très difficile
•	Viser progressivement 7 à 8 heures de sommeil par nuit
•	Créer une routine du coucher : pas d'écran 1h avant le sommeil, heure de coucher fixe
•	Éviter les repas lourds le soir — dîner léger au moins 2h avant le coucher
•	Le manque de sommeil peut aggraver le diabète et l'hypertension
🍽️ Dîners béninois légers favorisant le sommeil :
•	Bouillie de sorgho tiède légère sans sucre
•	Soupe légère de légumes (tomates, oignons, herbes) sans viande
•	Haricots niébé en petite portion avec légumes verts
",
                                'diabetes' => "Le manque de sommeil est directement lié à une augmentation de la résistance à l'insuline, une hausse du cortisol (hormone du stress qui favorise le stockage abdominal des graisses) et une augmentation de l'appétit par dérégulation des hormones leptine/ghréline. Il est urgent d'améliorer l'hygiène du sommeil : coucher régulier, éviter les écrans avant le coucher, créer un environnement calme et frais.",
                                'hypertension' => "Conseils :
•	Le manque de sommeil dérègle les hormones de la faim (ghréline augmente, leptine diminue) → fringales et prise de poids
•	Instaurer une routine de coucher fixe, même le week-end
•	Éviter les écrans (téléphone, télévision) au moins 1h avant le coucher
•	Éviter les repas lourds le soir et les stimulants (café, thé fort) après 15h
•	Si le manque de sommeil est chronique, consulter un médecin (suspicion d'apnée du sommeil, anxiété)
",
                                'cholesterol' => "Le manque de sommeil chronique est un facteur aggravant de l'obésité et de l'hypercholestérolémie. Il perturbe les hormones de la faim (ghréline augmentée, leptine diminuée), favorise les grignotages nocturnes, élève le cortisol (hormone du stress) qui stimule le stockage des graisses abdominales et peut aggraver les dyslipidémies. Il est impératif d'identifier et traiter les causes du manque de sommeil (stress, apnée du sommeil, mauvaise hygiène de sommeil).
Recommandations : Se coucher et se lever à heures fixes, éviter les écrans 1 heure avant le coucher, créer un environnement calme et frais pour dormir, éviter les repas copieux et l'alcool le soir.
"
                            ]
                        ],
                        '6h -7h' => [
                            'weight_loss' => [
                                'all' => [
                                    'none' => "Conseils :
•	Sommeil légèrement insuffisant — essayer d'atteindre 7h30 minimum
•	Même conseils que ci-dessus mais moins urgents
•	Éviter les stimulants (café, thé fort, boissons énergisantes) après 14h
",
                                    'diabetes' => "Légèrement en dessous des recommandations. Un sommeil de 7 à 9 heures est idéal. Essayer d'ajouter 30 à 60 minutes progressivement.",
                                    'hypertension' => "Conseils :
•	Légèrement insuffisant pour une personne obèse avec hypertension : viser 7h à 8h
•	Améliorer progressivement la durée du sommeil en se couchant 30 minutes plus tôt chaque semaine
•	Un sommeil de 7h minimum aide à réguler la tension artérielle et la glycémie
",
                                    'cholesterol' => "Un sommeil de 6 à 7 heures par nuit est à la limite inférieure du recommandé. Bien que certaines personnes fonctionnent correctement avec cette durée, pour les patients souffrant d'obésité sévère et d'hypercholestérolémie, il serait bénéfique de viser 7 à 8 heures pour optimiser la régulation hormonale et métabolique."
                                ]
                            ],
                            '8h -9h' => [
                                'weight_loss' => [
                                    'all' => [
                                        'none' => "Conseils :
•	Durée de sommeil optimale — maintenir cette habitude
•	S'assurer que le sommeil est de bonne qualité (pas de réveils fréquents)
•	Surveiller les signes d'apnée du sommeil (ronflements, fatigue au réveil)
",
                                        'diabetes' => "Durée idéale. Maintenir cette habitude, elle favorise l'équilibre hormonal, la récupération musculaire et la régulation glycémique.",
                                        'hypertension' => "Conseils :
•	Durée de sommeil optimale — maintenir cette habitude
•	S'assurer de la qualité du sommeil en plus de la durée (pas de réveils fréquents, pas de ronflements excessifs)
•	Continuer à respecter des horaires réguliers de coucher et de lever
",
                                        'cholesterol' => "Une durée de sommeil de 8 à 9 heures est idéale pour la santé métabolique. Elle favorise la régulation des hormones de la faim, la récupération musculaire et la réduction du stress. C'est la plage de sommeil recommandée pour les patients en processus de perte de poids."
                                    ]
                                ],
                                'Plus de 9h' => [
                                    'weight_loss' => [
                                        'all' => [
                                            'none' => "Conseils :
•	Un sommeil excessif peut indiquer une dépression, un syndrome métabolique ou de la fatigue chronique
•	Consulter un médecin si ce besoin est constant
•	L'hypersomnie est parfois liée à une apnée du sommeil non traitée
•	Maintenir des heures de lever régulières même le week-end
",
                                            'diabetes' => "Un excès de sommeil peut être le signe d'une fatigue chronique, d'une dépression ou d'une apnée du sommeil non traitée. Consulter un médecin pour évaluation.",
                                            'hypertension' => "Conseils :
•	Un excès de sommeil peut aussi être un signe de dépression ou d'apnée du sommeil sévère
•	Consulter un médecin si l'on se sent toujours fatigué malgré 9h de sommeil
•	Éviter de rester au lit au-delà du réveil naturel : se lever et s'exposer à la lumière du matin
",
                                            'cholesterol' => "Un sommeil excessif peut également être problématique. Il peut être le signe d'une dépression, d'une apnée du sommeil non traitée, ou d'un manque d'activité physique. Une somnolence diurne excessive doit être signalée au médecin car elle peut indiquer une apnée du sommeil fréquente chez les personnes souffrant d'obésité sévère."
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Avez-vous l'apnée du sommeil ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	L'apnée du sommeil est très fréquente dans l'obésité sévère (poids sur les voies respiratoires)
•	La perte de poids est le traitement le plus efficace de l'apnée du sommeil modérée à sévère
•	Si prescrit, utiliser le masque CPAP régulièrement
•	Dormir sur le côté (pas sur le dos) réduit les épisodes d'apnée
•	Éviter l'alcool et les somnifères qui aggravent l'apnée
•	Perte de 10% du poids corporel peut réduire significativement les épisodes d'apnée
",
                                'diabetes' => "L'apnée du sommeil est très fréquente chez les personnes souffrant d'obésité sévère. Elle aggrave la fatigue diurne, perturbe le métabolisme et augmente les risques cardiovasculaires. Une consultation chez un pneumologue ou un médecin du sommeil est indispensable. Le traitement par appareil CPAP est souvent recommandé. La perte de poids améliore significativement l'apnée.",
                                'hypertension' => "Conseils :
•	L'apnée du sommeil aggrave l'hypertension et les risques cardiovasculaires
•	Consulter un pneumologue ou un somnologue pour un bilan complet du sommeil (polysomnographie)
•	Le traitement par CPAP (ventilation nocturne) peut être recommandé
•	La perte de poids améliore souvent l'apnée du sommeil de façon significative
•	Éviter de dormir sur le dos : dormir sur le côté gauche de préférence
•	Éviter alcool et sédatifs qui aggravent l'apnée
",
                                'cholesterol' => "L'apnée du sommeil est extrêmement fréquente chez les personnes souffrant d'obésité sévère (50 à 70% des cas). Elle aggrave l'hypertension artérielle, le risque cardiovasculaire et l'hypercholestérolémie indirectement par le biais du stress chronique et de la perturbation du métabolisme. Le traitement par PPC (pression positive continue) est recommandé en association avec la perte de poids. La réduction du poids de 10 à 15% peut significativement améliorer voire guérir l'apnée du sommeil."
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils :
•	Rester vigilant aux symptômes : ronflements forts, pauses respiratoires la nuit, fatigue excessive le matin
•	En cas de symptômes, consulter pour un examen polysomnographique
",
                                'diabetes' => "Continuer à surveiller. Tout ronflement fort, réveils nocturnes répétés ou fatigue persistante malgré un sommeil suffisant doit alerter.",
                                'hypertension' => "Conseils :
•	Rester vigilant : l'obésité sévère est le principal facteur de risque de l'apnée du sommeil
•	Si des ronflements forts, des pauses respiratoires nocturnes observées par l'entourage, ou une somnolence diurne excessive apparaissent, consulter immédiatement
•	Maintenir un poids en baisse pour prévenir l'apparition de l'apnée
",
                                'cholesterol' => "Si le patient ronfle fortement, se réveille fréquemment la nuit ou présente une somnolence diurne excessive, une polysomnographie (examen du sommeil) doit être prescrite pour dépister une apnée non diagnostiquée."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Avez-vous des douleurs articulaires ou des limitations de mobilité ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Aucun",
                                'diabetes' => "Aucun",
                                'hypertension' => "Aucun",
                                'cholesterol' => "Aucun"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils :
•	Chance précieuse à exploiter ! Commencer une activité physique régulière avant que les douleurs apparaissent
•	L'obésité sévère finira par affecter les articulations si aucune action n'est prise
",
                                'diabetes' => "Conseil : L'absence de douleurs articulaires est une chance. Prévenir leur apparition en évitant les sports à fort impact (course, saut), en renforçant progressivement les muscles de soutien articulaire et en perdant du poids.",
                                'hypertension' => "Conseils :
•	Profiter de cette mobilité pour pratiquer une activité physique régulière sans attendre
•	Prévenir les problèmes articulaires futurs en perdant du poids progressivement
•	Renforcer les muscles porteurs (quadriceps, muscles du dos) par des exercices adaptés
",
                                'cholesterol' => "L'absence de douleurs articulaires est une fenêtre d'opportunité précieuse pour commencer une activité physique régulière avant que les complications articulaires n'apparaissent. Il faut en profiter immédiatement car avec l'obésité sévère, les douleurs articulaires peuvent survenir à tout moment."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Si oui, A quelle fréquence ?",
                'reponses' => [
                    'Tous les jours' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	L'excès de poids exerce une pression énorme sur les articulations (genoux, hanches, chevilles)
•	Chaque kilo perdu réduit de 4 kg la pression sur les genoux
•	Prioriser les activités sans impact : natation, vélo, exercices en position assise ou couchée
•	Appliquer des compresses chaudes/froides selon l'avis médical
•	Consulter un rhumatologue ou kinésithérapeute
•	Eviter la marche prolongée sur sol dur en attendant une amélioration
•	Anti-inflammatoires naturels : curcuma, gingembre en infusion quotidienne
🏋️ Activités physiques recommandées avec douleurs articulaires quotidiennes :
•	Exercices de respiration et de posture en position assise
•	Mouvements doux des bras et des épaules
•	Stretching léger du tronc
•	Marche très courte en terrain plat (5 à 10 min), augmenter progressivement
",
                                'diabetes' => "Conseils : Les douleurs articulaires quotidiennes chez une personne en obésité sévère sont souvent liées à une surcharge mécanique des articulations (genoux, hanches, dos). Il est conseillé de privilégier des activités physiques à faible impact articulaire comme la natation, le vélo stationnaire, ou des exercices en position assise ou allongée. L'objectif est de rester actif sans aggraver les douleurs. Un suivi en kinésithérapie peut être bénéfique.
🍽️ Recommandation nutritionnelle: Intégrer des aliments anti-inflammatoires dans l’alimentation: gingembre frais (largement disponible au Bénin), curcuma, poisson riche en oméga-3 (sardine, maquereau) et légumes verts.
",
                                'hypertension' => "Conseils :
•	Consulter un rhumatologue ou un kinésithérapeute pour un bilan articulaire
•	L'obésité exerce une pression considérable sur les genoux, hanches et chevilles
•	Pratiquer uniquement des activités à faible impact articulaire : natation, marche douce en eau peu profonde, vélo stationnaire, yoga doux
•	Anti-inflammatoires uniquement sur prescription médicale (risque pour la tension et les reins)
•	La perte de poids de 5 à 10% réduit significativement les douleurs articulaires
•	Utiliser des chaussures avec semelles amortissantes
•	Appliquer des compresses chaudes le matin et des compresses froides après l'effort
",
                                'cholesterol' => "Les douleurs articulaires quotidiennes chez une personne souffrant d'obésité sévère sont le signe d'une surcharge mécanique chronique sur les articulations portantes (genoux, hanches, chevilles, colonne vertébrale lombaire). Chaque kilogramme de poids en excès représente 4 à 6 kg de pression supplémentaire sur les genoux. Ces douleurs créent un cercle vicieux : douleur → inactivité → prise de poids → douleur aggravée.
Recommandations :
•	Pratiquer des activités physiques non portantes qui ne sollicitent pas les articulations : natation, aquagym, vélo stationnaire, exercices en position assise ou allongée
•	Consulter un kinésithérapeute pour un programme de renforcement musculaire adapté
•	Perdre du poids progressivement soulage mécaniquement les articulations
•	Consulter un rhumatologue si les douleurs sont sévères (gonarhtrose, coxarthrose)
"
                            ]
                        ],
                        'Parfois' => [
                            'weight_loss' => [
                                'all' => [
                                    'none' => "Conseils :
•	Profiter des jours sans douleur pour être plus actif
•	Identifier les activités ou positions qui déclenchent les douleurs
•	Renforcer les muscles autour des articulations douloureuses
•	Maintenir une activité régulière même légère pour éviter la raideur
",
                                    'diabetes' => "Conseils : Profiter des jours sans douleur pour pratiquer une activité physique modérée. Éviter les activités qui déclenchent les douleurs. Surveiller les déclencheurs (position prolongée, température, surmenage).",
                                    'hypertension' => "Conseils :
•	Identifier les situations qui déclenchent les douleurs (longues marches, escaliers, station debout prolongée)
•	Renforcer les muscles autour des articulations pour mieux les protéger (exercices doux)
•	Éviter la sédentarité prolongée : se lever et marcher doucement toutes les heures
•	Surveiller l'évolution : si les douleurs deviennent quotidiennes, consulter un médecin
",
                                    'cholesterol' => "Des douleurs articulaires occasionnelles indiquent un début de surcharge articulaire. C'est le moment idéal pour intervenir avant que les lésions ne deviennent permanentes. Même programme d'activités douces et surveillance médicale.
Propositions d'activités adaptées au contexte béninois :
•	Marche douce le matin tôt (avant 8h) dans un parc ou quartier calme à Cotonou, en évitant la chaleur
•	Natation à la piscine municipale ou dans les structures hôtelières accessibles
•	Exercices de stretching et yoga doux à domicile
"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Avez-vous récemment fait un régime de perte du poids ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Aucun",
                                'diabetes' => "Aucun",
                                'hypertension' => "Aucun",
                                'cholesterol' => "Aucun"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils :
•	Il n'est jamais trop tard pour commencer
•	Commencer par des changements alimentaires simples et progressifs
•	Fixer un objectif de perte de poids réaliste : 0,5 à 1 kg par semaine maximum
•	Consulter un professionnel de santé avant tout régime en cas d'obésité sévère
",
                                    'diabetes' => "Conseil : Il n'est jamais trop tard pour commencer. Un plan progressif et réaliste, intégrant les habitudes alimentaires locales, est la clé. Commencer par de petits changements : réduire les portions, éliminer les boissons sucrées, marcher 20 minutes par jour.",
                                    'hypertension' => "Conseils :
•	Il n'est jamais trop tard pour commencer
•	Ne pas attendre un bon moment : commencer dès aujourd'hui par de petits changements (remplacer les boissons sucrées par de l'eau, réduire les portions de riz)
•	Se faire accompagner par un professionnel de santé pour ne pas se décourager
",
                                    'cholesterol' => "Le patient n'a pas encore entrepris de démarche active de perte de poids. C'est l'occasion de démarrer avec les bonnes bases : pas de régime sévère et restrictif, mais une approche progressive, durable et culturellement adaptée avec des aliments locaux béninois. La motivation doit être construite autour de la santé (réduire le risque cardiaque) plutôt que uniquement sur l'esthétique."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Si oui, combien de poids avez-vous perdu ?",
                'reponses' => [
                    null => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Cas 1 — Moins de 3 kg :
•	Résultat faible — réévaluer la méthode utilisée
•	Peut indiquer un régime trop restrictif entraînant une résistance métabolique
•	Un déficit calorique modéré (500 kcal/jour) est plus efficace sur le long terme qu'un régime draconien
Cas 2 — 3 à 10 kg :
•	Bon début mais à consolider
•	Maintenir les bonnes habitudes et éviter le effet yo-yo post-régime
•	Continuer avec un professionnel pour maintenir les résultats
Cas 3 — Plus de 10 kg :
•	Excellent résultat mais surveiller la perte de masse musculaire
•	S'assurer d'un apport suffisant en protéines pour préserver les muscles
•	Maintenir l'activité physique pour éviter la reprise
Cas 4 — Poids repris après le régime :
•	Syndrome yo-yo fréquent dans les régimes trop restrictifs
•	Adopter un changement de style de vie durable plutôt qu'un régime temporaire
•	Consulter un psychologue ou comportementaliste alimentaire
",
                                'diabetes' => "Exemple : Perte de 5 kg en 3 mois
Conseils : Félicitations pour l'effort fourni. Une perte de poids même modeste (5 à 10% du poids corporel) améliore significativement la glycémie, la pression artérielle et les douleurs articulaires. Il est important de ne pas reprendre les anciennes habitudes. Consolider les acquis en maintenant les bonnes pratiques alimentaires et en ajoutant progressivement l'activité physique.
Exemple : Perte < 2 kg Cela peut indiquer un régime inadapté, trop restrictif ou difficile à maintenir, ou une résistance métabolique. Revoir le plan avec un professionnel.
Exemple : Pas de perte de poids malgré les efforts Consulter un médecin endocrinologue pour écarter d'autres causes (thyroïde, syndrome de Cushing, résistance à l'insuline sévère, médicaments).
",
                                'hypertension' => "Cas A : Moins de 5 kg perdus
Conseils :
•	Tout début de perte de poids est un succès à encourager
•	Analyser pourquoi la perte s'est arrêtée : reprendre le suivi diététique
•	Éviter les régimes trop restrictifs qui mènent à l'effet yo-yo
•	Viser 0,5 à 1 kg par semaine : lent mais durable
Cas B : 5 à 10 kg perdus
Conseils :
•	Bonne progression : 5 à 10% de perte du poids corporel améliore déjà significativement la tension artérielle et la glycémie
•	Consolider les habitudes alimentaires acquises avant d'aller plus loin
•	Introduire progressivement l'activité physique pour entretenir cette perte
Cas C : Plus de 10 kg perdus
Conseils :
•	Excellente performance ! Maintenir les nouvelles habitudes alimentaires
•	Risque de carence nutritionnelle si le régime était très restrictif : faire un bilan sanguin
•	Continuer sous supervision médicale et diététique pour éviter l'effet rebond
",
                                'cholesterol' => "Exemple : Perte de 5 à 10 kg en 3 mois
Une perte de poids récente montre une motivation présente et une capacité à changer les habitudes. Cependant, il faut identifier les raisons de l'arrêt ou du ralentissement du régime pour éviter l'effet yo-yo (reprise de poids après arrêt du régime). La perte de poids chez les personnes souffrant d'obésité sévère doit être lente et progressive : 0,5 à 1 kg par semaine maximum pour préserver la masse musculaire et éviter les carences.
Exemple : Perte de plus de 10 kg
Une perte significative est encourageante mais doit être maintenue dans le temps. La phase de maintien est souvent la plus difficile. Un suivi régulier avec un professionnel de santé est indispensable pour consolider les acquis.
Recommandations contre l'effet yo-yo :
•	Ne pas faire de régimes drastiques mais modifier durablement le mode de vie
•	Maintenir l'activité physique même après avoir atteint l'objectif de poids
•	Continuer le suivi médical et nutritionnel après la perte de poids
"
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Combien de jours par semaine pratiquez-vous une activité physique ?",
                'reponses' => [
                    'Aucun' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	La sédentarité totale associée à l'obésité sévère est une urgence de santé publique
•	Commencer TRÈS progressivement : 5 à 10 minutes de marche lente par jour
•	Ne pas viser le sport intensif immédiatement — risque de blessure et abandon
•	Objectif premier mois : marcher 15 à 20 min, 3 fois par semaine
•	Toute activité compte : se lever pour aller chercher un verre d'eau, prendre les escaliers, jardiner
",
                                'diabetes' => "La sédentarité aggrave la résistance à l'insuline et favorise la prise de poids. L'objectif initial est de commencer par 10 minutes de marche par jour, puis d'augmenter progressivement. Même une activité légère comme les tâches ménagères ou les sorties à pied au marché comptent.",
                                'hypertension' => "Conseils :
•	Commencer par 10 minutes de marche douce par jour à son rythme
•	Augmenter de 5 minutes par semaine jusqu'à atteindre 30 minutes/jour, 5 jours/semaine
•	Ne pas se décourager : même 10 minutes par jour ont des bénéfices sur la tension artérielle
•	Choisir une activité plaisante pour maintenir la motivation
•	Éviter les exercices à fort impact (course à pied, sauts) au départ en cas de douleurs articulaires
",
                                'cholesterol' => "La sédentarité complète est l'un des facteurs de risque cardiovasculaire les plus importants, agissant en synergie avec l'obésité et l'hypercholestérolémie. L'objectif initial est d'introduire 10 minutes de marche par jour, puis d'augmenter progressivement. Ne jamais commencer par des efforts intenses. Consulter un médecin avant de débuter tout programme d'exercice."
                            ]
                        ],
                        '1j-3j' => [
                            'weight_loss' => [
                                'all' => [
                                    'none' => "Conseils :
•	Bon début — essayer d'atteindre 4 à 5 jours par semaine progressivement
•	Alterner les types d'activité (marche, étirements, exercices doux) pour éviter la monotonie
•	Choisir des activités plaisantes pour maintenir la motivation
",
                                    'diabetes' => "Bon début. Objectif à atteindre : 150 minutes d'activité modérée par semaine (marche rapide, vélo, natation). Augmenter d'un jour supplémentaire toutes les 2 semaines.",
                                    'hypertension' => "Conseils :
•	Bon début ! Augmenter progressivement jusqu'à 4 à 5 jours par semaine
•	Combiner endurance légère (marche, vélo) et renforcement musculaire doux
•	Varier les activités pour éviter la monotonie et maintenir la motivation
•	S'assurer de bien récupérer entre les séances (hydratation, sommeil)
",
                                    'cholesterol' => "Une activité physique 1 à 3 jours par semaine est un bon début mais insuffisant pour avoir un impact significatif sur le cholestérol et le poids. L'objectif est d'atteindre progressivement 5 jours par semaine avec au minimum 30 minutes d'activité modérée par séance."
                                ]
                            ],
                            '4j-6j' => [
                                'weight_loss' => [
                                    'all' => [
                                        'none' => "Conseils :
•	Très bien ! Maintenir et varier les activités
•	S'assurer de bien récupérer (sommeil, hydratation)
•	Surveiller les douleurs articulaires — ajuster si nécessaire
",
                                        'diabetes' => "Excellent niveau d'activité. Varier les exercices pour maintenir la motivation (marche, étirements, exercices de renforcement musculaire léger).",
                                        'hypertension' => "Conseils :
•	Très bien ! Maintenir cette régularité
•	Veiller à inclure 1 jour de repos complet pour la récupération musculaire
•	Diversifier : marche le matin, étirements le soir, renforcement musculaire 2x/semaine
",
                                        'cholesterol' => "Une fréquence de 4 à 6 jours par semaine est excellente pour la santé cardiovasculaire et la gestion du poids. Il faut maintenir cette fréquence et varier les activités pour éviter la monotonie et l'abandon. Le type d'exercice doit être adapté à la tolérance articulaire et cardiaque."
                                    ]
                                ],
                                '7j' => [
                                    'weight_loss' => [
                                        'all' => [
                                            'none' => "Conseils :
•	Attention au surentraînement en cas d'obésité sévère
•	Intégrer au moins 1 jour de récupération active (étirements, marche très légère)
•	Consulter un médecin du sport pour valider l'intensité
",
                                            'diabetes' => "Bien, mais prévoir au moins 1 jour de récupération active (étirements légers, yoga, marche lente) pour éviter le surentraînement et les blessures.",
                                            'hypertension' => "Conseils :
•	Attention au surentraînement, surtout en cas d'obésité sévère et d'hypertension
•	Prévoir au moins 1 jour de récupération active (marche très douce, étirements) par semaine
•	Surveiller la tension artérielle avant et après l'effort
•	Rester à l'écoute de son corps : fatigue excessive = signe de repos nécessaire
",
                                            'cholesterol' => "Pratiquer une activité physique tous les jours est possible à condition que les séances ne soient pas trop intenses. Il est recommandé d'alterner les jours intenses et les jours de récupération active (marche douce, stretching) pour éviter le surmenage et les blessures qui sont fréquentes dans ce contexte."
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Combien de temps passez-vous en position assise chaque jour ?",
                'reponses' => [
                    'Moins de 4h' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils : Mode de vie actif — excellent. Maintenir cette habitude et ajouter des exercices structurés.",
                                'diabetes' => "Très bien, continuer à rester actif.",
                                'hypertension' => "Bonne habitude ! Maintenir ce mode de vie actif. Se lever toutes les 45-60 minutes reste recommandé.",
                                'cholesterol' => "Un temps d'assise inférieur à 4 heures indique un mode de vie relativement actif au quotidien. C'est un avantage à maintenir. Il faut continuer à intégrer des mouvements dans les activités quotidiennes (marcher pour faire les courses, utiliser les escaliers, faire les tâches ménagères debout)."
                            ]
                        ],
                        '4h-6h' => [
                            'weight_loss' => [
                                'all' => [
                                    'none' => "Conseils :
•	Niveau acceptable mais à améliorer
•	Se lever et marcher 5 minutes toutes les heures
•	Utiliser les pauses pour s'étirer
",
                                    'diabetes' => "Acceptable. Se lever et marcher 5 minutes toutes les heures pour activer la circulation et le métabolisme.",
                                    'hypertension' => "Niveau modéré. Programmer des pauses actives de 5 minutes toutes les heures : marcher, s'étirer, monter des escaliers",
                                    'cholesterol' => "Un temps d'assise de 4 à 6 heures est modéré. Il faut s'imposer des pauses actives de 5 minutes toutes les heures (se lever, marcher, faire quelques étirements) pour activer la circulation sanguine et le métabolisme."
                                ]
                            ],
                            '6h-8h' => [
                                'weight_loss' => [
                                    'all' => [
                                        'none' => "Conseils :
•	Temps de sédentarité important — augmenter les interruptions actives
•	Utiliser un rappel sur téléphone pour se lever toutes les 45 minutes
•	Faire des réunions en marchant si possible
•	Bureaux debout si disponibles
",
                                        'diabetes' => "Attention, sédentarité modérée à élevée. Pauses actives obligatoires toutes les 45 minutes. Envisager un bureau debout si possible.",
                                        'hypertension' => "Sédentarité importante. Réduire progressivement avec des alarmes de rappel de mouvement. Utiliser un bureau debout si possible. La sédentarité aggrave la tension artérielle et la glycémie.",
                                        'cholesterol' => "Un temps d'assise de 6 à 8 heures est élevé et représente un facteur de risque indépendant de maladie cardiovasculaire même chez les personnes qui font de l'exercice. Il faut impérativement fractionner ce temps par des pauses actives régulières et envisager de travailler debout par intermittence si possible."
                                    ]
                                ],
                                'Plus de 8h' => [
                                    'weight_loss' => [
                                        'all' => [
                                            'none' => "Conseils :
•	Sédentarité sévère — risque cardiovasculaire et métabolique élevé
•	La position assise prolongée est indépendamment associée au risque de diabète et de maladies cardiaques
•	Objectif prioritaire : réduire à moins de 6h de position assise continue
•	Marcher minimum 10 minutes après chaque repas
",
                                            'diabetes' => "Sédentarité sévère, facteur aggravant majeur pour le diabète. Insérer obligatoirement des micro-activités dans la journée : marche au téléphone, réunions en marchant, étirements réguliers.",
                                            'hypertension' => "Sédentarité sévère — facteur de risque majeur indépendant de l'obésité. Chaque heure assise supplémentaire augmente le risque cardiovasculaire. Commencer à instaurer des pauses obligatoires de 5 minutes toutes les 30 minutes. Marcher pendant les appels téléphoniques. Faire des exercices assis (flexions des pieds, contraction des mollets).",
                                            'cholesterol' => "Un temps d'assise supérieur à 8 heures par jour est extrêmement préoccupant. C'est le profil typique des travailleurs de bureau ou des personnes qui regardent longuement la télévision. La sédentarité prolongée aggrave considérablement le risque cardiovasculaire et métabolique. Des mesures urgentes doivent être prises : lever toutes les 45 minutes, marcher pendant les appels téléphoniques, faire des exercices assis (contractions musculaires, rotations des chevilles), et programmer obligatoirement 30 minutes d'activité physique quotidienne."
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Quelles activités physiques appréciez-vous ?",
                'reponses' => [
                    'Marche' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "•	Activité idéale pour l'obésité sévère — faible impact, accessible, gratuite
•	Commencer par 15 min/jour, augmenter de 5 min chaque semaine
•	Marcher tôt le matin au Bénin pour éviter la chaleur
",
                                'diabetes' => "Activité idéale pour l'obésité sévère : faible impact articulaire, accessible partout, gratuite. Objectif : 30 minutes par jour à pas modérés. Peut se faire en allant au marché, en accompagnant les enfants à l'école, etc.",
                                'hypertension' => "•	Activité idéale pour l'obésité sévère avec hypertension : zéro coût, faible impact
•	Marcher le matin tôt (avant 9h) pour éviter la chaleur au Bénin
•	Objectif progressif : 3 000 pas → 5 000 pas → 8 000 pas par jour
•	Porter des chaussures de marche confortables avec bon soutien de la voûte plantaire
",
                                'cholesterol' => "La marche est l'activité la plus accessible, la moins coûteuse et la plus adaptée aux personnes souffrant d'obésité sévère et de problèmes articulaires. Elle permet de brûler des calories, d'améliorer le profil lipidique et de réduire le risque cardiovasculaire. Au Bénin, la marche le matin avant la chaleur (6h-8h) ou en soirée (18h-19h30) dans les zones ombragées est recommandée.
Objectif progressif : 10 minutes/jour la semaine 1 → 20 minutes/jour la semaine 2 → 30 minutes/jour la semaine 3 → 45 minutes/jour à partir de la semaine 4.
"
                            ]
                        ],
                        'Yoga' => [
                            'weight_loss' => [
                                'all' => [
                                    'none' => "•	Excellent pour la flexibilité, la gestion du stress et la conscience corporelle
•	Commencer par le yoga doux ou restauratif
•	Des vidéos gratuites sont disponibles pour pratiquer à la maison
",
                                    'diabetes' => "Excellent pour la flexibilité, la gestion du stress et la conscience corporelle. Des exercices de yoga adapté (chaise, allongé) sont accessibles même avec des limitations de mobilité.",
                                    'hypertension' => "•	Excellent pour la gestion du stress (facteur d'hypertension)
•	Améliore la flexibilité et la mobilité articulaire
•	Pratiquer le yoga doux ou le yoga restauratif en priorité
•	Des postures debout prolongées peuvent être difficiles au début : adapter avec des postures au sol et assises
",
                                    'cholesterol' => "Le yoga doux ou la hatha yoga est excellent pour les personnes souffrant d'obésité sévère car il améliore la flexibilité, réduit le stress (facteur aggravant du cholestérol via le cortisol), favorise la conscience corporelle et améliore la qualité du sommeil. Des séances de yoga peuvent être pratiquées à domicile avec des vidéos de yoga pour débutants."
                                ]
                            ],
                            'Autre' => [
                                'weight_loss' => [
                                    'all' => [
                                        'none' => "Natation :
•	Idéale car sans impact sur les articulations
•	Très efficace pour l'obésité sévère avec douleurs articulaires
•	Chercher les piscines publiques disponibles à Cotonou
Autre activité choisie :
•	Vélo : excellent, sans impact, brûle beaucoup de calories
•	Danse : activité culturelle au Bénin, motivante et sociale
•	Agriculture / jardinage : activité physique bénéfique et utile
",
                                        'diabetes' => "Natation / activités aquatiques : Idéal pour les personnes avec douleurs articulaires car l'eau soutient le poids du corps.
Autre (jardinage, danse traditionnelle, vélo) : Toute activité qui bouge le corps et procure du plaisir est bénéfique. La danse traditionnelle béninoise est une activité cardio excellente et culturellement valorisante.
",
                                        'hypertension' => "Natation / activités aquatiques :
•	Idéal : l'eau soulage les articulations tout en permettant un effort cardiovasculaire
•	Si accès à une piscine à Cotonou ou à la mer, nager 20 à 30 minutes 3 fois/semaine
•	Recommandée en cas de douleurs articulaires importantes
🚴 Vélo stationnaire :
•	Faible impact articulaire, contrôle facile de l'intensité
•	Commencer par 15 minutes à intensité légère, augmenter progressivement
Autre (ex : danse, travaux ménagers, jardinage) :
•	Tout mouvement compte ! La danse traditionnelle béninoise est une excellente activité cardiovasculaire
•	Le jardinage : 30 minutes de jardinage = 150 kcal dépensés
",
                                        'cholesterol' => "Cas — Natation ou aquagym
La natation est l'activité idéale pour les personnes obèses avec douleurs articulaires car la flottabilité de l'eau réduit considérablement la charge sur les articulations tout en permettant un exercice cardio-vasculaire intense. Elle améliore significativement le profil lipidique.
Cas — Autres activités (vélo, danse, jardinage)
Toute activité physique qui plaît et peut être maintenue dans le temps est bonne à prendre. La danse locale béninoise (danses traditionnelles Fon, Yoruba) peut constituer une excellente activité cardio-vasculaire culturellement intégrée et agréable.
"
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Connaissez-vous votre fréquence cardiaque au repos ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Aucun",
                                'diabetes' => "Aucun",
                                'hypertension' => "Aucun",
                                'cholesterol' => "Aucun"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils :
•	Apprendre à mesurer sa fréquence cardiaque au repos (pouls sur 60 secondes le matin au réveil)
•	Ou utiliser un tensiomètre automatique qui affiche aussi le pouls
•	Cette mesure est importante avant de commencer tout programme d'exercice
",
                                'diabetes' => "Conseil : Mesurer sa FC au repos est simple : poser 2 doigts sur le poignet ou le cou au matin au réveil, compter les battements pendant 30 secondes et multiplier par 2. La normale est entre 60 et 80 bpm. Une valeur > 90 bpm doit être signalée au médecin.",
                                'hypertension' => "Conseils :
•	Apprendre à mesurer sa fréquence cardiaque au repos : poser 2 doigts sur le poignet (artère radiale) ou le cou (artère carotide), compter les battements pendant 60 secondes, le matin au réveil avant de se lever
•	Ou utiliser un tensiomètre électronique qui affiche aussi la FC
•	La FC au repos est un indicateur précieux de la santé cardiovasculaire et permet d'adapter l'intensité de l'exercice
",
                                'cholesterol' => "Il est recommandé de mesurer sa fréquence cardiaque de repos régulièrement (chaque matin avant de se lever) avec un appareil de mesure simple (tensiomètre électronique qui mesure aussi le pouls, ou simple comptage manuel sur 60 secondes). Cette donnée est précieuse pour le médecin et le diététicien dans le suivi de la santé cardiovasculaire."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Si oui, veuillez- nous la donner ?",
                'reponses' => [
                    null => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Si la fréquence cardiaque au repos est donnée :
•	Normale (60–100 bpm) : bien, maintenir l'activité physique
•	Élevée (> 100 bpm = tachycardie) : consulter un cardiologue avant tout effort physique intense
•	Basse (< 60 bpm chez un non-sportif) : consulter un médecin
Calcul de la zone cible d'entraînement :
•	Zone d'effort modéré (idéale obésité) = 50 à 70% de la FC maximale
•	Déterminant la fréquence cardiaque maximale (FCmax) : Formule de Tanaka (plus précise pour certains adultes) : FCmax ≈ 208 − 0,7 × âge.
",
                                'diabetes' => "•	FC au repos = 90 bpm
Conseil : Une fréquence cardiaque au repos élevée (> 80 bpm) chez une personne en obésité sévère signale un cœur qui travaille trop. L'activité physique régulière et la perte de poids la feront baisser progressivement. Lors de l'exercice, ne pas dépasser 60 à 70% de la FC maximale théorique. Un suivi cardiologique est recommandé.
•	FC au repos normale = 60–75 bpm
Conseil : Bonne condition cardiovasculaire relative. Maintenir et améliorer par l'exercice régulier.
•	Déterminant la fréquence cardiaque maximale (FCmax) : Formule de Tanaka (plus précise pour certains adultes) : FCmax ≈ 208 − 0,7 × âge.
",
                                'hypertension' => "Cas A : FC repos < 60 bpm
•	Bonne condition cardiovasculaire de base → continuer l'activité physique
•	Vérifier qu'il ne s'agit pas d'une bradycardie médicamenteuse (bêtabloquants)
Cas B : FC repos 60 – 80 bpm (normale)
•	Fréquence normale — bonne base de départ
•	Surveiller régulièrement : avec la perte de poids et l'activité physique, elle devrait diminué progressivement
Cas C : FC repos > 80 bpm
•	Fréquence élevée associée à l'obésité, au stress ou à une mauvaise condition physique
•	Consulter le médecin : une FC > 100 bpm au repos (tachycardie) nécessite un bilan cardiaque
•	L'activité physique régulière et la perte de poids permettront de la faire baisser
•	Déterminant la fréquence cardiaque maximale (FCmax) : Formule de Tanaka (plus précise pour certains adultes) : FCmax ≈ 208 − 0,7 × âge.
",
                                'cholesterol' => "•	Fréquence cardiaque au repos de 85-95 battements/minute
Une fréquence cardiaque de repos élevée (supérieure à 80 bpm) chez une personne souffrant d'obésité sévère est un signal d'alarme cardiovasculaire. Elle indique que le cœur travaille en permanence à un niveau d'effort élevé. Un programme d'activité physique progressive et régulière, combiné à la perte de poids, réduira progressivement cette fréquence cardiaque. Une fréquence cardiaque de repos normale se situe entre 60 et 80 bpm chez un adulte en bonne santé.
Recommandation : Surveiller la fréquence cardiaque à l'effort lors des séances d'exercice. La zone d'effort modéré recommandée se calcule ainsi : (220 - âge) × 50% à 70%.
•	Fréquence cardiaque au repos de 60-70 bpm
Une fréquence cardiaque de repos dans la plage normale est rassurante malgré l'obésité, et indique une capacité cardiaque encore préservée. C'est une fenêtre favorable pour débuter l'activité physique.
•	Déterminant la fréquence cardiaque maximale (FCmax) : Formule de Tanaka (plus précise pour certains adultes) : FCmax ≈ 208 − 0,7 × âge.
"
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Comment décririez-vous votre ressenti personnel par rapport à votre poids ?",
                'reponses' => [
                    null => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Voici les ressentis les plus fréquents et les recommandations associées :
Honte / mal-être / complexes :
•	Consulter un psychologue ou thérapeute spécialisé en troubles du comportement alimentaire
•	Pratiquer la bienveillance envers soi-même (self-compassion)
•	Rejoindre un groupe de soutien pour les personnes en surpoids
•	Se rappeler que l'obésité est une maladie, pas un manque de volonté
Découragement / sentiment d'échec :
•	Célébrer les petites victoires (boire plus d'eau, résister à un craquage)
•	Fixer des objectifs très petits et atteignables à court terme
•	Travailler avec un professionnel de santé qui adopte une approche bienveillante sans jugement
Acceptation / sérénité :
•	Très bonne base pour entreprendre des changements
•	Canaliser cette sérénité vers la motivation au changement progressif
Résignation / fatalisme :
•	Travailler avec un psychologue pour sortir de cet état d'esprit
•	Éducation thérapeutique sur les possibilités réelles de prise en charge
",
                                'diabetes' => "Honte / culpabilité : Ces émotions sont compréhensibles mais contre-productives. L'obésité est une maladie complexe influencée par des facteurs génétiques, hormonaux, environnementaux et psychologiques. Ce n'est pas une question de manque de volonté. Un accompagnement psychologique ou un groupe de soutien peut aider à dépasser ces émotions négatives.
Découragement / résignation : La progression peut être lente, mais chaque kilo perdu, chaque journée d'alimentation équilibrée est une victoire. Fixer des objectifs réalistes à court terme (ex : marcher 15 minutes demain matin).
Motivation / détermination : Excellent état d'esprit ! Canaliser cette énergie dans un plan structuré et progressif. Éviter les régimes drastiques qui mènent au découragement.
Acceptation / neutralité : L'acceptation de soi est une bonne base. L'objectif n'est pas d'atteindre un idéal esthétique mais de retrouver une meilleure santé et qualité de vie.
",
                                'hypertension' => "Réponses possibles et conseils adaptés :
Je me sens honteux(se) / mal dans ma peau → La honte est une émotion destructrice qui peut mener à la dépression et aux comportements alimentaires compensatoires. Consulter un psychologue ou un thérapeute spécialisé en image corporelle. Rejoindre un groupe de soutien pour personnes obèses. Pratiquer la bienveillance envers soi-même : l'obésité est une maladie, pas un manque de volonté.
Je suis découragé(e), j'ai déjà essayé sans succès → L'échec des tentatives passées est fréquent et ne préjuge pas de l'avenir. Adopter une approche différente : accompagnement pluridisciplinaire (médecin + diététicien + psychologue). Se fixer des objectifs réalistes et à court terme (perdre 1 kg ce mois-ci, marcher 10 minutes par jour).
Je suis prêt(e) et motivé(e) à changer → Excellente disposition ! Profiter de cette motivation pour mettre en place immédiatement des changements durables. Structurer un plan d'action avec des professionnels de santé dès cette semaine.
Je m'accepte tel(le) que je suis → L'acceptation de soi est positive pour la santé mentale. Cependant, l'obésité sévère avec hypertension représente un danger médical réel qui nécessite une prise en charge, indépendamment de l'image corporelle. L'objectif n'est pas la perfection esthétique mais la santé et la qualité de vie.
",
                                'cholesterol' => "Cas A — Honte, gêne et baisse de l'estime de soi
Je me sens honteux(se) de mon corps, je n'ose plus sortir ni porter certains vêtements. Je me sens jugé(e) en permanence par les autres.
Ce ressenti est extrêmement fréquent et compréhensible. La stigmatisation de l'obésité est réelle dans la société. Ces émotions négatives peuvent paradoxalement aggraver les comportements alimentaires compulsifs (manger pour se consoler) et créer un cercle vicieux. Une prise en charge psychologique ou un accompagnement par un psychologue spécialisé en comportement alimentaire est fortement recommandée en parallèle de la prise en charge médicale et nutritionnelle.
Recommandation : La bienveillance envers soi-même (auto-compassion) est une compétence thérapeutique aussi importante que le régime alimentaire. Rejoindre un groupe de soutien pour personnes obèses peut aider à se sentir moins seul(e) dans cette lutte.
Cas B — Résignation et découragement
J'ai essayé tellement de régimes sans succès durable que j'ai l'impression que c'est impossible pour moi. Je me sens découragé(e).
Ce sentiment de découragement est compréhensible après de multiples tentatives échouées. Il est important de rappeler que les régimes restrictifs sont biologiquement voués à l'échec à long terme. Le succès durable vient d'un changement de mode de vie progressif et non d'un régime temporaire. Chaque petite amélioration compte et contribue à la santé même si la perte de poids est lente.
Cas C — Motivation et détermination
Je suis déterminé(e) à changer les choses pour ma santé et pour ma famille. Je suis prêt(e) à faire les efforts nécessaires.
Cette attitude est un facteur prédictif de succès majeur. Elle doit être canalisée et soutenue par un accompagnement professionnel pour éviter les erreurs courantes (régimes trop stricts, découragement lors des plateaux de poids).
"
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Mangez-vous often par stress ou ennui ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	L'alimentation émotionnelle est l'un des principaux obstacles à la perte de poids
•	Identifier les déclencheurs émotionnels qui précèdent les crises alimentaires (tenir un journal émotionnel)
•	Développer des stratégies alternatives face aux émotions : marche, respiration profonde, appel d'un ami
•	Consulter un psychologue spécialisé en thérapie cognitivo-comportementale (TCC)
•	Pratiquer la pleine conscience alimentaire (manger lentement, sans distraction)
•	Supprimer les aliments très caloriques à la maison pour limiter les crises
🥜 Collations « stratégiques » pour les moments de stress :
•	Arachides grillées non salées (petite poignée — effet croquant qui libère la tension)
•	Noix de cajou nature
•	Infusion chaude de gingembre-citronelle (effet calmant)
•	Morceau de coco frais (mâcher lentement)
•	Eau de coco fraîche
",
                                'diabetes' => "Conseils : Manger sous l'effet des émotions (alimentation émotionnelle) est un comportement très fréquent chez les personnes en surpoids. Pour y remédier : tenir un journal alimentaire en notant les émotions associées aux prises alimentaires, identifier les déclencheurs de stress, trouver des activités alternatives pour gérer les émotions (promenade, discussion avec un proche, respiration profonde). Une thérapie comportementale et cognitive (TCC) peut être très efficace.
🍽️ En cas de fringale émotionnelle, proposer une collation légère :
•	Un fruit frais (goyave, mangue verte, papaye)
•	Une infusion de citronnelle ou gingembre sans sucre
•	Quelques cacahuètes non salées
",
                                'hypertension' => "Conseils :
•	Identifier les situations déclenchantes (travail stressant, solitude, conflit familial)
•	Tenir un journal émotionnel + alimentaire : noter les émotions au moment où l'envie de manger apparaît
•	Mettre en place des alternatives au manger émotionnel : appeler un ami, marcher 10 minutes, pratiquer la respiration profonde, écouter de la musique
•	Consulter un psychologue spécialisé en thérapie cognitivo-comportementale (TCC) pour travailler sur les émotions
•	Ne pas avoir de nourriture tentante en libre accès à la maison
•	Différencier la faim physique (progressive, dans le ventre) de la faim émotionnelle (soudaine, dans la tête)
",
                                'cholesterol' => "L'alimentation émotionnelle est l'un des mécanismes psychologiques les plus fréquents dans l'obésité. La nourriture est utilisée inconsciemment comme régulateur émotionnel pour gérer le stress, l'ennui, la tristesse ou l'anxiété. Ce mécanisme favorise la prise de poids car les aliments choisis dans ces moments sont systématiquement riches en calories (sucreries, fritures, aliments ultra-transformés).
Recommandations :
•	Tenir un journal alimentaire et émotionnel pour identifier les déclencheurs émotionnels des prises alimentaires
•	Développer des alternatives non alimentaires à la gestion du stress : marche, respiration profonde, appels à des proches, activités créatives
•	Consulter un psychologue ou un thérapeute comportemental spécialisé en troubles alimentaires
•	Pratiquer la pleine conscience (mindfulness) alimentaire : manger lentement, sans écran, en appréciant chaque bouchée
"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils :
•	Bonne maîtrise émotionnelle — maintenir cette stabilité
•	Rester vigilant lors des périodes de stress intense (pertes d'emploi, deuil, conflits)
",
                                'diabetes' => "Conseil : Rester vigilant car le stress chronique (lié aux difficultés de santé) peut à terme induire une alimentation émotionnelle. Continuer à surveiller les signaux de faim physique versus émotionnelle.",
                                'hypertension' => "Conseils :
•	Très bien ! Maintenir cette conscience de ses comportements alimentaires
•	Rester vigilant lors de périodes de stress exceptionnel (deuil, problèmes professionnels) qui peuvent déclencher ce comportement
",
                                'cholesterol' => "L'absence d'alimentation émotionnelle est un avantage psychologique important. Cela signifie que les prises alimentaires sont principalement motivées par la faim physiologique et non par les émotions, ce qui facilite grandement la mise en place d'un plan nutritionnel structuré."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Avez-vous tendance à finir votre assiette même si vous n'avez plus faim ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	Ce comportement est souvent conditionné dès l'enfance (finis ton assiette !)
•	Apprendre à reconnaître et respecter les signaux de satiété du corps
•	Utiliser des assiettes plus petites — illusion d'optique qui diminue les portions visuellement
•	Servir moins dès le départ plutôt que de résister à finir
•	Manger lentement et poser les couverts entre chaque bouchée
•	Attendre 15 à 20 minutes avant de prendre un deuxième service
",
                                'diabetes' => "Conseils : Ce comportement, souvent ancré dans l'éducation (ne pas gaspiller), est une cause fréquente de suralimentation. Stratégies : utiliser des assiettes plus petites, servir de plus petites portions au départ, manger lentement (poser la fourchette entre chaque bouchée), s'accorder l'autorisation de ne pas finir son assiette. Il faut 15 à 20 minutes après le début du repas pour que le signal de satiété parvienne au cerveau.",
                                'hypertension' => "Conseils :
•	Ce comportement très fréquent est souvent lié à l'éducation (ne gaspille pas) et à la culture
•	Utiliser des assiettes plus petites pour diminuer les portions servies dès le départ
•	Manger lentement et poser ses couverts entre chaque bouchée
•	S'arrêter lorsque l'on ressent une satiété à 80% (légère sensation de remplissage, pas de lourdeur)
•	Servir des portions raisonnables dès le début plutôt que de se resservir
•	Comprendre que jeter un peu de nourriture est préférable à surcharger son organisme
•	La sensation de satiété arrive 20 minutes après le début du repas : manger lentement permet de la percevoir avant d'avoir trop mangé
",
                                'cholesterol' => "Ce comportement, très courant, est souvent lié à des conditionnements culturels (il ne faut pas gaspiller, finir son assiette est une marque de respect) ou familiaux acquis depuis l'enfance. Il entraîne une consommation systématiquement excessive de calories au-delà des besoins réels du corps.
Recommandations pratiques :
•	Servir des petites portions dès le départ dans une petite assiette (illusion d'un repas complet)
•	Manger très lentement et poser les couverts entre chaque bouchée pour laisser le temps au signal de satiété d'atteindre le cerveau (20 minutes minimum pour un repas)
•	Accepter culturellement et psychologiquement qu'il est positif de laisser de la nourriture dans son assiette
•	Boire un grand verre d'eau avant chaque repas pour réduire naturellement l'appétit
"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils :
•	Excellente écoute des signaux de faim/satiété — capitaliser sur cette aptitude
•	Continuer à manger en pleine conscience
",
                                'diabetes' => "Conseil : Vous êtes à l'écoute des signaux de satiété de votre corps, c'est une excellente habitude à maintenir.",
                                'hypertension' => "Conseils :
•	Bonne conscience des signaux de satiété — à maintenir
•	Continuer à écouter les signaux internes de faim et de satiété plutôt que de manger par habitude ou par horaire
",
                                'cholesterol' => "Une bonne écoute des signaux de satiété est une compétence précieuse dans la gestion du poids. Elle doit être valorisée et renforcée."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Avez-vous des habitudes alimentaires liées à des émotions, comme le stress ou la dépression ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils et recommandations :
•	La dépression et le stress chronique sont étroitement liés à l'obésité dans un cercle vicieux
•	Traiter la dépression ou le stress chronique en parallèle du plan alimentaire
•	La thérapie cognitivo-comportementale (TCC) est très efficace pour ces situations
•	L'exercice physique régulier est un antidépresseur naturel puissant
•	Intégrer des rituels alimentaires positifs et plaisants (cuisiner en famille, découvrir de nouvelles recettes saines)
",
                                'diabetes' => "Conseils : La dépression et le stress chronique sont fortement associés à l'obésité (relation bidirectionnelle). Un suivi psychologique est vivement recommandé. Des techniques de pleine conscience (mindful eating) peuvent aider à reconnecter avec les signaux réels de faim et de satiété. Ne pas hésiter à en parler à un médecin qui peut orienter vers un professionnel de santé mentale.",
                                'hypertension' => "Conseils :
•	La dépression et l'anxiété sont très fréquentes dans l'obésité sévère (relation bidirectionnelle)
•	Consulter un psychiatre ou un psychologue : le traitement de la dépression améliore les comportements alimentaires
•	Certains antidépresseurs favorisent la prise de poids : en discuter avec le médecin pour choisir une molécule neutre sur le poids
•	Pratiquer des activités de plaisir non alimentaires : musique, artisanat, jardinage, sorties sociales
•	La méditation de pleine conscience (mindfulness) est scientifiquement validée pour réduire l'alimentation émotionnelle
🍽️ Collations à proposer en cas d'envie émotionnelle de manger :
En cas d'envie de sucré	En cas d'envie de croquant	En cas d'envie de chaud et réconfortant
1 tranche de papaye fraîche	Quelques noix de cajou non salées	Tisane de gingembre et citron
1 petite banane plantain mûre bouillie	Graines de courge grillées (non salées)	Soupe légère de légumes béninois
1 orange fraîche	Crudités de concombre local	Bouillie de maïs légère non sucrée
",
                                'cholesterol' => "Le stress chronique et la dépression sont étroitement liés à l'obésité dans une relation bidirectionnelle : l'obésité génère du stress et de la dépression, et le stress aggrave l'obésité. Le cortisol, hormone du stress, favorise le stockage des graisses abdominales et stimule l'appétit pour les aliments sucrés et gras.
Recommandations :
•	Traiter la dépression si présente avec un suivi psychiatrique ou psychologique professionnel
•	Intégrer des techniques de gestion du stress dans le quotidien (méditation, prière, activités communautaires)
•	Ne pas culpabiliser pour les écarts alimentaires liés au stress mais analyser et comprendre les déclencheurs
•	Créer un environnement alimentaire sain à la maison (ne pas stocker d'aliments tentants et peu sains)
"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils :
•	Maintenir un état émotionnel stable — facteur de protection important contre la prise de poids
•	Surveiller les changements d'humeur prolongés car ils peuvent modifier les comportements alimentaires
",
                                'diabetes' => "Conseil : Même sans lien émotionnel identifié, rester attentif à son bien-être mental. Les difficultés liées à l'obésité (regard social, limitations physiques) peuvent générer progressivement un mal-être psychologique.",
                                'hypertension' => "Conseils :
•	Maintenir cette santé émotionnelle en prenant soin de son bien-être global
•	Continuer à pratiquer des activités relaxantes (promenade, musique, moments en famille)
•	La gestion du stress est un pilier de la lutte contre l'hypertension artérielle
",
                                'cholesterol' => "L'absence d'alimentation liée aux émotions facilite une prise en charge nutritionnelle plus linéaire. La stabilité émotionnelle est un atout majeur pour le succès à long terme du programme de perte de poids."
                            ]
                        ]
                    ]
                ]
            ],
            [
                'maladie_id' => 2,
                'question' => "Avez-vous déjà suivi un programme ou tenté de perdre du poids auparavant ?",
                'reponses' => [
                    'Oui' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils selon les résultats :
Programme suivi avec succès puis rechute :
•	Analyser ce qui a fonctionné et reproduire ces conditions
•	Identifier précisément ce qui a causé la rechute
•	Mettre en place un système de prévention des rechutes (entourage de soutien, suivi régulier)
Programme abandonné sans résultat :
•	Ne pas s'en vouloir — les échecs passés font partie du chemin vers le succès
•	Cette fois-ci, privilégier un changement de style de vie durable plutôt qu'un régime
•	S'entourer de professionnels de santé pour un soutien structuré
•	Impliquer la famille et l'entourage dans la démarche
",
                                'diabetes' => "Conseils : Les expériences passées, même si elles n'ont pas abouti aux résultats escomptés, sont riches d'enseignements. Analyser ce qui a fonctionné et ce qui a échoué pour construire un nouveau plan plus adapté et durable. Les raisons d'échec les plus fréquentes sont : régime trop restrictif, manque de soutien, absence de gestion du stress, objectifs irréalistes.",
                                'hypertension' => "Conseils :
•	Analyser pourquoi les tentatives précédentes ont échoué : régime trop strict ? Manque de soutien ? Absence d'activité physique ? Problèmes émotionnels non traités ?
•	Cette fois, adopter une approche globale et pluridisciplinaire : 
o	Médicale : suivi par un médecin pour la tension et le diabète
o	Nutritionnelle : plan alimentaire personnalisé avec un diététicien
o	Psychologique : soutien psychologique si alimentation émotionnelle
o	Physique : programme d'activité physique adapté avec un kinésithérapeute ou coach sportif
•	Ne pas viser la perfection mais la progression : chaque kilogramme perdu compte
•	Célébrer les petits succès sans se punir pour les écarts
",
                                'cholesterol' => "Les tentatives répétées de perte de poids sans succès durable (effet yo-yo) sont extrêmement fréquentes et ne sont pas un signe de manque de volonté mais le résultat d'approches inadaptées (régimes trop sévères, durée limitée, absence d'accompagnement, non prise en compte des facteurs psychologiques et culturels).
Recommandations pour éviter le même schéma :
•	Adopter une approche de changement de mode de vie à vie plutôt qu'un régime temporaire
•	Fixer des objectifs réalistes et mesurables à court terme (perdre 5% du poids initial en 3 mois par exemple)
•	Bénéficier d'un suivi multidisciplinaire (médecin, diététicien, psychologue, kinésithérapeute)
•	Célébrer chaque petite victoire (amélioration du bilan lipidique, de la tension artérielle, de la mobilité) et pas uniquement la perte de poids sur la balance
"
                            ]
                        ],
                    ],
                    'Non' => [
                        'weight_loss' => [
                            'all' => [
                                'none' => "Conseils :
•	Première démarche : consulter un médecin généraliste pour un bilan complet
•	Ensuite, consulter un diététicien ou nutritionniste
•	Fixer des objectifs réalistes et progressifs
",
                                'diabetes' => "Conseil : C'est le bon moment pour commencer. Un premier pas simple : remplacer une boisson sucrée par de l'eau chaque jour cette semaine. Puis progressivement en  intégrant d'autres changements. Chaque petit pas compte.",
                                'hypertension' => "Conseils :
•	C'est le moment de commencer, avec les bons outils et le bon accompagnement
•	Ne pas attendre le bon moment : commencer par un seul changement aujourd'hui
•	Consulter un médecin pour un bilan de santé complet avant de débuter tout programme
•	S'entourer de personnes positives et encourageantes dans son entourage familial et social
",
                                'cholesterol' => "C'est une opportunité de démarrer correctement du premier coup avec les bonnes bases. Il est crucial de ne pas commencer par un régime draconien qui serait voué à l'échec. Une approche progressive, réaliste et accompagnée est la clé du succès."
                            ]
                        ]
                    ]
                ]
            ],
        ];

        $recommendations = [];
        $objectives = ['weight_loss', 'fitness'];
        $pathologies = ['none', 'diabetes', 'hypertension', 'cardio', 'diabete', 'hta', 'cholesterol'];

        foreach ($donnees as $item) {
            foreach ($item['reponses'] as $reponseValue => $data) {
                foreach ($pathologies as $patho) {
                    $finalContent = "Aucun";
                    if (is_string($data)) {
                        $finalContent = $data;
                    } elseif (is_array($data)) {
                        $finalContent = $data[$patho] ?? $data['weight_loss']['all'][$patho] ?? $data['default'] ?? "Aucun";
                    }

                    foreach ($objectives as $obj) {
                        $recommendations[] = [
                            'maladie_chronique_id' => 2,
                            'question_text' => $item['question'],
                            'answer_value' => $reponseValue,
                            'objective' => $obj,
                            'weight_loss_range' => 'all',
                            'pathology' => $patho,
                            'content' => $finalContent,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
            }
        }

        foreach (array_chunk($recommendations, 100) as $chunk) {
            Recommendation::insert($chunk);
        }
    }
}
