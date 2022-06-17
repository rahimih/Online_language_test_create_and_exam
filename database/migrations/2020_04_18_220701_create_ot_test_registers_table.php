<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtTestRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_test_registers', function (Blueprint $table) {
            $table->bigIncrements('TEST_REGISTER_ID');
            $table->integer('USER_ID');
            $table->integer('TESTS_ID');
            $table->dateTime('REGISTER_DATE');
            $table->tinyInteger('STATUS');
            $table->string('bank_type');
            $table->float('cash');
            $table->tinyInteger('OrderId');
            $table->tinyInteger('Amount');
            $table->string('SystemTraceNo');
            $table->string('RetrivalRefNo');
            $table->tinyInteger('ResCode');
            $table->string('ResCode_Description');
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
        Schema::dropIfExists('ot_test_registers');
    }
}
