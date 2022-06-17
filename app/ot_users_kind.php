<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_users_kind extends Model
{
    //
    protected $table = 'ot_users_kinds';
    protected $primaryKey = 'KINDUSER_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USERKIND_DESC','STATUS'
    ];
}
