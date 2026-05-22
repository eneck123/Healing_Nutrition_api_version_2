<?php
$c = file_get_contents('database/seeders/RecommendationSeeder.php');
$start = strpos($c, '1. OBÉSITÉ MODÉRÉE (ID 1)');
$end = strpos($c, '2. OBÉSITÉ SÉVÈRE (ID 2)');
$block = substr($c, $start, $end-$start);
$qs = explode("'question' =>", $block);

// Check Q7 (index 6 in seeder, index 7 in explode)
echo "--- Q7 ---\n";
echo $qs[7];

// Check Q10 (index 9 in seeder, index 10 in explode)
echo "\n--- Q10 ---\n";
echo $qs[10];
