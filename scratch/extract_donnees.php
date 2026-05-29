<?php
$code = file_get_contents('database/seeders/ModerateObesitySeeder.php');
$tokens = token_get_all($code);
$found = false;
$depth = 0;
$output = '';
for ($i = 0, $n = count($tokens); $i < $n; $i++) {
    $token = $tokens[$i];
    if (!$found) {
        if (is_array($token) && $token[0] === T_VARIABLE && $token[1] === '$donnees') {
            // search ahead for '=' then '['
            $j = $i + 1;
            while ($j < $n) {
                if (is_array($tokens[$j]) && $tokens[$j][0] === T_WHITESPACE) { $j++; continue; }
                if (!is_array($tokens[$j]) && $tokens[$j] === '=') { $j++; break; }
                break;
            }
            while ($j < $n) {
                if (is_array($tokens[$j]) && $tokens[$j][0] === T_WHITESPACE) { $j++; continue; }
                if (!is_array($tokens[$j]) && $tokens[$j] === '[') {
                    $found = true;
                    $depth = 1;
                    $output .= '[';
                    $i = $j;
                    break;
                }
                $j++;
            }
        }
        continue;
    }
    if (!$found) continue;
    $tokenStr = is_array($token) ? $token[1] : $token;
    if ($tokenStr === '[') {
        $depth++;
    } elseif ($tokenStr === ']') {
        $depth--;
        if ($depth === 0) {
            $output .= ']';
            break;
        }
    }
    if (!$found) continue;
    if ($tokenStr !== '[' || $depth !== 0) {
        $output .= $tokenStr;
    }
}

if (!$found) {
    echo "donnees_not_found\n";
    exit(1);
}
$clean = $output;
file_put_contents('scratch/donnees_extracted.php', "<?php return $clean;");
$donnees = require 'scratch/donnees_extracted.php';
echo 'donnees_count=' . count($donnees) . PHP_EOL;
foreach ($donnees as $index => $item) {
    if (isset($item['question'])) {
        echo sprintf("%02d %s\n", $index + 1, $item['question']);
    } else {
        echo sprintf("%02d NO_QUESTION\n", $index + 1);
    }
}
