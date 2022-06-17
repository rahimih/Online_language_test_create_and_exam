<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_speaking_schedule extends Model
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
        'USER_ID','FROM_DATE','TO_DATE','DURATION_TIME','STATUS'
    ];

}
