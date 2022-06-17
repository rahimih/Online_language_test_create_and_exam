<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtTestQpackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_test_qpackages', function (Blueprint $table) {
            $table->bigIncrements('TEST_Q_PACKAGES');
            $table->integer('TEST_ID');
            $table->integer('SKILL_ID');
            $table->integer('Q_PACKAGES_ID');
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
        Schema::dropIfExists('ot_test_qpackages');
    }
}
