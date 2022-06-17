<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtTestPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_test_parts', function (Blueprint $table) {
            $table->bigIncrements('TEST_PART_ID');
            $table->string('MAINTEST_ID ');
            $table->string('SKILL_ID');
            $table->string('PART_ID');
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
        Schema::dropIfExists('ot_test_parts');
    }
}
