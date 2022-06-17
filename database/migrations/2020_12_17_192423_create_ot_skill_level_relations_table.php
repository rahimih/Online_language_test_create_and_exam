<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOtSkillLevelRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ot_skill_level_relations', function (Blueprint $table) {
            $table->bigIncrements('skill_level_relation_id');
            $table->string('unique_id');
            $table->integer('skill_id');
            $table->integer('skill_level_id');
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
        Schema::dropIfExists('ot_skill_level_relations');
    }
}
