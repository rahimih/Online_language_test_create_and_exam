<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_parts_name extends Model
{
    //
    protected $table = 'ot_parts_names';
    protected $primaryKey = 'PART_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'PARTS_NAME','STATUS'
    ];
}
