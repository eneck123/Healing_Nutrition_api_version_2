<?php

$dir = __DIR__ . '/../app/Services/';
$files = glob($dir . '*.php');

foreach ($files as $file) {
    if (basename($file) === 'RecommendationServiceInterface.php' || basename($file) === 'ModerateObesityRecommendationService.php' || basename($file) === 'MenuGenerator.php') {
        continue;
    }

    $content = file_get_contents($file);
    $original = $content;

    // Byte-safe regex (removed 'u' flag)
    $pattern = '/208\s*.[^0-9\s]*\s*0,7\s*.[^a-z\s]*\s*â?ge/i';
    // Actually, let's just use something even simpler:
    // Match 208, then some non-digit stuff, then 0,7, then some non-digit stuff, then age/âge/ǽge
    $pattern = '/208[^0-9]*0,7[^0-9]*[a-z??]+/i';
    
    // Better: Match 208, followed by anything that isn't 0,7, then 0,7, then anything that isn't age
    $pattern = '/208.*?0,7.*?â?ge/i';
    // Let's check for the characters typically appearing in the file (like ǽge)
    $pattern = '/208.*?0,7.*?[ǽâa]ge/i';

    $replacement = '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]';
    
    $content = preg_replace($pattern, $replacement, $content);

    if ($content !== $original && $content !== null) {
        file_put_contents($file, $content);
        echo "Successfully applied Tanaka to " . basename($file) . "\n";
    } elseif ($content === null) {
        echo "Regex error on " . basename($file) . ": " . preg_last_error_msg() . "\n";
    }
}
echo "Done.\n";
