<?php
$files = [
    __DIR__ . '/../app/Services/FitnessHypertensionRecommendationService.php',
    __DIR__ . '/../app/Services/FitnessCardioRecommendationService.php',
];

foreach ($files as $file) {
    $content = file_get_contents($file);
    if ($content !== false) {
        $pattern = '/(FCmax : Formule de Tanaka : FCmax ≈ )208[^\\n]*âge/';
        $replacement = '$1" . round(208 - (0.7 * $age)) . " bpm (calculée pour votre âge)"';
        
        $newContent = preg_replace($pattern, $replacement, $content);
        
        if ($newContent !== $content) {
            file_put_contents($file, $newContent);
            echo "Replaced Tanaka formula in " . basename($file) . "\n";
        } else {
            echo "No change needed or pattern not matched in " . basename($file) . "\n";
        }
    }
}
