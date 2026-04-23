<?php

namespace App\Services;

class WeightLossOver10DiabetesRecommendationService implements RecommendationServiceInterface
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = [], int $age = 30): string
    {
        switch ($key) {
            case 'antecedents_diag':
                return ": Antécédents de diabète type 2, hypertension ou maladies cardiovasculaires ?
✅ SI OUI - Diabète type 2 présent
CONSEILS CIBLÉS :
•	Privilégier les glucides à index glycémique bas
•	Fractionner les repas (éviter gros volumes)
•	Surveiller les portions de féculents
•	Augmenter les fibres (légumes verts)
Constat capital : D’après le calcul de votre RTH sur la base de vos données personnelles par notre système, nous remarquons une évidence par rapport à votre choix de réponse et vôtre valeur obtenue par calcul (mettre la valeur du RTH d’user, la comparé au seuil en fonction du sexe), ce qui confirme nos affirmations sur les risques accourus au diabète de type 2. De ce fait, nous vous exhortons à prendre en compte nos conseils qui suivent et notre guide alimentaire proposé en dessus afin de combattre efficacement votre obésité par votre objectif de perte de poids, nos conseils alimentaires et nos activités physique proposées à la suite de ce plan nutritionnel. 
❌ SI NON - Aucun antécédent
CONSEILS PRÉVENTIFS :
•	Maintenir alimentation équilibrée actuelle
•	Surveiller portions pour perte de poids progressive
•	Privilégier aliments";

            case 'meds_lies':
                return "peu transformés
•	Rester actif physiquement
❓ QUESTION : Prenez-vous des médicaments liés à votre antécédent ?
✅ SI OUI
TYPE 1 : Médicaments pour baisser la glycémie (metformine, glimepiride...)
CONSEILS CIBLÉS :
•	Metformine : prendre pendant/après repas (éviter nausées)
•	Éviter repas trop riches en graisses (ralentit absorption)
•	Répartir glucides sur tous les repas (éviter hypoglycémies)
•	Boire beaucoup d'eau

Catégorie de medicaments	Exemples principaux	Conseils nutritionnels
🟦 Médicaments pour baisser la glycémie	Metformine (Glucophage), Glimepiride, 
Gliclazide, 
Sitagliptine, 
Saxagliptine, 
Empagliflozine, Dapagliflozine, 
Liraglutide, 
Semaglutide	- Réduire les sucres rapides (sodas, pâtisseries, pain blanc)
- Manger à horaires réguliers (éviter hypoglycémies)
- Favoriser les fibres (fruits, légumes, légumineuses)
- Boire beaucoup d’eau (surtout avec SGLT2)

TYPE 2 : Insuline
CONSEILS CIBLÉS :
•	Respecter horaires fixes des repas
•	Compter les glucides précisément
•	Toujours avoir collation \"hypo\" disponible
•	Adapter doses selon activité physique (avec médecin)
Kit urgence hypoglycémie :
•	Sachets de sucre (3 morceaux)
•	Jus d'orange (150ml)
•	Biscuits secs locaux (2-3 pièces)
🟨 Insuline	Insuline rapide (Humalog), 
Insuline lente (Lantus, Tresiba)	- Compter les glucides pour ajuster les doses
- Éviter les sauts de repas
- Prévoir collations en cas d’activité physique
- Surveiller le poids (prise de poids possible)

TYPE 3 : Médicaments pour perdre du poids (orlistat, liraglutide...)
CONSEILS CIBLÉS :
Si ORLISTAT (bloque absorption graisses) :
•	Limiter graisses à 15g par repas maximum
•	Risque selles grasses si excès
•	Prendre multivitamines (vitamines liposolubles)
🟧 Médicaments pour perdre du poids	Orlistat, 
Liraglutide (Saxenda), 
Semaglutide (Wegovy)	- Limiter les graisses avec Orlistat (éviter diarrhées)
- Suivre une alimentation équilibrée
- Manger lentement et bien mastiquer
- Pratiquer une activité physique régulière

Si LIRAGLUTIDE (coupe appétit) :
•	Manger lentement, petites portions
•	Risque nausées : éviter gras, épices fortes
•	Fractionner davantage (5-6 petits repas)
•	
TYPE 4 : Médicaments pour la tension (IEC, ARA2, bêta-bloquants...)
CONSEILS CIBLÉS :
Si IEC ou ARA2 :
•	Attention potassium : ne pas surconsommer
•	Éviter suppléments potassium
•	Modérer bananes, avocats, fruits secs
•	Régime hyposodé strict
Si BÊTA-BLOQUANTS :
•	Peuvent masquer signes hypoglycémie
•	Surveiller étroitement glycémies
•	Collations régulières si diabète
•	Éviter alcool
Précautions exercice :
•	Fréquence cardiaque ne monte pas normalement
•	Ne pas se fier uniquement au pouls
•	Collation avant sport
•	Mesurer glycémie avant/après


🟥 Médicaments pour la tension artérielle	IEC (ramipril), 
ARA2 (losartan), 
Bêta-bloquants (bisoprolol), Diurétiques (hydrochlorothiazide)	- Limiter le sel (charcuterie, chips, plats préparés)
- Boire suffisamment d’eau (surtout si diurétiques)
- Favoriser aliments riches en potassium (banane, épinards, avocat)
- Réduire la caféine si tension accentuée

TYPE 5 : Médicaments cholestérol (statines)
CONSEILS CIBLÉS :
•	Prendre le soir (production cholestérol nocturne)
•	Éviter pamplemousse (interaction)
•	Augmenter fibres solubles
•	Réduire graisses saturées
À éviter :
•	Viandes grasses
•	Huile de palme en excès
•	Friture
•	Pamplemousse/jus pamplemousse
🟩 Médicaments pour le cholestérol	Statines (atorvastatine, simvastatine)	- Limiter graisses saturées (viande grasse, beurre, friture)
- Favoriser oméga-3 (poisson gras, graines de lin)
- Augmenter fibres solubles (avoine, pommes, légumineuses)
- Éviter excès d’alcool (risque hépatique)

NB : Choisissez le type en fonction de la sélection d’user lors de répondre aux questions 




❌ SI NON - Aucun médicament
Conseils : 
•	Prévention pure par l'alimentation
•	Une surveillance régulière de la glycémie est recommandée même sans traitement médicamenteux
•	Surveillance accrue par aliments + activité physique adaptée
•	Favoriser les glucides à index glycémique bas (IG bas) pour éviter les pics de glycémie.
•	Répartir les glucides sur la journée en petites quantités (3 repas + éventuellement 1 collation).
•	Eviter les sucres rapides en éliminant ou en limitant : sodas, jus de fruits, pâtisseries, confitures, bonbons, sucre ajouté.
•	Augmenter les fibres comme les légumineuses, légumes verts, céréales complètes : aident à ralentir l’absorption des glucides.
•	Réduire les graisses saturées en évitant les charcuteries, fritures, fromages gras et en préférant l’huile d’olive, les noix, l’avocat.
•	Privilégier les protéines maigres comme la viande blanche, poisson, œufs, tofu, légumineuses. Elles améliorent la satiété.
•	Limiter la consommation de sel car cela est important pour réduire le risque cardiovasculaire souvent associé au diabète.
•	Activité physique régulière :30";

            case 'journee_typique':
                return "minutes par jour (marche rapide, vélo, natation…). Elle améliore la sensibilité à l’insuline.
Approche alimentaire pure :
•	Perte de poids par alimentation + activité
•	Contrôle glycémique par choix alimentaires
•	Pas de contraintes";

            case 'fruits_legumes':
                return "médicamenteuses
•	Plus de flexibilité






🍽️ ADAPTATIONS SELON HABITUDES ALIMENTAIRES
❓ QUESTION : Journée typique de repas et collations 
	Nous vous remercions pour nous avoir divulgué votre journée typique car cela va nous permettre de vous orienter dans nos conseils enfin de cerner vos réalités quotidiennes en matière de nutrition. 
❓ QUESTION : Portions de fruits et légumes par jour
CHOIX 1 : 1-2 portions
⚠️ INSUFFISANT - AUGMENTATION PROGRESSIVE NÉCESSAIRE
CONSEILS CIBLÉS :
•	Objectif : passer à 5 portions minimum
•	Augmenter progressivement (1 portion/semaine)
•	Commencer par fruits appréciés
•	Intégrer légumes dans plats familiers
Propositions :
•	Collation matin : Papaye + concombre
•	Collation soir : Carotte râpée + mangue verte
CHOIX 2 : 3-4 portions
✅ BON DÉBUT - OPTIMISER VERS 5-7 PORTIONS
Conseils : 
•	Bon niveau, maintenir et diversifier
•	Bien, renforcer avec collations aux légumes 
•	Encourager à atteindre 5 portions (ex. avocat + mangue + salade)
 Propositions :
•	Intégrer légumes dans toutes les sauces (concombre, tomate)
•	Fruits frais à chaque collation 

CHOIX 3 : 5 portions ou plus
⭐ EXCELLENT - MAINTENIR ET VARIER
CONSEILS CIBLÉS :
•	Apport optimal atteint
•	Focus sur la variété
•	Privilégier légumes verts (densité nutritionnelle)
•	Fruits : 2-3 max/jour (contrôle sucres si diabète)
Répartition idéale :
•	Légumes : 3-4 portions/jour minimum
•	Fruits : 2-3 portions/jour maximum
Journée type 7 portions :
Matin :
•	Omelette tomates-oignons-épinards (2 légumes)
•	Orange (1 fruit)
10h :
•	Carottes crues (1 légume)
Midi :
•	Sal";

            case 'grignotage':
                return "ade mixte entrée (1 légume)
•	Sauce gombo-épinards (2 légumes)
Soir :
•	Soupe de légumes variés (compte pour 1-2 portions selon composition)
TOTAL : 7-8 portions
Priorités qualité :
•	Légumes verts foncés : épinards, gboma dessi (fer, calcium, folates)
•	Légumes crucifères : chou (antioxydants)
•	Légumes oranges : carottes, patate douce (bêta-carotène)
•	Fruits à baies si disponibles (antioxydants)
•	Avocat : bon gras mais 1/jour max

❓ QUESTION : Grignotez-vous entre les repas ?
✅ SI OUI - Analyse du type de grignotage
SITUATION 1 : Grignotage de produits sucrés/gras (beignets, galettes frites, sodas, bonbons, gâteaux, cacahuètes frites salées)
⚠️ À REMPLACER PROGRESSIVEMENT
CONSEILS CIBLÉS :
•	Identifier triggers (ennui, stress, habitude sociale)
•	Remplacements stratégiques
•	Pas d'interdiction brutale (frustration)
•	Alternatives satisfaisantes
Stratégie de remplacement :
Au lieu de beignets (akara frit) : → Akara cuit au four + sauce tomate pimentée → Galettes de haricots cuites vapeur
Au lieu de galettes frites : → Galettes de plantain au four avec épices → Chips de plantain maison déshydratées
Au lieu de sodas : → Jus de bissap maison non sucré + glace → Eau citronnée + gingembre + menthe → Infusion de citronnelle fraîche refroidie
Au lieu de cacahuètes frites salées : → Arachides grillées nature (30g max) → Noix de cajou locales non salées
Au lieu de bonbons/gâteaux : → Fruits séchés locaux (mangue, ananas) - petite portion → Fruits frais de saison → Yaourt nature + cannelle
Planning de transition (4 semaines) :
•	Semaine 1 : Remplacer 1 grignotage/jour
•	Semaine 2 : Remplacer 2 grignotages/jour
•	Semaine 3 : Remplacer tous les grignotages
•	Semaine 4 : Consolider nouvelles habitudes



SITUATION 2 : Grignotage de produits \"neutres\" (fruits, noix nature, yaourt, légumes)
✅ BON CHOIX - OPTIMISER LES QUANTITÉS
CONSEILS CIBLÉS :
•	Bonnes options maintenues
•	Attention portions (calories s'additionnent)
•	Timing stratégique
•	Éviter grignotage mécanique
Portions recommandées :
•	Fruits : 1 portion = 1 fruit moyen 
o	Orange, mangue, pomme : 1 unité
o	Ananas : 2 tranches
o	Raisin : 15-20 grains
o	Limite : 2-3 fruits/jour total
•	Noix/arachides : 30g maximum/collation 
o	Visualisation : creux de la main
o	Peser au début pour calibrer
•	Yaourt : 150-200g nature 
o	Sans sucre ajouté
o	Ajouter cannelle ou vanille naturelle
•	Légumes : portions illimitées 
o	Carottes, concombre, tomates cerises
o	Céleri si disponible
Timing optimal collations :
•	10h : Entre petit-déjeuner et déjeuner (évite fringale midi)
•	16h : Entre déjeuner et dîner (prévient excès le soir)
•	Éviter : après 20h (sauf hypoglycémie)
Collations \"neutres\" validées :
1.	Orange + noix de cajou (20g)
2.	Concombre + tomates + arachides (25g)
3.	Yaourt nature + morceaux de papaye
4.	Carottes crues + houmous maison
5.	Banane (si diabète bien contrôlé) + lait caillé



❌ SI NON - Pas de grignotage
SITUATION 1 : Repas suffisamment copieux
✅ SI BONNE ÉNERGIE TOUTE LA JOURNÉE
•	Continuer ainsi
•	Vérifier apports caloriques totaux suffisants
•	Surveiller pas de baisse d'énergie
✅ SI FATIGUE OU FRINGALES APPARAISSENT
•	Ajouter 1-2 collations stratégiques
•	Signe que repas principaux insuffisants
•	Ou trop long délai entre repas
Collation à ajoute";

            case 'boissons':
                return "r si besoin :
•	16h : Fruit + petit portion protéines 
o	Exemple : orange + 10 arachides
•	Évite fringale du soir et grignotage anarchique

SITUATION 2 : Restriction volontaire excessive
⚠️ SI RÉGIME TROP STRICT
•	Risque d'hypoglycémies
•	Ralentissement métabolisme
•	Fonte musculaire
•	Risque craquage compulsif
CONSEILS CIBLÉS :
•	Collations = OUTIL de contrôle, pas ennemi
•	Fractionnement aide contrôle glycémie
•	Maintient métabolisme actif
•	Prévient excès aux repas
Intégrer 2 collations légères obligatoires :
•	10h : Fruit + protéines (yaourt ou noix)
•	16h : Légumes + protéines (akassa + poisson)

❓ QUESTION : Fréquence boissons sucrées/alcoolisées
CHOIX 1 : Tous les jours
🚨 PRIORITÉ ABSOLUE - RÉDUCTION URGENTE
IMPACT SUR SANTÉ :
•	Boissons sucrées : pics glycémiques, calories vides, résistance insuline
•	Alcool : calories, hypoglycémies retardées, dommages foie
PLAN D'ACTION IMMÉDIAT :
BOISSONS SUCRÉES QUOTIDIENNES :
Semaine 1 : Réduction progressive
•	Alterner 1 jour sucré / 1 jour substitut
•	Substituts béninois : 
o	Bissap maison non sucré
o	Eau de coco naturelle (limité 1 verre/jour)
o	Jus de gingembre-citron
o	Infusion de citronnelle glacée
Semaine 2-3 : Dilution
•	Si jus : diluer 50% eau
•	Réduire progressivement
Continuer
31 déc. 2025
concentration
•	Objectif : sevrage du goût sucré
Semaine 4+ : Élimination
•	Boissons sucrées → occasionnelles uniquement
•	Eau, tisanes, jus très dilués
ALCOOL QUOTIDIEN :
⚠️ CONTRE-INDICATION FORMELLE
•	Incompatible avec diabète type 2 si quotidien
•	Risque hypoglycémies nocturnes sévères
•	Interaction médicaments
•	Calories importantes (7 kcal/g)
Réduction obligatoire :
•	Maximum 2 verres/semaine
•	Jamais à jeun
•	Toujours avec repas riche en glucides
•	Surveiller glycémie avant coucher
•	Collation si glycémie <7 mmol/L au coucher
Alternatives sociales (si consommation culturelle) :
•	Tchoukoutou sans alcool si disponible
•	Jus de bissap rouge (aspect festif)
•	Sodabi → ARRÊT TOTAL (trop fort)
•	Bière → maximum 1 petite/semaine avec repas
CHOIX 2 : Une fois par semaine
⚠️ TOLÉRABLE MAIS OPTIMISER
BOISSONS SUCRÉES 1x/SEMAINE :
✅ Acceptable si :
•	Consommation modérée (1 verre)
•	Moment choisi stratégiquement
•	Compensée sur la journée
STRATÉGIE D'OPTIMISATION :
•	Choisir jour d'activité physique (meilleure tolérance glucides)
•	Prendre en fin de repas complet (ralentit absorption)
•	Portion contrôlée : 200-250ml maximum
•	Privilégier jus naturels vs sodas industriels
Meilleurs choix de collations :
1.	Jus de bissap maison peu sucré (antioxydants)
2.	Jus d'ananas frais dilué (bromélaïne, digestion)
3.	Jus de baobab (vitamines, fibres)

À éviter même 1x/semaine :
•	Sodas industriels (acidité, phosphore)
•	Boissons énergétiques (caféine excessive)
•	Cocktails très sucrés

ALCOOL 1x/SEMAINE :
✅ Acceptable avec précautions strictes
RÈGLES D'OR :
1.	Maximum 1-2 verres standards 
o	Bière locale : 250ml
o	Vin (si disponible) : 150ml
o	Sodabi : ÉVITER (trop concentré)
2.	Toujours pendant repas copieux 
o	Jamais à jeun
o	Repas contenant féculents (riz, igname, pâte)
o	Protéines et lipides (ralentissent absorption)
3.	Surveillance glycémique 
o	Vérifier glycémie avant coucher
o	Si <6 mmol/L : collation glucidique
o	Risque hypo jusqu'à 12h après
4.	Jour choisi stratégiquement 
o	Pas veille d'activité physique intense
o	Pas si malade ou fatigué
o	Pas avec certains médicaments (vérifier notices)
Repas type avec alcool occasionnel :
•	Entrée : salade copieuse
•	Plat : riz + sauce viande + légumes (200g riz)
•	1 bière locale pendant repas
•	Dessert : fruit
•	Vérifier glycémie 2h après et au coucher






CHOIX 3 : Occasionnellement
✅ BIEN - MAINTENIR CETTE MODÉRATION
BOISSONS SUCRÉES OCCASIONNELLES :
CONSEILS CIBLÉS :
•	Définir \"occasionnel\" : 1-2x/mois maximum
•	Réserver pour événements spéciaux
•	Maintenir cette discipline
•	Substituts quotidiens : eau, tisanes
Situations acceptables :
•	Fêtes familiales importantes
•	Cérémonies culturelles
•	Sorties exceptionnelles
Même occasionnellement, privilégier :
•	Jus naturels maison peu sucrés
•	Eau citronnée avec miel léger
•	Bissap maison contrôlé en sucre

ALCOOL OCCASIONNEL :
⭐ IDÉAL POUR DIABÈTE TYPE 2
CONSEILS CIBLÉS :
•	Maintenir cette fréquence basse
•	Règles de sécurité idem
•	Occasions culturelles (funérailles, mariages)
Même occasionnel, respecter :
•	Pendant repas uniquement
•	Portions modérées
•	Surveillance glycémique
•	Hydratation abondante
Stratégies sociales (pression culturelle) :
•	\"Je ne peux pas pour raisons médicales\"
•	Tenir verre de jus (évite qu'on resserve)
•	Alterner alcool/eau si impossible refuser
•	S'entourer de personnes qui comprennent

CHOIX 4 : Jamais
⭐⭐⭐ PARFAIT - CONTINUER ABSOLUMENT
FÉLICITATIONS :
•	Choix";

            case 'sommeil':
                return "optimal pour diabète type 2
•	Pas de calories vides
•	Contrôle glycémique facilité
•	Santé cardiovasculaire préservée
CONSEILS POUR MAINTENIR :
Hydratation quotidienne :
•	Eau : 1,5-2L/jour minimum 
o	Température ambiante ou fraîche
o	Répartie toute la journée
o	Augmenter si activité physique
Boissons béninoises saines :
1.	Bissap non sucré (antioxydants, vitamine C) 
o	Chaud ou froid
o	Peut ajouter citron, gingembre
2.	Infusions locales 
o	Kinkeliba (détox, digestion)
o	Citronnelle (digestive, apaisante)
o	Gingembre (anti-inflammatoire)
3.	Eaux parfumées maison 
o	Eau + citron + menthe
o	Eau + concombre + citron
o	Eau + orange + gingembre
4.	Lait végétal maison 
o	Lait de soja local
o	Lait de tiger";

            case 'apnee':
                return "nuts (souchet)
Résister pression sociale :
•	Expliquer clairement raisons médicales
•	Proposer alternatives pour trinquer
•	Rester ferme avec bienveillance
•	Votre santé est prioritaire
Avantages à communiquer :
•	Meilleur sommeil
•	Économies financières
•	Exemple positif pour famille
•	Contrôle optimal santé

😴 ADAPTATIONS SELON COMPORTEMENTS ET BIEN-ÊTRE
❓ QUESTION : Heures de sommeil par nuit
CHOIX 1 : Moins de 6h
🚨 CRITIQUE - IMPACT MAJEUR SUR SANTÉ
CONSÉQUENCES DOCUMENTÉES :
•	↑ Résistance à l'insuline (↑ glycémie)
•	↑ Hormone ghréline (faim) / ↓ leptine (satiété)
•	↑ Cortisol (stress, stockage graisse abdominale)
•	↓ Métabolisme de base
•	↑ Envies sucre et aliments gras
•	Mauvaises décisions alimentaires
PLAN D'ACTION SOMMEIL :
OBJECTIF : Atteindre 7-8h progressivement
Étape 1 : Identifier causes (semaine 1-2)
•	Stress, anxiété ?
•	Obligations familiales/travail ?
•	Habitudes (écrans, repas tardifs) ?
•	Environnement (bruit, chaleur) ?
•	Apnée du sommeil non diagnostiquée ?
Étape 2 : Modifications progressives (semaine 3-4)
•	Avancer heure coucher de 15 min/semaine
•	Rituel pré-sommeil relaxant
•	Pas d'écrans 1h avant coucher
•	Chambre fraîche, sombre, silencieuse
Étape 3 : Consolidation (semaine 5+)
•	Maintenir horaires réguliers (même weekend)
•	Noter qualité sommeil/humeur/glycémies
•	Ajuster selon observations

ADAPTATIONS ALIMENTAIRES SPÉCIFIQUES :
Dîner optimisé pour sommeil :
•	Horaire : 3h avant coucher minimum 
o	Si coucher 22h → dîner 19h maximum
Composition favorisant sommeil :
•	Glucides complexes modérés (tryptophane → sérotonine → mélatonine) 
o	Igname, patate douce, riz complet
•	Protéines légères (pas viande rouge lourde) 
o	Poisson grillé
o	Œufs
o	Haricots
•	Éviter gras excessif (digestion lente) 
o	Sauce légère
o	Pas de friture le soir
Repas type \"anti-insomnie\" :
19h : 
- Soupe de légumes verts tiède (effet apaisant)
- Poisson grillé (100g) - tryptophane
- Patate douce bouillie (150g) - glucides favorisant sommeil
- Salade de laitue (contient lactucarium, léger sédatif naturel)
- Tisane de citronnelle tiède

21h30 (si nécessaire, 30min avant coucher) :
- Lait caillé tiède (150ml) + cannelle
  OU
- Banane (si glycémie stable) - magnésium, potassium
Aliments favorisant sommeil :
•	Banane : magnésium, tryptophane, potassium
•	Patate douce : glucides complexes, vitamine B6
•	Graines de courge : magnésium, zinc (si disponibles)
•	Lait caillé : calcium, tryptophane
•	Poisson gras : oméga-3, vitamine D
À ÉVITER absolument le soir :
•	❌ Café après 14h
•	❌ Thé noir fort
•	❌ Sodas (caféine)
•	❌ Gros repas tardif
•	❌ Alcool (perturbe sommeil profond)
•	❌ Excès de liquides (réveils nocturnes)
•	❌ Piments forts (peuvent agiter)
Collation \"SOS insomnie\" (si réveil nocturne affamé) :
•	Petit verre lait tiède
•	3-4 arachides
•	Retour au lit immédiatement

GESTION GLYCÉMIE AVEC MANQUE SOMMEIL :
Stratégies compensatoires :
1.	Petit-déjeuner protéiné renforcé 
o	Double portion protéines (2 œufs au lieu de 1)
o	Réduit envies sucrées liées fatigue
2.	Collations obligatoires 
o	10h et 16h systématiques
o	Prévient hypoglycémies liées stress cortisol
3.	Activité physique légère 
o	Marche 20 min améliore sensibilité insuline
o	Compense partiellement effet manque sommeil
4.	Surveillance glycémique plus stricte 
o	Tester plus souvent (au réveil, 2h post-repas)
o	Ajuster portions selon résultats
Alerte médecin si :
•	Glycémies incontrôlables malgré efforts
•	Fatigue extrême persistante
•	Signes apnée sommeil (ronflements, pauses respiratoires, céphalées matinales)

CHOIX 2 : 6h-7h
⚠️ LIMITE BASSE - OPTIMISER VERS 7-8h
SITUATION :
•	Fonctionnel mais pas optimal
•	Risques santé moindres mais présents
•	Marge d'amélioration
CONSEILS CIBLÉS :
•	Petit effort supplémentaire (gain 30-60 min)
•	Prioriser qualité sommeil existant
•	Viser 7-8h comme objectif
STRATÉGIE D'OPTIMISATION :
Maximiser qualité des 6-7h :
1.	Régularité stricte 
o	Coucher/lever même heures chaque jour
o	Crée routine circadienne solide
2.	Environnement optimal 
o	Température fraîche (24-26°C si possible)
o	Obscurité totale (ou masque yeux)
o	Silence (ou bouchons d'oreilles)
3.	Rituel pré-sommeil 
o	30 min transition calme
o	Lecture, méditation, respiration
o	Pas d'écrans, pas de discussions stressantes
Progresser vers 7-8h :
•	Identifier 30-60 min gagnables dans journée
•	Décaler progressivement coucher (15min/2 semaines)
•	OU réveil 15min plus tard si possible

ADAPTATIONS ALIMENTAIRES :
Dîner léger optimisé :
18h30-19h :
- Soupe gboma dessi ou épinards
- Poisson grillé (80-100g)
- Igname bouillie (150g) ou riz complet (120g cuit)
- Salade verte
- Infusion digestive (kinkeliba)
Éviter :
•	Repas trop copieux (digestion perturbe sommeil)
•	Sauce trop épicée (reflux possibles)
•	Excès de liquides après 19h (réveils nocturnes)
Collation \"pont\" si réveil tôt :
•	Si réveil 5h et sensation hypoglycémie
•	Petit verre lait + 5 arachides
•	Recoucher 30 min
Gestion énergie journée :
•	Petit-déjeuner copieux (combat fatigue résiduelle)
•	Collation 10h systématique (maintient énergie)
•	Éviter caféine après 15h

CHOIX 3 : 8h-9h
⭐ EXCELLENT - MAINTENIR
SITUATION IDÉALE :
•	Durée optimale pour santé
•	Récupération complète
•	Équilibre hormonal préservé
•	Régulation glycémique facilitée
CONSEILS CIBLÉS :
•	Maintenir cette routine précieuse
•	Protéger ce temps de sommeil
•	Continuer habitudes qui fonctionnent
MAINTIEN DE LA QUALITÉ :
Préserver les 8-9h :
•	Considérer sommeil comme priorité santé
•	Refuser engagements qui empiètent
•	Communiquer importance à entourage
Signes de qualité à surveiller : ✅ Réveil naturel sans alarme (ou juste avant) ✅ Sensation reposé au réveil ✅ Pas de somnolence diurne ✅ Humeur stable ✅ Glycémies bien contrôlées
⚠️ Si symptômes malgré 8-9h :
•	Fatigue persistante
•	Ronflements
•	Réveils fréquents
•	Céphalées matinales → Consulter pour apnée du sommeil

ALIMENTATION SANS CONTRAINTE PARTICULIÈRE :
Dîner équilibré standard :
19h :
- Repas complet selon guide niveau activité
- Pas de restriction horaire stricte
- Quantités normales
- Tisane relaxante si souhaitée
Flexibilité possible :
•	Petit dessert occasionnel toléré (fruit, yaourt)
•	Pas de stress timing si dîner occasionnellement 19h30-20h
•	Hydratation normale soirée
Optimisation continue :
•	Noter si certains aliments perturbent sommeil personnellement
•	Ajuster selon ressentis individuels
•	Tester fenêtre dîner optimale pour soi (2-3h avant coucher généralement idéal)

CHOIX 4 : Plus de 9h
⚠️ VÉRIFIER CAUSES - POTENTIELLEMENT EXCESSIF
DEUX SITUATIONS POSSIBLES :
SITUATION 1 : Besoin physiologique (moins fréquent)
•	Certaines personnes \"long sleepers\"
•	Génétique
•	Si énergie excellente et santé bonne → OK
SITUATION 2 : Signal d'alerte (plus fréquent)
•	Apnée du sommeil non traitée (sommeil non réparateur)
•	Dépression ou troubles humeur
•	Hypothyroïdie non diagnostiquée
•	Anémie
•	Effet secondaire médicaments
•	Dette sommeil chronique en récupération
CONSEILS CIBLÉS :
Investigations nécessaires :
1.	Consulter médecin si : 
o	Fatigué malgré 9h+ sommeil
o	Ronflements + pauses respiratoires
o	Somnolence diurne excessive
o	Céphalées matinales
o	Prise de poids inexpliquée
2.	Bilans à demander : 
o	Glycémie à jeun, HbA1c (déjà suivi diabète)
o	TSH (thyroïde)
o	Hémoglobine (anémie)
o	Étude sommeil si suspicion apnée
3.	Évaluer mode de vie : 
o	Activité physique suffisante ? (stimule vigilance)
o	Exposition lumière jour ? (régule circadien)
o	Stress, dépression ?

ADAPTATIONS ALIMENTAIRES :
Si apnée du sommeil suspectée/confirmée :
PRIORITÉ : Perte de poids (améliore apnée) :
•	Déficit calorique plus strict (consulter médecin/nutritionniste)
•	Éviter alcool absolument (relâche voies aériennes)
�";

            case 'regime_efficacite':
                return "��	Dîner ultra-léger (ventre plein aggrave apnée)
Dîner anti-apnée :
18h (très tôt) :
- Soupe de légumes claire
- Poisson grillé (80g)
- Légumes vapeur
- PAS de féculents le soir (réduire masse abdominale temporairement)
- Aucun liquide après 19h (sauf urgence)
Position sommeil :
•	Dormir sur le côté (pas sur le dos)
•	Surélever légèrement tête de lit

Si fatigue liée carence nutritionnelle :
Fer (anémie fréquente) :
•	Augmenter : viande rouge maigre (2x/semaine), poisson, haricots
•	Vitamine C avec repas (orange, tomate) → améliore absorption fer
•	Éviter thé/café avec repas (bloque absorption)


Petit-déjeuner anti-anémie :
- Bouillie de mil enrichie (fer)
- Œufs (fer, B12)
- Orange fraîche (vitamine C)
- Foie de volaille occasionnel (1x/semaine si toléré - très riche en fer)
Vitamine B12 (si végétarien strict) :
•	Aliments d'origine animale réguliers
•	Œufs, poisson, viande, produits laitiers
Magnésium (si crampes, fatigue musculaire) :
•	Légumes verts foncés
•	Noix, graines
•	Haricots, lentilles
•	Bananes

❓ QUESTION : Avez-vous l'apnée du sommeil ?
✅ SI OUI - Prise en charge essentielle
LIEN DIRECT AVEC OBÉSITÉ + DIABÈTE :
•	Apnée → fragmentation sommeil → ↑ cortisol → ↑ résistance insuline
•	Hypoxies répétées → inflammation → ↑ glycémie
•	Fatigue → ↓ activité physique → ↑ poids
•	Cercle vicieux à briser
PRIORITÉS ABSOLUES :
1. TRAITEMENT MÉDICAL
•	PPC (Pression Positive Continue) si prescrite → UTILISER CHAQUE NUIT
•	Observance cruciale pour efficacité
•	Orthèse d'avancée mandibulaire si alternative
•	Suivi ORL/pneumologue régulier
2. PERTE DE POIDS (Impact majeur)
•	Chaque kilo perdu améliore apnée
•	Objectif : -10% poids corporel minimum
•	Réduction tour de cou critique
3. HYGIÈNE DE VIE
•	Position latérale sommeil (jamais sur dos)
•	Surélever tête de lit (15-20 cm)
•	Arrêt alcool complet
•	Arrêt tabac si fumeur

ADAPTATIONS ALIMENTAIRES SPÉCIFIQUES :
STRATÉGIE NUTRITIONNELLE ANTI-APNÉE :
Dîner ultra-léger obligatoire :
17h30-18h (très tôt) :
- Soupe de légumes verts claire et chaude
- Poisson grillé (60-80g) OU œufs (2)
- Salade verte abondante
- PAS de féculents le soir (temporaire jusqu'à amélioration)
- Tisane de kinkeliba

LOGIQUE : 
- Estomac vide coucher (4-5h après dîner)
- Moins pression diaphragme
- Moins reflux (aggrave apnée)
- Facilite respiration nocturne
Répartition journée modifiée :
•	Petit-déjeuner : 30% calories (gros repas)
•	Déjeuner : 40% calories (repas principal)
•	Dîner : 20% calories (très léger)
•	Collations : 10% calories

Exemple journée type avec apnée :
7h - PETIT-DÉJEUNER COPIEUX :
- Bouillie de mil enrichie (300ml)
- Omelette 3 œufs + légumes
- Pain complet (2 tranches) + avocat (¼)
- Orange
- Tisane

10h - COLLATION :
- Banane + noix de cajou (20g)

13h - DÉJEUNER PRINCIPAL :
- Riz complet (200g cuit) + haricots rouges (100g)
- Poisson grillé (120g)
- Sauce tomate-légumes
- Salade généreuse
- Papaye

16h - COLLATION :
- Yaourt nature + morceaux d'ananas

18h - DÎNER LÉGER (AU MOINS 5H AVANT COUCHER) :
- Soupe gboma dessi
- Poisson vapeur (60g)
- Salade de concombre
- Infusion

22h-23h - COUCHER

ALIMENTS À ÉVITER ABSOLUMENT :
Le soir (aggravation apnée) :
•	❌ Alcool (relaxe muscles gorge)
•	❌ Sédatifs sans avis médical
•	❌ Repas gras, lourds
•	❌ Aliments inflammatoires (sucres raffinés, friture)
•	❌ Gros volumes liquides (reflux)
•	❌ Épices fortes (reflux)
En général (favorisent inflammation) :
•	❌ Aliments ultra-transformés
•	❌ Excès sucres rapides
•	❌ Graisses trans
•	❌ Excès sel (rétention eau, gonflement tissus)
ALIMENTS ANTI-INFLAMMATOIRES À PRIVILÉGIER :
Quo";

            case 'regime_recent':
                return "tidiennement :
•	Poissons gras (oméga-3) : 3x/semaine minimum 
o	Maquereau, sardines, capitaine
•	Légumes verts foncés (antioxydants) 
o	Épinards locaux, gboma dessi
•	Fruits colorés (vitamine C, antioxydants) 
o	Papaye, ananas, mangue, orange
•	Noix et graines (oméga-3, magnésium) 
o	Arachides nature, noix de cajou, graines de courge
•	Épices anti-inflammatoires 
o	Gingembre frais (quotidien)
o	Curcuma (si disponible)
o	Ail
Infusions bénéfiques :
•	Gingembre (anti-inflammatoire)
•	Kinkeliba (antioxydant)
•	Citronnelle (apaisante)


COMPLÉMENTS POSSIBLES (AVEC AVIS MÉDICAL) :
•	Vitamine D (souvent déficiente avec apnée)
•	Magnésium (relaxation musculaire, sommeil)
•	Oméga-3 si apport poisson insuffisant
SUIVI SPÉCIFIQUE :
•	Peser chaque semaine (perte poids = amélioration apnée)
•	Noter qualité sommeil perçue
•	Glycémies : souvent s'améliorent avec traitement apnée
•	Consulter médecin tous les 3 mois minimum

❌ SI NON - Vigilance continue
PRÉVENTION :
•	Apnée peut apparaître avec obésité
•	Surveiller symptômes
Signes d'alerte à rapporter au médecin :
•	Ronflements bruyants nouveaux/aggravés
•	Pauses respiratoires observées par entourage
•	Réveils en sursaut, sensation étouffement
•	Céphalées matinales
•	Somnolence diurne excessive
•	Fatigue non expliquée malgré heures sommeil
•	Difficulté concentration
•	Irritabilité
•	Nycturie (réveils fréquents uriner)
Facteurs de risque à surveiller :
•	Tour de cou > 43 cm homme, > 41 cm femme
•	IMC > 30
•	Âge > 50 ans
•	Hypertension artérielle
•	Diabète type 2 (déjà présent)
Si symptômes apparaissent : → Consultation rapide médecin → Polysomnographie (étude sommeil) possible → Prise en charge précoce = meilleure efficacité


❓ QUESTION : Avez-vous récemment fait un régime de perte de poids ?
✅ SI OUI
ANALYSE DE L'EXPÉRIENCE PRÉCÉDENTE :
Cette information est cruciale pour adapter l'approche actuelle.
Sous-question : Combien de poids avez-vous perdu ?
CHOIX 1 : Moins de 5 kg
ANALYSE :
•	Perte modeste mais positive
•	Peut-être méthode inadaptée
•	Ou durée trop courte
•	Ou objectif trop ambitieux trop vite
CONSEILS CIBLÉS :
Leçons du passé :
1.	Qu'est-ce qui a fonctionné ? 
o	Identifier aspects positifs à garder
o	Repas/habitudes qui plaisaient
2.	Qu'est-ce qui a bloqué ? 
o	Trop restrictif → frustration
o	Pas assez soutien social
o	Manque de temps
o	Coût trop élevé
3.	Pourquoi arrêt ? 
o	Lassitude
o	Résultats trop lents
o	Événement perturbateur (maladie, voyage, stress)
Nouvelle approche optimisée :
Objectifs réalistes : Suivre votre objectif actuel pour améliorer votre rendement en prenant en compte nos orientations sur les conseils en dessus et le guide alimentaire que nous avons proposé et qui est basé sur vos données personnelles  





CHOIX 2 : 5-10 kg
⭐ SUCCÈS SIGNIFICATIF - Capitaliser dessus
ANALYSE :
•	Perte substantielle réussie
•	Méthode efficace identifiée
•	Risque reprise poids à gérer
CONSEILS CIBLÉS :
Identifier clés du succès passé :
1.	Qu'avez-vous fait exactement ? 
o	Type d'alimentation
o	Activité physique
o	Soutien reçu
o	Durée
2.	Qu'avez-vous apprécié ? 
o	Repas préférés
o	Routine qui convenait
o	Ressentis positifs
3.	Pourquoi c'est reparti à la hausse ? 
o	Arrêt trop brutal suivi
o	Retour
o	Anciens habitudes
o	Événement déclencheur (stress, fête, maladie)
o	Manque de plan de maintien
Stratégie anti-yo-yo :
Phase 1 : Reperte contrôlée (si poids repris)
•	Reprendre ce qui avait fonctionné
•	MAIS avec plan de maintien dès le départ
•	Objectif : perte durable cette fois
Phase 2 : Transition vers maintien (dès -5 kg)
•	Ne pas attendre objectif final
•	Intégrer progressivement habitudes durables
•	Augmenter légèrement calories (déficit moindre)
Phase 3 : Maintien actif (à l'objectif)
•	Suivi régulier (pesée 1x/semaine)
•	Règle des 2 kg : si reprise > 2 kg → action immédiate
•	Ajustements proactifs
Gestion événements sociaux :
•	A";

            case 'sedentarite':
                return "nticiper (repas léger avant/après)
•	Profiter modérément
•	Pas de culpabilité
•	Retour routine lendemain
CHOIX 3 : Plus de 10 kg
⭐⭐⭐ EXPLOIT MAJEUR - Comprendre et pérenniser
ANALYSE :
•	Transformation significative réussie
•	Détermination et discipline prouvées
•	Expérience précieuse à exploiter
•	Prévention reprise = priorité absolue
CONSEILS CIBLÉS :
Capitaliser sur cette réussite :
1.	Décortiquer le succès : 
o	Méthode exacte utilisée
o	Durée du processus
o	Difficultés surmontées
o	Stratégies efficaces
o	Soutien clé
2.	Comprendre la reprise (si applicable) : 
o	Combien repris ?
o	Sur quelle durée ?
o	Facteurs déclencheurs
o	Signaux d'alarme ignorés
3.	Leçons cruciales : 
o	Ce qui est non-négociable pour vous
o	Ce qui est insoutenable long terme
o	Équilibre vie sociale vs santé
Plan de reperte et maintien à vie :
MINDSET différent :
•	Pas \"un régime\" mais \"nouveau mode de vie\"
•	Changement permanent, pas temporaire
•	Accepter efforts continus (mais moins intenses)
Système d'alerte précoce :
•	Jaune (+ 2 kg) : attention, ajuster portions
•	Orange (+ 4 kg) : action corrective immédiate
•	Rouge (+ 6 kg+) : consulter professionnel
Soutien psychologique :
•	Reconnaître capacité de réussir (déjà prouvée)
•	Accepter que maintien demande vigilance
•	Pas de perfection, mais cohérence
•	Célébrer victoires non-pondérales (énergie, santé, confiance)
❌ SI NON - Première démarche structurée
AVANTAGES :
•	Pas d'échecs passés à gérer psychologiquement
•	Terrain vierge pour bonnes habitudes
•	Motivation potentiellement forte
•	Pas de métabolisme ralenti par yoyo
PRÉCAUTIONS :
•	Éviter erreurs classiques débutants
•	Construire bases solides dès départ
•	Approche durable dès le début
CONSEILS CIBLÉS :
Démarrage intelligent : suivez votre objectif en cours enfin d’évaluer la différence avec vos expériences passées





🏃 ADAPTATIONS SELON ACTIVITÉ PHYSIQUE
❓ QUESTION : Jours par semaine d'activité physique
CHOIX 1 : Aucun jour
🚨 SÉDENTARITÉ - ACTION URGENTE REQUISE
CONSÉQUENCES SANTÉ :
•	↑ Résistance insuline (aggrave diabète)
•	↓ Dépense calorique (freine perte poids)
•	↓ Masse musculaire (ralentit métabolisme)
•	↑ Risques cardiovasculaires
•	↓ Humeur, énergie, sommeil
OBJECTIF : Démarrage très progressif
Programme \"Zéro vers Actif\" (12 semaines) :
SEMAINES 1-2 : Initiation douce
- Marche 10 min après dîner (digestion + activité)
- Tous les jours ou 5 jours/semaine minimum
- Intensité : confortable, pouvoir parler facilement

SEMAINES 3-4 : Augmentation durée
- Marche 15 min, toujours quotidienne
- Commencer noter sensations (énergie, humeur)

SEMAINES 5-6 : Introduction variété
- Marche 20 min OU
- Tâches ménagères actives 20 min (balayage énergique, lessive à la main) OU
- Jardinage 20 min
- 5-6 jours/semaine

SEMAINES 7-8 : Intensification légère
- Marche 25-30 min
- Accélérer rythme sur 2-3 min au milieu
- 5-6 jours/semaine

SEMAINES 9-10 : Structuration
- Marche 30 min, 5 jours/semaine OU
- 3 x marche 30 min + 2 x activité domestique intense 30 min

SEMAINES 11-12 : Consolidation
- Activité 30-40 min, 5-6 jours/semaine
- Mélange marche + autres activités
- Introduire 1-2 jours exercices renforcement léger (squats au poids du corps, pompes murales)

OBJECTIF ATTEINT :
150 min/semaine activité modérée 
Surmonter barrières courantes :
\"Pas le temps\" → Fractionner : 3 x 10 min = même effet que 1 x 30 min → Intégrer : marche pour courses, monter escaliers, descendre transport 1 arrêt avant
\"Trop fatigué\" → Paradoxe : activité DONNE énergie → Commencer par 5 min seulement → Souvent continuer une fois démarré
\"Trop chaud/pluie\" → Marcher tôt matin (6h-7h) ou soir (18h-19h) → Activités intérieures : ménage, montée/descente escaliers, danse → Marche sur place devant maison (sous abri)
\"Douleurs articulaires\" → Activités portées : natation si piscine disponible, vélo, aquagym → Exercices assis : mouvements bras, rotations tronc → Consulter médecin pour adaptations
Conseils à appliquer : 
o	Aller à votre rythme concernant l’objectif en dessus
o	Respecter les indications pour obtenir un meilleur résultat 
o	Vous êtes pas obligé de terminer cette activité 



CHOIX 2 : 1-3 jours par semaine
✅ DÉBUT ENCOURAGEANT - AUGMENTER FRÉQUENCE
SITUATION :
•	Première barrière franchie (démarrage)
•	Bénéfices santé limités mais présents
•	Besoin régularité pour optimiser
OBJECTIF : Passer à 4-6 jours/semaine
STRATÉGIE D'AUGMENTATION :
MOIS 1 : Ajouter 1 jour
- De 2 jours → 3 jours/semaine
- Même type d'activité
- Consolider habitude

MOIS 2 : Ajouter encore 1 jour
- De 3 jours → 4 jours/semaine
- Introduire variété si souhaité

MOIS 3 : Atteindre 5-6 jours
- Proche recommandations optimales
- Activité quasi-quotidienne
- Devient routine naturelle
Conseils pour tenir régularité :
1. Planification stricte
•	Choisir jours ET heures fixes
•	Bloquer dans agenda comme rendez-vous médical
•	Préparer affaires à l'avance
2. Ritualisation
•	Même horaire crée automatisme
•	Associer à déclencheur (exemple : \"après le travail, avant de rentrer\")
•	Musique/podcast spécial activité physique
3. Partenaire d'exercice
•	Collègue, voisin, ami, famille
•	Engagement mutuel
•	Rend agréable et social
4. Suivi visible
•	Calendrier avec croix chaque jour fait
•	Satisfaction visuelle progression
•	Application smartphone si accès

Journée type avec 3 séances/semaine :
EXEMPLE : Lundi, Mercredi, Samedi activité

LUNDI (Jour activité) :
7h : Petit-déjeuner standard
10h : Collation
13h : Déjeuner avec féculents adéquats
16h : Collation pré-exercice (fruit + noix)
17h30 : ACTIVITÉ 45 min
18h30 : Collation post-exercice (yaourt) si dîner loin
20h : Dîner

MARDI (Jour repos) :
Même structure alimentaire
Pas besoin réduire calories (métabolisme reste élevé)
Attention pas \"compenser\" inactivité par grignotage

MERCREDI (Jour activité) :
Idem Lundi

JEUDI-VENDREDI (Jours repos) :
Idem Mardi

SAMEDI (Jour activité) :
Peut être session plus longue (60-90 min si progression)
Ajuster petit-déjeuner si exercice matinal

Collations pré/post-exercice :
PRÉ-EXERCICE (30-60 min avant) :
•	Objectif : énergie disponible, éviter hypoglycémie
•	Glucides + peu protéines
•	Exemples : 
o	Banane + 5 arachides
o	2 dattes + quelques noix de cajou
o	Akassa (petit portion) + lait caillé
POST-EXERCICE (dans 30-60 min après) :
•	Objectif : récupération musculaire, refaire stocks glycogène
•	Protéines + glucides
•	Exemples : 
o	Yaourt nature + morceaux de mangue
o	Lait caillé + banane
o	Œuf dur + orange
o	Petit sandwich pain complet + sardines (si session longue)
Si exercice proche d'un repas principal :
•	Pas besoin collation spécifique
•	Repas normal suffit




CHOIX 3 : 4-6 jours par semaine
⭐ EXCELLENT - OPTIMISER ET VARIER
SITUATION IDÉALE :
•	Régularité établie
•	Bénéfices santé maximaux
•	Habitude ancrée
OBJECTIFS D'OPTIMISATION :
1. VARIER TYPES D'ACTIVITÉ
Bénéfices diversification :
•	Tous muscles sollicités
•	Prévention blessures sur-utilisation
•	Moins monotonie
•	Développement complet
Mix idéal  :
SEMAINE TYPE :

LUNDI : Marche rapide 45 min
→ Cardio, endurance

MARDI : Renforcement musculaire maison 30 min
→ Squats, pompes murales, levées jambes, gainage
→ Masse musculaire (↑ métabolisme)

MERCREDI : Danse traditionnelle ou moderne 45 min
→ Cardio + plaisir + social

JEUDI : Marche tranquille 30 min (récupération active)
→ Récupération en douceur

VENDREDI : Renforcement + étirements 40 min
→ Force + souplesse

SAMEDI : Activité plus longue (60-90 min)
→ Marche, vélo, sport collectif, travaux jardinage
→ Moment privilégié, moins pression horaire

DIMANCHE : Repos complet OU activité très légère (étirements 15 min)
→ Récupération essentielle
2. INTENSIFIER PROGRESSIVEMENT
Signes qu'intensité peut augmenter :
•	Activité actuelle \"trop facile\"
•	Récupération rapide (pas courbatures)
•	Envie de challenge
•	Plateau perte poids malgré alimentation correcte
Méthodes d'intensification :
Pour marche :
•	Augmenter vitesse
•	Intégrer montées (collines, escaliers)
•	Intervalle : 2 min rapide / 2 min normale, répéter
•	Porter léger sac à dos (1-2 kg max, progressif)
Pour renforcement :
•	Augmenter répétitions
•	Ralentir mouvement (tempo)
•	Ajouter petites charges (bouteilles d'eau remplies)
•	Positions plus difficiles
3. FIXER OBJECTIFS CONCRETS
Objectifs performance :
•	Marcher 5 km sans arrêt
•	Tenir planche (gainage) 60 secondes
•	20 squats corrects d'affilée
•	Monter 3 étages sans essoufflement
Objectifs santé :
•	HbA1c cible (<7%)
•	Tension artérielle cible
•	X kilos perdus
•	Tour de taille réduit
Nutrition sportive béninoise :
COLLATIONS PRÉ-ENTRAÎNEMENT (45-60 min avant) :
Pour cardio modéré (marche, danse) :
•	Fruit frais (banane, orange, mangue)
•	
o	Petite poignée arachides (15g)
Pour renforcement musculaire :
•	Yaourt nature (150g) + banane
•	Pain complet (1 tranche) + beurre d'arachide (1 c. à café)
Pour session longue (>60 min) :
•	Bouillie légère (200ml)
•	
o	Banane
•	90 min avant minimum
COLLATIONS POST-ENTRAÎNEMENT (dans 30-60 min) :
Après cardio modéré :
•	Lait caillé (200ml) + fruit
•	Jus d'orange frais + poignée noix de cajou
Après renforcement musculaire (priorité protéines) :
•	2 œufs durs + orange
•	Yaourt grec (si disponible) + fruits
•	Bouillie de soja (250ml) + banane
Après session longue/intense :
•	Sandwich complet : pain complet + œufs/thon + avocat + tomate
•	Riz (100g cuit) + haricots (50g) + légumes
•	Smoothie : lait + banane + arachide (1 c. à soupe) + avoine
HYDRATATION SPORTIVE :
Besoins hydriques augmentés :
•	Base : 1,5-2L/jour
•	
o	500ml par 30 min activité
•	
o	1L si chaleur intense ou sudation abondante
Stratégie hydratation :
•	AVANT : bien hydraté (urines claires)
•	PENDANT : 150-250ml toutes les 15-20 min si >30 min activité
•	APRÈS : reconstituer pertes (poids avant-après si possible)
Boissons maison \"sportives\" :
Boisson électrolytes artisanale :
•	1L eau
•	Jus de 2 citrons
•	1 pincée de sel
•	2 c. à soupe de miel (optionnel si activité > 60 min)
•	Pour sessions longues sudation importante
Eau de coco naturelle :
•	Naturellement riche en électrolytes
•	250-500ml après activité intense
•	Attention sucres naturels : compter dans apport glucides
CHOIX 4 : 7 jours par semaine
⚠️ VÉRIFIER RÉCUPÉRATION ADÉQUATE
SITUATION :
•	Engagement maximal
•	Risque sur-entraînement si mal géré
•	Besoin repos physiologique
ANALYSE NÉCESSAIRE :
Activité 7j/7 acceptable si :
•	Variée en intensité (pas 7j haute intensité)
•	Inclut jours \"actifs légers\" (marche douce, étirements)
•	Aucun signe sur-entraînement
•	Récupération bonne
Signes de sur-entraînement (ARRÊTER et consulter) :
•	Fatigue persistante non améliorée par repos
•	Baisse performances
•	Douleurs articulaires/musculaires chroniques
•	Infections fréquentes (immunité baissée)
•	Troubles sommeil
•	Irritabilité, dépression
•	Stagnation/reprise poids malgré efforts
•	Glycémies instables

RECOMMANDATION : Intégrer repos
Modèle optimal 6+1 :
6 JOURS ACTIFS variés en intensité :
- 3 jours modérés (marche, activités quotidiennes)
- 2 jours intenses (sport, renforcement)
- 1 jour léger (étirements, yoga, marche courte)

1 JOUR REPOS COMPLET :
- Aucune activité structurée
- Récupération passive
- Essentiel pour adaptation musculaire
- Prévention blessures
Si maintien 7j/7, impératif :
•	4 jours modérés
•	2 jours intenses
•	1 jour très léger (récupération active seulement)
•	Écouter corps
•	Qualité > Quantité

ADAPTATIONS ALIMENTAIRES :
Guide \"Très actif\" ou \"Extrêmement actif\"
•	Selon intensité moyenne
Besoins nutritionnels élevés :
Protéines :
•	Cruciales pour récupération musculaire
•	1,2-1,6 g/kg poids corporel
•	Réparties sur tous les repas
•	Exemple 80 kg : 96-128g protéines/jour
Glucides :
•	Carburant principal
•	Ne pas sous-estimer malgré diabète
•	Refaire stocks glycogène musculaire
•	Complexes prioritaires mais quantité suffisante
Lipides :
•	Soutien hormonal
•	Anti-inflammatoire (oméga-3)
•	Énergie longue durée


Journée type alimentation athlétique (7j/7) :
6h30 : RÉVEIL
- Verre d'eau citronnée

7h : PETIT-DÉJEUNER COPIEUX
- Bouillie de soja-mil enrichie (400ml)
- Omelette 3 œufs + légumes
- Pain complet (2 tranches) + avocat (1/2)
- Banane
- Tisane

9h-10h : ACTIVITÉ INTENSE (si matinale)

10h30 : COLLATION POST-EXERCICE
- Smoothie : lait + banane + arachide + avoine
OU
- Yaourt (200g) + fruits + noix (30g)

13h : DÉJEUNER RÉCUPÉRATION
- Riz complet (250g cuit) + haricots rouges (100g)
- Poisson grillé (120g)
- Sauce tomate-légumes
- Salade généreuse
- Ananas

16h : COLLATION
- Pain complet + beurre d'arachide + banane
OU
- Bouillie légère (200ml) + noix de cajou

17h30-18h30 : ACTIVITÉ MODÉRÉE (si soirée)

19h : DÎNER RÉPARATEUR
- Igname pilée (200g) ou pâte de maïs
- Sauce gombo-viande maigre
- Légumes sautés abondants
- Papaye
- Infusion

21h30 : COLLATION PRÉ-SOMMEIL (si besoin)
- Lait caillé (150ml)
OU
- Banane

TOTAL JOUR : ~2200-2500 kcal selon poids/intensité exacte

SUPPLÉMENTATION À CONSIDÉRER (AVEC AVIS MÉDICAL) :
Si activité quotidienne intense :
Vitamine D
•	Souvent déficiente
•	Importante pour os, muscles, immunité
•	Dosage sanguin d'abord
•	Supplémentation si carence confirmée
Magnésium
•	Pertes augmentées par sudation
•	Crampes musculaires, fatigue si déficit
•	Sources alimentaires d'abord : légumes verts, noix, haricots
•	Supplément si insuffisant
Oméga-3
•	Anti-inflammatoire
•	Récupération musculaire
•	Si apport poisson <3x/semaine
•	Capsules huile de poisson
Fer (surtout femmes)
•	Pertes menstruelles + sport = risque anémie
•	Bilan sanguin annuel
•	Supplémentation seulement si carence prouvée
Électrolytes
•	Si sudation abondante quotidienne
•	Sodium, potassium, magnésium
•	Boisson maison ou produit adapté
⚠️ PAS de supplémentation sans avis médical, surtout avec diabète et traitements

❓ QUESTION : Temps en position assise par jour
CHOIX 1 : Moins de 4h
⭐⭐⭐ EXCELLENT - Maintenir
SITUATION IDÉALE :
•	Mobilité naturelle préservée
•	Risques sédentarité minimaux
•	Mode de vie actif
Profils typiques :
•	Travail physique (agriculture, commerce ambulant, artisanat)
•	Vie domestique active
•	Mobilité piétonne importante
CONSEILS CIBLÉS :
Préserver cet atout :
•	Continuer privilégier mouvement
•	Valoriser cette activité \"invisible\"
•	Ne pas sous-estimer bénéfices
Quantification activité quotidienne :
Même sans \"sport structuré\", vous êtes actif :
•	Marche quotidienne (courses, déplacements)
•	Tâches ménagères énergiques
•	Travail physique
•	Station debout prolongée
= Équivalent 3000-5000 pas supplémentaires/jour
Estimation niveau d'activité réel :
•	Moins de 4h assis + aucun sport = \"Légèrement actif\"
•	Moins de 4h assis + sport 3x/semaine = \"Modérément actif\"
•	Moins de 4h assis + sport quotidien = \"Très actif\"
→ Adapter guide alimentaire en conséquence
Prévention problèmes posturaux :
Même debout beaucoup, attention :
•	Pieds : chaussures confortables, soins réguliers
•	Dos : postures correctes (soulever charges, porter)
•	Jambes : surélever le soir si gonflements
•	Étirements : 10 min quotidien (mollets, dos, hanches)
Exemple routine étirements 10 min :
- Mollets : appui mur, jambe tendue arrière, 30 sec x2 chaque jambe
- Dos : flexion avant douce, mains vers pieds, 30 sec
- Hanches : fente avant, genou arrière au sol, 30 sec x2 chaque jambe
- Épaules : rotations, 10 fois chaque sens
- Cou : inclinaisons latérales, 5 fois chaque côté



CHOIX 2 : 4h-6h
✅ RAISONNABLE - Compenser par activité structurée
SITUATION :
•	Travail semi-sédentaire (bureau partiel, conduite, commerce stationnaire)
•	Début risques métaboliques si inactif
•	Besoin mouvement compensatoire
CONSEILS CIBLÉS :
Objectif : 30+ min activité structurée quotidienne
Si déjà actif régulièrement → parfait, continuer Si pas encore actif → PRIORITÉ démarrage
Stratégies \"pause mouvement\" :
Au travail :
•	Debout toutes les heures (minimum)
•	Marche sur place 2 min
•	Étirements discrets
•	Escaliers vs ascenseur
•	Déjeuner : marche digestive 10 min
À domicile :
•	Pas rester assis après travail
•	Préparer repas debout (actif)
•	Tâches ménagères mobilisantes
•	Soir : marche avant/après dîner
Weekend :
•	Maximiser activités debout
•	Sorties, courses, visites à pied
•	Travaux domestiques
•	Sport ou loisirs actifs



ADAPTATIONS ALIMENTAIRES :
Attention piège :
•	Position assise → moins dépense énergétique
•	Mais souvent plus grignotage (ennui, stress, disponibilité)
•	Vigilance accrue nécessaire
Stratégies anti-grignotage au travail :
Environnement :
•	Pas d'aliments tentants sur bureau
•	Collations saines pré-préparées uniquement
•	Bouteille d'eau toujours visible
Horaires stricts :
•	Collation 10h : fruit + noix (prévu)
•	Collation 16h : légumes crus + yaourt (prévu)
•	PAS de grignotage impulsif
Gestion stress/ennui :
•	Si envie grignoter → d'abord boire verre d'eau
•	Puis se lever, marcher 2 min
•	Si vraiment faim → collation prévue
•	Sinon → identifier émotion, gérer autrement (respiration, pause)
CHOIX 3 : 6h-8h
⚠️ SÉDENTARITÉ SIGNIFICATIVE - Action requise
SITUATION :
•	Travail bureau complet
•	Ou études prolongées
•	Risques santé augmentés
•	Activité physique OBLIGATOIRE pour compenser
CONSÉQUENCES PHYSIOLOGIQUES :
•	↓ Dépense calorique (~300 kcal/jour vs actif)
•	↓ Circulation sanguine (risque thrombose)
•	↓ Métabolisme (adaptation à inactivité)
•	↑ Stockage graisse abdominale
•	↑ Résistance insuline
•	↑ Risques cardiovasculaires
PLAN D'ACTION IMPÉRATIF :
AU MINIMUM :
•	45-60 min activité modérée quotidienne
•	Pauses mouvement toutes les heures (obligatoires)
•	Maximiser mouvement hors travail
STRATÉGIES \"BUREAUTIQUE ACTIVE\" :
Pauses horaires obligatoires (5 min) :
9h : Debout, marche sur place, rotation épaules
10h : Étirements dos, cou, poignets
11h : Marche couloir ou extérieur
12h : DÉJEUNER (sortir, marcher)
14h : Debout, flexions jambes
15h : Étirements complets
16h : Marche + collation
17h : Rotation articulations
Aménagements possibles :
•	Bureau debout partiel (si possible)
•	Ballon de gym comme siège 30 min/jour (gainage)
•	Réunions en marchant (si applicable)
•	Appels téléphoniques debout
•	Imprimante loin du bureau (obliger déplacement)
Trajet travail :
•	Descendre transport 1-2 arrêts avant
•	Garer voiture plus loin
•	Vélo si distance raisonnable
•	Marche si <30 min




ACTIVITÉ PHYSIQUE STRUCTURÉE (NON NÉGOCIABLE) :
Options compatibles horaires bureau :
MATIN (6h-7h) avant travail :
•	Avantages : fait, pas d'excuse soirée
•	Marche/course 45 min
•	Renforcement maison 30 min
MIDI (pause déjeuner prolongée si possible) :
•	30 min activité + repas rapide
•	Idéal : marche rapide ou salle sport proche
SOIR (18h-19h) après travail :
•	Éviter rentrer s'asseoir directement
•	Détour marche ou sport
•	Puis douche, dîner
FORMAT MINIMUM :
•	5 jours : 45-60 min activité modérée
•	OU 3 jours : 30 min activité intense
•	
o	Mouvement quotidien (marches, tâches)
________________________________________
ADAPTATIONS ALIMENTAIRES STRICTES :
Défis spécifiques bureau :
•	Tentations (gâteaux collègues, distributeurs)
•	Stress → grignotage
•	Repas rapides (cantines, fast-food)
•	Position assise → moins faim \"réelle\"
Hydratation :
•	Bouteille 1,5L sur bureau
•	Objectif : finir dans journée
•	Aide couper fausses faims

Gestion situations sociales bureau :
Gâteaux/viennoiseries apportés :
•	Refuser poliment : \"Merci, j'ai déjà ma collation\"
•	Ou accepter symboliquement, partager avec collègues
•	Pas de culpabilité refuser
Pots de départ, anniversaires :
•	Participer socialement
•	Portion minimale gâteau si vraiment important
•	Compenser : repas suivant plus léger, activité supplémentaire
Déjeuners d'équipe restaurant :
•	Choisir : grillades + salade + féculent modéré
•	Éviter : fritures, sauces crémeuses, sodas
•	Partager dessert si pression sociale
CHOIX 4 : Plus de 8h
🚨 SÉDENTARITÉ EXTRÊME - URGENCE SANTÉ
SITUATION CRITIQUE :
•	8h+ assis au travail + transport assis + soirée assis = 10-12h+ total
•	Risques santé très élevés
•	Nommé \"nouveau tabagisme\" par études
•	Changement radical mode de vie nécessaire
RISQUES DOCUMENTÉS :
•	Mortalité prématurée augmentée
•	Diabète type 2 aggravé significativement
•	Maladies cardiovasculaires
•	Certains cancers (côlon, utérus)
•	Troubles musculo-squelettiques
•	Dépression, anxiété
PRINCIPE CLÉ : \"Même 60 min sport/jour ne compense PAS totalement 8h+ assise continue\" → Besoin DOUBLE ACTION : pauses + sport


PLAN DE TRANSFORMATION OBLIGATOIRE :
ÉTAPE 1 : Casser l'assise continue (AUJOURD'HUI)
Règle d'or : JAMAIS plus de 50 min assis continu
Minuteur/alarme toutes les 50 min : → Se lever, bouger 5-10 min
Exemples activités 5-10 min :
•	Marche couloirs/escaliers
•	Étirements complets
•	Exercices au poids du corps (10 squats, 10 fentes)
•	Aller aux toilettes à un autre étage
•	Remplir bouteille d'eau au plus loin
•	Téléphoner debout en marchant
= 8 pauses de 10 min en 8h = 80 min mouvement intégré
ÉTAPE 2 : Activité structurée quotidienne (CETTE SEMAINE)
MINIMUM ABSOLU :
•	60 min activité modérée/jour, 7j/7
•	OU 30 min activité intense/jour, 7j/7
•	Préférentiellement AVANT ou IMMÉDIATEMENT APRÈS travail
Pourquoi ne pas attendre weekend :
•	Bénéfices immédiats glycémie, circulation, humeur
•	Compense jour même la sédentarité
•	Prévention problèmes aigus
Format recommandé :
MATIN (idéal) :
6h : Réveil
6h15-7h15 : Activité (marche rapide, course, vélo, sport)
7h30 : Douche, petit-déjeuner
8h30 : Travail

OU SOIR (si matin impossible) :
18h : Fin travail
18h15-19h15 : Activité (AVANT rentrer chez soi)
19h30 : Douche, dîner

IMPÉRATIF : Ne pas rentrer s'asseoir avant activité
ÉTAPE 3 : Maximiser mouvement hors-travail (CE MOIS)
Soirées/weekends :
•	Abolir position assise passive (TV, smartphone couché/assis)
•	Alternatives actives : 
o	TV → regarder debout, faire exercices pendant
o	Téléphone → marcher en utilisant
o	Loisirs : privilégier actifs (jardinage, danse, visites, bricolage)
Objectif :
•	Maximum 2h assise hors-travail
•	Reste : debout/mouvement/couché (sommeil)
ADAPTATIONS ALIMENTAIRES SPÉCIFIQUES :
Métabolisme ralenti par sédentarité extrême :
•	Dépense énergétique réduite
•	Sensibilité insuline diminuée
•	Stockage graisseux facilité
SUIVI MÉDICAL RENFORCÉ :
Avec sédentarité extrême + obésité + diabète :
•	Consulter médecin AVANT démarrage activité intense
•	ECG repos (vérifier cœur)
•	Épreuve d'effort si >40 ans ou symptômes
•	Suivi tous les 2-3 mois
Objectifs médicaux stricts :
•	HbA1c <7% (idéalement <6,5%)
•	Tension <130/80 mmHg
•	LDL cholestérol <100 mg/dL

❓ QUESTION : Activités physiques appréciées
PRINCIPE FONDAMENTAL : \"La meilleure activité physique est celle que vous ferez régulièrement\"
→ Prioriser PLAISIR pour adhésion long terme

SI MARCHE
⭐ EXCELLENT CHOIX - Accessible, sûr, efficace
AVANTAGES :
•	Pas d'équipement nécessaire
•	Faible impact articulaire
•	Intensité modulable
•	Social possible (marche en groupe)
•	Intégrable quotidien (déplacements)
OPTIMISATION MARCHE:
Lieux propices :
•	Bord de mer (Marina, plage)
•	Boulevards larges (tôt matin ou soir)
•	Parcs/espaces verts si disponibles
•	Quartiers calmes
•	Marché (marche utilitaire = comptée aussi)
Progression intensité :
NIVEAU 1 : Débutant
- Vitesse : 4 km/h (confortable, conversation facile)
- Durée : 20-30 min
- Fréquence : 5 jours/semaine

NIVEAU 2 : Intermédiaire  
- Vitesse : 5-6 km/h (respiration accélérée, conversation possible)
- Durée : 30-45 min
- Fréquence : 5-6 jours/semaine

NIVEAU 3 : Avancé
- Vitesse : 6-7 km/h (respiration forte, conversation difficile)
- Durée : 45-60 min
- Fréquence : 6-7 jours/semaine

NIVEAU 4 : Marche sportive
- Vitesse : 7+ km/h (presque course)
- Intégrer montées, escaliers
- Durée : 60+ min
- Fréquence : 6-7 jours/semaine
Variantes pour éviter monotonie :
•	Marche nordique (si bâtons disponibles)
•	Marche intervalle : alterner 2 min rapide / 2 min normale
•	Marche en groupe : motivation sociale
•	Marche exploration : découvrir nouveaux quartiers
•	Marche utilitaire : courses, visites à pied
Programme marche spécifique obésité + diabète :
SEMAINE 1-2 : Habituation
- 20 min/jour, vitesse confortable
- Après dîner (digestion + routine)

SEMAINE 3-4 : Augmentation durée
- 30 min/jour, même vitesse

SEMAINE 5-8 : Augmentation intensité
- 30 min/jour, vitesse modérée
- Respiration légèrement accélérée

SEMAINE 9-12 : Diversification
- 40 min/jour
- 3 jours marche rapide
- 2 jours marche normale
- 1 jour marche + escaliers/montées
- 1 jour repos

APRÈS 3 MOIS : Maintien long terme
- 45-60 min, 5-6 jours/semaine
- Intensité modérée à éle";

            case 'fc_connaissance':
                return "vée
- Variété pour plaisir
Équipement minimal :
•	Chaussures confortables (semelles épaisses)
•	Vêtements légers, respirants
•	Casquette/chapeau (soleil)
•	Bouteille d'eau
•	Téléphone (sécurité)
Sécurité :
•	Heures fraîches (6h-7h30 ou 18h-19h30)
•	Zones éclairées, fréquentées
•	Marcher contre circulation (voir véhicules arriver)
•	Prévenir proche du trajet
SI YOGA
⭐ EXCELLENT COMPLÉMENT - Souplesse, équilibre, mental
AVANTAGES DIABÈTE + OBÉSITÉ :
•	↓ Stress (cortisol)
•	↑ Sensibilité insuline
•	↑ Conscience corporelle
•	Améliore sommeil
•	Faible impact (accessible tous niveaux)
TYPES YOGA ADAPTÉS :
Hatha Yoga (recommandé débutants) :
•	Postures douces, tenues longtemps
•	Focus respiration
•	Rythme lent
•	Idéal obésité (progressif)
Yoga restauratif :
•	Très doux, supports (coussins)
•	Relaxation profonde
•	Gestion stress optimal
Vinyasa (si déjà actif) :
•	Plus dynamique, enchaînements
•	Cardio léger
•	Construction force
⚠️ Éviter Bikram/Hot Yoga :
•	Chaleur extrême dangereuse avec diabète
•	Déshydratation, hypoglycémie risques
Programme yoga :
Où pratiquer :
•	Centres yoga (villes principales)
•	Vidéos en ligne (YouTube gratuit)
•	Applications (Down Dog, Daily Yoga)
•	Maison (tapis ou natte suffit)
Routine quotidienne 20 min matin :
5 min : Respiration (pranayama)
- Assis confortable
- Respiration profonde abdominale
- Calme mental

10 min : Salutations au soleil modifiées (3-5 cycles)
- Échauffement complet corps
- Adaptées niveau (genoux sol si besoin)

5 min : Postures tenues + étirements
- Chien tête en bas (30 sec)
- Posture de l'enfant (30 sec)
- Torsion assise (30 sec chaque côté)
- Relaxation finale allongé (2 min)
Bénéfices attendus :
•	Souplesse amélilorée (2-4 semaines)
•	Stress réduit (immédiat)
•	Force progressive (1-3 mois)
•	Équilibre glycémique (2-3 mois)
Combinaison YOGA + MARCHE (idéale) :
MATIN : Yoga 20 min (réveil, souplesse)
SOIR : Marche 40 min (cardio, dépense)

OU

5 jours : Marche 45 min
2 jours : Yoga 45-60 min (récupération active)
SI AUTRE ACTIVITÉ
Encourager selon profil :
Natation/Aquagym (si accès piscine) :
•	Avantages : portage eau, tous muscles, rafraîchissant
•	Fréquence : 2-3x/semaine, 30-45 min
•	Intensité : modérée (respiration contrôlée)
Vélo (si disponible, terrain plat) :
•	Avantages : faible impact genoux, déplacements utiles
•	Fréquence : 3-5x/semaine, 30-60 min
•	Intensité : modérée (conversation possible)
Danse (traditionnelle ou moderne) :
•	Avantages : plaisir, social, culturel, cardio
•	Fréquence : 2-3x/semaine, 45-60 min
•	Types : zumba, danse africaine, autres
Sports collectifs légers :
•	Volley-ball, basket (si niveau permet)
•	Aspect social motivant
•	Variété mouvements
Jardinage/travaux domestiques actifs :
•	Compte comme activité si énergique
•	Bêchage, ratissage, lessive manuelle
•	Bonus : utile + économique
Musculation/renforcement (maison ou salle) :
•	Construction masse musculaire
•	↑ Métabolisme basal
•	2-3x/semaine suffisant
PRINCIPE D'INTÉGRATION :
Activité principale (5-6 jours) : Celle que vous aimez le plus Activité complémentaire (1-2 jours) : Différente, équilibre
Exemple :
•	Adore marche → 5 jours marche + 1 jour yoga
•	Adore danse → 3 jours danse + 2 jour";

            case 'stress_ennui':
                return "s marche + 1 jour renforcement
NB : Si user choisit autre activité physique qu’il préfère hormis marche et yoga, tu lui balance les autres activités se trouvant en haut pour mla question précédentes
❓ QUESTION : Connaissez-vous votre fréquence cardiaque au repos ?
✅ SI OUI - Utilisation pour optimiser entraînement
VALEUR FRÉQUENCE CARDIAQUE REPOS (FCR) :
Normale : 60-100 bpm Athlétique : 40-60 bpm Préoccupante si : >100 bpm (tachycardie repos)
Facteurs influençant FCR :
•	Condition physique (↓ si entraîné)
•	Médicaments (bêta-bloquants ↓)
•	Stress, anxiété (↑)
•	Déshydratation (↑)
•	Fièvre, maladie (↑)
•	Sommeil insuffisant (↑)

UTILISATION POUR ENTRAÎNEMENT :
o	Calcul de votre fréquence cardiaque maximale FC max : 
Pour effectuer ce calcul, nous allons utiliser la formule de Tanaka qui est FCmax = 208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm] dont l’unité est le bpm (battement par minute).
Zones d'entraînement :
ZONE 1 : Très légère (50-60% FCM)
- Récupération active
- Échauffement

ZONE 2 : Légère (60-70% FCM) ⭐ OPTIMAL PERTE POIDS DURABLE
- Utilisation graisses maximale
- Conversation facile
- Durée longue possible

ZONE 3 : Modérée (70-80% FCM) ⭐ OPTIMAL SANTÉ CARDIO
- Amélioration endurance
- Conversation possible mais essoufflé

ZONE 4 : Difficile (80-90% FCM)
- Anaérobie, seuil lactique
- Amélioration performance
- Pas recommandé débutants

ZONE 5 : Maximale (90-100% FCM)
- Sprint, très court
- Déconseillé sauf sportifs confirmés
RECOMMANDATIONS DIABÈTE + OBÉSITÉ :
Cible principale : ZONES 2-3 (60-80% FCM)
•	Sécuritaire
•	Efficace perte poids
•	Améliore santé métabolique
•	Durable
Comment mesurer FC pendant exercice :
•	Méthode manuelle : doigts sur poignet/cou, compter 15 sec x4
•	Montre connectée : si disponible (Fitbit, Garmin, Apple Watch)
•	Sensation subjective : échelle effort perçu

Échelle effort perçu (si pas mesure FC) :
1-2 : Très facile (repos, marche très lente)
3-4 : Facile (conversation sans problème) → ZONE 2
5-6 : Modéré (conversation possible, essoufflé léger) → ZONE 3
7-8 : Difficile (mots courts seulement) → ZONE 4
9-10 : Très difficile/maximal (impossible parler) → ZONE 5
Cible : rester entre 4-6 sur échelle (Zones 2-3)
⚠️ PRÉCAUTIONS SI BÊTA-BLOQUANTS :
Si vous prenez bêta-bloquants (tension) :
•	FC ne monte pas normalement
•	Zones FC classiques non applicables
•	Utiliser échelle effort perçu exclusivement
•	Viser 4-6 sur 10
•	Ne pas se fier à FC basse (trompeur)
Surveillance :
•	Glycémie et fréquence corrélées
•	Si FCR de repos élevée (>80 bpm) : peut signaler stress, déconditionnement ou surchage pondérale, donc, ajuster l’activité progressivement.
❌ SI NON - Mesure et interprétation
APPRENDRE À MESURER :
Fréquence cardiaque repos (FCR) :
MÉTHODE :
1. Au réveil, encore allongé dans lit
2. Doigts (index + majeur) sur poignet face interne
OU sur cou (artère carotide, côté trachée)
3. Compter battements pendant 60 secondes complètes
4. Noter résultat
5. Répéter 3 matins consécutifs
6. Moyenne = votre FCR
Fréquence cardiaque effort :
MÉTHODE :
1. Pendant activité, s'arrêter
2. Immédiatement prendre pouls
3. Compter 15 secondes
4. Multiplier par 4
5. = FC effort instantanée
Investissement optionnel :
•	Montre connectée simple 
•	Facilite suivi sans interruption
•	Mais pas obligatoire
SANS MESURE FC - MÉTHODE SIMPLE :
Test de la conversation :
•	Trop facile : parlez normalement, chanter possible → augmenter intensité
•	Optimal : conversation possible mais phrases courtes, essoufflé léger → parfait
•	Trop dur : impossible parler, halètement → réduire intensité
Viser toujours \"optimal\" pendant activité

🧠 ADAPTATIONS SELON COMPORTEMENTS ALIMENTAIRES
❓ QUESTION : Mangez-vous souvent par stress ou ennui ?
✅ SI OUI - Gestion alimentation émotionnelle
⚠️ PROBLÈME FRÉQUENT ET IMPORTANT
Alimentation émotionnelle :
•	Manger en réponse à émotions (pas faim physique)
•	Stress, anxiété, tristesse, ennui, colère, solitude
•	Recherche réconfort, distraction, plaisir immédiat
•	Sabote efforts perte poids et contrôle glycémique

IDENTIFIER SON PROFIL :
Questions d'auto-analyse :
1.	Mangez-vous quand émotions négatives ? (stress, tristesse)
2.	Mangez-vous quand ennui, inoccupé ?
3.	Envie soudaine aliments spécifiques (sucré, gras) ?
4.	Manger jusqu'à inconfort, pas écoute satiété ?
5.	Culpabilité après avoir mangé émotionnellement ?
6.	Manger en cachette ?
Si OUI à 3+ questions → alimentation émotionnelle significative
STRATÉGIES DE GESTION :
ÉTAPE 1 : Distinction faim physique vs émotionnelle
FAIM PHYSIQUE :
•	Apparition progressive
•	Estomac vide, gargouillis
•	Accepte tout aliment
•	Attendre un peu possible
•	Satisfaite par repas
•	Pas de culpabilité
FAIM ÉMOTIONNELLE :
•	Apparition soudaine
•	Pas de signaux physiques
•	Envie aliment spécifique
•	Urgence, impatience
•	Manger ne satisfait pas (vide persiste)
•	Culpabilité après
ÉTAPE 2 : Technique HALT (avant manger)
Quand envie manger, demander :
•	Hungry (Faim) ? → Vraie faim physique ?
•	Angry (Colère) ? → Émotionnellement agacé ?
•	Lonely (Seul) ? → Solitude, besoin connexion ?
•	Tired (Fatigué) ? → Épuisé, besoin repos ?
Si H → Manger (vraie faim) Si A, L ou T → Gérer émotion AVANT/AU LIEU DE manger

ÉTAPE 3 : Alternatives non-alimentaires
STRESS/ANXIÉTÉ :
•	Respiration profonde : 5 min, abdominal
•	Marche : 10-15 min, changement d'air
•	Appel ami/proche : verbaliser
•	Tisane chaude : kinkeliba, citronnelle (rituel apaisant)
•	Exercice physique : libère endorphines
•	Prière/méditation : si pratique religieuse/spirituelle
•	Écriture : journal émotions
ENNUI :
•	Activité manuelle : couture, bricolage, dessin
•	Lecture : livre, journal
•	Sortie : visite voisin/ami, marche exploration
•	Projet : rangement placard, organisation
•	Apprentissage : nouvelle compétence (cuisine saine, exercice)
•	Jeu : casse-tête, jeux société avec famille
TRISTESSE :
•	Connexion sociale : appeler proche, visiter ami
•	Activité plaisante : musique, danse, film
•	Auto-compassion : accepter émotion, pas se juger
•	Aide professionnelle : si persistant (psychologue)
SOLITUDE :
•	Groupe : rejoindre association, club marche, église
•	Bénévolat : aider autres (sens, connexion)
•	Cours : apprendre avec autres (cuisine, artisanat)
ÉTAPE 4 : Restructuration environnement
À LA MAISON :
•	Retirer aliments \"gâchette\" (ceux mangés émotionnellement)
•	Biscuits, bonbons, chips → pas acheter
•	Si famille résiste → ranger hors de vue
•	Rendre difficile l'accès : si doit sortir acheter, pause réflexion

ALTERNATIVES DISPONIBLES :
•	Fruits lavés, prêts à manger
•	Légumes crus coupés, trempette
•	Tisanes variées (substitut rituel)
•	Eau aromatisée (citron, concombre)
ÉTAPE 5 : Gestion émotionnelle proactive
Prévention stress :
•	Sommeil suffisant (7-8h)
•	Activité physique régulière (↓ cortisol)
•	Temps pour soi quotidien (15-30 min plaisir)
•	Limites claires (oser dire non, pas surcharge)
Pleine conscience (mindfulness) :
•	Manger en conscience : lent, savourer, sans distraction
•	20 min minimum par repas
•	Poser couverts entre bouchées
•	Écouter signaux satiété
Soutien psychologique :
•	Si alimentation émotionnelle sévère, persistante
•	Consulter psychologue/thérapeute
•	Thérapie cognitivo-comportementale (TCC) efficace
•	Groupes de soutien (overeaters anonymous type)

PLAN D'ACTION CONCRÊT (4 SEMAINES) :
SEMAINE 1 : Prise de conscience
- Journal alimentaire + émotions
- Noter AVANT chaque prise alimentaire :
  * Heure
  * Lieu
  * Émotion ressentie (échelle 1-10)
  * Faim physique ? (oui/non)
  * Ce qui est mangé
  * Émotion après

SEMAINE 2 : Pause systématique
- Avant manger entre repas → HALT
- Attendre 10 min
- Boire verre d'eau
- Réévaluer
- Si vraie faim → collation prévue
- Sinon → alternative non-alimentaire

SEMAINE 3 : Alternatives actives
- Liste personnalisée 10 alternatives
- Tester au moins 5 différentes
- Noter celles qui fonctionnent pour vous

SEMAINE 4 : Consolidation
- Routine alternatives installée
- Environnement restructuré
- Premiers résultats visibles
REPAS STRUCTURE AIDE PRÉVENTION :
Horaires fixes rigoureux :
7h : Petit-déjeuner
10h : Collation
13h : Déjeuner
16h : Collation
19h : Dîner
Aucun autre moment = moment de manger
Repas copieux, satisfaisants :
•	Protéines adéquates (satiété)
•	Fibres abondantes (volume)
•	Graisses saines (ralentissent digestion)
•	Plaisir gustatif (pas régime punitif)
Exemple repas anti-fringale émotionnelle :
Déjeuner :
- GRANDE salade entrée (volume, fibres)
- Riz complet (150g) + sauce haricots (protéines, fibres)
- Poisson grillé (100g) + avocat 1/4 (graisses saines, satisfaction)
- Légumes cuits
- Fruit
→ Repas rassasiant, pas de frustration, tient jusqu'à collation 16h



❌ SI NON - Renforcer habitudes saines
⭐ ATOUT MAJEUR - Préserver
Alimentation basée sur besoins physiologiques :
•	Faim/satiété guidant
•	Émotions gérées autrement
•	Facilite contrôle poids
Maintenir cette force :
•	Continuer écouter signaux corps
•	Préserver gestion émotionnelle saine actuelle
•	Vigilance si stress futur (prévention rechute)
Stratégies émotionnelles à maintenir :
•	[Celles que vous utilisez déjà avec succès]
•	Identifier et valoriser
•	Partager avec proches (modèle positif)

❓ QUESTION : Tendance à finir assiette même sans faim
✅ SI OUI - Rééducation signaux satiété
PROBLÈME CULTUREL + ÉDUCATION :
•	\"Ne gaspille pas la nourriture\"
•	\"Finis ton assiette\"
•	Messages enfan";

            case 'regime_particulier':
                return "ce profondément ancrés
•	Déconnexion signaux internes
CONSÉQUENCES :
•	Apport calorique excessif régulier
•	Ignorance satiété naturelle
•	Inconfort digestif
•	Prise poids progressive
RÉÉDUCATION PROGRESSIVE :
ÉTAPE 1 : Reconnaître signaux satiété
Échelle faim/satiété (1-10) :
1-2 : Affamé, faible, irritable
3-4 : Faim confortable, estomac vide
5 : Neutre, ni faim ni satiété
6-7 : Satisfait, confortablement plein ⭐ STOP ICI
8-9 : Trop plein, inconfortable
10 : Douloureux, nauséeux
OBJECTIF :
•	Commencer repas à 3-4
•	Terminer repas à 6-7
•	JAMAIS atteindre 8+
Signaux physiques satiété :
•	Ralentissement rythme manger (naturellement)
•	Nourriture moins appétissante
•	Pensées dérivent vers autre chose
•	Sensation plénitude légère estomac
•	Soupir satisfaction
ÉTAPE 2 : Techniques pratiques
PORTIONS CONTRÔLÉES DÈS LE DÉPART :
•	Servir dans assiette AVANT s'asseoir
•	Portions guidées (selon guide niveau activité)
•	Ne pas apporter plats à table (évite resservir automatique)
•	Si famille : se servir EN PREMIER avec ses portions
•	Rester assiettes individuelles
MANGER LENTEMENT (20+ min/repas) :
•	Poser couverts entre chaque bouchée
•	Mâcher longuement (20-30 mastications)
•	Pause mi-repas (2 min)
•	Conversation (si repas social)
•	Apprécier saveurs, textures
ÉVALUATION MI-REPAS :
•	À mi-assiette, PAUSE
•	Boire gorgée d'eau
•	Évaluer échelle faim/satiété
•	Si 6-7 → ARRÊTER (même si reste)
•	Si 4-5 → continuer lentement
ÉTAPE 3 : Gérer restes
CHANGEMENT MINDSET :
•	\"Mieux dans poubelle que dans mon corps si pas besoin\"
•	Suralimentation = gaspillage santé (+ grave que gaspillage nourriture)
•	Corps ≠ poubelle
SOLUTIONS PRATIQUES :
Option 1 : Conservation
•	Restes → Tupperware
•	Collation lendemain
•	Repas suivant
•	Congeler si quantité significative
Option 2 : Partage
•	Offrir autre membre famille
•	Voisin, ami
•	Animal domestique (si adapté)
Option 3 : Compost
•	Si possible
•	Valorisation écologique
Option 4 : Poubelle (si vraiment nécessaire)
•	Sans culpabilité
•	Santé > tout
ÉTAPE 4 : Reprogrammation familiale
Si enfants :
•	NE PAS transmettre \"obligation finir assiette\"
•	Apprendre écouter leur corps
•	\"Tu peux arrêter si tu n'as plus faim\"
•	Modèle positif
Si pression familiale/sociale :
•	Communication claire : 
o	\"Je fais attention à ma santé\"
o	\"Mon médecin m'a conseillé d'écouter ma satiété\"
o	\"Ce n'est pas du gaspillage, j'en garde pour plus tard\"
•	Fermeté bienveillante
•	Expliquer diabète nécessite discipline
ADAPTATION REPAS BÉNINOIS :
DÉFI : Plats communautaires (pâte, sauce)
SOLUTIONS :
Repas familiaux :
1.	Se servir personnellement dans assiette individuelle
2.	Quantifier visuellement : 
o	Pâte/riz : poing fermé = portion
o	Sauce : louche moyenne
o	Viande/poisson : paume main
3.	S'éloigner du plat central (évite resservir)
4.	Manger lentement (finir après autres)
Événements sociaux (mariages, funérailles) :
•	Portion initiale modeste (\"Je peux toujours reprendre si j'ai vraiment faim encore\")
•	Manger très lentement
•	S'hydrater abondamment (aide satiété)
•	Socialiser plus, manger moins (focus sur personnes, pas nourriture)
PLAN D'ACTION (4 SEMAINES) :
SEMAINE 1 : Prise de conscience
- Noter échelle faim/satiété avant ET après chaque repas
- Observer signaux corporels
- Pas encore changer comportement (juste observer)

SEMAINE 2 : Premiers ajustements
- Portions pré-servies
- Manger lentement (20 min minimum)
- Pause mi-repas

SEMAINE 3 : Respect satiété
- Arrêter à 6-7 même si reste
- Gérer restes sans culpabilité
- Noter sentiments

SEMAINE 4 : Automatisation
- Nouvelle habitude naturelle
- Confiance signaux corporels
- Liberté vs nourriture
❌ SI NON - Maintenir écoute corporelle
⭐ COMPÉTENCE PRÉCIEUSE
Force à préserver :
•	Connexion signaux internes
•	Régulation naturelle
•	Protection contre suralimentation
Continuer :
•	Écoute faim avant manger
•	Écoute satiété pendant repas
•	Arrêt quand rassasié
•	Sans influence externe
Vigilance situations :
•	Repas sociaux (pression)
•	Buffets (abondance)
•	Stress (peut altérer signaux)
Conseils maintien :
•	Manger lentement (toujours)
•	Environnement calme (évite distraction)
•	Gratitude corps (signaux fiables)
❓ QUESTION : Avez-vous déjà suivi un régime alimentaire particulier ?
✅ SI OUI
Sous-question : Lequel, efficacité, pourquoi ?
ANALYSE EXPÉRIENCE PASSÉE
Nous vous remercions pour votre réponse. Pour vous accompagner dans vos expériences, nous avons élaborer un cadre d’analyse qui vous aidera à comprendre l’efficacité de votre ancien régime et le pourquoi. 
CADRE D'ANALYSE :
Types régimes courants et évaluation :
1. RÉGIMES TRÈS RESTRICTIFS (très basses calories, jeûnes prolongés)
Si essayé :
Efficacité court terme : ✅ Perte poids rapide Efficacité long terme : ❌ Reprise quasi-systématique Santé : ❌ Fonte musculaire, carences, métabolisme ralenti
Pourquoi échec habituel :
•	Insoutenable psychologiquement
•	Frustration intense
•	Ralentissement métabolique
•	Craquages compensatoires
APPROCHE ACTUELLE (différente) :
•	Déficit modéré (500 kcal/jour max)
•	Tous groupes alimentaires présents
•	Satiété préservée
•	Durable à vie
Messages clés :
•	\"Cette fois, nous ne répétons pas ces erreurs\"
•	\"Perte plus lente mais définitive\"
•	\"Qualité vie maintenue\"
2. RÉGIMES \"SANS\" (sans glucides, sans gras, sans gluten)
Si essayé :
Keto/Atkins (très bas glucides) :
•	Avec diabète type 2 : potentiellement intéressant MAIS
•	Risque hypoglycémies si médication
•	Difficile socialement (culture béninoise glucides-centrée)
•	Privation féculents locaux (riz, pâte, igname)
•	Non recommandé ici : approche équilibrée préférée
Low-fat extrême :
•	Dépassé scientifiquement
•	Graisses saines nécessaires
•	Hormones, vitamines liposolubles, satiété
•	Non applicable
Sans gluten (si pas coeliaque) :
•	Inutile
•	Pas de bénéfice perte poids prouvé
•	Restriction non justifiée
APPROCHE ACTUELLE (équilibrée) :
•	Tous macronutriments inclus
•	Proportions adaptées activité
•	Flexibilité culturelle
•	Pas d'éviction arbitraire
3. RÉGIMES TENDANCE (paleo, intermittent fasting, substituts de repas)
Jeûne intermittent (IF) :
Si essayé et bien toléré :
•	Peut être intégré avec diabète MAIS précautions
•	Formats possibles : 
o	16:8 (jeûne 16h, fenêtre alimentaire 8h)
o	Ex: dernier repas 19h, premier repas 11h lendemain
•	Avantages : simplifie repas, améliore sensibilité insuline
•	IMPÉRATIF : accord médecin (ajustement médicaments)
•	Surveillance glycémique stricte
Si mal vécu (faim, malaise) :
•	Ne pas forcer
•	3 repas + 2 collations = parfait aussi
Substituts de repas (shakes, barres) :
•	Déconseillé long terme
•	Manque fibres, nutriments complets
•	Pas apprentissage alimentaire réel
•	Cher
•	Préférer : vrais aliments, repas cuisinés
Paleo :
•	Élimine légumineuses, céréales (sources importantes culture béninoise)
•	Cher (focus viande/poisson qualité)
•	Non adapté contexte
4. PROGRAMMES COMMERCIAUX (Weight Watchers, Jenny Craig, etc.)
Si essayé :
Aspects positifs à garder :
•	Structure
•	Soutien groupe
•	Suivi régulier
Aspects négatifs :
•	Coût (souvent prohibitif)
•	Dépendance système
•	Pas toujours culturellement adapté
APPROCHE ACTUELLE :
•	Gratuite
•	Autonomie progressive
•	Aliments locaux
•	Soutien médical/familial
5. APPROCHES TRADITIONNELLES/CULTURELLES
Si utilisé plantes/remèdes locaux :
Évaluation :
•	Certains bénéfiques (kinkeliba, gingembre)
•	D'autres inefficaces voire dangereux
•	Ne jamais remplacer traitement médical
Intégration prudente :
•	Tisanes digestives : OUI (kinkeliba, citronnelle)
•	Épices (gingembre, ail) : OUI
•	\"Remèdes miracles\" perte poids : NON
•	Toujours informer médecin
LEÇONS À TIRER :
Questions guidées :
1.	Qu'avez-vous aimé dans régime passé ? → Intégrer dans approche actuelle
2.	Qu'avez-vous détesté ? → Éviter absolument cette fois
3.	Pourquoi ça a marché initialement ? → Identifier facteurs succès
4.	Pourquoi ça n'a pas duré ? → Éliminer causes échec
5.	Qu'auriez-vous voulu différemment ? → Adapter plan actuel
SYNTHÈSE PERSONNALISÉE : [Basée sur réponses spécifiques utilisateur]
Conseil à retenir : 
o	Faites une synthèse sur le cadre d’analyse en dessus enfin de comprendre ce qui a marché pour vous dans votre régime précédent et comment vous pouvez l’appliquer dans votre plan nutritionnel actuel 
❌ SI NON - Premier essai structuré
Si vous êtes dans ce cas, alors ce sera votre première utilisation de régime alimentaire alors nous vous souhaitons une bonne expérience.";

            default:
                return 'Aucun';
        }
    }
}
