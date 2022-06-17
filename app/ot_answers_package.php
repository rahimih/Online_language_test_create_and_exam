<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_answers_package extends Model
{
    //
    protected $table = 'ot_answers_packages';
    protected $primaryKey = 'OT_ANS_PACK_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PACKAGES_ID','QUESTION_NUMBER','ANSWER','ANSWER2','ANSWER3','STATUS'
    ];
}
