<?php
$sourcePath = __DIR__ . '/../app/Services/ModerateObesityRecommendationService.php';
$content = file_get_contents($sourcePath);

// Function to extract a method block by its name
function extractMethod($content, $methodName) {
    // Regex to match the method signature until the opening brace
    $pattern = '/(?:private|public)\s+function\s+' . $methodName . '\s*\([^)]*\)\s*(?::\s*string)?\s*\{/s';
    if (preg_match($pattern, $content, $matches, PREG_OFFSET_CAPTURE)) {
        $startPos = $matches[0][1];
        
        // Find the matching closing brace
        $openBraces = 0;
        $i = $startPos;
        $foundOpen = false;
        
        while ($i < strlen($content)) {
            if ($content[$i] === '{') {
                $openBraces++;
                $foundOpen = true;
            } elseif ($content[$i] === '}') {
                $openBraces--;
            }
            $i++;
            
            if ($foundOpen && $openBraces === 0) {
                return substr($content, $startPos, $i - $startPos);
            }
        }
    }
    return null;
}

// Common fallback methods needed by the specific services
$commonMethodsNames = [
    'getAntecedentsAdvice',
    'getAntecedentsLequelAdvice',
    'getFruitsLegumesAdvice',
    'getGrignotageAdvice',
    'getBoissonAdvice',
    'getSommeilAdvice',
    'getApneeAdvice',
    'getRegimeRecentAdvice',
    'getRegimePoidsPerduAdvice',
    'getActiviteJoursAdvice',
    'getSedentariteAdvice',
    'getActivitesPrefereesAdvice',
    'getStressEnnuiAdvice',
    'getFinirAssietteAdvice',
    'getRegimeParticulierAdvice',
    'getRegimeEfficaciteAdvice',
    'getMedicationAdvice',
    'getMedicationSpecificAdvice',
    'getFCConnaissanceAdvice',
    'getFCValeurAdvice',
];

$commonMethodsCode = [];
foreach ($commonMethodsNames as $name) {
    $code = extractMethod($content, $name);
    if ($code) {
        $commonMethodsCode[] = str_replace('private function', 'protected function', $code);
    }
}
$commonMethodsString = implode("\n\n    ", $commonMethodsCode);

function buildService($className, $sourceMethodName, $sourceContent, $commonMethodsString) {
    global $content;
    $methodCode = extractMethod($content, $sourceMethodName);
    if (!$methodCode) {
        echo "Method $sourceMethodName not found!\n";
        return;
    }
    
    // Rename the method to getRecommendation and make it public
    $methodCode = preg_replace('/(?:private|public)\s+function\s+' . $sourceMethodName . '\s*\((.*?)\)\s*(?::\s*string)?/s', 'public function getRecommendation($1, int $age = 30): string', $methodCode);

    $template = "<?php\n\nnamespace App\Services;\n\nclass {$className} implements RecommendationServiceInterface\n{\n    {$methodCode}\n\n    {$commonMethodsString}\n}\n";

    $destPath = __DIR__ . "/../app/Services/{$className}.php";
    file_put_contents($destPath, $template);
    echo "Generated {$className}.php\n";
}

buildService('FitnessDiabetesRecommendationService', 'getDiabetesFitnessAdvice', $content, $commonMethodsString);
buildService('FitnessHypertensionRecommendationService', 'getHypertensionFitnessAdvice', $content, $commonMethodsString);
buildService('FitnessCardioRecommendationService', 'getCardioFitnessAdvice', $content, $commonMethodsString);
buildService('FitnessNoPathologyRecommendationService', 'getFitnessNoPathologyAdvice', $content, $commonMethodsString);

