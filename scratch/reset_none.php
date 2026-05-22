<?php
$seederPath = 'database/seeders/RecommendationSeeder.php';
$c = file_get_contents($seederPath);

// Fix 'none' keys followed by 'diabetes'
// We match from 'none' => to the comma before 'diabetes'
$c = preg_replace("/\'none\'\s*=>\s*.*?(?=\s*,\s*\'diabetes\')/s", "'none' => \"FIXME\"", $c);

file_put_contents($seederPath, $c);
echo "Reset 'none' values to FIXME.\n";
