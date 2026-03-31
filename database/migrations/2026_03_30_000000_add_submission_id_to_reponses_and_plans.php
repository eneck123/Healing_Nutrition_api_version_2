<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubmissionIdToReponsesAndPlans extends Migration
{
    public function up()
    {
        Schema::table('reponses', function (Blueprint $table) {
            // UUID string qui groupe toutes les réponses d'une même soumission de formulaire
            $table->string('submission_id', 36)->nullable()->index()->after('id');
        });

        Schema::table('plan_nutritionnels', function (Blueprint $table) {
            // Lie un plan nutritionnel à la soumission de formulaire qui l'a généré
            $table->string('submission_id', 36)->nullable()->after('utilisateur_id');
        });
    }

    public function down()
    {
        Schema::table('reponses', function (Blueprint $table) {
            $table->dropIndex(['submission_id']);
            $table->dropColumn('submission_id');
        });

        Schema::table('plan_nutritionnels', function (Blueprint $table) {
            $table->dropColumn('submission_id');
        });
    }
}
