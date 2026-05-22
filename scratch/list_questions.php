<?php
$c = file_get_contents('database/seeders/RecommendationSeeder.php');
$start = strpos($c, '1. OBÉSITÉ MODÉRÉE (ID 1)');
$end = strpos($c, '2. OBÉSITÉ SÉVÈRE (ID 2)');
$block = substr($c, $start, $end-$start);
preg_match_all('/\'question\' => \"(.*?)\"/', $block, $matches);
foreach($matches[1] as $i => $q) {
    echo ($i) . ': ' . $q . "\n";
}
