<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recommendation;
use Illuminate\Support\Facades\DB;

class RecommendationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('recommendations')->truncate();

        $donnees = [
            [// =========================================================================
            // 1. OBÉSITÉ MODÉRÉE (ID 1)
            // ========================================================================''=> ''
            ],
            ['maladie_id' => 1,
    ];
}
}