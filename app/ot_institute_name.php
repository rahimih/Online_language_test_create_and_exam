<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_institute_name extends Model
{
    protected $table = 'ot_institute_names';
    protected $primaryKey = 'ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'INSTITUTE_NAME','INSTITUTE_CODE', 'MANAGER_NAME', 'ADDRESS','PHONE','MOBILE','COMMENT','LOGO','STAMP','SIGNATURE','VIEW_INSTITUTE','STATUS'
    ];
}
