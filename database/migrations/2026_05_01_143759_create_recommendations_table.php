<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('recommendations');

        Schema::create('recommendations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('maladie_chronique_id');
            $table->text('question_text'); // Le vrai texte de la question
            $table->string('answer_value')->nullable(); // La réponse spécifique (Oui, Non, etc.)
            $table->string('objective'); // weight_loss, fitness, both
            $table->string('weight_loss_range')->default('all'); // under_5, 5_10, over_10, all
            $table->string('pathology')->default('all'); // diabetes, hypertension, cardio, none, all
            $table->text('content');
            $table->timestamps();

            $table->foreign('maladie_chronique_id')->references('id')->on('maladie_chroniques')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recommendations');
    }
};
