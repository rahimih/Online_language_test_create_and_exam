<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_user_answer_skill extends Model
{
    //
    protected $table = 'ot_user_answer_skills';
    protected $primaryKey = 'TEST_U_ANS_SKILL_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TEST_U_START_ID','SKILL_ID','CORRECT_ANSWER','GRADE','STATUS'
    ];
}
