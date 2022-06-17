<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtSendSmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_send_sms', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->bigIncrements('USER_ID');
            $table->string('RECEPTOR');
            $table->string('TEXT');
            $table->tinyInteger('RESULT');
            $table->tinyInteger('IDENTIFIER');
            $table->date('SENT_DATE');
            $table->time('SENT_TIME');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ot_send_sms');
    }
}

