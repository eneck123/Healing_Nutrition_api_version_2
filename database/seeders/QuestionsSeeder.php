<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionPossibleAnswer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionsSeeder extends Seeder
{
    public function run()
    {
        $yes_or_no = ['Oui', 'Non'];

        // ---------------------------------------------------------------
        // PASSE 1 : Définition des questions (sans parent_question_id)
        // On stocke chaque question créée dans un tableau indexé par clé
        // lisible pour pouvoir les relier en Passe 2.
        // ---------------------------------------------------------------

        $defs = [

            // ── Obésité modérée (maladie_chronique_id = 1) ─────────────

            'mod_antecedents' => [
                'maladie_chronique_id' => 1,
                'texte_question' => "Avez-vous des antécédents de diabète de type 2 ou d'hypertension artérielle ?",
                'possible_answers' => $yes_or_no,
            ],
            'mod_antecedents_lequel' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, lequel ?',
            ],
            'mod_medicaments_antecedent' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Prenez-vous actuellement des médicaments qui sont liés à votre antécédent précédent ?',
                'possible_answers' => $yes_or_no,
            ],
            'mod_medicaments_antecedent_lesquels' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, lesquels ?',
            ],
            'mod_medicaments_types' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Prenez-vous actuellement l\'un des types de médicaments suivants ?',
                'possible_answers' => [
                    'Insuline',
                    'Médicaments pour perdre du poids (ex : orlistat, liraglutide…)',
                    'Médicaments pour la tension artérielle (ex : IEC, ARA2, bêta-bloquants…)',
                    'Médicaments pour le cholestérol (ex : statines)',
                    'Médicaments pour baisser la glycémie (ex : metformine, glimepiride…)',
                    'Aucun de ces médicaments',
                ],
            ],
            'mod_fruits_legumes' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Combien de portions de fruits et légumes consommez-vous par jour ?',
                'possible_answers' => ['1-2', '3-4', '5 ou plus'],
            ],
            'mod_grignotage' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Grignotez-vous entre les repas ?',
                'possible_answers' => $yes_or_no,
            ],
            'mod_grignotage_aliments' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, quels aliments consommez-vous ?',
            ],
            'mod_boissons' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'A quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?',
                'possible_answers' => ['Tous les jours', 'Une fois par semaine', 'Occasionnellement', 'Jamais'],
            ],
            'mod_sommeil' => [
                'maladie_chronique_id' => 1,
                'texte_question' => "Combien d'heures de sommeil avez-vous par nuit ?",
                'possible_answers' => ['Moins de 6 h', '6h -7h', '8h -9h', 'Plus de 9h'],
            ],
            'mod_apnee' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Avez-vous l\'apnée du sommeil ?',
                'possible_answers' => $yes_or_no,
            ],
            'mod_regime_recemment' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Avez-vous récemment fait un régime de perte du poids ?',
                'possible_answers' => $yes_or_no,
            ],
            'mod_activite_physique_jours' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Combien de jours par semaine pratiquez-vous une activité physique ?',
                'possible_answers' => ['Aucun', '1j-3j', '4j-6j', '7j'],
            ],
            'mod_position_assise' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Combien de temps passez-vous en position assise chaque jour ?',
                'possible_answers' => ['Moins de 4h', '4h-6h', '6h-8h', 'Plus de 8h'],
            ],
            'mod_activites_appreciees' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Quelles activités physiques appréciez-vous ?',
                'possible_answers' => ['Marche', 'Yoga', 'Autre'],
            ],
            'mod_frequence_cardiaque' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Connaissez-vous votre fréquence cardiaque au repos ?',
                'possible_answers' => $yes_or_no,
            ],
            'mod_frequence_cardiaque_valeur' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, veuillez- nous la donner ?',
            ],
            'mod_stress' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Mangez-vous souvent par stress ou ennui ?',
                'possible_answers' => $yes_or_no,
            ],
            'mod_finir_assiette' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Avez-vous tendance à finir votre assiette même si vous n\'avez plus faim ?',
                'possible_answers' => $yes_or_no,
            ],
            'mod_regime_particulier' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Avez-vous déjà suivi un régime alimentaire particulier ?',
                'possible_answers' => $yes_or_no,
            ],
            'mod_regime_particulier_lequel' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, lequel, et a-t-il été efficace pour vous ? Pourquoi ?',
            ],
            'mod_objectif_sante' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Quel est votre objectif principal en matière de santé ?',
                'possible_answers' => ['Perdre du poids', 'Améliorer votre forme physique'],
            ],
            'mod_kg_a_perdre' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Combien de kg voulez-vous perdre ?',
                'possible_answers' => ['Moins de 5 kg.', '5 - 10 kg.', 'Plus de 10 kg.'],
            ],
            'mod_niveau_changement' => [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Selon votre objectif de perte de poids, quel niveau de changement êtes-vous prêt à suivre ?',
                'possible_answers' => [
                    'Perdre moins de 5Kg: Progressif 300 kcal',
                    'Perdre moins de 5Kg: Intermédiaire 400 kcal',
                    'Perdre moins de 5Kg: Soutenu 500 kcal',
                    'Perdre entre 5-10Kg: Progressif 500 kcal',
                    'Perdre entre 5-10Kg: Intermédiaire 600 kcal',
                    'Perdre entre 5-10Kg: Soutenu 700 kcal',
                    'Perdre plus de 10Kg: Progressif 700 kcal',
                    'Perdre plus de 10Kg: Intermédiaire 800 kcal',
                    'Perdre plus de 10Kg: Soutenu 900 kcal',
                ],
            ],

            // ── Obésité sévère (maladie_chronique_id = 2) ──────────────

            'sev_problemes_sante' => [
                'maladie_chronique_id' => 2,
                'texte_question' => "Avez-vous été diagnostiqué avec des problèmes de santé liés à l'obésité, comme le diabète de type 2 ou l'hypertension ?",
                'possible_answers' => $yes_or_no,
            ],
            'sev_problemes_sante_lequel' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui lequel ?',
            ],
            'sev_chirurgie' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous subi des opérations chirurgicales liées à votre poids comme une chirurgie bariatrique ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_restrictions' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous des restrictions alimentaires ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_restrictions_type' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, choisissez l\'option qui s\'appliquent ?',
                'possible_answers' => ['Allergies', 'Intolérances', 'Préférences culturelles', 'Religieuses'],
            ],
            'sev_calories_vides' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Consommez-vous régulièrement des aliments riches en calories vides, comme les boissons sucrées, les fast-foods, ou les desserts ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_plan_nutritionnel' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Suivez-vous déjà un plan nutritionnel ou avez-vous consulté un diététicien auparavant ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_plan_nutritionnel_detail' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, parlez-nous de ça brièvement en quelques lignes',
            ],
            'sev_boissons' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Buvez-vous régulièrement des boissons sucrées ou alcoolisées ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_boissons_detail' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, Quand ? Quelle quantité ?',
            ],
            'sev_sommeil' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Combien d\' heures de sommeil avez-vous par nuit ?',
                'possible_answers' => ['Moins de 6 h', '6h -7h', '8h -9h', 'Plus de 9h'],
            ],
            'sev_apnee' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous l\'apnée du sommeil ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_douleurs' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous des douleurs articulaires ou des limitations de mobilité ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_douleurs_frequence' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, A quelle fréquence ?',
                'possible_answers' => ['Tous les jours', 'Parfois'],
            ],
            'sev_regime_recemment' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous récemment fait un régime de perte du poids ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_regime_poids_perdu' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, combien de poids avez-vous perdu ?',
            ],
            'sev_activite_physique_jours' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Combien de jours par semaine pratiquez-vous une activité physique ?',
                'possible_answers' => ['Aucun', '1j-3j', '4j-6j', '7j'],
            ],
            'sev_position_assise' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Combien de temps passez-vous en position assise chaque jour ?',
                'possible_answers' => ['Moins de 4h', '4h-6h', '6h-8h', 'Plus de 8h'],
            ],
            'sev_activites_appreciees' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Quelles activités physiques appréciez-vous ?',
                'possible_answers' => ['Marche', 'Yoga', 'Autre'],
            ],
            'sev_ressenti_poids' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Comment décririez-vous votre ressenti personnel par rapport à votre poids ?',
            ],
            'sev_stress' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Mangez-vous souvent par stress ou ennui ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_finir_assiette' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous tendance à finir votre assiette même si vous n\'avez plus faim ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_emotions' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous des habitudes alimentaires liées à des émotions, comme le stress ou la dépression ?',
                'possible_answers' => $yes_or_no,
            ],
            'sev_programme_poids' => [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous déjà suivi un programme ou tenté de perdre du poids auparavant ?',
                'possible_answers' => $yes_or_no,
            ],
        ];

        // ---------------------------------------------------------------
        // PASSE 1 : Insertion de toutes les questions (sans parent)
        // ---------------------------------------------------------------
        $created = []; // clé => instance Question

        foreach ($defs as $key => $def) {
            $question = Question::create([
                'maladie_chronique_id' => $def['maladie_chronique_id'],
                'texte_question'       => $def['texte_question'],
                'has_possible_answers' => isset($def['possible_answers']),
            ]);

            if (isset($def['possible_answers'])) {
                foreach ($def['possible_answers'] as $answer) {
                    QuestionPossibleAnswer::create([
                        'question_id' => $question->id,
                        'value'       => $answer,
                    ]);
                }
            }

            $created[$key] = $question;
        }

        // ---------------------------------------------------------------
        // PASSE 2 : Mise à jour des relations parent/enfant
        // Format : 'clé_enfant' => ['parent' => 'clé_parente', 'trigger' => 'Oui']
        // ---------------------------------------------------------------
        $links = [
            // Obésité modérée
            'mod_antecedents_lequel'             => ['parent' => 'mod_antecedents',            'trigger' => 'Oui'],
            'mod_medicaments_antecedent'         => ['parent' => 'mod_antecedents',            'trigger' => 'Oui'],
            'mod_medicaments_antecedent_lesquels' => ['parent' => 'mod_medicaments_antecedent', 'trigger' => 'Oui'],
            'mod_grignotage_aliments'            => ['parent' => 'mod_grignotage',             'trigger' => 'Oui'],
            'mod_frequence_cardiaque_valeur'     => ['parent' => 'mod_frequence_cardiaque',    'trigger' => 'Oui'],
            'mod_regime_particulier_lequel'      => ['parent' => 'mod_regime_particulier',     'trigger' => 'Oui'],
            // Les deux questions de perte de poids sont conditionnelles à l'objectif "Perdre du poids".
            // Si l'utilisateur choisit "Améliorer votre forme physique", ces questions sont ignorées.
            'mod_kg_a_perdre'                    => ['parent' => 'mod_objectif_sante',         'trigger' => 'Perdre du poids'],
            'mod_niveau_changement'              => ['parent' => 'mod_objectif_sante',         'trigger' => 'Perdre du poids'],

            // Obésité sévère
            'sev_problemes_sante_lequel'         => ['parent' => 'sev_problemes_sante',       'trigger' => 'Oui'],
            'sev_restrictions_type'              => ['parent' => 'sev_restrictions',           'trigger' => 'Oui'],
            'sev_plan_nutritionnel_detail'       => ['parent' => 'sev_plan_nutritionnel',      'trigger' => 'Oui'],
            'sev_boissons_detail'                => ['parent' => 'sev_boissons',               'trigger' => 'Oui'],
            'sev_douleurs_frequence'             => ['parent' => 'sev_douleurs',               'trigger' => 'Oui'],
            'sev_regime_poids_perdu'             => ['parent' => 'sev_regime_recemment',      'trigger' => 'Oui'],
        ];

        foreach ($links as $childKey => $link) {
            $created[$childKey]->update([
                'parent_question_id' => $created[$link['parent']]->id,
                'trigger_answer'     => $link['trigger'],
            ]);
        }
    }
}
