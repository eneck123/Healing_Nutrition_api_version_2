<?php
$file = 'database/seeders/RecommendationSeeder.php';
$content = file_get_contents($file);
$lines = explode("\n", $content);

for ($i = 1; $i <= count($lines); $i++) {
    $test = implode("\n", array_slice($lines, 0, $i)) . "\n    ];\n}\n}";
    $tmp = 'scratch/test_syntax.php';
    file_put_contents($tmp, $test);
    exec("php -l $tmp 2>&1", $output, $return);
    if ($return !== 0) {
        echo "Error starts at line $i\n";
        echo $output[0] . "\n";
        break;
    }
}
