<?php

namespace App\Services;

interface NutritionDataServiceInterface
{
    /**
     * Retourne la structure des menus organisée par niveau d'activité.
     *
     * @return array
     */
    public function getMenus(): array;
}
