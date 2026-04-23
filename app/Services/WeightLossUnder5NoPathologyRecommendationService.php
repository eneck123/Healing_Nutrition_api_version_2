<?php

namespace App\Services;

class WeightLossUnder5NoPathologyRecommendationService implements RecommendationServiceInterface
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = [], int $age = 30): string
    {
        switch ($key) {
            case 'meds_lies':
                return ": Prenez-vous actuellement l’un des types de médicaments suivants ?  
Si vous prenez des médicaments pour baisser la glycémie :
METFORMINE :
•	Prendre avec les repas pour réduire troubles digestifs
•	Éviter alcool
•	Bien s'hydrater
•	Consommer probiotiques (yaourt local)
Adaptations repas :
•	Réduire portions de 10-15% si perte d'appétit
•	Privilégier aliments riches en vitamines B (feuilles vertes, légumineuses)
•	Fractionner davantage si nausées
GLIMEPIRIDE ou autres sulfamides :
•	RISQUE D'HYPOGLYCÉMIE : ne jamais sauter de repas
•	Toujours avoir collation d'urgence (fruits, biscuits)
•	Prendre médicament avec repas principal
Adaptations repas :
•	Respecter horaires fixes des repas
•	Collations stratégiques entre repas
•	Portion glucides stable chaque jour
INSULINE
•	Compter glucides précisément
•	Tenir journal alimentaire
•	Adapter doses selon activité
Repas structurés pour insuline :
•	Petit-déjeuner : 40-50g glucides (ex: 200g bouillie + 1 fruit)
•	Déjeuner : 60-70g glucides (ex: 180g riz + légumes + protéines)
•	Dîner : 50-60g glucides (ex: 150g pâte + sauce + légumes)
•	Collations : 15-20g glucides chacune

 Médicaments pour la tension :
INHIBITEURS DE L'ECA (IEC) / ARA2 :
•	Attention potassium : ne pas exagérer bananes, avocat (2 portions/jour max)
•	Bien s'hydrater
•	Éviter alcool
Repas adaptés :
•	Modérer avocat à 1/2 par jour
•	Limiter bananes à 1-2 par jour
•	Équilibrer avec autres fruits moins riches en potassium (papaye, orange)
BÊTA-BLOQUANTS :
•	Peuvent ralentir métabolisme : portions légèrement réduites
•	Favoriser aliments riches en magnésium (légumes verts, haricots)
DIURÉTIQUES :
•	Risque de perte de potassium : AUGMENTER fruits, légumes
•	Bien s'hydrater (2-3L eau/jour)
•	Limiter alcool et café
Repas pour diurétiques :
•	2-3 fruits riches en potassium/jour
•	Feuilles vertes à chaque repas
•	Légumineuses quotidiennes
•	Eau abondante entre repas
Si vous prenez des statines (cholestérol) :
Interactions alimentaires :
•	Éviter pamplemousse (interaction médicamenteuse)
•	Modérer alcool
•	Prendre à heure fixe (souvent le soir)
Repas optimisés pour statines :
•	Riches en fibres solubles : avoine, haricots, légumes
•	Protéines maigres : poisson, poulet sans peau, légumineuses
•	Graisses saines : petites quantités d'huiles végétales, avocat modéré, noix
Petit-déjeuner avec statines :
•	Bouillie d'avoine + fruits + noix
•	Pain complet + sardines + tomate
•	Akpan + œuf + légumes
Collations favorables :
•	Pomme + amandes
•	Carotte + houmous maison
•	Yaourt + baies
💉 MÉDICAMENTS POUR PERDRE DU POIDS
ORLISTAT :
Mécanisme : Bloque absorption des graisses (30%)
Adaptations alimentaires ESSENTIELLES :
1.	Réduire graisses à 15-20g par repas : 
o	Cuisson vapeur, grill, bouilli prioritaire
o	Limiter huile à 1 cuillère à café/repas
o	Éviter fritures, sauces grasses
2.	Risque de carences en vitamines liposolubles (A, D, E, K) : 
o	Consommer légumes oranges/verts foncés quotidiennement
o	Prendre supplément vitaminique 2h avant/après orlistat
3.	Repas adaptés orlistat :
Petit-déjeuner faible gras :
•	Bouillie de maïs écrémée + fruits
•	Blanc d'œuf (2) + pain complet + tomate
•	Yaourt 0% + céréales complètes + papaye
Déjeuner orlistat :
•	Riz vapeur + sauce tomate SANS HUILE + poisson grillé + légumes vapeur
•	Igname bouillie + poulet grillé sans peau + salade (vinaigrette légère)
•	Haricots + légumes + viande très maigre
Dîner orlistat :
•	Soupe de légumes + poisson grillé + petit morceau d'igname
•	Salade + blanc de poulet + riz complet (portion modérée)
•	Légumes vapeur abondants + viande maigre + petite portion de pâte
EFFETS SECONDAIRES et solutions :
•	Selles grasses : réduire encore plus les graisses
•	Urgences fécales : éviter aliments gras en public
•	Flatulences : fractionner repas
LIRAGLUTIDE (analogues GLP-1) :
Mécanisme : Réduit appétit, ralentit vidange gastrique
Adaptations alimentaires :
1.	Nausées fréquentes : 
o	Portions plus petites, plus fréquentes (5-6 repas/jour)
o	Éviter aliments gras, épicés
o	Privilégier aliments fades, tièdes
2.	Satiété précoce : 
o	Commencer repas par protéines
o	Manger lentement
o	Arrêter dès satiété (ne pas forcer)
3.	Repas adaptés liraglutide :
Petit-déjeuner petites portions :
•	1/2 bol de bouillie légère + 1/2 banane
•	1 œuf + 1 tranche pain + quelques légumes
•	Yaourt + fruits
Déjeuner fractionné :
•	Petite portion riz (100g) + sauce légère + poisson (80g)
•	Légumes abondants mais féculents réduits
•	Manger sur 30-40 minutes
Dîner léger :
•	Soupe + protéines maigres
•	Salade + petit morceau de féculent
•	Éviter repas lourds le soir
Collations anti-nausées :
•	Biscuits secs nature
•	Fruits secs (petite quantité)
•	Pain grillé
CONSEILS PRATIQUES :
•	S'hydrater entre les repas (pas pendant)
•	Éviter se coucher juste après manger";

            case 'journee_typique':
                return "•	Tenir journal pour identifier aliments déclencheurs
AUCUN DE CES MÉDICAMENTS
Conseils ciblés :
•	L'alimentation et l'activité physique sont vos principaux outils
•	Prévention primaire essentielle
•	Surveillance régulière recommandée
•	Approche naturelle privilégiée
Question : Pouvez-vous décrire une journée typique de vos repas et collations ?
Cette question est primordiale car dans le cas actuel où vous êtes sans antécédent";

            case 'fruits_legumes':
                return "s métaboliques, cela nous sera utile pour mettre en place votre plan nutritionnel en nous basant sur une :
	Évaluer l’équilibre alimentaire
	Identifier des habitudes à améliorer
	Prévenir la prise de poids et les maladies futures
	Adapter des conseils simples et durables
ADAPTATIONS SELON HABITUDES ALIMENTAIRES
🍎 CONSOMMATION DE FRUITS ET LÉGUMES
1-2 PORTIONS/JOUR (INSUFFISANT)
⚠️ Problème : Carences en fibres, vitamines, minéraux → constipation, faim accrue, défenses immunitaires faibles
Objectif : Atteindre 5-7 portions/jour progressivement
Plan d'augmentation progressive :
Semaine 1-2 : Passer à 3 portions
•	Ajouter salade à déjeuner et dîner
•	1 fruit au petit-déjeuner
Repas enrichis :
•	Petit-déj : Bouillie + ORANGE ou PAPAYE
•	Déjeuner : Riz + sauce + GRANDE SALADE (laitue, tomate, concombre)
•	Dîner : Plat principal + LÉGUMES VAPEUR (carotte, haricot vert)
Semaine 3-4 : Passer à 5 portions
•	Collations = fruits
•	Légumes à chaque repas
Astuces béninoises pour augmenter légumes :
1.	Enrichir sauces traditionnelles : 
o	Sauce tomate : ajouter courgettes, aubergines, poivrons
o	Sauce arachide : incorporer chou, carotte, haricots verts
o	Sauce graine : augmenter épinards, feuilles d'amarante
2.	Salades composées béninoises : 
o	Salade de chou râpé + carotte + oignon + vinaigrette citron
o	Salade de concombre + tomate + avocat + citron
o	Salade de papaye verte râpée
3.	Légumes en accompagnement : 
o	Alloco + salade de tomates
o	Riz + ratatouille locale (aubergine, tomate, oignon)
o	Pâte + légumes vapeur variés
4.	Fruits locaux à privilégier : 
o	Matin : papaye, orange, banane
o	Collations : mangue, ananas, pomme
o	Après-midi : avocat, goyave, fruit de la passion
Recettes rapides légumes :
•	Sauté express : Oignon + tomate + chou + carotte (10 min)
•	Salade croquante : Concombre + carotte râpée + citron
•	Soupe minute : Bouillon + tous légumes disponibles
3-4 PORTIONS/JOUR (MOYEN)
👍 Bon début mais insuffisant pour obésité
Objectif : Atteindre 6-8 portions/jour
Stratégies d'optimisation :
1.	Remplir la moitié de l'assiette de légumes à chaque repas
2.	2 fruits différents par jour minimum
3.	Légumes verts feuillus quotidiens
Exemple de répartition idéale :
•	Petit-déj : 1 fruit (papaye) + légumes dans omelette (tomate, oignon) = 2 portions
•	Collation AM : 1 fruit (orange) = 1 portion
•	Déjeuner : Grande salade + légumes dans sauce = 2-3 portions
•	Collation PM : Crudités (carotte, concombre) = 1 portion
•	Dîner : Soupe de légumes + légumes vapeur = 2 portions
TOTAL : 8-9 portions ✅
Variété à rechercher :
•	Légumes verts : Épinards, amarante, chou, laitue, haricots verts
•	Légumes oranges : Carotte, patate douce, potiron
•	Légumes autres : Tomate, concombre, aubergine, poivron, oignon
•	Fruits variés : Papaye, mangue, orange, banane, ananas, pomme
5 PORTIONS OU PLUS (EXCELLENT)
🌟 Très bien ! Maintenir et optimiser
Conseils d'optimisation :
1.	Varier les couleurs : 
o	Arc-en-ciel dans l'assiette = nutriments variés
o	Chaque couleur = nutriments différents
2.	Privilégier légumes NON FÉCULENTS pour perte de poids : 
o	Limiter igname, patate douce, plantain
o	Privilégier légumes verts, tomates, concombr";

            case 'grignotage':
                return "es, aubergines
3.	Modes de cuisson variés : 
o	Crus : salades quotidiennes
o	Vapeur : préserve nutriments
o	Grillés : saveur sans graisse
o	En soupe : hydratation + satiété
Challenge variété hebdomadaire :
•	Essayer 1 nouveau légume/semaine
•	Essayer 1 nouveau fruit/semaine
•	Tester nouvelle recette légumes/semaine
Exemples :
•	Salade de papaye verte
•	Jus de bissap (hibiscus) maison
•	Smoothie mangue-épinard
•	Brochettes de légumes grillés



🍪 GRIGNOTAGE ENTRE LES REPAS
SI OUI : Vous grignotez
Analyse des types de grignotage :
GRIGNOTAGE SUCRÉ (beignets, gâteaux, bonbons, sodas)
⚠️ Impact : Pics de glycémie → stockage graisse abdominale, addiction au sucre, caries
Stratégie de remplacement :
Phase 1 (Semaines 1-2) : Réduction progressive
•	Remplacer 50% grignotages sucrés par alternatives saines
•	Garder 1-2 plaisirs sucrés/semaine (contrôlés)
Phase 2 (Semaines 3-4) : Nouvelles habitudes
•	80% alternatives saines
•	Plaisirs sucrés occasionnels uniquement
Alternatives au grignotage sucré :
1.	Fruits naturellement sucrés : 
o	Mangue bien mûre (satisfaction sucrée)
o	Banane
o	Papaye
o	Ananas
o	Dattes (2-3 seulement)
2.	Préparations maison légères : 
o	Chips de banane plantain au four (fines tranches, peu d'huile)
o	Boules de dattes-noix (mixer dattes + arachides)
o	Beignet haricot PETIT (1 seul, préparation maison)
3.	Boissons alternatives : 
o	Remplacer sodas par : 
	Eau ci";

            case 'boissons':
                return "tronnée
	Jus de bissap SANS SUCRE
	Infusion gingembre-citron
	Eau de coco naturelle


Tableau de substitution :
Mauvais grignotage	Calories	Alternatives	Calories	Économie
1 Coca-Cola (330ml)	140	Jus bissap sans sucre	5	-135
3 beignets sucrés	450	1 banane + 10 noix cajou	150	-300
Gâteau (100g)	400	Papaye + yaourt nature	120	-280
Bonbons (50g)	200	2 dattes + 5 amandes	90	-110

GRIGNOTAGE SALÉ (chips, cacahuètes salées, biscuits salés)
⚠️ Impact : Excès de sel → hypertension, rétention d'eau, soif → consommation boissons sucrées
Alternatives béninoises au grignotage salé :
1.	Versions non salées : 
o	Arachides grillées SANS SEL (portion : 20-30g)
o	Noix de cajou nature
o	Maïs soufflé maison (pop-corn air, épices sans sel)
2.	Crudités : 
o	Bâtonnets de carotte
o	Concombre tranché
o	Tomates cerises
o	Radis
3.	Préparations maison : 
o	Chips de légumes au four (igname, patate douce, plantain) - quantité limitée
o	Pois chiches rôtis aux épices
o	Maïs grillé
Portions contrôlées :
•	Préparer portions individuelles à l'avance (sachets de 20-30g)
•	Ne jamais grignoter du sachet directement
•	Utiliser petites assiettes
GRIGNOTAGE ÉMOTIONNEL (stress, ennui, tristesse)
Identification des déclencheurs :
Quand je m'ennuie →
•	Alternative : Marcher 10 minutes, appeler un ami, lire, écouter musique
•	Si vraiment faim : Fruit + eau
Quand je suis stressé(e) →
•	Alternative : Respiration profonde, étirements, sortir dehors
•	Si besoin manger : Tisane apaisante + petit carré chocolat noir OU fruit
Quand je suis triste →
•	Alternative : Parler à quelqu'un, écrire sentiments, activité plaisante
•	Si consolation alimentaire nécessaire : Portion contrôlée de plaisir favori
Techniques anti-grignotage émotionnel :
1.	La règle des 10 minutes : 
o	Envie de grignoter → Attendre 10 min
o	Boire grand verre d'eau
o	Faire autre chose
o	Réévaluer la faim
2.	Journal alimentaire émotionnel : 
o	Noter : Heure / Aliment / Quantité / Émotion ressentie
o	Identifier patterns
o	Trouver alternatives
3.	Stratégies de substitution : 
o	Remplacer grignotage par : marche, douche, musique, appel ami, hobby
SI NON : Vous ne grignotez pas
🌟 Excellent ! Maintenir cette habitude
Conseils pour renforcer :
1.	S'assurer que les 3 repas principaux sont suffisamment rassasiants : 
o	Protéines adéquates à chaque repas
o	Fibres abondantes (légumes, légumineuses)
o	Bonnes graisses en quantité modérée
2.	Prévoir 2 collations structurées si nécessaire : 
o	Pas de \"grignotage\" mais collations planifiées
o	Horaires fixes (ex: 10h30 et 16h)
o	Portions mesurées
Collations structurées  :
•	10h : Fruit + poignée de noix
•	16h : Yaourt nature + quelques fruits
Si tentation de grignoter appa";

            case 'sommeil':
                return "raît :
•	Vérifier hydratation (souvent soif confondue avec faim)
•	Boire thé/tisane sans sucre
•	S'occuper l'esprit/les mains
🥤 BOISSONS SUCRÉES ET ALCOOLISÉES
TOUS LES JOURS
🚨 ALERTE ROUGE : Priorité absolue de changement
Impact catastrophique :
•	Boissons sucrées quotidiennes : 
o	+140-200 calories/canette (vides nutritionnellement)
o	Pics glycémiques multiples → stockage graisse
o	Addiction au sucre
o	Risque diabète +26% par portion quotidienne
o	Caries, problèmes digestifs
•	Alcool quotidien : 
o	Calories élevées (7 kcal/g, presque comme graisse)
o	Stockage graisse abdominale préférentielle
o	Perturbation métabolisme, sommeil
o	Risque maladies foie, cardiovasculaires
o	Déshydratation
Plan de sevrage progressif (CRITIQUE) :
Semaine 1 : Réduction 50%
•	Passer de quotidien à 1 jour sur 2
•	Diviser par 2 les quantités
•	Alterner avec eau, tisanes
Exemple :
•	Avant : 3 Coca/jour = 420 calories
•	Semaine 1 : 1,5 Coca/jour = 210 calories → Économie 210 cal/jour
Semaine 2-3 : Réduction 75%
•	Maximum 2-3 fois/semaine
•	Remplacer par alternatives
Semaine 4+ : Consommation occasionnelle
•	1 fois/semaine maximum pour boissons sucrées
•	1-2 verres/semaine pour alcool (si pas de contre-indication médicale)
Alternatives aux boissons sucrées :
1.	Boissons maison non sucrées : 
o	Jus de bissap naturel : Fleurs d'hibiscus bouillies, refroidies, SANS SUCRE ou avec stévia
o	Eau de gingembre : Gingembre frais infusé, citron, menthe
o	Eau de tamarin : Tamarin + eau, non sucré
o	Infusion citronnelle-menthe
o	Eau de coco naturelle (pas versions sucrées industrielles)
2.	Eaux aromatisées maison : 
o	Eau + rondelles citron + feuilles menthe
o	Eau + orange + concombre
o	Eau + ananas + gingembre (fruits infusés, pas jus)
3.	Boissons chaudes : 
o	Thé vert
o	Tisanes locales
o	Café noir (modéré)
o	Infusion gingembre
Stratégies pratiques :
1.	Supprimer stocks à domicile : 
o	Ne plus acheter sodas
o	Préparer grandes carafes d'alternatives
o	Toujours avoir eau fraîche disponible
2.	Hors domicile : 
o	Commander toujours eau ou bissap non sucré
o	Éviter lieux tentations si possible
o	Préparer gourde maison
3.	Gestion envies : 
o	Envie de sucré → Fruit frais
o	Envie de pétillant → Eau gazeuse + citron
o	Envie de goût → Tisane aromatisée
Pour l'alcool spécifiquement :
Si consommation quotidienne :
•	⚠️ Risque dépendance : consulter professionnel santé
•	Ne pas arrêter brutalement si forte consommation
•	Réduction progressive indispensable
Alternatives sociales à l'alcool :
•	Mocktails (cocktails sans alcool) : jus fruits frais + épices + eau gazeuse
•	Jus de fruits naturels
•	Bissap glacé
•	Cocktails gingembre-citron
Calories économisées si arrêt boissons sucrées quotidiennes :
•	2 Coca/jour = 280 calories
•	Sur 1 mois = 8400 calories économisées
•	= 1,2 kg de graisse en moins par mois juste en arrêtant sodas !
UNE FOIS PAR SEMAINE
✅ Acceptable mais optimisable
Recommandations :
1.	Maintenir cette fréquence comme maximum
2.	Contrôler les quantités : 
o	Boisson sucrée : 1 petite canette (250ml) MAX
o	Alcool : 1 verre standard pour femmes, 2 pour hommes MAX
3.	Choisir le bon moment : 
o	Pendant repas (ralentit absorption)
o	Pas à jeun
o	Bien s'hydrater avant et après
Meilleurs choix si consommation hebdomadaire :
Boissons sucrées :
•	Jus de fruits frais maison (1 verre) > sodas
•	Smoothie fruits naturels > jus industriels
•	Bissap légèrement sucré maison > Fanta
Alcool (si pas de contre-indication) :
•	Vin rouge (1 verre) - antioxydants
•	Bière locale (1 petite bouteille)
•	ÉVITER : alcools forts, cocktails sucrés
Compensation le jour de consommation :
•	Augmenter activité physique
•	Réduire légèrement féculents au repas
•	Boire beaucoup d'eau
•	Pas d'autres écarts alimentaires ce jour-là
OCCASIONNELLEMENT (1-2 fois par mois)
✅ Idéal pour la santé
Conseils pour occasions spéciales :
1.	Planifier les occasions : 
o	Fêtes, événements spéciaux uniquement
o	Pas de consommation \"par habitude\"
2.	Stratégies pour limiter dégâts : 
o	Manger avant de boire
o	Alterner alcool/eau (1 verre alcool → 1 verre eau)
o	Fixer limite avant événement (ex: 2 verres MAX)
3.	Choix intelligents : 
o	Privilégier qualité > quantité
o	Savourer lentement
o	Apprécier l'occasion plus que la boisson
Gestion lendemain :
•	Réhydratation importante
•	Alimentation saine et légère
•	Activité physique si possible
•	Pas de culpabilité (c'était occasionnel !)
JAMAIS
🏆 EXCELLENT pour perte de poids et santé !
Bénéfices constatés :
•	Économie 200-500 calories/jour
•	Glycémie stable
•	Meilleure hydratation
•	Sommeil de qualité
•	Foie en santé
•	Perte de poids facilitée
Maintenir cette excellente habitude :
1.	Rester vigilant aux pressions sociales : 
o	Préparer réponses : \"Je préfère jus naturels\", \"Je ne bois pas pour raisons de santé\"
o	Toujours avoir alternative en main (eau, jus maison)
2.	Célébrer autrement : 
o	Occasions spéciales ≠ obligation de boire alcool/sodas
o	Mocktails festifs
o	Focus sur moments, pas boissons
3.	Hydratation optimale : 
o	2-3L eau/jour
o	Tisanes variées
o	Jus naturels maison (occasionnels)
Boissons saines quotidiennes recommandées :
•	Eau pure : 1,5-2L minimum
•	Thé vert : 2-3 tasses
•	Tisanes locales : à volonté
•	Jus légumes maison : 1 verre/jour
•	Eau de coco naturelle : occasionnellement
•	Café noir : 1-2 tasses (sans sucre)
ADAPTATIONS SELON COMPORTEMENTS ET BIEN-ÊTRE
😴 SOMMEIL
MOINS DE 6 HEURES/NUIT
🚨 IMPACT MAJEUR SUR OBÉSITÉ
Pourquoi le manque de sommeil fait grossir :
1.	Perturbation hormonale : 
o	↑ Ghréline (hormone de la faim) +15%
o	↓ Leptine (hormone de satiété) -15%
o	→ Faim accrue, envies sucrées/grasses
2.	Métabolisme ralenti : 
o	Moins de calories brûlées au repos
o	Stockage graisse favorisé (surtout abdominale)
3.	Fatigue → Mauvais choix alimentaires : 
o	Recherche énergie rapide (sucre, gras)
o	Moins de volonté pour cuisiner sainement
o	Grignotages accrus
4.	Moins d'activité physique : 
o	Fatigue empêche exercice
o	Cercle vicieux
OBJECTIF PRIORITAIRE : Passer à 7-8h de sommeil
Plan d'amélioration progressive :
Phase 1 (Semaines 1-2) : +30 minutes
•	Coucher 30 min plus tôt
•	Établir routine pré-sommeil
Phase 2 (Semaines 3-4) : +1 heure
•	Ajuster horaires progressivement
•	Améliorer qualité du sommeil
Phase 3 (Mois 2+) : Atteindre 7-8h
•	Maintenir régularité
•	Optimiser environnement
Stratégies pour mieux dormir :
1. Alimentation favorable au sommeil :
DÎNER LÉGER (3h avant coucher) :
•	✅ Favoriser : 
o	Soupe de légumes légère
o	Poisson grillé + petite portion féculent
o	Tisane camomille/citronnelle après dîner
o	Banane (riche en magnésium, tryptophane)
•	❌ Éviter : 
o	Repas trop gras, épicés
o	Grande quantité de viande rouge
o	Café, thé noir après 16h
o	Sodas, alcool
o	Gros volumes liquides (réveils nocturnes)
Exemple dîner pro-sommeil :
•	Soupe légumes + petit morceau d'igname + poisson grillé
•	Tisane citronnelle 1h après
•	Éviter écrans 30 min avant coucher
COLLATION PRÉ-SOMMEIL si vraiment faim (1-2h avant) :
•	Petit yaourt nature
•	1/2 banane + quelques noix
•	Lait tiède avec pincée de muscade
2. Habitudes de vie :
Routine relaxante :
•	Douche tiède (pas chaude)
•	Lecture légère
•	Musique douce
•	Prière/méditation
•	Étirements doux
Environnement optimal :
•	Chambre fraîche (ventilateur si nécessaire)
•	Obscurité maximale
•	Calme (boules Quies si bruits)
•	Téléphone hors chambre ou en mode avion
Horaires réguliers :
•	Coucher et lever à heures fixes
•	Même weekends (± 1h)
•	Sieste courte si nécessaire (20 min max, avant 15h)
3. Gestion stress :
•	Éviter sujets stressants le soir
•	Noter préoccupations pour lendemain (vider esprit)
•	Techniques respiration (4-7-8 : inspirer 4s, retenir 7s, expirer 8s)
Adaptations alimentaires si sommeil insuffisant :
Tant que sommeil pas amélioré, compenser :
1.	Petit-déjeuner plus copieux : 
o	Combattre fatigue matinale
o	Protéines + glucides complexes + fruits
o	Exemple : Bouillie enrichie + œuf + orange + noix
2.	Collations anti-fatigue : 
o	Milieu matinée : Fruit + poignée noix (énergie durable)
o	Après-midi : Yaourt + fruits (éviter sucres rapides)
3.	Éviter excitants : 
o	Pas de café après 14h
o	Limiter thé noir
o	Privilégier tisanes, eau
4.	Hydratation optimale : 
o	Bien s'hydrater (fatigue = parfois déshydratation)
o	2-3L eau répartis sur journée
o	Réduire après 19h (limiter réveils nocturnes)
Suivi et objectifs :
•	Tenir journal sommeil (heures coucher/lever, qualité)
•	Viser 7h minimum rapidement
•	Objectif final : 7-9h régulières
6-7 HEURES/NUIT
⚠️ Limite basse - Amélioration souhaitable
Impact :
•	Meilleur que <6h mais toujours sous-optimal
•	Récupération incomplète
•	Métabolisme légèrement affecté
Objectif : Viser 8h pour optimiser perte de poids
Stratégies :
1.	Identifier voleurs de sommeil : 
o	Écrans tardifs ? → Arrêt 1h avant coucher
o	Coucher tardif ? → Avancer progressivement 15 min/semaine
o	Réveils nocturnes ? → Analyser causes (vessie, bruit, stress";

            case 'apnee':
                return ")
2.	Optimiser qualité : 
o	Même si quantité limitée, améliorer profondeur
o	Chambre plus fraîche, plus sombre
o	Routine relaxation pré-sommeil
Alimentation :
•	Dîner 3h avant coucher minimum
•	Éviter caféine après 15h
•	Tisane relaxante 1h avant coucher
8-9 HEURES/NUIT
✅ OPTIMAL pour santé et perte de poids !
Bénéfices constatés :
•	Hormones de faim régulées
•	Métabolisme optimal
•	Meilleure volonté, choix alimentaires sains
•	Récupération musculaire (si activité physique)
•	Stress réduit
Maintenir cette excellente habitude :
1.	Régularité : 
o	Coucher/lever heures fixes
o	Routine constante
2.	Qualité continue : 
o	Évaluer réveils nocturnes (minimiser)
o	S'assurer sommeil réparateur
Alimentation de soutien :
•	Continuer dîners légers
•	Magnésium adéquat (légumes verts, banane, noix)
•	Hydratation bonne mais limitée le soir
Synergies :
•	Bon sommeil + alimentation saine + exercice = FORMULE GAGNANTE
•	Perte de poids facilitée
•	Énergie pour activité physique
•	Cercle vertueux
PLUS DE 9 HEURES/NUIT
⚠️ Peut indiquer problème sous-jacent
Causes possibles :
•	Apnée du sommeil (sommeil non réparateur)
•	Dépression
•	Hypothyroïdie
•	Mauvaise qualité de sommeil (compensée par quantité)
•	Médicaments sédatifs
Actions recommandées :
1.	Consulter médecin si : 
o	Fatigue persistante malgré longues nuits
o	Ronflements importants
o	Somnolence diurne
o	Sommeil non réparateur
2.	Évaluer qualité : 
o	Tenir journal : heures, qualité ressentie, réveils
o	Noter fatigue journée
o	Identifier si vrai besoin ou compensation
Alimentation :
•	Similaire à 8-9h
•	Si fatigue malgré sommeil : vérifier carences (fer, vitamine B12, vitamine D)
•	Consulter pour bilan sanguin
😪 APNÉE DU SOMMEIL
SI OUI : Vous avez l'apnée du sommeil
🚨 LIEN FORT AVEC OBÉSITÉ - Priorité absolue
Cercle vicieux Obésité-Apnée :
1.	Obésité → Apnée : 
o	Graisse cou/gorge comprime voies respiratoires
o	70% personnes en obésité ont apnée du sommeil
2.	Apnée → Obésité aggravée : 
o	Sommeil fragmenté → perturbations hormonales
o	Fatigue → moins d'activité physique
o	Métabolisme ralenti
o	Envies sucrées/grasses accrues
IMPACT DE LA PERTE DE POIDS SUR L'APNÉE :
•	Perte de 10% du poids = réduction 30-50% des événements apnéiques
•	Certaines personnes guérissent complètement avec perte de poids suffisante
Plan d'action intégré :
1. Suivi médical :
•	✅ Traitement actuel (PPC si prescrit) : CONTINUER
•	Consultations régulières ORL/pneumologue
•	Réévaluation après perte de poids significative
2. Alimentation anti-apnée :
Dîner ULTRA-LÉGER (4h avant coucher si possible) :
•	Éviter absolument : repas copieux, gras, alcool le soir
•	Privilégier : soupe légère, protéines maigres, légumes vapeur
Exemple dîner apnée :
•	Soupe de légumes maison (sans crème)
•	Petit morceau de poisson grillé (80g)
•	Salade verte
•	Tisane digestive
ALIMENTS À ÉVITER LE SOIR :
•	❌ Alcool (relaxe muscles gorge → apnée pire)
•	❌ Produits laitiers en excès (mucus)
•	❌ Aliments gras (digestion lente)
•	❌ Épices fortes (reflux)
•	❌ Grande quantité de liquides
ALIMENTS FAVORABLES :
•	✅ Thé vert (anti-inflammatoire)
•	✅ Gingembre (anti-inflammatoire voies respiratoires)
•	✅ Ail (améliore respiration)
•	✅ Curcuma (réduit inflammation)
3. Position sommeil :
•	Dormir sur le côté (jamais sur le dos)
•	Surélever légèrement tête du lit
•	Oreiller adapté (pas trop épais)
4. Perte de poids ciblée :
Objectif premier : -10% du poids actuel
Exemple :
•	Poids actuel : 90 kg
•	Objectif 1 : 81 kg (-9 kg)
•	Impact attendu : Réduction significative apnées
Rythme sain : 0,5-1 kg/semaine
•	9 kg en 2-3 mois
•	Réévaluation apnée après
**Stratégies aliment
Continuer
19:5";

            case 'regime_recent':
                return "4
aires accélérées pour apnée :**
Réduire inflammation :
•	Oméga-3 : Poisson 3-4×/semaine
•	Antioxydants : Fruits/légumes colorés abondants
•	Épices : Curcuma, gingembre quotidiens
Contrôle strict calories :
•	Déficit 500-750 kcal/jour
•	Suivi rigoureux portions
•	Pas d'écarts fréquents
5. Activité physique :
•	Même légère : marche 30 min/jour
•	Renforce muscles voies respiratoires
•	Facilite perte de poids
6. Autres mesures :
•	Arrêt tabac si fumeur (aggrave apnée)
•	Limiter alcool strictement
•	Gérer allergies nasales (facilite respiration)
•	Humidifier chambre si air sec
Suivi et réévaluation :
•	Tenir journal : qualité sommeil, ronflements, fatigue diurne
•	Après -5 kg : noter améliorations
•	Après -10 kg : consultation réévaluation apnée
•	Possibilité réajustement traitement PPC
Motivations :
•	Meilleur sommeil = plus d'énergie = plus facile perdre poids
•	Moins d'apnées = meilleure santé cardiovasculaire
•	Peut-être arrêt machine PPC à terme !
SI NON : Vous n'avez pas l'apnée du sommeil
✅ Positif pour la santé
Rester vigilant aux signes :
•	Ronflements forts
•	Pauses respiratoires rapportées par conjoint
•	Somnolence diurne excessive
•	Réveils avec sensation étouffement
•	Maux de tête matinaux
•	Fatigue chronique
Prévention avec perte de poids :
•	Réduire risque de développer apnée
•	Maintenir poids santé = protection
🏋️ RÉGIMES ANTÉRIEURS
SI OUI : Vous avez récemment fait un régime de perte de poids
Analyse selon perte obtenue :
MOINS DE 5 KG PERDUS
Analyse :
•	Perte modeste → régime possiblement trop restrictif (non suivi) ou pas assez long
•	Risque : découragement, effet yo-yo
Leçons à tirer :
1.	Pourquoi perte limitée ? 
o	Régime trop strict → abandon
o	Durée insuffisante
o	Méthode non adaptée à votre vie
o	Manque de soutien
2.	Cette fois sera différente : 
o	Approche progressive (pas régime draconien)
o	Changements durables
o	Plaisir alimentaire préservé
o	Adaptations béninoises culturellement appropriées
Stratégies pour succès cette fois :
Éviter erreurs passées :
•	❌ Régimes extrêmes (soupe, mono-aliment)
•	❌ Exclusions drastiques
•	❌ Objectifs irréalistes
Adopter approche durable :
•	✅ Rééquilibrage progressif
•	✅ Aliments béninois adaptés (pas \"régime étranger\")
•	✅ Objectifs réalistes (0,5-1 kg/semaine)
•	✅ Plaisirs contrôlés inclus
Renforcement positif :
•	Fixer petits objectifs (-2 kg, puis -5 kg)
•	Célébrer victoires non alimentaires (tour de taille, énergie, sommeil)
•	Soutien entourage/professionnel
5-10 KG PERDUS
🎉 Belle réussite ! Mais vigilance reprise de poids
Analyse :
•	Capacité démontrée à perdre poids
•	Risque majeur : effet rebond (yo-yo)
•	Objectif actuel : comprendre reprise et éviter récidive
Questions clés :
1.	Pourquoi reprise de poids ? 
o	Retour anciennes habitudes après \"fin régime\"
o	Régime trop restrictif (insoutenable)
o	Manque de phase stabilisation
o	Événements vie (stress, maladie)
o	Ralentissement métabolique
2.	Qu'est-ce qui a marché ? 
o	Identifier stratégies efficaces
o	Reproduire ce qui fonctionnait
o	Adapter pour durabilité
Plan anti-effet yo-yo :
Phase 1 : Perte de poids (actuelle)
•	Déficit modéré (-500 kcal/jour, pas -1000)
•	Perte lente mais durable (0,5-0,7 kg/semaine)
•	Préserver masse musculaire (protéines, sport)
Phase 2 : Stabilisation (CRITIQUE - souvent négligée)
•	Après objectif atteint : 2-3 mois stabilisation
•	Maintenir nouveau poids ± 2 kg
•	Introduire progressivement calories (pas retour brutal)
•	Renforcer nouvelles habitudes
Phase 3 : Maintien à vie
•	Surveillance régulière (pesée hebdomadaire)
•	Si +2 kg : réajustement immédiat
•	Habitudes saines = mode de vie, pas régime temporaire
Alimentation anti-yo-yo :
Ce qui cause l'effet rebond :
•	Régimes trop bas en calories (< 1200 kcal femmes, < 1500 hommes)
•	Élimination totale groupes aliments
•	Approche \"tout ou rien\"
Ce qui stabilise durablement :
•	Rééquilibrage global maintenu à vie
•	Flexibilité (80% sain, 20% plaisirs)
•	Écoute signaux faim/satiété
•	Activité physique régulière
Repas de stabilisation :
Intégrer progressivement plaisirs culturels :
•	Fêtes : portion raisonnable plats traditionnels
•	Occasions : un plaisir, compenser repas suivant
•	Quotidien : version équilibrée cuisine béninoise
Exemple transition régime → vie normale :
Pendant perte :
•	Riz : 150g mesuré
•	Sauce : portion contrôlée
•	Pas de dessert
Stabilisation :
•	Riz : 180g (un peu plus)
•	Sauce : normale
•	Dessert occasionnel
Maintien :
•	Riz : quantité raisonnable (écoute satiété)
•	Sauce : normale
•	Dessert 1-2×/semaine
•	Surveillance poids
PLUS DE 10 KG PERDUS
🏆 Exploit majeur ! Compétence démontrée
Mais : Vigilance maximale reprise
Réalité métabolique après grosse perte :
•	Métabolisme ralenti (adaptation corporelle)
•	Hormones faim perturbées (ghréline élevée, leptine basse)
•	Corps \"défend\" ancien poids
•	Besoin calorique inférieur à personne même poids n'ayant jamais été obèse
Pourquoi reprise après -10 kg+ ? Causes fréquentes :
1.	Régime trop extrême (insoutenable)
2.	Absence phase stabilisation
3.	Croyance \"but atteint, retour normal\"
4.	Sous-estimation besoins caloriques maintien
5.	Arrêt activité physique
Plan spécifique post-grande perte :
1. Accepter nouvelle réalité métabolique :
•	Besoin calorique réduit (100-200 kcal/jour de moins qu'attendu)
•	Surveillance vie entière nécessaire
•	Nouvelles habitudes = permanentes
2. Phase actuelle - Reperte de poids :
Éviter erreurs :
•	❌ Refaire même régime drastique (ne marchera pas toujours)
•	❌ Frustration/culpabilité excessive
•	❌ Cycles répétés perte/reprise (aggrave métabolisme)
Approche intelligente :
•	✅ Déficit modéré (perte plus lente qu'avant)
•	✅ Renforcement musculaire (augmente métabolisme)
•	✅ Patience (accepter lenteur)
•	✅ Suivi professionnel (nutritionniste, psychologue)
3. Maintien après ré-atteinte objectif :
Surveillance rigoureuse :
•	Pesée hebdomadaire même poids stable
•	Journal alimentaire intermittent (1 semaine/mois)
•	Check tour de taille mensuel
•	Consultation nutritionniste 2-4×/an
Stratégies maintien à vie :
Alimentaires :
•	Structure repas jamais abandonnée
•	80% temps : alimentation structurée saine
•	20% occasions : plaisirs contrôlés
•	Pas de \"tout est permis\", jamais
Activité physique NON NÉGOCIABLE :
•	Minimum 150 min/semaine (activité modérée)
•	Renforcement musculaire 2×/semaine
•	Activité quotidienne (marche)
Psychologiques :
•	Gestion stress sans nourriture
•	Soutien social (groupe, famille)
•	Suivi psychologique si besoin
•	Célébrer maintien (pas que perte)
Repas long terme :
Quotidien :
•	Porti";

            case 'sedentarite':
                return "ons contrôlées toujours
•	Légumes abondants toujours
•	Cuissons saines prioritaires
Occasions (1-2×/semaine) :
•	Portion normale plat festif
•	Compensation repas suivant
•	Pas de culpabilité
Règles or maintien :
1.	Ne jamais laisser reprise dépasser 2-3 kg avant réaction
2.	Rester actif physiquement toute la vie
3.	Sommeil prioritaire (7-9h)
4.	Gestion stress
5.	Soutien professionnel au besoi
SI NON : Vous n'avez jamais fait de régime de perte de poids
Avantages :
•	Métabolisme non altéré par régimes yo-yo
•	Pas de \"mémoire\" échecs
•	Motivation intacte
Inconvénients :
•	Inexpérience changements alimentaires
•	Peut-être sous-estimation difficulté
Recommandations premières fois :
1. Commencer progressivement :
•	Pas de bouleversement brutal
•	Changer 1-2 habitudes/semaine
•	Laisser corps s'adapter
Exemple progression :
•	Semaine 1 : Supprimer sodas
•	Semaine 2 : Ajouter légumes déjeuner/dîner
•	Semaine 3 : Réduire portions féculents
•	Semaine 4 : Ajouter collations saines
2. Éducation nutritionnelle :
•	Comprendre POURQUOI changements
•	Apprendre portions appropriées
•	Identifier aliments à privilégier/limiter
3. Fixer objectifs réalistes :
•	Perte 0,5-1 kg/semaine
•	Objectif final : poids santé, pas \"idéal\"
•	Célébrer petites victoires
4. Construire habitudes durables dès le début :
•	Pas \"régime temporaire\" → mode de vie
•	Inclure plaisirs dès départ (contrôlés)
•	Trouver équilibre viable long terme
5. Se faire accompagner :
•	Nutritionniste pour guidance
•	Soutien famille/amis
•	Groupe soutien si disponible
6. Patience et bienveillance :
•	Apprentissage = erreurs normales
•	Pas de perfection exigée
•	Focus progrès, pas perfection
ADAPTATIONS SELON ACTIVITÉ PHYSIQUE
🏃 FRÉQUENCE D'ACTIVITÉ PHYSIQUE
AUCUN JOUR (Sédentaire)
🚨 Priorité absolue : Initier mouvement
Dangers sédentarité + obésité :
•	Risque cardiovasculaire doublé
•	Diabète type 2 risque ×3
•	Certains cancers
•	Mortalité précoce
•	Dépression
•	Perte musculaire
Objectif progressif : Passer de 0 à 3-5 jours/semaine
Phase 1 (Semaines 1-2) : Initiation douce
Objectif : Bouger 10 minutes/jour
Activités béninoises ultra-accessibles :
•	Marche matinale 10 min (autour maison/quartier)
•	Tâches ménagères actives (balayage énergique, lessive main)
•	Monter escaliers au lieu ascenseur
•	Descendre transport 1 arrêt avant destination
Intégration quotidienne :
•	Matin : 5 min étirements au réveil
•	Journée : Marche 10 min
•	Soir : 5 min mouvements doux
Phase 2 (Semaines 3-4) : Augmentation
Objectif : 20-30 min, 3 jours/semaine
Activités structurées :
•	Marche rapide : 20 min, 3×/semaine (lundi, mercredi, samedi)
•	Danse : Musique locale, 20 min chez soi
•	Jardinage actif : Si possibilité
•	Nettoyage énergique : Compter comme activité
Phase 3 (Mois 2) : Consolidation
Objectif : 30 min, 5 jours/semaine
Progression activités :
•	Marche : Augmenter distance progressivement
•	Ajouter variété : Vélo si disponible, nage si piscine accessible
•	Exercices maison : Squats, pompes murales, abdos
Adaptations alimentaires si aucune activité :
Portions réduites nécessaires :
•	Féculents : Portions minimales du tableau (niveau sédentaire)
•	Protéines : Maintenir (préserver muscle)
•	Légumes : Augmenter (satiété sans calories)
Exemple journée alimentaire sédentaire complet :
Petit-déjeuner :
•	Bouillie maïs (150g) + œuf + papaye
Déjeuner :
•	Riz (100g) + sauce légère + poisson (100g) + GRANDE salade
Dîner :
•	Soupe légumes + petit morceau igname (80g) + poulet (80g)
Collations :
•	Fruits principalement
•	Noix très limitées
Calories totales : ~1400-1600 kcal (déficit pour perte poids sans activité)
Motivation pour démarrer :
Bénéfices immédiats activité physique (dès 1-2 semaines) :
•	Plus d'énergie
•	Meilleur sommeil
•	Moins de stress
•	Meilleure humeur
•	Digestion améliorée
Astuces béninoises pour rendre activité plaisante :
•	Marcher avec ami(e), famille
•	Écouter musique préférée
•	Découvrir nouveaux quartiers en marchant
•	Danser sur musique locale traditionnelle
•	Participer activités communautaires (si dispo)


1-3 JOURS/SEMAINE (Légèrement actif)
✅ Bon début ! Objectif : Augmenter à 5 jours
Stratégies d'augmentation :
Identifier barrières :
•	Manque temps ? → Fractionner (3×10 min = 1×30 min)
•	Manque motivation ? → Trouver partenaire exercice
•	Fatigue ? → Vérifier sommeil, alimentation
•	Ennui ? → Varier activités
Plan progression 1-3j → 5j :
Mois 1 :
•	Maintenir 3 jours actuels
•	Ajouter 1 jour activité légère (marche 15 min)
•	= 4 jours
Mois 2 :
•	4 jours structurés
•	Ajouter 5ème jour (activité plaisir : danse, vélo)
•	= 5 jours ✅
Mois 3+ :
•	Consolider 5 jours
•	Augmenter intensité ou durée progressivement
Alimentation :
•	Maintenir répartition \"légèrement actif\" du tableau
•	Si augmentation activité à 5j : passer à \"modérément actif\"
•	Assurer récupération : protéines adéquates, hydratation




4-6 JOURS/SEMAINE (Modérément à très actif)
🌟 Excellent ! Maintenir et optimiser
Recommandations :
1.	Varier types d'activité : 
o	Cardio (marche rapide, course, vélo, danse)
o	Renforcement (poids corps, résistance)
o	Flexibilité (étirements, yoga)
2.	Progression intelligente : 
o	Augmenter intensité plutôt que toujours durée
o	Principe surcharge progressive
3.	Récupération : 
o	1-2 jours repos/semaine
o	Sommeil 8h
o	Alimentation récupération (protéines post-effort)
Alimentation sportif modéré-actif :
Timing nutriments :
Avant exercice (1-2h avant) :
•	Glucides modérés + peu protéines
•	Exemple : Banane + quelques noix / Petit bol bouillie
Pendant (si >1h) :
•	Hydratation +++
•	Si >90 min : collation glucides (fruit, barre maison)
Après exercice (dans 30-60 min) :
•	Protéines + glucides
•	Exemples : 
o	Yaourt + fruits
o	Sandwich poulet-avocat
o	Smoothie lait-banane-arachide
Hydratation sportif :
•	Avant : Bien hydraté (urine claire)
•	Pendant : 150-200ml toutes les 15-20 min si intense
•	Après : Réhydrater abondamment
7 JOURS/SEMAINE (Extrêmement actif)
⚠️ Attention surcharge - Repos essentiel !
Risques activité quotidienne :
•	Surentraînement
•	Blessures
•	Fatigue chronique
•	Système immunitaire affaibli
•	Cortisol élevé (hormone stress → stockage graisse abdominale)
Recommandations :
1. Varier intensités :
•	3-4 jours : Intensité modérée-élevée
•	2-3 jours : Intensité légère (marche, yoga, étirements)
•	1 jour : Récupération active ou repos complet
Exemple semaine équilibrée :
•	Lundi : Course 45 min (intense)
•	Mardi : Renforcement musculaire
•	Mercredi : Marche légère 30 min
•	Jeudi : HIIT ou sport 45 min
•	Vendredi : Yoga/étirements
•	Samedi : Activité plaisir intense (danse, foot...)
•	Dimanche : Repos OU marche très légère
2. Écouter corps :
•	Douleurs ≠ courbatures normales → repos
•	Fatigue excessive → diminuer
•	Insomnie, irritabilité → signes surentraînement
Alimentation extrêmement actif :
Besoins augmentés :
•	Calories : Répartition 55% glucides (tableau) essentielle
•	Protéines : 1,6-2g/kg poids corporel (récupération)
•	Hydratation : 3-4L/jour
Structure nutritionnelle :
5-6 repas/jour :
1.	Petit-déjeuner copieux
2.	Collation milieu matinée
3.	Déjeuner conséquent
4.	Collation pré-entraînement
5.	Collation post-entraînement
6.	Dîner modéré
Exemple journée :
•	7h : Bouillie enrichie (350g) + œufs + fruits + noix
•	10h : Smoothie fruits-lait + barre maison
•	13h : Riz (300g) + sauce viande + légumes + fruits
•	16h (pré-sport) : Banane + quelques dattes
•	18h (post-sport) : Yaourt + fruits + granola
•	20h : Protéines + légumes + féculent modéré + salade
Supplémentation à considérer (après avis médical) :
•	Multivitamines
•	Électrolytes si transpiration importante
•	Protéines whey (facultatif, privilégier sources naturelles)
⏰ TEMPS ASSIS QUOTIDIEN
MOINS DE 4 HEURES (Excellent)
🏆 Mode de vie actif !
Maintenir :
•	Continuer limiter temps assis
•	Garder habitudes mouvement quotidien
Synergie nutrition-mouvement :
•	Dépense énergétique élevée
•	Métabolisme actif
•	Flexibilité alimentaire légèrement accrue (tout en respectant objectif perte poids)



4-6 HEURES (Moyen)
Améliorations possibles :
Stratégies réduction temps assis :
1.	Au travail/études : 
o	Se lever toutes les heures (5 min)
o	Marcher pendant appels téléphoniques
o	Bureau debout si possible (improviser)
o	D";

            case 'fc_connaissance':
                return "éjeuner avec petite marche après
2.	À domicile : 
o	Limiter TV/écrans
o	Tâches ménagères actives
o	Jeux actifs avec enfants
o	Jardinage
3.	Transports : 
o	Marcher/vélo si possible
o	Descendre 1 arrêt avant
o	Stationner plus loin
Objectif : Passer à <4h assis
Alimentation :
•	Adaptée à dépense réelle
•	Si très assis : vigilance portions féculents
6-8 HEURES (Préoccupant)
⚠️ Risques santé accrus
\"Sitting is the new smoking\" :
•	Risque cardiovasculaire
•	Diabète type 2
•	Obésité aggravée
•	Douleurs musculo-squelettiques
Plan action réduction :
Pauses actives obligatoires :
•	Toutes les heures : 5 min debout/mouvement
•	Marcher, étirements, montée escaliers
Compensation soir/weekend :
•	Activité physique structurée 45-60 min
•	Marche digestive post-repas (15-20 min)
Alimentation compensatoire :
Si 6-8h assis + peu d'exercice structuré :
•	Réduire portions glucides de 10-15%
•	Augmenter légumes (satiété)
•	Protéines maintenues
Exemple ajustement :
•	Riz : 180g → 150g
•	Ajouter : +100g légumes vapeur
PLUS DE 8 HEURES (Alerte)
🚨 Danger majeur pour santé
Conséquences :
•	Risque mortalité cardiovasculaire +90%
•	Métabolisme fortement ralenti
•	Inflammation chronique
•	Perte musculaire accélérée
Actions urgentes :
1. Interruptions fréquentes :
•	Toutes les 30 minutes : se lever 2-3 min minimum
•	Alarme téléphone si nécessaire
•	Marcher sur place, étirements
2. Activité physique compensatoire intense :
•	Minimum 60 min/jour activité modérée-vigoureuse
•	Nécessaire pour contrer effets sédentarité
3. Réorganisation vie :
•	Réévaluer travail : possibilité bouger plus ?
•	Transports actifs
•	Loisirs actifs (pas TV)
Alimentation très contrôlée :
Métabolisme très ralenti par position assise prolongée :
•	Réduction glucides 20% vs recommandations niveau activité
•	Augmentation protéines (préserver muscle)
•	Légumes maximaux (satiété, nutriments, peu cal";

            case 'stress_ennui':
                return "ories)
Exemple journée >8h assis :
Petit-déj :
•	Omelette (2 œufs) + légumes + 1/2 avocat + 1 petite tranche pain
Déjeuner :
•	Protéines (120g) + PETITE portion riz (100g) + ÉNORME salade
•	Focus : protéines + légumes, féculents minimaux
Dîner :
•	Soupe légumes + protéines + salade
•	Pas ou très peu de féculents
Collations :
•	Fruits + petite poignée noix
Compensation mouvement post-repas :
•	Marche 15 min après déjeuner et dîner (aide digestion, active métabolisme)
💓 FRÉQUENCE CARDIAQUE AU REPOS
SI OUI : Vous connaissez votre FC repos
Utilité pour entraînement et santé :
Valeurs normales :
•	Adultes : 60-100 bpm
•	Sportifs : 40-60 bpm
•	Obésité non entraînée : souvent 70-90 bpm
Interprétation :
FC repos élevée (>85-90 bpm) :
•	Signe : Condition physique faible
•	Facteurs : Obésité, sédentarité, stress, mauvais sommeil
•	Objectif : Réduire avec exercice régulier, perte poids, gestion stress
Avec entraînement régulier (3-6 mois) :
•	FC repos diminue de 5-15 bpm
•	Signe amélioration santé cardiovasculaire
FC repos normale (60-80 bpm) :
•	Condition physique raisonnable
•	Maintenir avec activité continue
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
•	Alternatif : Test parole (doit pouvoir parler mais difficilement = bon niveau)
•	Mesure manuelle : Pouls 15s × 4
Alimentation selon FC repos :
FC élevée (>85 bpm) :
•	Anti-inflammatoires : Oméga-3 (poisson), curcuma, gingembre
•	Antioxydants : Fruits/légumes colorés
•	Magnésium : Légumes verts, noix, bananes
•	Limiter : Caféine, alcool, sel
SI NON : Vous ne connaissez pas votre FC repos
Apprendre à la mesurer :
Méthode manuelle :
1.	Au réveil, encore au lit
2.	Trouver pouls (poignet ou cou)
3.	Compter battements pendant 60 secondes
4.	Répéter 3 jours, faire moyenne
Quand consulter médecin :
•	FC >100 bpm au repos régulièrement
•	FC <50 bpm si non sportif
•	Irrégularités, palpitations
ADAPTATIONS SELON COMPORTEMENTS ALIMENTAIRES
😓 MANGER PAR STRESS OU ENNUI
SI OUI
🔴 Facteur majeur échec perte de poids - Adresser en priorité
Comprendre le mécanisme :
Stress → Manger :
•	Cortisol (hormone stress) ↑ → Envies sucrées/grasses
•	Réconfort émotionnel temporaire
•	Cercle vicieux : manger → culpabilité → plus de stress
Ennui → Manger :
•	Occupation automatique
•	Stimulation sensorielle (goût, texture)
•	Rituel réconfortant
Plan de gestion complet :
1. Identifier déclencheurs précis :
Tenir journal émotions-alimentation (1-2 semaines) :
Heure	Aliment	Quantité	Faim physique (1-10)	Émotion	Situation
15h	Beignets (5)		3/10	Stress travail	Bureau
21h	Chips	Sachet	2/10	Ennui	TV
Analyser patterns :
•	Quelles émotions déclenchent ?
•	Quels moments journée ?
•	Quels aliments choisis ?
2. Techniques alternatives au stress :
AVANT de manger émotionnellement, essayer (5-10 min) :
Physiques :
•	Marche rapide 10 min
•	Respiration profonde (4-7-8)
•	Étirements
•	Douche
•	Danse sur 2-3 chansons
Mentales :
•	Appeler ami/famille
•	Lire
•	Écrire sentiments (journal)
•	Méditation guidée (apps disponibles)
•	Prière
Sensorielles (occuper bouche sans calories) :
•	Boire tisane chaude lentement
•	Mâcher chewing-gum sans sucre
•	Boire grand verre d'eau avec citron
•	Bonbon menthe sans sucre
Créatives :
•	Hobby (dessin, tricot...)
•	Jardinage
•	Rangement/ménage
3. Si vraiment besoin de manger :
Règle des 10 minutes :
•	Attendre 10 min avec alternative
•	Réévaluer faim
•	Si toujours envie → choisir option saine
Collations émotionnelles \"moins pires\" :
Au lieu de : Beignets, chips, gâteaux, glace Choisir :
•	Fruits (satisfaction sucrée, fibres, nutriments)
•	Pop-corn maison (peu calories, occupe longtemps)
•	Légumes croquants + houmous (satisfaction croquant)
•	Yaourt nature + fruits
•	Tisane + 2-3 dattes
Portions pré-portionnées :
•	Préparer sachets individuels
•	Ne JAMAIS manger du paquet directement
•	Mettre dans bol, ranger paquet
4. Restructuration environnement :
À la maison :
•	Pas d'aliments déclencheurs en stock
•	Fruits visibles, gâteaux cachés
•	Activités alternatives disponibles (livres, matériel hobby)
Au travail :
•	Collations saines au bureau uniquement
•	Pause active au lieu pause snack
•	Bouteille d'eau visible
5. Gestion stress à la source :
Identifier sources stress majeures :
•	Travail, relations, finances, santé...
Actions réductrices :
•	Organiser temps (to-do lists)
•	Déléguer si possible
•	Dire non
•	Sommeil prioritaire
•	Activité physique régulière (anti-stress puissant)
•	Soutien professionnel (psychologue) si stress chronique
6. Auto-compassion :
Si craquage arrive (normal, humain) :
•	❌ PAS de culpabilité excessive
•	✅ Analyser : Qu'est-ce qui a déclenché ?
•	✅ Apprendre : Comment faire différemment prochaine fois ?
•	✅ Reprendre immédiatement habitudes saines (pas \"journée foutue\")
Alimentation préventive stress :
Nutriments anti-stress :
•	Magnésium : Épinards, amandes, bananes, haricots
•	Oméga-3 : Poisson gras
•	Vitamines B : Légumes verts, légumineuses, œufs
•	Tryptophane (précurseur sérotonine) : Banane, noix, dinde
Repas stabilisants :
•	Glucides complexes (libération lente énergie)
•	Protéines (satiété, neurotransmetteurs)
•	Éviter : Sucres rapides, caféine excessive, alcool
Exemple journée anti-stress alimentaire :
Petit-déj :
•	Bouillie d'avoine + banane + amandes + œuf
Collation :
•	Yaourt + baies
Déjeuner :
•	Saumon ou poisson gras + riz complet + épinards + avocat
Collation :
•	Noix mélangées (petite poignée)
Dîner :
•	Poulet + patate douce + brocolis/haricots verts
Soirée :
•	Tisane camomille
SI NON : Vous ne mangez pas par stress/ennui
🌟 Excellent ! Relation saine avec nourriture
Maintenir :
•	Continuer manger selon faim physique
•	Rester attentif émotions (peut changer)
Vigilance :
•	Périodes stress inhabituelles : observer comportements
•	Si changements : appliquer stratégies préventives
🍽️ FINIR L'ASSIETTE MÊME SANS FAIM
SI OUI
⚠️ Sabotage majeur perte de poids
Origine comportement :
•	Éducation (\"Finis ton assiette, gaspillage\")
•	Culpabilité
•	Habitude automatique
•	Dissociation signaux satiété
Impact :
•	Apport calorique excédentaire systématique
•	Ignore signaux naturels corps
•	Surcharge digestive
•	Gain poids progressif
Réapprentissage écoute satiété :
1. Reconnaître signaux faim/satiét�";

            case 'regime_particulier':
                return "� :
Échelle faim (1-10) :
1.	Affamé, étourdi
2.	Très faim, irritable
3.	Faim importante
4.	Début faim
5.	Neutre (ni faim ni trop plein)
6.	Satisfait confortablement
7.	Pleinement satisfait (STOP idéal)
8.	Trop plein
9.	Inconfortablement plein
10.	Douleur, nausée
Objectif :
•	Commencer manger à 3-4
•	Arrêter à 6-7 (même si reste nourriture)
2. Techniques pratiques :
AVANT le repas :
•	Se servir portions plus petites (toujours possibilité se resservir)
•	Utiliser assiettes plus petites (illusion portion suffisante)
•	Prévoir tupperware pour restes (pas gaspillage, repas suivant)
PENDANT le repas :
•	Manger lentement (20-30 min minimum)
•	Poser fourchette entre bouchées
•	Mâcher complètement (15-20 fois)
•	Pause mi-repas (2-3 min) : Évaluer satiété
•	Conversation, pas distraction (TV, téléphone)
Quand satiété atteinte (sensation ventre confortablement rempli, perte d'intérêt pour nourriture) :
•	ARRÊTER immédiatement
•	Couvrir assiette
•	Boire eau
•	Se lever de table
3. Gérer restes :
Mentalité changement :
•	❌ \"Je dois finir, pas gaspiller\"
•	✅ \"Mieux restes au frigo que kilos sur moi\"
•	✅ \"Mon corps n'est pas poubelle\"
Options restes :
•	Conserver repas suivant
•	Partager avec famille
•	Composter si vraiment non conservable
•	Réduire portions prochaines fois
4. Rééducation progressive :
Semaine 1-2 : Conscience
•	Noter niveau satiété avant/pendant/après repas
•	Observer sans changer (prise de conscience)
Semaine 3-4 : Premiers arrêts
•	Viser laisser 10-20% assiette si satiété avant
•	Accepter inconfort psychologique (normal au début)
Mois 2 : Nouvelle habitude
•	Écoute satiété automatique
•	Portions mieux ajustées dès le départ
5. Contexte béninois spécifique :
Culture partage/générosité :
•	Hôte sert généreusement = respect
•	Solutions : 
o	Communiquer besoins : \"Petite portion s'il vous plaît, santé\"
o	Accepter généreusement, manger selon satiété, laisser restes OK
o	Remercier chaleureusement indépendamment de quantité mangée
Repas familiaux :
•	Plats communs, service multiple
•	Solutions : 
o	Se servir soi-même portions raisonnables
o	Utiliser petite assiette
o	Manger lentement (autres terminent avant, moins pression se resservir)
Bénéfices attendus :
Court terme (2-4 semaines) :
•	Moins de ballonnements
•	Digestion améliorée
•	Énergie stable post-repas (pas somnolence)
Moyen terme (2-3 mois) :
•	Perte poids facilitée (réduction 200-400 kcal/jour)
•	Reconnexion signaux corps
•	Plaisir gustatif accru (apprécie nourriture vs avale automatiquement)
Long terme :
•	Régulation naturelle poids
•	Relation apaisée avec nourriture
SI NON : Vous arrêtez quand rassasié
🏆 Compétence précieuse pour poids santé
Continuer :
•	Respect signaux corps
•	Portions adaptées besoins réels
Optimisation :
•	Vérifier portions féculents (respectent recommandations niveau activité)
•	Assurer satiété dure 3-4h (sinon ajuster composition repas)

📖 RÉGIMES ALIMENTAIRES PASSÉS
SI OUI : Vous avez suivi un régime particulier
Analyse selon type de régime :
RÉGIMES RESTRICTIFS EXTRÊMES
(Ex : Soupe aux choux, mono-aliment, jeûne prolongé, <1000 kcal/jour)
Pourquoi a échoué :
•	Trop restrictif = insoutenable
•	Carences nutritionnelles
•	Ralentissement métabolisme
•	Frustration → craquages
•	Perte surtout eau/muscle, pas graisse
Pourquoi ne PAS refaire :
•	Aggrave métabolisme
•	Effet yo-yo garanti
•	Dangers santé (carences, fatigue, calculs)
Cette fois : Approche opposée
•	Rééquilibrage, pas restriction
•	Tous groupes aliments
•	Déficit modéré (500 kcal/jour max)
•	Durable, plaisirs inclus
RÉGIMES À LA MODE
(Ex : Paleo, cétogène, sans gluten, Dukan, etc.)
Pourquoi a marché temporairement :
•	Restriction calories déguisée
•	Nouveauté = motivation initiale
•	Élimination aliments caloriques
Pourquoi a échoué long terme :
•	Trop éloigné habitudes culturelles (difficile maintenir au Bénin)
•	Social compliqué
•	Coûteux
•	Ennui
•	Retour ancien pattern
Cette fois :
•	✅ Cuisine béninoise adaptée (pas régime étranger)
•	✅ Plaisirs locaux inclus (contrôlés)
•	✅ Socialement viable
•	✅ Économiquement accessible
RÉGIMES COMMERCIAUX
(Ex : substituts repas, poudres, programmes payants, etc.)
Problèmes :
•	Dépendance produits (arrêt = reprise)
•	Coûteux
•	N'apprend pas cuisiner sainement
•	Non durable
Cette fois :
•	✅ Aliments vrais, locaux, accessibles
•	✅ Apprentissage cuisine saine
•	✅ Autonomie totale
•	✅ Budget raisonnable
RÉGIMES BIEN CONDUITS
(Ex : Méditerranéen adapté, rééquilibrage avec professionnel, etc.)
Si a marché puis arrêté :
•	Analyser pourquoi arrêt
•	Reprendre ce qui fonctionnait
•	Adapter contraintes actuelles
Leçons à garder :
•	Principes efficaces
•	Recettes appréciées
•	Habitudes installées
Conseil général tous régimes passés :
Focus sur :
•	Comprendre POURQUOI (principes nutrition)
•	Construire habitudes vie (pas régime temporaire)
•	Flexibilité (vie réelle)
•	Plaisir culinaire (découvrir nouvelles recettes béninoises saines)
SI NON : Jamais suivi régime particulier
(Voir section précédente \"jamais fait régime perte de poids\")";

            default:
                return 'Aucun';
        }
    }
}
