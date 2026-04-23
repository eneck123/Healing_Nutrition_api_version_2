<?php

namespace App\Services;

class WeightLossOver10NoPathologyRecommendationService implements RecommendationServiceInterface
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = [], int $age = 30): string
    {
        switch ($key) {
            case 'meds_lies':
                return "on 5 : Prenez-vous actuellement l'un des types de médicaments suivants ?
OPTION 1 : Médicaments pour baisser la glycémie (ex : metformine, glimepiride…)
Conseils spécifiques avec metformine :
•	Prendre pendant ou après les repas pour réduire les troubles digestifs
•	Augmenter les fibres pour améliorer la tolérance
•	Répartir les glucides sur tous les repas
•	Éviter l'alcool (risque d'acidose lactique)
•	Vitamine B12 : La metformine peut réduire son absorption → consommer foie, poisson, œufs, produits laitiers
⚠️ ATTENTION :
•	Ne jamais sauter de repas
•	Éviter les repas trop riches en graisses (ralentissement digestif)
•	Hydratation importante (2,5L/jour)
Conseils avec sulfamides hypoglycémiants (glimepiride, gliclazide) :
•	Risque d'hypoglycémie : Ne JAMAIS sauter de repas
•	Collations obligatoires entre les repas
•	Glucides à IG bas à chaque repas
•	Avoir toujours avec soi une source de sucre rapide (fruit, jus)
Plan anti-hypoglycémie :
•	3 repas + 2-3 collations OBLIGATOIRES
•	Glucides complexes à chaque prise alimentaire
•	Surveillance des signes d'hypoglycémie (tremblements, sueurs, faim intense)
OPTION 2 : Insuline
Conseils nutritionnels avec insuline :
•	Comptage des glucides essentiel
•	Timing précis : Synchroniser repas et injections
•	Portions constantes de glucides à chaque repas (si insuline fixe)
•	Collations planifiées selon le schéma insulinique
•	Index glycémique bas pour éviter les pics
OPTION 3 : Médicaments pour perdre du poids (ex : orlistat, liraglutide…)
Conseils avec orlistat :
•	Réduire les graisses : Maximum 15g par repas (risque d'effets secondaires digestifs)
•	Vitamines liposolubles (A, D, E, K) : Prendre 2h avant ou après orlistat
•	Fibres élevées pour compenser
•	Hydratation importante
⚠️ ÉVITER ABSOLUMENT :
•	Sauces grasses (sauce graine, arachide)
•	Fritures
•	Viandes grasses
•	Avocat en excès
•	Noix et graines
Conseils avec liraglutide (GLP-1) :
•	Effet coupe-faim : Respecter les signaux de satiété
•	Petites portions : Manger lentement
•	Nausées possibles : Éviter aliments gras et épicés au début
•	Repas fractionnés si nausées
•	Hydratation entre les repas
💡 ASTUCE : Arrêter de manger dès les premiers signes de satiété, même si l'assiette n'est pas fini
OPTION 4 : Médicaments pour la tension artérielle (ex : IEC, ARA2, bêta-bloquants…)
Conseils avec IEC/ARA2 :
•	Attention au potassium : Peut s'accumuler → modérer bananes, avocats, oranges si taux sanguin élevé
•	Réduction du sel stricte (5g/jour max)
•	Hydratation correcte (pas excessive)
•	Éviter pamplemousse (certains IEC)
Conseils avec bêta-bloquants :
•	Peuvent masquer hypoglycémie chez diabétiques
•	Prise de poids possible : Contrôler portions
•	Fatigue : Repas énergétiques mais légers
•	Réduction sel toujours nécessaire
OPTION 5 : Médicaments pour le cholestérol (ex : statines)
Conseils avec statines :
•	Réduire graisses saturées : Limiter huile de palme, viandes grasses
•	Augmenter fibres solubles : Avoine, haricots, légumes
•	Oméga-3 : Poisson gras 3-4 fois/semaine
•	Éviter pamplemousse (interaction avec certaines statines)
•	Coenzyme Q10 : Les statines peuvent en réduire les niveaux → consommer viandes maigres, poisson, noix
✅ ALIMENTS ANTI-CHOLESTÉROL :
•	Avoine, son d'avoine
•	Haricots, lentilles, pois
•	Pommes, oranges, fruits rouges
•	Poissons gras (maquereau, sardines, thon)
•	Noix, amandes
•	Huile d'olive
•	Légumes verts à feuilles
⚠️ ÉVITER :
•	Huile de palme en excès
•	Viandes grasses, abats
•	Fritures multiples
•	Pâtisseries industrielles
•	Charcuterie
OPTION 6 : Aucun de ces médicaments
Conseils : Si vous avez des antécédents médicaux mais ne prenez aucun médicament actuellement :
•	Gestion diététique prioritai";

            case 'journee_typique':
                return "re
•	Suivi médical régulier pour surveiller l'évolution
•	Rigueur maximale dans l'application des recommandations nutritionnelles
•	Activité physique régulière indispensable
📋 SECTION 2 : HABITUDES ALIMENTAIRES
Question 6 : Pouvez-vous décrire une journée typique de vos repas et collations ? (Question ouverte)
Cette question est primordiale car dans le cas actuel où vous êtes sans antécédents métaboliques, cela nous sera utile pour";

            case 'fruits_legumes':
                return "mettre en place votre plan nutritionnel en nous basant sur une :
	Évaluer l’équilibre alimentaire
	Identifier des habitudes à améliorer
	Prévenir la prise de poids et les maladies futures
	Adapter des conseils simples et durables
Question 7 : Combien de portions de fruits et légumes consommez-vous par jour ?
RÉPONSE : 1-2 portions
❌ INSUFFISANT ! Objectif : Minimum 5 portions/jour
Conseils pour augmenter :
1.	Ajouter des fruits au petit-déjeuner : banane, orange, papaye
2.	Salade à CHAQUE repas principal : tomate, concombre, laitue, chou
3.	Légumes dans les sauces : épinards, gombo, aubergines, poivrons
4.	Collations à base de fruits : pomme, mangue, orange
5.	Légumes vapeur en accompagnement : carotte, haricots verts
Plan d'action progressif :
Semaine 1 - Objectif 3 portions :
•	Petit-déjeuner : 1 fruit
•	Déjeuner : 1 portion légumes (salade ou légumes cuits)
•	Collation : 1 fruit
Semaine 2-3 - Objectif 5 portions :
•	Petit-déjeuner : 1 fruit
•	Collation matin : 1 fruit
•	Déjeuner : Salade + légumes dans la sauce = 2 portions
•	Dîner : Légumes vapeur = 1 portion
Exemples de repas riches en fruits/légumes :
Petit-déjeuner :
•	Bouillie  + omelette aux légumes (tomates, oignons, poivrons) + 1 orange + 1/2 papaye
Déjeuner :
•	Riz + sauce feuille d'épinards et gombo + poulet + salade mixte (laitue, tomates, concombre, carotte râpée)
Collation :
•	Smoothie fruits (banane, mangue, ananas) 
Dîner :
•	Igname + sauce tomate aux aubergines et poivrons + poisson + légumes vapeur (carotte, haricots verts)
💡 1 PORTION = :
•	1 fruit moyen (pomme, orange, banane)
•	1 tasse de légumes crus
•	1/2 tasse de légumes cuits
•	1/2 tasse de jus 100% pur (occasionnel)
RÉPONSE : 3-4 portions
✅ BON DÉBUT ! Objectif : Atteindre 5+ portions
Conseils d'optimisation :
•	Ajouter 1 portion supplémentaire par jour
•	Varier les couleurs : rouge (tomate), vert (épinards), orange (carotte, papaye), jaune (banane, ananas)
•	Privilégier les fruits/légumes de saison (moins chers, plus nutritifs)
Plan pour passer à 5-7 portions :
Stratégie 1 : Doubler les portions de légumes
•	Au lieu de 100g de salade → 200g
•	Au lieu de 150g de légumes dans la sauce → 250g
Stratégie 2 : Ajouter une collation fruit
•	Collation supplémentaire à 10h ou 21h
Exemple de journée à 6 portions :
•	Petit-déjeuner : 1 banane + tomates dans l'omelette = 2 portions
•	Collation : 1 pomme = 1 portion
•	Déjeuner : Salade + sauce feuille = 2 portions
•	Dîner : Légumes vapeur = 1 portion Total : 6 portions
RÉPONSE : 5 ou plus
🎉 EXCELLENT ! Objectif : Maintenir et diversifier
Conseils de maintien :
•	Continuer sur cette lancée
•	Varier au maximum les types de fruits et légumes
•	Privilégier les légumes verts à feuilles (épinards, amarante, chou)
•	Consommer des fruits/légumes de toutes les couleurs pour maximiser les antioxydants
Diversification recommandée :
Légumes verts :
•	Épinards (gboma dessi)
•	Amarante (tété)
•	Chou, laitue
•	Haricots verts
•	Gombo
Légumes oranges/rouges :
•	Tomates
•	Carottes
•	Poivrons rouges
•	Aubergines
•	Betteraves
Fruits";

            case 'grignotage':
                return ":
•	Papaye, mangue, ananas (riches en vitamines)
•	Orange, mandarine (vitamine C)
•	Banane (potassium)
•	Pomme, goyave
•	Fruits de la passion
Plan optimal (7-9 portions) :
•	Petit-déjeuner : 2 portions (fruit + légumes dans omelette)
•	Collation matin : 1 fruit
•	Déjeuner : 3 portions (salade abondante + légumes dans sauce)
•	Collation après-midi : 1 fruit
•	Dîner : 2 portions (légumes vapeur + salade)
Question 8 : Grignotez-vous entre les repas ?
✅ RÉPONSE : OUI
⚠️ ATTENTION : Le grignotage peut saboter vos efforts de perte de poids !
Conseils généraux :
•	Identifier les déclencheurs : stress, ennui, habitude, faim réelle ?
•	Structurer les collations : 2 collations planifiées par jour maximum
•	Choisir des aliments sains (voir liste ci-dessous)
•	Portions contrôlées : Ne pas manger directement du paquet

Question 9 : Si oui, quels aliments consommez-vous ? (Question ouverte)
Analyse selon les réponses et corrections :
❌ CAS 1 : \"Je grignote des beignets, gâteaux, bonbons, chips\"
PROBLÈME : Aliments ultra-transformés, riches en sucres/graisses/sel
IMPACT :
•	Apport calorique excessif (500-1000 kcal supplémentaires/jour)
•	Pics glycémiques suivis de fringales
•	Inflammation
•	Accumulation de graisses viscérales
SOLUTIONS :
Substitutions saines (collations béninoises) :
❌ À REMPLACER	✅ PAR
Beignets sucrés (200 kcal)	1 banane + 10 arachides (150 kcal)
Gâteaux (250 kcal)	Smoothie fruits maison (120 kcal)
Chips (150 kcal/paquet)	Bâtonnets carotte + concombre + houmous (80 kcal)
Bonbons (100 kcal)	1 pomme + 5 amandes (100 kcal)
Biscuits (200 kcal)	Yaourt nature + fruits (120 kcal)
Collations saines béninoises (150-200 kcal) :
1.	Akara santé (2 petites galettes) + tisane 
o	Préparation : Haricots mixés, peu d'huile, cuisson au four si possible
2.	Fruits frais variés 
o	1 mangue moyenne
o	1/2 papaye
o	2 oranges
o	1 banane + 10 arachides grillées
3.	Yaourt nature local + fruits 
o	150ml yaourt + morceaux de mangue/papaye
4.	Bâtonnets de légumes + trempette 
o	Carotte, concombre, poivrons + houmous maison (pois chiches)
5.	Tapioca léger 
o	100g gari trempé + lait fermenté + 1 fruit
6.	Noix et graines (portions contrôlées) 
o	15-20 arachides grillées non salées
o	10-15 noix de cajou
o	Mélange de graines (10g)
7.	Smoothie vert 
o	Épinards + banane + ananas + lait local (300ml)
8.	Maïs grillé (épis) 
o	1 épi de maïs grillé sans beurre
✅ CAS 2 : \"Je grignote des fruits, noix, yaourt\"
BIEN ! Mais attention aux quantités
Conseils d'optimisation :
•	Contrôler les portions de noix : Max 30g/jour (20-25 unités) - très caloriques
•	Yaourt nature sans sucre : Éviter les yaourts sucrés industriels
•	Fruits : 2-3 par jour en collation : Privilégier fruits à IG bas (pomme, orange) vs fruits très sucrés (banane très mûre, mangue très sucrée)
Collations optimales :
1.	1 pomme + 10 amandes (150 kcal)
2.	Yaourt nature 150ml + baies locales (120 kcal)
3.	1 orange + 15 arachides (130 kcal)
4.	Smoothie banane-lait (200ml) (150 kcal)
⚠️ PIÈGES À ÉVITER :
•	Manger un sachet entier de noix (600 kcal !)
•	Yaourts aromatisés sucrés (= bonbons liquides)
•	Jus de fruits industriels (= sodas)
•	Fruits séchés en excès (très concentrés en sucre)
❌ CAS 3 : \"Je mange du pain, du froma";

            case 'boissons':
                return "ge, de la charcuterie\"
PROBLÈME : Aliments caloriques, gras, salés
SUBSTITUTIONS :
•	Pain blanc → Pain complet (petites portions)
•	Fromage gras → Fromage wagashi frais (fromage local béninois, faible en gras)
•	Charcuterie → Poisson fumé (petite quantité) ou œufs durs
Collations améliorées :
1.	Au lieu de : Sandwich jambon-fromage (400 kcal) CHOISIR : 1 tranche pain complet + avocat (1/4) + tomate (150 kcal)
2.	Au lieu de : Fromage + crackers (300 kcal) CHOISIR : Wagashi (50g) + bâtonnets légumes (100 kcal)
❌ CAS 4 : \"Je bois beaucoup de jus de fruits, sodas, boissons sucrées\"
GRAVE PROBLÈME : Calories liquides = prise de poids rapide
IMPACT :
•	1 canette soda = 140 kcal = 35g sucre (7 morceaux !)
•	1 verre jus industriel = 120 kcal = 25g sucre
•	Le cerveau ne \"compte\" pas les calories liquides → surconsommation
SOLUTIONS RADICALES :
❌ À SUPPRIMER TOTALEMENT :
•	Sodas (Coca, Fanta, Sprite, etc.)
•	Jus industriels (Malta Guiness, etc.)
•	Boissons énergétiques sucrées
•	Thés glacés sucrés
✅ À BOIRE :
1.	EAU (2-3L/jour) - zéro calorie
2.	Tisanes locales non sucrées : 
o	Citronnelle
o	Gingembre
o	Kinkeliba
3.	Eau infusée : 
o	Eau + r
Continuer
20:12
citron + menthe
•	Eau + concombre + citron
4.	Jus naturels maison DILUÉS (occasionnel, 1-2 fois/semaine) : 
o	Orange pressée (1 orange + 200ml eau)
o	Ananas mixé (dilué 50% eau)
5.	Lait fermenté local non sucré
💡 ASTUCE : Si vous avez l'habitude du sucré, sevrage progressif :
•	Semaine 1-2 : Diluer les jus moitié-moitié avec de l'eau
•	Semaine 3-4 : 1/4 jus + 3/4 eau
•	Semaine 5+ : Eau pure ou tisanes
❌ RÉPONSE : NON
✅ EXCELLENT ! Maintenir cette habitude
Conseils :
•	Si pas de grignotage car pas de faim → Parfait, continuer
•	Si pas de grignotage mais grosses fringales → Ajouter 2 collations saines planifiées pour éviter la suralimentation aux repas principaux
Plan optimal :
•	3 repas principaux équilibrés
•	2 collations saines si nécessaire (10h et 16h)
•	Hydratation régulière
Question 10 : À quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?
❌ RÉPONSE : Tous les jours
🚨 URGENCE ! Impact majeur sur la perte de poids
IMPACT DES BOISSONS SUCRÉES QUOTIDIENNES :
•	Apport calorique : 500-1000 kcal/jour supplémentaires !
•	Résistance à l'insuline : Risque de diabète
•	Accumulation graisses viscérales : Obésité abdominale
•	Inflammation chronique
•	Addiction au sucre : Cercle vicieux
CALCUL ÉDIFIANT :
•	1 soda/jour = 50 000 kcal/an = +7 kg de graisse/an !
•	2 sodas/jour = +14 kg/an !
PLAN DE SEVRAGE RADICAL :
Semaine 1 : Réduction de 50%
•	Si 4 sodas/jour → 2 sodas/jour
•	Remplacer les autres par eau/tisane
Semaine 2 : Réduction de 75%
•	Si 2 sodas/jour → 1 soda tous les 2 jours
•	Augmenter eau à 2L/jour
Semaine 3 : Réduction de 90%
•	1 soda tous les 4-5 jours
•	Découvrir le plaisir de l'eau
Semaine 4+ : ARRÊT TOTAL
•	0 soda
•	Eau, tisanes uniquement
•	1 jus naturel/semaine max
SUBSTITUTS POUR LES \"ENVIES DE SUCRÉ\" :
1.	Eau gazeuse + citron : Sensation pétillante sans calories
2.	Tisane glacée : Gingembre-citron-menthe refroidi
3.	Eau infusée : Fruits frais macérés (orange, ananas, menthe)
4.	Eau de coco naturelle (occasionnel)
IMPACT DE L'ALCOOL QUOTIDIEN :
•	Calories vides : 7 kcal/g (presque autant que les graisses !)
•	Ralentissement métabolisme : Le foie traite l'alcool en priorité → stockage des graisses
•	Stimulation appétit : Fringales nocturnes
•	Sommeil perturbé : Impact sur la perte de poids
•	Risques santé : Foie, cardiovasculaire, cancer
EXEMPLES CALORIQUES (ALCOOL) :
•	1 bière (33cl) = 150 kcal
•	1 verre vin (15cl) = 120 kcal
•	1 whisky-cola = 200 kcal
•	1 cocktail sucré = 300 kcal
Si alcool quotidien :
PLAN D'ARRÊT PROGRESSIF :
•	Semaine 1 : Réduire de moitié (si 4 verres/jour → 2 verres/jour)
•	Semaine 2-3 : 1 verre/jour maximum
•	Semaine 4+ : Réserver pour occasions (1-2 fois/mois)
JOURS SANS ALCOOL :
•	Objectif : Minimum 5 jours/semaine sans alcool
•	Idéalement : Arrêt complet pendant la perte de poids
⚠️ RÉPONSE : Une fois par semaine
ACCEPTABLE MAIS VIGILANCE
Conseils :
•	Limiter à 1 occasion/semaine
•	Choisir la moins calorique : 
o	✅ Eau gazeuse + citron = 0 kcal
o	⚠️ 1 verre vin = 120 kcal
o	❌ 1 soda = 140 kcal
o	❌ 1 cocktail = 300 kcal
Si c'est une boisson sucrée :
•	Limiter à 1 verre (250ml) lors d'occasions spéciales
•	Compenser en réduisant les glucides au repas correspondant
•	Boire avant/après de l'eau
Si c'est de l'alcool :
•	Maximum 1-2 verres lors de l'occasion
•	Choisir vin rouge (antioxydants) > bière > spiritueux sucrés
•	Alterner chaque verre d'alcool avec 1 verre d'eau
•	Manger avant de boire (ralentit absorption)
•	Éviter les mélanges sucrés (cola,";

            case 'sommeil':
                return "jus)
✅ RÉPONSE : Occasionnellement
BIEN ! Objectif : Maintenir cette fréquence
Définition \"occasionnel\" = 1-2 fois/mois maximum
Conseils pour les occasions :
1.	Planifier : Anticiper les événements (mariages, fêtes)
2.	Compenser : Repas léger avant/après
3.	Portions : 1 verre uniquement
4.	Hydratation : Doubler l'eau ce jour-là
5.	Pas de culpabilité : Reprendre normalement le lendemain
🏆 RÉPONSE : Jamais
PARFAIT ! Félicitations !
Conseils de maintien :
•	Continuer cette excellente habitude
•	Profiter des bienfaits : hydratation optimale, économies, santé
•	Inspirer votre entourage
Alternatives plaisir sans calories :
1.	Tisanes variées (chaudes ou glacées)
2.	Eau infusée maison
3.	Café noir (avec modération)
4.	Lait fermenté local nature
📋 SECTION 3 : COMPORTEMENTS ET BIEN-ÊTRE
Question 11 : Combien d'heures de sommeil avez-vous par nuit ?
❌ RÉPONSE : Moins de 6h
🚨 GRAVE PROBLÈME ! Le manque de sommeil = prise de poids assurée
IMPACT DU MANQUE DE SOMMEIL SUR LE POIDS :
1.	Hormones perturbées : 
o	↑ Ghréline (hormone de la faim) +15%
o	↓ Leptine (hormone de satiété) -15%
o	Résultat : Faim intense, surtout d'aliments gras/sucrés
2.	Métabolisme ralenti : -5 à 20% de calories brûlées
3.	Résistance à l'insuline : Stockage de graisse abdominale
4.	Fatigue : Moins d'activité physique, plus de grignotage
5.	Cortisol élevé : Stress chronique → stockage graisses viscérales
DONNÉES SCIENTIFIQUES :
•	Dormir <6h = Risque d'obésité +55%
•	Chaque heure de sommeil en moins = +0,5 kg/an
PLAN D'ACTION POUR AMÉLIORER LE SOMMEIL :
1. Hygiène du sommeil :
•	Horaires réguliers : Coucher/lever à heures fixes (même week-end)
•	Objectif : 7-9h/nuit
•	Rituel pré-sommeil : 30 min avant, activités calmes
•	Chambre optimale : Obscurité, fraîcheur (18-20°C), silence
2. Alimentation pro-sommeil :
✅ ALIMENTS FAVORISANT LE SOMMEIL :
•	Tryptophane : Banane, lait fermenté, noix, poisson
•	Magnésium : Épinards, haricots, bananes, avocat
•	Glucides complexes : Igname, patate douce (petite portion le soir)
Collation pré-sommeil (1-2h avant coucher) :
•	Option 1 : 1 banane + lait fermenté chaud (150ml)
•	Option 2 : Tisane camomille + 5 amandes
•	Option 3 : Yaourt nature + 1 c.à.c miel
❌ À ÉVITER LE SOIR :
•	Caféine après 15h (café, thé, cola)
•	Repas très copieux tard le soir
•	Alcool (perturbe le sommeil profond)
•	Écrans 1-2h avant coucher (lumière bleue)
•	Exercice intense 3h avant coucher
3. Dîner optimal pour le sommeil :
•	Horaire : 19h-20h (2-3h avant coucher)
•	Composition : Léger, digeste
Exemple dîner pro-sommeil :
•";

            case 'apnee':
                return "Patate douce bouillie + sauce tomate légère + poisson grillé + salade
•	Tisane verveine 1h après
4. Techniques relaxation :
•	Respiration profonde (5 min)
•	Étirements doux
•	Lecture (livre papier)
•	Musique douce
•	Prière/méditation
CALENDRIER DE SOMMEIL CIBLE :
•	22h00 : Début rituel (douche, lecture)
•	22h30 : Coucher
•	23h00 : Endormissement
•	06h30-07h00 : Réveil naturel = 7,5-8h de sommeil
⚠️ RÉPONSE : 6h-7h
LIMITE BASSE ! Objectif : 7-9h
Conseils :
•	Ajouter 30-60 min de sommeil
•	Appliquer conseils d'hygiène du sommeil ci-dessus
•	Surveiller signes de fatigue
Dîner adapté (léger, tôt) :
•	Attiéké + sauce claire + poisson  + légumes
•	Éviter les graisses lourdes le soir
✅ RÉPONSE : 8h-9h
OPTIMAL ! Maintenir
Conseils :
•	Continuer cette excellente habitude
•	Horaires réguliers
•	Qualité du sommeil aussi importante que quantité
⚠️ RÉPONSE : Plus de 9h
ATTENTION ! Excès de sommeil peut indiquer un problème
Causes possibles :
•	Apnée du sommeil (voir question suivante)
•	Dépression
•	Hypothyroïdie
•	Mauvaise qualité du sommeil (nombreux réveils)
•	Sédentarité excessive
Conseils :
•	Consulter un médecin si sommeil >10h régulièrement
•	Vérifier la qualité du sommeil
•	Augmenter l'activité physique
•	Dîner encore plus léger
Question 12 : Avez-vous l'apnée du sommeil ?
✅ RÉPONSE : OUI
🚨 PROBLÈME MAJEUR pour la perte de poids !
LIEN APNÉE DU SOMMEIL ↔ OBÉSITÉ :
•	Cercle vicieux : Obésité → Apnée → Fatigue → Inactivité → Obésité
•	L'apnée perturbe les hormones de faim/satiété
•	Sommeil fragmenté = métabolisme ralenti
•	Risque cardiovasculaire élevé
CONSEILS NUTRITIONNELS SPÉCIFIQUES :
1. Perte de poids PRIORITAIRE :
•	Perdre 10% du poids = Réduction 50% des apnées
•	Suivre rigoureusement le plan alimentaire
•	Déficit calorique modéré (-600 kcal/jour)
2. Éviter certains aliments le soir :
❌ INTERDITS LE SOIR :
•	Alcool (relaxe muscles gorge → plus d'apnées)
•	Repas très copieux (pression diaphragme)
•	Aliments inflammatoires (produits laitiers en excès pour certains)
•	Aliments allergènes (congestion nasale)
3. Dîner anti-apnée (exemple) :
•	17h30-19h : Dîner tôt et léger
•	Poisson grillé + légumes vapeur abondants + 1 petite patate douce
•	Tisane digestive (gingembre-citron)
•	RIEN 3h avant coucher
4. Collation pré-sommeil (si faim) :
•	1 petite banane (tryptophane pour sommeil)
•	OU tisane verveine
5. Position de sommeil :
•	Dormir sur le côté (pas sur le dos)
•	Surélever légèrement la tête du lit
6. Aliments anti-inflammatoires :
Privilégier quotidiennement :
•	Poissons gras (maquereau, sardines) : 3-4 fois/semaine
•	Légumes verts à feuilles : épinards, amarante (tous les jours)
•	Fruits rouges et oranges : papaye, mangue, orange
•	Gingembre frais (anti-inflammatoire puissant)
•	Curcuma dans les sauces
•	Ail et oignon (tous les jours)
•	Huile d'olive (modération)
7. Hydratation stratégique :
•	2-3L d'eau/jour MAIS
•	Réduire après 18h (éviter réveils nocturnes pour uriner)
•	Derni�";

            case 'regime_recent':
                return "�re grande prise d'eau : 17h
8. Suppléments possibles (avec avis médical) :
•	Magnésium (relaxation musculaire)
•	Vitamine D (si carence)
•	Oméga-3
PLAN DE REPAS QUOTIDIEN ANTI-APNÉE :
Petit-déjeuner (7h) :
•	Bouillie d'avoine + graines de lin + fruits rouges + noix
Collation (10h) :
•	1 pomme + 10 amandes
Déjeuner (12h30) :
•	Riz complet + sauce tomate au curcuma et gingembre + sardines grillées + salade verte abondante
Collation (15h30) :
•	Smoothie anti-inflammatoire (épinards, ananas, gingembre) (250ml)
Dîner LÉGER et TÔT (18h) :
•	Légumes vapeur variés (300g) + poisson maigre grillé (100g) + 1 petite patate douce (100g)
Tisane (20h) - 2h avant coucher :
•	Gingembre-citron-miel (1 c.à.c)
⚠️ SUIVI MÉDICAL OBLIGATOIRE :
•	Appareillage CPAP si prescrit
•	Consultations régulières ORL/pneumologue
•	Surveillance poids et tour de cou
❌ RÉPONSE : NON
✅ BON POINT !
Conseils préventifs :
•	Maintenir un poids santé (IMC <25)
•	Éviter l'alcool le soir
•	Dormir sur le côté
•	Surveiller les ronflements (signe précurseur)
Si vous ronflez fort ou ressentez fatigue diurne excessive : → Consulter pour dépistage (questionnaire STOP-BANG, polysomnographie)
Question 13 : Avez-vous récemment fait un régime de perte de poids ?
✅ RÉPONSE : OUI
Question 14 : Si oui, combien de poids avez-vous perdu ?
RÉPONSE : Moins de 5 kg
ANALYSE :
•	Perte modeste : Peut indiquer début de démarche ou difficultés
•	Risque de découragement si efforts importants
Conseils :
•	Patience : Perte saine = 0,5-1 kg/semaine
•	Persévérance : Les premiers kg sont les plus lents
•	Ajustements : Peut-être revoir le plan alimentaire
Plan de relance :
1. Évaluer le régime précédent :
•	Trop restrictif ? → Risque d'abandon
•	Pas assez structuré ? → Besoin de plan précis
•	Manque d'activité physique ? → Ajouter exercice
2. Nouveau départ avec plan équilibré :
•	Suivre les plans de repas de ce guide selon votre niveau d'activité
•	Déficit calorique modéré (-500 kcal/jour = -0,5 kg/semaine)
•	3 repas + 2 collations structurés
3. Objectifs réalistes :
•	Mois 1 : -2 à 4 kg
•	Mois 2-3 : -2 à 3 kg/mois
•	Mois 4-6 : -1,5 à 2,5 kg/mois
•	Total 6 mois : -10 à 15 kg
4. Suivi rigoureux :
•	Pesée 1 fois/semaine (même jour, même heure, à jeun)
•	Mesures tour de taille, hanches (tous les 15 jours)
•	Photos (tous les mois)
•	Journal alimentaire
RÉPONSE : 5-10 kg
✅ BONNE PERTE ! Mais vigilance
ANALYSE :
•	Perte significative : Efforts ont porté leurs fruits
•	DANGER : Risque de reprise (effet yo-yo)
•	Zone critique : Besoin de stabilisation avant poursuite
Conseils ESSENTIELS :
1. Phase de stabilisation (2-4 semaines) :
•	Objectif : Maintenir le poids perdu
•	Arrêter déficit calorique
•	Passer à maintenance calorique
•	Consolider nouvelles habitudes
Plan de stabilisation :
•	Calories de maintenance = Métabolisme de base × niveau d'activité
•	Exemple : Si perte avec 1400 kcal/jour → Stabiliser à 1600-1700 kcal/jour
•	Augmenter progressivement (+100 kcal/semaine)
•	Surveiller le poids (ne doit pas remonter)
2. Après stabilisation, 2 options :
OPTION A : Continuer la perte (si objectif non atteint)
•	Reprendre déficit modéré (-300 à -500 kcal/jour)
•	Objectif : 5-10 kg supplémentaires sur 3-6 mois
•	Suivre plans de ce guide
OPTION B : Maintenir le poids actuel
•	Si poids santé atteint
•	Suivre plan de maintenance
•	Activité physique régulière
•	Suivi à vie
3. Éviter l'effet yo-yo :
❌ ERREURS À NE PAS FAIRE :
•	Reprendre anciennes habitudes
•	Arrêter l'activité physique
•	Régimes drastiques à répétition
•	Se peser trop souvent (stress)
✅ HABITUDES À MAINTENIR À VIE :
•	3 repas équilibrés/jour
•	5 portions fruits/légumes
•	Protéines à chaque repas
•	Limiter sucres/graisses saturées
•	Activité physique 3-5 fois/semaine
•	Sommeil 7-9h/nuit
•	Gestion du stress
•	Hydratation 2-3L/jour
RÉPONSE : Plus de 10 kg
🎉 EXCELLENTE PERTE ! Mais ATTENTION MAXIMALE
ANALYSE :
•	Perte majeure : Efforts exceptionnels
•	RISQUE MAJEUR d'effet yo-yo (90% reprennent le poids)
•	Métabolisme adaptatif : Corps résiste à la perte
•	Besoin de stratégie long terme STRICTE
DONNÉES SCIENTIFIQUES :
•	Après perte >10 kg : Métabolisme ralenti de 10-25%
•	Hormones de faim perturbées pendant 1-2 ans
•	Ghréline élevée (faim intense)
•	Leptine basse (satiété réduite)
STRATÉGIE ANTI-REPRISE (CRUCIALE) :
1. Phase de stabilisation OBLIGATOIRE (3-6 mois minimum) :
Objectif : Permettre au corps de s'adapter au nouveau poids
Règles strictes :
•	AUCUNE reprise pondérale tolérée (max +1 kg de fluctuation)
•	Pesée 2 fois/semaine (même conditions)
•	Tour de taille hebdomadaire
•	Si +1,5 kg → Retour immédiat à déficit 3-5 jours
Calories de stabilisation :
•	Augmenter progressivement de 100 kcal/semaine
•	Atteindre maintenance en 4-6 semaines
•	Exemple : 1300 kcal → 1400 (sem 1) → 1500 (sem 2) → ... → 1700-1800 (maintenance)
3. Activité physique OBLIGATOIRE à vie :
Pourquoi ? Le métabolisme est ralenti, il faut compenser
Minimum requis :
•	150-300 min/semaine activité modérée
•	OU 75-150 min/semaine activité intense
•	Musculation 2-3 fois/semaine (préserver masse musculaire)
Exemple semaine type :
•	Lundi : Marche rapide 45 min
•	Mardi : Musculation 30 min
•	Mercredi : Repos ou yoga
•	Jeudi : Marche/vélo 45 min
•	Vendredi : Musculation 30 min
•	Samedi : Sport/danse 60 min
•	Dimanche : Marche 30 min
4. Surveillance stricte À VIE :
Indicateurs à suivre :
•	Poids : 1 fois/semaine (variation max ±2 kg)
•	Tour de taille : 2 fois/mois (hommes <94 cm, femmes <80 cm)
•	Vêtements : Doivent toujours aller (alerte précoce)
•	Énergie : Fatigue = possible reprise habitudes
Règle d'or : Action immédiate si +2 kg
•	Retour strict au plan perte pendant 1-2 semaines
•	Déficit -500 kcal/jour
•	Activité physique intensifiée
•	Ne JAMAIS laisser le poids grimper >3 kg
5. Gestion psychologique :
Défis post-perte majeure :
•	Faim intense chronique
•	Obsession nourriture
•	Pression sociale (\"Tu es trop maigre\")
•	Fatigue décisionnelle alimentaire
Solutions :
•	Automatiser : Repas similaires semaine (moins de décisions)
•	Structure : Horaires fixes, jamais sauter repas
•	Soutien : Groupe, famille, professionnel
•	Acceptation : La vigilance est permanente (pas temporaire)
6. Si nouvelle perte souhaitée :
STOP ! Attendre 6 mois minimum
Pourquoi ?
•	Corps doit s'adapter au nouveau poids
•	Risque de ralentissement métabolique extrême
•	Dangers santé (carence, fonte musculaire)
Si perte supplémentaire nécessaire après stabilisation :
•	Maximum 5 kg sur 6-12 mois
•	Déficit très modéré (-250 kcal/jour)
•	Sous surveillance médicale
❌ RÉPONSE : NON
Premier régime ? Ou longue période sans régime ?
AVANTAGES :
•	Métabolisme non perturbé par yo-yo
•	Meilleures chances de succès
•	Motivation élevée
📋 SECTION 4 : ACTIVITÉ PHYSIQUE
Question 15 : Combien de jours par semaine pratiquez-vous une activité physique ?
❌ RÉPONSE : Aucun
🚨 PROBLÈME MAJEUR ! L'activité physique est ESSENTIELLE pour la perte de poids
POURQUOI L'EXERCICE EST CRUCIAL :
1.	Dépense calorique : 200-600 kcal brûlées/séance
2.	Préservation masse musculaire : Sans exercice, 25% de la perte est du muscle !
3.	Métabolisme : +10-15% de calories brûlées au repos avec musculation
4.	Insuline : Meilleure sensibilité (anti-diabète)
5.	Humeur : Endorphines, moins de stress/grignotage
6.	Cardiovasculaire : Réduction risques santé
7.	Sommeil : Amélioration qualité
8.	Maintien poids : 90% des gens qui maintiennent font de l'exercice régulièrement
PLAN DE DÉMARRAGE PROGRESSIF (12 SEMAINES) :
SEMAINE 1-2 : Initiation (2 jours/semaine)
•	Activité : Marche lente 15-20 min
•	Jours : Mardi + Samedi
•	Objectif : Créer l'habitude
SEMAINE 3-4 : Progression (3 jours/semaine)
•	Activité : Marche modérée 25-30 min
•	Jours : Lundi, Mercredi, Samedi
•	Objectif : Augmenter durée
SEMAINE 5-6 : Intensification (3 jours/semaine)
•	Activité : Marche rapide 30-35 min
•	Ajout : Quelques accélérations (1 min rapide / 3 min normal)
•	Jours : Lundi, Mercredi, Samedi
SEMAINE 7-8 : Diversification (4 jours/semaine)
•	Lundi : Marche rapide 35 min
•	Mercredi : Exercices maison 20 min (squats, pompes murales, gainage)
•	Vendredi : Marche 30 min
•	Dimanche : Activité plaisir (danse, vélo, natation) 30 min
SEMAINE 9-12 : Routine établie (5 jours/semaine)
•	Lundi : Cardio 40 min (marche rapide/vélo)
•	Mardi : Musculation 30 min
•	Mercredi : Repos ou yoga/étirements
•	Jeudi : Cardio 40 min
•	Vendredi : Musculation 30 min
•	Samedi : Activité longue 60 min (marche, sport)
•	Dimanche : Repos actif (marche légère 20 min)
ACTIVITÉS ACCESSIBLES SANS ÉQUIPEMENT :
1.	Marche rapide : Gratuit, partout 
o	Matin tôt (fraîcheur) ou soir
o	Parcours quartier, plage, parc
2.	Danse : Afrobeat, coupé-décalé, zumba 
o	Chez soi avec musique
o	Groupes communautaires
3.	Exercices poids du corps (maison) : 
o	Squats : 3 × 15
o	Pompes (murales ou au sol) : 3 × 10
o	Fentes : 3 × 12 chaque jambe
o	Gainage : 3 × 30 sec
o	Montées de genoux : 3 × 30 sec
4.	Vélo : Si disponible
5.	Natation : Plages, piscines
6.	Sports collectifs : Football, basketball (groupes locaux)
7.	Travaux ménagers intensifs : Nettoyage énergique, jardinage
8.	Yoga/Pilates : Vidéos YouTube gratuites
ADAPTATION NUTRITIONNELLE selon activité :
Jour SANS exercice (sédentaire) :
•	Suivre plan sédentaire (30% P, 35% G, 35% L)
•	1200-1400 kcal
Jour AVEC exercice (légèrement actif) :
•	Suivre plan légèrement actif (30% P, 40% G, 30% L)
•	1400-1600 kcal
•	Collation pré-exercice (30-60 min avant) : 
o	1 banane + 10 amandes
•	Collation post-exercice (dans l'heure) : 
o	Yaourt nature + fruits
CONSEILS MOTIVATION :
1.	Commencer TRÈS PETIT : 10 min suffisent au début
2.	Même heure : Automatisme (ex : 6h30 chaque matin)
3.	Compagnon : Ami, famille (engagement mutuel)
4.	Musique : Playlist énergique
5.	Application : Tracker progrès (Google Fit, gratuit)
6.	Récompenses : Non alimentaires (vêtements, massage)
7.	Pas de perfection : Manquer 1 jour ≠ abandon
8.	Focus plaisir : Choisir activité appréciée
⚠️ RÉPONSE : 1j-3j
BON DÉBUT ! Objectif : 4-5 jours/semaine
Analyse :
•	Habitude commencée : Excellent !
•	Besoin d'augmenter fréquence pour résultats optimaux
Plan de progression :
Actuellement 1-2 jours → Objectif 4-5 jours en 4-6 semaines
Stratégies :
1. Ajouter 1 jour/semaine chaque 2 semaines
•	Semaine 1-2 : 2 jours (maintien)
•	Semaine 3-4 : 3 jours (+ 1 jour)
•	Semaine 5-6 : 4 jours (+ 1 jour)
•	Semaine 7+ : 5 jours (+ 1 jour)
2. Varier les types d'exercice :
•	Cardio : 3 jours (marche rapide, vélo, danse)
•	Musculation : 2 jours (poids corps ou haltères)
•	Évite monotonie, travaille tout le corps
3. Exemple semaine cible (5 jours) :
•	Lundi : Cardio 40 min
•	Mardi : Repos
•	Mercredi : Musculation 30 min
•	Jeudi : Cardio 35 min
•	Vendredi : Musculation 30 min
•	Samedi : Cardio long 60 min
•	Dimanche : Repos ou activité légère
Nutrition adaptée :
•	Jours exercice : Plan \"légèrement actif\"
•	Jours repos : Plan \"sédentaire\"
✅ RÉPONSE : 4j-6j
EXCELLENT ! Maintenir et optimiser
Conseils d'optimisation :
1. Vérifier l'équilibre :
•	Cardio : 3-4 jours (endurance, brûle calories)
•	Musculation : 2-3 jours (préserve/construit muscle)
•	Repos : 1-2 jours (récupération essentielle)
2. Éviter le surentraînement :
•	Signes : Fatigue chronique, irritabilité, stagnation poids, blessures
•	Solution : Repos adéquat, nutrition suffisante
3. Exemple semaine optimale (5-6 jours) :
Lundi : Cardio modéré 45 min (marche rapide, vélo)  
Mardi : Musculation corps entier 40 min 
Mercredi : Cardio intense 30 min (intervals, danse) 
Jeudi : Repos actif (yoga, étirements 20 min) 
Vendredi : Musculation 40 min 
Samedi : Cardio long 60-90 min (randonnée, sport) 
Dimanche : Repos complet OU activité légère plaisir
Nutrition adaptée :
•	Suivre plan \"modérément actif\" ou \"très actif\" selon intensité
•	Timing glucides : Avant/après entraînements inte";

            case 'sedentarite':
                return "nses
•	Protéines : 1,6-2 g/kg poids corporel (préserver muscle)
4. Progression continue :
•	Augmenter intensité (pas forcément durée)
•	Varier exercices (éviter plateau)
•	Défis mensuels (courir 5 km, 100 squats/jour)
🏆 RÉPONSE : 7j
ATTENTION ! 7 jours peut être contre-productif
Analyse :
•	Engagement admirable MAIS
•	Risque : Surentraînement, blessures, burn-out
•	Le repos est crucial pour la récupération et la perte de graisses
Conseils ESSENTIELS :
1. OBLIGATOIRE : 1-2 jours repos/semaine
Pourquoi ?
•	Muscles se réparent/grandissent pendant repos (pas pendant exercice)
•	Évite blessures (tendons, articulations)
•	Prévient fatigue surrénales (cortisol élevé → stockage graisse)
•	Maintient motivation long terme
2. Repenser la semaine :
Option A : 5 jours intenses + 2 repos complets
•	Lundi-Vendredi : Entraînements
•	Samedi-Dimanche : Repos total ou étirements légers
Option B : 6 jours variés + 1 repos
•	3-4 jours cardio modéré
•	2-3 jours musculation
•	1 jour repos complet
•	Alterner intensités (éviter haute intensité quotidienne)
3. Jours \"actifs légers\" (si besoin de bouger quotidiennement) :
•	Marche tranquille 20-30 min
•	Yoga doux
•	Étirements
•	Natation récréative
•	PAS de cardio intense ni musculation
4. Exemple semaine équilibrée (6 jours actifs variés) :
Lundi : Cardio intense 40 min 
Mardi : Musculation 45 min 
Mercredi : Yoga/étirements 30 min (récupération active) 
Jeudi : Cardio modéré 45 min 
Vendredi : Musculation 45 min 
Samedi : Activité plaisir intense 60 min (sport, randonnée) 
Dimanche : REPOS COMPLET (crucial !)
Nutrition pour 6-7 jours actifs :
•	Plan \"très actif\" ou \"extrêmement actif\"
•	Calories suffisantes (ne pas sous-alimenter avec autant d'exercice !)
•	Protéines élevées (2 g/kg)
•	Glucides autour entraînements
•	Hydratation 3-4L/jour
Question 16 : Combien de temps passez-vous en position assise chaque jour ?
❌ RÉPONSE : Plus de 8h
🚨 \"Maladie de la chaise\" ! Aussi dangereux que le tabac
RISQUES DE LA SÉDENTARITÉ PROLONGÉE :
1.	Métabolisme ralenti : -30% après 30 min assis
2.	Résistance à l'insuline : Même avec exercice quotidien !
3.	Mortalité : Risque cardiovasculaire +50%
4.	Obésité : Assise >8h = +prise de poids même avec régime
5.	Douleurs : Dos, cou, épaules
6.	Circulation : Stase veineuse, thromboses
DONNÉES ALARMANTES :
•	Chaque heure assise supplémentaire = +22% risque obésité
•	Assise >11h/jour = Mortalité +40% (vs <4h/jour)
•	L'exercice ne compense PAS totalement l'assise prolongée
SOLUTIONS IMMÉDIATES :
1. Interruptions FRÉQUENTES (toutes les 30 min) :
Mini-pauses actives (2-3 min chaque 30 min) :
•	Se lever, marcher sur place
•	10 squats
•	Étirements bras/dos
•	Montées de genoux
•	Rotation tronc
Programmer alarmes : Téléphone/montre toutes les 30 min
2. Augmenter NEAT (Non-Exercise Activity Thermogenesis) :
Au travail/maison :
•	Bureau debout : Si possible, alterner assis/debout (DIY : empiler livres)
•	Appels téléphoniques : Marcher pendant conversation
•	Réunions debout : Proposer meetings marchés
•	Pause déjeuner : Marche 15-20 min
•	Escaliers : Toujours (jamais ascenseur si <5 étages)
•	Garer loin : + 10 min marche
•	Tâches ménagères : Actives, énergiques
3. Objectif quotidien :
•	Réduire à <6h/jour en 4-6 semaines
•	Ajouter 2-3h activités légères : Marche, debout, tâches
4. Tracker l'assise :
•	Application (Google Fit)
•	Ou carnet : Noter heures assises
•	Objectif chiffré : -30 min/semaine
•	5.Exercices \"chaise\" (au bureau)
Toutes les heures (5 min) :
•	Lev�";

            case 'activites_preferees':
                return "�es de chaise : 15 répétitions (se lever/asseoir sans mains)
•	Extensions jambes : 20 par jambe
•	Rotations épaules : 20 fois
•	Gainage assis : Contracter abdos 30 sec
•	Étirements nuque/dos
Exemple de journée restructurée :
AVANT (sédentaire - 12h assis) :
•	7h-8h : Assis petit-déj + trajet (1h)
•	8h-12h : Assis travail (4h)
•	12h-13h : Assis déjeuner (1h)
•	13h-18h : Assis travail (5h)
•	18h-23h : Assis transport + TV/téléphone (5h) TOTAL : 12h assis
APRÈS (actif - 6h assis) :
•	6h30-7h : Debout préparation petit-déj, marche 15 min
•	7h-7h30 : Assis petit-déj (30 min)
•	7h30-8h : Marche/transport actif (30 min)
•	8h-10h : Assis travail (2h)
•	10h-10h15 : PAUSE debout, marche bureau (15 min)
•	10h15-12h : Assis travail (1h45)
•	12h-12h30 : Marche pause déj (30 min)
•	12h30-13h : Assis déjeuner (30 min)
•	13h-15h : Assis travail (2h)
•	15h-15h15 : PAUSE debout, étirements (15 min)
•	15h-17h : Debout partiel, assis (1h15 assis)
•	17h-18h : Marche retour/courses (1h debout)
•	18h-19h : Préparation dîner debout (1h)
•	19h-20h : Assis dîner + famille (1h)
•	20h-21h : Marche soirée (1h)
•	21h-22h : Assis lecture/TV (1h) 
•	TOTAL : 6h assis + 6h debout/marche
Nutrition adaptée (malgré travail assis) :
•	Éviter grignotage bureau (ennui)
•	Collations saines préparées
•	Déjeuner équilibré (ne pas sauter)
•	Hydratation +++ (oblige à se lever pour uriner !)
⚠️ RÉPONSE : 6h-8h
LIMITE ACCEPTABLE mais amélioration souhaitable
Objectif : Réduire à <6h/jour
Actions :
•	Appliquer 50% des stratégies ci-dessus
•	Pauses actives toutes les 60 min (vs 30 min)
•	Ajouter 30-45 min activité légère/jour
•	Exemple : Marche 15 min matin + 15 min soir + pauses debout
✅ RÉPONSE : 4h-6h
BON ! Objectif : Maintenir ou réduire davantage
Conseils :
•	Continuer les bonnes habitudes
•	Pauses actives régulières
•	Activité physique quotidienne (30 min)
🏆 RÉPONSE : Moins de 4h
EXCELLENT ! Idéal pour la santé
Conseils :
•	Maintenir ce mode de vie actif
•	Profiter des bénéfices métaboliques
•	Inspirer votre entourage
Question 17 : Quelles activités physiques appréciez-vous ? (marche, yoga ou autre)
MARCHE
✅ EXCELLENTE ACTIVITÉ pour obésité modérée !
Avantages :
•	Faible impact (articulations)
•	Gratuit, accessible partout
•	Social (groupes de marche)
•	Brûle 200-400 kcal/h selon intensité
Programme marche progressif :
Niveau débutant (semaines 1-4) :
•	3-4 fois/semaine
•	20-30 min
•	Vitesse confortable
•	Terrain plat
Niveau intermédiaire (semaines 5-8) :
•	4-5 fois/semaine
•	35-45 min
•	Vitesse modérée (pouvoir parler mais légèrement essoufflé)
•	Quelques montées
Niveau avancé (semaines 9+) :
•	5-6 fois/semaine
•	45-60 min
•	Marche rapide (5-6 km/h)
•	Terrains variés
•	Intervals : 2 min rapide / 3 min modéré
Conseils marche (Bénin) :
•	Horaires : Tôt matin (6h-7h, fraîcheur) ou soir (18h-19h)
•	Lieux : Plage, parcs, quartiers sûrs, pistes
•	Hydratation : Bouteille d'eau
•	Chaussures : Confortables, adaptées
•	Compagnon : Ami, famille, groupe
Nutrition pré-marche :
•	30-60 min avant : 1 banane ou 1 pomme
•	Hydratation : 250ml eau
Nutrition post-marche :
•	Eau +++ (500ml)
•	Si >45 min intense : Petite collation (yaourt + fruits)
YOGA
✅ TRÈS BÉNÉFIQUE ! Complémentaire au cardio
Avantages pour obésité :
•	Flexibilité
•	Renforcement musculaire doux
•	Gestion stress (réduit cortisol → moins de stockage graisse)
•	Conscience corporelle (meilleurs choix alimentaires)
•	Amélioration sommeil
•	Faible impact
Types de yoga adaptés :
•	Hatha yoga : Doux, débutants
•	Vinyasa : Plus dynamique, intermédiaire
•	Yin yoga : Très doux, étirements profonds
•	Yoga adapté obésité : Modifications postures
Programme yoga :
•	Fréquence : 2-3 fois/semaine
•	Durée : 30-60 min
•	Compléter avec : Cardio 3 fois/semaine
Ressources :
•	Studios yoga (Cotonou, Porto-Novo)
•	Vidéos YouTube gratuites (français)
•	Applications : Yoga Daily, Down Dog
Postures adaptées obésité modérée :
•	Chien tête en bas (modifié)
•	Guerrier I, II
•	Arbre (équilibre)
•	Chat-vache (dos)
•	Enfant (repos)
•	Torsions assis
•	Savasana (relaxation finale)
Modifications";

            case 'fc_connaissance':
                return ":
•	Utiliser blocs, sangles
•	Genoux pliés si nécessaire
•	Écouter son corps
Nutrition + yoga :
•	Ava";

            case 'fc_valeur':
                return "nt : Estomac léger (2-3h après repas)
•	Après : Hydratation, repas léger
AUTRES ACTIVITÉS POPULAIRES (Bénin) :
DANSE
Styles :
•	Afrobeat
•	Coupé-décalé
•	Zumba
•	Danse traditionnelle
Avantages :
•	FUN ! Motivation facile
•	Brûle 300-500 kcal/h
•	Cardio intense
•	Social
Où pratiquer :
•	Cours collectifs (salles sport)
•	Chez soi (YouTube, musique)
•	Soirées dansantes
Programme :
•	3-4 fois/semaine
•	30-45 min/séance
•	Compléter avec musculation 2 fois/semaine
NATATION
Avantages :
•	ZÉRO impact (parfait obésité)
•	Corps entier
•	Brûle 400-700 kcal/h
•	Rafraîchissant (climat béninois)
Où :
•	Plages (Cotonou, Ouidah, Grand-Popo)
•	Piscines hôtels/clubs
Programme :
•	2-3 fois/semaine
•	30-45 min
•	Nage modérée
Précautions :
•	Sécurité (ne pas nager seul en mer)
•	Protection solaire
VÉLO
Avantages :
•	Faible impact
•	Transport actif
•	Brûle 300-600 kcal/h
Programme :
•	3-4 fois/semaine
•	30-60 min
•	Terrain plat débutant, vallonné avancé
SPORTS COLLECTIFS
Football, basketball, volleyball
Avantages :
•	Social, motivant
•	Cardio intense
•	Ludique
Précautions obésité modérée :
•	Échauffement ++
•	Éviter compétition intense au début (risque blessures)
•	Progressif
MUSCULATION/FITNESS
CRUCIAL pour perte de poids !
Pourquoi :
•	Préserve/construit muscle
•	Muscle = ↑ métabolisme au repos
•	Tonification corps
Programme débutant (poids corps) :
2-3 fois/semaine, 30-40 min
Exercices :
1.	Squats : 3 × 12-15
2.	Pompes (murales ou sol) : 3 × 8-12
3.	Fentes : 3 × 10 chaque jambe
4.	Planche : 3 × 20-40 sec
5.	Pont fessiers : 3 × 15
6.	Rowing avec bande élastique : 3 × 12
Progression :
•	Ajouter répétitions
•	Ajouter poids (bouteilles d'eau, sacs sable)
•	Ralentir mouvement (temps sous tension)
Où :
•	Maison (aucun équipement nécessaire)
•	Salle sport (si budget)
•	Parcs (street workout)
Nutrition + musculation :
•	Avant : Glucides + protéines (1-2h avant) 
o	Ex : Pain complet + beurre cacahuète
•	Après : Protéines + glucides (dans l'heure) 
o	Ex : Poulet + riz ou Yaourt + banane
NB :Si user choisit autre activité physique qu’il préfère hormis marche et yoga, tu lui balance les autres activités se trouvant en haut pour mla question précédentes
Question 18 : Connaissez-vous votre fréquence cardiaque au repos ?
✅ RÉPONSE : OUI
Excellent ! Indicateur de condition physique
Question 19 : Si oui, veuillez-nous la donner ? (Question ouverte)
INTERPRÉTATION SELON LA VALEUR :
FC REPOS NORMALE : 60-100 bpm
❌ FC > 90 bpm (élevée)
Signification :
•	Condition cardiovasculaire faible
•	Possible surpoids/obésité (cœur travaille plus)
•	Stress chronique
•	Manque d'activité physique
•	Possible problème médical (si >100 bpm → consulter)
Actions :
•	Cardio régulier : 4-5 fois/semaine minimum
•	Commencer doux, progression lente
•	Objectif : Réduire FC repos de 10-20 bpm en 3-6 mois
•	Gestion stress : Yoga, méditation, sommeil
•	Nutrition anti-inflammatoire
Exercice adapté FC élevée :
•	Marche modérée 30-40 min/jour
•	Éviter haute intensité au début
•	Surveiller FC pendant exercice (ne pas dépasser 60-70% FC max au début)
Utilisation FC pour entraînement :
Calcul FC maximale théorique :
•	Déterminant la fréquence cardiaque maximale (FCmax) : Formule de Tanaka (plus précise pour certains adultes) : FCmax ≈ 208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm].
Zones d'entraînement :
Pour perte de poids (zone modérée, 60-70% FC max) :
•	Zone cible : 108-126 bpm
•	Activités : Marche rapide, vélo tranquille, danse modérée
•	Durée optimale : 30-60 min
Pour amélioration cardio (70-85% FC max) :
•	Zone : 126-153 bpm
•	Activités : Course légère, vélo soutenu, HIIT modéré
•	Durée : 20-40 min
Surveillance pendant exercice :
•	Idéal : Montre connectée ou cardio-fréquencemètre
•	Alternatif : Test parole (";

            case 'stress_ennui':
                return "doit pouvoir parler mais difficilement = bon niveau)
•	Mesure manuelle : Pouls 15s × 4
Alimentation selon FC repos :
FC élevée (>85 bpm) :
•	Anti-inflammatoires : Oméga-3 (poisson), curcuma, gingembre
•	Antioxydants : Fruits/légumes colorés
•	Magnésium : Légumes verts, noix, bananes
•	Limiter : Caféine, alcool, sel

COMMENT MESURER FCR CORRECTEMENT :
Méthode manuelle :
5.	Moment : Matin au réveil, encore allongé, calme
6.	Position : Doigts (index + majeur) sur poignet ou cou (carotide)
7.	Comptage : Nombre de battements pendant 60 secondes complètes 
o	OU 30 secondes x 2 (moins précis)
8.	Répéter : 3 jours consécutifs, faire moyenne
Applications téléphone :
•	Certaines applis utilisent caméra (doigt sur objectif)
•	Variable en précision
•	Vérifier avec méthode manuelle
Montres connectées :
•	Si disponible, très pratiques
•	Mesure continue/automatique
SUIVI DE PROGRESSION :
FCR s'améliore avec exercice régulier :
Évolution typique (si programme suivi) :
•	Mois 1 : -2 à 4 bpm
•	Mois 2 : -2 à 3 bpm supplémentaires
•	Mois 3 : -1 à 2 bpm supplémentaires
•	Stabilisation ensuite
Exemple :
•	Début : 85 bpm
•	Après 3 mois : 75-78 bpm
•	Après 6 mois : 70-75 bpm
Nutrition :
•	Réduction sodium (baisse FC)
•	Oméga-3 (poisson)
•	Magnésium (légumes verts, bananes)
•	Hydratation +++
✅ FC 70-89 bpm (normale haute)
Signification :
•	Condition physique moyenne
•	Marge d'amélioration
Actions :
•	Activité physique régulière
•	Objectif : Descendre vers 60-70 bpm
Motivation : Chaque battement en moins = cœur plus fort et efficace !

✅ FC 60-69 bpm (bonne)
Signification :
•	Bonne condition cardiovasculaire
•	Continue l'exercice régulier
🏆 FC 50-59 bpm (excellente)
Signification :
•	Excellente condition physique
•	Typique athlètes endurance
Si vous êtes sédentaire avec FC aussi basse :
•	Peut indiquer problème médical (bradycardie)
•	Consulter médecin
⚠️ FC < 50 bpm (très basse)
Attention :
•	Si athlète entraîné : Normal
•	Si sédentaire : Consulter médecin (problème électrique cœur ?)
❌ RÉPONSE : NON
Conseils pour mesurer :
Méthode manuelle (gratuit) :
1.	Au réveil, avant de se lever
2.	Trouver pouls (poignet ou cou)
3.	Compter battements pendant 60 secondes
4.	Répéter 3 jours, faire moyenne
Applications smartphone :
•	Caméra + doigt = mesure FC (apps gratuites)
Moniteurs FC :
•	Montres connectées (Xiaomi Mi Band, Samsung, Apple Watch)
•	Brassards (plus précis)
Intérêt :
•	Suivi progrès (FC repos baisse = amélioration)
•	Zone cible exercice (optimiser brûlage graisses)
•	Détection surentraînement
📋 SECTION 5 : COMPORTEMENTS ALIMENTAIRES
Question 20 : Mangez-vous souvent par stress ou ennui ?
✅ RÉPONSE : OUI
🚨 \"EMOTIONAL EATING\" - Gros saboteur de la perte de poids !
PROBLÈME :
•	Manger émotionnel ≠ faim physique
•	Choix d'aliments réconfort (gras, sucrés) = 500-2000 kcal supplémentaires
•	Cercle vicieux : Stress → Manger → Culpabilité → Stress
•	Cortisol élevé chronique → Stockage graisse abdominale
DIFFÉRENCIER FAIM PHYSIQUE vs ÉMOTIONNELLE :
FAIM PHYSIQUE :
•	Progressive
•	Estomac gronde
•	Satisfaite par n'importe quel aliment
•	Après 3-4h sans manger
•	Satisfaction après repas
FAIM ÉMOTIONNELLE :
•	Soudaine, urgente
•	Envie d'aliments spécifiques (sucré, gras)
•	Après événement stressant
•	Continue même rassasié
•	Culpabilité après
SOLUTIONS IMMÉDIATES :
1. Identifier les déclencheurs :
Tenir journal émotionnel (2 semaines) :
•	Heure
•	Situation/émotion
•	Aliment consommé
•	Quantité
•	Sensation après
Déclencheurs courants :
•	Stress travail
•	Conflit relationnel
•	Solitude, ennui
•	Fatigue
•	Habitude (TV = grignotage)
•	Pression sociale
2. Stratégies anti-stress (SANS nourriture) :
Quand stress arrive :
PAUSE 10 MIN avant de manger :
Activités alternatives :
1.	Marche rapide : 10-15 min (endorphines)
2.	Respiration profonde : 5 min (calme cortisol) 
o	Inspirer 4 sec, retenir 4 sec, expirer 6 sec
3.	Appel ami/famille : Parler du stress
4.	Musique : Playlist relaxante ou énergique
5.	Douche/bain : Eau chaude relaxante
6.	Écriture : Journal, exprimer émotions
7.	Activité manuelle : Dessin, tricot, jardinage
8.	Prière/m";

            case 'finir_assiette':
                return "éditation : 5-10 min
9.	Exercice intense : 20 squats, gainage (libère tension)
10.	Vidéo drôle : Rire (anti-stress naturel)
3. Si vraiment besoin de manger :
Substituts sains (< 100 kcal) :
•	Bâtonnets légumes crus (infini)
•	Tisane chaude (zéro calorie, réconfortante)
•	Chewing-gum sans sucre
•	1 pomme (70 kcal, satiétante)
•	Air-popped popcorn maison (50g = 150 kcal)
Règle \"attendre 20 min\" :
•	Souvent, l'envie passe
4. Restructurer l'environnement :
À LA MAISON :
•	Supprimer aliments déclencheurs : Pas de biscuits, chips, sodas stockés
•	Pré-portions : Si chocolat, 2 carrés dans pot séparé (pas plaque entière)
•	Fruits visibles : Corbeille sur table
•	Activités anti-ennui : Livres, puzzles, loisirs créatifs
AU TRAVAIL :
•	Collations saines au bureau
•	Bouteille d'eau visible
•	Marche pause stress
•	Pas de distributeurs
5. Gestion stress long terme :
Quotidien :
•	Sommeil 7-9h : Régule hormones stress
•	Exercice régulier : Anti-stress #1
•	Yoga/méditation : 10-20 min/jour
•	Temps pour soi : Hobby, lecture, nature
•	Relations sociales : Support émotionnel
•	Organisation : Planning, to-do lists (moins de stress mental)
6. Techniques comportementales :
\"Surfing the urge\" (surfer sur l'envie) :
•	L'envie de manger émotionnelle dure 10-20 min MAX
•	Visualiser comme une vague : Monte, pic, redescend
•	Observer sans agir
•	Elle passera
Pleine conscience (mindful eating) :
•	Si décision de manger : 
o	S'asseoir, pas devant TV
o	Petite portion
o	Manger LENTEMENT
o	Savourer chaque bouchée
o	S'arrêter dès rassasié
7. Plan d'action personnalisé :
Exemple : \"Je mange par stress au travail\"
Nouveau protocole :
1.	Sentir le stress monter
2.	Quitter bureau 5 min
3.	Marche couloirs ou extérieur
4.	Respiration profonde
5.	Boire verre d'eau ou tisane
6.	Si toujours envie : 1 pomme + 10 noix (portions mesurées)
7.	Reprendre travail
Exemple : \"Je mange par ennui le soir devant TV\"
Nouveau protocole :
1.	Activité après dîner : Marche 20 min
2.	Tisane relaxante (verveine, camomille)
3.	Activité manuelle (tricot, dessin)
4.	Si TV : Pas de nourriture dans salon
5.	Se brosser dents après dîner (signal \"fini manger\")
6.	Coucher plus tôt (éviter ennui nocturne)
8. Aide professionnelle (si besoin) :
Consulter si :
•	Alimentation émotionnelle très fréquente (>3 fois/semaine)
•	Compulsions alimentaires incontrôlables
•	Dépression, anxiété sous-jacente
•	Échecs répétés malgré stratégies
Professionnels :
•	Psychologue spécialisé TCC (thérapie cognitivo-comportementale)
•	Nutritionniste/diététicien
•	Psychiatre (si troubles alimentaires sévères)
❌ RÉPONSE : NON
✅ EXCELLENT ! Relation saine avec la nourriture
Conseils de maintien :
•	Continuer à manger en réponse à la faim physique
•	Maintenir bonnes stratégies de gestion du stress
•	Rester vigilant (stress peut déclencher alimentation émotionnelle à tout moment)
Question 21 : Avez-vous tendance à finir votre assiette même si vous n'avez plus faim ?
✅ RÉPONSE : OUI
⚠️ PROBLÈME CULTUREL + SURCONSOMMATION
CAUSES :
1.	Éducation : \"Finis ton assiette\" (enfance)
2.	Peur du gaspillage
3.	Politesse : Refuser = offense (culture béninoise)
4.	Déconnexion : Ignorer sign";

            case 'regime_particulier':
                return "aux satiété
5.	Portions XXL : Restaurants, famille
6.	Vitesse : Manger vite (cerveau 20 min pour satiété)
IMPACT :
•	Surconsommation : 200-500 kcal/jour supplémentaires
•	Prise de poids : +2-5 kg/an
•	Estomac étiré : Besoin de plus de nourriture pour satiété
SOLUTIONS :
1. Réapprendre signaux de satiété :
Échelle de faim (1-10) :
1.	Affamé, faible 2-3. Très faim
2.	Légère faim
3.	Neutre (ni faim ni satiété)
4.	Agréablement rassasié ← ARRÊTER ICI
5.	Plein
6.	Très plein, inconfortable 9-10. Mal au ventre
Objectif :
•	Commencer repas à 3-4
•	Arrêter à 6 (80% plein)
•	JAMAIS aller à 8-10
Entraînement :
•	Avant chaque bouchée après mi-repas : \"Ai-je encore faim ?\"
•	Poser fourchette entre bouchées
•	Respirer, évaluer
2. Réduire portions AVANT de servir :
Astuces :
•	Assiettes plus petites : Illusion visuelle (assiette pleine avec moins) 
o	Standard 30 cm → Dessert 22 cm
•	Remplir assiette 1 fois : Pas de re-service
•	Règle 50-25-25 : 
o	50% légumes
o	25% protéines
o	25% glucides
•	Eau : Grand verre avant repas (pré-satiété)
3. Manger LENTEMENT (mindful eating) :
Techniques :
•	20-30 min minimum/repas
•	Mâcher 20-30 fois chaque bouchée
•	Poser ustensiles entre bouchées
•	Conversations : Manger en famille (ralentit)
•	Pas d'écrans : TV/téléphone = manger inconscient
•	Savourer : Goûts, textures, arômes
Bénéfices :
•	Satiété naturelle à 80% plein
•	Digestion améliorée
•	Plaisir accru
4. Gérer les restes :
❌ NE PLUS SE FORCER à finir
À LA MAISON :
•	Conserver restes : Tupperware pour lendemain
•	Cuisiner portions justes : Utiliser balance, mesures
•	Partager : Famille, voisins (pas de gaspillage)
AU RESTAURANT :
•	Demander petite portion ou demi-";

            case 'regime_efficacite':
                return "portion
•	Partager plat avec compagnon
•	Doggy bag : Emporter restes (normaliser au Bénin)
•	Refuser poliment : \"C'était délicieux mais je suis rassasié\"
5. Contexte culturel béninois :
Lors de visites/cérémonies :
Stratégies :
•	Expliquer avant : \"Je suis au régime santé\"
•	Prendre petite portion : Goûter par respect
•	Manger lentement : Donne impression de manger beaucoup
•	Complimenter : \"Délicieux ! Je savoure lentement\"
•	Refus ferme mais poli : \"Merci, je suis vraiment rassasié\"
•	Boire eau/tisane : Main occupée (moins de pression)
Réponses préparées :
•	\"Le médecin m'a conseillé de manger moins\"
•	\"Je savoure vraiment, c'est pourquoi je mange lentement\"
•	\"Je garde de la place pour plus tard\"
6. Déshabituer l'estomac (4-6 semaines) :
Semaine 1-2 :
•	Laisser 20% assiette
•	Inconfort probable (normal)
•	Tenir bon
Semaine 3-4 :
•	Estomac s'adapte
•	Satiété plus rapide
•	Portions naturellement réduites
Semaine 5-6 :
•	Nouvelle normalité
•	Confort avec petites portions
7. Tracking visuel :
Avant/après repas :
•	Photo assiette pleine
•	Photo reste
•	Noter sensation satiété
•	Objectif : Diminuer progressivement
❌ RÉPONSE : NON
🏆 EXCELLENT ! Connexion saine aux signaux de faim/satiété
Conseils :
•	Maintenir cette écoute corporelle
•	Continuer à s'arrêter à 80% plein
•	Inspirer autres
Question 22 : Avez-vous déjà suivi un régime alimentaire particulier ?
✅ RÉPONSE : OUI
Passer à question suivante pour détails
❌ RÉPONSE : NON
Première expérience ? Avantages et conseils :
Avantages :
•	Pas de \"dégâts\" métaboliques des régimes yo-yo
•	Métabolisme intact
•	Motivation fraîche
•	Ardoise vierge
Conseils pour réussir du premier coup :
1. Éviter erreurs classiques :
❌ ERREURS :
•	Trop restrictif, trop vite
•	Éliminer groupes alimentaires
•	Attentes irréalistes
•	Pas de plan de maintien
✅ APPROCHE GAGNANTE :
•	Changements progressifs et durables
•	Tous aliments en portions contrôlées
•	Objectifs réalistes (0,5-1 kg/semaine)
•	Plan à long terme (pas \"régime temporaire\")
2. Mindset crucial :
❌ Mauvais mindset :
•	\"Je fais un régime temporaire\"
•	\"Je me prive en attendant d'atteindre mon objectif\"
•	\"Après, je mangerai normalement\"
✅ Bon mindset :
•	\"J'adopte un nouveau mode de vie PERMANENT\"
•	\"Je découvre une alimentation équilibrée que j'aimerai toujours\"
•	\"Ces changements sont pour la vie\"
3. Plan d'action premier régime :
Mois 1 : Diagnostic et fondations
•	Journal alimentaire complet
•	Identifier erreurs majeures
•	Éliminer 1-2 pires habitudes (ex : sodas)
•	Ajouter fruits/légumes
•	Commencer activité physique légère
Mois 2-3 : Structure
•	Suivre plans repas de ce guide
•	3 repas + 2 collations
•	Portions contrôlées
•	Exercice 3-4 fois/semaine
Mois 4-6 : Consolidation
•	Routine établie
•	Automatismes
•	Adaptations personnelles
•	Objectif pondéral à moitié atteint
Mois 7-12 : Affinage et maintenance
•	Atteinte objectif
•	Début stabilisation
•	Préparation maintenance à vie
4. Support :
•	Partager objectifs avec proches
•	Groupe de soutien (en ligne ou local)
•	Suivi professionnel (nutritionniste)
•	Célébrer victoires non-alimentaires (vêtements, énergie)
Question 23 : Si oui, lequel, et a-t-il été efficace pour vous ? Pourquoi ? (Question ouverte)
ANALYSES SELON RÉGIMES COURANTS :
RÉGIME HYPOCALORIQUE CLASSIQUE
Si efficace (perte de poids) :
•	Bon ! Le déficit calorique fonctionne
•	Attention : Maintien difficile
•	Conseil : Transition vers équilibre durable (ce guide)
Si inefficace (pas de perte ou reprise) :
•	Causes possibles : 
o	Trop restrictif → Abandon
o	Déficit mal calculé
o	Manque d'activité physique
o	Effet yo-yo
Nouveau plan :
•	Déficit modéré (-500 kcal)
•	Macronutriments équilibrés (tableau 1)
•	Activité physique OBLIGATOIRE
RÉGIME \"SANS SUCRE\" / \"LOW CARB\"
Si efficace :
•	Perte rapide initiale (eau + glycogène)
•	Attention : Difficile long terme
•	Risque de carences
•	Fatigue si trop restrictif
Si inefficace :
•	Probablement compensé par graisses
•	Ou reprise rapide post-régime
Conseil :
•	Les glucides ne sont PAS l'ennemi
•	Choisir IG bas (igname, patate douce)
•	Suivre répartition tableau 1 (35-55% selon activité)
RÉGIME \"SANS GRAISSES\" / \"LOW FAT\"
Si efficace :
•	Réduction calories (graisses = 9 kcal/g)
Problèmes :
•	Carences vitamines liposolubles (A, D, E, K)
•	Hormones perturbées (besoin graisses)
•	Satiété faible
Conseil :
•	Graisses essentielles ! 20-35% calories
•	Choisir bonnes graisses (avocat, poisson, noix, huile olive)
RÉGIME \"JEÛNE INTERMITTENT\"
Si efficace :
•	Déficit calorique naturel (fenêtre alimentaire réduite)
•	Certains l'adorent
Si inefficace :
•	Surconsommation pendant fenêtre alimentaire
•	Fatigue, irritabilité
•	Difficile socialement
Conseil :
•	Peut être combiné avec ce guide
•	Exemple : Jeûne 16h (20h-12h), manger 12h-20h
•	Mais PAS obligatoire
•	3 repas équilibrés fonctionnent aussi bien
RÉGIMES \"MIRACLE\" (Soupe, Citron, Mono-aliment, etc.)
Toujours inefficaces long terme !
Pourquoi :
•	Perte rapide = eau + muscle (PAS graisse)
•	Carences majeures
•	Reprise 100% garantie
•	Dangers santé
Conseil ferme :
•	ÉVITER ABSOLUMENT
•	Seul \"miracle\" = Déficit calorique modéré + Activité + Patience + Permanence
RÉGIMES COMMERCIAUX (Substituts repas, programmes packagés)
Si efficace court terme :
•	Portion-contrôle facile
•	Mais coûteux
•	Pas d'apprentissage (reprise après arrêt)
Conseil :
•	Transition vers aliments vrais
•	Apprendre à cuisiner équilibré
•	Autonomie alimentaire
RÉGIME \"MÉDITERRANÉEN\" / \"DASH\"
✅ SI EFFICACE : EXCELLENT !
Pourquoi :
•	Équilibré, durable
•	Basé science
•	Santé cardiovasculaire
Conseil :
•	Continuer !
•	Adapter aux aliments béninois (ce guide le fait)
•	Principes similaires : légumes+++, grains entiers, poisson, graisses saines
SYNTHÈSE POUR TOUS :
Peu importe le régime précédent, clés du succès :
1.	Déficit calorique modéré (-500 kcal/jour)
2.	Macronutriments équilibrés (tableau 1)
3.	Aliments entiers, peu transformés
4.	Activité physique régulière (150-300 min/semaine)
5.	Sommeil 7-9h
6.	Gestion stress
7.	Hydratation 2-3L
8.	Patience (0,5-1 kg/semaine)
9.	Changements PERMANENTS
10.	Suivi et ajustements";

            default:
                return 'Aucun';
        }
    }
}
