<?php
$files = [
    __DIR__ . '/../app/Services/WeightLossOver10DiabetesRecommendationService.php',
    __DIR__ . '/../app/Services/WeightLossOver10HypertensionRecommendationService.php',
    __DIR__ . '/../app/Services/WeightLossOver10CardioRecommendationService.php',
    __DIR__ . '/../app/Services/WeightLossOver10NoPathologyRecommendationService.php',
];

foreach ($files as $file) {
    if (!file_exists($file)) continue;
    
    $content = file_get_contents($file);
    if ($content !== false) {
        $pattern = '/208\s*[\x{2212}\-]\s*\(?0,7\s*[x×*]\s*âge\)?/i';
        $replacement = '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]"';

        if (strpos($content, '208 − 0,7 × âge') !== false) {
            $newContent = str_replace('208 − 0,7 × âge', '208 - (0.7 * âge) [Calculé dynamiquement : " . round(208 - (0.7 * $age)) . " bpm]', $content);
        } elseif (preg_match('/208/', $content)) {
            $newContent = preg_replace('/208\s*(?:−|-)\s*\(?0,7\s*(?:x|×|\*)\s*âge\)?/i', $replacement, $content);
        } else {
            $newContent = $content;
        }
        
        if ($newContent !== null && $newContent !== $content) {
            file_put_contents($file, $newContent);
            echo "Replaced Tanaka formula in " . basename($file) . "\n";
        } elseif ($newContent === null) {
            echo "Error running regex on " . basename($file) . ": " . preg_last_error_msg() . "\n";
        } else {
            echo "No change needed or pattern not matched in " . basename($file) . "\n";
        }
    }
}
