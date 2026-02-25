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

        $questions = [
            // Maladie 1: Obésité modérée
            [
                'maladie_chronique_id' => 1,
                'texte_question' => "Avez-vous des antécédents de diabète de type 2, d'hypertension artérielle ou de maladies cardiovasculaires ?",
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, lequel ?',
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Prenez-vous actuellement des médicaments qui sont liés à votre antécédent précédent ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, lesquels ?',
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Prenez-vous actuellement l’un des types de médicaments suivants ?',
                'possible_answers' => [
                    'Insuline',
                    'Médicaments pour perdre du poids (ex : orlistat, liraglutide…)',
                    'Médicaments pour la tension artérielle (ex : IEC, ARA2, bêta-bloquants…)',
                    'Médicaments pour le cholestérol (ex : statines)',
                    'Médicaments pour baisser la glycémie (ex : metformine, glimepiride…)',
                    'Aucun de ces médicaments',
                ],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Pouvez-vous décrire une journée typique de vos repas et collations ?',
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Combien de portions de fruits et légumes consommez-vous par jour ?',
                'possible_answers' => ['1-2', '3-4', '5 ou plus'],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Grignotez-vous entre les repas ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, quels aliments consommez-vous ?',
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'A quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?',
                'possible_answers' => ['Tous les jours', 'Une fois par semaine', 'Occasionnellement', 'Jamais'],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => "Combien d'heures de sommeil avez-vous par nuit ?",
                'possible_answers' => ['Moins de 6 h', '6h -7h', '8h -9h', 'Plus de 9h'],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Avez-vous l’apnée du sommeil ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Avez-vous récemment fait un régime de perte du poids ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, combien de poids avez-vous perdu ?',
                'possible_answers' => ['Moins de 5 kg.', '5 - 10 kg.', 'Plus de 10 kg.'],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Combien de jours par semaine pratiquez-vous une activité physique ?',
                'possible_answers' => ['Aucun', '1j-3j', '4j-6j', '7j'],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Combien de temps passez-vous en position assise chaque jour ?',
                'possible_answers' => ['Moins de 4h', '4h-6h', '6h-8h', 'Plus de 8h'],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Quelles activités physiques appréciez-vous ?',
                'possible_answers' => ['Marche', 'Yoga', 'Autre'],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Connaissez-vous votre fréquence cardiaque au repos ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, veuillez- nous la donner ?',
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Mangez-vous souvent par stress ou ennui ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Avez-vous tendance à finir votre assiette même si vous n’avez plus faim ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Avez-vous déjà suivi un régime alimentaire particulier ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Si oui, lequel, et a-t-il été efficace pour vous ? Pourquoi ?',
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Quel est votre objectif principal en matière de santé ?',
                'possible_answers' => ['Perdre du poids', 'Améliorer votre forme physique'],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Combien de kg voulez-vous perdre ?',
                'possible_answers' => ['Moins de 5 kg.', '5 - 10 kg.', 'Plus de 10 kg.'],
            ],
            [
                'maladie_chronique_id' => 1,
                'texte_question' => 'Selon votre objectif de perte de poids, quel niveau de changement êtes-vous prêt à suivre ?',
                'possible_answers' => [
                    'Perdre moins de 5 Kg: Léger 300 kcal',
                    'Perdre moins de 5Kg: Moyen 400 kcal',
                    'Perdre moins de 5Kg: Serein 500 kcal',
                    'Perdre entre 5-10Kg: Léger 500 kcal',
                    'Perdre entre 5-10Kg: Moyen 600 kcal',
                    'Perdre entre 5-10Kg: Serein 700 kcal',
                    'Perdre plus de 10Kg: Léger 700 kcal',
                    'Perdre plus de 10Kg: Moyen 800 kcal',
                    'Perdre plus de 10Kg: Serein 900 kcal',
                ],
            ],

            // Maladie 2: Obésité sévère
            [
                'maladie_chronique_id' => 2,
                'texte_question' => "Avez-vous été diagnostiqué avec des problèmes de santé liés à l'obésité, comme le diabète de type 2, l'hypertension ou l'hypercholestérolémie ?",
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui lequel ?',
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous subi des opérations chirurgicales liées à votre poids comme une chirurgie bariatrique ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous des restrictions alimentaires ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, choisissez l\'option qui s\'appliquent ?',
                'possible_answers' => ['Allergies', 'Intolérances', 'Préférences culturelles', 'Religieuses'],
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Consommez-vous régulièrement des aliments riches en calories vides, comme les boissons sucrées, les fast-foods, ou les desserts ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Suivez-vous déjà un plan nutritionnel ou avez-vous consulté un diététicien auparavant ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, parlez-nous de ça brièvement en quelques lignes',
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Buvez-vous régulièrement des boissons sucrées ou alcoolisées ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, Quand ? Quelle quantité ?',
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Combien d\' heures de sommeil avez-vous par nuit ?',
                'possible_answers' => ['Moins de 6 h', '6h -7h', '8h -9h', 'Plus de 9h'],
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous l’apnée du sommeil ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous des douleurs articulaires ou des limitations de mobilité ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, A quelle fréquence ?',
                'possible_answers' => ['Tous les jours', 'Parfois'],
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous récemment fait un régime de perte du poids ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, combien de poids avez-vous perdu ?',
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Combien de jours par semaine pratiquez-vous une activité physique ?',
                'possible_answers' => ['Aucun', '1j-3j', '4j-6j', '7j'],
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Combien de temps passez-vous en position assise chaque jour ?',
                'possible_answers' => ['Moins de 4h', '4h-6h', '6h-8h', 'Plus de 8h'],
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Quelles activités physiques appréciez-vous ?',
                'possible_answers' => ['Marche', 'Yoga', 'Autre'],
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Connaissez-vous votre fréquence cardiaque au repos ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Si oui, veuillez- nous la donner ?',
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Comment décririez-vous votre ressenti personnel par rapport à votre poids ?',
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Mangez-vous souvent par stress ou ennui ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous tendance à finir votre assiette même si vous n’avez plus faim ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous des habitudes alimentaires liées à des émotions, comme le stress ou la dépression ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 2,
                'texte_question' => 'Avez-vous déjà suivi un programme ou tenté de perdre du poids auparavant ?',
                'possible_answers' => $yes_or_no,
            ],

            // Maladie 3: Obésité morbide
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Souffrez-vous de maladies chroniques importantes pouvant être liées à votre poids ?',
                'possible_answers' => ['Cardiaques', 'Rénales', 'Respiratoires', 'Aucun'],
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous l’apnée du sommeil ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Utilisez-vous un appareil CPAP pour l\'apnée du sommeil ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous des difficultés à effectuer des activités quotidiennes de base en raison de votre poids ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous récemment perdu ou pris du poids ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Si oui, combien et en combien de temps ?',
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous des épisodes de compulsions alimentaires ou de boulimie ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous déjà suivi des régimes très stricts ou des régimes en yo-yo ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous des difficultés à contrôler les portions ou à manger de manière équilibrée ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Buvez-vous régulièrement des boissons sucrées ou alcoolisées ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Si oui, Quand ? Quelle quantité ?',
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Votre poids vous empêche-t-il de pratiquer certaines activités physiques ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Quelle est votre capacité à vous déplacer de manière autonome (marche, escaliers, etc.) ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous besoin d\'un équipement spécialisé pour vous aider à bouger ou à vous asseoir confortablement ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Quelle est votre fréquence cardiaque au repos (si vous la connaissez) ?',
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous un suivi psychologique ou psychiatrique en lien avec votre poids ou votre alimentation ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Si oui, parlez-nous en si cela ne vous gêne pas',
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous déjà participé à des groupes de soutien pour la perte de poids ou l\'obésité ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Comment faites-vous face aux remarques liées à votre poids ?',
                'possible_answers' => [
                    'Je reste indifférent(e).',
                    'Je me sens stressé(e) ou frustré(e).',
                    'Je me sens triste ou découragé(e).',
                    'Je cherche un soutien (amis, famille, professionnels).',
                ],
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Avez-vous envisagé une chirurgie bariatrique ou d\'autres interventions médicales pour gérer votre poids ?',
                'possible_answers' => $yes_or_no,
            ],
            [
                'maladie_chronique_id' => 3,
                'texte_question' => 'Quels aspects de votre vie vous motivent le plus pour changer vos habitudes alimentaires et physiques ?',
            ],
        ];

        // Optionnel : Nettoyer les tables avant de seeder pour éviter les doublons
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // QuestionPossibleAnswer::truncate();
        // Question::truncate();
        // DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        foreach ($questions as $question) {
            $new_question = Question::create([
                'maladie_chronique_id' => $question['maladie_chronique_id'],
                'texte_question' => $question['texte_question'],
                'has_possible_answers' => isset($question['possible_answers']),
            ]);

            if (isset($question['possible_answers'])) {
                foreach ($question['possible_answers'] as $answer) {
                    QuestionPossibleAnswer::create([
                        'question_id' => $new_question->id,
                        'value' => $answer,
                    ]);
                }
            }
        }
    }

}
