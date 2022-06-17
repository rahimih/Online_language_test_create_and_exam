<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_test_skill extends Model
{
    //
    protected $table = 'ot_test_skills';
    protected $primaryKey = 'TEST_SKILL_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MAINTEST_ID','SKILL_ID','Section_Numbers','Question_Numbers','Time_Period','STATUS'
    ];

}
