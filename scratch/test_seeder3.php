<?php
$donnees = require __DIR__.'/temp_array.php';

$extractQuestions = function(array $arr) use (&$extractQuestions) {
    $questions = [];
    
    if (isset($arr['maladie_id']) && isset($arr['question']) && isset($arr['reponses'])) {
        $q = [
            'maladie_id' => $arr['maladie_id'],
            'question' => $arr['question'],
            'reponses' => $arr['reponses']
        ];
        $questions[] = $q;
    }
    
    foreach ($arr as $key => $value) {
        if (is_array($value)) {
            $questions = array_merge($questions, $extractQuestions($value));
        }
    }
    
    return $questions;
};

$allQuestions = $extractQuestions($donnees);
echo "Extracted " . count($allQuestions) . " questions globally.\n";

// Now test flattening for the first few questions
foreach (array_slice($allQuestions, 0, 3) as $idx => $q) {
    echo "Q$idx: " . $q['question'] . "\n";
    echo "  Reponses keys: " . implode(', ', array_keys($q['reponses'])) . "\n";
}

