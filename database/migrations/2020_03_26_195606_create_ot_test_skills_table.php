<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtTestSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_test_skills', function (Blueprint $table) {
            $table->bigIncrements('TEST_SKILL_ID');
            $table->string('MAINTEST_ID ');
            $table->string('SKILL_ID');
            $table->string('Section_Number');
            $table->string('Question_Numbers');
            $table->string('Time_Period');
            $table->string('status');
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
        Schema::dropIfExists('ot_test_skills');
    }
}
