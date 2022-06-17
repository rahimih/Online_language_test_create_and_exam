<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_questions_packages extends Model
{
    //
    protected $table = 'ot_questions_packages';
    protected $primaryKey = 'QUESTIONS_PACKAGES_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'QUESTIONS_PACKAGES_NAME','INSTITUTE_ID','MAINTESTS_ID','SUBGROUP_TEST_ID','SKILL_ID','QUESTIONS_COUNT','TOTAL_TEST_TIME','STATUS'
    ];


}
