<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

$inDouble = false;
$lastQuoteLine = 0;
$lines = explode("\n", $content);
$currentLine = 1;

for ($i = 0; $i < strlen($content); $i++) {
    $char = $content[$i];
    if ($char === "\n") $currentLine++;
    
    if ($char === '"') {
        if ($i > 0 && $content[$i-1] === '\\') {
            // Escaped
        } else {
            $inDouble = !$inDouble;
            if ($inDouble) $lastQuoteLine = $currentLine;
        }
    }
}

if ($inDouble) {
    echo "Double quote opened at line $lastQuoteLine is NEVER closed!\n";
}
