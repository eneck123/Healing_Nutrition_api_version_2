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

    // We want to arrive at:
    // ... round(208 - (0.7 * $age)) . " bpm] dont l’unité est le bpm ...
    // or
    // ... round(208 - (0.7 * $age)) . " bpm (calculée pour votre âge) ...
    
    // The current mess might have stray quotes, dots, or even single quotes from my previous bad fix.
    
    // Pattern to look for: the round(208 - (0.7 * $age)) part, followed by some garbage, then 'dont' or '\n'
    
    // Fix: Replace everything from " . round until we see bpm] or âge) followed by any quotes/dots
    // with a clean concatenation.
    
    $content = preg_replace(
        '/ \. " bpm\]["\'. ]*(dont l)/u', 
        ' . " bpm] $1', 
        $content
    );

    $content = preg_replace(
        '/ \. " bpm\]["\'. ]*(dont l)/', 
        ' . " bpm] $1', 
        $content
    );

    $content = preg_replace(
        '/ \. " bpm \(calculée pour votre âge\)["\'. ]+(\\n|•)/', 
        ' . " bpm (calculée pour votre âge)$1', 
        $content
    );

    // Let's do a more radical sweep if those fail.
    // Replace " . round(...) . " bpm]XXXX"  with  " . round(...) . " bpm] "
    $content = preg_replace(
        '/(\. round\(208 - \(0\.7 \* \$age\)\) \. " bpm\])[^"]*" /', 
        '$1 ', 
        $content
    );
    
    $content = preg_replace(
        '/(\. round\(208 - \(0\.7 \* \$age\)\) \. " bpm \(calculée pour votre âge\))[^"]*"/', 
        '$1', 
        $content
    );

    if ($content !== $originalContent) {
        file_put_contents($file, $content);
        echo "Radically fixed syntax in " . basename($file) . "\n";
    }
}
