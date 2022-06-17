<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_packages_section extends Model
{
    //
    protected $table = 'ot_packages_sections';
    protected $primaryKey = 'OT_PS_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'QUESTIONS_PACKAGES_ID','PART_ID','QUESTION_FROMS','QUESTION_TOS','PART_COUNT','HTML_READING','FILE_NAME','FILE_KIND','Listening_duration','speaking_delay','speaking_duration','STATUS'
    ];

}
