<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_speaking_correction extends Model
{
    //
    protected $table = 'ot_speaking_schedules';
    protected $primaryKey = 'SCHEDULES_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','FROM_DATE','TO_DATE','DAY_OF_WEEK','FROM_TIME','TO_TIME','DURATION_TIME','STATUS'
    ];

}
