<?php
$seederFile = 'database/seeders/RecommendationSeeder.php';
$testFile = 'test.txt';

$seederContent = file_get_contents($seederFile);
$testContent = file_get_contents($testFile);

// Parse test.txt into an array of [question_num => [response_value => recommendation_text]]
$testBlocks = [];
$currentQuestion = null;
$currentResponse = null;
$currentText = [];

$lines = explode("\n", $testContent);
foreach ($lines as $line) {
    if (preg_match('/QUESTION (\d+)/i', $line, $matches)) {
        // Save previous block
        if ($currentQuestion !== null && $currentResponse !== null) {
            $testBlocks[$currentQuestion][$currentResponse] = trim(implode("\n", $currentText));
        }
        $currentQuestion = (int)$matches[1];
        $currentResponse = null;
        $currentText = [];
    } elseif (preg_match('/RÉPONSE\s*:\s*(OUI|NON)/i', $line, $matches)) {
        // Save previous response
        if ($currentQuestion !== null && $currentResponse !== null) {
            $testBlocks[$currentQuestion][$currentResponse] = trim(implode("\n", $currentText));
        }
        $currentResponse = strtoupper($matches[1]);
        $currentText = [];
    } else {
        if ($currentResponse !== null) {
            $currentText[] = $line;
        }
    }
}
// Save last block
if ($currentQuestion !== null && $currentResponse !== null) {
    $testBlocks[$currentQuestion][$currentResponse] = trim(implode("\n", $currentText));
}

// Map seeder questions to test.txt question numbers
// (Based on looking at the seeder and test.txt)
$mapping = [
    3 => "Prenez-vous des médicaments liés à votre antécédent ?",
    4 => "Si oui, lesquels ?",
    5 => "Prenez-vous l'un des types de médicaments suivants ?",
    6 => "Pouvez-vous décrire une journée typique de vos repas et collations ?",
    7 => "Combien de portions de fruits et légumes consommez-vous par jour ?",
    8 => "Grignotez-vous entre les repas ?",
    9 => "Si oui, quels aliments consommez-vous ?",
    10 => "À quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?",
    11 => "Combien d'heures de sommeil avez-vous par nuit ?",
    12 => "Avez-vous l'apnée du sommeil ?",
    13 => "Avez-vous récemment fait un régime de perte de poids ?",
    14 => "Si oui, combien de poids avez-vous perdu ?",
    15 => "Combien de jours par semaine pratiquez-vous une activité physique ?",
    16 => "Combien de temps passez-vous en position assise chaque jour ?",
    17 => "Quelles activités physiques appréciez-vous ?",
];

// Reconstruct the seeder content by replacing FIXME
// We only target maladie_id => 1 and fitness => none
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
    if (preg_match('/\'reponses\' => \[/', $line)) {
        // We will detect responses in next lines
    }
    if (preg_match('/\'(Oui|Non|null)\' => \[/', $line, $matches)) {
        $currentResponseValue = $matches[1] === 'null' ? null : strtoupper($matches[1]);
    }
    
    if (strpos($line, "'fitness' => [") !== false) {
        $inFitness = true;
    }
    
    if ($inFitness && strpos($line, "'none' => \"FIXME\"") !== false && $currentMaladieId === 1) {
        // Find the question number from mapping
        $qNum = array_search($currentQuestionText, $mapping);
        if ($qNum !== false) {
            // Check if we have OUI/NON/null in testBlocks
            $lookup = $currentResponseValue;
            if ($lookup === null) {
                // For null responses (unique response), check if test.txt has only one block or if we should use OUI
                $text = $testBlocks[$qNum]['OUI'] ?? $testBlocks[$qNum]['NON'] ?? "FIXME";
            } else {
                $text = $testBlocks[$qNum][$lookup] ?? "FIXME";
            }
            
            if ($text !== "FIXME") {
                // Format text for PHP string
                $formattedText = addslashes($text);
                $formattedText = str_replace("\n", "\\n", $formattedText);
                $line = str_replace('"FIXME"', '"' . $formattedText . '"', $line);
            }
        }
    }
    
    if (trim($line) === ']' || trim($line) === '],') {
        // This is a bit risky but we track nesting loosely
    }
    
    // Close fitness block detection
    if ($inFitness && (trim($line) === ']' || trim($line) === '],') && strpos($lines[$i-1], "'cardio'") !== false) {
        // This is an approximation
    }
    // Actually, let's just reset inFitness when we see a bracket at a specific level
    // But our force_balance script already made it clean.
    
    // Simple reset: if we see another pathology or another objective
    if (strpos($line, "'weight_loss' => [") !== false) $inFitness = false;
    
    $newLines[] = $line;
}

file_put_contents($seederFile, implode("\n", $newLines));
echo "Successfully injected recommendations from test.txt into seeder.\n";
