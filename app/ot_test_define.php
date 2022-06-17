<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_test_define extends Model
{
    //
    protected $table = 'ot_test_defines';
    protected $primaryKey = 'TESTS_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TESTS_NAME','INSTITUTE_ID','MAIN_TEST_ID','SUBGROUP_TEST_ID','START_DATE_VIEW','END_DATE_VIEW','START_TIME','test_cost_R','test_cost_U','Skill_kind','Writing_corrections_part1','Writing_corrections_part2','status'
    ];

}
