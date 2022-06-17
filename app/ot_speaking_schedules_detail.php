<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_speaking_schedules_detail extends Model
{
    //
    protected $table = 'ot_speaking_schedules_details';
    protected $primaryKey = 'SCHEDULES_DETAILS_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'SCHEDULES_ID','DAY_OF_WEEK','FROM_TIME','TO_TIME','STATUS'
    ];

}
