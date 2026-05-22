<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);

$inDouble = false;
$inSingle = false;

foreach ($lines as $i => $line) {
    $lineNum = $i + 1;
    $prevInDouble = $inDouble;
    $prevInSingle = $inSingle;
    
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
    
    if ($inDouble !== $prevInDouble || $inSingle !== $prevInSingle) {
        // Line changed the state.
        // If it changed to TRUE and we are near the end, maybe it's the one.
        if ($lineNum > 12000) echo "Line $lineNum changed state: Double=" . ($inDouble?'T':'F') . " Single=" . ($inSingle?'T':'F') . " | $line\n";
    }
}
