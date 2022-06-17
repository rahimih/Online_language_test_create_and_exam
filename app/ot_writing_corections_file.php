<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ot_writing_corections_file extends Model
{
    //
    protected $table = 'ot_writing_corections_files';
    protected $primaryKey = 'WRITING_FILES_ID';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'USER_ID','TESTS_ID','TEST_REGISTER_ID','TEST_U_START_ID','PART_NUMBER1','PART_NUMBER2','FILE_NUMBER','SEND_FILE','FILES_LOCATIONS','SEND_DATE','SEND_TIME','IPADRESS','BROWSER_NAME','GRADE','COMMENTS','CORRECTION_LOCATION_FILE','CORRECTION_FILE','CORRECTION_SEND_DATE','CORRECTION_SEND_TIME','STATUS'
    ];

}
