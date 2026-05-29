<?php
$lines = file('database/seeders/ModerateObesitySeeder.php');
$balance = 0;
$max = 0;
$maxLine = 0;
foreach ($lines as $n => $line) {
    $opens = substr_count($line, '[');
    $closes = substr_count($line, ']');
    $balance += $opens - $closes;
    if ($balance > $max) {
        $max = $balance;
        $maxLine = $n + 1;
    }
}

echo 'max_balance=' . $max . ' at line ' . $maxLine . PHP_EOL;
