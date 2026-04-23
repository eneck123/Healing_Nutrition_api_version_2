<?php

namespace App\Services;

class ModerateObesityRecommendationService
{
    public function getRecommendation(string $key, string $answer, array $allAnswers = []): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = str_contains($answerLower, 'oui');

        // Check if this is the Diabetes + Fitness case
        $isFitness = false;
        $isDiabetes = false;
        $isHypertension = false;
        $isCardio = false;
        $isWeightLoss = false;
        $isWeightLossLessThan5kg = false;
        $isWeightLossBetween5and10kg = false;
        $isWeightLossOver10kg = false;


        foreach ($allAnswers as $resp) {
            $text = mb_strtolower($resp['text'] ?? '');
            if (str_contains($text, 'forme physique')) {
                $isFitness = true;
            }
            if (str_contains($text, 'perdre') || str_contains($text, 'perte de poids')) {
                $isWeightLoss = true;
            }
            if (str_contains($text, 'moins de 5')) {
                $isWeightLossLessThan5kg = true;
            }
            if (str_contains($text, '5 – 10') || str_contains($text, '5-10')) {
                $isWeightLossBetween5and10kg = true;
            }
            if (str_contains($text, 'plus de 10')) {
                $isWeightLossOver10kg = true;
            }
            if (str_contains($text, 'diabète')) {
                $isDiabetes = true;
            }
            if (str_contains($text, 'hypertension') || str_contains($text, 'hta')) {
                $isHypertension = true;
            }
            if (str_contains($text, 'cardio') || str_contains($text, 'cœur') || str_contains($text, 'vasculaire')) {
                $isCardio = true;
            }
        }

        if ($isFitness && $isDiabetes) {
            return $this->getDiabetesFitnessAdvice($key, $answer, $allAnswers);
        }

        if ($isFitness && $isHypertension) {
            return $this->getHypertensionFitnessAdvice($key, $answer, $allAnswers);
        }

        if ($isFitness && $isCardio) {
            return $this->getCardioFitnessAdvice($key, $answer, $allAnswers);
        }

        if ($isFitness && !$isDiabetes && !$isHypertension && !$isCardio) {
            return $this->getFitnessNoPathologyAdvice($key, $answer, $allAnswers);
        }

        if ($isWeightLoss && !$isDiabetes && !$isHypertension && !$isCardio) {
            if ($isWeightLossLessThan5kg) {
                return $this->getWeightLossUnder5kgNoPathologyAdvice($key, $answer, $allAnswers);
            }
            if ($isWeightLossBetween5and10kg) {
                return $this->getWeightLoss5to10kgNoPathologyAdvice($key, $answer, $allAnswers);
            }
            if ($isWeightLossOver10kg) {
                return $this->getWeightLossOver10kgNoPathologyAdvice($key, $answer, $allAnswers);
            }
        }

        if ($isWeightLoss && $isWeightLossLessThan5kg && ($isDiabetes || $isHypertension)) {
            return $this->getWeightLossUnder5kgAntecedentsAdvice($key, $answer, $allAnswers);
        }

        if ($isWeightLoss && $isWeightLossLessThan5kg && $isCardio) {
            return $this->getWeightLossUnder5kgCardioAdvice($key, $answer, $allAnswers);
        }

        if ($isWeightLoss && $isWeightLossBetween5and10kg) {
            if ($isDiabetes || $isHypertension) {
                return $this->getWeightLossBetween5and10kgAntecedentsAdvice($key, $answer, $allAnswers);
            }
            if ($isCardio) {
                return $this->getWeightLossBetween5and10kgCardioAdvice($key, $answer, $allAnswers);
            }
        }

        if ($isWeightLoss && $isWeightLossOver10kg) {
            if ($isDiabetes || $isHypertension) {
                return $this->getWeightLossOver10kgAntecedentsAdvice($key, $answer, $allAnswers);
            }
            if ($isCardio) {
                return $this->getWeightLossOver10kgCardioAdvice($key, $answer, $allAnswers);
            }
        }

        // Fallback to existing logic
        switch ($key) {
            case 'antecedents_diag':
                return $this->getAntecedentsAdvice($isYes);
            case 'antecedents_lequel':
                return $this->getAntecedentsLequelAdvice($answer);
            case 'meds_lies':
            case 'meds_types':
                return $this->getMedicationAdvice($key, $answer, $allAnswers);
            case 'boissons':
                return $this->getBoissonsFrequenceAdvice($answer);
            case 'journee_typique':
                return "Nous vous remercions pour nous avoir divulgué votre journée typique car cela va nous permettre de vous orienter dans nos conseils enfin de cerner vos réalités quotidiennes en matière de nutrition.";
            case 'fruits_legumes':
                return $this->getFruitsLegumesAdvice($answer);
            case 'grignotage':
                return $this->getGrignotageAdvice($isYes);
            case 'aliments_grignotes':
                return $this->getAlimentsGrignotesAdvice($answer);
            case 'boissons_sucrees_frequence':
                return $this->getBoissonsFrequenceAdvice($answer);
            case 'sommeil':
                return $this->getSommeilAdvice($answer);
            case 'apnee':
                return $this->getApneeAdvice($isYes);
            case 'regime_recent':
                return $this->getRegimeRecentAdvice($isYes);
            case 'regime_poids_perdu':
                return $this->getRegimePoidsPerduAdvice($answer);
            case 'sedentarite':
                return $this->getSedentariteAdvice($answer);
            case 'activites_preferees':
                return $this->getActivitesPrefereesAdvice($answer);
            case 'fc_connaissance':
            case 'fc_valeur':
                return $this->getFCRAdvice($answer);
            case 'stress_ennui':
                return $this->getStressEnnuiAdvice($isYes);
            case 'finir_assiette':
                return $this->getFinirAssietteAdvice($isYes);
            case 'regime_particulier':
            case 'regime_efficacite':
                return $this->getRegimeParticulierAdvice($answer);
            case 'objectif_principal':
                return $this->getObjectifAdvice($answer);
            case 'poids_a_perdre':
            case 'niveau_changement':
                return "Votre engagement et la fixation d'objectifs réalistes sont la clé de la réussite à long terme.";
            default:
                return "Aucun";
        }
    }

    private function getMedicationAdvice(string $key, string $answer, array $allAnswers): string
    {
        if (str_contains(mb_strtolower($answer), 'non')) {
            if ($key == 'meds_types') {
                return "✅ Aucun traitement médicamenteux : Prévention par l'alimentation équilibrée.";
            }
            return "Conseils : Gestion par l'alimentation et mode de vie prioritaire.";
        }

        $medsTable = [
            ['keywords' => ['Hydrochlorothiazide', 'Indapamide', 'Chlortalidone', 'diurétiques', 'thiazidiques'], 'line' => "Classe : Diurétiques thiazidiques (ex: Hydrochlorothiazide, Indapamide...)\nRôle : Diminuent le volume sanguin → réduisent la tension\nPoints spécifiques : Souvent utilisés en première intention chez les obèses\nConseils : Boire suffisamment d’eau. Consommer des aliments riches en potassium si autorisé (banane, épinards). Limiter le sel."],
            ['keywords' => ['Enalapril', 'Ramipril', 'Périndopril', 'Lisinopril', 'IEC', 'Inhibiteurs de l’enzyme de conversion'], 'line' => "Classe : Inhibiteurs de l’enzyme de conversion (IEC)\nRôle : Dilatent les vaisseaux, protègent cœur et reins\nPoints spécifiques : Indiqués si risque de diabète ou atteinte rénale\nConseils : Limiter le sel. Maintenir un poids stable. Favoriser fruits et légumes riches en fibres. Surveiller la fonction rénale et la tension."],
            ['keywords' => ['Losartan', 'Valsartan', 'Candesartan', 'Telmisartan', 'ARA II', 'ARA', 'Antagonistes'], 'line' => "Classe : Antagonistes des récepteurs de l’angiotensine II (ARA II)\nRôle : Proches des IEC mais mieux tolérés (moins de toux)\nPoints spécifiques : Très utilisés chez les obèses hypertendus\nConseils : Même conseils que les IEC. Maintenir activité physique régulière. Éviter l’excès de sel et d’alcool."],
            ['keywords' => ['Bisoprolol', 'Métoprolol', 'Carvedilol', 'Atenolol', 'Bêta-bloquants', 'Bloquants'], 'line' => "Classe : Bêta-bloquants (ex: Bisoprolol, Métoprolol...)\nRôle : Ralentissent le cœur et réduisent la tension\nPoints spécifiques : Utiles si cardiopathie associée, mais peuvent favoriser la prise de poids\nConseils : Contrôler l’apport calorique pour éviter prise de poids. Activité physique régulière adaptée. Limiter caféine et stimulants."],
            ['keywords' => ['Amlodipine', 'Nifédipine', 'Diltiazem', 'Vérapamil', 'Antagonistes calciques', 'calciques'], 'line' => "Classe : Antagonistes calciques (ex: Amlodipine, Nifédipine...)\nRôle : Dilatent les artères, réduisent la pression\nPoints spécifiques : Intéressants si HTA isolée (surtout chez les personnes âgées)\nConseils : Limiter le sel. Maintenir un poids stable. Activité physique régulière. Surveiller gonflement des chevilles (effet secondaire possible)."],
            ['keywords' => ['Doxazosine', 'Méthyldopa', 'Clonidine', 'Alpha-bloquants', 'Antihypertenseurs centraux', 'Autres'], 'line' => "Classe : Autres (Alpha-bloquants, Antihypertenseurs centraux)\nRôle : Utilisés rarement, en cas d’échec ou de situations spécifiques\nPoints spécifiques : Plus souvent réservés à des cas complexes\nConseils : Suivi médical strict. Éviter arrêt brutal. Maintenir alimentation équilibrée et activité physique adaptée. Surveillance tensionnelle régulière."],
            ['keywords' => ['Metformine'], 'line' => "Classe : Médicaments pour baisser la glycémie (Metformine)\nConseils Spécifiques : Prendre PENDANT ou APRÈS le repas. Boire suffisamment. Éviter repas trop gras pour limiter les troubles digestifs."],
            ['keywords' => ['Glimepiride', 'Gliclazide', 'Sitagliptine', 'Dapagliflozine', 'Sulfamides'], 'line' => "Classe : Autres médicaments de glycémie (Sulfamides, etc.)\nConseils Spécifiques : Risque d'hypoglycémie → ne jamais sauter un repas. Avoir toujours une source de glucides (jus, banane) à portée de main."],
            ['keywords' => ['Insuline'], 'line' => "Classe : Insuline\nConseils Critiques : Synchronisation PARFAITE insuline-repas obligatoire. Jamais sauter de repas. Mesurer la glycémie avant d'injecter."],
            ['keywords' => ['Orlistat', 'Xenical'], 'line' => "Classe : Médicaments pour perdre du poids (Orlistat)\nConseils Spécifiques : Limiter les graisses à 15g par repas max. Répartir les graisses sur les 3 repas. Cuisson sans gras à prioriser."],
            ['keywords' => ['Liraglutide', 'Victoza', 'Saxenda'], 'line' => "Classe : Médicaments pour perdre du poids (Liraglutide)\nConseils Spécifiques : Faire de petites portions car l'estomac se vide plus lentement. Fractionner en 5-6 petits repas, manger très lentement."],
            ['keywords' => ['Statines', 'Atorvastatine', 'Simvastatine', 'Rosuvastatine', 'Cholestérol'], 'line' => "Classe : Médicaments pour le cholestérol (Statines)\nInteraction Majeure : ÉVITER COMPLÈTEMENT LE JUS DE PAMPLEMOUSSE. Prise de préférence le soir. Attention aux douleurs musculaires."]
        ];

        $foundLines = [];
        foreach ($medsTable as $med) {
            foreach ($med['keywords'] as $keyword) {
                if (stripos($answer, $keyword) !== false) {
                    $foundLines[] = $med['line'];
                    break;
                }
            }
        }

        if (count($foundLines) > 0) {
            return rtrim(implode("\n\n---\n\n", $foundLines));
        }

        return "✅ Traitement spécifique mentionné : Respectez scrupuleusement les prescriptions médicales et évitez le jus de pamplemousse par précaution avec votre alimentation.";
    }

    private function getDiabetesFitnessAdvice(string $key, string $answer, array $allAnswers): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = str_contains($answerLower, 'oui');

        switch ($key) {
            case 'antecedents_diag':
                if ($isYes) {
                    return "SECTION A : ANTÉCÉDENTS MÉDICAUX\nQuestion 1 : Antécédents de diabète type 2, hypertension, maladies cardiovasculaires\nRÉPONSE : OUI\nAdaptations nutritionnelles :\n• Réduire drastiquement le sel : maximum 5g/jour\n• Éviter les cubes Maggi, sel d'assaisonnement\n• Privilégier les épices naturelles : gingembre, ail, piment, oignon, citronnelle\n• Limiter les aliments transformés";
                }
                return "SECTION A : ANTÉCÉDENTS MÉDICAUX\nQuestion 1 : Antécédents de diabète type 2, hypertension, maladies cardiovasculaires\nRÉPONSE : NON\nAdaptations :\n• Pas de restrictions particulières au-delà du contrôle glycémique\n• Possibilité d'utiliser modérément les épices salées traditionnelles (avec parcimonie)\n• Focus sur l'équilibre glycémique\nConseils :\n• Maintenir une alimentation équilibrée préventive\n• Contrôle glycémique régulier\n• Activité physique régulière";

            case 'antecedents_lequel':
                if (stripos($answer, 'diabète') !== false) {
                    return "Question 2 : Si oui, lequel ?\nDIABÈTE DE TYPE 2\nAdaptations ultra-spécifiques :\n• Index glycémique bas prioritaire\n• Jamais de sucres rapides\n• Contrôle strict des portions de glucides\n• 3 repas réguliers + 2 collations pour stabilité glycémique\nRepas spécial diabète :\nPetit-déjeuner IG bas :\n• Bouillie de mil non sucrée + œufs + avocat + cannelle (aide à réguler glycémie)\n• Akassa + haricots riches en fibres + légumes verts\nDéjeuner contrôlé :\n• Fonio (IG bas) + sauce feuilles + poisson gras (oméga-3) + légumes\n• Quinoa local si disponible + sauce tomate maison + poulet\nDîner léger diabète :\n• Légumes verts en grande quantité + protéines + petite portion de tubercule\n• Soupe épaisse de légumes + poisson + gari minimal\nCollations anti-pic glycémique :\n• 10 arachides + 1 petite pomme verte\n• Concombre + tomates + œuf dur";
                }
                return $this->getAntecedentsLequelAdvice($answer);

            case 'meds_lies':
                if ($isYes) {
                    return "Question 3 : Prenez-vous actuellement des médicaments liés à votre antécédent ?\nRÉPONSE : OUI\nAdaptations générales :\n• Coordination horaires repas-médicaments essentielle\n• Certains médicaments nécessitent prise avec nourriture\n• Surveillance interactions aliments-médicaments\nConseils :\n• Noter les horaires de prise de médicaments\n• Adapter les horaires des repas en conséquence\n• Certains aliments peuvent interagir (exemple : pamplemousse avec certaines statines)\n• Hydratation accrue si diurétiques\nPlanning type avec médication :\n• 7h00 : Médicaments du matin + petit-déjeuner complet\n• 12h30 : Déjeuner\n• 16h00 : Collation (si médicament à prendre)\n• 19h30 : Dîner\n• 21h00 : Médicaments du soir si nécessaires";
                }
                return "Question 3 : Prenez-vous actuellement des médicaments liés à votre antécédent ?\nRÉPONSE : NON\nConseils :\n• Gestion par l'alimentation et mode de vie prioritaire\n• Surveillance accrue des marqueurs (glycémie, tension)\n• Discipline alimentaire cruciale\n• Consultations régulières pour éviter médication future";

            case 'meds_types':
                if (stripos($answer, 'glycémie') !== false || stripos($answer, 'metformine') !== false) {
                    return "Question 5 : Prenez-vous actuellement l'un des types de médicaments suivants ?\nOPTION : Médicaments pour baisser la glycémie (metformine, glimepiride…)\nAdaptations critiques :\n• Régularité absolue des repas - jamais sauter\n• Collations préventives hypoglycémie\n• Glucides à chaque repas (selon répartition niveau activité)\n• Surveillance glycémie avant/après repas\nRepas adaptés metformine :\nPetit-déjeuner (avec metformine) :\n• Bouillie de mil riche en fibres - 200g\n• Œufs brouillés - 2\n• Avocat - ⅓ unité\n• Pain complet - 1 tranche\n• Prendre metformine pendant le repas\nDéjeuner (avec metformine) :\n• Riz complet - portion selon activité\n• Sauce feuilles riches en fibres - 150g\n• Poisson grillé - 120g\n• Légumes variés\n• Prendre metformine pendant le repas\nCollations obligatoires :\n• 10h : Fruits + quelques arachides\n• 16h : Gari + sardines (si metformine cause fatigue)\nConseils metformine :\n• Prendre TOUJOURS avec nourriture\n• Augmenter fibres (réduit effets secondaires digestifs)\n• Boire beaucoup d'eau\n• Surveiller signes hypoglycémie (tremblements, sueurs)\n\nRepas adaptés sulfamides (glimepiride, gliclazide) :\nATTENTION : Risque hypoglycémie plus élevé\nPetit-déjeuner sécuritaire :\n• Bouillie de maïs - 200g\n• Œufs - 2-3\n• Avocat - ½\n• Pain complet - 1-2 tranches\n• Banane plantain bouillie - 80g\n• Glucides suffisants pour éviter hypoglycémie\nDéjeuner post-sulfamide :\n• Féculent complet généreux - selon activité\n• Protéines abondantes\n• Légumes\n• Jamais sauter ce repas\nCollations OBLIGATOIRES :\n• 10h : Substantielle (plantain + arachides)\n• 16h : Fruits + protéines\nKit anti-hypoglycémie toujours disponible :\n• Quelques morceaux de sucre\n• Jus de fruits naturel\n• Biscuits secs complets\nSignes d'alerte hypoglycémie :\n• Tremblements\n• Sueurs froides\n• Faim intense\n• Confusion\n• → Prendre immédiatement 15g glucides rapides";
                }
                if (stripos($answer, 'insuline') !== false) {
                    return "OPTION : Insuline\nAdaptations ultra-spécifiques :\n• Coordination stricte repas-injections\n• Comptage glucides précis\n• Jamais sauter de repas\n• Collations planifiées\nSchémas insuline courants et repas :\nSCHÉMA 1 : Insuline basale (1x/jour) + Metformine\nPlanning :\n• Injection basale : au coucher\n• Repas réguliers espacés de 4-5h\n• Collations entre repas\nPetit-déjeuner :\n• Bouillie de maïs - 200g (40g glucides)\n• Œufs - 2\n• Avocat\n• Pain complet - 1 tranche (15g glucides)\n• Total glucides : ~55g\nDéjeuner :\n• Riz complet - 150g (45g glucides)\n• Sauce + protéines + légumes\n• Total glucides : ~45g\nDîner :\n• Fonio - 130g (35g glucides)\n• Sauce + poisson + légumes\n• Total glucides : ~35g\nCollations :\n• 10h : 15g glucides\n• 16h : 15g glucides\n• 21h (avant coucher) : 15g glucides + protéines\nSCHÉMA 2 : Insuline rapide avant chaque repas\nAdaptations :\n• Injection 15-30min avant chaque repas\n• Glucides calculés précisément\n• Ratio insuline/glucides à respecter\nExemple ratio 1:10 (1 unité pour 10g glucides) :\nPetit-déjeuner :\n• 50g glucides → 5 unités insuline rapide\n• Bouillie + pain complet + fruit\nDéjeuner :\n• 60g glucides → 6 unités insuline rapide\n• Riz + sauce + légumes + petit dessert\nDîner :\n• 40g glucides → 4 unités insuline rapide\n• Féculent + protéines + légumes\nConseils insuline :\n• Carnet de glycémie obligatoire\n• Noter tous les repas et doses\n• Surveiller tendances hypoglycémie\n• Ajuster selon activité physique\n• Toujours avoir resucrage rapide";
                }
                if (stripos($answer, 'poids') !== false || stripos($answer, 'orlistat') !== false || stripos($answer, 'liraglutide') !== false) {
                    return "OPTION : Médicaments pour perdre du poids (orlistat, liraglutide…)\nORLISTAT (Xenical) :\nMécanisme : Bloque absorption 25% graisses alimentaires\nAdaptations critiques :\n• Réduire graisses à 15g max par repas\n• Augmenter fibres\n• Suppléments vitamines liposolubles (A, D, E, K) au coucher\n• Risque diarrhées grasses si trop de lipides\nRepas adaptés orlistat :\nPetit-déjeuner faible gras : Maximum 5g lipides\nDéjeuner faible gras : Maximum 10g lipides\nDîner faible gras : Maximum 10g lipides\nAliments à éviter absolument :\n• Sauces d'arachide, Sauce graine, Fritures, Avocat (limiter), Viandes grasses\nLIRAGLUTIDE (Victoza, Saxenda) / GLP-1 :\nMécanisme : Réduit appétit, ralentit vidange gastrique\nAdaptations :\n• Portions plus petites\n• Repas fréquents (5-6 par jour)\n• Gérer nausées fréquentes (gingembre, citron)\n• Boire entre (pas pendant) repas";
                }
                if (stripos($answer, 'tension') !== false || stripos($answer, 'iec') !== false || stripos($answer, 'ara2') !== false || stripos($answer, 'bloquants') !== false || stripos($answer, 'diurétiques') !== false) {
                    return "OPTION : Médicaments pour la tension artérielle (IEC, ARA2, bêta-bloquants…)\nIEC / ARA2 :\n• Surveiller potassium (ne pas supplémenter)\n• Réduction sel stricte\nBÊTA-BLOQUANTS :\n• Portions contrôlées (métabolisme ralenti)\n• Vigilance hypoglycémie si diabète (symptômes masqués)\nDIURÉTIQUES :\n• Compenser pertes potassium/magnésium (banane plantain, épinards, avocat)\n• Hydratation accrue (2.5-3L/jour)";
                }
                if (stripos($answer, 'cholestérol') !== false || stripos($answer, 'statines') !== false) {
                    return "OPTION : Médicaments pour le cholestérol (statines)\nSTATINES (Atorvastatine, Simvastatine...) :\n• Fibres solubles maximisées (gombo, aubergine)\n• ÉVITER PAMPLEMOUSSE (interaction dangereuse)\n• Prise le soir de préférence\nAliments STARS anti-cholestérol béninois : Gombo, Aubergine, Haricots rouges, Sardines/maquereau, Ail.";
                }
                if (stripos($answer, 'aucun') !== false) {
                    return "OPTION : Aucun de ces médicaments\nAdaptations :\n• Gestion nutritionnelle stricte cruciale\n• Prévention aggravation par alimentation\n• Discipline accrue nécessaire\n• Surveillance marqueurs santé régulière\nConseils :\n• Alimentation = médicament principal\n• Respecter strictement répartitions macronutriments\n• Activité physique non négociable\n• Contrôles médicaux fréquents\n• Objectif : éviter médication future\nFocus prévention :\n•\tPerte de poids progressive (0.5-1kg/semaine)\n•\tGlycémie à jeun < 1.26 g/L\n•\tHbA1c < 7%\n•\tTension < 130/80 mmHg\n•\tCholestérol LDL < 1g/L";
                }
                return $this->getMedicationAdvice($key, $answer, $allAnswers);

            case 'journee_typique':
                return "SECTION B : HABITUDES ALIMENTAIRES\nQuestion 1 : Pouvez-vous décrire une journée typique de vos repas et collations ?\nAdaptations et conseils :\nJAMAIS sauter le petit-déjeuner (diabète) :\n•\tMétabolisme ralenti\n•\tHypoglycémie matinale\n•\tPic glycémique au déjeuner compensatoire\n•\tStockage graisse accru\nPetit-déjeuner OBLIGATOIRE à introduire :\nSemaine 1-2 (habituation) :\n•\tLéger : 1 fruit + quelques arachides + infusion\n•\tOU : Bouillie légère 150g + 1 œuf\nSemaine 3-4 :\n•\tPetit-déjeuner complet selon niveau activité\n•\tBouillie + œufs + légumes + fruit\nRemplacer sauce graine quotidienne :\nAlternatives sauces béninoises plus légères :\n1.\tSauce tomate maison (tomates fraîches, oignon, ail, piment)\n2.\tSauce feuilles d'amarante (peu d'huile)\n3.\tSauce aubergine (aubergines, tomates, épices)\n4.\tSauce gombo (fibres, peu gras)\n5.\tSauce feuilles de baobab\nSauce graine modifiée (1-2x/semaine max) :\n•\tRéduire quantité pâte d'arachide de 50%\n•\tAjouter légumes (aubergines, gombo)\n•\tPortion contrôlée : 80ml max\n•\tAvec protéines maigres\nPlanning type réorganisé :\n•\t7h : Petit-déjeuner complet\n•\t12h30 : Déjeuner varié (rotation sauces)\n•\t16h : Collation\n•\t19h30 : Dîner léger\nRemplacer glucides raffinés :\n•\tGari → Bouillie de maïs/mil OU akassa\n•\tRiz blanc → Riz complet OU fonio OU mix riz-légumineuses\nIntroduire légumes PROGRESSIVEMENT :\nSemaine 1 :\n•\tAjouter tomates et oignons crus aux repas\n•\tConcombre en salade\nSemaine 2-3 :\n•\tLégumes cuits simples : haricots verts bouillis, carottes\n•\tSauce tomate avec légumes mixés\nSemaine 4+ :\n•\tLégumes variés à chaque repas\n•\tSauces de feuilles\n•\tLégumes grillés\nRépartition idéale des calories :\n•\tPetit-déjeuner : 30% calories journée\n•\tDéjeuner : 35% calories journée\n•\tDîner : 25% calories journée\n•\tCollations : 10% calories journée\nSolutions pratiques travailleur :\n•\tPréparer la veille : Repas du midi en portions à emporter\n•\tCollations transportables\n•\tDîner tardif mais LÉGER : Soupe de légumes, Protéines grillées, PAS de féculents lourds\n•\tManger 2-3h avant coucher minimum";

            case 'fruits_legumes':
                if (str_contains($answer, '1-2')) {
                    return "Question 2 : Combien de portions de fruits et légumes consommez-vous par jour ?\nRÉPONSE : 1-2 portions\nProblème : Largement insuffisant (recommandation : 5 portions minimum)\nConséquences :\n•\tCarences vitamines A, C, K, folates\n•\tFibres insuffisantes (constipation, glycémie instable)\n•\tAntioxydants faibles (inflammation)\n•\tRisque cardiovasculaire accru\nPlan d'augmentation progressive :\nSEMAINE 1-2 : Objectif 3 portions\n•\tPetit-déjeuner : 1 fruit (orange, papaye)\n•\tDéjeuner : Salade crudités + légumes cuits dans sauce\n•\tDîner : Sauce de feuilles\n•\tTotal : 3 portions\nSEMAINE 3-4 : Objectif 4 portions\n•\tPetit-déjeuner : 1 fruit\n•\tCollation matin : Crudités (carotte, concombre)\n•\tDéjeuner : Légumes abondants\n•\tDîner : Sauce feuilles + salade\n•\tTotal : 4 portions\nSEMAINE 5+ : Objectif 5-7 portions\n•\tPetit-déjeuner : 1 fruit\n•\tCollation : Crudités OU fruit\n•\tDéjeuner : Salade + sauce feuilles + légumes\n•\tCollation : Fruit\n•\tDîner : Légumes vapeur + sauce feuilles\n•\tTotal : 6-7 portions\nAstuces augmentation légumes :\n1.\tSauces de feuilles (amarante, baobab, épinards locaux)\n2.\tGombo dans sauces\n3.\tAubergines partout\n4.\tTomates fraîches à chaque repas\n5.\tCarottes râpées en salade\n6.\tConcombre en crudités\n7.\tHaricots verts faciles\n8.\tChampignons locaux si disponibles\nFruits béninois à privilégier (IG bas-moyen) :\n1.\tPapaye\n2.\tOrange\n3.\tPamplemousse (si pas statines)\n4.\tMangue (portions contrôlées)\n5.\tGoyave\n6.\tFruit de la passion\n7.\tPomme cannelle\nPortions définies :\n•\t1 portion légumes = 80-100g cuits OU 1 bol salade crue\n•\t1 portion fruit = 1 fruit moyen OU 150g";
                }
                if (str_contains($answer, '3-4')) {
                    return "RÉPONSE : 3-4 portions\nÉvaluation : Satisfaisant mais peut être optimisé\nConseils d'optimisation :\n•\tViser 5-7 portions\n•\tVarier couleurs (chaque couleur = nutriments différents)\n•\tAlterner cru/cuit\nVariété couleurs recommandée :\n•\tRouge (tomates) : lycopène\n•\tOrange (papaye, carotte) : bêta-carotène\n•\tVert foncé (feuilles, gombo) : fer, folates, calcium\n•\tBlanc (oignon, ail) : composés soufrés\n•\tViolet (aubergine) : anthocyanes\nMaintien et amélioration :\n•\tAjouter 1 portion crudités quotidienne\n•\tVarier types de feuilles (amarante, baobab, épinards)\n•\tFruits en collations systématiques";
                }
                return "RÉPONSE : 5 ou plus\nÉvaluation : EXCELLENT - maintenir\nConseils perfectionnement :\n•\tVarier davantage (15 légumes/fruits différents par semaine)\n•\tInclure crucifères locaux si disponibles\n•\tMaintenir crudités quotidiennes (enzymes vivantes)\n•\tAlterner feuilles différentes\nFélicitations : Habitude excellente pour :\n•\tContrôle glycémique\n•\tSanté cardiovasculaire\n•\tPerte de poids\n•\tVitalité générale";

            case 'grignotage':
                if ($isYes) {
                    return "Question 3 : Grignotez-vous entre les repas ?\nRÉPONSE : OUI\n→ Conduit à la question suivante";
                }
                return "RÉPONSE : NON\nÉvaluation selon contexte :\nSi diabète avec médicaments : PROBLÉMATIQUE\n•\tRisque hypoglycémie entre repas\n•\tGlycémie instable\n•\tRecommandation : Introduire 2 collations planifiées\nCollations obligatoires diabète :\n•\t10h : Fruit + protéines (arachides, œuf dur)\n•\t16h : Gari + sardines OU fruit + noix\nSi pas de médicaments hypoglycémiants : ACCEPTABLE\n•\tSurveillance glycémie\n•\tSi bien tolérée : continuer\n•\tSi fatigue/fringales : ajouter collations\nConseils sans grignotage :\n•\tRepas principaux plus copieux\n•\tProtéines suffisantes (satiété)\n•\tFibres abondantes\n•\tHydratation régulière (parfois soif confondue avec faim)";

            case 'aliments_grignotes':
                if (stripos($answer, 'biscuits') !== false || stripos($answer, 'bonbons') !== false || stripos($answer, 'gâteaux') !== false || stripos($answer, 'beignets') !== false) {
                    return "Question 4 : Si oui, quels aliments consommez-vous ?\nBeignets, gâteaux, bonbons :\nProblème MAJEUR :\n•\tSucres raffinés (pics glycémiques)\n•\tGraisses trans (fritures)\n•\tZéro nutriments\n•\tAggravation diabète\nRemplacement URGENT :\nAu lieu de beignets :\n•\tBanane plantain bouillie + arachides grillées\n•\tGari + sardines\n•\tAkassa + œuf dur\nAu lieu de gâteaux :\n•\tFruits frais locaux\n•\tFruits secs (modération 30g)\n•\tBoules de mil non sucrées\nAu lieu de bonbons :\n•\tFruits secs naturellement sucrés (dattes 2-3)\n•\tMangue séchée (sans sucre ajouté)\n•\tPapaye fraîche\nTransition progressive (sevrage) :\nSemaine 1-2 :\n•\tRéduire de 50%\n•\tRemplacer 1 grignotage malsain/jour par fruit\nSemaine 3-4 :\n•\tRéduire à 1 écart/semaine\n•\tCollations saines systématiques\nSemaine 5+ :\n•\tÉlimination complète\n•\tHabitude collations saines ancrée";
                }
                if (stripos($answer, 'chips') !== false || stripos($answer, 'salées') !== false || stripos($answer, 'arachides') !== false) {
                    return "Arachides salées, chips :\nProblèmes :\n•\tSel excessif (hypertension)\n•\tGraisses de friture (chips)\n•\tCalories denses\n•\tPortions non contrôlées\nRemplacements :\nAu lieu d'arachides salées :\n•\tArachides grillées SANS sel (portion 30g)\n•\tNoix de cajou naturelles (25g)\n•\tMélanges noix variées non salées\nAu lieu de chips :\n•\tBâtonnets légumes crus (carotte, concombre, poivron)\n•\tGari + piment (croquant, savoureux)\n•\tPlantain séché maison (four, pas frit)\nTechnique désensibilisation sel :\n•\tSemaine 1 : Mélanger 50% salées + 50% non salées\n•\tSemaine 2 : 25% salées + 75% non salées\n•\tSemaine 3+ : 100% non salées + épices (piment, paprika)";
                }
                return "Fruits, noix : EXCELLENT choix\nOptimisations mineures :\nPortions noix :\n•\tMaximum 30-40g/jour (caloriques)\n•\tPeser pour contrôle\n•\tVarier types\nFruits :\n•\tPrivilégier IG bas-moyen (papaye, orange)\n•\tLimiter mangue, ananas très mûrs (IG élevé)\n•\tPortions : 150-200g\n•\tÉviter jus (préférer fruits entiers - fibres)\nTiming optimal :\n•\tFruits : collation matin (énergie)\n•\tNoix : collation après-midi (satiété longue durée)\nFélicitations : Habitude à maintenir absolument";

            case 'boissons':
                if (stripos($answer, 'tous les jours') !== false || stripos($answer, 'quotidien') !== false) {
                    return "Question 5 : À quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?\nRÉPONSE : Tous les jours\nALERTE ROUGE - Impact majeur diabète et obésité\nBoissons sucrées quotidiennes :\nProblèmes :\n•\tSucres liquides = absorption ultra-rapide\n•\tPics glycémiques sévères\n•\tCalories vides (zéro nutriment)\n•\tHbA1c augmentée\n•\tRésistance insuline aggravée\n•\tPrise de poids abdominale\nSi sodas quotidiens :\n•\t1 canette (33cl) = 35g sucre = 7 morceaux de sucre\n•\tGlycémie +2g/L en 30min\n•\tInsuline en pic\n•\tStockage graisse abdominale direct\nPlan sevrage URGENT :\nSemaine 1 : Réduction 50%\n•\tSi 2 sodas/jour → 1 soda/jour\n•\tDiluer avec eau gazeuse\n•\tRemplacer 1 par eau citronnée\nSemaine 2 : Réduction 75%\n•\t1 soda tous les 2 jours\n•\tAlternatives : eau infusée (gingembre, citron, citronnelle)\nSemaine 3 : Réduction 90%\n•\t1 soda tous les 3-4 jours (occasions)\nSemaine 4+ : Élimination\n•\tZéro boisson sucrée\n•\tHabitude nouvelles boissons\nAlternatives boissons béninoises :\n1.\tBissap naturel sans sucre (hibiscus - antioxydants)\n2.\tGnamakoudji sans sucre (gingembre - anti-inflammatoire)\n3.\tEau de citronnelle\n4.\tThé vert/kinkeliba sans sucre\n5.\tEau infusée fruits (orange, citron - pas de pulpe)\n6.\tEau de coco naturelle (électrolytes - modération, glucides naturels)\nSi besoin sucré :\n•\tStevia naturelle (édulcorant sans calories)\n•\tOU petit goût sucré avec 1 cuillère miel dans grand volume (dilué)\nAlcool quotidien :\nProblèmes diabète + obésité :\n•\tCalories vides (7 cal/g alcool)\n•\tHypoglycémie différée (dangereuse)\n•\tStockage graisse abdominale (\"bedaine de bière\")\n•\tInterférence métabolisme médicaments\n•\tFoie surchargé\n•\tDéshydratation\nQuantités dangereuses :\n•\t2 verres/jour homme = risque élevé\n•\t1 verre/jour femme = risque élevé\n•\tDiabète : idéalement zéro\nPlan réduction alcool :\nSemaine 1-2 :\n•\tRéduire à 4-5 jours/semaine\n•\tJours sans alcool : lundi, mercredi\n•\tQuantité : max 2 verres les jours autorisés\nSemaine 3-4 :\n•\tRéduire à 2-3 jours/semaine\n•\tWeekend uniquement\n•\tQuantité : max 2 verres\nSemaine 5+ :\n•\tOccasions spéciales uniquement (1-2x/mois)\n•\tOU élimination complète (idéal)\nAlternatives sociales :\n•\tBissap non sucré (couleur, festif)\n•\tEau gazeuse + citron (rafraîchissant)\n•\tJus de gingembre maison\n•\tCocktails sans alcool (mocktails) : jus fruits frais + eau gazeuse\nConseils si consommation occasionnelle maintenue :\n•\tJAMAIS à jeun (hypoglycémie)\n•\tToujours avec repas complet\n•\tSurveiller glycémie après (risque hypoglycémie 12-24h après)\n•\tHydratation double (1 verre eau pour 1 verre alcool)\n•\tPrivilégier vin rouge sec (si choix) plutôt que bière/alcools forts\n•\tÉviter totalement si médicaments certains";
                }
                if (stripos($answer, 'semaine') !== false) {
                    return "RÉPONSE : Une fois par semaine\nÉvaluation : Acceptable mais optimisable\nBoissons sucrées 1x/semaine :\n•\tImpact modéré\n•\tMoment \"plaisir\" contrôlé acceptable\n•\tSurveiller que ne dérive pas vers plus fréquent\nConseils :\n•\tChoisir petit format (25cl max)\n•\tConsommer avec repas complet (ralentit absorption)\n•\tCompenser par activité physique ce jour-là\n•\tSurveiller glycémie après\nAlcool 1x/semaine :\n•\tAcceptable si modéré (1-2 verres)\n•\tToujours avec repas\n•\tPas si médicaments incompatibles\n•\tHydratation accrue";
                }
                if (stripos($answer, 'occasion') !== false) {
                    return "RÉPONSE : Occasionnellement\nÉvaluation : BON contrôle\nDéfinition occasionnel : 2-3x/mois maximum\nConseils maintien :\n•\tGarder cette fréquence\n•\tOccasions spéciales uniquement\n•\tModération quantité\n•\tCompensation activité";
                }
                return "RÉPONSE : Jamais\nÉvaluation : EXCELLENT - OPTIMAL pour diabète\nFélicitations : Habitude idéale\nBénéfices :\n•\tContrôle glycémique facilité\n•\tPerte de poids accélérée\n•\tHydratation optimale\n•\tSanté hépatique préservée\n•\tSommeil amélioré\nMaintien :\n•\tContinuer boissons naturelles\n•\tVarier infusions pour plaisir\n•\tModèle à suivre";

            case 'sommeil':
                if (stripos($answer, 'moins de 6') !== false || stripos($answer, 'moins 6') !== false) {
                    return "SECTION C : COMPORTEMENTS ET BIEN-ÊTRE\nQuestion 1 : Combien d'heures de sommeil avez-vous par nuit ?\nRÉPONSE : Moins de 6h\nALERTE - Impact MAJEUR diabète et poids\nConséquences manque sommeil :\n•\tRésistance insuline augmentée de 30%\n•\tCortisol élevé (hormone stress → stockage graisse abdominale)\n•\tGhréline augmentée (hormone faim)\n•\tLeptine diminuée (hormone satiété)\n•\tFringales sucrées accrues\n•\tMétabolisme ralenti\n•\tFatigue → sédentarité\n•\tPrise de poids facilitée\n•\tHbA1c augmentée\nObjectif : Atteindre 7-8h progressivement\nPlan amélioration sommeil :\nSEMAINE 1-2 : +30min (passer à 6h30)\n•\tCoucher 30min plus tôt OU lever 30min plus tard\n•\tRituel pré-coucher : infusion citronnelle, lecture\nSEMAINE 3-4 : +1h (passer à 7h)\n•\tCoucher 1h plus tôt progressivement\n•\tLimiter écrans 1h avant (lumière bleue perturbe)\nSEMAINE 5+ : 7-8h\n•\tRoutine fixe : coucher/lever mêmes heures (même weekend)\n•\tChambre fraîche, sombre, silencieuse\nTechniques amélioration qualité :\n1.\tDîner léger 3h avant coucher (digestion complète)\n2.\tInfusion calmante : citronnelle, verveine, tilleul\n3.\tPas de caféine après 14h\n4.\tActivité physique matinale/après-midi (pas le soir)\n5.\tRespiration profonde avant coucher (10 cycles)\n6.\tTempérature fraîche chambre (18-20°C)\n7.\tZéro écran 1h avant (téléphone, télé, ordinateur)\n8.\tLecture légère si besoin occuper esprit\nAdaptations repas pour sommeil :\nDîner pro-sommeil (18h-19h max) :\n•\tGlucides modérés (favorisent sérotonine → mélatonine)\n•\tProtéines légères (pas viandes lourdes)\n•\tPas de graisses lourdes (digestion difficile)\n•\tÉviter stimulants (piment excessif, café, thé)\nExemple dîner sommeil :\n•\tFonio - 120g\n•\tSauce légère de feuilles\n•\tPoisson grillé - 100g\n•\tLégumes vapeur\n•\tInfusion citronnelle après\nCollation pré-sommeil (si fringale - 21h max) :\n•\tBanane (magnésium, tryptophane) + 5 arachides\n•\tOU lait fermenté local tiède (calcium, tryptophane)\nLien diabète-sommeil :\n•\tSommeil <6h : Risque diabète type 2 +28%\n•\tChaque heure gagnée : Glycémie -0.2g/L\n•\tAmélioration sommeil = amélioration HbA1c mesurable";
                }
                if (str_contains($answer, '6') && (str_contains($answer, '7') || str_contains($answer, '-7'))) {
                    return "RÉPONSE : 6h-7h\nÉvaluation : Limite basse acceptable, optimisable\nObjectif : Viser 7-8h (optimal)\nAméliorations suggérées :\n•\tAjouter 30-60min progressivement\n•\tAméliorer qualité (techniques ci-dessus)\n•\tSurveiller si réveils nocturnes (apnée?)\nConseils :\n•\tCoucher 22h-23h max\n•\tLever 6h-7h\n•\tRégularité weekends aussi\n•\tSieste 20min après-midi si besoin (pas plus - perturbe nuit)";
                }
                if (stripos($answer, 'plus de 9') !== false || stripos($answer, '+9') !== false) {
                    return "RÉPONSE : Plus de 9h\nÉvaluation : Possiblement excessif - À investiguer\nCauses possibles :\n•\tApnée du sommeil (sommeil non réparateur)\n•\tDépression\n•\tHypothyroïdie\n•\tMauvaise qualité sommeil (réveils fréquents)\n•\tSédentarité excessive\nSi somnolence diurne malgré 9h+ : CONSULTER\nTests recommandés :\n•\tDépistage apnée du sommeil\n•\tBilan thyroïde\n•\tÉvaluation dépression\nOptimisations :\n•\tVérifier qualité plutôt que quantité\n•\tActivité physique régulière (améliore sommeil)\n•\tExposition lumière naturelle matinale\n•\tRoutine lever régulière";
                }
                if (str_contains($answer, '8') || str_contains($answer, '9')) {
                    return "RÉPONSE : 8h-9h\nÉvaluation : OPTIMAL\nFélicitations : Durée idéale pour :\n•\tRégulation hormonale\n•\tContrôle glycémique\n•\tGestion poids\n•\tRécupération\nMaintien :\n•\tContinuer routine actuelle\n•\tQualité autant qu'quantité\n•\tSurveiller si somnolence diurne (malgré 8h) → apnée du sommeil possible";
                }
                return "Viser 7-8h de sommeil de qualité. Éviter les écrans 1h avant le coucher.";

            case 'apnee':
            case 'apnee_sommeil':
                if ($isYes) {
                    return "Question 2 : Avez-vous l'apnée du sommeil ?\nRÉPONSE : OUI\nIMPACT MAJEUR diabète et obésité\nApnée du sommeil → Diabète :\n•\tHypoxie nocturne (manque oxygène) → résistance insuline\n•\tFragmentation sommeil → cortisol élevé\n•\tInflammation systémique\n•\tRisque diabète type 2 +250%\n•\tHbA1c augmentée de 0.5-1%\nApnée → Obésité :\n•\tFatigue → sédentarité\n•\tHormones faim perturbées\n•\tMétabolisme ralenti\n•\tCercle vicieux (obésité aggrave apnée)\nTraitement ESSENTIEL :\n•\tCPAP (pression positive continue) si prescrit → UTILISER systématiquement\n•\tObservance CPAP cruciale (toute la nuit, chaque nuit)\n•\tPerte de poids améliore/résout apnée modérée\nAdaptations alimentaires spécifiques apnée :\nObjectif perte poids (améliore apnée) :\n•\tDéficit calorique modéré (300-500 cal)\n•\tPerte 5-10% poids corporel = amélioration apnée significative\n•\tPerte 10%+ = possible résolution apnée légère-modérée\nDîner TRÈS léger (crucial) :\n•\tAu moins 3-4h avant coucher\n•\tPas de graisses lourdes (reflux aggrave apnée)\n•\tPas d'alcool (relaxe muscles gorge, aggrave apnée)\n•\tPosition semi-assise après dîner (si reflux)\nExemple dîner anti-reflux/apnée :\n•\tSoupe claire de légumes verts\n•\tPoisson grillé - 100g\n•\tPas de féculents lourds\n•\tPas de sauces grasses\n•\tPas de tomates (acide - reflux)\n•\tPas de piment excessif\nAliments à ÉVITER le soir (apnée) :\n•\tAlcool (relaxe voies aériennes)\n•\tSédatifs naturels (valériane)\n•\tRepas copieux/gras (reflux)\n•\tChocolat (caféine)\n•\tMenthe (relaxe sphincter oesophage)\nPosition sommeil :\n•\tDormir sur le côté (pas sur le dos)\n•\tTête surélevée 30° (oreillers)\nSuppléments potentiellement utiles :\n•\tMagnésium (relaxation musculaire)\n•\tVitamine D (si carence - inflammation)\nSuivi : Étude sommeil de contrôle après perte poids significative";
                }
                return "RÉPONSE : NON\nPrévention :\n•\tMaintenir poids santé\n•\tÉviter alcool excessif\n•\tDormir sur le côté\n•\tSurveiller symptômes (ronflement, fatigue diurne, réveils essoufflement)\nSignes d'alerte apnée (consulter si présents) :\n•\tRonflement fort et irrégulier\n•\tPauses respiratoires observées (par partenaire)\n•\tRéveils en suffocation\n•\tFatigue diurne intense (malgré sommeil suffisant)\n•\tSomnolence au volant\n•\tMaux de tête matinaux\n•\tNycturie (uriner la nuit fréquemment)\nSi obésité modérée : Risque apnée élevé → Dépistage recommandé";

            case 'regime_recent':
                if ($isYes) {
                    return "Question 3 : Avez-vous récemment fait un régime de perte du poids ?\nRÉPONSE : OUI\n→ Conduit à la question suivante";
                }
                return "RÉPONSE : NON\nConseils démarrage :\nPremière fois perte de poids :\n•\tObjectif réaliste : 0.5-1 kg/semaine\n•\tPas de \"régime\" temporaire → changement mode de vie permanent\n•\tPatience et régularité\n•\tSuivi médical régulier\nAttentes réalistes :\n•\tMois 1-2 : Perte plus rapide (eau + graisse) 2-4kg\n•\tMois 3+ : Perte stable 0.5-1kg/semaine\n•\tObjectif 6 mois : -10 à -15kg (excellent)\n•\tObjectif 1 an : -15 à -20kg (optimal)\nBénéfices attendus perte 5-10% poids corporel :\n•\tHbA1c réduite de 0.5-1%\n•\tTension artérielle baissée\n•\tCholestérol amélioré\n•\tApnée sommeil améliorée\n•\tDouleurs articulaires réduites\n•\tÉnergie augmentée\nApproche recommandée :\n•\tAlimentation selon tableaux macronutriments\n•\tActivité physique progressive\n•\tSommeil suffisant\n•\tGestion stress\n•\tSuivi régulier (pesée hebdomadaire)";

            case 'sedentarite':
                if (stripos($answer, 'moins de 4') !== false || stripos($answer, 'moins 4') !== false) {
                    return "SECTION D : ACTIVITÉ PHYSIQUE\nQuestion 2 : Combien de temps passez-vous en position assise chaque jour ?\nRÉPONSE : Moins de 4h\nÉvaluation : EXCELLENT - Actif quotidiennement\nMaintien :\n•\tContinuer mode de vie actif\n•\tBénéfices santé maximisés\n•\tRisque métabolique minimal\nConseils :\n•\tMaintenir cette activité\n•\tAjouter exercice structuré si pas déjà fait\n•\tModèle de vie anti-diabète";
                }
                if (stripos($answer, '4') !== false && stripos($answer, '6') !== false) {
                    return "RÉPONSE : 4h-6h\nÉvaluation : Acceptable - Peut être amélioré\nStratégies réduction :\nAu travail (si bureau) :\n•\tLever toutes les 30min (1-2min marche)\n•\tAppels téléphoniques debout\n•\tPause déjeuner active (marche 10-15min)\n•\tEscaliers au lieu d'ascenseur\n•\tBureau debout partiel (si possible)\nÀ domicile :\n•\tTélévision → Limite 1-2h max\n•\tPublicités → Exercices légers (squats, étirements)\n•\tTâches ménagères actives\n•\tJardinage\n•\tJeux actifs avec enfants\nObjectif : Réduire à 4h ou moins";
                }
                if (stripos($answer, '6') !== false && stripos($answer, '8') !== false) {
                    return "RÉPONSE : 6h-8h\nÉvaluation : Sédentarité modérée - Action requise\nImpact santé :\n•\tRisque diabète accru\n•\tMétabolisme ralenti\n•\tCirculation sanguine réduite\n•\tDouleurs dorsales\nPlan réduction urgente :\nBreaks assis obligatoires :\n•\tToutes les 25-30min : Lever 2-3min\n•\tToutes les heures : Marche 5min OU exercices\nExercices breaks bureau (2min chaque) :\n1.\tMarche sur place\n2.\tMontées genoux\n3.\tÉtirements bras/dos\n4.\tFlexions jambes (squats légers)\n5.\tRotations bassin\nCompensations :\n•\tExercice structuré quotidien (45-60min) OBLIGATOIRE\n•\tMarche après déjeuner/dîner (15min)\n•\tActivités weekend très actives\nObjectif : Réduire à 4-6h sous 3 mois";
                }
                if (stripos($answer, '8h') !== false || stripos($answer, 'plus') !== false || stripos($answer, '+8') !== false) {
                    return "RÉPONSE : Plus de 8h\nALERTE - Sédentarité sévère\nRisques :\n•\tRisque diabète type 2 +90%\n•\tMortalité cardiovasculaire +50%\n•\t\"Assis nouveau tabac\"\n•\tMétabolisme quasi-arrêté\n•\tObésité abdominale accélérée\nPlan action URGENT :\nBreaks debout MAXIMISÉS :\n•\tToutes les 20min : Lever minimum 1min\n•\tAlarmes téléphone : Rappels automatiques\n•\tPostes travail alternés : Assis/debout si possible\nExercices micro-pauses (1-2min) :\n1.\tMinutes impaires : Lever, marcher sur place\n2.\tMinutes paires : Étirements debout\n3.\tChaque heure : Marche réelle 5min (couloir, extérieur)\nCompensations MAXIMALES :\n•\tExercice matin : 30min AVANT travail (crucial)\n•\tExercice soir : 30min APRÈS travail\n•\tWeekends : Activités 2-3h cumulées\nModifications travail :\n•\tDemander bureau debout (si employeur possible)\n•\tRéunions marchées (si culture entreprise permet)\n•\tDéjeuner actif : Marche 20-30min\n•\tParking loin : Marche supplémentaire\n•\tÉtage escaliers : Systématique\nAdaptations domicile :\n•\tTélé limitée : 1h max\n•\tPublicités = exercices\n•\tTâches actives : Ménage énergique\n•\tTéléphone = marche\n•\tLoisirs actifs : Pas canapé\nObjectif : Réduire sous 6h en 3-6 mois\nRepas adaptés sédentarité :\n•\tPortions réduites (dépense faible)\n•\tProtéines augmentées (préservent muscle)\n•\tCollations standing (manger debout)";
                }
                return "Réduire le temps assis. Pauses actives toutes les heures.";

            case 'activites_preferees':
                if (stripos($answer, 'marche') !== false) {
                    return "Question 3 : Quelles activités physiques appréciez-vous ?\nMarche :\nÉvaluation : Excellent choix (accessible, sûr, efficace)\nOptimisation marche diabète/obésité :\nTypes marche :\n1. Marche modérée quotidienne (de base) :\n•\t30-45min\n•\tRythme confortable\n•\tBénéfices cardiovasculaires\n•\tBrûle calories modérément\n2. Marche rapide/sportive :\n•\t20-30min\n•\tRythme soutenu (essoufflement léger)\n•\tBras actifs (balancier)\n•\tBrûle plus calories\n3. Marche intervalles (optimal diabète) :\n•\tAlternance vitesse lente/rapide\n•\tExemple : 2min rapide, 2min modéré, répéter\n•\tAmélioration sensibilité insuline ++\n•\tBrûle graisse abdominale\n4. Marche en pente/escaliers :\n•\tMonte fréquence cardiaque\n•\tRenforce jambes/fessiers\n•\tBrûle plus calories\nTiming optimal marche diabète :\n•\tAprès repas (meilleur) : 15-30min après déjeuner/dîner\n•\tEffet : Réduit pic glycémique post-repas de 30%\n•\tIdéal : 3 marches quotidiennes (après chaque repas)\nObjectifs chiffrés :\n•\tDébutant : 5,000 pas/jour\n•\tIntermédiaire : 7,500 pas/jour\n•\tOptimal diabète : 10,000 pas/jour";
                }
                if (stripos($answer, 'yoga') !== false) {
                    return "Yoga :\nÉvaluation : Très bénéfique (stress, flexibilité, force)\nBénéfices yoga diabète/obésité :\n•\tRéduction stress → cortisol baissé\n•\tAmélioration sensibilité insuline\n•\tRenforcement musculaire doux\n•\tFlexibilité (prévention blessures)\n•\tMeilleur sommeil\n•\tConnexion corps-esprit\n•\tGestion alimentation émotionnelle\nTypes yoga recommandés :\n1. Hatha Yoga (débutants) : Postures statiques, Respiration, Accessible\n2. Vinyasa Yoga (intermédiaire) : Flux dynamique, Cardio léger, Renforcement\n3. Yin Yoga (récupération) : Postures longues (3-5min), Relaxation profonde\n4. Yoga restauratif (stress/insomnie) : Postures supportées, Relaxation maximale\nComplémentation yoga :\nYoga seul = insuffisant cardio/perte poids\n•\tAjouter marche/cardio 3-4x/semaine\n•\tYoga 2-3x/semaine (complément)\nPostures yoga anti-diabète (stimulent pancréas) :\n1.\tDhanurasana (arc) - Masse organes abdominaux\n2.\tPaschimottanasana (pince assise) - Pancréas stimulé\n3.\tArdha Matsyendrasana (torsion assise) - Foie/pancréas\n4.\tBhujangasana (cobra) - Glandes surrénales\n5.\tShavasana (relaxation) - Stress réduit\nRespiration (Pranayama) anti-stress :\n•\tNadi Shodhana (respiration alternée) - Équilibre nerveux\n•\tBhramari (abeille) - Apaise mental\n•\t4-7-8 : Inspire 4s, retiens 7s, expire 8s";
                }
                if (stripos($answer, 'natation') !== false) {
                    return "Natation :\nÉvaluation : EXCELLENT choix (complet, doux articulations)\nBénéfices natation diabète/obésité :\n•\tCardio complet sans impact\n•\tBrûle calories ++\n•\tTous muscles sollicités\n•\tDoux articulations (idéal surpoids)\n•\tAmélioration sensibilité insuline\n•\tStress réduit\nTypes natation :\n1. Nage continue modérée : 20-30min, Rythme confortable, Débutants\n2. Natation intervalles : Alternance intensités, Brûle plus calories\n3. Aquagym/aquabike : Exercices dans eau, Résistance naturelle, Très efficace obésité\nPrécautions diabète :\n•\tSurveiller glycémie avant (éviter hypoglycémie)\n•\tCollation si glycémie <1.2 g/L\n•\tHydratation (on transpire dans eau aussi)\n•\tPied bien séché (prévention mycoses)";
                }
                if (stripos($answer, 'vélo') !== false) {
                    return "Vélo :\nÉvaluation : Excellent cardio, préserve articulations\nBénéfices vélo diabète/obésité :\n•\tCardio efficace\n•\tBas impact genoux/chevilles\n•\tTransport actif possible\n•\tRenforcement jambes\n•\tCalories brûlées ++\nTypes vélo :\n1. Vélo loisir/transport : Rythme modéré, Déplacements quotidiens\n2. Vélo sport : Intensité élevée, Sorties structurées\n3. Vélo appartement/salle : Contrôle intensité, Sécurité\n4. Vélo intervalles (HIIT) : Très efficace perte graisse\nSécurité Bénin :\n•\tCasque obligatoire\n•\tVêtements visibles\n•\tÉviter heures pointe\n•\tHydratation ++";
                }
                if (stripos($answer, 'danse') !== false) {
                    return "Danse :\nÉvaluation : Très bénéfique (cardio + plaisir = adhésion)\nBénéfices danse diabète/obésité :\n•\tCardio excellent\n•\tPlaisir → adhésion long terme\n•\tSocial (motivation)\n•\tCoordination\n•\tStress réduit\n•\tCalories brûlées ++\nTypes danse béninoises/africaines :\n1. Danses traditionnelles : Ziglibity, Tchink system, Agbadja, Énergiques, cardio ++\n2. Danses modernes : Afrobeat, Coupé-décalé, Zumba, Très cardio\n3. Danses douces : Valse, Danse de salon, Débutants/personnes âgées\nFréquence recommandée :\n•\t3-5x/semaine\n•\t30-60min/session\n•\tIntensité modérée-élevée";
                }
                if (stripos($answer, 'football') !== false || stripos($answer, 'collectif') !== false) {
                    return "Football/sports collectifs :\nÉvaluation : Très cardio, social (attention blessures)\nBénéfices :\n•\tCardio intense\n•\tSocial/équipe (motivation)\n•\tPlaisir compétition\n•\tIntervalles naturels\nPrécautions diabète/obésité/âge :\n•\tRisque blessures articulaires (surpoids)\n•\tÉchauffement prolongé crucial\n•\tAdaptation intensité\n•\tSurveillance glycémie (exercice intense imprévisible)\nRecommandations :\n•\tFootball loisir (pas compétition intense)\n•\tÉviter contacts violents\n•\tPorter protections (genoux, chevilles)\n•\tPartenaires informés diabète\nFréquence :\n•\t2-3x/semaine max (récupération)\n•\tCompléter par activités douces (marche, yoga)";
                }
                if (stripos($answer, 'aucun') !== false || stripos($answer, 'rien') !== false) {
                    return "Aucune activité ne m'intéresse :\nApproche : Exploration progressive\nStratégies motivation :\n1. Commencer micro :\n•\t5min marche quotidienne\n•\tAugmenter 1min/semaine\n•\tAucune pression\n2. Fonctionnel (pas \"sport\") :\n•\tMénage énergique\n•\tJardinage\n•\tJeux enfants\n•\tDanser musique préférée seul\n3. Social :\n•\tMarche avec ami\n•\tGroupe/club\n•\tCompétition amicale\nMindset changement :\n•\tPas besoin \"aimer\" sport\n•\tJuste bouger corps quotidiennement\n•\tTrouver activité \"moins détestée\"\n•\tFocus bénéfices (santé, énergie, sommeil) pas plaisir immédiat\nActivités \"non-sportives\" efficaces :\n•\tMarche marché/courses\n•\tMénage maison\n•\tLaver voiture\n•\tJardinage/potager\n•\tBricolage\n•\tJouer enfants/petits-enfants";
                }
                return "Toute activité physique régulière est bénéfique. L'important est la régularité et le plaisir.";

            case 'fc_connaissance':
                if ($isYes) {
                    return "Question 4 : Connaissez-vous votre fréquence cardiaque au repos ?\nRÉPONSE : OUI\n→ Conduit à question suivante";
                }
                return "RÉPONSE : NON\nImportance fréquence cardiaque repos (FCR) :\n•\tIndicateur santé cardiovasculaire\n•\tGuide intensité exercice\n•\tSuivi progrès fitness\nComment mesurer FCR :\nMéthode 1 : Manuelle\n•\tAu réveil, encore au lit\n•\tDoigts sur poignet (pouls radial) ou cou (carotide)\n•\tCompter battements 60 secondes\n•\tOu 30s × 2\n•\tRépéter 3 matins consécutifs\n•\tMoyenne = FCR\nMéthode 2 : Tensiomètre automatique\n•\tAffiche fréquence cardiaque\n•\tAu repos, calme\nMéthode 3 : Montre connectée/bracelet\n•\tTracking automatique\n•\tHistorique\nValeurs normales FCR :\n•\tAdulte moyen : 60-100 bpm\n•\tBien entraîné : 40-60 bpm\n•\tSédentaire/obésité : Souvent 80-100 bpm\n•\tDiabète : Parfois élevée (neuropathie autonome)\nObjectif : Diminuer FCR avec entraînement régulier\n•\tAmélioration 5-10 bpm = progrès cardiovasculaire significatif";

            case 'fc_valeur':
                if (is_numeric($answer)) {
                    $fcVal = (int) $answer;
                    if ($fcVal >= 40 && $fcVal <= 75) {
                        return "Question 5 : Si oui, veuillez-nous la donner ?\nÉvaluation : EXCELLENT - Santé cardiovasculaire bonne\nInterprétation :\n•\tNormal-optimal\n•\tCœur efficace\n•\tCondition physique correcte\nZones fréquence cardiaque exercice :\n•\tFC maximale théorique : Formule de Tanaka : FCmax ≈ 208 − 0,7 × âge\nZones entraînement :\n1.\tÉchauffement (50-60% FCmax)\n2.\tBrûle graisse (60-70% FCmax)\n3.\tCardio modéré (70-80% FCmax)\n4.\tCardio intense (80-90% FCmax)\n5.\tMax effort (90-100% FCmax)\nRecommandations diabète/obésité :\n•\tPrincipalement zone 2-3 (brûle graisse, cardio modéré)\n•\tÉviter zone 5 (stress excessif)\n•\tZone 4 occasionnelle (intervalles courts)\nMaintien :\n•\tContinuer activité régulière\n•\tObjectif : Maintenir ou légèrement diminuer";
                    }
                    if ($fcVal >= 76 && $fcVal <= 99) {
                        return "Évaluation : Élevée - Action recommandée\nInterprétation :\n•\tSédentarité probable\n•\tCondition cardiovasculaire à améliorer\n•\tPossible stress chronique\n•\tDiabète/obésité impact\nObjectif : Réduire à 70-75 bpm en 3-6 mois\nStratégies réduction FCR :\n1. Exercice cardio régulier\n•\t5x/semaine minimum\n•\t30-45min\n•\tZone modérée\n•\tEffet : -5 à -15 bpm en 3 mois\n2. Perte de poids\n•\tChaque 5kg perdus : -2 à -3 bpm\n•\tRéduction graisse viscérale améliore fonction cardiaque\n3. Réduction stress\n•\tMéditation/respiration\n•\tYoga\n•\tSommeil suffisant\n•\tEffet : -3 à -5 bpm\n4. Hydratation\n•\tDéshydratation augmente FCR\n•\t2-3L eau/jour\n5. Arrêt stimulants\n•\tCafé excessif\n•\tBoissons énergisantes\n•\tTabac si applicable\nSuivi :\n•\tMesurer FCR hebdomadaire\n•\tObjectif -1 bpm/semaine\n•\tSurveillance progrès motivation";
                    }
                    if ($fcVal >= 100) {
                        return "ALERTE - FCR très élevée\nCauses possibles :\n•\tSédentarité sévère\n•\tObésité significative\n•\tDéconditionnement\n•\tStress chronique\n•\tAnémie\n•\tNeuropathie autonome diabétique\n•\tProblème thyroïde\n•\tMédication (certains antidiabétiques)\nACTION REQUISE :\n1.\tConsultation médicale - Bilan cardiovasculaire\n2.\tECG recommandé\n3.\tBilan sanguin (thyroïde, anémie)\n4.\tÉchocardiographie si persistance\nSi causes fonctionnelles (pas pathologie) :\nProgramme réduction FCR progressive :\nPhase 1 (Mois 1-2) : Activité très douce\n•\tMarche lente 10-15min quotidienne\n•\tPas d'intensité élevée\n•\tObjectif : Habituation\nPhase 2 (Mois 3-4) : Augmentation progressive\n•\tMarche 20-30min\n•\tIntensité faible-modérée\n•\tFC surveiller ne pas dépasser 130-140 bpm\nPhase 3 (Mois 5-6) : Structuration\n•\tCardio 30-40min\n•\tZone modérée\n•\t5x/semaine\nAutres interventions :\n•\tPerte poids prioritaire (réduit charge cardiaque)\n•\tStress management intensif\n•\tSommeil optimisé\n•\tHydratation\n•\tArrêt stimulants complet\nSuivi :\n•\tFCR hebdomadaire\n•\tObjectif -2 bpm/mois\n•\t6-12 mois atteindre <80 bpm\n•\tConsultations régulières";
                    }
                }
                return "Maintenir une FCR basse par une activité physique régulière.";

            case 'stress_ennui':
                if ($isYes) {
                    return "SECTION E : COMPORTEMENTS ALIMENTAIRES\nQuestion 1 : Mangez-vous souvent par stress ou ennui ?\nRÉPONSE : OUI\nProblème : Alimentation émotionnelle\nMécanisme :\n•\tStress → Cortisol élevé → Fringales sucrées/grasses\n•\tEnnui → Distraction par nourriture\n•\tRéconfort temporaire → Culpabilité → Cercle vicieux\n•\tCalories excédentaires non contrôlées\n•\tChoix aliments malsains généralement\nIdentification triggers :\nJournal émotionnel 2 semaines :\n•\tNoter chaque épisode alimentation émotionnelle\n•\tHeure\n•\tÉmotion ressentie (stress, ennui, tristesse, colère, solitude)\n•\tAliments consommés\n•\tQuantité\n•\tSatisfaction après\n•\t→ Identifier patterns\nStratégies gestion alternatives :\n1. Techniques anti-stress immédiates :\n•\tRespiration 4-7-8 : Inspire 4s, retiens 7s, expire 8s (×3)\n•\tMarche 10min extérieur\n•\tAppel ami supportant\n•\tÉcriture émotions (journal)\n•\tMusique apaisante\n•\tPrière/méditation\n2. Activités distraction ennui :\n•\tMarche\n•\tHobby manuel (tricot, dessin, bricolage)\n•\tJardinage\n•\tLecture\n•\tJeux société famille\n•\tRangement/organisation\n•\tApprentissage nouveau (langue, instrument)\n3. Alimentation consciente (si faim réelle) :\n•\tPause avant manger : \"Ai-je VRAIMENT faim ?\"\n•\tÉchelle faim 1-10 : Si <5, pas alimentation nécessaire\n•\tAttendre 10min : Besoin passe souvent\n•\tSi vraie faim : Collation saine planifiée\n4. Environnement favorable :\n•\tÉliminer aliments réconfort de la maison\n•\tStock collations saines uniquement\n•\tCuisine fermée certaines heures\n•\tZones \"non-food\" : Chambre, bureau\n5. Support social :\n•\tGroupe entraide (diabète, perte poids)\n•\tThérapeute/psychologue si sévère\n•\tFamille informée : Support\nRemplacements alimentaires si échec retenue :\nAu lieu de :\n•\tBeignets → Fruits + quelques arachides\n•\tGâteaux → Carré chocolat noir (70%+) 2-3 carrés\n•\tChips → Crudités + houmous/guacamole\n•\tSodas → Eau citronnée, infusion\nPlan progressif :\nSemaine 1-2 : Conscience\n•\tJournal sans jugement\n•\tIdentifier triggers\n•\tPas de changement, juste observation\nSemaine 3-4 : Substitution 50%\n•\tRemplacer 1 épisode/2 par alternative\n•\tTechniques respiration\n•\tActivité distraction\nSemaine 5-6 : Substitution 75%\n•\tMajorité épisodes gérés sans nourriture\n•\tHabitudes alternatives ancrées\nSemaine 7+ : Contrôle\n•\tAlimentation émotionnelle rare (< 1x/semaine)\n•\tGestion triggers efficace\nAdaptations repas structure :\n•\tRégularité stricte (évite fringales déclencheuses)\n•\tProtéines suffisantes (satiété longue)\n•\tSommeil optimisé (fatigue = stress = fringales)";
                }
                return "RÉPONSE : NON\nÉvaluation : EXCELLENT contrôle émotionnel-alimentaire\nMaintien :\n•\tContinuer séparation émotions-alimentation\n•\tVigilance périodes stress accru\n•\tMaintien stratégies coping non-alimentaires\nBénéfices :\n•\tContrôle calorique facilité\n•\tChoix alimentaires rationnels\n•\tPerte poids moins chaotique\n•\tRelation saine nourriture";

            case 'finir_assiette':
                if ($isYes) {
                    return "Question 2 : Avez-vous tendance à finir votre assiette même si vous n'avez plus faim ?\nRÉPONSE : OUI\nProblème : Ignorance signaux satiété → Suralimentation chronique\nCauses culturelles/familiales fréquentes :\n•\t\"Ne pas gaspiller\"\n•\tÉducation \"assiette vide\"\n•\tPolitesse sociale\n•\tDéconnexion signaux internes\nConséquences :\n•\tCalories excédentaires quotidiennes (200-500 cal)\n•\tPrise poids progressive\n•\tEstomac distendu (satiété retardée)\n•\tInconfort digestif\nStratégies réapprentissage satiété :\n1. Échelle faim-satiété (1-10) :\n•\t1-2 : Affamé, faiblesse\n•\t3-4 : Faim confortable\n•\t5-6 : Neutre, ni faim ni satiété\n•\t7-8 : Satisfait, confortablement repu\n•\t9-10 : Trop plein, inconfortable\nObjectif repas :\n•\tCommencer repas à 3-4\n•\tArrêter à 7 (pas 9-10)\n2. Techniques ralentissement :\n•\tMastiquer 20-30x chaque bouchée\n•\tPoser couverts entre bouchées\n•\tPauses mid-repas (2-3min)\n•\tConversation (si repas social)\n•\tDurée repas : Minimum 20min (satiété arrive)\n3. Portions contrôlées :\n•\tSe servir moins initialement\n•\t\"Petit assiette, grande assiette\" illusion\n•\tPossibilité resservir SI faim (rarement besoin)\n4. Restes acceptés :\n•\tGarder pour collation ultérieure\n•\tPartager famille\n•\tCongeler portions individuelles\n•\tRéframing : \"Economiser pour demain\" = pas gaspillage\n5. Conscience corporelle :\n•\tCheck-in mi-repas : \"Ai-je encore faim ?\"\n•\tÉcoute signaux : Ralentissement mastication, soupir, perte intérêt nourriture\n•\tRespecter corps plutôt que obligations externes\nPlan progressif :\nSemaine 1-2 : Conscience\n•\tNoter échelle faim-satiété chaque repas\n•\tPas changement, juste observation\nSemaine 3-4 : Ralentissement\n•\tTechniques mastication\n•\tDurée repas augmentée\n•\tObjectif : Arrêter 8\nSemaine 5-6 : Portions\n•\tRéduire portions 20%\n•\tObjectif : Arrêter 7-8\nSemaine 7+ : Maîtrise\n•\tÉcoute corps naturelle\n•\tArrêt 7 systématique\n•\tRestes sans culpabilité\nBénéfices attendus :\n•\tRéduction calorique 200-400 cal/jour\n•\tPerte poids 0.5-1kg/mois (juste par cet ajustement)\n•\tDigestion améliorée\n•\tReconnexion corps";
                }
                return "RÉPONSE : NON\nÉvaluation : EXCELLENT - Écoute signaux internes\nMaintien :\n•\tContinuer respect satiété\n•\tVigilance contextes spéciaux (buffets, fêtes)\nBénéfices :\n•\tContrôle calorique naturel\n•\tDigestion optimale\n•\tRelation intuitive nourriture\n•\tModèle enfants/famille";

            case 'regime_particulier':
                if ($isYes) {
                    return "Question 3 : Avez-vous déjà suivi un régime alimentaire particulier ?\nRÉPONSE : OUI\n→ Conduit à question suivante";
                }
                return "RÉPONSE : NON\nÉvaluation : Première démarche structurée\nAvantages :\n•\tPas d'échecs passés → Pas découragement\n•\tMétabolisme non perturbé yoyo\n•\tPage blanche → Habitudes saines dès départ\nApproche recommandée :\n•\tPas de \"régime\" temporaire\n•\tChangement mode de vie permanent\n•\tProgression douce (adhésion long terme)\n•\tFocus santé pas juste poids\nConseils démarrage :\n•\tObjectifs réalistes (pas perte rapide)\n•\tÉducation nutritionnelle\n•\tSupport professionnel (nutritionniste)\n•\tPatience (résultats progressifs mais durables)";

            case 'regime_efficacite':
                if (stripos($answer, 'glucides') !== false || stripos($answer, 'faible') !== false || stripos($answer, 'repris') !== false) {
                    return "Question 4 : Si oui, lequel, et a-t-il été efficace pour vous ?\nRégime très faible en glucides :\nAnalyse échec :\n•\tEffet yoyo classique\n•\tRégime trop restrictif → Non soutenable\n•\tPerte muscle + eau (pas seulement graisse)\n•\tMétabolisme ralenti\n•\tReprise poids + rebond (souvent plus qu'initial)\n•\tFrustration → Abandon → Culpabilité\nLeçons et nouvelle approche :\n1. Modération vs Élimination :\n•\tPas \"zéro glucides\"\n•\tGlucides contrôlés selon activité\n•\tChoix glucides qualité (complets, IG bas)\n2. Soutenabilité :\n•\tAlimentation que vous pouvez maintenir À VIE\n•\tPas privation sévère\n•\tFlexibilité sociale\nPlan recommandé post-échec :\nRépartition macro :\n•\tProtéines : 27%\n•\tGlucides : 35-45% selon activité\n•\tLipides : 28-38% selon activité\nMindset changement :\n•\t\"Régime\" = échec programmé\n•\t\"Mode de vie\" = succès durable\n•\tLenteur = efficacité\n•\tPatience = clé";
                }
                if (stripos($answer, 'liquide') !== false || stripos($answer, 'detox') !== false || stripos($answer, 'détox') !== false) {
                    return "Régime liquide/detox :\nAnalyse échec :\n•\tApproche extrême non viable\n•\tCarences multiples\n•\tPerte muscle importante\n•\tMétabolisme chute drastique\n•\tFatigue → Abandon\n•\tAucun apprentissage durable\nDangers régimes liquides/detox :\n•\tProtéines insuffisantes (fonte musculaire)\n•\tCalories très basses (métabolisme ralenti)\n•\tCarences vitamines/minéraux\n•\tHypoglycémies (DANGEREUX diabète)\n•\t\"Détox\" = mythe (foie/reins font le travail)\n•\tReprise poids garantie\nNouvelle approche :\nAlimentation solide équilibrée :\n•\t3 repas complets quotidiens\n•\t2 collations\n•\tVariété aliments entiers\n•\tProtéines chaque repas\n•\tLégumes abondants\n•\tFéculents contrôlés qualité";
                }
                if (stripos($answer, 'portion') !== false || stripos($answer, 'marché') !== false || stripos($answer, 'lentement') !== false || stripos($answer, 'durable') !== false) {
                    return "Réduction portions + marche :\nAnalyse SUCCÈS :\n•\tApproche idéale\n•\tSimplicité\n•\tSoutenabilité\n•\tRésultats durables\n•\tPas privation\n•\tChangement mode de vie\nPourquoi ça a marché :\n1.\tModération (pas élimination)\n2.\tActivité physique (métabolisme + dépense)\n3.\tProgressivité (corps s'adapte sans résistance)\n4.\tRéalisme (pas attentes irréalistes)\n5.\tLong terme (patience)\nOptimisations possibles :\n•\tUtiliser Tableau 1 pour précision macro\n•\tVarier activité (renforcement musculaire)\n•\tSuivi marqueurs (glycémie, HbA1c, tension, lipides)\nMaintien :\n•\tCONTINUER exactement cette approche\n•\tAjuster finement si besoin\n•\tModèle de réussite durable";
                }
                if (stripos($answer, 'végétarien') !== false || stripos($answer, 'vegan') !== false || stripos($answer, 'végétalien') !== false) {
                    return "Régime végétarien/vegan :\nAnalyse :\n•\tChoix éthique/santé respectable\n•\tContexte béninois difficile (culture viande/poisson)\n•\tRisque carences (B12, fer, protéines)\n•\tIsolation sociale\nOptions :\nOption 1 : Flexitarien (recommandé) :\n•\tPrincipalement végétal\n•\tPoisson/volaille occasionnellement\n•\tCompromis culturel + santé\n•\tSocialement plus facile\nOption 2 : Végétarien strict :\nSources protéines végétales Bénin :\n•\tHaricots rouges/blancs (25g protéines/100g sec)\n•\tLentilles (si disponibles)\n•\tArachides (26g protéines/100g)\n•\tSoja : Tofu si disponible\nComplémentations essentielles :\n•\tVitamine B12 (complément obligatoire si vegan strict)\n•\tFer : Combiner sources végétales (haricots) + vitamine C (fruits)\n•\tOméga-3 : Graines lin, chia\n•\tProtéines complètes : Combiner céréales + légumineuses\nRecommandation finale :\n•\tSi vraiment difficile → Flexitarisme plus réaliste long terme\n•\tPriorité : Santé + soutenabilité + vie sociale\n•\tPas culpabilité si compromis nécessaires";
                }
                return "Question 3 & 4 : Régimes passés\nÉviter l'effet yoyo des régimes extrêmes (détox, zéro glucides). Adopter la répartition macro : Protéines 27%, Glucides 35-45%, Lipides 28-38%.";

            default:
                return "Aucun";
        }
    }

    private function getAntecedentsAdvice(bool $isYes): string
    {
        if ($isYes) {
            return "Conseils Ciblés :\n• Surveillance glycémique stricte avec mesures régulières\n• Réduction drastique du sel (max 5g/jour)\n• Privilégier les aliments à Index Glycémique bas\n• Éviter totalement les sucres rapides\n• Augmenter les fibres (30-40g/jour)\n• Contrôle médical mensuel obligatoire";
        }
        return "Conseils Ciblés :\n• Maintenir une approche préventive\n• Surveillance annuelle des paramètres\n• Alimentation équilibrée sans restriction excessive\n• Promotion d'habitudes saines à long terme\n• Éducation nutritionnelle continue";
    }

    private function getAntecedentsLequelAdvice(string $answer): string
    {
        $ans = mb_strtolower($answer);
        $content = "";
        if (str_contains($ans, 'diabète')) {
            $content .= "DIABÈTE DE TYPE 2 :\n• Privilégier les glucides à index glycémique bas (igname bouillie, riz complet local).\n• Fractionner les repas pour lisser la glycémie.\n• Surveiller rigoureusement les portions de féculents.\n• Augmenter massivement les fibres (feuilles de gombo, gboma).\n\n";
        }
        if (str_contains($ans, 'hypertension') || str_contains($ans, 'hta')) {
            $content .= "HYPERTENSION ARTÉRIELLE :\n• Sodium : MAXIMUM 5g sel/jour (= 2000mg sodium)\n• Potassium : augmenter (bananes, avocat, pommes de terre, haricots)\n• Magnésium : noix, graines, légumes verts\n• Régime DASH adapté au contexte béninois\n• Éviter : bouillons cubes, poissons très fumés/salés, viandes transformées\n\n";
        }
        if (str_contains($ans, 'cardiovasculaires') || str_contains($ans, 'cardio')) {
            $content .= "MALADIES CARDIOVASCULAIRES :\n• Réduire drastiquement les graisses saturées et trans.\n• Privilégier les oméga-3 (poissons gras locaux comme le maquereau).\n• Maintenir une hydratation optimale et limiter l'alcool.";
        }
        return empty($content) ? "Aucun" : trim($content);
    }

    private function getFruitsLegumesAdvice(string $answer): string
    {
        if (str_contains($answer, '1-2')) {
            return "Évaluation : INSUFFISANT - Augmentation urgente nécessaire";
        }
        if (str_contains($answer, '3-4')) {
            return "Évaluation : MOYEN - Amélioration souhaitable";
        }
        return "Évaluation : EXCELLENT - Maintenir";
    }

    private function getGrignotageAdvice(bool $isYes): string
    {
        if ($isYes) {
            return "Analyse : Le grignotage n'est pas mauvais en soi, tout dépend de QUOI et COMBIEN.";
        }
        return "Évaluation : Votre absence de grignotage est positive.";
    }

    private function getAlimentsGrignotesAdvice(string $answer): string
    {
        return "Évaluation des aliments grignotés.";
    }

    private function getBoissonsFrequenceAdvice(string $answer): string
    {
        return "Analyse de la fréquence des boissons.";
    }

    private function getSommeilAdvice(string $answer): string
    {
        return "Conseils sur le sommeil.";
    }

    private function getApneeAdvice(bool $isYes): string
    {
        return "Conseils sur l'apnée.";
    }

    private function getRegimeRecentAdvice(bool $isYes): string
    {
        return "Conseils sur régime récent.";
    }

    private function getRegimePoidsPerduAdvice(string $answer): string
    {
        return "Conseils sur poids perdu.";
    }

    private function getSedentariteAdvice(string $answer): string
    {
        return "Conseils sur sédentarité.";
    }

    private function getActivitesPrefereesAdvice(string $answer): string
    {
        return "Conseils sur activités préférées.";
    }

    private function getFCRAdvice(string $answer): string
    {
        return "Conseils FCR.";
    }

    private function getStressEnnuiAdvice(bool $isYes): string
    {
        return "Conseils stress/ennui.";
    }

    private function getFinirAssietteAdvice(bool $isYes): string
    {
        return "Conseils finir assiette.";
    }

    private function getRegimeParticulierAdvice(string $answer): string
    {
        return "Conseils régime particulier.";
    }

    private function getHypertensionFitnessAdvice(string $key, string $answer, array $allAnswers): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = str_contains($answerLower, 'oui');

        switch ($key) {
            case 'antecedents_diag':
                if ($isYes) {
                    return "📋 SECTION 1 : ANTÉCÉDENTS MÉDICAUX\nQuestion 1 : Avez-vous des antécédents de diabète de type 2, d'hypertension artérielle ou de maladies cardiovasculaires ?\n✅ RÉPONSE : OUI\nAdaptation du guide :\n• Priorité absolue : Réduction du sodium (< 2000 mg/jour)\n• Éliminer : Sel de table, bouillons cube, Maggi, poissons très fumés/salés excessivement\n• Privilégier : Épices naturales (gingembre, ail, piment, poivre, oignon), citron, aromates locaux\nConseils ciblés :\n1. Potassium : Consommer quotidiennement banane plantain, haricots, épinards, gombo (effet protecteur cardiovasculaire)\n2. Magnésium : Privilégier arachides nature, noix de cajou, fonio, épinards\n3. Oméga-3 : Poisson frais 3-4×/semaine (maquereau frais, sardines fraîches, carpe)\n4. Cuisson : Grillé, bouilli, vapeur - ÉVITER fritures\n5. Hydratation : 2-2,5L eau/jour, tisanes (citronnelle, gingembre), bissap nature";
                }
                return "📋 SECTION 1 : ANTÉCÉDENTS MÉDICAUX\nQuestion 1 : Avez-vous des antécédents de diabète de type 2, d'hypertension artérielle ou de maladies cardiovasculaires ?\n❌ RÉPONSE : NON\nAdaptation du guide :\n• Suivre le plan de base mais rester vigilant sur le sodium\n• Approche préventive pour éviter complications futures\n• Limite sodium : < 2300 mg/jour (légèrement plus souple)\nModifications des repas :\n• Cube Maggi autorisé mais ½ cube maximum par sauce\n• Poisson fumé autorisé mais portion modérée (30-40g max)\n• Sel de table : pincée minime si nécessaire\nConseils ciblés :\n1. Prévention : Maintenir consommation potassium élevée (fruits, légumes)\n2. Habitudes saines : Limiter progressivement le sel pour éduquer le palais\n3. Surveillance : Mesurer tension régulièrement (mensuel)\n4. Activité physique : Priorité absolue pour prévention cardiovasculaire";

            case 'antecedents_lequel':
                if (stripos($answer, 'hypertension') !== false || stripos($answer, 'hta') !== false) {
                    return "Question 2 : Si oui, lequel\n💔 HYPERTENSION ARTÉRIELLE\nRenforcement spécifique HTA :\nSuper-aliments anti-HTA béninois :\n1. Bissap (Hibiscus) : 2-3 tasses/jour (réduction prouvée de 7-13% TA)\n2. Ail frais : 2-3 gousses/jour dans sauces\n3. Gingembre frais : Tisane + dans plats\n4. Gombo : Riche en potassium et magnésium\n5. Feuilles de baobab : Calcium, potassium, magnésium\n6. Banane plantain bouillie : Potassium ++\nRepas anti-HTA optimaux :\nPetit-déjeuner :\n• Option A : Bouillie d'avoine + graines de lin + banane + noix nature + bissap\n• Option B : Œufs pochés + avocat + tomate + pain complet maison SANS SEL + orange\nDéjeuner :\n• Option A : Fonio + sauce gombo-épinards (sans sel) + poisson frais grillé + ail-gingembre abondant\n• Option B : Haricots rouges + sauce tomate fraîche (sans cube) + poulet + légumes verts + citron\nDîner :\n• Option A : Patate douce + sauce claire au poisson frais + feuilles de baobab + salade\n• Option B : Igname bouillie + ragoût de légumes (gombo, aubergine, tomate fraîche) + sardines dessalées\nCollations HTA :\n• Bissap nature + noix nature (15-20g)\n• Fruits riches en potassium (banane, orange, papaye)\n• Yaourt nature + graines de courge\nConseils ciblés HTA :\n1. Potassium : 3500-4700 mg/jour (bananes, haricots, épinards, gombo, papaye)\n2. DASH adapté : Légumes 4-5 portions/jour, fruits 4-5 portions/jour\n3. Calcium : Yaourt nature, feuilles vertes, sardines (avec arêtes)\n4. Magnésium : Noix, graines, fonio, épinards, haricots\n5. Tisanes : Bissap, gingembre-citron, citronnelle (2-3 tasses/jour)\n6. Poids : Chaque kg perdu = réduction 1 mmHg TA";
                }
                return $this->getAntecedentsLequelAdvice($answer);

            case 'meds_lies':
                if ($isYes) {
                    return "Question 3 : Prenez-vous actuellement des médicaments liés à votre antécédent ?\n💊 RÉPONSE : OUI\nAdaptation générale :\n• Horaires réguliers : Repas synchronisés avec prises médicamenteuses\n• Interactions : Attention aliments-médicaments (voir Question 4)\n• Hydratation ++ : 2-2,5L eau/jour pour métabolisation\nConseils ciblés :\n1. Noter horaires : Médicaments et repas dans carnet\n2. Constance : Mêmes heures repas quotidiennement\n3. Communication : Informer médecin de tout changement alimentaire majeur\n4. Suppléments : JAMAIS sans avis médical (interactions possibles)\nStructure repas adaptée :\n• Petit-déjeuner : 7h-8h (avec/après médicaments matinaux)\n• Collation : 10h30\n• Déjeuner : 12h30-13h30\n• Collation : 16h\n• Dîner : 19h-20h (adapter si médicaments soir)";
                }
                return "Question 3 : Prenez-vous actuellement des médicaments liés à votre antécédent ?\n💊 RÉPONSE : NON\nAdaptation :\n• Approche nutritionnelle intensive : L'alimentation est l'outil thérapeutique principal\n• Surveillance accrue : Mesures régulières (TA, glycémie si diabète)\n• Objectifs stricts : Modifications style de vie pour éviter médication future\nConseils ciblés :\n1. Fenêtre d'opportunité : Nutrition seule peut contrôler obésité + HTA débutante\n2. Engagement : Adhésion stricte au plan (80-90%)\n3. Suivi : Mesures hebdomadaires (poids, TA, tour de taille)\n4. Progression : Réévaluation mensuelle, ajustements si nécessaire\n5. Prévention : Éviter progression vers médication\nPlan nutritionnel renforcé :\n• Application stricte réduction sodium (< 2000 mg/jour)\n• Potassium élevé (fruits/légumes 8-10 portions/jour)\n• Perte de poids 0,5-1 kg/semaine (sûr et durable)\n• Exercice combiné nutrition (synergie maximale)";

            case 'meds_types':
                if (stripos($answer, 'tension') !== false || stripos($answer, 'hypertension') !== false) {
                    return "Question 4 : Si oui, lesquels ? (Médicaments spécifiques)\n💊 MÉDICAMENTS POUR LA TENSION ARTÉRIELLE\nIEC (Inhibiteurs Enzyme de Conversion - ex: Enalapril, Lisinopril) :\n• Interaction : Peuvent augmenter potassium sanguin\n• Attention : Éviter EXCÈS potassium (hyperkaliémie dangereuse)\nAdaptations IEC :\nPotassium modéré : 2500-3500 mg/jour (pas restriction sévère, mais pas excès non plus)\nAliments très riches en potassium à MODÉRER (pas éliminer) :\n• Haricots rouges/blancs : 1 portion/jour (pas 2-3)\n• Banane plantain : 1/jour max\n• Épinards cuits : Portion modérée\n• Tomate concentrée/séchée : Limiter\nRepas adaptés IEC :\nPetit-déjeuner :\n• Option A : Bouillie de maïs + œufs (2) + avocat (¼) + orange (pas banane chaque jour)\n• Option B : Akassa + poisson + tomate fraîche (pas concentré) + papaye\nDéjeuner :\n• Option A : Fonio + sauce tomate légère + poulet + légumes variés (mélange, pas que épinards)\n• Option B : Riz complet + sauce gombo + poisson + salade + carotte\nDîner :\n• Option A : Igname + sauce claire + poisson + légumes mélangés\n• Option B : Patate douce (potassium modéré OK) + sauce légère + poulet + salade\nCollations :\n• Noix (15-20g) + pomme/orange (pas banane quotidienne)\n• Yaourt + graines\n• Carotte/concombre crus + houmous\nConseils ciblés IEC :\n1. Surveillance potassium : Ionogramme sanguin régulier (tous les 3-6 mois)\n2. Suppléments potassium : JAMAIS sans avis médical\n3. Substituts sel : ÉVITER (contiennent chlorure de potassium)\n4. Variété : Alterner sources potassium (pas banane + haricots + épinards même jour)\n5. Hydratation : 2-2,5L eau/jour (bon fonctionnement rénal)\n6. Symptômes hyperkaliémie : Faiblesse musculaire, palpitations, nausées → consulter urgence\n7. Toux sèche : Effet secondaire fréquent IEC - signaler médecin si gênante\n\nARA2 (Antagonistes Récepteurs Angiotensine II - ex: Losartan, Valsartan) :\n• Similaire IEC : Même surveillance potassium\n• Avantage : Pas de toux sèche généralement\nAdaptations : Identiques aux IEC (voir ci-dessus)\n\nBÊTA-BLOQUANTS (ex: Aténolol, Propranolol) :\n• Interaction : Peuvent masquer signes hypoglycémie (si diabétique)\n• Effet : Peuvent augmenter légèrement glycémie, triglycérides\nAdaptations bêta-bloquants :\nSi diabétique + bêta-bloquants :\n• Vigilance accrue : Mesures glycémiques plus fréquentes\n• Signes hypoglycémie : Tremblements/palpitations masqués → fier à sueurs, faim intense\n• Collations régulières : Éviter hypoglycémie sévère\nRepas anti-hypoglycémie :\n• Glucides complexes IG bas systématiques (fonio, haricots, igname)\n• Protéines + graisses à chaque repas (ralentissent absorption)\n• Collations stratégiques (10h30, 16h, soir si besoin)\nLipides sanguins :\n• Oméga-3 ++ : Poisson gras 3×/semaine (contrer hausse triglycérides)\n• Limiter glucides simples (sucre, jus, sodas)\n• Fibres solubles (haricots, fonio, légumes)\nConseils ciblés bêta-bloquants :\n1. Kit hypoglycémie : Toujours sur soi si diabétique\n2. Glucomètre : Mesures régulières (pas fier uniquement symptômes)\n3. Activité physique : Fréquence cardiaque moins élevée à l'effort (normal sous bêta-bloquants) - utiliser échelle perception effort\n4. Fatigue : Effet secondaire possible - privilégier activités matinales\n\nDIURÉTIQUES (ex: Hydrochlorothiazide, Furosémide) :\n• Mécanisme : Augmentent élimination eau + électrolytes\n• Risque : Déshydratation, perte potassium/magnésium\nAdaptations diurétiques :\nHydratation +++ : 2,5-3L eau/jour (compenser pertes)\nPotassium/Magnésium : Augmenter apports (élimination accrue)\nAliments riches potassium (sûrs avec diurétiques) :\n• Banane plantain bouillie : 1-2/jour\n• Haricots rouges : 1 portion/jour\n• Épinards, gombo : Généreusement\n• Papaye, orange, mangue : 2-3 fruits/jour\n• Yaourt nature : 1-2/jour\nAliments riches magnésium :\n• Arachides, noix de cajou : 25-30g/jour\n• Graines de courge : 1-2 c. à soupe\n• Épinards, feuilles de baobab : Abondamment\n• Haricots, fonio : Quotidien\nRepas adaptés diurétiques :\nPetit-déjeuner :\n• Option A : Bouillie de mil + œufs + banane plantain bouillie + noix (25g) + orange\n• Option B : Akassa + haricots rouges + avocat + papaye + arachides (20g)\nDéjeuner :\n• Option A : Fonio + sauce gombo-épinards + poisson + salade + banane plantain + orange\n• Option B : Haricots niébé + sauce tomate + poulet + légumes verts + fruit\nDîner :\n• Option A : Igname + sauce claire + sardines + épinards + salade + fruit\n• Option B : Patate douce + ragoût légumes + poisson + feuilles de baobab + fruit\nCollations :\n• Yaourt nature + banane + noix (20g)\n• Fruits (orange, papaye, mangue) + graines de courge\n• Bissap nature + arachides\nConseils ciblés diurétiques :\n1. Hydratation matinale : 2 grands verres eau au réveil (avant diurétique)\n2. Urines : Couleur jaune pâle = bien hydraté ; foncées = boire plus\n3. Chaleur : Doubler hydratation jours chauds/exercice\n4. Suppléments : Magnésium/potassium possible si carence - consulter médecin\n5. Ionogramme : Surveillance régulière (tous les 3-6 mois)\n6. Symptômes hypokaliémie : Crampes musculaires, fatigue, constipation → augmenter fruits/légumes";
                }
                if (stripos($answer, 'glycémie') !== false || stripos($answer, 'metformine') !== false) {
                    return "💊 MÉDICAMENTS POUR BAISSER LA GLYCÉMIE (ex: Metformine, Glimepiride)\nInteraction avec alimentation :\nMETFORMINE :\n• Effet : Réduit absorption vitamine B12\n• Timing : Prendre AVEC repas (réduit troubles digestifs)\n• Alimentation : Glucides complexes IG bas\nAdaptations repas :\nPetit-déjeuner (avec Metformine matin) :\n• Option A : Bouillie de fonio + œufs (2) + légumes + avocat + orange\n• Option B : Haricots rouges + œuf poché + tomate + pain complet + papaye\nDéjeuner :\n• Fonio ou haricots (IG bas) + protéines + légumes abondants + graisse saine (avocat/noix)\nCollations (entre doses) :\n• Noix (15g) + fruit entier (pas jus) - Évite hypoglycémie\n• Yaourt nature + graines\nConseils ciblés Metformine :\n1. Vitamine B12 : Complémentation possible (500-1000 mcg/jour) - consulter médecin\n2. Sources B12 alimentaires : Poisson, œufs, viande maigre, produits laitiers\n3. Fibres ++ : 30-35g/jour (améliore efficacité Metformine)\n4. Éviter alcool : Risque acidose lactique\n5. Troubles digestifs : Augmenter fibres progressivement, fractionner doses\n\nGLIMEPIRIDE (Sulfamide hypoglycémiant) :\n• Risque : Hypoglycémie si repas sauté\n• Impératif : JAMAIS sauter repas\nAdaptations :\n• Régularité absolue : Repas horaires fixes\n• Collations stratégiques : Entre repas principaux (obligatoire)\n• Glucides complexes : À chaque repas/collation\nRepas anti-hypoglycémie :\nPetit-déjeuner (30 min avant Glimepiride) :\n• Option A : Bouillie de maïs + œufs (2) + avocat + banane + arachides (20g)\n• Option B : Akassa + haricots + poisson + plantain bouilli + orange\nCollation 10h30 (OBLIGATOIRE) :\n• Noix (20g) + fruit entier\n• Yaourt + graines de courge\nDéjeuner 12h30 :\n• Fonio/riz complet + sauce protéinée + légumes + féculents (igname/patate)\nCollation 16h (OBLIGATOIRE) :\n• Galette de mil maison + arachides\n• Fruit + yaourt\nDîner :\n• Féculent + protéine + légumes + graisse saine\nCollation soir (si Glimepiride soir) :\n• Yaourt nature + noix (avant coucher)\nConseils ciblés Glimepiride :\n1. Signes hypoglycémie : Tremblements, sueurs, faim intense → manger immédiatement sucre rapide (2-3 dates/miel) puis glucides complexes\n2. Jamais à jeun : Exercice physique uniquement après repas\n3. Kit urgence : Toujours avoir fruits secs, noix, biscuits complets\n4. Alcool : ÉVITER (majore hypoglycémie)";
                }
                if (stripos($answer, 'insuline') !== false) {
                    return "💉 INSULINE\nAdaptation cruciale :\n• Comptage glucides : Essentiel pour ajuster doses\n• Horaires stricts : Repas synchronisés avec injections\n• Prévention hypoglycémie : Collations stratégiques\nTypes d'insuline et timing repas :\nINSULINE RAPIDE (Actrapid, Novorapid) :\n• Injection : 0-15 min AVANT repas\n• Pic action : 1-3h après injection\n• Durée : 3-5h\nRepas adapté :\nPetit-déjeuner (après insuline rapide) :\n• Option A : Bouillie de fonio (portion précise) + œufs (2) + avocat (½) + orange\n• Option B : Haricots rouges (150g cuits) + œuf + pain complet (1 tranche) + banane (petite)\n\nINSULINE LENTE/INTERMÉDIAIRE (NPH, Lantus) :\n• Injection : 1-2×/jour (horaires fixes)\n• Nécessite collations entre repas principaux\nStructure journalière :\n• 7h : Insuline rapide + petit-déjeuner (50-60g glucides)\n• 10h30 : Collation (15-20g glucides) - couvre insuline lente\n• 12h30 : Insuline rapide + déjeuner (60-75g glucides selon activité)\n• 16h : Collation (15-20g glucides)\n• 19h : Insuline rapide + dîner (50-60g glucides)\n• 22h : Collation légère si insuline lente soir (10-15g glucides) - prévention hypoglycémie nocturne\nExemples portions glucides béninois :\n• 15g glucides : 1 petit fruit OU 3 c. à soupe fonio cuit OU 20g arachides + petit fruit\n• 30g glucides : ⅓ tasse riz cuit OU ½ igname moyenne OU 1 tranche pain complet + fruit\n• 45g glucides : ½ tasse riz cuit OU ⅔ igname moyenne OU 1 tasse fonio cuit\n• 60g glucides : ¾ tasse riz cuit OU 1 igname moyenne OU bouillie de maïs (1 bol moyen)\nConseils ciblés Insuline :\n1. Carnet glycémique : Noter TOUT (glycémie, glucides, insuline, activité)\n2. Constance : Mêmes quantités glucides mêmes repas quotidiennement (facilite contrôle)\n3. IG bas prioritaire : Fonio, haricots, igname bouillie, patate douce\n4. Fibres : Ralentissent absorption (meilleur contrôle glycémie)\n5. Hypoglycémie : 15g sucre rapide (3 dates OU 1 c. à soupe miel OU jus fruit) → attendre 15 min → recontrôler glycémie";
                }
                if (stripos($answer, 'poids') !== false || stripos($answer, 'orlistat') !== false || stripos($answer, 'liraglutide') !== false) {
                    return "💊 MÉDICAMENTS POUR PERDRE DU POIDS (ex: Orlistat, Liraglutide)\nORLISTAT (Xenical) :\n• Mécanisme : Bloque absorption ~30% graisses alimentaires\n• Effet secondaire : Selles grasses/urgentes si trop de graisses au repas\nAdaptations alimentaires :\nLimite graisses : 15g par repas maximum (Orlistat efficace + évite effets secondaires)\nRépartition graisses par repas :\nPetit-déjeuner (≤15g lipides) :\n• Option A : Bouillie de maïs nature + blanc d'œuf (3) + 1 jaune + tomate + orange\n• Option B : Akassa + poisson maigre grillé (100g) + salade + papaye\nDéjeuner (≤15g lipides) :\n• Option A : Fonio (1 tasse) + sauce tomate légère (1 c. à café huile) + poulet sans peau (100g) + légumes\n• Option B : Riz complet + sauce gombo très légère + poisson maigre + salade\nDîner (≤15g lipides) :\n• Option A : Igname bouillie + sauce claire (minimal huile) + poisson grillé + légumes\n• Option B : Patate douce + ragoût de légumes + blanc de poulet + salade\nConseils ciblés Orlistat :\n1. Vitamines liposolubles : Supplémentation (A, D, E, K) - prendre 2h avant/après Orlistat\n2. Fibres ++ : Compensent satiété (légumes, fonio, haricots)\n3. Protéines : Maintenir 25-28% (satiété sans graisses)\n4. Éviter fritures : Absolument (selles très grasses garanties)\n\nLIRAGLUTIDE (Victoza, Saxenda) :\n• Mécanisme : Ralentit vidange gastrique, augmente satiété\n• Effets : Nausées possibles, appétit réduit\nAdaptations alimentaires :\nPetites portions fréquentes : Estomac se vide lentement\nPetit-déjeuner (portion réduite) :\n• Option A : Bouillie de maïs (½ bol) + œuf (1-2) + avocat (¼) + fruit\n• Option B : Akassa (petite portion) + poisson grillé (50-80g) + tomate + orange\nCollation 10h :\n• Fruit + noix (10-12 unités) - IMPORTANT : Ne pas sauter même si pas faim\nDéjeuner (portion normale mais pas excessive) :\n• Option A : Fonio (¾ tasse) + sauce légère + poulet (80-100g) + légumes abondants\n• Option B : Haricots (100g) + sauce tomate + poisson + salade complète\nConseils ciblés Liraglutide :\n1. Nausées : Manger lentement, bien mâcher, éviter aliments gras, tisane gingembre-citron\n2. Hydratation : 2-3L eau/jour (risque déshydratation si nausées/vomissements)\n3. Satiété précoce : Normal - écouter son corps, ne pas se forcer à finir\n4. Protéines prioritaires : Manger d'abord protéines du repas (maintien masse musculaire)";
                }
                if (stripos($answer, 'cholestérol') !== false || stripos($answer, 'statines') !== false) {
                    return "💊 MÉDICAMENTS POUR LE CHOLESTÉROL (Statines - ex: Atorvastatine, Simvastatine)\nInteractions :\n• Pamplemousse : ÉVITER absolument (augmente concentration statine → toxicité)\nAdaptations alimentaires statines :\nÉLIMINER :\n• ❌ Pamplemousse et jus de pamplemousse (interaction dangereuse)\nAlimentation anti-cholestérol béninoise :\nFibres solubles +++ : 25-30g/jour (réduisent cholestérol LDL)\nSources béninoises fibres solubles :\n1. Haricots rouges/niébé : 1-2 portions/jour\n2. Fonio : 2-3 portions/jour\n3. Gombo : Quotidien (fibres solubles visqueuses excellentes)\nRepas anti-cholestérol :\nPetit-déjeuner :\n• Option A : Fonio + graines de lin moulues (2 c. à soupe) + noix (8-10) + fruits rouges/baies + blanc d'œuf (3) + 1 jaune\n• Option B : Akassa + haricots rouges + avocat (½) + tomate + orange (PAS pamplemousse)\nDéjeuner :\n• Option A : Fonio copieux + sauce gombo (fibres solubles) + maquereau grillé (oméga-3) + épinards + salade + noix (10) + fruit\n• Option B : Haricots niébé + sauce tomate à l'huile d'olive + sardines + légumes verts + avocat + fruit\nConseils ciblés statines :\n1. Pamplemousse : ZÉRO TOLÉRANCE (interaction sérieuse)\n2. Timing : Certaines statines soir (simvastatine) car cholestérol synthétisé la nuit\n3. Coenzyme Q10 : 100-200 mg/jour possible si douleurs musculaires - consulter médecin\n4. Fibres : Si supplément psyllium → prendre 2h avant/après statine";
                }
                if (stripos($answer, 'aucun') !== false) {
                    return "❌ AUCUN DE CES MÉDICAMENTS\nAdaptation :\n• Liberté alimentaire : Pas d'interactions médicamenteuses à gérer\n• Focus nutrition : Alimentation = outil thérapeutique principal\n• Prévention : Optimiser nutrition pour éviter médication future\nPlan alimentaire optimal sans médication :\n1. Sodium : < 2000 mg/jour (contrôle HTA)\n2. Potassium : 3500-4700 mg/jour (effet anti-HTA)\n3. DASH modifié : Fruits/légumes 8-10 portions/jour\n4. Fibres : 30-35g/jour (satiété, contrôle glycémie/cholestérol)\nSuper-aliments à privilégier quotidiennement :\n1. Bissap : 2-3 tasses (anti-HTA, antioxydants)\n2. Ail frais : 2-3 gousses (cardio-protecteur, anti-HTA)\n3. Gingembre : Quotidien (anti-inflammatoire)\n4. Gombo : Quotidien (fibres solubles, potassium, magnésium)\n5. Fonio : Céréale de base (IG bas, fibres, micronutriments)";
                }
                return $this->getMedicationAdvice($key, $answer, $allAnswers);

            case 'journee_typique':
                return "📋 PARTIE 3 : HABITUDES ALIMENTAIRES\nQuestion : Pouvez-vous décrire une journée typique de vos repas et collations ?\nAnalyse et ajustements selon scénarios fréquents :\nSCÉNARIO 1 : \"Je saute souvent le petit-déjeuner, je grignote beaucoup le soir\"\nProblème identifié :\n•\tJeûne prolongé → hypoglycémie → fringales soir → suralimentation\n•\tMétabolisme ralenti\n•\tMauvais contrôle glycémique\nAdaptations :\nPhase de transition (2-3 semaines) :\nSemaine 1-2 : Petit-déjeuner léger introduit\n•\t7h30 : Fruit + noix (15g) + bissap OU yaourt nature + banane\n•\t10h30 : Collation normale (galette + fruit)\n•\tDéjeuner/dîner : Selon plan base\n•\tSoir : Collation planifiée 19h-20h (évite grignotage anarchique)\nSemaine 3-4 : Petit-déjeuner complet\n•\t7h-8h : Petit-déjeuner complet selon plan\n•\tÉliminer : Grignotage soir non planifié\n•\tRemplacer : Collation structurée (yaourt + fruit + noix 20h si faim)\nCollation soir anti-grignotage (si nécessaire) :\n•\tYaourt nature (200ml) + ½ banane + noix (10-12)\n•\tBissap + galette de mil maison (petite) + arachides (15g)\n•\tLégumes crus (carotte, concombre) + houmous (2 c. à soupe) + fruit\nConseils ciblés :\n1.\tRéveil : Verre d'eau tiède + citron (stimule appétit matin)\n2.\tPréparation : Préparer petit-déjeuner veille au soir (facilite routine)\n3.\tDéjeuner : Augmenter protéines/fibres (satiété prolongée)\n4.\tSoir : Dîner 19h max + collation légère 20h-20h30 si faim\n5.\tDistractions : Soir → activité (marche, lecture) au lieu de grignoter\n6.\tSommeil : Coucher 22h-23h (évite grignotage nocturne)\n\nSCÉNARIO 2 : \"Je mange principalement de la pâte avec beaucoup de sauce grasse matin, midi et soir\"\nProblème identifié :\n•\tMonotonie alimentaire\n•\tExcès glucides raffinés + graisses saturées\n•\tCarences protéines, fibres, micronutriments\n•\tFavorise obésité, HTA, dyslipidémie\nAdaptations :\nTransition progressive (éviter frustration) :\nSemaine 1-2 : Diversification partielle\n•\tMatin : Remplacer pâte par bouillie OU haricots OU œufs\n•\tMidi : Conserver pâte (fonio ou maïs complet) + réduire sauce grasse de 30-40%\n•\tSoir : Alterner pâte avec igname/patate douce + sauce légère\nSemaine 3-4 : Diversification complète\n•\tMatin : Rotation quotidienne (bouillie J1, haricots J2, œufs + gari J3, etc.)\n•\tMidi : Rotation (fonio J1, haricots J2, riz complet J3, igname J4, pâte J5)\n•\tSoir : Rotation (igname J1, patate J2, fonio J3, haricots J4, akpan J5)\nSauce allégée béninoise :\nSauce arachide légère :\n•\tPâte d'arachide : 2-3 c. à soupe (au lieu de 5-6)\n•\tTomates fraîches : Abondantes\n•\tOignon, ail, gingembre : Généreux\n•\tHuile : 1 c. à soupe max (au lieu de 3-4)\n•\tEau/bouillon maison : Diluer\n•\tLégumes : Ajouter gombo, épinards, aubergine\nSauce graine allégée :\n•\tGraines pistache broyées : 3 c. à soupe (au lieu de 6-8)\n•\tTomates, oignon, piment : Généreux\n•\tHuile de palme rouge : 1 c. à café (au lieu de 2-3 c. à soupe)\n•\tLégumes verts : Abondants\nSauce gombo (naturellement légère) :\n•\tGombo frais : Abondant (fibres, peu de calories)\n•\tTomate, oignon, ail : Généreux\n•\tHuile : Minimale (1 c. à café)\n•\tPoisson fumé : Petit morceau (saveur)\nConseils ciblés :\n1.\tSatiété : Légumes à volonté (gombo, épinards, aubergine, courgette, carotte)\n2.\tProtéines : Systématiques (poisson, poulet, œufs, haricots) - portion visible\n3.\tGraisses : Mesurer huile/pâte d'arachide (c. à soupe, pas estimation)\n4.\tDécouverte : Tester 1 nouveau féculent/semaine\n5.\tFamille : Impliquer (transition collective plus facile)\n\nSCÉNARIO 3 : \"Je mange 1-2 fois par jour seulement, grosses portions\"\nProblème identifié :\n•\tRestriction excessive → fringales → hyperphagie\n•\tMétabolisme ralenti (mode \"famine\")\n•\tGlycémie instable\n•\tDifficile perte de poids malgré peu de repas\nAdaptations :\nFractionnement progressif :\nSemaine 1-2 : Introduction 3e repas\n•\tSi actuellement 2 repas (ex : 12h et 19h) → ajouter petit-déjeuner léger 7h-8h\n•\tDéjeuner : Réduire portion de 20-25%\n•\tDîner : Réduire portion de 20-25%\nSemaine 3-4 : Introduction collations\n•\t7h-8h : Petit-déjeuner complet\n•\t10h30 : Collation (fruit + noix)\n•\t13h : Déjeuner (portion normale plan)\n•\t16h : Collation (yaourt + graines)\n•\t19h-20h : Dîner (portion normale plan)\nGestion portions (grandes portions → portions normales) :\nAstuces pratiques :\n1.\tAssiette : Utiliser assiette plus petite (illusion visuelle)\n2.\tMéthode moitié : Remplir ½ assiette légumes, ¼ protéines, ¼ féculents\n3.\tServir cuisine : Ne pas mettre plats sur table (évite resservi automatique)\n4.\tManger lentement : 20-30 min/repas (satiété a le temps d'arriver)\n5.\tPause : Mi-repas, pause 2-3 min, évaluer faim avant continuer\nPortions visuelles béninoises :\n•\tFéculents (riz, fonio, igname, pâte) : Taille de poing fermé OU ¾ tasse mesure\n•\tProtéines (poisson, poulet) : Paume de main (épaisseur + surface)\n•\tLégumes : 2 poings fermés OU À VOLONTÉ\n•\tGraisses (huile, noix) : Pouce OU c. à soupe mesurée\n•\tFruits : 1 poing fermé par portion\nConseils ciblés :\n1.\tPatience : Estomac s'adapte en 2-4 semaines\n2.\tHydratation : Verre d'eau avant repas (aide satiété)\n3.\tConscience : Manger sans écrans, assis, détendu\n4.\tÉcoute : Arrêter à 80% plein\n5.\tQualité : Aliments denses nutritionnellement\n6.\tMétabolisme : 5-6 prises alimentaires/jour = métabolisme actif toute journée\n7.\tGlycémie : Stabilité glycémique = moins fringales = contrôle pondéral facilité";

            case 'fruits_legumes':
                if (str_contains($answer, '1-2')) {
                    return "📋 Question : Combien de portions de fruits et légumes consommez-vous par jour ?\nRÉPONSE : 1-2 portions\nProblème identifié :\n•\tCarences fibres, vitamines, minéraux, antioxydants\n•\tRisque constipation\n•\tSatiété insuffisante → fringales\n•\tCarences potassium/magnésium (critique pour HTA)\nObjectif : Passer à 8-10 portions/jour\nStratégie d'augmentation progressive :\nSemaine 1-2 : 3-4 portions\n•\tPetit-déjeuner : Ajouter 1 fruit\n•\tDéjeuner : Ajouter salade OU légumes cuits (1 portion)\n•\tDîner : Ajouter légumes cuits (1 portion)\nSemaine 3-4 : 5-6 portions\n•\tCollation 10h30 : 1 fruit\n•\tDéjeuner : Salade + légumes cuits (2 portions)\n•\tCollation 16h : 1 fruit OU légumes crus\n•\tDîner : Légumes cuits abondants (2 portions)\nSemaine 5-6 : 8-10 portions cible\n•\tPetit-déjeuner : 1-2 fruits\n•\tCollation 10h30 : 1 fruit\n•\tDéjeuner : Salade + 2 légumes cuits + 1 fruit (4 portions)\n•\tCollation 16h : 1 fruit + légumes crus\n•\tDîner : Légumes abondants + 1 fruit (3-4 portions)\nQu'est-ce qu'une portion ?\n•\tFruits : 1 fruit moyen (orange, banane, mangue) OU ¾ tasse fruits coupés\n•\tLégumes crus : 1 tasse (salade, carotte, concombre, tomate)\n•\tLégumes cuits : ½ tasse (épinards, gombo, haricots verts, aubergine)\nLégumes béninois à privilégier (riches potassium anti-HTA) :\n1.\tÉpinards : Potassium, magnésium, fibres\n2.\tGombo : Fibres solubles, potassium, magnésium\n3.\tFeuilles de baobab : Calcium, potassium, vitamine C\n4.\tAubergine : Fibres, potassium, antioxydants\n5.\tTomate : Potassium, lycopène (antioxydant)\n6.\tCarotte : Bêta-carotène, fibres\n7.\tHaricots verts : Fibres, potassium\n8.\tChou : Fibres, vitamine C, K\n9.\tConcombre : Hydratation, fibres\nFruits béninois à privilégier :\n1.\tBanane/plantain : Potassium ++\n2.\tOrange : Vitamine C, potassium, fibres\n3.\tPapaye : Enzymes digestives, vitamine C, fibres\n4.\tMangue : Vitamine A, C, fibres\n5.\tAnanas : Bromélaïne, vitamine C\n6.\tGoyave : Vitamine C ++, fibres\n7.\tMandarine : Vitamine C, flavonoïdes\nAstuces pratiques intégration :\nPetit-déjeuner :\n•\tFruit dans bouillie (banane écrasée, papaye en dés, mangue)\n•\tTomate dans œufs brouillés\n•\tAvocat sur pain/avec œufs\nDéjeuner :\n•\tSalade systématique : Laitue, tomate, concombre, oignon, carotte râpée + citron\n•\tLégumes dans sauce : Gombo, épinards, aubergine, carotte\n•\tFruit dessert : Orange, mandarine, papaye, ananas\nDîner :\n•\tLégumes abondants : Doubler portion habituelle\n•\tSoupe légumes : Gombo, tomate, oignon, épinards, aubergine\n•\tSalade : Même si déjeuner, autre composition\nCollations :\n•\tFruits : Toujours 1-2 fruits\n•\tLégumes crus : Carotte, concombre avec houmous/yaourt nature\nConseils ciblés :\n1.\tArc-en-ciel : Varier couleurs quotidiennement (nutriments différents)\n2.\tFrais prioritaire : Locaux, de saison (moins chers, plus nutritifs)\n3.\tPréparation : Laver/couper légumes dimanche pour semaine\n4.\tCuisson : Vapeur > bouilli > sauté léger (préserve nutriments)\n5.\tCrudités : Au moins 2 portions/jour (enzymes, vitamine C intactes)\n6.\tJus : Éviter (préférer fruits entiers - fibres + satiété)\n7.\tObjectif : 5 couleurs/jour minimum (rouge, vert, orange, blanc, violet)";
                }
                if (str_contains($answer, '3-4')) {
                    return "RÉPONSE : 3-4 portions\nSituation :\n•\tConsommation modérée mais insuffisante\n•\tCarences potentielles potassium/magnésium\n•\tPlace pour amélioration\nObjectif : Passer à 8-10 portions\nStratégie :\nSemaine 1-2 : 5-6 portions\n•\tAjouter 1 fruit collation matinale\n•\tAugmenter légumes déjeuner (+1 portion)\n•\tAjouter fruit collation après-midi\nSemaine 3-4 : 7-8 portions\n•\tAjouter 2e fruit petit-déjeuner\n•\tSalade systématique déjeuner ET dîner\n•\tLégumes cuits doublés\nSemaine 5+ : 8-10 portions cible\n•\tRoutine établie\n•\tVariété maximale\nConseils ciblés :\n1.\tDensité : Privilégier légumes feuilles (grand volume, peu calories, riches nutriments)\n2.\tSnacking : Légumes crus (carotte, concombre) toujours disponibles\n3.\tSauces : Ajouter systématiquement 2-3 légumes différents\n4.\tMarché : Acheter variété hebdomadaire (évite monotonie)";
                }
                return "RÉPONSE : 5 portions ou plus\nSituation :\n•\tEXCELLENT départ\n•\tMaintenir et optimiser qualité\nObjectif : Atteindre 8-10 portions + diversité maximale\nOptimisation :\nDiversité couleurs :\n•\tRouge : Tomate, poivron rouge, papaye\n•\tOrange : Carotte, patate douce, mangue, papaye\n•\tVert : Épinards, gombo, laitue, concombre, feuilles de baobab\n•\tBlanc : Oignon, chou blanc, navet\n•\tViolet/bleu : Aubergine, chou rouge (si disponible)\nRotation quotidienne :\n•\tLundi : Épinards + tomate + carotte + orange + banane\n•\tMardi : Gombo + laitue + concombre + papaye + mangue\n•\tMercredi : Aubergine + feuilles de baobab + oignon + mandarine + ananas\n•\tJeudi : Haricots verts + chou + tomate + goyave + banane\n•\tVendredi : Épinards + carotte + concombre + orange + papaye\nConseils ciblés :\n1.\tFélicitations : Habitude excellente, continuer !\n2.\tVariété : 15-20 fruits/légumes différents/semaine\n3.\tLocaux : Privilégier marché local, saison (fraîcheur, prix)\n4.\tDécouverte : Tester 1 nouveau fruit/légume/mois\n5.\tPréparations : Varier modes (cru, vapeur, grillé, sauté léger, soupe)\n6.\tCrudi : Au moins 30-40% fruits/légumes crus (enzymes)";

            case 'grignotage':
                if ($isYes) {
                    return "📋 Question : Grignotez-vous entre les repas ?\n✅ RÉPONSE : OUI\n→ Question suivante : Si oui, quels aliments consommez-vous ?";
                }
                return "❌ RÉPONSE : NON\nÉvaluation :\nSi NON grignotage + repas principaux adéquats + énergie stable : → Parfait, continuer !\nConseils ciblés :\n1.\tMaintenir : Équilibre actuel fonctionne\n2.\tCollations optionnelles : Ajouter si activité physique intense (10h30/16h)\n3.\tFlexibilité : Autoriser collation saine si vraie faim entre repas\n4.\tÉcoute corporelle : Si baisse énergie, fringales déjeuner/dîner → ajouter collation préventive\nSi NON grignotage + restriction + irritabilité + fringales repas + craquages occasionnels : → Ajouter 1-2 collations planifiées (prévention)\nConseils ciblés :\n1.\tPrévention : Petite collation 10h30 et/ou 16h évite fringales repas principaux\n2.\tMétabolisme : 5-6 prises alimentaires quotidiennes = optimal\n3.\tGlycémie : Collations stabilisent glycémie\n4.\tPerformance : Énergie constante toute journée\n5.\tPortions repas : Si collations ajoutées → réduire légèrement portions repas principaux (calories totales constantes)";

            case 'aliments_grignotes':
                if (stripos($answer, 'biscuits') !== false || stripos($answer, 'chips') !== false || stripos($answer, 'beignets') !== false || stripos($answer, 'sucreries') !== false || stripos($answer, 'pâtisseries') !== false) {
                    return "Grignotage \"problématique\" (biscuits, chips, sucreries, pâtisseries, beignets)\nProblème identifié :\n•\tExcès calories vides\n•\tSucres simples → pics glycémie → fringales\n•\tGraisses saturées/trans\n•\tSodium élevé (chips) - Sabote efforts contrôle HTA\nStratégie remplacement progressif :\nSemaine 1-2 : Substitution partielle\n•\tRemplacer 50% du grignotage malsain par options saines\nOptions substitution béninoises :\nAu lieu de → Remplacer par\n•\tBiscuits sucrés → Galette de mil maison nature + fruit\n•\tChips → Noix nature (cajou, arachides) 20g + légumes crus\n•\tBeignets → Akassa nature + yaourt + fruit\n•\tPâtisseries → Banane plantain bouillie + arachides 15g\n•\tSodas → Bissap nature + fruit\n•\tPain blanc + confiture → Pain complet maison + beurre de cacahuète (1 c. à café) + banane écrasée\n•\tChocolat/bonbons → Dates (2-3) + noix (10)\nSemaine 3-4 : Substitution 75%\n•\t3 sur 4 moments grignotage = choix sains\n•\t1 moment \"plaisir contrôlé\" (petite portion, 1-2×/semaine maximum)\nSemaine 5+ : Substitution 90-100%\n•\tCollations structurées : 10h30 et 16h, options saines uniquement\nGestion envies irrépressibles :\n1.\tDélai 15 min : Boire eau, marcher, respirer → souvent envie passe\n2.\tSubstitut texture :\n•\tEnvie croquant → Carotte, concombre, pomme, noix\n•\tEnvie crémeux → Yaourt nature, avocat, banane écrasée\n•\tEnvie sucré → Fruit, dates, bissap léger miel\n•\tEnvie salé → Noix légèrement salées (10g), légumes + houmous\n3.\tDistraction : Activité (marche 5 min, appel téléphone, tâche ménagère)\n4.\tHydratation : Souvent soif confondue avec faim\nConseils ciblés grignotage problématique :\n1.\tEnvironnement : NE PAS acheter tentations (si pas à la maison, pas de tentation)\n2.\tCourses : Liste précise, jamais ventre vide, éviter rayons biscuits/chips\n3.\tSubstitution : Toujours avoir options saines prêtes (fruits lavés, noix pré-portionnées)\n4.\tProgression : Pas perfection immédiate - chaque substitution = victoire\n5.\tSommeil : Dormir suffisamment (< 6h → fringales sucrées majorées)\n6.\tActivité physique : Marche 10 min quand envie grignoter (réduit fringales)";
                }
                return "Grignotage \"sain\" (fruits, noix, yaourt)\nSituation :\n•\tChoix alimentaires positifs\n•\tPossiblement trop fréquent ou portions excessives\nAdaptations :\nStructurer grignotage en collations planifiées :\n•\t10h30 : 1 portion contrôlée (fruit + noix 15g)\n•\t16h : 1 portion contrôlée (yaourt + graines)\n•\tÉliminer : Grignotage anarchique autres moments\nPortions optimales collations saines :\n•\tFruits : 1 fruit moyen (pas 2-3)\n•\tNoix : 15-20g = 1 petite poignée (10-15 unités cajou, 20-25 arachides)\n•\tYaourt : 200ml nature\n•\tGraines : 1 c. à soupe\nConseils ciblés :\n1.\tPré-portionner : Sachets individuels noix (évite excès)\n2.\tConscience : S'asseoir, déguster lentement (pas debout/en travaillant)\n3.\tHoraires : Respecter créneaux 10h30 et 16h (pas grignotage continu)\n4.\tSubstitution : Si envie grignoter hors créneaux → verre d'eau, tisane, légumes crus sans limite";

            case 'boissons':
                if (stripos($answer, 'tous les jours') !== false || stripos($answer, 'quotidien') !== false) {
                    return "📋 Question : À quelle fréquence consommez-vous des boissons sucrées ou alcoolisées ?\nRÉPONSE : Tous les jours\nProblème identifié :\nBoissons sucrées quotidiennes :\n•\tCalories liquides (pas de satiété)\n•\tPics glycémie → insuline élevée → stockage graisses\n•\tRisque diabète type 2, obésité aggravée\nAlcool quotidien :\n•\tCalories vides (7 kcal/g alcool)\n•\tAugmentation TA (effet hypertenseur)\n•\tTriglycérides élevés\n•\tFonction hépatique altérée\n•\tSommeil perturbé\nAdaptations :\nBoissons sucrées → Élimination progressive\nSemaine 1-2 : Réduction 50%\n•\tSi 2 sodas/jour → 1 soda/jour\n•\tRemplacer 1 soda par : Bissap nature, eau citronnée, tisane gingembre-citron\nSemaine 3-4 : Réduction 75%\n•\t1 soda tous les 2 jours (3-4×/semaine)\nSemaine 5+ : Élimination 90-100%\n•\tObjectif : 0-1 boisson sucrée/semaine maximum\nAlternatives béninoises :\n1.\tBissap nature : Antioxydants, réduit TA, diurétique léger\n2.\tEau citronnée/citron vert : Eau + jus ½ citron + feuilles menthe fraîche\n3.\tTisane gingembre-citron : Gingembre frais râpé + eau chaude + citron\n4.\tTisane citronnelle : Feuilles citronnelle fraîches infusées\n5.\tBissap-gingembre : Combinaison hibiscus + gingembre (puissant anti-HTA)\nAlcool → Réduction drastique\nStratégie réduction alcool quotidien :\nSemaine 1-2 : Jours sans\n•\tSi alcool tous les jours → instituer 3 jours sans/semaine\nSemaine 3-4 : Augmenter jours sans\n•\t4-5 jours sans/semaine\nSemaine 5+ : Objectif cible\n•\tMaximum 3 verres/semaine\n•\tIdéal : 1-2 verres/semaine OU abstinence complète\nConseils ciblés :\n1.\tHTA : Alcool quotidien = TA élevée garantie - incompatible avec contrôle HTA\n2.\tCalories : 1 bière = 150 kcal (vides) → 1 bière/jour = 1050 kcal/semaine = 0,5 kg graisse/mois !\n3.\tSommeil : Alcool fragmente sommeil\n4.\tMédicaments : Interactions possibles (statines, antidiabétiques) - consulter médecin\n5.\tSocial : Annoncer entourage réduction alcool (soutien)\n6.\tBénéfices : Arrêt/réduction alcool → TA baisse 2-4 mmHg, perte poids facilitée";
                }
                if (stripos($answer, 'une fois par semaine') !== false || stripos($answer, '1 fois') !== false || stripos($answer, 'hebdomadaire') !== false) {
                    return "RÉPONSE : Une fois par semaine\nSituation :\n•\tConsommation modérée\n•\tGérable mais optimisable\nAdaptations :\nBoissons sucrées 1×/semaine :\n•\tAcceptable si portion contrôlée\n•\tOptimal : Réduire à 1-2×/mois OU éliminer complètement\nStratégie :\n•\tSemaine 1-3 : Maintenir, mais 1 petit verre (200ml) au lieu de bouteille entière\n•\tSemaine 4+ : Passer à 1×/2 semaines\n•\tObjectif final : Occasions spéciales uniquement\nAlcool 1×/semaine :\n•\tAcceptable selon recommandations santé publique\n•\tOptimal obésité + HTA : Maintenir 1×/semaine OU réduire à 2-3×/mois\nConseils ciblés :\n1.\tPortion : 1 verre standard, pas 3-4 verres le jour de consommation\n2.\tHydratation : Alterner chaque verre alcool avec verre d'eau\n3.\tRepas : JAMAIS alcool ventre vide\n4.\tQualité : Si consommation maintenue, choisir vin rouge (antioxydants) > bière > alcools forts";
                }
                if (stripos($answer, 'occasionnellement') !== false || stripos($answer, 'rarement') !== false) {
                    return "RÉPONSE : Occasionnellement\nSituation :\n•\tConsommation rare\n•\tExcellent contrôle\n•\tMaintenir vigilance\nConseils ciblés :\n1.\tDéfinir \"occasionnellement\" : Idéalement < 2×/mois\n2.\tOccasions : Réserver vrais événements (mariages, fêtes importantes)\n3.\tQuantité : Même occasionnellement, limiter 1-2 verres\n4.\tCompensation : Jour de consommation → boire eau abondamment, légumes extra\n5.\tAlternative prioritaire : Bissap nature en priorité, alcool/soda = exception rare";
                }
                if (stripos($answer, 'jamais') !== false) {
                    return "RÉPONSE : Jamais\nSituation :\n•\tEXCELLENT\n•\tHabitude idéale pour santé\nConseils ciblés :\n1.\tFélicitations : Comportement optimal, continuer absolument !\n2.\tHydratation : Maintenir 2-2,5L eau/jour\n3.\tVariété : Bissap, tisanes, eau citronnée (éviter monotonie)\n4.\tSocial : Bissap festif lors événements (délicieux, coloré, santé)\n5.\tBénéfices : TA stable, poids contrôlé, énergie, peau, dents\n6.\tPression sociale : Rester ferme si entourage propose alcool/sodas - santé prioritaire";
                }
                return "Conseils : Réduire progressivement les boissons sucrées, privilégier bissap nature et eau citronnée.";

            case 'sommeil':
                if (stripos($answer, 'moins de 6') !== false || stripos($answer, 'moins 6') !== false || stripos($answer, '<6') !== false) {
                    return "📋 PARTIE 4 : COMPORTEMENTS ET BIEN-ÊTRE\nQuestion : Combien d'heures de sommeil avez-vous par nuit ?\nRÉPONSE : Moins de 6 heures\nProblème identifié :\n•\tInsuffisance sommeil chronique\nImpacts obésité :\n•\t↑ Ghréline (hormone faim)\n•\t↓ Leptine (hormone satiété)\n•\tFringales glucides/graisses\n•\tMétabolisme ralenti\nImpacts HTA :\n•\tTA augmentée (5-10 mmHg vs sommeil normal)\n•\tSystème nerveux sympathique activé\nObjectif : 7-9 heures/nuit\nStratégie amélioration sommeil :\nSemaine 1-2 : +30-60 min\nSemaine 3-4 : +60-90 min\nSemaine 5+ : 7-9h cible\nRoutine pré-sommeil (90-120 min avant coucher) :\n21h-21h30 : Dîner léger terminé\nDîner favorisant sommeil :\n•\tTryptophane : Poulet, poisson, œufs, yaourt, noix, graines\n•\tGlucides complexes modérés : Facilitent absorption tryptophane\n•\tMagnésium : Relaxant naturel\nExemples dîner pro-sommeil :\n•\tOption A : Fonio (portion modérée) + poulet grillé + épinards + yaourt nature\n•\tOption B : Patate douce + poisson + gombo + banane (petit)\n•\tOption C : Igname + sauce légère + sardines + lait écrémé chaud + miel (½ c. à café)\n22h-22h30 : Techniques relaxation\n•\tRespiration profonde : 4-7-8 (inspirer 4s, retenir 7s, expirer 8s) × 5-10\n•\tRelaxation musculaire progressive\n•\tTisane relaxante : Citronnelle, tilleul, camomille\nHygiène sommeil :\nÀ FAIRE :\n1.\tRégularité : Coucher/lever mêmes heures tous les jours (± 30 min)\n2.\tLumière naturelle : Exposition soleil matin (régule rythme circadien)\n3.\tActivité physique : Quotidienne MAIS terminer 3-4h avant coucher\n4.\tChambre : Sombre, silencieuse, aérée\nÀ ÉVITER :\n1.\tÉcrans 1-2h avant coucher : Lumière bleue ↓ mélatonine\n2.\tCaféine après 14h-15h\n3.\tAlcool : Fragmente sommeil\n4.\tExercice intense soir\n5.\tRepas copieux tard\nConseils ciblés < 6h sommeil :\n1.\tPriorité santé : Sommeil NON négociable - aussi important que nutrition\n2.\tImpact poids : Chaque heure manquante = +500 kcal fringales/jour\n3.\tImpact TA : Sommeil < 6h = TA +5-10 mmHg vs sommeil 7-8h\n4.\tProgressif : +15-30 min/semaine (ajustement graduel)\n5.\tWeek-end : Même horaires (pas grasse matinée compensatoire)";
                }
                if (stripos($answer, '6-7') !== false || stripos($answer, '6 à 7') !== false) {
                    return "RÉPONSE : 6-7 heures\nSituation :\n•\tDurée limite basse acceptable\n•\tOptimisable pour résultats maximaux\nObjectif : 7-9 heures\nStratégie :\n•\tAjouter 30-60 min progressivement\n•\tSemaine 1-2 : +30 min → 6h30-7h30\n•\tSemaine 3+ : Viser 7h30-8h\nConseils ciblés :\n1.\tQualité : Avec 6-7h, qualité sommeil cruciale → appliquer hygiène sommeil strictement\n2.\tConstance : Régularité horaires (± 15 min max)\n3.\tRéveil : Si réveil spontané avant alarme, reposé → peut-être suffisant (écouter corps)\n4.\tFatigue diurne : Si fatigue/somnolence journée → augmenter durée\n5.\tWeek-end : Si besoin 9-10h week-end pour \"récupérer\" → dette sommeil semaine → rallonger nuits semaine";
                }
                if (stripos($answer, '8-9') !== false || stripos($answer, '8 à 9') !== false) {
                    return "RÉPONSE : 8-9 heures\nSituation :\n•\tEXCELLENT\n•\tDurée optimale santé\nConseils ciblés :\n1.\tFélicitations : Habitude exceptionnelle, maintenir !\n2.\tQualité : S'assurer qualité (réveils fréquents ? Ronflement/apnée ?) - voir question suivante\n3.\tRégularité : Constance horaires même week-end\n4.\tHygiène : Poursuivre bonnes pratiques (chambre sombre, fraîche, routine)\n5.\tBien-être : Reconnaître impact positif (énergie, humeur, contrôle poids, TA)";
                }
                if (stripos($answer, 'plus de 9') !== false || stripos($answer, '+9') !== false || stripos($answer, '>9') !== false) {
                    return "RÉPONSE : Plus de 9 heures\nSituation :\n•\tPossiblement sommeil insuffisant en qualité (apnée ? Fragmentation ?)\n•\tOU besoin physiologique augmenté (rare)\n•\tOU hypersomnie (dépression, hypothyroïdie, autre condition médicale)\nConseils ciblés :\n1.\tÉvaluation qualité : Voir question apnée du sommeil\n2.\tFatigue persistante : Si > 9h mais toujours fatigué → consultation médicale (bilan thyroïde, anémie, apnée)\n3.\tDépression : Hypersomnie peut être symptôme - surveiller humeur, motivation\n4.\tRoutine : Même si > 9h, maintenir horaires réguliers (éviter > 10h)\n5.\tActivité physique : Exercice quotidien améliore qualité sommeil";
                }
                return "Conseils sommeil : Viser 7-9h/nuit pour optimiser perte de poids et contrôle tensionnel.";

            case 'apnee':
                if ($isYes) {
                    return "📋 Question : Avez-vous l'apnée du sommeil ?\n✅ RÉPONSE : OUI\nImpact majeur :\n•\tObésité : Apnée ↔ obésité (cercle vicieux)\n•\tHTA : Apnée = TA élevée nocturne + diurne (50-60% apnéiques hypertendus)\n•\tDiabète : Résistance insuline aggravée\n•\tCardiovasculaire : Risque AVC, infarctus multiplié\n•\tQualité vie : Fatigue chronique, somnolence diurne, irritabilité\nAdaptations alimentaires spécifiques apnée :\nPoids : Perte de poids = traitement N°1 apnée\n•\tObjectif : 5-10% poids corporel → réduction 30-50% événements apnéiques\n•\tPlan : Suivre plan alimentaire niveau activité + déficit 500 kcal/jour\n•\tProgression : 0,5-1 kg/semaine\nDîner léger + timing :\n•\tHoraire : 19h-20h MAXIMUM (3-4h avant coucher)\n•\tPortion : Plus petite que déjeuner\n•\tComposition : Protéines maigres + légumes, éviter féculents lourds, graisses\nExemples dîner apnée :\n•\tOption A : Soupe légumes (gombo, tomate, épinards) + poisson grillé + salade\n•\tOption B : Légumes vapeur abondants + poulet sans peau + yaourt nature\n•\tOption C : Salade complète (laitue, tomate, concombre, œuf dur, thon) + fruit\nÉviter absolument :\n1.\tAlcool : Relaxe muscles pharynx → aggrave apnée (même 1 verre)\n2.\tSédatifs/somnifères : Même effet\n3.\tRepas copieux tard : Pression abdominale → reflux → apnée aggravée\n4.\tProduits laitiers gras soir : Mucus pharynx\nPosition sommeil :\n•\tÉviter : Dos (langue recule, obstruction aggravée)\n•\tPrivilégier : Côté gauche (optimal circulation + respiration)\nTraitement médical :\n•\tCPAP (PPC) : Si prescrit, utiliser CHAQUE NUIT (adhésion stricte)\n•\tCombinaison : CPAP + perte poids + nutrition optimale = synergie maximale\nConseils ciblés apnée :\n1.\tPoids : Priorité absolue - chaque kg perdu améliore apnée\n2.\tSuivi médical : Réévaluation apnée tous les 6-12 mois\n3.\tCPAP : Ne pas abandonner même si inconfortable\n4.\tHTA : Traitement apnée → TA baisse 5-10 mmHg\n5.\tÉnergie : Avec traitement + perte poids → énergie diurne ↑ → activité physique facilitée → perte poids accélérée (cercle vertueux)";
                }
                return "❌ RÉPONSE : NON\nSituation :\n•\tAbsence apnée connue\n•\tMAIS : Obésité = facteur de risque majeur apnée\nDépistage conseillé si :\n•\tRonflement fort\n•\tPauses respiratoires observées par entourage\n•\tRéveils fréquents\n•\tFatigue persistante malgré sommeil 7-9h\n•\tSomnolence diurne excessive\n•\tCéphalées matinales\n•\tBouche sèche au réveil\nConseils ciblés :\n1.\tVigilance : Surveiller symptômes apnée (apparition progressive avec obésité)\n2.\tConsultation : Si symptômes → médecin → polysomnographie\n3.\tPrévention : Perte de poids réduit risque développement apnée\n4.\tPosition : Dormir sur côté (prévention ronflement)\n5.\tAlcool : Limiter (relaxe muscles pharynx)";

            case 'regime_recent':
                if ($isYes) {
                    return "📋 Question : Avez-vous récemment fait un régime de perte de poids ?\n✅ RÉPONSE : OUI\n→ Conduit à question suivante : Combien de poids avez-vous perdu ?";
                }
                return "❌ RÉPONSE : NON\nSituation :\n•\tAucune tentative perte poids récente\nApproche :\nMotivation intrinsèque :\n•\tPourquoi perdre poids ? (santé, mobilité, énergie, longévité, qualité vie)\nBénéfices concrets :\n•\tHTA contrôlée (possiblement sans/moins médicaments)\n•\tRisque diabète/cardiovasculaire réduit\n•\tMobilité améliorée\n•\tÉnergie quotidienne augmentée\n•\tSommeil amélioré (apnée réduite si présente)\nObjectifs réalistes SMART :\n•\tSpécifique : \"Perdre 8 kg\"\n•\tMesurable : Pesée hebdomadaire, tour de taille mensuel\n•\tAtteignable : 0,5-1 kg/semaine = 2-4 kg/mois\n•\tRéaliste : Pas \"perdre 20 kg en 1 mois\"\n•\tTemporel : \"D'ici 3 mois\"\nPremière étape (Semaine 1-4) :\n1.\tCarnet alimentaire : Noter TOUT pendant 2 semaines (prise conscience)\n2.\tIdentifier : 3-5 changements faciles\n3.\tImplémenter : 1 changement/semaine (progression douce)\n4.\tMesures initiales : Poids, tour de taille, TA, photos\nConseils ciblés :\n1.\tJamais trop tard : Bénéfices santé à tout âge\n2.\tProgression : Petits changements durables > régime draconien temporaire\n3.\tSoutien : Famille, amis, professionnels (nutritionniste, médecin)\n4.\tSanté > esthétique : Priorité = se sentir mieux, vivre plus longtemps";

            case 'regime_poids_perdu':
                if (stripos($answer, 'moins de 5') !== false || stripos($answer, 'moins 5') !== false || stripos($answer, '<5') !== false) {
                    return "Question : Combien de poids avez-vous perdu ?\nRÉPONSE : Moins de 5 kg\nSituation :\n•\tTentative perte poids modeste\n•\tPossibles causes : durée insuffisante, adhésion partielle, régime inadapté\nSi échec/plateau :\nCauses fréquentes :\n1.\tDéficit calorique insuffisant\n2.\tSnacking/grignotage non comptabilisé\n3.\tBoissons caloriques\n4.\tSédentarité\n5.\tSommeil < 6-7h\n6.\tStress chronique\n7.\tRégime trop restrictif → métabolisme ralenti\nStratégie relance :\n•\tDéficit : 500-700 kcal/jour (perte 0,5-1 kg/semaine)\n•\tProtéines : Maintenir 25-28% (satiété, masse musculaire)\n•\tActivité : Ajouter 30-45 min/jour marche rapide\n•\tConstance : Adhésion 6-7 jours/7\nConseils ciblés < 5 kg :\n1.\tPatience : Perte saine = 0,5-1 kg/semaine\n2.\tPetites victoires : 2-3 kg déjà = bénéfices santé (TA ↓, glycémie ↓)\n3.\tMesures : Poids + tour de taille + vêtements\n4.\tMuscle : Activité physique + protéines = maintien masse musculaire";
                }
                if (stripos($answer, '5') !== false && (stripos($answer, '10') !== false || stripos($answer, 'dix') !== false)) {
                    return "RÉPONSE : 5-10 kg\nSituation :\n•\tEXCELLENT résultat\n•\tPerte significative cliniquement\n•\tRisque : Reprise poids (effet yo-yo)\nBénéfices santé déjà obtenus :\n•\tTA réduite 5-10 mmHg\n•\tGlycémie améliorée\n•\tCholestérol/triglycérides améliorés\n•\tMobilité augmentée\n•\tÉnergie augmentée\nPrévention reprise poids :\n1.\tActivité physique : INDISPENSABLE maintien (150-300 min/semaine)\n2.\tSurveillance : Pesée hebdomadaire\n3.\tLimites : Définir \"poids alerte\" (+2-3 kg) → réaction immédiate\n4.\tHabitudes permanentes : Plan alimentaire = style de vie\n5.\tSommeil : Maintenir 7-9h\nConseils ciblés 5-10 kg :\n1.\tFélicitations : Résultat exceptionnel, preuve de discipline !\n2.\tMaintien : 80% reprennent poids → ÉVITER avec vigilance + habitudes permanentes\n3.\tRéévaluation : Consultation médicale (HTA contrôlée ? Médicaments réduits/arrêtés ?)";
                }
                if (stripos($answer, 'plus de 10') !== false || stripos($answer, '+10') !== false || stripos($answer, '>10') !== false) {
                    return "RÉPONSE : Plus de 10 kg\nSituation :\n•\tEXCEPTIONNEL\n•\tTransformation majeure\n•\tBénéfices santé considérables\n•\tRisque élevé : Reprise poids si vigilance relâchée\nBénéfices santé > 10 kg :\n•\tTA réduite 10-20 mmHg\n•\tDiabète type 2 : Possiblement réversible/rémission\n•\tCholestérol normalisé\n•\tApnée du sommeil : Amélioration 50-70%\n•\tQualité vie : Amélioration majeure\nPriorité absolue : MAINTIEN\nStratégies maintien > 10 kg perdus :\n1.\tCalories : Augmenter progressivement jusqu'à calories maintien\n2.\tSurveillance stricte : Pesée hebdomadaire, tour de taille mensuel\n3.\tActivité physique : 250-300 min/semaine\n4.\tHabitudes : Maintien strict (plan alimentaire = style de vie définitif)\nPhase maintien long terme (vie entière) :\n1.\tVigilance continue : Poids limite (+2-3 kg max) → réaction immédiate\n2.\tActivité physique non négociable : 60 min/jour minimum\n3.\tPesée hebdomadaire : Rituel permanent\n4.\tSommeil : 7-9h perpétuellement\n5.\tGestion stress : Techniques permanentes\nConseils ciblés > 10 kg :\n1.\tBRAVO : Accomplissement extraordinaire, transformation vie\n2.\tVigilance vie entière : Maintien > perte (statistiquement plus difficile)\n3.\tNouveau normal : Habitudes acquises = identité maintenant\n4.\tSuivi médical : Consultation tous les 6-12 mois";
                }
                return "Conseils : Continuer une perte progressive et durable de 0,5-1 kg/semaine.";

            case 'activite_jours':
                if (stripos($answer, 'aucun') !== false || stripos($answer, '0') !== false) {
                    return "📋 PARTIE 5 : ACTIVITÉ PHYSIQUE\nQuestion : Combien de jours par semaine pratiquez-vous une activité physique ?\nRÉPONSE : Aucun\nProblème majeur :\n•\tSédentarité = facteur de risque cardiovasculaire indépendant\n•\tMétabolisme ralenti, perte masse musculaire\nObjectif OMS :\n•\tMinimum : 150 min/semaine activité modérée\n•\tOptimal : 300 min/semaine activité modérée\nStratégie initiation progressive :\nPhase 1 (Semaine 1-2) : 5-10 min/jour\n•\tMarche lente/normale autour du quartier\nPhase 2 (Semaine 3-4) : 15 min/jour\nPhase 3 (Semaine 5-6) : 20-25 min/jour\nPhase 4 (Semaine 7-8) : 30 min/jour (objectif OMS minimal)\nPhase 5 (Mois 3+) : 45-60 min/jour\nActivités accessibles Bénin (zéro équipement) :\n•\tMarche : Gratuite, accessible\n•\tExercices maison (poids du corps) : Squats, pompes mur, fentes, planche\n•\tActivités quotidiennes : Escaliers, ménage vigoureux, jardinage\nHTA spécifiquement :\n•\tActivité modérée quotidienne → TA ↓ 5-8 mmHg (équivalent 1 médicament anti-HTA)\n•\tContre-indication temporaire : Si TA > 180/110 mmHg → contrôler médicalement d'abord\nConseils ciblés :\n1.\tTrès progressif : Ne pas se précipiter (risque abandon/blessure)\n2.\tRégularité > intensité : 10 min quotidiennes > 60 min 1×/semaine\n3.\tPlaisir : Trouver activité plaisante (musique en marchant, compagnie)\n4.\tRoutine : Même heure quotidiennement";
                }
                if (stripos($answer, '1') !== false || stripos($answer, '2') !== false || stripos($answer, '3') !== false) {
                    return "RÉPONSE : 1-3 jours\nSituation :\n•\tActivité présente mais insuffisante\n•\tBon départ, progression nécessaire\nObjectif : 5-7 jours/semaine\nStratégie :\nSemaine 1-2 : +1 jour\nSemaine 3-4 : +1-2 jours supplémentaires\nSemaine 5+ : 5-7 jours/semaine\nConseils ciblés :\n1.\tBase solide : Habitude déjà amorcée (facilite progression)\n2.\tConstance : Viser quotidien (habitude plus facile à maintenir que 3×/semaine)\n3.\tVariété : Alterner activités (évite monotonie/blessures)\n4.\tIntensité : Privilégier régularité quotidienne > séances intenses espacées";
                }
                if (stripos($answer, '4') !== false || stripos($answer, '5') !== false || stripos($answer, '6') !== false) {
                    return "RÉPONSE : 4-6 jours\nSituation :\n•\tTRÈS BON niveau activité\n•\tApproche objectifs OMS\nObjectif : Optimisation\nDurée :\n•\tSi < 30 min/session → Augmenter à 45-60 min\n•\tSi déjà 45-60 min → Parfait, maintenir\nIntensité :\n•\tIntroduire intervalles (marche rapide 2 min / normale 1 min)\n•\t1-2 séances/semaine plus intenses\nVariété :\n•\tMarche + exercices maison (renforcement musculaire)\n•\tÉtirements/flexibilité (10 min post-exercice)\nConseils ciblés :\n1.\tExcellence : Niveau activité exceptionnel, félicitations\n2.\tProgression : Si stagnation poids/TA → augmenter intensité\n3.\tRécupération : 1 jour repos/semaine acceptable";
                }
                if (stripos($answer, '7') !== false || stripos($answer, 'tous') !== false || stripos($answer, 'quotidien') !== false) {
                    return "RÉPONSE : 7 jours\nSituation :\n•\tEXCEPTIONNEL\n•\tHabitude quotidienne installée\nOptimisation :\nVariété obligatoire :\n•\tCardio (marche, course, vélo) : 5 jours/semaine\n•\tRenforcement (exercices poids corps) : 2-3 jours/semaine\n•\tFlexibilité (étirements, yoga) : 2-3 jours/semaine\nIntensité :\n•\t5 jours modérée + 2 jours intenses\nConseils ciblés :\n1.\tAdmirable : Constance exemplaire\n2.\tRécupération : Vital même si quotidien → alterner intensités\n3.\tÉcoute corporelle : Fatigue persistante → repos 1-2 jours\n4.\tNutrition : Apports adéquats (protéines si renforcement musculaire)\n5.\tSommeil : 8h/nuit si activité quotidienne intense";
                }
                return "Conseils : Augmenter progressivement la fréquence d'activité physique.";

            case 'sedentarite':
                if (stripos($answer, 'moins de 4') !== false || stripos($answer, 'moins 4') !== false) {
                    return "📋 Question : Combien de temps passez-vous en position assise chaque jour ?\nRÉPONSE : Moins de 4 heures\nSituation : EXCELLENT - Sédentarité minimale, mode de vie actif\nConseils ciblés :\n1.\tFélicitations : Excellent comportement santé\n2.\tMaintien : Continuer mode de vie actif\n3.\tRenforcement : Activité physique additionnelle optimise résultats";
                }
                if (stripos($answer, '4') !== false && stripos($answer, '6') !== false) {
                    return "RÉPONSE : 4-6 heures\nSituation : Sédentarité modérée, acceptable si compensée\nConseils ciblés :\n1.\tCompensations : 30-60 min activité quotidienne compense partiellement\n2.\tPauses : Toutes les heures, se lever 2-3 min (marcher, étirer)\n3.\tTravail : Si sédentaire professionnel → pauses actives systématiques";
                }
                if (stripos($answer, '6') !== false && stripos($answer, '8') !== false) {
                    return "RÉPONSE : 6-8 heures\nProblème : Sédentarité élevée\nAdaptations :\nPauses actives obligatoires : Toutes les 30-45 min\n•\tSe lever, marcher 2-3 min, étirements légers\nEnvironnement :\n•\tTravail : Station debout périodes (si possible)\n•\tMaison : Éviter s'asseoir immédiatement après travail → marche 10 min\n•\tTV/écrans : Limiter, exercices légers pendant\nConseils ciblés :\n1.\tAlarmes : Téléphone/montre rappels toutes les 30-45 min\n2.\tHydratation : Boire régulièrement → urines fréquentes → lève automatiquement\n3.\tActivité compensatoire : 60 min/jour minimum\n4.\tWeek-end : Maximiser activités debout/marche";
                }
                if (stripos($answer, 'plus de 8') !== false || stripos($answer, '+8') !== false || stripos($answer, '8h') !== false) {
                    return "RÉPONSE : Plus de 8 heures\nProblème majeur :\n•\tSédentarité excessive\n•\tRisques : mortalité +50-100%, maladies cardiovasculaires\n•\tMême si exercice quotidien : Assis > 8h = risques élevés\nAdaptations drastiques :\nPauses actives ultra-fréquentes : Toutes les 20-30 min OBLIGATOIREMENT\nRéorganisation environnement :\n•\tTravail : Bureau debout, alterner assis/debout, réunions en marchant, appels debout\n•\tMaison : Pas s'asseoir automatiquement, activités debout, TV avec exercices simultanés\nActivité compensatoire : 60-90 min/jour minimum\n•\tMatin : 30 min marche\n•\tPauses travail : 3× 10 min = 30 min\n•\tSoir : 30 min activité\nConseils ciblés > 8h assis :\n1.\tUrgence : Sédentarité > 8h = urgence santé\n2.\tRéveil : Toutes les 20 min (non négociable)\n3.\tWeek-end : Activités debout/marche maximales";
                }
                return "Conseils : Réduire le temps assis, pauses actives toutes les 30 minutes.";

            case 'activites_preferees':
                if (stripos($answer, 'marche') !== false) {
                    return "📋 Question : Quelles activités physiques appréciez-vous ?\nRÉPONSE : Marche\nExcellent choix : Accessible, gratuite, faible impact articulations\nOptimisation marche :\nVariété :\n•\tMarche lente : Récupération, jours légers\n•\tMarche modérée : Base quotidienne\n•\tMarche rapide : 2-3×/semaine (cardio intense)\n•\tIntervalles : Alterner rapide/lente\nTerrains :\n•\tPlat : Endurance\n•\tMontées/escaliers : Renforcement cuisses, fessiers, cardio intense\nProgramme marche progressif :\nDébutant : 10-15 min/jour → +5 min/semaine → 30-45 min quotidiens\nIntermédiaire : 30-45 min/jour + 2×/semaine séances rapides\nAvancé : 45-60 min/jour + intervalles + marche longue week-end\nConseils marche :\n1.\tPosture : Dos droit, regard horizon, bras balancement naturel\n2.\tHydratation : Eau avant/pendant (si > 30 min)/après\n3.\tTiming : Matin tôt OU soir (après 18h) - éviter 12h-16h (chaleur)\n4.\tObjectif quotidien : 7 000-10 000 pas/jour";
                }
                if (stripos($answer, 'yoga') !== false) {
                    return "RÉPONSE : Yoga\nExcellent choix : Flexibilité, équilibre, force, gestion stress\nAdaptation obésité + HTA :\nStyles sûrs :\n•\tHatha yoga : Doux, accessible débutants\n•\tYin yoga : Étirements profonds, relaxation\n•\tYoga restauratif : Très doux, récupération\nÉviter initialement :\n•\tAshtanga, Vinyasa : Intenses, rapides\n•\tBikram/hot yoga : Chaleur excessive (risque HTA)\nAdaptations postures :\n•\tInversions (tête en bas) : Éviter si HTA non contrôlée\n•\tSupports : Blocs, coussins, mur (facilite postures)\nRespiration (Pranayama) :\n•\tRespiration abdominale : Réduit TA, stress\n•\tUjjayi : Respiration océan, calmante\nConseils yoga :\n1.\tProgression : Très graduelle, écoute corporelle\n2.\tSupports : Utiliser généreusement\n3.\tComplémentarité : Yoga + marche = combinaison excellente (cardio + flexibilité/force)";
                }
                if (stripos($answer, 'danse') !== false) {
                    return "RÉPONSE : Danse\nExcellent choix : Cardio efficace, ludique, social\nStyles accessibles Bénin :\n•\tDanse traditionnelle : Rythmes locaux\n•\tZumba : Si cours disponibles\n•\tDanse libre : Musique favorite maison\nProgramme danse :\nDébutant : 15-20 min, 3×/semaine\nIntermédiaire : 30-45 min, 4-5×/semaine\nAvancé : 45-60 min, 5-7×/semaine\nConseils danse :\n1.\tHydratation : Cruciale (activité intense, transpiration)\n2.\tÉchauffement : 5 min mouvements doux\n3.\tSocial : Cours groupe (si disponibles) → motivation\n4.\tLiberté : Pas de jugement, mouvement libre, plaisir prioritaire";
                }
                return "Adaptation selon activité :\nVélo : Excellent cardio, faible impact articulations\nNatation : Idéal obésité (portance eau, zéro impact)\nJardinage : Activité modérée-intense si > 30 min continus\nSports collectifs : Excellents si accès, social, ludique\nConseils activités diverses :\n1.\tPlaisir : Activité appréciée = adhésion long terme\n2.\tVariété : Combiner plusieurs activités\n3.\tSécurité : Équipement adéquat, échauffement, progression graduelle\n4.\tSocial : Activités groupe → motivation, engagement";

            case 'fc_connaissance':
                if ($isYes) {
                    return "📋 Question : Connaissez-vous votre fréquence cardiaque au repos ?\n✅ RÉPONSE : OUI\n→ Conduit à question suivante : Veuillez nous la donner\nFCR et santé cardiovasculaire :\n•\tFCR basse (50-60 bpm) = condition cardiovasculaire excellente\n•\tFCR élevée (> 80-90 bpm) = risque cardiovasculaire accru\nZones d'entraînement :\n•\tFCmax : Formule de Tanaka : FCmax ≈ 208 − 0,7 × âge\n•\tZone 1 (50-60% FCmax) : Récupération\n•\tZone 2 (60-70% FCmax) : Brûlage graisses, endurance\n•\tZone 3 (70-80% FCmax) : Amélioration cardiovasculaire\nRecommandation obésité + HTA :\n•\tDébut : Zone 2 (60-70% FCmax)\n•\tProgression : Zone 3 (70-80% FCmax)\n•\tÉviter : Zones 4-5 initialement (risque TA excessive)";
                }
                return "❌ RÉPONSE : NON\nRecommandation : Apprendre mesure FCR\nComment mesurer FCR :\n1.\tMoment : Matin, au réveil, avant se lever\n2.\tPosition : Allongé, détendu, 5 min repos\n3.\tPalpation : 2 doigts sur poignet (artère radiale) ou cou (carotide)\n4.\tCompter : 60 secondes complètes\n5.\tNoter : Carnet (suivi évolution)\nFréquence mesure : 1×/semaine\nConseils ciblés :\n1.\tRéférence : Établir FCR baseline (moyenne 3 mesures sur 1 semaine)\n2.\tObjectif : < 80 bpm idéal, < 70 bpm excellent\n3.\tConsultation : Si FCR > 100 bpm repos → médecin";

            case 'fc_valeur':
                if (is_numeric($answer)) {
                    $fcVal = (int) $answer;
                    if ($fcVal >= 40 && $fcVal <= 70) {
                        return "Question : Veuillez nous donner votre FCR\nFCR : {$fcVal} bpm\nÉvaluation : Excellent pour personne débutant exercice\nMarge progression importante\nObjectif : Réduction 5-10 bpm avec activité régulière\nSuivi : Mesurer FCR hebdomadairement\nZones entraînement adaptées HTA : Zone 2-3 principalement";
                    }
                    if ($fcVal >= 71 && $fcVal <= 80) {
                        return "FCR : {$fcVal} bpm\nÉvaluation : Acceptable mais améliorable\nActivité physique régulière → réduction vers 60-70 bpm\nObjectif : 6-12 semaines activité régulière → amélioration notable";
                    }
                    if ($fcVal >= 81 && $fcVal <= 100) {
                        return "FCR : {$fcVal} bpm\nÉvaluation : Élevée - urgence activité physique\nObjectif prioritaire : Réduction vers 70 bpm\n6-12 semaines activité régulière → amélioration notable\nStratégies :\n1.\tExercice cardio régulier : 5x/semaine, 30-45min\n2.\tPerte de poids : Chaque 5kg perdus → -2 à -3 bpm\n3.\tRéduction stress : Méditation, yoga, respiration\n4.\tHydratation : 2-3L eau/jour\n5.\tArrêt stimulants : Café excessif, boissons énergisantes";
                    }
                    if ($fcVal > 100) {
                        return "FCR : {$fcVal} bpm\nALERTE - Tachycardie\nConsultation médicale urgente\nCauses possibles : Stress, anxiété, hyperthyroïdie, anémie, déshydratation, problème cardiaque\nActivité physique : Avis médical AVANT de débuter\nACTION REQUISE :\n1.\tConsultation médicale - Bilan cardiovasculaire\n2.\tECG recommandé\n3.\tBilan sanguin (thyroïde, anémie)";
                    }
                }
                return "Maintenir une FCR basse par une activité physique régulière.";

            case 'stress_ennui':
                if ($isYes) {
                    return "📋 PARTIE 6 : COMPORTEMENTS ALIMENTAIRES\nQuestion : Mangez-vous souvent par stress ou ennui ?\n✅ RÉPONSE : OUI\nProblème identifié :\n•\tAlimentation émotionnelle : Manger sans faim physiologique\n•\tDéconnexion signaux faim/satiété\n•\tCercle vicieux : stress → manger → culpabilité → stress\nDistinction faim physique vs émotionnelle :\nFaim physique :\n•\tApparition progressive\n•\tEstomac vide, gargouillis\n•\tOuverte tous aliments (légumes OK)\n•\tArrêt à satiété\nFaim émotionnelle :\n•\tApparition soudaine\n•\tEnvie spécifique (sucré, gras, salé)\n•\tPas de satiété (continue malgré plein)\n•\tCulpabilité post-consommation\nStratégies gestion :\n1. Identification déclencheurs :\nCarnet émotions-alimentation (2 semaines)\n2. Techniques alternatives :\nStress : Respiration 4-7-8, marche 10 min, appel ami, tisane chaude, prière/méditation\nEnnui : Activité manuelle, lecture, jardinage, rangement, marche\n3. Technique HALT :\nHungry ? Angry ? Lonely ? Tired ?\nSi NON à H mais OUI à A/L/T → Besoin émotionnel (pas alimentaire)\n4. Règle délai 15 minutes :\nEnvie manger émotionnel → attendre 15 min → souvent envie disparue\n5. Alimentation consciente (mindful eating) :\n•\tS'asseoir, pas d'écrans\n•\tPetites bouchées, mâcher lentement\n•\tÉcouter satiété, arrêter 80% plein\n6. Collations \"sûres\" si vraiment besoin :\n•\tLégumes crus, fruits, tisane, yaourt nature, noix (10-12)\nConseils ciblés :\n1.\tNormalisation : Très fréquent (60-70% personnes obèses), pas de honte\n2.\tProcessus : Changement prend temps (patience, bienveillance)\n3.\tObjectif : Pas perfection mais réduction 80-90%";
                }
                return "❌ RÉPONSE : NON\nSituation :\n•\tExcellent contrôle émotions-alimentation\n•\tDistinction faim physique/émotionnelle claire\nConseils ciblés :\n1.\tFélicitations : Compétence précieuse santé mentale/physique\n2.\tVigilance : Périodes stressantes → risque émergence\n3.\tTechniques : Maintenir gestion stress saines\n4.\tModèle : Partager stratégies entourage";

            case 'finir_assiette':
                if ($isYes) {
                    return "📋 Question : Avez-vous tendance à finir votre assiette même si vous n'avez plus faim ?\n✅ RÉPONSE : OUI\nProblème identifié :\n•\tIgnorance signaux satiété\n•\tConditionnement culturel/familial (\"finir assiette\", \"ne pas gaspiller\")\n•\tExcès caloriques chroniques → obésité\nStratégies réapprendre satiété :\n1. Échelle faim-satiété (0-10) :\n•\t0 : Affamé, faiblesse\n•\t3 : Faim modérée\n•\t5 : Neutre\n•\t7 : Confortablement rassasié\n•\t10 : Inconfortablement plein\nObjectif : Commencer repas à 3-4, arrêter à 7\n2. Servir portions plus petites :\n•\tAssiettes plus petites (illusion)\n•\tMéthode assiette : ½ légumes, ¼ protéines, ¼ féculents\n3. Manger lentement :\n•\tPoser couverts entre bouchées\n•\tMâcher 20-30 fois par bouchée\n•\tDurée repas : 20-30 min minimum\n4. Pause mi-repas :\n•\tÀ mi-assiette → pause 2-3 min\n•\tBoire eau, évaluer faim résiduelle\n5. Restes = ressource (pas gaspillage) :\n•\tArrêter quand rassasié ≠ gaspillage\n•\tRestes = repas futur\nConseils ciblés :\n1.\tRééducation : Processus graduel (patience)\n2.\tPermission : S'autoriser laisser (culpabilité = barrière)\n3.\tFamille : Expliquer (éviter commentaires \"tu ne finis pas ?\")\n4.\tExpérimentation : Tester laisser ¼ assiette 1 semaine → observer effets";
                }
                return "❌ RÉPONSE : NON\nSituation :\n•\tExcellent écoute corporelle\n•\tRespect signaux satiété\nConseils ciblés :\n1.\tFélicitations : Compétence précieuse contrôle pondéral\n2.\tMaintien : Continuer écoute attentive\n3.\tTransmission : Partager approche (famille, enfants)\n4.\tVigilance : Situations sociales (pression finir) → rester ferme";

            case 'regime_particulier':
                if ($isYes) {
                    return "📋 Question : Avez-vous déjà suivi un régime alimentaire particulier ?\n✅ RÉPONSE : OUI\n→ Conduit à question suivante";
                }
                return "❌ RÉPONSE : NON\nSituation : Aucun régime formel passé - Page blanche\nConseils ciblés :\n1.\tOpportunité : Première expérience structurée\n2.\tÉviter pièges : Régimes yo-yo, restrictions extrêmes, mono-aliments\n3.\tApproche durable : Plan guide = changements permanents style de vie\n4.\tApprentissage : Éducation nutritionnelle (comprendre POURQUOI, pas seulement QUOI)\n5.\tPatience : Résultats prennent temps (accepter)\n6.\tSoutien : S'entourer (famille, amis, professionnels)";

            case 'regime_efficacite':
                if (stripos($answer, 'restrictif') !== false || stripos($answer, 'extrême') !== false || stripos($answer, '1000') !== false) {
                    return "Question : Si oui, lequel, et a-t-il été efficace ?\nRégime restrictif extrême (< 1000 kcal/jour, mono-aliment, jeûne prolongé)\nAnalyse :\n•\tEfficacité court terme : Oui (perte poids rapide)\n•\tEfficacité long terme : Non (reprise poids ≥ 95% cas)\nDangers :\n•\tMétabolisme ralenti (adaptation famine)\n•\tCarences nutritionnelles\n•\tPerte masse musculaire\n•\tEffet yo-yo\nApproche alternative durable :\n•\tDéficit modéré : 500-700 kcal/jour\n•\tVariété alimentaire : Tous groupes alimentaires\n•\tPerte progressive : 0,5-1 kg/semaine (durable)";
                }
                if (stripos($answer, 'low-carb') !== false || stripos($answer, 'keto') !== false || stripos($answer, 'cétogène') !== false || stripos($answer, 'glucides') !== false) {
                    return "Régime low-carb/keto :\nAnalyse :\n•\tEfficacité court terme : Oui\n•\tBénéfices possibles : Satiété accrue, réduction fringales sucrées\n•\tInconvénients : Restriction sévère, difficile social/culturellement au Bénin\nAdaptation béninoise modérée :\n•\tPas keto strict mais réduction glucides raffinés\n•\tÉliminer : Sodas, sucres ajoutés, farines très raffinées\n•\tConserver : Féculents complexes (fonio, igname, patate douce) portions contrôlées\n•\tAugmenter : Légumes, protéines, graisses saines";
                }
                if (stripos($answer, 'jeûne') !== false || stripos($answer, 'intermittent') !== false) {
                    return "Jeûne intermittent (IF - ex: 16/8) :\nAnalyse :\n•\tEfficacité : Oui pour certains\n•\tBénéfices : Simplification, autophagie, contrôle glycémique\n•\tInconvénients : Difficile socialement, risque hypoglycémie si médicaments\nSi efficace + apprécié → Continuer prudemment\nAttention :\n•\tQualité repas fenêtre alimentaire\n•\tHydratation période jeûne\n•\tConsultation médecin (si médicaments HTA)";
                }
                if (stripos($answer, 'méditerranéen') !== false) {
                    return "Régime méditerranéen :\nAnalyse : Excellente long terme\nBénéfices : Santé cardiovasculaire, anti-inflammatoire, perte poids modérée durable\nAdaptation Bénin : Très compatible\n•\tHuile d'olive → huile d'arachide (modération)\n•\tPoisson abondant\n•\tLégumes, fruits locaux\n•\tFéculents complexes (fonio = céréales complètes)\nPrincipes clés méditerranéen béninisé :\n1.\tLégumes/fruits abondants quotidiens\n2.\tPoisson 3-4×/semaine\n3.\tGraisses saines (noix, avocat)\n4.\tCéréales complètes (fonio, riz complet)\n5.\tLégumineuses régulières (haricots)\n6.\tHerbes/épices (ail, gingembre) généreux";
                }
                return "Conseils généraux régimes passés :\nClés succès long terme :\n1.\tDurabilité : Maintenir habitudes vie entière\n2.\tPlaisir : Aliments appréciés (versions saines)\n3.\tFlexibilité : 80-90% adhésion (10-20% flexibilité occasions)\n4.\tÉquilibre : Tous groupes alimentaires\n5.\tCulture : Respecte traditions/disponibilités locales\n6.\tPatience : 0,5-1 kg/semaine (marathon, pas sprint)";

            default:
                return "Aucun";
        }
    }

    private function getCardioFitnessAdvice(string $key, string $answer, array $allAnswers): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = str_contains($answerLower, 'oui');

        switch ($key) {
            case 'antecedents_diag':
                if ($isYes) {
                    return "Conseils adaptés :\n• Privilégier les aliments à index glycémique bas\n• Limiter drastiquement le sel (max 5g/jour)\n• Augmenter les fibres solubles\n• Privilégier les graisses insaturées\n• Surveiller les portions de féculents\nModifications alimentaires :\n• Remplacer le riz blanc par du riz complet ou fonio\n• Utiliser des épices (gingembre, ail, piment doux) au lieu de sel\n• Ajouter systématiquement des légumes verts à feuilles à chaque repas\n• Préférer les modes de cuisson : vapeur, bouilli, grillé, au four";
                }
                return "Conseils adaptés :\n• Maintenir une alimentation équilibrée préventive\n• Surveiller quand même l'apport en sel et sucres\n• Privilégier des aliments naturels et peu transformés\nModifications alimentaires :\n• Suivre les plans de base selon le niveau d'activité\n• Assaisonnement modéré permis\n• Variété alimentaire maximale\nRepas adaptés :\n• Suivre les plans standards proposés plus haut\n• Liberté dans le choix des sauces (en portions raisonnables)\n• Possibilité d'utiliser modérément l'huile de palme rouge (riche en vitamines)";

            case 'antecedents_lequel':
                if (stripos($answer, 'cardio') !== false || stripos($answer, 'coeur') !== false || stripos($answer, 'vasculaire') !== false) {
                    return "MALADIES CARDIOVASCULAIRES\nConseils spécifiques :\n• Graisses saturées < 7% de l'apport total\n• Privilégier oméga-3 (poissons gras)\n• Fibres solubles abondantes\n• Antioxydants (fruits et légumes colorés)\nAliments bénéfiques :\n• Poissons gras locaux (maquereau, sardine)\n• Gombo (fibres solubles)\n• Légumes verts à feuilles\n• Graines de courge et sésame\n• Avocat (avec modération)";
                }
                return $this->getAntecedentsLequelAdvice($answer);

            case 'meds_lies':
                if ($isYes) {
                    return "Conseils généraux :\n• Respecter scrupuleusement les horaires de prise\n• Certains médicaments nécessitent des ajustements alimentaires\n• Ne jamais arrêter sans avis médical\n• Informer votre médecin de tout changement alimentaire majeur\nAdaptations alimentaires :\n• Prendre les repas à heures régulières\n• Maintenir une hydratation optimale (1,5-2L d'eau/jour)\n• Éviter le pamplemousse si statines (interaction médicamenteuse)";
                }
                return "Conseils :\n• L'alimentation devient votre principal outil thérapeutique\n• Rigueur maximale dans le suivi du plan alimentaire\n• Consultation médicale régulière pour évaluer la nécessité d'un traitement";

            case 'meds_types':
                if (stripos($answer, 'glycémie') !== false || stripos($answer, 'metformine') !== false) {
                    return "MÉDICAMENTS POUR BAISSER LA GLYCÉMIE (Metformine, Glimepiride...)\nConseils spécifiques :\n• La metformine se prend pendant ou après les repas\n• Risque d'hypoglycémie avec certains médicaments : toujours avoir une collation\n• Maintenir des horaires de repas réguliers\nRepas adaptés :\n• Avant médicament : Petit-déjeuner substantiel - Bouillie de fonio + œufs + légumes\n• Collation de sécurité : Toujours avoir des noix ou un fruit à portée\n• Éviter : Sauter des repas\n• Privilégier : Repas équilibrés avec protéines à chaque prise\nMenu type avec metformine :\n• Matin (avec médicament) : Akassa + poisson grillé + légumes + fruit\n• Midi (avec médicament) : Fonio + sauce légumes + poulet + salade\n• Soir (avec médicament) : Attiéké + ragoût de poisson + légumes verts\n• Collations : Noix, fruit, yaourt nature";
                }
                if (stripos($answer, 'insuline') !== false) {
                    return "INSULINE\nConseils spécifiques :\n• Synchronisation stricte repas/injection\n• Compter les glucides de manière précise\n• Jamais de repas sauté\n• Collations selon le schéma insulinique\nRepas adaptés avec portions de glucides contrôlées :\n• Petit-déjeuner : Bouillie de maïs (150ml) + 1 œuf + légumes = environ 30g glucides\n• Déjeuner : Riz complet (100g cuit) + sauce + protéine + légumes = environ 45g glucides\n• Dîner : Igname (80g) + sauce + protéine + légumes = environ 30g glucides\n• Collations : Fruit moyen (15g glucides) + protéine (noix)\nPlan insuline rapide + lente :\n• Glucides répartis : 30g-45g-30g-15g (collations)\n• Toujours associer protéines et fibres\n• Surveiller après activité physique";
                }
                if (stripos($answer, 'poids') !== false || stripos($answer, 'orlistat') !== false || stripos($answer, 'liraglutide') !== false) {
                    return "MÉDICAMENTS POUR PERDRE DU POIDS (Orlistat, Liraglutide...)\nConseils spécifiques pour ORLISTAT :\n• Limiter les graisses à 15g par repas (effets secondaires si excès)\n• Supplémentation en vitamines liposolubles (A, D, E, K)\n• Éviter les repas trop gras\nRepas béninois adaptés (pauvres en graisses) :\n• Petit-déjeuner : Bouillie de maïs écrémée + blancs d'œufs + légumes + fruit\n• Déjeuner : Riz + sauce tomate légère au poisson maigre + légumes (pas de sauce arachide)\n• Dîner : Attiéké + poisson grillé maigre + sauce claire + légumes vapeur\n• Collations : Fruits, légumes crus, yaourt 0%\nÀ éviter avec Orlistat :\n• Sauce arachide\n• Huile de palme\n• Avocat en excès\n• Noix en grande quantité\n• Viandes grasses\nConseils spécifiques pour LIRAGLUTIDE :\n• Effet coupe-faim : écouter sa satiété\n• Portions plus petites naturellement\n• Bien s'hydrater\nRepas adaptés (portions réduites) :\n• Petit-déjeuner : Petite bouillie + 1 œuf + quelques légumes\n• Déjeuner : Petite portion de fonio + sauce + protéine maigre + légumes\n• Dîner : Soupe de légumes + petit morceau d'igname + poisson\n• Collations : Selon la faim (souvent réduite)";
                }
                if (stripos($answer, 'tension') !== false || stripos($answer, 'iec') !== false || stripos($answer, 'ara2') !== false || stripos($answer, 'bêta-bloquants') !== false) {
                    return "MÉDICAMENTS POUR LA TENSION (IEC, ARA2, Bêta-bloquants...)\nConseils spécifiques :\n• Sel strict < 5g/jour\n• Potassium important (sauf si insuffisance rénale)\n• Hydratation régulière\n• Certains (bêta-bloquants) peuvent ralentir le métabolisme\nRepas adaptés (sans sel) :\n• Petit-déjeuner : Bouillie nature + poisson grillé maison + banane (potassium)\n• Déjeuner : Fonio + sauce tomate maison sans sel + poulet + épinards (potassium)\n• Dîner : Igname + sauce claire aux herbes + poisson + légumes verts\n• Collations : Fruits riches en potassium (banane, papaye, orange), noix non salées\nAssaisonnement alternatif:\n• Gingembre frais râpé\n• Ail pilé\n• Piment doux ou fort\n• Oignon\n• Citronnelle\n• Basilic africain\n• Jus de citron\n• Poudre de crevettes (très peu)";
                }
                if (stripos($answer, 'cholestérol') !== false || stripos($answer, 'statines') !== false) {
                    return "MÉDICAMENTS POUR LE CHOLESTÉROL (Statines)\nConseils spécifiques :\n• Éviter le pamplemousse (interaction)\n• Limiter graisses saturées\n• Augmenter fibres solubles\n• Privilégier stérols végétaux\nRepas adaptés :\n• Petit-déjeuner : Bouillie d'avoine + graines de lin + poisson maigre + orange (pas pamplemousse)\n• Déjeuner : Fonio + sauce gombo (fibres solubles) + haricots + légumes\n• Dîner : Attiéké + sauce claire + sardines + avocat (1/4) + légumes verts\n• Collations : Noix (amandes, cajou), fruits, légumes\nAliments anti-cholestérol :\n• Gombo (fibres solubles)\n• Haricots niébé\n• Fonio\n• Poissons gras (oméga-3)\n• Graines de sésame\n• Légumes verts à feuilles";
                }
                if (stripos($answer, 'aucun') !== false) {
                    return "AUCUN DE CES MÉDICAMENTS\nConseils :\n• Approche alimentaire stricte comme traitement principal\n• Potentiel de réversibilité plus élevé\n• Suivi régulier des paramètres\n• Possibilité d'éviter la médication avec bonne observance\nPlan alimentaire intensif :\n• Suivre strictement les plans selon niveau d'activité\n• Privilégier aliments anti-inflammatoires\n• Maximiser fruits, légumes, fibres\n• Activité physique progressive obligatoire";
                }
                return $this->getMedicationAdvice($key, $answer, $allAnswers);

            case 'journee_typique':
                return "📋 PARTIE 3 : HABITUDES ALIMENTAIRES\nQuestion : Décrivez une journée typique de vos repas\nCette question permet d'identifier :\n•\tLes erreurs alimentaires actuelles\n•\tLes moments de faiblesse\n•\tLes habitudes culturelles à préserver ou modifier\n•\tLes opportunités d'amélioration\nConseils selon les réponses typiques :\nSi la personne saute le petit-déjeuner :\n•\tProblème : Ralentissement métabolique, fringales, hypoglycémie\n•\tSolution : Commencer par un petit-déjeuner léger puis augmenter progressivement\n•\tProposition : Semaine 1 : Fruit + noix ; Semaine 2 : Ajouter bouillie légère ; Semaine 3 : Repas complet\nSi la personne mange beaucoup le soir :\n•\tProblème : Stockage favorisé, sommeil perturbé\n•\tSolution : Inverser progressivement les portions\n•\tProposition :\n\tAugmenter le petit-déjeuner et déjeuner\n\tRéduire le dîner de 25% chaque semaine\n\tDîner léger : Soupe de légumes + protéine maigre\nSi repas irréguliers :\n•\tProblème : Dérèglement hormonal, stockage anarchique\n•\tSolution : Établir des horaires fixes\n•\tProposition :\n\t7h-8h : Petit-déjeuner\n\t12h-13h : Déjeuner\n\t19h-20h : Dîner\n\t10h et 16h : Collations";

            case 'fruits_legumes':
                if (str_contains($answer, '1-2')) {
                    return "RÉPONSE : 1-2 portions\nProblème : Déficit majeur en fibres, vitamines, minéraux, antioxydants\nObjectif progressif :\n•\tSemaine 1-2 : Passer à 3 portions\n•\tSemaine 3-4 : Passer à 5 portions\n•\tSemaine 5+ : 7-9 portions (idéal)\nPlan d'augmentation béninois :\n•\tÉtape 1 : Ajouter 1 fruit au petit-déjeuner\n•\tÉtape 2 : Ajouter salade au déjeuner\n•\tÉtape 3 : Ajouter légumes cuits au dîner\n•\tÉtape 4 : Collations = fruits ou légumes\n•\tÉtape 5 : Doubler les portions de légumes aux repas\nSuggestions pratiques :\n•\tFruits : Orange, papaye, mangue, ananas, banane, goyave, pamplemousse\n•\tLégumes à feuilles : Gboma, folon, amarante, épinards\n•\tLégumes racines : Carotte, betterave\n•\tLégumes fruits : Tomate, concombre, aubergine, gombo\n•\tLégumineuses : Haricots niébé, pois d'angole\nRepas enrichis type :\n•\tPetit-déjeuner : Bouillie + 1 fruit + salade tomate-concombre\n•\tDéjeuner : Féculent + sauce avec 3 types de légumes + salade verte + 1 fruit\n•\tDîner : Soupe de légumes (5 variétés) + protéine + 1 fruit\n•\tCollations : 2 fruits ou légumes crus";
                }
                if (str_contains($answer, '3-4')) {
                    return "RÉPONSE : 3-4 portions\nSituation : Bien mais peut mieux faire\nObjectif : Atteindre 7-9 portions\nConseils d'optimisation :\n•\tDoubler la portion de légumes à un repas\n•\tToujours avoir un fruit en collation\n•\tCommencer les repas par une salade\n•\tAjouter des légumes dans les sauces\nMenu optimisé :\n•\tMatin : Bouillie + légumes sautés + 1 fruit\n•\tMidi : Grande salade d'entrée + plat avec légumes + 1 fruit\n•\tSoir : Soupe de légumes + plat + 1 fruit\n•\tCollations : Fruits et légumes crus";
                }
                return "RÉPONSE : 5 portions ou plus\nSituation : Excellent !\nConseils de maintien :\n•\tVarier les couleurs (vert, rouge, orange, violet)\n•\tAlterner cru et cuit\n•\tPrivilégier les légumes locaux et de saison\n•\tContinuer cette bonne habitude\nOptimisation qualitative :\n•\tPrivilégier bio ou local\n•\tLimiter la cuisson pour préserver nutriments\n•\tVarier les modes de préparation\n•\tExplorer de nouveaux légumes traditionnels";

            case 'grignotage':
                if ($isYes) {
                    return "RÉPONSE : OUI\nSi grignotage non structuré :\nProblème : Apports caloriques incontrôlés, pics glycémiques\nSolution : Transformer en collations structurées\nPlan de restructuration :\n•\tÉtape 1 : Identifier les moments de grignotage\n•\tÉtape 2 : Planifier 2 collations saines aux mêmes heures\n•\tÉtape 3 : Préparer à l'avance les collations\n•\tÉtape 4 : Éliminer tentations de la maison\nCollations saines (150-200 kcal) :\n•\t1 fruit moyen + 10 noix de cajou\n•\tYaourt nature + 1 c. à soupe de graines\n•\tBâtonnets de carotte/concombre + houmous de niébé\n•\tPetite galette de mil + lait caillé\n•\t1 banane + 1 c. à soupe de beurre d'arachide maison\n•\tPapaye + quelques amandes\n•\tOrange + noix\n•\tAvocat (1/4) sur galette de mil\n•\tSmoothie léger (fruit + lait écrémé)\n•\tPois chiches grillés épicés\nTiming optimal :\n•\tCollation 1 : 10h-10h30\n•\tCollation 2 : 16h-16h30";
                }
                return "RÉPONSE : NON\nÉvaluation :\nSi espacement > 5h entre repas :\n•\tRisque : Hypoglycémie, fringales, suralimentation au repas suivant\n•\tSolution : Introduire 2 petites collations\nSi espacement 4-5h :\n•\tSituation : Acceptable\n•\tRecommandation : Rester à l'écoute de sa faim\nCollations préventives recommandées :\n•\t1 fruit\n•\tQuelques noix\n•\tYaourt nature\n•\tLégumes crus";

            case 'aliments_grignotes':
                if (stripos($answer, 'biscuits') !== false || stripos($answer, 'bonbons') !== false || stripos($answer, 'gâteaux') !== false || stripos($answer, 'sucré') !== false || stripos($answer, 'sodas') !== false) {
                    return "SI GRIGNOTAGE SUCRÉ (biscuits, bonbons, gâteaux, sodas)\nProblème majeur :\n•\tPics glycémiques et insuliniques\n•\tCalories vides\n•\tAddiction au sucre\n•\tStockage en graisses\nPlan de sevrage progressif (4 semaines) :\nSemaine 1 : Substitution partielle\n•\tRemplacer 50% par fruits frais béninois\n•\tMangue, papaye, ananas, orange, banane\nSemaine 2 : Substitution 75%\n•\tFruits + quelques noix\n•\tDécouvrir les fruits locaux moins connus (pomme cajou, safou)\nSemaine 3 : Substitution 100%\n•\tÉliminer totalement les produits transformés sucrés\n•\tCollations 100% naturelles\nSemaine 4 : Consolidation\n•\tNouvelles habitudes installées\n•\tPalais réhabitué aux sucres naturels\nAlternatives au sucré industriel :\n•\tAu lieu de bonbons : Fruits séchés maison (mangue, ananas, banane)\n•\tAu lieu de biscuits : Galettes de mil maison légèrement sucrées au miel\n•\tAu lieu de gâteaux : Akara au four sucré (version dessert)\n•\tAu lieu de sodas : Jus naturels dilués, bissap sans sucre, infusions fruitées\nRecettes saines pour satisfaire l'envie de sucré :\n1.\tBoules d'énergie : Dattes + arachides + sésame + coco râpée\n2.\tBanane grillée : Banane plantain + cannelle\n3.\tSmoothie bowl : Papaye mixée + graines + noix de coco\n4.\tWagashi sucré : Fromage local + miel + noix";
                }
                if (stripos($answer, 'chips') !== false || stripos($answer, 'cacahuètes') !== false || stripos($answer, 'salé') !== false || stripos($answer, 'beignets') !== false) {
                    return "SI GRIGNOTAGE SALÉ (chips, cacahuètes salées, beignets frits)\nProblème majeur :\n•\tExcès de sel (HTA)\n•\tGraisses saturées/trans\n•\tCalories denses\n•\tAddiction au sel\nPlan de transition (4 semaines) :\nSemaine 1 : Réduire portions de moitié\nSemaine 2 : Alterner avec versions maison non salées\nSemaine 3 : 75% versions saines\nSemaine 4 : 100% alternatives saines\nAlternatives béninoises saines au salé :\n•\tAu lieu de chips : Chips de banane plantain au four (sans sel ou peu salées)\n•\tAu lieu de cacahuètes salées : Arachides grillées nature ou légèrement épicées\n•\tAu lieu de beignets frits : Akara au four, galettes de mil grillées\n•\tAu lieu de pop-corn salé : Pop-corn maison épicé (piment, paprika)\nRecettes béninoises saines salées :\n1.\tPois chiches rôtis épicés : Niébé grillé + piment + ail\n2.\tNoix de cajou épicées : Cajou grillé + curry + gingembre (sans sel)\n3.\tChips de légumes au four : Patate douce, igname, plantain vert\n4.\tGraines de courge grillées : Épicées au piment et ail";
                }
                return "SI GRIGNOTAGE MIXTE :\nCombiner les deux plans ci-dessus selon les dominances de vos grignotages.";

            case 'boissons':
                if (stripos($answer, 'tous les jours') !== false) {
                    return "RÉPONSE : TOUS LES JOURS\nBOISSONS SUCRÉES quotidiennes :\nImpact catastrophique :\n•\t500-1000 kcal vides par jour\n•\tRésistance à l'insuline\n•\tStéatose hépatique\n•\tAddiction forte\nPlan de sevrage intensif (6 semaines) :\nSemaines 1-2 : Réduction progressive\n•\tDiluer avec 50% d'eau\n•\tRéduire à 1 fois/jour\n•\tAlternative : Jus de fruits frais maison dilué 1:1 avec eau\nSemaines 3-4 : Substitution\n•\tPasser aux boissons non sucrées\n•\tAlternatives béninoises :\n\tBissap (hibiscus) sans sucre ou miel léger\n\tGingembre-citron\n\tInfusion de citronnelle\n\tEau de coco naturelle\nSemaines 5-6 : Élimination\n•\tArrêt total des sodas et jus sucrés\n•\tEau aromatisée naturellement\n•\tBoissons traditionnelles non sucrées\nBoissons béninoises saines :\n1.\tBissap nature : Fleurs d'hibiscus + gingembre + citron (sans sucre)\n2.\tTchoukoutou léger : Bière traditionnelle de mil (modération, faible alcool)\n3.\tInfusion de kinkeliba : Détox, digestif\n4.\tEau de tamarin : Légèrement sucrée naturellement\n5.\tJus de bissap-gingembre : Vitamine C, antioxydants\n6.\tDécoction de neem : Propriétés médicinales\n7.\tThé vert local + citronnelle\n8.\tEau détox : Eau + concombre + citron + menthe\nALCOOL quotidien :\nImpact majeur :\n•\t200-500 kcal vides/jour minimum\n•\tToxicité hépatique (foie gras)\n•\tAugmentation triglycérides\n•\tPerturbation sommeil\n•\tContre-indication avec certains médicaments\nPlan de réduction (8 semaines) :\nSemaines 1-2 : Évaluation et prise de conscience\n•\tNoter quantités exactes\n•\tIdentifier déclencheurs\nSemaines 3-4 : Réduction à 4-5 jours/semaine\n•\tJours sans alcool : lundi, mercredi, jeudi\n•\tQuantités réduites les autres jours\nSemaines 5-6 : Réduction à 2-3 jours/semaine\n•\tMaximum week-end\n•\tLimiter à 1-2 verres\nSemaines 7-8 : Objectif final\n•\tMaximum 1-2 fois/semaine\n•\tMaximum 1 verre standard\nLimites recommandées finales :\n•\tHommes : Max 2 verres/jour, max 10 verres/semaine, 2 jours sans/semaine\n•\tFemmes : Max 1 verre/jour, max 7 verres/semaine, 2 jours sans/semaine\nAlternatives béninoises festives sans alcool :\n1.\tBissap pétillant maison : Bissap + eau gazeuse + citron\n2.\tCocktail tropical : Jus d'ananas + coco + gingembre\n3.\tTchoukoutou sans alcool : Version non fermentée\n4.\tChapman béninois : Fanta réduit + bissap + citron + concombre (occasionnel)";
                }
                if (stripos($answer, 'semaine') !== false) {
                    return "RÉPONSE : UNE FOIS PAR SEMAINE\nSituation : Acceptable mais peut optimiser\nConseils :\n•\tMaintenir cette fréquence maximale\n•\tContrôler les quantités (1-2 verres)\n•\tPréférer le week-end\n•\tJamais à jeun\n•\tBien s'hydrater après\nChoix moins impactants :\n•\tVin rouge (polyphénols) : 1 verre\n•\tBière locale légère : 1 petite bouteille\n•\tÉviter cocktails sucrés et alcools forts";
                }
                if (stripos($answer, 'occasion') !== false) {
                    return "RÉPONSE : OCCASIONNELLEMENT\nSituation : Très bien !\nConseils de maintien :\n•\tGarder pour occasions spéciales\n•\tLimiter à 1-2 verres\n•\tAlterner avec eau\n•\tManger avant et pendant";
                }
                return "RÉPONSE : JAMAIS\nSituation : Excellent pour la santé !\nConseils :\n•\tMaintenir cette abstinence\n•\tRésister aux pressions sociales\n•\tProposer alternatives festives\n•\tProfiter des bienfaits (sommeil, perte de poids, santé hépatique)\nBoissons festives sans alcool :\n•\tBissap maison élaboré\n•\tJus de fruits frais mixés\n•\tCocktails tropicaux sans alcool\n•\tSodabi SANS alcool (version jus de palme frais)";

            case 'sommeil':
                if (stripos($answer, 'moins de 6') !== false) {
                    return "RÉPONSE : MOINS DE 6H\nImpact catastrophique sur la perte de poids :\n•\tAugmentation ghréline (hormone de la faim) +30%\n•\tDiminution leptine (hormone satiété) -20%\n•\tRésistance à l'insuline accrue\n•\tMétabolisme ralenti -15%\n•\tFringales sucrées augmentées\n•\tCortisol élevé (stockage abdominal)\n•\tRécupération musculaire compromise\nPlan d'amélioration du sommeil (progressif) :\nSemaines 1-2 : Gagner 30 minutes\n•\tCoucher 30 min plus tôt\n•\tObjectif : 6h30\nSemaines 3-4 : Gagner 1 heure\n•\tCoucher 1h plus tôt\n•\tObjectif : 7h\nSemaines 5+ : Objectif optimal\n•\t7-8h de sommeil\n•\tRoutine stable\nAdaptations alimentaires béninoises pour mieux dormir :\nDîner optimal (2-3h avant coucher) :\n•\tLéger mais rassasiant\n•\tRiche en tryptophane (précurseur mélatonine)\n•\tPauvre en graisses (digestion lente)\n•\tIndex glycémique modéré\nRepas du soir favorisant le sommeil :\n•\tOption 1 : Soupe de légumes + poisson grillé + igname bouillie (petite portion) + banane\n•\tOption 2 : Attiéké + sauce claire + poulet maigre + légumes + lait tiède\n•\tOption 3 : Bouillie de mil légère + œuf + légumes verts + tisane\nCollation pré-sommeil (si faim, 1h avant) :\n•\tLait tiède + 1 petite banane\n•\tYaourt nature + quelques noix de cajou\n•\tTisane de citronnelle + galette de mil\nAliments favorisant le sommeil (riches en tryptophane) :\n•\tPoisson\n•\tPoulet\n•\tŒufs\n•\tLait et yaourt\n•\tBanane\n•\tNoix de cajou\n•\tGraines de sésame\n•\tHaricots niébé\nTisanes pour le sommeil :\n1.\tCitronnelle\n2.\tFeuilles de corossol\n3.\tKinkeliba\n4.\tFleurs d'hibiscus légères\nHabitudes à adopter :\n•\tDîner 3h avant coucher\n•\tPas d'écrans 1h avant\n•\tChambre fraîche et sombre\n•\tRoutine régulière\n•\tPas de caféine après 15h\n•\tÉviter siestes longues (max 20-30 min)";
                }
                if (str_contains($answer, '6') || str_contains($answer, '7')) {
                    return "RÉPONSE : 6H-7H\nSituation : Acceptable mais sous-optimal\nObjectif : Atteindre 7-8h\nConseils :\n•\tAjouter 30-60 minutes\n•\tOptimiser la qualité du sommeil\n•\tRoutine régulière\nAjustements alimentaires :\n•\tDîner 3h avant coucher\n•\tÉviter stimulants après 16h\n•\tTisane relaxante le soir\nDîner type :\n•\tModéré, équilibré\n•\tSuivre les plans de base\n•\tAjouter tisane relaxante";
                }
                if (str_contains($answer, '8') || str_contains($answer, '9')) {
                    return "RÉPONSE : 8H-9H\nSituation : OPTIMAL !\nConseils de maintien :\n•\tPréserver cette routine\n•\tHoraires réguliers\n•\tQualité avant quantité\nAlimentation adaptée :\n•\tSuivre plans standards\n•\tMaintenir horaires réguliers des repas\n•\tÉviter excès le soir";
                }
                return "RÉPONSE : PLUS DE 9H\nAttention : Peut indiquer :\n•\tMauvaise qualité de sommeil\n•\tApnée du sommeil non diagnostiquée\n•\tDépression\n•\tHypothyroïdie\n•\tSédentarité excessive\nConseils :\n•\tConsultation médicale recommandée\n•\tÉvaluer la qualité du sommeil\n•\tRechercher apnée du sommeil\nSi simplement excès :\n•\tRéduire progressivement à 8h\n•\tAugmenter activité physique le matin\n•\tRoutine de lever régulière";

            case 'apnee_sommeil':
                if ($isYes) {
                    return "RÉPONSE : OUI\nImpact majeur sur poids et santé cardiovasculaire :\n•\tFragmentation du sommeil = mêmes effets que manque de sommeil\n•\tHypoxie nocturne = stress oxydatif, inflammation\n•\tActivation sympathique = HTA, risque cardiaque\n•\tRésistance à l'insuline accrue\n•\tDifficulté à perdre du poids\nPriorités absolues :\n1. Traitement médical obligatoire :\n•\tPPC (Pression Positive Continue) si prescrit\n•\tObservance maximale\n•\tSuivi ORL/pneumologue\n2. Perte de poids prioritaire :\n•\t10% de perte = amélioration significative apnées\n•\t20% de perte = potentielle résolution\n•\tCercle vertueux : perte → moins d'apnées → meilleur sommeil → perte facilitée\n3. Adaptations alimentaires spécifiques :\nÉviter absolument le soir :\n•\tAlcool (relaxation muscles pharyngés)\n•\tRepas lourds (reflux gastrique)\n•\tAliments inflammatoires\nDîner anti-apnée béninois :\n•\tTiming : 3-4h avant coucher\n•\tType : Léger, anti-inflammatoire\n•\tExemples :\n\tSoupe de légumes verts + poisson grillé + petite portion d'igname\n\tAttiéké + sauce claire + légumes + tisane\n\tSalade complète + protéine maigre + fruit\nPosition de sommeil :\n•\tPrivilégier décubitus latéral (côté)\n•\tÉviter décubitus dorsal (dos)\n•\tSurélever légèrement la tête\nAliments anti-inflammatoires béninois à privilégier :\n•\tPoissons gras (oméga-3)\n•\tLégumes verts à feuilles\n•\tGingembre\n•\tAil\n•\tCurcuma\n•\tFruits rouges locaux";
                }
                return "RÉPONSE : NON\nConseils préventifs :\n•\tMaintenir poids santé\n•\tDormir sur le côté si ronflement\n•\tÉviter alcool le soir\n•\tSurveiller signes : ronflements, fatigue diurne, pauses respiratoires";

            case 'regime_recent':
                if ($isYes) {
                    return "RÉPONSE : OUI (A récemment fait un régime de perte de poids)\nÉvaluation approfondie nécessaire :\nRisques des régimes restrictifs répétés :\n•\tMétabolisme ralenti (effet yo-yo)\n•\tPerte de masse musculaire\n•\tCarences nutritionnelles\n•\tTroubles comportements alimentaires\n•\tDémotivation\nApproche selon résultats antérieurs :\nSi ÉCHEC du régime précédent :\nAnalyse des causes :\n•\tTrop restrictif ? → Approche équilibrée\n•\tMonotone ? → Variété maximale\n•\tIrréaliste ? → Objectifs progressifs\n•\tIsolement social ? → Intégration culturelle\nNouvelle approche béninoise durable :\nPrincipes fondamentaux :\n1.\tPas de privation totale\n2.\tIntégration culturelle et sociale\n3.\tApprentissage vs restriction\n4.\tProgression lente mais durable (0,5-1 kg/semaine)\nPlan nutritionnel non frustrant :\nAliments à consommer librement :\n•\tTous les légumes verts à feuilles\n•\tLégumes non féculents\n•\tPoissons maigres\n•\tBouillons clairs\n•\tTisanes non sucrées\nAliments à portions contrôlées :\n•\tPâtes (owo, télibo, akassa) : taille de poing\n•\tRiz : 1/2 tasse cuite\n•\tIgname : portion = paume de main\n•\tSauce arachide : 2 c. à soupe\n•\tHuile de palme : 1 c. à café\nAliments occasionnels (1-2 fois/semaine) :\n•\tAkara (version four)\n•\tAloko (plantain grillé vs frit)\n•\tGâteaux traditionnels (versions allégées)\nGestion des événements sociaux :\n•\tManger normalement avant\n•\tChoisir options grillées/bouillies\n•\tPortions raisonnables\n•\tCompenser le lendemain\nSi SUCCÈS mais reprise de poids :\nProblème : Régime temporaire vs changement de vie\nSolution : Transition vers maintenance\nPlan de stabilisation béninois :\nPhase 1 (Semaines 1-4) : Réintroduction progressive\n•\tAugmenter calories de 200 kcal/semaine\n•\tAjouter 1 portion de féculent/jour\n•\tSurveiller poids hebdomadairement\nPhase 2 (Mois 2-3) : Équilibre\n•\tTrouver apport calorique de maintenance\n•\tStabilisation du poids\n•\tFlexibilité alimentaire raisonnable\nPhase 3 (Mois 4+) : Maintien à vie\n•\tHabitudes ancrées\n•\tÉcarts gérés\n•\tPesée hebdomadaire\n•\tAjustement si +2 kg\nStratégies anti-reprise béninoises :\n1.\tRègle des 80/20 : 80% plan sain, 20% flexibilité\n2.\tJours de fête : Plaisir sans culpabilité, retour au plan le lendemain\n3.\tActivité physique régulière : Non négociable\n4.\tSoutien social : Impliquer famille et amis\nPerte < 5 kg :\nAnalyse :\n•\tApproche peut-être trop douce\n•\tOu démarrage récent\n•\tOu nombreux écarts\nConseils :\n•\tÉvaluer observance réelle\n•\tRenforcer rigueur si laxisme\n•\tPatience si démarrage récent (résultats à 3 mois)\n•\tTracer alimentation pendant 1 semaine (prise de conscience)\nPerte 5-10 kg :\nSituation : Très bon résultat !\nRisque : Plateau ou relâchement\nConseils :\n•\tFélicitations, encouragement\n•\tMaintenir l'effort\n•\tVarier pour éviter plateau\n•\tSi plateau > 4 semaines : ajuster calories ou activité\nPerte > 10 kg :\nSituation : Excellent résultat !\nAttention :\n•\tRisque de relâchement\n•\tPeau distendue possible\n•\tAdaptation métabolique\nConseils :\n•\tTransition vers maintenance\n•\tRenforcement musculaire important\n•\tSuivi nutritionnel et médical\n•\tPrévention reprise de poids\n•\tHydratation maximale (peau)";
                }
                return "RÉPONSE : NON (Première tentative structurée)\nAvantages :\n•\tMétabolisme non endommagé\n•\tMotivation élevée\n•\tPas de frustrations antérieures\n•\tRésultats potentiellement rapides\nApproche initiale béninoise :\nPhase découverte (Mois 1) :\n•\tApprentissage des bases\n•\tDécouverte des portions adéquates\n•\tPrise de conscience alimentaire\n•\tRésultats encourageants attendus (2-4 kg)\nPhase installation (Mois 2-3) :\n•\tRoutine installée\n•\tGestion des écarts\n•\tAdaptation sociale\n•\tPerte régulière (2-3 kg/mois)\nPhase ancrage (Mois 4+) :\n•\tHabitudes ancrées\n•\tAutonomie complète\n•\tMaintien des résultats\n•\tMode de vie permanent";

            case 'activite_jours':
                if (stripos($answer, 'aucun') !== false || stripos($answer, '0') !== false) {
                    return "RÉPONSE : AUCUN (Sédentaire complet)\nImpact catastrophique :\n•\tMétabolisme basal très bas\n•\tPerte musculaire\n•\tRésistance à l'insuline\n•\tRisque cardiovasculaire maximal\n•\tOstéoporose\n•\tDépression/anxiété\nPlan de démarrage ULTRA-progressif (12 semaines) :\nPhase 1 - Semaines 1-2 : Activation minimale\n•\tObjectif : Rompre la sédentarité totale\n•\tActivité : Marche 10 minutes/jour\n•\tFréquence : 3 jours/semaine\n•\tIntensité : Douce, confortable\nActivités béninoises accessibles :\n•\tMarche dans le quartier le matin (frais)\n•\tMarche au marché (remplacer transport)\n•\tJardinage léger 15 minutes\n•\tTâches ménagères actives\nPhase 2 - Semaines 3-4 : Augmentation durée\n•\tObjectif : Allonger sans intensifier\n•\tActivité : Marche 15-20 minutes\n•\tFréquence : 4 jours/semaine\n•\tAjout : Étirements 5 minutes\nPhase 3 - Semaines 5-8 : Régularité\n•\tObjectif : Installer routine\n•\tActivité : Marche 25-30 minutes\n•\tFréquence : 5 jours/semaine\n•\tAjout : Renforcement léger (chaise, mur)\nExercices béninois à domicile :\n•\tSquats sur chaise (assis/debout) : 2x10\n•\tPompes contre mur : 2x10\n•\tMontée d'escaliers : 2x1 étage\n•\tÉtirements complets : 10 minutes\nPhase 4 - Semaines 9-12 : Diversification\n•\tObjectif : Éviter monotonie, progresser\n•\tActivité : Marche 30-40 minutes OU activité alternative\n•\tFréquence : 5-6 jours/semaine\n•\tIntensité : Introduction d'intervalles légers\nActivités variées :\n•\tDanse traditionnelle douce\n•\tNatation (si accès plage/piscine)\n•\tVélo tranquille\n•\tMarche rapide par intervalles\n•\tGym douce collective\nAdaptations alimentaires pour sédentaire démarrant :\n•\tAugmenter protéines légèrement pour préserver muscle\n•\tTiming : glucides autour de l'activité (même minimale)\nRepas post-activité (même 10 min marche) :\n•\tDans l'heure : Fruit + quelques noix\n•\tRepas suivant : Protéine + légumes + petit féculent\nMotivation et suivi :\n•\tTenir journal d'activité\n•\tCélébrer chaque victoire\n•\tTrouver partenaire de marche\n•\tObjectif de plaisir avant performance";
                }
                if (str_contains($answer, '1') || str_contains($answer, '2') || str_contains($answer, '3')) {
                    return "RÉPONSE : 1-3 JOURS (Légèrement actif)\nSituation : Bon démarrage mais marge d'amélioration\nObjectif : Passer à 4-5 jours minimum\nPlan de progression (8 semaines) :\nSemaines 1-2 : Consolider l'existant\n•\tMaintenir 3 jours\n•\tAugmenter durée de 10 minutes\n•\tOu intensité légèrement\nSemaines 3-4 : Ajouter 1 jour\n•\t4 jours/semaine\n•\tActivité légère le 4ème jour (récupération active)\nSemaines 5-6 : Ajouter 2ème jour\n•\t5 jours/semaine\n•\tVarier les activités\nSemaines 7-8 : Consolidation\n•\t5-6 jours/semaine\n•\tMix intensités\n•\tRoutine ancrée\nProgramme type (5 jours) :\n•\tLundi : Marche rapide 30 min\n•\tMardi : Renforcement musculaire 30 min\n•\tMercredi : REPOS ou yoga/étirements\n•\tJeudi : Marche/vélo 40 min\n•\tVendredi : Activité ludique (danse, sport)\n•\tSamedi : Marche longue 45-60 min ou activité en famille\n•\tDimanche : REPOS complet\nActivités recommandées :\n•\tMarche matinale au marché\n•\tDanse afro (zouglou, coupé-décalé, traditionnel)\n•\tFootball amateur\n•\tVélo\n•\tNatation (plage)\n•\tGym communautaire\n•\tJardinage actif\nAdaptations alimentaires :\n•\tPasser au plan \"Légèrement actif\" (28% P / 42% G / 28% L)\n•\tCollation pré-activité : Fruit + quelques noix (si > 1h après repas)\n•\tCollation post-activité : Protéine + glucide (ex: yaourt + banane)\nTiming des repas optimal :\n•\tSi activité matinale (avant petit-déj) : Petit-déjeuner dans l'heure complet et équilibré\n•\tSi activité milieu matinée (10h) : Petit-déj 7h normal, Collation post fruit + noix, Déjeuner normal\n•\tSi activité soir (18h) : Collation 16h fruit + yaourt, Dîner 19h30 normal compense";
                }
                if (str_contains($answer, '4') || str_contains($answer, '5') || str_contains($answer, '6')) {
                    return "RÉPONSE : 4-6 JOURS (Modérément à très actif)\nSituation : Excellent engagement !\nObjectif : Optimiser qualité et résultats\nFocus : Équilibre et progression\nProgramme type (6 jours) :\n•\tLundi : Cardio modéré 40 min (marche rapide, vélo)\n•\tMardi : Renforcement musculaire complet 45 min\n•\tMercredi : Cardio intense 30 min (intervalles, course)\n•\tJeudi : Renforcement + étirements 40 min\n•\tVendredi : Activité ludique intense (foot, danse) 45 min\n•\tSamedi : Cardio longue durée 60 min (randonnée, vélo long)\n•\tDimanche : REPOS ACTIF (yoga, marche douce, étirements)\nVariantes béninoises :\n•\tCardio : Marche/course plage, vélo, danse intense, football, natation\n•\tRenforcement : Gym locale, exercices poids du corps, haltères improvisés (bidons d'eau)\n•\tLudique : Sports traditionnels, danse afro, activités de groupe\n•\tRécupération : Yoga, étirements, marche contemplative, natation douce\nAdaptations alimentaires cruciales :\n•\tSi 6-7 jours avec intensité : Plan \"Très/Extrêmement actif\"\n•\tPriorité : Récupération et reconstruction musculaire\nTiming nutritionnel optimisé :\nJour d'entraînement intense :\n•\tPré-activité (1-2h avant) : Glucides modérés + protéine légère\n\tEx: Banane + quelques noix OU petite bouillie + œuf\n•\tPost-activité (dans 30-60 min) : Protéine + glucides\n\tEx: Poulet grillé + igname OU poisson + attiéké\n•\tRepas suivants : Normaux, équilibrés\nJour de repos/léger :\n•\tApports légèrement réduits (surtout glucides)\n•\tMaintien protéines élevées\n•\tFocus récupération\nExemples de journées type :\nJOUR INTENSE (ex: Football 18h) :\n•\t7h : Petit-déj complet : Bouillie + œufs + légumes + fruit\n•\t10h : Collation : Fruit + noix\n•\t12h30 : Déjeuner : Riz complet + poulet + légumes + salade\n•\t16h : Collation pré-foot : Banane + beurre d'arachide + eau\n•\t18h : FOOTBALL\n•\t19h30 : Post-foot : Smoothie (banane + lait + arachides) ou jus naturel + poisson grillé\n•\t20h30 : Dîner léger : Soupe légumes + protéine\n•\tHydratation : 2,5-3L eau\nJOUR REPOS :\n•\t7h : Petit-déj normal\n•\t10h : Collation légère\n•\t12h30 : Déjeuner modéré (portions légèrement réduites)\n•\t16h : Collation\n•\t19h : Dîner léger\n•\tHydratation : 2L eau\nSignaux d'alarme (surentraînement) :\n•\tFatigue persistante\n•\tBaisse de performance\n•\tIrritabilité\n•\tSommeil perturbé\n•\tPerte d'appétit\n•\tImmunité réduite (rhumes fréquents)\n•\tStagnation/prise de poids malgré efforts\nSi surentraînement : Réduire à 4 jours, augmenter repos et calories";
                }
                return "RÉPONSE : 7 JOURS (Extrêmement actif)\nÉvaluation critique :\nSi athlète ou professionnel du sport : Adapté\nSi personne lambda obèse avec MCV : DANGEREUX\nRisques entraînement quotidien sans repos :\n•\tSurentraînement chronique\n•\tBlessures\n•\tÉpuisement surrénal\n•\tImmunité compromise\n•\tStress oxydatif excessif\n•\tInflammation chronique\n•\tStagnation/prise de poids paradoxale\nRecommandation forte : INTÉGRER DU REPOS\nPlan corrigé (6 jours actifs + 1 repos) :\n•\tSuivre le plan 4-6 jours ci-dessus\n•\tDimanche : REPOS COMPLET ou très léger (marche douce 20 min max)\nSi vraiment 7 jours actifs (circonstances particulières) :\nImpératifs absolus :\n1.\tVariation intensité : Alterner dur/modéré/léger\n2.\tRécupération active : 2-3 jours/semaine en mode très doux\n3.\tNutrition optimale : Calories suffisantes, protéines élevées\n4.\tSommeil : 8-9h/nuit obligatoire\n5.\tHydratation : 3-4L/jour\n6.\tSuivi médical : Régulier\nProgramme 7 jours intelligent :\n•\tLundi : Intensité élevée (60 min)\n•\tMardi : Modérée (45 min)\n•\tMercredi : Intensité élevée (60 min)\n•\tJeudi : Récupération active légère (30 min étirements/yoga)\n•\tVendredi : Modérée à élevée (50 min)\n•\tSamedi : Intensité élevée (60-90 min)\n•\tDimanche : Récupération active douce (30-40 min marche/natation calme)\nAdaptations alimentaires extrêmes :\n•\tPlan \"Extrêmement actif\" (25% P / 45% G / 25% L)\n•\tCalories significativement augmentées\n•\t5-6 repas/jour possibles\n•\tProtéines : 1,8-2g/kg poids corporel\n•\tGlucides : Timing précis autour des entraînements\n•\tSupplémentation possible (sous avis médical) : multivitamines, oméga-3\nJournée type 7j/semaine actif :\n•\t6h : Petit-déj pré-training : Léger (banane + noix + thé)\n•\t7h : ENTRAÎNEMENT\n•\t8h30 : Post-training : Complet (bouillie + œufs + légumes + fruit)\n•\t11h : Collation : Fruit + yaourt + noix\n•\t13h : Déjeuner : Copieux équilibré (féculents + protéine + légumes)\n•\t16h : Collation : Substantielle (galette + beurre arachide + fruit)\n•\t19h : Dîner : Équilibré (protéine + légumes + féculent modéré)\n•\t21h : Collation si faim : Yaourt + fruit\n•\tHydratation : 3-4L\nSuppléments naturels pour récupération :\n•\tGingembre frais (anti-inflammatoire)\n•\tMiel local (récupération glucides)\n•\tSpiruline locale (protéines, fer)\n•\tMoringa (multivitamines)\n•\tLait de coco (électrolytes)\n•\tBissap (antioxydants)";

            case 'temps_assis':
                if (stripos($answer, 'plus') !== false || str_contains($answer, '8')) {
                    return "RÉPONSE : PLUS DE 8H\nDanger majeur - \"Sitting is the new smoking\" :\n•\tAnnule partiellement bénéfices de l'exercice\n•\tMétabolisme glucides altéré\n•\tRisque cardiovasculaire +147%\n•\tMortalité toutes causes +50%\n•\tObésité abdominale favorisée\nPlan anti-sédentarité (même avec exercice régulier) :\nAu travail/bureau :\n•\tRègle d'or : Se lever 5 min toutes les heures\n•\tAlarme téléphone : Rappel horaire\n•\tActivités debout : Appels téléphoniques, lecture, réflexion\nMicro-mouvements béninois au bureau :\n1.\tMarche sur place 1 min\n2.\tÉtirements bras, cou, dos 2 min\n3.\tSquats légers 10 répétitions\n4.\tMontée d'escaliers 1 étage\n5.\tMarche couloir/extérieur 2 min\nÀ domicile :\n•\tÉviter TV/canapé prolongé\n•\tActivités debout : repasser, cuisiner, ranger\n•\tPrivilégier activités actives\nAménagements pratiques béninois :\n•\tBureau debout improvisé (table haute)\n•\tBallon de gym comme chaise (par intervalles)\n•\tMarche pendant appels téléphoniques\n•\tJardinage quotidien 15 min\n•\tTâches ménagères actives\nObjectif progressif :\n•\tSemaine 1-2 : Réduire à 7h (se lever 1 fois/heure)\n•\tSemaine 3-4 : Réduire à 6h (se lever + micro-activité)\n•\tSemaine 5+ : Maintenir < 6h, idéalement 4-5h max\nAdaptations alimentaires si très sédentaire :\n•\tMême si exercice quotidien, considérer réduction glucides légère\n•\tCollations debout ou en marchant\n•\tBoire beaucoup (force déplacements toilettes)";
                }
                if (str_contains($answer, '6')) {
                    return "RÉPONSE : 6H-8H\nSituation : Courant mais perfectible\nObjectif : Réduire à < 6h\nStratégies :\n•\tSe lever toutes les heures minimum\n•\tMicro-mouvements fréquents\n•\tOptimiser temps libre actif\nPlan de réduction :\n•\tIdentifier périodes assises\n•\tRemplacer 1-2h par activités debout/mouvement\n•\tMarche active pauses déjeuner";
                }
                if (str_contains($answer, '4')) {
                    return "RÉPONSE : 4H-6H\nSituation : Acceptable\nMaintien :\n•\tContinuer interruptions fréquentes\n•\tÉquilibre travail/mouvement\n•\tNe pas régresser";
                }
                return "RÉPONSE : MOINS DE 4H\nSituation : EXCELLENT !\nProfil : Probablement travail actif ou très bon équilibre\nConseils :\n•\tMaintenir ce mode de vie actif\n•\tAvantage majeur pour santé et perte de poids\n•\tCapitaliser sur cette base";

            case 'activites_appreciees':
                if (stripos($answer, 'marche') !== false) {
                    return "RÉPONSE : MARCHE\nExcellente base, surtout pour débuter\nAvantages :\n•\tAccessible, gratuit, sûr\n•\tFaible impact articulaire (crucial pour obésité)\n•\tSocial (en groupe ou famille)\n•\tIntégrable au quotidien\nProgramme de marche béninois progressif :\nDébutant (Semaines 1-4) :\n•\t15-20 min/jour, 3-4 fois/semaine\n•\tVitesse confortable\n•\tMoments : Matin frais (6h-7h) ou soir (18h-19h)\n•\tLieux béninois : Quartier, plage, marché\nIntermédiaire (Semaines 5-12) :\n•\t30-40 min/jour, 5 fois/semaine\n•\tIntroduction d'intervalles rapides\n•\tTechnique : Alterner 3 min normal / 2 min rapide\n•\tAjouts : Collines, escaliers\nAvancé (Semaines 13+) :\n•\t45-60 min/jour, 5-6 fois/semaine\n•\tMarche rapide soutenue\n•\tRandonnées week-end\n•\tObjectif : 10 000 pas/jour minimum\nLieux de marche béninois recommandés :\n•\tCotonou : Plage de Fidjrossè, bord de lagune, quartiers résidentiels\n•\tPorto-Novo : Berges de l'Ouémé, centre historique\n•\tAutres : Parcs, boulevards, marchés matinaux\nAdaptations alimentaires marche :\n•\tAvant (si > 45 min) : Petit encas (fruit + noix)\n•\tPendant : Eau (si > 60 min)\n•\tAprès : Normal si < 60 min ; collation si > 60 min";
                }
                if (stripos($answer, 'yoga') !== false) {
                    return "RÉPONSE : YOGA\nExcellent complément, surtout si MCV\nAvantages :\n•\tFlexibilité, équilibre\n•\tGestion stress (cortisol ↓)\n•\tRenforcement musculaire doux\n•\tAmélioration conscience corporelle\n•\tMéditation (contrôle alimentaire émotionnel)\nTypes adaptés obésité + MCV :\n•\tHatha yoga : Doux, accessible\n•\tYin yoga : Étirements profonds, relaxation\n•\tYoga restauratif : Récupération\n•\tÉviter initialement : Vinyasa intense, Power yoga\nProgramme béninois yoga :\n•\tFréquence : 2-3 fois/semaine minimum\n•\tDurée : 30-45 min\n•\tMoment : Matin (flexibilité) ou soir (relaxation)\nAccès au yoga au Bénin :\n•\tStudios à Cotonou (si disponibles)\n•\tVidéos en ligne (YouTube)\n•\tApplications (Down Dog, Yoga Studio)\n•\tPratique autonome à domicile\nSéance type yoga domicile (30 min) :\n1.\tRespiration (5 min) : Pranayama\n2.\tÉchauffement (5 min) : Salutations douces\n3.\tPostures (15 min) : Focus corps entier\n4.\tÉtirements (3 min) : Souplesse\n5.\tRelaxation (2 min) : Savasana\nAdaptations alimentaires yoga :\n•\tPratique à jeun ou 2-3h après repas\n•\tHydratation post-séance\n•\tRepas léger si proche de la pratique";
                }
                return "ACTIVITÉS PHYSIQUES APPRÉCIÉES\nFOOTBALL :\nAvantages :\n•\tSocial, ludique, motivant\n•\tCardio intense + renforcement\n•\tCulturellement ancré au Bénin\nPrécautions obésité + MCV :\n•\tDébut : Adaptation progressive (3-6 mois)\n•\tIntensité : Modérée initialement\n•\tÉchauffement : Obligatoire (15 min)\n•\tHydratation : Cruciale\n•\tSurveillance : Fréquence cardiaque\nProgramme progressif :\n•\tMois 1-2 : Jeu réduit, touches de balle, passes (30 min)\n•\tMois 3-4 : Matchs réduits 5v5 (45 min)\n•\tMois 5+ : Matchs complets (selon forme)\nNutrition football :\n•\t3h avant : Repas complet (glucides + protéines modérées)\n•\t1h avant : Collation légère (banane + eau)\n•\tPendant : Eau toutes les 15 min\n•\tAprès : Glucides + protéines dans l'heure (récupération)\nNATATION :\nAvantages :\n•\tIdéal obésité (pas d'impact articulaire)\n•\tCardio complet\n•\tRenforcement musculaire global\n•\tRafraîchissant (climat tropical)\nAccès au Bénin :\n•\tPlage (gratuit) : Fidjrossè, Grand-Popo, Ouidah\n•\tPiscines : Hôtels, clubs\nProgramme natation :\n•\tDébutant : 20 min (nage calme, repos fréquents), 2-3 fois/semaine\n•\tIntermédiaire : 30-40 min (longueurs continues), 3-4 fois/semaine\n•\tAvancé : 45-60 min (intervalles, techniques variées), 4-5 fois/semaine\nDANSE (Afro, Zouglou, Coupé-Décalé, traditionnelle) :\nAvantages :\n•\tCardio intense et ludique\n•\tCulturel et social\n•\tLibération émotionnelle\n•\tRenforcement core\nTypes danse :\n•\tTraditionnelle : Guèlèdè, Tchinkounmè, Sakpata\n•\tModerne : Coupé-décalé, Zouglou, Afrobeat\n•\tFitness : Zumba (fusion)\nProgramme danse :\n•\tFréquence : 2-4 fois/semaine\n•\tDurée : 30-60 min\n•\tIntensité : Modérée à intense\nVÉLO :\nAvantages :\n•\tCardio efficace\n•\tFaible impact\n•\tTransport actif (économique)\n•\tRenforcement jambes\nProgramme vélo :\n•\tDébutant : 20-30 min, plat, 3 fois/semaine\n•\tIntermédiaire : 40-60 min, légères pentes, 4 fois/semaine\n•\tAvancé : 60-90 min, relief varié, 5 fois/semaine\nCOMBINAISON ACTIVITÉS (Recommandé) :\nProgramme équilibré béninois type :\n•\tLundi : Marche 40 min\n•\tMardi : Renforcement musculaire maison 30 min\n•\tMercredi : Danse (cours ou vidéo) 45 min\n•\tJeudi : Yoga 30 min\n•\tVendredi : Football amateur 60 min\n•\tSamedi : Natation ou vélo 45 min\n•\tDimanche : Repos actif (marche légère, étirements)\nAvantages combinaison :\n•\tÉvite monotonie et abandon\n•\tTravail complet du corps\n•\tAdaptation à l'emploi du temps\n•\tSocial + individuel";

            case 'fc_repos':
                if ($isYes) {
                    return "RÉPONSE : OUI (Connaît sa FC repos)\nImportance majeure :\n•\tIndicateur de condition cardiovasculaire\n•\tGuide d'intensité d'entraînement\n•\tSuivi des progrès\n•\tAlerte sur surentraînement\nInterprétation :\nEXCELLENTE (50-60 bpm) :\n•\tAthlète ou très bonne condition\n•\tContinuer entraînements\n•\tMaintenir santé cardiovasculaire\nBONNE (60-70 bpm) :\n•\tBonne condition physique\n•\tPotentiel d'amélioration avec activité régulière\n•\tCible raisonnable pour débutant\nMOYENNE (70-80 bpm) :\n•\tCondition physique moyenne\n•\tBénéfice significatif de l'exercice à attendre\n•\tObjectif : descendre vers 60-70 en 3-6 mois\nÉLEVÉE (80-90 bpm) :\n•\tSédentarité probable\n•\tUrgence de commencer activité progressive\n•\tSurveillance médicale recommandée\nTRÈS ÉLEVÉE (> 90 bpm) :\n•\tAlerte rouge\n•\tConsultation médicale OBLIGATOIRE avant exercice\n•\tPossibles pathologies sous-jacentes\n•\tDémarrage très progressif sous supervision\nUtilisation pour l'entraînement :\n•\tFCmax : Formule de Tanaka : FCmax ≈ 208 − 0,7 × âge\nZones d'entraînement :\n1.\tZone récupération (50-60% FCmax) : Échauffement, récupération\n2.\tZone lipidique (60-70% FCmax) : Perte de poids optimale, intensité modérée\n3.\tZone aérobie (70-80% FCmax) : Amélioration cardiovasculaire\n4.\tZone seuil (80-90% FCmax) : Performance, réservé avancés\n5.\tZone maximale (90-100% FCmax) : Haute intensité, courtes durées, athlètes\nRecommandations MCV + obésité :\n•\tDébutant : Rester en zone 1-2 (50-70% FCmax) pendant 3-6 mois\n•\tIntermédiaire : Progresser vers zone 3 (70-80%)\n•\tAvancé : Intervalles en zone 4 (sous supervision)\n•\tJAMAIS zone 5 sans avis médical\nAdaptations alimentaires selon FC repos :\nFC élevée (> 80 bpm) :\n•\tRéduire stimulants (café, thé fort)\n•\tAugmenter magnésium (légumes verts, noix)\n•\tHydratation optimale\n•\tOméga-3 (poissons gras)\nAliments béninois bénéfiques FC :\n•\tPoissons gras (maquereau, sardine) : Oméga-3\n•\tLégumes verts à feuilles : Magnésium, potassium\n•\tBanane : Potassium\n•\tNoix de cajou : Magnésium\n•\tAvocat : Potassium, graisses saines\nSuivi progrès :\n•\tMesurer FC repos chaque semaine (même jour, même heure, matin avant lever)\n•\tObjectif : Réduction de 5-10 bpm en 3 mois avec exercice régulier\n•\tSigne de bonne adaptation cardiovasculaire";
                }
                return "RÉPONSE : NON\nRecommandation : Apprendre à mesurer\nMéthodes de mesure :\n1. Prise de pouls manuelle (gratuit) :\n•\tMoment : Au réveil, avant lever, assis ou couché\n•\tTechnique :\n\tPouls radial (poignet) ou carotidien (cou)\n\tCompter battements pendant 15 secondes\n\tMultiplier par 4 = FC/minute\n•\tRépéter 3 matins : Faire moyenne\n2. Applications smartphone (gratuit) :\n•\tUtilisation flash + caméra\n•\tPrécision variable mais indicative\n•\tExemples : Instant Heart Rate, Cardiograph\n3. Moniteurs cardiaques (investissement) :\n•\tMontres connectées (Xiaomi Mi Band, autres abordables)\n•\tCeintures thoraciques (plus précises)\n•\tDisponibles Cotonou (boutiques électronique)\nObjectif : Connaître sa FC repos puis utiliser pour optimiser entraînement";

            case 'manger_stress':
                if ($isYes) {
                    return "RÉPONSE : OUI (Mange souvent par stress ou ennui)\nProblématique majeure : Alimentation émotionnelle vs physiologique\nIdentification du problème :\n•\tFaim physiologique : Apparaît progressivement, satisfaite par tout aliment, stoppe à satiété\n•\tFaim émotionnelle : Apparaît soudainement, envies spécifiques (sucré/gras), difficile à rassasier, culpabilité après\nPlan de gestion (8 semaines) :\nPhase 1 (Semaines 1-2) : Prise de conscience\n•\tOutil : Journal alimentaire émotionnel\n•\tNoter : Heure, aliment, quantité, émotions AVANT, faim physique (0-10)\n•\tObjectif : Identifier déclencheurs (stress travail, ennui soir, anxiété, tristesse)\nPhase 2 (Semaines 3-4) : Stratégies alternatives\nRemplacer l'alimentation par d'autres réponses :\nSi STRESS :\n•\tActivité physique : Marche 10 min, danse 5 min, étirements\n•\tRespiration : 5 respirations profondes, cohérence cardiaque\n•\tActivité manuelle : Jardinage, ménage, artisanat\n•\tSocial : Appel ami, discussion famille\n•\tRelaxation : Musique, lecture, prière\nSi ENNUI :\n•\tOccupation : Hobby, projet créatif, apprentissage\n•\tSocial : Sortie, visite, activité communautaire\n•\tMouvement : Marche, danse, sport\n•\tStructuration : Planning activités quotidiennes\nSi TRISTESSE/ANXIÉTÉ :\n•\tExpression : Journal intime, art, musique\n•\tConnexion : Soutien social, famille, amis\n•\tProfessionnel : Psychologue si récurrent et intense\n•\tSpiritualité : Prière, méditation, connexion nature\nPhase 3 (Semaines 5-6) : Techniques anti-compulsion\nRègle des 10 minutes :\n1.\tEnvie de manger émotionnel détectée\n2.\tAttendre 10 minutes\n3.\tActivité alternative pendant ce temps\n4.\tRéévaluer : Vraie faim ? Souvent, envie disparue\nTechnique HALT : Avant de manger, vérifier :\n•\tH (Hungry) : Vraie faim ?\n•\tA (Angry) : En colère ?\n•\tL (Lonely) : Seul(e) ?\n•\tT (Tired) : Fatigué(e) ?\nSi A, L, ou T → Adresser l'émotion, pas l'estomac\nPhase 4 (Semaines 7-8) : Consolidation\n•\tHabitudes alternatives ancrées\n•\tRechutes normales : apprentissage, pas échec\n•\tBienveillance envers soi-même\n•\tCélébration des progrès\nAdaptations alimentaires spécifiques :\nStructure des repas anti-compulsion :\n•\t3 repas complets + 2 collations PLANIFIÉES\n•\tJamais sauter de repas (fringales → compulsions)\n•\tProtéines à chaque repas (satiété prolongée)\n•\tFibres abondantes (volume, satiété)\nCollations anti-stress béninoises (préparées à l'avance) :\n•\tCroquants : Noix, graines, légumes crus\n•\tFrais : Fruits, yaourt nature\n•\tRéconfortants sains : Bouillie tiède légère, tisane\nAliments béninois réconfortants sains (alternatives) :\n1.\tBouillie de mil tiède : Réconfort, sans excès calorique\n2.\tTisane de citronnelle + miel léger : Apaisant\n3.\tSoupe de légumes maison : Volume, chaleur, nutrition\n4.\tFruit frais mixé (smoothie sans sucre) : Sucré naturel, satiété\n5.\tYaourt nature + banane : Protéine, glucides, texture crémeuse\nGestion des crises aiguës :\nSi compulsion imminente :\n1.\tSORTIR : Quitter la cuisine, aller dehors\n2.\tBOUGER : Marche rapide 5-10 min\n3.\tBOIRE : Grand verre d'eau, tisane\n4.\tATTENDRE : 10-15 minutes\n5.\tRÉÉVALUER : Besoin toujours présent ?\n6.\tSI OUI : Collation saine prévue (pas l'aliment compulsif)\nSoutien social et professionnel :\n•\tInformer entourage proche (soutien)\n•\tGroupes de soutien (si disponibles)\n•\tPsychologue/nutritionniste (si compulsions sévères)\nSuivi des progrès :\n•\tÉpisodes émotionnels alimentaires : Compter par semaine\n•\tObjectif : Réduction progressive (pas perfection immédiate)\n•\tSemaine 1 : X épisodes → Semaine 8 : X/2 épisodes = SUCCÈS";
                }
                return "RÉPONSE : NON\nSituation : Excellent signe de régulation émotionnelle saine\nConseils de maintien :\n•\tContinuer à distinguer faims physique/émotionnelle\n•\tStratégies de gestion du stress (sport, relaxation, social)\n•\tVigilance en période difficile (deuil, perte emploi, etc.)\nPrévention :\n•\tStructure des repas réguliers\n•\tActivités plaisir non alimentaires\n•\tSoutien social actif";

            case 'finir_assiette':
                if ($isYes) {
                    return "RÉPONSE : OUI (Tendance à finir l'assiette sans faim)\nProblématique : Éducation \"finir assiette\" + déconnexion signaux de satiété\nConséquences :\n•\tSuralimentation chronique 200-500 kcal/jour\n•\tInsensibilité aux signaux de satiété\n•\tPrise de poids progressive\n•\tInconfort digestif\nCauses culturelles :\n•\tÉducation \"ne pas gaspiller\"\n•\tRespect envers cuisinier\n•\tContexte social (plat commun)\n•\tHabitudes familiales\nPlan de rééducation (8 semaines) :\nPhase 1 (Semaines 1-2) : Reconnecter aux signaux de satiété\nÉchelle de faim-satiété (1-10) :\n1.\tAffamé, faible\n2-3.\tTrès faim\n4.\tLégère faim\n5.\tNeutre (ni faim ni plein)\n6.\tAgréablement rassasié ← OBJECTIF D'ARRÊT\n7.\tPlein, un peu inconfortable\n8.\tTrès plein, inconfortable\n9-10.\tExcessivement plein, mal\nObjectif : Commencer à manger à 3-4, arrêter à 6\nTechnique :\n•\tMi-repas : Pause 2 minutes, évaluer niveau (1-10)\n•\tSi 6 : Arrêter, même si reste\n•\tSi < 6 : Continuer, lentement\nPhase 2 (Semaines 3-4) : Techniques de contrôle des portions\nAVANT de se servir :\n1.\tAssiette plus petite : Trompe le cerveau (illusion volume)\n2.\tSe servir moins : 75% de la portion habituelle\n3.\tLégumes d'abord : Remplir 50% assiette de légumes\n4.\tFéculents limités : ¼ assiette maximum\n5.\tProtéines : ¼ assiette\nEn pratique au Bénin (plat commun) :\n•\tSe servir dans petite assiette individuelle\n•\tQuantité limitée dès le début\n•\tNe pas se resservir automatiquement\n•\tAttendre 10 min avant resservi si faim subsiste\nPhase 3 (Semaines 5-6) : Manger en pleine conscience\nTechniques :\n1.\tMâcher lentement : 20-30 fois par bouchée\n2.\tPoser couverts entre bouchées\n3.\tÉliminer distractions : Pas de TV, téléphone pendant repas\n4.\tSavourer : Goûts, textures, arômes\n5.\tConversations : Ralentit naturellement le rythme\nDurée repas idéale : 20-30 minutes minimum\nPhase 4 (Semaines 7-8) : Gestion sociale et culturelle\nSituations béninoises typiques :\n1. Repas familial (plat commun) :\n•\tSolution : Se servir portion raisonnable dans assiette individuelle\n•\tSi pression sociale : \"J'ai bien mangé, merci, c'était délicieux\"\n•\tTechnique : Manger lentement (autres finissent avant vous)\n2. Invité chez quelqu'un :\n•\tSolution : Accepter portion, manger jusqu'à satiété (6/10)\n•\tRestes : \"C'était excellent, je suis rassasié, merci\"\n•\tAlternative : Demander petite portion dès le service\n3. Cérémonies (abondance) :\n•\tSolution : Petites portions variées, dégustation vs consommation\n•\tStratégie : Assiette remplie visuellement (mais portions petites)\n•\tPrioriser : Aliments sains (légumes, protéines maigres)\nGestion des restes :\nÀ domicile :\n•\tConservation : Restes = repas suivant ou congélation\n•\tPartage : Donner voisins, famille (tradition)\n•\tServir moins initialement : Prévention meilleure que gestion\nRepas béninois \"anti-finir assiette\" :\nTechnique \"3 temps\" :\nTemps 1 - Légumes (5 min) :\n•\tCommencer par salade ou légumes\n•\tManger lentement\n•\tVolume d'abord\nTemps 2 - Protéine + féculent (10 min) :\n•\tAlterner bouchées protéine et féculent\n•\tPauses régulières\n•\tÉvaluer satiété à mi-chemin\nTemps 3 - Finir si faim < 6/10, sinon arrêter :\n•\tRespect signal de satiété\n•\tPas de culpabilité si reste\nExemple concret (Riz sauce arachide poulet) :\n❌ AVANT (finir assiette) :\n•\tService : Grande assiette remplie\n•\tRiz : 2 tasses, Sauce arachide : 1 tasse, Poulet : 2 gros morceaux, Légumes : Peu\n•\tRésultat : ~1200 kcal, satiété 8/10 (trop plein)\n✅ APRÈS (écouter satiété) :\n•\tService : Assiette moyenne\n•\tTemps 1 : Salade de laitue-tomates-concombre (manger d'abord)\n•\tTemps 2 : Riz ½ tasse + Sauce 2 c. à soupe + Poulet 1 morceau moyen + Légumes cuits abondance\n•\tPause mi-repas : Évaluation satiété\n•\tSi 6/10 : STOP\n•\tRésultat : ~600 kcal, satiété 6/10 (optimal), économie 600 kcal !";
                }
                return "RÉPONSE : NON\nSituation : Excellente connexion aux signaux de satiété !\nConseils de maintien :\n•\tContinuer à écouter son corps\n•\tNe pas céder aux pressions sociales\n•\tModèle positif pour entourage\nOptimisation :\n•\tServir portions justes dès le départ (moins de restes)\n•\tPartager recettes et astuces avec famille (éducation enfants)";

            case 'regime_particulier':
                if ($isYes) {
                    return "RÉPONSE : OUI\nExploration nécessaire : \"Lequel et efficacité ?\"\nAnalyse par type de régime :\nRÉGIMES RESTRICTIFS (Ex: Keto, Atkins, Très basse calorie, Jeûne strict) :\nSi ÉCHEC (reprise de poids) :\nCauses probables :\n•\tTrop restrictif, insoutenable\n•\tPerte rapide (eau + muscle)\n•\tMétabolisme ralenti\n•\tFrustrations → craquages\n•\tPas de transition maintenance\nEnseignements :\n•\tApproche équilibrée > restriction\n•\tLenteur = durabilité\n•\tIntégration culturelle nécessaire\nNouvelle approche béninoise équilibrée :\n•\tInclusion tous groupes alimentaires\n•\tPortions contrôlées vs élimination\n•\tAliments béninois traditionnels adaptés\n•\tProgression lente (0,5-1 kg/semaine)\n•\tPlan de maintenance intégré\nRÉGIMES \"SAINS\" (Ex: Méditerranéen, DASH, Volumétrique) :\nSi SUCCÈS :\n•\tExcellent ! Approche scientifiquement validée\n•\tContinuer et personnaliser version béninoise\nAdaptation béninoise du régime méditerranéen :\nPrincipes méditerranéens → Équivalents béninois :\n•\tHuile d'olive → Huile d'arachide locale, avocat (modération)\n•\tPoissons gras → Maquereau, sardine, thon frais\n•\tLégumineuses → Haricots niébé, pois d'angole\n•\tCéréales complètes → Fonio, riz complet, mil\n•\tFruits & légumes → Abondance locale (mangue, papaye, gboma, folon)\n•\tNoix → Cajou, arachides, graines de courge\n•\tHerbes & épices → Gingembre, ail, piment, basilic africain\nRÉGIMES \"À LA MODE\" (Ex: Détox, Soupe, Mono-aliment, Jeûne intermittent extrême) :\nSi essayé et échec : Normal, non durables et potentiellement dangereux\nProblèmes :\n•\tCarences nutritionnelles\n•\tPerte muscle > graisse\n•\tRalentissement métabolique\n•\tEffet yo-yo garanti\n•\tAucune éducation nutritionnelle\nMessage : Oublier ces approches, focus équilibre et durabilité\nRÉGIMES TRADITIONNELS/CULTURELS (Ex: \"Régime de grand-mère\", plantes médicinales) :\nÉvaluation nuancée :\nAspects positifs (à conserver) :\n•\tAliments naturels, non transformés\n•\tSagesse ancestrale (certaines plantes bénéfiques)\n•\tConnexion culturelle\nAspects négatifs (à abandonner) :\n•\tParfois trop restrictifs ou déséquilibrés\n•\tCroyances non scientifiques\n•\tRemèdes \"miracles\" inexistants\nExemples béninois :\n✅ À conserver :\n•\tConsommation de tisanes digestives (kinkeliba, citronnelle)\n•\tCuisine à base de légumes feuilles\n•\tPoissons frais\n•\tCéréales complètes traditionnelles (fonio, mil)\n❌ À abandonner :\n•\tPurges drastiques\n•\tJeûnes prolongés sans supervision\n•\tRemèdes \"magiques\" pour maigrir vite\n•\tÉlimination totale de groupes alimentaires\nRÉGIME MÉDICAL PRESCRIT (Ex: Diabète, HTA) :\nSi suivi avec succès : Excellent, continuer\nSi difficultés d'observance :\nIdentifier obstacles :\n•\tTrop restrictif ?\n•\tManque de variété ?\n•\tCoût ?\n•\tComplexité ?\n•\tIsolement social ?\nSolutions béninoises :\n•\tAdaptation culturelle du régime médical\n•\tSimplification (recettes faciles)\n•\tSoutien familial (impliquer dans préparation)\n•\tAccessibilité (aliments locaux abordables)\n•\tSuivi nutritionniste (si possible)\nExemple régime diabétique béninois :\n❌ Prescription standard (difficile) :\n•\tPain complet importé, quinoa, édulcorants artificiels\n✅ Adaptation béninoise accessible :\n•\tFonio (céréale locale IG bas)\n•\tLégumes feuilles abondants (gboma, folon)\n•\tHaricots niébé\n•\tPoissons frais\n•\tFruits locaux modérés (papaye, goyave, pamplemousse)\n•\tÉpices locales (gingembre, ail, piment)";
                }
                return "RÉPONSE : NON (Première tentative structurée)\nAvantages :\n•\tPage blanche (pas de mauvaises expériences)\n•\tMétabolisme \"vierge\" (non endommagé par yo-yo)\n•\tMotivation initiale élevée\n•\tOpportunité d'établir bonnes bases dès le départ\nApproche initiale optimale :\nPhase éducation (2 premières semaines) :\n•\tCompréhension bases nutritionnelles\n•\tIdentification portions adéquates\n•\tLecture étiquettes (si produits transformés)\n•\tPlanification des repas\n•\tCourses conscientes\nPhase action (dès semaine 3) :\n•\tMise en pratique des plans alimentaires\n•\tRecettes béninoises adaptées\n•\tGestion situations sociales\n•\tActivité physique progressive\nPhase ancrage (mois 3+) :\n•\tHabitudes devenues automatiques\n•\tAutonomie complète\n•\tGestion écarts sans culpabilité\n•\tMode de vie permanent (pas régime temporaire)\nObjectifs réalistes première tentative :\n•\tMois 1 : 2-4 kg (souvent plus : eau + début)\n•\tMois 2-3 : 2-3 kg/mois (rythme durable)\n•\tMois 4+ : 1-2 kg/mois (stabilisation)\n•\t1 an : 15-25 kg (selon poids initial) = SUCCÈS MAJEUR\nPrévention abandon :\n•\tSoutien : Famille, amis, professionnels, groupes\n•\tSuivi : Pesée hebdomadaire, mesures, photos\n•\tCélébrations : Victoires non alimentaires (vêtements, énergie, santé)\n•\tFlexibilité : Pas de perfection exigée, 80/20\n•\tRéajustement : Si plateau > 1 mois, analyser et adapter";

            default:
                return "Aucun";
        }
    }


    private function getWeightLossUnder5kgAntecedentsAdvice(string $key, string $answer, array $allAnswers): string
    {
        $isYes = (stripos($answer, 'oui') !== false);
        $answerLower = mb_strtolower($answer);

        switch ($key) {
            case 'antecedents_diag':
                if ($isYes) {
                    return 'RÉPONSE : OUI - Diabète type 2 présent
CONSEILS CIBLÉS :	
•	Privilégier les glucides à index glycémique bas
•	Fractionner les repas (éviter gros volumes)
•	Surveiller les portions de féculents
•	Augmenter les fibres (légumes verts)
Constat capital : D’après le calcul de votre RTH sur la base de vos données personnelles par notre système, nous remarquons une évidence par rapport à votre choix de réponse et vôtre valeur obtenue par calcul (mettre la valeur du RTH d’user, la comparé au seuil en fonction du sexe), ce qui confirme nos affirmations sur les risques accourus au diabète de type 2. De ce fait, nous vous exhortons à prendre en compte nos conseils qui suivent et notre guide alimentaire proposé en dessus afin de combattre efficacement votre obésité par votre objectif de perte de poids, nos conseils alimentaires et nos activités physique proposées à la suite de ce plan nutritionnel.';
                }
                return 'RÉPONSE : NON - Aucun antécédent
CONSEILS PRÉVENTIFS :
•	Maintenir alimentation équilibrée actuelle
•	Surveillance portions pour perte de poids progressive
•	Privilégier aliments peu transformés
•	Rester actif physiquement';
            case 'type_antecedents':
                return "RÉPONSE : " . $answer . "\n(Antécédent pris en compte dans les conseils spécifiques au diabète de type 2).";
            case 'meds_actuels':
                if ($isYes) {
                    return 'RÉPONSE : OUI
TYPE 1 : Médicaments pour baisser la glycémie (metformine, glimepiride...)
CONSEILS CIBLÉS :
•	Metformine : prendre pendant/après repas (éviter nausées)
•	Éviter repas trop riches en graisses (ralentit absorption)
•	Répartir glucides sur tous les repas (éviter hypoglycémies)
•	Boire beaucoup d\'eau

TYPE 2 : Insuline
CONSEILS CIBLÉS :
•	Respecter horaires fixes des repas
•	Compter les glucides précisément
•	Toujours avoir collation "hypo" disponible
•	Adapter doses selon activité physique (avec médecin)
Kit urgence hypoglycémie :
•	Sachets de sucre (3 morceaux)
•	Jus d\'orange (150ml)
•	Biscuits secs locaux (2-3 pièces)

TYPE 3 : Médicaments pour perdre du poids (orlistat, liraglutide...)
CONSEILS CIBLÉS :
Si ORLISTAT (bloque absorption graisses) :
•	Limiter graisses à 15g par repas maximum
•	Risque selles grasses si excès
•	Prendre multivitamines (vitamines liposolubles)

Si LIRAGLUTIDE (coupe appétit) :
•	Manger lentement, petites portions
•	Risque nausées : éviter gras, épices fortes
•	Fractionner davantage (5-6 petits repas)

TYPE 4 : Médicaments pour la tension (IEC, ARA2, bêta-bloquants...)
CONSEILS CIBLÉS :
Si IEC ou ARA2 :
•	Attention potassium : ne pas surconsommer
•	Éviter suppléments potassium
•	Modéredie
Au lieu de cacahuètes frites salées : → Arachides grillées nature (30g max) → Noix de cajou locales non salées
Au lieu de bonbons/gâteaux : → Fruits séchés locaux (mangue, ananas) - petite portion → Fruits frais de saison → Yaourt nature + cannelle
Planning de transition (4 semaines) :
•	Semaine 1 : Remplacer 1 grignotage/jour
•	Semaine 2 : Remplacer 2 grignotages/jour
•	Semaine 3 : Remplacer tous les grignotages
•	Semaine 4 : Consolider nouvelles habitudes

SITUATION 2 : Grignotage de produits "neutres" (fruits, noix nature, yaourt, légumes)
✅ BON CHOIX - OPTIMISER LES QUANTITÉS
CONSEILS CIBLÉS :
•	Bonnes options maintenues
•	Attention portions (calories s\'additionnent)
•	Timing stratégique
•	Éviter grignotage mécanique
Portions recommandées :
•	Fruits : 1 portion = 1 fruit moyen 
o	Orange, mangue, pomme : 1 unité
o	Ananas : 2 tranches
o	Raisin : 15-20 grains
o	Limite : 2-3 fruits/jour total
•	Noix/arachides : 30g maximum/collation 
o	Visualisation : creux de la main
o	Peser au début pour calibrer
•	Yaourt : 150-200g nature 
o	Sans sucre ajouté
o	Ajouter cannelle ou vanille naturelle
•	Légumes : portions illimitées 
o	Carottes, concombre, tomates cerises
o	Céleri si disponible
Timing optimal collations :
•	10h : Entre petit-déjeuner et déjeuner (évite fringale midi)
•	16h : Entre déjeuner et dîner (prévient excès le soir)
•	Éviter : après 20h (sauf hypoglycémie)
Collations "neutres" validées :
1.	Orange + noix de cajou (20g)
2.	Concombre + tomates + arachides (25g)
3.	Yaourt nature + morceaux de papaye
4.	Carottes crues + houmous maison
5.	Banane (si diabète bien contrôlé) + lait caillé';
                }
                return 'RÉPONSE : NON - Pas de grignotage
SITUATION 1 : Repas suffisamment copieux
✅ SI BONNE ÉNERGIE TOUTE LA JOURNÉE
•	Continuer ainsi
•	Vérifier apports caloriques totaux suffisants
•	Surveiller pas de baisse d\'énergie
✅ SI FATIGUE OU FRINGALES APPARAISSENT
•	Ajouter 1-2 collations stratégiques
•	Signe que repas principaux insuffisants
•	Ou trop long délai entre repas
Collation à ajouter si besoin :
•	16h : Fruit + petit portion protéines 
o	Exemple : orange + 10 arachides
•	Évite fringale du soir et grignotage anarchique

SITUATION 2 : Restriction volontaire excessive
⚠️ SI RÉGIME TROP STRICT
•	Risque d\'hypoglycémies
•	Ralentissement métabolisme
•	Fonte musculaire
•	Risque craquage compulsif
CONSEILS CIBLÉS :
•	Collations = OUTIL de contrôle, pas ennemi
•	Fractionnement aide contrôle glycémie
•	Maintient métabolisme actif
•	Prévient excès aux repas
Intégrer 2 collations légères obligatoires :
•	10h : Fruit + protéines (yaourt ou noix)
•	16h : Légumes + protéines (akassa + poisson)';

            case 'grignotage_aliments':
                return 'RÉPONSE : ' . $answer . '
(L\'analyse du type de grignotages et les conseils de remplacement sont intégrés dans la réponse à la question sur le grignotage).';

            case 'frequence_boissons':
                if (str_contains($answer, 'Régulière') || str_contains($answer, 'souvent')) {
                    return 'RÉPONSE : Consommation régulière (Sodas, jus industriels, bières, sucreries liquides)
⚠️ RISQUE MAJEUR - RÉDUCTION PRIORITAIRE
CONSEILS CIBLÉS :
•	Calories liquides = stockage gras abdominal immédiat
•	Pics d’insuline massifs (aggrave diabète)
•	Pas de satiété
•	Déshydratation masquée par le sucre
Plan de sevrage (4 semaines) :
•	Semaine 1 : Remplacer 1 boisson sucrée/jour par de l’eau
•	Semaine 2 : Ne consommer des boissons sucrées que 3x/semaine
•	Semaine 3 : Boissons sucrées uniquement le weekend (1 verre/jour)
•	Semaine 4 : Élimination totale (garder pour fêtes exceptionnelles)
Alternatives saines (Bénin) :
•	Eau de coco naturelle (sans sucre ajouté)
•	Bissap maison (infusion hibiscus) ZÉRO sucre
•	Citronnade maison métabolisme : Eau + Citron + Gingembre frais
•	Infusion Kinkeliba froide ou chaude';
                }
                if (str_contains($answer, 'Occasionnelle')) {
                    return 'RÉPONSE : Consommation occasionnelle
✅ BONNE MAÎTRISE - VIGILANCE MAINTENUE
CONSEILS CIBLÉS :
•	Maintenir cette fréquence basse
•	Choisir les moments stratégiques (fêtes, sorties)
•	Éviter d’en avoir à la maison (évite tentation)
•	Règle du "verre pour verre" : 1 verre plaisir = 2 verres d’eau immédiatement après
Attention aux jus "naturels" vendus :
•	Souvent très sucrés (ajout de sucre blanc)
•	Préférer faire soi-même sans sucre
•	Consommer le fruit entier plutôt que le jus (fibres !)';
                }
                return 'RÉPONSE : Uniquement eau/tisanes sans sucre
⭐ EXCELLENT - L\'HABITUDE LA PLUS SAINE
CONSEILS CIBLÉS :
•	Hydratation optimale pour le métabolisme
•	Zéro impact glycémique
•	Aide à la perte de poids naturelle
•	Meilleure santé rénale et hépatique
Optimisation de l’hydratation :
•	Boire 1 grand verre d’eau au réveil
•	Boire 1 verre d’eau 15 min avant chaque repas (aide satiété)
•	Viser 2L à 2,5L par jour (climat chaud Bénin)
Variété sans calories :
•	Infusion de citronnelle : relaxante le soir
•	Thé vert ou Gingembre : tonifiant le matin
•	Eau infusée : Concombre, menthe, citron (préparer la veille au frais)

FOCUS ALCOOL :
Si vous consommez de l’alcool (bière, vin, alcools locaux) :
•	⚠️ Apport calorique caché important (1g alcool = 7 calories)
•	⚠️ Bloque le brûlage des graisses pendant 24h
•	⚠️ Risque d’hypoglycémie avec traitements diabète
Recommandations :
•	Maximum 1 verre/jour pour les femmes, 2 pour les hommes
•	Minimum 3 jours ZÉRO alcool par semaine
•	Éviter mélanges sucrés (sucrerie + alcool)
•	Préférer bière légère ou vin rouge sec (modération !)

RECOMMANDATIONS EAU :
•	Quantité : 35ml par kg de poids corporel
•	Signe de bonne hydratation : Urines claires/jaune pâle
•	Si urines foncées → BOIRE IMMÉDIATEMENT
•	N’attendez pas d’avoir soif (soif = déjà déshydraté)';
            case 'grignotage_aliments':
                return 'RÉPONSE : ' . $answer . '
(L\'analyse du type de grignotages et les conseils de remplacement sont intégrés dans la réponse à la question sur le grignotage).';
            case 'frequence_boissons':
                // Complex block, dumping all text
                return 'RÉPONSE : " . $answer . "
TOUS LES JOURS :
⚠️ ALERTE ROUGE - Action Immédiate Nécessaire
Boissons Sucrées Quotidiennes :
Calcul Impact :
•	1 canette Coca (330ml) = 35g sucre = 140 calories
•	Consommation quotidienne = 245g sucre/semaine = 980 calories/semaine
•	Sur 1 an = 12.7 kg de sucre pur = 51,000 calories = +7kg de poids !
Dangers Spécifiques :
•	Diabète type 2 (risque x2)
•	Résistance à l\'insuline
•	Foie gras non alcoolique
•	Prise de poids abdominale
•	Caries dentaires
•	Hypertension (sucre augmente TA)
Plan d\'Action Urgent (Sevrage 8 Semaines) :
Semaines 1-2 : Réduction 50%
•	Si 2 sodas/jour → 1 soda/jour
•	Remplacer l\'autre par eau citronnée
Semaines 3-4 : Réduction 75%
•	1 soda tous les 2 jours
•	Diluer avec eau (50-50)
•	Autres moments : tisanes, eau
Semaines 5-6 : 90% Réduction
•	1-2 sodas/semaine seulement
•	Jus frais occasionnels (dilués)
Semaines 7-8+ : Objectif Final
•	ZÉRO consommation régulière
•	Exception : 1-2×/mois occasions spéciales
•	Quotidien : eau, tisanes, café/thé non sucrés
Gestion des Envies :
•	Moment envie → boire grand verre d\'eau d\'abord
•	Attendre 10 min
•	Si envie persiste → bissap maison non sucré
•	Mâcher gingembre frais (coupe envie sucré)

Alcool Quotidien :
⚠️ DANGER MAJEUR - Consultation Médicale Recommandée
Alcools Béninois Courants :
•	Sodabi (alcool traditionnel)
•	Bière
•	Vin de palme
Risques Santé :
•	Foie : cirrhose, stéatose
•	Pancréas : pancréatite
•	Cœur : cardiomyopathie
•	Cerveau : dépendance, troubles cognitifs
•	Calories vides : 7 cal/g (plus que glucides)
•	Interactions médicamenteuses dangereuses
•	Hypertension aggravée
•	Glycémie déstabilisée
Calories Alcool :
•	1 bière (330ml) = 150 cal
•	1 verre sodabi (50ml) = 120 cal
•	Quotidien = 1000+ cal/semaine vides
Plan Réduction Alcool :
⚠️ ATTENTION : Sevrage brutal peut être dangereux si dépendance → Consulter médecin si consommation importante (>3 verres/jour)
Pour Consommation Modérée (1-2 verres/jour) :
Semaines 1-2 :
•	Identifier situations de consommation (stress ? routine ? social ?)
•	Réduire de 50%
•	Jours sans alcool : 2-3/semaine
Semaines 3-4 :
•	3-4 verres/semaine maximum
•	Jamais 2 jours consécutifs
Semaines 5+ :
•	Objectif : 0-2 verres/semaine
•	Occasions sociales uniquement
•	Aucune consommation solitaire/routine
Alternatives :
•	Sodabi → tisane gingembre (même aspect "fort")
•	Bière → bissap non sucré avec glaçons (aspect festif)
•	Social → proposer jus frais, être transparent sur démarche santé
UNE FOIS PAR SEMAINE :
Évaluation : ACCEPTABLE mais perfectible
Boissons Sucrées 1×/Semaine :
Impact :
•	Modéré mais toujours calories vides
•	Renforce goût pour le sucré
•	Peut déclencher envies les jours suivants
Conseils :
•	Garder pour occasions sociales spécifiques
•	Choisir plus petites portions (200ml vs 500ml)
•	Diluer avec eau si possible
•	Passer à alternatives saines reste idéal : 
o	Jus de fruits frais (sans sucre ajouté)
o	Smoothies maison
o	Eau pétillante + citron
Progression Souhaitable :
•	Mois 1-2 : maintenir 1×/semaine
•	Mois 3-4 : passer à 2×/mois
•	Mois 5+ : occasions exceptionnelles
Alcool 1×/Semaine :
Évaluation : RAISONNABLE si quantité modérée
Limites à Respecter :
•	Maximum 2 verres standards/occasion
•	Pas de binge drinking (beaucoup d\'un coup)
•	Toujours avec nourriture (jamais à jeun)
•	Bien s\'hydrater (1 verre d\'eau pour 1 verre alcool)
Verre Standard :
•	Bière : 250ml
•	Vin : 120ml
•	Alcool fort : 30ml
Conseils Consommation Responsable :
•	Occasions sociales uniquement (pas routine/stress)
•	Privilégier vin rouge (si disponible) : antioxydants resvératrol
•	Éviter alcools sucrés (cocktails)
•	Espace de minimum 6-7 jours entre occasions
Si Hypertension :
•	Idéalement ZÉRO alcool
•	Si 1×/semaine maintenu : maximum 1 verre
OCCASIONNELLEMENT :
Évaluation : BIEN - À maintenir
Définition "Occasionnel" :
•	1-3 fois/mois
•	Événements spéciaux
•	Pas de routine
Conseils de Maintien :
•	Garder ce rythme
•	Événements festifs, mariages, fêtes
•	Pas de culpabilité sur ces occasions
•	Retour immédiat habitudes saines après
Stratégies Occasions :
Avant l\'Événement :
•	Manger normalement (ne pas "économiser" calories)
•	Repas équilibré avant de sortir
Pendant l\'Événement :
•	Alterner : 1 verre alcool ou sucré → 1 verre d\'eau
•	Manger d\'abord (pas à jeun)
•	Privilégier options moins sucrées
•	Savourer lentement
Après l\'Événement :
•	Retour immédiat alimentation normale
•	Pas de compensation restrictive
•	(pas de jeûne)
•	Hydratation ++
•	Reprendre activité physique
JAMAIS :
Évaluation : PARFAIT - Félicitations !
Bénéfices :
•	Zéro calories vides
•	Glycémie stable
•	Foie préservé
•	Hydratation optimale
•	Goût non habitué au très sucré
•	Économies financières
Maintien :
•	Continuer ainsi
•	Rester vigilant occasions sociales (pression sociale)
•	Avoir réponses préparées si offert : 
o	"Je préfère l\'eau, merci"
o	"Je ne bois pas d\'alcool"
o	"Un jus de fruits frais plutôt ?"
Boissons Saines à Privilégier :
•	Eau : 2-3L/jour (objectif principal)
•	Tisanes variées non sucrées
•	Café/thé (modération, sans sucre)
•	Jus frais maison sans sucre ajouté (occasionnels)
•	Eau infusée (citron, concombre, menthe)';
            case 'sommeil':
                // Complex block, dumping all text
                return 'RÉPONSE : " . $answer . "
MOINS DE 6H :
⚠️ INSUFFISANT - Impact Majeur sur Poids et Santé
Conséquences Sommeil Insuffisant :
Sur le Poids :
•	↑ Ghréline (hormone de la faim) +15%
•	↓ Leptine (hormone satiété) -15%
•	Envies aliments sucrés/gras augmentées
•	Métabolisme ralenti -5 à 10%
•	Risque obésité x2
•	Perte musculaire (vs perte de gras)
Sur la Santé :
•	Résistance à l\'insuline augmentée
•	Tension artérielle ↑
•	Cortisol (stress) élevé → stockage graisse abdominale
•	Immunité affaiblie
•	Risque diabète type 2 x2
Plan Amélioration Sommeil :
Objectif : 7-8h minimum
Stratégies Progressives :
Semaine 1 : +30 min
•	Si actuellement 5h → viser 5h30
•	Décaler heure coucher de 30 min plus tôt
Semaine 2-3 : +1h
•	Viser 6h
•	Routine coucher régulière
Semaine 4+ : 7-8h
•	Objectif final atteint
•	Maintenir régularité
Hygiène du Sommeil :
Le Soir (3h avant coucher) :
•	❌ Pas de café/thé
•	❌ Pas d\'exercice intense
•	❌ Pas de gros repas
•	❌ Limiter écrans (téléphone, TV)
•	✅ Repas léger
•	✅ Tisane relaxante (kinkeliba)
•	✅ Lumière tamisée
•	✅ Lecture, musique douce
Dîner Favorisant Sommeil :
•	✅ Glucides complexes modérés (favorisent sérotonine)
•	✅ Tryptophane : banane, avocat, noix
•	❌ Pas d\'aliments épicés
•	❌ Pas de grandes quantités liquides
Exemple Dîner Sommeil :
•	Soupe légère de légumes
•	100g poulet grillé
•	100g patate douce (glucides modérés)
•	1 banane (tryptophane)
•	Tisane kinkeliba
Routine Coucher :
1.	21h30 : fin écrans
2.	21h45 : douche tiède
3.	22h : tisane + lecture
4.	22h30 : coucher
5.	7h : réveil (objectif 8h30 sommeil)
Si Insomnie :
•	Consultation médicale nécessaire
•	Éviter somnifères sans prescription
•	Techniques relaxation : respiration, méditation
•	Activité physique journée (aide sommeil soir)
6H-7H :
Évaluation : LIMITE BASSE - Amélioration souhaitable
Situation :
•	Minimum acceptable mais pas optimal
•	Certaines personnes OK, autres insuffisant
•	Avec obésité+hypertension : viser 7-8h préférable
Conseils :
•	Évaluer qualité sommeil (réveils fréquents ? fatigue journée ?)
•	Si fatigue journée → augmenter à 7h30-8h
•	Si énergie OK → maintenir mais surveiller
Optimisation Qualité :
•	Régularité horaires (même weekends)
•	Chambre fraîche (20-22°C)
•	Obscurité totale
•	Silence ou bruits blancs
Adaptation Alimentaire :
•	Dîner 3h avant coucher minimum
•	Éviter digestion perturbant sommeil
•	Tisane relaxante OK
8H-9H :
Évaluation : OPTIMAL - Parfait pour santé et perte de poids
Bénéfices :
•	Hormones faim-satiété équilibrées
•	Métabolisme optimal
•	Récupération musculaire complète
•	Niveau énergie élevé
•	Meilleur contrôle alimentaire journée
•	Stress réduit
Maintien :
•	Continuer régularité
•	Horaires fixes
•	Qualité priorité
Alimentation Complémentaire :
•	Petit-déjeuner complet (énergie après bon sommeil)
•	Profiter énergie pour activité physique matinale
•	Meilleure adhérence plan nutritionnel
PLUS DE 9H :
Évaluation : EXCESSIF - Investigation nécessaire
Deux Scénarios :
Scénario 1 : Récupération d\'une Dette de Sommeil
•	Si passé de <6h à >9h récemment
•	Normal temporairement
•	Doit se stabiliser à 7-8h après quelques semaines
Scénario 2 : Besoin Chronique >9h
•	Peut indiquer : 
o	Apnée du sommeil non diagnostiquée
o	Sommeil de mauvaise qualité (non réparateur)
o	Hypothyroïdie
o	Dépression
o	Anémie
⚠️ Consultation médicale recommandée si >9h chronique
Évaluation Qualité Sommeil :
•	Réveils fréquents la nuit ?
•	Ronflements ?
•	Fatigue malgré heures ?
•	Somnolence journée ?
Si Apnée Suspectée → voir question suivante';
            case 'apnee_sommeil':
                if ($isYes) {
                    return 'RÉPONSE : OUI
⚠️ CONDITION SÉRIEUSE - Suivi Médical Strict Nécessaire
Lien Obésité-Apnée :
•	70% des personnes avec apnée ont obésité
•	Graisse abdominale + cou → obstruction voies aériennes
•	Cercle vicieux : apnée → fatigue → inactivité → prise de poids → apnée aggravée
Impact Sur Santé :
•	Hypertension aggravée (pauses respiratoires ↑ TA)
•	Risque cardiovasculaire x3
•	Diabète type 2 (résistance insuline)
•	Fatigue chronique
•	Troubles concentration
•	Accidents (somnolence)
Traitement Médical :
•	CPAP (Pression Positive Continue) : Masque nocturne soufflant air 
o	Amélioration immédiate qualité sommeil
o	Réduction TA
o	Plus d\'énergie journée
o	⚠️ Utilisation chaque nuit obligatoire
Rôle CRUCIAL de la Perte de Poids :
•	Perte 10% poids → réduction 25-30% sévérité apnée
•	Perte 15-20% poids → possibilité guérison complète
•	Objectif #1 : maigrir pour réduire/éliminer apnée
Adaptations Alimentaires Spécifiques :
Priorités Nutritionnelles :
1.	Perte de poids optimisée (déficit calorique modéré mais constant)
2.	Anti-inflammatoire (réduire inflammation voies aériennes)
3.	Éviter alcool absolument (relâche muscles gorge → aggrave apnée)
4.	Dîner ultra-léger (digestion légère = meilleur sommeil)
Aliments Anti-Inflammatoires à Privilégier :
•	Poissons gras (omega-3) : maquereau, sardines
•	Curcuma + gingembre (puissants anti-inflammatoires)
•	Légumes verts feuilles
•	Fruits riches antioxydants (papaye, orange)
•	Huile d\'olive
•	Noix, amandes
•	Thé vert
À ÉVITER ABSOLUMENT :
•	❌ Alcool (même 1 verre) → relâche muscles gorge
•	❌ Sédatifs sans prescription
•	❌ Gros repas soir
•	❌ Aliments provoquant reflux (épices fortes, gras, tomates le soir)
•	❌ Aliments très salés (rétention eau → œdème → obstruction)
Position Sommeil :
•	Dormir sur le côté (pas sur le dos)
•	Surélever tête de lit de 10-15cm
•	Oreiller adapté (ni trop haut ni trop bas)';
                }
                return 'RÉPONSE : NON
Évaluation : Bien, mais rester vigilant
Dépistage Recommandé Si :
•	Ronflements forts
•	Pauses respiratoires rapportées par conjoint
•	Somnolence diurne excessive
•	Fatigue au réveil malgré heures suffisantes
•	Obésité avec IMC >35
•	Tour de cou >43cm hommes, >41cm femmes
•	Hypertension résistante aux traitements
⚠️ Si 3+ de ces signes → consulter pour polysomnographie (étude du sommeil)
Prévention Apnée :
•	Maintenir perte de poids
•	Éviter alcool le soir
•	Dormir sur le côté
•	Activité physique régulière
•	Contrôle TA';
            case 'regime_recent':
                if ($isYes) {
                    return 'RÉPONSE : OUI
Analyse Importante : Effet yo-yo possible, métabolisme peut être ralenti
Conseils Ciblés :
Évaluer le Régime Précédent :
•	Était-il trop restrictif ? (<1200 cal/jour)
•	Perte trop rapide ? (>1kg/semaine)
•	Privations extrêmes ?
•	Difficile à maintenir ?
Si Régime Crash Précédent :
Conséquences :
•	Métabolisme ralenti de 10-20%
•	Perte musculaire
•	Effet rebond (reprise poids + supplément)
•	Yo-yo métabolique
Approche Réparation Métabolisme :
Phase 1 (2 semaines) : Stabilisation
•	NE PAS commencer déficit immédiatement
•	Manger à maintenance (calories besoins)
•	Focus qualité aliments
•	Réintroduire nutriments manquants
Phase 2 (Semaines 3+) : Déficit Modéré
•	Réduction calorique DOUCE (300-400 cal/jour)
•	Pas plus !
•	Préserver muscle (protéines ++)
•	Activité physique progressive
Risque Effet Yo-Yo :
•	Régimes répétés → chaque fois plus difficile perdre
•	Solution : changement lifestyle PERMANENT, pas "régime temporaire"
Nouvelle Approche (Vs Ancien Régime) :
❌ Ancien Régime :
•	Privation extrême
•	Temporaire
•	"Interdit" / "Permis"
•	Motivation externe
•	Abandon → reprise poids
✅ Nouvelle Approche :
•	Équilibre
•	Permanent (nouveau style de vie)
•	Flexibilité 90-10 (90% sain, 10% plaisir)
•	Motivation interne (santé, bien-être)
•	Durable → maintien poids

Si Oui, Combien de Poids Avez-Vous Perdu ?
MOINS DE 5 KG :
Évaluation :
•	Perte modeste, bon début
•	Moins de risque effet rebond
•	Métabolisme probablement peu affecté
Conseils :
•	Continuer sur même lancée
•	Ne pas accélérer trop vite
•	Célébrer cette victoire !
•	Chaque kilo perdu = bénéfice santé
Bénéfices Déjà Obtenus (Même <5kg) :
•	Tension artérielle légèrement réduite
•	Glycémie améliorée
•	Lipides sanguins améliorés
•	Énergie augmentée
•	Confiance en soi boostée
Plan Continuation :
•	Maintenir rythme 0.5-1kg/semaine
•	Pas de plateau découragement (normal)
•	Ajustements progressifs selon résultats
5-10 KG :
Évaluation : Excellente perte, impacts santé significatifs !
Bénéfices Majeurs Obtenus :
•	Réduction TA : 5-10 mmHg (systolique)
•	Glycémie : -0.1 à -0.2g/L
•	Cholestérol total : -10 à -15%
•	Tour de taille : -5 à -10cm
•	Mobilité améliorée
•	Apnée du sommeil réduite (si présente)
•	Douleurs articulaires diminuées
Conseils Phase Maintenance :
Risque : Après perte significative, tentation relâchement
Stratégies Maintien :
1.	Continuer habitudes qui ont fonctionné 
o	Ne pas revenir ancien mode alimentaire
o	Maintenir activité physique
2.	Pesée Régulière 
o	1×/semaine
o	Si reprise >2kg → ajuster immédiatement
3.	Gestion Plateaux 
o	Normal après perte 5-10kg
o	Métabolisme s\'adapte
o	Patience ou ajuster légèrement calories/activité
4.	Nouvel Objectif 
o	Si obésité modérée : viser 10-15% poids initial total
o	Progression par paliers (ex: perte 10kg, maintenir 1 mois, puis reprendre perte)








PLUS DE 10 KG :
Évaluation : PERTE MAJEURE - Félicitations exceptionnelles !
Impacts Santé Considérables :
•	Perte >10% poids = rémission possible diabète type 2 (si présent)
•	TA : réduction 10-20 mmHg
•	Risque cardiovasculaire divisé par 2
•	Apnée sommeil possiblement guérie
•	Mobilité transformée
•	Estime de soi
⚠️ Vigilance Accrue :
Risques Spécifiques Grosse Perte :
1.	Peau Relâchée 
o	Hydratation ++
o	Musculation (raffermir)
o	Patience (peau se rétracte sur 1-2 ans)
2.	Métabolisme Ralenti 
o	Après perte importante, métabolisme adaptent
o	Besoins caloriques réduits
o	Ajuster apports en conséquence
3.	Effet Rebond Risque Élevé 
o	Statistiques : 80% reprennent sans stratégie maintenance
o	CRUCIAL : plan maintenance à vie
4.	Carences Nutritionnelles Possibles 
o	Bilan sanguin recommandé
o	Suppléments si nécessaire
Stratégie Maintenance Perte >10kg :
Phase Consolidation (3-6 mois) :
•	OBJECTIF : stabiliser nouveau poids
•	Calories : légèrement au-dessus de la phase perte (ex: +200-300 cal)
•	PAS de retour ancien mode
•	Continuer activité physique
•	Pesée hebdomadaire stricte
Exemple Consolidation :
•	Pendant perte : 1600 cal/jour
•	Consolidation : 1850 cal/jour
•	Maintenance long terme : 1900-2000 cal/jour (selon activité)
Règles Maintenance à Vie :
1.	Pesée Hebdomadaire 
o	Chaque lundi matin
o	Si +2kg → action immédiate (retour phase perte 2 semaines)
2.	Ratio 90-10 
o	90% du temps : alimentation saine
o	10% : flexibilité occasions (sans culpabilité)
3.	Activité Physique';
                }
                return 'RÉPONSE : NON
-Négociable 
o	Minimum 150 min/semaine à vie
o	Intégrer dans routine quotidienne
o	Plaisir avant performance
4.	Suivi Médical 
o	Tous les 3-6 mois
o	Bilan sanguin annuel
o	Ajuster médicaments si nécessaire (doses souvent réduites après perte)
5.	Gestion Psychologique 
o	Identifier triggers reprises
o	Stratégies coping non-alimentaires
o	Support social
o	Consulter si besoin (psychologue, diététicien)
Célébration :
•	Acheter nouveaux vêtements
•	Photos avant/après
•	Partager succès avec proches
•	Être fier du chemin parcouru !
NON (Jamais Fait de Régime) :
Évaluation : Première démarche, excellent moment pour bien commencer !
Avantages "Débutant" :
•	Métabolisme pas endommagé par yo-yo
•	Pas de frustrations régimes passés
•	Motivation fraîche
•	Résultats souvent plus rapides au début
Inconvénients Potentiels :
•	Manque d\'expérience
•	Possibles difficultés initiales
•	Besoin d\'éducation nutritionnelle
Approche Première Fois :
Phase Découverte (Semaines 1-4) :
Objectif : Apprendre, pas perfection
Focus :
1.	Conscience Alimentaire 
o	Tenir journal alimentaire quotidien
o	Noter tout ce qui est mangé
o	Identifier patterns problématiques
2.	Petits Changements Progressifs 
o	Semaine 1 : ajouter légumes chaque repas
o	Semaine 2 : remplacer sodas par eau
o	Semaine 3 : introduire petit-déjeuner équilibré
o	Semaine 4 : structurer 3 repas + 2 collations
3.	Éducation 
o	Apprendre tailles portions
o	Comprendre macronutriments
o	Lire étiquettes (si aliments emballés)
Phase Active (Mois 2+) :
Mise en Place Complète :
•	Plan alimentaire selon niveau activité
•	Déficit calorique modéré
•	Suivi poids hebdomadaire
•	Ajustements selon résultats
Erreurs Débutant à Éviter :
1.	❌ Trop Restrictif Trop Vite 
o	Vouloir perdre trop vite
o	Couper trop de calories
o	→ Échec garanti
o	✅ Plutôt : progression douce, durable
2.	❌ Éliminer Groupes Aliments Entiers 
o	"Plus jamais de glucides"
o	"Plus jamais de gras"
o	→ Frustration, carences
o	✅ Plutôt : équilibre, modération
3.	❌ Comparer à Autres 
o	Chacun perd à son rythme
o	Comparaison = découragement
o	✅ Plutôt : focus sur SOI
4.	❌ Perfection Attendue 
o	1 écart ≠ échec
o	Culpabilité contre-productive
o	✅ Plutôt : 90% bien, 10% flex
5.	❌ Ignorer Activité Physique 
o	Penser alimentation seule suffit
o	→ Perte musculaire, plateau
o	✅ Plutôt : alimentation + mouvement
Mentalité Gagnante Débutant :
•	Patience
•	Apprentissage continu
•	Célébrer petites victoires
•	Penser long terme (mois, années)
•	Lifestyle, pas régime temporaire';
            case 'activite_jours':
                // Complex block, dumping all text
                return 'RÉPONSE : " . $answer . "
AUCUN (Sédentaire) :
⚠️ PRIORITÉ ABSOLUE : Commencer Mouvement
Risques Sédentarité :
•	"Sitting is the new smoking"
•	Métabolisme ralenti
•	Perte musculaire
•	Résistance insuline aggravée
•	Risque cardiovasculaire x2
•	Dépression, anxiété
•	Espérance vie réduite
Avec Obésité + Hypertension + Sédentarité = Cocktail Dangereux
Plan Démarrage Progressif (Crucial pour Éviter Blessure/Découragement) :
Semaine 1 : Micro-Mouvements
•	OBJECTIF : bouger 10 min/jour (oui, juste 10 min !)
•	QUOI : marche tranquille autour maison/quartier
•	QUAND : matin ou soir, moment agréable
•	MESSAGE : "Je PEUX le faire, c\'est facile"
Semaine 2 : 15 min/jour
•	Augmenter à 15 min
•	Accélérer légèrement la marche
•	Tous les jours si possible, minimum 5 jours
Semaine 3-4 : 20 min/jour
•	20 min de marche
•	Commencer sentir légère accélération cardiaque
•	Toujours confortable (pouvoir parler)
Mois 2 : 30 min/jour, 5-6 jours/semaine
•	Objectif atteint !
•	150 min/semaine = santé cardiovasculaire
•	Varier: marche, activités ménagères actives
Mois 3+ : Diversification
•	Ajouter exercices maison (voir suggestions plus bas)
•	Augmenter durée selon envie (40-60 min)
•	Introduction légère musculation
Surmonter Barrières Communes :
Barrière : "Pas le temps"
•	✅ Solution : 10 min TOUT LE MONDE a (se lever 10 min plus tôt)
•	✅ Fractionner : 3×10 min dans journée = 30 min
Barrière : "Trop fatigué"
•	✅ Solution : paradoxalement, bouger DONNE énergie
•	✅ Commencer 5 min, souvent on continue plus
Barrière : "Trop gros, honte"
•	✅ Solution : marcher tôt matin ou tard soir si gêne
•	✅ Exercices à domicile (zéro regard)
•	✅ Focus : SANTÉ, pas apparence
Barrière : "Douleurs articulaires"
•	✅ Solution : activités faible impact 
o	Marche lente
o	Nage (si accès piscine/mer)
o	Exercices assis
o	Yoga doux
•	⚠️ Consultation médecin si douleurs importantes
Activités Béninoises Accessibles Zéro Coût :
1. Marche Quotidienne
•	Autour quartier
•	Aller au marché à pied
•	Descendre taxi/zem 1 arrêt avant
2. Danse Traditionnelle
•	Chez soi, musique locale
•	Plaisir + cardio
•	20-30 min
3. Travaux Ménagers Actifs
•	Laver linge à la main (si applicable)
•	Ménage énergique
•	Jardinage/cour
4. Exercices Poids du Corps Maison (Mois 3+)
•	Squats chaise
•	Pompes murales
•	Levées de jambes
•	Étirements
1-3 JOURS (Légèrement Actif) :
Évaluation : BON DÉBUT, mais insuffisant pour optimalité
Situation :
•	Meilleur que sédentaire
•	Mais <150 min/semaine 
•	Bénéfices santé limités
Objectif : Passer à 4-6 jours/semaine
Plan Progression :
Mois 1 : Maintenir 3 jours, Augmenter Durée
•	Si actuellement 3×20 min = 60 min/semaine
•	Passer à 3×30 min = 90 min/semaine
Mois 2 : Ajouter 4ème Jour
•	4×30 min = 120 min/semaine
Mois 3 : Ajouter 5ème Jour
•	5×30 min = 150 min/semaine (objectif OMS)
Mois 4+ : Optimalité
•	5-6×40 min = 200-240 min/semaine
•	Bénéfices santé maximaux
Stratégies Augmentation Fréquence :
Identifier Jours Manquants :
•	Si actuellement lundi-mercredi-vendredi
•	Ajouter samedi (weekend = + temps)
•	Puis ajouter mardi ou jeudi
Activités Courtes Jours "Off" :
•	Pas obligé 30 min tous les jours
•	Jours ajoutés : commencer par 15-20 min
4-6 JOURS (Modérément à Très Actif) :
Évaluation : EXCELLENT - Maintenir et Optimiser
**Bénéfices Actuels
•	Santé cardiovasculaire optimale
•	Métabolisme élevé
•	Perte de poids facilitée
•	Bien-être mental
•	Énergie élevée
Conseils Optimisation :
1. Varier Types d\'Activité :
•	3 jours cardio (marche rapide, danse)
•	2 jours musculation/renforcement
•	1 jour flexibilité (étirements, yoga)
2. Progresser en Intensité :
•	Si toujours même intensité → plateau
•	Augmenter graduellement : 
o	Marche plus rapide
o	Ajouter intervalles (alterner rapide-lent)
o	Ajouter pentes/escaliers
3. Récupération :
•	1 jour repos/semaine OBLIGATOIRE
•	Sommeil crucial
•	Hydratation ++
Alimentation Modérément à Très Actif :
•	Répartition : 25% protéines / 45-48% glucides / 27-30% lipides
•	Glucides suffisants (énergie entraînements)
•	Protéines (récupération musculaire)
•	Timing nutriments : 
o	Avant exercice (1-2h) : glucides + protéines légères
o	Après exercice (30 min) : protéines + glucides
Exemple Nutrition Sport :
Avant Exercice (7h) :
•	1 banane + 20g noix
•	Hydratation (eau)
Exercice (8h-8h45) :
•	Hydratation pendant si >45 min

Après Exercice (9h) :
•	Petit-déjeuner complet : 
o	250g bouillie d\'avoine
o	2 œufs (protéines récupération)
o	1 fruit
o	Eau abondante
7 JOURS (Extrêmement Actif) :
Évaluation : ATTENTION - Possiblement excessif
Deux Scénarios :
Scénario 1 : Activité Légère Quotidienne (30 min marche)
•	✅ PARFAIT
•	Mouvement quotidien recommandé
•	Aucun risque surmenage
Scénario 2 : Entraînements Intenses 7 jours/7
•	⚠️ RISQUE SURENTRAÎNEMENT
•	Corps besoin repos
•	Risques : 
o	Blessures
o	Fatigue chronique
o	Immunité baissée
o	Plateau/régression
o	Burnout
Conseils Si Entraînements Intenses :
•	Maximum 5-6 jours intenses
•	1-2 jours repos OU activité légère (marche tranquille, étirements)
•	Écouter corps : fatigue persistante = repos nécessaire
Signes Surentraînement :
•	Fatigue chronique
•	Performances en baisse
•	Irritabilité
•	Troubles sommeil
•	Blessures répétées
•	Perte d\'appétit
•	Fréquence cardiaque repos élevée
→ Si 3+ signes : réduire volume, consulter';
            case 'temps_assis':
                // Complex block, dumping all text
                return 'RÉPONSE : " . $answer . "
MOINS DE 4H :
Évaluation : EXCELLENT - Idéal
Bénéfices :
•	Métabolisme actif toute journée
•	Risque cardiovasculaire minimal
•	Brûlage calories naturel élevé
•	Mobilité préservée
Maintien :
•	Continuer lifestyle actif
•	Varier postures même si debout (pas statique)
4H-6H :
Évaluation : ACCEPTABLE - Moyenne moderne
Risques Modérés :
•	Métabolisme ralentit par périodes
•	Début risques santé
Conseils Réduction :
•	Pause mouvement toutes les heures : 
o	Se lever
o	Marcher 2-3 min
o	Étirements
•	Remplacer temps assis par debout quand possible
6H-8H :
Évaluation : PRÉOCCUPANT - Action Nécessaire
Risques Élevés :
•	Métabolisme très ralenti
•	Risque diabète augmenté
•	Risque cardiovasculaire
•	Douleurs dorsales
•	Circulation sanguine réduite
Plan Réduction :
Au Travail (Si Assis) :
•	Téléphone → se lever pour répondre
•	Pause 5 min toutes les heures (marcher)
•	Déjeuner actif (marche après repas)
•	Trajet → descendre transport plus tôt, finir à pied
À la Maison :
•	Limiter TV/écrans
•	Activités debout (cuisine, ménage)
•	Loisirs actifs vs passifs
Objectif : Passer à <6h dans 3 mois
PLUS DE 8H :
⚠️ ALERTE ROUGE - Risque Santé Majeur
Risques Très Élevés :
•	"8h assis = fumer 1 paquet/jour" (études)
•	Risque mortalité toutes causes +90%
•	Diabète type 2 risque x2
•	Maladies cardiovasculaires
•	Obésité aggravée
•	Dépression
Même Si Vous Faites du Sport :
•	Exercice 30 min ne compense PAS 8h assis
•	Les deux sont indépendants
•	Besoin : exercice ET réduire position assise
Plan Action Urgent :
Semaine 1-2 : Conscience
•	Noter chaque heure assise
•	Identifier où/quand
Semaines 3-4 : Réduction 1h
•	Objectif : passer de 8h à 7h
•	Remplacer 1h assis par debout/mouvement
Mois 2 : Réduction 2h
•	Objectif : 6h assis
Mois 3+ : Objectif <6h
Stratégies Pratiques :
Si Travail Bureau :
•	Demander bureau debout (ou improviser : sur cartons)
•	Alterner assis-debout
•	Réunions en marchant (si possible)
•	Pause 10 min chaque heure (obligatoire !)
Si Conducteur (Taxi, Zem, etc.) :
•	Difficile réduire pendant travail
•	COMPENSER hors travail : 
o	Marche matin avant travail
o	Exercices soir
o	Weekends ultra-actifs
o	Étirements pendant pauses
À la Maison :
•	Bannir TV/écrans >2h consécutives
•	Activités ménagères debout
•	Cuisine (préparer repas = temps debout)
•	Jardinage si possible
"Active Breaks" Toutes les Heures (5 min) :
1.	Se lever
2.	Marcher sur place 1 min
3.	Étirements bras/jambes 2 min
4.	Squats x10 (si possible)
5.	Marche 2 min
Rappel Automatique :
•	Alarme téléphone toutes les heures
•	Note : "DEBOUT ! Bouge 5 min"';
            case 'activite_type':
                // Complex block, dumping all text
                return 'RÉPONSE : " . $answer . "
Principe Fondamental : PLAISIR = ADHÉRENCE
Si vous aimez l\'activité → vous continuerez Si vous détestez → vous abandonnerez
→ Trouver CE QUI VOUS PLAÎT est CRUCIAL
RÉPONSE : Marche
Excellent Choix pour Débuter/Maintenir
Avantages Marche :
•	✅ Gratuit
•	✅ Accessible partout
•	✅ Faible impact (articulations)
•	✅ Peut être sociale (avec amis/famille)
•	✅ Adaptable (lent/rapide)
•	✅ Pas d\'équipement (sauf bonnes chaussures)
Optimisation de la Marche :
Types de Marche :
1. Marche Modérée (Base) :
•	Vitesse confortable
•	Peut parler facilement
•	30-60 min/jour
•	Idéal : quotidien
2. Marche Rapide (Progression) :
•	Rythme soutenu
•	Respiration accélérée mais peut parler
•	Fréquence cardiaque 50-70% max
•	20-40 min, 4-5×/semaine
3. Marche Intervalles (Avancé) :
•	Alterner : 2 min rapide / 1 min modéré
•	Challenge cardiovasculaire
•	Brûlage calories ++
•	20-30 min, 3-4×/semaine
Parcours Béninois Suggestions :
•	Bord de mer/plage (sable = + effort)
•	Parcs publics
•	Quartiers calmes tôt matin
•	Marché (actif + social)
•	Tour du quartier programmé
Progression Marche :
Mois 1 : 30 min/jour, rythme modéré Mois 2 : 40 min/jour OU 30 min rythme plus rapide Mois 3 : 45-60 min/jour OU introduction intervalles Mois 4+ : Variation types de marche
Alimentation Marcheur :
•	Collation légère avant si marche matinale (banane)
•	Hydratation ++
•	Repas normaux selon niveau activité
RÉPONSE : Yoga
Excellent pour Flexibilité, Stress, Équilibre
Avantages Yoga :
•	✅ Faible impact
•	✅ Réduit stress (bénéfice TA)
•	✅ Améliore flexibilité
•	✅ Renforce muscles profonds
•	✅ Connexion corps-esprit
•	✅ Adaptable tous niveaux
Mais Attention :
•	❌ Seul : insuffisant pour perte de poids optimale
•	❌ Faible dépense calorique vs cardio
Yoga Optimal = Complément, Pas Unique Activité
Plan Complet :
•	Yoga : 2-3×/semaine (flexibilité, relaxation)
•	AJOUTER Cardio : 3-4×/semaine (marche, danse)
•	Total : 5-6 jours activité/semaine
Types Yoga Accessibles :
1. Hatha Yoga (Doux) :
•	Idéal débutants
•	Postures basiques
•	Respiration
•	Relaxation
2. Vinyasa Yoga (Plus Dynamique) :
•	Enchaînements fluides
•	
o	Cardio
•	Intermédiaire
Yoga à Domicile Béninois :
•	Natte ou pagne épais au sol
•	Vidéos YouTube gratuites
•	20-30 min matin ou soir
•	Espace calme
Postures Bénéfiques Hypertension/Obésité :
•	✅ Postures douces, respirations profondes
•	✅ Torsions (massage organes)
•	❌ Éviter inversions complètes si TA non contrôlée
RÉPONSE : Danse
EXCELLENT - Cardio + Plaisir !
Avantages Danse :
•	✅ Cardio intense
•	✅ Brûlage calories élevé
•	✅ Plaisir/musique (motivation)
•	✅ Social possible
•	✅ Culturellement ancré (Bénin)
•	✅ Pas de gym nécessaire
Styles Danse Béninois :
•	Danse traditionnelle (Agbadja, Tchinkounme, etc.)
•	Coupé-décalé
•	Afrobeats
•	Zumba (si cours disponibles)
•	Danse libre chez soi
Programme Danse Maison :
•	30-45 min/session
•	4-5×/semaine
•	Playlist musique aimée
•	Chez soi (zéro gêne)
Intensité :
•	Commencer modérée (20 min)
•	Augmenter durée + intensité progressivement
•	Objectif : transpirer, être essoufflé (mais pouvoir parler)
Alimentation Danseur :
•	Glucides suffisants (énergie)
•	Hydratation avant/pendant/après
•	Collation 1h avant si besoin
Danse = Équivalent :
•	30 min danse énergique = 45 min marche rapide
•	Dépense : 200-400 cal/session selon intensité
RÉPONSE : Natation
EXCELLENT Si Accès Possible
Avantages Natation :
•	✅✅✅ MEILLEUR pour obésité (zéro impact articulations)
•	✅ Cardio complet
•	✅ Tous muscles sollicités
•	✅ Rafraîchissant (climat chaud)
•	✅ Sensation légèreté (eau porte)
Inconvénient :
•	❌ Accès limité (piscines rares/payantes)
•	❌ Mer : possible mais vigilance (courants, sécurité)
Si Accès Mer/Piscine :
•	Idéal 2-3×/semaine minimum
•	30-45 min/session
•	Nage lente mais continue
•	Progresser en durée
Sécurité Mer :
•	Jamais seul
•	Zones surveillées
•	Attention courants
•	Rester près du bord si débutant
RÉPONSE : Vélo
Bon Si Accessible
Avantages :
•	Cardio
•	Faible impact
•	Transport actif possible
Béninois Context :
•	Circulation parfois dangereuse (Cotonou, etc.)
•	Terrain variable
•	Chaleur
Si Pratiqué :
•	Vélo transport quotidien = activité intégrée
•	30+ min/jour
•	Hydratation ++
•	Protection solaire
RÉPONSE : "Je n\'aime rien" / "Aucune idée"
Défi Commun - Solutions Créatives
Stratégie : Tester Plusieurs Activités
Liste Béninoise à Essayer (1 mois chacune) :
Mois 1 : Marche
•	Le + accessible
•	30 min/jour
•	Seul ou groupe
Mois 2 : Danse Maison
•	Musique préférée
•	20 min/jour
•	Fun garanti
Mois 3 : Activités Ménagères Intenses
•	Compter comme exercice
•	Ménage énergique 45 min
•	Jardinage actif
Mois 4 : Exercices Maison (Vidéos)
•	YouTube gratuit
•	Programmes débutants
•	Variété
Après 4 mois → Identifier ce qui a été le moins pénible = continuer celui-là
Activités "Cachées" (Mouvement Sans Avoir l\'Air de Faire du Sport) :
•	Jouer avec enfants/neveux
•	Aller au marché à pied
•	Laver voiture/moto énergiquement
•	Ranger maison
•	Cuisiner debout actif (pas assis)
Principe : TOUT MOUVEMENT COMPTE. Pas besoin "sport" officiel. Bouger suffisant !
NB :Si user choisit autre activité physique qu’il préfère hormis marche et yoga, tu lui balance les autres activités se trouvant en haut pour mla question précédentes';
            case 'freq_cardio':
                // Complex block, dumping all text
                return 'RÉPONSE : " . $answer . "
OUI - Si Fréquence Donnée :
Interprétation Fréquence Cardiaque Repos (FCR) :
< 60 bpm :
•	Excellent (athlète)
•	Rare si sédentaire/obésité
•	Si présent + fatigue → consulter (bradycardie ?)
60-80 bpm :
•	Normal-Bon
•	Objectif santé
80-100 bpm :
•	Limite haute normale
•	Amélioration souhaitable
> 100 bpm :
•	⚠️ Tachycardie
•	Causes possibles : 
o	Déconditionnement
o	Hypertension
o	Stress chronique
o	Hyperthyroïdie
o	Médicaments
•	→ Consultation médicale recommandée
Avec Activité Physique Régulière :
•	FCR baisse de 5-25 bpm sur 3-6 mois
•	Signe amélioration cardiovasculaire
•	Mesure progrès objective
Suivi Conseillé :
•	Mesure FCR chaque lundi matin
•	Au réveil, avant lever
•	1 min pouls poignet ou cou
•	Noter dans journal


Zones Cibles Exercice (Selon Âge) :
Utilisation pour optimiser :
•	Zones d\'effort : Calcul votre nutrition pour connaitre votre zone d’entrainement enfin de pouvoir guider votre proportion lipide/glucide :
•	Calcul de votre fréquence cardiaque maximale FC max : 
Pour effectuer ce calcul, nous allons utiliser la formule de Tanaka qui est FCmax = 208 − (0,7× âge) dont l’unité est le bpm (battement par minute). Ensuite pour vous aller suivre votre zone cible en fonction de votre niveau d’activité pour suivre des recommandations suivantes qui se résume dans le tableau suivant : 


Niveau d’activité	% FCmax (zone cible)	Zone d’effort	Activités physiques adaptées	Recommandations nutritionnelles
Sédentaire (débutant)	50 – 60 %	Zone santé (échauffement, mise en route douce)	Marche lente, vélo d’appartement à faible résistance, aquagym douce	Réduction du sel (< 5 g/j), hydratation régulière, augmentation des fibres (fruits, légumes, légumineuses), limiter graisses saturées
Légèrement actif	60 – 65 %	Zone de confort aérobie	Marche rapide, vélo léger, natation tranquille, danse douce	Portions contrôlées, privilégier les céréales complètes, limiter sucres rapides, augmenter apport en potassium (banane, légumineuses, patate douce) pour tension artérielle
Modérément actif	65 – 70 %	Zone cardio (endurance)	Marche nordique, vélo modéré, aquagym dynamique, tapis roulant	Éviter plats préparés/salés, consommer protéines maigres (poisson, volaille sans peau), laitages allégés, surveiller l’apport calorique
Très actif	70 – 75 %	Zone contrôle du poids (brûlage des graisses + amélioration cardio)	Vélo elliptique, natation soutenue, circuit training adapté, danse énergique	Fractionner les repas, augmenter légumes + fruits frais, réduire caféine/alcool, consommer acides gras insaturés (huile d’olive, noix, avocat)
Extrêmement actif (avancé, sous suivi médical obligatoire)	75 – 80 %	Zone haute intensité (prudence avec hypertension)	HIIT doux supervisé, cardio mixte en salle, natation intense, step modéré	Surveillance médicale obligatoire, alimentation DASH (faible sel, riche en fibres, potassium, calcium, magnésium), éviter excitants, privilégier cuisson vapeur/grillade
Durant Exercice :
•	Viser zone modérée débutant
•	Progresser vers zone intense
NON :
Conseils : Apprendre à mesurer
Méthode Manuelle (Gratuite) :
1. Choisir Point Pouls :
•	Poignet (artère radiale)
•	Cou (artère carotide) - attention doucement
2. Compter :
•	60 secondes complètes
•	OU 30 secondes x2
•	OU 15 secondes x4 (moins précis)
3. Moment Mesure :
•	Matin au réveil
•	Allongé, calme
•	Avant lever, café
4. Noter :
•	Créer tableau suivi
•	Observer évolution
Alternative : Applications téléphone (utilisant caméra/flash) - précision variable';
            case 'stress_ennui':
                if ($isYes) {
                    return 'RÉPONSE : OUI
⚠️ ALIMENTATION ÉMOTIONNELLE - Enjeu Psychologique Majeur
Cercle Vicieux : Stress/Ennui → Manger → Culpabilité → Stress → Manger...
Pourquoi On Mange Émotionnellement :
•	Nourriture = confort temporaire
•	Libération dopamine (plaisir)
•	Distraction émotions négatives
•	Habitude conditionnée
Mais :
•	Ne résout PAS problème sous-jacent
•	Ajoute culpabilité, prise de poids
•	Aggrave stress à long terme
Stratégies Gestion Alimentation Émotionnelle :
1. Identifier Triggers (Déclencheurs) :
Tenir Journal Émotions-Nourriture (2 Semaines) :
Patterns Communs :
•	Après-midi seul → ennui
•	Soir après travail → stress
•	Weekend → solitude
•	Conflit relationnel → tristesse
2. Distinguer Faim Physique vs Émotionnelle :
Faim Physique :
•	Progressive
•	Estomac gargouille
•	N\'importe quel aliment convient
•	Après repas = satisfait
•	Pas de culpabilité
Faim Émotionnelle :
•	Soudaine, urgente
•	Envie spécifique (sucré, gras)
•	Estomac pas vide
•	Manger jusqu\'à inconfort
•	Culpabilité après
3. Stratégies Alternatives';
                }
                return 'RÉPONSE : NON
-Alimentaires :
Si STRESS :
•	Respiration profonde (5 min)
•	Marche extérieur (10 min)
•	Appeler ami/famille
•	Écrire dans journal
•	Musique relaxante
•	Tisane chaude (rituel réconfort sans calories)
•	Prière/méditation
Si ENNUI :
•	Activité manuelle (tricot, dessin)
•	Sortir maison (marche, courses)
•	Ranger/nettoyer zone
•	Lire livre/magazine
•	Appeler quelqu\'un
•	Hobby oublié
Si TRISTESSE :
•	Pleurer (libération saine)
•	Parler à proche
•	Écrire émotions
•	Activité douce (marche nature)
•	Écouter musique
•	Câlin animal domestique (si applicable)
Si COLÈRE :
•	Exercice physique intense (évacuation)
•	Frapper oreiller
•	Écrire lettre colère (ne pas envoyer)
•	Marche rapide
•	Crier dans endroit isolé
4. Restructuration Environnement :
À la Maison :
•	Supprimer aliments réconfort (biscuits, chips, sodas)
•	Si impossible (famille) → ranger hors vue
•	Avoir alternatives saines visibles (fruits, légumes coupés)
•	Zone "réconfort" sans nourriture (coin lecture, terrasse)
5. Technique HALT (Avant de Manger) :
Se demander : "Suis-je..."
•	Hungry (Affamé) ?
•	Angry (En colère) ?
•	Lonely (Seul) ?
•	Tired (Fatigué) ?
Si NON hungry → émotion, pas faim → stratégie alternative
6. Règle des 10 Minutes :
Envie manger émotionnellement →
1.	PAUSE 10 minutes
2.	Boire grand verre d\'eau
3.	Activité alternative
4.	Réévaluer après 10 min
5.	Souvent, envie disparue
7. Eating Mindful (Alimentation Consciente) :
Si Décision de Manger :
•	Assiette (pas paquet direct)
•	S\'asseoir table
•	Sans écran
•	Manger LENTEMENT
•	Savourer chaque bouchée
•	Arrêter quand 80% satisfait
8. Auto-Compassion (Pas Culpabilité) :
Si Écart Émotionnel :
•	Normal, humain
•	Pas "échec"
•	Apprendre, pas punir
•	Reprendre normalité repas suivant
•	Pas compensation restrictive
9. Support Professionnel Si Nécessaire :
Si Alimentation Émotionnelle :
•	Quotidienne
•	Incontrôlable
•	Quantités très importantes
•	Avec vomissements/purges
•	Impacte vie sociale/travail
→ Consulter psychologue spécialisé TCA (Troubles Comportement Alimentaire)
Aliments Béninois "Réconfort Sain" (Si Vraiment Besoin Manger) :
•	Tisane kinkeliba chaude sucrée au miel (réconfort, peu calories)
•	Soupe légère légumes (chaud, réconfortant, nutritif)
•	Fruits frais (sucre naturel, vitamines)
•	Petite poignée noix (croquant, gras sains, satiété)
vs Éviter Réconforts Malsains :
•	Biscuits sucrés
•	Chips salées
•	Pâtisseries
•	Sodas
•	Fritures
NON :
Évaluation : EXCELLENT
Bénéfice :
•	Relation saine avec nourriture
•	Alimentation réponse besoins physiques (pas émotionnels)
•	Facilite contrôle poids
Maintien :
•	Continuer écoute signaux faim/satiété
•	Vigilance si période stress future (prévention rechute)
•	Stratégies gestion stress non-alimentaires en place';
            case 'finir_assiette':
                if ($isYes) {
                    return 'RÉPONSE : OUI
Problème Courant - Éducation Culturelle
Origines :
•	"Finis ton assiette" (enfance)
•	"Ne gaspille pas"
•	Respect cuisinier
•	Peur manque
Mais :
•	Ignore signaux satiété naturels
•	Surconsommation calories
•	Estomac surdistendu
•	Prise de poids
Ré-apprentissage Signaux Faim/Satiété :
Échelle Faim-Satiété (1-10) :
1-2 : Affamé, faible 3-4 : Faim modérée, estomac vide 5 : Neutre 6-7 : Satisfait, confortable 8-9 : Trop plein, inconfort 10 : Douleur, très inconfortable
Objectifs :
•	Manger quand 3-4
•	Arrêter quand 7 (pas 9-10 !)
Stratégies Pratiques :
1. Servir Portions Plus Petites :
•	Utiliser assiettes plus petites (illusion visuelle)
•	Servir 80% de la portion habituelle
•	Se resservir si vraiment encore faim après 20 min
2. Manger Lentement (20-30 Min/Repas) :
•	Poser fourchette entre bouchées
•	Mâcher longuement (20-30 fois)
•	Boire eau entre bouchées
•	Conversation si repas social
Pourquoi : Signal satiété cerveau prend 20 min
3. Pause Milieu de Repas :
•	À mi-assiette → PAUSE 2 min
•	Évaluer faim (échelle 1-10)
•	Si 7 → ARRÊTER
•	Si 5-6 → continuer lentement
4. Restes = OK :
•	Garder pour plus tard
•	Donner à autre membre famille
•	Compost/animaux
•	Mieux "gaspiller" que surcharger corps
Nouvelle Mentalité : ❌ "Finir assiette = vertu" ✅ "Écouter corps = vertu"
5. Servir Directement Portions Justes :
•	Apprendre tailles portions saines : 
o	Féculent : poing
o	Protéine : paume main
o	Légumes : 2 poings
o	Gras : pouce
6. Technique "Assiette Divisée" :
•	½ assiette = légumes
•	¼ = féculent
•	¼ = protéine
•	Finir légumes en premier (remplissage sain)
7. Éviter Distractions Pendant Repas :
•	❌ TV, téléphone, écrans
•	✅ Focus nourriture, sensations
•	Conscience accrue satiété
8. Affirmation Positive : Si Culpabilité Laisser :
•	"J\'écoute mon corps"
•	"Je respecte ma satiété"
•	"Je nourris ma santé, pas nettoie assiette"';
                }
                return 'RÉPONSE : NON
Évaluation : EXCELLENT
Capacité d\'Écoute Corps :
•	Signaux satiété respectés
•	Contrôle portions naturel
•	Facilite perte/maintien poids
Maintien :
•	Continuer cette pratique saine
•	Modèle pour enfants/proches (si applicable)';
            case 'regime_particulier':
                // Complex block, dumping all text
                return 'RÉPONSE : " . $answer . "
OUI - Si oui, lequel, et a-t-il été efficace ? Pourquoi ?
Analyse Régimes Courants :
RÉGIME  "Jeûne Intermittent" (16/8, 5:2, etc.)
Efficacité :
•	✅ Si bien fait : perte poids
•	✅ Simplicité (pas comptage calories)
•	⚠️ Non adapté à tous
Pour Obésité + Hypertension + Médicaments :
•	⚠️ ATTENTION 
o	Si diabète/médicaments glycémie → risque hypoglycémie
o	Si médicaments à prendre avec nourriture → conflit
o	Hypertension parfois aggravée (stress jeûne)
Avis : Consulter médecin AVANT. Pas recommandé sans supervision si médicaments.
Si Suivi et Efficace :
•	Identifier pourquoi : structure ? simplicité ?
•	Adapter version modérée : exemple 12/12 (dîner tôt, petit-dej tardif)
Si Suivi et Échec :
•	Identifier pourquoi : faim excessive ? hypoglycémie ? insoutenable ?
•	Ne PAS répéter
•	Adopter approche plus équilibrée
RÉGIME : "Low Carb" / "Keto" (Très pauvre glucides)
Principes :
•	Glucides <50g/jour (keto) ou <100g (low carb)
•	Lipides et protéines élevés
**Efficacité
Continuer
2 janv.
Court Terme :**
•	✅ Perte poids rapide initiale (eau surtout)
•	✅ Satiété (protéines/lipides)
Problèmes :
•	❌ Soutenabilité faible long terme
•	❌ Privation glucides = frustration
•	❌ Carences possibles (fibres, vitamines)
•	❌ Non adapté culture béninoise (riz, igname = bases)
•	❌ Effet rebond important si arrêt
Pour Obésité + Hypertension :
•	⚠️ Lipides élevés peuvent impacter lipides sanguins
•	⚠️ Keto-flu (fatigue, maux tête début)
Avis : Non recommandé long terme. Si envie réduire glucides → version modérée (40-45%, IG bas) préférable.
Si Suivi et Échec :
•	Normal, difficilement soutenable
•	Adopter approche équilibrée avec glucides IG bas

RÉGIME : "Paléo" (Comme ancêtres chasseurs-cueilleurs)
Principes :
•	Viandes, poissons, fruits, légumes, noix
•	Exclut : céréales, légumineuses, produits laitiers
Efficacité :
•	✅ Aliments non transformés (positif)
•	✅ Légumes/fruits abondants (positif)
Problèmes :
•	❌ Exclusion légumineuses (haricots) = perte source protéines/fibres excellente
•	❌ Exclusion céréales complètes (avoine, riz complet) = perte fibres
•	❌ Coût élevé (viandes)
•	❌ Non adapté contexte béninois
Avis : Principes intéressants (non transformé) mais restrictions excessives. Adapter : garder légumineuses et céréales complètes.
RÉGIME : "Substituts Repas" (Shakes, barres)
Principes :
•	Remplacer 1-2 repas/jour par shake protéiné
Efficacité Court Terme :
•	✅ Perte poids (déficit calorique facile)
•	✅ Simplicité
Problèmes Majeurs :
•	❌ Non soutenable à vie
•	❌ N\'apprend PAS à manger sainement
•	❌ Dès arrêt → reprise poids
•	❌ Ennui, frustration
•	❌ Coût élevé
•	❌ Manque fibres, nutriments complets
Avis : ÉVITER. Privilégier vrais aliments, apprendre à cuisiner sainement.
RÉGIME : "Détox" / "Jus" / "Citron le Matin"
Principes :
•	Jus légumes/fruits uniquement
•	Ou eau citronnée à jeun
•	"Nettoyer" corps
Réalité Scientifique :
•	❌ AUCUNE preuve scientifique "détox"
•	❌ Corps a organes détoxification (foie, reins) - fonctionnent seuls
•	❌ Jus = perte fibres + sucres concentrés
•	❌ Déficits protéines/lipides
Eau Citronnée le Matin :
•	Pas de mal, pas de bénéfice majeur
•	Si aimé : OK
•	Si croyance "détox" : démystifier
Avis : Oublier "détox". Focus alimentation équilibrée = vraie "détox".
RÉGIME : "Index Glycémique Bas"
Principes :
•	Choisir glucides IG <55
•	Éviter pics glycémiques
Efficacité :
•	✅✅✅ EXCELLENT pour obésité + hypertension + diabète/prédiabète
•	✅ Base scientifique solide
•	✅ Soutenable long terme
•	✅ Adapté contexte béninois (riz complet, igname, patate douce)
Avis : RECOMMANDÉ. C\'est la base de ce guide alimentaire !
Si Suivi et Efficace :
•	CONTINUER
•	Perfectible avec autres principes (portions, activité)
RÉGIME : "Méditerranéen"
Principes :
•	Légumes, fruits, poissons, huile d\'olive, noix, céréales complètes
•	Viande rouge limitée
Efficacité :
•	✅✅✅ EXCELLENT santé cardiovasculaire
•	✅ Études robustes
•	✅ Soutenable
•	✅ Délicieux
Adaptation Béninoise :
•	Remplacer olives/huile d\'olive par : huile d\'olive importée (accessible) + avocat local
•	Poissons locaux abondants (parfait)
•	Légumes/fruits locaux
•	Noix de cajou locales
Avis : FORTEMENT RECOMMANDÉ. Compatible avec principes ce guide.
RÉGIME : "DASH" (Dietary Approaches to Stop Hypertension)
Principes :
•	Spécifiquement conçu HYPERTENSION
•	Riche : fruits, légumes, produits laitiers allégés, grains complets
•	Pauvre : sodium, graisses saturées, sucres
Efficacité :
•	✅✅✅ PROUVÉ réduire TA 8-14 mmHg
•	✅ Parfait obésité + hypertension
Avis : EXCELLENT. Base scientifique solide pour votre profil. Compatible guide.
Si Régimes Multiples Passés = Yo-Yo :
Analyse :
•	Chaque régime = perte + reprise
•	Métabolisme endommagé
•	Découragement
Nouvelle Approche :
•	❌ STOP "régimes"
•	✅ START "lifestyle"
Différence :
•	Régime = temporaire, privation, souffrance
•	Lifestyle = permanent, équilibre, plaisir
Plan :
•	Changements progressifs
•	Durables à vie
•	Pas perfection
•	90% sain, 10% flex
NON (Jamais Suivi Régime Particulier) :
Évaluation : Page blanche, opportunité !
Avantages :
•	Pas d\'échecs passés décourageants
•	Métabolisme intact
•	Aucune restriction mentale
Approche :
•	Partir sur bases saines dès début
•	Lifestyle équilibré (pas "régime")
•	Éducation nutritionnelle complète
•	Patience, long terme';
            default:
                return "RÉPONSE : " . $answer . "\n(En attente de conseils spécifiques.)";
        }
    }


    private function getWeightLossBetween5and10kgCardioAdvice(string $key, string $answer, array $allAnswers): string
    {
        $isYes = (stripos($answer, 'oui') !== false);
        $answerLower = mb_strtolower($answer);

        switch ($key) {
            case 'antecedents_diag':
                if ($isYes) {
                    return "RÉPONSE : OUI (Maladies Cardiovasculaires)\nConseils ciblés:\n•	Lipides de qualité: huile de palme rouge (riche en vitamine A) 1-2 c. à café/jour max\n•	Privilégier poissons gras (sardines, maquereau) 3 fois/semaine: oméga-3\n•	Éviter fritures, huiles réutilisées, graisses saturées en excès\n•	Limiter viandes grasses, abats, peau de volaille\n•	Augmenter fibres: légumes verts à chaque repas, légumineuses quotidiennes\n•	Noix et graines nature (cajou, arachides non salées): 20-30g/jour\nModifications des repas:\n•	Cuissons: Grillé, bouilli, vapeur, en sauce légère (pas de friture)\n•	Protéines: Poisson > volaille > viande maigre\n•	Lipides: 1 c. à café d'huile de palme OU avocat (1/3) par jour\n•	Fibres: Minimum 300g de légumes/jour";
                }
                return "RÉPONSE : NON (Pas d'antécédents)\nConseils ciblés:\n•	Suivre le guide de base selon niveau d'activité\n•	Prévention: maintenir variété alimentaire, portions contrôlées\n•	Surveillance régulière du poids, tension, glycémie (1 fois/an minimum)";

            case 'meds_actuels':
                if ($isYes) {
                    return "RÉPONSE : OUI\nConseils ciblés :\n•	Respecter scrupuleusement les heures de prise des médicaments\n•	Certains médicaments interagissent avec les aliments\n•	Maintenir une alimentation régulière pour optimiser l'efficacité des traitements\n•	Ne jamais arrêter un traitement sans avis médical\nRepas :\n•	Régularité des horaires de repas\n•	3 repas principaux + 2 collations à heures fixes\n•	Hydratation régulière (1,5-2L d'eau/jour)";
                }
                return "RÉPONSE : NON\nConseils ciblés :\n•	L'alimentation est votre principale arme thérapeutique\n•	Redoubler d'efforts sur l'équilibre alimentaire\n•	Surveillance régulière des paramètres (tension, glycémie si possible)\n•	Consultation médicale régulière recommandée";

            case 'meds_types':
                if (str_contains($answerLower, 'glycém') || str_contains($answerLower, 'diabète')) {
                    return "RÉPONSE : MÉDICAMENTS GLYCÉMIE\nConseils ciblés:\n•	JAMAIS sauter de repas: risque d'hypoglycémie\n•	Collations obligatoires si délai >4h entre repas\n•	Glucides complexes à chaque repas pour éviter pics et chutes\n•	Avoir toujours fruit ou jus naturel en cas d'urgence\nCollations sécuritaires: Orange, banane, lait caillé, arachides (15g)";
                }
                if (str_contains($answerLower, 'orlistat') || str_contains($answerLower, 'liraglutide') || str_contains($answerLower, 'poids')) {
                    return "RÉPONSE : MÉDICAMENTS POIDS\nOrlistat: Réduire lipides à 20-25% max (éviter effets digestifs)\nLiraglutide: Portions réduites (-20-30%), manger lentement, 5-6 petits repas si nausées\nHydratation +++ (1,5-2L/jour)";
                }
                if (str_contains($answerLower, 'tensio') || str_contains($answerLower, 'hta') || str_contains($answerLower, 'cœur')) {
                    return "RÉPONSE : MÉDICAMENTS TENSION\nConseils: Régime DASH adapté (ZÉRO sel ajouté)\nPotassium élevé: banane, avocat, papaye, épinards, haricots\nMagnésium: arachides nature, épinards, haricots";
                }
                if (str_contains($answerLower, 'cholestérol') || str_contains($answerLower, 'statine')) {
                    return "RÉPONSE : MÉDICAMENTS CHOLESTÉROL\nConseils: Réduire graisses saturées, augmenter fibres solubles\nOméga-3: poissons gras 3-4 fois/semaine\nÉVITER pamplemousse (interaction)";
                }
                return "RÉPONSE : " . $answer . "\nSuivre les recommandations médicales spécifiques liées à votre traitement.";

            case 'portions_jour':
                if (str_contains($answer, '1') || str_contains($answer, '2')) {
                    return "RÉPONSE : 1-2 PORTIONS (INSUFFISANT)\nObjectif: passer à 5 portions minimum\nPlan d'action: Semaine 1-2 (ajouter 1 fruit au petit-déj), Semaine 3-4 (salade à midi et soir), Semaine 5+ (légumes cuits à chaque repas)";
                }
                if (str_contains($answer, '3') || str_contains($answer, '4')) {
                    return "RÉPONSE : 3-4 PORTIONS (BON DÉBUT)\nObjectif: viser 5-7 portions pour bénéfice optimal\nConseils: Varier les couleurs, ajouter 1 portion supplémentaire/jour, fruits frais en collation.";
                }
                return "RÉPONSE : 5 PORTIONS OU PLUS (EXCELLENT)\nMaintenir cette habitude. Privilégier légumes verts feuillus (fer, calcium) et fruits entiers plutôt que jus.";

            case 'grignotage':
                if ($isYes) {
                    return "RÉPONSE : OUI\nSi sucré/gras: REMPLACER par collations saines (banane plantain bouillie, arachides grillées nature, papaye).\nSi sain (fruits/noix): Attention aux portions (noix max 20-30g/jour, fruits 2-3 portions).";
                }
                return "RÉPONSE : NON\nParfait pour contrôle pondéral. Si faim entre repas: ajouter collation saine planifiée.";

            case 'boissons':
                if (str_contains($answerLower, 'tous') || str_contains($answerLower, 'jour')) {
                    return "RÉPONSE : TOUS LES JOURS (DANGER)\nBoissons sucrées: ARRÊT IMMÉDIAT. Remplacer par bissap sans sucre, eau citronnée.\nAlcool: ARRÊT OBLIGATOIRE pour santé CV. Alcool = calories vides + risque tension/triglycérides.";
                }
                if (str_contains($answerLower, 'semaine')) {
                    return "RÉPONSE : UNE FOIS PAR SEMAINE\nBoissons sucrées: 200ml max, préférer bissap maison.\nAlcool: 1 verre max, jamais à jeun, privilégier vin rouge.";
                }
                return "RÉPONSE : " . $answer . "\nMaintenir une consommation minimale ou nulle. L'eau reste la meilleure hydratation.";

            case 'sommeil':
                if (str_contains($answerLower, 'moins') || str_contains($answer, '6')) {
                    return "RÉPONSE : MOINS DE 6H (PRIORITÉ SOMMEIL)\nLe manque de sommeil dérègle les hormones de faim et favorise la prise de poids.\nObjectif: 7-9h/nuit. Dîner léger 2-3h avant le coucher, éviter caféine après 15h.";
                }
                if (str_contains($answer, '8') || str_contains($answer, '9')) {
                    return "RÉPONSE : 8-9H (EXCELLENT)\nSommeil optimal pour santé métabolique et cardiovasculaire. Maintenir cette régularité.";
                }
                return "RÉPONSE : " . $answer . "\nUn bon sommeil est crucial pour la régulation du poids. Visez 7-9h.";

            case 'apnee':
                if ($isYes) {
                    return "RÉPONSE : OUI\nApnée = facteur aggravant HTA/CV. Perte de poids améliore significativement l'apnée (objectif -10% poids).\nDîner TRÈS léger, 3-4h avant coucher, éviter alcool complètement.";
                }
                return "RÉPONSE : NON\nPrévention: maintenir poids santé, éviter alcool/tabac le soir.";

            case 'regime_recent':
                if ($isYes) {
                    return "RÉPONSE : OUI\nSi vous avez déjà perdu du poids, bravo ! L'objectif est maintenant la stabilisation durable pour éviter l'effet yoyo.";
                }
                return "RÉPONSE : NON\nExcellent, vous pouvez suivre votre objectif actuel de perte de poids sur une base saine.";

            case 'activite_physique_jours':
                if (str_contains($answerLower, 'aucun')) {
                    return "RÉPONSE : AUCUN (DANGER SÉDENTARITÉ)\nDémarrage progressif: Semaine 1 (10 min marche/jour), Semaine 4+ (30 min/jour, 5 jours/semaine).\nPrécautions CV: Accord médical obligatoire avant démarrage.";
                }
                if (str_contains($answer, '1') || str_contains($answer, '2') || str_contains($answer, '3')) {
                    return "RÉPONSE : 1-3 JOURS\nBon début, augmenter à 5 jours/semaine minimum (150 min/semaine).";
                }
                return "RÉPONSE : 4-7 JOURS\nExcellent engagement. Assurer au moins 1 jour de repos pour la récupération.";

            case 'temps_assis':
                if (str_contains($answerLower, 'plus') || str_contains($answer, '8')) {
                    return "RÉPONSE : PLUS DE 8H (DANGER CV)\nPauses actives TOUTES LES 30 MIN. Compenser par 60-90 min activité modérée/jour.";
                }
                return "RÉPONSE : " . $answer . "\nMoins vous passez de temps assis, mieux c'est pour votre cœur. Intégrez des pauses actives régulières.";

            case 'fc_repos':
                if ($isYes) {
                    return "RÉPONSE : OUI\nL'indice de fréquence cardiaque au repos est un excellent marqueur de progrès CV. Elle diminue avec l'exercice régulier et la perte de poids.";
                }
                return "RÉPONSE : NON\nApprendre à la mesurer au réveil (pouls 60 sec) pour suivre l'amélioration de votre forme cardiaque.";

            case 'manger_stress':
                if ($isYes) {
                    return "RÉPONSE : OUI\nAlimentation émotionnelle: Stratégies (marche 15 min, respiration profonde, appeler un ami) au lieu de manger. Tenir un journal émotions-alimentation.";
                }
                return "RÉPONSE : NON\nExcellente relation à l'alimentation. Maintenez cette écoute des signaux physiques.";

            case 'finir_assiette':
                if ($isYes) {
                    return "RÉPONSE : OUI\nHabitude à changer: Utiliser des assiettes plus petites, manger lentement (20 min), s'arrêter à 7/10 de satiété.";
                }
                return "RÉPONSE : NON\nParfait ! Respecter les signaux de satiété est une clé majeure du maintien du poids.";

            default:
                return "Aucun";
        }
    }

    private function getWeightLossOver10kgAntecedentsAdvice(string $key, string $answer, array $allAnswers): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = (stripos($answer, 'oui') !== false);
        $isDiabetes = false;
        $isHypertension = false;

        foreach ($allAnswers as $resp) {
            $text = mb_strtolower($resp['text'] ?? '');
            if (str_contains($text, 'diabète'))
                $isDiabetes = true;
            if (str_contains($text, 'hypertension') || str_contains($text, 'hta'))
                $isHypertension = true;
        }

        // Logic based on rec10 (Diabetes) and rec11 (Hypertension)
        switch ($key) {
            case 'antecedents_diag':
                if ($isYes) {
                    $advice = "RÉPONSE : OUI\n";
                    if ($isDiabetes)
                        $advice .= "DIABÈTE TYPE 2 : Privilégier IG bas, fractionner les repas, surveiller féculents, fibres +++.\n";
                    if ($isHypertension)
                        $advice .= "HYPERTENSION : Réduction drastique du sel (max 5g/jour), DASH béninois, potassium + (banane, avocat).\n";
                    return $advice . "Contrôle médical mensuel OBLIGATOIRE.";
                }
                return "RÉPONSE : NON\nMaintenir une approche préventive, surveillance annuelle, alimentation équilibrée.";

            case 'meds_actuels':
                if ($isYes) {
                    return "RÉPONSE : OUI\nConseils : Respect scrupuleux des dosages et horaires. Journal alimentaire + médicaments recommandé. Ne jamais arrêter sans avis médical.";
                }
                return "RÉPONSE : NON\nExcellent moment pour agir par le mode de vie et prévenir la médication future.";

            case 'meds_types':
                if (str_contains($answerLower, 'glycém') || $isDiabetes) {
                    return "RÉPONSE : MÉDICAMENTS GLYCÉMIE\nMetformine: Prendre avec repas. Sulfamides: RISQUE HYPO (jamais sauter repas). Avoir toujours kit anti-hypo (sucre, jus).";
                }
                if (str_contains($answerLower, 'tensio') || $isHypertension) {
                    return "RÉPONSE : MÉDICAMENTS TENSION\nIEC/ARA2: Attention potassium (pas de suppléments). Diurétiques: Augmenter potassium. Régime hyposodé strict.";
                }
                if (str_contains($answerLower, 'orlistat') || str_contains($answerLower, 'liraglutide') || str_contains($answerLower, 'poids')) {
                    return "RÉPONSE : MÉDICAMENTS POIDS\nOrlistat: Max 15g gras/repas (éviter diarrhées). Liraglutide: Manger lentement, 5-6 petits repas si nausées.";
                }
                if (str_contains($answerLower, 'cholestérol') || str_contains($answerLower, 'statine')) {
                    return "RÉPONSE : MÉDICAMENTS CHOLESTÉROL\nÉVITER pamplemousse. Favoriser oméga-3 et fibres solubles. Prendre le soir.";
                }
                return "RÉPONSE : " . $answer . "\nSuivre les précautions spécifiques liées à votre traitement.";

            case 'portions_jour':
                if (str_contains($answer, '1') || str_contains($answer, '2')) {
                    return "RÉPONSE : 1-2 PORTIONS (INSUFFISANT)\nObjectif urgent: 5 portions/jour. Plan progressif: Ajouter 1 fruit au petit-déj, salade midi, légumes cuits soir.";
                }
                if (str_contains($answer, '3') || str_contains($answer, '4')) {
                    return "RÉPONSE : 3-4 PORTIONS (MOYEN)\nObjectif: 5-7 portions. Ajouter des légumes crus en collation et doubler les portions de légumes en sauce.";
                }
                return "RÉPONSE : 5 PORTIONS OU PLUS (EXCELLENT)\nApport optimal. Focus sur la variété et les légumes verts foncés (fer, calcium).";

            case 'grignotage':
                if ($isYes) {
                    return "RÉPONSE : OUI\nSi pulsionnel/émotionnel: Techniques de gestion stress. Remplacer par arachides grillées nature, akara au four, fruits frais.";
                }
                return "RÉPONSE : NON\nIdéal. Maintenir structure 3 repas + 2 collations planifiées saines.";

            case 'boissons':
                if (str_contains($answerLower, 'tous') || str_contains($answerLower, 'jour')) {
                    return "RÉPONSE : TOUS LES JOURS (CRITIQUE)\nSucrées: Pics glycémiques massifs. Alcool: Risque hypo nocturne + HTA aggravée. Sevrage progressif PRIORITAIRE.";
                }
                if (str_contains($answerLower, 'semaine')) {
                    return "RÉPONSE : UNE FOIS PAR SEMAINE\nSucrées: 250ml max au cours d'un repas complet. Alcool: 1-2 verres max, jamais à jeun.";
                }
                return "RÉPONSE : " . $answer . "\nConsommation occasionnelle ou nulle recommandée. Privilégier l'eau et le bissap non sucré.";

            case 'sommeil':
                if (str_contains($answerLower, 'moins') || str_contains($answer, '6')) {
                    return "RÉPONSE : MOINS DE 6H (CRITIQUE)\nImpact majeur: Faim ↑, Satiété ↓, Insulinorésistance ↑. Dîner anti-insomnie: Poisson + patate douce + tisane kinkeliba.";
                }
                if (str_contains($answer, '8') || str_contains($answer, '9')) {
                    return "RÉPONSE : 8-9H (IDÉAL)\nParfait pour la perte de poids et l'équilibre hormonal. Protéger ce temps précieux.";
                }
                return "RÉPONSE : " . $answer . "\nLe sommeil est une composante clé de votre santé métabolique. Visez 7-8h stables.";

            case 'apnee':
                if ($isYes) {
                    return "RÉPONSE : OUI\nHypertension résistante fréquente. Perte de 10% poids = -50% sévérité apnée. Dîner ultra-léger avant 19h, JAMAIS d'alcool le soir.";
                }
                return "RÉPONSE : NON\nPrévenir par le maintien du poids et en dormant sur le côté.";

            case 'regime_recent':
                if ($isYes) {
                    return "RÉPONSE : OUI\nPerte importante (>10kg) ? Risque yoyo maximum. Stabilisation ultra-progressive obligatoire (+50-100 kcal/semaine après perte).";
                }
                return "RÉPONSE : NON\nPremière démarche ? Idéal ! Établir des bases saines et durables sans historique d'échecs.";

            case 'activite_physique_jours':
                if (str_contains($answerLower, 'aucun')) {
                    return "RÉPONSE : AUCUN (SÉDENTAIRE)\nUrgence: Marche 10 min/jour au début pour sortir du risque sédentaire extrême.";
                }
                if (str_contains($answer, '1') || str_contains($answer, '2') || str_contains($answer, '3')) {
                    return "RÉPONSE : 1-3 JOURS\nÉtablir une régularité de 4-5 jours pour des bénéfices métaboliques réels.";
                }
                return "RÉPONSE : 4-7 JOURS\nExcellent. Alterner cardio (marche rapide) et renforcement musculaire (poids du corps).";

            default:
                return "Aucun";
        }
    }

    private function getWeightLossOver10kgCardioAdvice(string $key, string $answer, array $allAnswers): string
    {
        // Based on rec12.txt (identical to rec9.txt structure but for >10kg target)
        // Since rec12 content provided is very similar to rec9, I will reuse the logic with appropriate scale
        $isYes = (stripos($answer, 'oui') !== false);
        $answerLower = mb_strtolower($answer);

        switch ($key) {
            case 'antecedents_diag':
                if ($isYes) {
                    return "RÉPONSE : OUI (Maladies Cardiovasculaires)\nConseils Ciblés (>10kg):\n•	Priorité: Lipides de haute qualité (Poisson gras 3x/semaine, 1 c. à café huile palme rouge).\n•	Augmentation massive des fibres: 350g+ légumes/jour.\n•	Cuissons: UNIQUEMENT vapeur, grillé ou bouilli. ZÉRO friture réutilisée.";
                }
                return "RÉPONSE : NON\nPrévention cardio-vasculaire par alimentation DASH adaptée localement.";

            case 'meds_actuels':
                if ($isYes) {
                    return "RÉPONSE : OUI\nCoordination repas/médicaments cruciale. Statines: Éviter pamplemousse. Anticoagulants: Stabilité des apports en légumes verts.";
                }
                return "RÉPONSE : NON\nLe mode de vie est votre médicament principal à ce stade. Restez vigilant sur l'équilibre.";

            case 'meds_types':
                if (str_contains($answerLower, 'tensio') || str_contains($answerLower, 'hta') || str_contains($answerLower, 'cœur')) {
                    return "RÉPONSE : MÉDICAMENTS TENSION/CARDIO\nRéduction sel strict (<2g sodium). Potassium + (haricots, avocat, papaye). Pas de pamplemousse avec certaines statines.";
                }
                return "RÉPONSE : " . $answer . "\nConsommation régulière à heures fixes recommandée.";

            case 'portions_jour':
                if (str_contains($answer, '1') || str_contains($answer, '2')) {
                    return "RÉPONSE : 1-2 PORTIONS (TRÈS INSUFFISANT)\nObjectif: 6-8 portions/jour pour saturation en antioxydants protecteurs.";
                }
                return "RÉPONSE : " . $answer . "\nBravo, continuez à privilégier la variété des couleurs pour la protection artérielle.";

            case 'boissons':
                return "RÉPONSE : " . $answer . "\nL'alcool et le sucre sont les ennemis de vos artères. Visez 0 sucre ajouté et 0 alcool en phase de perte active.";

            case 'activite_physique_jours':
                return "RÉPONSE : " . $answer . "\nActivité modérée (Marche 45-60min) 5-6 jours par semaine recommandée sous contrôle médical.";

            default:
                return "Aucun";
        }
    }

    private function getObjectifAdvice(string $answer): string
    {
        return "Conseils objectif.";
    }

    private function getWeightLossBetween5and10kgAntecedentsAdvice(string $key, string $answer, array $allAnswers): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = (stripos($answer, 'oui') !== false);
        $isDiabetes = false;
        $isHypertension = false;

        foreach ($allAnswers as $resp) {
            $text = mb_strtolower($resp['text'] ?? '');
            if (str_contains($text, 'diabète'))
                $isDiabetes = true;
            if (str_contains($text, 'hypertension') || str_contains($text, 'hta'))
                $isHypertension = true;
        }

        switch ($key) {
            case 'antecedents_diag':
                if ($isYes) {
                    $advice = "RÉPONSE : OUI\n";
                    if ($isDiabetes)
                        $advice .= "DIABÈTE TYPE 2 : Privilégier IG bas, fractionner les repas, surveiller féculents, fibres +++.\n";
                    if ($isHypertension)
                        $advice .= "HYPERTENSION : Réduction drastique du sel (max 5g/jour), DASH béninois, potassium + (banane, avocat).\n";
                    return $advice . "Suivi médical régulier recommandé.";
                }
                return "RÉPONSE : NON\nMaintenir une approche préventive, surveillance annuelle, alimentation équilibrée.";

            case 'meds_actuels':
                if ($isYes) {
                    return "RÉPONSE : OUI\nConseils : Respect scrupuleux des dosages et horaires. Journal alimentaire + médicaments recommandé. Ne jamais arrêter sans avis médical.";
                }
                return "RÉPONSE : NON\nExcellent moment pour agir par le mode de vie et prévenir la médication future.";

            case 'meds_types':
                if (str_contains($answerLower, 'glycém') || $isDiabetes) {
                    return "RÉPONSE : MÉDICAMENTS GLYCÉMIE\nMetformine: Prendre avec repas. Sulfamides: RISQUE HYPO (jamais sauter repas). Avoir toujours kit anti-hypo (sucre, jus).";
                }
                if (str_contains($answerLower, 'tensio') || $isHypertension) {
                    return "RÉPONSE : MÉDICAMENTS TENSION\nIEC/ARA2: Attention potassium (pas de suppléments). Diurétiques: Augmenter potassium. Régime hyposodé strict.";
                }
                return "RÉPONSE : " . $answer . "\nSuivre les précautions spécifiques liées à votre traitement.";

            case 'portions_jour':
                if (str_contains($answer, '1') || str_contains($answer, '2')) {
                    return "RÉPONSE : 1-2 PORTIONS (INSUFFISANT)\nObjectif urgent: 5 portions/jour. Plan progressif: Ajouter 1 fruit au petit-déj, salade midi, légumes cuits soir.";
                }
                if (str_contains($answer, '3') || str_contains($answer, '4')) {
                    return "RÉPONSE : 3-4 PORTIONS (MOYEN)\nObjectif: 5-7 portions. Ajouter des légumes crus en collation et doubler les portions de légumes en sauce.";
                }
                return "RÉPONSE : 5 PORTIONS OU PLUS (EXCELLENT)\nApport optimal. Focus sur la variété et les légumes verts foncés (fer, calcium).";

            case 'grignotage':
                if ($isYes) {
                    return "RÉPONSE : OUI\nSi pulsionnel/émotionnel: Techniques de gestion stress. Remplacer par arachides grillées nature, akara au four, fruits frais.";
                }
                return "RÉPONSE : NON\nIdéal. Maintenir structure 3 repas + 2 collations planifiées saines.";

            case 'boissons':
                if (str_contains($answerLower, 'tous') || str_contains($answerLower, 'jour')) {
                    return "RÉPONSE : TOUS LES JOURS (CRITIQUE)\nSucrées: Pics glycémiques massifs. Alcool: Risque hypo nocturne + HTA aggravée. Sevrage progressif PRIORITAIRE.";
                }
                if (str_contains($answerLower, 'semaine')) {
                    return "RÉPONSE : UNE FOIS PAR SEMAINE\nSucrées: 250ml max au cours d'un repas complet. Alcool: 1-2 verres max, jamais à jeun.";
                }
                return "RÉPONSE : " . $answer . "\nConsommation occasionnelle ou nulle recommandée. Privilégier l'eau et le bissap non sucré.";

            case 'sommeil':
                if (str_contains($answerLower, 'moins') || str_contains($answer, '6')) {
                    return "RÉPONSE : MOINS DE 6H (CRITIQUE)\nImpact majeur: Faim ↑, Satiété ↓, Insulinorésistance ↑. Dîner anti-insomnie: Poisson + patate douce + tisane kinkeliba.";
                }
                if (str_contains($answer, '8') || str_contains($answer, '9')) {
                    return "RÉPONSE : 8-9H (IDÉAL)\nParfait pour la perte de poids et l'équilibre hormonal. Protéger ce temps précieux.";
                }
                return "RÉPONSE : " . $answer . "\nLe sommeil est une composante clé de votre santé métabolique. Visez 7-8h stables.";

            case 'apnee':
                if ($isYes) {
                    return "RÉPONSE : OUI\nHypertension résistante fréquente. Perte de 10% poids = -50% sévérité apnée. Dîner ultra-léger avant 19h, JAMAIS d'alcool le soir.";
                }
                return "RÉPONSE : NON\nPrévenir par le maintien du poids et en dormant sur le côté.";

            case 'regime_recent':
                if ($isYes) {
                    return "RÉPONSE : OUI\nPerte importante (>10kg) ? Risque yoyo maximum. Stabilisation ultra-progressive obligatoire (+50-100 kcal/semaine après perte).";
                }
                return "RÉPONSE : NON\nPremière démarche ? Idéal ! Établir des bases saines et durables sans historique d'échecs.";

            case 'activite_physique_jours':
                if (str_contains($answerLower, 'aucun')) {
                    return "RÉPONSE : AUCUN (SÉDENTAIRE)\nUrgence: Marche 10 min/jour au début pour sortir du risque sédentaire extrême.";
                }
                if (str_contains($answer, '1') || str_contains($answer, '2') || str_contains($answer, '3')) {
                    return "RÉPONSE : 1-3 JOURS\nÉtablir une régularité de 4-5 jours pour des bénéfices métaboliques réels.";
                }
                return "RÉPONSE : 4-7 JOURS\nExcellent. Alterner cardio (marche rapide) et renforcement musculaire (poids du corps).";

            default:
                return "Aucun";
        }
    }


    private function getWeightLossUnder5kgNoPathologyAdvice(string $key, string $answer, array $allAnswers): string
    {
        $isYes = (stripos($answer, 'oui') !== false);
        $answerLower = mb_strtolower($answer);

        switch ($key) {
            case 'objectif_principal':
                return "RÉPONSE : " . $answer . "\nObjectif: Perte de moins de 5kg. Approche: Ajustements fins et durables. Focus sur la qualité nutritionnelle et la régularité de l'activité physique.";

            case 'boissons_sucrees_frequence':
                if (str_contains($answerLower, 'tous') || str_contains($answerLower, 'jour')) {
                    return "RÉPONSE : TOUS LES JOURS\nPriorité 1: Supprimer les boissons sucrées. Remplacer par de l'eau citronnée ou du bissap sans sucre.";
                }
                return "RÉPONSE : " . $answer . "\nMaintenir une consommation minimale pour optimiser la perte de poids légère.";

            case 'fruits_legumes':
                return "RÉPONSE : " . $answer . "\nPriorité 1: Augmenter les légumes à 5-7 portions par jour pour une satiété optimale sans excès calorique.";

            case 'sommeil':
                return "RÉPONSE : " . $answer . "\nPriorité 2: Améliorer le sommeil (7-9h). Un bon sommeil régule les hormones de la faim.";

            case 'stress_ennui':
                if ($isYes) {
                    return "RÉPONSE : OUI\nPriorité 3: Gérer le stress sans nourriture. Identifier les déclencheurs et utiliser des alternatives (marche, respiration).";
                }
                return "RÉPONSE : NON\nExcellent atout pour une perte de poids sereine.";

            default:
                return "RÉPONSE : " . $answer . "\nSuivre les principes de base du rééquilibrage alimentaire béninois.";
        }
    }

    private function getWeightLoss5to10kgNoPathologyAdvice(string $key, string $answer, array $allAnswers): string
    {
        $isYes = (stripos($answer, 'oui') !== false);
        $answerLower = mb_strtolower($answer);

        switch ($key) {
            case 'objectif_principal':
                return "RÉPONSE : " . $answer . "\nObjectif: Perte de 5-10kg. Approche: Rééquilibrage structurel. Tous les groupes alimentaires sont présents en portions contrôlées.";

            case 'portions_jour':
                return "RÉPONSE : " . $answer . "\nClé du succès: Légumes abondants, protéines à chaque repas, et féculents (igname, riz, pâte) en portions poing fermé.";

            case 'activite_physique_jours':
                return "RÉPONSE : " . $answer . "\nRecommandation: 150-300 min d'activité modérée par semaine (marche rapide, danse) pour soutenir le déficit calorique.";

            case 'finir_assiette':
                if ($isYes) {
                    return "RÉPONSE : OUI\nApprentissage : Écouter la satiété. S'arrêter à 80% plein. Utiliser des assiettes de plus petite taille.";
                }
                return "RÉPONSE : NON\nAtout majeur. Conservez cette connexion à vos signaux internes.";

            default:
                return "RÉPONSE : " . $answer . "\nPlan d'action: Réduction modérée des portions, augmentation de l'activité, et durabilité.";
        }
    }

    private function getWeightLossOver10kgNoPathologyAdvice(string $key, string $answer, array $allAnswers): string
    {
        $isYes = (stripos($answer, 'oui') !== false);
        $answerLower = mb_strtolower($answer);

        switch ($key) {
            case 'objectif_principal':
                return "RÉPONSE : " . $answer . "\nObjectif: Perte de plus de 10kg. Approche: Changement de mode de vie permanent. Perte progressive (0,5-1kg/semaine).";

            case 'regime_recent':
                if ($isYes) {
                    return "RÉPONSE : OUI\nAttention à l'effet yoyo. Cette fois, focus sur la durabilité et non la rapidité. Pas de privation extrême.";
                }
                return "RÉPONSE : NON\nMétabolisme intact, c'est le moment idéal pour démarrer sur des bases solides.";

            case 'portions_jour':
                return "RÉPONSE : " . $answer . "\nStructure: 3 repas équilibrés + 2 collations saines. Priorité aux aliments vrais et locaux (poisson, œufs, légumes béninois).";

            case 'boissons':
                if (str_contains($answerLower, 'tous') || str_contains($answerLower, 'jour')) {
                    return "RÉPONSE : TOUS LES JOURS\nAction critique: Sevrage progressif des boissons sucrées et de l'alcool pour débloquer la perte de poids.";
                }
                return "RÉPONSE : " . $answer . "\nHydratation: 2-3L d'eau par jour. Infusions locales sans sucre autorisées.";

            default:
                return "RÉPONSE : " . $answer . "\nEngagement: Discipline, planning, et patience sont vos meilleurs alliés pour transformer votre silhouette.";
        }
    }

    private function getFitnessNoPathologyAdvice(string $key, string $answer, array $allAnswers): string
    {
        $answerLower = mb_strtolower($answer);
        $isYes = str_contains($answerLower, 'oui');

        switch ($key) {
            case 'meds_lies':
                if ($isYes) {
                    return 'RÉPONSE : OUI
Conseils généraux :
1.	Respecter horaires de prise
2.	Ne jamais interrompre sans avis médical
3.	Surveiller interactions aliment-médicament
4.	Contrôles réguliers
5.	Carnet de suivi
Adaptations alimentaires si sous traitement :
Timing des repas avec médicaments :
•	Médicaments à jeun (ex: Levothyrox) : Prendre 30-60 min avant petit-déjeuner
	Petit-déjeuner retardé : Akassa + œufs + fruits
•	Médicaments pendant repas (ex: Metformine) :
	Prendre au milieu du repas principal
	Repas suggéré : Riz complet + sauce légumes + poisson + salade
•	Médicaments après repas (ex: certains anti-inflammatoires) :
	Attendre 15-30 min après manger
	Repas léger : Bouillie + fruits + arachides
Repas compatibles avec traitements :
Petit-déjeuner sous traitement :
•	Option A : Bouillie de sorgho (200g) + 2 œufs + fruits + 10g arachides (APRÈS prise médicament à jeun si nécessaire)
•	Option B : Akassa (200g) + omelette légumes + poisson grillé + orange
Déjeuner sous traitement :
•	Option A : Riz complet (portions selon activité) + sauce tomate maison + poulet (100g) + légumes (250g) - PRISE MÉDICAMENT AU MILIEU
•	Option B : Pâte de maïs + sauce légumes verts + poisson (100g) + salade
Dîner sous traitement :
•	Option A : Igname bouillie + sauce claire + poisson (100g) + légumes
•	Option B : Attiéké + poisson grillé + salade abondante
Collations compatibles :
•	Fruits frais (pas d\'interaction)
•	Arachides nature (15g)
•	Noix de cajou (12 unités)
•	Légumes crus
⚠️ PRÉCAUTIONS IMPORTANTES :
Si anticoagulants (ex: Warfarine) :
•	Maintenir apport CONSTANT en vitamine K
•	Légumes verts : quantité régulière chaque jour
•	PAS de variations importantes
•	Éviter : pamplemousse, cranberry en excès
Si statines (cholestérol) :
•	INTERDICTION : pamplemousse et jus pamplemousse
•	Augmenter fibres
•	Privilégier oméga-3
Si diurétiques (HTA) :
•	Surveiller potassium (bananes, oranges, avocat)
•	Hydratation suffisante
•	Réduire sel
Si bêta-bloquants :
•	Pas d\'interaction alimentaire majeure
•	Surveiller glycémie si diabétique';
                }
                return 'RÉPONSE : NON (Pas de médicaments)
Conseils alimentaires préventifs :
1.	Prévention par l\'alimentation reste cruciale
2.	Surveiller facteurs de risque
3.	Consultations régulières
4.	Mode de vie sain prioritaire
Repas préventifs :
Petit-déjeuner préventif :
•	Option A : Bouillie de mil (portions selon activité) + 2 œufs + banane plantain bouillie + 15g arachides + 1 orange
•	Option B : Pain complet + omelette légumes + avocat + fruits
Déjeuner préventif :
•	Option A : Riz complet + sauce tomate maison + poulet local (100g) + légumes variés (200g) + huile modérée
•	Option B : Pâte rouge + sauce graine légère + poisson (100g) + épinards et gboma
Dîner préventif :
•	Option A : Télibo + sauce d\'arachide + viande maigre (90g) + légumes
•	Option B : Couscous de maïs + sauce légumes + poisson grillé (100g)
Collations préventives :
•	Fruits de saison variés (mangue, papaye, orange, banane)
•	Arachides grillées non salées (15-20g)
•	Noix de cajou nature (12-15 unités)
•	Wagasi grillé (50g)
•	Légumes crus (carotte, concombre)
Hydratation :
•	Eau : 2-3 litres/jour
•	Infusions : gingembre, citronnelle
•	Bissap maison sans sucre
•	Eau de coco naturelle';

            case 'meds_types':
                return 'Exemples de médicaments courants et adaptations :
METFORMINE (Diabète)
Effets secondaires possibles : Troubles digestifs, nausées, diarrhée
Adaptations alimentaires :
1.	Prendre PENDANT les repas (milieu du repas)
2.	Éviter repas trop gras (aggrave troubles digestifs)
3.	Augmenter fibres progressivement
4.	Fractionner repas
Repas adaptés Metformine :
Petit-déjeuner :
•	Option A : Bouillie de sorgho SANS sucre (180g) + 2 œufs + légumes + 10g arachides
•	Option B : Akassa (150g) + omelette légumes + poisson grillé (60g)
Déjeuner (PRISE METFORMINE AU MILIEU) :
•	Option A : Riz complet (portions modérées) + sauce tomate LÉGÈRE + poulet SANS peau (100g) + légumes vapeur (250g)
•	Option B : Haricots rouges (150g) + riz complet (100g) + sauce légère + poisson (100g)
Dîner :
•	Option A : Igname bouillie (portions contrôlées) + sauce claire + poisson (100g) + légumes
•	Option B : Attiéké (150g) + poisson grillé + salade abondante
Collations (OBLIGATOIRES pour éviter hypoglycémie) :
•	10h : 1 orange + 10g arachides
•	16h : 100g papaye + 10 noix cajou
•	21h (si dîner tôt) : Lait + quelques amandes
À ÉVITER :
•	Repas très gras (ralentit absorption)
•	Alcool (risque hypoglycémie)
•	Sauter des repas
STATINES (Cholestérol - ex: Atorvastatine, Simvastatine)
Effets : Baisse cholestérol, possibles douleurs musculaires
INTERDICTION ABSOLUE : PAMPLEMOUSSE
Adaptations alimentaires :
Petit-déjeuner :
•	Option A : Bouillie d\'avoine (220g) + 2 blancs d\'œufs + 1 jaune + graines de lin + banane + noix
•	Option B : Pain complet + avocat + tomate + œufs + ORANGE (PAS pamplemousse)
Déjeuner :
•	Option A : Riz complet + haricots rouges (150g - fibres solubles) + poisson gras (100g) + légumes + huile d\'olive
•	Option B : Pâte complète + sauce légumes verts + poisson frais + huile de colza
Dîner :
•	Option A : Igname + sauce légumes + poisson blanc + salade huile d\'olive
•	Option B : Attiéké + sardine grillée + salade mixte
Aliments ANTI-CHOLESTÉROL :
•	Avoine (bêta-glucanes)
•	Haricots rouges (fibres solubles)
•	Poissons gras (oméga-3) : maquereau, sardine
•	Noix et amandes
•	Avocat (graisses mono-insaturées)
•	Légumes verts (fibres)
•	Huile d\'olive
INTERDICTIONS :
•	Pamplemousse et jus pamplemousse (interaction médicamenteuse DANGEREUSE)
•	Huile de palme rouge (limiter au maximum)
•	Viandes grasses
•	Abats (foie, rognons)
•	Jaunes d\'œufs en excès (max 3/semaine)
•	Fritures
ANTIHYPERTENSEURS (IEC, ARA2, Bêta-bloquants, Diurétiques)
Diurétiques (ex: Furosémide, Hydrochlorothiazide) :
Attention : Perte de potassium
Alimentation riche en potassium :
Petit-déjeuner :
•	Option A : Bouillie + 2 œufs + BANANE (riche potassium) + lait + 10g arachides
•	Option B : Akassa + omelette + AVOCAT (riche potassium) + orange
Déjeuner :
•	Option A : Riz complet + sauce tomate MAISON (zéro sel) + poulet + épinards et gboma (potassium, magnésium) + haricots verts
•	Option B : Haricots rouges (potassium) + riz + sauce légère + poisson
Dîner :
•	Option A : Igname bouillie + sauce légumes + poisson + salade
•	Option B : Attiéké + poisson + salade tomate/concombre/oignon
Collations RICHES en potassium :
•	2 bananes douces (EXCELLENT)
•	Avocat
•	Oranges (2)
•	Papaye (200g)
•	Noix de cajou non salées
•	Arachides non salées
ALIMENTS RICHES EN POTASSIUM :
•	Bananes (411mg/100g)
•	Avocat (485mg/100g)
•	Épinards et gboma (558mg/100g)
•	Haricots rouges (405mg/100g)
•	Papaye (182mg/100g)
•	Oranges (181mg/100g)
ATTENTION : Sel ZÉRO (voir adaptations HTA ci-dessus)
IEC/ARA2 (ex: Ramipril, Losartan) :
Attention : Potassium peut augmenter
Ne PAS supplémenter en potassium sans avis médical
SEL : ZÉRO ajouté
Bêta-bloquants (ex: Propranolol, Aténolol) :
Pas d\'interaction alimentaire majeure
INSULINE
RÈGLE ABSOLUE : MANGER après injection rapide (15-30 min)
ORLISTAT (Perte de poids - Xenical)
Mécanisme : Bloque absorption 30% graisses
RÈGLE : Maximum 15g lipides par repas
SUPPLÉMENTATION OBLIGATOIRE :
•	Vitamines A, D, E, K (liposolubles) - prescription médicale
•	Prendre 2h après Orlistat
⚠️ Si selles grasses persistantes : RÉDUIRE encore les lipides';

            case 'journee_typique':
                return 'Instructions d\'analyse :
L\'analyse de la journée typique permet d\'identifier :
1.	Erreurs alimentaires récurrentes
2.	Déséquilibres nutritionnels
3.	Moments de faim/fringales
4.	Portions inadaptées
5.	Manques ou excès
Nous vous remercions pour nous avoir divulgué votre journée typique car cela va nous permettre de vous orienter dans nos conseils enfin de cerner vos réalités quotidiennes en matière de nutrition.';

            case 'fruits_legumes':
                if (str_contains($answer, '1-2')) {
                    return 'CHOIX : 1-2 portions
ANALYSE : INSUFFISANT (OMS recommande 5 minimum)
RISQUES :
•	Carences vitamines/minéraux
•	Fibres insuffisantes (constipation, satiété faible)
•	Antioxydants manquants
•	Risque maladies chroniques augmenté
PLAN D\'AUGMENTATION PROGRESSIVE :
OBJECTIF : Atteindre 5-7 portions/jour
1 portion = 80-100g de fruits OU légumes
SEMAINE 1-2 : Passer à 3-4 portions
Comment intégrer :
Petit-déjeuner (AJOUTER 1 portion fruits) :
•	Bouillie + œufs + 1 orange + arachides
•	Akassa + omelette + 1 banane + poisson
Déjeuner (AJOUTER 1-2 portions légumes) :
•	Riz + sauce + poulet + légumes AUGMENTÉS à 200g (haricots verts + carottes)
•	Pâte + sauce + épinards et gboma 200g + poisson
Dîner (AJOUTER 1 portion légumes OU fruits) :
•	Igname + sauce + poisson + salade 150g
•	Attiéké + poisson + salade mixte 200g
Collation (AJOUTER 1 portion fruits) :
•	16h : 150g papaye + noix cajou
TOTAL SEMAINE 1-2 : 3-4 portions ✓
SEMAINE 3-4 : Passer à 5-6 portions
Petit-déjeuner (2 portions) :
•	Bouillie + œufs + 1 orange + légumes dans omelette (tomates, oignons - 100g) + arachides
Déjeuner (2-3 portions) :
•	Riz + sauce + poulet + légumes 250g (haricots verts, carottes, choux)
Dîner (1-2 portions) :
•	Igname + sauce + poisson + salade abondante 200-250g
Collations (2 portions) :
•	10h : 1 mangue
•	16h : 150g papaye
TOTAL SEMAINE 3-4 : 5-7 portions ✓✓
ASTUCES POUR AUGMENTER FACILEMENT :
1.	Légumes dans TOUS les plats :
	Omelette : tomates, oignons, épinards
	Sauce : DOUBLER les légumes (épinards, gboma, gombo, tomates, oignons, carottes)
	Salades : accompagner CHAQUE dîner
2.	Fruits en collations SYSTÉMATIQUES :
	Matin : 1 fruit
	Après-midi : 1 fruit
3.	Légumes crus à grignoter :
	Bâtonnets carotte, concombre
	Tomates cerises si disponibles
4.	Bissap, gingembre : compter comme 1/2 portion légumes
VARIÉTÉ FRUITS BÉNINOIS :
•	Mangue
•	Papaye
•	Orange
•	Banane
•	Ananas
•	Pamplemousse (SAUF si statines)
•	Avocat
•	Pastèque
•	Goyave
VARIÉTÉ LÉGUMES BÉNINOIS :
•	Épinards, gboma
•	Gombo
•	Tomates
•	Oignons, échalotes
•	Carottes
•	Haricots verts
•	Choux
•	Concombre
•	Aubergines
•	Poivrons';
                }
                if (str_contains($answer, '3-4')) {
                    return 'CHOIX : 3-4 portions
ANALYSE : MOYEN (proche de l\'objectif)
PLAN : Passer à 5-7 portions
AJUSTEMENTS SIMPLES :
1.	AJOUTER 1 fruit au petit-déjeuner :
	Si absent : ajouter orange, banane, ou mangue
2.	AUGMENTER portions légumes déjeuner/dîner :
	Passer de 150g à 200-250g légumes
3.	AJOUTER 1 collation fruit :
	10h ou 16h : 1 fruit frais
EXEMPLE JOURNÉE 5-6 portions :
Petit-déjeuner :
•	Bouillie + œufs + 1 orange (1)
Déjeuner :
•	Riz + sauce + poulet + haricots verts 150g (2) + carottes 100g (3)
Dîner :
•	Igname + sauce + poisson + salade mixte 200g (4-5)
Collations :
•	16h : 150g papaye (6)
TOTAL : 6 portions ✓✓';
                }
                return 'CHOIX : 5 ou plus
ANALYSE : EXCELLENT ✓✓✓
CONSEILS MAINTIEN ET OPTIMISATION :
1.	VARIER les couleurs :
	Rouge : tomates, pastèque
	Orange : carottes, mangue, papaye
	Vert : épinards, gboma, gombo, avocat
	Blanc : oignon, chou
	Violet : aubergine
2.	PRIVILÉGIER fruits/légumes de saison (moins chers, plus frais)
3.	ALTERNER cru et cuit :
	Cru : salades, fruits frais (vitamines préservées)
	Cuit : légumes vapeur, en sauce (meilleure digestibilité)
4.	CONSERVER cette excellente habitude ✓
EXEMPLE JOURNÉE OPTIMALE 7-8 portions :
Petit-déjeuner :
•	Bouillie + œufs + légumes omelette (tomates, oignons - 100g) (1) + 1 orange (2)
Déjeuner :
•	Riz + sauce + poulet + épinards 150g (3) + tomates 100g (4) + carottes 100g (5)
Dîner :
•	Igname + sauce + poisson + salade (concombre 100g (6) + tomate 100g) (7)
Collations :
•	10h : 1 mangue (8)
•	16h : 150g papaye (9)
TOTAL : 8-9 portions ✓✓✓ EXCELLENT';

            case 'grignotage':
                if ($isYes) {
                    return 'RÉPONSE : OUI
ANALYSE : Dépend de QUOI et QUAND
Grignotage peut être :
•	✅ BON si collations saines et planifiées (fruits, noix)
•	❌ MAUVAIS si grignotages non contrôlés (beignets, bonbons, gâteaux)
ÉVALUATION NÉCESSAIRE : Voir question suivante (Si oui, quels aliments ?)';
                }
                return 'RÉPONSE : NON
ANALYSE : Dépend de la structure des repas
SI repas principaux équilibrés et suffisants : ✓ Pas de grignotage = BIEN
SI repas insuffisants ou trop espacés : ❌ Pas de grignotage = RISQUE hypoglycémie, fringales, compulsions
RECOMMANDATION :
AJOUTER 2 collations planifiées si :
•	Vous avez faim entre repas
•	Fatigue, baisse d\'énergie 10h ou 16h
•	Repas espacés >5h
•	Activité physique régulière
•	Diabète ou insuline
Collations saines béninoises :
•	10h : 1 fruit frais + 10-15g arachides non salées
•	16h : 150g papaye + 10-12 noix de cajou
BÉNÉFICES collations planifiées :
•	Évite fringales intenses
•	Stabilise glycémie
•	Prévient compulsions
•	Maintient métabolisme actif
•	Facilite contrôle portions aux repas principaux';

            case 'aliments_grignotes':
                return 'Analyse selon réponse :
EXEMPLE 1 : Grignotages néfastes (Beignets, bonbons, sodas)
ANALYSE : ❌ Fritures ❌ Sucres rapides ❌ Sel excessif ❌ Calories vides ❌ Graisses trans
IMPACT :
•	Pics glycémiques → stockage graisse
•	Apport calorique excessif
•	Pas de satiété durable
•	Addiction sucre/sel
•	Inflammation
PLAN DE REMPLACEMENT PROGRESSIF :
SEMAINE 1-2 : Remplacer 50% des grignotages
•	Beignets → Banane plantain bouillie (100g)
•	Bonbons → 1 mangue ou 150g papaye
•	Sodas → Bissap maison SANS sucre ou eau
•	Biscuits → 15g arachides NON salées
SEMAINE 3-4 : Remplacer 100% des grignotages
NOUVELLES collations UNIQUEMENT :
•	10h : 1 fruit frais (mangue, orange, banane) + 15g arachides NON salées
•	16h : 150g papaye + 12 noix de cajou nature
•	Si vraiment envie sucré : 1-2 dattes + amandes
ÉLIMINER DÉFINITIVEMENT :
•	Beignets
•	Sodas
•	Bonbons
•	Chips
•	Biscuits industriels
•	Gâteaux (sauf occasions spéciales 1x/mois)
EXEMPLE 2 : Grignotages moyens (Fruits, arachides salées)
ANALYSE : ✅ Fruits (excellent) ⚠️ Arachides salées (bien mais sel excessif) ❌ Jus industriels (sucres ajoutés)
CORRECTIONS :
•	Arachides salées → Arachides NON salées
•	Portions contrôlées : 15g pesés (pas poignée)
•	Jus industriels → Fruits frais entiers (fibres préservées, pas de sucres ajoutés)
COLLATIONS OPTIMISÉES :
•	10h : 1 orange + 15g arachides NON salées
•	16h : 150g papaye + 12 noix de cajou nature
EXEMPLE 3 : Grignotages excellents ✅✅✅
Réponse : "Fruits frais, arachides non salées, noix de cajou, légumes crus"
ANALYSE : ✅✅✅ EXCELLENT
CONSEILS MAINTIEN :
1.	CONSERVER ces excellentes habitudes
2.	VARIER les fruits (mangue, papaye, orange, banane, ananas, goyave, pastèque)
3.	VARIER les oléagineux : Arachides non salées, Noix de cajou, Amandes
4.	PORTIONS CONTRÔLÉES oléagineux : 15-20g/jour maximum (calories denses)
5.	LÉGUMES CRUS à volonté : Carotte, concombre, tomate, chou
CONTINUER AINSI ✓✓✓';

            case 'boissons_sucrees_frequence':
                if (str_contains($answerLower, 'tous les jours')) {
                    return 'CHOIX : Tous les jours
ANALYSE : TRÈS PROBLÉMATIQUE
BOISSONS SUCRÉES quotidiennes :
IMPACT négatif :
•	330ml Coca = 35g sucre = 7 morceaux sucre
•	Pics glycémiques quotidiens
•	Stockage graisse abdominale
•	Risque diabète type 2 ++
•	Calories vides (zéro nutriment)
•	Addiction au sucre
•	Caries dentaires
PLAN SEVRAGE PROGRESSIF (Boissons sucrées) :
SEMAINE 1-2 : Réduction 50%
•	Si 3 sodas/jour → Passer à 1,5 (arrondir à 2)
•	Remplacer par : bissap SANS sucre, eau, infusions
SEMAINE 3-4 : Réduction 75%
•	Passer à 1 soda/jour maximum
•	Remplacer par : eau aromatisée (citron, menthe), bissap
SEMAINE 5-6 : Élimination
•	ZÉRO soda (sauf occasions spéciales 1x/mois)
•	Boissons UNIQUEMENT :
	Eau plate (2-3L/jour)
	Bissap maison SANS sucre
	Infusion gingembre/citronnelle
	Eau de coco naturelle (SANS sucre ajouté)
	Eau aromatisée maison
ASTUCES SEVRAGE :
•	Bissap très concentré (goût fort remplace soda)
•	Eau très fraîche avec citron/menthe
•	Boire grand verre d\'eau avant chaque envie soda
•	Éliminer accès : ne plus acheter
BOISSONS DE REMPLACEMENT BÉNINOISES :
Bissap (Hibiscus) maison SANS sucre :
•	Infuser feuilles bissap
•	Refroidir
•	Ajouter gingembre, menthe (facultatif)
•	ZÉRO sucre (s\'habituer goût naturel)
Infusion gingembre/citronnelle :
•	Gingembre frais râpé + citronnelle
•	Eau bouillante
•	Infuser 10 min
•	Boire chaud ou froid
Eau de coco naturelle :
•	Directement de la noix (SANS sucre ajouté)
•	Riche en électrolytes
•	Rafraîchissant';
                }
                if (str_contains($answerLower, 'une fois par semaine')) {
                    return 'CHOIX : Une fois par semaine
ANALYSE : MOYEN
BOISSONS SUCRÉES 1x/semaine : ⚠️ Acceptable mais non optimal
RECOMMANDATION : Réduire à occasions spéciales (1-2x/mois)
STRATÉGIE :
•	Choisir jour spécifique (ex: dimanche)
•	Limiter à 1 verre (330ml max)
•	Privilégier version "light" si absolument nécessaire (bien que non idéal)
•	REMPLACER par bissap maison reste de la semaine
ALCOOL 1x/semaine : ✓ Acceptable si modération
RECOMMANDATION :
•	Limiter à 1-2 verres maximum
•	Privilégier vin rouge (si disponible, antioxydants)
•	Bière locale : 1 petite bouteille max
•	Alcools forts : éviter
•	TOUJOURS accompagner de nourriture (jamais à jeun)
•	Boire eau entre chaque verre alcool
CALORIES ALCOOL (exemples) :
•	Bière 330ml : ~150 kcal
•	Vin rouge 150ml : ~125 kcal
•	Alcool fort (rhum, whisky) 40ml : ~100 kcal
Ne pas oublier ces calories dans bilan journalier';
                }
                if (str_contains($answerLower, 'occasionnellement')) {
                    return 'CHOIX : Occasionnellement
ANALYSE : BON ✓
"Occasionnellement" = 2-4x/mois maximum
CONSEILS MAINTIEN :
Pour boissons sucrées :
•	Conserver cette fréquence basse
•	Occasions spéciales uniquement (fêtes, sorties)
•	Reste du temps : eau, bissap sans sucre, infusions
Pour alcool :
•	Conserver modération
•	1-2 verres maximum par occasion
•	Éviter excès même lors occasions
•	Hydratation augmentée si consommation
CONTINUER AINSI ✓';
                }
                return 'CHOIX : Jamais
ANALYSE : EXCELLENT ✓✓✓
FÉLICITATIONS : Habitude optimale pour santé et perte poids
CONSEILS :
•	MAINTENIR cette excellente habitude
•	Hydratation optimale :
	Eau : 2-3L/jour
	Bissap maison sans sucre
	Infusions (gingembre, citronnelle)
	Eau de coco naturelle
BÉNÉFICES que vous expérimentez déjà :
•	Glycémie stable
•	Pas de calories vides
•	Hydratation optimale
•	Dents saines
•	Économies financières
•	Foie sain
CONTINUER AINSI ✓✓✓';

            case 'sommeil':
                if (str_contains($answerLower, 'moins de 6h')) {
                    return 'CHOIX : Moins de 6h
ANALYSE : TRÈS PROBLÉMATIQUE pour perte de poids
IMPACT manque de sommeil sur poids :
1.	Hormones perturbées :
	Ghréline ↑ (hormone faim) → Appétit augmenté
	Leptine ↓ (hormone satiété) → Satiété diminuée
	Cortisol ↑ (hormone stress) → Stockage graisse abdominale
	Insuline ↑ → Résistance insuline, diabète
2.	Métabolisme ralenti :
	Dépense énergétique repos ↓
	Perte muscle ↑ (au lieu de graisse)
3.	Comportements alimentaires :
	Fringales sucrées/grasses ↑
	Compulsions alimentaires ↑
	Motivation activité physique ↓
4.	Santé générale :
	Immunité ↓
	Concentration ↓
	Risque HTA, diabète, cardiovasculaire ↑
PLAN AMÉLIORATION SOMMEIL :
OBJECTIF : Atteindre 7-9h/nuit
1. HYGIÈNE DE SOMMEIL :
Heure de coucher RÉGULIÈRE :
•	Même heure chaque soir (même weekend)
•	Ex: 22h → réveil 6h = 8h sommeil
Routine pré-sommeil (1h avant coucher) :
•	21h : Arrêt écrans (téléphone, TV)
•	21h15 : Tisane relaxante (citronnelle, verveine)
•	21h30 : Douche/bain tiède
•	21h45 : Lecture légère, méditation, prière
•	22h : Coucher
Chambre optimale :
•	Température fraîche
•	Obscurité totale (rideaux opaques)
•	Silence (bouchons oreilles si nécessaire)
•	Literie confortable
À ÉVITER avant coucher :
•	Caféine après 15h (café, thé, cola)
•	Repas lourd/gras le soir
•	Alcool (perturbe sommeil)
•	Écrans 1h avant (lumière bleue ↓ mélatonine)
•	Activité physique intense <3h avant
•	Siestes >20 min après 15h
2. ALIMENTATION FAVORISANT SOMMEIL :
Dîner (18h-19h, 3h avant coucher) :
•	Glucides complexes : igname, riz complet (favorisent sérotonine)
•	Protéines maigres : poisson, poulet
•	Légumes : calme digestif
•	ÉVITER : fritures, graisses lourdes, épices fortes
Exemples dîners "sommeil" :
•	Option A : Igname bouillie (150g) + sauce légère + poisson grillé (100g) + légumes (200g)
•	Option B : Riz complet (180g) + sauce tomate douce + poulet (100g) + salade
Tisane pré-sommeil (21h) :
•	Citronnelle (relaxante)
•	Verveine (si disponible)
•	SANS sucre, SANS caféine
Collation légère si faim (20h30 max) :
•	1 banane (tryptophane → sérotonine → mélatonine)
•	150ml lait tiède (si toléré, tryptophane)
•	5-6 amandes';
                }
                if (str_contains($answerLower, '6h-7h')) {
                    return 'CHOIX : 6h-7h
ANALYSE : LIMITE INFÉRIEURE acceptable
6h : Insuffisant pour beaucoup (viser 7-8h) 7h : Acceptable minimum
RECOMMANDATION : Viser 7-8h
Plan simple :
•	Si coucher 23h → Avancer à 22h30 = +30 min
•	Si coucher 22h → Maintenir
•	Qualité sommeil aussi importante que quantité
Hygiène sommeil :
•	Routine pré-sommeil
•	Chambre optimale
•	Éviter écrans 1h avant
Alimentation : Suivre plans de base
Dîner favorisant sommeil :
•	18h-19h
•	Glucides complexes + protéines maigres
•	Éviter lourdeur';
                }
                if (str_contains($answerLower, '8h-9h')) {
                    return 'CHOIX : 8h-9h
ANALYSE : OPTIMAL ✓✓✓
8h : Idéal pour la plupart 9h : Bien si besoin individuel
FÉLICITATIONS : Sommeil adéquat
CONSEILS MAINTIEN :
•	Conserver régularité
•	Qualité compte : sommeil profond, réparateur
•	Si fatigue malgré 8-9h → Consulter (apnée ? qualité ?)
Alimentation : Suivre plans de base selon niveau activité
CONTINUER AINSI ✓';
                }
                return 'CHOIX : Plus de 9h
ANALYSE : ATTENTION
Sommeil >9h peut indiquer :
•	Besoin physiologique accru (rare)
•	Mauvaise qualité sommeil (apnée, réveil fréquent)
•	Dépression
•	Hypothyroïdie
•	Autres problèmes santé
RECOMMANDATION : Évaluation médicale
Questions à poser :
•	Fatigue malgré >9h sommeil ?
•	Ronflements ? Réveils nocturnes ?
•	Humeur basse, tristesse ?
•	Prise de poids inexpliquée ?
Si réponse OUI → Consultation médicale
Alimentation :
•	Suivre plans de base
•	Privilégier aliments stimulant énergie :
	Protéines petit-déjeuner
	Fer : viandes maigres, épinards, gboma
	Vitamine C : oranges, papaye (absorption fer)
	Complexes B : céréales complètes';

            case 'apnee':
                if ($isYes) {
                    return 'RÉPONSE : OUI
ANALYSE : TRÈS IMPORTANT pour obésité
Apnée du sommeil et obésité : Cercle vicieux
•	Obésité → Apnée (graisse cou comprime voies aériennes)
•	Apnée → Fatigue → ↓ Activité physique → ↑ Poids
•	Apnée → Perturbation hormones → ↑ Appétit, ↑ Stockage graisse
IMPACTS apnée du sommeil :
•	Sommeil non réparateur (fatigue diurne)
•	Hypoxie nocturne (↓ oxygène)
•	Hypertension artérielle ↑
•	Risque cardiovasculaire ↑↑
•	Diabète type 2 ↑
•	Résistance perte de poids
TRAITEMENTS MÉDICAUX (ESSENTIELS) :
1. PPC (Pression Positive Continue) - CPAP :
•	Masque nocturne insufflant air
•	UTILISER CHAQUE NUIT (observance cruciale)
•	Amélioration immédiate qualité sommeil
2. Orthèse d\'avancée mandibulaire :
•	Appareil dentaire maintenant mâchoire avancée
•	Alternative si PPC non toléré
3. Consultation ORL/Pneumologue :
•	Suivi régulier obligatoire
ALIMENTATION SPÉCIFIQUE APNÉE DU SOMMEIL :
PERTE DE POIDS = Traitement #1
•	Perte 10% poids corporel → Réduction 50% sévérité apnée
•	Objectif : 0,5-1 kg/semaine
DÎNER OPTIMAL (éviter aggravation apnée) :
Timing : 18h-19h (3-4h avant coucher)
Composition :
•	Léger, digeste
•	PAS lourd, PAS gras
•	Petites portions
Exemples dîners apnée :
•	Option A : Igname bouillie (120-150g) + sauce TRÈS légère + poisson grillé maigre (100g) + légumes vapeur (200g)
•	Option B : Attiéké (150g) + poisson blanc grillé (100g) + salade légère (citron, PAS vinaigrette grasse)
À ÉVITER ABSOLUMENT le soir :
•	Alcool (relaxe muscles gorge, aggrave apnée)
•	Repas lourds/gras (reflux, aggrave apnée)
•	Repas copieux tard (>20h)
•	Sauces grasses (huile palme, sauce graine)
POSITION SOMMEIL :
•	Dormir sur le CÔTÉ (jamais sur le dos)
•	Sur le dos aggrave apnée (langue bloque voies)
•	Utiliser oreiller maintien latéral
RÉDUCTION INFLAMMATION voies aériennes :
Aliments anti-inflammatoires :
•	Poissons gras (oméga-3) : maquereau, sardine - 3x/semaine
•	Épices : gingembre, curcuma
•	Légumes verts : épinards, gboma
•	Huile d\'olive (remplacer huile palme)
BÉNÉFICES perte poids sur apnée :
•	-5 kg → Amélioration légère
•	-10 kg → Amélioration significative
•	-15-20 kg → Possible guérison apnée légère/modérée';
                }
                return 'RÉPONSE : NON
ANALYSE : Bon, mais rester vigilant
Obésité = facteur de risque apnée
SIGNES À SURVEILLER (apnée non diagnostiquée) :
•	Ronflements forts
•	Pauses respiratoires nocturnes (témoins)
•	Réveils avec sensation étouffement
•	Fatigue diurne excessive
•	Maux de tête matinaux
•	Somnolence journée
•	Difficulté concentration
Si 2+ signes → Consultation médicale (polysomnographie)
PRÉVENTION apnée du sommeil :
•	Perte de poids
•	Éviter alcool le soir
•	Dormir sur le côté
•	Dîner léger et tôt
Alimentation : Suivre plans de base selon niveau activité';

            case 'regime_recent':
                if ($isYes) {
                    return 'RÉPONSE : OUI
ANALYSE : Important comprendre historique
Voir question suivante : "Combien de poids avez-vous perdu ?"
Évaluer le Régime Précédent :
•	Était-il trop restrictif ? (<1200 cal/jour)
•	Perte trop rapide ? (>1kg/semaine)
•	Privations extrêmes ?
•	Difficile à maintenir ?
Si Régime Crash Précédent :
Conséquences :
•	Métabolisme ralenti de 10-20%
•	Perte musculaire
•	Effet rebond (reprise poids + supplément)
•	Yo-yo métabolique
Nouvelle Approche (Vs Ancien Régime) :
❌ Ancien Régime :
•	Privation extrême
•	Temporaire
•	"Interdit" / "Permis"
•	Motivation externe
•	Abandon → reprise poids
✅ Nouvelle Approche :
•	Équilibre
•	Permanent (nouveau style de vie)
•	Flexibilité 90-10 (90% sain, 10% plaisir)
•	Motivation interne (santé, bien-être)
•	Durable → maintien poids';
                }
                return 'RÉPONSE : NON
ANALYSE : Première démarche OU arrêt régimes
Si première démarche : ✓ Bonne opportunité démarrer sainement ✓ Pas d\'échecs antérieurs démotivants ✓ Métabolisme non ralenti par yo-yo répétés
APPROCHE RECOMMANDÉE :
•	Rééquilibrage alimentaire DURABLE (pas régime restrictif temporaire)
•	Perte 0,5-1 kg/semaine (sain, soutenable)
•	Changements progressifs (habitudes long terme)
•	Pas de privations extrêmes (évite abandon)
Alimentation : Suivre plans de base selon niveau activité
OBJECTIF : Perdre progressivement et MAINTENIR
Si arrêt régimes après échecs multiples : ⚠️ Attention effet yo-yo
NOUVELLE APPROCHE NÉCESSAIRE :
Oublier "régimes" :
•	PAS de restriction extrême
•	PAS de privation
•	PAS de durée limitée
Adopter "mode de vie" :
•	Rééquilibrage PERMANENT
•	Changements PROGRESSIFS
•	Plaisir PRÉSERVÉ
•	Soutenabilité LONG TERME';

            case 'regime_poids_perdu':
                if (str_contains($answerLower, 'moins de 5')) {
                    return 'CHOIX : Moins de 5 kg
ANALYSE :
Si récemment (1-3 mois) : ✓ Rythme sain (0,5-1 kg/semaine) ✓ Perte durable probable ✓ Continuer approche actuelle
Si anciennement (>6 mois) puis stagnation : ⚠️ Plateau commun ⚠️ Métabolisme adapté
STRATÉGIES RELANCE :
1. RÉÉVALUER niveau activité :
•	Poids ↓ → Dépense énergétique ↓
•	Besoin AUGMENTER activité physique ou RÉDUIRE légèrement calories
2. VARIER alimentation :
•	Changer distribution macronutriments
3. REVOIR portions :
•	Peser aliments 1 semaine (dérive portions fréquente)
•	Réajuster selon nouveaux besoins
4. AUGMENTER activité :
•	Ajouter 10-15 min marche/jour
•	Passer niveau activité supérieur
5. PATIENCE :
•	Plateaux normaux (corps s\'adapte)
•	Continuer efforts, perte reprendra
Alimentation : Suivre plans base, surveiller portions';
                }
                if (str_contains($answerLower, '5-10')) {
                    return 'CHOIX : 5-10 kg
ANALYSE : EXCELLENTE PERTE
Si récent (2-5 mois) : ✓✓✓ Rythme idéal ✓ Durable ✓ Santé préservée
FÉLICITATIONS
MAINTIEN :
•	Continuer approche actuelle
•	Ne PAS relâcher efforts
•	Stabilisation paliers (maintenir 1-2 mois avant continuer perte)
Alimentation : Suivre plans selon nouveau poids et activité
VIGILANCE :
•	Surveiller reprise poids
•	Peser 1x/semaine
•	Ajuster si +1 kg';
                }
                if (str_contains($answerLower, 'plus de 10')) {
                    return 'CHOIX : Plus de 10 kg
ANALYSE : Perte IMPORTANTE
Si récent (3-6+ mois) ET méthode saine : ✓✓✓ EXCELLENT résultat ✓ Bénéfices santé majeurs :
•	Tension artérielle ↓
•	Glycémie ↓
•	Cholestérol ↓
•	Apnée sommeil ↓
•	Mobilité ↑
•	Énergie ↑
FÉLICITATIONS CHALEUREUSES
MAINTIEN CRUCIAL :
•	10+ kg perdus = Risque reprise élevé (statistiquement)
•	Vigilance PERMANENTE
•	Habitudes DÉFINITIVES (pas temporaires)
•	Suivi régulier
Alimentation :
•	Continuer plans selon nouveau poids
•	JAMAIS retour habitudes antérieures
•	Stabilisation paliers
•	Ajustements selon nouveau métabolisme
MESSAGE D\'ESPOIR : "Les échecs passés ne définissent PAS votre futur. Avec approche saine, patience et accompagnement, succès durable est possible. Chaque jour est nouveau départ."';
                }
                return 'Suivre les plans selon votre nouveau poids et niveau d\'activité.';

            case 'sedentarite':
                if (str_contains($answerLower, 'aucun')) {
                    return 'CHOIX : Aucun (Sédentaire)
ANALYSE : URGENT - Activité physique ESSENTIELLE
Sédentarité + Obésité = Risques santé ↑↑↑
•	Maladies cardiovasculaires
•	Diabète type 2
•	Hypertension
•	Ostéoporose
•	Dépression
•	Mortalité prématurée
PLAN DÉMARRAGE PROGRESSIF (CRUCIAL) :
⚠️ AVANT DE COMMENCER :
•	Consultation médicale OBLIGATOIRE (obésité + sédentarité = risque)
•	Test effort cardiaque si >40 ans ou antécédents cardio
•	Autorisation médicale
SEMAINE 1-2 : INITIATION
Activité : MARCHE douce
•	Fréquence : 5-7 jours/semaine
•	Durée : 10-15 minutes/jour
•	Intensité : Douce (pouvoir parler facilement)
•	Moment : Matin (7h-8h idéal, pas trop chaud)
SEMAINE 3-4 : PROGRESSION
Activité : MARCHE modérée
•	Fréquence : 5-7 jours/semaine
•	Durée : 20-25 minutes/jour
•	Intensité : Modérée (léger essoufflement, conversation possible)
SEMAINE 5-8 : CONSOLIDATION
Activité : MARCHE modérée
•	Fréquence : 5-7 jours/semaine
•	Durée : 30 minutes/jour
OBJECTIF FINAL (3-6 mois) :
OMS recommande :
•	150-300 minutes/semaine activité modérée
	Ex: 30 min × 5-7 jours
• Renforcement musculaire 2 jours/semaine :
•	Pompes murales
•	Squats assistés (chaise)
•	Exercices bandes élastiques
PROGRESSION = CLÉ SUCCÈS Lenteur > Rapidité (évite abandon, blessure)';
                }
                if (str_contains($answerLower, '1-3 jours')) {
                    return 'CHOIX : 1-3 jours/semaine (Légèrement actif)
ANALYSE : BON DÉPART, mais insuffisant optimal
OMS recommande : minimum 150 min/semaine = ~5 jours × 30 min
Bénéfices actuels : ✓ Meilleur que sédentarité ✓ Début habitude ✓ Santé améliorée vs aucune activité
Limites : ⚠️ Insuffisant pour perte poids optimale ⚠️ Bénéfices santé sous-optimaux
PLAN AUGMENTATION FRÉQUENCE :
OBJECTIF : Passer à 5-7 jours/semaine
STRATÉGIE PROGRESSIVE :
MOIS 1 : Ajouter 1 jour
•	Si actuellement 2 jours → Passer à 3 jours
MOIS 2 : Ajouter 1 jour supplémentaire
•	3 jours → 4 jours
MOIS 3 : Atteindre 5 jours
•	4 jours → 5 jours
MOIS 4+ : Idéalement quotidien (5-7 jours)
ASTUCES INTÉGRATION QUOTIDIEN :
Activités "cachées" (comptent aussi) :
•	Marcher trajets courts (éviter taxi/zem)
•	Descendre zem 500m avant destination
•	Escaliers (éviter ascenseur si disponible)
•	Ménage actif (passer serpillière, laver voiture)
•	Jardinage
•	Jouer avec enfants
•	Danser sur musique chez soi
Objectif pas quotidien :
•	7000-10000 pas/jour';
                }
                if (str_contains($answerLower, '4-6 jours')) {
                    return 'CHOIX : 4-6 jours/semaine (Modérément actif)
ANALYSE : EXCELLENT ✓✓✓
Fréquence OPTIMALE pour santé et perte poids
Bénéfices : ✓✓✓ Dépense calorique significative ✓✓✓ Métabolisme stimulé ✓✓✓ Muscle préservé/construit ✓✓✓ Santé cardiovasculaire
FÉLICITATIONS - MAINTENIR
OPTIMISATION (si souhaité) :
1. VARIER INTENSITÉ (méthode efficace)
2. AJOUTER RENFORCEMENT MUSCULAIRE :
2 jours/semaine :
Exercices poids corps adaptés obésité :
•	Pompes MURALES (pas au sol) : 3 séries × 10-15 reps
•	Squats ASSISTÉS (chaise derrière) : 3 séries × 10-15 reps
•	Levées bras latérales (bouteilles eau) : 3 séries × 12-15 reps
•	Gainage GENOUX (pas pieds) : 3 × 20-30 sec
•	Fentes statiques (assistées mur) : 2 séries × 8-10 chaque jambe
3. SUIVRE PROGRÈS :
•	Carnet entraînement
•	Poids (1x/semaine)
•	Tour taille (1x/mois)
SIGNAUX SURENTRAÎNEMENT (réduire si présents) :
•	Fatigue persistante
•	Sommeil perturbé
•	Irritabilité
•	Blessures répétées
•	Stagnation/prise poids
CONTINUER AINSI ✓✓✓';
                }
                if (str_contains($answerLower, '7 jours')) {
                    return 'CHOIX : 7 jours/semaine (Très actif)
ANALYSE : EXCELLENT engagement, ATTENTION surcharge
Avantages : ✓✓✓ Engagement maximal ✓✓✓ Dépense calorique élevée ✓✓✓ Habitude ancrée
Risques : ⚠️ Surentraînement possible ⚠️ Récupération insuffisante ⚠️ Blessures ⚠️ Épuisement (abandon long terme)
RECOMMANDATIONS :
1. DISTINGUER intensité jours :
PAS 7 jours intensité ÉLEVÉE (dangereux)
MAIS 7 jours avec VARIÉTÉ intensité :
Semaine type SAINE (7 jours) :
•	Lundi : Marche RAPIDE 45-60 min (intensité modérée-élevée)
•	Mardi : Renforcement musculaire 30 min (intensité modérée)
•	Mercredi : Marche DOUCE 30 min (récupération ACTIVE)
•	Jeudi : Marche RAPIDE 45 min
•	Vendredi : Yoga/Étirements 30 min (récupération ACTIVE)
•	Samedi : Activité variée 60 min (vélo, natation, danse - intensité modérée)
•	Dimanche : Marche modérée 45 min OU activité ludique (jardin, jeux enfants)
TOTAL : 7 jours, ~300 min/semaine, VARIÉTÉ intensité ✓
2. ÉCOUTER CORPS (CRUCIAL) :
Signaux REPOS OBLIGATOIRE :
•	Douleur articulaire/musculaire persistante
•	Fatigue extrême
•	Sommeil perturbé
•	Irritabilité, démotivation
→ Prendre 1-2 jours REPOS COMPLET si signaux
Repos ≠ Échec Repos = Récupération = Progrès
MESSAGE IMPORTANT : "Votre engagement est admirable. Veillez à l\'équilibre effort/récupération pour maintenir long terme et éviter épuisement."';
                }
                return 'Maintenez une activité physique régulière pour préserver votre capital musculaire.';

            case 'temps_assis':
                if (str_contains($answerLower, 'moins de 4h')) {
                    return 'CHOIX : Moins de 4h
ANALYSE : EXCELLENT ✓✓✓
Position assise <4h/jour = Optimal santé
Bénéfices : ✓ Risque cardiovasculaire ↓ ✓ Métabolisme actif ✓ Posture préservée ✓ Circulation sanguine optimale
FÉLICITATIONS - MAINTENIR
Conseils maintien :
•	Continuer mode de vie actif
•	Varier positions (assis/debout/marche)
•	Suivre plans alimentation selon niveau activité réel
CONTINUER AINSI ✓✓✓';
                }
                if (str_contains($answerLower, '4h-6h')) {
                    return 'CHOIX : 4h-6h
ANALYSE : ACCEPTABLE, mais améliorable
4-6h assis = Limite acceptable (nombreux emplois de bureau)
Risques modérés : ⚠️ Ralentissement métabolisme ⚠️ Risque cardiovasculaire légèrement ↑ ⚠️ Douleurs dos possibles
STRATÉGIES RÉDUCTION temps assis :
1. AU TRAVAIL (si emploi bureau) :
Toutes les heures (alarme smartphone) :
•	Se lever 5 min
•	Marcher sur place
•	Étirements légers
Pause déjeuner :
•	Marche 10-15 min APRÈS manger
•	Éviter rester assis tout le temps
Appels téléphoniques :
•	Se lever et marcher pendant appel
2. À LA MAISON :
Écrans (TV, téléphone) :
•	Publicités TV → Se lever, marcher, étirements
•	1 épisode série → 10 min marche après
Tâches ménagères :
•	Augmenter (comptent comme activité)
3. OBJECTIF :
•	Réduire <4h/jour si possible
•	OU compenser par activité physique quotidienne (marche 45-60 min)';
                }
                if (str_contains($answerLower, '6h-8h')) {
                    return 'CHOIX : 6h-8h
ANALYSE : PROBLÉMATIQUE
6-8h assis/jour = Sédentarité importante
Risques : ❌ Métabolisme ralenti (↓ dépense calorique) ❌ Risque cardiovasculaire ↑ ❌ Diabète type 2 ↑ ❌ Obésité aggravée ❌ Douleurs dos, cervicales ❌ Circulation veineuse (varices, thromboses)
"Sitting is the new smoking" (position assise = nouveau tabagisme)
PLAN RÉDUCTION URGENTE :
OBJECTIF : Passer <6h/jour
1. PAUSES ACTIVES OBLIGATOIRES :
TOUTES LES 30 MINUTES (alarme) :
•	Se lever 2-3 min
•	Marcher sur place
•	Étirements rapides :
	Dos (torsions douces)
	Jambes (flexions genoux)
	Bras (élévations)
2. COMPENSATIONS ACTIVES :
Matin (avant travail) :
•	Marche 15-20 min
Pause déjeuner :
•	Marche 15-20 min APRÈS repas (NON NÉGOCIABLE)
Soir (après travail) :
•	Marche 30-45 min
Total compensations : 60-90 min activité/jour
3. SUIVI :
•	Application smartphone (temps assis)
•	Objectif réduction progressive :
	Mois 1 : 6-8h → 5-6h
	Mois 2 : 5-6h → 4-5h
	Mois 3+ : <4h';
                }
                if (str_contains($answerLower, 'plus de 8h')) {
                    return 'CHOIX : Plus de 8h
ANALYSE : TRÈS PROBLÉMATIQUE - URGENT
>8h assis/jour = Sédentarité EXTRÊME
Risques MAJEURS : ❌❌ Mortalité prématurée ↑↑ ❌❌ Maladies cardiovasculaires ↑↑ ❌❌ Diabète type 2 ↑↑ ❌❌ Obésité sévère facilitée ❌❌ Cancers (côlon, sein) ↑ ❌❌ Dépression ↑ ❌❌ Thrombose veineuse profonde ❌❌ Hernies discales ❌❌ Atrophie musculaire
⚠️ MÊME ACTIVITÉ PHYSIQUE QUOTIDIENNE NE COMPENSE PAS TOTALEMENT >8h assis
INTERVENTION URGENTE MULTI-AXES :
1. PAUSES ACTIVES TRÈS FRÉQUENTES :
TOUTES LES 20 MINUTES (alarme NON NÉGOCIABLE) :
•	Se lever 2 min minimum
•	Marcher sur place OU marche rapide (bureau-toilettes)
•	Étirements dynamiques
Soit 24 pauses × 2 min = 48 min debout
2. RESTRUCTURATION JOURNÉE :
Matin (AVANT travail assis) :
•	Marche 30 min (NON NÉGOCIABLE)
•	Étirements 10 min
Pause déjeuner (OBLIGATOIRE) :
•	Marche 20-30 min APRÈS repas
•	Éviter manger assis au bureau
Soir (après travail) :
•	Marche 45-60 min
Total activité compensatoire : 120-150 min/jour MINIMUM
5. OBJECTIF DRASTIQUE RÉDUCTION :
OBJECTIF FINAL : <6h assis/jour (idéalement <4h)
Progression :
•	Mois 1 : >8h → 6-8h (réduction 1-2h)
•	Mois 2 : 6-8h → 4-6h (réduction 1-2h supplémentaires)
•	Mois 3+ : <6h (idéalement <4h)
MESSAGE CRUCIAL : "Votre situation nécessite changements importants. >8h assis/jour est aussi néfaste que tabagisme. Avec détermination et ajustements progressifs, amélioration significative possible. Chaque minute debout/active compte. Commencez aujourd\'hui."';
                }
                return 'Réduisez votre temps assis pour relancer votre métabolisme.';

            case 'activites_preferees':
                return 'Importance : PLAISIR = CLÉ ADHÉRENCE LONG TERME
ANALYSE SELON RÉPONSES :
MARCHE :
ANALYSE : EXCELLENT choix obésité modérée
Avantages marche : ✓✓✓ Impact faible (articulations préservées) ✓✓ Accessible partout ✓✓ Gratuit ✓✓ Adaptable (vitesse, durée, terrain) ✓✓ Social (marche en groupe, famille) ✓ Sécuritaire
PLAN OPTIMISATION MARCHE :
1. PROGRESSION :
•	Débutant : 20-30 min/jour, vitesse modérée
•	Intermédiaire : 45-60 min/jour, vitesse modérée-rapide
•	Avancé : 60-90 min/jour OU 45 min intensité élevée (intervalles)
2. VARIÉTÉ :
•	Marche quotidienne : Quartier, terrain plat (base)
•	Marche rapide : 2-3x/semaine (cardio ↑)
•	Marche terrain varié : 1x/semaine (pentes légères si articulations OK)
•	Marche longue : 1x/semaine (90-120 min, intensité modérée)
3. INTERVALLES (avancé) :
•	Échauffement 5 min marche modérée
•	20 min intervalles : 2 min RAPIDE / 2 min LENT alternés
•	Retour calme 5 min marche lente
•	Total : 30 min, dépense ↑↑
CONTINUER ET INTENSIFIER ✓

NATATION :
ANALYSE : IDÉAL obésité (si accès piscine)
Avantages natation : ✓✓✓ ZÉRO impact articulations (eau porte poids) ✓✓✓ Cardio complet ✓✓✓ Renforcement musculaire global ✓✓ Souplesse ↑ ✓✓ Sensation bien-être ✓ Rafraîchissant (climat chaud Bénin)
Plan natation :
•	Débutant : 2-3x/semaine, 20-30 min/séance
•	Intermédiaire : 3-4x/semaine, 40-45 min/séance
•	Avancé : 4-5x/semaine, 45-60 min/séance
EXCELLENT CHOIX - CONTINUER ✓✓✓

YOGA :
ANALYSE : BON complément, INSUFFISANT seul
Avantages yoga : ✓✓ Souplesse ↑ ✓✓ Détente, stress ↓ ✓✓ Posture ↑ ✓ Renforcement musculaire doux ✓ Bien-être mental
RECOMMANDATION :
Yoga comme COMPLÉMENT (excellent) :
•	Yoga : 2-3x/semaine (souplesse, détente, renforcement)
•	+ Activité cardio : 4-5x/semaine (marche rapide, natation, vélo, danse)
COMBINER YOGA + CARDIO = OPTIMAL ✓

DANSE / ZUMBA :
ANALYSE : EXCELLENT (ludique, social, complet)
Avantages danse : ✓✓✓ Cardio ↑ ✓✓✓ Plaisir (pas ressenti comme "exercice") ✓✓ Social, motivation groupe ✓✓ Coordination ↑ ✓ Renforcement musculaire ✓ Bien-être mental
Danses adaptées obésité modérée :
•	Danses traditionnelles béninoises : Excellentes (culturel, social, cardio)
•	Zumba : Très populaire, cardio élevé, cours collectifs
•	Danse africaine : Énergique, ludique
EXCELLENT CHOIX - CONTINUER ET INTENSIFIER ✓✓✓

VÉLO :
ANALYSE : BON si articulations tolèrent
Avantages vélo : ✓✓ Cardio excellent ✓✓ Impact faible (vs course) ✓ Renforcement membres inférieurs ✓ Déplacements utiles (transport actif)
Plan vélo :
•	3-5x/semaine, 30-60 min/sortie
•	Terrain plat débutant
IF DOULEURS GENOUX → ARRÊTER, PRIVILÉGIER MARCHE/NATATION

JARDINAGE, MÉNAGE :
ANALYSE : EXCELLENT activités quotidiennes (comptent !)
Dépense calorique (exemples 60 min) :
•	Jardinage léger : ~200 kcal
•	Jardinage intensif (bêcher, désherber) : ~300-400 kcal
•	Passer serpillière : ~150-200 kcal
IMPORTANT :
•	Activités quotidiennes COMPLÈTENT, ne REMPLACENT PAS totalement exercice structuré
•	Marche rapide 30 min/jour reste recommandée (cardio plus intense)
CONTINUER activités + AJOUTER marche structurée ✓

NB : Si vous choisissez une autre activité physique que vous préférez, les mêmes principes de progression s\'appliquent : commencer progressivement, varier l\'intensité, et écouter votre corps.';

            case 'fc_connaissance':
            case 'fc_valeur':
                if ($isYes || ($key === 'fc_valeur' && (int) $answer > 0)) {
                    $fcVal = (int) $answer;
                    if ($fcVal >= 60 && $fcVal <= 75) {
                        return 'ANALYSE FC : OPTIMAL ✓✓✓
Indication : ✓✓✓ Santé cardiovasculaire bonne ✓✓ Condition physique correcte à bonne ✓ Récupération adéquate
FÉLICITATIONS
Conseils :
•	Maintenir activité physique régulière
•	Suivre plans alimentation
•	Surveiller évolution FCR (↓ = amélioration condition physique)
CONTINUER AINSI ✓';
                    }
                    if ($fcVal >= 76 && $fcVal <= 85) {
                        return 'ANALYSE FC : ACCEPTABLE, améliorable
Indication : ⚠️ Condition physique moyenne ⚠️ Potentiel amélioration
Objectif : Réduire FCR (via activité physique régulière)
FCR ↓ = Cœur plus efficace (pompe plus sang par battement)
Plan amélioration FCR :
1. Activité CARDIO régulière :
•	5-7 jours/semaine
•	30-45 min/jour
•	Intensité modérée (marche rapide, vélo, natation, danse)
2. PROGRESSION :
•	Mois 1-2 : Activité modérée quotidienne
•	Mois 3+ : Ajouter intervalles 2x/semaine
3. SUIVI FCR :
•	Mesurer 1x/mois (matin au réveil, avant lever)
•	Objectif : ↓ 5-10 bpm en 3-6 mois
Aliments santé cardiovasculaire :
•	Poissons gras (oméga-3) : 3x/semaine
•	Légumes verts
•	Fruits riches potassium (bananes, oranges)
•	Réduire sel, sucres ajoutés';
                    }
                    if ($fcVal >= 86 && $fcVal <= 100) {
                        return 'ANALYSE FC : LIMITE SUPÉRIEURE normale, ATTENTION
Indication : ⚠️⚠️ Condition physique faible ⚠️⚠️ Stress chronique possible ⚠️⚠️ Obésité impacte cœur ⚠️ Risque cardiovasculaire si maintenu
Objectif : RÉDUIRE FCR
Plan intensif amélioration :
1. Consultation MÉDICALE :
•	Bilan cardiovasculaire complet
•	ECG repos
•	Écho cardiaque si nécessaire
•	Test effort (évaluer capacité, sécurité)
2. Activité physique PROGRESSIVE SUPERVISÉE :
Phase 1 (Semaines 1-4) :
•	Marche douce quotidienne 20-30 min
•	Intensité légère (conversation facile)
Phase 2 (Semaines 5-8) :
•	Marche modérée quotidienne 30-40 min
Phase 3 (Semaines 9-12) :
•	Marche rapide 40-45 min quotidienne
3. SUIVI FCR STRICT :
•	Mesurer quotidien (réveil)
•	Objectif : ↓ 10-15 bpm en 6 mois
Alimentation STRICTE santé cardiovasculaire :
•	SEL : <5g/jour (zéro bouillons cubes)
•	Oméga-3 : Poissons gras 3-4x/semaine
•	Potassium : Bananes, oranges, avocat, épinards
•	Magnésium : Légumes verts, noix, céréales complètes
ÉVITER :
•	Caféine excessive (max 2 cafés/jour, avant 12h)
•	Alcool
•	Sucres raffinés';
                    }
                    if ($fcVal > 100) {
                        return 'ANALYSE FC : ANORMAL - CONSULTATION URGENTE
⚠️⚠️⚠️ TACHYCARDIE AU REPOS
Causes possibles :
•	Déconditionnement sévère
•	Stress/anxiété chronique
•	Anémie
•	Hyperthyroïdie
•	Déshydratation
•	Insuffisance cardiaque
•	Arythmie cardiaque
ACTION IMMÉDIATE :
1. CONSULTATION MÉDICALE URGENTE (cette semaine)
2. ACTIVITÉ PHYSIQUE : SUSPENDUE jusqu\'avis médical
3. SURVEILLANCE SYMPTÔMES :
Consulter URGENCES si :
•	Douleur poitrine
•	Palpitations sévères
•	Essoufflement repos
•	Malaise, vertiges
4. MESURES IMMÉDIATES :
•	Hydratation adéquate (3L eau/jour)
•	Réduction stress
•	Sommeil suffisant (8h)
•	ZÉRO caféine
•	ZÉRO alcool
SUIVI STRICT MÉDICAL jusqu\'à normalisation';
                    }
                    if ($fcVal > 0 && $fcVal < 60) {
                        return 'ANALYSE FC : DEUX possibilités
A) ATHLÈTE ENTRAÎNÉ : ✓✓✓ Si activité physique intense régulière ✓ Cœur très efficace ✓ Excellent signe condition physique
OU
B) BRADYCARDIE PATHOLOGIQUE : ⚠️⚠️ Si sédentaire/peu actif ⚠️ Hypothyroïdie ⚠️ Médicaments (bêta-bloquants) ⚠️ Troubles conduction cardiaque
Si SÉDENTAIRE avec FCR <60 bpm : Consultation médicale, ECG, Bilan thyroïde (TSH)
Si ATHLÈTE avec FCR <60 bpm : Normal et sain, continuer activité';
                    }
                    return 'ANALYSE FC : EXCELLENT INDICATEUR ✓
Fréquence cardiaque (FC) au repos reflète votre niveau de forme.
ZONE OPTIMALE : 60-70 bpm (Excellent), 70-85 bpm (Moyen), >85 bpm (Vigilance).
OBJECTIF : ↓ FC de 1-2 bpm par mois avec l\'activité régulière.';
                }
                return 'RÉPONSE : NON (Ne connaît pas FCR)
RECOMMANDATION : APPRENDRE À MESURER
Pourquoi mesurer FCR :
•	Indicateur santé cardiovasculaire
•	Suivi progrès condition physique
•	Détection précoce anomalies
Comment mesurer FCR (MÉTHODE SIMPLE) :
1. MOMENT : Matin au réveil, avant lever lit
2. MÉTHODE MANUELLE (sans équipement) :
Pouls radial (poignet) :
•	Index + majeur sur artère radiale (côté pouce, face interne poignet)
•	Compter battements pendant 60 secondes
VALEURS NORMALES RAPPEL :
•	60-75 bpm : Optimal
•	76-85 bpm : Acceptable
•	86-100 bpm : Limite supérieure (améliorer)
•	>100 bpm : Anormal (consulter)
•	<60 bpm : Excellent si athlète, consulter si sédentaire
ACTION RECOMMANDÉE :
•	Mesurer FCR dès demain matin
•	Refaire 3 jours consécutifs (moyenne)
•	Noter résultat
Alimentation : Suivre plans selon niveau activité actuel';

            case 'stress_ennui':
                if ($isYes) {
                    return 'RÉPONSE : OUI
ANALYSE : ALIMENTATION ÉMOTIONNELLE
Problématique :
❌ Nourriture utilisée pour gérer émotions (pas faim physique)
❌ Conduit suralimentation
❌ Choix souvent aliments réconfortants (sucré, gras)
❌ Culpabilité après → Plus de stress → Plus de nourriture (cercle vicieux)
❌ Obstacle majeur perte poids durable
STRATÉGIES GESTION ALIMENTATION ÉMOTIONNELLE :
1. IDENTIFICATION DÉCLENCHEURS :
Tenir JOURNAL ÉMOTIONS-ALIMENTATION (2 semaines)
Chaque épisode grignotage émotionnel, noter :
•	Heure, lieu
•	Émotion AVANT manger (stress, ennui, tristesse, colère, solitude, fatigue)
•	Situation déclencheuse
•	Aliments consommés et quantité
•	Sensation APRÈS manger
2. ALTERNATIVES NON-ALIMENTAIRES PAR ÉMOTION :
SI STRESS :
•	Respiration profonde 5 min (4 sec inspire - 7 sec retient - 8 sec expire)
•	Marche rapide 10-15 min (extérieur si possible)
•	Appel ami/proche (parler soulage)
•	Tisane citronnelle chaude (rituel apaisant)
SI ENNUI :
•	Marche/promenade (sortir environnement ennuyeux)
•	Activité manuelle (tricot, dessin, puzzle si disponible)
•	Appel téléphonique social
•	Ménage actif (productif + distraction)
SI TRISTESSE :
•	Parler à quelqu\'un (ami, famille, proche)
•	Activité physique douce (marche calme, yoga)
•	Bain/douche relaxante
SI FATIGUE :
•	REPOS (sieste 20 min)
•	Hydratation (souvent déshydratation confondue fatigue)
•	Sortir prendre air
3. RÈGLE DES 15 MINUTES :
Quand envie grignoter émotionnel :
PAUSE OBLIGATOIRE 15 min :
1.	Noter émotion ressentie
2.	Choisir alternative non-alimentaire appropriée (liste ci-dessus)
3.	Pratiquer alternative 15 min
4.	Réévaluer après 15 min :
	Envie disparue ? ✓ SUCCÈS → Continuer activité
	Envie persiste ? → Voir étape suivante
4. SI ENVIE PERSISTE APRÈS 15 MIN :
Se poser questions :
•	Faim PHYSIQUE réelle ? Ventre gargouille ? Faim progressive ? Repas/collation >3-4h ? → Si OUI faim physique → Manger collation SAINE planifiée (fruits + noix)
•	Faim ÉMOTIONNELLE ? Envie soudaine, spécifique (sucré/gras) ? Sensation gorge/bouche (pas estomac) ? Après repas récent (<2h) → Essayer autre alternative 15 min
5. SI CRAQUAGE (arrive, normal) :
ZÉRO CULPABILITÉ (aggrave cycle)
À FAIRE :
•	Noter dans journal (apprentissage)
•	Reprendre alimentation normale repas suivant (PAS restriction compensatoire)
•	Auto-compassion : "C\'est difficile, je fais de mon mieux, je progresse"
6. ALIMENTATION STRUCTURÉE (prévention) :
Repas RÉGULIERS et SUFFISANTS :
•	JAMAIS sauter repas (faim excessive → compulsions)
•	3 repas + 2 collations planifiés chaque jour
Régularité = glycémie stable = moins fringales émotionnelles
7. SOUTIEN PSYCHOLOGIQUE (fortement recommandé) :
Consultation psychologue/thérapeute :
•	Spécialisé troubles comportement alimentaire
•	Thérapie cognitivo-comportementale (TCC) : très efficace alimentation émotionnelle
PERSÉVÉRANCE ✓';
                }
                return 'RÉPONSE : NON
ANALYSE : EXCELLENT ✓✓✓
Alimentation motivée par faim physique (pas émotions)
Bénéfices : ✓✓✓ Relation saine nourriture ✓✓ Contrôle portions facilité ✓✓ Perte poids facilitée
FÉLICITATIONS
Conseils maintien :
•	Rester vigilant (stress futur peut déclencher)
•	Si apparition grignotages émotionnels → Appliquer stratégies immédiatement
•	Continuer écoute faim/satiété
Alimentation : Suivre plans selon niveau activité
CONTINUER AINSI ✓✓✓';

            case 'finir_assiette':
                if ($isYes) {
                    return 'RÉPONSE : OUI
ANALYSE : COMPORTEMENT PROBLÉMATIQUE COMMUN
Causes possibles :
•	Éducation ("finis ton assiette, gaspillage = mal")
•	Portions servies trop importantes
•	Manger trop vite (satiété retardée)
•	Manger distrait (TV, téléphone - pas conscience satiété)
•	Peur manquer nourriture
Conséquences :
❌ Suralimentation régulière (calories excédentaires)
❌ Estomac distendu progressivement (portions ↑ nécessaires satiété)
❌ Perte connexion signaux faim/satiété naturels
❌ Prise poids
STRATÉGIES RÉÉDUCATION ÉCOUTE SATIÉTÉ :
1. PORTIONS INITIALES RÉDUITES :
Servir MOINS initialement :
•	3/4 portion habituelle SEULEMENT
•	Exemple : Si habituellement 300g pâte → Servir 220g
OBJECTIF : Satiété atteinte = Arrêt (PAS assiette vide = arrêt)
2. MANGER LENTEMENT (CRUCIAL) :
Satiété = 15-20 min retard
Techniques ralentir :
•	Poser couverts entre chaque bouchée
•	Mâcher 15-20x minimum chaque bouchée
•	Boire gorgées eau entre bouchées
•	Chronomètre : Objectif 20-30 min/repas
3. MANGER SANS DISTRACTION :
ZÉRO TV, téléphone, lecture, travail pendant le repas
Manger = Activité UNIQUE moment repas
4. ÉCHELLE FAIM/SATIÉTÉ (apprentissage) :
Avant/pendant/après chaque repas, se noter 1-10 :
1-2 : Affamé (estomac vide, faiblesse)
3-4 : Faim confortable (moment idéal manger)
5-6 : Neutre/Satisfait (satiété légère)
7-8 : Repu (estomac plein)
9-10 : Trop plein (inconfort, lourdeur)
OBJECTIFS :
•	Commencer repas : 3-4 (faim confortable, pas affamé)
•	Arrêter repas : 6-7 (satisfait, pas repu)
5. ARRÊT MILIEU REPAS (évaluation) :
À MI-ASSIETTE, PAUSE OBLIGATOIRE 2 min :
•	Poser couverts
•	Boire eau
•	Se demander : "Ai-je encore faim ?"
	Si OUI → Continuer manger lentement
	Si NON/DOUTE → ARRÊTER (couvrir reste, garder plus tard)
6. PETITES ASSIETTES (astuce psychologique) :
Assiette plus petite = portion paraît plus importante
7. RESTES = OK (pas gaspillage) :
Laisser assiette = Restes réfrigérés, mangés repas suivant (zéro gaspillage réel)
PROGRÈS ATTENDU :
Semaines 1-2 : Difficile arrêter avant fin (habitude forte)
Semaines 3-4 : Conscience satiété augmente
Mois 2-3 : Arrêt naturel avant fin assiette occasionnel
Mois 3-6 : Écoute satiété devient automatique
Patience avec soi-même';
                }
                return 'RÉPONSE : NON
ANALYSE : EXCELLENT ✓✓✓
Écoute signaux faim/satiété naturels
Bénéfices : ✓✓✓ Autorégulation naturelle ✓✓ Portions adaptées besoins réels ✓✓ Perte poids facilitée
FÉLICITATIONS
Conseils maintien :
•	Continuer écoute corps
•	Rester vigilant distractions (TV, téléphone - peuvent perturber)
•	Manger lentement, pleine conscience
Alimentation : Suivre plans selon niveau activité, ajuster selon satiété réelle
CONTINUER AINSI ✓✓✓';

            case 'regime_particulier':
            case 'regime_efficacite':
                return 'ANALYSE SELON RÉPONSES (EXEMPLES) :
RÉGIME KETO (cétogène) :
Efficacité court terme : ✓✓ Perte poids rapide (eau + graisse)
Problèmes : ❌ Non soutenable long terme ❌ Non adapté culture alimentaire béninoise (élimination pâte, riz, igname, banane plantain) ❌ Reprise poids SYSTÉMATIQUE à l\'arrêt (effet yo-yo)
NOUVELLE APPROCHE RECOMMANDÉE :
OUBLIER : Régimes extrêmes (keto, sans glucides, etc.), restrictions drastiques, durée limitée
ADOPTER : Rééquilibrage alimentaire béninois permanent qui inclut TOUS groupes aliments

RÉGIME JUS/DÉTOX :
⚠️⚠️ RÉGIME DANGEREUX
"DÉTOX" n\'existe pas :
•	Corps détoxifie naturellement (foie, reins)
•	Jus/détox = Marketing, zéro science
JAMAIS refaire régime jus/détox

JEÛNE INTERMITTENT :
Si fatigue et faim excessive :
RECOMMANDATION : ARRÊTER le jeûne intermittent
ADOPTER : 3 repas + 2 collations réguliers
•	Petit-déjeuner 7h (NON NÉGOCIABLE)
•	Collation 10h
•	Déjeuner 13h
•	Collation 16h
•	Dîner 19h

RÉGIME HYPERPROTÉINÉ (substituts) :
Problèmes : ❌ Coût élevé (sachets importés chers au Bénin) ❌ Monotonie extrême ❌ Vie sociale impossible ❌ Reprise poids à l\'arrêt
NOUVELLE APPROCHE (garde avantage, élimine inconvénients) :
Plans repas STRUCTURÉS proposés : ✓ Structure claire ✓ Aliments VRAIS béninois ✓ Variété ✓ Vie sociale préservée ✓ Soutenable PERMANENT

RÉPONSE : NON (Jamais suivi régime particulier)
ANALYSE : Deux possibilités
A) Jamais essayé perdre poids :
AVANTAGE : Page blanche, bonnes habitudes dès le départ ✓
B) Essais informels sans succès :
APPROCHE RECOMMANDÉE :
Démarrage SAIN et STRUCTURÉ :
1. Éducation alimentaire :
•	Comprendre principes (macronutriments, portions, équilibre)
•	Ce guide = Éducation complète
2. Plans personnalisés :
•	Selon niveau activité
•	Selon antécédents médicaux
•	Aliments béninois familiers
3. Progression :
•	Changements PROGRESSIFS (pas bouleversement brutal)
•	Habitudes ancrées progressivement
4. Suivi :
•	Poids 1x/semaine
•	Ajustements si nécessaire
5. Patience :
•	Perte 0,5-1 kg/semaine = optimal
•	6-12 mois atteindre objectif (selon poids à perdre)
6. Perspective long terme :
•	Changement MODE VIE (pas régime temporaire)
•	Permanent
Votre avantage : Pas habitudes échecs, confiance intacte ✓
Suivre plans proposés dès le début ✓✓✓';

            case 'objectif_principal':
                return 'SYNTHÈSE DE L\'OBJECTIF : AMÉLIORER LA FORME PHYSIQUE
Votre profil ne présentant aucune pathologie médicale (Pas de diabète, HTA ou cholestérol), nous nous concentrons sur :
1. L\'optimisation énergétique.
2. L\'amélioration de la composition corporelle.
3. La durabilité des habitudes alimentaires béninoises adaptées.
';

            default:
                return 'Continuez vos efforts. La régularité et la bienveillance envers vous-même sont vos meilleurs alliés.';
        }
    }
}
