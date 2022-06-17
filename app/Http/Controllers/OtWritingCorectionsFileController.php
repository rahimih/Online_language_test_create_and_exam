<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\ot_skill_level;
use App\ot_skill_level_grade;
use App\ot_skill_level_relation;
use App\ot_test_user_start;
use App\ot_writing_corections_file;
use App\ot_examiner_access;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtWritingCorectionsFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $User_id=  Auth::user()->id;
        $ot_examiner_access= ot_examiner_access::where('EXAMINER_ID','=',$User_id)->where('SKILL_ID','=','3')->where('STATUS','=','1')->first();

        if ($ot_examiner_access) {
            $return = 1;
            $lang_id = $ot_examiner_access->LANGUAGE_ID;
            $mt_id= $ot_examiner_access->MAIN_TEST_ID;
            $st_id= $ot_examiner_access->SUB_TEST_ID;
            $p_id= $ot_examiner_access->PART_ID;
            if ($lang_id==0)
                $lang_op= ">";
            else
                $lang_op= "=";

            if ($mt_id==0)
                $mt_op= ">";
            else
                $mt_op= "=";

            if ($st_id==0)
                $st_op= ">";
            else
                $st_op= "=";

            if ($p_id==0)
                $sp_op= ">";
            else
                $sp_op= "=";


            $ot_writing_corections_files = ot_writing_corections_file::leftjoin('ot_users', 'USER_ID', '=', 'ot_users.id')->
            leftjoin('ot_parts_names', 'PART_NUMBER', '=', 'ot_parts_names.PART_ID')->
            leftjoin('ot_test_defines', 'ot_writing_corections_files.TESTS_ID', '=', 'ot_test_defines.TESTS_ID')->
            leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
            leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
            where('ot_writing_corections_files.STATUS', '=', '1')->where('LANGUAGES_ID',$lang_op,$lang_id)->
            where('ot_test_defines.MAIN_TEST_ID',$mt_op,$mt_id)->where('ot_test_defines.SUBGROUP_TEST_ID',$st_op,$st_id)->where('PART_ID',$sp_op,$p_id)->
            get(['WRITING_FILES_ID', 'PART_NUMBER', 'FILE_NUMBER', 'FILES_LOCATIONS', 'SEND_DATE', 'SEND_TIME', 'ot_users.fname', 'ot_users.lname', 'ot_parts_names.PARTS_NAME', 'ot_test_defines.TESTS_NAME', 'ot_main_tests.TYPE', 'ot_subgroup_tests.SUBGROUP_TEST_NAME']);

            return view('Examiner.Writing_CS_Users', compact('ot_writing_corections_files','return'));
        }

        else
        {
            $return = 2;
            return view('Examiner.Writing_CS_Users', compact('return'));
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_wv()
    {
        //
        $User_id=  Auth::user()->id;

        $ot_examiner_access= ot_examiner_access::where('EXAMINER_ID','=',$User_id)->where('SKILL_ID','=','3')->where('STATUS','=','1')->first();
        if ($ot_examiner_access) {
            $return = 1;
            $lang_id = $ot_examiner_access->LANGUAGE_ID;
            $mt_id= $ot_examiner_access->MAIN_TEST_ID;
            $st_id= $ot_examiner_access->SUB_TEST_ID;
            $p_id= $ot_examiner_access->PART_ID;
            if ($lang_id==0)
                $lang_op= ">";
            else
                $lang_op= "=";

            if ($mt_id==0)
                $mt_op= ">";
            else
                $mt_op= "=";

            if ($st_id==0)
                $st_op= ">";
            else
                $st_op= "=";

            if ($p_id==0)
                $sp_op= ">";
            else
                $sp_op= "=";


            $ot_writing_corections_files = ot_writing_corections_file::leftjoin('ot_users', 'USER_ID', '=', 'ot_users.id')->
            leftjoin('ot_parts_names', 'PART_NUMBER', '=', 'ot_parts_names.PART_ID')->
            leftjoin('ot_test_defines', 'ot_writing_corections_files.TESTS_ID', '=', 'ot_test_defines.TESTS_ID')->
            leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
            leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
            where('ot_writing_corections_files.STATUS', '=', '2')->where('LANGUAGES_ID',$lang_op,$lang_id)->
            where('ot_test_defines.MAIN_TEST_ID',$mt_op,$mt_id)->where('ot_test_defines.SUBGROUP_TEST_ID',$st_op,$st_id)->where('PART_ID',$sp_op,$p_id)->
            get(['WRITING_FILES_ID', 'PART_NUMBER', 'FILE_NUMBER', 'FILES_LOCATIONS', 'CORRECTION_SEND_DATE', 'CORRECTION_SEND_TIME', 'ot_users.fname', 'ot_users.lname', 'ot_parts_names.PARTS_NAME', 'ot_test_defines.TESTS_NAME', 'ot_main_tests.TYPE', 'ot_subgroup_tests.SUBGROUP_TEST_NAME','GRADE']);

            return view('Examiner.Writing_CS_View', compact('ot_writing_corections_files','return'));
        }

        else
        {
            $return = 2;
            return view('Examiner.Writing_CS_View', compact('return'));
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_C()
    {
        //
            $User_id= Auth::user()->id;
            $ot_writing_corections_files = ot_writing_corections_file::leftjoin('ot_parts_names', 'PART_NUMBER', '=', 'ot_parts_names.PART_ID')->
            leftjoin('ot_test_defines', 'ot_writing_corections_files.TESTS_ID', '=', 'ot_test_defines.TESTS_ID')->
            leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
            leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
            where('ot_writing_corections_files.STATUS', '=', '2')->where('USER_ID','=',$User_id)->
            get(['WRITING_FILES_ID', 'FILE_NUMBER', 'FILES_LOCATIONS', 'SEND_DATE', 'GRADE', 'ot_parts_names.PARTS_NAME', 'ot_test_defines.TESTS_NAME', 'ot_main_tests.TYPE', 'ot_subgroup_tests.SUBGROUP_TEST_NAME']);

            return view('Candidate.Writing_CS_View', compact('ot_writing_corections_files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $wEid = Auth::user()->id;
        $wi = $request->input('wi');
        $wid = $request->input('wid');
        $t_grade = 0;
        $ot_writing_corections_files = ot_writing_corections_file::find($wid);
        $WUSER_ID = $ot_writing_corections_files->USER_ID;
        $Wtid = $ot_writing_corections_files->TESTS_ID;
        $Wtrid = $ot_writing_corections_files->TEST_REGISTER_ID;
        $Wtusid = $ot_writing_corections_files->TEST_U_START_ID;
        //---------------------
        for ($j=1;$j<$wi;$j++) {
            $num = (string)$j;
            $slr_id = "slr_id".$num;
            $grade = "grade".$num;
            $comment = "Comment".$num;
            $ot_skill_level_grades = new ot_skill_level_grade();
            $ot_skill_level_grades->USER_ID = $WUSER_ID;
            $ot_skill_level_grades->TESTS_ID = $Wtid;
            $ot_skill_level_grades->TEST_REGISTER_ID = $Wtrid;
            $ot_skill_level_grades->TEST_U_START_ID = $Wtusid;
            $ot_skill_level_grades->WRITING_FILES_ID = $wid;
            $ot_skill_level_grades->skill_level_relation_id = $request->get($slr_id);
            $ot_skill_level_grades->GRADE = $request->get($grade);
            $ot_skill_level_grades->COMMENT = $request->get($comment);
            $ot_skill_level_grades->STATUS = '1';
            $ot_skill_level_grades->save();
            $t_grade = $t_grade+$request->get($grade);
        }
        $t_grade = $t_grade / ($wi-1);
        if (($t_grade-floor($t_grade))<0.5)
            $t_grade= floor($t_grade);
        if (($t_grade-floor($t_grade))>=0.5)
            $t_grade= (floor($t_grade))+0.5;
        //----------------------------
        if ($request->hasFile('wfile')) {
            $writing_file = $request->file('wfile');
            $filename = $writing_file->getClientOriginalName();
            $location = storage_path('documents/' . $WUSER_ID . '/WCS/' . $Wtrid . '/correction_files/');
            $writing_file->move($location, $filename);
            //---------------
            $ot_writing_corections_files = ot_writing_corections_file::find($wid);
            $ot_writing_corections_files->GRADE = $t_grade;
            $ot_writing_corections_files->COMMENTS = $request->get('O_Comment');
            $ot_writing_corections_files->CORRECTION_LOCATION_FILE = $filename;
            $ot_writing_corections_files->CORRECTION_FILE = $writing_file;
            $ot_writing_corections_files->CORRECTION_TEACHER_ID = $wEid;
            $ot_writing_corections_files->CORRECTION_SEND_DATE = date("Y-m-d");
            $ot_writing_corections_files->CORRECTION_SEND_TIME = date("h:i:s");
            $ot_writing_corections_files->STATUS = '2';
            $ot_writing_corections_files->save();
        }
        return  $this->index();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ot_writing_corections_file  $ot_writing_corections_file
     * @return \Illuminate\Http\Response
     */
    public function show(ot_writing_corections_file $ot_writing_corections_file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ot_writing_corections_file  $ot_writing_corections_file
     * @return \Illuminate\Http\Response
     */
    public function edit(ot_writing_corections_file $ot_writing_corections_file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ot_writing_corections_file  $ot_writing_corections_file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ot_writing_corections_file $ot_writing_corections_file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ot_writing_corections_file  $ot_writing_corections_file
     * @return \Illuminate\Http\Response
     */
    public function destroy(ot_writing_corections_file $ot_writing_corections_file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download_file($id)
    {
        $ot_writing_corections_files = ot_writing_corections_file::find($id);
        $filename= $ot_writing_corections_files->FILES_LOCATIONS;
        $User_id=$ot_writing_corections_files->USER_ID;
        $TEST_ID=$ot_writing_corections_files->TEST_REGISTER_ID;


        $file_path = storage_path() . "/documents/" .$User_id . "/WCS/" .$TEST_ID ."/orginal_files/". $filename;
        $headers = array(
            'Content-Type: docx',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download_files($id)
    {
        $ot_writing_corections_files = ot_writing_corections_file::find($id);
        $filename= $ot_writing_corections_files->CORRECTION_LOCATION_FILE;
        $User_id=$ot_writing_corections_files->USER_ID;
        $TEST_ID=$ot_writing_corections_files->TEST_REGISTER_ID;


        $file_path = storage_path() . "/documents/" .$User_id . "/WCS/" .$TEST_ID ."/correction_files/". $filename;
        $headers = array(
            'Content-Type: docx',
            'Content-Disposition: attachment; filename='.$filename,
        );
        if ( file_exists( $file_path ) ) {
            // Send Download
            return \Response::download( $file_path, $filename, $headers );
        } else {
            // Error
            exit( 'Requested file does not exist on our server!' );
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function comment($id)
    {
        $i=1;
        $ot_writing_corections_files = ot_writing_corections_file::find($id);
        $filename= $ot_writing_corections_files->FILES_LOCATIONS;
        $User_id=$ot_writing_corections_files->USER_ID;
        $TEST_ID=$ot_writing_corections_files->TEST_REGISTER_ID;
        $ot_user = User::where('id','=',$User_id)->get();

        //--------------
        $ot_skill_level_relations = ot_skill_level_relation::leftjoin('ot_skill_levels','ot_skill_level_relations.skill_level_id','=','ot_skill_levels.skill_level_id')->where('skill_id','=','3')->where('ot_skill_level_relations.status','=','1')->where('ot_skill_levels.status','=','1')->get(['skill_level_relation_id','level_name','abs_name']);

        return view('Examiner.Writing_CS_Grade', compact('ot_user','ot_skill_level_relations','filename','id','i'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Resaults($id)
    {
        $User_id= Auth::user()->id;

        $ot_test_user_starts = ot_test_user_start::leftjoin('ot_test_registers','ot_test_user_starts.TEST_REGISTER_ID','=','ot_test_registers.TEST_REGISTER_ID')->
        leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        leftjoin('ot_writing_corections_files','ot_writing_corections_files.TEST_U_START_ID','=','ot_test_user_starts.ID')->where('WRITING_FILES_ID','=',$id)->
        where('ot_test_registers.status','=','2')->where('ot_test_registers.USER_ID','=',$User_id)->where('ot_test_user_starts.USER_ID','=',$User_id)->
        get(['ot_test_defines.TESTS_NAME','ot_test_user_starts.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME']);

        $ot_skill_level_grades = ot_skill_level_grade::leftjoin('ot_skill_level_relations','ot_skill_level_grades.skill_level_relation_id','=','ot_skill_level_relations.skill_level_relation_id')->leftjoin('ot_skill_levels','ot_skill_level_relations.skill_level_id','=','ot_skill_levels.skill_level_id')->
        where('USER_ID','=',$User_id)->where('WRITING_FILES_ID','=',$id)->get(['level_name','GRADE','COMMENT','abs_name']);

        $ot_writing_corections_files = ot_writing_corections_file::where('WRITING_FILES_ID','=',$id)->where('USER_ID','=',$User_id)->get();

        $chart_w = new UserChart();
        $chart_w->labels($ot_skill_level_grades->pluck('abs_name'));
        $chart_w->dataset(' SCORE ', 'bar',$ot_skill_level_grades->pluck('GRADE'))->options([
            'fill' => 'true',
            'borderColor' => 'white' ,
            'backgroundColor' =>   [
                'rgba(216, 27, 96, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(29, 233, 182, 0.6)',
                'rgba(156, 39, 176, 0.6)',
                'rgba(84, 110, 122, 0.6)'] ,
            'responsive' => 'true',
        ]);

        return view('Candidate.TRF_Writing_Report', compact('ot_writing_corections_files','ot_skill_level_grades','ot_test_user_starts','chart_w'));

    }

    public function Print()
    {

    }

    public function pdf()
    {

    }

    public function Email()
    {

    }

}
