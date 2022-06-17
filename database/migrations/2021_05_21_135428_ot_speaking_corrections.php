<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OtSpeakingCorrections extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_speaking_corrections', function (Blueprint $table) {
            $table->bigIncrements('SPAEKING_CORRECTION_ID');
            $table->integer('USER_ID');
            $table->integer('TESTS_ID');
            $table->integer('TEST_REGISTER_ID');
            $table->integer('TEST_U_START_ID');
            $table->string('FILES_LOCATIONS');
            $table->date('SEND_DATE');
            $table->time('SEND_TIME');
            $table->string('IPADRESS');
            $table->string('BROWSER_NAME');
            $table->float('GRADE');
            $table->string('COMMENTS');
            $table->date('CORRECTION_TEACHER_ID');
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
        Schema::dropIfExists('ot_speaking_corrections');
    }
}
