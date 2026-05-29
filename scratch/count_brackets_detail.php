<?php
$lines = file('database/seeders/ModerateObesitySeeder.php');
$balance = 0;
foreach ($lines as $n => $line) {
    $opens = substr_count($line, '[');
    $closes = substr_count($line, ']');
    if ($opens || $closes) {
        $balance += $opens - $closes;
        echo sprintf("%5d | balance=%2d | opens=%2d closes=%2d | %s", $n+1, $balance, $opens, $closes, trim($line)) . PHP_EOL;
    }
}
