<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);

// Strip strings to avoid counting brackets in text
$content = preg_replace('/"(?:[^"\\\\]|\\\\.)*"|\'(?:[^\'\\\\]|\\\\.)*\'/s', '""', $content);

$lines = explode("\n", $content);

$stack = [];
$errors = [];

foreach ($lines as $i => $line) {
    $len = strlen($line);
    for ($j = 0; $j < $len; $j++) {
        $char = $line[$j];
        if ($char === '[') {
            $stack[] = ['line' => $i + 1, 'char' => '['];
        } elseif ($char === ']') {
            if (empty($stack)) {
                $errors[] = "Unexpected ] at line " . ($i + 1);
            } else {
                array_pop($stack);
            }
        }
    }
}

while (!empty($stack)) {
    $item = array_pop($stack);
    $errors[] = "Unclosed [ at line " . $item['line'];
}

foreach ($errors as $error) {
    echo $error . "\n";
}
