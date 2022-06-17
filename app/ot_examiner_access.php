<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_examiner_access extends Model
{
    //
    protected $table = 'ot_examiner_access';
    protected $primaryKey = 'ot_examiner_access_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'EXAMINER_ID','LANGUAGE_ID','MAIN_TEST_ID','SUB_TEST_ID','SKILL_ID','PART_ID','STATUS'
    ];





}
