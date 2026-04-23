<?php

$dir = __DIR__ . '/../app/Services/';
$files = glob($dir . '*.php');

$replacements = [
    '208 − 0,7 × âge' => '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]',
    '208 − 0,7 × age' => '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]',
    '208 − (0,7 × âge)' => '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]',
    '208 − (0,7 × age)' => '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]',
    '208 − (0,7× âge)' => '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]',
    '208 - 0,7 * âge' => '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]',
];

foreach ($files as $file) {
    if (basename($file) === 'RecommendationServiceInterface.php' || basename($file) === 'ModerateObesityRecommendationService.php' || basename($file) === 'MenuGenerator.php') {
        continue;
    }

    $content = file_get_contents($file);
    $original = $content;

    foreach ($replacements as $search => $replace) {
        $content = str_replace($search, $replace, $content);
    }

    if ($content !== $original) {
        file_put_contents($file, $content);
        echo "Applied Tanaka to " . basename($file) . "\n";
    }
}
