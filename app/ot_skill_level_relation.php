<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_skill_level_relation extends Model
{
    //
    protected $table = 'ot_skill_level_relations';
    protected $primaryKey = 'skill_level_relation_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'unique_id','skill_id','skill_level_id','status'
    ];
}
