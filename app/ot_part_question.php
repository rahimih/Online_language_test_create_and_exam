<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_part_question extends Model
{
    //
    protected $table = 'ot_part_questions';
    protected $primaryKey = 'OT_PQ_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'OT_SP_ID','QUESTION_NUMBER','QUESTION','SWITCH_COUNT','STATUS'
    ];

}
