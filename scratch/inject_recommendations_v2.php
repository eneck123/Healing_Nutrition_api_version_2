<?php
$seederFile = 'database/seeders/RecommendationSeeder.php';
$testFile = 'test.txt';

$seederContent = file_get_contents($seederFile);
$testContent = file_get_contents($testFile);

// Parse test.txt
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
        if (strpos($resp, 'NON') !== false) $currentResponse = 'NON';
        else $currentResponse = 'OUI';
        $currentText = [];
    } else {
        if ($currentResponse !== null) {
            $currentText[] = $line;
        }
    }
}
if ($currentQuestion !== null && $currentResponse !== null) {
    $testBlocks[$currentQuestion][$currentResponse] = trim(implode("\n", $currentText));
}

$mapping = [
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

$lines = explode("\n", $seederContent);
$newLines = [];
$currentMaladieId = null;
$currentQuestionText = null;
$currentResponseValue = null;
$inFitness = false;

foreach ($lines as $i => $line) {
    if (preg_match('/\'maladie_id\' => (\d+)/', $line, $matches)) {
        $currentMaladieId = (int)$matches[1];
    }
    if (preg_match('/\'question\' => "(.*)"/', $line, $matches)) {
        $currentQuestionText = $matches[1];
    }
    if (preg_match('/\'(Oui|Non|null)\' => \[/', $line, $matches)) {
        $currentResponseValue = $matches[1] === 'null' ? null : strtoupper($matches[1]);
    }
    
    if (strpos($line, "'fitness' => [") !== false) $inFitness = true;
    if (strpos($line, "'weight_loss' => [") !== false) $inFitness = false;
    
    if ($inFitness && strpos($line, '"FIXME"') !== false && $currentMaladieId === 1) {
        $qNum = array_search($currentQuestionText, $mapping);
        if ($qNum === false) {
            // Try fuzzy match
            foreach ($mapping as $num => $text) {
                if (levenshtein($currentQuestionText, $text) < 5) {
                    $qNum = $num;
                    break;
                }
            }
        }
        
        if ($qNum !== false) {
            $lookup = ($currentResponseValue === null) ? 'OUI' : $currentResponseValue;
            $text = $testBlocks[$qNum][$lookup] ?? "FIXME";
            
            if ($text !== "FIXME") {
                $formattedText = addslashes($text);
                $formattedText = str_replace("\n", "\\n", $formattedText);
                $line = str_replace('"FIXME"', '"' . $formattedText . '"', $line);
            }
        }
    }
    $newLines[] = $line;
}

file_put_contents($seederFile, implode("\n", $newLines));
echo "Refined injection complete.\n";
