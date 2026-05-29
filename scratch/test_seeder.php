<?php
require __DIR__.'/../vendor/autoload.php';
$app = require_once __DIR__.'/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// We will redefine the run method or just parse the file
$content = file_get_contents(__DIR__.'/../database/seeders/ModerateObesitySeeder.php');
// Extract the $donnees array string
$start = strpos($content, '$donnees = [');
$end = strpos($content, ']]]]]]]]];', $start) + 10;
$arrayString = substr($content, $start, $end - $start);

// Write to a temporary file and return it
file_put_contents(__DIR__.'/temp_array.php', "<?php\n" . $arrayString . "\nreturn \$donnees;");
$donnees = require __DIR__.'/temp_array.php';

echo "Count of donnees: " . count($donnees) . "\n";
echo "Keys of donnees:\n";
foreach ($donnees as $key => $val) {
    if (isset($val['question'])) {
        echo "[$key] => Question: " . substr($val['question'], 0, 50) . "\n";
    } else {
        echo "[$key] => Not a question (keys: " . implode(', ', array_keys($val)) . ")\n";
    }
}
