<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_test_grade extends Model
{
    //
    protected $table = 'ot_test_grades';
    protected $primaryKey = 'TEST_GRADE_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MAIN_TEST_ID','SUBGROUP_TEST_ID','SKILL_ID','QUESTION_FROM','QUESTION_TO','GRADE','DATE_FROM','DATE_TO','STATUS'
    ];
}
