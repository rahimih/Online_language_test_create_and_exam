<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtPackagesSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_packages_sections', function (Blueprint $table) {
            $table->bigIncrements('OT_PS_ID');
            $table->string('QUESTIONS_PACKAGES_ID');
            $table->string('PART_ID');
            $table->string('QUESTION_FROMS');
            $table->string('QUESTION_TOS');
            $table->string('PART_COUNT');
            $table->string('HTML_READING');
            $table->string('FILE_NAME');
            $table->string('FILE_KIND');
            $table->float('Listening_duration');
            $table->float('speaking_delay');
            $table->float('speaking_duration');
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
        Schema::dropIfExists('ot_packages_sections');
    }
}
