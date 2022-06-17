<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_user_answer_skills_qt extends Model
{
    //
    protected $table = 'ot_user_answer_skills_qts';
    protected $primaryKey = 'TEST_U_SQT_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TEST_U_ANS_SKILL_ID','TEST_U_START_ID','SKILL_ID','PART_ID','QUESTION_TYPE_ID','CORRECT_ANSWER','QUESTION_NUMBERS','Comment','STATUS'
    ];
}
