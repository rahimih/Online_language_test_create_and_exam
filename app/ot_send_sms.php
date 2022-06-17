<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_send_sms extends Model
{
    //
    protected $table = 'ot_send_sms';
    protected $primaryKey = 'ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','RECEPTOR','TEXT','RESULT','IDENTIFIER','SENT_DATE','SENT_TIME'
    ];
}
