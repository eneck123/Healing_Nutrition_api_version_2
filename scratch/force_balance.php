<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);

$newLines = [];
$level = 0;
$inDonnees = false;

foreach ($lines as $i => $line) {
    $lineNum = $i + 1;
    
    if (strpos($line, '$donnees = [') !== false) {
        $inDonnees = true;
        $level = 2; // run() is 1, $donnees is 2
        $newLines[] = $line;
        continue;
    }
    
    if (strpos($line, '];') !== false && $inDonnees) {
        // Close $donnees
        while ($level > 2) {
            $newLines[] = str_repeat("    ", $level) . "]";
            $level--;
        }
        $newLines[] = "    ];";
        $inDonnees = false;
        $level = 1;
        continue;
    }
    
    if ($inDonnees) {
        if (preg_match('/^\s*\[\s*\'maladie_id\'/', $line)) {
            // New item should start at level 2
            while ($level > 2) {
                $newLines[] = str_repeat("    ", $level) . "]";
                $level--;
            }
            // item starts with [ so level becomes 3
            $level = 3;
            $newLines[] = $line;
        } else {
            $newLines[] = $line;
            // Update level
            $s = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $line);
            $s = preg_replace('/\/\/.*|\/\*.*?\*\//s', '', $s);
            for ($j = 0; $j < strlen($s); $j++) {
                if ($s[$j] === '[') $level++;
                if ($s[$j] === ']') $level--;
            }
        }
    } else {
        $newLines[] = $line;
    }
}

file_put_contents($file, implode("\n", $newLines));
echo "Force-balanced all items.\n";
