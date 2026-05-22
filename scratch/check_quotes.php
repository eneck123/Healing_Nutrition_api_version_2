<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$tokens = token_get_all($content);

foreach ($tokens as $token) {
    if (is_array($token) && $token[0] === T_ENCAPSED_AND_WHITESPACE) {
        // This is part of a string.
    }
    // Check for T_ERROR or T_INLINE_HTML where it shouldn't be
}

// Better: find lines with odd number of quotes
$lines = explode("\n", $content);
foreach ($lines as $i => $line) {
    $quotes = substr_count($line, '"');
    if ($quotes % 2 !== 0) {
        // Could be a multi-line string.
    }
}

// Just use regex to find strings and see if they are balanced.
$quotes = substr_count($content, '"');
if ($quotes % 2 !== 0) echo "Unbalanced double quotes!\n";

$singleQuotes = substr_count($content, "'");
if ($singleQuotes % 2 !== 0) echo "Unbalanced single quotes!\n";
