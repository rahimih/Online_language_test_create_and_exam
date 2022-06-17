<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtUserAnswerSkillsPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_user_answer_skills_parts', function (Blueprint $table) {
            $table->bigIncrements('TEST_U_SP_ID');
            $table->integer('TEST_U_START_ID');
            $table->tinyInteger('SKILL_ID');
            $table->tinyInteger('PART_ID');
            $table->tinyInteger('CORRECT_ANSWER');
            $table->tinyInteger('QUESTION_NUMBERS');
            $table->string('Comment');
            $table->tinyInteger('STATUS');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ot_user_answer_skills_parts');
    }
}
