<?php
require __DIR__ . '/../vendor/autoload.php';

$code = file_get_contents('database/seeders/ModerateObesitySeeder.php');
$start = strpos($code, '$donnees = [');
$end = strpos($code, "// LOGIQUE D'INSERTION CORRIGÉE POUR ID 1");
if ($start === false || $end === false) {
    echo "pattern_not_found\n";
    exit(1);
}
$snippet = substr($code, $start, $end - $start);
$snippet = preg_replace('/^\$donnees\s*=\s*/', '', $snippet);
$snippet = trim($snippet);
$snippet = rtrim($snippet, "\n\r; ");
$donnees = eval('return ' . $snippet . ';');

$recommendations = [];
$objectives = ['weight_loss', 'fitness'];
$ranges = ['under_5', '5_10', 'over_10'];
$pathologies = ['none', 'diabetes', 'hypertension', 'cardio'];

$flattenReponses = function (array $reponses) use (&$flattenReponses): array {
    $flat = [];
    foreach ($reponses as $key => $value) {
        if (!is_array($value)) {
            $flat[$key] = $value;
            continue;
        }
        $isFeuille = isset($value['weight_loss']) || isset($value['fitness']);
        if ($isFeuille) {
            $flat[$key] = $value;
        } else {
            foreach ($flattenReponses($value) as $subKey => $subValue) {
                $flat[$key . ' > ' . $subKey] = $subValue;
            }
        }
    }
    return $flat;
};

foreach ($donnees as $item) {
    if (!isset($item['reponses'])) continue;
    $reponsesPlates = $flattenReponses($item['reponses']);
    foreach ($reponsesPlates as $reponseValue => $data) {
        foreach ($objectives as $obj) {
            $targetRanges = ($obj === 'fitness') ? ['all'] : $ranges;
            foreach ($targetRanges as $range) {
                foreach ($pathologies as $patho) {
                    $finalContent = 'Aucun';
                    if (is_string($data)) {
                        $finalContent = $data;
                    } elseif (is_array($data)) {
                        $targetData = null;
                        if ($obj === 'fitness' && isset($data['fitness'])) {
                            $targetData = $data['fitness'];
                        } elseif ($obj === 'weight_loss' && isset($data['weight_loss'][$range])) {
                            $targetData = $data['weight_loss'][$range];
                        }
                        if (is_array($targetData)) {
                            $finalContent = $targetData[$patho] ?? $targetData['default'] ?? 'Aucun';
                        }
                    }
                    $recommendations[] = ['question' => $item['question'], 'answer' => $reponseValue, 'obj' => $obj, 'range' => $range, 'patho' => $patho, 'content' => $finalContent];
                }
            }
        }
    }
}

echo 'donnees_count=' . count($donnees) . PHP_EOL;
echo 'generated_count=' . count($recommendations) . PHP_EOL;
echo 'distinct_questions=' . count(array_unique(array_column($recommendations, 'question'))) . PHP_EOL;
$first = array_slice($recommendations, 0, 5);
var_export($first);
