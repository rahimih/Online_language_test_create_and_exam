<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_questions_type extends Model
{
    //
    protected $table = 'ot_questions_types';
    protected $primaryKey = 'QUESTION_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'QUESTIONS_TYPE','HEADER','STATUS'
    ];

}
