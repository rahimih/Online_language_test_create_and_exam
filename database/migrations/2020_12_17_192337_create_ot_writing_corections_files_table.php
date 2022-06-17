<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtWritingCorectionsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_writing_corections_files', function (Blueprint $table) {
            $table->bigIncrements('WRITING_FILES_ID');
            $table->integer('USER_ID');
            $table->integer('TESTS_ID');
            $table->integer('TEST_REGISTER_ID');
            $table->integer('TEST_U_START_ID');
            $table->tinyInteger('PART_NUMBER1');
            $table->tinyInteger('PART_NUMBER2');
            $table->tinyInteger('FILE_NUMBER');
            $table->binary('SEND_FILE');
            $table->string('FILES_LOCATIONS');
            $table->date('SEND_DATE');
            $table->time('SEND_TIME');
            $table->string('IPADRESS');
            $table->string('BROWSER_NAME');
            $table->float('GRADE');
            $table->string('COMMENTS');
            $table->string('CORRECTION_LOCATION_FILE');
            $table->binary('CORRECTION_FILE');
            $table->date('CORRECTION_SEND_DATE');
            $table->time('CORRECTION_SEND_TIME');
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
        Schema::dropIfExists('ot_writing_corections_files');
    }
}
