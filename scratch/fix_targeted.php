<?php

$files = [
    'app/Services/FitnessHypertensionRecommendationService.php',
    'app/Services/FitnessDiabetesRecommendationService.php',
    'app/Services/FitnessCardioRecommendationService.php',
    'app/Services/WeightLoss5to10DiabetesRecommendationService.php',
    'app/Services/WeightLoss5to10HypertensionRecommendationService.php',
    'app/Services/WeightLossOver10DiabetesRecommendationService.php',
    'app/Services/WeightLossOver10HypertensionRecommendationService.php',
    'app/Services/WeightLossUnder5HypertensionRecommendationService.php',
    'app/Services/WeightLossUnder5DiabetesRecommendationService.php',
];

foreach ($files as $relPath) {
    $file = __DIR__ . '/../' . $relPath;
    if (!file_exists($file)) continue;

    $content = file_get_contents($file);
    
    // Fix pattern 1: " . round(...) . " bpm (calculée pour votre âge)"\n
    $content = str_replace(
        ' . " bpm (calculée pour votre âge)"\n', 
        ' . " bpm (calculée pour votre âge)\n', 
        $content
    );

    // Fix pattern 2: " . round(...) . " bpm]"\n
    $content = str_replace(
        ' . " bpm]"\n', 
        ' . " bpm]\n', 
        $content
    );

    // Fix pattern 3: " . round(...) . " bpm]" dont
    $content = str_replace(
        ' . " bpm]" dont', 
        ' . " bpm] dont', 
        $content
    );

    file_put_contents($file, $content);
    echo "Fixed $relPath\n";
}
