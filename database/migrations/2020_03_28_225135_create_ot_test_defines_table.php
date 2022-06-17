<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtTestDefinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_test_defines', function (Blueprint $table) {
            $table->bigIncrements('TESTS_ID');
            $table->string('TESTS_NAME');
            $table->integer('INSTITUTE_ID');
            $table->integer('MAIN_TEST_ID');
            $table->integer('SUBGROUP_TEST_ID');
            $table->date('START_DATE_VIEW');
            $table->date('END_DATE_VIEW');
            $table->time('START_TIME');
            $table->float('test_cost_R');
            $table->float('test_cost_U');
            $table->tinyInteger('Skill_kind');
            $table->tinyInteger('Writing_corrections_part1');
            $table->tinyInteger('Writing_corrections_part2');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('ot_test_defines');
    }
}
