<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtAnstitudeNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_anstitude_names', function (Blueprint $table) {
            $table->bigIncrements('ID');
            $table->string('ANESTITUDE_NAME');
            $table->integer('INESTITUDE_CODE');
            $table->string('MANAGER_NAME');
            $table->string('ADRESS');
            $table->string('PHONE');
            $table->string('MOBILE');
            $table->string('COMMENT');
            $table->binary('LOGO');
            $table->binary('STAMP');
            $table->binary('SIGNATURE');
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
        Schema::dropIfExists('ot_anstitude_names');
    }
}
