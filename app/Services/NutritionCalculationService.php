<?php

namespace App\Services;

use App\Models\Utilisateur;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ObesityInconsistencyMail;
use App\Mail\RthWarningMail;
use App\Mail\ImgInconsistencyMail;

class NutritionCalculationService
{
    /**
     * Perform full nutrition calculations for a user.
     * 
     * @param Utilisateur $user
     * @return array
     */
    public function calculateForUser(Utilisateur $user)
    {
        $metrics = $this->getBasicMetrics($user);
        
        $weight = $metrics['weight'];
        $height = $metrics['height'];
        $isMale = $metrics['is_male'];
        $tdee = $metrics['tdee'];

        // Save TDEE
        $user->tdee = $tdee;
        $user->save();

        // IMC Calculation
        $heightM = $height / 100;
        $imc = $weight / ($heightM * $heightM);

        // RTH Calculation
        $rth = ($user->tour_de_hanche > 0) ? ($user->tour_de_taille / $user->tour_de_hanche) : 0;

        // IMG Calculation
        $waist = $user->tour_de_taille;
        $neck = $user->tour_du_cou;
        $hip = $user->tour_de_hanche;
        $img = 0;
        if ($isMale) {
            if (($waist - $neck) > 0) $img = 86.010 * log10($waist - $neck) - 70.041 * log10($height) + 36.76;
        } else {
            if (($waist + $hip - $neck) > 0) $img = 163.205 * log10($waist + $hip - $neck) - 97.684 * log10($height) - 78.387;
        }
        // $img = max(0, $img);

        // Obesity logic
        $imgThreshold = $isMale ? 25 : 32;
        $isObeseIMG = $img > $imgThreshold;
        $rthThreshold = $isMale ? 0.90 : 0.85;
        $isHighRTH = $rth > $rthThreshold;
        $isObeseIMC = $imc >= 30;

        $calculatedStatus = 'Normal';
        if ($isObeseIMG || ($isObeseIMC && $isHighRTH)) {
            $calculatedStatus = 'Obese';
        } elseif ($isObeseIMC) {
            $calculatedStatus = 'Normal';
        }

        $obesityGrade = $this->getImcInterpretation($imc);
        $declaredType = $user->maladieChronique ? $user->maladieChronique->type : 'Inconnu';
        
        // Consistency check niveau 1 : obèse vs non-obèse
        $isConsistent = ($calculatedStatus === 'Obese') 
            ? (stripos($declaredType, 'Obésité') !== false || stripos($declaredType, 'Obesite') !== false) 
            : (stripos($declaredType, 'Obésité') === false && stripos($declaredType, 'Obesite') === false);

        // Consistency check niveau 2 : vérification du grade (modérée vs sévère)
        $isGradeConsistent = true;
        if ($isConsistent && $calculatedStatus === 'Obese') {
            if (stripos($declaredType, 'modérée') !== false) {
                $isGradeConsistent = stripos($obesityGrade, 'modérée') !== false;
            } elseif (stripos($declaredType, 'sévère') !== false) {
                $isGradeConsistent = stripos($obesityGrade, 'sévère') !== false;
            }
        }

        // Email notifications
        $imgNotification = false;
        $imcNotification = false;
        $rthNotification = true; // Always send RTH warning as per original logic

        // Logique IMG : on compare l'IMG calculé au seuil selon le sexe.
        // L'email est envoyé si l'IMG ne respecte pas le seuil attendu selon la déclaration de l'user.
        // Si l'user déclare être obèse, son IMG devrait être >= seuil.
        // Si l'user déclare NE PAS être obèse, son IMG devrait être < seuil.
        $userDeclaredObese = stripos($declaredType, 'Obésité') !== false || stripos($declaredType, 'Obesite') !== false;
        $imgMatchesDeclaration = $userDeclaredObese ? ($img >= $imgThreshold) : ($img < $imgThreshold);

        if (!$imgMatchesDeclaration) {
             Mail::to($user->email)->send(new ImgInconsistencyMail($user->nom . ' ' . $user->prenom, ['gender' => $user->sexe, 'height' => $height, 'waist' => $waist, 'neck' => $neck, 'hip' => $hip], $img, $imgThreshold));
             $imgNotification = true;
        }
        
        if (!$isConsistent || !$isGradeConsistent) {
             Mail::to($user->email)->send(new ObesityInconsistencyMail($user->nom . ' ' . $user->prenom, ['weight' => $weight, 'height' => $height, 'declared_type' => $declaredType], $imc, $obesityGrade));
             $imcNotification = true;
        }
        
        Mail::to($user->email)->send(new RthWarningMail($user->nom . ' ' . $user->prenom, $rth, $isMale ? 'M' : 'F', $rthThreshold));

        // Update database flags
        $user->update([
            'img_notification' => $imgNotification, 
            'imc_notification' => $imcNotification, 
            'rth_notification' => $rthNotification
        ]);

        $message = "D'après vos mesures, votre profil est classé comme : $obesityGrade.";
        if (!$isConsistent || !$isGradeConsistent) {
            $message .= " Vos données ne sont pas cohérentes avec votre déclaration.";
        } else {
            $message .= " Vos données sont cohérentes avec votre déclaration.";
        }

        return [
            'success' => true,
            'user_id' => $user->id,
            'imc' => $imc,
            'rth' => $rth,
            'img' => $img,
            'bmr' => $metrics['bmr'],
            'tdee' => $tdee,
            'status' => $calculatedStatus,
            'grade_imc' => $obesityGrade,
            'declared_type' => $declaredType,
            'message' => $message,
            'consistent' => $isConsistent,
            'notifications' => [
                'img' => $imgNotification, 
                'imc' => $imcNotification, 
                'rth' => $rthNotification
            ]
        ];
    }

    /**
     * Calculate basic metrics (BMR, TDEE, etc.)
     * 
     * @param Utilisateur $user
     * @return array
     */
    public function getBasicMetrics(Utilisateur $user)
    {
        $weight = $user->poids;
        $height = $user->taille;
        $gender = $user->sexe;
        $age = $user->age;
        $niveauPhysique = $user->niveau_d_activite_physique;

        if (!$weight || !$height || !$gender) {
             throw new \Exception('Données utilisateur incomplètes pour le calcul.');
        }

        $isMale = (strtoupper($gender) === 'M' || strtoupper($gender) === 'HOMME');
        $bmr = $isMale ? (10 * $weight) + (6.25 * $height) - (5 * $age) + 5 
                       : (10 * $weight) + (6.25 * $height) - (5 * $age) - 161;

        $multipliers = [
            "Sédentaire" => 1.2,
            "Légèrement actif" => 1.4,
            "Modérément actif" => 1.6,
            "Très actif" => 1.7,
            "Extrêmement actif" => 1.9,
        ];
        $tdee = $bmr * ($multipliers[$niveauPhysique] ?? 1.2);

        $rth = ($user->tour_de_hanche > 0) ? ($user->tour_de_taille / $user->tour_de_hanche) : 0;
        $rthThreshold = $isMale ? 0.90 : 0.85;

        // IMG Calculation
        $img = 0;
        if ($isMale) {
            if (($user->tour_de_taille - $user->tour_du_cou) > 0) 
                $img = 86.010 * log10($user->tour_de_taille - $user->tour_du_cou) - 70.041 * log10($height) + 36.76;
        } else {
            if (($user->tour_de_taille + $user->tour_de_hanche - $user->tour_du_cou) > 0) 
                $img = 163.205 * log10($user->tour_de_taille + $user->tour_de_hanche - $user->tour_du_cou) - 97.684 * log10($height) - 78.387;
        }
        // $img = max(0, $img);

        $heightM = $height / 100;
        $imc = $weight / ($heightM * $heightM);

        return [
            'bmr' => $bmr, 
            'tdee' => $tdee, 
            'is_male' => $isMale, 
            'height' => $height, 
            'weight' => $weight,
            'rth' => $rth,
            'rth_threshold' => $rthThreshold,
            'imc' => $imc,
            'img' => $img,
            'interpretation_imc' => $this->getImcInterpretation($imc)
        ];
    }

    /**
     * Get IMC interpretation text.
     * 
     * @param float $imc
     * @return string
     */
    public function getImcInterpretation($imc) {
        if ($imc < 18.5) return 'Insuffisance pondérale';
        if ($imc < 25) return 'Corpulence normale';
        if ($imc < 30) return 'Surpoids';
        if ($imc < 35) return 'Obésité modérée (Grade 1)';
        return 'Obésité sévère (Grade 2)';
    }
}
