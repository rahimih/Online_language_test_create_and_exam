<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtSectionPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_section_parts', function (Blueprint $table) {
            $table->bigIncrements('OT_SP_ID');
            $table->string('OT_PS_ID');
            $table->string('QUESTION_TYPE_ID');
            $table->string('QUESTION_FROMP');
            $table->string('QUESTION_TOP');
            $table->string('HTML_READING');
            $table->string('HEADER');
            $table->string('HTML_QUESTIONS');
            $table->string('FILE_NAME');
            $table->string('FILE_KIND');
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
        Schema::dropIfExists('ot_section_parts');
    }
}
