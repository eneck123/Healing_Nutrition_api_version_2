<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

$inDouble = false;
$inSingle = false;
$lines = explode("\n", $content);

foreach ($lines as $i => $line) {
    $lineNum = $i + 1;
    for ($j = 0; $j < strlen($line); $j++) {
        $char = $line[$j];
        if ($char === '"' && !$inSingle) {
            if ($j > 0 && $line[$j-1] === '\\') {
                // Escaped
            } else {
                $inDouble = !$inDouble;
            }
        } elseif ($char === "'" && !$inDouble) {
            if ($j > 0 && $line[$j-1] === '\\') {
                // Escaped
            } else {
                $inSingle = !$inSingle;
            }
        }
    }
    
    if ($inDouble && $lineNum > 1000) { // Just skip the beginning
        // Wait, I want the FIRST line where it stays TRUE.
    }
}
