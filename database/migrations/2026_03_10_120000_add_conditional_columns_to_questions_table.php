<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConditionalColumnsToQuestionsTable extends Migration
{
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_question_id')->nullable()->after('maladie_chronique_id');
            $table->string('trigger_answer')->nullable()->after('parent_question_id');

            $table->foreign('parent_question_id')
                  ->references('id')
                  ->on('questions')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign(['parent_question_id']);
            $table->dropColumn(['parent_question_id', 'trigger_answer']);
        });
    }
}
