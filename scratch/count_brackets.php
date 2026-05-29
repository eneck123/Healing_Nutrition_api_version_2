<?php
$lines = file('database/seeders/ModerateObesitySeeder.php');
$balance = 0;
$lastLine = 0;
foreach ($lines as $n => $line) {
    $opens = substr_count($line, '[');
    $closes = substr_count($line, ']');
    if ($opens || $closes) {
        $balance += $opens - $closes;
        if ($balance < 0) {
            echo "Negative balance at line " . ($n + 1) . ": balance=$balance\n";
            break;
        }
        $lastLine = $n + 1;
    }
}

echo "Final balance=$balance\n";
echo "Last tracked line=$lastLine\n";
