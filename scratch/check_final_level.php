<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);
$level = 0;
foreach ($lines as $i => $line) {
    $lineNum = $i + 1;
    $s = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $line);
    $s = preg_replace('/\/\/.*|\/\*.*?\*\//s', '', $s);
    for ($j = 0; $j < strlen($s); $j++) {
        if ($s[$j] === '[') $level++;
        if ($s[$j] === ']') $level--;
    }
}
echo "Final level: $level\n";
