<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

// Strip multi-line strings correctly
$content = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $content);
$content = preg_replace('/\/\/.*|\/\*.*?\*\//s', '', $content);

$level = 0;
$stack = [];
for ($i = 0; $i < strlen($content); $i++) {
    if ($content[$i] === '[') {
        $level++;
        // Find line number
        $lineNum = substr_count(substr($content, 0, $i), "\n") + 1;
        $stack[] = $lineNum;
    }
    if ($content[$i] === ']') {
        $level--;
        if (empty($stack)) {
            $lineNum = substr_count(substr($content, 0, $i), "\n") + 1;
            echo "Unexpected ] at line $lineNum\n";
        } else {
            array_pop($stack);
        }
    }
}

foreach ($stack as $line) {
    echo "Unclosed [ at line $line\n";
}
