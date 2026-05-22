<?php
$seederFile = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($seederFile);
$lines = explode("\n", $content);

$count = 0;
$currentMaladieId = 0;
$inFitness = false;

foreach ($lines as $line) {
    if (preg_match('/\'maladie_id\' => (\d+)/', $line, $matches)) $currentMaladieId = (int)$matches[1];
    if (strpos($line, "'fitness' => [") !== false) $inFitness = true;
    if (strpos($line, "'weight_loss' => [") !== false) $inFitness = false;
    
    if ($inFitness && strpos($line, "'none' =>") !== false && $currentMaladieId === 1) {
        $count++;
    }
}
echo "Total fitness + none + ID 1 cases: $count\n";
