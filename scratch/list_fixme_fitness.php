<?php
$seederFile = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($seederFile);
$lines = explode("\n", $content);

$currentMaladieId = 0;
$currentQuestion = "";
$inFitness = false;

foreach ($lines as $line) {
    if (preg_match('/\'maladie_id\' => (\d+)/', $line, $matches)) $currentMaladieId = (int)$matches[1];
    if (preg_match('/\'question\' => "(.*)"/', $line, $matches)) $currentQuestion = $matches[1];
    if (strpos($line, "'fitness' => [") !== false) $inFitness = true;
    if (strpos($line, "'weight_loss' => [") !== false) $inFitness = false;
    
    if ($inFitness && strpos($line, "'none' => \"FIXME\"") !== false && $currentMaladieId === 1) {
        echo "$currentQuestion\n";
    }
}
