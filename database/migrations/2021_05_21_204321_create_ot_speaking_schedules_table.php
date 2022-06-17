<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtSpeakingSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_speaking_schedules', function (Blueprint $table) {
            $table->bigIncrements('SCHEDULES_ID');
            $table->integer('USER_ID');
            $table->date('FROM_DATE');
            $table->date('TO_DATE');
            $table->tinyInteger('DURATION_TIME');
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
        Schema::dropIfExists('ot_speaking_schedules');
    }
}
