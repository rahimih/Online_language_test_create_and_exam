<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_skill_type extends Model
{
    //
    protected $table = 'ot_skill_types';
    protected $primaryKey = 'SKILL_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'SKILL_TYPE','HAVE_EXAM','STATUS'
    ];
}
