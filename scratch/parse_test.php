<?php
$lines = file(__DIR__ . '/../rec1.txt', FILE_IGNORE_NEW_LINES);
$qCount = 0;
foreach ($lines as $line) {
    if (preg_match('/^Question (\d+)/i', trim($line), $matches)) {
        $qCount++;
        echo "Found Q" . $matches[1] . ": " . $line . "\n";
    }
}
echo "Total Questions Found: $qCount\n";
