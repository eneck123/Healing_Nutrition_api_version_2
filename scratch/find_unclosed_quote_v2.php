<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

$inDouble = false;
$inSingle = false;
$lastDoubleLine = 0;
$lastSingleLine = 0;
$currentLine = 1;

for ($i = 0; $i < strlen($content); $i++) {
    $char = $content[$i];
    if ($char === "\n") $currentLine++;
    
    if ($char === '"' && !$inSingle) {
        if ($i > 0 && $content[$i-1] === '\\') {
            // Escaped
        } else {
            $inDouble = !$inDouble;
            if ($inDouble) $lastDoubleLine = $currentLine;
        }
    } elseif ($char === "'" && !$inDouble) {
        if ($i > 0 && $content[$i-1] === '\\') {
            // Escaped
        } else {
            $inSingle = !$inSingle;
            if ($inSingle) $lastSingleLine = $currentLine;
        }
    }
}

if ($inDouble) echo "Double quote opened at line $lastDoubleLine is unclosed!\n";
if ($inSingle) echo "Single quote opened at line $lastSingleLine is unclosed!\n";
