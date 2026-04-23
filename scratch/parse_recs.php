<?php

$filesToProcess = [
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

foreach ($filesToProcess as $filename => $className) {
    echo "\nProcessing $filename -> $className\n";
    $content = file_get_contents(__DIR__ . '/../' . $filename);
    if ($content === false) {
        echo "  [ERROR] File $filename not found!\n";
        continue;
    }

    $positions = [];
    foreach ($allHeadings as $key => $markers) {
        $pos = false;
        foreach ($markers as $marker) {
            $foundPos = mb_stripos($content, $marker);
            if ($foundPos !== false) {
                if ($pos === false || $foundPos < $pos) {
                    $pos = $foundPos;
                }
            }
        }
        if ($pos !== false) {
            $positions[$key] = $pos;
        } else {
            echo "  [WARN] Heading not found for key: $key\n";
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
    if (file_put_contents($destPath, $template)) {
        echo "  -> Saved $className.php\n";
    }
}
echo "Done.\n";
