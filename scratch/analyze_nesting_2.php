<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$tokens = token_get_all($content);

$level = 0;
foreach ($tokens as $token) {
    if (is_array($token)) {
        $line = $token[2];
        if ($line === 20) echo "Level at 20: $level\n";
        if ($line === 451) echo "Level at 451: $level\n";
        if ($line === 452) echo "Level at 452: $level\n";
    } else {
        if ($token === '[') $level++;
        if ($token === ']') $level--;
    }
}
