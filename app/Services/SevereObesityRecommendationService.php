<?php

namespace App\Services;

class SevereObesityRecommendationService
{
    public function detectPathology(array $qa): ?string
    {
        foreach ($qa as $item) {
            if (isset($item['question_id']) && $item['question_id'] == 93) {
                $resp = mb_strtolower($item['reponse']);
                if (str_contains($resp, 'diabète'))
                    return 'diabetes';
                if (str_contains($resp, 'hypertension') || str_contains($resp, 'hypertension'))
                    return 'hypertension';
                if (str_contains($resp, 'cholestérol'))
                    return 'hypercholestérolémie';
            }
        }
        return null;
    }

    public function getRecommendation(string $key, string $answer, ?string $pathology = null): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = str_contains($answerLower, 'oui');

        switch ($key) {
            case 'antecedents_diag':
                return $this->getAntecedentsAdvice($isYes, $pathology);
            case 'chirurgie':
                return $this->getChirurgieAdvice($isYes, $pathology);
            case 'restrictions':
                return $this->getRestrictionsAdvice($answer, $pathology);
            case 'calories_vides':
                return $this->getCaloriesVidesAdvice($isYes, $pathology);
            case 'plan_deja':
                return $this->getPlanDejaAdvice($answer, $pathology);
            case 'boissons':
                return $this->getBoissonsAdvice($isYes, $pathology);
            case 'sommeil':
                return $this->getSommeilAdvice($answer, $pathology);
            case 'apnee':
                return $this->getApneeAdvice($isYes, $pathology);
            case 'douleurs':
                return $this->getDouleursAdvice($answer, $pathology);
            case 'regime_recent':
                return $this->getRegimeRecentAdvice($isYes, $pathology);
            case 'jours_sport':
                return $this->getJoursSportAdvice($answer, $pathology);
            case 'sedentarite':
                return $this->getSedentariteAdvice($answer, $pathology);
            case 'activites_preferees':
                return $this->getActivitesPrefereesAdvice($answer, $pathology);
            case 'fc_connaissance':
            case 'fc_valeur':
                return $this->getFCRAdvice($answer, $pathology);
            case 'ressenti':
                return $this->getRessentiAdvice($answer, $pathology);
            case 'stress_ennui':
                return $this->getStressEnnuiAdvice($isYes, $pathology);
            case 'finir_assiette':
                return $this->getFinirAssietteAdvice($isYes, $pathology);
            case 'emotions':
                return $this->getEmotionsAdvice($isYes, $pathology);
            case 'programme_deja':
                return $this->getProgrammeDejaAdvice($isYes, $pathology);
            case 'journee_typique':
                return "Nous vous remercions pour nous avoir divulgué votre journée typique car cela va nous permettre de vous orienter dans nos conseils.\n";
            case 'objectif_principal':
                return "OBJECTIF : Soyez patient(e). Visez 0.5 à 1kg par semaine pour une progression saine et sans effet yoyo.";
            case 'poids_a_perdre':
            case 'niveau_changement':
                return "Votre engagement et la fixation d'objectifs réalistes sont la clé de la réussite à long terme.";
            default:
                return "Aucun";
        }
    }

    /**
     * Retourne un conseil général résumé basé sur la pathologie détectée.
     */
    public function getGeneralAdvice(?string $pathology): string
    {
        if ($pathology === 'diabetes') {
            return " PRIORITÉS POUR VOTRE PROFIL : OBÉSITÉ SÉVÈRE + DIABÈTE DE TYPE 2\n\n" .
                "Votre situation nécessite une surveillance rigoureuse. L'objectif principal est de stabiliser votre glycémie pour prévenir les complications (reins, yeux, pieds, cœur) tout en amorçant une perte de poids progressive (0,5 à 1 kg par semaine).\n" .
                " Règle d'or : JAMAIS de sucres rapides seuls. Toujours associer les glucides à des fibres (légumes) et des protéines.";
        }
        if ($pathology === 'hypertension') {
            return " PRIORITÉS POUR VOTRE PROFIL : OBÉSITÉ SÉVÈRE + HYPERTENSION\n\n" .
                "La priorité absolue est la réduction de la pression artérielle pour protéger votre cœur et vos artères.\n" .
                " Règle d'or : Réduire drastiquement le sel (bouillons cubes, sel de table) et augmenter le potassium (fruits et légumes).";
        }
        if ($pathology === 'hypercholestérolémie') {
            return " PRIORITÉS POUR VOTRE PROFIL : OBÉSITÉ SÉVÈRE + HYPERCHOLESTÉROLÉMIE\n\n" .
                "L'objectif est de réduire le 'mauvais' cholestérol (LDL) et de protéger vos vaisseaux.\n" .
                " Règle d'or : Remplacer les graisses saturées (huile de palme excessive, fritures) par des graisses insaturées et augmenter les fibres.";
        }
        return " PRIORITÉS POUR VOTRE PROFIL : OBÉSITÉ SÉVÈRE\n\n" .
            "Même sans pathologie diagnostiquée, l'obésité sévère est une situation à haut risque qui nécessite une prise en charge immédiate.\n" .
            " Règle d'or : Adopter une alimentation progressive, équilibrée et adaptée à votre culture locale pour un changement durable.";
    }

    private function getAntecedentsAdvice(bool $isYes, ?string $pathology): string
    {
        if ($pathology === 'diabetes') {
            if ($isYes) {
                return "Conseils et recommandations :\nLe diabète de type 2 associé à l'obésité sévère nécessite une prise en charge globale et rigoureuse. La priorité est de stabiliser la glycémie tout en favorisant une perte de poids progressive (0,5 à 1 kg/semaine). Il faut absolument éviter les sucres rapides, les farines raffinées, les boissons sucrées et les aliments à index glycémique élevé. La régularité des repas (3 repas par jour à heures fixes, sans grignotage) est essentielle pour éviter les pics glycémiques.\n\n" .
                    " Proposition de repas béninois adaptés :\n" .
                    "Petit-déjeuner :\n• Bouillie de maïs non sucrée (akassa non fermenté) avec du lait de soja non sucré\n• Ou galette de sorgho (ablo non sucrée) avec une tisane de feuilles de goyavier (antidiabétique naturel)\n\n" .
                    "Déjeuner :\n• Sauce de gombo avec poisson fumé sans huile ajoutée, accompagné de pâte d'igname en petite portion\n• Ou haricots rouges (atassi) bien cuits sans huile de palme en excès, avec légumes verts (feuilles de patate douce)\n\n" .
                    "Dîner :\n• Soupe légère de légumes locaux (tomate, oignon, piment doux, chou, carotte) avec viande maigre (poulet sans peau grillé)\n• Ou akassa nature (petite portion) avec sauce d'arachide allégée et légumes\n\n" .
                    "🥜 Collations béninoises adaptées :\n• Quelques cacahuètes non salées (petite poignée)\n• Tranche de papaye ou d'ananas (en petite quantité)\n• Concombre frais nature";
            } else {
                return "Conseils : Même en l'absence de comorbidité diagnostiquée, l'obésité sévère représente un risque important. Il est fortement recommandé de consulter un médecin pour un bilan complet (glycémie, tension artérielle, cholestérol, bilan rénal et hépatique). Une prise en charge préventive nutritionnelle doit être amorcée immédiatement.";
            }
        }
        if ($pathology === 'hypertension') {
            return "Conseils et recommandations :\n• Réduire drastiquement la consommation de sel (< 5 g/jour, soit environ 1 cuillère à café)\n• Éviter les condiments très salés, les bouillons en cube (Maggi, etc.) en grande quantité\n• Consommer des aliments riches en potassium : bananes, haricots, légumes verts\n• Prendre les médicaments antihypertenseurs de façon régulière sans interruption\n• Surveiller la tension artérielle quotidiennement, matin et soir\n• Éviter le stress, le tabac et l'alcool qui aggravent l'hypertension\n• Pratiquer des exercices de relaxation ou de respiration profonde\n\n" .
                " Propositions de repas adaptés (hypertension) :\n" .
                "Petit-déjeuner : Bouillie de mil ou de sorgho non salée + fruit frais (papaye)\n" .
                "Déjeuner : Sauce d'arachide légère (peu d'huile, peu de sel) + légumes verts + poisson cuit à la vapeur\n" .
                "Dîner : Haricots rouges en sauce tomate maison (sans sel ajouté) + feuilles de baobab (kponsou)\n" .
                "Collation matin : Papaye fraîche ou mangue\n" .
                "Collation soir : Noix de cajou non salées (petite quantité)";
        }
        if ($pathology === 'hypercholestérolémie') {
            return "Hypercholestérolémie : Conseils spécifiques :\n• Consulter un cardiologue et un endocrinologue en priorité pour un bilan lipidique complet (LDL, HDL, triglycérides) et un bilan cardiovasculaire\n• Adopter un régime pauvre en graisses saturées et en cholestérol alimentaire\n• Réduire les huiles de palme en excès, les fritures répétées et les abats qui sont très fréquents dans l'alimentation béninoise\n• Privilegier les huiles végétales insaturées\n• Augmenter la consommation de fibres solubles\n• Ne jamais arrêter les statines sans avis médical\n• Surveiller la glycémie car l'hypercholestérolémie est souvent associée au prédiabète.";
        }
        return "Conseil : L'obésité sévère représente un risque important. Consultez un médecin pour un bilan complet. Une prise en charge préventive est essentielle.";
    }

    private function getChirurgieAdvice(bool $isYes, ?string $pathology): string
    {
        if ($isYes) {
            $base = "Conseils : Après une chirurgie bariatrique, le régime alimentaire est très spécifique. Les repas doivent être fractionnés en 5 à 6 petites prises par jour. Les aliments doivent être bien mâchés, à texture molle au début. Il faut éviter les boissons pendant les repas, et veiller aux apports en protéines, vitamines et minéraux (carence en B12, fer, calcium fréquente). Un suivi médical et diététique régulier est obligatoire.\n\n";
            if ($pathology === 'diabetes') {
                $base .= " Propositions adaptées (post-opératoire) :\n• Purée de haricots bien cuits (niébé mixé) en petite portion\n• Bouillie légère d'igname avec un peu de poisson effiloché\n• Soupe mixée de légumes locaux (carotte, courgette, épinards)";
            } elseif ($pathology === 'hypertension') {
                $base .= " Propositions de repas adaptés (post-chirurgie bariatrique) :\n" .
                    "Repas 1 (7h) : Bouillie de maïs très lisse et fluide, non sucrée\n" .
                    "Repas 2 (10h) : Purée de haricots noirs très fine + quelques gouttes d'huile d'olive\n" .
                    "Repas 3 (13h) : Poisson blanc cuit à la vapeur émietté + purée d'igname lisse (petite portion)\n" .
                    "Repas 4 (16h) : Tisane de gingembre + 1 petit bout de banane plantain mûre bien cuite\n" .
                    "Repas 5 (19h) : Soupe de légumes mixée (feuilles de moringa, épinards) + petite portion de protéines\n" .
                    "Repas 6 (21h) : Lait de soja maison tiède non sucré";
            }
            return $base;
        }
        return "Conseils : La chirurgie bariatrique peut être envisagée si l'IMC > 40 kg/m² (ou > 35 avec comorbidités) et que les traitements conventionnels ont échoué. Il est conseillé d'en discuter avec un médecin spécialiste. En attendant, une prise en charge nutritionnelle et physique sérieuse doit être mise en place.";
    }

    private function getRestrictionsAdvice(string $answer, ?string $pathology): string
    {
        $ans = mb_strtolower($answer);
        if (str_contains($ans, 'allergies')) {
            $text = "Conseils : Identifier précisément l'allergène (arachide, gluten, lactose, fruits de mer, etc.) et l'éliminer totalement de l'alimentation. Consulter un allergologue et un diététicien pour trouver des substituts adaptés.";
            if ($pathology === 'diabetes') {
                $text .= "\n\n Exemple (allergie aux arachides) : Remplacer les sauces à base d'arachide par des sauces à base de graines de courge (egusi), de sésame ou de tomates fraîches.";
            } elseif ($pathology === 'hypertension') {
                $text .= "\n\n Exemple d'adaptation de repas (allergie aux arachides) :\nDéjeuner : Sauce gombo + poisson grillé + igname bouillie\nDîner : Sauce tomate maison + haricots + riz complet (petite portion)";
            }
            return $text;
        }
        if (str_contains($ans, 'intolérances')) {
            $text = "Conseils : Les intolérances alimentaires peuvent parfois être tolérées en petites quantités. En cas d'intolérance au lactose, opter pour le lait de soja ou de coco non sucré. En cas d'intolérance au gluten, évitez le blé, l'orge, le seigle.";
            if ($pathology === 'diabetes') {
                $text .= "\n\n Exemples :\n• Akassa (base de maïs fermenté) : sans gluten, adapté\n• Pâte de maïs blanc : sans gluten, bonne option";
            } elseif ($pathology === 'hypertension') {
                $text .= "\n\n Repas béninois adaptés (intolérance au gluten) :\nPetit-déjeuner : Bouillie de mil ou de sorgho + fruits frais\nDéjeuner : Pâte de maïs (akassa) + sauce légumes + poisson";
            }
            return $text;
        }
        if (str_contains($ans, 'préférences')) {
            return "Conseils : Les préférences culturelles béninoises sont un atout : la cuisine traditionnelle est riche en légumineuses, légumes, tubercules et poissons. Il faut adapter les méthodes de cuisson (moins d'huile de palme, moins de sel, cuisson à la vapeur ou à l'eau plutôt que la friture).";
        }
        if (str_contains($ans, 'religieuses')) {
            return "Conseils : Les alternatives protéinées locales (poulet, poisson, niébé) sont compatibles avec vos restrictions et votre santé.";
        }
        return "Conseil : L'absence de restriction représente une opportunité pour construire un plan nutritionnel varié et équilibré en s'appuyant sur toute la richesse de la cuisine béninoise traditionnelle.";
    }

    private function getCaloriesVidesAdvice(bool $isYes, ?string $pathology): string
    {
        if ($isYes) {
            $base = "Conseils et recommandations : Les aliments à calories vides (boissons sucrées, fast-foods, desserts industriels, chips) sont particulièrement dangereux car ils provoquent des pics glycémiques et favorisent le stockage des graisses. Il est indispensable de les éliminer progressivement.";
            if ($pathology === 'diabetes') {
                $base .= "\n\nStratégie de substitution :\n• Au lieu d'une boisson sucrée → eau de coco naturelle fraîche ou eau infusée au gingembre\n• Au lieu de biscuits industriels → quelques cacahuètes non salées ou tranche de fruit frais\n• Au lieu de fast-food → sandwich à base de galette de maïs avec poulet grillé et légumes";
            } elseif ($pathology === 'hypertension') {
                $base .= "\n\n Collations saines de substitution :\nÀ privilégier : Eau fraîche, jus de citron maison sans sucre, patate douce bouillie, poignée de noix de cajou ou arachides non salées.";
            }
            return $base;
        }
        return "Conseil : Félicitations pour cette habitude positive. Maintenir cette vigilance est essentiel pour votre santé à long terme.";
    }

    private function getPlanDejaAdvice(string $answer, ?string $pathology): string
    {
        if (mb_strtolower($answer) !== 'non' && !empty($answer)) {
            $text = "Conseils : La reprise de poids après l'arrêt d'un régime est un phénomène très courant appelé \"effet yo-yo\". Il traduit souvent un régime trop restrictif ou non adapté au mode de vie.";
            if ($pathology === 'hypertension') {
                $text .= "\n\n• Reprendre le suivi avec le diététicien en expliquant les difficultés rencontrées\n• Demander un plan nutritionnel adapté aux aliments locaux béninois\n• Comprendre que la fatigue initiale est transitoire\n• La régularité est plus efficace que les régimes stricts.";
            }
            return $text;
        }
        return "Conseil : La consultation d'un diététicien ou nutritionniste est vivement recommandée. En l'absence d'accès à un professionnel, ce programme personnalisé peut servir de guide.";
    }

    private function getBoissonsAdvice(bool $isYes, ?string $pathology): string
    {
        if ($isYes) {
            if ($pathology === 'diabetes') {
                return "Cas 1 — Boissons sucrées : Une canette de soda contient 7 à 10 morceaux de sucre. C'est une catastrophe glycémique. Remplacer par de l'eau pure, eau de coco fraîche ou infusions locales (bissap sans sucre).\n" .
                    "Cas 2 — Boissons alcoolisées : L'alcool perturbe la glycémie et favorise la résistance à l'insuline. Il est fortement conseillé d'arrêter totalement.";
            } elseif ($pathology === 'hypertension') {
                return "Cas A — Boissons sucrées : Chaque verre = 150 kcal vides. Objectif final : 0 boisson sucrée industrielle par jour.\n" .
                    "Cas B — Alcool : L'alcool est calorique et mauvais pour la tension. La bière augmente la triglycéridémie et favorise le stockage abdominal.";
            }
            return "Conseils : Les sodas sont des catastrophes caloriques. Remplacer par de l'eau ou eau de coco. L'alcool apporte des calories vides et favorise le stockage des graisses.";
        }
        return "Conseil : Excellent réflexe. Maintenez une bonne hydratation avec 1,5 à 2L d'eau par jour, prioritairement boissons locales sans sucre.";
    }

    private function getSommeilAdvice(string $answer, ?string $pathology): string
    {
        if (str_contains($answer, 'moins de 6')) {
            return " Moins de 6h/nuit : Le manque de sommeil augmente la résistance à l'insuline, hausse le cortisol (favorisant le stockage abdominal) et dérègle les hormones de la faim. Il est urgent d'améliorer l'hygiène : coucher régulier, éviter les écrans 1h avant, éviter les repas lourds le soir.";
        }
        if (str_contains($answer, '6-7')) {
            return " 6h – 7h/nuit : Légèrement en dessous des recommandations. Un sommeil de 7 à 9 heures est idéal. Essayez d'ajouter 30 à 60 minutes progressivement. Un sommeil suffisant aide à réguler la tension et la glycémie.";
        }
        if (str_contains($answer, '8-9')) {
            return " 8h – 9h/nuit : Durée idéale. Maintenir cette habitude, elle favorise l'équilibre hormonal, la récupération musculaire et la régulation métabolique.";
        }
        return " Plus de 9h/nuit : Un excès de sommeil peut indiquer une fatigue chronique, une dépression ou une apnée du sommeil sévère. Consultez pour évaluation.";
    }

    private function getApneeAdvice(bool $isYes, ?string $pathology): string
    {
        if ($isYes) {
            return "Conseils : L'apnée du sommeil est extrêmement fréquente dans l'obésité sévère. Elle aggrave l'hypertension et le risque cardiovasculaire. Une consultation chez un pneumologue (polysomnographie) est indispensable. Le traitement par PPC est souvent recommandé. La perte de poids l'améliore significativement.";
        }
        return "Conseil : Surveillez tout ronflement fort, réveils nocturnes ou fatigue persistante. Maintenez la perte de poids pour prévenir son apparition.";
    }

    private function getDouleursAdvice(string $answer, ?string $pathology): string
    {
        $ans = mb_strtolower($answer);
        if (str_contains($ans, 'tous les jours') || $ans === 'oui') {
            return "Conseils : Surcharge mécanique importante. Privilégiez des activités à faible impact (natation, vélo stationnaire, exercices assis). L'objectif est de rester actif sans douleur. Un suivi en kinésithérapie est bénéfique.\n\n" .
                " Recommandation nutritionnelle : Intégrer des aliments anti-inflammatoires : gingembre frais, curcuma, poissons gras (sardine, maquereau).";
        }
        if (str_contains($ans, 'parfois')) {
            return "Conseils : Identifiez les déclencheurs (escaliers, station debout longue). Profitez des jours sans douleur pour bouger modérément. Renforcez les muscles de soutien.";
        }
        return "Conseil : L'absence de douleurs est une chance. Prévenez leur apparition en évitant les sports à fort impact (course, saut) et en renforçant progressivement les muscles.";
    }

    private function getRegimeRecentAdvice(bool $isYes, ?string $pathology): string
    {
        if ($isYes) {
            return "Conseils : Félicitations pour l'effort. Une perte même modeste (5-10%) améliore glycémie et tension. Il est important de ne pas reprendre d'anciennes habitudes. Consolidez les acquis via de bonnes pratiques plutôt qu'en cherchant des résultats ultra-rapides inadaptés.\n\n" .
                "• Si perte < 2kg : Régime peut-être trop restrictif ou inadapté.\n" .
                "• Si pas de perte : Consultez un endocrinologue pour écarter d'autres causes.";
        }
        return "Conseil : Il n'est jamais trop tard. Commencez par de petits changements : réduire les portions, supprimer les boissons sucrées, marcher 20 min/jour. Un plan progressif et réaliste est la clé.";
    }

    private function getJoursSportAdvice(string $answer, ?string $pathology): string
    {
        $ans = mb_strtolower($answer);
        if (str_contains($ans, 'aucun')) {
            return " Aucun jour : La sédentarité aggrave la résistance à l'insuline. Objectif : commencer par 10-15 min de marche/jour, puis augmenter de 5 min par semaine. Toute activité compte (marché, ménage).";
        }
        if (str_contains($ans, '1') || str_contains($ans, '2') || str_contains($ans, '3')) {
            return " 1 à 3 jours/semaine : Bon début. Objectif : 150 min d'activité modérée/semaine. Augmentez progressivement à 4-5 jours.";
        }
        if (str_contains($ans, '4') || str_contains($ans, '5') || str_contains($ans, '6')) {
            return " 4 à 6 jours/semaine : Excellent niveau. Maintenez cette régularité. Diversifiez : marche matin, étirements soir.";
        }
        return " 7 jours : Bien, mais attention au surentraînement. Prévoyez 1 jour de récupération active (marche douce, étirements) pour éviter blessures.";
    }

    private function getSedentariteAdvice(string $answer, ?string $pathology): string
    {
        if (str_contains($answer, 'plus de 8')) {
            return "Sédentarité sévère : Facteur de risque majeur. Chaque heure assise supplémentaire augmente le risque cardiovasculaire. Pauses obligatoires toutes les 30 min. Essayez de marcher en téléphonant.";
        }
        if (str_contains($answer, '6-8')) {
            return "Sédentarité importante : Attention. Fractionnez le temps assis par des pauses actives de 5 min toutes les 45 min.";
        }
        if (str_contains($answer, '4-6')) {
            return "Niveau modéré : Se lever et marcher 5 min toutes les heures pour activer la circulation.";
        }
        return "Moins de 4h : Très bien, mode de vie actif. Maintenez cette habitude.";
    }

    private function getActivitesPrefereesAdvice(string $answer, ?string $pathology): string
    {
        $ans = mb_strtolower($answer);
        $choices = [];
        if (str_contains($ans, 'marche')) {
            $choices[] = " Marche : Activité idéale : faible impact, accessible. Marcher avant 9h pour éviter la chaleur. Objectif progressif : 5 000 → 8 000 pas/jour.";
        }
        if (str_contains($ans, 'yoga')) {
            $choices[] = " Yoga : Excellent pour le stress et la mobilité. Préférez le yoga doux ou adapté sur chaise. Améliore la flexibilité.";
        }
        if (str_contains($ans, 'natation')) {
            $choices[] = " Natation : Idéal car l'eau soutient le poids, soulageant les articulations. Recommandé si douleurs importantes.";
        }
        if (empty($choices) || str_contains($ans, 'autre')) {
            $choices[] = "Autre : Toute activité plaisir (danse traditionnelle béninoise, jardinage) est bénéfique. La danse est un excellent cardio.";
        }
        return implode("\n\n", $choices);
    }

    private function getFCRAdvice(string $answer, ?string $pathology): string
    {
        $val = intval(preg_replace('/\D/', '', $answer));
        if ($val > 0) {
            if ($val > 90) {
                return "Cas C — FC > 90 bpm : Valeur élevée, signal d'alarme. Le cœur travaille trop. Un bilan cardiologique est indispensable. L'activité régulière la fera baisser progressivement.";
            }
            if ($val >= 60 && $val <= 80) {
                return "Cas B — FC 60-80 bpm : Fréquence normale. Bonne base de départ. Elle diminuera encore avec l'entraînement.";
            }
            if ($val < 60) {
                return "Cas A — FC < 60 bpm : Bonne condition de base, mais vérifiez s'il ne s'agit pas d'une bradycardie médicamenteuse.";
            }
        }
        return "Conseil : Mesurez votre FC au repos au réveil (normale : 60-80 bpm). Une valeur > 90 bpm doit être signalée au médecin. FCmax approx : 208 − 0.7 × âge.";
    }

    private function getRessentiAdvice(string $answer, ?string $pathology): string
    {
        $ans = mb_strtolower($answer);
        if (str_contains($ans, 'honte') || str_contains($ans, 'mal')) {
            return "Honte / mal-être : Émotions fréquentes et compréhensibles. L'obésité est une maladie complexe, pas un manque de volonté. Pratiquez la bienveillance envers vous-même. Un accompagnement psychologique peut aider à dépasser ces complexes.";
        }
        if (str_contains($ans, 'découragement') || str_contains($ans, 'déjà essayé')) {
            return "Découragement / sentiment d'échec : L'échec des tentatives passées n'augure pas de l'avenir. Adoptez une approche pluridisciplinaire. Fixez des objectifs réalistes à court terme (ex: perdre 1kg ce mois).";
        }
        if (str_contains($ans, 'motivation') || str_contains($ans, 'prêt')) {
            return "Motivation / détermination : Excellente disposition ! Canalisez cette énergie dans un plan structuré avec des professionnels. Évitez les régimes drastiques qui mènent au découragement.";
        }
        if (str_contains($ans, 'acceptation') || str_contains($ans, 'sérénité')) {
            return "Acceptation / sérénité : Très bonne base mentale. Cependant, l'obésité sévère est un risque médical réel. L'objectif est la santé et la qualité de vie, indépendamment de l'esthétique.";
        }
        return "Conseils : Votre motivation est un atout. Canalisez-la dans un plan structuré et progressif sans chercher de solutions drastiques.";
    }

    private function getStressEnnuiAdvice(bool $isYes, ?string $pathology): string
    {
        if ($isYes) {
            return " Alimentation émotionnelle : Identifier les déclencheurs (travail, solitude). Tenez un journal émotionnel. Trouvez des alternatives : marche, respiration profonde, musique. Une TCC peut être très efficace.\n\n" .
                " Collation stratégique : Fruit frais (goyave, papaye), infusion gingembre, quelques noix de cajou.";
        }
        return "Conseil : Excellente habitude. Restez vigilant car le stress chronique peut induire ce comportement à terme. Différenciez faim physique et faim émotionnelle.";
    }

    private function getFinirAssietteAdvice(bool $isYes, ?string $pathology): string
    {
        if ($isYes) {
            return " Difficulté à s'arrêter : Souvent lié à l'éducation. Utilisez des assiettes plus petites. Mangez lentement (20 min minimum). Autorisez-vous à ne pas finir si la satiété est là. Buvez un verre d'eau avant le repas.";
        }
        return "Conseil : Vous êtes à l'écoute de votre satiété, c'est une excellente habitude à maintenir.";
    }

    private function getEmotionsAdvice(bool $isYes, ?string $pathology): string
    {
        if ($isYes) {
            return " Lien mental-alimentation : Stress et dépression sont liés à l'obésité. Un suivi par un psychologue est recommandé. Pratiquez le mindful eating pour reconnecter avec vos signaux de faim réels.";
        }
        return "Conseil : Maintenez cet équilibre. Prenez soin de votre bien-être global pour prévenir tout basculement émotionnel lié aux difficultés du quotidien.";
    }

    private function getProgrammeDejaAdvice(bool $isYes, ?string $pathology): string
    {
        if ($isYes) {
            return " Expériences passées : Échec des régimes drastiques fréquent. Cette fois, visez un changement de style de vie durable. Célébrez chaque petite victoire (tension, mobilité) et non seulement le poids.";
        }
        return "Conseil : C'est le moment idéal pour poser de nouvelles bases saines. Un premier pas : remplacez une boisson sucrée par de l'eau. Chaque petit pas compte.";
    }
}
