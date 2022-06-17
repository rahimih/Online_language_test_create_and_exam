<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_test_part extends Model
{
    //
    protected $table = 'ot_test_parts';
    protected $primaryKey = 'TEST_PART_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MAINTEST_ID','SKILL_ID','PART_ID','STATUS'
    ];

}
