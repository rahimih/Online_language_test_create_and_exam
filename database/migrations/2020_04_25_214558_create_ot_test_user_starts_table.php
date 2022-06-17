<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtTestUserStartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_test_user_starts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('TEST_REGISTER_ID');
            $table->integer('USER_ID');
            $table->date('START_DATE');
            $table->string('START_TIME');
            $table->string('IPADRESS');
            $table->string('BROWSER_NAME');
            $table->string('Test_kind');
            $table->string('Answer_kind');
            $table->float('OEVRALL_SCORE');
            $table->tinyInteger('CEFR_LEVEL');
            $table->string('STATUS');
            $table->string('Speaking_status');
            $table->date('Speaking_start_date');
            $table->string('Speaking_start_time');
            $table->string('Writing_code1');
            $table->string('Writing_code2');
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
        Schema::dropIfExists('ot_test_user_starts');
    }
}
