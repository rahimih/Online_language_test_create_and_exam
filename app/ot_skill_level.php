<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_skill_level extends Model
{
    //
    protected $table = 'ot_skill_levels';
    protected $primaryKey = 'skill_level_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unique_id','level_name','abs_name','status'
    ];

}
