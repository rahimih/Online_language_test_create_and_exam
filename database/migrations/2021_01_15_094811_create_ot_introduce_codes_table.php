<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtIntroduceCodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_introduce_codes', function (Blueprint $table) {
            $table->bigIncrements('INTRODUCE_CODE_ID');
            $table->integer('INTRODUCE_CODE')->unsigned();
            $table->tinyInteger('INTRODUCE_CODE_KIND');
            $table->integer('INSTRUCTURES_ID')->unsigned();
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
        Schema::dropIfExists('ot_introduce_codes');
    }
}
