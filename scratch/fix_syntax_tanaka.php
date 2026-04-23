<?php

$dir = __DIR__ . '/../app/Services/';
$files = glob($dir . '*.php');

foreach ($files as $file) {
    if (basename($file) === 'RecommendationServiceInterface.php' || basename($file) === 'ModerateObesityRecommendationService.php' || basename($file) === 'MenuGenerator.php') {
        continue;
    }

    $content = file_get_contents($file);
    if ($content === false) continue;

    $originalContent = $content;

    // Fix the Tanaka formula error: " . round(...) . " bpm]"
    // We want to remove the quote before the trailing character if it's splitting the string prematurely.
    // Actually, let's just find the exact patterns I injected.
    
    // Pattern 1: [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]"
    // Becomes: [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]
    $content = str_replace(' . " bpm]"', ' . " bpm]" . "', $content); // This is also complex due to concatenation.
    
    // Simpler: Just remove the isolated quote that follows the dynamic part.
    // If we have "... " . round(...) . " bpm]" TEXT ...
    // It should be "... " . round(...) . " bpm] TEXT ...
    
    $content = preg_replace('/(\. round\(208 - \(0\.7 \* \$age\)\) \. " bpm\])"/', '$1', $content);
    
    // Wait, the user snippet shows:
    // " . round(208 - (0.7 * $age)) . " bpm]" dont l’unité...
    // The " after bpm] is the killer.
    
    $content = str_replace(' . " bpm]"', ' . " bpm]', $content);
    $content = str_replace(' (calculée pour votre âge)"', ' (calculée pour votre âge)', $content);

    if ($content !== $originalContent) {
        file_put_contents($file, $content);
        echo "Fixed syntax errors in " . basename($file) . "\n";
    }
}
