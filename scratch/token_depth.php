<?php
$code = file_get_contents('database/seeders/ModerateObesitySeeder.php');
$tokens = token_get_all($code);
$depth = 0;
$maxDepth = 0;
$line = 1;
foreach ($tokens as $token) {
    if (is_array($token)) {
        $name = token_name($token[0]);
        $text = $token[1];
        $line = $token[2];
        if (in_array($token[0], [T_COMMENT, T_DOC_COMMENT, T_CONSTANT_ENCAPSED_STRING], true)) {
            continue;
        }
        if ($text === '[') { $depth++; if ($depth > $maxDepth) { $maxDepth = $depth; $maxLine = $line; } }
        if ($text === ']') { $depth--; }
    } else {
        $text = $token;
        if ($text === '[') { $depth++; if ($depth > $maxDepth) { $maxDepth = $depth; $maxLine = $line; } }
        if ($text === ']') { $depth--; }
    }
}

echo 'final_depth=' . $depth . PHP_EOL;
echo 'max_depth=' . $maxDepth . ' at line ' . $maxLine . PHP_EOL;
