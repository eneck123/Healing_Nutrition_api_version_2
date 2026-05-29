<?php
$code = file_get_contents('database/seeders/ModerateObesitySeeder.php');
$tokens = token_get_all($code);
$found = false;
$depth = 0;
$line = 1;
for ($i = 0, $n = count($tokens); $i < $n; $i++) {
    $token = $tokens[$i];
    $text = is_array($token) ? $token[1] : $token;
    $tokenLine = is_array($token) ? $token[2] : $line;
    $line += substr_count($text, "\n");
    if (!$found) {
        if (is_array($token) && $token[0] === T_VARIABLE && $token[1] === '$donnees') {
            // Look ahead to '=' and first '['
            $j = $i + 1;
            while ($j < $n) {
                $t = $tokens[$j];
                if (is_array($t) && $t[0] === T_WHITESPACE) { $j++; continue; }
                if (!is_array($t) && $t === '=') { $j++; break; }
                break;
            }
            while ($j < $n) {
                $t = $tokens[$j];
                if (is_array($t) && $t[0] === T_WHITESPACE) { $j++; continue; }
                if (!is_array($t) && $t === '[') {
                    $found = true;
                    $depth = 1;
                    $line = is_array($t) ? $t[2] : $line;
                    break;
                }
                $j++;
            }
        }
        continue;
    }
    if (!$found) continue;
    if ($text === '[') {
        $depth++;
    } elseif ($text === ']') {
        $depth--;
        if ($depth === 0) {
            echo "donnees_end_line=" . $tokenLine . PHP_EOL;
            echo "token_index=" . $i . PHP_EOL;
            if ($i+1 < $n) {
                $next = $tokens[$i+1];
                echo "next_token=" . (is_array($next) ? token_name($next[0]) . ':' . trim($next[1]) : $next) . PHP_EOL;
            }
            exit(0);
        }
    }
}
echo "not_found\n";
