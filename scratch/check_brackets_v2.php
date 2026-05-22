<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

// Strip strings and comments
$content = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $content);
$content = preg_replace('/\/\/.*|\/\*.*?\*\//s', '', $content);

$stack = [];
$lines = explode("\n", $content);
foreach ($lines as $i => $line) {
    for ($j = 0; $j < strlen($line); $j++) {
        if ($line[$j] === '[') $stack[] = $i + 1;
        if ($line[$j] === ']') {
            if (empty($stack)) {
                echo "Unexpected ] at line " . ($i + 1) . "\n";
            } else {
                array_pop($stack);
            }
        }
    }
}

foreach ($stack as $line) {
    echo "Unclosed [ at line $line\n";
}
