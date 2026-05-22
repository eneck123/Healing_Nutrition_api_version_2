<?php
// Master Rebuilder for RecommendationSeeder.php

$questionsSeeder = 'database/seeders/QuestionsSeeder.php';
$testTxt = 'test.txt';
$outputFile = 'database/seeders/RecommendationSeeder.php';

// 1. Extract Questions from QuestionsSeeder.php
$qsContent = file_get_contents($questionsSeeder);
preg_match('/\$defs\s*=\s*\[(.*?)\];\s*\/\/\s*---\s*PASSE 1/s', $qsContent, $matches);
$defsRaw = "[" . $matches[1] . "]";
$defs = eval("return $defsRaw;");

// 2. Extract Content from test.txt
$testContent = file_get_contents($testTxt);
$testBlocks = [];
$currentQ = null;
$currentR = null;
$currentLines = [];
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
        if ($currentR) $currentLines[] = $line;
    }
}
if ($currentQ && $currentR) $testBlocks[$currentQ][$currentR] = trim(implode("\n", $currentLines));

// 3. Build the large data structure
$donnees = [];
$qIndexMod = 1;
$qIndexSev = 1;

foreach ($defs as $key => $def) {
    $mid = $def['maladie_chronique_id'];
    $qText = $def['texte_question'];
    $answers = $def['possible_answers'] ?? [null];
    
    $item = [
        'maladie_id' => $mid,
        'question' => $qText,
        'reponses' => []
    ];
    
    foreach ($answers as $ans) {
        $ansKey = ($ans === null) ? '' : $ans;
        $lookupR = (strtoupper($ansKey) === 'NON' || $ansKey === 'Aucun de ces médicaments' || strpos($ansKey, 'Jamais') !== false) ? 'NON' : 'OUI';
        
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
        
        // Inject from test.txt for ID 1
        if ($mid === 1) {
            $qNum = $qIndexMod;
            if (isset($testBlocks[$qNum][$lookupR])) {
                $content = $testBlocks[$qNum][$lookupR];
                $rec['fitness']['none'] = $content;
                $rec['weight_loss']['under_5']['none'] = $content;
            }
        }
        
        $item['reponses'][$ansKey] = $rec;
    }
    
    if ($mid === 1) $qIndexMod++; else $qIndexSev++;
    $donnees[] = $item;
}

// 4. Manual overrides for specific pathology advice (extracted from previous work)
// Question 1 Modérée (id 21 in seeder? No, first in $donnees)
$donnees[0]['reponses']['Oui']['fitness']['diabetes'] = "Adaptations nutritionnelles :\n•	Réduire drastiquement le sel : maximum 5g/jour\n•	Éviter les cubes Maggi, sel d'assaisonnement\n•	Privilégier les épices naturales : gingembre, ail, piment, oignon, citronnelle\n•	Limiter les aliments transformés";
$donnees[0]['reponses']['Oui']['fitness']['hypertension'] = "Adaptation du guide :\n•	Priorité absolue : Réduction du sodium (< 2000 mg/jour)\n•	Éliminer : Sel de table, bouillons cube, Maggi, poissons très fumés/salés excessivement\n•	Privilégier : Épices naturales (gingembre, ail, piment, poivre, oignon), citron, aromates locaux\nConseils ciblés :\n1.	Potassium : Consommer quotidiennement banane plantain, haricots, épinards, gombo (effet protecteur cardiovasculaire)\n2.	Magnésium : Privilégier arachides nature, noix de cajou, fonio, épinards\n3.	Oméga-3 : Poisson frais 3-4×/semaine (maquereau frais, sardines fraîches, carpe)\n4.	Cuisson : Grillé, bouilli, vapeur - ÉVITER fritures\n5.	Hydratation : 2-2,5L eau/jour, tisanes (citronnelle, gingembre), bissap nature";

// 5. Generate PHP
function formatArray($data, $indent = 8) {
    if (!is_array($data)) return '"' . addslashes($data) . '"';
    $isAssoc = array_keys($data) !== range(0, count($data) - 1);
    $lines = ["[\n"];
    foreach ($data as $k => $v) {
        $lines[] = str_repeat(' ', $indent + 4);
        if ($isAssoc) {
            $key = is_string($k) ? "'" . addslashes($k) . "'" : $k;
            $lines[] = $key . " => ";
        }
        $lines[] = formatArray($v, $indent + 4) . ",\n";
    }
    $lines[] = str_repeat(' ', $indent) . "]";
    return implode('', $lines);
}

$donneesExport = formatArray($donnees, 8);

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
echo "Rebuilding complete.\n";
