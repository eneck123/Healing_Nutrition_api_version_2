<?php
$code = file_get_contents('database/seeders/ModerateObesitySeeder.php');
$start = strpos($code, '$donnees = [');
$end = strpos($code, "// LOGIQUE D'INSERTION CORRIGÉE POUR ID 1");
if ($start === false || $end === false) {
    echo "start_or_end_not_found\n";
    exit(1);
}
$snippet = substr($code, $start, $end - $start);
$questionCount = substr_count($snippet, "'question' =>");
$questionCount2 = preg_match_all("/'question'\s*=>\s*\"/", $snippet, $m);
$open = 0;
$first = null;
for ($i = 0; $i < strlen($snippet); $i++) {
    $ch = $snippet[$i];
    if ($ch === '[') $open++;
    if ($ch === ']') $open--;
    if ($first === null && $open === 0 && $i > 0) { $first = $i; break; }
}

echo "snippet_len=" . strlen($snippet) . PHP_EOL;
echo "questionCount_literal='question' =>=" . $questionCount . PHP_EOL;
echo "questionCount_regex=" . $questionCount2 . PHP_EOL;
echo "first_zero_depth_at=" . $first . PHP_EOL;
