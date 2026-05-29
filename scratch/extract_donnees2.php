<?php
$code = file_get_contents('database/seeders/ModerateObesitySeeder.php');
$start = strpos($code, '$donnees = [');
if ($start === false) {
    echo "not_found_start\n";
    exit(1);
}
$pos = $start;
$len = strlen($code);
$depth = 0;
$state = 'code';
$firstOpen = false;
for (; $pos < $len; $pos++) {
    $ch = $code[$pos];
    $next = $pos + 1 < $len ? $code[$pos + 1] : '';
    if ($state === 'code') {
        if ($ch === '/' && $next === '/') {
            $state = 'line_comment';
            $pos++;
            continue;
        }
        if ($ch === '/' && $next === '*') {
            $state = 'block_comment';
            $pos++;
            continue;
        }
        if ($ch === "'") {
            $state = 'single_quote';
            continue;
        }
        if ($ch === '"') {
            $state = 'double_quote';
            continue;
        }
        if ($ch === '[') {
            $depth++;
            $firstOpen = true;
        } elseif ($ch === ']') {
            $depth--;
            if ($firstOpen && $depth === 0) {
                $end = $pos;
                break;
            }
        }
    } elseif ($state === 'line_comment') {
        if ($ch === "\n") {
            $state = 'code';
        }
    } elseif ($state === 'block_comment') {
        if ($ch === '*' && $next === '/') {
            $state = 'code';
            $pos++;
        }
    } elseif ($state === 'single_quote') {
        if ($ch === '\\' && $next !== '') { $pos++; }
        elseif ($ch === "'") { $state = 'code'; }
    } elseif ($state === 'double_quote') {
        if ($ch === '\\' && $next !== '') { $pos++; }
        elseif ($ch === '"') { $state = 'code'; }
    }
}
if (!isset($end)) {
    echo "not_found_end\n";
    exit(1);
}
$snippet = substr($code, $start, $end - $start + 1);
file_put_contents('scratch/donnees_raw.txt', $snippet);

// Reconstruct only the array and eval it.
$evalCode = 'return ' . substr($snippet, strpos($snippet, '=') + 1) . ';';
try {
    $donnees = eval($evalCode);
    echo 'donnees_count=' . count($donnees) . PHP_EOL;
    foreach ($donnees as $idx => $item) {
        echo ($idx + 1) . ' ' . ($item['question'] ?? 'NO_QUESTION') . PHP_EOL;
    }
} catch (ParseError $e) {
    echo 'PARSE_ERR ' . $e->getMessage() . PHP_EOL;
}
