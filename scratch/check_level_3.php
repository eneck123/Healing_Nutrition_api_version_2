<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);
$level = 0;
foreach ($lines as $i => $line) {
    $lineNum = $i + 1;
    $s = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $line);
    $s = preg_replace('/\/\/.*|\/\*.*?\*\//s', '', $s);
    
    $oldLevel = $level;
    for ($j = 0; $j < strlen($s); $j++) {
        if ($s[$j] === '[') $level++;
        if ($s[$j] === ']') $level--;
    }
    
    // An item usually starts at level 2 and ends at level 2.
    // If an item ends at level > 2, it's a problem.
    if (trim($line) === '],' && $level > 2 && $oldLevel > $level) {
        // This might be an item ending but not returning to level 2.
    }
    
    if ($level < 0) echo "Level < 0 at $lineNum\n";
}
echo "Final level: $level\n";
