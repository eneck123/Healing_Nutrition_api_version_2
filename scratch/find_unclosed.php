<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);
$level = 0;
$stack = [];
foreach ($lines as $i => $line) {
    $lineNum = $i + 1;
    $s = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $line);
    $s = preg_replace('/\/\/.*|\/\*.*?\*\//s', '', $s);
    for ($j = 0; $j < strlen($s); $j++) {
        if ($s[$j] === '[') {
            $level++;
            $stack[] = $lineNum;
        }
        if ($s[$j] === ']') {
            $level--;
            array_pop($stack);
        }
    }
}
echo "Remaining stack:\n";
print_r($stack);
