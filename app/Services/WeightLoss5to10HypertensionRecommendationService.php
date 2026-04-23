<?php

namespace App\Services;

class WeightLoss5to10HypertensionRecommendationService implements RecommendationServiceInterface
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = [], int $age = 30): string
    {
        switch ($key) {
            case 'antecedents_diag':
                return "Antécédents de diabète type 2, HTA ou maladies cardiovasculaires ?
HYPERTENSION ARTÉRIELLE :
Conseils nutritionnels spécifiques :
•	SODIUM : max 2000mg/jour (≈ 5g de sel)
•	Éviter absolument : poisson fumé très salé, viandes séchées salées, cubes Maggi, sel ajouté à table
•	Privilégier épices et aromates : piment frais, gingembre, ail, oignon, citronnelle, basilic africain
•	POTASSIUM : augmenter fruits et légumes frais
•	Limiter caféine (max 2 tasses café/jour)
Ajustements des menus :
•	Poisson fumé : rincer abondamment ou remplacer par poisson frais
•	Dessaler systématiquement viandes/poissons transformés
•	Sauce : réduire sel de 70%, compenser par épices
•	Privilégier cuisson vapeur, grill, four
•	Boissons : bissap sans sucre (excellent pour HTA), eau de coco nature, infusions
Aliments anti-HTA :
•	Bissap (hibiscus) : 2-3 tasses/jour sans sucre
•	Ail frais cru ou cuit
•	Avocat (riche en potassium)
•	Banane plantain bouillie
•	Gombo frais
•	Feuilles d'amarante
•	Jus de citron vert dilué
•	Maintenir alimentation équilibrée selon tableau
•	Surveiller apports sodium : rester ≤ 2300mg/jour
•	Activité physique régulière selon niveau
•	Contrôles médicaux annuels (glycémie, tension, lipides)
•	Maintenir poids santé progressivement



💊 QUESTION : Médicaments liés aux antécédents ?
✅ RÉPONSE : OUI (avec spécification)
METFORMINE (anti-diabétique oral) :
Interactions alimentaires :
•	Prendre avec repas pour limiter troubles digestifs
•	Peut réduire absorption vitamine B12 : compenser par aliments riches (poissons, œufs, produits laitiers)
•	Éviter alcool (risque acidose lactique)
Ajustements :
•	Si nausées : fractionner davantage, privilégier aliments faciles à digérer
•	Augmenter sources B12 : maquereau, sardines, œufs, yaourt
•	Collations digestes : banane plantain bouillie, riz complet, papaye
GLIMEPIRIDE ou autres sulfamides (anti-diabétiques) :	
Risque hypoglycémie :
•	Ne JAMAIS sauter de repas
•	Collations régulières essentielles
•	Avoir toujours glucides rapides disponibles (fruit, jus)
•	Horaires repas réguliers
Ajustements :
•	3 repas + 3 collations obligatoires
•	Collation avant coucher si dîner tôt
•	Glucides complexes à chaque repas
•	Surveiller signes hypoglycémie
INSULINE :
Coordination repas-injections :
•	Horaires repas très réguliers
•	Quantités glucides constantes jour à jour
•	Apprendre à compter glucides précisément
•	Adapter selon glycémies

Ajustements :
•	Menu très structuré, portions pesées initialement
•	Journal alimentaire recommandé
•	Glucides répartis : 40-50g petit-déj, 50-60g déjeuner, 40-50g dîner, 15-20g collations
•	Coordination avec diabétologue
ORLISTAT (perte de poids) :
Mécanisme : bloque absorption 30% graisses :
•	Réduire lipides : max 15g par repas
•	Effets secondaires si trop de gras : selles grasses, urgences
•	Supplémenter vitamines liposolubles (A, D, E, K)
•	Prendre vitamine 2h avant ou après orlistat
Ajustements menu :
•	Réduire huiles à 1 cuillère à café/repas max
•	Éviter : avocat entier, arachides en grande quantité, aloko frit
•	Privilégier : cuissons sans gras, viandes très maigres, poissons blancs
•	Supplémentation vitaminique sous contrôle médical
LIRAGLUTIDE (GLP-1, perte poids/diabète) :
Effets : réduit appétit, ralentit vidange gastrique :
•	Nausées fréquentes initialement
•	Portions plus petites, fractionner
•	Éviter aliments très gras, épicés
•	Bien hydrater
Ajustements :
•	Portions réduites de 20-30%
•	4-5 petits repas plutôt que 3 gros
•	Aliments doux : riz, igname vapeur, poissons grillés, légumes cuits
•	Éviter : sauces grasses, aloko, fritures
•	Augmenter progressivement portions selon tolérance
IEC/ARA2 (tension artérielle) :
Interaction potassium :
•	Ces médicaments augmentent potassium sanguin
•	Modérer aliments très riches en potassium en excès
•	Surveillance biologique régulière
Ajustements :
•	Potassium modéré (pas d'excès) : 2-3 portions fruits/jour OK
•	Éviter suppléments potassium
•	Limiter : banane plantain, avocat, eau de coco en très grande quantité (consommation normale OK)
•	Sel réduit MAIS pas sels de régime (riches en potassium)
BÊTA-BLOQUANTS (tension/cœur) :
Effets métaboliques :	
•	Peuvent masquer symptômes hypoglycémie
•	Peuvent augmenter légèrement glycémie
•	Ralentissent métabolisme : ajuster calories
Ajustements :
•	Surveillance glycémie accrue si diabétique
•	Portions glucides bien réparties
•	Calories : réduire 100-200 kcal/jour si prise de poids
•	Activité physique adaptée (fréquence cardiaque)
STATINES (cholestérol) :
Interactions :
•	Éviter excès pamplemousse (certaines statines)
•	Peuvent augmenter glycémie légèrement
•	Possibles douleurs musculaires : coenzyme Q10
Ajustements :
•	Pamplemousse : max 1 petit/jour (vérifier notice)
•	Alimentation cardio-protectrice (voir MCV ci-dessus)
•	Oméga-3 : poissons gras 3 fois/semaine
•	Fibres solubles : haricots, avoine, légumes
•	Antioxydants : légumes colorés variés




❌ RÉPONSE : NON
Pas d'ajustement médicamenteux spécifique nécessaire
•	Suivre recommandations générales
•	Vigilance sur automédication
•	Consulter avant tout nouveau traitement
💊 QUESTION : Types de";

            case 'journee_typique':
                return "médicaments actuels (liste à cocher)
Adaptations déjà couvertes ci-dessus selon chaque type
Si AUCUN médicament :
•	Menu standard selon niveau d'activité
•	Approche préventive pure
•	Focus sur équilibre nutritionnel global
•	Suivi régu";

            case 'grignotage':
                return "lier pour éviter médication future
PARTIE 3 : ADAPTATIONS SELON HABITUDES ALIMENTAIRES
🍴 QUESTION : Journée typique de repas (question ouverte)
Nous vous remercions pour nous avoir divulgué votre journée typique car cela va nous permettre de vous orienter dans nos conseils enfin de cerner vos réalités quotidiennes en matière de nutrition. 
🍪 QUESTION 3 : Grignotage entre repas ?
✅ RÉPONSE : OUI (avec précision des aliments)
Si grignotage d'aliments transformés/sucrés (biscuits, bonbons, sodas) :
Problèmes :
•	Calories vides
•	Pics glycémiques → fringales
•	Prise de poids
•	Perturbation signaux faim/satiété
Conseils de transition :
•	Remplacement progressif sur 4 semaines
•	Ne pas supprimer brutalement (frustration)
•	Identifier moments et déclencheurs
•	Planifier alternatives saines
Plan de substitution béninois :
Semaine 1-2 : Réduction + introduction alternatives
•	Remplacer 50% grignotages par : 
o	Noix de cajou grillées non salées (20g)
o	Fruits frais (papaye, mangue, orange)
o	Eau infusée (citron, gingembre, menthe)
Semaine 3-4 : Structuration
•	2 collations planifiées fixes
•	10h30 : Mix noix (15g) + fruit
•	16h30 : Yaourt nature + fruits ou akara au four (2 petits)
•	Entre collations : tisanes, eau, légumes crus
Alternatives béninoises aux grignotages malsains :
Au lieu de	Remplacer par
Biscuits sucrés	Akara au four, galette de maïs complet
Bonbons	Fruits secs naturels (mangue, ananas séchés sans sucre)
Chips	Chips de plantain au four, légumes crus
Sodas	Bissap sans sucre, jus de fruits dilués, eau citronnée
Pâtisseries	Banane plantain bouillie + arachides
Chocolat industriel	Noix de cajou + 1 carré chocolat noir 70%
Si grignotage d'aliments sains mais excessifs :
Problèmes :
•	Même sains, excès calorique
•	Exemple : 200g noix = 1200 kcal !
•	Perturbation rythme repas
Conseils :
•	Portions contrôlées
•	Pré-portionner dans petits sachets
•	Maximum 2 collations/jour
•	Noix : max 30g/jour
•	Fruits : 2-3 portions/jour
Menu ajusté :
•	Collation 1 (10h30) : 20g noix de cajou + 1 orange
•	Collation 2 (16h30) : Yaourt 125g +";

            case 'boissons':
                return "100g papaye
•	Si faim supplémentaire : légumes crus illimités (concombre, carotte, tomate)
❌ RÉPONSE : NON
EXCELLENT comportement - À maintenir :
•	Rythme alimentaire structuré
•	Meilleure régulation glycémique
•	Contrôle calorique facilité
Conseils :
•	Continuer 3 repas structurés
•	Ajouter 1-2 collations saines si besoins (notamment si très actif)
•	Écouter vraie faim vs habitude
•	Hydratation régulière (souvent faim = soif)
🍺 QUESTION 4 : Fréquence boissons sucrées/alcoolisées
📊 RÉPONSE : Tous les jours
CRITIQUE - Action urgente :
Boissons sucrées quotidiennes :
•	1 canette soda = 140 kcal + 35g sucre
•	Par mois : 4200 kcal = +0,6 kg graisse
•	Pics glycémiques répétés
•	Risque diabète type 2 fortement augmenté
•	Addiction au sucre
Plan sevrage progressif (8 semaines) :
Semaines 1-2 : Dilution
•	Diluer boissons sucrées 50% eau
•	Réduire quantité de moitié
•	Introduction alternatives : bissap sans sucre, eau citronnée
Semaines 3-4 : Réduction fréquence
•	1 jour sur 2 uniquement
•	Jours sans : bissap, eau infusée, jus fruits dilués
Semaines 5-6 : Occasions uniquement
•	2 fois/semaine maximum
•	Portions réduites (250ml vs 500ml)
Semaines 7-8 : Sevrage complet
•	Occasions exceptionnelles uniquement
•	Préférence alternatives savoureuses
Alternatives savoureuses :";

            case 'sommeil':
                return "•	Bissap (hibiscus) : sans sucre ou miel léger, glacé
•	Gingembre-citron : infusion fraîche, légèrement sucrée miel
•	Tamarin : boisson naturelle, sucre modéré
•	Eau de coco : nature, directement de la noix
•	Jus fruits frais dilués : 1/3 jus + 2/3 eau
•	Infusions locales : kinkeliba, citronnelle, menthe
•	Eau infusée : concombre-citron-menthe, ananas-gingembre
Alcool quotidien :
•	Risques : hypertension aggravée, calories vides, troubles hépatiques
•	1 bière (330ml) = 150 kcal
•	Interaction médicaments (attention !)
•	Perturbation sommeil et glycémie
Plan réduction alcool :
Phase 1 (semaines 1-2) : Quantification
•	Noter consommation exacte
•	Identifier moments/déclencheurs
•	Réduire 30% quantités
Phase 2 (semaines 3-4) : Jours sans
•	Alterner jours avec/sans
•	Jours sans : alternatives festives (bissap, jus)
Phase 3 (semaines 5-8) : Norme santé
•	Maximum recommandé : 1-2 verres/semaine
•	Jamais quotidien
•	Occasions sociales uniquement
Conseils spécifiques :
•	Si difficulté arrêt : consulter médecin
•	Remplacer rituel : bière du soir → tisane glacée, bissap
•	Socialisation sans alcool : alternatives savoureuses
📊 RÉPONSE : Une fois par semaine
ACCEPTABLE mais perfectible :
Boissons sucrées hebdomadaires :
•	Relativement contrôlé
•	Peut encore améliorer
Conseils :
•	Réduire à occasions exceptionnelles (2 fois/mois)
•	Quand consommation : petites portions
•	Privilégier alternatives quotidiennement
Alcool hebdomadaire :
•	Dans normes acceptables si 1-2 verres max
•	Maintenir cette fréquence sans augmenter
•	Attention portions (250ml vin max)
Menu ajusté :
•	6 jours/semaine : eau, bissap, tisanes, jus dilués
•	1 jour : occasion, portion modérée
•	Hydratation quotidienne : 2L eau minimum
📊 RÉPONSE : Occasionnellement
BON comportement - À maintenir :
•	Consommation maîtrisée
•	Pas d'impact métabolique majeur
Conseils :
•	Continuer limitation
•	Occasions = 1-2 fois/mois maximum
•	Portions raisonnables
•	Préférer alternatives savoureuses quotidiennement
📊 RÉPONSE : Jamais
EXCELLENT - À maintenir absolument :
•	Optimal pour santé métabolique
•	Contrôle glycémique facilité
•	Hydratation saine
Conseils :
•	Continuer abstinence
•	Découvrir variété alternatives béninoises
•	Hydratation : 2-3L/jour selon activité
Boissons quotidiennes recommandées :
•	Eau plate : 1,5-2L
•	Bissap sans sucre : 2-3 tasses
•	Tisanes locales : kinkeliba, citronnelle
•	Eau citronnée : à volonté
•	Jus légumes frais (concombre, carotte, épinard)
PARTIE 4 : COMPORTEMENTS ET BIEN-ÊTRE
😴 QUESTION 1 : Heures de sommeil par nuit
📊 RÉPONSE : Moins de 6h
CRITIQUE - Impact majeur obésité/HTA :
Conséquences manque sommeil :
•	Augmentation ghréline (hormone faim) +15%
•	Diminution leptine (hormone satiété) -15%
•	Résistance insuline accrue
•	Hypertension aggravée
•	Cortisol élevé (stockage graisse abdominale)
•	Fringales sucre/gras
Plan amélioration sommeil :
Objectif : atteindre 7-8h progressivement
Semaine 1-2 : +30 min
•	Coucher 30 min plus tôt
•	Rituel apaisant : tisane kinkeliba, lecture
•	Exemple : coucher 23h → 22h30
Semaine 3-4 : +1h
•	Coucher 1h plus tôt que d'habitude
•	Lever à heure fixe (même weekend)
•	Obscurité complète chambre
Semaine 5+ : Stabiliser 7-8h
•	Routine sommeil stricte
•	Même horaires tous les jours ±30min
Hygiène sommeil :
•	Arrêt écrans 1h avant coucher
•	Chambre fraîche (22-24°C)
•	Dîner léger 2-3h avant coucher
•	Pas de caféine après 14h
•	Activité physique mais pas après 20h
Rituel coucher apaisant :
•	21h : Infusion kinkeliba tiède
•	21h30 : Douche/toilette
•	21h45 : Lecture, prière, méditation
•	22h : Extinction lumières
Collation favorisant sommeil (si faim) :
•	Banane (magnésium, tryptophane)
•	Lait tiède avec cannelle (si toléré)
•	Infusion camomille-miel léger
Ajustements menu si manque sommeil :
•	Éviter sucres rapides (amplifiés par fatigue)
•	Augmenter magnésium : amandes, banane, épinards, haricots
•	Protéines qualité : régulation appétit
•	Vitamine B : poissons, œufs
•	Éviter repas lourds le soir
Menu adapté :
•	Dîner ultra-léger : soupe légumes + poisson grillé petit portion
•	Éviter : glucides raffinés, caféine après-midi, repas copieux soir
•	Favoriser : tisanes apaisantes, dîner 19h max, porti";

            case 'apnee':
                return "ons modérées
📊 RÉPONSE : 6h-7h
INSUFFISANT - Amélioration souhaitable :
Conséquences :
•	Limite basse acceptable
•	Récupération incomplète
•	Régulation hormonale sous-optimale
Conseils :
•	Objectif : 7-8h minimum
•	Ajouter 30-60 min
•	Appliquer hygiène sommeil
Plan : passer de 6h30 à 7h30-8h
•	Avancer coucher progressivement
•	Maintenir lever fixe
•	Sieste courte 20 min si besoin (avant 15h)
Ajustements légers menu :
•	Dîner 2-3h avant coucher
•	Collation soirée si nécessaire (légère)
•	Tisane apaisante 1h avant sommeil
📊 RÉPONSE : 8h-9h
OPTIMAL - À maintenir :
•	Durée idéale récupération
•	Régulation hormonale";

            case 'sedentarite':
                return "optimale
•	Favorise perte poids
Conseils :
•	Maintenir régularité
•	Qualité sommeil aussi importante que quantité
•	Hygiène sommeil continue
📊 RÉPONSE : Plus de 9h
ATTENTION - Investiguer :
Possibles causes :
•	Apnée du sommeil (voir question suivante)
•	Hypothyroïdie
•	Dépression
•	Mauvaise qualité sommeil (non réparateur)
•	Dette sommeil chronique compensation
Conseils :
•	Consulter médecin pour bilan
•	Évaluer qualité sommeil (réveils nocturnes ?)
•	Rechercher apnée sommeil
•	Bilan thyroïde, fer, vitamine D
Si apnée suspectée : voir question suivante
Menu :
•	Stimuler métabolisme : petit-déjeuner copieux
•	Caféine modérée matin (si pas contre-indication)
•	Activité physique régulière (améliore qualité sommeil)
😪 QUESTION 2 : Apnée du sommeil ?
✅ RÉPONSE : OUI
Impact majeur obésité/HTA :
Conséquences apnée :
•	Hypertension résistante (70% des apnéiques)
•	Fatigue chronique → sédentarité
•	Dérèglement hormonal → prise poids
•	Résistance insuline
•	Risque cardiovasculaire x3
Approche nutritionnelle spécifique :
Objectifs prioritaires :
1.	Perte poids (chaque 10% poids perdu = -50% sévérité apnée)
2.	Réduire inflammation
3.	Éviter congestion ORL
4.	Optimiser respiration
Conseils nutritionnels anti-apnée :
À ÉVITER absolument :
•	Alcool (relâche muscles pharynx) - ZÉRO
•	Dîner copieux tard (reflux aggrave)
•	Produits laitiers en excès (mucosités)
•	Aliments inflammatoires
•	Sodium excessif (rétention eau, œdème tissus)
À FAVORISER :
•	Régime anti-inflammatoire
•	Oméga-3 : poissons gras 4 fois/semaine
•	Antioxydants : fruits/légumes colorés abondants
•	Magnésium : détente musculaire
•	Dîner léger avant 19h
Menu spécifique apnée :
Petit-déjeuner (copieux) :
•	Option A : Bouillie complète + œufs + fruits + noix
•	Option B : Akassa enrichi + poisson + légumes + fruit
Déjeuner (normal) :
•	Selon niveau activité
•	Riche en protéines et légumes
•	Glucides modérés
Dîner (TRÈS léger, 18h30-19h max) :
•	Soupe légumes claire
•	Petit portion poisson grillé
•	Légumes vapeur
•	PAS de féculents
•	PAS de produits laitiers
•	Tisane digestive (gingembre)
Collations :
•	Fruits frais uniquement
•	Éviter yaourts/laitages soirée
•	Dernière collation 17h max
Suppléments à discuter avec médecin :
•	Vitamine D (si carence)
•	Magnésium
•	Oméga-3 (si poisson insuffisant)
Autres mesures essentielles :
•	Perte poids prioritaire : déficit 500 kcal/jour
•	Dormir sur côté (jamais sur dos)
•	Surélever tête lit 15-20cm
•	Traitement PPC (si prescrit) = ESSENTIEL
•	Éviter sédatifs/somnifères
Suivi médical :
•	Polysomnographie si non fait
•	Traitement PPC si indiqué
•	Suivi ORL
•	Contrôle poids régulier
❌ RÉPONSE : NON
Mais vigilance si :
•	Ronflement intense
•	Fatigue diurne inexpliquée
•	Somnolence
•	HTA résistante
•	Réveils avec sensation étouffement
•	Maux de tête matinaux
•	Obésité abdominale importante
Conseils préventifs :
•	Maintenir poids santé
•	Éviter alcool soir
•	Dîner léger
•	Dormir sur côté
•	Activité physique régulière
Si symptômes apparaissent : consulter pour dépistage
⚖️ QUESTION 3 : Régime de perte de poids récent ?
✅ RÉPONSE : OUI (avec quantité perdue)
📉 Perte : Moins de 5 kg
Analyse :
•	Début prometteur
•	Éviter effet yoyo
•	Stabilisation essentielle
•	Perte progressive OK
Conseils :
•	Rythme idéal : 0,5-1 kg/semaine
•	Total 5-10% poids initial en 6 mois
•	Exemple : 100kg → objectif 90-95kg en 6 mois
•	Ne pas accélérer brutalement
Plan consolidation :
•	Maintenir déficit calorique modéré (300-500 kcal/jour)
•	Focus qualité alimentation vs quantité
•	Activité physique progresser
•	Suivi régulier motivation
Menu :
•	Continuer selon niveau activité tableau
•	Portions contrôlées mais sans privation
•	Variété maximale (éviter lassitude)
•	1 repas \"plaisir\" modéré/semaine (maintien social)
📉 Perte : 5-10 kg
Analyse :
•	Excellent résultat !
•	Phase critique : éviter reprise
•	Adaptation métabolique en cours
•	Vigilance maintien
Conseils :
•	Transition vers stabilisation
•	Déficit calorique très modéré (200-300 kcal/jour)
•	Renforcement musculaire (préserve métabolisme)
•	Surveillance poids hebdomadaire
Plan stabilisation progressive :
Mois 1-2 post-perte :
•	Maintenir structure alimentaire stricte
•	Augmenter légèrement calories (+100-150 kcal/jour)
•	Exemple : ajouter 1 collation, légèrement plus féculents
Mois 3-4 :
•	Calories maintenance (ni perte ni gain)
•	Équilibre selon tableau niveau activité
•	Flexibilité 2 repas/semaine
Mois 5-6 :
•	Nouveau \"normal\" établi
•	Surveillance continue
•	Ajustements si tendance reprise
Menu stabilisation :
•	Portions 10-15% supérieures phase perte
•	Maintenir qualité nutritionnelle
•	Réintroduire progressivement flexibilité
•	Exemple : passer de riz 150g → 170g, ajouter fruit supplémentaire
📉 Perte : Plus de 10 kg
Analyse :
•	Résultat remarquable !
•	Risque effet yoyo MAXIMUM
•	Métabolisme adapté (ralenti)
•	Stabilisation = PRIORITÉ ABSOLUE
Conseils ESSENTIELS :
•	Ne JAMAIS reprendre ancien régime alimentaire
•	Nouveau mode vie PERMANENT
•	Renforcement musculaire obligatoire
•	Suivi nutritionnel professionnel recommandé
Stratégie stabilisation long terme :
Phase 1 (3 premiers mois) :
•	Augmentation calories très progressive (+50-100 kcal/semaine)
•	Structure alimentaire stricte maintenue
•	Pesée 2 fois/semaine (alerte reprise)
•	Journal alimentaire
Phase 2 (mois 4-6) :
•	Atteindre calories maintenance
•	Flexibilité contrôlée 20% repas
•	Activité physique intensifiée
•	Surveillance mensuelle
Phase 3 (mois 7-12) :
•	Nouveau \"normal\" consolidé
•	Vigilance continue sans obsession
•	Ajustements rapides si +2kg
•	Soutien psychologique si besoin
Menu post-perte importante :
•	Protéines élevées maintenues (préserve muscle)
•	Glucides réintroduits progressivement
•	Lipides qualité (oméga-3, avocats, noix)
•	Fibres abondantes (satiété)
•	Portions mesurées mais suffisantes
Exemple transition calories :
•	Phase perte : 1500 kcal
•	Semaine 1-2 stabilisation : 1600 kcal
•	Semaine 3-4 : 1700 kcal
•	Semaine 5-6 : 1800 kcal
•	Maintenance (selon activité) : 1900-2200 kcal
Alertes reprise poids :
•	+2kg en 1 mois : réduire immédiatement 200 kcal
•	Vêtements serrés : ne pas attendre balance
•	Relâchement habitudes : recadrage rapide

Considérations psychologiques post-perte :
•	Fierté légitime mais vigilance
•	Nouvelle image corporelle à intégrer
•	Risques troubles alimentaires (restriction excessive)
•	Accepter \"nouveau poids\" même si pas \"idéal\"
•	Soutien social important
❌ RÉPONSE : NON
Première démarche perte poids :
Avantages :
•	Pas d'historique yoyo (métabolisme non endommagé)
•	Motivation initiale forte
•	Résultats rapides initiaux possibles
Conseils démarrage :
•	Objectifs réalistes : 5-10% poids initial en 6 mois
•	Exemple : 100kg → 90-95kg = EXCELLENT
•	Perte 0,5-1 kg/semaine = idéal
•	Approche durable vs régime temporaire
Plan démarrage (12 premières semaines) :
Semaines 1-4 : Adaptation
•	Découverte nouveaux repas
•	Structure 3 repas + 2 collations
•	Portions mesurées (peser aliments)
•	Journal alimentaire quotidien
•	Pesée hebdomadaire (même jour, même heure)
Semaines 5-8 : Progression
•	Habitudes installées
•	Introduction activité physique progressive
•	Ajustements selon résultats
•	Gestion situations sociales
Semaines 9-12 : Consolidation
•	Autonomie croissante
•	Résultats visibles (vêtements, énergie)
•	Renforcement motivation
•	Planification long terme
Menu démarrage :
•	Suivre strictement menus niveau activité
•	Portions précises (balance alimentaire utile)
•	Variété pour éviter lassitude
•	Préparation repas à l'avance (meal prep dimanche)
Exemple organisation hebdomadaire :
•	Dimanche : courses + préparation bases (riz complet cuit, légumes lavés/coupés, protéines marinées)
•	Chaque soir : préparation déjeuner lendemain
•	Collations pré-portionnées dans sachets
Soutien recommandé :
•	Suivi nutritionniste si possible
•	Groupe soutien ou partenaire perte poids
•	Application suivi (MyFitnessPal, Yazio, etc.)
•	Photos avant/pendant/après (motivation)
•	Mesures corporelles mensuelles (pas que balance)
PARTIE 5 : ACTIVITÉ PHYSIQUE
🏃 QUESTION : Jours d'activité physique par semaine
📊 RÉPONSE : Aucun (sédentaire)
SITUATION CRITIQUE - Priorité absolue :
Risques sédentarité :
•	Aggravation obésité
•	HTA non contrôlée
•	Résistance insuline
•	Sarcopénie (perte musculaire)
•	Risque cardiovasculaire x2
•	Mortalité prématurée augmentée
Programme démarrage progressif (12 semaines) :
🎯 Objectif final : 150 min/semaine activité modérée
PHASE 1 : Semaines 1-2 (Initiation)
•	3 jours/semaine
•	10 minutes/séance
•	Intensité très légère
•	Activités : marche tranquille quartier, étirements doux
•	Total : 30 min/semaine
Exemple concret béninois :
•	Lundi : Marche 10 min matin (aller marché à pied)
•	Mercredi : Marche 10 min soir (tour du quartier)
•	Samedi : Marche 10 min + étirements 5 min
PHASE 2 : Semaines 3-4 (Progression)
•	4 jours/semaine
•	15 minutes/séance
•	Intensité légère (peut parler facilement)
•	Total : 60 min/semaine
Activités béninoises :
•	Marche active
•	Balayage énergique maison/cour
•	Jardinage léger
•	Jeux avec enfants
PHASE 3 : Semaines 5-6 (Accélération)
•	5 jours/semaine
•	20 minutes/séance
•	Intensité modérée (peut parler mais essoufflé)
•	Total : 100 min/semaine
Activités variées :
•	Marche rapide
•	Danse (coupé-décalé, zouglou)
•	Vélo tranquille
•	Nettoyage actif maison
PHASE 4 : Semaines 7-12 (Objectif)
•	5 jours/semaine
•	30 minutes/séance
•	Intensité modérée
•	Total : 150 min/semaine = OBJECTIF SANTÉ
Programme type semaine (objectif atteint) :
Lundi : 30 min marche rapide matin (6h-6h30) Mardi : 30 min danse ou activité maison Mercredi : 30 min marche rapide Jeudi : REPOS Vendredi : 30 min activité variée (vélo, natation si accès) Samedi : 30 min marche + activités ménagères énergiques Dimanche : REPOS ou activité légère familiale
Ajustements alimentaires selon progression :
Semaines 1-4 (activité minimale) :
•	Menu SÉDENTAIRE du tableau
•	Protéines 29% / Glucides 41% / Lipides 30%
Semaines 5-8 (60-100 min/semaine) :
•	Transition vers LÉGÈREMENT ACTIF
•	Augmenter légèrement glucides
•	Collation post-exercice (fruit + noix)
Semaines 9-12 (150 min/semaine) :
•	Menu LÉGÈREMENT ACTIF ou MODÉRÉMENT ACTIF
•	Protéines 29% / Glucides 44% / Lipides 27%
•	Collations stratégiques pré/post effort
Nutrition sportive débutant :
•	Avant exercice (30-60 min) : Petit fruit (banane, orange) + eau
•	Pendant (si >45 min) : Eau uniquement
•	Après (dans l'heure) : Protéines + glucides (yaourt + fruit, œuf + pain complet, akassa + arachides)
Conseils pratiques démarrage :
Équipement minimal :
•	Baskets confortables (ESSENTIEL)
•	Vêtements légers, amples
•	Bouteille d'eau réutilisable
•	Casquette si soleil
Horaires optimaux Bénin :
•	Matin : 5h30-7h (avant chaleur)
•	Soir : 17h30-19h (après chaleur)
•	Éviter 11h-16h (trop chaud)
Lieux activités gratuites Cotonou/Bénin :
•	Boulevard de la Marina (marche, jogging)
•	Plages (marche dans sable)
•	Stades municipaux (certains ouverts)
•	Quartiers résidentiels
•	Parcs publics
Motivation et adhésion :
•	Partenaire d'exercice (ami, voisin, famille)
•	Groupe marche quartier
•	Musique motivante (afrobeat, coupé-décalé)
•	Objectifs courts terme (1 semaine à la fois)
•	Récompenses non-alimentaires (nouveau pagne, soin beauté)
Surveillance sécurité (HTA + obésité) :
•	Tension artérielle avant exercice si symptômes
•	Arrêt immédiat si : douleur thoracique, vertige intense, essoufflement extrême
•	Hydratation : 500ml eau avant, 250ml toutes les 15-20 min pendant
•	Progression très graduelle (pas de rush)
•	Consultation médicale avant intensification
📊 RÉPONSE : 1-3 jours/semaine
INSUFFISANT mais positif :
Situation :
•	Premier pas fait (félicitations !)
•	Bénéfices santé limités
•	Risque abandon élevé (irrégularité)
Objectif : passer à 5 jours/semaine minimum
Programme progression (8 semaines) :
Semaines 1-2 : Maintien + 1 jour
•	Passer de 3 → 4 jours/semaine
•	Même durée/intensité
•	Installer régularité
Semaines 3-4 : +1 jour supplémentaire
•	Passer à 5 jours/semaine
•	Augmenter durée 5 min/séance
Semaines 5-8 : Consolidation
•	Maintenir 5 jours/semaine
•	Atteindre 30 min/séance
•	Varier activités (éviter ennui)
Menu alimentaire :
•	Si 1-2 jours/semaine : SÉDENTAIRE
•	Si 3 jours/semaine : entre SÉDENTAIRE et LÉGÈREMENT ACTIF
•	Ajuster selon intensité et durée réelles
Exemple transition nutrition :
•	Actuellement : Protéines 29% / Glucides 41-42% / Lipides 30%
•	Objectif (5 jours) : Protéines 29% / Glucides 44% / Lipides 27%
📊 RÉPONSE : 4-6 jours/semaine
BON niveau - Optimisation possible :
Situation :
•	Activité régulière établie
•	Bénéfices santé significatifs
•	Habitude installée
Optimisation :
•	Si 4 jours : passer à 5-6 jours
•	Si 5-6 jours : maintenir + intensifier ou varier
•	Ajouter renforcement musculaire 2 fois/semaine
Programme optimal semaine type :
Lundi : 30-45 min cardio (marche rapide, course légère, vélo) Mardi : 30 min renforcement musculaire (poids corps, bandes élastiques) Mercredi : 30-45 min cardio Jeudi : 30 min renforcement musculaire Vendredi : 30-45 min cardio Samedi : Activité plus longue ou intense (60 min marche, randonnée, sport collectif) Dimanche : Repos actif (étirements, yoga, marche légère familiale) ou repos complet
Menu alimentaire :
•	Si 4 jours modérés : LÉGÈREMENT ACTIF
•	Si 5-6 jours modérés : MODÉRÉMENT ACTIF
•	Si intensité élevée : TRÈS ACTIF
Ajustements selon intensité :
•	Activité modérée 5 jours : Protéines 25% / Glucides 45% / Lipides 30%
•	Activité intense ou longue durée : augmenter glucides
Nutrition sportive intermédiaire :
•	Collation pré-effort systématique
•	Hydratation optimale
•	Récupération protéinée post-effort
•	Timing nutriments important
📊 RÉPONSE : 7 jours/semaine
ATTENTION - Risque sur-entraînement :
Analyse :
•	Excellent engagement !
•	MAIS risque fatigue, blessures
•	Récupération insuffisante possible
•	Épuisement à terme
Conseils essentiels :
•	Repos = PARTIE de l'entraînement
•	Minimum 1-2 jours repos/semaine
•	Alterner intensités
•	Écouter corps (douleurs, fatigue)
Programme équilibré 7 jours :
Lundi : Cardio intense 45 min Mardi : Renforcement musculaire 40 min Mercredi : Cardio modéré 30 min Jeudi : Repos actif (yoga, stretching 20 min) Vendredi : Cardio intense 45 min Samedi : Activité longue modérée 60-90 min Dimanche : Repos complet ou étirements légers
Signaux sur-entraînement :
•	Fatigue chronique malgré sommeil
•	Performances en baisse
•	Blessures à répétition
•	Irritabilité
•	Sommeil perturbé
•	Fréquence cardiaque repos élevée
Si présents : réduire immédiatement à 5 jours avec 2 jours repos complets
Menu alimentaire :
•	TRÈS ACTIF ou EXTRÊMEMENT ACTIF
•	Protéines 25% / Glucides 48-50% / Lipides 25-27%
•	Calories suffisantes (éviter déficit excessif)
•	Récupération nutritionnelle optimale
Récupération nutrition :
•	Post-effort (dans 30 min) : protéines + glucides
•	Exemple : smoothie banane-arachide-lait, atassi + poulet, akassa + œufs
•	Sommeil 8-9h obligatoire
•	Hydratation 3L+/jour
•	Antioxydants (fruits/légumes abondants)
🪑 QUESTION 2 : Temps en position assise par jour
📊 RÉPONSE : Plus de 8h
TRÈS PRÉOCCUPANT - \"Nouveau tabac\" :
Risques position assise prolongée :
•	Annule bénéfices exercice si >8h assis
•	Risque cardiovasculaire +147%
•	Diabète type 2 +91%
•	Mortalité prématurée +40%
•	Compression abdominale (aggrave HTA, digestion)
•	Stagnation circulation (varices, thrombose)
Stratégies réduction impératives :
Au travail (bureau/commerce) :
•	Pause debout 5 min toutes les heures (alarme téléphone)
•	Réunions/appels en marchant si possible
•	Bureau debout improvisé (cartons, livres pour surélever ordinateur)
•	Aller voir collègue plutôt qu'appeler
•	Déjeuner : marche 10 min après repas
•	Escaliers vs ascenseur
•	Parking plus loin (si véhicule)
À la maison :
•	Regarder TV : se lever publicités/entre épisodes
•	Téléphone : marcher en parlant
•	Tâches ménagères : fractionner (éviter tout faire assis puis rester)
•	Repas : marche digestive 10 min après
•	Loisirs actifs vs passifs (jardiner vs TV)
Objectif : réduire 8h → 6h max sur 8 semaines
Semaines 1-2 : -30 min/jour (pauses debout systématiques) Semaines 3-4 : -1h/jour (ajouter marches courtes) Semaines 5-8 : -2h/jour (lifestyle plus actif global)
Exercices compensatoires assis :
Au bureau (discrets) :
•	Contractions abdominales assis (10 sec × 10 répétitions/heure)
•	Rotations chevilles (30 sec chaque/heure)
•	Étirements nuque et épaules
•	Lever jambes sous bureau (renforcement cuisses)
•	Posture correcte (dos droit, pieds à plat)
Idéal : mini-routine toutes les heures (3-5 min)
1.	Se lever, marcher sur place
2.	10 squats ou montées genoux
3.	Étirements bras/dos/jambes
4.	Reprendre assis
Ajustements alimentaires position assise :
Problème : métabolisme ralenti assis
•	Digestion lente
•	Glycémie moins bien régulée
•	Brûlage calories réduit
Adaptations menu :
•	Portions légèrement réduites vs niveau activité théorique
•	Fractionner davantage (5-6 petits repas vs 3 gros)
•	Éviter glucides simples (pics glycémiques amplifiés)
•	Favoriser fibres (transit)
•	Hydratation accrue (3L/jour, favorise pauses toilettes = mouvement !)
Timing repas optimisé :
•	Petit-déjeuner copieux (métabolisme plus actif matin)
•	Déjeuner modéré + marche digestive
•	Dîner léger (soir = pic inactivité)
•	Collations = prétextes bouger (aller chercher fruit cuisine)
📊 RÉPONSE : 6-8h
PRÉOCCUPANT - Action nécessaire :
Situation :
•	Encore trop élevé
•	Risques présents mais moindres
•	Amélioration possible
Objectif : réduire vers 4-6h
Stratégies similaires >8h mais moins urgence
•	Pauses debout 5 min/heure
•	Activité physique compense partiellement
•	Lifestyle plus actif globalement
Menu :
•	Selon niveau activité physique
•	Si activité régulière, compense partiellement
•	Fractionner repas aide
📊 RÉPONSE : 4-6h
ACCEPTABLE - Maintenir :
Situation :
•	Niveau raisonnable
•	Activité quotidienne présente
•	Équilibre OK
Conseils :
•	Maintenir lifestyle actif
•	Pauses régulières même si moins assis
•	Éviter régression
📊 RÉPONSE : Moins de 4h
EXCELLENT - Rare et idéal :
Situation :
•	Métier actif (commerce, artisanat, agriculture)
•	Lifestyle très dynamique
•	Optimal santé métabolique
Conseils :
•	Maintenir absolument
•	Valoriser cet atout
•	Compléter par exercice structuré si absent
Menu :
•	Calories suffisantes (éviter sous-nutrition)
•	Récupération nutrition importante
🎯 QUESTION 3 : Activités physiques appréciées
🚶 RÉPONSE : Marche
EXCELLENT choix obésité + HTA :
Avantages marche :
•	Impact faible articulations (protège genoux vs course)
•	Accessible partout, gratuit
•	Intensité modulable
•	Sociale (groupe, famille)
•	Sécuritaire pour HTA (pas de pics tensionnels brutaux)
Programme marche structuré :
Débutant (semaines 1-4) :
•	3-4 fois/semaine
•	20-30 min/séance
•	Vitesse confortable (3-4 km/h)
•	Terrain plat
Intermédiaire (semaines 5-12) :
•	5 fois/semaine
•	30-45 min/séance
•	Vitesse modérée (4-5 km/h)
•	Introduction légères pentes
Avancé (3+ mois) :
•	5-6 fois/semaine
•	45-60 min/séance
•	Vitesse soutenue (5-6 km/h)
•	Terrain varié, intervals (alterner rapide/lent)
Parcours marche :
•	Boulevard Marina : plat, ombragé, sécurisé
•	Plages : résistance sable, pieds nus bénéfique
•	Quartiers résidentiels : boucles variées
•	Marché (hors achats) : marche active
Progression motivation :
•	Application compteur pas (10 000 pas/jour objectif)
•	Groupe marche matinale quartier
•	Défis personnels (augmenter distance chaque semaine)
•	Musique/podcasts
Menu adapté marche régulière :
•	LÉGÈREMENT à MODÉRÉMENT ACTIF selon intensité
•	Collation pré-marche : fruit
•	Post-marche : hydratation, si >45 min : collation récupération
🧘 RÉPONSE : Yoga
EXCELLENT complément, mais insuffisant seul :
Avantages yoga :
•	Souplesse, équilibre
•	Gestion stress (bénéfique HTA)
•	Conscience corporelle
•	Renforcement musculaire doux
•	Respiration (bénéfique si apnée)
Limites yoga pour perte poids :
•	Dépense calorique faible (100-200 kcal/h vs 300-500 marche)
•	Peu d'effet cardio-vasculaire
•	Progression limitée intensité
Programme combiné optimal :
3-4 jours/semaine : Cardio (marche, danse, vélo) 30-45 min 2-3 jours/semaine : Yoga 30-60 min Total : 5-6 jours activité variée
Types yoga adaptés obésité :
•	Hatha yoga : doux, accessible
•	Yin yoga : étirements profonds, relaxation
•	Yoga chaise : adapté mobilité réduite
•	ÉVITER initialement : Ashtanga, Vinyasa (trop intenses)
Yoga à domicile gratuit :
•	YouTube : chaînes francophones (Yoga avec Adriene sous-titres FR, etc.)
•	Applications : Down Dog, Daily Yoga
•	20-30 min matin ou soir
Menu :
•	Si yoga seul : SÉDENTAIRE à LÉGÈREMENT ACTIF
•	Si yoga + cardio : MODÉRÉMENT ACTIF
•	Yoga pré-petit-déjeuner (jeun) ou 2h après repas
🏊 RÉPONSE : Natation (si accès piscine/mer)
IDÉAL obésité + HTA :
Avantages natation :
•	ZÉRO impact articulations (porté par eau)
•	Corps entier sollicité
•	Résistance eau = renforcement
•	Effet refroidissant (climat béninois)
•	Tension artérielle améliorée (pression hydrostatique)
Programme natation :
Débutant (ne sait pas nager) :
•	Aquagym/marche dans eau (bassin peu profond)
•	Cours natation adulte
•	Frites/planches flottaison
•	2-3 fois/semaine, 20-30 min
Intermédiaire (nage basique) :
•	Nage continue 20-30 min
•	Brasse (plus facile respiration)
•	2-3 fois/semaine
•	Alterner nage/récupération
Avancé :
•	30-45 min nage continue
•	Varier nages (brasse, crawl, dos)
•	3-4 fois/semaine
•	Intervals (rapide/lent)
Accès natation Bénin :
•	Piscines hôtels (payant, 2000-5000 FCFA/séance souvent)
•	Plage (attention courants, sécurité)
•	Clubs sportifs privés
Combinaison terre + eau :
•	2-3 jours natation
•	2-3 jours activités terrestres (marche, renforcement)
•	1 jour repos
Menu :
•	Natation = faim accrue (attention portions)
•	Hydratation cruciale (on ne sent pas transpiration dans eau)
•	Collation post-natation rapide (fruit + protéine)
⚽🏀 RÉPONSE : Sports collectifs
EXCELLENT motivation sociale mais adaptation nécessaire :
Avantages :
•	Ludique, social
•	Motivation groupe
•	Variété mouvements
•	Engagement régulier (équipe compte sur vous)
Précautions obésité + HTA :
•	Intensité souvent élevée brutalement
•	Impacts articulations (football)
•	Risque blessures
•	Pics tensionnels
Sports collectifs adaptés :
RECOMMANDÉS (impact modéré) :
•	Volley-ball (version loisir, éviter compétition intense)
•	Basketball (version loisir)
•	Handball (loisir)
À ÉVITER initialement :
•	Football (impacts, intensité)
•	Rugby
•	Sports combat
Programme progressif :
Phase 1 (mois 1-2) : Préparation
•	Conditionnement physique général (marche, renforcement)
•	Pas encore sport collectif
•	Construire base fitness
Phase 2 (mois 3-4) : Introduction
•	1 séance/semaine sport collectif loisir (intensité modérée)
•	3-4 autres jours : activités individuelles
•	Échauffement prolongé (15 min minimum)
Phase 3 (mois 5+) : Régularité
•	2 séances/semaine sport collectif
•	2-3 jours autres activités
•	Écoute corps (arrêt si douleur)
Menu :
•	MODÉRÉMENT à TRÈS ACTIF
•	Nutrition match : glucides 2-3h avant, hydratation, récupération protéinée après
•	Jours entraînement : calories augmentées


🏡 RÉPONSE : Activités ménagères/jardinage
BON complément mais insuffisant seul :
Avantages :
•	Intégrées quotidien
•	Utiles fonctionnellement
•	Gratuites
•	Flexibles horaires
Limites :
•	Intensité variable, souvent faible
•	Pas de progression structurée
•	Interruptions fréquentes
Optimisation activités ménagères :
Ménage actif (calories brûlées) :
•	Balayage énergique : 150 kcal/h
•	Lavage sol à genoux : 200 kcal/h
•	Lessive main : 180 kcal/h
•	Repassage debout : 120 kcal/h
•	Jardinage actif : 250-350 kcal/h
Techniques intensification :
•	Mouvements amples, rythme soutenu
•	Musique rythmée
•	Contractions abdominales pendant tâches
•	Squats en ramassant objets
•	Fentes en passant serpillière
Pr";

            case 'fc_connaissance':
                return "ogramme combiné :
•	Activités ménagères quotidiennes (1-2h) : base
•	+ 3-5 séances exercice structuré/semaine : ESSENTIEL
•	Considérer ménage comme \"bonus\" pas activité principale
Menu :
•	Ménage seul : SÉDENTAIRE à LÉGÈREMENT ACTIF
•	Ménage + exercice structuré : selon exercice ajouté

💃 RÉPONSE : Danse
EXCELLENT pour motivation et culture :
Avantages danse :
•	Ludique, pas perçu comme \"exercice\"
•	Culture béninoise riche (coupé-décalé, zouglou, afrobeat, danse traditionnelle)
•	Social
•	Cardio + coordination
•	Expression émotionnelle (gestion stress)
Types danse adaptés :
Danse moderne (Afrobeat, Coupé-Décalé) :
•	Intensité modérée à élevée
•	30-45 min = excellent cardio
•	Chez soi ou cours collectifs
Danse traditionnelle béninoise :
•	Mouvements culturels
•	Rythmes variés
•	Cours associations culturelles
Zumba (si accès cours) :
•	Mix danses latines/africaines
•	Structuré fitness
•	Très populaire, motivant
Programme danse fitness :
À domicile :
•	YouTube : \"Afrobeat workout\", \"African dance fitness\"
•	Playlist personnelle motivante
•	20-30 min/jour, 4-5 fois/semaine
Cours collectifs (si accès) :
•	2-3 fois/semaine, 45-60 min
•	Socialisation
•	Professeur guide progression
Combinaison :
•	3 jours danse (cardio)
•	2 jours renforcement/étirements
•	Variété prévient lassitude
Menu :
•	LÉGÈREMENT à MODÉRÉMENT ACTIF selon intensité
•	Danse intense (45 min+, transpiration abondante) : TRÈS ACTIF
•	Hydratation cruciale (chaleur + effort)
•	Collation légère avant si estomac vide
🚴 RÉPONSE : Vélo
EXCELLENT si accès, infrastructures :
Avantages vélo :
•	Impact faible articulations
•	Déplacements utiles (transport actif)
•	Intensité modulable
•	Renforcement jambes
Vélo Bénin - Réalité :
•	Infrastructures limitées (peu pistes cyclables)
•	Trafic intense Cotonou
•	Chaleur
•	Sécurité routière
Solutions adaptées :
Vélo utilitaire :
•	Trajets courts quartier (courses proximité)
•	Heures creuses (éviter rush)
•	Équipement sécurité (casque même si rare localement)
Vélo loisir :
•	Zones moins circulées (quartiers résidentiels week-end matin)
•	Pistes aménagées (si disponibles)
•	Groupes cyclistes organisés
Programme vélo :
Débutant :
•	2-3 fois/semaine
•	20-30 min
•	Terrain plat
•	Vitesse tranquille
Intermédiaire :
•	3-4 fois/semaine
•	30-45 min
•	Introduction côtes légères
•	Vitesse modérée
Avancé :
•	4-5 fois/semaine
•	45-60 min
•	Terrain varié
•	Intervals intensité
Menu :
•	Vélo >1h : nutrition sportive (boisson, collation)
NB : Si user choisit autre activité physique qu’il préfère hormis marche et yoga, tu lui balance les autres activités se trouvant en haut pour mla question précédentes
❤️ QUESTION 4 : Fréquence cardiaque repos connue ?
✅ RÉPONSE : OUI (avec valeur fournie)
UTILISATION POUR ENTRAÎNEMENT :
o	Calcul de votre fréquence cardiaque maximale FC max : 
Pour effectuer ce calcul, nous allons utiliser la formule de Tanaka qui est FCmax = 208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm] dont l’unité est le bpm (battement par minute).
•	Pour effectuer ce calcul, nous allons utiliser la formule de Tanaka qui est FCmax = 208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm] dont l’unité est le bpm (battement par minute). Ensuite pour vous aller suivre votre zone cible en fonction de votre niveau d’activité pour suivre des recommandations suivantes qui se résume dans le tableau suivant : 




Niveau d’activité	% FCmax (zone cible)	Zone d’effort	Activités physiques adaptées	Recommandations nutritionnelles
Sédentaire (débutant)	50 – 60 %	Zone santé (échauffement, mise en route douce)	Marche lente, vélo d’appartement à faible résistance, aquagym douce	Réduction du sel (< 5 g/j), hydratation régulière, augmentation des fibres (fruits, légumes, légumineuses), limiter graisses saturées
Légèrement actif	60 – 65 %	Zone de confort aérobie	Marche rapide, vélo léger, natation tranquille, danse douce	Portions contrôlées, privilégier les céréales complètes, limiter sucres rapides, augmenter apport en potassium (banane, légumineuses, patate douce) pour tension artérielle
Modérément actif	65 – 70 %	Zone cardio (endurance)	Marche nordique, vélo modéré, aquagym dynamique, tapis roulant	Éviter plats préparés/salés, consommer protéines maigres (poisson, volaille sans peau), laitages allégés, surveiller l’apport calorique
Très actif	70 – 75 %	Zone contrôle du poids (brûlage des graisses + amélioration cardio)	Vélo elliptique, natation soutenue, circuit training adapté, danse énergique	Fractionner les repas, augmenter légumes + fruits frais, réduire caféine/alcool, consommer acides gras insaturés (huile d’olive, noix, avocat)
Extrêmement actif (avancé, sous suivi médical obligatoire)	75 – 80 %	Zone haute intensité (prudence avec hypertension)	HIIT doux supervisé, cardio mixte en salle, natation intense, step modéré	Surveillance médicale obligatoire, alimentation DASH (faible sel, riche en fibres, potassium, calcium, magnésium), éviter excitants, privilégier cuisson vapeur/grillade
 
Points importants pour une personne obèse hypertendue :
•	Toujours commencer par une activité faible à modérée (50-65 % FCmax) et progresser doucement vers votre niveau d’activité 
•	Échauffement et récupération obligatoires (10 min avant/après).
•	Consultation médicale avant d’atteindre les zones > 70 % de la FCmax pour ceux qui sont très actif et extrêmement actif.
L’alimentation devrait s’inspirer du régime DASH (Dietary Approaches to Stop Hypertension), dont les principes sont les suivants :
•	Réduction du sodium : limiter le sel à environ 1 500–2 300 mg par jour.			
•	Favorisation des aliments riches en potassium, calcium, magnésium et fibres, car ils aident à réguler la tension artérielle.
•	Limitation des graisses saturées et du sucre ajouté.
•	Privilégier les protéines maigres, telles que les poissons, les volailles et les légumineuses.

•	Intensité : Adaptation alimentaire pour moduler la stratégie alimentaire avant/après effort : 
La FC pendant l’effort indique ton intensité réelle :
•	Faible intensité : privilégier une alimentation équilibrée (lipides de qualité, fibres, protéines maigres).
•	Intensité modérée à élevée : augmenter les glucides avant et après (riz, pâtes, patates douces, fruits).
•	Très haute intensité / HIIT : accent sur les glucides rapides (banane, dattes) avant, protéines + glucides complexes après.

•	Récupération via la FC: Indicateur qui aide à ajuster protéines, minéraux et repos : 
Ta fréquence cardiaque au repos (FCR) et la variabilité de la fréquence cardiaque (HRV) sont des indicateurs clés :
•	FCR normale : 60–70 bpm (si > 10 bpm plus haut que d’habitude → signe de fatigue).
•	Retour à la normale après effort : si ta FC redescend rapidement, ta récupération est bonne.
•	HRV élevée : meilleure récupération et équilibre du système nerveux.
👉 En pratique :
•	Si FC repos ↑ plusieurs jours → privilégier une alimentation anti-inflammatoire (fruits, légumes, oméga-3, hydratation).
•	Si récupération lente → augmenter les protéines (réparation musculaire) + électrolytes (Na, K, Mg).
Interprétation selon valeur :
FC repos >90 bpm (battements par minute) - ÉLEVÉE :
Signification :
•	Conditionnement cardiovasculaire faible
•	Possible lié à : obésité, déconditionnement, HTA, stress, manque sommeil
•	Marqueur risque cardiovasculaire
•	Récupération moins bonne
Objectif : réduire vers 60-80 bpm
Actions :
1.	Activité physique régulière (effet après 8-12 semaines)
2.	Perte poids (chaque 10kg perdus = -5 à -10 bpm)
3.	Gestion stress (méditation, respiration, yoga)
4.	Sommeil qualité (7-8h min";

            case 'stress_ennui':
                return "imum)
5.	Hydratation optimale
6.	Nutrition anti-inflammatoire (oméga-3, antioxydants)
Surveillance :
•	Mesurer FC repos chaque matin (avant lever, encore allongé)
•	Noter évolution (devrait diminuer progressivement)
•	Si reste >90 après 3 mois malgré efforts : consultation cardiologique
Exercice adapté FC élevée :
•	Intensité faible-modérée initialement
•	Pas de pics brutaux
•	Progression très graduelle
•	FC cible effort : 60-70% FC max (débutant)
•	Exemple 50 ans : FC max = 170, cible effort = 100-120 bpm
Menu :
•	Magnésium augmenté (régulation rythme cardiaque) : banane plantain, amandes, épinards, haricots
•	Oméga-3 : poissons gras 3-4 fois/semaine
•	Antioxydants : fruits/légumes colorés abondants
•	Limiter caféine/excitants si FC>95
FC repos 80-90 bpm - LÉGÈREMENT ÉLEVÉE 
Signification :
•	Conditionnement moyen
•	Marge amélioration
Objectif : réduire vers 60-75 bpm
Actions : similaires mais moins urgent
•	Activité régulière progresser
•	Perte poids continuer
•	Surveillance mensuelle


FC repos 60-79 bpm - NORMALE :
Signification :
•	Bonne santé cardiovasculaire
•	Conditionnement acceptable à bon
Objectif : maintenir ou améliorer légèrement
Conseils :
•	Continuer activité régulière
•	Surveillance trimestrielle
•	Objectif athlètes : 50-60 bpm (avec entraînement régulier long terme)
FC repos <60 bpm - EXCELLENTE (ou bradycardie) :
Interprétation :
•	Si sportif régulier : EXCELLENT signe (cœur efficace)
•	Si sédentaire + symptômes (fatigue, vertiges) : possible bradycardie pathologique → consultation
Si sportif :
•	Signe excellent conditionnement
•	Continuer
•	Performance optimale
Si sédentaire <50 bpm :
•	Consulter cardiologue (éliminer troubles conduction)
•	Possible médication (bêta-bloquants peuvent ralentir excessivement)

❌ RÉPONSE : NON
Recommandation : apprendre à mesurer
Méthodes mesure FC repos :
Manuelle (gratuit) :
1.	Au réveil, encore allongé, calme
2.	Trouver pouls : poignet (côté pouce) ou cou (côté trachée)
3.	Compter battements pendant 60 secondes (ou 30 sec × 2)
4.	Noter valeur
5.	Répéter 3 jours consécutifs, faire moyenne
Automatique (si accès) :
•	Tensiomètre automatique (donne aussi FC)
•	Montre connectée/bracelet fitness (à partir 15 000 FCFA)
•	Smartphone : applications avec capteur caméra (précision variable)
Fréquence mesure recommandée :
•	Quotidien : 1er mois (établir baseline)
•	Hebdomadaire : ensuite (suivre progression)
•	Augmentation soudaine +10 bpm : possible sur-entraînement, maladie, stress
Utilité connaissance FC :
•	Témoin condition physique
•	Guide intensité exercice
•	Alerte santé
•	Motivation (voir amélioration chiffrée)
Zones FC exercice (% FC max) :
•	FC max = 220 - âge (formule approximative)
•	Exemple 40 ans : FC max = 180 bpm
Zones entraînement :
1.	Échauffement : 50-60% FC max (90-108 bpm ex. 40 ans)
2.	Perte poids : 60-70% (108-126 bpm) - zone optimale brûlage graisses
3.	Cardio modéré : 70-80% (126-144 bpm)
4.	Cardio intense : 80-90% (144-162 bpm) - athlètes
5.	Maximum : 90-100% (162-180 bpm) - brefs intervals seulement
Pour obésité + HTA : privilégier zones 1-3 (50-80% FC max)

PARTIE 6 : COMPORTEMENTS ALIMENTAIRES
😰 QUESTION : Manger par stress ou ennui ?
✅ RÉPONSE : OUI
TRÈS FRÉQUENT - Alimentation émotionnelle :
Mécanisme :
•	Stress → cortisol élevé → fringales sucre/gras
•	Nourriture = réconfort, récompense, distraction
•	Soulagement temporaire → cycle répétitif
•	Déconnexion signaux faim/satiété réels
Identifier déclencheurs :
Journal émotions-alimentation (2 semaines) : Chaque \"écart\", noter :
•	Heure
•	Aliment consommé
•	Quantité
•	Émotion ressentie AVANT (stress, ennui, tristesse, colère, solitude)
•	Faim physique réelle ? (échelle 1-10)
•	Situation/contexte
Exemple :
•	16h / Paquet biscuits / Pas faim (2/10) / Stress travail / Bureau seul
•	21h / Aloko entier / Peu faim (4/10) / Ennui TV / Soirée seule
Patterns identifiés → stratégies ciblées
Stratégies alternatives au stress :
Gestion stress non-alimentaire :
Immédiat (urgence) :
1.	Respiration : 5 cycles respiration profonde (4 sec inspire, 7 sec retient, 8 sec expire)
2.	Mouvement : 10 squats, tour du bloc, étirements
3.	Eau : grand verre eau lentement
4.	Distraction : appel ami, musique, sortir 5 min
5.	Délai : \"attendre 10 minutes\" (souvent envie passe)
Court terme :
•	Marche 15-20 min
•	Yoga/stretching
•	Douche/bain
•	Activité manuelle (couture, dessin, jardinage)
•	Écriture journal
Long terme :
•	Exercice régulier (réduit stress chronique)
•	Méditation/pleine conscience quotidienne (10-20 min)
•	Sommeil qualité
•	Soutien social (parler problèmes)
•	Loisirs épanouissants
•	Thérapie si stress chronique sévère
Gestion ennui non-alimentaire :
Activités remplaçant nourriture :
Actives :
•	Marche quartier
•	Danse sur musique
•	Ménage/rangement
•	Appel vidéo ami/famille
•	Bénévolat/aide voisin
Créatives :
•	Artisanat (pagne, perles, vannerie)
•	Lecture
•	Apprentissage nouveau (langue, compétence en ligne)
•	Jardinage
•	Cuisine saine (préparation repas futurs)
Sociales :
•	Visite famille/amis
•	Participation activités communautaires
•	Groupe intérêt (sport, culture, religion)
Restructuration environnement :
À la maison :
•	Retirer aliments \"réconfort\" (ou rendre moins accessibles)
•	Stock collations saines visibles (fruits lavés, légumes coupés)
•	Ne pas manger devant TV/écran
•	Cuisine = seul lieu repas
•	Assiette, table mise, manger assis (rituel conscient)
Au travail :
•	Pas d'argent liquide (limite achats impulsifs)
•	Apporter repas/collations de maison
•	Bouteille eau toujours visible
•	Alternatives stress bureau (balle anti-stress, élastique fitness)
Alimentation consciente (Mindful Eating) :
Principes :
1.	Avant manger : \"Ai-je vraiment faim ?\" (échelle 1-10, manger si ≥6)
2.	Pendant : manger lentement, savourer, poser fourchette entre bouchées
3.	Sans distraction : éteindre TV, téléphone, se concentrer repas
4.	Écouter satiété : arrêter à 7/10 plénitude (pas trop plein)
5.	Observer sans jugement : si écart, comprendre pourquoi, ajuster, continuer
Exercice pratique (1 repas/jour) :
•	Choisir 1 repas manger en pleine conscience
•	20 minutes minimum
•	Décrire mentalement : textures, saveurs, odeurs
•	Mâcher 20-30 fois/bouchée
•	Pause milieu : évaluer faim résiduelle
Menu adapté alimentation émotionnelle :
Principes :
•	Repas réguliers, rassasiants (éviter faim excessive = vulnérabilité)
•	Protéines + fibres chaque repas (satiété prolongée)
•	Pas de restriction sévère (génère frustration → compulsion)
•	Flexibilité 10-20% (éviter sentiment privation)
•	Alternatives saines aliments \"réconfort\"
Alternatives aliments réconfort :
Envie malsaine	Alternative saine similaire
Aloko frit salé	Aloko four + épices, petite portion
Biscuits sucrés	Banane plantain bouillie + cannelle
Chips	Chips plantain four maison
Glace	Banane congelée mixée (\"nice cream\")
Pâtisseries	Akara four + fruit
Chocolat	2 carrés chocolat noir 70% + amandes
Fritures	Brochettes grillées poulet/poisson
Stratégie \"aliment réconfort contrôlé\" :
•	1 fois/semaine : portion modérée aliment aimé
•	Planifié à l'avance (pas impulsif)
•	Contexte positif (partage familial, récompense objectif atteint)
•	Savouré pleinement, sans culpabilité
Quand consulter professionnel :
•	Compulsions très fréquentes (plusieurs fois/semaine)
•	Sentiment perte contrôle total
•	Cycles restriction sévère → compulsion
•	Détresse émotionnelle intense
•	Impact vie quotidienne (social, travail)
Ressources :
•	Psychologues (Cotonou, Porto-Novo)
•	Nutritionnistes spécialisés comportement alimentaire
•	Groupes soutien (associations santé mentale)
❌ RÉPONSE : NON
EXCELLENT - Alimentation régulée :
Signification :
•	Bonne conn";

            case 'regime_efficacite':
                return "exion signaux faim/satiété
•	Gestion émotions par autres moyens
•	Facteur réussite majeur
Conseils :
•	Maintenir cette dissociation émotion-alimentation
•	Développer répertoire gestion stress (exercice, loisirs, social)
•	Vigilance si stress majeur nouveau (deuil, perte emploi) : pourrait émerger

🍽️ QUESTION 2 : Tendance finir assiette même sans faim ?
✅ RÉPONSE : OUI
TRÈS FRÉQUENT - Conditionnement culturel/éducatif :
Origines habitude :
•	Enfance : \"finis ton assiette\" (ne pas gaspiller)
•	Culture : refuser nourriture = impoli
•	Déconnexion satiété réelle
•	Portions servies > besoins réels
Conséquences :
•	Surplus calorique quotidien (100-300 kcal)
•	Sur 1 an : +5 à +15 kg potentiellement
•	Suralimentation chronique
•	Estomac distendu (capacité augmentée)
•	Inconfort digestif
Stratégies reconnecter satiété :
1. Réduire portions servies (20-30%) :
•	Utiliser assiettes plus petites (effet visuel plein)
•	Se servir moins initialement
•	Possibilité rab si vraiment faim après 20 min
2. Échelle faim-satiété (utiliser chaque repas) :
1 - Affamé, faiblesse
2 - Très faim, irritable  
3 - Faim modérée
4 - Début faim
5 - NEUTRE (ni faim ni satiété)
6 - Satisfait légèrement
7 - Confortablement rassasié ← IDÉAL ARRÊT
8 - Plein
9 - Très plein, inconfort
10 - Douleur, nausée
Objectifs :
•	Commencer repas à 3-4/10 (faim modérée)
•	Arrêter à 7/10 (rassasié mais pas plein)
•	JAMAIS atteindre 8-10
3. Manger lentement (20-30 min/repas) :
•	Satiété = 20 minutes pour signaux cerveau
•	Poser couverts entre bouchées
•	Mâcher 20-30 fois
•	Conversation pendant repas (ralentit)
•	Boire eau régulièrement
4. Pause mi-repas (évaluation) :
•	À mi-assiette : STOP 2 minutes
•	Boire eau
•	Évaluer faim résiduelle (échelle)
•	Si ≤6/10 : arrêter (même si reste nourriture)
•	Si 7/10 : peut continuer doucement
Gestion nourriture restante :
Conservation (pas gaspillage) :
•	Restes dans boîte hermétique (prochain repas/collation)
•	Congélation si viande/poisson
•	Compost si végétaux non consommables
•	Partage famille si portions trop grandes
Reprogrammer mental :
•	\"Finir assiette\" n'est PAS vertu si nuit santé
•	Respecter corps > respecter norme sociale
•	Gaspillage : manger sans besoin VS conserver intelligent
Contexte social (invitations) :
•	Servir soi-même petites portions initialement
•	\"C'est délicieux mais je suis rassasié\" (compliment + refus poli)
•	Accepter emporter restes si insistance hôte

Menu adapté :
Portions réduites progressivement :
Semaine 1-2 :
•	Réduire 10% portions habituelles
•	Observer satiété
Semaine 3-4 :
•	Réduire 20% si toujours rassasié
•	Ajuster selon
Objectif :
•	Portions = besoins réels (selon tableau niveau activité)
•	Arrêt basé sur satiété pas quantité servie
Exemple concret :
•	Avant : Riz 250g, sauce 200g, viande 200g → Finit tout, inconfort
•	Transition : Riz 200g, sauce 150g, viande 150g → Finit, confortable
•	Objectif : Riz 150g, sauce 150g, viande 120g → Arrêt si rassasié avant fin
Structure assiette idéale :
•	1/2 assiette : légumes (salade, légumes cuits)
•	1/4 assiette : protéines (poisson, viande, haricots)
•	1/4 assiette : féculents (riz, igname, plantain)
•	Permet portions raisonnables visuellement équilibrées
❌ RÉPONSE : NON
EXCELLENT - Écoute corporelle :
Signification :
•	Connexion signaux satiété préservée
•	Régulation naturelle portions
•	Risque suralimentation réduit
Conseils :
•	Maintenir cette écoute
•	Modèle pour enfants si applicable (apprendre écoute corps jeunes)
•	Résister pressions sociales si elles émergent
🥗 QUESTION 3 : Régimes alimentaires antérieurs ?
✅ RÉPONSE : OUI (avec précisions type et efficacité)
Analyse selon type régime :
RÉGIME TRÈS RESTRICTIF (très faibles calories, monodiètes) :
Exemples :
•	Régime 800-1000 kcal/jour
•	Régime soupe uniquement
•	Régime fruits uniquement
•	Jeûne prolongé non médicalisé
Si efficace court terme mais reprise après :
Explications :
•	Perte initiale : eau + muscle (pas que graisse)
•	Métabolisme ralenti (adaptation défense)
•	Frustration intense → abandon → reprise
•	Effet yoyo classique
•	Perte muscle = métabolisme basal réduit définitivement
Conséquences actuelles :
•	Métabolisme possiblement plus lent
•	Besoin calories réduit vs personne même poids jamais régimée
•	Perte future plus difficile
•	Nécessite patience, progressivité
Approche corrective :
Phase 1 : Réparation métabolique (4-8 semaines) :
•	Calories = MAINTENANCE (ni perte ni gain)
•	Objectif : stabiliser, restaurer métabolisme
•	Renforcement musculaire (reconstruit muscle perdu)
•	Exemple : 1800-2000 kcal (selon activité)
Phase 2 : Perte douce (après stabilisation) :
•	Déficit modéré 200-300 kcal/jour
•	Perte lente 0,25-0,5 kg/semaine (vs 1 kg habituel)
•	Protéines élevées (préserve muscle)
•	Suivi métabolisme (ajuster si stagnation)
Menu spécifique :
•	Protéines 30% (vs 25-29% tableau) : préserve/reconstruit muscle
•	Glucides 40-45%
•	Lipides 25-30%
•	Renforcement musculaire 3-4 fois/semaine OBLIGATOIRE
Attentes réalistes :
•	Perte plus lente que première fois (normal)
•	Paliers fréquents (pas linéaire)
•	Focus santé et bien-être vs uniquement chiffre balance
•	Accepter \"nouveau poids santé\" peut être supérieur \"poids rêvé\"
RÉGIME FAIBLE GLUCIDES (low-carb, cétogène) :
Si efficace puis reprise :
Analyse :
•	Perte rapide initiale (eau + glycogène)
•	Insoutenable long terme (culturellement, socialement)
•	Reprise glucides → reprise poids eau immédiate
•	Frustration aliments culture (riz, igname, plantain)
Leçons :
•	Extrêmes = échec long terme
•	Intégrer féculents locaux modérément = durable
Approche équilibrée actuelle :
•	Suivre tableau répartition (glucides 41-50% selon activité)
•	Privilégier glucides complexes (riz complet, igname vapeur, haricots)
•	Pas d'élimination groupes alimentaires
•	Portions contrôlées vs élimination
Transition psychologique :
•	\"Glucides = autorisés en portions adaptées\"
•	Apprécier sans culpabilité
•	Énergie améliorée (vs fatigue cétogène long terme)


RÉGIME COMMERCIAL (Weight Watchers, substituts repas) :
Si efficace pendant abonnement puis reprise après arrêt :
Analyse :
•	Dépendance système externe (points, sachets)
•	Pas d'apprentissage autonome
•	Coût (non durable économiquement)
•	Reprise habitudes antérieures post-arrêt
Leçons :
•	Besoin apprentissage autonome DURABLE
•	Nourriture vraie vs produits transformés
Approche actuelle :
•	Aliments VRAIS locaux béninois (pas substituts)
•	Apprentissage cuisine saine
•	Autonomie complète (gratuit, durable)
•	Portions/structure vs système externe
RÉGIME \"ÉQUILIBRÉ\" mais échec :
Raisons échec possibles :
•	Portions non adaptées (même équilibré, si excès → échec)
•	Manque activité physique
•	Alimentation émotionnelle non gérée
•	Environnement non soutenant (famille, social)
•	Objectifs irréalistes (perte trop rapide attendue)
•	Lassitude (pas assez variété)
Approche actuelle :
•	Identifier raison spécifique échec antérieur
•	Ajuster stratégie en conséquence
•	Exemple : 
o	Si portions → mesurer systématiquement
o	Si émotionnel → stratégies partie 6.1
o	Si lassitude → variété maximale menus
o	Si social → stratégies affirmation, meal prep

RÉGIME \"YO-YO\" multiple (3+ régimes différents) :
ATTENTION - Risque majeur :
•	Métabolisme très endommagé
•	Perte confiance (\"rien ne marche\")
•	Troubles relation nourriture possibles
•	Sarcopénie marquée
Approche TRÈS progressive :
Phase 1 : Reconstruction psychologique (1-2 mois) :
•	Travail acceptation corps
•	Focus santé vs apparence
•	Thérapie comportementale si accessible
•	Arrêt obsession balance
Phase 2 : Stabilisation (2-3 mois) :
•	Calories maintenance
•	Repas réguliers, variés
•	Aucun aliment interdit
•	Activité physique plaisir
Phase 3 : Perte très douce (si toujours pertinent) :
•	Déficit minime 100-200 kcal/jour
•	Perte 0,25 kg/semaine maximum
•	Surveillance bien-être > chiffres
•	Abandon balance (mesures corporelles uniquement)
Suivi professionnel FORTEMENT recommandé :
•	Nutritionniste comportemental
•	Psychologue spécialisé TCA (si troubles)
•	Médecin suivi métabolique
❌ RÉPONSE : NON
AVANTAGE - Première approche structurée :
Points positifs :
•	Pas de dommages métaboliques antérieurs
•	Pas de traumatismes régimes
•	Relation nourriture plus saine
Approche :
•	Éducation nutritionnelle de base
•	Habitudes saines dès départ
•	Éviter erreurs classiques (restriction excessive)
•	Approche durable d'emblée";

            default:
                return 'Aucun';
        }
    }
}
