<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_uers_introduces_code extends Model
{
    //
    protected $table = 'ot_uers_introduces_codes';
    protected $primaryKey = 'ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','INTRODUCE_CODE','INSTRUCTURES_ID','INSTITUTE_ID','INSERT_DATE','INSERT_TIME','STATUS'
    ];
}
