<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_main_test extends Model
{
    //
    use \App\Http\Traits\UsesUuid;

    protected $table = 'ot_main_tests';
    protected $primaryKey = 'MAINTEST_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'TYPE','LANGUAGES_ID','STATUS'
    ];

}
