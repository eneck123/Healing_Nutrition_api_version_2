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

    // Pattern for Weight Loss: "... " . round(...) . " bpm]" dont l'unité ..."
    // The " after bpm] is wrong.
    // We want to replace ' . " bpm]" ' with ' . " bpm] ' (removing the middle quote)
    
    // Pattern found in files: " . round(208 - (0.7 * $age)) . " bpm]"
    // Notice the trailing space after bpm] in some cases, or no space.
    
    // Fix the weight loss ones
    $content = str_replace(' . " bpm]"', ' . " bpm]', $content); 
    // Wait, I see what I did. I put a single quote at the end of the string in PHP code.
    // Let's use a clear approach.
    
    $content = preg_replace('/(\. round\(208 - \(0\.7 \* \$age\)\) \. " bpm\])"/', '$1', $content); // No change
    
    // Correct Fix for Weight Loss:
    // Current: ... " . round(...) . " bpm]" dont ...
    // Target: ... " . round(...) . " bpm] dont ...
    $content = preg_replace('/(\. round\(208 - \(0\.7 \* \$age\)\) \. " bpm\])"/', '. " bpm]', $content);
    // Actually, simply:
    $content = str_replace(' . " bpm]"', ' . " bpm]', $content);
    // Oh, I see. If I use str_replace('A', 'B', $content), and A is ' . " bpm]"'
    // then B should be ' . " bpm]'? No, no, no.
    
    // Let's use double quotes for the strings to avoid confusion.
    $bad1 = ' . " bpm]"';
    $good1 = ' . " bpm] "'; // No, that adds a space.
    
    // I want to replace the SUBSTRING:  . " bpm]" 
    // with the SUBSTRING:  . " bpm] 
    
    // Let's use a VERY specific replacement.
    $content = str_replace('" . round(208 - (0.7 * $age)) . " bpm]"', '" . round(208 - (0.7 * $age)) . " bpm]', $content);
    $content = str_replace('" . round(208 - (0.7 * $age)) . " bpm (calculée pour votre âge)"', '" . round(208 - (0.7 * $age)) . " bpm (calculée pour votre âge)', $content);

    if ($content !== $originalContent) {
        file_put_contents($file, $content);
        echo "Cleanly fixed syntax in " . basename($file) . "\n";
    }
}
