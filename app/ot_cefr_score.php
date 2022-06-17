<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_cefr_score extends Model
{
    protected $table = 'ot_cefr_scores';
    protected $primaryKey = 'OT-CEFR_SCORE_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'MAIN_TEST_ID','OT_CEFR_LEVEL_ID', 'SCORE_FROM', 'SCORE_TO','STATUS'
    ];
}
