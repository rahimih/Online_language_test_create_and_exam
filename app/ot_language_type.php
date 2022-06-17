<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_language_type extends Model
{
    //
    protected $table = 'ot_language_types';
    protected $primaryKey = 'LANGUAGE_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'LANGUAGE_NAME','STATUS'
    ];

}
