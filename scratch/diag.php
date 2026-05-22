<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

$tokens = token_get_all($content);
foreach ($tokens as $token) {
    if (is_array($token)) {
        // token[0] = id, [1] = text, [2] = line
        // We can't really find the error here because token_get_all doesn't fail on syntax errors, it just returns them as T_INLINE_HTML or something if it's outside PHP.
        // Actually it returns tokens until it can't anymore.
    }
}

// Just use php -l to get the error message and line number
exec("php -l $file", $output, $return);
echo implode("\n", $output);
