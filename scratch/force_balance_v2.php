<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);

$newLines = [];
$level = 0;
$inDonnees = false;

foreach ($lines as $i => $line) {
    if (strpos($line, '$donnees = [') !== false) {
        $inDonnees = true;
        $level = 2;
        $newLines[] = $line;
        continue;
    }
    
    if (strpos($line, '];') !== false && $inDonnees && $level <= 3) { // Level 3 means we closed the last item
        while ($level > 2) {
            $newLines[] = str_repeat("    ", $level) . "]";
            $level--;
        }
        $newLines[] = "    ];";
        $inDonnees = false;
        continue;
    }
    
    if ($inDonnees) {
        if (preg_match('/^\s*\[\s*\'maladie_id\'/', $line)) {
            // If we were in an item, close it with a comma
            while ($level > 2) {
                $level--;
                $newLines[] = str_repeat("    ", $level+1) . "]";
            }
            // Ensure the last line added ends with a comma if it was a bracket
            $last = count($newLines) - 1;
            if ($last >= 0 && trim($newLines[$last]) === ']' && substr(trim($newLines[$last]), -1) !== ',') {
                $newLines[$last] .= ",";
            }
            
            $level = 3;
            $newLines[] = $line;
        } else {
            $newLines[] = $line;
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
echo "Force-balanced all items with commas.\n";
