<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

$inDouble = false;
$inSingle = false;
$currentLine = 1;

for ($i = 0; $i < strlen($content); $i++) {
    $char = $content[$i];
    if ($char === "\n") $currentLine++;
    
    if ($char === '"' && !$inSingle) {
        if ($i > 0 && $content[$i-1] === '\\') {
            // Escaped
        } else {
            $inDouble = !$inDouble;
            // echo "Line $currentLine: Double quote " . ($inDouble ? "OPENED" : "CLOSED") . "\n";
        }
    } elseif ($char === "'" && !$inDouble) {
        if ($i > 0 && $content[$i-1] === '\\') {
            // Escaped
        } else {
            $inSingle = !$inSingle;
        }
    }
}

if ($inDouble) echo "Double quote is STILL OPEN at end of file!\n";
if ($inSingle) echo "Single quote is STILL OPEN at end of file!\n";
