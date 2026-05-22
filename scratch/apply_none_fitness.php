<?php
$seederPath = 'database/seeders/RecommendationSeeder.php';
$testPath = 'test.txt';

if (!file_exists($seederPath)) { echo "Seeder not found\n"; exit(1); }
if (!file_exists($testPath)) { echo "test.txt not found\n"; exit(1); }

$c = file_get_contents($seederPath);
$txt = file_get_contents($testPath);

// Find ID 1 range
$startMarker = '1. OBÉSITÉ MODÉRÉE (ID 1)';
$endMarker = '2. OBÉSITÉ SÉVÈRE (ID 2)';
$startPos = strpos($c, $startMarker);
$endPos = strpos($c, $endMarker);

if ($startPos === false || $endPos === false) { 
    echo "Boundaries for ID 1 not found\n"; 
    exit(1); 
}

$id1_block = substr($c, $startPos, $endPos - $startPos);

function getClosingBracket($text, $start) {
    $depth = 0;
    for ($i = $start; $i < strlen($text); $i++) {
        if ($text[$i] == '[') $depth++;
        if ($text[$i] == ']') {
            $depth--;
            if ($depth == 0) return $i;
        }
    }
    return -1;
}

function extractBetween($text, $startMarker, $endMarker = null) {
    if (!$startMarker) return $text;
    $s = stripos($text, $startMarker);
    if ($s === false) return null;
    $s += strlen($startMarker);
    if ($endMarker === null) return trim(substr($text, $s));
    $e = stripos($text, $endMarker, $s);
    if ($e === false) return trim(substr($text, $s));
    return trim(substr($text, $s, $e - $s));
}

$mappings = [
    2 => ['marker' => "QUESTION 3", 'next' => "QUESTION 4", 'answers' => ['Oui' => "RÉPONSE : OUI", 'Non' => "RÉPONSE : NON"]],
    3 => ['marker' => "QUESTION 4", 'next' => "QUESTION 5", 'answers' => ['null' => null]],
    4 => ['marker' => "QUESTION 5", 'next' => "QUESTION 6", 'answers' => [
        'Médicaments pour baisser la glycémie (ex : metformine, glimepiride…)' => "GLYCÉMIE",
        'Insuline' => "Insuline",
        'Médicaments pour perdre du poids (ex : orlistat, liraglutide…)' => "PERDRE DU POIDS",
        'Médicaments pour la tension artérielle (ex : IEC, ARA2, bêta-bloquants…)' => "TENSION",
        'Médicaments pour le cholestérol (ex : statines)' => "CHOLESTÉROL",
        'Aucun de ces médicaments' => "Aucun de ces médicaments"
    ]],
    5 => ['marker' => "QUESTION 6", 'next' => "QUESTION 7", 'answers' => ['null' => null]],
    6 => ['marker' => "QUESTION 7", 'next' => "QUESTION 8", 'answers' => [
        '1-2' => "CHOIX : 1-2 portions",
        '3-4' => "CHOIX : 3-4 portions",
        '5 ou plus' => "CHOIX : 5 ou plus"
    ]],
    7 => ['marker' => "QUESTION 8", 'next' => "QUESTION 9", 'answers' => ['Oui' => "RÉPONSE : OUI", 'Non' => "RÉPONSE : NON"]],
    8 => ['marker' => "QUESTION 9", 'next' => "QUESTION 10", 'answers' => ['null' => null]],
    9 => ['marker' => "QUESTION 10", 'next' => "QUESTION 11", 'answers' => [
        'Tous les jours' => "CHOIX : Tous les jours",
        'Une fois par semaine' => "CHOIX : Une fois par semaine",
        'Occasionnellement' => "CHOIX : Occasionnellement",
        'Jamais' => "CHOIX : Jamais"
    ]],
    10 => ['marker' => "QUESTION 11", 'next' => "QUESTION 12", 'answers' => [
        'Moins de 6 h' => "CHOIX : Moins de 6h",
        '6h -7h' => "CHOIX : 6h-7h",
        '8h -9h' => "CHOIX : 8h-9h",
        'Plus de 9h' => "CHOIX : Plus de 9h"
    ]],
    11 => ['marker' => "QUESTION 12", 'next' => "QUESTION 13", 'answers' => ['Oui' => "RÉPONSE : OUI", 'Non' => "RÉPONSE : NON"]],
    12 => ['marker' => "QUESTION 13", 'next' => "QUESTION 14", 'answers' => ['Oui' => "RÉPONSE : OUI", 'Non' => "RÉPONSE : NON"]],
    13 => ['marker' => "QUESTION 15", 'next' => "QUESTION 16", 'answers' => [
        'Aucun' => "CHOIX : Aucun",
        '1j-3j' => "CHOIX : 1-3 jours",
        '4j-6j' => "CHOIX : 4-6 jours",
        '7j' => "CHOIX : 7 jours"
    ]],
    14 => ['marker' => "QUESTION 16", 'next' => "QUESTION 17", 'answers' => [
        'Plus de 8h' => "CHOIX : Plus de 8h",
        '6h-8h' => "CHOIX : 6h-8h",
        '4h-6h' => "CHOIX : 4h-6h",
        'Moins de 4h' => "CHOIX : Moins de 4h"
    ]],
    15 => ['marker' => "QUESTION 17", 'next' => "QUESTION 18", 'answers' => ['null' => null]],
    16 => ['marker' => "QUESTION 18", 'next' => "QUESTION 19", 'answers' => ['Oui' => "RÉPONSE : OUI", 'Non' => "RÉPONSE : NON"]],
    18 => ['marker' => "QUESTION 19", 'next' => "QUESTION 20", 'answers' => ['Oui' => "RÉPONSE : OUI", 'Non' => "RÉPONSE : NON"]],
    19 => ['marker' => "QUESTION 20", 'next' => "QUESTION 21", 'answers' => ['Oui' => "RÉPONSE : OUI", 'Non' => "RÉPONSE : NON"]],
    20 => ['marker' => "QUESTION 21", 'next' => null, 'answers' => ['Oui' => "RÉPONSE : OUI", 'Non' => "RÉPONSE : NON"]]
];

$q_blocks = explode("'question' =>", $id1_block);
$new_id1_block = $q_blocks[0];
array_shift($q_blocks);

foreach ($q_blocks as $idx => $qBlock) {
    if (isset($mappings[$idx])) {
        $m = $mappings[$idx];
        $q_text_block = extractBetween($txt, $m['marker'], $m['next']);
        
        if ($q_text_block) {
            // Clean up q_text_block to remove any "PARTIE X" headers at the end
            $q_text_block = preg_replace('/PARTIE \d+ :.*/s', '', $q_text_block);

            foreach ($m['answers'] as $ansKey => $ansMarker) {
                if ($ansKey === 'null') {
                    $rep = trim($q_text_block);
                } else {
                    $ansValues = array_values($m['answers']);
                    $currentIdx = array_search($ansMarker, $ansValues);
                    $nextMarker = isset($ansValues[$currentIdx + 1]) ? $ansValues[$currentIdx + 1] : null;
                    $rep = extractBetween($q_text_block, $ansMarker, $nextMarker);
                }
                
                if ($rep) {
                    $rep = trim($rep);
                    // Remove leading colons or bullets if any (verbatim rule applies but clean up extra line breaks)
                    $rep = str_replace("\"", "\\\"", $rep);
                    
                    if ($ansKey === 'null') {
                        $pos = strpos($qBlock, "'reponses' =>");
                        if ($pos !== false) {
                            $startBrace = strpos($qBlock, '[', $pos);
                            $endBrace = getClosingBracket($qBlock, $startBrace);
                            $sub = substr($qBlock, $pos, $endBrace - $pos + 1);
                            $sub = preg_replace_callback('/(\'fitness\'\s*=>\s*\[)(.*?)(\])/s', function($matches) use ($rep) {
                                 $inner = $matches[2];
                                 $inner = preg_replace("/\'none\'\s*=>\s*\".*?\"/s", "'none' => \"$rep\"", $inner);
                                 return $matches[1] . $inner . $matches[3];
                            }, $sub);
                            $qBlock = substr($qBlock, 0, $pos) . $sub . substr($qBlock, $endBrace + 1);
                        }
                    } else {
                        $ansPos = strpos($qBlock, "'$ansKey' =>");
                        if ($ansPos !== false) {
                            $startBrace = strpos($qBlock, '[', $ansPos);
                            $endBrace = getClosingBracket($qBlock, $startBrace);
                            $sub = substr($qBlock, $ansPos, $endBrace - $ansPos + 1);
                            $sub = preg_replace_callback('/(\'fitness\'\s*=>\s*\[)(.*?)(\])/s', function($matches) use ($rep) {
                                 $inner = $matches[2];
                                 $inner = preg_replace("/\'none\'\s*=>\s*\".*?\"/s", "'none' => \"$rep\"", $inner);
                                 return $matches[1] . $inner . $matches[3];
                            }, $sub);
                            $qBlock = substr($qBlock, 0, $ansPos) . $sub . substr($qBlock, $endBrace + 1);
                        }
                    }
                }
            }
        }
    }
    $new_id1_block .= "'question' =>" . $qBlock;
}

$new_content = substr($c, 0, $startPos) . $new_id1_block . substr($c, $endPos);
file_put_contents($seederPath, $new_content);
echo "Successfully updated 'none' case for 'fitness' objective in RecommendationSeeder.php for ID 1.\n";
