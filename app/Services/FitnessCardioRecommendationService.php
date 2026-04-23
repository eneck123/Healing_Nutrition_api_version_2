<?php

namespace App\Services;

class FitnessCardioRecommendationService implements RecommendationServiceInterface
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = [], int $age = 30): string
    {
        switch ($key) {
            case 'antecedents_diag':
                return "1 : Avez-vous des antécédents de diabète de type 2, d'hypertension artérielle ou de maladies cardiovasculaires ?
RÉPONSE : OUI
Conseils adaptés :
•	Privilégier les aliments à index glycémique bas
•	Limiter drastiquement le sel (max 5g/jour)
•	Augmenter les fibres solubles
•	Privilégier les graisses insaturées
•	Surveiller les portions de féculents
Modifications alimentaires :
•	Remplacer le riz blanc par du riz complet ou fonio
•	Utiliser des épices (gingembre, ail, piment doux) au lieu de sel
•	Ajouter systématiquement des légumes verts à feuilles à chaque repas
•	Préférer les modes de cuisson : vapeur, bouilli, grillé, au four
RÉPONSE : NON
Conseils adaptés :
•	Maintenir une alimentation équilibrée préventive
•	Surveiller quand même l'apport en sel et sucres
•	Privilégier des aliments naturels et peu transformés
Modifications alimentaires :
•	Suivre les plans de base selon le niveau d'activité
•	Assaisonnement modéré permis
•	Variété alimentaire maximale
Repas adaptés :
•	Suivre les plans standards proposés plus haut
•	Liberté dans le choix des sauces (en portions raisonnables)
•	Possibilité d'utiliser modérément l'huile de palme rouge (riche en vitamines)
Question 2 : Si oui, lequel ?
MALADIES CARDIOVASCULAIRES
Conseils spécifiques :
•	Graisses saturées < 7% de l'apport total
•	Privilégier oméga-3 (poissons gras)
•	Fibres solubles abondantes
•	Antioxydants (fruits et légumes colorés)
Aliments bénéfiques :
•	Poissons gras locaux (maquereau, sardine)
•	Gombo (fibres solubles)
•	Légumes verts à feuilles
•	Graines de courge et sésame
•	Avocat (avec modération)
Question 3 : Prenez-vous actuellement des médicaments liés à votre antécédent ?
RÉPONSE : OUI
Conseils généraux :
•	Respecter scrupuleusement les horaires de prise
•	Certains médicaments nécessitent des ajustements alimentaires
•	Ne jamais arrêter sans avis médical
•	Informer votre médecin de tout changement alimentaire majeur
Adaptations alimentaires :
•	Prendre les repas à heures régulières
•	Maintenir une hydratation optimale (1,5-2L d'eau/jour)
•	Éviter le pamplemousse si statines (interaction médicamenteuse)
RÉPONSE : NON
Conseils :
•	L'alimentation devient votre principal outil thérapeutique";

            case 'meds_lies':
                return "•	Rigueur maximale dans le suivi du plan alimentaire
•	Consultation médicale régulière pour évaluer la nécessité d'un traitement
Question 4 : Prenez-vous actuellement l'un des types de médicaments suivants ?
MÉDICAMENTS POUR BAISSER LA GLYCÉMIE (Metformine, Glimepiride...)
Conseils spécifiques :
•	La metformine se prend pendant ou après les repas
•	Risque d'hypoglycémie avec certains médicaments : toujours avoir une collation
•	Maintenir des horaires de repas réguliers
Repas adaptés :
•	Avant médicament : Petit-déjeuner substantiel - Bouillie de fonio + œufs + légumes
•	Collation de sécurité : Toujours avoir des noix ou un fruit à portée
•	Éviter : Sauter des repas
•	Privilégier : Repas équilibrés avec protéines à chaque prise
Menu type avec metformine :
•	Matin (avec médicament) : Akassa + poisson grillé + légumes + fruit
•	Midi (avec médicament) : Fonio + sauce légumes + poulet + salade
•	Soir (avec médicament) : Attiéké + ragoût de poisson + légumes verts
•	Collations : Noix, fruit, yaourt nature
INSULINE
Conseils spécifiques :
•	Synchronisation stricte repas/injection
•	Compter les glucides de manière précise
•	Jamais de repas sauté
•	Collations selon le schéma insulinique
Repas adaptés avec portions de glucides contrôlées :
•	Petit-déjeuner : Bouillie de maïs (150ml) + 1 œuf + légumes = environ 30g glucides
•	Déjeuner : Riz complet (100g cuit) + sauce + protéine + légumes = environ 45g glucides
•	Dîner : Igname (80g) + sauce + protéine + légumes = environ 30g glucides
•	Collations : Fruit moyen (15g glucides) + protéine (noix)
Plan insuline rapide + lente :
•	Glucides répartis : 30g-45g-30g-15g (collations)
•	Toujours associer protéines et fibres
•	Surveiller après activité physique
MÉDICAMENTS POUR PERDRE DU POIDS (Orlistat, Liraglutide...)
Conseils spécifiques pour ORLISTAT :
•	Limiter les graisses à 15g par repas (effets secondaires si excès)
•	Supplémentation en vitamines liposolubles (A, D, E, K)
•	Éviter les repas trop gras
Repas béninois adaptés (pauvres en graisses) :
•	Petit-déjeuner : Bouillie de maïs écrémée + blancs d'œufs + légumes + fruit
•	Déjeuner : Riz + sauce tomate légère au poisson maigre + légumes (pas de sauce arachide)
•	Dîner : Attiéké + poisson grillé maigre + sauce claire + légumes vapeur
•	Collations : Fruits, légumes crus, yaourt 0%
À éviter avec Orlistat :
•	Sauce arachide
•	Huile de palme
•	Avocat en excès
•	Noix en grande quantité
•	Viandes grasses
Conseils spécifiques pour LIRAGLUTIDE :
•	Effet coupe-faim : écouter sa satiété
•	Portions plus petites naturellement
•	Bien s'hydrater
Repas adaptés (portions réduites) :
•	Petit-déjeuner : Petite bouillie + 1 œuf + quelques légumes
•	Déjeuner : Petite portion de fonio + sauce + protéine maigre + légumes
•	Dîner : Soupe de légumes + petit morceau d'igname + poisson
•	Collations : Selon la faim (souvent réduite)
MÉDICAMENTS POUR LA TENSION (IEC, ARA2, Bêta-bloquants...)
Conseils spécifiques :
•	Sel strict < 5g/jour
•	Potassium important (sauf si insuffisance rénale)
•	Hydratation régulière
•	Certains (bêta-bloquants) peuvent ralentir le métabolisme
Repas adaptés (sans sel) :
•	Petit-déjeuner : Bouillie nature + poisson grillé maison + banane (potassium)
•	Déjeuner : Fonio + sauce tomate maison sans sel + poulet + épinards (potassium)
•	Dîner : Igname + sauce claire aux herbes + poisson + légumes verts
•	Collations : Fruits riches en potassium (banane, papaye, orange), noix non salées
Assaisonnement alternatif:
•	Gingembre frais râpé
•	Ail pilé
•	Piment doux ou fort
•	Oignon
•	Citronnelle
•	Basilic africain
•	Jus de citron
•	Poudre de crevettes (très peu)
MÉDICAMENTS POUR LE CHOLESTÉROL (Statines)
Conseils spécifiques :
•	Éviter le pamplemousse (interaction)
•	Limiter graisses saturées
•	Augmenter fibres solubles
•	Privilégier stérols végétaux
Repas adaptés :
•	Petit-déjeuner : Bouillie d'avoine + graines de lin + poisson maigre + orange (pas pamplemousse)
•	Déjeuner : Fonio + sauce gombo (fibres solubles) + haricots + légumes
•	Dîner : Attiéké + sauce claire + sardines + avocat (1/4) + légumes verts
•	Collations : Noix (amandes, cajou), fruits, légumes
Aliments anti-cholestérol :
•	Gombo (fibres solubles)
•	Haricots niébé
•	Fonio
•	Poissons gras (oméga-3)
•	Graines de sésame
•	Légumes verts à feuilles


AUCUN DE CES MÉDICAMENTS
Conseils :
•	Approche alimentair";

            case 'journee_typique':
                return "e stricte comme traitement principal
•	Potentiel de réversibilité plus élevé
•	Suivi régulier des paramètres
•	Possibilité d'éviter la médication avec bonne observance
Plan alimentaire intensif :
•	Suivre strictement les plans selon niveau d'activité
•	Privilégier aliments anti-inflammatoires
•	Maximiser fruits, légumes, fibres
•	Activité physique progressive obligatoire
SECTION B : HABITUDES ALIMENTAIRES
Question 1 : Décrivez une journée typique de vos repas
Cette question permet d'identifier :
•	Les erreurs alimentaires actuelles
•	Les moments de faiblesse
•	Les habitudes cul";

            case 'sommeil':
                return "turelles à préserver ou modifier
•	Les opportunités d'amélioration
Conseils selon les réponses typiques :
Si la personne saute le petit-déjeuner :
•	Problème : Ralentissement métabolique, fringales, hypoglycémie
•	Solution : Commencer par un petit-déjeuner léger puis augmenter progressivement
•	Proposition : Semaine 1 : Fruit + noix ; Semaine 2 : Ajouter bouillie légère ; Semaine 3 : Repas complet
Si la personne mange beaucoup le soir :
•	Problème";

            case 'fruits_legumes':
                return ": Stockage favorisé, sommeil perturbé
•	Solution : Inverser progressivement les portions
•	Proposition : 
o	Augmenter le petit-déjeuner et déjeuner
o	Réduire le dîner de 25% chaque semaine
o	Dîner léger : Soupe de légumes + protéine maigre
Si repas irréguliers :
•	Problème : Dérèglement hormonal, stockage anarchique
•	Solution : Établir des horaires fixes
•	Proposition : 
o	7h-8h : Petit-déjeuner
o	12h-13h : Déjeuner
o	19h-20h : Dîner
o	10h et 16h : Collations
Question 2 : Combien de portions de fruits et légumes par jour ?
RÉPONSE : 1-2 portions
Problème : Déficit majeur en fibres, vitamines, minéraux, antioxydants
Objectif progressif :
•	Semaine 1-2 : Passer à 3 portions
•	Semaine 3-4 : Passer à 5 portions
•	Semaine 5+ : 7-9 portions (idéal)
Plan d'augmentation béninois :
•	Étape 1 : Ajouter 1 fruit au petit-déjeuner
•	Étape 2 : Ajouter salade au déjeuner
•	Étape 3 : Ajouter légumes cuits au dîner
•	Étape 4 : Collations = fruits ou légumes
•	Étape 5 : Doubler les portions de légumes aux repas
Suggestions pratiques :
•	Fruits : Orange, papaye, mangue, ananas, banane, goyave, pamplemousse
•	Légumes à feuilles : Gboma, folon, amarante, épinards
•	Légumes racines : Carotte, betterave
•	Légumes fruits : Tomate, concombre, aubergine, gombo
•	Légumineuses : Haricots niébé, pois d'angole
Repas enrichis type :
•	Petit-déjeuner : Bouillie + 1 fruit + salade tomate-concombre
•	Déjeuner : Féculent + sauce avec 3 types de légumes + salade verte + 1 fruit
•	Dîner : Soupe de légumes (5 variétés) + protéine + 1 fruit
•	Collations : 2 fruits ou légumes crus

RÉPONSE : 3-4 portions
Situation : Bien mais peut mieux faire
Objectif : Atteindre 7-9 portions
Conseils d'optimisation :
•	Doubler la portion de légumes à un repas
•	Toujours avoir un fruit en collation
•	Commencer les repas par une salade
•	Ajouter des légumes dans les sauces
Menu optimisé :
•	Matin :";

            case 'grignotage':
                return "Bouillie + légumes sautés + 1 fruit
•	Midi : Grande salade d'entrée + plat avec légumes + 1 fruit
•	Soir : Soupe de légumes + plat + 1 fruit
•	Collations : Fruits et légumes crus
RÉPONSE : 5 portions ou plus
Situation : Excellent !
Conseils de maintien :
•	Varier les couleurs (vert, rouge, orange, violet)
•	Alterner cru et cuit
•	Privilégier les légumes locaux et de saison
•	Continuer cette bonne habitude
Optimisation qualitative :
•	Privilégier bio ou local
•	Limiter la cuisson pour préserver nutriments
•	Varier les modes de préparation
•	Explorer de nouveaux légumes traditionnels
Question 3 : Grignotez-vous entre les repas ?
RÉPONSE : OUI
Si grignotage non structuré :
Problème : Apports caloriques incontrôlés, pics glycémiques
Solution : Transformer en collations structurées
Plan de restructuration :
•	Étape 1 : Identifier les moments de grignotage
•	Étape 2 : Planifier 2 collations saines aux mêmes heures
•	Étape 3 : Préparer à l'avance les collations
•	Étape 4 : Éliminer tentations de la maison
Collations saines (150-200 kcal) :
•	1 fruit moyen + 10 noix de cajou
•	Yaourt nature + 1 c. à soupe de graines
•	Bâtonnets de carotte/concombre + houmous de niébé
•	Petite galette de mil + lait caillé
•	1 banane + 1 c. à soupe de beurre d'arachide maison
•	Papaye + quelques amandes
•	Orange + noix
•	Avocat (1/4) sur galette de mil
•	Smoothie léger (fruit + lait écrémé)
•	Pois chiches grillés épicés
Timing optimal :
•	Collation 1 : 10h-10h30
•	Collation 2 : 16h-16h30
RÉPONSE : NON
Évaluation :
Si espacement > 5h entre repas :
•	Risque : Hypoglycémie, fringales, suralimentation au repas suivant
•	Solution : Introduire 2 petites collations
Si espacement 4-5h :
•	Situation : Acceptable
•	Recommandation : Rester à l'écoute de sa faim
Collations préventives recommandées :
•	1 fruit
•	Quelques noix
•	Yaourt nature
•	Légumes crus
Question 4 : Si oui, quels aliments consommez-vous ?
Analyse selon les réponses :
SI GRIGNOTAGE SUCRÉ (biscuits, bonbons, gâteaux, sodas):
Problème majeur :
•	Pics glycémiques et insuliniques
•	Calories vides
•	Addiction au sucre
•	Stockage en graisses
Plan de sevrage progressif (4 semaines) :
Semaine 1 : Substitution partielle
•	Remplacer 50% par fruits frais béninois
•	Mangue, papaye, ananas, orange, banane
Semaine 2 : Substitution 75%
•	Fruits + quelques noix
•	Découvrir les fruits locaux moins connus (pomme cajou, safou)
Semaine 3 : Substitution 100%
•	Éliminer totalement les produits transformés sucrés
•	Collations 100% naturelles
Semaine 4 : Consolidation
•	Nouvelles habitudes installées
•	Palais réhabitué aux sucres naturels
Alternatives au sucré industriel :
•	Au lieu de bonbons : Fruits séchés maison (mangue, ananas, banane)
•	Au lieu de biscuits : Galettes de mil maison légèrement sucrées au miel
•	Au lieu de gâteaux : Akara au four sucré (version dessert)
•	Au lieu de sodas : Jus naturels dilués, bissap sans sucre, infusions fruitées
Recettes saines pour satisfaire l'envie de sucré :
1.	Boules d'énergie : Dattes + arachides + sésame + coco râpée
2.	Banane grillée : Banane plantain + cannelle
3.	Smoothie bowl : Papaye mixée + graines + noix de coco
4.	Wagashi sucré : Fromage local + miel + noix
SI GRIGNOTAGE SALÉ (chips, cacahuètes salées, beignets frits):
Problème majeur :
•	Excès de sel (HTA)
•	Graisses saturées/trans
•	Calories denses
•	Addiction au sel
Plan de transition (4 semaines) :
Semaine 1 : Réduire portions de moitié Semaine 2 : Alterner avec versions maison non salées Semaine 3";

            case 'boissons':
                return ": 75% versions saines Semaine 4 : 100% alternatives saines
Alternatives béninoises saines au salé :
•	Au lieu de chips : Chips de banane plantain au four (sans sel ou peu salées)
•	Au lieu de cacahuètes salées : Arachides grillées nature ou légèrement épicées
•	Au lieu de beignets frits : Akara au four, galettes de mil grillées
•	Au lieu de pop-corn salé : Pop-corn maison épicé (piment, paprika)
Recettes béninoises saines salées :
1.	Pois chiches rôtis épicés : Niébé grillé + piment + ail
2.	Noix de cajou épicées : Cajou grillé + curry + gingembre (sans sel)
3.	Chips de légumes au four : Patate douce, igname, plantain vert
4.	Graines de courge grillées : Épicées au piment et ail
SI GRIGNOTAGE MIXTE:
Combiner les deux plans ci-dessus selon les dominances
Question 5 : Fréquence de consommation de boissons sucrées/alcoolisées ?
RÉPONSE : TOUS LES JOURS
BOISSONS SUCRÉES quotidiennes :
Impact catastrophique :
•	500-1000 kcal vides par jour
•	Résistance à l'insuline
•	Stéatose hépatique
•	Addiction forte
Plan de sevrage intensif (6 semaines) :
Semaines 1-2 : Réduction progressive
•	Diluer avec 50% d'eau
•	Réduire à 1 fois/jour
•	Alternative : Jus de fruits frais maison dilué 1:1 avec eau
Semaines 3-4 : Substitution
•	Passer aux boissons non sucrées
•	Alternatives béninoises : 
o	Bissap (hibiscus) sans sucre ou miel léger
o	Gingembre-citron
o	Infusion de citronnelle
o	Eau de coco naturelle
Semaines 5-6 : Élimination
•	Arrêt total des sodas et jus sucrés
•	Eau aromatisée naturellement
•	Boissons traditionnelles non sucrées
Boissons béninoises saines :
1.	Bissap nature : Fleurs d'hibiscus + gingembre + citron (sans sucre)
2.	Tchoukoutou léger : Bière traditionnelle de mil (modération, faible alcool)
3.	Infusion de kinkeliba : Détox, digestif
4.	Eau de tamarin : Légèrement sucrée naturellement
5.	Jus de bissap-gingembre : Vitamine C, antioxydants
6.	Décoction de neem : Propriétés médicinales
7.	Thé vert local + citronnelle
8.	Eau détox : Eau + concombre + citron + menthe
ALCOOL quotidien :
Impact majeur :
•	200-500 kcal vides/jour minimum
•	Toxicité hépatique (foie gras)
•	Augmentation triglycérides
•	Perturbation sommeil
•	Contre-indication avec certains médicaments
Plan de réduction (8 semaines) :
Semaines 1-2 : Évaluation et prise de conscience
•	Noter quantités exactes
•	Identifier déclencheurs
Semaines 3-4 : Réduction à 4-5 jours/semaine
•	Jours sans alcool : lundi, mercredi, jeudi
•	Quantités réduites les autres jours
Semaines 5-6 : Réduction à 2-3 jours/semaine
•	Maximum week-end
•	Limiter à 1-2 verres
Semaines 7-8 : Objectif final
•	Maximum 1-2 fois/semaine
•	Maximum 1 verre standard
Limites recommandées finales :
•	Hommes : Max 2 verres/jour, max 10 verres/semaine, 2 jours sans/semaine
•	Femmes : Max 1 verre/jour, max 7 verres/semaine, 2 jours sans/semaine
Alternatives béninoises festives sans alcool :
1.	Bissap pétillant maison : Bissap + eau gazeuse + citron
2.	Cocktail tropical : Jus d'ananas + coco + gingembre
3.	Tchoukoutou sans alcool : Version non fermentée
4.	Chapman béninois : Fanta réduit + bissap + citron + concombre (occasionnel)
RÉPONSE : UNE FOIS PAR SEMAINE
Situation : Acceptable mais peut optimiser
Conseils :
•	Maintenir cette fréquence maximale
•	Contrôler les quantités (1-2 verres)
•	Préférer le week-end
•	Jamais à jeun
•	Bien s'hydrater après
Choix moins impactants :
•	Vin rouge (polyphénols) : 1 verre
•	Bière locale légère : 1 petite bouteille
•	Éviter cocktails sucrés et alcools forts
RÉPONSE : OCCASIONNELLEMENT
Situation : Très bien !
Conseils de maintien :
•	Garder pour occasions spéciales
•	Limiter à 1-2 verres
•	Alterner avec eau
•	Manger avant et pendant
RÉPONSE : JAMAIS
Situation : Excellent pour la santé !
Conseils :
•	Maintenir cette abstinence
•	Résister aux pressions sociales
•	Proposer alternatives festives
•	Profiter des bienfaits (sommeil, perte de poids, santé hépatique)
Boissons festives sans alcool :
•	Bissap maison élaboré
•	Jus de fruits frais mixés
•	Cocktails tropicaux sans alcool
•	Sodabi SANS alcool (version jus de palme frais)
SECTION C : COMPORTEMENTS ET BIEN-ÊTRE
Question 1 : Heures de sommeil par nuit ?
RÉPONSE : MOINS DE 6H
Impact catastrophique sur la perte de poids :
•	Augmentation ghréline (hormone de la faim) +30%
•	Diminution leptine (hormone satiété) -20%
•	Résistance à l'insuline accrue
•	Métabolisme ralenti -15%
•	Fringales sucrées augmentées
•	Cortisol élevé (stockage abdominal)
•	Récupération musculaire compromise
Plan d'amélioration du sommeil (progressif) :
Semaines 1-2 : Gagner 30 minutes
•	Coucher 30 min plus tôt
•	Objectif : 6h30
Semaines 3-4 : Gagner 1 heure
•	Coucher 1h plus tôt
•	Objectif : 7h
Semaines 5+ : Objectif optimal
•	7-8h de sommeil
•	Routine stable
Adaptations alimentaires béninoises pour mieux dormir :
Dîner optimal (2-3h avant coucher) :
•	Léger mais rassasiant
•	Riche en tryptophane (précurseur mélatonine)
•	Pauvre en graisses (digestion lente)
•	Index glycémique modéré
Repas du soir favorisant le sommeil :
•	Option 1 : Soupe de légumes + poisson grillé + igname bouillie (petite portion) + banane
•	Option 2 : Attiéké + sauce claire + poulet maigre + légumes + lait tiède
•	Option 3 : Bouillie de mil légère + œuf + légumes verts + tisane
Collation pré-sommeil (si faim, 1h avant) :
•	Lait tiède + 1 petite banane
•	Yaourt nature + quelques noix de cajou
•	Tisane de citronnelle + galette de mil
Aliments favorisant le sommeil (riches en tryptophane) :
•	Poisson
•	Poulet
•";

            case 'apnee':
                return "Œufs
•	Lait et yaourt
•	Banane
•	Noix de cajou
•	Graines de sésame
•	Haricots niébé
Tisanes pour le sommeil :
1.	Citronnelle
2.	Feuilles de corossol
3.	Kinkeliba
4.	Fleurs d'hibiscus légères
Habitudes à adopter :
•	Dîner 3h avant coucher
•	Pas d'écrans 1h avant
•	Chambre fraîche et sombre
•	Routine régulière
•	Pas de caféine après 15h
•	Éviter siestes longues (max 20-30 min)
RÉPONSE : 6H-7H
Situation : Acceptable mais sous-optimal
Objectif : Atteindre 7-8h
Conseils :
•	Ajouter 30-60 minutes
•	Optimiser la qualité du sommeil
•	Routine régulière
Ajustements alimentaires :
•	Dîner 3h avant coucher
•	Éviter stimulants après 16h
•	Tisane relaxante le soir
Dîner type :
•	Modéré, équilibré
•	Suivre les plans de base
•	Ajouter tisane relaxante

RÉPONSE : 8H-9H
Situation : OPTIMAL !
Conseils de maintien :
•	Préserver cette routine
•	Horaires réguliers
•	Qualité avant quantité
Alimentation adaptée :
•	Suivre plans standards
•	Maintenir horaires réguliers des repas
•	Éviter excès le soir
RÉPONSE : PLUS DE 9H
Attention : Peut indiquer :
•	Mauvaise qualité de sommeil
•	Apnée du sommeil non diagnostiquée
•	Dépression
•	Hypothyroïdie
•	Sédentarité excessive
Conseils :
•	Consultation médicale recommandée
•	Évaluer la qualité du sommeil
•	Rechercher apnée du sommeil
Si simplement excès :
•	Réduire progressivement à 8h
•	Augmenter activité physique le matin
•	Routine de lever régulière
Question 2 : Avez-vous l'apnée du sommeil ?
RÉPONSE : OUI
Impact majeur sur poids et santé cardiovasculaire :
•	Fragmentation du sommeil = mêmes effets que manque de sommeil
•	Hypoxie nocturne = stress oxydatif, inflammation
•	Activation sympathique = HTA, risque cardiaque
•	Résistance à l'insuline accrue
•	Difficulté à perdre du poids
Priorités absolues :
1. Traitement médical obligat";

            case 'regime_recent':
                return "oire :
•	PPC (Pression Positive Continue) si prescrit
•	Observance maximale
•	Suivi ORL/pneumologue
2. Perte de poids prioritaire :
•	10% de perte = amélioration significative apnées
•	20% de perte = potentielle résolution
•	Cercle vertueux : perte → moins d'apnées → meilleur sommeil → perte facilitée
3. Adaptations alimentaires spécifiques :
Éviter absolument le soir :
•	Alcool (relaxation muscles pharyngés)
•	Repas lourds (reflux gastrique)
•	Aliments inflammatoires
Dîner anti-apnée béninois :
•	Timing : 3-4h avant coucher
•	Type : Léger, anti-inflammatoire
•	Exemples : 
o	Soupe de légumes verts + poisson grillé + petite portion d'igname
o	Attiéké + sauce claire + légumes + tisane
o	Salade complète + protéine maigre + fruit
Position de sommeil :
•	Privilégier décubitus latéral (côté)
•	Éviter décubitus dorsal (dos)
•	Surélever légèrement la tête
Aliments anti-inflammatoires béninois à privilégier :
•	Poissons gras (oméga-3)
•	Légumes verts à feuilles
•	Gingembre
•	Ail
•	Curcuma
•	Fruits rouges locaux
RÉPONSE : NON
Conseils préventifs :
•	Maintenir poids santé
•	Dormir sur le côté si ronflement
•	Éviter alcool le soir
•	Surveiller signes : ronflements, fatigue diurne, pauses respiratoires
Question 3 : Avez-vous récemment fait un régime de perte de poids ?
RÉPONSE : OUI
Évaluation approfondie nécessaire :
Risques des régimes restrictifs répétés :
•	Métabolisme ralenti (effet yo-yo)
•	Perte de masse musculaire
•	Carences nutritionnelles
•	Troubles comportements alimentaires
•	Démotivation
Approche selon résultats antérieurs :
Si ÉCHEC du régime précédent :
Analyse des causes :
•	Trop restrictif ? → Approche équilibrée
•	Monotone ? → Variété maximale
•	Irréaliste ? → Objectifs progressifs
•	Isolement social ? → Intégration culturelle
Nouvelle approche béninoise durable :
Principes fondamentaux :
1.	Pas de privation totale
2.	Intégration culturelle et sociale
3.	Apprentissage vs restriction
4.	Progression lente mais durable (0,5-1 kg/semaine)
Plan nutritionnel non frustrant :
Aliments à consommer librement :
•	Tous les légumes verts à feuilles
•	Légumes non féculents
•	Poissons maigres
•	Bouillons clairs
•	Tisanes non sucrées
Aliments à portions contrôlées :
•	Pâtes (owo, télibo, akassa) : taille de poing
•	Riz : 1/2 tasse cuite
•	Igname : portion = paume de main
•	Sauce arachide : 2 c. à soupe
•	Huile de palme : 1 c. à café
Aliments occasionnels (1-2 fois/semaine) :
•	Akara (version four)
•	Aloko (plantain grillé vs frit)
•	Gâteaux traditionnels (versions allégées)
Gestion des événements sociaux :
•	Manger normalement avant
•	Choisir options grillées/bouillies
•	Portions raisonnables
•	Compenser le lendemain
Si SUCCÈS mais reprise de poids :
Problème : Régime temporaire vs changement de vie
Solution : Transition vers maintenance
Plan de stabilisation béninois :
Phase 1 (Semaines 1-4) : Réintroduction progressive
•	Augmenter calories de 200 kcal/semaine
•	Ajouter 1 portion de féculent/jour
•	Surveiller poids hebdomadairement
Phase 2 (Mois 2-3) : Équilibre
•	Trouver apport calorique de maintenance
•	Stabilisation du poids
•	Flexibilité alimentaire raisonnable
Phase 3 (Mois 4+) : Maintien à vie
•	Habitudes ancrées
•	Écarts gérés
•	Pesée hebdomadaire
•	Ajustement si +2 kg
Stratégies anti-reprise béninoises :
1.	Règle des 80/20 : 80% plan sain, 20% flexibilité
2.	Jours de fête : Plaisir sans culpabilité, retour au plan le lendemain
3.	Activité physique régulière : Non négociable
4.	Soutien social : Impliquer famille et amis
Perte < 5 kg :
Analyse :
•	Approche peut-être trop douce
•	Ou démarrage récent
•	Ou nombreux écarts
Conseils :
•	Évaluer observance réelle
•	Renforcer rigueur si laxisme
•	Patience si démarrage récent (résultats à 3 mois)
•	Tracer alimentation pendant 1 semaine (prise de conscience)
Perte 5-10 kg :
Situation : Très bon résultat !
Risque : Plateau ou relâch";

            case 'sedentarite':
                return "ement
Conseils :
•	Félicitations, encouragement
•	Maintenir l'effort
•	Varier pour éviter plateau
•	Si plateau > 4 semaines : ajuster calories ou activité
Perte > 10 kg :
Situation : Excellent résultat !
Attention :
•	Risque de relâchement
•	Peau distendue possible
•	Adaptation métabolique
Conseils :
•	Transition vers maintenance
•	Renforcement musculaire important
•	Suivi nutritionnel et médical
•	Prévention reprise de poids
•	Hydratation maximale (peau)
RÉPONSE : NON
Situation : Première tentative structurée
Avantages :
•	Métabolisme non endommagé
•	Motivation élevée
•	Pas de frustrations antérieures
•	Résultats potentiellement rapides
Approche initiale béninoise :
Phase découverte (Mois 1) :
•	Apprentissage des bases
•	Découverte des portions adéquates
•	Prise de conscience alimentaire
•	Résultats encourageants attendus (2-4 kg)
Phase installation (Mois 2-3) :
•	Routine installée
•	Gestion des écarts
•	Adaptation sociale
•	Perte régulière (2-3 kg/mois)
Phase ancrage (Mois 4+) :
•	Habitudes ancrées
•	Autonomie complète
•	Maintien des résultats
•	Mode de vie permanent
SECTION D : ACTIVITÉ PHYSIQUE
Question 1 : Jours d'activité physique par semaine ?
RÉPONSE : AUCUN (Sédentaire complet)
Impact catastrophique :
•	Métabolisme basal très bas
•	Perte musculaire
•	Résistance à l'insuline
•	Risque cardiovasculaire maximal
•	Ostéoporose
•	Dépression/anxiété
Plan de démarrage ULTRA-progressif (12 semaines) :
Phase 1 - Semaines 1-2 : Activation minimale
•	Objectif : Rompre la sédentarité totale
•	Activité : Marche 10 minutes/jour
•	Fréquence : 3 jours/semaine
•	Intensité : Douce, confortable
Activités béninoises accessibles :
•	Marche dans le quartier le matin (frais)
•	Marche au marché (remplacer transport)
•	Jardinage léger 15 minutes
•	Tâches ménagères actives
Phase 2 - Semaines 3-4 : Augmentation durée
•	Objectif : Allonger sans intensifier
•	Activité : Marche 15-20 minutes
•	Fréquence : 4 jours/semaine
•	Ajout : Étirements 5 minutes
Phase 3 - Semaines 5-8 : Régularité
•	Objectif : Installer routine
•	Activité : Marche 25-30 minutes
•	Fréquence : 5 jours/semaine
•	Ajout : Renforcement léger (chaise, mur)
Exercices béninois à domicile :
•	Squats sur chaise (assis/debout) : 2x10
•	Pompes contre mur : 2x10
•	Montée d'escaliers : 2x1 étage
•	Étirements complets : 10 minutes
Phase 4 - Semaines 9-12 : Diversification
•	Objectif : Éviter monotonie, progresser
•	Activité : Marche 30-40 minutes OU activité alternative
•	Fréquence : 5-6 jours/semaine
•	Intensité : Introduction d'intervalles légers
Activités variées :
•	Danse traditionnelle douce
•	Natation (si accès plage/piscine)
•	Vélo tranquille
•	Marche rapide par intervalles
•	Gym douce collective
Adaptations alimentaires pour sédentaire démarrant :
•	Augmenter protéines légèrement pour préserver muscle
•	Timing : glucides autour de l'activité (même minimale)
Repas post-activité (même 10 min marche) :
•	Dans l'heure : Fruit + quelques noix
•	Repas suivant : Protéine + légumes + petit féculent
Motivation et suivi :
•	Tenir journal d'activité
•	Célébrer chaque victoire
•	Trouver partenaire de marche
•	Objectif de plaisir avant performance
RÉPONSE : 1-3 JOURS (Légèrement actif)
Situation : Bon démarrage mais marge d'amélioration
Objectif : Passer à 4-5 jours minimum
Plan de progression (8 semaines) :
Semaines 1-2 : Consolider l'existant
•	Maintenir 3 jours
•	Augmenter durée de 10 minutes
•	Ou intensité légèrement
Semaines 3-4 : Ajouter 1 jour
•	4 jours/semaine
•	Activité légère le 4ème jour (récupération active)
Semaines 5-6 : Ajouter 2ème jour
•	5 jours/semaine
•	Varier les activités
Semaines 7-8 : Consolidation
•	5-6 jours/semaine
•	Mix intensités
•	Routine ancrée
Programme type (5 jours) :
•	Lundi : Marche rapide 30 min
•	Mardi : Renforcement musculaire 30 min
•	Mercredi : REPOS ou yoga/étirements
•	Jeudi : Marche/vélo 40 min
•	Vendredi : Activité ludique (danse, sport)
•	Samedi : Marche longue 45-60 min ou activité en famille
•	Dimanche : REPOS complet
Activités recommandées :
•	Marche matinale au marché
•	Danse afro (zouglou, coupé-décalé, traditionnel)
•	Football amateur
•	Vélo
•	Natation (plage)
•	Gym communautaire
•	Jardinage actif
Adaptations alimentaires :
•	Passer au plan \"Légèrement actif\" (28% P / 42% G / 28% L)
•	Collation pré-activité : Fruit + quelques noix (si > 1h après repas)
•	Collation post-activité : Protéine + glucide (ex: yaourt + banane)
Timing des repas optimal :
•	Si activité matinale (avant petit-déj) : 
o	Petit-déjeuner dans l'heure : Complet et équilibré
•	Si activité milieu matinée (10h) : 
o	Petit-déj 7h : Normal
o	Collation post : Fruit + noix
o	Déjeuner normal
•	Si activité soir (18h) : 
o	Collation 16h : Fruit + yaourt
o	Dîner 19h30 : Normal, compense
RÉPONSE : 4-6 JOURS (Modérément à très actif)
Situation : Excellent engagement !
Objectif : Optimiser qualité et résultats
Focus : Équilibre et progression
Programme type (6 jours) :
•	Lundi : Cardio modéré 40 min (marche rapide, vélo)
•	Mardi : Renforcement musculaire complet 45 min
•	Mercredi : Cardio intense 30 min (intervalles, course)
•	Jeudi : Renforcement + étirements 40 min
•	Vendredi : Activité ludique intense (foot, danse) 45 min
•	Samedi : Cardio longue durée 60 min (randonnée, vélo long)
•	Dimanche : REPOS ACTIF (yoga, marche douce, étirements)
Variantes béninoises :
•	Cardio : Marche/course plage, vélo, danse intense, football, natation
•	Renforcement : Gym locale, exercices poids du corps, haltères improvisés (bidons d'eau)
•	Ludique : Sports traditionnels, danse afro, activités de groupe
•	Récupération : Yoga, étirements, marche contemplative, natation douce
Adaptations alimentaires cruciales :
•	Si 6-7 jours avec intensité : Plan \"Très/Extrêmement actif\"
•	Priorité : Récupération et reconstruction musculaire
Timing nutritionnel optimisé :
Jour d'entraînement intense :
•	Pré-activité (1-2h avant) : Glucides modérés + protéine légère 
o	Ex: Banane + quelques noix OU petite bouillie + œuf
•	Post-activité (dans 30-60 min) : Protéine + glucides 
o	Ex: Poulet grillé + igname OU poisson + attiéké
•	Repas suivants : Normaux, équilibrés
Jour de repos/léger :
•	Apports légèrement réduits (surtout glucides)
•	Maintien protéines élevées
•	Focus récupération
Exemples de journées type :
JOUR INTENSE (ex: Football 18h) :
•	7h : Petit-déj complet : Bouillie + œufs + légumes + fruit
•	10h : Collation : Fruit + noix
•	12h30 : Déjeuner : Riz complet + poulet + légumes + salade
•	16h : Collation pré-foot : Banane + beurre d'arachide + eau
•	18h : FOOTBALL
•	19h30 : Post-foot : Smoothie (banane + lait + arachides) ou jus naturel + poisson grillé
•	20h30 : Dîner léger : Soupe légumes + protéine
•	Hydratation : 2,5-3L eau
JOUR REPOS :
•	7h : Petit-déj normal
•	10h : Collation légère
•	12h30 : Déjeuner modéré (portions légèrement réduites)
•	16h : Collation
•	19h : Dîner léger
•	Hydratation : 2L eau
Signaux d'alarme (surentraînement) :
•	Fatigue persistante
•	Baisse de performance
•	Irritabilité
•	Sommeil perturbé
•	Perte d'appétit
•	Immunité réduite (rhumes fréquents)
•	Stagnation/prise de poids malgré efforts
Si surentraînement : Réduire à 4 jours, augmenter repos et calories
RÉPONSE : 7 JOURS (Extrêmement actif)
Évaluation critique :
Si athlète ou professionnel du sport : Adapté Si personne lambda obèse avec MCV : DANGEREUX
Risques entraînement quotidien sans repos :
•	Surentraînement chronique
•	Blessures
•	Épuisement surrénal
•	Immunité compromise
•	Stress oxydatif excessif
•	Inflammation chronique
•	Stagnation/prise de poids paradoxale
Recommandation forte : INTÉGRER DU REPOS
Plan corrigé (6 jours actifs + 1 repos) :
•	Suivre le plan 4-6 jours ci-dessus
•	Dimanche : REPOS COMPLET ou très léger (marche douce 20 min max)
Si vraiment 7 jours actifs (circonstances particulières) :
Impératifs absolus :
1.	Variation intensité : Alterner dur/modéré/léger
2.	Récupération active : 2-3 jours/semaine en mode très doux
3.	Nutrition optimale : Calories suffisantes, protéines élevées
4.	Sommeil : 8-9h/nuit obligatoire
5.	Hydratation : 3-4L/jour
6.	Suivi médical : Régulier
Programme 7 jours intelligent :
•	Lundi : Intensité élevée (60 min)
•	Mardi : Modérée (45 min)
•	Mercredi : Intensité élevée (60 min)
•	Jeudi : Récupération active légère (30 min étirements/yoga)
•	Vendredi : Modérée à élevée (50 min)
•	Samedi : Intensité élevée (60-90 min)
•	Dimanche : Récupération active douce (30-40 min marche/natation calme)
Adaptations alimentaires extrêmes :
•	Plan \"Extrêmement actif\" (25% P / 45% G / 25% L)
•	Calories significativement augmentées
•	5-6 repas/jour possibles
•	Protéines : 1,8-2g/kg poids corporel
•	Glucides : Timing précis autour des entraînements
•	Supplémentation possible (sous avis médical) : multivitamines, oméga-3
Journée type 7j/semaine actif :
•	6h : Petit-déj pré-training : Léger (banane + noix + thé)
•	7h : ENTRAÎNEMENT
•	8h30 : Post-training : Complet (bouillie + œufs + légumes + fruit)
•	11h : Collation : Fruit + yaourt + noix
•	13h : Déjeuner : Copieux équilibré (féculents + protéine + légumes)
•	16h : Collation : Substantielle (galette + beurre arachide + fruit)
•	19h : Dîner : Équilibré (protéine + légumes + féculent modéré)
•	21h : Collation si faim : Yaourt + fruit
•	Hydratation : 3-4L
Suppléments naturels pour récupération :
•	Gingembre frais (anti-inflammatoire)
•	Miel local (récupération glucides)
•	Spiruline locale (protéines, fer)
•	Moringa (multivitamines)
•	Lait de coco (électrolytes)
•	Bissap (antioxydants)
Question 2 : Temps assis par jour ?
RÉPONSE : PLUS DE 8H
Danger majeur - \"Sitting is the new smoking\" :
•	Annule partiellement bénéfices de l'exercice
•	Métabolisme glucides altéré
•	Risque cardiovasculaire +147%
•	Mortalité toutes causes +50%
•	Obésité abdominale favorisée
Plan anti-sédentarité (même avec exercice régulier) :
Au travail/bureau :
•	Règle d'or : Se lever 5 min toutes les heures
•	Alarme téléphone : Rappel horaire
•	Activités debout : Appels téléphoniques, lecture, réflexion
Micro-mouvements béninois au bureau :
1.	Marche sur place 1 min
2.	Étirements bras, cou, dos 2 min
3.	Squats légers 10 répétitions
4.	Montée d'escaliers 1 étage
5.	Marche couloir/extérieur 2 min
À domicile :
•	Éviter TV/canapé prolongé
•	Activités debout : repasser, cuisiner, ranger
•	Privilégier activités actives
Aménagements pratiques béninois :
•	Bureau debout improvisé (table haute)
•	Ballon de gym comme chaise (par intervalles)
•	Marche pendant appels téléphoniques
•	Jardinage quotidien 15 min
•	Tâches ménagères actives
Objectif progressif :
•	Semaine 1-2 : Réduire à 7h (se lever 1 fois/heure)
•	Semaine 3-4 : Réduire à 6h (se lever + micro-activité)
•	Semaine 5+ : Maintenir < 6h, idéalement 4-5h max
Adaptations alimentaires si très sédentaire :
•	Même si exercice quotidien, considérer réduction glucides légère
•	Collations debout ou en marchant
•	Boire beaucoup (force déplacements toilettes)
RÉPONSE : 6H-8H
Situation : Courant mais perfectible
Objectif : Réduire à < 6h
Stratégies :
•	Se lever toutes les heures minimum
•	Micro-mouvements fréquents
•	Optimiser temps libre actif
Plan de réduction :
•	Identifier périodes assises
•	Remplacer 1-2h par activités debout/mouvement
•	Marche active pauses déjeuner
RÉPONSE : 4H-6H
Situation : Acceptable
Maintien :
•	Continuer interruptions fréquentes
•	Équilibre travail/mouvement
•	Ne pas régresser
RÉPONSE : MOINS DE 4H
Situation : EXCELLENT !
Profil : Probablement travail actif ou très bon équilibre
Conseils :
•	Maintenir ce mode de vie actif
•	Avantage majeur pour santé et perte de poids
•	Capitaliser sur cette base
Question 3 : Activités physiques appréciées ?
Principe fondamental : Le meilleur exercice est celui qu'on FAIT, pas celui qui est \"optimal\" théoriquement.
MARCHE :
Excellente base, surtout pour débuter
Avantages :
•	Accessible, gratuit, sûr
•	Faible impact articulaire (crucial pour obésité)
•	Social (en groupe ou famille)
•	Intégrable au quotidien
Programme de marche béninois p";

            case 'fc_connaissance':
                return "rogressif :
Débutant (Semaines 1-4) :
•	15-20 min/jour, 3-4 fois/semaine
•	Vitesse confortable
•	Moments : Matin frais (6h-7h) ou soir (18h-19h)
•	Lieux béninois : Quartier, plage, marché
Intermédiaire (Semaines 5-12) :
•	30-40 min/jour, 5 fois/semaine
•	Introduction d'intervalles rapides
•	Technique : Alterner 3 min normal / 2 min rapide
•	Ajouts : Collines, escaliers
Avancé (Semaines 13+) :
•	45-60 min/jour, 5-6 fois/semaine
•	Marche rapide soutenue
•	Randonnées week-end
•	Objectif : 10 000 pas/jour minimum
Lieux de marche béninois recommandés :
•	Cotonou : Plage de Fidjrossè, bord de lagune, quartiers résidentiels
•	Porto-Novo : Berges de l'Ouémé, centre historique
•	Autres : Parcs, boulevards, marchés matinaux
Adaptations alimentaires marche :
•	Avant (si > 45 min) : Petit encas (fruit + noix)
•	Pendant : Eau (si > 60 min)
•	Après : Normal si < 60 min ; collation si > 60 min
YOGA :
Excellent complément, surtout si MCV
Avantages :
•	Flexibilité, équilibre
•	Gestion stress (cortisol ↓)
•	Renforcement musculaire doux
•	Amélioration conscience corporelle
•	Méditation (contrôle alimentaire émotionnel)
Types adaptés obésité + MCV :
•	Hatha yoga : Doux, accessible
•	Yin yoga : Étirements profonds, relaxation
•	Yoga restauratif : Récupération
•	Éviter initialement : Vinyasa intense, Power yoga
Programme béninois yoga :
•	Fréquence : 2-3 fois/semaine minimum
•	Durée : 30-45 min
•	Moment : Matin (flexibilité) ou soir (relaxation)
Accès au yoga au Bénin :
•	Studios à Cotonou (si disponibles)
•	Vidéos en ligne (YouTube)
•	Applications (Down Dog, Yoga Studio)
•	Pratique autonome à domicile
Séance type yoga domicile (30 min) :
1.	Respiration (5 min) : Pranayama
2.	Échauffement (5 min) : Salutations douces
3.	Postures (15 min) : Focus corps entier
4.	Étirements (3 min) : Souplesse
5.	Relaxation (2 min) : Savasana
Adaptations alimentaires yoga :
•	Pratique à jeun ou 2-3h après repas
•	Hydratation post-séance
•	Repas léger si proche de la pratique
AUTRE (Football, natation, danse, vélo, etc.) :
FOOTBALL :
Avantages :
•	Social, ludique, motivant
•	Cardio intense + renforcement
•	Culturellement ancré au Bénin
Précautions obésité + MCV :
•	Début : Adaptation progressive (3-6 mois)
•	Intensité : Modérée initialement
•	Échauffement : Obligatoire (15 min)
•	Hydratation : Cruciale
•	Surveillance : Fréquence cardiaque
Programme progressif :
•	Mois 1-2 : Jeu réduit, touches de balle, passes (30 min)
•	Mois 3-4 : Matchs réduits 5v5 (45 min)
•	Mois 5+ : Matchs complets (selon forme)
Nutrition football :
•	3h avant : Repas complet (glucides + protéines modérées)
•	1h avant : Collation légère (banane + eau)
•	Pendant : Eau toutes les 15 min
•	Après : Glucides + protéines dans l'heure (récupération)
Exemple jour de match (18h) :
•	7h : Petit-déj complet
•	13h : Déjeuner riche en glucides (riz + poulet + légumes)
•	16h : Collation : Banane + beurre d'arachide + eau
•	18h : MATCH + hydratation
•	19h30 : Post-match : Jus naturel + noix
•	20h30 : Dîner : Protéines + glucides (poisson + igname + légumes)
NATATION :
Avantages :
•	Idéal obésité (pas d'impact articulaire)
•	Cardio complet
•	Renforcement musculaire global
•	Rafraîchissant (climat tropical)
Accès au Bénin :
•	Plage (gratuit) : Fidjrossè, Grand-Popo, Ouidah
•	Piscines : Hôtels, clubs
Programme natation :
•	Débutant : 20 min (nage calme, repos fréquents), 2-3 fois/semaine
•	Intermédiaire : 30-40 min (longueurs continues), 3-4 fois/semaine
•	Avancé : 45-60 min (intervalles, techniques variées), 4-5 fois/semaine
Sécurité plage :
•	Zones surveillées uniquement
•	Jamais seul
•	Respecter drapeaux
•	Hydratation malgré immersion
Nutrition natation :
•	Hydratation avant et après (même si dans l'eau)
•	Collation post : Glucides + protéines
•	Repas normal si < 45 min
DANSE (Afro, Zouglou, Coupé-Décalé, traditionnelle) :
Avantages :
•	Cardio intense et ludique
•	Culturel et social
•	Libération émotionnelle
•	Renforcement core
Types danse:
•	Traditionnelle : Guèlèdè, Tchinkounmè, Sakpata
•	Moderne : Coupé-décalé, Zouglou, Afrobeat
•	Fitness : Zumba (fusion)
Programme danse :
•	Fréquence : 2-4 fois/semaine
•	Durée : 30-60 min
•	Intensité : Modérée à intense
•	Lieux : Cours collectifs, maquis (soirées), domicile
Cours danse à Cotonou :
•	Studios de danse
•	Centres culturels
•	Vidéos YouTube (danse africaine)
•	Soirées maquis (participation active)
Nutrition danse :
•	Éviter repas lourd 2h avant
•	Hydratation cruciale
•	Post-danse : Collation récupération
VÉLO :
Avantages :
•	Cardio efficace
•	Faible impact
•	Transport actif (économique)
•	Renforcement jambes
Praticabilité au Bénin :
•	Urbain (Cotonou) : Difficile (trafic), possible routes secondaires
•	Régions : Plus accessible
•	Alternative : Vélo d'appartement
Programme vélo :
•	Débutant : 20-30 min, plat, 3 fois/semaine
•	Intermédiaire : 40-60 min, légères pentes, 4 fois/semaine
•	Avancé : 60-90 min, relief varié, 5 fois/semaine
Sécurité :
•	Casque obligatoire
•	Visibilité (gilet, lumières)
•	Éviter heures de pointe
•	Trajets connus
Nutrition vélo :
•	< 60 min : Eau suffisante
•	> 60 min : Collation (banane, fruits secs)
•	Post : Repas dans l'heure (glucides + protéines)
COMBINAISON ACTIVITÉS (Recommandé) :
Programme équilibré béninois type :
•	Lundi : Marche 40 min
•	Mardi : Renforcement musculaire maison 30 min
•	Mercredi : Danse (cours ou vidéo) 45 min
•	Jeudi : Yoga 30 min
•	Vendredi : Football amateur 60 min
•	Samedi : Natation ou vélo 45 min
•	Dimanche : Repos actif (marche légère, étirements)
Avantages combinaison :
•	Évite monotonie et abandon
•	Travail complet du corps
•	Adaptation à l'emploi du temps
•	Social + individuel
NB :Si user choisit autre activité physique qu’il préfère hormis marche et yoga, tu lui balance les autres activités se trouvant en haut pour mla question précédentes
Question 4 : Connaissez-vous votre fréquence cardiaque au repos ?
RÉPONSE : OUI
Importance majeure :
•	Indicateur de condition cardiovasculaire
•	Guide d'intensité d'entraînement
•	Suivi des progrès
•	Alerte sur surentraînement
Interprétation :
EXCELLENTE (50-60 bpm) :
•	Athlète ou très bonne condition
•	Continuer entraînements
•	Maintenir santé cardiovasculaire
BONNE (60-70 bpm) :
•	Bonne condition physique
•	Potentiel d'amélioration avec activité régulière
•	Cible raisonnable pour débutant
MOYENNE (70-80 bpm) :
•	Condition physique moyenne
•	Bénéfice significatif de l'exercice à attendre
•	Objectif : descendre vers 60-70 en 3-6 mo";

            case 'stress_ennui':
                return "is
ÉLEVÉE (80-90 bpm) :
•	Sédentarité probable
•	Urgence de commencer activité progressive
•	Surveillance médicale recommandée
TRÈS ÉLEVÉE (> 90 bpm) :
•	Alerte rouge
•	Consultation médicale OBLIGATOIRE avant exercice
•	Possibles pathologies sous-jacentes
•	Démarrage très progressif sous supervision
Utilisation pour l'entraînement :
•	Déterminant la fréquence cardiaque maximale (FCmax) : Formule de Tanaka (plus précise pour certains adultes) : FCmax ≈ 208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm].
Zones d'entraînement :
1.	Zone récupération (50-60% FCmax) : Échauffement, récupération
2.	Zone lipidique (60-70% FCmax) : Perte de poids optimale, intensité modérée
3.	Zone aérobie (70-80% FCmax) : Amélioration cardiovasculaire
4.	Zone seuil (80-90% FCmax) : Performance, réservé avancés
5.	Zone maximale (90-100% FCmax) : Haute intensité, courtes durées, athlètes
Recommandations MCV + obésité :
•	Débutant : Rester en zone 1-2 (50-70% FCmax) pendant 3-6 mois
•	Intermédiaire : Progresser vers zone 3 (70-80%)
•	Avancé : Intervalles en zone 4 (sous supervision)
•	JAMAIS zone 5 sans avis médical
Exemple pratique (personne 45 ans) :
•	FCmax = 220 - 45 = 175 bpm
•	Zone lipidique (objectif perte poids) : 60-70% = 105-122 bpm
•	Lors de marche rapide : Viser 110-120 bpm
•	Surveillance : Montre cardiaque, application, prise de pouls
Adaptations alimentaires selon FC repos :
FC élevée (> 80 bpm) :
•	Réduire stimulants (café, thé fort)
•	Augmenter magnésium (légumes verts, noix)
•	Hydratation optimale
•	Oméga-3 (poissons gras)
Aliments béninois bénéfiques FC :
•	Poissons gras (maquereau, sardine) : Oméga-3
•	Légumes verts à feuilles : Magnésium, potassium
•	Banane : Potassium
•	Noix de cajou : Magnésium
•	Avocat : Potassium, graisses saines
Suivi progrès :
•	Mesurer FC repos chaque semaine (même jour, même heure, matin avant lever)
•	Objectif : Réduction de 5-10 bpm en 3 mois avec exercice régulier
•	Signe de bonne adaptation cardiovasculaire
RÉPONSE : NON
Recommandation : Apprendre à mesurer
Méthodes de mesure :
1. Prise de pouls manuelle (gratuit) :
•	Moment : Au réveil, avant lever, assis ou couché
•	Technique : 
o	Pouls radial (poignet) ou carotidien (cou)
o	Compter battements pendant 15 secondes
o	Multiplier par 4 = FC/minute
•	Répéter 3 matins : Faire moyenne
2. Applications smartphone (gratuit) :
•	Utilisation flash + caméra
•	Précision variable mais indicative
•	Exemples : Instant Heart Rate, Cardiograph
3. Moniteurs cardiaques (investissement) :
•	Montres connectées (Xiaomi Mi Band, autres abordables)
•	Ceintures thoraciques (plus précises)
•	Disponibles Cotonou (boutiques électronique)
Objectif : Connaître sa FC repos puis utiliser pour optimiser entraînement (voir section précédente)
SECTION E : COMPORTEMENTS ALIMENTAIRES
Question 1 : Mangez-vous souvent par stress ou ennui ?
RÉPONSE : OUI
Problématique majeure : Alimentation émotionnelle vs physiologique
Identification du problème :
•	Faim physiologique : Apparaît progressivement, satisfaite par tout aliment, stoppe à satiété
•	Faim émotionnelle : Apparaît soudainement, envies spécifiques (sucré/gras), difficile à rassasier, culpabilité après
Plan de gestion (8 semaines) :
Phase 1 (Semaines 1-2) : Prise de conscience
•	Outil : Journal alimentaire émotionnel
•	Noter : Heure, aliment, quantité, émotions AVANT, faim physique (0-10)
•	Objectif : Identifier déclencheurs (stress travail, ennui soir, anxiété, tristesse)
Modèle journal :
Date | Heure | Aliment | Quantité | Émotion avant | Faim (0-10) | Contexte
Phase 2 (Semaines 3-4) : Stratégies alternatives
Remplacer l'alimentation par d'autres réponses :
Si STRESS :
•	Activité physique : Marche 10 min, danse 5 min, étirements
•	Respiration : 5 respirations profondes, cohérence cardiaque
•	Activité manuelle : Jardinage, ménage, artisanat
•	Social : Appel ami, discussion famille
•	Relaxation : Musique, lecture, prière
Si ENNUI :
•	Occupation : Hobby, projet créatif, apprentissage
•	Social : Sortie, visite, activité communautaire
•	Mouvement : Marche, danse, sport
•	Structuration : Planning activités quotidiennes
Si TRISTESSE/ANXIÉTÉ :
•	Expression : Journal intime, art, musique
•	Connexion : Soutien social, famille, amis
•	Professionnel : Psychologue si récurrent et intense
•	Spiritualité : Prière, méditation, connexion nature
Phase 3 (Semaines 5-6) : Techniques anti-compulsion
Règle des 10 minutes :
1.	Envie de manger émotionnel détectée
2.	Attendre 10 minutes
3.	Activité alternative pendant ce temps
4.	Réévaluer : Vraie faim ? Souvent, envie disparue
Technique HALT : Avant de manger, vérifier :
•	H (Hungry) : Vraie faim ?
•	A (Angry) : En colère ?
•	L (Lonely) : Seul(e) ?
•	T (Tired) : Fatigué(e) ? Si A, L, ou T → Adresser l'émotion, pas l'estomac
Phase 4 (Semaines 7-8) : Consolidation
•	Habitudes alternatives ancrées
•	Rechutes normales : apprentissage, pas échec
•	Bienveillance envers soi-même
•	Célébration des progrès
Adaptations alimentaires spécifiques :
Structure des repas anti-compulsion :
•	3 repas complets + 2 collations PLANIFIÉES
•	Jamais sauter de repas (fringales → compulsions)
•	Protéines à chaque repas (satiété prolongée)
•	Fibres abondantes (volume, satiété)
Collations anti-stress béninoises (préparées à l'avance) :
•	Croquants : Noix, graines, légumes crus
•	Frais : Fruits, yaourt nature
•	Réconfortants sains : Bouillie tiède légère, tisane
Aliments à éviter à domicile (si compulsions) :
•	Biscuits industriels
•	Chips
•	Bonbons
•	Sodas
•	Tout aliment \"déclencheur\" identifié
Aliments béninois réconfortants sains (alternatives) :
1.	Bouillie de mil tiède : Réconfort, sans excès calorique
2.	Tisane de citronnelle + miel léger : Apaisant
3.	Soupe de légumes maison : Volume, chaleur, nutrition
4.	Fruit frais mixé (smoothie sans sucre) : Sucré naturel, satiété
5.	Yaourt nature + banane : Protéine, glucides, texture crémeuse
Gestion des crises aiguës :
Si compulsion imminente :
1.	SORTIR : Quitter la cuisine, aller dehors
2.	BOUGER : Marche rapide 5-10 min
3.	BOIRE : Grand verre d'eau, tisane
4.	ATTENDRE : 10-15 minutes
5.	RÉÉVALUER : Besoin toujours présent ?
6.	SI OUI : Collation saine prévue (pas l'aliment compulsif)
Soutien social et professionnel :
•	Informer entourage proche (soutien)
•	Groupes de soutien (si disponibles)
•	Psychologue/nutritionniste (si compulsions sévères)
•	Applications : Ate Food Journal, Recovery Record
Suivi des progrès :
•	Épisodes émotionnels alimentaires : Compter par semaine
•	Objectif : Réduction progressive (pas perfection immédiate)
•	Semaine 1 : X épisodes → Semaine 8 : X/2 épisodes = SUCCÈS
RÉPONSE : NON
Situation : Excellent signe de régulation émotionnelle saine
Conseils de maintien :
•	Continuer à distinguer faims physique/émotionnelle
•	Stratégies de gestion du stress (sport, relaxation, social)
•	Vigilance en période difficile (deuil, perte emploi, etc.)
Prévention :
•	Structure des repas réguliers
•	Activités plaisir non alimentaires
•	Soutien social actif
Question 2 : Tendance à finir l'assiette même sans faim ?
RÉPONSE : OUI
Problématique : Éducation \"finir assiette\" + déconnexion signaux de satiété
Conséquences :
•	Suralimentation chronique 200-500 kcal/jour
•	Insensibilité aux signaux de satiété
•	Prise de poids progressive
•	Inconfort digestif
Causes culturelles:
•	Éducation \"ne pas gaspiller\"
•	Respect envers cuisinier
•	Contexte social (plat commun)
•	Habitudes familiales
Plan de rééducation (8 semaines) :
Phase 1 (Semaines 1-2) : Reconnecter aux signaux de satiété
Échelle de faim-satiété (1-10) :
1.	Affamé, faible 2-3. Très faim
2.	Légère faim
3.	Neutre (ni faim ni plein)
4.	Agréablement rassasié ← OBJECTIF D'ARRÊT
5.	Plein, un peu inconfortable
6.	Très plein, inconfortable 9-10. Excessivement plein, mal
Objectif : Commencer à manger à 3-4, arrêter à 6
Technique :
•	Mi-repas : Pause
Continuer
1 févr.
2 minutes, évaluer niveau (1-10)
•	Si 6 : Arrêter, même si reste
•	Si < 6 : Continuer, lentement
Phase 2 (Semaines 3-4) : Techniques de contrôle des portions
AVANT de se servir :
1.	Assiette plus petite : Trompe le cerveau (illusion volume)
2.	Se servir moins : 75% de la portion habituelle
3.	Légumes d'abord : Remplir 50% assiette de légumes
4.	Féculents limités : ¼ assiette maximum
5.	Protéines : ¼ assiette
En pratique au Bénin (plat commun) :
•	Se servir dans petite assiette individuelle
•	Quantité limitée dès le début
•	Ne pas se resservir automatiquement
•	Attendre 10 min avant resservi si faim subsiste
Phase 3 (Semaines 5-6) : Manger en pleine conscience
Techniques :
1.	Mâcher lentement : 20-30 fois par bouchée
2.	Poser couverts entre bouchées
3.	Éliminer distractions : Pas de TV, téléphone pendant repas
4.	Savourer : Goûts, textures, arômes
5.	Conversat";

            case 'regime_particulier':
                return "ions : Ralentit naturellement le rythme
Durée repas idéale : 20-30 minutes minimum";

            case 'regime_efficacite':
                return "Avantages :
•	Satiété atteinte avec moins de nourriture
•	Meilleure digestion
•	Plaisir gustatif accru
•	Connexion aux signaux corporels
Phase 4 (Semaines 7-8) : Gestion sociale et culturelle
Situations béninoises typiques :
1. Repas familial (plat commun) :
•	Solution : Se servir portion raisonnable dans assiette individuelle
•	Si pression sociale : \"J'ai bien mangé, merci, c'était délicieux\"
•	Technique : Manger lentement (autres finissent avant vous)
2. Invité chez quelqu'un :
•	Solution : Accepter portion, manger jusqu'à satiété (6/10)
•	Restes : \"C'était excellent, je suis rassasié, merci\"
•	Alternative : Demander petite portion dès le service
3. Cérémonies (abondance) :
•	Solution : Petites portions variées, dégustation vs consommation
•	Stratégie : Assiette remplie visuellement (mais portions petites)
•	Prioriser : Aliments sains (légumes, protéines maigres)
Gestion des restes :
À domicile :
•	Conservation : Restes = repas suivant ou congélation
•	Partage : Donner voisins, famille (tradition)
•	Compost : Si vraiment non consommable
•	Servir moins initialement : Prévention meilleure que gestion
Phrases utiles (sans culpabilité) :
•	\"J'écoute mon corps, je suis rassasié(e)\"
•	\"C'était délicieux, je garde le reste pour plus tard\"
•	\"Je préfère manger à ma faim pour savourer pleinement\"
Adaptations alimentaires :
Augmenter densité nutritionnelle (même portions réduites) :
•	Plus de légumes : Volume sans calories
•	Protéines de qualité : Satiété prolongée
•	Fibres : Remplissage, transit
•	Graisses saines (modération) : Satiété
Repas béninois \"anti-finir assiette\" :
Technique \"3 temps\" :
Temps 1 - Légumes (5 min) :
•	Commencer par salade ou légumes
•	Manger lentement
•	Volume d'abord
Temps 2 - Protéine + féculent (10 min) :
•	Alterner bouchées protéine et féculent
•	Pause régulières
•	Évaluer satiété à mi-chemin
Temps 3 - Finir si faim < 6/10, sinon arrêter :
•	Respect signal de satiété
•	Pas de culpabilité si reste
Exemple concret (Riz sauce arachide poulet) :
❌ AVANT (finir assiette) :
•	Service : Grande assiette remplie
•	Riz : 2 tasses
•	Sauce arachide : 1 tasse
•	Poulet : 2 gros morceaux
•	Légumes : Peu
•	Résultat : ~1200 kcal, satiété 8/10 (trop plein)
✅ APRÈS (écouter satiété) :
•	Service : Assiette moyenne
•	Temps 1 : Salade de laitue-tomates-concombre (manger d'abord)
•	Temps 2 : Riz : ½ tasse + Sauce : 2 c. à soupe + Poulet : 1 morceau moyen + Légumes cuits : Abondance
•	Pause mi-repas : Évaluation satiété
•	Si 6/10 : STOP
•	Si 4/10 : Continuer avec reste (lentement)
•	Résultat : ~600 kcal, satiété 6/10 (optimal), économie 600 kcal !
Suivi des progrès :
•	Semaine 1 : Noter % de repas où assiette finie vs arrêt à satiété
•	Objectif : Inverser progressivement
•	Semaine 8 : 80%+ des repas arrêtés à satiété 6/10
RÉPONSE : NON
Situation : Excellente connexion aux signaux de satiété !
Conseils de maintien :
•	Continuer à écouter son corps
•	Ne pas céder aux pressions sociales
•	Modèle positif pour entourage
Optimisation :
•	Servir portions justes dès le départ (moins de restes)
•	Partager recettes et astuces avec famille (éducation enfants)

Question 3 : Avez-vous déjà suivi un régime alimentaire particulier ?
RÉPONSE : OUI
Exploration nécessaire : \"Lequel et efficacité ?\"
Analyse par type de régime :
RÉGIMES RESTRICTIFS (Ex: Keto, Atkins, Très basse calorie, Jeûne strict) :
Si ÉCHEC (reprise de poids) :
Causes probables :
•	Trop restrictif, insoutenable
•	Perte rapide (eau + muscle)
•	Métabolisme ralenti
•	Frustrations → craquages
•	Pas de transition maintenance
Enseignements :
•	Approche équilibrée > restriction
•	Lenteur = durabilité
•	Intégration culturelle nécessaire
Nouvelle approche béninoise équilibrée :
•	Inclusion tous groupes alimentaires
•	Portions contrôlées vs élimination
•	Aliments béninois traditionnels adaptés
•	Progression lente (0,5-1 kg/semaine)
•	Plan de maintenance intégré
Exemple (si échec keto) :
•	Keto : Suppression glucides → Frustration pâtes, riz, igname béninois → Abandon
•	Nouvelle approche : Pâtes et riz en portions modérées, version complète, timing stratégique (matin, post-activité), environnement de légumes
Si SUCCÈS temporaire puis reprise :
Analyse : Régime = parenthèse vs mode de vie
Solution : Transition progressive vers équilibre permanent
Plan de maintenance béninois :
Phase transition (3 mois) :
•	Augmentation calorique progressive (+100 kcal/semaine)
•	Réintroduction aliments \"interdits\" modérément
•	Établissement nouvelles habitudes durables
•	Monitoring poids hebdomadaire (ajustement si +2 kg)
Phase maintenance (à vie) :
•	Règle 80/20 (80% sain, 20% flexibilité)
•	Activité physique régulière (non négociable)
•	Pesée hebdomadaire (vigilance)
•	Reprise plan strict si +3 kg
RÉGIMES \"SAINS\" (Ex: Méditerranéen, DASH, Volumétrique) :
Si SUCCÈS :
•	Excellent ! Approche scientifiquement validée
•	Continuer et personnaliser version béninoise
Adaptation béninoise du régime méditerranéen :
Principes méditerranéens → Équivalents béninois :
•	Huile d'olive → Huile d'arachide locale, avocat (modération)
•	Poissons gras → Maquereau, sardine, thon frais
•	Légumineuses → Haricots niébé, pois d'angole
•	Céréales complètes → Fonio, riz complet, mil
•	Fruits & légumes → Abondance locale (mangue, papaye, gboma, folon)
•	Noix → Cajou, arachides, graines de courge
•	Herbes & épices → Gingembre, ail, piment, basilic africain
Si ÉCHEC :
•	Analyser pourquoi (coût ? disponibilité ? culture ?)
•	Adapter version plus accessible
________________________________________
RÉGIMES \"À LA MODE\" (Ex: Détox, Soupe, Mono-aliment, Jeûne intermittent extrême) :
Si essayé et échec : Normal, non durables et potentiellement dangereux
Problèmes :
•	Carences nutritionnelles
•	Perte muscle > graisse
•	Ralentissement métabolique
•	Effet yo-yo garanti
•	Aucune éducation nutritionnelle
Message : Oublier ces approches, focus équilibre et durabilité
RÉGIMES TRADITIONNELS/CULTURELS (Ex: \"Régime de grand-mère\", plantes médicinales) :
Évaluation nuancée :
Aspects positifs (à conserver) :
•	Aliments naturels, non transformés
•	Sagesse ancestrale (certaines plantes bénéfiques)
•	Connexion culturelle
Aspects négatifs (à abandonner) :
•	Parfois trop restrictifs ou déséquilibrés
•	Croyances non scientifiques
•	Remèdes \"miracles\" inexistants
Exemples béninois :
✅ À conserver :
•	Consommation de tisanes digestives (kinkeliba, citronnelle)
•	Cuisine à base de légumes feuilles
•	Poissons frais
•	Céréales complètes traditionnelles (fonio, mil)
❌ À abandonner :
•	Purges drastiques
•	Jeûnes prolongés sans supervision
•	Remèdes \"magiques\" pour maigrir vite
•	Élimination totale de groupes alimentaires
Approche intégrative :
•	Garder sagesse traditionnelle saine
•	Ajouter connaissances scientifiques modernes
•	Créer fusion équilibrée béninoise optimale
RÉGIME MÉDICAL PRESCRIT (Ex: Diabète, HTA) :
Si suivi avec succès : Excellent, continuer
Si difficultés d'observance :
Identifier obstacles :
•	Trop restrictif ?
•	Manque de variété ?
•	Coût ?
•	Complexité ?
•	Isolement social ?
Solutions béninoises :
•	Adaptation culturelle du régime médical
•	Simplification (recettes faciles)
•	Soutien familial (impliquer dans préparation)
•	Accessibilité (aliments locaux abordables)
•	Suivi nutritionniste (si possible)
Exemple régime diabétique béninois :
❌ Prescription standard (difficile) :
•	Pain complet importé, quinoa, édulcorants artificiels, aliments spécialisés
✅ Adaptation béninoise accessible :
•	Fonio (céréale locale IG bas)
•	Légumes feuilles abondants (gboma, folon)
•	Haricots niébé
•	Poissons frais
•	Fruits locaux modérés (papaye, goyave, pamplemousse)
•	Épices locales (gingembre, ail, piment)
RÉPONSE : NON (Première tentative structurée)
Avantages :
•	Page blanche (pas de mauvaises expériences)
•	Métabolisme \"vierge\" (non endommagé par yo-yo)
•	Motivation initiale élevée
•	Opportunité d'établir bonnes bases dès le départ
Approche initiale optimale :
Phase éducation (2 premières semaines) :
•	Compréhension bases nutritionnelles
•	Identification portions adéquates
•	Lecture étiquettes (si produits transformés)
•	Planification des repas
•	Courses conscientes
Phase action (dès semaine 3) :
•	Mise en pratique des plans alimentaires
•	Recettes béninoises adaptées
•	Gestion situations sociales
•	Activité physique progressive
Phase ancrage (mois 3+) :
•	Habitudes devenues automatiques
•	Autonomie complète
•	Gestion écarts sans culpabilité
•	Mode de vie permanent (pas régime temporaire)
Objectifs réalistes première tentative :
•	Mois 1 : 2-4 kg (souvent plus : eau + début)
•	Mois 2-3 : 2-3 kg/mois (rythme durable)
•	Mois 4+ : 1-2 kg/mois (stabilisation)
•	1 an : 15-25 kg (selon poids initial) = SUCCÈS MAJEUR
Prévention abandon :
•	Soutien : Famille, amis, professionnels, groupes
•	Suivi : Pesée hebdomadaire, mesures, photos
•	Célébrations : Victoires non alimentaires (vêtements, énergie, santé)
•	Flexibilité : Pas de perfection exigée, 80/20
•	Réajustement : Si plateau > 1 mois, analyser et adapter";

            default:
                return 'Aucun';
        }
    }
}
