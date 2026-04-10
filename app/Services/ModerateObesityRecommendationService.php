<?php

namespace App\Services;

class ModerateObesityRecommendationService
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = []): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = str_contains($answerLower, 'oui');

        switch ($key) {
            case 'antecedents_diag':
                return $this->getAntecedentsAdvice($isYes);
            case 'antecedents_lequel':
                return $this->getAntecedentsLequelAdvice($answer);
            case 'boissons':
                return $this->getBoissonsAdvice($isYes);
            case 'journee_typique':
                return "Nous vous remercions pour nous avoir divulgué votre journée typique car cela va nous permettre de vous orienter dans nos conseils enfin de cerner vos réalités quotidiennes en matière de nutrition.";
            case 'fruits_legumes':
                return $this->getFruitsLegumesAdvice($answer);
            case 'grignotage':
                return $this->getGrignotageAdvice($isYes);
            case 'aliments_grignotes':
                return $this->getAlimentsGrignotesAdvice($answer);
            case 'boissons_sucrees_frequence':
                return $this->getBoissonsFrequenceAdvice($answer);
            case 'sommeil':
                return $this->getSommeilAdvice($answer);
            case 'apnee':
                return $this->getApneeAdvice($isYes);
            case 'regime_recent':
                return $this->getRegimeRecentAdvice($isYes);
            case 'regime_poids_perdu':
                return $this->getRegimePoidsPerduAdvice($answer);
            case 'sedentarite':
                return $this->getSedentariteAdvice($answer);
            case 'activites_preferees':
                return $this->getActivitesPrefereesAdvice($answer);
            case 'fc_connaissance':
            case 'fc_valeur':
                return $this->getFCRAdvice($answer);
            case 'stress_ennui':
                return $this->getStressEnnuiAdvice($isYes);
            case 'finir_assiette':
                return $this->getFinirAssietteAdvice($isYes);
            case 'regime_particulier':
            case 'regime_efficacite':
                return $this->getRegimeParticulierAdvice($answer);
            case 'objectif_principal':
                return $this->getObjectifAdvice($answer);
            case 'poids_a_perdre':
            case 'niveau_changement':
                return "Votre engagement et la fixation d'objectifs réalistes sont la clé de la réussite à long terme.";
            default:
                return "Aucun";
        }
    }

    private function getAntecedentsAdvice(bool $isYes): string
    {
        if ($isYes) {
            return "Conseils Ciblés :\n• Surveillance glycémique stricte avec mesures régulières\n• Réduction drastique du sel (max 5g/jour)\n• Privilégier les aliments à Index Glycémique bas\n• Éviter totalement les sucres rapides\n• Augmenter les fibres (30-40g/jour)\n• Contrôle médical mensuel obligatoire";
        }
        return "Conseils Ciblés :\n• Maintenir une approche préventive\n• Surveillance annuelle des paramètres\n• Alimentation équilibrée sans restriction excessive\n• Promotion d'habitudes saines à long terme\n• Éducation nutritionnelle continue";
    }

    private function getAntecedentsLequelAdvice(string $answer): string
    {
        $ans = mb_strtolower($answer);
        $content = "";
        if (str_contains($ans, 'diabète')) {
            $content .= "DIABÈTE DE TYPE 2 :\n• Privilégier les glucides à index glycémique bas (igname bouillie, riz complet local).\n• Fractionner les repas pour lisser la glycémie.\n• Surveiller rigoureusement les portions de féculents.\n• Augmenter massivement les fibres (feuilles de gombo, gboma).\n\n";
        }
        if (str_contains($ans, 'hypertension') || str_contains($ans, 'hta')) {
            $content .= "HYPERTENSION ARTÉRIELLE :\n• Sodium : MAXIMUM 5g sel/jour (= 2000mg sodium)\n• Potassium : augmenter (bananes, avocat, pommes de terre, haricots)\n• Magnésium : noix, graines, légumes verts\n• Régime DASH adapté au contexte béninois\n• Éviter : bouillons cubes, poissons très fumés/salés, viandes transformées\n\n";
        }
        if (str_contains($ans, 'cardiovasculaires') || str_contains($ans, 'cardio')) {
            $content .= "MALADIES CARDIOVASCULAIRES :\n• Réduire drastiquement les graisses saturées et trans.\n• Privilégier les oméga-3 (poissons gras locaux comme le maquereau).\n• Maintenir une hydratation optimale et limiter l'alcool.";
        }
        return empty($content) ? "Aucun" : trim($content);
    }

    private function getBoissonsAdvice(bool $isYes): string
    {
        if ($isYes) {
            return "Conseils Généraux :\n• Respecter scrupuleusement horaires de prise\n• Certains médicaments interagissent avec aliments\n• Surveillance médicale régulière des dosages\n• Communication avec médecin avant tout changement alimentaire majeur\n• Tenir un journal alimentaire + médicaments\nInteractions Médicament-Aliments Courantes :\nMetformine (diabète) : Prendre pendant ou après repas, peut causer déficit B12.\nInsuline : Timing crucial, glucides à CHAQUE repas.\nMédicaments hypertension (IEC, ARA2) : Éviter suppléments potassium en excès.\nStatines (cholestérol) : ÉVITER jus de pamplemousse.";
        }
        return "Conseils Ciblés :\n• C'est le MEILLEUR moment pour agir par alimentation/exercice\n• Possibilité de prévenir ou retarder médication\n• Modifications lifestyle très efficaces à ce stade\n• Contrôles médicaux réguliers pour suivre évolution\n• Motivation : chaque kilo perdu et chaque changement compte";
    }

    private function getFruitsLegumesAdvice(string $answer): string
    {
        if (str_contains($answer, '1-2')) {
            return "Évaluation : INSUFFISANT - Augmentation urgente nécessaire\n\n" .
                "Risques : Carences en vitamines/minéraux, fibres insuffisantes (digestion lente), risque cardiovasculaire augmenté, satiété réduite → suralimentation.\n\n" .
                "Plan d'Augmentation Progressive :\n" .
                "• Semaines 1-2 : Atteindre 3 portions (Ajouter 1 fruit au petit-déjeuner, salade au déjeuner, 1 fruit en collation).\n" .
                "• Semaines 3-4 : Atteindre 4 portions (Ajouter légumes cuits au déjeuner 150g).\n" .
                "• Semaines 5+ : Atteindre 5-7 portions (Légumes à CHAQUE repas, fruits 2-3×/jour).";
        }
        if (str_contains($answer, '3-4')) {
            return "Évaluation : MOYEN - Amélioration souhaitable\n\n" .
                "Situation : Vous consommez déjà des fruits/légumes, mais pas assez pour des bénéfices optimaux.\n\n" .
                "Objectif : Passer à 5-7 portions/jour.\n\n" .
                "Points à Améliorer :\n" .
                "1. Augmenter la portion de légumes aux repas principaux.\n" .
                "2. Ajouter un 2ème fruit dans la journée.\n" .
                "3. Intégrer des légumes crus en collations.";
        }
        if (str_contains($answer, '5') || str_contains($answer, 'plus')) {
            return "Évaluation : EXCELLENT - Maintenir et diversifier\n\n" .
                "Félicitations : Vous atteignez les recommandations internationales ! Maintenez cette habitude pour protéger votre santé cardiovasculaire et digestive.";
        }
        return "Aucun";
    }

    private function getGrignotageAdvice(bool $isYes): string
    {
        if ($isYes) {
            return "Analyse : Le grignotage n'est pas mauvais en soi, tout dépend de QUOI et COMBIEN.\n\n" .
                "Évaluation Nécessaire : Distinguer le grignotage PLANIFIÉ (collations saines) du grignotage COMPULSIF (émotionnel, ennui).\n\n" .
                "Si Grignotage Compulsif (Émotionnel) :\n" .
                "• Stratégies Non-Alimentaires : Identifier les triggers, activités alternatives (marche 10 min, appel ami, respiration profonde).\n" .
                "• Restructuration : Supprimer les aliments tentants de la maison, planifier 2 vraies collations saines, tenir un journal émotions-grignotages.";
        }
        return "Évaluation : Votre absence de grignotage peut être vue de deux façons :\n\n" .
            "Cas 1 : Positif (Repas Suffisamment Copieux) → Continuez ainsi, maintenez l'équilibre actuel.\n" .
            "Cas 2 : Problématique (Sous-Alimentation) → Si vous ressentez une faim intense ou fatigue, AJOUTEZ 2 collations saines obligatoires (10h et 16h) pour éviter tout craquage futur.";
    }

    private function getAlimentsGrignotesAdvice(string $answer): string
    {
        $ans = mb_strtolower($answer);
        if (str_contains($ans, 'biscuits') || str_contains($ans, 'bonbons')) {
            return "1. Biscuits, gâteaux, bonbons :\n" .
                "• Problèmes : Sucres raffinés, graisses trans, calories vides, renforce l'addiction au sucre.\n" .
                "• Transition : Diviser par 2 les portions, ajouter 1 fruit à côté les semaines 1-2. Viser zéro biscuits industriels à terme.\n" .
                "• Alternatives : Bananes plantains bouillies, fruits frais naturellement sucrés.";
        }
        if (str_contains($ans, 'chips') || str_contains($ans, 'cacahuètes salées') || str_contains($ans, 'beignets')) {
            return "2. Chips, cacahuètes salées, beignets rue :\n" .
                "• Problèmes : Sel excessif (hypertension), graisses trans (fritures répétées), calories très élevées.\n" .
                "• Alternatives Saines : Chips de patate douce maison au four, arachides grillées maison non salées, noix de cajou naturelles.";
        }
        if (str_contains($ans, 'pain') || str_contains($ans, 'nutella') || str_contains($ans, 'margarine')) {
            return "3. Pain blanc avec tartinades sucrées/margarine :\n" .
                "• Problèmes : Pain blanc (IG élevé), sucre + huile de palme (Nutella), graisses trans (margarine).\n" .
                "• Amélioration : Passer au pain complet local. Remplacer Nutella par pâte d'arachide naturelle 100% ou avocat écrasé.";
        }
        if (str_contains($ans, 'sodas') || str_contains($ans, 'jus')) {
            return "4. Sodas, jus sucrés :\n" .
                "• Problèmes : Sucres liquides (pics insuline), pas de satiété.\n" .
                "• Plan Sevrage : Dilution progressive avec de l'eau, puis passage aux tisanes sans sucre (bissap, gingembre).";
        }
        return "Évaluation : Si vous choisissez des fruits frais ou des noix non salées, vous êtes sur la bonne voie. Sinon, privilégiez les options naturelles et non transformées.";
    }

    private function getBoissonsFrequenceAdvice(string $answer): string
    {
        $ans = mb_strtolower($answer);
        if (str_contains($ans, 'tous les jours')) {
            return " ALERTE ROUGE - Action Immédiate Nécessaire\n\n" .
                "Impact : Les sodas ont un impact énorme sur le poids (+7kg/an possible par canette quotidienne) et doublent le risque de diabète.\n\n" .
                "Plan Sevrage Boissons Sucrées (6 Semaines) :\n" .
                "• Semaines 1-2 : Dilution (Mélanger soda/jus avec eau 50-50, réduire quantité).\n" .
                "• Semaines 3-4 : Transition (Jus de fruits FRAIS dilués, bissap maison peu sucré).\n" .
                "• Semaines 5-6 : Final (Eau nature 2L/jour, tisanes sans sucre : kinkeliba, gingembre).\n\n" .
                "Boissons Béninoises Saines : Bissap (anti-hypertensif), Kinkeliba (détox), Eau de gingembre (anti-inflammatoire).";
        }
        if (str_contains($ans, 'semaine')) {
            return "Évaluation : ACCEPTABLE mais perfectible.\n\n" .
                "Conseils : Gardez ces boissons pour les occasions sociales uniquement. Privilégiez les petites portions et compensez par une hydratation accrue (eau) le reste du temps.";
        }
        if (str_contains($ans, 'occasionnel')) {
            return "Évaluation : BIEN - À maintenir.\n\n" .
                "Conseils : Gardez ce rythme pour les événements spéciaux (1-3 fois/mois). Favorisez l'eau de coco ou le bissap maison sans sucre lors de ces occasions.";
        }
        if (str_contains($ans, 'jamais')) {
            return "Évaluation : PARFAIT - Félicitations !\n\n" .
                "Bénéfices : Zéro calories vides, glycémie stable, foie préservé. Vous avez éliminé l'un des plus grands obstacles à la gestion du poids.";
        }
        return "Analyse : Gérez votre consommation de boissons sucrées et alcoolisées avec une grande modération.";
    }

    private function getSommeilAdvice(string $answer): string
    {
        if (str_contains($answer, 'moins de 6')) {
            return " MOINS DE 6H : Évaluation : INSUFFISANT - Impact Majeur\n\n" .
                "Conséquences : Augmentation de la faim (+15% ghréline), métabolisme ralenti, risque d'obésité x2.\n\n" .
                "Plan : Ajouter 30 min/semaine pour atteindre 7-8h. Améliorer l'hygiène : pas d'écrans 1h avant, dîner léger 3h avant le coucher.";
        }
        if (str_contains($answer, '6-7')) {
            return " 6-7H : Évaluation : LIMITE BASSE - Amélioration souhaitable.\n\n" .
                "Conseils : Viser 7h30-8h pour une meilleure régulation hormonale. Un sommeil suffisant aide à stabiliser la glycémie et facilite la perte de poids.";
        }
        if (str_contains($answer, '8-9')) {
            return " 8-9H : Évaluation : OPTIMAL - Parfait pour la santé et la perte de poids.\n\n" .
                "Bénéfices : Hormones équilibrées, métabolisme optimal, stress réduit. Maintenez ce rythme régulier.";
        }
        if (str_contains($answer, 'plus de 9')) {
            return " PLUS DE 9H : Évaluation : EXCESSIF - Investigation nécessaire.\n\n" .
                "Conseils : Un excès de sommeil peut indiquer une apnée du sommeil ou une fatigue chronique. Consultez un spécialiste si vous vous sentez toujours fatigué au réveil.";
        }
        return "Assurez-vous d'avoir un sommeil régulier et réparateur d'environ 7-8 heures par nuit.";
    }

    private function getApneeAdvice(bool $isYes): string
    {
        if ($isYes) {
            return " CONDITION SÉRIEUSE - Suivi Médical Strict\nCercle Vicieux : Apnée -> Fatigue -> Inactivité -> Poids ^.\nRôle de la Perte de Poids : Perte 10% poids = réduction 30% sévérité.\nConseils : Dormir sur le côté, éviter alcool le soir, dîner léger.";
        }
        return "Évaluation : Bien, mais rester vigilant si ronflements forts ou fatigue au réveil. La perte de poids est la meilleure prévention.";
    }

    private function getRegimeRecentAdvice(bool $isYes): string
    {
        if ($isYes) {
            return "Analyse : Risque effet yo-yo, métabolisme peut être ralenti.\nApproche : Focus sur le changement de style de vie permanent plutôt que sur un régime temporaire restrictif.";
        }
        return "C'est le bon moment pour commencer avec une approche progressive et équilibrée.";
    }

    private function getRegimePoidsPerduAdvice(string $answer): string
    {
        if (str_contains($answer, 'moins de 5')) {
            return "Évaluation : Perte modeste, bon début.\n\n" .
                "Impact : Chaque kilo perdu améliore déjà votre santé (tension, glycémie). Vous êtes dans la phase cruciale de mise en place de nouvelles habitudes.";
        }
        if (str_contains($answer, '5-10')) {
            return "Évaluation : Excellente perte !\n\n" .
                "Bénéfices : Impacts majeurs sur la réduction de la tension artérielle et l'amélioration du profil lipidique. Maintenez vos habitudes pour éviter l'effet rebond.";
        }
        if (str_contains($answer, 'plus de 10')) {
            return "Évaluation : PERTE MAJEURE - Félicitations exceptionnelles !\n\n" .
                "Risque : L'effet rebond est élevé si vous relâchez vos efforts. Appliquez la règle 90-10 (90% de repas sains, 10% de plaisirs contrôlés) et maintenez une pesée hebdomadaire.";
        }
        return "Maintenez vos efforts de perte de poids de manière durable pour stabiliser vos résultats.";
    }

    private function getSedentariteAdvice(string $answer): string
    {
        if (str_contains($answer, 'aucun')) {
            return " PRIORITÉ ABSOLUE : Commencer le mouvement.\n\n" .
                "Plan : Marcher 10 min/jour la première semaine, puis augmenter de 5 min par semaine jusqu'à atteindre 30 min/jour. Toute activité compte (marché, ménage).";
        }
        if (str_contains($answer, '1-3')) {
            return "Évaluation : BON DÉBUT, mais insuffisant.\n\n" .
                "Objectif : Passer à 4-6 jours par semaine d'activité modérée (total 150 min/semaine). La régularité est plus importante que l'intensité à ce stade.";
        }
        if (str_contains($answer, '4-6')) {
            return "Évaluation : EXCELLENT - Maintenir et optimiser.\n\n" .
                "Conseils : Variez les types d'activités (marche rapide, danse, étirements) pour solliciter différents muscles et éviter la lassitude.";
        }
        return "L'activité physique régulière est le meilleur complément à votre plan nutritionnel.";
    }

    private function getActivitesPrefereesAdvice(string $answer): string
    {
        $ans = mb_strtolower($answer);
        if (str_contains($ans, 'marche')) {
            return "Marche : Idéal, gratuit, faible impact. Visez 30-60 min/jour. Essayez d'augmenter le rythme progressivement.";
        }
        if (str_contains($ans, 'yoga')) {
            return "Yoga : Excellent pour la flexibilité et le stress. Complétez avec une activité cardio (marche, danse) pour la perte de poids.";
        }
        if (str_contains($ans, 'danse')) {
            return "Danse : Excellent cardio ! 30-45 min 4x/semaine chez vous sur votre musique préférée.";
        }
        if (str_contains($ans, 'natation')) {
            return "Natation : Idéal pour les articulations. À pratiquer 2-3x/semaine si possible.";
        }
        return "Toute activité qui vous procure du plaisir est bénéfique. L'important est la régularité.";
    }

    private function getFCRAdvice(string $answer): string
    {
        if (is_numeric($answer)) {
            $fcr = (int) $answer;
            if ($fcr > 100)
                return " Tachycardie : >100 bpm au repos nécessite une consultation médicale.";
            if ($fcr > 80)
                return "FCR élevée : Amélioration souhaitable par l'activité physique régulière.";
            return "FCR Normale : Bonne base. Continuez à surveiller chaque semaine au repos.";
        }
        return "Apprenez à mesurer votre pouls au repos le matin : 60-80 bpm est la cible normale.";
    }

    private function getStressEnnuiAdvice(bool $isYes): string
    {
        if ($isYes) {
            return " ALIMENTATION ÉMOTIONNELLE : Distinguez faim physique vs émotionnelle. Stratégies : pause 10 min, boire de l'eau, activité alternative (respiration, appel ami).";
        }
        return "EXCELLENT : Relation saine avec la nourriture. Restez vigilant en période de stress futur.";
    }

    private function getFinirAssietteAdvice(bool $isYes): string
    {
        if ($isYes) {
            return "Stratégie : Utilisez des assiettes plus petites, servez des portions modérées. Écoutez votre satiété (signal après 20 min). Il vaut mieux laisser des restes que de surcharger son corps.";
        }
        return "EXCELLENT : Vous êtes à l'écoute de votre corps. Continuez cette pratique saine.";
    }

    private function getRegimeParticulierAdvice(string $answer): string
    {
        $ans = mb_strtolower($answer);
        if (str_contains($ans, 'jeûne')) {
            return "Jeûne Intermittent (IF) : Efficace pour réduire l'apport calorique global, mais attention aux épisodes de grignotage compensatoire le soir. Assurez-vous de couvrir vos besoins nutritionnels lors des fenêtres de repas.";
        }
        if (str_contains($ans, 'keto') || str_contains($ans, 'low carb')) {
            return "Low Carb / Keto : Offre une perte de poids rapide mais peut être difficile à maintenir sur le long terme au Bénin. Notre approche privilégie les glucides à Index Glycémique bas (igname, patate douce) qui sont plus durables.";
        }
        if (str_contains($ans, 'détox')) {
            return "Régime Détox : Pas de fondement scientifique solide. Votre corps (foie, reins) se détoxifie très bien seul si vous lui apportez les bons nutriments et une hydratation suffisante.";
        }
        if (str_contains($ans, 'ig bas') || str_contains($ans, 'méditerranéen') || str_contains($ans, 'dash')) {
            return "EXCELLENT : Ces approches (IG bas, DASH) sont les plus validées scientifiquement pour la santé métabolique. Notre guide s'inspire directement de ces principes adaptés aux produits locaux.";
        }
        return "Analysez la durabilité des mesures que vous testez. Évitez les approches trop restrictives qui conduisent inévitablement à l'échec sur le long terme.";
    }

    private function getObjectifAdvice(string $answer): string
    {
        $ans = mb_strtolower($answer);
        if (str_contains($ans, 'forme physique')) {
            return " FORME PHYSIQUE : Visez 2-3L d'eau/jour, favorisez le renforcement musculaire et une progression durable.";
        }
        return " OBJECTIF : Soyez patient(e). Visez 0.5 à 1kg par semaine pour une progression saine et sans effet yoyo.";
    }
}
