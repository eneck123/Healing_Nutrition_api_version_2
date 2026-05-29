<?php
$code = file_get_contents('database/seeders/ModerateObesitySeeder.php');
$pos = strpos($code, '$donnees = [');
if ($pos === false) {
    echo "not_found\n";
    exit(1);
}
$line = substr_count(substr($code, 0, $pos), "\n") + 1;
$i = $pos;
$len = strlen($code);
$state = 'code';
$depth = 0;
$firstOpen = false;
for (; $i < $len; $i++) {
    $ch = $code[$i];
    $next = $i + 1 < $len ? $code[$i+1] : '';
    if ($state === 'code') {
        if ($ch === '/' && $next === '/') {
            $state = 'line_comment';
            $i++;
            continue;
        }
        if ($ch === '/' && $next === '*') {
            $state = 'block_comment';
            $i++;
            continue;
        }
        if ($ch === "'" ) {
            $state = 'single_quote';
            continue;
        }
        if ($ch === '"') {
            $state = 'double_quote';
            continue;
        }
        if ($ch === '[') {
            $depth++;
            if (!$firstOpen) { $firstOpen = true; }
        } elseif ($ch === ']') {
            $depth--;
            if ($firstOpen && $depth === 0) {
                echo 'donnees_end_pos=' . $i . PHP_EOL;
                echo 'donnees_end_line=' . $line . PHP_EOL;
                echo 'char=' . $ch . PHP_EOL;
                echo 'next_chars=' . substr($code, $i+1, 10) . PHP_EOL;
                exit(0);
            }
        }
    } elseif ($state === 'line_comment') {
        if ($ch === "\n") {
            $state = 'code';
        }
    } elseif ($state === 'block_comment') {
        if ($ch === '*' && $next === '/') {
            $state = 'code';
            $i++;
        }
    } elseif ($state === 'single_quote') {
        if ($ch === '\\' && $next !== '') { $i++; }
        elseif ($ch === "'") { $state = 'code'; }
    } elseif ($state === 'double_quote') {
        if ($ch === '\\' && $next !== '') { $i++; }
        elseif ($ch === '"') { $state = 'code'; }
    }
    if ($ch === "\n") {
        $line++;
    }
}
echo "end_not_found\n";
