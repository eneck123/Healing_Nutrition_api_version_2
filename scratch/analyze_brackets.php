<?php
$lines = file('database/seeders/ModerateObesitySeeder.php');
$balance = 0;
$maxBalance = 0;
$maxLine = 0;

foreach ($lines as $i => $line) {
    $j = 0;
    $state = 'code';
    $len = strlen($line);
    while ($j < $len) {
        $ch = $line[$j];
        $nxt = $j + 1 < $len ? $line[$j + 1] : '';

        if ($state === 'code') {
            if ($ch === '/' && $nxt === '/') {
                break;
            }
            if ($ch === '/' && $nxt === '*') {
                $state = 'block_comment';
                $j += 2;
                continue;
            }
            if ($ch === '\'' && ($j === 0 || $line[$j - 1] !== '\\')) {
                $state = 'single_quote';
                $j += 1;
                continue;
            }
            if ($ch === '"' && ($j === 0 || $line[$j - 1] !== '\\')) {
                $state = 'double_quote';
                $j += 1;
                continue;
            }
            if ($ch === '[') {
                $balance++;
                if ($balance > $maxBalance) {
                    $maxBalance = $balance;
                    $maxLine = $i + 1;
                }
            } elseif ($ch === ']') {
                $balance--;
            }
            $j++;
        } elseif ($state === 'block_comment') {
            if ($ch === '*' && $nxt === '/') {
                $state = 'code';
                $j += 2;
            } else {
                $j++;
            }
        } elseif ($state === 'single_quote') {
            if ($ch === '\\' && $j + 1 < $len) {
                $j += 2;
                continue;
            }
            if ($ch === '\'' && ($j === 0 || $line[$j - 1] !== '\\')) {
                $state = 'code';
            }
            $j++;
        } elseif ($state === 'double_quote') {
            if ($ch === '\\' && $j + 1 < $len) {
                $j += 2;
                continue;
            }
            if ($ch === '"' && ($j === 0 || $line[$j - 1] !== '\\')) {
                $state = 'code';
            }
            $j++;
        }
    }
}

echo 'final_balance=' . $balance . PHP_EOL;
echo 'max_balance=' . $maxBalance . ' at_line=' . $maxLine . PHP_EOL;
