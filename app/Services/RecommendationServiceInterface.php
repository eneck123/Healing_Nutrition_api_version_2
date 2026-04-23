<?php

namespace App\Services;

interface RecommendationServiceInterface
{
    /**
     * Get a specific recommendation based on a key and the provided answer.
     *
     * @param string $key The key identifier for the question category (e.g., 'antecedents_diag').
     * @param string $answer The specific answer text provided by the user.
     * @param array $allAnswers An array of all answers provided by the user (optional for context).
     * @param int $age The age of the user, used for calculations like Tanaka formula (default 30).
     * @return string The detailed recommendation text.
     */
    public function getRecommendation(string $key, string $answer, array $allAnswers = [], int $age = 30): string;
}
