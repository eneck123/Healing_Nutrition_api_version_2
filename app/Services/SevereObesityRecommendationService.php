<?php

namespace App\Services;

class SevereObesityRecommendationService
{
    /**
     * Détecte la pathologie principale à partir des réponses.
     */
    public function detectPathology(array $qa): ?string
    {
        foreach ($qa as $item) {
            if (isset($item['question_id']) && $item['question_id'] == 93) {
                $resp = mb_strtolower($item['reponse']);
                if (str_contains($resp, 'diabète'))
                    return 'diabete';
                if (str_contains($resp, 'hypertension') || str_contains($resp, 'hta'))
                    return 'hta';
                if (str_contains($resp, 'cholestérol'))
                    return 'cholesterol';
            }
        }
        return null;
    }

    /**
     * Retourne la recommandation spécifique pour une question via sa clé (slug).
     */
    public function getRecommendation(string $key, string $answer, ?string $pathology = null): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = str_contains($answerLower, 'oui');

        switch ($key) {
            case 'antecedents_diag':
            case 'antecedents_lequel':
                $base = $isYes
                    ? "Il est impératif de suivre rigoureusement vos traitements en cours tout en adaptant votre alimentation. "
                    : "L'absence de diagnostic ne dispense pas d'une surveillance régulière, car l'obésité sévère est un facteur de risque majeur. ";

                if ($pathology === 'diabete') {
                    return $base . "💡 Priorité Diabète : Supprimez les sucres rapides, favorisez les fibres (légumes verts) et contrôlez strictement les portions de féculents.";
                } elseif ($pathology === 'hta') {
                    return $base . "💡 Priorité HTA : Réduisez drastiquement le sel et les cubes de bouillon. Privilégiez les épices naturelles (ail, gingembre).";
                }
                return $base;

            case 'chirurgie':
                if ($isYes)
                    return "Le suivi post-opératoire est crucial. Priorisez les protéines et fractionnez vos repas comme recommandé par votre chirurgien.";
                return "La chirurgie peut être une option à discuter avec votre médecin si l'IMC reste élevé malgré le suivi nutritionnel.";

            case 'restrictions':
            case 'restrictions_lesquelles':
                if (!$isYes)
                    return "L'absence de restriction est une opportunité pour diversifier l'alimentation sainement en exploitant les produits locaux béninois.";
                return "Identifiez précisément vos restrictions et substituez-les par des alternatives locales sûres (ex: riz local si allergie au gluten).";

            case 'calories_vides':
                $advice = $isYes
                    ? "Remplacez progressivement les sodas par de l'eau infusée (gingembre-citron) et les fast-foods par des grillades de poisson local. "
                    : "Maintenez cette excellente habitude. Restez vigilant lors des événements sociaux. ";

                return $advice . "\n\n" .
                    " À PRIVILÉGIER : Poissons frais locaux, niébé (haricots), feuilles de moringa, céréales complètes (sorgho, mil).\n" .
                    " À ÉVITER : Sodas, fritures (alloco, beignets), huile de palme en excès, cubes de bouillon, alcool.\n\n" .
                    " EXEMPLE RÉGIME BÉNINOIS :\n" .
                    "• Petit déj : Bouillie de sorgho sans sucre ou 2 œufs durs + légumes.\n" .
                    "• Déjeuner : Petite portion de tô ou igname (150g) + sauce légumes abondante + poisson.\n" .
                    "• Dîner : Soupe de légumes légère ou poisson vapeur avec légumes cuits.\n" .
                    "• Collations : Noix de cajou nature (10-15) ou morceau de papaye.";

            case 'plan_deja':
            case 'plan_deja_texte':
                if ($isYes)
                    return "Analysez vos succès et échecs passés pour ajuster ce nouveau plan. La régularité est plus importante que la restriction sévère.";
                return "Un plan nutritionnel personnalisé est bien plus efficace qu'un régime improvisé. Suivez les étapes de ce guide.";

            case 'boissons':
            case 'boissons_details':
                $hydratation = "💧 HYDRATATION : Buvez 1,5 à 2 litres d'eau par jour. Un grand verre d'eau avant chaque repas aide à réduire la faim.";
                if ($isYes)
                    return "L'alcool et le sucre aggravent le stockage des graisses. Réduisez progressivement vers une consommation exceptionnelle.\n" . $hydratation;
                return "Excellente habitude. " . $hydratation;

            case 'sommeil':
                if (str_contains($answerLower, 'moins de 6'))
                    return "Le manque de sommeil augmente l'hormone de la faim. Visez 7 à 8h pour stabiliser votre poids.";
                if (str_contains($answerLower, 'plus de 9'))
                    return "Un sommeil excessif peut indiquer une fatigue chronique. Consultez si ce besoin est constant.";
                return "Votre durée de sommeil est correcte. Veillez à la qualité de votre repos (pas d'écrans avant le coucher).";

            case 'apnee':
                if ($isYes)
                    return "L'apnée est liée au poids. La perte de 10% de votre poids actuel peut réduire significativement les épisodes.";
                return "Restez vigilant aux signes (ronflements, fatigue matinale). La perte de poids prévient l'apparition de l'apnée.";

            case 'douleurs':
            case 'douleurs_frequence':
                if ($isYes)
                    return "Chaque kilo perdu réduit de 4kg la pression sur vos genoux. Priorisez les activités sans impact (natation, étirements).";
                return "C'est une chance précieuse. Commencez une activité douce pour protéger vos articulations avant l'apparition de douleurs.";

            case 'jours_sport':
                if (str_contains($answerLower, 'aucun'))
                    return "La sédentarité est une urgence. Commencez par 5-10 min de marche lente par jour, très progressivement.";
                if (str_contains($answerLower, '7j'))
                    return "Attention au surentraînement. Intégrez au moins un jour de récupération active (étirements simples).";
                return "Bon rythme. Essayez de maintenir cette régularité et de varier les activités (marche, yoga doux).";

            case 'sedentarite':
                if (str_contains($answerLower, 'plus de 8'))
                    return "Risque cardiovasculaire élevé. Levez-vous 5 minutes toutes les 45 minutes pour rompre la sédentarité.";
                return "Niveau acceptable, mais essayez de marcher 10 minutes après chaque repas pour stimuler la digestion.";

            case 'stress_ennui':
                if ($isYes)
                    return "L'alimentation émotionnelle est un obstacle majeur. Remplacez le grignotage par une infusion ou une activité relaxante.";
                return "Bonne maîtrise émotionnelle. Cela facilitera grandement votre adhésion à ce nouveau plan alimentaire.";

            case 'finir_assiette':
                if ($isYes)
                    return "Utilisez des assiettes plus petites (illusion d'optique) et apprenez à poser les couverts dès les premiers signes de satiété.";
                return "Très bon réflexe. Continuez d'écouter votre corps plutôt que de finir par habitude.";

            case 'emotions':
                if ($isYes)
                    return "Traitez le stress ou l'anxiété en parallèle du plan. L'exercice physique doux est un antidépresseur naturel puissant.";
                return "Votre stabilité émotionnelle est un atout. Maintenez des rituels de repas plaisants et sans stress.";

            default:
                return "Continuez à suivre les principes de base de ce guide adaptés à votre profil.";
        }
    }

    /**
     * @deprecated Utilisez les recommandations personnalisées dans getRecommendation.
     */
    public function getGeneralAdvice(?string $pathology = null): array
    {
        return [];
    }
}
