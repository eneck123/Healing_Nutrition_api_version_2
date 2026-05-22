<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$tokens = token_get_all($content);

$level = 0;
foreach ($tokens as $token) {
    $line = is_array($token) ? $token[2] : 0;
    $text = is_array($token) ? $token[1] : $token;
    
    if ($token === '[') $level++;
    if ($token === ']') $level--;
    
    if ($line >= 445 && $line <= 455) {
        $name = is_array($token) ? token_name($token[0]) : 'CHAR';
        echo "Line $line: Level $level Token $name (" . str_replace("\n", "\\n", $text) . ")\n";
    }
}
