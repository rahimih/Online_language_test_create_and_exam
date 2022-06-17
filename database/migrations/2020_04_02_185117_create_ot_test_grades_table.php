<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtTestGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_test_grades', function (Blueprint $table) {
            $table->bigIncrements('TEST_GRADE_ID');
            $table->string('MAIN_TEST_ID');
            $table->string('SUBGROUP_TEST_ID');
            $table->string('SKILL_ID');
            $table->tinyInteger('QUESTION_FROM');
            $table->tinyInteger('QUESTION_TO');
            $table->float('GRADE');
            $table->date('DATE_FROM');
            $table->date('DATE_TO');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('ot_test_grades');
    }
}
