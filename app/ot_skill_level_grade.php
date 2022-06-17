<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_skill_level_grade extends Model
{
    //
    protected $table = 'ot_skill_level_grades';
    protected $primaryKey = 'skill_level_grade_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','TESTS_ID','TEST_REGISTER_ID','TEST_U_START_ID','WRITING_FILES_ID','skill_level_relation_id','GRADE','COMMENT','STATUS'
    ];

}
