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

    // Pattern for Weight Loss files
    // Looking for: 208 − 0,7 × âge (using various space/dash characters)
    $pattern = '/208\s*[−\-]\s*\(?0,7\s*[x×*]\s*âge\)?/ui';
    $replacement = '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]';
    
    $content = preg_replace($pattern, $replacement, $content);

    // Specifically for Fitness files which often have "FCmax ≈ 208 − 0,7 × âge" or "(208 − 0,7 × âge)"
    // The previous regex should catch it, but let's be sure.
    
    if ($content !== $originalContent) {
        file_put_contents($file, $content);
        echo "Applied Tanaka to " . basename($file) . "\n";
    }
}
