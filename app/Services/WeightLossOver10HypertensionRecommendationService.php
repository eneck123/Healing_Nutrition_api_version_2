<?php

namespace App\Services;

class WeightLossOver10HypertensionRecommendationService implements RecommendationServiceInterface
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = [], int $age = 30): string
    {
        switch ($key) {
            case 'antecedents_diag':
                return ": Avez-vous des antécédents de diabète type 2, d'hypertension ou de maladies cardiovasculaires ?
SI OUI :
Conseils Ciblés :
•	Surveillance glycémique stricte avec mesures régulières
•	Réduction drastique du sel (max 5g/jour)
•	Privilégier les aliments à Index Glycémique bas
•	Éviter totalement les sucres rapides
•	Augmenter les fibres (30-40g/jour)
•	Contrôle médical mensuel obligatoire
SI NON (Pas d'antécédents) :
Conseils Ciblés :
•	Maintenir une approche préventive
•	Surveillance annuelle des paramètres
•	Alimentation équilibrée sans restriction excessive
•	Promotion d'habitudes saines à long terme
•	Éducation nutritionnelle continue
QUESTION : Si oui, lequel ? (Type d'antécédent)
HYPERTENSION ARTÉRIELLE :
Conseils Spécifiques :
•	Sodium : MAXIMUM 5g sel/jour (= 2000mg sodium)
•	Potassium : augmenter (bananes, avocat, pommes de terre, haricots)
•	Magnésium : noix, graines, légumes verts
•	Régime DASH adapté au contexte béninois
•	Éviter : bouillons cubes, poissons très fumés/salés, viandes transformées

QUESTION : Prenez-vous actuellement des médicaments liés à votre antécédent ?
SI OUI :
Conseils Généraux :
•	Respecter scrupuleusement horaires de prise
•	Certains médicaments interagissent avec aliments
•	Surveillance médicale régulière des dosages
•	Communication avec médecin avant tout changement alimentaire majeur
•	Tenir un journal alimentaire + médicaments
Interactions Médicament-Aliments Courantes :
Metformine (diabète) :
•	Prendre pendant ou après repas (réduit troubles digestifs)
•	Peut causer déficit en vitamine B12 → surveillance
•	Compatible avec tous aliments recommandés
Insuline :
•	Timing crucial : synchroniser avec repas
•	Glucides à CHAQUE repas pour éviter hypoglycémie
•	Jamais sauter de repas
•	Collations nécessaires si insuline longue durée
Médicaments hypertension (IEC, ARA2) :
•	Éviter suppléments potassium en excès
•	Modération avec aliments très riches en potassium si fonction rénale diminuée
•	Boire suffisamment d'eau
•	Éviter pamplemousse avec certains médicaments (vérifier avec médecin)
Statines (cholestérol) :
•	ÉVITER jus de pamplemousse (interaction majeure)
•	Prendre le soir généralement
•	Surveillance enzymes hépatiques
•	Possibilité de douleurs musculaires (signaler)
Adaptations des Repas avec Médication :
	Avec Metformine (matin et soir) :
Petit-Déjeuner (avec metformine) :
•	Repas complet nécessaire
•	250g bouillie d'avoine
•	2 œufs
•	Légumes
•	Fruit
•	→ Prendre metformine en mangeant
Déjeuner :
•	Repas normal selon niveau d'activité
Dîner (avec metformine) :
•	Repas léger mais substantiel
•	150g de féculent + protéine + légumes
•	→ Prendre metformine en mangeant
	Avec Insuline Rapide (avant repas) :
Structure Obligatoire :
•	Mesure glycémie avant repas
•	Injection insuline 15-30 min avant
•	Repas avec portion glucides définie et comptée
•	Respecter portion prévue (ne pas sauter)



SI NON (Pas de médicaments) :
Conseils Ciblés :
•	C'est le MEILLEUR moment pour agir par alimentation/exercice
•	Possibilité de prévenir ou retarder médication
•	Modifications lifestyle très efficaces à ce stade
•	Contrôles médicaux réguliers pour suivre évolution
•	Motivation : chaque kilo perdu et chaque changement compte
QUESTION : Si oui, lesquels ? (Médicaments spécifiques)
	Pour le tableau qui suit, nous avons des médicaments pour les personnes souffrant d’hypertension et d’obésité modérée comme ce futle cas ici :
Classe de medicaments	Exemples	Rôle / Indications principales	Points spécifiques pour obésité + HTA	Conseils ciblés
Diurétiques thiazidiques	Hydrochlorothiazide, Indapamide, Chlortalidone	Diminuent le volume sanguin → réduisent la tension	Souvent utilisés en première intention chez les obèses	- Boire suffisamment d’eau pour éviter déshydratation- Consommer des aliments riches en potassium si autorisé (banane, épinards)- Limiter le sel
Inhibiteurs de l’enzyme de conversion (IEC)	Enalapril, Ramipril, Périndopril, Lisinopril	Dilatent les vaisseaux, protègent cœur et reins	Indiqués si risque de diabète ou atteinte rénale	- Limiter le sel- Maintenir un poids stable- Favoriser fruits et légumes riches en fibres- Surveiller la fonction rénale et la tension
Antagonistes des récepteurs de l’angiotensine II (ARA II)	Losartan, Valsartan, Candesartan, Telmisartan	Proches des IEC mais mieux tolérés (moins de toux)	Très utilisés chez les obèses hypertendus	- Même conseils que les IEC- Maintenir activité physique régulière- Éviter l’excès de sel et d’alcool
Bêta-bloquants	Bisoprolol, Métoprolol, Carvedilol, Atenolol	Ralentissent le cœur et réduisent la tension	Utiles si cardiopathie associée, mais peuvent favoriser la prise de poids	- Contrôler l’apport calorique pour éviter prise de poids- Activité physique régulière adaptée- Limiter caféine et stimulants
Antagonistes calciques	Amlodipine, Nifédipine, Diltiazem, Vérapamil	Dilatent les artères, réduisent la pression	Intéressants si HTA isolée (surtout chez les personnes âgées)	- Limiter le sel- Maintenir un poids stable- Activité physique régulière- Surveiller gonflement des chevilles (effet secondaire possible)
Autres (cas particuliers)	Alpha-bloquants (Doxazosine), Antihypertenseurs centraux (Méthyldopa, Clonidine)	Utilisés rarement, en cas d’échec ou de situations spécifiques	Plus souvent réservés à des cas complexes	- Suivi médical strict- Éviter arrêt brutal- Maintenir alimentation équilibrée et activité physique adaptée- Surveillance tensionnelle régulière
Pour le tableau précédent, la chose à faire est d’afficher la partie des onformations concernées ( toute la lligne en sélectionnant une ligne) à un user qui aurait dans sa réponse donnée donner un des médicaments contenues dans le tableau en dessus
QUESTION : Prenez-vous l'un de ces types de médicaments ?
MÉDICAMENTS POUR BAISSER LA GLYCÉMIE (Metformine, Glimepiride, etc.) :
Conseils Spécifiques Metformine :
•	Prendre PENDANT ou APRÈS repas (jamais à jeun)
•	Commencer par petites doses si nouveau traitement
•	Effets secondaires courants : nausées, diarrhée (s'améliorent)
•	Augmenter fibres progressivement (évite aggravation troubles)
•	Boire suffisamment (1.5-2L/jour)
Adaptations Alimentaires :
•	Repas jamais trop gras (aggrave troubles digestifs)
•	Privilégier repas moyens réguliers vs gros repas
•	Éviter aliments très épicés si troubles digestifs
•	Yaourt probiotique peut aider (si disponible)
Conseils Sulfamides (Glimepiride, etc.) :
•	RISQUE HYPOGLYCÉMIE → jamais sauter repas
•	Collations impératives entre repas
•	Glucides à absorption rapide toujours disponibles (en cas d'hypo)
•	Reconnaître signes hypoglycémie : tremblements, sueurs, faim intense, confusion


Kit Anti-Hypoglycémie à Toujours Avoir :
•	3 morceaux de sucre
•	1 jus de fruits petit format
•	1 banane
•	Biscuits secs
INSULINE :
Conseils Critiques :
•	Synchronisation PARFAITE insuline-repas obligatoire
•	Comptage des glucides précis
•	Jamais sauter un repas planifié
•	Toujours avoir aliment sucré disponible
•	Formation diabétologique recommandée
Types d'Insuline et Timing :
Insuline Rapide (avant repas) :
•	Injection 15-30 min AVANT repas
•	Repas doit suivre dans les 30 min
•	Dose ajustée selon glucides du repas
•	Mesure glycémie avant et 2h après
Insuline Lente (1-2 fois/jour) :
•	Horaire fixe chaque jour
•	Collations peuvent être nécessaires entre repas
•	Risque hypoglycémie nocturne
Protocole :
1.	Mesure glycémie : ex 1.50g/L
2.	Calcul dose insuline selon prescription médecin
3.	Injection insuline
4.	Attente 20 min
5.	Manger les portions EXACTES prévues
6.	Contrôle glycémie 2h après



Gestion des Hypoglycémies (< 0.70g/L) :
1.	ARRÊTER toute activité
2.	Règle des 15 : 
o	15g de glucides rapides : 3 sucres OU 150ml jus de fruits
o	Attendre 15 minutes
o	Re-mesurer glycémie
o	Si encore basse, reprendre 15g
3.	Une fois glycémie normalisée, prendre collation mixte (glucides + protéines)

MÉDICAMENTS POUR PERDRE DU POIDS (Orlistat, Liraglutide, etc.) :
Orlistat (Xenical) :
Mécanisme : Bloque absorption 25% des graisses alimentaires
Effets Secondaires : Selles grasses, urgences fécales, flatulences (si repas trop gras)
Conseils Alimentaires Spécifiques :
•	LIMITER graisses à 15g par repas max
•	Répartir graisses sur 3 repas (pas tout en 1 repas)
•	Privilégier cuisson sans gras
•	Éviter fritures, sauces grasses
•	Suppléments multivitamines nécessaires (A, D, E, K) le soir au coucher
Liraglutide (Victoza, Saxenda) :
Mécanisme : Hormone mimant GLP-1, réduit appétit, ralentit vidange gastrique
Effets Secondaires : Nausées (surtout début), satiété précoce, parfois vomissements
Conseils Alimentaires :
•	Petites portions (estomac se vide lentement)
•	Manger lentement (20-30 min par repas)
•	Arrêter dès sensation de satiété (ne pas finir assiette)
•	Éviter aliments trop gras/épicés (aggravent nausées)
•	Fractionner en 5-6 petits repas vs 3 gros
•	Bien hydrater entre repas (pas pendant)


MÉDICAMENTS POUR LA TENSION (IEC, ARA2, Bêta-Bloquants, etc.) :
IEC (Inhibiteurs Enzyme Conversion) :
•	Noms : Enalapril, Ramipril, Perindopril...
•	Interaction : POTASSIUM 
o	Ne pas prendre suppléments potassium
o	Modération avec aliments très riches en potassium si fonction rénale réduite
•	Toux sèche possible (effet secondaire, pas dangereux)
Conseils Alimentaires IEC :
•	Régime pauvre en sodium (≤5g sel/jour)
•	Potassium modéré (pas excès, pas restriction)
•	Hydratation correcte
•	Éviter alcool
Aliments Riches en Potassium (Modération si IEC + Problème Rénal) :
•	Bananes : 1/jour max
•	Avocat : ½/jour max
•	Oranges : 1/jour max
•	Haricots secs : portions normales OK
•	Épinards : portions normales OK
ARA2 (Antagonistes Récepteurs Angiotensine II) :
•	Noms : Losartan, Valsartan, Irbésartan...
•	Mêmes conseils que IEC
•	Pas de toux (avantage vs IEC)
Bêta-Bloquants :
•	Noms : Aténolol, Bisoprolol...
•	Pas d'interaction alimentaire majeure
•	Peuvent masquer symptômes hypoglycémie (important si diabétique)
•	Peuvent augmenter légèrement poids (surveiller portions)
Diurétiques :
•	Noms : Hydrochlorothiazide, Furosémide...
•	IMPORTANT : Perte de potassium
•	Nécessite AUGMENTER aliments riches en potassium
•	Hydratation adéquate (pas excessive)

Adaptations avec Diurétiques :
Augmenter Aliments Riches en Potassium :
•	Bananes : 1-2/jour
•	Oranges : 1-2/jour
•	Avocat : ½-1/jour
•	Patate douce : régulièrement
•	Haricots secs : quotidiennement
•	Épinards et légumes verts : abondamment
MÉDICAMENTS POUR LE CHOLESTÉROL (Statines) :
Noms : Atorvastatine, Simvastatine, Rosuvastatine...
INTERACTION MAJEURE : JUS DE PAMPLEMOUSSE
•	⚠️ ÉVITER COMPLÈTEMENT jus de pamplemousse
•	Augmente concentration statine dans sang → risque effets secondaires graves
•	Un verre peut interagir pendant 24-48h
•	Fruit entier : aussi à éviter (moins risqué que jus, mais à éviter par sécurité)
Autres Conseils :
•	Prendre généralement le soir (cholestérol produit la nuit)
•	Surveillance enzymes hépatiques (par m";

            case 'journee_typique':
                return "édecin)
•	Douleurs musculaires possibles (signaler au médecin)
•	CoQ10 peut aider douleurs (discuter avec médecin)
AUCUN DE CES MÉDICAMENTS :
Interprétation : Vous gérez votre condition UNIQUEMENT par alimentation et mode de vie. Excellente opportunité !
Conseils";

            case 'fruits_legumes':
                return ":
•	Profitez de cette période pour établir habitudes solides
•	Changements alimentaires souvent aussi efficaces que médicaments au début
•	Surveillance médicale régulière pour ajuster approche
•	Possibilité de prévenir ou retarder médication
•	Documentation prouvée : perte 5-10% poids = amélioration majeure tous paramètres


QUESTION : Pouvez-vous décrire une journée typique de vos repas et collations ?
	Nous vous remercions pour nous avoir divulgué votre journée typique car cela va nous permettre de vous orienter dans nos conseils enfin de cerner vos réalités quotidiennes en matière de nutrition. 
QUESTION : Combien de portions de fruits et légumes consommez-vous par jour ?
1-2 PORTIONS :
Évaluation : INSUFFISANT - Augmentation urgente nécessaire
Risques :
•	Carences en vitamines, minéraux, antioxydants
•	Fibres insuffisantes → constipation, mauvais contrôle glycémique
•	Augmentation risque maladies cardiovasculaires
•	Satiété réduite → suralimentation
Objectif : Passer à minimum 5 portions (400-500g)/jour
Plan d'Augmentation Progressive :
Semaines 1-2 : Atteindre 3 portions
•	Ajouter 1 fruit au petit-déjeuner
•	Ajouter salade au déjeuner
•	Ajouter 1 fruit en collation
Semaines 3-4 : Atteindre 4 portions
•	Ajouter légumes cuits au déjeuner (150g)
•	Maintenir les 3 portions précédentes
Semaines 5+ : Atteindre 5-7 portions
•	Légumes à CHAQUE";

            case 'grignotage':
                return "repas
•	Fruits 2-3×/jour




3-4 PORTIONS :
Évaluation : MOYEN - Amélioration souhaitable
Situation : Vous consommez déjà des fruits/légumes, mais pas assez pour bénéfices optimaux
Objectif : Passer à 5-7 portions/jour
Conseils Ciblés :
Analyse de la Répartition Actuelle :
Si 3-4 portions = par exemple :
•	1 fruit petit-déjeuner
•	Salade déjeuner
•	1 fruit collation
•	Quelques légumes sauce diner

Points à Améliorer :
1.	Augmenter portion légumes aux repas principaux
2.	Ajouter 2ème fruit
3.	Intégrer légumes crus en collations
5 PORTIONS OU PLUS :
Évaluation : EXCELLENT - Maintenir et diversifier
Félicitations : Vous atteignez les recommandations internationales !
QUESTION : Grignotez-vous entre les repas ?
OUI :
Analyse : Le grignotage n'est pas mauvais en soi, tout dépend de QUOI et COMBIEN
Évaluation Nécessaire : Distinguer :
•	Grignotage PLANIFIÉ (collations saines)
•	Grignotage COMPULSIF (émotionnel, ennui)
Conseils Ciblés :
Si Grignotage Compulsif (Émotionnel) :
Signaux :
•	Manger sans faim réelle
•	Manger par stress/ennui/tristesse
•	Aliments réconfort (sucrés, salés, gras)
•	Culpabilité après
•	Quantités importantes non contrôlées
Stratégies Non-Alimentaires :
1.	Identifier triggers émotionnels
2.	Activités alternatives : 
o	Marche 10 min
o	Appel à un ami
o	Tisane chaude
o	Respiration profonde
o	Hobby (lecture, musique)
Restructuration :
•	Supprimer aliments tentants de la maison
•	Ne pas acheter grignotages malsains
•	Planifier 2 vraies collations saines
•	Tenir journal émotions-grignotages
NON :
Évaluation : Évaluer si c'est positif ou problématique
Cas 1 : Positif (Repas Suffisamment Copieux) :
Si vous ne grignotez pas car :
•	Repas bien équilibrés et copieux
•	Bonne satiété entre repas
•	Pas de faim intense
•	Énergie stable
→ PARFAIT, continuez !
Conseils de Maintien :
•	Maintenir équilibre actuel des repas
•	Protéines à chaque repas (satiété)
•	Fibres abondantes (satiété prolongée)
•	Bons gras (ralentissent digestion)
Cas 2 : Problématique (Sous-Alimentation) :
Si vous ne grignotez pas car :
•	Restriction excessive volontaire
•	Peur de manger entre repas
•	Fringales intenses mais résistées
•	Fatigue entre repas
•	Irritabilité
→ AJOUTER 2 collations saines obligatoires !
Pourquoi :
•	Métabolisme actif nécessite apports réguliers
•	Évite hypoglycémies
•	Prévient craquages compulsifs
•	Maintient énergie et concentration
•	Facilite perte de poids (oui, manger régulièrement aide à maigrir !)
Collations à Intégrer Progressivement :
Semaine 1 : 1 collation
•	16h : 1 fruit + quelques noix
Semaine 2 : 2 collations
•	10h : 1 fruit
•	16h : 1 fruit + noix
Semaine 3+ : 2 collations complètes
•	10h : Fruit + protéine (noix/yaourt)
•	16h : Légumes + source énergie
Cas 3 : Bon Rythme Mais Peut Optimiser :
Si vous ne grignotez pas mais :
•	Repas espacés de plus de 5h
•	Légère baisse d'énergie en journée
•	Activité physique pratiquée
→ Ajouter 1-2 petites collations stratégiques
Timing Optimal :
•	1h avant exercice : fruit + petite poignée noix
•	2-3h après gros repas si prochain repas loin
QUESTION : Si oui, quels aliments consommez-vous ? (Grignotages)
RÉPONSES PROBLÉMATIQUES COURANTES :
1. \"Biscuits, gâteaux, bonbons\"
Problèmes :
•	Sucres raffinés (pics glycémiques)
•	Graisses trans (biscuits industriels)
•	Calories vides (pas de nutriments)
•	Additifs, conservateurs
•	Renforce addiction au sucre
Remplacement Progressif :
Semaine 1-2 : Réduction Quantité
•	Diviser par 2 les portions actuelles
•	Ajouter 1 fruit à côté
Semaine 3-4 : Remplacement Partiel
•	1 jour/2 : biscuits
•	1 jour/2 : fruits + noix
Semaine 5+ : Remplacement Total
•	ZÉRO biscuits industriels
•	Collations saines uniquement
•	Exception : occasions spéciales (1×/mois)
Alternatives Béninoises Sucrées (Occasionnelles) :
•	Bananes plantains mûres bouillies (pas frites)
•	Fruits frais naturellement sucrés
•	Dattes (2-3) + amandes
•	Galette de maïs maison (peu sucrée)

2. \"Chips, cacahuètes salées, beignets rue\"
Problèmes :
•	Sel excessif (hypertension)
•	Graisses trans (fritures répétées)
•	Calories très élevées
•	Qualité huile douteuse (rue)
•	Additifs
Dangers Spécifiques Beignets Rue :
•	Huile réutilisée multiple fois (cancérigène)
•	Température incontrôlée (acrylamide)
•	Hygiène variable
Remplacements Sains :
Au Lieu de Chips :
•	Chips légumes maison au four : 
o	Tranches fines de patate douce/igname
o	Badigeonner légèrement huile d'olive
o	Four 180°C 15-20 min
o	Assaisonner épices (pas sel)
Au Lieu de Cacahuètes Salées :
•	Arachides grillées MAISON non salées
•	Noix de cajou naturelles
•	Mélange noix variées non salées
Au Lieu de Beignets Rue :
•	Fruits frais
•	Akara maison (cuits au four)
•	Galettes de maïs santé
Transition 4 Semaines :
•	Semaine 1 : Réduire fréquence (de quotidien à 3×/semaine)
•	Semaine 2 : Alterner avec options saines
•	Semaine 3 : 1 seule fois/semaine
•	Semaine 4+ : Occasions exceptionnelles seulement

3. \"Pain avec Nutella/margarine, viennoiseries\"
Problèmes :
•	Nutella : sucre +";

            case 'boissons':
                return "huile de palme + calories
•	Margarine : graisses trans possibles
•	Pain blanc : IG élevé
•	Viennoiseries : sucre + gras + farine raffinée
Remplacements Progressifs :
Étape 1 : Améliorer le Pain
•	Passer de pain blanc à pain complet local
Étape 2 : Changer les Tartinades
Au Lieu de Nutella :
•	Pâte d'arachide naturelle 100% (2 cuillères)
•	Banane écrasée + cannelle
•	Avocat écrasé + citron + piment
Au Lieu de Margarine :
•	Petit morceau beurre véritable (modération)
•	Avocat écrasé
•	RIEN (pain avec autre aliment)
Nouvelles Collations Pain :
Option A :
•	1 tranche pain complet
•	Pâte d'arachide naturelle
•	Banane tranches
Option B :
•	1 tranche pain complet
•	Avocat écrasé
•	Tomate tranches
•	Œuf dur
Option C (Salé) :
•	1 tranche pain complet
•	Sardines
•	Concombre tranches

4. \"Sodas, jus sucrés\"
Problèmes :
•	Sucres liquides (absorption ultra-rapide)
•	Pas de satiété (calories liquides)
•	Pic insuline → stockage gras
•	Caries dentaires
•	Addiction au sucre
Plan Sevrage Boissons Sucrées (6 Semaines) :
Semaines 1-2 : Dilution
•	Mélanger soda/jus avec eau (50-50)
•	Réduire quantité totale
Semaines 3-4 : Transition
•	Jus de fruits FRAIS (pas industriels) dilués
•	Eau citronnée légèrement sucrée au miel
•	Bissap maison peu sucré
Semaines 5-6 : Final
•	Eau nature (objectif : 2L/jour)
•	Tisanes sans sucre (bissap, kinkeliba, gingembre)
•	Eau infusée (citron, concombre, menthe)
•	Jus frais OCCASIONNELS sans sucre ajouté
Boissons Béninoises Saines :
1. Bissap Non Sucré :
•	Fleurs d'hibiscus
•	Eau
•	Gingembre, menthe
•	ZÉRO sucre (ou miel très modéré)
•	Propriétés : anti-hypertensif, antioxydant
2. Infusion Kinkeliba :
•	Feuilles kinkeliba
•	Eau chaude
•	Citron
•	Propriétés : digestif, détox, anti-diabète
3. Eau de Gingembre :
•	Gingembre frais râpé
•	Eau
•	Citron
•	Propriétés : anti-inflammatoire, digestion
4. Eau de Coco Naturelle :
•	Directement de la noix de coco
•	ATTENTION : calories (250ml = 45 cal)
•	1 verre/jour maximum
•	Propriétés : électrolytes, potassium
5. \"Fruits secs, noix salées\"
Analyse Nuancée :
Fruits Secs :
•	✅ Si naturels sans sucre ajouté : OK en petites quantités (30g max)
•	❌ Si glacés/sucrés : À éviter
Noix Salées :
•	❌ Sel excessif (hypertension)
•	✅ Remplacer par noix non salées
Conseils :
•	Acheter noix crues
•	Griller soi-même sans sel
•	Assaisonner : paprika, curry, herbes (pas sel)
•	Portions : 25-30g (petite poignée)

RÉPONSES POSITIVES (À FÉLICITER) :
\"Fruits frais, légumes crus, noix non salées\"
Évaluation : EXCELLENT choix !
Optimisation :
Varier les Fruits :
•	Agrumes (oranges, pamplemousses) : vitamine C
•	Bananes : potassium, énergie
•	Papayes : enzymes digestives, vitamines A
•	Pommes (quand disponibles) : fibres, pectine
•	Mangues (saison) : antioxydants
Varier les Légumes Crus :
•	Carottes (vitamine A)
•	Concombres (hydratation)
•	Tomates cerises (lycopène)
•	Poivrons (vitamine C)
•	Céleri (fibres, eau)
•	Radis (si disponibles)
Accompagnements Sains :
•	Pâte d'arachide naturelle (protéines)
•	Houmous maison (pois chiches mixés)
•	Yaourt nature (si disponible)
Portions Recommandées :
•	Fruits : 1-2 moyens/collation
•	Légumes : 150-200g/collation
•	Noix : 25-30g/jour total




QUESTION : À quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?
TOUS LES JOURS :
⚠️ ALERTE ROUGE - Action Immédiate Nécessaire
Boissons Sucrées Quotidiennes :
Calcul Impact :
•	1 canette Coca (330ml) = 35g sucre = 140 calories
•	Consommation quotidienne = 245g sucre/semaine = 980 calories/semaine
•	Sur 1 an = 12.7 kg de sucre pur = 51,000 calories = +7kg de poids !
Dangers Spécifiques :
•	Diabète type 2 (risque x2)
•	Résistance à l'insuline
•	Foie gras non alcoolique
•	Prise de poids abdominale
•	Caries dentaires
•	Hypertension (sucre augmente TA)
Plan d'Action Urgent (Sevrage 8 Semaines) :
Semaines 1-2 : Réduction 50%
•	Si 2 sodas/jour → 1 soda/jour
•	Remplacer l'autre par eau citronnée
Semaines 3-4 : Réduction 75%
•	1 soda tous les 2 jours
•	Diluer avec eau (50-50)
•	Autres moments : tisanes, eau
Semaines 5-6 : 90% Réduction
•	1-2 sodas/semaine seulement
•	Jus frais occasionnels (dilués)
Semaines 7-8+ : Objectif Final
•	ZÉRO consommation régulière
•	Exception : 1-2×/mois occasions spéciales
•	Quotidien : eau, tisanes, café/thé non sucrés
Gestion des Envies :
•	Moment envie → boire grand verre d'eau d'abord
•	Attendre 10 min
•	Si envie persiste → bissap maison non sucré
•	Mâcher gingembre frais (coupe envie sucré)

Alcool Quotidien :
⚠️ DANGER MAJEUR - Consultation Médicale Recommandée
Alcools Béninois Courants :
•	Sodabi (alcool traditionnel)
•	Bière
•	Vin de palme
Risques Santé :
•	Foie : cirrhose, stéatose
•	Pancréas : pancréatite
•	Cœur : cardiomyopathie
•	Cerveau : dépendance, troubles cognitifs
•	Calories vides : 7 cal/g (plus que glucides)
•	Interactions médicamenteuses dangereuses
•	Hypertension aggravée
•	Glycémie déstabilisée
Calories Alcool :
•	1 bière (330ml) = 150 cal
•	1 verre sodabi (50ml) = 120 cal
•	Quotidien = 1000+ cal/semaine vides
Plan Réduction Alcool :
⚠️ ATTENTION : Sevrage brutal peut être dangereux si dépendance → Consulter médecin si consommation importante (>3 verres/jour)
Pour Consommation Modérée (1-2 verres/jour) :
Semaines 1-2 :
•	Identifier situations de consommation (stress ? routine ? social ?)
•	Réduire de 50%
•	Jours sans alcool : 2-3/semaine
Semaines 3-4 :
•	3-4 verres/semaine maximum
•	Jamais 2 jours consécutifs
Semaines 5+ :
•	Objectif : 0-2 verres/semaine
•	Occasions sociales uniquement
•	Aucune consommation solitaire/routine
Alternatives :
•	Sodabi → tisane gingembre (même aspect \"fort\")
•	Bière → bissap non sucré avec glaçons (aspect festif)
•	Social → proposer jus frais, être transparent sur démarche santé
UNE FOIS PAR SEMAINE :
Évaluation : ACCEPTABLE mais perfectible
Boissons Sucrées 1×/Semaine :
Impact :
•	Modéré mais toujours calories vides
•	Renforce goût pour le sucré
•	Peut déclencher envies les jours suivants
Conseils :
•	Garder pour occasions sociales spécifiques
•	Choisir plus petites portions (200ml vs 500ml)
•	Diluer avec eau si possible
•	Passer à alternatives saines reste idéal : 
o	Jus de fruits frais (sans sucre ajouté)
o	Smoothies maison
o	Eau pétillante + citron
Progression Souhaitable :
•	Mois 1-2 : maintenir 1×/semaine
•	Mois 3-4 : passer à 2×/mois
•	Mois 5+ : occasions exceptionnelles
Alcool 1×/Semaine :
Évaluation : RAISONNABLE si quantité modérée
Limites à Respecter :
•	Maximum 2 verres standards/occasion
•	Pas de binge drinking (beaucoup d'un coup)
•	Toujours avec nourriture (jamais à jeun)
•	Bien s'hydrater (1 verre d'eau pour 1 verre alcool)
Verre Standard :
•	Bière : 250ml
•	Vin : 120ml
•	Alcool fort : 30ml
Conseils Consommation Responsable :
•	Occasions sociales uniquement (pas routine/stress)
•	Privilégier vin rouge (si disponible) : antioxydants resvératrol
•	Éviter alcools sucrés (cocktails)
•	Espace de minimum 6-7 jours entre occasions
Si Hypertension :
•	Id";

            case 'sommeil':
                return "éalement ZÉRO alcool
•	Si 1×/semaine maintenu : maximum 1 verre
OCCASIONNELLEMENT :
Évaluation : BIEN - À maintenir
Définition \"Occasionnel\" :
•	1-3 fois/mois
•	Événements spéciaux
•	Pas de routine
Conseils de Maintien :
•	Garder ce rythme
•	Événements festifs, mariages, fêtes
•	Pas de culpabilité sur ces occasions
•	Retour immédiat habitudes saines après
Stratégies Occasions :
Avant l'Événement :
•	Manger normalement (ne pas \"économiser\" calories)
•	Repas équilibré avant de sortir
Pendant l'Événement :
•	Alterner : 1 verre alcool ou sucré → 1 verre d'eau
•	Manger d'abord (pas à jeun)
•	Privilégier options moins sucrées
•	Savourer lentement
Après l'Événement :
•	Retour immédiat alimentation normale
•	Pas de compensation restrictive
•	(pas de jeûne)
•	Hydratation ++
•	Reprendre activité physique
JAMAIS :
Évaluation : PARFAIT - Félicitations !
Bénéfices :
•	Zéro calories vides
•	Glycémie stable
•	Foie préservé
•	Hydratation optimale
•	Goût non habitué au très sucré
•	Économies financières
Maintien :
•	Continuer ainsi
•	Rester vigilant occasions sociales (pression sociale)
•	Avoir réponses préparées si offert : 
o	\"Je préfère l'eau, merci\"
o	\"Je ne bois pas d'alcool\"
o	\"Un jus de fruits frais plutôt ?\"
Boissons Saines à Privilégier :
•	Eau : 2-3L/jour (objectif principal)
•	Tisanes variées non sucrées
•	Café/thé (modération, sans sucre)
•	Jus frais maison sans sucre ajouté (occasionnels)
•	Eau infusée (citron, concombre, menthe)
QUESTION : Combien d'heures de sommeil avez-vous par nuit ?
MOINS DE 6H :
⚠️ INSUFFISANT - Impact Majeur sur Poids et Santé
Conséquences Sommeil Insuffisant :
Sur le Poids :
•	↑ Ghréline (hormone de la faim) +15%
•	↓ Leptine (hormone satiété) -15%
•	Envies aliments sucrés/gras augmentées
•	Métabolisme ralenti -5 à 10%
•	Risque obésité x2
•	Perte musculaire (vs perte de gras)
Sur la Santé :
•	Résistance à l'insuline augmentée
•	Tension artérielle ↑
•	Cortisol (stress) élevé → stockage graisse abdominale
•	Immunité affaiblie
•	Risque diabète type 2 x2
Plan Amélioration Sommeil :
Objectif : 7-8h minimum
Stratégies Progressives :
Semaine 1 : +30 min
•	Si actuellement 5h → viser 5h30
•	Décaler heure coucher de 30 min plus tôt
Semaine 2-3 : +1h
•	Viser 6h
•	Routine coucher régulière
Semaine 4+ : 7-8h
•	Objectif final atteint
•	Maintenir régularité
Hygiène du Sommeil :
Le Soir (3h avant coucher) :
•	❌ Pas de café/thé
•	❌ Pas d'exercice intense
•	❌ Pas de gros repas
•	❌ Limiter écrans (téléphone, TV)
•	✅ Repas léger
•	✅ Tisane relaxante (kinkeliba)
•	✅ Lumière tamisée
•	✅ Lecture, musique douce
Dîner Favorisant Sommeil :
•	✅ Glucides complexes modérés (favorisent sérotonine)
•	✅ Tryptophane : banane, avocat, noix
•	❌ Pas d'aliments épicés
•	❌ Pas de grandes quantités liquides
Exemple Dîner Sommeil :
•	Soupe légère de légumes
•	100g poulet grillé
•	100g patate douce (glucides modérés)
•	1 banane (tryptophane)
•	Tisane kinkel";

            case 'apnee':
                return "iba
Routine Coucher :
1.	21h30 : fin écrans
2.	21h45 : douche tiède
3.	22h : tisane + lecture
4.	22h30 : coucher
5.	7h : réveil (objectif 8h30 sommeil)
Si Insomnie :
•	Consultation médicale nécessaire
•	Éviter somnifères sans prescription
•	Techniques relaxation : respiration, méditation
•	Activité physique journée (aide sommeil soir)
6H-7H :
Évaluation : LIMITE BASSE - Amélioration souhaitable
Situation :
•	Minimum acceptable mais pas optimal
•	Certaines personnes OK, autres insuffisant
•	Avec obésité+hypertension : viser 7-8h préférable
Conseils :
•	Évaluer qualité sommeil (réveils fréquents ? fatigue journée ?)
•	Si fatigue journée → augmenter à 7h30-8h
•	Si énergie OK → maintenir mais surveiller
Optimisation Qualité :
•	Régularité horaires (même weekends)
•	Chambre fraîche (20-22°C)
•	Obscurité totale
•	Silence ou bruits blancs
Adaptation Alimentaire :
•	Dîner 3h avant coucher minimum
•	Éviter digestion perturbant sommeil
•	Tisane relaxante OK
8H-9H :
Évaluation : OPTIMAL - Parfait pour santé et perte de poids
Bénéfices :
•	Hormones faim-satiété équilibrées
•	Métabolisme optimal
•	Récupération musculaire complète
•	Niveau énergie élevé
•	Meilleur contrôle alimentaire journée
•	Stress réduit
Maintien :
•	Continuer régularité
•	Horaires fixes
•	Qualité priorité
Alimentation Complémentaire :
•	Petit-déjeuner complet (énergie après bon sommeil)
•	Profiter énergie pour activité physique matinale
•	Meilleure adhérence plan nutritionnel
PLUS DE 9H :
Évaluation : EXCESSIF - Investigation nécessaire
Deux Scénarios :
Scénario 1 : Récupération d'une Dette de Sommeil
•	Si passé de <6h à >9h récemment
•	Normal temporairement
•	Doit se stabiliser à 7-8h après quelques semaines
Scénario 2 : Besoin Chronique >9h
•	Peut indiquer : 
o	Apnée du sommeil non diagnostiquée
o	Sommeil de mauvaise qualité (non réparateur)
o	Hypothyroïdie
o	Dépression
o	Anémie
⚠️ Consultation médicale recommandée si >9h chronique
Évaluation Qualité Sommeil :
•	Réveils fréquents la nuit ?
•	Ronflements ?
•	Fatigue malgré heures ?
•	Somnolence journée ?
Si Apnée Suspectée → voir question suivante
QUESTION : Avez-vous l'apnée du sommeil ?
OUI :
⚠️ CONDITION SÉRIEUSE - Suivi Médical Strict Nécessaire
Lien Obésité-Apnée :
•	70% des personnes avec apnée ont obésité
•	Graisse abdominale + cou → obstruction voies aériennes
•	Cercle vicieux : apnée → fatigue → inactivité → prise de poids → apnée aggravée
Impact Sur Santé :
•	Hypertension aggravée (pauses respiratoires ↑ TA)
•	Risque cardiovasculaire x3
•	Diabète type 2 (résistance insuline)
•	Fatigue chronique
•	Tr";

            case 'regime_recent':
                return "oubles concentration
•	Accidents (somnolence)
Traitement Médical :
•	CPAP (Pression Positive Continue) : Masque nocturne soufflant air 
o	Amélioration immédiate qualité sommeil
o	Réduction TA
o	Plus d'énergie journée
o	⚠️ Utilisation chaque nuit obligatoire
Rôle CRUCIAL de la Perte de Poids :
•	Perte 10% poids → réduction 25-30% sévérité apnée
•	Perte 15-20% poids → possibilité guérison complète
•	Objectif #1 : maigrir pour réduire/éliminer apnée
Adaptations Alimentaires Spécifiques :
Priorités Nutritionnelles :
1.	Perte de poids optimisée (déficit calorique modéré mais constant)
2.	Anti-inflammatoire (réduire inflammation voies aériennes)
3.	Éviter alcool absolument (relâche muscles gorge → aggrave apnée)
4.	Dîner ultra-léger (digestion légère = meilleur sommeil)
Aliments Anti-Inflammatoires à Privilégier :
•	Poissons gras (omega-3) : maquereau, sardines
•	Curcuma + gingembre (puissants anti-inflammatoires)
•	Légumes verts feuilles
•	Fruits riches antioxydants (papaye, orange)
•	Huile d'olive
•	Noix, amandes
•	Thé vert
À ÉVITER ABSOLUMENT :
•	❌ Alcool (même 1 verre) → relâche muscles gorge
•	❌ Sédatifs sans prescription
•	❌ Gros repas soir
•	❌ Aliments provoquant reflux (épices fortes, gras, tomates le soir)
•	❌ Aliments très salés (rétention eau → œdème → obstruction)
Position Sommeil :
•	Dormir sur le côté (pas sur le dos)
•	Surélever tête de lit de 10-15cm
•	Oreiller adapté (ni trop haut ni trop bas)
NON :
Évaluation : Bien, mais rester vigilant
Dépistage Recommandé Si :
•	Ronflements forts
•	Pauses respiratoires rapportées par conjoint
•	Somnolence diurne excessive
•	Fatigue au réveil malgré heures suffisantes
•	Obésité avec IMC >35
•	Tour de cou >43cm hommes, >41cm femmes
•	Hypertension résistante aux traitements
⚠️ Si 3+ de ces signes → consulter pour polysomnographie (étude du sommeil)
Prévention Apnée :
•	Maintenir perte de poids
•	Éviter alcool le soir
•	Dormir sur le côté
•	Activité physique régulière
•	Contrôle TA
QUESTION : Avez-vous récemment fait un régime de perte de poids ?
OUI :
Analyse Importante : Effet yo-yo possible, métabolisme peut être ralenti
Conseils Ciblés :
Évaluer le Régime Précédent :
•	Était-il trop restrictif ? (<1200 cal/jour)
•	Perte trop rapide ? (>1kg/semaine)
•	Privations extrêmes ?
•	Difficile à maintenir ?
Si Régime Crash Précédent :
Conséquences :
•	Métabolisme ralenti de 10-20%
•	Perte musculaire
•	Effet rebond (reprise poids + supplément)
•	Yo-yo métabolique
Approche Réparation Métabolisme :
Phase 1 (2 semaines) : Stabilisation
•	NE PAS commencer déficit immédiatement
•	Manger à maintenance (calories besoins)
•	Focus qualité aliments
•	Réintroduire nutriments manquants
Phase 2 (Semaines 3+) : Déficit Modéré
•	Réduction calorique DOUCE (300-400 cal/jour)
•	Pas plus !
•	Préserver muscle (protéines ++)
•	Activité physique progressive
Risque Effet Yo-Yo :
•	Régimes répétés → chaque fois plus difficile perdre
•	Solution : changement lifestyle PERMANENT, pas \"régime temporaire\"
Nouvelle Approche (Vs Ancien Régime) :
❌ Ancien Régime :
•	Privation extrême
•	Temporaire
•	\"Interdit\" / \"Permis\"
•	Motivation externe
•	Abandon → reprise poids
✅ Nouvelle Approche :
•	Équilibre
•	Permanent (nouveau style de vie)
•	Flexibilité 90-10 (90% sain, 10% plaisir)
•	Motivation interne (santé, bien-être)
•	Durable → maintien poids

Si Oui, Combien de Poids Avez-Vous Perdu ?
MOINS DE 5 KG :
Évaluation :
•	Perte modeste, bon début
•	Moins de risque effet rebond
•	Métabolisme probablement peu affecté
Conseils :
•	Continuer sur même lancée
•	Ne pas accélérer trop vite
•	Célébrer cette victoire !
•	Chaque kilo perdu = bénéfice santé
Bénéfices Déjà Obtenus (Même <5kg) :
•	Tension artérielle légèrement réduite
•	Glycémie améliorée
•	Lipides sanguins améliorés
•	Énergie augmentée
•	Confiance en soi boostée
Plan Continuation :
•	Maintenir rythme 0.5-1kg/semaine
•	Pas de plateau découragement (normal)
•	Ajustements progressifs selon résultats
5-10 KG :
Évaluation : Excellente perte, impacts santé significatifs !
Bénéfices Majeurs Obtenus :
•	Réduction TA : 5-10 mmHg (systolique)
•	Glycémie : -0.1 à -0.2g/L
•	Cholestérol total : -10 à -15%
•	Tour de taille : -5 à -10cm
•	Mobilité améliorée
•	Apnée du sommeil réduite (si présente)
•	Douleurs articulaires diminuées
Conseils Phase Maintenance :
Risque : Après perte significative, tentation relâchement
Stratégies Maintien :
1.	Continuer habitudes qui ont fonctionné 
o	Ne pas revenir ancien mode alimentaire
o	Maintenir activité physique
2.	Pesée Régulière 
o	1×/semaine
o	Si reprise >2kg → ajuster immédiatement
3.	Gestion Plateaux 
o	Normal après perte 5-10kg
o	Métabolisme s'adapte
o	Patience ou ajuster légèrement calories/activité
4.	Nouvel Objectif 
o	Si obésité modérée : viser 10-15% poids initial total
o	Progression par paliers (ex: perte 10kg, maintenir 1 mois, puis reprendre perte)








PLUS DE 10 KG :
Évaluation : PERTE MAJEURE - Félicitations exceptionnelles !
Impacts Santé Considérables :
•	Perte >10% poids = rémission possible diabète type 2 (si présent)
•	TA : réduction 10-20 mmHg
•	Risque cardiovasculaire divisé par 2
•	Apnée sommeil possiblement guérie
•	Mobilité transformée
•	Estime de soi
⚠️ Vigilance Accrue :
Risques Spécifiques Grosse Perte :
1.	Peau Relâchée 
o	Hydratation ++
o	Musculation (raffermir)
o	Patience (peau se rétracte sur 1-2 ans)
2.	Métabolisme Ralenti 
o	Après perte importante, métabolisme adaptent
o	Besoins caloriques réduits
o	Ajuster apports en conséquence
3.	Effet Rebond Risque Élevé 
o	Statistiques : 80% reprennent sans stratégie maintenance
o	CRUCIAL : plan maintenance à vie
4.	Carences Nutritionnelles Possibles 
o	Bilan sanguin recommandé
o	Suppléments si nécessaire
Stratégie Maintenance Perte >10kg :
Phase Consolidation (3-6 mois) :
•	OBJECTIF : stabiliser nouveau poids
•	Calories : légèrement au-dessus de la phase perte (ex: +200-300 cal)
•	PAS de retour ancien mode
•	Continuer activité physique
•	Pesée hebdomadaire stricte
Exemple Consolidation :
•	Pendant perte : 1600 cal/jour
•	Consolidation : 1850 cal/jour
•	Maintenance long terme : 1900-2000 cal/jour (selon activité)
Règles Maintenance à Vie :
1.	Pesée Hebdomadaire 
o	Chaque lundi matin
o	Si +2kg → action immédiate (retour phase perte 2 semaines)
2.	Ratio 90-10 
o	90% du temps : alimentation saine
o	10% : flexibilité occasions (sans culpabilité)
3.	Activité Physique NON-Négociable 
o	Minimum 150 min/semaine à vie
o	Intégrer dans routine quotidienne
o	Plaisir avant performance
4.	Suivi Médical 
o	Tous les 3-6 mois
o	Bilan sanguin annuel
o	Ajuster médicaments si nécessaire";

            case 'sedentarite':
                return "(doses souvent réduites après perte)
5.	Gestion Psychologique 
o	Identifier triggers reprises
o	Stratégies coping non-alimentaires
o	Support social
o	Consulter si besoin (psychologue, diététicien)
Célébration :
•	Acheter nouveaux vêtements
•	Photos avant/après
•	Partager succès avec proches
•	Être fier du chemin parcouru !
NON (Jamais Fait de Régime) :
Évaluation : Première démarche, excellent moment pour bien commencer !
Avantages \"Débutant\" :
•	Métabolisme pas endommagé par yo-yo
•	Pas de frustrations régimes passés
•	Motivation fraîche
•	Résultats souvent plus rapides au début
Inconvénients Potentiels :
•	Manque d'expérience
•	Possibles difficultés initiales
•	Besoin d'éducation nutritionnelle
Approche Première Fois :
Phase Découverte (Semaines 1-4) :
Objectif : Apprendre, pas perfection
Focus :
1.	Conscience Alimentaire 
o	Tenir journal alimentaire quotidien
o	Noter tout ce qui est mangé
o	Identifier patterns problématiques
2.	Petits Changements Progressifs 
o	Semaine 1 : ajouter légumes chaque repas
o	Semaine 2 : remplacer sodas par eau
o	Semaine 3 : introduire petit-déjeuner équilibré
o	Semaine 4 : structurer 3 repas + 2 collations
3.	Éducation 
o	Apprendre tailles portions
o	Comprendre macronutriments
o	Lire étiquettes (si aliments emballés)
Phase Active (Mois 2+) :
Mise en Place Complète :
•	Plan alimentaire selon niveau activité
•	Déficit calorique modéré
•	Suivi poids hebdomadaire
•	Ajustements selon résultats
Erreurs Débutant à Éviter :
1.	❌ Trop Restrictif Trop Vite 
o	Vouloir perdre trop vite
o	Couper trop de calories
o	→ Échec garanti
o	✅ Plutôt : progression douce, durable
2.	❌ Éliminer Groupes Aliments Entiers 
o	\"Plus jamais de glucides\"
o	\"Plus jamais de gras\"
o	→ Frustration, carences
o	✅ Plutôt : équilibre, modération
3.	❌ Comparer à Autres 
o	Chacun perd à son rythme
o	Comparaison = découragement
o	✅ Plutôt : focus sur SOI
4.	❌ Perfection Attendue 
o	1 écart ≠ échec
o	Culpabilité contre-productive
o	✅ Plutôt : 90% bien, 10% flex
5.	❌ Ignorer Activité Physique 
o	Penser alimentation seule suffit
o	→ Perte musculaire, plateau
o	✅ Plutôt : alimentation + mouvement
Mentalité Gagnante Débutant :
•	Patience
•	Apprentissage continu
•	Célébrer petites victoires
•	Penser long terme (mois, années)
•	Lifestyle, pas régime temporaire
QUESTION : Combien de jours par semaine pratiquez-vous une activité physique ?
AUCUN (Sédentaire) :
⚠️ PRIORITÉ ABSOLUE : Commencer Mouvement
Risques Sédentarité :
•	\"Sitting is the new smoking\"
•	Métabolisme ralenti
•	Perte musculaire
•	Résistance insuline aggravée
•	Risque cardiovasculaire x2
•	Dépression, anxiété
•	Espérance vie réduite
Avec Obésité + Hypertension + Sédentarité = Cocktail Dangereux
Plan Démarrage Progressif (Crucial pour Éviter Blessure/Découragement) :
Semaine 1 : Micro-Mouvements
•	OBJECTIF : bouger 10 min/jour (oui, juste 10 min !)
•	QUOI : marche tranquille autour maison/quartier
•	QUAND : matin ou soir, moment agréable
•	MESSAGE : \"Je PEUX le faire, c'est facile\"
Semaine 2 : 15 min/jour
•	Augmenter à 15 min
•	Accélérer légèrement la marche
•	Tous les jours si possible, minimum 5 jours
Semaine 3-4 : 20 min/jour
•	20 min de marche
•	Commencer sentir légère accélération cardiaque
•	Toujours confortable (pouvoir parler)
Mois 2 : 30 min/jour, 5-6 jours/semaine
•	Objectif atteint !
•	150 min/semaine = santé cardiovasculaire
•	Varier: marche, activités ménagères actives
Mois 3+ : Diversification
•	Ajouter exercices maison (voir suggestions plus bas)
•	Augmenter durée selon envie (40-60 min)
•	Introduction légère musculation
Surmonter Barrières Communes :
Barrière : \"Pas le temps\"
•	✅ Solution : 10 min TOUT LE MONDE a (se lever 10 min plus tôt)
•	✅ Fractionner : 3×10 min dans journée = 30 min
Barrière : \"Trop fatigué\"
•	✅ Solution : paradoxalement, bouger DONNE énergie
•	✅ Commencer 5 min, souvent on continue plus
Barrière : \"Trop gros, honte\"
•	✅ Solution : marcher tôt matin ou tard soir si gêne
•	✅ Exercices à domicile (zéro regard)
•	✅ Focus : SANTÉ, pas apparence
Barrière : \"Douleurs articulaires\"
•	✅ Solution : activités faible impact 
o	Marche lente
o	Nage (si accès piscine/mer)
o	Exercices assis
o	Yoga doux
•	⚠️ Consultation médecin si douleurs importantes
Activités Béninoises Accessibles Zéro Coût :
1. Marche Quotidienne
•	Autour quartier
•	Aller au marché à pied
•	Descendre taxi/zem 1 arrêt avant
2. Danse Traditionnelle
•	Chez soi, musique locale
•	Plaisir + cardio
•	20-30 min
3. Travaux Ménagers Actifs
•	Laver linge à la main (si applicable)
•	Ménage énergique
•	Jardinage/cour
4. Exercices Poids du Corps Maison (Mois 3+)
•	Squats chaise
•	Pompes murales
•	Levées de jambes
•	Étirements
1-3 JOURS (Légèrement Actif) :
Évaluation : BON DÉBUT, mais insuffisant pour optimalité
Situation :
•	Meilleur que sédentaire
•	Mais <150 min/semaine 
•	Bénéfices santé limités
Objectif : Passer à 4-6 jours/semaine
Plan Progression :
Mois 1 : Maintenir 3 jours, Augmenter Durée
•	Si actuellement 3×20 min = 60 min/semaine
•	Passer à 3×30 min = 90 min/semaine
Mois 2 : Ajouter 4ème Jour
•	4×30 min = 120 min/semaine
Mois 3 : Ajouter 5ème Jour
•	5×30 min = 150 min/semaine (objectif OMS)
Mois 4+ : Optimalité
•	5-6×40 min = 200-240 min/semaine
•	Bénéfices santé maximaux
Stratégies Augmentation Fréquence :
Identifier Jours Manquants :
•	Si actuellement lundi-mercredi-vendredi
•	Ajouter samedi (weekend = + temps)
•	Puis ajouter mardi ou jeudi
Activités Courtes Jours \"Off\" :
•	Pas obligé 30 min tous les jours
•	Jours ajoutés : commencer par 15-20 min
4-6 JOURS (Modérément à Très Actif) :
Évaluation : EXCELLENT - Maintenir et Optimiser
**Bénéfices Actuels
•	Santé cardiovasculaire optimale
•	Métabolisme élevé
•	Perte de poids facilitée
•	Bien-être mental
•	Énergie élevée
Conseils Optimisation :
1. Varier Types d'Activité :
•	3 jours cardio (marche rapide, danse)
•	2 jours musculation/renforcement
•	1 jour flexibilité (étirements, yoga)
2. Progresser en Intensité :
•	Si toujours même intensité → plateau
•	Augmenter graduellement : 
o	Marche plus rapide
o	Ajouter intervalles (alterner rapide-lent)
o	Ajouter pentes/escaliers
3. Récupération :
•	1 jour repos/semaine OBLIGATOIRE
•	Sommeil crucial
•	Hydratation ++
Alimentation Modérément à Très Actif :
•	Répartition : 25% protéines / 45-48% glucides / 27-30% lipides
•	Glucides suffisants (énergie entraînements)
•	Protéines (récupération musculaire)
•	Timing nutriments : 
o	Avant exercice (1-2h) : glucides + protéines légères
o	Après exercice (30 min) : protéines + glucides
Exemple Nutrition Sport :
Avant Exercice (7h) :
•	1 banane + 20g noix
•	Hydratation (eau)
Exercice (8h-8h45) :
•	Hydratation pendant si >45 min

Après Exercice (9h) :
•	Petit-déjeuner complet : 
o	250g bouillie d'avoine
o	2 œufs (protéines récupération)
o	1 fruit
o	Eau abondante
7 JOURS (Extrêmement Actif) :
Évaluation : ATTENTION - Possiblement excessif
Deux Scénarios :
Scénario 1 : Activité Légère Quotidienne (30 min marche)
•	✅ PARFAIT
•	Mouvement quotidien recommandé
•	Aucun risque surmenage
Scénario 2 : Entraînements Intenses 7 jours/7
•	⚠️ RISQUE SURENTRAÎNEMENT
•	Corps besoin repos
•	Risques : 
o	Blessures
o	Fatigue chronique
o	Immunité baissée
o	Plateau/régression
o	Burnout
Conseils Si Entraînements Intenses :
•	Maximum 5-6 jours intenses
•	1-2 jours repos OU activité légère (marche tranquille, étiremen";

            case 'activites_preferees':
                return "ts)
•	Écouter corps : fatigue persistante = repos nécessaire
Signes Surentraînement :
•	Fatigue chronique
•	Performances en baisse
•	Irritabilité
•	Troubles sommeil
•	Blessures répétées
•	Perte d'appétit
•	Fréquence cardiaque repos élevée
→ Si 3+ signes : réduire volume, consulter
QUESTION : Combien de temps passez-vous en position assise chaque jour ?
MOINS DE 4H :
Évaluation : EXCELLENT - Idéal
Bénéfices :
•	Métabolisme actif toute journée
•	Risque cardiovasculaire minimal
•	Brûlage calories naturel élevé
•	Mobilité préservée
Maintien :
•	Continuer lifestyle actif
•	Varier postures même si debout (pas statique)
4H-6H :
Évaluation : ACCEPTABLE - Moyenne moderne
Risques Modérés :
•	Métabolisme ralentit par périodes
•	Début risques santé
Conseils Réduction :
•	Pause mouvement toutes les heures : 
o	Se lever
o	Marcher 2-3 min
o	Étirements
•	Remplacer temps assis par debout quand possible
6H-8H :
Évaluation : PRÉOCCUPANT - Action Nécessaire
Risques Élevés :
•	Métabolisme très ralenti
•	Risque diabète augmenté
•	Risque cardiovasculaire
•	Douleurs dorsales
•	Circulation sanguine réduite
Plan Réduction :
Au Travail (Si Assis) :
•	Téléphone → se lever pour répondre
•	Pause 5 min toutes les heures (marcher)
•	Déjeuner actif (marche après repas)
•	Trajet → descendre transport plus tôt, finir à pied
À la Maison :
•	Limiter TV/écrans
•	Activités debout (cuisine, ménage)
•	Loisirs actifs vs passifs
Objectif : Passer à <6h dans 3 mois
PLUS DE 8H :
⚠️ ALERTE ROUGE - Risque Santé Majeur
Risques Très Élevés :
•	\"8h assis = fumer 1 paquet/jour\" (études)
•	Risque mortalité toutes causes +90%
•	Diabète type 2 risque x2
•	Maladies cardiovasculaires
•	Obésité aggravée
•	Dépression
Même Si Vous Faites du Sport :
•	Exercice 30 min ne compense PAS 8h assis
•	Les deux sont indépendants
•	Besoin : exercice ET réduire position assise
Plan Action Urgent :
Semaine 1-2 : Conscience
•	Noter chaque heure assise
•	Identifier où/quand
Semaines 3-4 : Réduction 1h
•	Objectif : passer de 8h à 7h
•	Remplacer 1h assis par debout/mouvement
Mois 2 : Réduction 2h
•	Objectif : 6h assis
Mois 3+ : Objectif <6h
Stratégies Pratiques :
Si Travail Bureau :
•	Demander bureau debout (ou improviser : sur cartons)
•	Alterner assis-debout
•	Réunions en marchant (si possible)
•	Pause 10 min chaque heure (obligatoire !)
Si Conducteur (Taxi, Zem, etc.) :
•	Difficile réduire pendant travail
•	COMPENSER hors travail : 
o	Marche matin avant travail
o	Exercices soir
o	Weekends ultra-actifs
o	Étirements pendant pauses
À la Maison :
•	Bannir TV/écrans >2h consécutives
•	Activités ménagères debout
•	Cuisine (préparer repas = temps debout)
•	Jardinage si possible
\"Active Breaks\" Toutes les Heures (5 min) :
1.	Se lever
2.	Marcher sur place 1 min
3.	Étirements bras/jambes 2 min
4.	Squats x10 (si possible)
5.	Marche 2 min
Rappel Automatique :
•	Alarme téléphone toutes les heures
•	Note : \"DEBOUT ! Bouge 5 min\"
QUESTION : Quelles activités physiques appréciez-vous ?
Principe Fondamental : PLAISIR = ADHÉRENCE
Si vous aimez l'activité → vous continuerez Si vous détestez → vous abandonnerez
→ Trouver CE QUI VOUS PLAÎT est CRUCIAL
RÉPONSE : Marche
Excellent Choix pour Débuter/Maintenir
Avantages Marche :
•	✅ Gratuit
•	✅ Accessible partout
•	✅ Faible impact (articulations)
•	✅ Peut être sociale (avec amis/famille)
•	✅ Adaptable (lent/rapide)
•	✅ Pas d'équipement (sauf bonnes chaussures)
Optimisation de la Marche :
Types de Marche :
1. Marche Modérée (Base) :
•	Vitesse confortable
•	Peut parler facilement
•	30-60 min/jour
•	Idéal : quotidien
2. Marche Rapide (Progression) :
•	Rythme soutenu
•	Respiration accélérée mais peut parler
•	Fréquence cardiaque 50-70% max
•	20-40 min, 4-5×/semaine
3. Marche Intervalles (Avancé) :
•	Alterner : 2 min rapide / 1 min modéré
•	Challenge cardiovasculaire
•	Brûlage calories ++
•	20-30 min, 3-4×/semaine
Parcours Béninois Suggestions :
•	Bord de mer/plage (sable = + effort)
•	Parcs publics
•	Quartiers calmes tôt matin
•	Marché (actif + social)
•	Tour du quartier programmé
Progression Marche :
Mois 1 : 30 min/jour, rythme modéré Mois 2 : 40 min/jour OU 30 min rythme plus rapide Mois 3 : 45-60 min/jour OU introduction intervalles Mois 4+ : Variation types de marche
Alimentation Marcheur :
•	Collation légère avant si marche matinale (banane)
•	Hydratation ++
•	Repas normaux selon niveau activité
RÉPONSE : Yoga
Excellent pour Flexibilité, Stress, Équilibre
Avantages Yoga :
•	✅ Faible impact
•	✅ Réduit stress (bénéfice TA)
•	✅ Améliore flexibilité
•	✅ Renforce muscles profonds
•	✅ Connexion corps-esprit
•	✅ Adaptable tous niveaux
Mais Attention :
•	❌ Seul : insuffisant pour perte de poids optimale
•	❌ Faible dépense calorique vs cardio
Yoga Optimal = Complément, Pas Unique Activité
Plan Complet :
•	Yoga : 2-3×/semaine (flexibilité, relaxation)
•	AJOUTER Cardio : 3-4×/semaine (marche, danse)
•	Total : 5-6 jours activité/semaine
Types Yoga Accessibles :
1. Hatha Yoga (Doux) :
�";

            case 'fc_connaissance':
                return "��	Idéal débutants
•	Postures basiques
•	Respiration
•	Relaxation
2. Vinyasa Yoga (Plus Dynamique) :
•	Enchaînements fluides
•	
o	Cardio
•	Intermédiaire
Yoga à Domicile Béninois :
•	Natte ou pagne épais au sol
•	Vidéos YouTube gratuites
•	20-30 min matin ou soir
•	Espace calme
Postures Bénéfiques Hypertension/Obésité :
•	✅ Postures douces, respirations profondes
•	✅ Torsions (massage organes)
•	❌ Éviter inversions complètes si TA non contrôlée
RÉPONSE : Danse
EXCELLENT - Cardio + Plaisir !
Avantages Danse :
•	✅ Cardio intense
•	✅ Brûlage calories élevé
•	✅ Plaisir/musique (motivation)
•	✅ Social possible
•	✅ Culturellement ancré (Bénin)
•	✅ Pas de gym nécessaire
Styles Danse Béninois :
•	Danse traditionnelle (Agbadja, Tchinkounme, etc.)
•	Coupé-décalé
•	Afrobeats
•	Zumba (si cours disponibles)
•	Danse libre chez soi
Programme Danse Maison :
•	30-45 min/session
•	4-5×/semaine
•	Playlist musique aimée
•	Chez soi (zéro gêne)
Intensité :
•	Commencer modérée (20 min)
•	Augmenter durée + intensité progressivement
•	Objectif : transpirer, être essoufflé (mais pouvoir parler)
Alimentation Danseur :
•	Glucides suffisants (énergie)
•	Hydratation avant/pendant/après
•	Collation 1h avant si besoin
Danse = Équivalent :
•	30 min danse énergique = 45 min marche rapide
•	Dépense : 200-400 cal/session selon intensité
RÉPONSE : Natation
EXCELLENT Si Accès Possible
Avantages Natation :
•	✅✅✅ MEILLEUR pour obésité (zéro impact articulations)
•	✅ Cardio complet
•	✅ Tous muscles sollicités
•	✅ Rafraîchissant (climat chaud)
•	✅ Sensation légèreté (eau porte)
Inconvénient :
•	❌ Accès limité (piscines rares/payantes)
•	❌ Mer : possible mais vigilance (courants, sécurité)
Si Accès Mer/Piscine :
•	Idéal 2-3×/semaine minimum
•	30-45 min/session
•	Nage lente mais continue
•	Progresser en durée
Sécurité Mer :
•	Jamais seul
•	Zones surveillées
•	Attention courants
•	Rester près du bord si débutant
RÉPONSE : Vélo
Bon Si Accessible
Avantages :
•	Cardio
•	Faible impact
•	Transport actif possible
Béninois Context :
•	Circulation parfois dangereuse (Cotonou, etc.)
•	Terrain variable
•	Chaleur
Si Pratiqué :
•	Vélo transport quotidien = activité intégrée
•	30+ min/jour
•	Hydratation ++
•	Protection solaire
RÉPONSE : \"Je n'aime rien\" / \"Aucune idée\"
Défi Commun - Solutions Créatives
Stratégie : Tester Plusieurs Activités
Liste Béninoise à Essayer (1 mois chacune) :
Mois 1 : Marche
•	Le + accessible
•	30 min/jour
•	Seul ou groupe
Mois 2 : Danse Maison
•	Musique préférée
•	20 min/jour
•	Fun garanti
Mois 3 : Activités Ménagères Intenses
•	Compter comme exercice
•	Ménage énergique 45 min
•	Jardinage actif
Mois 4 : Exercices Maison (Vidéos)
•	YouTube gratuit
•	Programmes débutants
•	Variété
Après 4 mois → Identifier ce qui a été le moins pénible = continuer celui-là
Activités \"Cachées\" (Mouvement Sans Avoir l'Air de Faire du Sport) :
•	Jouer avec enfants/neveux
•	Aller au marché à pied
•	Laver voiture/moto énergiquement
•	Ranger maison
•	Cuisiner debout actif (pas assis)
Principe : TOUT MOUVEMENT COMPTE. Pas besoin \"sport\" officiel. Bouger suffisant !
NB :Si user choisit autre activité physique qu’il préfère hormis marche et yoga, tu lui balance les autres activ";

            case 'stress_ennui':
                return "ités se trouvant en haut pour mla question précédentes




QUESTION : Connaissez-vous votre fréquence cardiaque au repos ?
OUI - Si Fréquence Donnée :
Interprétation Fréquence Cardiaque Repos (FCR) :
< 60 bpm :
•	Excellent (athlète)
•	Rare si sédentaire/obésité
•	Si présent + fatigue → consulter (bradycardie ?)
60-80 bpm :
•	Normal-Bon
•	Objectif santé
80-100 bpm :
•	Limite haute normale
•	Amélioration souhaitable
> 100 bpm :
•	⚠️ Tachycardie
•	Causes possibles : 
o	Déconditionnement
o	Hypertension
o	Stress chronique
o	Hyperthyroïdie
o	Médicaments
•	→ Consultation médicale recommandée
Avec Activité Physique Régulière :
•	FCR baisse de 5-25 bpm sur 3-6 mois
•	Signe amélioration cardiovasculaire
•	Mesure progrès objective
Suivi Conseillé :
•	Mesure FCR chaque lundi matin
•	Au réveil, avant lever
•	1 min pouls poignet ou cou
•	Noter dans journal


Zones Cibles Exercice (Selon Âge) :
Utilisation pour optimiser :
•	Zones d'effort : Calcul votre nutrition pour connaitre votre zone d’entrainement enfin de pouvoir guider votre proportion lipide/glucide :
•	Calcul de votre fréquence cardiaque maximale FC max : 
Pour effectuer ce calcul, nous allons utiliser la formule de Tanaka qui est FCmax = 208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm] dont l’unité est le bpm (battement par minute). Ensuite pour vous aller suivre votre zone cible en fonction de votre niveau d’activité pour suivre des recommandations suivantes qui se résume dans le tableau suivant : 


Niveau d’activité	% FCmax (zone cible)	Zone d’effort	Activités physiques adaptées	Recommandations nutritionnelles
Sédentaire (débutant)	50 – 60 %	Zone santé (échauffement, mise en route douce)	Marche lente, vélo d’appartement à faible résistance, aquagym douce	Réduction du sel (< 5 g/j), hydratation régulière, augmentation des fibres (fruits, légumes, légumineuses), limiter graisses saturées
Légèrement actif	60 – 65 %	Zone de confort aérobie	Marche rapide, vélo léger, natation tranquille, danse douce	Portions contrôlées, privilégier les céréales complètes, limiter sucres rapides, augmenter apport en potassium (banane, légumineuses, patate douce) pour tension artérielle
Modérément actif	65 – 70 %	Zone cardio (endurance)	Marche nordique, vélo modéré, aquagym dynamique, tapis roulant	Éviter plats préparés/salés, consommer protéines maigres (poisson, volaille sans peau), laitages allégés, surveiller l’apport calorique
Très actif	70 – 75 %	Zone contrôle du poids (brûlage des graisses + amélioration cardio)	Vélo elliptique, natation soutenue, circuit training adapté, danse énergique	Fractionner les repas, augmenter légumes + fruits frais, réduire caféine/alcool, consommer acides gras insaturés (huile d’olive, noix, avocat)
Extrêmement actif (avancé, sous suivi médical obligatoire)	75 – 80 %	Zone haute intensité (prudence avec hypertension)	HIIT doux supervisé, cardio mixte en salle, natation intense, step modéré	Surveillance médicale obligatoire, alimentation DASH (faible sel, riche en fibres, potassium, calcium, magnésium), éviter excitants, privilégier cuisson vapeur/grillade
Durant Exercice :
•	Viser zone modérée débutant
•	Progresser vers zone intense
NON :
Conseils : Apprendre à mesurer
Méthode Manuelle (Gratuite) :
1. Choisir Point Pouls :
•	Poignet (artère radiale)
•	Cou (artère carotide) - attention doucement
2. Compter :
•	60 secondes complètes
•	OU 30 secondes x2
•	OU 15 secondes x4 (moins précis)
3. Moment Mesure :
•	Matin au réveil
•	Allongé, calme
•	Avant lever, café
4. Noter :
•	Créer tableau suivi
•	Observer évolution
Alternative : Applications téléphone (utilisant caméra/flash) - précision variable
QUESTION : Mangez-vous souvent par stress ou ennui ?
OUI :";

            case 'finir_assiette':
                return "⚠️ ALIMENTATION ÉMOTIONNELLE - Enjeu Psychologique Majeur
Cercle Vicieux : Stress/Ennui → Manger → Culpabilité → Stress → Manger...
Pourquoi On Mange Émotionnellement :
•	Nourriture = confort temporaire
•	Libération dopamine (plaisir)
•	Distraction émotions négatives
•	Habitude conditionnée
Mais :
•	Ne résout PAS problème sous-jacent
•	Ajoute culpabilité, prise de poids
•	Aggrave stress à long terme
Stratégies Gestion Alimentation Émotionnelle :
1. Identifier Triggers (Déclencheurs) :
Tenir Journal Émotions-Nourriture (2 Semaines) :
Patterns Communs :
•	Après-midi seul → ennui
•	Soir après travail → stress
•	Weekend → solitude
•	Conflit relationnel → tristesse
2. Distinguer Faim Physique vs Émotionnelle :
Faim Physique :
•	Progressive
•	Estomac gargouille
•	N'importe quel aliment convient
•	Après repas = satisfait
•	Pas de culpabilité
Faim Émotionnelle :
•	Soudaine, urgente
•	Envie spécifique (sucré, gras)
•	Estomac pas vide
•	Manger jusqu'à inconfort
•	Culpabilité après
3. Stratégies Alternatives NON-Alimentaires :
Si STRESS :
•	Respiration profonde (5 min)
•	Marche extérieur (10 min)
•	Appeler ami/famille
•	Écrire dans journal
•	Musique relaxante
•	Tisane chaude (rituel réconfort sans calories)
•	Prière/méditation
Si ENNUI :
•	Activité manuelle (tricot, dessin)
•	Sortir maison (marche, courses)
•	Ranger/nettoyer zone
•	Lire livre/magazine
•	Appeler quelqu'un
•	Hobby oublié
Si TRISTESSE :
•	Pleurer (libération saine)
•	Parler à proche
•	Écrire émotions
•	Activité douce (marche nature)
•	Écouter musique
•	Câlin animal domestique (si applicable)
Si COLÈRE :
•	Exercice physique intense (évacuation)
•	Frapper oreiller
•	Écrire lettre colère (ne pas envoyer)
•	Marche rapide
•	Crier dans endroit isolé
4. Restructuration Environnement :
À la Maison :
•	Supprimer aliments réconfort (biscuits, chips, sodas)
•	Si impossible (famille) → ranger hors vue
•	Avoir alternatives saines visibles (fruits, légumes coupés)
•	Zone \"réconfort\" sans nourriture (coin lecture, terrasse)
5. Techniqu";

            case 'regime_particulier':
                return "e HALT (Avant de Manger) :
Se demander : \"";

            case 'regime_efficacite':
                return "Suis-je...\"
•	Hungry (Affamé) ?
•	Angry (En colère) ?
•	Lonely (Seul) ?
•	Tired (Fatigué) ?
Si NON hungry → émotion, pas faim → stratégie alternative
6. Règle des 10 Minutes :
Envie manger émotionnellement →
1.	PAUSE 10 minutes
2.	Boire grand verre d'eau
3.	Activité alternative
4.	Réévaluer après 10 min
5.	Souvent, envie disparue
7. Eating Mindful (Alimentation Consciente) :
Si Décision de Manger :
•	Assiette (pas paquet direct)
•	S'asseoir table
•	Sans écran
•	Manger LENTEMENT
•	Savourer chaque bouchée
•	Arrêter quand 80% satisfait
8. Auto-Compassion (Pas Culpabilité) :
Si Écart Émotionnel :
•	Normal, humain
•	Pas \"échec\"
•	Apprendre, pas punir
•	Reprendre normalité repas suivant
•	Pas compensation restrictive
9. Support Professionnel Si Nécessaire :
Si Alimentation Émotionnelle :
•	Quotidienne
•	Incontrôlable
•	Quantités très importantes
•	Avec vomissements/purges
•	Impacte vie sociale/travail
→ Consulter psychologue spécialisé TCA (Troubles Comportement Alimentaire)
Aliments Béninois \"Réconfort Sain\" (Si Vraiment Besoin Manger) :
•	Tisane kinkeliba chaude sucrée au miel (réconfort, peu calories)
•	Soupe légère légumes (chaud, réconfortant, nutritif)
•	Fruits frais (sucre naturel, vitamines)
•	Petite poignée noix (croquant, gras sains, satiété)
vs Éviter Réconforts Malsains :
•	Biscuits sucrés
•	Chips salées
•	Pâtisseries
•	Sodas
•	Fritures
NON :
Évaluation : EXCELLENT
Bénéfice :
•	Relation saine avec nourriture
•	Alimentation réponse besoins physiques (pas émotionnels)
•	Facilite contrôle poids
Maintien :
•	Continuer écoute signaux faim/satiété
•	Vigilance si période stress future (prévention rechute)
•	Stratégies gestion stress non-alimentaires en place





QUESTION : Avez-vous tendance à finir votre assiette même si vous n'avez plus faim ?
OUI :
Problème Courant - Éducation Culturelle
Origines :
•	\"Finis ton assiette\" (enfance)
•	\"Ne gaspille pas\"
•	Respect cuisinier
•	Peur manque
Mais :
•	Ignore signaux satiété naturels
•	Surconsommation calories
•	Estomac surdistendu
•	Prise de poids
Ré-apprentissage Signaux Faim/Satiété :
Échelle Faim-Satiété (1-10) :
1-2 : Affamé, faible 3-4 : Faim modérée, estomac vide 5 : Neutre 6-7 : Satisfait, confortable 8-9 : Trop plein, inconfort 10 : Douleur, très inconfortable
Objectifs :
•	Manger quand 3-4
•	Arrêter quand 7 (pas 9-10 !)
Stratégies Pratiques :
1. Servir Portions Plus Petites :
•	Utiliser assiettes plus petites (illusion visuelle)
•	Servir 80% de la portion habituelle
•	Se resservir si vraiment encore faim après 20 min
2. Manger Lentement (20-30 Min/Repas) :
•	Poser fourchette entre bouchées
•	Mâcher longuement (20-30 fois)
•	Boire eau entre bouchées
•	Conversation si repas social
Pourquoi : Signal satiété cerveau prend 20 min
3. Pause Milieu de Repas :
•	À mi-assiette → PAUSE 2 min
•	Évaluer faim (échelle 1-10)
•	Si 7 → ARRÊTER
•	Si 5-6 → continuer lentement
4. Restes = OK :
•	Garder pour plus tard
•	Donner à autre membre famille
•	Compost/animaux
•	Mieux \"gaspiller\" que surcharger corps
Nouvelle Mentalité : ❌ \"Finir assiette = vertu\" ✅ \"Écouter corps = vertu\"
5. Servir Directement Portions Justes :
•	Apprendre tailles portions saines : 
o	Féculent : poing
o	Protéine : paume main
o	Légumes : 2 poings
o	Gras : pouce
6. Technique \"Assiette Divisée\" :
•	½ assiette = légumes
•	¼ = féculent
•	¼ = protéine
•	Finir légumes en premier (remplissage sain)
7. Éviter Distractions Pendant Repas :
•	❌ TV, téléphone, écrans
•	✅ Focus nourriture, sensations
•	Conscience accrue satiété
8. Affirmation Positive : Si Culpabilité Laisser :
•	\"J'écoute mon corps\"
•	\"Je respecte ma satiété\"
•	\"Je nourris ma santé, pas nettoie assiette\"
NON :
Évaluation : EXCELLENT
Capacité d'Écoute Corps :
•	Signaux satiété respectés
•	Contrôle portions naturel
•	Facilite perte/maintien poids
Maintien :
•	Continuer cette pratique saine
•	Modèle pour enfants/proches (si applicable)
QUESTION : Avez-vous déjà suivi un régime alimentaire particulier ?
OUI - Si oui, lequel, et a-t-il été efficace ? Pourquoi ?
Analyse Régimes Courants :
RÉGIME  \"Jeûne Intermittent\" (16/8, 5:2, etc.)
Efficacité :
•	✅ Si bien fait : perte poids
•	✅ Simplicité (pas comptage calories)
•	⚠️ Non adapté à tous
Pour Obésité + Hypertension + Médicaments :
•	⚠️ ATTENTION 
o	Si diabète/médicaments glycémie → risque hypoglycémie
o	Si médicaments à prendre avec nourriture → conflit
o	Hypertension parfois aggravée (stress jeûne)
Avis : Consulter médecin AVANT. Pas recommandé sans supervision si médicaments.
Si Suivi et Efficace :
•	Identifier pourquoi : structure ? simplicité ?
•	Adapter version modérée : exemple 12/12 (dîner tôt, petit-dej tardif)
Si Suivi et Échec :
•	Identifier pourquoi : faim excessive ? hypoglycémie ? insoutenable ?
•	Ne PAS répéter
•	Adopter approche plus équilibrée
RÉGIME : \"Low Carb\" / \"Keto\" (Très pauvre glucides)
Principes :
•	Glucides <50g/jour (keto) ou <100g (low carb)
•	Lipides et protéines élevés
**Efficacité
Continuer
2 janv.
Court Terme :**
•	✅ Perte poids rapide initiale (eau surtout)
•	✅ Satiété (protéines/lipides)
Problèmes :
•	❌ Soutenabilité faible long terme
•	❌ Privation glucides = frustration
•	❌ Carences possibles (fibres, vitamines)
•	❌ Non adapté culture béninoise (riz, igname = bases)
•	❌ Effet rebond important si arrêt
Pour Obésité + Hypertension :
•	⚠️ Lipides élevés peuvent impacter lipides sanguins
•	⚠️ Keto-flu (fatigue, maux tête début)
Avis : Non recommandé long terme. Si envie réduire glucides → version modérée (40-45%, IG bas) préférable.
Si Suivi et Échec :
•	Normal, difficilement soutenable
•	Adopter approche équilibrée avec glucides IG bas

RÉGIME : \"Paléo\" (Comme ancêtres chasseurs-cueilleurs)
Principes :
•	Viandes, poissons, fruits, légumes, noix
•	Exclut : céréales, légumineuses, produits laitiers
Efficacité :
•	✅ Aliments non transformés (positif)
•	✅ Légumes/fruits abondants (positif)
Problèmes :
•	❌ Exclusion légumineuses (haricots) = perte source protéines/fibres excellente
•	❌ Exclusion céréales complètes (avoine, riz complet) = perte fibres
•	❌ Coût élevé (viandes)
•	❌ Non adapté contexte béninois
Avis : Principes intéressants (non transformé) mais restrictions excessives. Adapter : garder légumineuses et céréales complètes.
RÉGIME : \"Substituts Repas\" (Shakes, barres)
Principes :
•	Remplacer 1-2 repas/jour par shake protéiné
Efficacité Court Terme :
•	✅ Perte poids (déficit calorique facile)
•	✅ Simplicité
Problèmes Majeurs :
•	❌ Non soutenable à vie
•	❌ N'apprend PAS à manger sainement
•	❌ Dès arrêt → reprise poids
•	❌ Ennui, frustration
•	❌ Coût élevé
•	❌ Manque fibres, nutriments complets
Avis : ÉVITER. Privilégier vrais aliments, apprendre à cuisiner sainement.
RÉGIME : \"Détox\" / \"Jus\" / \"Citron le Matin\"
Principes :
•	Jus légumes/fruits uniquement
•	Ou eau citronnée à jeun
•	\"Nettoyer\" corps
Réalité Scientifique :
•	❌ AUCUNE preuve scientifique \"détox\"
•	❌ Corps a organes détoxification (foie, reins) - fonctionnent seuls
•	❌ Jus = perte fibres + sucres concentrés
•	❌ Déficits protéines/lipides
Eau Citronnée le Matin :
•	Pas de mal, pas de bénéfice majeur
•	Si aimé : OK
•	Si croyance \"détox\" : démystifier
Avis : Oublier \"détox\". Focus alimentation équilibrée = vraie \"détox\".
RÉGIME : \"Index Glycémique Bas\"
Principes :
•	Choisir glucides IG <55
•	Éviter pics glycémiques
Efficacité :
•	✅✅✅ EXCELLENT pour obésité + hypertension + diabète/prédiabète
•	✅ Base scientifique solide
•	✅ Soutenable long terme
•	✅ Adapté contexte béninois (riz complet, igname, patate douce)
Avis : RECOMMANDÉ. C'est la base de ce guide alimentaire !
Si Suivi et Efficace :
•	CONTINUER
•	Perfectible avec autres principes (portions, activité)
RÉGIME : \"Méditerranéen\"
Principes :
•	Légumes, fruits, poissons, huile d'olive, noix, céréales complètes
•	Viande rouge limitée
Efficacité :
•	✅✅✅ EXCELLENT santé cardiovasculaire
•	✅ Études robustes
•	✅ Soutenable
•	✅ Délicieux
Adaptation Béninoise :
•	Remplacer olives/huile d'olive par : huile d'olive importée (accessible) + avocat local
•	Poissons locaux abondants (parfait)
•	Légumes/fruits locaux
•	Noix de cajou locales
Avis : FORTEMENT RECOMMANDÉ. Compatible avec principes ce guide.
RÉGIME : \"DASH\" (Dietary Approaches to Stop Hypertension)
Principes :
•	Spécifiquement conçu HYPERTENSION
•	Riche : fruits, légumes, produits laitiers allégés, grains complets
•	Pauvre : sodium, graisses saturées, sucres
Efficacité :
•	✅✅✅ PROUVÉ réduire TA 8-14 mmHg
•	✅ Parfait obésité + hypertension
Avis : EXCELLENT. Base scientifique solide pour votre profil. Compatible guide.
Si Régimes Multiples Passés = Yo-Yo :
Analyse :
•	Chaque régime = perte + reprise
•	Métabolisme endommagé
•	Découragement
Nouvelle Approche :
•	❌ STOP \"régimes\"
•	✅ START \"lifestyle\"
Différence :
•	Régime = temporaire, privation, souffrance
•	Lifestyle = permanent, équilibre, plaisir
Plan :
•	Changements progressifs
•	Durables à vie
•	Pas perfection
•	90% sain, 10% flex
NON (Jamais Suivi Régime Particulier) :
Évaluation : Page blanche, opportunité !
Avantages :
•	Pas d'échecs passés décourageants
•	Métabolisme intact
•	Aucune restriction mentale
Approche :
•	Partir sur bases saines dès début
•	Lifestyle équilibré (pas \"régime\")
•	Éducation nutritionnelle complète
•	Patience, long terme";

            default:
                return 'Aucun';
        }
    }
}
