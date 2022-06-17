<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtUserAnswersPackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_user_answers_packages', function (Blueprint $table) {
            $table->bigIncrements('OT_USR_ANS_PACK_ID');
            $table->tinyInteger('USER_ID');
            $table->tinyInteger('TESTS_ID');
            $table->tinyInteger('TEST_REGISTER_ID');
            $table->tinyInteger('TEST_U_START_ID');
            $table->tinyInteger('PACKAGES_ID');
            $table->tinyInteger('QUESTION_NUMBER');
            $table->string('ANSWER');
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
        Schema::dropIfExists('ot_user_answers_packages');
    }
}
