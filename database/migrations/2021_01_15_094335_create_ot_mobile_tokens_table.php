<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtMobileTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_mobile_tokens', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('CODE', 5);
            $table->integer('USER_ID')->unsigned();
            $table->tinyInteger('USED')->default(0);
            $table->tinyInteger('STATUS')->default(1);
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
        Schema::dropIfExists('ot_mobile_tokens');
    }
}
