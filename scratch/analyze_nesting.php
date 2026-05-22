<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$tokens = token_get_all($content);

$level = 0;
$lineLevels = [];

foreach ($tokens as $token) {
    if (is_array($token)) {
        $line = $token[2];
        if (!isset($lineLevels[$line])) $lineLevels[$line] = $level;
    } else {
        if ($token === '[') $level++;
        if ($token === ']') $level--;
    }
}

foreach ($lineLevels as $line => $lvl) {
    if ($line > 440 && $line < 470) {
        echo "Line $line: Level $lvl\n";
    }
}
