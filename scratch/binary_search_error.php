<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);

$low = 15;
$high = count($lines);
$lastGood = 15;

while ($low <= $high) {
    $mid = floor(($low + $high) / 2);
    $test = implode("\n", array_slice($lines, 0, $mid)) . "\n    ];\n}\n}";
    file_put_contents('scratch/test_syntax.php', $test);
    exec("php -l scratch/test_syntax.php 2>&1", $output, $return);
    if ($return === 0) {
        $lastGood = $mid;
        $low = $mid + 1;
    } else {
        $high = $mid - 1;
    }
}

echo "First error is around line " . ($lastGood + 1) . "\n";
$test = implode("\n", array_slice($lines, 0, $lastGood + 1)) . "\n    ];\n}\n}";
file_put_contents('scratch/test_syntax.php', $test);
exec("php -l scratch/test_syntax.php 2>&1", $output, $return);
echo $output[0] . "\n";
