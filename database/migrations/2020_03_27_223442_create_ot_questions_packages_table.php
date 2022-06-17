<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtQuestionsPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_questions_packages', function (Blueprint $table) {
            $table->bigIncrements('QUESTIONS_PACKAGES_ID');
            $table->string('QUESTIONS_PACKAGES_NAME');
            $table->string('INSTITUTE_ID');
            $table->string('MAINTESTS_ID');
            $table->string('SUBGROUP_TEST_ID');
            $table->string('SKILL_ID');
            $table->string('QUESTIONS_COUNT');
            $table->string('TOTAL_TEST_TIME');
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
        Schema::dropIfExists('ot_questions_packages');
    }
}
