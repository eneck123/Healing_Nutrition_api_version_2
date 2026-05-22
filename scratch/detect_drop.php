<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

// Strip strings and comments
$content = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $content);
$content = preg_replace('/\/\/.*|\/\*.*?\*\//s', '', $content);

$level = 0;
$lines = explode("\n", $content);
foreach ($lines as $i => $line) {
    for ($j = 0; $j < strlen($line); $j++) {
        if ($line[$j] === '[') $level++;
        if ($line[$j] === ']') $level--;
        
        if ($level < 2 && ($i + 1) > 15 && ($i + 1) < 12060) {
            echo "Level dropped to $level at line " . ($i + 1) . "\n";
            // Print surrounding lines
            for ($k = $i - 2; $k <= $i + 2; $k++) {
                echo ($k + 1) . ": " . ($lines[$k] ?? '') . "\n";
            }
            exit;
        }
    }
}
