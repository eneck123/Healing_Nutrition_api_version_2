<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);

$inDouble = false;
$inSingle = false;

foreach ($lines as $i => $line) {
    $lineNum = $i + 1;
    
    // Strip comments
    $s = preg_replace('/\/\/.*|\/\*.*?\*\//', '', $line);
    
    for ($j = 0; $j < strlen($s); $j++) {
        $char = $s[$j];
        if ($char === '"' && !$inSingle) {
            if ($j > 0 && $s[$j-1] === '\\') {
                // Escaped
            } else {
                $inDouble = !$inDouble;
            }
        } elseif ($char === "'" && !$inDouble) {
            if ($j > 0 && $s[$j-1] === '\\') {
                // Escaped
            } else {
                $inSingle = !$inSingle;
            }
        }
    }
    
    if ($inDouble || $inSingle) {
        // If we are still in a string at the end of the line, it might be a multi-line string.
    }
}

if ($inDouble) echo "Double quote is STILL OPEN at end of file!\n";
if ($inSingle) echo "Single quote is STILL OPEN at end of file!\n";
