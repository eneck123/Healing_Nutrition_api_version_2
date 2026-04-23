<?php

$dir = __DIR__ . '/../app/Services/';
$files = glob($dir . '*.php');

foreach ($files as $file) {
    if (basename($file) === 'RecommendationServiceInterface.php' || basename($file) === 'ModerateObesityRecommendationService.php' || basename($file) === 'MenuGenerator.php') {
        continue;
    }

    $content = file_get_contents($file);
    $original = $content;

    // This regex looks for 208, followed by any non-digit character(s) (the minus), 
    // then 0,7 (with comma), then any non-digit character(s) (the times), then âge or age.
    // We use the 'u' flag for UTF-8 and 'i' for case-insensitive.
    // We also handle the case where it might be in parentheses.
    
    $pattern = '/208\s*[^\d\s]+\s*0,7\s*[^\d\s]+\s*â?ge/ui';
    $replacement = '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]';
    
    $content = preg_replace($pattern, $replacement, $content);

    if ($content !== $original && $content !== null) {
        file_put_contents($file, $content);
        echo "Successfully applied Tanaka to " . basename($file) . "\n";
    } elseif ($content === null) {
        echo "Regex error on " . basename($file) . ": " . preg_last_error_msg() . "\n";
    }
}
