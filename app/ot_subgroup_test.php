<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_subgroup_test extends Model
{
    //
    protected $table = 'ot_subgroup_tests';
    protected $primaryKey = 'SUBGROUP_TEST_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MAIN_TEST_ID','SUBGROUP_TEST_NAME','STATUS'
    ];

}
