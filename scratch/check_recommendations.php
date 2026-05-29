<?php
require __DIR__ . '/../vendor/autoload.php';
$app = require __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

$rows = DB::table('recommendations')
    ->where('maladie_chronique_id', 1)
    ->select('question_text')
    ->distinct()
    ->get();

echo 'distinct_questions=' . count($rows) . PHP_EOL;
foreach ($rows as $row) {
    echo $row->question_text . PHP_EOL;
}
