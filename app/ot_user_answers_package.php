<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_user_answers_package extends Model
{
    //
    protected $table = 'ot_user_answers_packages';
    protected $primaryKey = 'OT_USR_ANS_PACK_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','TESTS_ID','TEST_REGISTER_ID','TEST_U_START_ID','PACKAGES_ID','QUESTION_NUMBER','ANSWER','STATUS'
    ];
}
