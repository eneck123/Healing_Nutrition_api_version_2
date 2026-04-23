<?php

namespace App\Services;

class WeightLossUnder5CardioRecommendationService implements RecommendationServiceInterface
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = [], int $age = 30): string
    {
        switch ($key) {
            case 'antecedents_diag':
                return "tion : Avez-vous des antécédents de diabète de type 2, d'hypertension ou de maladies cardiovasculaires ?
✅ Réponse : OUI
Conseils ciblés :
•	Privilégier les glucides à index glycémique bas (igname, patate douce, riz complet)
•	Limiter drastiquement le sel (< 5g/jour) : éviter les poissons fumés excessivement salés, les bouillons cubes
•	Favoriser les cuissons sans matières grasses (vapeur, grillade, bouilli)
•	Augmenter les fibres (légumes verts à chaque repas)
❌ Réponse : NON
Conseils ciblés :
•	Maintenir une alimentation préventive
•	Surveiller quand même le sel et les graisses saturées
•	Continuer l'équilibre alimentaire pour éviter l'apparition de complications
Question : Si oui, lequel ?
Réponse possible : MALADIES CARDIOVASCULAIRES
Conseils ciblés :
•	Réduire les graisses saturées et trans
•	Privilégier les oméga-3 (poissons gras : maquereau, sardines fraîches)
•	Limiter viandes rouges, privilégier volaille sans peau et poisson
•	Augmenter fruits, légumes, fibres
•	Contrôler le cholestérol alimentaire
Question : Prenez-vous actuellement des médicaments liés à votre antécédent ?
✅ Réponse : OUI
Conseils ciblés :
•	Respecter scrupuleusement les heures de prise des médicaments
•	Certains médicaments interagissent avec les aliments";

            case 'regime_efficacite':
                return "(voir question suivante)
•	Maintenir une alimentation régulière pour optimiser l'efficacité des traitements
•	Ne jamais arrêter un traitement sans avis médical
Repas :
•	Régularité des horaires de repas
•	3 repas principaux + 2 collations à heures fixes
•	Hydratation régulière (1,5-2L d'eau/jour)
❌ Réponse : NON
Conseils ciblés :
•	L'alimentation est votre principale arme thérapeutique
•	Redoubler d'efforts sur l'équilibre alimentaire
•	Surveillance régulière des paramètres (tension, glycémie si possible)
•	Consultation médicale régulière recommandée
QUESTION : Si oui, lesquels ? (Médicaments spécifiques)
	Pour le tableau qui suit, nous avons des médicaments pour les personnes souffrant d’hypertension et d’obésité modérée comme ce futle cas ici :
Classe de médicaments	Exemples de medicaments	Rôle principal	Conseils ciblés
Antihypertenseurs	IEC : Enalapril, RamiprilBêta-bloquants : Métoprolol, BisoprololARA II : Losartan, ValsartanDiurétiques : Hydrochlorothiazide, Furosemide	Contrôle de la tension artérielle, protection du cœur	- Réduire le sel dans l’alimentation- Éviter l’automédication (risque d’interactions)- Contrôler régulièrement la tension artérielle
Hypolipémiants (statines)	Atorvastatine, Rosuvastatine, Simvastatine	Diminution du cholestérol et prévention de l’athérosclérose	- Favoriser une alimentation pauvre en graisses saturées- Éviter le pamplemousse (interaction possible)- Faire contrôler régulièrement les enzymes hépatiques
Antiplaquettaires	Aspirine à faible dose, Clopidogrel	Prévention des caillots sanguins et des AVC	- Surveiller tout signe de saignement- Éviter l’automédication avec anti-inflammatoires- Prendre le médicament avec un repas pour protéger l’estomac
Antidiabétiques (si syndrome métabolique ou diabète associé)	Metformine, Gliflozines (dapagliflozine), GLP-1 agonistes (liraglutide, semaglutide)	Contrôle du sucre sanguin, prévention des complications cardiovasculaires	- Limiter les sucres rapides- Favoriser une activité physique adaptée- Surveiller la glycémie régulièrement
Anticoagulants (si fibrillation auriculaire ou risque élevé de thrombose)	Warfarine, Apixaban, Rivaroxaban	Fluidification du sang pour prévenir les thromboses	- Éviter les aliments trop riches en vitamine K (ex. chou, épinard si sous warfarine)- Faire surveiller régulièrement l’INR (si warfarine)- Informer tout médecin avant une chirurgie ou extraction dentaire
Médicaments anti-obésité (si prescrits)	Orlistat, Liraglutide (dans l’indication perte de poids), Semaglutide	Favorisent la perte de poids et réduisent les risques cardiométaboliques	- Associer obligatoirement à un régime équilibré- Surveiller les effets digestifs (orlistat)- Suivi médical strict pour les effets secondaires

Pour le tableau précédent, la chose à faire est d’afficher la partie des onformations concernées ( toute la lligne en sélectionnant une ligne) à un user qui aurait dans sa réponse donnée donner un des médicaments contenues dans le tableau en dessus
Question : Prenez-vous l'un des types de médicaments suivants ?
Réponse : MÉDICAMENTS POUR BAISSER LA GLYCÉMIE (metformine, glimepiride...)
Conseils ciblés :
•	Metformine : peut causer des troubles digestifs, privilégier aliments riches en fibres douces
•	Risque d'hypoglycémie avec certains médicaments : ne jamais sauter de repas
•	Éviter l'alcool qui interfère avec ces médicaments
•	Prendre les repas à horaires réguliers
Réponse : INSULINE
Conseils ciblés :
•	Comptage des glucides indispensable
•	Synchroniser les repas avec les injections
•	Toujours avoir une collation de secours (risque d'hypoglycémie)
•	Privilégier index glycémique bas
Réponse : MÉDICAMENTS POUR PERDRE DU POIDS (orlistat, liraglutide...)
Conseils ciblés :
•	Orlistat : réduit absorption des graisses → limiter graisses à 15g/repas pour éviter effets secondaires
•	Liraglutide : réduit l'appétit → fractionner en petits repas
•	Privilégier cuissons sans matières grasses
Réponse : MÉDICAMENTS POUR LA TENSION (IEC, ARA2, bêta-bloquants...)
Conseils ciblés :
•	IEC/ARA2 : surveiller le potassium (ne pas exagérer bananes, avocat)
•	Bêta-bloquants : peuvent masquer symptômes d'hypoglycémie si diabétique
•	Réduction stricte du sel reste prioritaire




Réponse : MÉDICAMENTS POUR LE CHOLESTÉROL (statines)
Conseils ciblés :
•	Réduire graisses saturées et cholestérol alimentaire
•	Augmenter fibres solubles (avoine, haricots, légumes)
•	Éviter pamplemousse qui interfère avec statines
•";

            case 'journee_typique':
                return "Privilégier graisses insaturées (huile d'olive, poissons)
Réponse : AUCUN DE CES MÉDICAMENTS
Conseils ciblés :
•	L'alimentation et l'activité physique sont vos principaux outils
•	Prévention primaire essentielle
•	Surveillance régulière recommandée
•	Appro";

            case 'fruits_legumes':
                return "che naturelle privilégiée
QUESTION : Pouvez-vous décrire une journée typique de vos repas et collations ?
	Nous vous remercions pour nous avoir divulgué votre journée typique car cela va nous permettre de vous orienter dans nos conseils enfin de cerner vos réalités quotidiennes en matière de nutrition. 
Question : Combien de portions de fruits et légumes consommez-vous par jour ?
Réponse : 1-2 portions
Conseils ciblés :
•	INSUFFISANT : Objectif minimum 5 portions/jour
•	Augmenter progressivement pour atteindre 5-7 portions
•	Les légumes doivent occuper la moitié de l'assiette à chaque repas
•	Les fruits sont d'excellentes collations
Repas adaptés pour augmenter :
•	Petit-déjeuner : Ajouter systématiquement 1 fruit (papaye, orange, mangue)
•	Déjeuner : Sauce gombo + salade verte + carotte râpée (3 portions légumes)
•	Dîner : Légumes vapeur + salade + 1 fruit en dessert
•	Collations : TOUJOURS des fruits ou légumes crus
Réponse : 3-4 portions
Conseils ciblés :
•	Bien mais peut mieux faire
•	Viser 5-7 portions pour bénéfices optimaux
•	Varier les couleurs (vert, orange, rouge, jaune)
Repas :
•	Continuer et ajouter 1-2 portions suppl�";

            case 'grignotage':
                return "�mentaires
•	Légumes à chaque repas principal
•	2-3 fruits répartis dans la journée
Réponse : 5 portions ou plus
Conseils ciblés :
•	EXCELLENT : Continuez ainsi !
•	Maintenir cette habitude
•	Varier les types pour diversifier les nutriments
Repas  :
•	Maintenir la routine actuelle
•	Découvrir de nouveaux légumes béninois (feuilles d'amarante, épinards locaux)
Question : Grignotez-vous entre les repas ?
✅ Réponse : OUI
Question de suivi : Si oui, Quels aliments consommez-vous ?
Si réponse : Aliments sucrés (beignets, gâteaux, bonbons...)
Conseils ciblés :
•	PROBLÉMATIQUE : Favorise prise de poids et déséquilibres glycémiques
•	Remplacer immédiatement par des collations saines
•	Les beignets béninois sont très riches en graisses et sucres
Collations saines de remplacement :
•	Fruits frais (banane, orange, mangue, papaye, ananas)
•	Noix de cajou nature (20g maximum)
•	Arachides grillées non salées et non sucrées
•	Carotte ou concombre crus
•	Yaourt nature non sucré
Si réponse : Aliments salés (chips, cacahuètes salées, biscuits salés...)
Conseils ciblés :
•	PROBLÉMATIQUE : Excès de sel aggrave l'hypertension
•	Très caloriques, favorisent la prise de poids
•	Remplacer par versions sans sel
Collations  saines :
•	Arachides grillées NATURE (sans sel)
•	Noix de cajou nature
•	Maïs grillé nature (sans sel ni beurre)
•	Fruits frais
•	Légumes crus
Si réponse : Fruits, noix nature, légumes
Conseils ciblés :
•	EXCELLENT CHOIX : Continuez !
•	Attention a";

            case 'boissons':
                return "ux quantités de noix (riches en calories) : 20-30g maximum
•	Varier les fruits pour diversifier
❌ Réponse : NON
Conseils ciblés :
•	Si vous avez faim entre les repas : MANGER une collation saine
•	2 collations/jour recommandées pour maintenir métabolisme actif
•	Aide à éviter la suralimentation aux repas principaux
Collations recommandées :
•	Milieu de matinée : 1 fruit
•	Milieu d'après-midi : Noix (20g) ou yaourt nature


Question : Fréquence de consommation de boissons sucrées ou alcoolisées ?
Réponse : TOUS LES JOURS
Conseils ciblés :
•	TRÈS PROBLÉMATIQUE : Arrêt immédiat nécessaire
•	Boissons sucrées : calories vides, pics glycémiques, risque diabète
•	Alcool : calories élevées, interfère avec médicaments, augmente tension
•	Impact direct sur poids et santé cardiovasculaire
•	Les boissons sucrées apportent des calories vides sans satiété 
•	L'alcool augmente la pression artérielle et le poids 
•	Objectif : élimination complète des boissons sucrées, alcool occasionnel uniquement
Plan de sevrage progressif (6 semaines) :
Semaines 1-2 :
•	Réduire de 50% les quantités
•	Diluer les boissons sucrées avec de l'eau
•	Remplacer 1 boisson sucrée/jour par de l'eau infusée
Semaines 3-4 :
•	Réduire de 75% les quantités
•	Maximum 1 boisson sucrée tous les 2 jours
•	Alcool : maximum 1 fois/semaine
Semaines 5-6 :
•	Élimination complète des boissons sucrées
•	Alcool : occasionnel uniquement (1-2 fois/mois maximum)



Pour l'alcool spécifiquement :
•	Si consommation quotidienne : consulter un médecin (risque de dépendance)
•	Éliminer complètement pendant la perte de poids
•	Après stabilisation : maximum 1 verre/semaine pour les femmes, 2 pour les hommes
•	Privilégier vin rouge (si autorisation médicale) plutôt que bière ou alcools forts
Alternatives :
•	Eau nature (1,5-2L/jour)
•	Eau citronnée sans sucre
•	Tisanes locales (citronnelle, gingembre) sans sucre
•	Jus de fruits frais MAISON dilués (1/3 jus, 2/3 eau) SANS sucre ajouté
•	Bissap (jus d'hibiscus) SANS sucre
Réponse : UNE FOIS PAR SEMAINE
Conseils ciblés :
•	Encore trop fréquent
•	Réduire à \"occasionnellement\"
•	Choisir versions sans sucre
Alternatives :
•	Eau nature (1,5-2L/jour)
•	Eau citronnée sans sucre
•	Tisanes locales (citronnelle, gingembre) sans sucre
•	Jus de fruits frais MAISON dilués (1/3 jus, 2/3";

            case 'sommeil':
                return "eau) SANS sucre ajouté
•	Bissap (jus d'hibiscus) SANS sucre
•	Limiter à occasions spéciales uniquement
Réponse : OCCASIONNELLEMENT
Conseils ciblés :
•	Acceptable si vraiment occasionnel (1-2 fois/mois maximum)
•	Privilégier versions sans sucre
•	Éviter complètement l'alcool de preference
Lors des occasions :
•	Jus de fruits frais maison (150ml) : ananas, papaye, mangue, orange
•	Si alcool : 1 verre standard maximum, bien s'hydrater avec de l'eau

Réponse : JAMAIS
Conseils ciblés :
•	PARFAIT : Continuez !
•	Maintenir cette habitude excellente
•	Hydratation à l'eau prioritaire
Question : Combien d'heures de sommeil par nuit ?
Réponse : MOINS DE 6H
Conseils ciblés :
•	INSUFFISANT : Favorise prise de poids et problèmes cardiovasculaires
•	Manque de sommeil → dérèglement hormones de la faim → suralimentation
•	Objectif : 7-9h de sommeil
•	Établir routine de coucher régulière
•	PROBLÈME MAJEUR : le manque de sommeil augmente la faim, les envies de sucre, ralentit le métabolisme
•	Risque accru d'obésité, diabète, hypertension
•	Objectif : augmenter progressivement à 7-8h/nuit
•	Le sommeil est aussi important que l'alimentation pour perdre du poids
Stratégies pour améliorer le sommeil :
•	Horaires réguliers : coucher et lever à heures fixes
•	Éviter les écrans 1h avant le coucher
•	Dîner léger, 2-3h avant le coucher
•	Créer un environnement propice : chambre fraîche, sombre, silencieuse
•	Rituel du coucher : relaxation, lecture
Adaptations alimentaires :
Collation du soir (si nécessaire, 1-2h avant coucher) :
•	Tisane apaisante : citronnelle, gingembre-citron
•	Banane (riche en magnésium, favorise le sommeil)
•	Lait tiède avec une pincée de muscade (si toléré)
Aliments à éviter le soir :
•	Café, thé noir (après 15h)
•	Boissons sucrées ou énergisantes
•	Repas très épicés ou gras
•	Grandes quantités de liquides (pour éviter les réveils nocturnes)
Alim";

            case 'apnee':
                return "ents favorisant le sommeil (intégrer au dîner) :
•	Banane plantain : magnésium, potassium
•	Poisson : oméga-3
•	Légumes verts : calcium, magnésium
•	Noix de cajou (petite portion) : magnésium
Repas adaptés :
•	Dîner léger et tôt (18h-19h) : Poisson grillé + légumes vapeur (éviter plats lourds)
•	Éviter :Repas trop copieux le soir, café après 15h
•	Collation soirée si besoin : Tisane de citronnelle + quelques noix
Réponse : 6H-7H
Conseils ciblés :
•	Minimum acceptable mais viser 7-9h serait mieux
•	Qualité du sommeil aussi importante que quantité
Réponse : 8H-9H
Conseils ciblés :
•	IDÉAL : Continuez !
•	Maintenir régularité des horaires
Réponse : PLUS DE 9H
Conseils ciblés :
•	Peut indiquer : fatigue excessive, apnée du sommeil, dépression
•	Consulter un médecin si associé à fatigue persistante
•	L'excès de sommeil peut aussi être associé à risques cardiovasculaires


Question : Avez-vous l'apnée du sommeil ?
✅ Réponse : OUI
Conseils ciblés :
•	Lien direct avec obésité et maladies cardiovasculaires
•	Perte de poids améliore significativement l'apnée
•	Éviter repas lourds le soir
•	Éviter alcool qui aggrave l'apnée
•	L'apnée du sommeil aggrave l'obésité et les maladies cardiovasculaires (cercle vicieux)
�";

            case 'regime_recent':
                return "��	La perte de poids améliore significativement l'apnée (objectif : -10% du poids)
•	Le traitement (CPAP) améliore le métabolisme et facilite la perte de poids
•	Coordination essentielle entre traitement de l'apnée et régime alimentaire
Adaptations alimentaires spécifiques :
Repas adaptés :
•	Dîner très léger (17h-18h) : Soupe de légumes + poisson grillé (120g) + salade
•	Éviter : Pâte, igname en quantité importante le soir
•	Privilégier : Protéines + légumes le soir
•	Pas de collation après le dîner
❌ Réponse : NON
Conseils ciblés :
•	Bien, mais rester vigilant
•	Perte de poids réduit risque de développer l'apnée
Prévention de l'apnée du sommeil :
•	Maintenir la perte de poids progressive
•	Éviter l'alcool le soir
•	Dormir sur le côté (pas sur le dos)
•	Dîner léger mais suffisant
Question : Avez-vous récemment fait un régime de perte de poids ?
✅ Réponse : OUI
Question de suivi : Si Oui, Combien de poids avez-vous perdu ?
Réponse : MOINS DE 5 KG
Conseils ciblés :
•	Bon début mais continuer les efforts
•	Objectif réaliste : 0,5-1 kg/semaine
•	Ne pas se décourager, la régularité paie
•	Perte progressive = durable

Repas  :
•	Continuer le plan alimentaire adapté à votre niveau d'activité
•	Patience et constance
Réponse : 5-10 KG
Conseils cib";

            case 'sedentarite':
                return "lés :
•	EXCELLENT RÉSULTAT !
•	Phase de stabilisation importante
•	Ne pas reprendre anciennes habitudes
•	Maintenir l'alimentation équilibrée
Repas :
•	Maintenir les bonnes habitudes
•	Légère augmentation des portions si poids se stabilise trop bas
Réponse : PLUS DE 10 KG
Conseils ciblés :
•	TRÈS BELLE RÉUSSITE !
•	Attention au risque de reprise de poids (effet yoyo)
•	Phase de stabilisation cruciale (6-12 mois)
•	Ne pas relâcher les efforts
Repas  :
•	Maintien strict des bonnes habitudes
•	Surveillance régulière du poids
•	Continuer activité physique
❌ Réponse : NON
Conseils ciblés :
•	C'est le moment de commencer !
•	Objectif réaliste : suivre votre objectif de perte de poids en fonction de votre niveau de changement
•	Approche progressive et durable


Question : Combien de jours par semaine pratiquez-vous une activité physique ?
Réponse : AUCUN
Conseils ciblés :
•	CRITIQUE : Sédentarité aggrave obésité et risque cardiovasculaire
•	URGENT : Commencer doucement (10-15 min/jour)
•	Objectif progressif : atteindre 30 min/jour, 5 jours/semaine
•	Consulter médecin avant de débuter si problèmes cardiaques
Activités recommandées pour débuter :
•	Marche tranquille matin/soir (15-20 min)
•	Jardinage léger
•	Tâches ménagères actives
•	Danse douce sur musique locale
Repas :
•	Collations énergétiques avant effort : banane
Réponse : 1J-3J
Conseils ciblés :
•	Bon début mais insuffisant
•	Objectif : 5-7 jours/semaine
•	Augmenter progressivement fréquence et durée
Activités béninoises :
•	Marche rapide 30 min
•	Danse africaine (zumba locale)
•	Natation si accès à piscine/mer
•	Vélo
Repas  :
•	Collation pré-effort : fruits + noix



Réponse : 4J-6J
Conseils ciblés :
•	TRÈS BIEN !
•	Maintenir cette régularité
•	Varier les activités pour éviter lassitude
Activités béninoises :
•	Combiner : marche, danse, natation, vélo
•	Sports collecti";

            case 'activites_preferees':
                return "fs si possible
Repas :
•	Hydratation renforcée
•	Collations pré et post-effort
Réponse : 7J
Conseils ciblés :
•	EXCELLENT !
•	Attention à la récupération (1-2 jours repos actif/semaine recommandés)
•	Varier intensité (jours intenses/jours légers)
Repas :
•	Apports énergétiques suffisants
•	Protéines adéquates pour récupération
Question : Temps en position assise par jour ?
Réponse : PLUS DE 8H
Conseils ciblés :
•	TRÈS PROBLÉMATIQUE : Risque cardiovasculaire majeur
•	Se lever toutes les 30-60 minutes (même 2-3 min)
•	Marche de 5 min chaque heure si possible
Stratégies  :
•	Téléphoner debout
•	Regarder TV debout pendant les pubs
•	Faire petites tâches ménagères entre périodes assises
•	Marcher sur place
Réponse : 6H-8H
Conseils ciblés :
•	Encore beaucoup, réduire si possible
•	Pauses actives essentielles
Réponse : 4H-6H
Conseils ciblés :
•	Acceptable mais rester vigilant
•	Continuer pauses régulières
Réponse : MOINS DE 4H
Conseils ciblés :
•	EXCELLENT !
•	Maintenir ce mode de vie actif
Question : Quelles activités physiques appréciez-vous ?
Réponse : MARCHE
Conseils ciblés :
•	Excellente activité cardiovasculaire douce
•	Accessible à tous
•	Progresser : vitesse et/ou durée
Pro";

            case 'fc_connaissance':
                return "gramme  :
•	Marche matinale (6h-7h, température fraîche)
•	Marche vespérale (17h-18h)
•	Explorer quartiers, marchés
•	Marche en groupe (motivation)
Repas pré-marche :
•	1h avant : Banane + eau
•	Ou : Quelques noix + fruits

Réponse : YOGA
Conseils ciblés :
•	Excellent pour flexibilité et gestion stress
•	Compléter avec activité cardiovasculaire (marche, vélo)
•	Réduction stress → meilleur contrôle poids
Programme :
•	Yoga le matin (énergie) ou soir (détente)
•	Combiner avec marche 3 fois/semaine
Réponse : AUTRE (natation, vélo, danse, sport collectif...)
Conseils ciblés :
•	Natation : Excellente, protège articulations
•	Vélo : Bon cardio, musculation jambes
•	Danse : Fun, social, excellent cardio (zumba, danse traditionnelle)
•	Sports collectifs : Motivation, aspect social
Activités populaires :
•	Danse afro/zumba dans centres communautaires
•	Football amateur
•	Natation plage/piscine
•	Vélo en groupe
NB :Si user choisit autre activité physique qu’il préfère hormis marche et yoga, tu lui balance les autres activités se trouvant en haut pour mla question précédentes
QUESTION : Connaissez-vous votre fréquence cardiaque au repos ?
OUI - Si Fréquence Donnée :
Conseils:
•	Utiliser pour ajuster l'effort en : 
•	Déterminant la fréquence cardiaque maximale (FCmax) : Formule de Tanaka (plus précise pour certains adultes) : FCmax ≈ 208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm].
•	Utilisant cette formule pour calculer la fréquence cardiauqe maximale et par la suite définir la zones d’effort cible pour user enfin de lui faire les recommandations pour l’activité physique et nutritionnelles en te basant sur le tableau suivant :
Niveau d’activité	% FCmax cible	Zone d’effort	Activité physique recommandée	Recommandations nutritionnelles
Sédentaire	50–60 %	Zone de récupération légère	Marche douce, étirements, vélo léger	Favoriser les fibres (fruits, légumes, légumineuses), limiter les graisses saturées et le sel, boire suffisamment d’eau
Légèrement actif	60–70 %	Zone aérobie modérée	Marche rapide, natation douce, vélo modéré	Maintenir une alimentation équilibrée type DASH, privilégier protéines maigres et glucides complexes, réduire sucres rapides
Modérément actif	70–75 %	Zone aérobie supérieure	Marche rapide prolongée, vélo soutenu, natation modérée	Fractionner les repas, limiter sel et graisses saturées, privilégier aliments riches en potassium et oméga-3
Très actif	75–85 %	Zone cardio intensive	Marche rapide en côte, natation intensive, vélo soutenu	Contrôler les apports caloriques, maintenir hydratation, privilégier glucides complexes avant effort et protéines après effort
Extrêmement actif	85–90 %	Zone anaérobie légère	Séances encadrées de cardio léger à modéré, exercices adaptés cardiaques	Fractionner l’alimentation, privilégier aliments riches en antioxydants et minéraux, éviter excès de sel et de graisses saturées
Notes importantes:
o	FC max = fréquence cardiaque maximale, calculée idéalement avec formule adaptée (formule de Tanaka).
o	Toutes les activités doivent être validées par un médecin ou cardiologue avant mise en place.
o	L’intensité des efforts doit rester adaptée à l’état cardiovasculaire et au niveau de tolérance du patient.
•	Monitorer les progrès en suivant les étapes suivantes : 
1. Comprendre sa valeur de base
•	La personne doit mesurer sa FCR le matin au réveil (avant de se lever, après une bonne nuit de sommeil).
•	Elle note la moyenne de 3 à 5 jours consécutifs pour établir sa valeur de référence (par ex. 78 battements/min).


2. Suivi dans le temps
•	Diminution progressive de la FCR 👉 signe que le cœur devient plus efficace, souvent grâce à l’activité physique régulière, la perte de poids et une meilleure alimentation.
•	Stabilité de la FCR 👉 normal si la condition est bien gérée.
•	Augmentation soudaine (+10 battements/min ou plus) 👉 peut indiquer fatigue, stress, mauvaise récupération, infection, ou un problème cardiaque → nécessite une vérification médicale.
3. Corrélation avec l’activité ph";

            case 'stress_ennui':
                return "ysique
•	Si la FCR baisse au repos avec le temps, cela reflète une meilleure condition cardiorespiratoire.
•	Exemple : passer de 80 bpm → 72 bpm après plusieurs semaines d’activité adaptée (marche, vélo doux, natation).
4. Lien avec l’alimentation
•	Une alimentation équilibrée (réduction du sel, augmentation des fibres, consommation d’antioxydants) contribue indirectement à la baisse de la FCR via l’amélioration de la tension artérielle et de la santé vasculaire.
5. Outils pratiques de monitoring
•	Carnet papier → noter chaque matin la FCR.
•	Montres connectées / applications → suivi automatique avec graphiques.
•	Associer la FCR avec d’autres mesures : poids, tension artérielle, qualité du sommeil.
👉 Conseil clé : La FCR est un bon indicateur de progrès, mais une personne avec une maladie cardiovasculaire doit toujours interpréter ses résultats avec son médecin/cardiologue, car une variation peut être liée à un traitement ou à la maladie elle-même.

•	Nutrition cardio-spécifique
•	interpréter état cardiovasculaire pour adapter les apports.





RÉPONSE: NON (INCONNUE)
Conseils:
•	Apprendre à la mesurer
•	Consulter un professionnel
•	Focus sur la prévention
•	encourager suivi médical
Aliments cardioprotecteurs:
•	Poissons gras locaux
•	Noix de karité
•	Légumes verts feuillus
•	Fruits riches en potassium

Question : Mangez-vous souvent par stress ou ennui ?
✅ Réponse : OUI
Conseils ciblés :
•	PROBLÈME MAJEUR ! Alimentation émotionnelle = principale cause d'échec des régimes
•	La nourriture devient \"solution\" temporaire au stress/ennui → cercle vicieux
•	Travailler sur les déclencheurs émotionnels est AUSSI important que l'alimentation
•	Objectif : séparer émotions et alimentation
Comprendre l'alimentation émotionnelle :
Différence faim physique vs faim émotionnelle :
Faim physique	Faim émotionnelle
Apparaît graduellement	Apparaît soudainement
Plusieurs heures après dernier repas	Peu après avoir mange
Peut attendre	Urgence, besoin immédiat
Satisfaite par différents aliments	Envie d'aliments spécifiques (sucré, gras)
Arrêt quand rassasié	Continue malgré satiété
Pas de culpabilité après	Culpabilité, honte après
Déclencheurs fréquents :
•	Stress (travail, famille, finances)
•	Ennui (inactivité, solitude)
•	Fatigue
•	Tristesse, anxiété
•	Colère, frustration
•	Habitudes (manger devant TV)
•	Récompense (\"je mérite ça\")
Stratégies pour gérer l'alimentation émotionnelle :
1. Identification des déclencheurs :
•	Tenir un journal émotions-alimentation pendant 2 semaines
•	Noter : heure, contexte, émotions, aliments consommés, quantité
•	Identifier patterns (quand, pourquoi, quoi)
2. Stratégies de remplacement (au lieu de manger) :
En cas de stress :
•	Respiration profonde : 5 min, inspirer 4 secondes, expirer 6 secondes
•	Marche rapide : 10-15 min
•	Appeler un ami, un proche
•	Écrire ses pensées, frustrations
•	Écouter musique apaisante
•	Infusion relaxante : citronnelle, gingembre
En cas d'ennui :
•	Activité manuelle : tricot, dessin, bricolage
•	Lire un livre, écouter podcast
•	Sortir marcher, explorer le quartier
•	Appeler un ami
•	Faire des tâches ménagères légères
•	Jardiner (si espace)
En cas de tristesse :
•	Exprimer émotions : pleurer si besoin, parler à quelqu'un
•	Activité physique douce : marche, étirements
•	Pratique de gratitude : noter 3 choses positives
•	Regarder photos positives, souvenirs heureux
•	Prière, méditation (selon convictions)
3. Restructuration environnement :
•	Éliminer aliments déclencheurs de la maison (biscuits, chips, chocolat)
•	Garde-manger sain : fruits, noix en portions individuelles, légumes coupés prêts à consommer
•	Éviter courses quand affamé ou stressé
•	Manger à table (pas devant TV, ordinateur, téléphone)
•	Plaquer assiettes dans cuisine (ne pas laisser plats sur table)
4. Techniques de gestion du stress à long terme :
•	Activité physique régulière : meilleur anti-stress naturel
•	Sommeil suffisant : 7-8h/nuit
•	Yoga, méditation : 10-15 min/jour
•	Gestion du temps : éviter surcharge
•	Réseau social : maintenir liens avec famille, amis
•	Hobbies, loisirs : activités plaisantes non alimentaires
5. Mindful eating (alimentation en pleine conscience) :
•	Avant de manger, se demander : \"Ai-je vraiment faim ou est-ce une émotion ?\"
•	Si faim émotionnelle : attendre 10-15 min, utiliser stratégie de remplacement
•	Si faim physique : manger lentement, savourer, sans distraction
•	Poser couverts entre chaque bouchée
•	Mastiquer 20-30 fois par bouchée
•	Arrêter à 80% de satiété (pas jusqu'à être \"plein\")
6. Règle des 3 D (quand envie émotionnelle) :
•	Distraction : activité plaisante 15 min
•	Délai : attendre 15-20 min (l'envie diminue souvent)
•	Distance : s'éloigner physiquement de la nourriture
Adaptations alimentaires béninoises spécifiques :
Collations \"d'urgence\" (si vraiment";

            case 'finir_assiette':
                return "impossible de résister) :
•	Privilégier aliments sains, faibles calories, fort volume
•	Options : 
o	Légumes crus : concombre (entier = 50 kcal), carotte, tomate
o	Fruits à fort volume : papaye (200g = 80 kcal), pastèque
o	Gingembre infusé : 0 calorie, occupe bouche et mains
o	Pop-corn maison sans huile : grand volume, faible calorie
Éviter absolument en cas de stress/ennui :
•	Sauce graine, arachides en grande quantité
•	Pain blanc, biscuits
•	Boissons sucrées
•	Fritures
Soutien professionnel (si alimentation émotionnelle sévère) :
•	Psychologue spécialisé TCC (thérapie cognitivo-comportementale)
•	Groupe de soutien
•	Médecin nutritionniste
•	Si dépression ou anxiété : traitement médical peut aider
Plan progressif (12 semaines) :
•	Semai";

            case 'regime_particulier':
                return "nes 1-2 : Identification (journal émotions-alimentation)
•	Semaines 3-4 : Introduction 1 stratégie de remplacement par déclencheur
•	Semaines 5-8 : Pratiquer systématiquement stratégies, restructuration environnement
•	Semaines 9-12 : Consolidation, mindful eating, gestion stress long terme

Stratégies  :
•	Lors de stress : Marche 10 min, tisane de citronnelle, respiration profonde
•	Lors d'ennui : Appeler un ami, écouter musique, lire, activité manuelle
•	Si vraie faim : Collations saines (fruits, légumes crus, noix 20g)
•	Journal alimentaire : noter émotions avant de manger
Repas structurés :
•	3 repas + 2 collations PROGRAMMÉS à heures fixes
•	Ne pas sauter de repas (favorise grignotage)
•	Manger en pleine conscience (pas devant TV/téléphone)
❌ Réponse : NON
Conseils ciblés :
•	EXCELLENT : Maintenir cette capacité
•	Relation saine avec la nourriture
Question : Avez-vous tendance à finir votre assiette même si vous n'avez plus faim ?
✅ Réponse : OUI
Conseils ciblés :
•	PROBLÉMATIQUE : Ignore signaux de satiété
•	Apprendre à écouter son corps
•	Manger lentement (20-30 min/repas)
Stratégies :
•	Servir dans assiettes plus petites (portions paraissent plus grandes)
•	Manger lentement : poser couverts entre chaque bouchée
•	Pause en milieu de repas : évaluer sa faim (échelle 1-10)
•	Arrêter à 80% de satiété (principe Hara Hachi Bu)
•	Conservation : garder restes pour prochain repas (pas de gaspillage)
Repas  :
•	Commencer par salade ou légumes (effet rassasiant)
•	Portions mesurées dès le départ
•	Manger assis, sans distraction
❌ Réponse : NON
Conseils ciblés :
•	EXCELLENT : Bonne écoute du corps
•	Maintenir cette capacité

Question : Avez-vous déjà suivi un régime alimentaire particulier ?
✅ Réponse : OUI
Question de suivi : Si Oui,  Lequel, et a-t-il été efficace ? Pourquoi ?
Si réponse indique : Régimes restrictifs/drastiques (jeûne prolongé, mono-diète, etc.)
Conseils ciblés :
•	PROBLÉMATIQUE : Effet yoyo quasi certain
•	Régimes trop restrictifs = insoutenables = reprise de poids
•	Privilégier changement de mode de vie durable
Approche béninoise durable :
•	Pas de privation totale
•	Équilibre et modération
•	Intégrer aliments béninois traditionnels de façon équilibrée
•	Perte de poids progressive (0,5-1 kg/semaine)
Si réponse indique : Régimes équilibrés (méditerranéen, DASH, etc.)
Conseils ciblés :
•	Excellents régimes, adaptables au contexte béninois
•	Principes applicables : fruits, légumes, poissons, céréales complètes, peu de sel
Adaptation béninoise du régime DASH (hypertension) :
•	Céréales : Riz complet, maïs, mil, igname, patate douce
•	Protéines : Poissons frais, poulet sans peau, haricots, œufs (modération)
•	Légumes : Gombo, épinards, tomate, carotte, chou
•	Fruits : Banane, orange, mangue, papaye, ananas
•	Graisses saines : Huile d'olive, avocat, noix de cajou nature
•	TRÈS PEU DE SEL !
Si efficace :
•	Maintenir les principes qui ont fonctionné
•	Adapter au long terme
Si échec :
•	Analyser pourquoi : trop restrictif ? Pas adapté culturellement ? Manque de soutien ?
•	Cette fois : approche progressive, durable, ancrée dans culture béninoise
❌ Réponse : NON
Conseils ciblés :
•	Première démarche : positif !
•	Pas de \"régime\" mais changement de mode de vie
•	Approche progressive et durable";

            default:
                return 'Aucun';
        }
    }
}
