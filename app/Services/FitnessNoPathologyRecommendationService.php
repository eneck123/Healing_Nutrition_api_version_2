<?php

namespace App\Services;

class FitnessNoPathologyRecommendationService implements RecommendationServiceInterface
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = [], int $age = 30): string
    {
        switch ($key) {
            case 'meds_lies':
                return "N 3 : Prenez-vous des médicaments liés à votre antécédent ?
RÉPONSE : OUI
Conseils généraux :
1.	Respecter horaires de prise
2.	Ne jamais interrompre sans avis médical
3.	Surveiller interactions aliment-médicament
4.	Contrôles réguliers
5.	Carnet de suivi
Adaptations alimentaires si sous traitement :
Timing des repas avec médicaments :
•	Médicaments à jeun (ex: Levothyrox) : Prendre 30-60 min avant petit-déjeuner 
o	Petit-déjeuner retardé : Akassa + œufs + fruits
•	Médicaments pendant repas (ex: Metformine) : 
o	Prendre au milieu du repas principal
o	Repas suggéré : Riz complet + sauce légumes + poisson + salade
•	Médicaments après repas (ex: certains anti-inflammatoires) : 
o	Attendre 15-30 min après manger
o	Repas léger : Bouillie + fruits + arachides
Repas compatibles avec traitements :
Petit-déjeuner sous traitement :
•	Option A : Bouillie de sorgho (200g) + 2 œufs + fruits + 10g arachides (APRÈS prise médicament à jeun si nécessaire)
•	Option B : Akassa (200g) + omelette légumes + poisson grillé + orange
Déjeuner sous traitement :
•	Option A : Riz complet (portions selon activité) + sauce tomate maison + poulet (100g) + légumes (250g) - PRISE MÉDICAMENT AU MILIEU
•	Option B : Pâte de maïs + sauce légumes verts + poisson (100g) + salade
Dîner sous traitement :
•	Option A : Igname bouillie + sauce claire + poisson (100g) + légumes
•	Option B : Attiéké + poisson grillé + salade abondante
Collations compatibles :
•	Fruits frais (pas d'interaction)
•	Arachides nature (15g)
•	Noix de cajou (12 unités)
•	Légumes crus
⚠️ PRÉCAUTIONS IMPORTANTES :
Si anticoagulants (ex: Warfarine) :
•	Maintenir apport CONSTANT en vitamine K
•	Légumes verts : quantité régulière chaque jour
•	PAS de variations importantes
•	Éviter : pamplemousse, cranberry en excès
Si statines (cholestérol) :
•	INTERDICTION : pamplemousse et jus pamplemousse
•	Augmenter fibres
•	Privilégier oméga-3
Si diurétiques (HTA) :
•	Surveiller potassium (bananes, oranges, avocat)
•	Hydratation suffisante
•	Réduire sel
Si bêta-bloquants :
•	Pas d'interaction alimentaire majeure
•	Surveiller glycémie si diabétique
RÉPONSE : NON (Pas de médicaments)
Conseils alimentaires préventifs :
1.	Prévention par l'alimentation reste cruciale
2.	Surveiller facteurs de risque
3.	Consultations régulières
4.	Mode de vie sain prioritaire
Repas préventifs :
Petit-déjeuner préventif :
•	Option A : Bouillie de mil (portions selon activité) + 2 œufs + banane plantain bouillie + 15g arachides + 1 orange
•	Option B : Pain complet + omelette légumes + avocat + fruits
Déjeuner préventif :
•	Option A : Riz complet + sauce tomate maison + poulet local (100g) + légumes variés (200g) + huile modérée
•	Option B : Pâte rouge + sauce graine légère + poisson (100g) + épinards et gboma
Dîner préventif :
•	Option A : Télibo + sauce d'arachide + viande maigre (90g) + légumes
•	Option B : Couscous de maïs + sauce légumes + poisson grillé (100g)
Collations préventives :
•	Fruits de saison variés (mangue, papaye, orange, banane)
•	Arachides grillées non salées (15-20g)
•	Noix de cajou nature (12-15 unités)
•	Wagasi grillé (50g)
•	Légumes crus (carotte, concombre)
Hydratation :
•	Eau : 2-3 litres/jour
•	Infusions : gingembre, citronnelle
•	Bissap maison sans sucre
•	Eau de coco naturelle
💊 QUESTION 4 : Si oui, lesquels ? (Question à saisie - nom des médicaments).
Exemples de médicaments courants et adaptations :
METFORMINE (Diabète)
Effets secondaires possibles : Troubles digestifs, nausées, diarrhée
Adaptations alimentaires :
1.	Prendre PENDANT les repas (milieu du repas)
2.	Éviter repas trop gras (aggrave troubles digestifs)
3.	Augmenter fibres progressivement
4.	Fractionner repas
Repas adaptés Metformine :
Petit-déjeuner :
•	Option A : Bouillie de sorgho SANS sucre (180g) + 2 œufs + légumes + 10g arachides
•	Option B : Akassa (150g) + omelette légumes + poisson grillé (60g)
Déjeuner (PRISE METFORMINE AU MILIEU) :
•	Option A : Riz complet (portions modérées) + sauce tomate LÉGÈRE + poulet SANS peau (100g) + légumes vapeur (250g)
•	Option B : Haricots rouges (150g) + riz complet (100g) + sauce légère + poisson (100g)
Dîner :
•	Option A : Igname bouillie (portions contrôlées) + sauce claire + poisson (100g) + légumes
•	Option B : Attiéké (150g) + poisson grillé + salade abondante
Collations (OBLIGATOIRES pour éviter hypoglycémie) :
•	10h : 1 orange + 10g arachides
•	16h : 100g papaye + 10 noix cajou
•	21h (si dîner tôt) : Lait + quelques amandes
À ÉVITER :
•	Repas très gras (ralentit absorption)
•	Alcool (risque hypoglycémie)
•	Sauter des repas
STATINES (Cholestérol - ex: Atorvastatine, Simvastatine)
Effets : Baisse cholestérol, possibles douleurs musculaires
INTERDICTION ABSOLUE : PAMPLEMOUSSE
Adaptations alimentaires :
Petit-déjeuner :
•	Option A : Bouillie d'avoine (220g) + 2 blancs d'œufs + 1 jaune + graines de lin + banane + noix
•	Option B : Pain complet + avocat + tomate + œufs + ORANGE (PAS pamplemousse)
Déjeuner :
•	Option A : Riz complet + haricots rouges (150g - fibres solubles) + poisson gras (100g) + légumes + huile d'olive
•	Option B : Pâte complète + sauce légumes verts + poisson frais + huile de colza
Dîner :
•	Option A : Igname + sauce légumes + poisson blanc + salade huile d'olive
•	Option B : Attiéké + sardine grillée + salade mixte
Aliments ANTI-CHOLESTÉROL :
•	Avoine (bêta-glucanes)
•	Haricots rouges (fibres solubles)
•	Poissons gras (oméga-3) : maquereau, sardine
•	Noix et amandes
•	Avocat (graisses mono-insaturées)
•	Légumes verts (fibres)
•	Huile d'olive
INTERDICTIONS :
•	Pamplemousse et jus pamplemousse (interaction médicamenteuse DANGEREUSE)
•	Huile de palme rouge (limiter au maximum)
•	Viandes grasses
•	Abats (foie, rognons)
•	Jaunes d'œufs en excès (max 3/semaine)
•	Fritures
ANTIHYPERTENSEURS (IEC, ARA2, Bêta-bloquants, Diurétiques)
Diurétiques (ex: Furosémide, Hydrochlorothiazide) :
Attention : Perte de potassium
Alimentation riche en potassium :
Petit-déjeuner :
•	Option A : Bouillie + 2 œufs + BANANE (riche potassium) + lait + 10g arachides
•	Option B : Akassa + omelette + AVOCAT (riche potassium) + orange
Déjeuner :
•	Option A : Riz complet + sauce tomate MAISON (zéro sel) + poulet + épinards et gboma (potassium, magnésium) + haricots verts
•	Option B : Haricots rouges (potassium) + riz + sauce légère + poisson
Dîner :
•	Option A : Igname bouillie + sauce légumes + poisson + salade
•	Option B : Attiéké + poisson + salade tomate/concombre/oignon
Collations RICHES en potassium :
•	2 bananes douces (EXCELLENT)
•	Avocat
•	Oranges (2)
•	Papaye (200g)
•	Noix de cajou non salées
•	Arachides non salées
ALIMENTS RICHES EN POTASSIUM :
•	Bananes (411mg/100g)
•	Avocat (485mg/100g)
•	Épinards et gboma (558mg/100g)
•	Haricots rouges (405mg/100g)
•	Papaye (182mg/100g)
•	Oranges (181mg/100g)
ATTENTION : Sel ZÉRO (voir adaptations HTA ci-dessus)
IEC/ARA2 (ex: Ramipril, Losartan) :
Attention : Potassium peut augmenter
Ne PAS supplémenter en potassium sans avis médical
Alimentation équilibrée :
Petit-déjeuner :
•	Bouillie + œufs + fruits variés (pas excès bananes) + arachides
Déjeuner :
•	Riz complet + sauce tomate MAISON (zéro bouillon) + poulet + légumes variés
Dîner :
•	Igname + sauce légère + poisson + salade
Modération potassium :
•	Bananes : 1/jour maximum
•	Avocat : 1/2 par jour
•	Surveiller si fatigue, palpitations (hyperkaliémie)
SEL : ZÉRO ajouté
Bêta-bloquants (ex: Propranolol, Aténolol) :
Pas d'interaction alimentaire majeure
Si diabétique ATTENTION :
•	Masquent symptômes hypoglycémie
•	Surveiller glycémie étroitement
•	Collations régulières obligatoires
Alimentation normale selon niveau activité + antécédents
INSULINE
Type d'insuline crucial :
•	Rapide (Novorapid, Humalog) : avant repas
•	Lente (Lantus, Levemir) : même heure chaque jour
•	Mixte : combinaison
RÈGLE ABSOLUE : MANGER après injection rapide (15-30 min)
Adaptations repas insuline :
Petit-déjeuner (APRÈS insuline rapide si prescrite) :
•	Option A : Bouillie sorgho SANS sucre (180g) + 2 œufs + légumes + 10g arachides + 1 orange 
o	Glucides calculés : ~40-50g
•	Option B : Akassa (150g) + omelette légumes + poisson (60g) + 1/2 avocat 
o	Glucides calculés : ~35-40g
Déjeuner (APRÈS insuline rapide) :
•	Option A : Riz complet (150g PESÉ CUIT) + sauce tomate + poulet (100g) + légumes (250g) 
o	Glucides calculés : ~45-50g
•	Option B : Haricots rouges (150g) + riz (100g) + sauce + poisson (100g) 
o	Glucides calculés : ~50-55g
Dîner (APRÈS insuline rapide si prescrite) :
•	Option A : Igname bouillie (120g PESÉE) + sauce légumes + poisson (100g) 
o	Glucides calculés : ~35-40g
•	Option B : Attiéké (150g) + poisson grillé + salade 
o	Glucides calculés : ~40-45g
Collations OBLIGATOIRES (hypoglycémie) :
•	10h : 1 orange + 10g arachides (~15g glucides)
•	16h : 100g papaye + 10 noix cajou (~12g glucides)
•	22h (si insuline lente soir) : Lait + biscuit complet (~15g glucides)
•	URGENCE hypoglycémie : 3 morceaux sucre + jus orange + resucrage
RÈGLES CRITIQUES :
1.	JAMAIS sauter repas/collations
2.	Portions glucides RÉGULIÈRES chaque jour
3.	Carnet glycémique obligatoire
4.	Toujours avoir sucres rapides sur soi
5.	Mesurer glycémie avant repas
6.	Adapter dose selon activité physique
ORLISTAT (Perte de poids - Xenical)
Mécanisme : Bloque absorption 30% graisses
Effets secondaires : Selles grasses si trop de lipides
RÈGLE : Maximum 15g lipides par repas
Repas adaptés Orlistat :
Petit-déjeuner (TRÈS pauvre en graisses) :
•	Option A : Bouillie de sorgho (200g) + 2 blancs d'œufs + 1 jaune + fruits + 5g arachides SEULEMENT 
o	Lipides : ~8g
•	Option B : Akassa (200g) + omelette (2 blancs + 1 jaune) + poisson MAIGRE grillé (80g) + légumes 
o	Lipides : ~10g
Déjeuner (TRÈS pauvre en graisses) :
•	Option A : Riz complet (portions selon activité) + sauce tomate SANS huile + poulet SANS peau (100g) + légumes vapeur 
o	Lipides : ~8-10g
•	Option B : Pâte de maïs + sauce légumes SANS huile + poisson BLANC grillé (100g) 
o	Lipides : ~7-9g
Dîner (TRÈS pauvre en graisses) :
•	Option A : Igname bouillie + sauce claire SANS huile + poisson maigre (100g) + légumes 
o	Lipides : ~6-8g
•	Option B : Attiéké + poisson blanc grillé SANS huile + salade SANS vinaigrette (citron) 
o	Lipides : ~7-9g
Collations SANS graisses :
•	Fruits frais uniquement (mangue, papaye, orange, banane)
•	Légumes crus
•	PAS d'arachides, noix, avocat
INTERDICTIONS STRICTES :
•	Huile de palme
•	Fritures
•	Avocat
•	Arachides en quantité
•	Noix
•	Sauces grasses
•	Viandes grasses
•	Peau de poulet
SUPPLÉMENTATION OBLIGATOIRE :
•	Vitamines A, D, E, K (liposolubles) - prescription médicale
•	Prendre 2h après Orlistat
⚠️ Si selles grasses persistantes : RÉDUIRE encore les lipides
💊 QUESTION 5 : Prenez-vous l'un des types de médicaments suivants ?
☑️ Médicaments pour baisser glycémie (Metformine, Glimepiride...)
Voir adaptations détaillées Metformine ci-dessus
Points clés :
•	Prendre PENDANT repas
•	Collations obligatoires
•	Glucides contrôlés mais réguliers
•	Index glycémique bas
•	Surveillance hypoglycémie
Repas types : Voir section Diabète + Metformine
☑️ Insuline
Voir adaptations détaillées Insuline ci-dessus
Points clés :
•	JAMAIS sauter repas
•	Portions glucides FIXES
•	Manger 15-30 min après injection rapide
•	Collations obligatoires
•	Sucres rapides toujours disponibles
Repas types : Voir section Insuline
☑️ Médicaments pour perdre du poids (Orlistat, Liraglutide...)
ORLISTAT (Xenical) - Voir adaptations détaillées ci-dessus
LIRAGLUTIDE (Victoza, Saxenda) :
Mécanisme : Ralentit vidange gastrique, réduit appétit
Effets secondaires : Nausées, satiété précoce
Adaptations alimentaires :
1.	Repas PETITS et FRÉQUENTS
2.	Manger LENTEMENT
3.	Éviter aliments trop gras
4.	Bien mastiquer
5.	Arrêter si satiété
Petit-déjeuner Liraglutide :
•	Option A : PETITE portion bouillie sorgho (150g) + 1 œuf + quelques légumes + 5g arachides
•	Option B : PETITE portion akassa (150g) + omelette (2 œufs) + poisson grillé (60g)
Déjeuner (FRACTIONNER si nausées) :
•	Option A - Partie 1 (12h) : Riz complet (100g) + sauce légère + poulet (50g)
•	Option A - Partie 2 (14h) : Légumes (200g) + poisson (50g)
Dîner (LÉGER) :
•	Option A : PETITE portion igname (100g) + sauce légumes + poisson (80g)
•	Option B : Attiéké (120g) + poisson grillé (80g) + salade
Collations LÉGÈRES :
•	Fruits frais (portions réduites)
•	Légumes crus
•	Éviter trop de graisses
CONSEILS SI NAUSÉES :
•	Manger froid ou tiède (pas chaud)
•	Gingembre frais (anti-nausée)
•	Boire entre repas (pas pendant)
•	Éviter odeurs fortes
•	Privilégier aliments secs le matin
☑️ Médicaments tension artérielle (IEC, ARA2, Bêta-bloquants...)
Voir adaptations détaillées section Hypertension ci-dessus
Points clés :
•	SEL : ZÉRO ajouté
•	Potassium : selon type médicament 
o	Diurétiques : AUGMENTER potassium (bananes, avocat)
o	IEC/ARA2 : MODÉRER potassium
•	Bouillons cubes : INTERDITS
•	Poisson fumé : TRÈS limité
Repas types : Voir section HTA + adaptations par molécule
☑️ Médicaments cholestérol";

            case 'journee_typique':
                return "(Statines)
Voir adaptations détaillées Statines ci-dessus
Points clés :
•	PAMPLEMOUSSE : INTERDIT
•	Fibres solubles : AUGMENTER (avoine, haricots)
•	Oméga-3 : AUGMENTER (poissons gras)
•	Graisses saturées : RÉDUIRE drastiquement
•	Huile de palme : LIMITER au maximum
Repas types : Voir section Statines
☑️ Aucun de ces médicaments
Alimentation préventive :
•	Suivre plans de base selon niveau activité
•	Appliquer recommandations selon antécédents (si présents)
•	Prévention reste cruciale
•	Surveiller poids, tension, glycémie régulièrement
Repas types : Plans de base par niveau d'activité (Partie 1)
PARTIE 3 : ADAPTATIONS SELON HABITUDES ALIMENTAIRES
🍽️ QUESTION 6 : Pouvez-vous décrire une journée typique de vos repas et collations ?
Instructions d'analyse :
L'analyse de la journée typique permet d'identifier :
1.	Erreurs alimentaires récurrentes
2.	Déséquilibres nutritionnels
3.	Moments de faim/fringales
4.	Portions inadaptées
5.	Manques ou excès
Exemples d'analyses et corrections :
EXEMPLE 1 : Journée typique déséquilibrée
Description utilisateur : \"Le matin je prends du café avec du pain et du beurre. À midi je mange de la pâte rouge avec beaucoup de sauce graine et viande. Le soir juste un peu de bouillie ou rien. Je grignote des beignets et des cacahuètes salées dans la journée.\"
ANALYSE : ❌ Petit-déjeuner : Très pauvre en protéines ❌ Déjeuner : Trop gras (sauce graine en excès) ❌ Dîner : Insuffisant, risque hypoglycémie nocturne ❌ Grignotages : Fritures, sel excessif ❌ Pas de fruits/légumes ❌ Hydratation non mentionnée
CORRECTIONS CIBLÉES :
NOUVEAU petit-déjeuner :
•	Remplacer : Café + pain + beurre
•	Par Option A : Bouillie de sorgho (200g) + 2 œufs durs + 1 orange + 15g arachides NON salées
•	Par Option B : Akassa (200g) + omelette aux légumes (3 œufs) + 1/2 avocat + 1 banane
Pourquoi : Protéines augmentées, fibres, vitamines, satiété prolongée
NOUVEAU déjeuner :
•	Remplacer : Pâte rouge + beaucoup sauce graine grasse + viande
•	Par Option A : Pâte de maïs (200-300g selon activité) + sauce graine LÉGÈRE (100ml maximum) + viande MAIGRE (80-100g) + LÉGUMES ABONDANTS (épinards, gboma - 250g)
•	Par Option B : Riz complet (220-280g selon activité) + sauce tomate MAISON (zéro bouillon) + poulet SANS peau (100g) + haricots verts, carottes (250g)
Pourquoi : Réduction graisses saturées (sauce graine limitée), augmentation légumes (fibres, vitamines, satiété)
NOUVEAU dîner :
•	Remplacer : Bouillie légère ou rien
•	Par Option A : Igname bouillie (150-200g selon activité) + sauce d'arachide légère (80ml) + poisson grillé (100g) + légumes (200g)
•	Par Option B : Attiéké (180-250g selon activité) + poisson braisé (100g) + salade abondante (concombre, tomate, oignon - 200g) + sauce légère
Pourquoi : Éviter déficit calorique nocturne, protéines pour récupération musculaire, satiété
NOUVELLES collations :
•	Remplacer : Beignets + cacahuètes salées
•	Par Collation 10h : 1 mangue moyenne + 15g arachides NON salées
•	Par Collation 16h : 150g papaye + 12 noix de cajou nature
Pourquoi : Éliminer fritures, réduire sel, apporter vitamines/antioxydants, graisses insaturées saines
HYDRATATION ajoutée :
•	2-3 litres d'eau/jour
•	Bissap maison SANS sucre
•	Infusion gingembre/citronnelle
•	Eau de coco naturelle
EXEMPLE 2 : Journée typique trop restrictive
Description utilisateur : \"Je saute souvent le petit-déjeuner. À midi je mange juste une petite portion de riz avec un peu de sauce. Le soir je prends un fruit. J'ai tout le temps faim mais je veux maigrir vite.\"
ANALYSE : ❌ Apport calorique BEAUCOUP trop faible (risque carences) ❌ Protéines très insuffisantes (perte musculaire) ❌ Jeûne prolongé (ralentissement métabolisme) ❌ Risque compulsions alimentaires ❌ Non soutenable à long terme ❌ Dangereux pour santé
⚠️ INTERVENTION URGENTE :
MESSAGE IMPORTANT : \"Cette restriction est DANGEREUSE. Vous risquez :
•	Perte de muscle (pas de graisse)
•	Ralentissement métabolisme (effet yo-yo)
•	Carences graves (fatigue, chute cheveux, immunité faible)
•	Compulsions alimentaires
•	Reprise de poids amplifiée à l'arrêt
La perte de poids SAINE = 0,5-1 kg/semaine maximum\"
PLAN DE RÉÉQUILIBRAGE PROGRESSIF :
SEMAINE 1-2 : Réintroduction petit-déjeuner
Petit-déjeuner (NON NÉGOCIABLE) :
•	Option A : Bouillie de sorgho (180g) + 2 œufs + 1 orange + 10g arachides
•	Option B : Akassa (180g) + omelette (2 œufs) + 1/2 avocat + légumes
Déjeuner (AUGMENTER portions) :
•	Option A : Riz complet (200g minimum) + sauce tomate + poulet (100g) + légumes (200g)
•	Option B : Pâte de maïs (220g) + sauce légumes + poisson (100g) + épinards
Dîner (AJOUTER protéines + glucides) :
•	Option A : Igname bouillie (150g) + sauce légère + poisson (100g) + légumes (200g)
•	Option B : Attiéké (180g) + poisson grillé (100g) + salade abondante
Collations (AJOUTER) :
•	10h : 1 mangue + 15g arachides
•	16h : 150g papaye + 10 noix cajou
SEMAINE 3-4 : Ajustement portions selon niveau activité
Suivre les plans complets de la Partie 1 selon niveau d'activité réel.
SUIVI :
•	Poids : 1 fois/semaine (pas quotidien)
•	Énergie : noter amélioration
•	Faim : doit être gérable, pas intense
•	Humeur : amélioration attendue
EXEMPLE 3 : Journée typique équilibrée mais portions inadaptées
Description utilisateur : \"Le matin bouillie de mil avec lait et œufs. Midi riz complet avec légumes et poulet. Soir igname avec sauce et poisson. Collations fruits et arachides. Mais je ne perds pas de poids.\"
ANALYSE : ✅ Structure repas excellente ✅ Variété alimentaire ✅ Protéines présentes ✅ Légumes inclus ❓ Portions probablement TROP importantes ❓ Huile/graisses peut-être excessives ❓ Niveau d'activité non correspondant
CORRECTIONS CIBLÉES :
1. PESER les portions";

            case 'boissons':
                return "pendant 2 semaines :
•	Bouillie : 200-300g selon activité (pas \"un bol\")
•	Riz/pâte : 150-350g selon activité (pas \"une assiette\")
•	Viande/poisson : 80-120g (pas \"un morceau\")
•	Huile : MESURER (cuillère à café/soupe, pas \"un peu\")
2. AJUSTER selon niveau d'activité réel :
Si SÉDENTAIRE mais portions \"modérément actif\" :
•	RÉDUIRE : 
o	Bouillie : 200g (pas 300g)
o	Riz/pâte : 150-200g (pas 280g)
o	Huile : 1 c. café (pas 1 c. soupe)
3. VÉRIFIER graisses cachées :
•	Sauce graine : limiter à 100ml
•	Huile de palme : 1 c. café maximum
•	Arachides : PESER 15g (pas poignée)
•	Avocat : 1/2 (pas 1 entier)
4. AUGMENTER activité physique (voir Partie 4)
EXEMPLE 4 : Journée typique avec excès de glucides rapides
Description utilisateur : \"Matin pain blanc avec Nescafé sucré. Midi pâte avec sauce. Soir je bois souvent du Coca ou Youki soda avec du pain. Je mange des bonbons dans la journée.\"
ANALYSE : ❌ Sucres rapides TRÈS excessifs ❌ Index glycémique élevé (pics insuline) ❌ Boissons sucrées (calories vides) ❌ Manque de protéines ❌ Peu de légumes/fruits ❌ Favorise stockage graisse abdominale
CORRECTIONS URGENTES :
ÉLIMINER boissons sucrées :
•	Remplacer Coca/Youki par : 
o	Eau plate
o	Bissap maison SANS sucre
o	Infusion gingembre/citronnelle
o";

            case 'fruits_legumes':
                return "Eau de coco naturelle (sans sucre ajouté)
RÉDUIRE sucres rapides :
•	Remplacer pain blanc par pain complet
•	SUPPRIMER sucre dans café/thé (ou stevia si vraiment nécessaire)
•	ÉLIMINER bonbons → Remplacer par fruits frais
NOUVEAU petit-déjeuner :
•	Remplacer : Pain blanc + Nescafé sucré
•	Par Option A : Bouillie de sorgho SANS sucre (200g) + 2 œufs + 1 orange + 15g arachides + café/thé SANS sucre
•	Par Option B : Pain COMPLET (2 tranches) + omelette légumes (3 œufs) + 1/2 avocat + café SANS sucre
NOUVEAU dîner :
•	Remplacer : Soda + pain
•	Par Option A : Igname bouillie (150-200g) + sauce légère + poisson (100g) + légumes (200g) + EAU/bissap sans sucre
•	Par Option B : Attiéké (180-250g) + poisson grillé (100g) + salade + EAU
NOUVELLES collations :
•	Remplacer : Bonbons
•	Par 10h : 1 mangue (sucres naturels + fibres)
•	Par 16h : 150g papaye + 12 noix cajou
EFFET ATTENDU :
•	Réduction pics glycémiques
•	Meilleure satiété
•	Moins de fringales
•	Perte graisse abdominale facilitée
•	Énergie plus stable
🥗 QUESTION 7 : Combien de portions de fruits et légumes consommez-vous par jour ?
CHOIX : 1-2 portions
ANALYSE : INSUFFISANT (OMS recommande 5 minimum)
RISQUES :
•	Carences vitamines/minéraux
•	Fibres insuffisantes (constipation, satiété faible)
•	Antioxydants manquants
•	Risque maladies chroniques augmenté
PLAN D'AUGMENTATION PROGRESSIVE :
OBJECTIF : Atteindre 5-7 portions/jour
1 portion = 80-100g de fruits OU légumes
SEMAINE 1-2 : Passer à 3-4 portions
Comment intégrer :
Petit-déjeuner (AJOUTER 1 portion fruits) :
•	Bouillie + œufs + 1 orange + arachides
•	Akassa + omelette + 1 banane + poisson
Déjeuner (AJOUTER 1-2 portions légumes) :
•	Riz + sauce + poulet + légumes AUGMENTÉS à 200g (haricots verts + carottes)
•	Pâte + sauce + épinards et gboma 200g + poisson
Dîner (AJOUTER 1 portion légumes OU fruits) :
•	Igname + sauce + poisson + salade 150g
•	Attiéké + poisson + salade mixte 200g
Collation (AJOUTER 1 portion fruits) :
•	16h : 150g papaye + noix cajou
TOTAL SEMAINE 1-2 : 3-4 portions ✓
SEMAINE 3-4 : Passer à 5-6 portions
Petit-déjeuner (2 portions) :
•	Bouillie + œufs + 1 orange + légumes dans omelette (tomates, oignons - 100g) + arachides
Déjeuner (2-3 portions) :
•	Riz + sauce + poulet + légumes 250g (haricots verts, carottes, choux)
Dîner (1-2 portions) :
•	Igname + sauce + poisson + salade abondante 200-250g
Collations (2 portions) :
•	10h : 1 mangue
•	16h : 150g papaye
TOTAL SEMAINE 3-4 : 5-7 portions ✓✓
ASTUCES POUR AUGMENTER FACILEMENT :
1.	Légumes dans TOUS les plats : 
o	Omelette : tomates, oignons, épinards
o	Sauce : DOUBLER les légumes (épinards, gboma, gombo, tomates, oignons, carottes)
o	Salades : accompagner CHAQUE dîner
2.	Fruits en collations SYSTÉMATIQUES : 
o	Matin : 1 fruit
o	Après-midi : 1 fruit
3.	Légumes crus à grignoter : 
o	Bâtonnets carotte, concombre
o	Tomates cerises si disponibles
4.	Bissap, gingembre : compter comme 1/2 portion légumes
VARIÉTÉ FRUITS BÉNINOIS :
•	Mangue
•	Papaye
•	Orange
•	Banane
•	Ananas
•	Pamplemousse (SAUF si statines)
•	Avocat
•	Pastèque
•	Goyave
VARIÉTÉ LÉGUMES BÉNINOIS :
•	Épinards, gboma
•	Gombo
•	Tomates
•	Oignons, échalotes
•	Carottes
•	Haricots verts
•	Choux
•	Concombre
•	Aubergines
•	Poivrons
CHOIX : 3-4 portions
ANALYSE : MOYEN (proche de l'objectif)
PLAN : Passer à 5-7 portions
AJUSTEMENTS SIMPLES :
1.	AJOUTER 1 fruit au petit-déjeuner : 
o	Si absent : ajouter orange, banane, ou mangue
2.	AUGMENTER portions légumes déjeuner/dîner : 
o	Passer de 150g à 200-250g légumes
3.	AJOUTER 1 collation fruit : 
o	10h";

            case 'grignotage':
                return "ou 16h : 1 fruit frais
EXEMPLE JOURNÉE 5-6 portions :
Petit-déjeuner :
•	Bouillie + œufs + 1 orange (1)
Déjeuner :
•	Riz + sauce + poulet + haricots verts 150g (2) + carottes 100g (3)
Dîner :
•	Igname + sauce + poisson + salade mixte 200g (4-5)
Collations :
•	16h : 150g papaye (6)
TOTAL : 6 portions ✓✓
CHOIX : 5 ou plus
ANALYSE : EXCELLENT ✓✓✓
CONSEILS MAINTIEN ET OPTIMISATION :
1.	VARIER les couleurs : 
o	Rouge : tomates, pastèque
o	Orange : carottes, mangue, papaye
o	Vert : épinards, gboma, gombo, avocat
o	Blanc : oignon, chou
o	Violet : aubergine
2.	PRIVILÉGIER fruits/légumes de saison (moins chers, plus frais)
3.	ALTERNER cru et cuit : 
o	Cru : salades, fruits frais (vitamines préservées)
o	Cuit : légumes vapeur, en sauce (meilleure digestibilité)
4.	CONSERVER cette excellente habitude ✓
EXEMPLE JOURNÉE OPTIMALE 7-8 portions :
Petit-déjeuner :
•	Bouillie + œufs + légumes omelette (tomates, oignons - 100g) (1) + 1 orange (2)
Déjeuner :
•	Riz + sauce + poulet + épinards 150g (3) + tomates 100g (4) + carottes 100g (5)
Dîner :
•	Igname + sauce + poisson + salade (concombre 100g (6) + tomate 100g) (7)
Collations :
•	10h : 1 mangue (8)
•	16h : 150g papaye (9)
TOTAL : 8-9 portions ✓✓✓ EXCELLENT
🍪 QUESTION 8 : Grignotez-vous entre les repas ?
RÉPONSE : OUI
ANALYSE : Dépend de QUOI et QUAND
Grignotage peut être :
•	✅ BON si collations saines et planifiées (fruits, noix)
•	❌ MAUVAIS si grignotages non contrôlés (beignets, bonbons, gâteaux)
ÉVALUATION NÉCESSAIRE : Voir question suivante (Si oui, quels aliments ?)
RÉPONSE : NON
ANALYSE : Dépend de la structure des repas
SI repas principaux équilibrés et suffisants : ✓ Pas de grignotage = BIEN
SI repas insuffisants ou trop espacés : ❌ Pas de grignotage = RISQUE hypoglycémie, fringales, compulsions
RECOMMANDATION :
AJOUTER 2 collations planifiées si :
•	Vous avez faim entre repas
•	Fatigue, baisse d'énergie 10h ou 16h
•	Repas espacés >5h
•	Activité physique régulière
•	Diabète ou insuline
Collations saines béninoises :
•	10h : 1 fruit frais + 10-15g arachides non salées
•	16h : 150g papaye + 10-12 noix de cajou
BÉNÉFICES collations planifiées :
•	Évite fringales intenses
•	Stabilise glycémie
•	Prévient compulsions
•	Maintient métabolisme actif
•	Facilite contrôle portions aux repas principaux
🍫 QUESTION 9 : Si oui, quels aliments consommez-vous ? (Question à saisie)
Analyse selon réponse :
EXEMPLE 1 : Grignotages néfastes
Réponse utilisateur : \"Beignets, gâteaux, bonbons, cacahuètes salées, biscuits, sodas, chips\"
ANALYSE : ❌ Fritures (beignets) ❌ Sucres rapides (gâteaux, bonbons, biscuits) ❌ Sel excessif (cacahuètes salées, chips) ❌ Calories vides (sodas) ❌ Graisses trans (biscuits industriels)
IMPACT :
•	Pics glycémiques → stockage graisse
•	Apport calorique excessif
•	Pas de satiété durable
•	Addiction sucre/sel
•	Inflammation
PLAN DE REMPLACEMENT PROGRESSIF :
SEMAINE 1-2 : Remplacer 50% des grignotages
Remplacer :
•	Beignets → Banane plantain bouillie (100g)
•	Bonbons → 1 mangue ou 150g papaye
•	Sodas → Bissap maison SANS sucre ou eau
•	Biscuits → 15g arachides NON salées
Garder temporairement (réduction progressive) :
•	Gâteaux : 2x/semaine maximum (au lieu de quotidien)
•	Cacahuètes salées : remplacer par version NON salée
SEMAINE 3-4 : Remplacer 100% des grignotages
NOUVELLES collations UNIQUEMENT :
•	10h : 1 fruit frais (mangue, orange, banane) + 15g arachides NON salées
•	16h : 150g papaye + 12 noix de cajou nature
•	Si vraiment envie sucré : 1-2 dattes + amandes
Boissons UNIQUEMENT :
•	Eau plate (2-3L/jour)
•	Bissap maison SANS sucre
•	Infusion gingembre/citronnelle
•	Eau de coco naturelle
ÉLIMINER DÉFINITIVEMENT :
•	Beignets
•	Sodas
•	Bonbons
•	Chips
•	Biscuits industriels
•	Gâteaux (sauf occasions spéciales 1x/mois)
EXEMPLE 2 : Grignotages moyens
Réponse utilisateur : \"Fruits, arachides salées, pain, jus de fruits industriels\"
ANALYSE : ✅ Fruits (excellent) ⚠️ Arachides salées (bien mais sel excessif) ⚠️ Pain (index glycémique, portions ?) ❌ Jus industriels (sucres ajoutés)
CORRECTIONS :
CONSERVER :
•	✅ Fruits frais
AMÉLIORER :
•	Arachides salées → Arachides NON salées (réduction hypertension)
•	Portions contrôlées : 15g pesés (pas poignée)
REMPLACER :
•	Pain → Pain COMPLET en petite quantité (50g max) OU fruits supplémentaires
•	Jus industriels → Fruits frais entiers (fibres préservées, pas de sucres ajoutés)
COLLATIONS OPTIMISÉES :
•	10h : 1 orange + 15g arachides NON salées
•	16h : 150g papaye + 12 noix de cajou nature
•	Si besoin : 1 banane + 10g amandes
EXEMPLE 3 : Grignotages excellents
Réponse utilisateur : \"Fruits frais, arachides non salées, noix de cajou, légumes crus (carotte, concombre)\"
ANALYSE : ✅✅✅ EXCELLENT
CONSEILS MAINTIEN :
1.	CONSERVER ces excellentes habitudes
2.	VARIER les fruits : 
o	Mangue, papaye, orange, banane, ananas, goyave, pastèque
3.	VARIER les oléagineux : 
o	Arachides non salées
o	Noix de cajou nature
o	Amandes
o	Noix (si disponibles)
4.	PORTIONS CONTRÔLÉES oléagineux : 
o	15-20g/jour maximum (calories denses)
o	PESER au début (pas poignée)
5.	LÉGUMES CRUS à volonté : 
o	Carotte, concombre, tomate, chou
EXEMPLE COLLATIONS OPTIMALES :
•	10h : 1 mangue + 15g arachides non salées
•	16h : Bâtonnets carotte/concombre + 12 noix de cajou + 100g papaye
CONTINUER AINSI ✓✓✓
EXEMPLE 4 : Grignotages émotionnels
Réponse utilisateur : \"Ça dépend de mon humeur. Quand je suis stressée je mange beaucoup de sucreries, gâteaux, chocolat. Parfois je ne grignote rien pendant des jours puis je mange tout d'un coup.\"
ANALYSE : ❌ Grignotage émotionnel (stress, ennui) ❌ Compulsions alimentaires (restriction puis excès) ❌ Relation malsaine à la nourriture
⚠️ NÉCESSITE APPROCHE SPÉCIFIQUE
STRATÉGIES ANTI-GRIGNOTAGE ÉMOTIONNEL :
1. IDENTIFIER déclencheurs :
•	Stress au travail ?
•	Ennui ?
•	Tristesse ?
•	Fatigue ?
•	Solitude ?
2. ALTERNATIVES au grignotage émotionnel :
Si stress :
•	Respiration profonde (5 min)
•	Marche rapide (10 min)
•	Appel à un proche
•	Musique relaxante
•	Infusion gingembre/citronnelle chaude
Si ennui :
•	Activité manuelle
•	Lecture
•	Appel téléphonique
•	Sortie/promenade
•	Hobby
Si tristesse :
•	Écriture/journal
•	Parler à quelqu'un
•	Activité physique douce (yoga, marche)
•	Bain/douche relaxante
Si fatigue :
•	Sieste (20 min)
•	Étirements
•	Hydratation
•	Sortir prendre l'air
3. STRUCTURE ALIMENTAIRE STRICTE (évite compulsions) :
Repas RÉGULIERS et SUFFISANTS (jamais sauter) :
•	7h : Petit-déjeuner complet
•	10h : Collation planifiée
•	13h : Déjeuner complet
•	16h : Collation planifiée
•	19h : Dîner complet
Collations PLANIFIÉES (évite sentiment restriction) :
•	10h : 1 fruit + 15g arachides (NON NÉGOCIABLE, même si pas faim)
•	16h : 150g papaye + noix cajou (NON NÉGOCIABLE)
Portions SUFFISANTES aux repas :
•	Ne PAS sous-manger (déclenche compulsions)
•	Suivre plans selon niveau activité
•	Manger jusqu'à satiété confortable (pas restriction excessive)
4. COLLATIONS \"SECOURS\" si envie compulsive :
Si vraiment envie irrépressible de grignoter :
LISTE \"AUTORISÉE\" à volonté :
•	Légumes crus : carotte, concombre, tomate, chou
•	Infusions chaudes : gingembre, citronnelle
•	Bissap SANS sucre
•	Eau aromatisée (citron, menthe)
LISTE \"LIMITÉE\" (portions contrôlées) :
•	1 fruit supplémentaire
•	10g arachides non salées supplémentaires
•	1 yaourt nature (si disponible)
INTERDICTION TOTALE accès :
•	Ne PAS avoir chez soi : gâteaux, bonbons, biscuits, sodas
•	Environnement sain = succès facilité
5. SUIVI PSYCHOLOGIQUE recommandé :
•	Consultation psychologue/nutritionniste spécialisé troubles comportement alimentaire
•	Thérapie cognitivo-comportementale (TCC) efficace
•	Groupes de soutien
6. JOURNAL ALIMENTAIRE et ÉMOTIONNEL :
Noter chaque jour :
•	Heure et contenu des repas/collations
•	Émotions avant/après manger
•	Situations déclencheurs
•	Envies grignotages et comment gérées
OBJECTIF : Identifier patterns, progresser
🥤 QUESTION 10 : À quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?
CHOIX : Tous les jours
ANALYSE : TRÈS PROBLÉMATIQUE
BOISSONS SUCRÉES quotidiennes :
IMPACT négatif :
•	330ml Coca = 35g sucre = 7 morceaux sucre
•	Pics glycémiques quotidiens
•	Stockage graisse abdominale
•	Risque diabète type 2 ++
•	Calories vides (zéro nutriment)
•	Addiction au sucre
•	Caries dentaires
ALCOOL quotidien :
IMPACT négatif :
•	Calories élevées (7 kcal/g alcool)
•	Ralentit métabolisme
•	Favorise stockage graisse abdominale
•	Toxique pour foie
•	Interaction médicaments
•	Dépendance
PLAN SEVRAGE PROGRESSIF (Boissons sucrées) :
SEMAINE 1-2 : Réduction 50%
•	Si 3 sodas/jour → Passer à 1,5 (arrondir à 2)
•	Remplacer par : bissap SANS sucre, eau, infusions
SEMAINE 3-4 : Réduction 75%
•	Passer à 1 soda/jour maximum
•	Remplacer par : eau aromatisée (citron, menthe), bissap
SEMAINE 5-6 : Élimination
•	ZÉRO soda (sauf occasions spéciales 1x/mois)
•	Boissons UNIQUEMENT : 
o	Eau plate (2-3L/jour)
o	Bissap maison SANS sucre
o	Infusion gingembre/citronnelle
o	Eau de coco naturelle (SANS sucre ajouté)
o	Eau aromatisée maison
ASTUCES SEVRAGE :
•	Bissap très concentré (goût fort remplace soda)
•	Eau très fraîche avec citron/menthe
•	Boire grand verre d'eau avant chaque envie soda
•	Éliminer accès : ne plus acheter
PLAN RÉDUCTION ALCOOL :
SEMAINE 1-2 : Réduction 50%
•	Si quotidien → Passer à 3-4 jours/semaine
•	Jours sans alcool : eau, bissap, infusions
SEMAINE 3-4 : Réduction 75%
•	Passer à 2 jours/semaine maximum
•	Portions réduites : 1 verre (pas 3-4)
OBJECTIF FINAL :
•	ZÉRO alcool (idéal pour perte poids) OU
•	Maximum 1-2 verres/semaine (occasions)
Si difficulté arrêt alcool → Consulter médecin (dépendance possible)
BOISSONS DE REMPLACEMENT BÉNINOISES :
Bissap (Hibiscus) maison SANS sucre :
•	Infuser feuilles bissap
•	Refroidir
•	Ajouter gingembre, menthe (facultatif)
•	ZÉRO sucre (s'habituer goût naturel)
Infusion gingembre/citronnelle :
•	Gingembre frais râpé + citronnelle
•	Eau bouillante
•	Infuser 10 min
Continuer
22:13
•	Boire chaud ou froid
Eau de coco naturelle :
•	Directement de la noix (SANS sucre ajouté)
•	Riche en électrolytes
•	Rafraîchissant
Eau aromatisée maison :
•	Eau + citron + menthe
•	Eau + concombre + citron
•	Eau + gin";

            case 'sommeil':
                return "gembre + citron
CHOIX : Une fois par semaine
ANALYSE : MOYEN
BOISSONS SUCRÉES 1x/semaine : ⚠️ Acceptable mais non optimal
RECOMMANDATION : Réduire à occasions spéciales (1-2x/mois)
STRATÉGIE :
•	Choisir jour spécifique (ex: dimanche)
•	Limiter à 1 verre (330ml max)
•	Privilégier version \"light\" si absolument nécessaire (bien que non idéal)
•	REMPLACER par bissap maison reste de la semaine
ALCOOL 1x/semaine : ✓ Acceptable si modération
RECOMMANDATION :
•	Limiter à 1-2 verres maximum
•	Privilégier vin rouge (si disponible, antioxydants)
•	Bière locale : 1 petite bouteille max
•	Alcools forts : éviter
•	TOUJOURS accompagner de nourriture (jamais à jeun)
•	Boire eau entre chaque verre alcool
CALORIES ALCOOL (exemples) :
•	Bière 330ml : ~150 kcal
•	Vin rouge 150ml : ~125 kcal
•	Alcool fort (rhum, whisky) 40ml : ~100 kcal
Ne pas oublier ces calories dans bilan journalier

CHOIX : Occasionnellement
ANALYSE : BON ✓
\"Occasionnellement\" = 2-4x/mois maximum
CONSEILS MAINTIEN :
Pour boissons sucrées :
•	Conserver cette fréquence basse
•	Occasions spéciales uniquement (fêtes, sorties)
•	Reste du temps : eau, bissap sans sucre, infusions
Pour alcool :
•	Conserver modération
•	1-2 verres maximum par occasion
•	Éviter excès même lors occasions
•	Hydratation augmentée si consommation
CONTINUER AINSI ✓
CHOIX : Jamais
ANALYSE : EXCELLENT ✓✓✓
FÉLICITATIONS : Habitude optimale pour santé et perte poids
CONSEILS :
•	MAINTENIR cette excellente habitude
•	Hydratation optimale : 
o	Eau : 2-3L/jour
o	Bissap maison sans sucre
o	Infusions (gingembre, citronnelle)
o	Eau de coco naturelle
BÉNÉFICES que vous expérimentez déjà :
•	Glycémie stable
•	Pas de calories vides
•	Hydratation optimale
•	Dents saines
•	Économies financières
•	Foie sain
CONTINUER AINSI ✓✓✓
PARTIE 4 : ADAPTATIONS SELON COMPORTEMENTS ET BIEN-ÊTRE
😴 QUESTION 11 : Combien d'heures de sommeil avez-vous par nuit ?
CHOIX : Moins de 6h
ANALYSE : TRÈS PROBLÉMATIQUE pour perte de poids
IMPACT manque de sommeil sur poids :
1.	Hormones perturbées : 
o	Ghréline ↑ (hormone faim) → Appétit augmenté
o	Leptine ↓ (hormone satiété) → Satiété diminuée
o	Cortisol ↑ (hormone stress) → Stockage graisse abdominale
o	Insuline ↑ → Résistance insuline, diabète
2.	Métabolisme ralenti : 
o	Dépense énergétique repos ↓
o	Perte muscle ↑ (au lieu de graisse)
3.	Comportements alimentaires : 
o	Fringales sucrées/grasses ↑
o	Compulsions alimentaires ↑
o	Motivation activité physique ↓
4.	Santé générale : 
o	Immunité ↓
o	Concentration ↓
o";

            case 'apnee':
                return "Risque HTA, diabète, cardiovasculaire ↑
PLAN AMÉLIORATION SOMMEIL :
OBJECTIF : Atteindre 7-9h/nuit
1. HYGIÈNE DE SOMMEIL :
Heure de coucher RÉGULIÈRE :
•	Même heure chaque soir (même weekend)
•	Ex: 22h → réveil 6h = 8h sommeil
Routine pré-sommeil (1h avant coucher) :
•	21h : Arrêt écrans (téléphone, TV)
•	21h15 : Tisane relaxante (citronnelle, verveine)
•	21h30 : Douche/bain tiède
•	21h45 : Lecture légère, méditation, prière
•	22h : Coucher
Chambre optimale :
•	Température fraîche
•	Obscurité totale (rideaux opaques)
•	Silence (bouchons oreilles si nécessaire)
•	Literie confortable
À ÉVITER avant coucher :
•	Caféine après 15h (café, thé, cola)
•	Repas lourd/gras le soir
•	Alcool (perturbe sommeil)
•	Écrans 1h avant (lumière bleue ↓ mélatonine)
•	Activité physique intense <3h avant
•	Siestes >20 min après 15h
2. ALIMENTATION FAVORISANT SOMMEIL :
Dîner (18h-19h, 3h avant coucher) :
•	Glucides complexes : igname, riz complet (favorisent sérotonine)
•	Protéines maigres : poisson, poulet
•	Légumes : calme digestif
•	ÉVITER : fritures, graisses lourdes, épices fortes
Exemples dîners \"sommeil\" :
•	Option A : Igname bouillie (150g) + sauce légère + poisson grillé (100g) + légumes (200g)
•	Option B : Riz complet (180g) + sauce tomate douce + poulet (100g) + salade
Tisane pré-sommeil (21h) :
•	Citronnelle (relaxante)
•	Verveine (si disponible)
•	Tilleul (si disponible)
•	SANS sucre, SANS caféine
Collation légère si faim (20h30 max) :
•	1 banane (tryptophane → sérotonine → mélatonine)
•	150ml lait tiède (si toléré, tryptophane)
•	5-6 amandes
3. ACTIVITÉ PHYSIQUE STRATÉGIQUE :
Moment optimal : Matin ou après-midi (PAS le soir)
•	7h-9h : Idéal (boost énergie journée)
•	15h-17h : Acceptable
•	ÉVITER après 18h (trop stimulant)
Type : Modérée, régulière
•	Marche 30 min/jour
•	Voir détails Partie 4 - Question Activité physique
4. GESTION STRESS (voir Question 22) :
•	Respiration profonde
•	Méditation/prière
•	Journal de gratitude
5. CONSULTATION MÉDICALE si :
•	Insomnie persistante >3 semaines
•	Apnée du sommeil suspectée (ronflements, fatigue diurne)
•	Anxiété/dépression
ADAPTATIONS ALIMENTAIRES si manque de sommeil actuel :
AUGMENTER :
•	Magnésium : épinards, gboma, haricots, bananes, noix
•	Tryptophane : poulet, poisson, œufs, bananes, arachides
•	Complexes B : céréales complètes, légumes verts, œufs
•	Vitamine D : poissons gras, œufs (+ soleil 15 min/jour)
Petit-déjeuner \"anti-fatigue manque sommeil\" :
•	Option A : Bouillie de sorgho (200g) + 2 œufs + 1 banane (tryptophane) + épinards dans omelette (magnésium) + 15g arachides
•	Option B : Akassa (200g) + poisson gras (sardine 100g - oméga-3, vitamine D) + avocat (magnésium) + orange (vitamine C)
Collations \"anti-fatigue\" :
•	10h : 2 bananes (magnésium, tryptophane) + 15g arachides
•	16h : 150g papaye + 15 amandes (magnésium)
Éviter absolument :
•	Excès caféine (max 2 cafés avant 15h)
•	Sucres rapides (aggravent fatigue par pics glycémiques)
•	Repas trop lourds (épuisent digestion)
CHOIX : 6h-7h
ANALYSE : LIMITE INFÉRIEURE acceptable
6h : Insuffisant pour beaucoup (viser 7-8h) 7h : Acceptable minimum
RECOMMANDATION : Viser 7-8h
Plan simple :
•	Si coucher 23h → Avancer à 22h30 = +30 min
•	Si coucher 22h → Maintenir
•	Qualité sommeil aussi importante que quantité
Hygiène sommeil :
•	Routine pré-sommeil
•	Chambre optimale
•	Éviter écrans 1h avant
Alimentation : Suivre plans de base
Dîner favorisant sommeil :
•	18h-19h
•	Glucides complexes + protéines maigres
•	Éviter lourdeur
CHOIX : 8h-9h
ANALYSE : OPTIMAL ✓✓✓
8h : Idéal pour la plupart 9h : Bien si besoin individuel
FÉLICITATIONS : Sommeil adéquat
CONSEILS MAINTIEN :
•	Conserver régularité
•	Qualité compte : sommeil profond, réparateur
•	Si fatigue malgré 8-9h → Consulter (apnée ? qualité ?)
Alimentation : Suivre plans de base selon niveau activité
CONTINUER AINSI ✓
CHOIX : Plus de 9h
ANALYSE : ATTENTION
Sommeil >9h peut indiquer :
•	Besoin physiologique accru (rare)
•	Mauvaise qualité sommeil (apnée, réveil fréquent)
•	Dépression
•	Hypothyroïdie
•	Autres problèmes santé
RECOMMANDATION : Évaluation médicale
Questions à poser :
•	Fatigue malgré >9h sommeil ?
•	Ronflements ? Réveils nocturnes ?
•	Humeur basse, tristesse ?
•	Prise de poids inexpliquée ?
Si réponse OUI → Consultation médicale
Alimentation :
•	Suivre plans de base
•	Privilégier aliments stimulant énergie : 
o	Protéines petit-déjeuner
o	Fer : viandes maigres, épinards, gboma
o	Vitamine C : oranges, papaye (absorption fer)
o	Complexes B : céréales complètes
😪 QUESTION 12 : Avez-vous l'apnée du sommeil ?
RÉPONSE : OUI
ANALYSE : TRÈS IMPORTANT pour obésité
Apnée du sommeil et obésité : Cercle vicieux
•	Obésité → Apnée (graisse cou comprime voies aériennes)
•	Apnée → Fatigue → ↓ Activité physique → ↑ Poids
•	Apnée → Perturbation hormones → ↑ Appétit, ↑ Stockage graisse
IMPACTS apnée du sommeil :
•	Sommeil non réparateur (fatigue diurne)
•	Hypoxie nocturne (↓ oxygène)
•	Hypertension artérielle ↑
•	Risque cardiovasculaire ↑↑
•	Diabète type 2 ↑
•	Résistance perte de poids
TRAITEMENTS MÉDICAUX (ESSENTIELS) :
1. PPC (Pression Positive Continue) - CPAP :
•	Masque nocturne insufflant air
•	UTILISER CHAQUE NUIT (observance cruciale)
•	Amélioration immédiate qualité sommeil
2. Orthèse d'avancée mandibulaire :
•	Appareil dentaire maintenant mâchoire avancée
•	Alternative si PPC non toléré
3. Consultation ORL/Pneumologue :
•	Suivi régulier obligatoire
ALIMENTATION SPÉCIFIQUE APNÉE DU SOMMEIL :
PERTE";

            case 'regime_recent':
                return "DE POIDS = Traitement #1
•	Perte 10% poids corporel → Réduction 50% sévérité apnée
•	Objectif : 0,5-1 kg/semaine
DÎNER OPTIMAL (éviter aggravation apnée) :
Timing : 18h-19h (3-4h avant coucher)
Composition :
•	Léger, digeste
•	PAS lourd, PAS gras
•	Petites portions
Exemples dîners apnée :
•	Option A : Igname bouillie (120-150g) + sauce TRÈS légère + poisson grillé maigre (100g) + légumes vapeur (200g)
•	Option B : Attiéké (150g) + poisson blanc grillé (100g) + salade légère (citron, PAS vinaigrette grasse)
À ÉVITER ABSOLUMENT le soir :
•	Alcool (relaxe muscles gorge, aggrave apnée)
•	Repas lourds/gras (reflux, aggrave apnée)
•	Repas copieux tard (>20h)
•	Sauces grasses (huile palme, sauce graine)
POSITION SOMMEIL :
•	Dormir sur le CÔTÉ (jamais sur le dos)
•	Sur le dos aggrave apnée (langue bloque voies)
•	Utiliser oreiller maintien latéral
RÉDUCTION INFLAMMATION voies aériennes :
Aliments anti-inflammatoires :
•	Poissons gras (oméga-3) : maquereau, sardine - 3x/semaine
•	Fruits rouges (antioxydants) : si disponibles
•	Épices : gingembre, curcuma
•	Légumes verts : épinards, gboma
•	Huile d'olive (remplacer huile palme)
Éviter aliments pro-inflammatoires :
•	Sucres raffinés
•	Fritures
•	Graisses saturées excès
•	Alcool
Petit-déjeuner anti-inflammatoire :
•	Option A : Bouillie de sorgho (200g) + 2 œufs + épinards omelette (100g) + 1 orange (vitamine C) + 10g noix (oméga-3)
•	Option B : Akassa (180g) + sardine grillée (100g - oméga-3) + avocat (anti-inflammatoire) + tomates
HYDRATATION :
•	2-3L eau/jour
•	MAIS réduire 2h avant coucher (éviter réveils nocturnes uriner)
SUIVI MÉDICAL STRICT :
•	PPC chaque nuit
•	Consultations régulières
•	Perte poids surveillée
BÉNÉFICES perte poids sur apnée :
•	-5 kg → Amélioration légère
•	-10 kg → Amélioration significative
•	-15-20 kg → Possible guérison apnée légère/modérée
RÉPONSE : NON
ANALYSE : Bon, mais rester vigilant
Obésité = facteur de risque apnée
SIGNES À SURVEILLER (apnée non diagnostiquée) :
•	Ronflements forts
•	Pauses respiratoires nocturnes (témoins)
•	Réveils avec sensation étouffement
•	Fatigue diurne excessive
•	Maux de tête matinaux
•	Somnolence journée
•	Difficulté concentration
Si 2+ signes → Consultation médicale (polysomnographie)
PRÉVENTION apnée du sommeil :
•	Perte de poids
•	Éviter alcool le soir
•	Dormir sur le côté
•	Dîner léger et tôt
Alimentation : Suivre plans de base selon niveau activité
📉 QUESTION 13 : Avez-vous récemment fait un régime de perte de poids ?
RÉPONSE : OUI
ANALYSE : Important comprendre historique
Voir question suivante : \"Combien de poids avez-vous perdu ?\"
RÉPONSE : NON
ANALYSE : Première démarche OU arrêt régimes
Si première démarche : ✓ Bonne opportunité démarrer sainement ✓ Pas d'échecs antérieurs démotivants ✓ Métabolisme non ralenti par yo-yo répétés
APPROCHE RECOMMANDÉE :
•	Rééquilibrage alimentaire DURABLE (pas régime restrictif temporaire)
•	Perte 0,5-1 kg/semaine (sain, soutenable)
•	Changements progressifs (habitudes long terme)
•	Pas de privations extrêmes (évite abandon)
Alimentation : Suivre plans de base selon niveau activité
OBJECTIF : Perdre progressivement et MAINTENIR
Si arrêt régimes après échecs multiples : ⚠️ Attention effet yo-yo
Risques régimes yo-yo :
•	Métabolisme ralenti (corps économise énergie)
•	Perte muscle (pas graisse)
•	Reprise poids amplifiée (+5-10 kg après régime)
•	Démotivation
•	Relation malsaine nourriture
NOUVELLE APPROCHE NÉCESSAIRE :
Oublier \"régimes\" :
•	PAS de restriction extrême
•	PAS de privation
•	PAS de durée limitée
Adopter \"mode de vie\" :
•	Rééquilibrage PERMANENT
•	Changements PROGRESSIFS
•	Plaisir PRÉSERVÉ
•	Soutenabilité LONG TERME
Alimentation : Suivre plans de base, mais introduction TRÈS progressive
Suivi psychologique recommandé : Accompagnement échecs répétés
📊 QUESTION 14 : Si oui, combien de poids avez-vous perdu ?
CHOIX : Moins de 5 kg
ANALYSE :
Si récemment (1-3 mois) : ✓ Rythme sain (0,5-1 kg/semaine) ✓ Perte durable probable ✓ Continuer approche actuelle
Si anciennement (>6 mois) puis stagnation : ⚠️ Plateau commun ⚠️ Métabolisme adapté
STRATÉGIES RELANCE :
1. RÉÉVALUER niveau activité :
•	Poids ↓ → Dépense énergétique ↓
•	Besoin AUGMENTER activité physique ou RÉDUIRE légèrement calories
2. VARIER alimentation :
•	Changer distribution macronutriments
•	Ex: Si 30/48/22 → Tester 30/42/28 (+ lipides, - glucides)
3. REVOIR portions :
•	Peser aliments 1 semaine (dérive portions fréquente)
•	Réajuster selon nouveaux besoins
4. AUGMENTER activité :
•	Ajouter 10-15 min marche/jour
•	Passer niveau activité supérieur
5. PATIENCE :
•	Plateaux normaux (corps s'adapte)
•	Continuer efforts, perte reprendra
Alimentation : Suivre plans base, surveiller portions
CHOIX : 5-10 kg
ANALYSE : EXCELLENTE PERTE
Si récent (2-5 mois) : ✓✓✓ Rythme idéal ✓ Durable ✓ Santé préservée
FÉLICITATIONS
MAINTIEN :
•	Continuer approche actuelle
•	Ne PAS relâcher efforts
•	Stabilisation paliers (maintenir 1-2 mois avant continuer perte)
Alimentation : Suivre plans selon nouveau poids et activité
VIGILANCE :
•	Surveiller reprise poids
•	Peser 1x/semaine
•	Ajuster si +1 kg
Si ancien (>6 mois) puis reprise poids : ❌ Effet yo-yo classique
ANALYSE :
•	Régime trop restrictif probablement
•	Non soutenable long terme
•	Métabolisme ralenti
•	Reprise poids (voire +)
NOUVELLE APPROCHE :
•	PAS régime drastique
•	Rééquilibrage DURABLE
•	Changements PROGRESSIFS
•	Accompagnement nutritionniste/psychologue
Alimentation : Plans base, introduction PROGRESSIVE
CHOIX : Plus de";

            case 'sedentarite':
                return "10 kg
ANALYSE : Perte IMPORTANTE
Si récent (3-6+ mois) ET méthode saine : ✓✓✓ EXCELLENT résultat ✓ Bénéfices santé majeurs :
•	Tension artérielle ↓
•	Glycémie ↓
•	Cholestérol ↓
•	Apnée sommeil ↓
•	Mobilité ↑
•	Énergie ↑
FÉLICITATIONS CHALEUREUSES
MAINTIEN CRUCIAL :
•	10+ kg perdus = Risque reprise élevé (statistiquement)
•	Vigilance PERMANENTE
•	Habitudes DÉFINITIVES (pas temporaires)
•	Suivi régulier
Alimentation :
•	Continuer plans selon nouveau poids
•	JAMAIS retour habitudes antérieures
•	Stabilisation paliers
•	Ajustements selon nouveau métabolisme
Peau excédentaire possible :
•	Hydratation peau
•	Activité physique (musculation légère)
•	Patience (peau se rétracte progressivement)
•	Chirurgie si excès important (après stabilisation 1-2 ans)
Si ancien puis reprise poids complète (voire +) : ❌❌ Effet yo-yo SÉVÈRE
ANALYSE :
•	Régime drastique certain (perte rapide non durable)
•	Métabolisme très ralenti
•	Perte muscle importante
•	Reprise graisse amplifiée
•	Démotivation profonde probable
•	Relation nourriture perturbée
⚠️ SITUATION NÉCESSITE ACCOMPAGNEMENT PROFESSIONNEL
RECOMMANDATIONS :
1. Consultation nutritionniste :
•	Bilan métabolique
•	Impédancemétrie (masse grasse/muscle)
•	Plan PERSONNALISÉ long terme
2. Suivi psychologique :
•	Troubles comportement alimentaire possibles
•	Compulsions
•	Restriction/excès
•	Motivation, confiance
3. NOUVELLE approche RADICALEMENT différente :
Oublier :
•	Régimes restrictifs
•	Perte rapide
•	Privations
•	Durée limitée
Adopter :
•	Rééquilibrage très progressif
•	Accepter lenteur (0,5 kg/semaine MAX)
•	Plaisir préservé
•	Changements PERMANENTS
•	Patience (peut prendre 1-2 ans)
4. Réparation métabolisme :
•	Phase \"maintenance\" 2-3 mois (maintenir poids actuel, restaurer métabolisme)
•	Puis perte TRÈS progressive
•	Activité physique OBLIGATOIRE (reconstruire muscle)
Alimentation :
•	Plans base selon activité
•	Introduction ULTRA-PROGRESSIVE
•	Accompagnement professionnel
•	Suivi médical
MESSAGE D'ESPOIR : \"Les échecs passés ne définissent PAS votre futur. Avec approche saine, patience et accompagnement, succès durable est possible. Chaque jour est nouveau départ.\"
PARTIE 5 : ADAPTATIONS SELON ACTIVITÉ PHYSIQUE
🏃 QUESTION 15 : Combien de jours par semaine pratiquez-vous une activité physique ?
CHOIX : Aucun (Sédentaire)
ANALYSE : URGENT - Activité physique ESSENTIELLE
Sédentarité + Obésité = Risques santé ↑↑↑
•	Maladies cardiovasculaires
•	Diabète type 2
•	Hypertension
•	Ostéoporose
•	Dépression
•	Mortalité prématurée
Activité physique bénéfices perte poids :
•	↑ Dépense calorique
•	↑ Métabolisme repos (muscle brûle calories)
•	↑ Sensibilité insuline
•	↓ Appétit (paradoxalement)
•	↑ Motivation
•	↑ Humeur, sommeil
PLAN DÉMARRAGE PROGRESSIF (CRUCIAL) :
⚠️ AVANT DE COMMENCER :
•	Consultation médicale OBLIGATOIRE (obésité + sédentarité = risque)
•	Test effort cardiaque si >40 ans ou antécédents cardio
•	Autorisation médicale
SEMAINE 1-2 : INITIATION
Objectif : Bouger quotidiennement, habituer corps
Activité : MARCHE douce
•	Fréquence : 5-7 jours/semaine
•	Durée : 10-15 minutes/jour
•	Intensité : Douce (pouvoir parler facilement)
•	Moment : Matin (7h-8h idéal, pas trop chaud)
Comment :
•	Marche autour maison/quartier
•	Terrain plat
•	Chaussures confortables
•	Hydratation (eau avant/après)
SEMAINE 3-4 : PROGRESSION
Objectif : Augmenter durée progressivement
Activité : MARCHE modérée
•	Fréquence : 5-7 jours/semaine
•	Durée : 20-25 minutes/jour
•	Intensité : Modérée (léger essoufflement, conversation possible)

SEMAINE 5-8 : CONSOLIDATION
Objectif : Atteindre recommandations minimales
Activité : MARCHE modérée
•	Fréquence : 5-7 jours/semaine
•	Durée : 30 minutes/jour
•	Intensité : Modérée
OU
•	Fréquence : 3-4 jours/semaine
•	Durée : 45 minutes/jour
•	Intensité : Modérée
SEMAINE 9+ : DIVERSIFICATION
Ajouter variété :
Activités adaptées obésité modérée :
•	Marche rapide : Excellent (impact faible, accessible)
•	Natation/aquagym : Idéal (zéro impact articulations, si accès piscine)
•	Vélo (si articulations OK) : Bon (impact faible)
•	Danse douce : Ludique, social
•	Yoga/Pilates : Souplesse, renforcement doux
•	Jardinage, ménage actif : Compte !
À ÉVITER (risque articulations) :
•	Course à pied (impact élevé)
•	Sauts, sports ballon (impact)
•	Musculation lourde sans supervision
OBJECTIF FINAL (3-6 mois) :
OMS recommande :
•	150-300 minutes/semaine activité modérée 
o	Ex: 30 min × 5-7 jours
o	OU 45 min × 4-5 jours
•	OU 75-150 min/semaine activité intense 
o	Ex: 25 min × 3-4 jours
+ Renforcement musculaire 2 jours/semaine
•	Pompes murales
•	Squats assistés (chaise)
•	Exercices bandes élastiques
CONSEILS MOTIVATION :
1. PLAISIR avant tout :
•	Choisir activité appréciée
•	Musique, podcast pendant marche
•	Compagnon marche (ami, famille)
2. ROUTINE fixe :
•	Même heure chaque jour
•	Bloquer agenda (rendez-vous avec soi)
3. OBJECTIFS progressifs :
•	Semaine 1 : 10 min marche quotidienne ✓
•	Semaine 4 : 20 min marche quotidienne ✓
•	Semaine 8 : 30 min marche quotidienne ✓
4. SUIVI :
•	Carnet activité
•	Application smartphone (compteur pas)
•	Objectif 7000-10000 pas/jour
5. RÉCOMPENSES non-alimentaires :
•	Nouvelles baskets confortables
•	Vêtements sport
•	Massage
6. ACCEPTER imperfections :
•	Jour manqué = pas grave
•	Reprendre lendemain
•	Pas culpabilité
ALIMENTATION ADAPTÉE (Sédentaire → Légèrement actif) :
Phase transition :
SEMAINE 1-4 (démarrage activité) :
•	Continuer plan SÉDENTAIRE (30/35/35)
•	Activité légère insuffisante pour changer macros
SEMAINE 5-8 (30 min marche quotidienne) :
•	Passer plan LÉGÈREMENT ACTIF (30/42/28)
•	Augmenter légèrement glucides
•	Réduire légèrement lipides
Petit-déjeuner transition :
•	Option A : Bouillie mil (200g) + 2 œufs + 1 banane plantain bouillie (120g) + 20g arachides
•	Option B : Pain complet (3 tranches) + omelette légumes + 1/2 avocat + 1 orange
Collation pré-exercice (si marche matinale à jeun difficile) :
•	30 min avant : 1 banane + 10g arachides
•	Hydratation : grand verre eau
Collation post-exercice :
•	1 orange + 15g arachides (récupération)
Hydratation CRUCIALE :
•	Avant exercice : 250-500ml eau
•	Pendant (si >30 min) : Gorgées régulières
•	Après : 500ml eau
SIGNES ARRÊTER exercice et CONSULTER :
•	Douleur poitrine
•	Essoufflement excessif
•	Vertiges, malaise
•	Douleur articulaire intense
•	Fatigue anormale
PROGRESSION = CLÉ SUCCÈS Lenteur > Rapidité (évite abandon, blessure)
CHOIX : 1-3 jours/semaine (Légèrement actif)
ANALYSE : BON DÉPART, mais insuffisant optimal
OMS recommande : minimum 150 min/semaine = ~5 jours × 30 min
Bénéfices actuels : ✓ Meilleur que sédentarité ✓ Début habitude ✓ Santé améliorée vs aucune activité
Limites : ⚠️ Insuffisant pour perte poids optimale ⚠️ Bénéfices santé sous-optimaux
PLAN AUGMENTATION FRÉQUENCE :
OBJECTIF : Passer à 5-7 jours/semaine
STRATÉGIE PROGRESSIVE :
MOIS 1 : Ajouter 1 jour
•	Si actuellement 2 jours → Passer à 3 jours
•	Ex: Lundi/Jeudi actuels → Ajouter Samedi
MOIS 2 : Ajouter 1 jour supplémentaire
•	3 jours → 4 jours
•	Ex: Lundi/Jeudi/Samedi → Ajouter Mercredi
MOIS 3 : Atteindre 5 jours
•	4 jours → 5 jours
•	Ex: Lundi/Mercredi/Jeudi/Samedi → Ajouter Dimanche
MOIS 4+ : Idéalement quotidien (5-7 jours)
VARIÉTÉ ACTIVITÉS (éviter monotonie) :
Lundi : Marche rapide 30 min 
Mercredi : Danse/Zumba 30 min (si accessible) 
Jeudi : Marche rapide 45 min 
Samedi : Vélo 30 min (si accessible) ou Natation 
Dimanche : Marche douce 30 min + étirements
TOTAL : 5 jours, 150-180 min/semaine ✓
ASTUCES INTÉGRATION QUOTIDIEN :
Activités \"cachées\" (comptent aussi) :
•	Marcher trajets courts (éviter taxi/zem)
•	Descendre zem 500m avant destination
•	Escaliers (éviter ascenseur si disponible)
•	Ménage actif (passer serpillière, laver voiture)
•	Jardinage
•	Jouer avec enfants
•	Danser sur musique chez soi
Objectif pas quotidien :
•	7000-10000 pas/jour
•	Podomètre smartphone/bracelet
ALIMENTATION ADAPTÉE :
Si 1-3 jours activité LÉGÈRE (marche 20-30 min) :
•	Plan LÉGÈREMENT ACTIF (30/42/28)
Petit-déjeuner :
•	Option A : Bouillie mil (200g) + 2 œufs + banane plantain bouillie (120g) + 20g arachides
•	Option B : Pain complet (3 tranches) + omelette légumes + 1 orange
Collations jours exercice :
•	Pré-exercice (si besoin) : 1 banane
•	Post-exercice : 1 orange + 15g arachides
Hydratation : 2-3L/jour, + avant/pendant/après exercice
CHOIX : 4-6 jours/semaine (Modérément actif)
ANALYSE : EXCELLENT ✓✓✓
Fréquence OPTIMALE pour santé et perte poids
Bénéfices : ✓✓✓ Dépense calorique significative ✓✓✓ Métabolisme stimulé ✓✓✓ Muscle préservé/construit ✓✓✓ Santé cardiovasculaire ✓✓✓ Humeur, sommeil améliorés ✓✓✓ Perte poids facilitée
FÉLICITATIONS - MAINTENIR
OPTIMISATION (si souhaité) :
1. VARIER INTENSITÉ (méthode efficace) :
Semaine type variée :
•	Lundi : Marche RAPIDE 45 min (intensité modérée-élevée)
•	Mardi : Marche DOUCE 30 min (récupération active)
•	Mercredi : Intervalles 30 min (2 min rapide/2 min lent alternés)
•	Jeudi : Repos OU yoga/étirements
•	Vendredi : Marche RAPIDE 45 min
•	Samedi : Activité variée 45 min (vélo, natation, danse)
•	Dimanche : Marche modérée 60 min
TOTAL : 6 jours, ~250 min/semaine ✓✓✓
2. AJOUTER RENFORCEMENT MUSCULAIRE :
2 jours/semaine (Mardi + Jeudi) :
Exercices poids corps adaptés obésité :
•	Pompes MURALES (pas au sol) : 3 séries × 10-15 reps
•	Squats ASSISTÉS (chaise derrière) : 3 séries × 10-15 reps
•	Levées bras latérales (bouteilles eau) : 3 séries × 12-15 reps
•	Gainage GENOUX (pas pieds) : 3 × 20-30 sec
•	Fentes statiques (assistées mur) : 2 séries × 8-10 chaque jambe
Durée : 20-30 min Progression : Augmenter reps progressivement
Bénéfices renforcement :
•	Muscle ↑ → Métabolisme repos ↑
•	Perte graisse facilitée (muscle brûle calories)
•	Tonus corporel
•	Force quotidienne
•	Prévention ostéoporose
3. SUIVRE PROGRÈS :
•	Carnet entraînement
•	Durée, intensité, ressenti
•	Poids (1x/semaine)
•	Tour taille (1x/mois)
•	Photos (1x/mois)
SIGNAUX SURENTRAÎNEMENT (réduire si présents) :
•	Fatigue persistante
•	Sommeil perturbé
•	Irritabilité
•	Perte appétit OU fringales excessives
•	Blessures répétées
•	Stagnation/prise poids
→ Si présents : Réduire fréquence/intensité, ajouter jours repos
Timing jours exercice :
•	Exercice matin (7h-8h) : Petit-déj après (8h30)
•	Exercice après-midi (16h-17h) : Collation légère 1h avant (15h : 1 banane), Dîner après (18h-19h)
Hydratation : 3-3,5L/jour (exercice régulier augmente besoins)
CONTINUER AINSI ✓✓✓
CHOIX : 7 jours/semaine (Très actif)
ANALYSE : EXCELLENT engagement, ATTENTION surcharge
Avantages : ✓✓✓ Engagement maximal ✓✓✓ Dépense calorique élevée ✓✓✓ Habitude ancrée
Risques : ⚠️ Surentraînement possible ⚠️ Récupération insuffisante ⚠️ Blessures ⚠️ Épuisement (abandon long terme)
RECOMMANDATIONS :
1. DISTINGUER intensité jours :
PAS 7 jours intensité ÉLEVÉE (dangereux)
MAIS 7 jours avec VARIÉTÉ intensité :
Semaine type SAINE (7 jours) :
•	Lundi : Marche RAPIDE 45-60 min (intensité modérée-élevée)
•	Mardi : Renforcement musculaire 30 min (intensité modérée)
•	Mercredi : Marche DOUCE 30 min (récupération ACTIVE)
•	Jeudi : Marche RAPIDE 45 min
•	Vendredi : Yoga/Étirements 30 min (récupération ACTIVE)
•	Samedi : Activité variée 60 min (vélo, natation, danse - intensité modérée)
•	Dimanche : Marche modérée 45 min OU activité ludique (jardin, jeux enfants)
TOTAL : 7 jours, ~300 min/semaine, VARIÉTÉ intensité ✓
CL KEY : Jours récupération ACTIVE (Mercredi, Vendredi) = Activité légère, PAS repos complet, PAS intensité élevée
2. ÉCOUTER CORPS (CRUCIAL) :
Signaux REPOS OBLIGATOIRE :
•	Douleur articulaire/musculaire persistante
•	Fatigue extrême
•	Sommeil perturbé
•	Irritabilité, démotivation
•	Fréquence cardiaque repos élevée (matin)
→ Prendre 1-2 jours REPOS COMPLET si signaux
Repos ≠ Échec Repos = Récupération = Progrès
3. PÉRIODISATION (avancé) :
Varier charge semaines :
•	Semaine 1-2 : Intensité modérée-élevée (7 jours variés)
•	Semaine 3 : Intensité RÉDUITE (récupération - marches douces uniquement)
•	Semaine 4 : Reprise intensité modérée-élevée
Cycle répété → Prévient surentraînement
ALIMENTATION ADAPTÉE :
⚠️ ATTENTION : Glucides très élevés, lipides très bas
•	Adapté UNIQUEMENT si activité VRAIMENT intense quotidienne
•	Si activité modérée malgré fréquence quotidienne → Rester plan MODÉRÉMENT ACTIF
Évaluation intensité réelle :
•	Marche douce 30 min = Légèrement actif
•	Marche rapide 45-60 min = Modérément actif
•	Intervalles/Course/Sport intense 45+ min = Très actif
Si intensité RÉELLEMENT élevée quotidienne :
Petit-déjeuner :
•	Option A : Bouillie mil (300g) + 3 œufs + banane plantain (180g) + 1 orange + 10g arachides
•	Option B : Pain complet (5 tranches) + omelette (3 œufs) + banane plantain bouillie (130g) + 1 mangue
Déjeuner :
•	Option A : Riz complet (350g) + sauce tomate + poulet (120g) + légumes (300g) + 1/2 c. café huile
•	Option B : Pâte maïs (380g) + sauce légère (100ml) + poisson (120g) + légumes (300g)
Dîner :
•	Option A : Igname (300g) + sauce légère (80ml) + viande (100g) + légumes (250g)
•	Option B : Attiéké (300g) + poisson (130g) + salade (250g)
Collations :
•	10h : 2 mangues + 15g arachides
•	16h : 250g papaye + 2 bananes
Hydratation : 3,5-4L/jour
CONSULTATION MÉDICALE recommandée :
•	Bilan santé régulier (6 mois)
•	Test effort (évaluer capacité cardiovasculaire)
•	Ajustements si nécessaire
MESSAGE IMPORTANT : \"Votre engagement est admirable. Veillez à l'équilibre effort/récupération pour maintenir long terme et éviter épuisement.\"
⏱️ QUESTION 16 : Combien de temps passez-vous en position assise chaque jour ?
CHOIX : Moins de 4h
ANALYSE : EXCELLENT ✓✓✓
Position assise <4h/jour = Optimal santé
Bénéfices : ✓ Risque cardiovasculaire ↓ ✓ Métabolisme actif ✓ Posture préservée ✓ Circulation sanguine optimale
FÉLICITATIONS - MAINTENIR
Conseils maintien :
•	Continuer mode de vie actif
•	Varier positions (assis/debout/marche)
•	Suivre plans alimentation selon niveau activité réel
CONTINUER AINSI ✓✓✓

CHOIX : 4h-6h
ANALYSE : ACCEPTABLE, mais améliorable
4-6h assis = Limite acceptable (nombreux emplois de bureau)
Risques modérés : ⚠️ Ralentissement métabolisme ⚠️ Risque cardiovasculaire légèrement ↑ ⚠️ Douleurs dos possibles
STRATÉGIES RÉDUCTION temps assis :
1. AU TRAVAIL (si emploi bureau) :
Toutes les heures (alarme smartphone) :
•	Se lever 5 min
•	Marcher sur place
•	Étirements légers
•	Marche toilettes (trajet long)
Pause déjeuner :
•	Marche 10-15 min APRÈS manger
•	Éviter rester assis tout le temps
Appels téléphoniques :
•	Se lever et marcher pendant appel
Bureau debout (si possible) :
•	Alterner assis/debout (1h assis/30 min debout)
Escaliers :
•	Éviter ascenseur
2. À LA MAISON :
Écrans (TV, téléphone) :
•	Limiter temps écran total
•	Pauses actives : 
o	Publicités TV → Se lever, marcher, étirements
o	1 épisode série → 10 min marche après
Tâches ménagères :
•	Augmenter (comptent comme activité)
•	Passer serpillière, laver linge main, jardinage
Moments famille :
•	Jeux actifs enfants (pas assis devant TV)
•	Promenades famille
3. OBJECTIF :
•	Réduire <4h/jour si possible
•	OU compenser par activité physique quotidienne (marche 45-60 min)
ALIMENTATION : Plans selon niveau activité physique réel (pas temps assis)
CHOIX : 6h-8h
ANALYSE : PROBLÉMATIQUE
6-8h assis/jour = Sédentarité importante
Risques : ❌ Métabolisme ralenti (↓ dépense calorique) ❌ Risque cardiovasculaire ↑ ❌ Diabète type 2 ↑ ❌ Obésité aggravée ❌ Douleurs dos, cervicales ❌ Circulation veineuse (varices, thromboses)
\"Sitting is the new smoking\" (position assise = nouveau tabagisme)
PLAN RÉDUCTION URGENTE :
OBJECTIF : Passer <6h/jour
1. PAUSES ACTIVES OBLIGATOIRES :
TOUTES LES 30 MINUTES (alarme) :
•	Se lever 2-3 min
•	Marcher sur place
•	Étirements rapides : 
o	Dos (torsions douces)
o	Jambes (flexions genoux)
o	Bras (élévations)
Soit 16 pauses × 3 min = 48 min debout/mouvements supplémentaires

2. COMPENSATIONS ACTIVES :
Matin (avant travail) :
•	Marche 15-20 min
•	Étirements 10 min
Pause déjeuner :
•	Marche 15-20 min APRÈS repas (NON NÉGOCIABLE)
Soir (après travail) :
•	Marche 30-45 min
•	Tâches ménagères actives
Total compensations : 60-90 min activité/jour
3. AMÉNAGEMENTS TRAVAIL :
Bureau :
•	Bureau ajustable assis/debout (si employeur accepte)
•	Ballon Swiss (remplace chaise 30 min/jour - gainage)
•	Support ordinateur (travailler debout périodes)
Réunions :
•	Proposer réunions debout/marche (si culture entreprise)
Appels :
•	Toujours debout + marcher
4. LIMITATION ÉCRANS LOISIRS :
TV/Téléphone :
•	Maximum 2h/soir (TOTAL écrans loisirs)
•	Pauses actives pendant
Remplacer temps écran";

            case 'activites_preferees':
                return "par :
•	Promenades
•	Activités manuelles
•	Social actif (visites, marches entre amis)
5. SUIVI :
•	Application smartphone (temps assis)
•	Objectif réduction progressive : 
o	Mois 1 : 6-8h → 5-6h
o	Mois 2 : 5-6h → 4-5h
o	Mois 3+ : <4h
ALIMENTATION ADAPTÉE :
Métabolisme ralenti par sédentarité :
•	Portions légèrement RÉDUITES vs niveau activité déclaré
•	Privilégier aliments haute densité nutritionnelle (légumes, protéines)
Si temps assis 6-8h MALGRÉ exercice compensatoire :
•	Suivre plan selon exercice réel
•	Mais surveiller portions (métabolisme peut rester ralenti)
Collations \"anti-sédentarité\" :
•	Moment levé obligatoire (aller chercher fruit à cuisine)
•	Manger debout (pas au bureau)
Hydratation ↑ (bénéfice secondaire) :
•	3L eau/jour
•	→ Besoin uriner fréquent → Levé régulier ✓
CHOIX : Plus de 8h
ANALYSE : TRÈS PROBLÉMATIQUE - URGENT
>8h assis/jour = Sédentarité EXTRÊME
Risques MAJEURS : ❌❌ Mortalité prématurée ↑↑ ❌❌ Maladies cardiovasculaires ↑↑ ❌❌ Diabète type 2 ↑↑ ❌❌ Obésité sévère facilitée ❌❌ Cancers (côlon, sein) ↑ ❌❌ Dépression ↑ ❌❌ Thrombose veineuse profonde ❌❌ Hernies discales ❌❌ Atrophie musculaire
⚠️ MÊME ACTIVITÉ PHYSIQUE QUOTIDIENNE NE COMPENSE PAS TOTALEMENT >8h assis
INTERVENTION URGENTE MULTI-AXES :
1. PAUSES ACTIVES TRÈS FRÉQUENTES :
TOUTES LES 20 MINUTES (alarme NON NÉGOCIABLE) :
•	Se lever 2 min minimum
•	Marcher sur place OU marche rapide (bureau-toilettes)
•	Étirements dynamiques
Soit 24 pauses × 2 min = 48 min debout
2. RESTRUCTURATION JOURNÉE :
Matin (AVANT travail assis) :
•	Marche 30 min (NON NÉGOCIABLE)
•	Étirements 10 min
Pause déjeuner (OBLIGATOIRE) :
•	Marche 20-30 min APRÈS repas
•	Éviter manger assis au bureau
Après-midi (milieu) :
•	Pause active 15 min (15h-15h15)
•	Marche rapide, escaliers
Soir (après travail) :
•	Marche 45-60 min
•	OU activité physique variée (vélo, natation, danse) 45 min
•	Tâches ménagères actives 30 min
Total activité compensatoire : 120-150 min/jour MINIMUM
3. CHANGEMENTS RADICAUX MODE VIE :
Travail :
•	Discussion employeur : 
o	Bureau debout/assis alterné
o	Pauses actives officielles
o	Réunions debout
•	Si refus employeur : 
o	Solutions personnelles (ballon Swiss, pauses autonomes)
Trajet travail :
•	Descendre transport 2 arrêts avant
•	Marcher 15 min matin + 15 min soir
•	Vélo si possible et sûr
Domicile :
•	ÉLIMINER temps assis loisirs : 
o	TV : debout/marche sur place OU maximum 1h/soir
o	Téléphone : debout/marche pendant usage
•	Remplacer TV par activités actives (promenades, jardinage, jeux actifs enfants)
Week-ends :
•	Sorties actives (marché à pied, promenades famille, visites à pied)
•	Éviter journées entières assis maison
4. ÉVALUATION MÉDICALE :
•	Consultation médecin (risques santé >8h assis + obésité)
•	Bilan cardiovasculaire
•	Glycémie à jeun, HbA1c (diabète)
•	Doppler veineux jambes si gonflement (thrombose)
5. OBJECTIF DRASTIQUE RÉDUCTION :
OBJECTIF FINAL : <6h assis/jour (idéalement <4h)
Progression :
•	Mois 1 : >8h → 6-8h (réduction 1-2h) 
o	Pauses toutes 30 min
o	Activité compensatoire 60 min/jour
•	Mois 2 : 6-8h → 4-6h (réduction 1-2h supplémentaires) 
o	Pauses toutes 20 min
o	Activité compensatoire 90 min/jour
•	Mois 3+ : <6h (idéalement <4h) 
o	Pauses très fréquentes
o	Mode vie actif intégré
ALIMENTATION ADAPTÉE :
Métabolisme TRÈS ralenti par sédentarité extrême :
Stratégie :
•	Portions RÉDUITES (métabolisme bas)
•	Densité nutritionnelle MAXIMALE (chaque calorie compte)
•	Aliments thermogéniques (↑ métabolisme légèrement) : 
o	Protéines élevées (effet thermique ↑)
o	Épices (piment, gingembre)
o	Thé vert, café (modération, avant 15h)
Hydratation ↑↑ :
•	3-4L eau/jour
•	Bénéfice : besoin uriner → levé régulier
SUIVI STRICT :
•	Temps assis quotidien (application)
•	Poids (1x/semaine)
•	Tour taille (1x/mois)
•	Glycémie, tension (si antécédents)
MESSAGE CRUCIAL : \"Votre situation nécessite changements importants. >8h assis/jour est aussi néfaste que tabagisme. Avec détermination et ajustements progressifs, amélioration significative possible. Chaque minute debout/active compte. Commencez aujourd'hui.\"
🎯 QUESTION 17 : Quelles activités physiques appréciez-vous ? (Question à saisie)
Importance : PLAISIR = CLÉ ADHÉRENCE LONG TERME
ANALYSE SELON RÉPONSES :
RÉPONSE: \"Marche\"
ANALYSE : EXCELLENT choix obésité modérée
Avantages marche : ✓✓✓ Impact faible (articulations préservées) ✓✓ Accessible partout ✓✓ Gratuit ✓✓ Adaptable (vitesse, durée, terrain) ✓✓ Social (marche en groupe, famille) ✓ Sécuritaire
PLAN OPTIMISATION MARCHE :
1. PROGRESSION :
•	Débutant : 20-30 min/jour, vitesse modérée
•	Intermédiaire : 45-60 min/jour, vitesse modérée-rapide
•	Avancé : 60-90 min/jour OU 45 min intensité élevée (intervalles)
2. VARIÉTÉ :
•	Marche quotidienne : Quartier, terrain plat (base)
•	Marche rapide : 2-3x/semaine (cardio ↑)
•	Marche terrain varié : 1x/semaine (pentes légères si articulations OK)
•	Marche longue : 1x/semaine (90-120 min, intensité modérée)
3. INTERVALLES (avancé) :
•	Échauffement 5 min marche modérée
•	20 min intervalles : 2 min RAPIDE / 2 min LENT alternés
•	Retour calme 5 min marche lente
•	Total : 30 min, dépense ↑↑
4. ÉQUIPEMENT :
•	Chaussures marche/sport confortables (ESSENTIEL)
•	Chaussettes adaptées (évite ampoules)
•	Vêtements légers, respirants
•	Casquette, crème solaire (soleil)
•	Bouteille eau
5. MOMENTS OPTIMAUX :
•	Matin (6h-8h) : Frais, énergie journée
•	Soir (17h-18h) : Décompression travail (MAIS éviter >18h si problèmes sommeil)
6. MOTIVATION :
•	Musique, podcast (écouteurs)
•	Application compteur pas (objectif 10000 pas/jour)
•	Groupe marche (amis, famille, voisins)
•	Varier parcours (découverte quartiers)
CONTINUER ET INTENSIFIER ✓
RÉPONSES : \"Natation\"
ANALYSE : IDÉAL obésité (si accès piscine)
Avantages natation : ✓✓✓ ZÉRO impact articulations (eau porte poids) ✓✓✓ Cardio complet ✓✓✓ Renforcement musculaire global ✓✓ Souplesse ↑ ✓✓ Sensation bien-être ✓ Rafraîchissant (climat chaud Bénin)
LIMITATIONS Bénin : ⚠️ Accès piscines limité (clubs privés, hôtels) ⚠️ Coût abonnement
PLAN NATATION :
Si accès piscine régulier :
Débutant :
•	2-3x/semaine
•	20-30 min/séance
•	Nage confortable (brasse, dos crawlé)
•	Pauses fréquentes
Intermédiaire :
•	3-4x/semaine
•	40-45 min/séance
•	Varier nages (brasse, crawl, dos)
•	Intervalles : 4 longueurs rapides / 2 longueurs repos
Avancé :
•	4-5x/semaine
•	45-60 min/séance
•	Entraînement structuré (échauffement, séries, retour calme)
AQUAGYM (alternative/complément) :
•	Excellente option si natation difficile
•	Cours collectifs (motivation ↑)
•	Renforcement musculaire doux
•	Cardio modéré
•	Social
COMBINAISON NATATION + MARCHE :
•	Natation : 2-3x/semaine (articulations)
•	Marche : 4-5x/semaine (accessible quotidien)
•	Total : 6-7 jours activité variée ✓✓✓
EXCELLENT CHOIX - CONTINUER ✓✓✓
RÉPONSE 3 : \"Yoga\"
ANALYSE : BON complément, INSUFFISANT seul
Avantages yoga : ✓✓ Souplesse ↑ ✓✓ Détente, stress ↓ ✓✓ Posture ↑ ✓ Renforcement musculaire doux ✓ Bien-être mental
Limitations perte poids : ⚠️ Dépense calorique FAIBLE (yoga doux) ⚠️ Insuffisant cardio (sauf yoga dynamique - Vinyasa, Ashtanga) ⚠️ Perte poids lente si seule activité
RECOMMANDATION :
Yoga comme COMPLÉMENT (excellent) :
•	Yoga : 2-3x/semaine (souplesse, détente, renforcement)
•	+ Activité cardio : 4-5x/semaine (marche rapide, natation, vélo, danse)
•	TOTAL : 6-7 jours activité ✓
Yoga styles adaptés obésité :
•	Hatha Yoga : Doux, postures tenues (débutant)
•	Yin Yoga : Très doux, étirements profonds
•	Yoga restauratif : Récupération, stress
Yoga ÉVITER débutant obésité :
•	Bikram/Hot Yoga (chaleur extrême, risque déshydratation)
•	Ashtanga (très dynamique, difficile débutant)
Adaptations postures obésité :
•	Utiliser briques, sangles (support)
•	Postures modifiées (genoux sol si besoin)
•	Professeur informé (adaptations)
TIMING :
•	Matin (réveil corps) OU Soir (détente avant sommeil)
Alimentation : Selon activité cardio ajoutée (marche, natation)
COMBINER YOGA + CARDIO = OPTIMAL ✓
RÉPONSE 4 : \"Danse\"
ANALYSE : EXCELLENT (ludique, social, complet)
Avantages danse : ✓✓✓ Cardio ↑ ✓✓✓ Plaisir (pas ressenti comme \"exercice\") ✓✓ Social, motivation groupe ✓✓ Coordination ↑ ✓ Renforcement musculaire ✓ Bien-être mental
Danses adaptées obésité modérée :
•	Danses traditionnelles béninoises : Excellentes (culturel, social, cardio)
•	Zumba : Très populaire, cardio élevé, cours collectifs
•	Danse africaine : Énergique, ludique
•	Danse de salon : Sociale (si accessible)
Danses ÉVITER débutant obésité :
•	Danses sauts excessifs (impact articulations)
•	Danses très techniques (frustration débutant)
PLAN DANSE :
Débutant :
•	2-3x/semaine
•	30-45 min/cours
•	Intensité modérée
•	Breaks fréquents (hydratation)
Intermédiaire :
•	3-5x/semaine
•	45-60 min/cours
•	Intensité modérée-élevée
COMBINAISON DANSE + autre :
•	Danse : 3x/semaine (Lundi/Mercredi/Vendredi)
•	Marche : 4x/semaine (autres jours)
•	Total : 7 jours activité variée ✓✓✓
Lieux danse Bénin :
•	Centres culturels
•	Salles de sport (cours collectifs";

            case 'fc_connaissance':
                return "Zumba)
•	Associations danses traditionnelles
•	Cours en ligne (YouTube, applications) si accès internet
Hydratation CRUCIALE :
•	Avant cours : 250-500ml eau
•	Pendant : Gorgées fréquentes
•	Après : 500ml eau
EXCELLENT CHOIX - CONTINUER ET INTENSIFIER ✓✓✓
RÉPONSE 5 : \"Vélo\"
ANALYSE : BON si articulations tolèrent
Avantages vélo : ✓✓ Cardio excellent ✓✓ Impact faible (vs course) ✓ Renforcement membres inférieurs ✓ Déplacements utiles (transport actif)
Limitations/Précautions obésité modérée : ⚠️ Pression périnée (selle inconfort possible) ⚠️ Articulations genoux (si problèmes, éviter) ⚠️ Sécurité routière (Bénin - trafic, routes)
SI ARTICULATIONS OK ET SÉCURITÉ ASSURÉE :
Plan vélo :
•	3-5x/semaine
•	30-60 min/sortie
•	Terrain plat débutant
•	Intensité modérée
Équipement :
•	Vélo adapté (taille, selle confortable large)
•	Casque (sécurité)
•	Vêtements visibles
•	Bouteille eau
Alternatives vélo :
•	Vélo appartement : Si disponible (salle sport, domicile) 
o	Avantages : Sûr, pas météo, TV/musique simultané
o	Inconvénients : Monotonie, coût équipement
COMBINAISON vélo + marche :
•	Vélo : 3x/semaine
•	Marche : 4x/semaine
•	Total : 7 jours activité ✓
Alimentation : Plan MODÉRÉMENT ACTIF
SI DOULEURS GENOUX/PÉRINÉE → ARRÊTER, PRIVILÉGIER MARCHE/NATATION
RÉPONSES 6 : \"Jardinage, ménage\"
ANALYSE : EXCELLENT activités quotidiennes (comptent !)
Avantages activités quotidiennes : ✓✓ Dépense calorique significative ✓✓ Utiles (maison, jardin entretenus) ✓ Quotidiennes (habitude facile) ✓ Variété mouvements
Dépense calorique (exemples 60 min) :
•	Jardinage léger : ~200 kcal
•	Jardinage intensif (bêcher, désherber) : ~300-400 kcal
•	Passer serpillière : ~150-200 kcal
•	Laver voiture : ~200 kcal
•	Lessive main (si pratiqué) : ~150 kcal
STRATÉGIE OPTIMISATION :
1. INTENSIFIER activités ménagères :
•	Passer serpillière : mouvement actifs, rythme soutenu
•	Lessives : frotter énergiquement
•	Ménage complet : 1-2x/semaine, 60-90 min
•	Jardinage : 2-3x/semaine si jardin disponible
2. COMBINER avec activité cardio structurée :
•	Ménage/jardinage : 4-5x/semaine (quotidien)
•	Marche rapide : 4-5x/semaine, 30-45 min
•	Total : Activité quotidienne ✓
IMPORTANT :
•	Activités quotidiennes COMPLÈTENT, ne REMPLACENT PAS totalement exercice structuré
•	Marche rapide 30 min/jour reste recommandée (cardio plus intense)
Alimentation : Plan LÉGÈREMENT À MODÉRÉMENT ACTIF selon intensité totale
CONTINUER activités + AJOUTER marche structurée ✓
RÉPONSE 7 : \"Aucune activité ne m'intéresse\"
ANALYSE : BARRIÈRE MOTIVATIONNELLE
Causes possibles :
•	Manque connaissance options
•	Expériences négatives passées
•	Douleurs/limitations physiques
•	Fatigue chronique
•	Dépression
•	Isolement social
STRATÉGIE DÉCOUVERTE PROGRESSIVE :
1. DÉMARRER TRÈS SIMPLE (zéro pression) :
Marche douce 10 min/jour :
•	Tour quartier
•	Moment agréable (matin frais, soir calme)
•	Musique/podcast plaisant
•	ZÉRO performance attendue
Objectif : Créer habitude plaisante, pas performance
2. ESSAIS VARIÉS (trouver \"le bon\") :
Semaine 1 : Marche quotidienne 10 min → Noter ressenti
Semaine 2 : Danse sur musique chez soi 10 min → Noter ressenti
Semaine 3 : Jardinage/ménage actif 15 min → Noter ressenti
Semaine 4 : Étirements/yoga doux (vidéo YouTube) 10 min → Noter ressenti
ANALYSER : Quelle activité MOINS détestée ? → Approfondir celle-ci
3. APPROCHE SOCIALE (motivation ↑) :
•	Marche avec ami(e), voisin(e), famille
•	Cours collectifs (danse, Zumba) si accessibles
•	Groupe marche quartier/église
Seul = abandon facile Groupe = engagement, plaisir ↑
4. REDÉFINIR \"EXERCICE\" :
PAS obligatoirement :
•	Salle sport
•	Performance
•	Souffrance
•	Vêtements techniques
PEUT ÊTRE :
•	Promenade tranquille découverte
•	Danse libre musique aimée
•	Jouer avec enfants/petits-enfants
•	Jardinage paisible
•	Ménage rythme musique
Activité physique = TOUT mouvement corporel
5. CONSULTER MÉDECIN/PSYCHOLOGUE si :
•	Fatigue extrême empêche tout mouvement → Bilan médical (anémie, hypothyroïdie, dépression)
•	Douleurs limitantes → Traitement, kinésithérapie
•	Dépression suspectée → Suivi psychologique
Dépression ↔ Inactivité = cercle vicieux Activité même légère ↑ humeur (endorphines)
6. SYSTÈME RÉCOMPENSES non-alimentaires :
•	1 semaine marche quotidienne → Cadeau (livre, musique)
•	1 mois activité régulière → Sortie plaisante (cinéma, visite)
Alimentation initiale : Plan SÉDENTAIRE
Puis ajuster selon progression activité
MESSAGE ENCOURAGEMENT : \"Trouver activité plaisante demande parfois temps et essais. Patience avec vous-même. Chaque petit pas (littéralement) compte. Commencez ultra-petit (5-10 min marche) et augmentez progressivement. Succès viendra.\"
NB :Si user choisit autre activité physique qu’il préfère hormis marche et yoga, tu lui balance les autres activités se trouvant en haut pour mla question précédentes
❤️ QUESTION 18 : Connaissez-vous votre fréquence cardiaque au repos ?
RÉPONSE : OUI - Si oui, veuillez nous la donner ? (Question à saisie)	
Utilisation pour l'entraînement :
•	Déterminant la fréquence cardiaque maximale (FCmax) : Formule de Tanaka (plus précise pour certains adultes) : FCmax ≈ 208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm].
Zones d'entraînement :
1.	Zone récupération (50-60% FCmax) : Échauffement, récupération
2.	Zone lipidique (60-70% FCmax) : Perte de poids optimale, intensité modérée
3.	Zone aérobie (70-80% FCmax) : Amélioration cardiovasculaire
4.	Zone seuil (80-90% FCmax) : Performance, réservé avancés
5.	Zone maximale (90-100% FCmax) : Haute intensité, courtes durées, athlètes
ANALYSE SELON VALEUR :
Fréquence cardiaque repos (FCR) normale adulte : 60-100 bpm
Si FCR : 60-75 bpm
ANALYSE : OPTIMAL ✓✓✓
Indication : ✓✓✓ Santé cardiovasculaire bonne ✓✓ Condition physique correcte à bonne ✓ Récupération adéquate
FÉLICITATIONS

Conseils :
•	Maintenir activité physique régulière
•	Suivre plans alimentation
•	Surveiller évolution FCR (↓ = amélioration condition physique)
CONTINUER AINSI ✓
Si FCR : 76-85 bpm
ANALYSE : ACCEPTABLE, améliorable
Indication : ⚠️ Condition physique moyenne ⚠️ Potentiel amélioration
Objectif : Réduire FCR (via activité physique régulière)
FCR ↓ = Cœur plus efficace (pompe plus sang par battement)
Plan amélioration FCR :
1. Activité CARDIO régulière :
•	5-7 jours/semaine
•	30-45 min/jour
•	Intensité modérée (marche rapide, vélo, natation, dan";

            case 'stress_ennui':
                return "se)
2. PROGRESSION :
•	Mois 1-2 : Activité modérée quotidienne
•	Mois 3+ : Ajouter intervalles 2x/semaine (intensité élevée courtes périodes)
3. SUIVI FCR :
•	Mesurer 1x/mois (matin au réveil, avant lever)
•	Objectif : ↓ 5-10 bpm en 3-6 mois
Alimentation : Plan selon niveau activité
Aliments santé cardiovasculaire :
•	Poissons gras (oméga-3) : 3x/semaine
•	Légumes verts
•	Fruits riches potassium (bananes, oranges)
•	Réduire sel, sucres ajoutés

Si FCR : 86-100 bpm
ANALYSE : LIMITE SUPÉRIEURE normale, ATTENTION
Indication : ⚠️⚠️ Condition physique faible ⚠️⚠️ Stress chronique possible ⚠️⚠️ Obésité impacte cœur ⚠️ Risque cardiovasculaire si maintenu
Objectif : RÉDUIRE FCR
Plan intensif amélioration :
1. Consultation MÉDICALE :
•	Bilan cardiovasculaire complet
•	ECG repos
•	Écho cardiaque si nécessaire
•	Test effort (évaluer capacité, sécurité)
2. Activité physique PROGRESSIVE SUPERVISÉE :
Phase 1 (Semaines 1-4) :
•	Marche douce quotidienne 20-30 min
•	Intensité légère (conversation facile)
•	Surveiller FCR pendant (ne doit pas dépasser 120-130 bpm)
Phase 2 (Semaines 5-8) :
•	Marche modérée quotidienne 30-40 min
•	Intensité modérée (légère essoufflement)
Phase 3 (Semaines 9-12) :
•	Marche rapide 40-45 min quotidienne
•	
o	Intervalles doux 1x/semaine
3. SUIVI FCR STRICT :
•	Mesurer quotidien (réveil)
•	Noter évolution
•	Objectif : ↓ 10-15 bpm en 6 mois
•	Consulter si FCR ↑ ou symptômes (douleur poitrine, malaise)
4. Gestion STRESS :
•	Méditation, respiration profonde
•	Sommeil adéquat (7-8h)
•	Voir Question 22 (Gestion stress)
Alimentation STRICTE santé cardiovasculaire :
Priorités :
•	SEL : <5g/jour (zéro bouillons cubes)
•	Oméga-3 : Poissons gras 3-4x/semaine
•	Potassium : Bananes, oranges, avocat, épinards
•	Magnésium : Légumes verts, noix, céréales complètes
•	Antioxydants : Fruits, légumes variés
ÉVITER :
•	Caféine excessive (max 2 cafés/jour, avant 12h)
•	Alcool
•	Sel
•	Graisses saturées
•	Sucres raffinés
Supplémentation (si prescrite médecin) :
•	Oméga-3 (huile poisson)
•	Magnésium
•	Coenzyme Q10
Si FCR : >100 bpm
ANALYSE : ANORMAL - CONSULTATION URGENTE
⚠️⚠️⚠️ TACHYCARDIE AU REPOS
Causes possibles :
•	Déconditionnement sévère
•	Stress/anxiété chronique
•	Anémie
•	Hyperthyroïdie
•	Déshydratation
•	Médicaments (certains)
•	Insuffisance cardiaque
•	Arythmie cardiaque
ACTION IMMÉDIATE :
1. CONSULTATION MÉDICALE URGENTE (cette semaine) :
•	Bilan complet : 
o	ECG repos + Holter ECG (24h)
o	Bilan sanguin (NFS, TSH, ionogramme)
o	Écho cardiaque
o	Test effort (si médecin juge sûr)
2. ACTIVITÉ PHYSIQUE :
•	SUSPENDUE jusqu'avis médical
•	Ne PAS démarrer exercice intense sans autorisation
•	Marche très douce permise (10-15 min) si aucun symptôme
3. SURVEILLANCE SYMPTÔMES :
Consulter URGENCES si :
•	Douleur poitrine
•	Palpitations sévères
•	Essoufflement repos
•	Malaise, vertiges
•	Syncope (perte connaissance)
4. MESURES IMMÉDIATES :
•	Hydratation adéquate (3L eau/jour)
•	Réduction stress (repos, relaxation)
•	Sommeil suffisant (8h)
•	ZÉRO caféine
•	ZÉRO alcool
Alimentation :
•	Plan sédentaire
•	Hydratation ↑
•	Sel modéré (si pas HTA, sinon SEL bas)
•	Aliments riches fer si anémie (viandes maigres, épinards, légumineuses + vitamine C)
SUIVI STRICT MÉDICAL jusqu'à normalisation
Si FCR : <60 bpm (Bradycardie)
ANALYSE : DEUX possibilités
A) ATHLÈTE ENTRAÎNÉ : ✓✓✓ Si activité physique intense régulière ✓ Cœur très efficace ✓ Excellent signe condition physique
OU
B) BRADYCARDIE PATHOLOGIQUE : ⚠️⚠️ Si sédentaire/peu actif ⚠️ Hypothyroïdie ⚠️ Médicaments (bêta-bloquants) ⚠️ Troubles conduction cardiaque
Si SÉDENTAIRE avec FCR <60 bpm :
ACTION :
•	Consultation médicale
•	ECG
•	Bilan thyroïde (TSH)
•	Évaluation médicaments si prise
Si ATHLÈTE avec FCR <60 bpm :
•	Normal et sain
•	Continuer activité
•	Surveiller symptômes (fatigue excessive, malaise)
RÉPONSE : NON (Ne connaît pas FCR)
RECOMMANDATION : APPRENDRE À MESURER
Pourquoi mesurer FCR :
•	Indicateur santé cardiovasculaire
•	Suivi progrès condition physique
•	Détection précoce anomalies
Comment mesurer FCR (MÉTHODE SIMPLE) :
1. MOMENT : Matin au réveil
•	Avant lever lit
•	Calme, repos
2. MÉTHODE MANUELLE (sans équipement) :
Pouls radial (poignet) :
•	Index + majeur sur artère radiale (côté pouce, face interne poignet)
•	Compter battements pendant 60 secondes
•	OU compter 30 sec × 2
Pouls carotidien (cou) - ALTERNATIVE :
•	Index + majeur sur artère carotide (côté cou, sous mâchoire)
•	Compter 60 secondes
•	⚠️ NE PAS appuyer fort (ralentit cœur)
3. MÉTHODE AVEC ÉQUIPEMENT (si accessible) :
•	Tensiomètre électronique (affiche FCR + tension)
•	Montre connectée/bracelet (si disponible)
•	Oxymètre de pouls (pince doigt - pharmacie)
4. NOTER RÉSULTAT :
•	Carnet/application smartphone
•	Évolution mensuelle
VALEURS NORMALES RAPPEL :
•	60-75 bpm : Optimal
•	76-85 bpm : Acceptable
•	86-100 bpm : Limite supérieure (améliorer)
•	100 bpm : Anormal (consulter)
•	<60 bpm : Excellent si athlète, consulter si sédentaire
ACTION RECOMMANDÉE :
•	Mesurer FCR dès demain matin
•	Refaire 3 jours consécutifs (moyenne)
•	Noter résultat
•	Ajuster plan selon valeur (voir analyses ci-dessus)
Alimentation : Suivre plans selon niveau activité actuel
PARTIE 6 : ADAPTATIONS SELON COMPORTEMENTS ALIMENTAIRES (Suite)
😔 QUESTION 19 : Mangez-vous souvent par stress ou ennui ?
RÉPONSE : OUI
ANALYSE : ALIMENTATION ÉMOTIONNELLE
Problématique : ❌ Nourriture utilisée pour gérer émotions (pas faim physique) ❌ Conduit suralimentation ❌ Choix souvent aliments réconfortants (sucré, gras) ❌ Culpabilité après → Plus de stress → Plus de nourriture (cercle vicieux) ❌ Obstacle majeur perte poids durable
⚠️ NÉCESSITE APPROCHE COMPORTEMENTALE (pas juste alimentaire)
STRATÉGIES GESTION ALIMENTATION ÉMOTIONNELLE :
1. IDENTIFICATION DÉCLENCHEURS :
Tenir JOURNAL ÉMOTIONS-ALIMENTATION (2 semaines) :
Chaque épisode grignotage émotionnel, noter :
•	Heure
•	Lieu
•	Émotion AVANT manger (stress, ennui, tristesse, colère, solitude, fatigue)
•	Situation déclencheuse (travail, conflit, solitude, etc.)
•	Aliments consommés
•	Quantité
•	Sensation APRÈS manger (soulagement temporaire ? culpabilité ?)
ANALYSE journal après 2 semaines :
•	Déclencheur principal ? (ex: stress travail, ennui soir)
•	Moment récurrent ? (ex: 15h chaque jour)
•	Émotions spécifiques ?
2. ALTERNATIVES NON-ALIMENTAIRES PAR ÉMOTION :
SI STRESS";

            case 'finir_assiette':
                return ":
•	Respiration profonde 5 min (4 sec inspire - 7 sec retient - 8 sec expire)
•	Marche rapide 10-15 min (extérieur si possible)
•	Appel ami/proche (parler soulage)
•	Musique relaxante + fermer yeux 5 min
•	Tisane citronnelle chaude (rituel apaisant)
•	Écriture libre 10 min (journal, exprimer ressenti)
SI ENNUI :
•	Marche/promenade (sortir environnement ennuyeux)
•	Activité manuelle (tricot, dessin, puzzle si disponible)
•	Appel téléphonique social
•	Lecture livre/magazine
•	Ménage actif (productif + distraction)
•	Musique + danse 10 min (ludique)
SI TRISTESSE :
•	Parler à quelqu'un (ami, famille, proche)
•	Pleurer (libération émotionnelle saine)
•	Activité physique douce (marche calme, yoga)
•	Bain/douche relaxante
•	Écriture sentiments (journal intime)
•	Prière/méditation (si pratique spirituelle)
SI COLÈRE :
•	Activité physique intense (marche rapide, ménage vigoureux, danse énergique)
•	Crier dans coussin/lieu isolé (libère tension)
•	Frapper oreiller/matelas (libération physique sûre)
•	Écriture colère puis déchirer feuille (symbolique)
•	Respiration profonde + compter 10
SI FATIGUE :
•	REPOS (sieste 20 min)
•	Hydratation (souvent déshydratation confondue fatigue)
•	Sortir prendre air
•	Étirements doux
•	Aller coucher plus tôt (pas grignoter pour rester éveillé)
SI SOLITUDE :
•	Appeler ami/famille
•	Sortir lieu public (marché, parc, église)
•	Visiter voisin/proche
•	Rejoindre groupe (marche, danse, prière)
•	Bénévolat (si disponible)
3. RÈGLE DES 15 MINUTES :
Quand envie grignoter émotionnel :
PAUSE OBLIGATOIRE 15 min :
1.	Noter émotion ressentie
2.	Choisir alternative non-alimentaire appropriée (liste ci-dessus)
3.	Pratiquer alternative 15 min
4.	Réévaluer après 15 min : 
o	Envie disparue ? ✓ SUCCÈS → Continuer activité
o	Envie persiste ? → Voir étape suivante
4. SI ENVIE PERSISTE APRÈS 15 MIN :
Se poser questions :
•	Faim PHYSIQUE réelle ? 
o	Ventre gargouille ?
o	Faim progressive ?
o	Repas/collation >3-4h ? → Si OUI faim physique → Manger collation SAINE planifiée (fruits + noix)
•	Faim ÉMOTIONNELLE ? 
o	Envie soudaine, spécifique (sucré/gras)
o	Sensation gorge/bouche (pas estomac)
o	Après repas récent (<2h) → Si OUI émotionnelle → Essayer autre alternative 15 min OU portion TRÈS limitée aliment sain
5. SI CRAQUAGE (arrive, normal) :
ZÉRO CULPABILITÉ (aggrave cycle)
À FAIRE :
•	Noter dans journal (apprentissage)
•	Analyser calmement : 
o	Qu'est-ce qui a déclenché ?
o	Alternatives essayées ?
o	Qu'est-ce qui aiderait prochaine fois ?
•	Reprendre alimentation normale repas suivant (PAS restriction compensatoire - aggrave)
•	Auto-compassion : \"C'est difficile, je fais de mon mieux, je progresse\"
À NE PAS FAIRE :
•	Culpabilité excessive
•	Restriction repas suivant (jeûne \"compensation\")
•	Abandon (\"c'est raté, je mange tout\")
•	Auto-critique dure
6. ALIMENTATION STRUCTURÉE (prévention) :
Repas RÉGULIERS et SUFFISANTS :
•	JAMAIS sauter repas (faim excessive → compulsions)
•	3 repas + 2 collations planifiés chaque jour
•	Portions adéquates (pas restriction excessive)
Exemple journée structurée :
•	7h : Petit-déjeuner complet
•	10h : Collation planifiée
•	13h : Déjeuner complet
•	16h : Collation planifiée
•	19h : Dîner complet
Régularité = glycémie stable = moins fringales émotionnelles
7. ENVIRONNEMENT SAIN :
NE PAS avoir chez soi :
•	Aliments réconfort typiques (beignets, gâteaux, bonbons, sodas, chips)
•	\"Si pas disponible, pas mangé\"
Avoir chez soi UNIQUEMENT :
•	Fruits frais variés
•	Arachides/noix NON salées (portions pré-pesées sachets 15g)
•	Légumes crus (carotte, concombre) pré-coupés bâtonnets
•	Infusions (citronnelle, gingembre)
Grignotage émotionnel → Au pire fruits/légumes (dégâts limités)
8. SOUTIEN PSYCHOLOGIQUE (fortement recommandé) :
Consultation psychologue/thérapeute :
•	Spécialisé troubles comportement alimentaire
•	Thérapie cognitivo-comportementale (TCC) : très efficace alimentation émotionnelle
•	Apprentissage gestion émotions saines
•	Identification croyances limitantes
Groupes de soutien :
•	Autres personnes vivant même problématique
•	Partage expériences, stratégies
•	Motivation mutuelle
9. TECHNIQUES PLEINE CONSCIENCE (M";

            case 'regime_particulier':
                return "indfulness) :
Manger en pleine conscience (même gri";

            case 'regime_efficacite':
                return "gnotages) :
•	Avant manger : \"Ai-je faim physique ?\"
•	Pendant : Manger LENTEMENT, SAVOURER, sans distraction (TV, téléphone)
•	Observer : Goûts, textures, sensations
•	Arrêter : Dès satiété (pas vider assiette automatiquement)
Méditation/respiration quotidienne :
•	10 min/jour
•	Applications guidées (si smartphone) : Petit Bambou, Headspace
•	Réduit stress global → Réduit grignotages émotionnels
ALIMENTATION ADAPTÉE :
Suivre plans selon niveau activité
MAIS ajustements :
Collations planifiées OBLIGATOIRES :
•	10h et 16h (moments fringales fréquentes)
•	Prévient faim excessive → Prévient compulsions
Aliments haute densité nutritionnelle (satiété ↑) :
•	Protéines chaque repas
•	Fibres (légumes abondants, céréales complètes)
•	Graisses saines modération (avocat, noix)
Repas plaisants (pas punition) :
•	Saveurs appréciées
•	Variété
•	Pas monotonie (démotivation)
PROGRÈS = PROCESSUS
Objectif :
•	Grignotages émotionnels quotidiens → 1-2x/semaine (6 mois)
•	Puis 2-3x/mois (1 an)
•	Puis occasions rares
Chaque grignotage évité = VICTOIRE
Rechutes normales → Apprentissage
PERSÉVÉRANCE ✓
RÉPONSE : NON
ANALYSE : EXCELLENT ✓✓✓
Alimentation motivée par faim physique (pas émotions)
Bénéfices : ✓✓✓ Relation saine nourriture ✓✓ Contrôle portions facilité ✓✓ Perte poids facilitée
FÉLICITATIONS
Conseils maintien :
•	Rester vigilant (stress futur peut déclencher)
•	Si apparition grignotages émotionnels → Appliquer stratégies ci-dessus immédiatement
•	Continuer écoute faim/satiété
Alimentation : Suivre plans selon niveau activité
CONTINUER AINSI ✓✓✓
🍽️ QUESTION 20 : Avez-vous tendance à finir votre assiette même si vous n'avez plus faim ?
RÉPONSE : OUI
ANALYSE : COMPORTEMENT PROBLÉMATIQUE COMMUN
Causes possibles :
•	Éducation (\"finis ton assiette, gaspillage = mal\")
•	Portions servies trop importantes
•	Manger trop vite (satiété retardée)
•	Manger distrait (TV, téléphone - pas conscience satiété)
•	Peur manquer nourriture
Conséquences : ❌ Suralimentation régulière (calories excédentaires) ❌ Estomac distendu progressivement (portions ↑ nécessaires satiété) ❌ Perte connexion signaux faim/satiété naturels ❌ Prise poids
STRATÉGIES RÉÉDUCATION ÉCOUTE SATIÉTÉ :
1. PORTIONS INITIALES RÉDUITES :
Servir MOINS initialement :
•	3/4 portion habituelle SEULEMENT
•	Exemple : 
o	Si habituellement 300g pâte → Servir 220g
o	Si finit ET encore faim → Resservir 50g supplémentaires
o	Si satiété atteinte 220g → ARRÊTER (économie 80g = ~120 kcal)
OBJECTIF : Satiété atteinte = Arrêt (PAS assiette vide = arrêt)
2. MANGER LENTEMENT (CRUCIAL) :
Satiété = 15-20 min retard
•	Manger vite → Finit assiette AVANT signal satiété
•	Manger lentement → Signal satiété PENDANT repas → Arrêt naturel
Techniques ralentir :
•	Poser couverts entre chaque bouchée
•	Mâcher 15-20x minimum chaque bouchée
•	Boire gorgées eau entre bouchées
•	Conversation si repas social (ralentit naturellement)
•	Chronomètre : Objectif 20-30 min/repas (vs 10 min habituel)
3. MANGER SANS DISTRACTION :
ZÉRO :
•	TV
•	Téléphone
•	Lecture
•	Travail
Manger = Activité UNIQUE moment repas
Pleine conscience :
•	Observer aliments (couleurs, odeurs)
•	Savourer goûts
•	Ressentir textures
•	ÉCOUTER corps : \"Ai-je encore faim ? Satiété atteinte ?\"
Distraction → Manger automatique, perte signaux satiété
4. ÉCHELLE FAIM/SATIÉTÉ (apprentissage) :
Avant/pendant/après chaque repas, se noter 1-10 :
1-2 : Affamé (estomac vide, faiblesse) 3-4 : Faim confortable (moment idéal manger) 5-6 : Neutre/Satisfait (satiété légère) 7-8 : Repu (estomac plein) 9-10 : Trop plein (inconfort, lourdeur)
OBJECTIFS :
•	Commencer repas : 3-4 (faim confortable, pas affamé)
•	Arrêter repas : 6-7 (satisfait, pas repu)
Manger jusqu'à 9-10 (assiette vide forcé) = ERREUR
5. ARRÊT MILIEU REPAS (évaluation) :
À MI-ASSIETTE, PAUSE OBLIGATOIRE 2 min :
•	Poser couverts
•	Boire eau
•	Se demander : \"Ai-je encore faim ?\" 
o	Si OUI → Continuer manger lentement
o	Si NON/DOUTE → ARRÊTER (couvrir reste, garder plus tard)
Permission ARRÊTER avant assiette vide = LIBÉRATION
6. PETITES ASSIETTES (astuce psychologique) :
Assiette plus petite = portion paraît plus importante
•	Cerveau satisfait visuellement
•	Même quantité nourriture, impression \"assiette pleine finie\"
Astuce efficace prouvée scientifiquement
7. RESTES = OK (pas gaspillage) :
Dé-culpabiliser laisser nourriture assiette
\"Gaspillage\" :
•	Manger au-delà satiété = Stockage graisse (gaspillage aussi, dans VOTRE corps)
•	Laisser assiette = Restes réfrigérés, mangés repas suivant (zéro gaspillage réel)
OU
Portions justes initialement = zéro reste
8. REPAS FAMILIAUX (défis spécifiques) :
Si pression sociale \"finis assiette\" :
•	Expliquer calmement : \"J'apprends écouter ma satiété pour ma santé\"
•	Servir soi-même (contrôle portions)
•	Refuser poliment resservir si satiété atteinte
Culture béninoise généreuse (repas abondants) :
•	Honorer générosité ≠ suralimentation obligatoire
•	Exprimer gratitude sans finir obligatoirement
ALIMENTATION ADAPTÉE :
Plans selon niveau activité MAIS :
Quantités indiquées = GUIDES (pas obligations absolues)
Ajuster selon satiété réelle :
•	Si satiété atteinte avant fin portion guide → ARRÊTER
•	Si faim persiste après portion guide → Ajouter légumes (priorité)
Priorité signaux CORPORELS > quantités théoriques
PROGRÈS ATTENDU :
Semaines 1-2 : Difficile arrêter avant fin (habitude forte) 
Semaines 3-4 : Conscience satiété augmente 
Mois 2-3 : Arrêt naturel avant fin assiette occasionnel 
Mois 3-6 : Écoute satiété devient automatique
Patience avec soi-même
RÉPONSE : NON
ANALYSE : EXCELLENT ✓✓✓
Écoute signaux faim/satiété naturels
Bénéfices : ✓✓✓ Autorégulation naturelle ✓✓ Portions adaptées besoins réels ✓✓ Perte poids facilitée
FÉLICITATIONS
Conseils maintien :
•	Continuer écoute corps
•	Rester vigilant distractions (TV, téléphone - peuvent perturber)
•	Manger lentement, pleine conscience
Alimentation : Suivre plans selon niveau activité, ajuster selon satiété réelle
CONTINUER AINSI ✓✓✓
📋 QUESTION 21 : Avez-vous déjà suivi un régime alimentaire particulier ?
RÉPONSE : OUI - Si oui, lequel, et a-t-il été efficace pour vous ? Pourquoi ? (Question à saisie)
ANALYSE SELON RÉPONSES (EXEMPLES) :
EXEMPLE 1 : \"Régime sans glucides (Keto). J'ai perdu 8 kg en 2 mois mais j'ai tout repris en 3 mois après l'arrêt.\"
ANALYSE RÉGIME KETO (cétogène) :
Principe : Glucides très bas (<50g/j), lipides élevés, protéines modérées
Efficacité court terme : ✓✓ Perte poids rapide (eau + graisse)
Problèmes : ❌ Non soutenable long terme (élimination aliments de base béninois : pâte, riz, igname, banane plantain) ❌ Frustration élevée ❌ Carences possibles (fibres, vitamines si mal équilibré) ❌ Reprise poids SYSTÉMATIQUE à l'arrêt (effet yo-yo) ❌ Inadapté culture alimentaire béninoise
POURQUOI reprise poids :
•	Régime temporaire (durée limitée) → Retour habitudes antérieures → Reprise poids
•	Métabolisme ralenti pendant restriction → Reprise poids facilitée
•	Perte muscle (pas que graisse) → Métabolisme ↓ permanent
NOUVELLE APPROCHE RECOMMANDÉE :
OUBLIER :
•	Régimes extrêmes (keto, sans glucides, etc.)
•	Restrictions drastiques
•	Durée limitée
ADOPTER :
•	Rééquilibrage alimentaire béninois (inclut TOUS groupes aliments)
•	Glucides COMPLEXES portions modérées (pâte, riz complet, igname)
•	PERMANENT (pas temporaire)
•	Plaisir préservé
Votre expérience keto prouve : ✓ Vous POUVEZ perdre poids (motivation, discipline) ❌ Méthode choisie n'était pas DURABLE
Avec approche équilibrée béninoise :
•	Perte plus LENTE (0,5-1 kg/semaine) MAIS
•	SOUTENABLE long terme
•	MAINTIEN poids perdu
•	Aliments culturels préservés
•	Vie sociale préservée
Suivre plans proposés Partie 1 selon niveau activité ✓
EXEMPLE 2 : \"Régime jus/détox 1 semaine. J'ai perdu 3 kg mais j'étais très fatigué et tout repris immédiatement.\"
ANALYSE RÉGIME JUS/DÉTOX :
Principe : Jus fruits/légumes uniquement, plusieurs jours
⚠️⚠️ RÉGIME DANGEREUX
Problèmes MAJEURS : ❌❌ Calories très insuffisantes (fatigue extrême) ❌❌ Protéines quasi nulles (perte muscle importante) ❌❌ Carences multiples ❌❌ Hypoglycémie ❌❌ Perte poids = EAU + MUSCLE (pas graisse) ❌❌ Reprise immédiate (eau + muscle perdus) ❌❌ Ralentissement métabolique sévère ❌ \"Détox\" = MYTHE (foie/reins détoxifient naturellement)
Efficacité réelle : ZÉRO (illusion perte poids eau)
MESSAGE IMPORTANT :
\"DÉTOX\" n'existe pas
•	Corps détoxifie naturellement (foie, reins)
•	Jus/détox = Marketing, zéro science
•	Aucun besoin \"purifier\" corps
JAMAIS refaire régime jus/détox
Si envie \"nettoyer\" organisme :
•	Augmenter fruits/légumes ENTIERS (fibres)
•	Hydratation (eau)
•	Réduire aliments transformés, sucres, alcool
•	Activité physique
•	Sommeil adéquat
Approche SAINE déjà incluse dans plans proposés ✓
EXEMPLE 3 : \"Régime hyperprotéiné (sachets substituts repas). Efficace 1 mois (-5 kg) mais trop cher et monotone, j'ai arrêté.\"
ANALYSE RÉGIME HYPERPROTÉINÉ substituts :
Principe : Remplacement repas par sachets protéinés
Efficacité court terme : ✓ Perte poids (déficit calorique strict)
Problèmes : ❌ Coût élevé (sachets importés chers au Bénin) ❌ Monotonie extrême (démotivation) ❌ Non soutenable long terme ❌ Perte compétences culinaires (pas apprentissage alimentation saine) ❌ Vie sociale impossible (pas partager repas familiaux) ❌ Reprise poids à l'arrêt (retour alimentation normale sans rééducation)
POURQUOI abandon :
•	Non adapté réalité vie béninoise
•	Isolement social
•	Frustration
AVANTAGE identifié : Structure, simplicité
NOUVELLE APPROCHE (garde avantage, élimine inconvénients) :
Plans repas STRUCTURÉS proposés Partie 1 : ✓ Structure claire (comme sachets) ✓ Aliments VRAIS béninois (accessibles, abordables) ✓ Variété (pas monotonie) ✓ Vie sociale préservée ✓ Apprentissage alimentation saine (compétences vie) ✓ Soutenable PERMANENT
Si besoin simplicité maximale :
•	Préparer repas semaine (batch cooking dimanche)
•	Répéter mêmes repas semaine (variété semaine suivante)
•	Utiliser options A/B proposées (limite décisions)
Votre expérience prouve : ✓ Structure aide (reproduire avec vrais aliments) ✓ Motivation présente (réorienter vers méthode durable)
EXEMPLE 4 : \"Je saute le petit-déjeuner tous les jours (jeûne intermittent). J'ai perdu 2 kg mais je suis fatigué et j'ai très faim à midi.\"
ANALYSE JEÛNE INTERMITTENT (IF) :
Principe : Fenêtre alimentaire restreinte (ex: 16h jeûne / 8h alimentation)
Efficacité : Variable (dépend individus)
VOTRE cas spécifique : ❌ Fatigue (signe inadaptation) ❌ Faim excessive midi (risque suralimentation compensatoire) ❌ Perte poids minime (2 kg)
IF inadapté pour VOUS
POURQUOI IF ne fonctionne pas pour vous :
•	Obésité + jeûne = Métabolisme peut ralentir encore
•	Fatigue = Glycémie basse, manque énergie
•	Faim excessive midi = Compulsions, suralimentation
•	Difficulté concentration (hypoglycémie)
RECOMMANDATION : ARRÊTER jeûne intermittent
ADOPTER : 3 repas + 2 collations réguliers
•	Petit-déjeuner 7h (NON NÉGOCIABLE)
•	Collation 10h
•	Déjeuner 13h
•	Collation 16h
•	Dîner 19h
Avantages : ✓ Glycémie stable (énergie constante) ✓ Pas faim excessive (portions contrôlées naturellement) ✓ Métabolisme actif ✓ Préservation masse musculaire
IF peut fonctionner pour certains, mais PAS pour vous selon symptômes
Suivre plans structurés 3 repas + 2 collations ✓
EXEMPLE 5 : \"Régime Weight Watchers (points). Efficace (-12 kg en 6 mois) mais j'ai arrêté l'abonnement et repris 8 kg en 1 an.\"
ANALYSE WEIGHT WATCHERS :
Principe : Système points, flexibilité, groupe soutien
Efficacité : ✓✓✓ EXCELLENTE (preuve : -12 kg)
Avantages : ✓✓✓ Structure sans rigidité excessive ✓✓ Flexibilité (tous aliments permis) ✓✓ Soutien groupe (motivation) ✓ Éducation alimentaire
Problème VOTRE cas : ❌ Dépendance abonnement (arrêt = reprise poids) ❌ Coût (abonnement mensuel)
ANALYSE POSITIVE : ✓✓✓ Weight Watchers A FONCTIONNÉ pour vous ✓✓✓ Vous avez capacité perdre poids durablement (6 mois) ✓✓ Approche équilibrée vous convient (pas extrême)
POURQUOI reprise 8 kg :
•	Arrêt suivi/structure
•	Retour progressif anciennes habitudes
•	Perte soutien groupe
SOLUTION : Reproduire PRINCIPES Weight Watchers gratuitement
1. STRUCTURE (équivalent points) :
•	Plans repas proposés Partie 1 = Structure équivalente
•	Portions définies = Contrôle calorique (comme points)
2. FLEXIBILITÉ (comme WW) :
•	Options A/B chaque repas = Choix
•	Variété aliments béninois
3. SOUTIEN (remplacer groupe WW) :
•	Ami/famille partage démarche (accountability partner)
•	Groupe marche quartier/église
•	Suivi nutritionniste (si accessible) ponctuel
•	Application smartphone suivi (gratuite)
4. ÉDUCATION (acquise WW, appliquer) :
•	Vous connaissez déjà principes (portions, équilibre)
•	Appliquer à alimentation béninoise quotidienne
5. SUIVI POIDS régulier (comme WW) :
•	Pesée 1x/semaine (même jour, même heure, même conditions)
•	Noter résultats
•	Ajuster si stagnation/reprise
Votre expérience WW = PREUVE capacité réussir
Plans proposés = WW adapté culture béninoise, gratuit, permanent ✓✓✓
EXEMPLE 6 : \"Jamais suivi régime particulier mais j'ai essayé manger moins, ça n'a pas marché.\"
ANALYSE \"Manger moins\" sans structure :
Problème : ❌ \"Manger moins\" = Vague, pas structure ❌ Risque restriction excessive (métabolisme ralentit) ❌ Pas éducation alimentaire (quoi manger moins ?) ❌ Frustration (sentiment privation) ❌ Échec fréquent (démotivation)
POURQUOI ça n'a pas fonctionné :
•	Pas plan précis
•	Peut-être portions trop réduites (métabolisme ralenti)
•	Peut-être mauvais choix aliments (sucres, graisses élevées malgré quantité réduite)
•	Pas activité physique associée
NOUVELLE APPROCHE STRUCTURÉE :	
PAS \"manger moins\" (vague)
MAIS \"manger MIEUX et JUSTE\" (précis) :
1. QUANTITÉS OPTIMALES (pas juste \"moins\") :
•	Plans proposés Partie 1 = Portions calculées selon niveau activité
•	Ni trop, ni trop peu (métabolisme actif)
2. QUALITÉ ALIMENTS :
•	Protéines suffisantes (satiété, muscle)
•	Glucides complexes (énergie durable)
•	Lipides sains (hormones, satiété)
•	Légumes abondants (fibres, vitamines)
3. STRUCTURE :
•	3 repas + 2 collations précis
•	Horaires réguliers
4. ACTIVITÉ PHYSIQUE ASSOCIÉE :
•	Essentielle succès
•	Voir Partie 5
\"Manger moins\" seul = insuffisant \"Manger mieux + bouger plus\" = succès ✓
Suivre plans complets (alimentation + activité) ✓
RÉPONSE : NON (Jamais suivi régime particulier)	
ANALYSE : Deux possibilités
A) Jamais essayé perdre poids
•	Première démarche
•	Opportunité démarrer SAINEMENT dès le début
•	Pas échecs antérieurs (confiance préservée)
AVANTAGE : Page blanche, bonnes habitudes dès le départ ✓
B) Essais informels sans succès
•	Tentatives non structurées
•	Découragement
APPROCHE RECOMMANDÉE :
Démarrage SAIN et STRUCTURÉ :
1. Éducation alimentaire :
•	Comprendre principes (macronutriments, portions, équilibre)
•	Ce guide = Éducation complète
2. Plans personnalisés :
•	Selon niveau activité
•	Selon antécédents médicaux
•	Aliments béninois familiers
3. Progression :
•	Changements PROGRESSIFS (pas bouleversement brutal)
•	Habitudes ancrées progressivement
4. Suivi :
•	Poids 1x/semaine
•	Ajustements si nécessaire
5. Patience :
•	Perte 0,5-1 kg/semaine = optimal
•	6-12 mois atteindre objectif (selon poids à perdre)
6. Perspective long terme :
•	Changement MODE VIE (pas régime temporaire)
•	Permanent
Votre avantage : Pas habitudes échecs, confiance intacte ✓
Suivre plans proposés dès le début ✓✓✓";

            default:
                return 'Aucun';
        }
    }
}
