<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtExaminerAccessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_examiner_accesses', function (Blueprint $table) {
            $table->bigIncrements('ot_examiner_access_id');
            $table->integer('EXAMINER_ID');
            $table->smallInteger('LANGUAGE_ID');
            $table->smallInteger('MAIN_TEST_ID');
            $table->smallInteger('SUB_TEST_ID');
            $table->smallInteger('SKILL_ID');
            $table->smallInteger('PART_ID');
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
        Schema::dropIfExists('ot_examiner_accesses');
    }
}
