<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtSpeakingAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_speaking_appointments', function (Blueprint $table) {
            $table->bigIncrements('APPOINTMENT_ID');
            $table->integer('USER_ID');
            $table->integer('TESTS_ID');
            $table->integer('TEST_REGISTER_ID');
            $table->integer('TEST_U_START_ID');
            $table->date('TAKEN_ADTE');
            $table->time('TAKEN_TIME');
            $table->string('IPADRESS');
            $table->string('BROWSER_NAME');
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
        Schema::dropIfExists('ot_speaking_appointments');
    }
}
