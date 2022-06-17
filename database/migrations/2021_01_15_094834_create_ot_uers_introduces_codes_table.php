<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtUersIntroducesCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_uers_introduces_codes', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->integer('USER_ID');
            $table->integer('INTRODUCE_CODE')->unsigned();
            $table->integer('INSTRUCTURES_ID')->unsigned();
            $table->integer('INSTITUTE_ID')->unsigned();
            $table->date('INSERT_DATE')->unsigned();
            $table->time('INSERT_TIME')->unsigned();
            $table->tinyInteger('STATUS')->default(1);
            $table->date('DISABLE_DATE')->unsigned();
            $table->time('DISABLE_TIME')->unsigned();
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
        Schema::dropIfExists('ot_uers_introduces_codes');
    }
}
