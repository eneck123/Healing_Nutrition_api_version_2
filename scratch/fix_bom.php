<?php

$dir = __DIR__ . '/../app/Services/';
$files = glob($dir . '*.php');

foreach ($files as $file) {
    $content = file_get_contents($file);
    if ($content === false) continue;

    $bom = pack('H*', 'EFBBBF');
    if (strpos($content, $bom) === 0) {
        echo "Found BOM in " . basename($file) . ". Removing it...\n";
        $newContent = substr($content, 3);
        file_put_contents($file, $newContent);
    } else {
        // Also check if there's any whitespace before <?php
        if (preg_match('/^\s+<\?php/', $content)) {
            echo "Found leading whitespace in " . basename($file) . ". Trimming it...\n";
            $newContent = ltrim($content);
            file_put_contents($file, $newContent);
        }
    }
}
echo "Done checking for BOM and leading whitespace.\n";
