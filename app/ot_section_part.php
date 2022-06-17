<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_section_part extends Model
{
    //
    protected $table = 'ot_section_parts';
    protected $primaryKey = 'OT_SP_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'OT_PS_ID','QUESTION_TYPE_ID','QUESTION_FROMP','QUESTION_TOP','HTML_READINGS','HEADER','HTML_QUESTIONS','FILE_NAMES','FILE_KINDS','STATUS'

    ];

}
