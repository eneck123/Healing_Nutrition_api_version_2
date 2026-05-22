<?php
// Final Master Rebuilder (V5)

$testTxt = 'test.txt';
$outputFile = 'database/seeders/RecommendationSeeder.php';

// 1. Extract Content from test.txt
$testContent = file_get_contents($testTxt);
$testBlocks = [];
$currentQ = null; $currentR = null; $currentLines = [];
foreach (explode("\n", $testContent) as $line) {
    if (preg_match('/QUESTION (\d+)/i', $line, $m)) {
        if ($currentQ && $currentR) $testBlocks[$currentQ][$currentR] = trim(implode("\n", $currentLines));
        $currentQ = (int)$m[1]; $currentR = null; $currentLines = [];
    } elseif (preg_match('/RÉPONSE\s*:\s*(OUI|NON|NON \(Pas de médicaments\)|NON \(Jamais suivi régime particulier\))/i', $line, $m)) {
        if ($currentQ && $currentR) $testBlocks[$currentQ][$currentR] = trim(implode("\n", $currentLines));
        $r = strtoupper($m[1]);
        $currentR = (strpos($r, 'NON') !== false) ? 'NON' : 'OUI';
        $currentLines = [];
    } else {
        if ($currentR !== null) $currentLines[] = $line;
    }
}
if ($currentQ && $currentR) $testBlocks[$currentQ][$currentR] = trim(implode("\n", $currentLines));

// 2. Define Questions (Hardcoded from QuestionsSeeder)
$questions = [
    1 => ["maladie_id" => 1, "question" => "Avez-vous des antécédents de diabète de type 2, d'hypertension artérielle ou de maladies cardiovasculaires ?", "answers" => ["Oui", "Non"]],
    2 => ["maladie_id" => 1, "question" => "Si oui, lequel ?", "answers" => [null]],
    3 => ["maladie_id" => 1, "question" => "Prenez-vous actuellement des médicaments qui sont liés à votre antécédent précédent ?", "answers" => ["Oui", "Non"]],
    4 => ["maladie_id" => 1, "question" => "Si oui, lesquels ?", "answers" => [null]],
    5 => ["maladie_id" => 1, "question" => "Prenez-vous actuellement l'un des types de médicaments suivants ?", "answers" => ["Insuline", "Médicaments pour perdre du poids (ex : orlistat, liraglutide…)", "Médicaments pour la tension artérielle (ex : IEC, ARA2, bêta-bloquants…)", "Médicaments pour le cholestérol (ex : statines)", "Médicaments pour baisser la glycémie (ex : metformine, glimepiride…)", "Aucun de ces médicaments"]],
    6 => ["maladie_id" => 1, "question" => "Pouvez-vous décrire une journée typique de vos repas et collations ?", "answers" => [null]],
    7 => ["maladie_id" => 1, "question" => "Combien de portions de fruits et légumes consommez-vous par jour ?", "answers" => ["1-2", "3-4", "5 ou plus"]],
    8 => ["maladie_id" => 1, "question" => "Grignotez-vous entre les repas ?", "answers" => ["Oui", "Non"]],
    9 => ["maladie_id" => 1, "question" => "Si oui, quels aliments consommez-vous ?", "answers" => [null]],
    10 => ["maladie_id" => 1, "question" => "A quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?", "answers" => ["Tous les jours", "Une fois par semaine", "Occasionnellement", "Jamais"]],
    11 => ["maladie_id" => 1, "question" => "Combien d'heures de sommeil avez-vous par nuit ?", "answers" => ["Moins de 6 h", "6h -7h", "8h -9h", "Plus de 9h"]],
    12 => ["maladie_id" => 1, "question" => "Avez-vous l'apnée du sommeil ?", "answers" => ["Oui", "Non"]],
    13 => ["maladie_id" => 1, "question" => "Avez-vous récemment fait un régime de perte du poids ?", "answers" => ["Oui", "Non"]],
    14 => ["maladie_id" => 1, "question" => "Si oui, combien de poids avez-vous perdu ?", "answers" => [null]],
    15 => ["maladie_id" => 1, "question" => "Combien de jours par semaine pratiquez-vous une activité physique ?", "answers" => ["Aucun", "1j-3j", "4j-6j", "7j"]],
    16 => ["maladie_id" => 1, "question" => "Combien de temps passez-vous en position assise chaque jour ?", "answers" => ["Moins de 4h", "4h-6h", "6h-8h", "Plus de 8h"]],
    17 => ["maladie_id" => 1, "question" => "Quelles activités physiques appréciez-vous ?", "answers" => ["Marche", "Yoga", "Autre"]],
    18 => ["maladie_id" => 1, "question" => "Connaissez-vous votre fréquence cardiaque au repos ?", "answers" => ["Oui", "Non"]],
    19 => ["maladie_id" => 1, "question" => "Si oui, veuillez- nous la donner ?", "answers" => [null]],
    20 => ["maladie_id" => 1, "question" => "Mangez-vous souvent par stress ou ennui ?", "answers" => ["Oui", "Non"]],
    21 => ["maladie_id" => 1, "question" => "Avez-vous tendance à finir votre assiette même si vous n'avez plus faim ?", "answers" => ["Oui", "Non"]],
    22 => ["maladie_id" => 1, "question" => "Avez-vous déjà suivi un régime alimentaire particulier ?", "answers" => ["Oui", "Non"]],
    23 => ["maladie_id" => 1, "question" => "Si oui, lequel, et a-t-il été efficace pour vous ? Pourquoi ?", "answers" => [null]],
];

// 3. Build Donnees
$donnees = [];
foreach ($questions as $id => $q) {
    $item = [
        'maladie_id' => $q['maladie_id'],
        'question' => $q['question'],
        'reponses' => []
    ];
    foreach ($q['answers'] as $ans) {
        $ansKey = ($ans === null) ? '' : $ans;
        $lookupR = (strtoupper($ansKey) === 'NON' || $ansKey === 'Aucun de ces médicaments' || $ansKey === 'Jamais' || $ansKey === 'Aucun') ? 'NON' : 'OUI';
        
        $rec = [
            'weight_loss' => [
                'under_5' => ['none' => 'FIXME', 'diabetes' => 'Aucun', 'hypertension' => 'Aucun', 'cardio' => 'Aucun'],
                '5_10' => ['none' => 'FIXME', 'diabetes' => 'Aucun', 'hypertension' => 'Aucun', 'cardio' => 'Aucun'],
                'over_10' => ['none' => 'FIXME', 'diabetes' => 'Aucun', 'hypertension' => 'Aucun', 'cardio' => 'Aucun'],
            ],
            'fitness' => [
                'none' => 'FIXME',
                'diabetes' => 'Conseils adaptés à votre profil.',
                'hypertension' => 'Conseils adaptés à votre profil.',
                'cardio' => 'Conseils adaptés à votre profil.',
            ]
        ];
        
        if (isset($testBlocks[$id][$lookupR])) {
            $rec['fitness']['none'] = $testBlocks[$id][$lookupR];
            $rec['weight_loss']['under_5']['none'] = $testBlocks[$id][$lookupR];
        }
        
        $item['reponses'][$ansKey] = $rec;
    }
    $donnees[] = $item;
}

// 4. Generate PHP
function var_export_pretty($data, $indent = 8) {
    if (!is_array($data)) return '"' . addslashes($data) . '"';
    $isAssoc = array_keys($data) !== range(0, count($data) - 1);
    $lines = ["[\n"];
    foreach ($data as $k => $v) {
        $lines[] = str_repeat(' ', $indent + 4);
        if ($isAssoc) {
            $key = is_string($k) ? "'" . addslashes($k) . "'" : $k;
            $lines[] = $key . " => ";
        }
        $lines[] = var_export_pretty($v, $indent + 4) . ",\n";
    }
    $lines[] = str_repeat(' ', $indent) . "]";
    return implode('', $lines);
}

$donneesExport = var_export_pretty($donnees, 8);

$template = "<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recommendation;
use Illuminate\Support\Facades\DB;

class RecommendationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('recommendations')->truncate();

        \$donnees = $donneesExport;

        foreach (\$donnees as \$item) {
            foreach (\$item['reponses'] as \$reponse => \$objectives) {
                foreach (\$objectives as \$objective => \$weights) {
                    if (\$objective === 'fitness') {
                        foreach (\$weights as \$pathology => \$content) {
                            Recommendation::create([
                                'maladie_chronique_id' => \$item['maladie_id'],
                                'question' => \$item['question'],
                                'reponse' => \$reponse ?: null,
                                'objectif' => \$objective,
                                'weight_loss_range' => 'all',
                                'pathology' => \$pathology,
                                'content' => \$content
                            ]);
                        }
                    } else {
                        foreach (\$weights as \$range => \$pathologies) {
                            foreach (\$pathologies as \$pathology => \$content) {
                                Recommendation::create([
                                    'maladie_chronique_id' => \$item['maladie_id'],
                                    'question' => \$item['question'],
                                    'reponse' => \$reponse ?: null,
                                    'objectif' => \$objective,
                                    'weight_loss_range' => \$range,
                                    'pathology' => \$pathology,
                                    'content' => \$content
                                ]);
                            }
                        }
                    }
                }
            }
        }

        \$this->command->info(\"Seeder de recommandations terminé avec succès !\");
    }
}
";

file_put_contents($outputFile, $template);
echo "Final rebuilding complete.\n";
