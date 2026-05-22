<?php
$seederFile = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($seederFile);

// Extract $donnees = [ ... ];
preg_match('/\$donnees\s*=\s*\[(.*?)\];\s*\/\/ LOGIQUE/s', $content, $matches);
if (empty($matches)) die("Could not find \$donnees array");

$donneesRaw = "[" . $matches[1] . "]";

// Load the array
$donnees = eval("return $donneesRaw;");
if ($donnees === false) die("Error evaluating \$donnees");

// Load test.txt
$testContent = file_get_contents('test.txt');
$testBlocks = [];
$currentQuestion = null;
$currentResponse = null;
$currentText = [];

$lines = explode("\n", $testContent);
foreach ($lines as $line) {
    if (preg_match('/QUESTION (\d+)/i', $line, $matches)) {
        if ($currentQuestion !== null && $currentResponse !== null) {
            $testBlocks[$currentQuestion][$currentResponse] = trim(implode("\n", $currentText));
        }
        $currentQuestion = (int)$matches[1];
        $currentResponse = null;
        $currentText = [];
    } elseif (preg_match('/RÉPONSE\s*:\s*(OUI|NON|NON \(Pas de médicaments\)|NON \(Jamais suivi régime particulier\))/i', $line, $matches)) {
        if ($currentQuestion !== null && $currentResponse !== null) {
            $testBlocks[$currentQuestion][$currentResponse] = trim(implode("\n", $currentText));
        }
        $resp = strtoupper($matches[1]);
        $currentResponse = (strpos($resp, 'NON') !== false) ? 'NON' : 'OUI';
        $currentText = [];
    } else {
        if ($currentResponse !== null) $currentText[] = $line;
    }
}
if ($currentQuestion !== null && $currentResponse !== null) {
    $testBlocks[$currentQuestion][$currentResponse] = trim(implode("\n", $currentText));
}

$mapping = [
    1 => "Avez-vous des antécédents de diabète de type 2, d'hypertension artérielle ou de maladies cardiovasculaires ?",
    2 => "Si oui, lequel ?",
    3 => "Prenez-vous actuellement des médicaments qui sont liés à votre antécédent précédent ?",
    4 => "Si oui, lesquels ?",
    5 => "Prenez-vous actuellement l'un des types de médicaments suivants ?",
    6 => "Pouvez-vous décrire une journée typique de vos repas et collations ?",
    7 => "Combien de portions de fruits et légumes consommez-vous par jour ?",
    8 => "Grignotez-vous entre les repas ?",
    9 => "Si oui, quels aliments consommez-vous ?",
    10 => "A quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?",
    11 => "Combien d'heures de sommeil avez-vous par nuit ?",
    12 => "Avez-vous l'apnée du sommeil ?",
    13 => "Avez-vous récemment fait un régime de perte du poids ?",
    14 => "Si oui, combien de poids avez-vous perdu ?",
    15 => "Combien de jours par semaine pratiquez-vous une activité physique ?",
    16 => "Combien de temps passez-vous en position assise chaque jour ?",
    17 => "Quelles activités physiques appréciez-vous ?",
    18 => "Connaissez-vous votre fréquence cardiaque au repos ?",
    19 => "Si oui, veuillez- nous la donner ?",
    20 => "Mangez-vous souvent par stress ou ennui ?",
    21 => "Avez-vous tendance à finir votre assiette même si vous n'avez plus faim ?",
    22 => "Avez-vous déjà suivi un régime alimentaire particulier ?",
    23 => "Si oui, lequel, et a-t-il été efficace pour vous ? Pourquoi ?",
];

// Perform replacements
foreach ($donnees as &$item) {
    if ($item['maladie_id'] !== 1) continue;
    
    $qNum = array_search($item['question'], $mapping);
    if ($qNum === false) {
        foreach ($mapping as $num => $text) {
            if (levenshtein($item['question'], $text) < 10) {
                $qNum = $num;
                break;
            }
        }
    }
    
    if ($qNum === false) continue;
    
    foreach ($item['reponses'] as $respValue => &$data) {
        if (!is_array($data) || !isset($data['fitness'])) continue;
        
        if ($data['fitness']['none'] === 'FIXME') {
            $lookup = (strtoupper($respValue) === 'NON') ? 'NON' : 'OUI';
            if (isset($testBlocks[$qNum][$lookup])) {
                $data['fitness']['none'] = $testBlocks[$qNum][$lookup];
            }
        }
    }
}

// Re-generate the PHP array string
function var_export_pretty($data) {
    $export = var_export($data, true);
    $export = preg_replace("/^([ ]*)(.*)/m", '$1$1$2', $export);
    $array = preg_replace("/\d+ => /", "", $export);
    $array = str_replace("array (", "[", $array);
    $array = str_replace("),", "],", $array);
    $array = str_replace(")", "]", $array);
    return $array;
}

$newDonneesRaw = var_export_pretty($donnees);

// Reassemble the file
$newContent = substr($content, 0, $startPos + strlen('$donnees = ')) . $newDonneesRaw . ";\n\n        // LOGIQUE" . substr($content, $endPos);
// Wait, startPos and endPos were from previous scripts.
// I'll just use preg_replace.

$newFileContent = preg_replace('/\$donnees\s*=\s*\[.*?\];\s*\/\/ LOGIQUE/s', '$donnees = ' . $newDonneesRaw . ";\n\n        // LOGIQUE", $content);

file_put_contents($seederFile, $newFileContent);
echo "Comprehensive injection complete.\n";
