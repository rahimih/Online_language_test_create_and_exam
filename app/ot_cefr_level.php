<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_cefr_level extends Model
{
    protected $table = 'ot_cefr_levels';
    protected $primaryKey = 'OT_CEFR_LEVEL_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'LEVEL','LEVEL_NAME', 'LEVEL_GROUP', 'LEVEL_GROUP_NAME','COMMENT','STATUS'
    ];
}
