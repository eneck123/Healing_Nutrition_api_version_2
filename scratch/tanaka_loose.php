<?php

$dir = __DIR__ . '/../app/Services/';
$files = glob($dir . '*.php');

foreach ($files as $file) {
    if (basename($file) === 'RecommendationServiceInterface.php' || basename($file) === 'ModerateObesityRecommendationService.php' || basename($file) === 'MenuGenerator.php') {
        continue;
    }

    $content = file_get_contents($file);
    if ($content === false) continue;
    
    $original = $content;

    // Loose pattern: 208, then ANY 1-15 characters, then 0,7, then ANY 1-15 characters, then 'ge' (end of âge)
    // We use /s flag so . matches newlines, though it shouldn't be needed.
    // We do NOT use /u here to avoid malformed UTF-8 errors.
    $pattern = '/208.{1,15}0,7.{1,15}ge/i';
    
    $replacement = '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]';
    
    $content = preg_replace($pattern, $replacement, $content);

    if ($content !== $original && $content !== null) {
        file_put_contents($file, $content);
        echo "Applied to " . basename($file) . "\n";
    }
}
echo "Done.\n";
