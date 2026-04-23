<?php

$allFiles = [
    'rec1.txt' => 'FitnessDiabetesRecommendationService',
    'rec2.txt' => 'FitnessHypertensionRecommendationService',
    'rec3.txt' => 'FitnessCardioRecommendationService',
    'rec16.txt' => 'FitnessNoPathologyRecommendationService',
    'rec4.txt' => 'WeightLossUnder5DiabetesRecommendationService',
    'rec5.txt' => 'WeightLossUnder5HypertensionRecommendationService',
    'rec6.txt' => 'WeightLossUnder5CardioRecommendationService',
    'rec13.txt' => 'WeightLossUnder5NoPathologyRecommendationService',
    'rec7.txt' => 'WeightLoss5to10DiabetesRecommendationService',
    'rec8.txt' => 'WeightLoss5to10HypertensionRecommendationService',
    'rec9.txt' => 'WeightLoss5to10CardioRecommendationService',
    'rec14.txt' => 'WeightLoss5to10NoPathologyRecommendationService',
    'rec10.txt' => 'WeightLossOver10DiabetesRecommendationService',
    'rec11.txt' => 'WeightLossOver10HypertensionRecommendationService',
    'rec12.txt' => 'WeightLossOver10CardioRecommendationService',
    'rec15.txt' => 'WeightLossOver10NoPathologyRecommendationService',
];

$allHeadings = [
    'antecedents_diag' => ['Antécédents de', 'Avez-vous des antécédents'],
    'meds_lies' => ['Prenez-vous des médicaments', 'Prenez-vous actuellement l', 'TYPE DE MÉDICAMENTS'],
    'journee_typique' => ['Journée typique', 'décrire une journée'],
    'fruits_legumes' => ['Portions de fruits', 'CONSOMMATION DE FRUITS'],
    'grignotage' => ['Grignotez-vous', 'GRIGNOTAGE ENTRE'],
    'boissons' => ['Fréquence boissons', ' BOISSONS SUCRÉES'],
    'sommeil' => ['Heures de sommeil', ' SOMMEIL'],
    'apnee' => ['apnée du sommeil', ' APNÉE DU SOMMEIL'],
    'regime_recent' => ['récemment fait un régime', ' RÉGIMES ANTÉRIEURS'],
    'sedentarite' => ['position assise', 'Temps assis', ' SÉDENTARITÉ'],
    'activites_preferees' => ['activités physiques appréciez', ' ACTIVITÉS PRÉFÉRÉES'],
    'fc_connaissance' => ['fréquence cardiaque au repos', ' FRÉQUENCE CARDIAQUE'],
    'fc_valeur' => ['veuillez- nous la donner', 'veuillez-nous la donner'],
    'stress_ennui' => ['par stress ou ennui', ' ALIMENTATION ÉMOTIONNELLE'],
    'finir_assiette' => ['finir votre assiette', ' FINIR SON ASSIETTE'],
    'regime_particulier' => ['régime alimentaire particulier', ' RÉGIME PARTICULIER'],
    'regime_efficacite' => ['oui, lequel, et a-t-il été efficace', 'efficacité'],
];

foreach ($allFiles as $filename => $className) {
    $path = __DIR__ . '/../' . $filename;
    if (!file_exists($path)) {
        echo "[ERROR] $filename missing\n";
        continue;
    }
    $content = file_get_contents($path);
    
    $positions = [];
    foreach ($allHeadings as $key => $markers) {
        $foundPos = false;
        foreach ($markers as $marker) {
            $p = mb_stripos($content, $marker);
            if ($p !== false) {
                if ($foundPos === false || $p < $foundPos) {
                    $foundPos = $p;
                }
            }
        }
        if ($foundPos !== false) {
            $positions[$key] = $foundPos;
        }
    }

    asort($positions);
    $keysOrdered = array_keys($positions);
    $switchBody = "";
    
    for ($i = 0; $i < count($keysOrdered); $i++) {
        $key = $keysOrdered[$i];
        $startPos = $positions[$key];
        $endPos = ($i + 1 < count($keysOrdered)) ? $positions[$keysOrdered[$i+1]] : strlen($content);
        
        $part = substr($content, $startPos, $endPos - $startPos);
        $part = trim($part);
        $part = str_replace('"', '\"', $part);
        $part = preg_replace('/\\\\\"/', '\\\"', $part);
        
        $switchBody .= "            case '$key':\n";
        $switchBody .= "                return \"$part\";\n\n";
    }

    $template = "<?php\n\nnamespace App\Services;\n\nclass {$className} implements RecommendationServiceInterface\n{\n    public function getRecommendation(string \$key, string \$answer, array \$allAnswers = [], int \$age = 30): string\n    {\n        switch (\$key) {\n{$switchBody}            default:\n                return 'Aucun';\n        }\n    }\n}\n";

    $destPath = __DIR__ . '/../app/Services/' . $className . '.php';
    file_put_contents($destPath, $template);
}
echo "Restored all.\n";
