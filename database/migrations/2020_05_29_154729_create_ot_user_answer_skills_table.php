<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtUserAnswerSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_user_answer_skills', function (Blueprint $table) {
            $table->bigIncrements('TEST_U_ANS_SKILL_ID');
            $table->tinyInteger('SKILL_ID');
            $table->tinyInteger('CORRECT_ANSWER');
            $table->string('GRADE');
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
        Schema::dropIfExists('ot_user_answer_skills');
    }
}
