<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtAnswersPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_answers_packages', function (Blueprint $table) {
            $table->bigIncrements('OT_ANS_PACK_ID');
            $table->tinyInteger('PACKAGES_ID');
            $table->tinyInteger('QUESTION_NUMBER');
            $table->string('ANSWER');
            $table->string('ANSWER2');
            $table->string('ANSWER3');
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
        Schema::dropIfExists('ot_answers_packages');
    }
}
