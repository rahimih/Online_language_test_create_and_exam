<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_introduce_code extends Model
{
    //
    protected $table = 'ot_introduce_codes';
    protected $primaryKey = 'INTRODUCE_CODE_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'INTRODUCE_CODE','INTRODUCE_CODE_KIND','INSTRUCTURES_ID','STATUS'
    ];
}
