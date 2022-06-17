<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtCefrScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_cefr_scores', function (Blueprint $table) {
            $table->bigIncrements('CEFR_SCORE_ID');
            $table->tinyInteger('MAIN_TEST_ID');
            $table->tinyInteger('OT_CEFR_LEVEL_ID');
            $table->float('SCORE_FROM');
            $table->float('SCORE_TO');
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
        Schema::dropIfExists('ot_cefr_scores');
    }
}
