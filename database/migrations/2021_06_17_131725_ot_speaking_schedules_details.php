<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OtSpeakingSchedulesDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_speaking_schedules_details', function (Blueprint $table) {
            $table->bigIncrements('SCHEDULES_DETAILS_ID');
            $table->integer('SCHEDULES_ID');
            $table->date('DAY_OF_WEEK');
            $table->date('FROM_TIME');
            $table->tinyInteger('TO_TIME');
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
        Schema::dropIfExists('ot_speaking_schedules_details');
    }
}
