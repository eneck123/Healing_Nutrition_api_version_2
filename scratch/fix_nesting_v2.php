<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

// Strip comments and strings for accurate counting
$stripped = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $content);
$stripped = preg_replace('/\/\/.*|\/\*.*?\*\//s', '', $stripped);

$startMarker = '$donnees = [';
$endMarker = '    ];';

$startPos = strpos($content, $startMarker);
$endPos = strrpos($content, $endMarker);

if ($startPos === false || $endPos === false) {
    die("Markers not found");
}

$header = substr($content, 0, $startPos + strlen($startMarker));
$footer = substr($content, $endPos);
$donneesBody = substr($content, $startPos + strlen($startMarker), $endPos - ($startPos + strlen($startMarker)));

// Items are separated by [ at the 12-space indentation level.
// Regex for "            ["
$items = preg_split('/\n\s{12}\[/', $donneesBody);

$fixedItems = [];
foreach ($items as $i => $item) {
    if (trim($item) === '') continue;
    
    // Clean up the item from trailing brackets
    // We want to keep the content but re-balance the end.
    $item = trim($item);
    if (substr($item, 0, 1) !== '[') $item = "[" . $item;
    
    // Remove all trailing "]" and "," and whitespace
    while (preg_match('/[\]\s,]$|^\s+/', $item)) {
        $item = preg_replace('/[\]\s,]$|^\s+/', '', $item);
    }
    
    // Now we have the "raw" item content.
    // We need to re-add the missing closing brackets.
    // Let's analyze the internal nesting.
    $level = 0;
    // We use the STRIPPED version of the item if possible, but let's just do it carefully.
    // Stripping strings in THIS specific item:
    $temp = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $item);
    for ($j = 0; $j < strlen($temp); $j++) {
        if ($temp[$j] === '[') $level++;
        if ($temp[$j] === ']') $level--;
    }
    
    // Re-add closing brackets until we reach level 0 (the item itself is closed)
    if ($level > 0) {
        for ($k = 0; $k < $level; $k++) {
            $indent = str_repeat("    ", $level - $k + 2); // Approximation
            $item .= "\n" . $indent . "]";
        }
    }
    
    $fixedItems[] = "            " . $item . ",";
}

$newBody = "\n" . implode("\n", $fixedItems) . "\n";
file_put_contents($file, $header . $newBody . $footer);
echo "Cleaned and re-nested all items.\n";
