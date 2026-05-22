<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);

foreach ($lines as $i => $line) {
    $lineNum = $i + 1;
    // Strip comments
    $s = preg_replace('/\/\/.*|\/\*.*?\*\//', '', $line);
    $quotes = substr_count($s, "'");
    if ($quotes % 2 !== 0) {
        echo "Line $lineNum has $quotes single quotes: $line\n";
    }
}
