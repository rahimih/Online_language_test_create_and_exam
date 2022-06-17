<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_test_register extends Model
{
    //
    protected $table = 'ot_test_registers';
    protected $primaryKey = 'TEST_REGISTER_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','TESTS_ID','REGISTER_DATE','STATUS','bank_type','cash','OrderId','Amount','SystemTraceNo','RetrivalRefNo','ResCode','ResCode_Description'
    ];
}
