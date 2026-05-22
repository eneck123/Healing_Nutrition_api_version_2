<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

$tokens = token_get_all($content);
foreach ($tokens as $token) {
    if (is_array($token) && $token[0] === T_ENCAPSED_AND_WHITESPACE) {
        // This is fine
    }
    if (is_array($token) && ($token[0] === T_CONSTANT_ENCAPSED_STRING || $token[0] === T_STRING_VARNAME)) {
        // This is fine
    }
}

// Actually, PHP parser handles it.
// I'll look for T_INLINE_HTML which happens if PHP thinks it's outside PHP tag.
// Or T_OPEN_TAG_WITH_ECHO etc.

$lines = explode("\n", $content);
$inDouble = false;
$inSingle = false;

for ($i = 0; $i < strlen($content); $i++) {
    $char = $content[$i];
    if ($char === '"' && !$inSingle) {
        if ($i > 0 && $content[$i-1] === '\\') {
            // Escaped
        } else {
            $inDouble = !$inDouble;
        }
    }
    if ($char === "'" && !$inDouble) {
        if ($i > 0 && $content[$i-1] === '\\') {
            // Escaped
        } else {
            $inSingle = !$inSingle;
        }
    }
    
    // Check if we are inside a comment
    // (This is a simplified version)
}

if ($inDouble) echo "Double quote unclosed!\n";
if ($inSingle) echo "Single quote unclosed!\n";
