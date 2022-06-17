<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_test_user_start extends Model
{
    protected $table = 'ot_test_user_starts';
    protected $primaryKey = 'ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TEST_REGISTER_ID','TEST_ID','USER_ID','START_DATE','START_TIME','IPADRESS','BROWSER_NAME','Test_kind','Answer_kind','OEVRALL_SCORE','CEFR_LEVEL','STATUS','Speaking_status','Speaking_start_date','Speaking_start_time','Writing_code1','Writing_code2'
    ];
}
