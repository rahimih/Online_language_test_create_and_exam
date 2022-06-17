<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtPartQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_part_questions', function (Blueprint $table) {
            $table->bigIncrements('OT_PQ_ID');
            $table->string('OT_SP_ID');
            $table->string('QUESTION_NUMBER');
            $table->string('QUESTION');
            $table->string('SWITCH_COUNT');
            $table->string('status');
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
        Schema::dropIfExists('ot_part_questions');
    }
}
