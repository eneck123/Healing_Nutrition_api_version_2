<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$tokens = token_get_all($content);

$level = 0;
foreach ($tokens as $token) {
    if (is_array($token)) {
        $name = token_name($token[0]);
        $text = $token[1];
        $line = $token[2];
    } else {
        $name = 'CHAR';
        $text = $token;
        // We need to track line for CHAR tokens
    }
    
    // Track line manually for all tokens
    if ($name === 'T_WHITESPACE' || $name === 'T_CONSTANT_ENCAPSED_STRING') {
        $linesInToken = substr_count($text, "\n");
        // This is complex. Let's just use a counter.
    }
}

// Simpler:
$lines = explode("\n", $content);
$level = 0;
foreach ($lines as $i => $line) {
    $lineNum = $i + 1;
    // Strip strings and comments
    $s = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $line);
    $s = preg_replace('/\/\/.*|\/\*.*?\*\//s', '', $s);
    
    $prevLevel = $level;
    for ($j = 0; $j < strlen($s); $j++) {
        if ($s[$j] === '[') $level++;
        if ($s[$j] === ']') $level--;
    }
    
    if ($lineNum >= 440 && $lineNum <= 460) {
        echo "Line $lineNum: Level $prevLevel -> $level | $line\n";
    }
}
