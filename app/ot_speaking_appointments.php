<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_speaking_appointments extends Model
{
    //
    protected $table = 'ot_speaking_appointments';
    protected $primaryKey = 'APPOINTMENT_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','TESTS_ID','TEST_REGISTER_ID','TEST_U_START_ID','TEACHER_ID','TAKEN_DATE','DAY_OF_WEEK','TAKEN_DATE_SH','TAKEN_TIME','IPADRESS','BROWSER_NAME','STATUS'
    ];

}
