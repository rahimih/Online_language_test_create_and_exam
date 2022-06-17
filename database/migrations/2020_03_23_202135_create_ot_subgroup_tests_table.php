<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtSubgroupTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_subgroup_tests', function (Blueprint $table) {
            $table->bigIncrements('SUBGROUP_TEST_ID');
            $table->string('SUBGROUP_TEST_NAME');
            $table->string('MAIN_TEST_ID');
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
        Schema::dropIfExists('ot_subgroup_tests');
    }
}
