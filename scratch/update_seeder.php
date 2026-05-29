<?php
$file = 'database/seeders/ModerateObesitySeeder.php';
$content = file_get_contents($file);

$prefix = "FCmax estimée selon la formule de Tanaka (208 - 0.7 x âge) : {valeur_tanaka} bpm.\n\n";

$lines = explode("\n", $content);
$in_null_block = false;
$in_question = false;

for ($i = 19660; $i < count($lines); $i++) {
    if (strpos($lines[$i], "'question' => \"Si oui, veuillez- nous la donner ?\",") !== false) {
        $in_question = true;
    }
    
    if ($in_question && strpos($lines[$i], "null => [") !== false) {
        $in_null_block = true;
    }
    
    if ($in_null_block) {
        // Find leaf strings: 'key' => "Text...
        if (preg_match("/^(\s*'(none|diabetes|hypertension|cardio)'\s*=>\s*\")(.+)$/", $lines[$i], $matches)) {
            // Check if already prefixed
            if (strpos($lines[$i], "formule de Tanaka") === false) {
                $lines[$i] = $matches[1] . $prefix . $matches[3];
            }
        }
        
        // break condition: when we reach the end of the null array
        if (strpos($lines[$i], "'Non' => [") !== false || strpos($lines[$i], "'question' => \"Mangez-vous") !== false) {
            break;
        }
    }
}

file_put_contents($file, implode("\n", $lines));
echo "Done\n";
