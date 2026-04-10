<?php

function getDynamicBlock($filePath, $questionPrefix, $answerSubstrings) {
    if (!file_exists($filePath)) return "Aucun";

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    
    $inQuestion = false;
    $collecting = false;
    $block = "";

    // Iterate through lines to find the Question
    $questionIndex = -1;
    foreach ($lines as $i => $line) {
        if (str_contains($line, 'QUESTION :') && str_contains(mb_strtolower($line), mb_strtolower($questionPrefix))) {
            $questionIndex = $i;
            break;
        }
    }

    if ($questionIndex === -1) return "Aucun";

    // From questionIndex, find the matching Answer block
    // Answer blocks might start with "SI OUI :", "MOINS DE 6H :", "1-2 PORTIONS :" etc.
    // They last until the NEXT answer block (usually uppercase followed by ':') or "QUESTION :"
    for ($i = $questionIndex + 1; $i < count($lines); $i++) {
        $line = trim($lines[$i]);
        if (str_contains($line, 'QUESTION :')) {
            break; // Next question reached
        }

        // We check if this line looks like an answer header.
        // What constitutes an answer header?
        // E.g. "OUI :", "NON :", "3-4 PORTIONS :"
        // Since it's hard to distinguish all, we look if the line contains our answer substring and ends with ":"
        // Or we just search for the specific mapped answer string.
        
        // Actually, since answer blocks are strictly defined, let's just let the caller specify the EXACT header string
        // e.g. "1-2 PORTIONS :"
        // Or we just return the WHOLE question block and do filtering?
        // Wait, the user said "Maintenant fais le pour toutes les questions"
    }

    return $block;
}
