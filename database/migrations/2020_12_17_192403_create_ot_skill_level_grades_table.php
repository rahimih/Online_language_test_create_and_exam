<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtSkillLevelGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_skill_level_grades', function (Blueprint $table) {
            $table->bigIncrements('skill_level_grade_id');
            $table->string('USER_ID');
            $table->integer('TESTS_ID');
            $table->integer('TEST_REGISTER_ID');
            $table->integer('TEST_U_START_ID');
            $table->integer('WRITING_FILES_ID');
            $table->integer('skill_level_relation_id');
            $table->float('GRADE');
            $table->string('COMMENT');
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
        Schema::dropIfExists('ot_skill_level_grades');
    }
}

