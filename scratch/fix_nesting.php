<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

// Find the start and end of $donnees array
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

// Split into items by "            ["
$items = explode("\n            [", $donneesBody);

$fixedItems = [];
foreach ($items as $i => $item) {
    if (trim($item) === '') continue;
    
    $item = trim($item);
    if ($i > 0) $item = "[" . $item;
    
    // Count brackets in this item
    // We expect balanced brackets within an item if we add the closing ones correctly.
    // BUT the item might be truncated or corrupted.
    
    // Let's try a simpler approach: 
    // If the item doesn't end with "]," or "]", add what's missing.
    // Actually, we can just ensure every item ends with "            ],"
    
    // Check nesting level at the end of the item
    $level = 0;
    for ($j = 0; $j < strlen($item); $j++) {
        if ($item[$j] === '[') $level++;
        if ($item[$j] === ']') $level--;
    }
    
    if ($level > 0) {
        $item .= str_repeat("\n            ]", $level);
    }
    
    // Ensure it ends with a comma if it's not the last one
    if ($i < count($items) - 1 && substr(trim($item), -1) !== ',') {
        $item .= ",";
    }
    
    $fixedItems[] = $item;
}

$newBody = "\n            " . implode("\n            ", $fixedItems) . "\n    ";
file_put_contents($file, $header . $newBody . $footer);
echo "Fixed items nesting levels.\n";
