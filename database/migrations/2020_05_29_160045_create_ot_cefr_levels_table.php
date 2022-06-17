<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtCefrLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_cefr_levels', function (Blueprint $table) {
            $table->bigIncrements('OT_CEFR_LEVEL_ID');
            $table->tinyInteger('LEVEL');
            $table->tinyInteger('LEVEL_NAME');
            $table->string('LEVEL_GROUP');
            $table->string('LEVEL_GROUP_NAME');
            $table->string('COMMENT');
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
        Schema::dropIfExists('ot_cefr_levels');
    }
}
