<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_test_qpackage extends Model
{
    //
    protected $table = 'ot_test_qpackages';
    protected $primaryKey = 'TEST_Q_PACKAGES';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TEST_ID','SKILL_ID','Q_PACKAGES_ID','STATUS'
    ];

}
