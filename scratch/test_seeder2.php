<?php
$donnees = require __DIR__.'/temp_array.php';

echo "Element 2 has keys: " . implode(', ', array_keys($donnees[2])) . "\n";
echo "Element 2 'reponses' keys: " . implode(', ', array_keys($donnees[2]['reponses'])) . "\n";

// Let's recursively find 'maladie_id'
function countQuestions($arr, $depth = 0) {
    $count = 0;
    foreach ($arr as $key => $val) {
        if (is_array($val)) {
            if (isset($val['maladie_id'])) {
                $count++;
            }
            $count += countQuestions($val, $depth + 1);
        }
    }
    return $count;
}

echo "Total nested questions in Element 2: " . countQuestions($donnees[2]) . "\n";
