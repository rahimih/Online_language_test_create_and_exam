<?php

namespace App\Http\Controllers;

use App\ot_cefr_score;
use App\ot_packages_section;
use App\ot_section_part;
use App\ot_send_sms;
use App\ot_speaking_appointments;
use App\ot_speaking_schedule;
use App\ot_speaking_schedules;
use App\ot_test_grade;
use App\ot_test_qpackage;
use App\ot_test_user_start;
use App\ot_user_answer_skill;
use App\ot_user_answer_skills_part;
use App\ot_user_answer_skills_qt;
use App\ot_user_answers_package;
use App\ot_test_register;
use App\ot_writing_corections_file;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Integer;

class OtTestUserStartController extends Controller
{
    public  $skill=0;
    public  $skillr=0;
    public  $skillw=0;
    public  $skills=0;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $Tid1,$Tid2
     * @return \Illuminate\Http\Response
     */
    public function Confirm($Tid1,$Tid2)
    {
        $USER_ID = Auth::user()->id;
        $ot_test_registers = ot_test_register::leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('ot_test_registers.TEST_REGISTER_ID','=',$Tid1)->where('ot_test_registers.status','=','2')->where('ot_test_registers.USER_ID','=',$USER_ID)->where('ot_test_registers.TESTS_ID','=',$Tid2)->
        get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME','REGISTER_DATE','ot_test_registers.TEST_REGISTER_ID','ot_main_tests.MAINTEST_ID','ot_subgroup_tests.SUBGROUP_TEST_ID']);

        $ot_test_qpackages = ot_test_qpackage::leftjoin('ot_test_skills','ot_test_qpackages.SKILL_ID','=','ot_test_skills.SKILL_ID')->leftjoin('ot_skill_types','ot_test_qpackages.SKILL_ID','=','ot_skill_types.SKILL_ID')->where('ot_test_qpackages.TEST_ID','=',$Tid2)->where('ot_test_qpackages.SKILL_ID','!=','4')->get();

        //---------
        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Internet Explorer';
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $browser = 'Mozilla Firefox';
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $browser = 'Google Chrome';
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $browser = 'Apple Safari';
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Opera';
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $browser = 'Netscape';
        }
        //------------
        if  (($browser == 'Mozilla Firefox') || (  $browser == 'Google Chrome'))
        {
            return view('Candidate.Test_Start', compact('ot_test_registers','ot_test_qpackages'));
        }
        else
        {
            return view('Candidate.Error_page');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $Tid1,$Tid2
     * @return \Illuminate\Http\Response
     */
    public function WritingConfirm($Tid1,$Tid2)
    {
        $USER_ID = Auth::user()->id;
        $ot_test_registers = ot_test_register::leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_main_tests.status','=','3')->
        where('ot_test_registers.TEST_REGISTER_ID','=',$Tid1)->where('ot_test_registers.status','=','2')->where('ot_test_registers.USER_ID','=',$USER_ID)->where('ot_test_registers.TESTS_ID','=',$Tid2)->
        get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME','REGISTER_DATE','ot_test_registers.TEST_REGISTER_ID','ot_main_tests.MAINTEST_ID','ot_subgroup_tests.SUBGROUP_TEST_ID']);

        //---------
        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Internet Explorer';
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $browser = 'Mozilla Firefox';
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $browser = 'Google Chrome';
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $browser = 'Apple Safari';
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Opera';
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $browser = 'Netscape';
        }
        //------------
        if  (($browser == 'Mozilla Firefox') || (  $browser == 'Google Chrome'))
        {
            return view('Candidate.Writing_Correction_Start', compact('ot_test_registers'));
        }
        else
        {
            return view('Candidate.Error_page');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param int $Tid1,$Tid2
     * @return \Illuminate\Http\Response
     */
    public function SpeakingConfirm($Tid1,$Tid2)
    {

        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Internet Explorer';
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $browser = 'Mozilla Firefox';
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $browser = 'Google Chrome';
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $browser = 'Apple Safari';
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Opera';
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $browser = 'Netscape';
        }
        //------------
        if  (($browser == 'Mozilla Firefox') || (  $browser == 'Google Chrome'))
        {
            $USER_ID = Auth::user()->id;
            $i=1;
            //*************
            $ot_speaking_appointments= ot_speaking_appointments::where('USER_ID','=',$USER_ID)->where('TEST_REGISTER_ID','=',$Tid1)->where('TEST_ID','=',$Tid2)->where('STATUS','=','1')->first();
            if (!$ot_speaking_appointments)
            {
                //-------set appointment for speaking test
                $ot_test_registers = ot_test_register::leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_registers.TESTS_ID')->
                leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
                leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
                leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
                where('ot_test_registers.TEST_REGISTER_ID','=',$Tid1)->where('ot_test_registers.status','=','2')->where('ot_test_registers.USER_ID','=',$USER_ID)->where('ot_test_registers.TESTS_ID','=',$Tid2)->
                get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME','REGISTER_DATE','ot_test_registers.TEST_REGISTER_ID','ot_main_tests.MAINTEST_ID','ot_subgroup_tests.SUBGROUP_TEST_ID']);

                $ot_test_qpackages = ot_test_qpackage::leftjoin('ot_test_skills','ot_test_qpackages.SKILL_ID','=','ot_test_skills.SKILL_ID')->leftjoin('ot_skill_types','ot_test_qpackages.SKILL_ID','=','ot_skill_types.SKILL_ID')->where('ot_test_qpackages.TEST_ID','=',$Tid2)->where('ot_test_qpackages.SKILL_ID','=','4')->get();


                return view ('Candidate.Speaking_Start_Appointment', compact('ot_test_registers','ot_test_qpackages','i'));

            }

            else
            {
                $ot_speaking_appointments= ot_speaking_appointments::leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_speaking_appointments.TEST_ID')->
                leftjoin('ot_test_registers', 'ot_speaking_appointments.TEST_REGISTER_ID', '=', 'ot_test_registers.TEST_REGISTER_ID')->
                leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
                leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
                leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
                where('ot_test_registers.status', '=', '2')->where('ot_test_registers.USER_ID', '=', $USER_ID)->where('ot_test_defines.status', '=', '1')->
                where('ot_speaking_appointments.USER_ID','=',$USER_ID)->where('ot_speaking_appointments.TEST_REGISTER_ID','=',$Tid1)->where('ot_speaking_appointments.TEST_ID','=',$Tid2)->where('ot_speaking_appointments.STATUS','=','1')->get();
                //------------  view and check date and time and if true then run speaking test / else show warning
                return view ('Candidate.Speaking_Appointment_View', compact('ot_speaking_appointments'));
            }
        }

        else
        {
            return view('Candidate.Error_page');
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $USER_ID = Auth::user()->id;
        $TEST_R_ID =$request->input('test_r_id');
        $TEST_ID =$request->input('test_id');
        if (($request->input('testkind')) == 'Practice Mode')
            $Test_kind = 1;
        else
            $Test_kind = 2;
        if (($request->input('answersheet')) == 'Test sheet')
            $Answer_kind = 1;
        else
            $Answer_kind = 2;

        $tn=$request->input('tn');
        $MT=$request->input('mt');
        $ST=$request->input('st');
        $kind=0;
        $i=1;
        $j=1;
        $IDT=0;
        $Writing_code=mt_rand(11000,99000);

        global  $skill;
        global  $skillr;
        global  $skills;
        global  $skillw;

        $skills=4;

        //----------check fo f5 button press
        $ot_test_user_starts = ot_test_user_start::where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('USER_ID','=',$USER_ID)->where('status','=','1')->first();
        if (!$ot_test_user_starts)
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP']))
                //check ip from share internet
                $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                //to check ip is pass from proxy
                $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else
                $ipAddress = $_SERVER['REMOTE_ADDR'];

                $u_agent = $_SERVER['HTTP_USER_AGENT'];

            if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
            {
                $browser = 'Internet Explorer';
            }
            elseif(preg_match('/Firefox/i',$u_agent))
            {
                $browser = 'Mozilla Firefox';
            }
            elseif(preg_match('/Chrome/i',$u_agent))
            {
                $browser = 'Google Chrome';
            }
            elseif(preg_match('/Safari/i',$u_agent))
            {
                $browser = 'Apple Safari';
            }
            elseif(preg_match('/Opera/i',$u_agent))
            {
                $browser = 'Opera';
            }
            elseif(preg_match('/Netscape/i',$u_agent))
            {
                $browser = 'Netscape';
            }

            $ot_test_user_starts = ot_test_user_start::where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('USER_ID','=',$USER_ID)->where('status','=','0')->first();
            if (!$ot_test_user_starts) {
                $ot_test_user_starts = new ot_test_user_start();
                $ot_test_user_starts->TEST_REGISTER_ID = $request->input('test_r_id');
                $ot_test_user_starts->TEST_ID = $request->input('test_id');
                $ot_test_user_starts->USER_ID = $USER_ID;
                $ot_test_user_starts->START_DATE = date("Y-m-d");
                $ot_test_user_starts->START_TIME = date("h:i:s");
                $ot_test_user_starts->IPADRESS = $ipAddress;
                $ot_test_user_starts->BROWSER_NAME = $browser;
                $ot_test_user_starts->Test_kind = $request->get('testkind');
                $ot_test_user_starts->Answer_kind = $request->get('answersheet');
                $ot_test_user_starts->Writing_code1 = $Writing_code.'a';
                $ot_test_user_starts->Writing_code2 = $Writing_code.'b';
                $ot_test_user_starts->STATUS = 1;
                $ot_test_user_starts->save();
                $IDT = $ot_test_user_starts->ID;
            }
            else
            {
                $IDT = $ot_test_user_starts->ID;
                $ot_test_user_starts = ot_test_user_start::find($IDT);
                $ot_test_user_starts->START_DATE = date("Y-m-d");
                $ot_test_user_starts->START_TIME = date("h:i:s");
                $ot_test_user_starts->IPADRESS = $ipAddress;
                $ot_test_user_starts->BROWSER_NAME = $browser;
                $ot_test_user_starts->Test_kind = $request->get('testkind');
                $ot_test_user_starts->Answer_kind = $request->get('answersheet');
                $ot_test_user_starts->Writing_code1 = $Writing_code.'a';
                $ot_test_user_starts->Writing_code2 = $Writing_code.'b';
                $ot_test_user_starts->STATUS = 1;
                $ot_test_user_starts->save();
            }

            $c_date = date("Y-m-d");
            $c_time = date("h:i");
            //---------------
            $ot_test_qpackages = ot_test_qpackage::leftjoin('ot_questions_packages', 'ot_test_qpackages.Q_PACKAGES_ID', '=', 'ot_questions_packages.QUESTIONS_PACKAGES_ID')->
            leftjoin('ot_test_skills', function ($join) {
                $join->on('ot_questions_packages.MAINTESTS_ID', '=', 'ot_test_skills.MAINTEST_ID')->on('ot_questions_packages.SKILL_ID', '=', 'ot_test_skills.SKILL_ID');
            })->where('ot_test_qpackages.TEST_ID', '=', $TEST_ID)->where('ot_test_qpackages.status', '=', '1')->where('ot_test_skills.status', '=', '1')->where('ot_questions_packages.status', '=', '1')->
            where('ot_test_skills.SKILL_ID', '!=', $skill)->where('ot_test_skills.SKILL_ID', '!=', $skillr)->where('ot_test_skills.SKILL_ID', '!=', $skillw)->where('ot_test_skills.SKILL_ID', '!=', $skills)->
            orderby('ot_test_skills.ORDERS', 'ASC')->first();

            $id2 = $ot_test_qpackages->QUESTIONS_PACKAGES_ID;
            $id3 = $ot_test_qpackages->SUBGROUP_TEST_ID;
            $time = $ot_test_qpackages->TOTAL_TEST_TIME;

            $max = ot_packages_section::where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('status', '=', '1')->max('QUESTION_TOS');
            $min = ot_packages_section::where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('status', '=', '1')->min('QUESTION_FROMS');

            $ot_packages_sections = ot_packages_section::leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('ot_packages_sections.status', '=', '1')->where('ot_parts_names.status', '=', '1')->get();

            $ot_section_parts = ot_section_part::leftjoin('ot_packages_sections', 'ot_section_parts.OT_PS_ID', 'ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->
            where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('ot_packages_sections.status', '=', '1')->where('ot_section_parts.status', '=', '1')->orderby('QUESTION_FROMP', 'ASC')->get();

            if ($ot_test_qpackages->SKILL_ID == 1) {
                return view('Candidate.Listening', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'i', 'j', 'time', 'IDT', 'MT', 'ST', 'max', 'min','Test_kind','Answer_kind','c_date','c_time'));
            } elseif ($ot_test_qpackages->SKILL_ID == 2) {
                if ($id3 == 2) {
                    $kind = 1;
                    return view('Candidate.Reading', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'kind', 'i', 'j', 'time', 'IDT', 'MT', 'ST', 'max', 'min','Test_kind','Answer_kind','c_date'));
                } elseif ($id3 == 1) {
                    $kind = 2;
                    $ot_section_parts2 = ot_section_part::leftjoin('ot_packages_sections', 'ot_section_parts.OT_PS_ID', 'ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->
                    where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('HTML_READINGS', '=', '')->where('ot_packages_sections.status', '=', '1')->where('ot_section_parts.status', '=', '1')->orderby('QUESTION_FROMP', 'ASC')->get();
                    return view('Candidate.Reading', compact('ot_packages_sections', 'ot_section_parts', 'ot_section_parts2', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'kind', 'i', 'time', 'IDT', 'MT', 'ST', 'max', 'min','Test_kind','Answer_kind','c_date'));
                }
            } elseif ($ot_test_qpackages->SKILL_ID == 3) {
                return view('Candidate.Writing', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'i', 'time', 'IDT', 'MT', 'ST','Writing_code'));
            } elseif ($ot_test_qpackages->SKILL_ID == 4) {
                return view('Candidate.Speaking', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'i','j', 'time', 'IDT', 'MT', 'ST'));
            }
        }
        else
        {
            return view('Candidate.Error_page');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function speaking_store(Request $request)
    {

        $USER_ID = Auth::user()->id;
        $TEST_R_ID =$request->input('test_r_id');
        $TEST_ID =$request->input('test_id');
        $tn=$request->input('tn');
        $MT=$request->input('mt');
        $ST=$request->input('st');
        $IDT=0;
        $i=1;
        $j=1;

        $skills=4;

        //----------check fo f5 button press
        $ot_test_user_starts = ot_test_user_start::where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('USER_ID','=',$USER_ID)->where('Speaking_status','=','1')->first();
        if (!$ot_test_user_starts)
        {
            if (!empty($_SERVER['HTTP_CLIENT_IP']))
                //check ip from share internet
                $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                //to check ip is pass from proxy
                $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else
                $ipAddress = $_SERVER['REMOTE_ADDR'];

            $u_agent = $_SERVER['HTTP_USER_AGENT'];

            if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
            {
                $browser = 'Internet Explorer';
            }
            elseif(preg_match('/Firefox/i',$u_agent))
            {
                $browser = 'Mozilla Firefox';
            }
            elseif(preg_match('/Chrome/i',$u_agent))
            {
                $browser = 'Google Chrome';
            }
            elseif(preg_match('/Safari/i',$u_agent))
            {
                $browser = 'Apple Safari';
            }
            elseif(preg_match('/Opera/i',$u_agent))
            {
                $browser = 'Opera';
            }
            elseif(preg_match('/Netscape/i',$u_agent))
            {
                $browser = 'Netscape';
            }
            $ot_test_user_starts = ot_test_user_start::where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('USER_ID','=',$USER_ID)->where('Speaking_status','=','1')->first();
            if (!$ot_test_user_starts)
            {
               //-----------
                $ot_test_user_starts = new ot_test_user_start();
                $ot_test_user_starts->TEST_REGISTER_ID = $request->input('test_r_id');
                $ot_test_user_starts->TEST_ID = $request->input('test_id');
                $ot_test_user_starts->USER_ID = $USER_ID;
                $ot_test_user_starts->IPADRESS = $ipAddress;
                $ot_test_user_starts->BROWSER_NAME = $browser;
                $ot_test_user_starts->Test_kind = 0;
                $ot_test_user_starts->Answer_kind = 0;
                $ot_test_user_starts->Speaking_start_date=date("Y-m-d");
                $ot_test_user_starts->Speaking_start_time=date("h:i:s");
                $ot_test_user_starts->Speaking_status=1;
                $ot_test_user_starts->save();
                $IDT = $ot_test_user_starts->ID;
            }
            else
            {
                $IDT = $ot_test_user_starts->ID;
                $ot_test_user_starts = ot_test_user_start::find($IDT);
                $ot_test_user_starts->Speaking_start_date=date("Y-m-d");
                $ot_test_user_starts->Speaking_start_time=date("h:i:s");
                $ot_test_user_starts->Speaking_status=1;
                $ot_test_user_starts->save();
            }
            //---------------
            $ot_test_qpackages = ot_test_qpackage::leftjoin('ot_questions_packages', 'ot_test_qpackages.Q_PACKAGES_ID', '=', 'ot_questions_packages.QUESTIONS_PACKAGES_ID')->
            leftjoin('ot_test_skills', function ($join) {
            $join->on('ot_questions_packages.MAINTESTS_ID', '=', 'ot_test_skills.MAINTEST_ID')->on('ot_questions_packages.SKILL_ID', '=', 'ot_test_skills.SKILL_ID');
            })->where('ot_test_qpackages.TEST_ID', '=', $TEST_ID)->where('ot_test_qpackages.status', '=', '1')->where('ot_test_skills.status', '=', '1')->where('ot_questions_packages.status', '=', '1')->
            where('ot_test_skills.SKILL_ID', '=', '4')->orderby('ot_test_skills.ORDERS', 'ASC')->first();

            $id2 = $ot_test_qpackages->QUESTIONS_PACKAGES_ID;
            $id3 = $ot_test_qpackages->SUBGROUP_TEST_ID;
            $time = $ot_test_qpackages->TOTAL_TEST_TIME;

            $max = ot_packages_section::where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('status', '=', '1')->max('QUESTION_TOS');
            $min = ot_packages_section::where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('status', '=', '1')->min('QUESTION_FROMS');

            $ot_packages_sections = ot_packages_section::leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('ot_packages_sections.status', '=', '1')->where('ot_parts_names.status', '=', '1')->get();

            $ot_section_parts = ot_section_part::leftjoin('ot_packages_sections', 'ot_section_parts.OT_PS_ID', 'ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->
            where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('ot_packages_sections.status', '=', '1')->where('ot_section_parts.status', '=', '1')->orderby('QUESTION_FROMP', 'ASC')->get();


            if ($ot_test_qpackages->SKILL_ID == 4) {
                return view('Candidate.Speaking', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'i','j', 'time', 'IDT', 'MT', 'ST'));
            }
        }
        else
        {
            return view('Candidate.Error_page');
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function writing_store(Request $request)
    {
        $USER_ID = Auth::user()->id;
        $TEST_R_ID = $request->input('test_r_id');
        $TEST_ID = $request->input('test_id');
        $c1 = $request->input('c1');
        $c2 = $request->input('c2');
        $Test_kind = 3;
        $Answer_kind = 3;
        $kind = 0;
        $i = 1;
        $j = 1;
        $IDT = 0;

        //----------check fo f5 button press
        $ot_test_user_starts = ot_test_user_start::where('TEST_REGISTER_ID', '=', $TEST_R_ID)->where('USER_ID', '=', $USER_ID)->where('status', '=', '1')->first();
        if (!$ot_test_user_starts) {
            if (!empty($_SERVER['HTTP_CLIENT_IP']))
                //check ip from share internet
                $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
                //to check ip is pass from proxy
                $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
            else
                $ipAddress = $_SERVER['REMOTE_ADDR'];

            $u_agent = $_SERVER['HTTP_USER_AGENT'];

            if (preg_match('/MSIE/i', $u_agent) && !preg_match('/Opera/i', $u_agent)) {
                $browser = 'Internet Explorer';
            } elseif (preg_match('/Firefox/i', $u_agent)) {
                $browser = 'Mozilla Firefox';
            } elseif (preg_match('/Chrome/i', $u_agent)) {
                $browser = 'Google Chrome';
            } elseif (preg_match('/Safari/i', $u_agent)) {
                $browser = 'Apple Safari';
            } elseif (preg_match('/Opera/i', $u_agent)) {
                $browser = 'Opera';
            } elseif (preg_match('/Netscape/i', $u_agent)) {
                $browser = 'Netscape';
            }

            $ot_test_user_starts = new ot_test_user_start();
            $ot_test_user_starts->TEST_REGISTER_ID = $request->input('test_r_id');
            $ot_test_user_starts->TEST_ID = $request->input('test_id');
            $ot_test_user_starts->USER_ID = $USER_ID;
            $ot_test_user_starts->START_DATE = date("Y-m-d");
            $ot_test_user_starts->START_TIME = date("h:i:s");
            $ot_test_user_starts->IPADRESS = $ipAddress;
            $ot_test_user_starts->BROWSER_NAME = $browser;
            $ot_test_user_starts->Test_kind = $Test_kind;
            $ot_test_user_starts->Answer_kind = $Answer_kind;
            $ot_test_user_starts->Writing_code1 = 0;
            $ot_test_user_starts->Writing_code2 = 0;
            $ot_test_user_starts->STATUS = 1;
            $ot_test_user_starts->save();
            $IDT = $ot_test_user_starts->ID;
            //----------------------------------
            if ($c1 > 0) {
                for ($i = 1; $i <= $c1; $i++) {
                    if ($request->hasFile('s1file' . $i)) {
                        $writing_file = $request->file('s1file' . $i);
                        $filename = $writing_file->getClientOriginalName();
                        $location = storage_path('documents/' . $USER_ID . '/WCS/'.$TEST_R_ID.'/orginal_files/');
                        $writing_file->move($location, $filename);
                        //---------------
                        $ot_writing_corections_files = new ot_writing_corections_file();
                        $ot_writing_corections_files->USER_ID = $USER_ID;
                        $ot_writing_corections_files->TESTS_ID = $TEST_ID;
                        $ot_writing_corections_files->TEST_REGISTER_ID = $TEST_R_ID;
                        $ot_writing_corections_files->TEST_U_START_ID = $IDT;
                        $ot_writing_corections_files->PART_NUMBER1 = 1;
                        $ot_writing_corections_files->FILE_NUMBER = $i;
                        $ot_writing_corections_files->SEND_FILE = $writing_file;
                        $ot_writing_corections_files->FILES_LOCATIONS = $filename;
                        $ot_writing_corections_files->SEND_DATE = date("Y-m-d");
                        $ot_writing_corections_files->SEND_TIME = date("h:i:s");
                        $ot_writing_corections_files->IPADRESS = $ipAddress;
                        $ot_writing_corections_files->BROWSER_NAME = $browser;
                        $ot_writing_corections_files->STATUS = 1;
                        $ot_writing_corections_files->save();
                    }
                }
            }
            if ($c2 > 0) {
                for ($i = 1; $i <= $c2; $i++) {
                    if ($request->hasFile('s2file' . $i)) {
                        $writing_file = $request->file('s2file' . $i);
                        $filename = $writing_file->getClientOriginalName();
                        $location = storage_path('documents/' . $USER_ID . '/WCS/'.$TEST_R_ID.'/orginal_files/');
                        $writing_file->move($location, $filename);
                        //---------------
                        $ot_writing_corections_files = new ot_writing_corections_file();
                        $ot_writing_corections_files->USER_ID = $USER_ID;
                        $ot_writing_corections_files->TESTS_ID = $TEST_ID;
                        $ot_writing_corections_files->TEST_REGISTER_ID = $TEST_R_ID;
                        $ot_writing_corections_files->TEST_U_START_ID = $IDT;
                        $ot_writing_corections_files->PART_NUMBER2 = 1;
                        $ot_writing_corections_files->FILE_NUMBER = $i;
                        $ot_writing_corections_files->SEND_FILE = $writing_file;
                        $ot_writing_corections_files->FILES_LOCATIONS = $filename;
                        $ot_writing_corections_files->SEND_DATE = date("Y-m-d");
                        $ot_writing_corections_files->SEND_TIME = date("h:i:s");
                        $ot_writing_corections_files->IPADRESS = $ipAddress;
                        $ot_writing_corections_files->BROWSER_NAME = $browser;
                        $ot_writing_corections_files->STATUS = 1;
                        $ot_writing_corections_files->save();
                    }
                }

            }

            return view('Candidate.Information_page');

        }
            else {
                return view('Candidate.Error_page');
            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_l(Request $request)
    {
        $USER_ID = Auth::user()->id;
        $USER_FN = Auth::user()->fname;
        $USER_LN = Auth::user()->lname;
        $TEST_ID = $request->input('TESTID');
        $TEST_R_ID = $request->input('TESTRID');
        $QPACKAGE = $request->input('ID2');
        $tn=$request->input('tn');
        $IDT=$request->input('IDT');
        $MT=$request->input('mt');
        $ST=$request->input('st');
        $Test_kind = $request->input('tk');
        $Answer_kind = $request->input('ak');

        $c_date = date("Y-m-d");

        $kind=0;
        $i=1;
        $J=1;
        $OVERALLGRADE=0;
        $endt_kind=1;

        global  $skill;
        global  $skillr;
        global  $skills;
        global  $skillw;
        $skill=1;
        $skills=4;
        $i=1;
        $j=1;
        $c_ans=0;
        $max =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$QPACKAGE)->where('status','=','1')->max('QUESTION_TOS');
        $min =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$QPACKAGE)->where('status','=','1')->min('QUESTION_FROMS');

        for ($i = $min; $i <= $max; $i++) {
            $num = (string)$i;
            if ($Answer_kind==1)
            $ans = "QL".$num;
            elseif ($Answer_kind==2)
                $ans = "QLA".$num;

            $ot_user_answers_packages = new ot_user_answers_package();
            $ot_user_answers_packages->USER_ID = $USER_ID;
            $ot_user_answers_packages->TESTS_ID = $TEST_ID;
            $ot_user_answers_packages->TEST_REGISTER_ID = $TEST_R_ID;
            $ot_user_answers_packages->TEST_U_START_ID = $IDT;
            $ot_user_answers_packages->PACKAGES_ID = $QPACKAGE;
            $ot_user_answers_packages->QUESTION_NUMBER = $i;
            $ot_user_answers_packages->ANSWER =$request->get($ans);
            $ot_user_answers_packages->STATUS = 1;
            $ot_user_answers_packages->save();
        }
        //--------end of for
       //--------------grade

        $c_ans = ot_user_answers_package::leftjoin('ot_answers_packages', function ($join) {$join->on('ot_user_answers_packages.PACKAGES_ID', '=', 'ot_answers_packages.PACKAGES_ID')->on('ot_user_answers_packages.QUESTION_NUMBER','=','ot_answers_packages.QUESTION_NUMBER');})->
        leftjoin('ot_questions_packages','ot_answers_packages.PACKAGES_ID','=','ot_questions_packages.QUESTIONS_PACKAGES_ID')->where('USER_ID','=',$USER_ID)->where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('TEST_U_START_ID','=',$IDT)->where('skill_id','=',1)->whereNotNull('ot_user_answers_packages.ANSWER')->whereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER')->
        orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER2')->orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER3')->count();

        $grade = ot_test_grade::where([['SKILL_ID','=',1],['MAIN_TEST_ID','=',$MT],['SUBGROUP_TEST_ID','=',$ST]])->where('QUESTION_FROM','<=',$c_ans)->where('QUESTION_TO','>=',$c_ans)->max('grade');

            $ot_user_answer_skills = new ot_user_answer_skill();
            $ot_user_answer_skills->TEST_U_START_ID = $IDT;
            $ot_user_answer_skills->SKILL_ID = 1;
            $ot_user_answer_skills->END_DATE=date("Y-m-d");
            $ot_user_answer_skills->END_TIME=date("h:i:s");
            $ot_user_answer_skills->CORRECT_ANSWER = $c_ans;
            $ot_user_answer_skills->GRADE = $grade;
            $ot_user_answer_skills->Comment = '';
            $ot_user_answer_skills->save();
            $TUAS = $ot_user_answer_skills->TEST_U_ANS_SKILL_ID;

        //-----------------end of

       //------ next skill
        $ot_test_qpackages  = ot_test_qpackage::leftjoin('ot_questions_packages', 'ot_test_qpackages.Q_PACKAGES_ID', '=', 'ot_questions_packages.QUESTIONS_PACKAGES_ID')->
        leftjoin('ot_test_skills', function ($join) {$join->on('ot_questions_packages.MAINTESTS_ID', '=', 'ot_test_skills.MAINTEST_ID')->on('ot_questions_packages.SKILL_ID','=','ot_test_skills.SKILL_ID');})->
        where('ot_test_qpackages.TEST_ID','=',$TEST_ID)->where('ot_test_qpackages.status','=','1')->where('ot_test_skills.status','=','1')->where('ot_questions_packages.status','=','1')->
        where('ot_test_skills.SKILL_ID','!=',$skill)->where('ot_test_skills.SKILL_ID','!=',$skillr)->where('ot_test_skills.SKILL_ID','!=',$skillw)->where('ot_test_skills.SKILL_ID','!=',$skills)->
        orderby('ot_test_skills.ORDERS', 'ASC')->first();

        if (!$ot_test_qpackages)
        {

            $OVERALLGRADE= ot_user_answer_skill::where('TEST_U_START_ID','=',$IDT)->where('status','=','1')->avg('grade');

             if (($OVERALLGRADE-floor($OVERALLGRADE))==0.25)
                 $OVERALLGRADE=($OVERALLGRADE+0.25);
             if (($OVERALLGRADE-floor($OVERALLGRADE))==0.75)
                 $OVERALLGRADE=($OVERALLGRADE+0.25);

            $level = ot_cefr_score::leftjoin('ot_cefr_levels','ot_cefr_scores.OT_CEFR_LEVEL_ID','ot_cefr_levels.OT_CEFR_LEVEL_ID')->where('MAIN_TEST_ID','=',$MT)->where('SCORE_FROM','<=',$OVERALLGRADE)->where('SCORE_TO','>=',$OVERALLGRADE)->max('level');

             $ot_test_user_starts = ot_test_user_start::find($IDT);
             $ot_test_user_starts->END_DATE=date("Y-m-d");
             $ot_test_user_starts->END_TIME=date("h:i:s");
             $ot_test_user_starts->OEVRALL_SCORE=$OVERALLGRADE;
             $ot_test_user_starts->CEFR_LEVEL=$level;
             $ot_test_user_starts->save();

            //------------------- insert part_ans and Qkind ans
            $ot_user_answers_packages1 = ot_user_answers_package::leftjoin('ot_answers_packages', function ($join) {$join->on('ot_user_answers_packages.PACKAGES_ID', '=', 'ot_answers_packages.PACKAGES_ID')->on('ot_user_answers_packages.QUESTION_NUMBER','=','ot_answers_packages.QUESTION_NUMBER');})->
            leftjoin('ot_questions_packages','ot_answers_packages.PACKAGES_ID','=','ot_questions_packages.QUESTIONS_PACKAGES_ID')->leftjoin('ot_packages_sections','ot_answers_packages.PACKAGES_ID','=','ot_packages_sections.QUESTIONS_PACKAGES_ID')->
            where('USER_ID','=',$USER_ID)->where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('TEST_U_START_ID','=',$IDT)->
            whereraw("ot_answers_packages.QUESTION_NUMBER between QUESTION_FROMS and QUESTION_TOS")->
            whereNotNull('ot_user_answers_packages.ANSWER')->
            whereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER')->
//            orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER2')->orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER3')->
            groupBy('part_id')->groupBy('skill_id')->
            groupby('ts')->selectRaw('count(*) as c1 ,part_id,skill_id,(ot_packages_sections.QUESTION_TOS-ot_packages_sections.QUESTION_FROMS+1)as ts')->get();

            foreach ($ot_user_answers_packages1 as $user_answers_packages1) {
                $ot_user_answer_skills_parts = new ot_user_answer_skills_part();
                $ot_user_answer_skills_parts->TEST_U_ANS_SKILL_ID = $TUAS;
                $ot_user_answer_skills_parts->TEST_U_START_ID = $IDT;
                $ot_user_answer_skills_parts->SKILL_ID = $user_answers_packages1->skill_id;
                $ot_user_answer_skills_parts->PART_ID = $user_answers_packages1->part_id;
                $ot_user_answer_skills_parts->CORRECT_ANSWER = $user_answers_packages1->c1;
                $ot_user_answer_skills_parts->QUESTION_NUMBERS = $user_answers_packages1->ts;
                $ot_user_answer_skills_parts->STATUS = 1;
                $ot_user_answer_skills_parts->save();
            }

            $ot_user_answers_packages2 = ot_user_answers_package::leftjoin('ot_answers_packages', function ($join) {$join->on('ot_user_answers_packages.PACKAGES_ID', '=', 'ot_answers_packages.PACKAGES_ID')->on('ot_user_answers_packages.QUESTION_NUMBER','=','ot_answers_packages.QUESTION_NUMBER');})->
            leftjoin('ot_questions_packages','ot_answers_packages.PACKAGES_ID','=','ot_questions_packages.QUESTIONS_PACKAGES_ID')->leftjoin('ot_packages_sections','ot_answers_packages.PACKAGES_ID','=','ot_packages_sections.QUESTIONS_PACKAGES_ID')->
            leftjoin('ot_section_parts','ot_packages_sections.OT_PS_ID','=','ot_section_parts.OT_PS_ID')->
            where('USER_ID','=',$USER_ID)->where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('TEST_U_START_ID','=',$IDT)->
            whereraw("ot_answers_packages.QUESTION_NUMBER between QUESTION_FROMP and QUESTION_TOP")->
            whereNotNull('ot_user_answers_packages.ANSWER')->
            whereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER')->
//          orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER2')->orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER3')->
            groupBy('QUESTION_TYPE_ID')->groupBy('Part_id')->groupby('skill_id')->
            groupby('ts')->selectRaw('count(*) as c2  ,part_id,skill_id,QUESTION_TYPE_ID,(ot_section_parts.QUESTION_TOP-ot_section_parts.QUESTION_FROMP+1) as ts')->orderby('skill_id','ASC')->orderby('part_id','ASC')->get();

            foreach ($ot_user_answers_packages2 as $user_answers_packages2){
                $ot_user_answer_skills_qts = new ot_user_answer_skills_qt();
                $ot_user_answer_skills_qts->TEST_U_ANS_SKILL_ID = $TUAS;
                $ot_user_answer_skills_qts->TEST_U_START_ID =$IDT;
                $ot_user_answer_skills_qts->SKILL_ID = $user_answers_packages2->skill_id ;
                $ot_user_answer_skills_qts->PART_ID = $user_answers_packages2->part_id ;
                $ot_user_answer_skills_qts->QUESTION_TYPE_ID = $user_answers_packages2->QUESTION_TYPE_ID ;
                $ot_user_answer_skills_qts->CORRECT_ANSWER = $user_answers_packages2->c2 ;
                $ot_user_answer_skills_qts->QUESTION_NUMBERS = $user_answers_packages2->ts;
                $ot_user_answer_skills_qts->STATUS = 1;
                $ot_user_answer_skills_qts->save();
            }

             return view('Candidate.Test_end', compact('tn','TEST_ID','TEST_R_ID','USER_FN','USER_LN','endt_kind'));

         }

         else {
             $id2=$ot_test_qpackages->QUESTIONS_PACKAGES_ID;
             $id3=$ot_test_qpackages->SUBGROUP_TEST_ID;
             $time=$ot_test_qpackages->TOTAL_TEST_TIME;

             $max =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$id2)->where('status','=','1')->max('QUESTION_TOS');
             $min =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$id2)->where('status','=','1')->min('QUESTION_FROMS');

             $ot_packages_sections = ot_packages_section::leftjoin('ot_parts_names','ot_packages_sections.part_id','ot_parts_names.part_id')->where('QUESTIONS_PACKAGES_ID','=',$id2)->where('ot_packages_sections.status','=','1')->where('ot_parts_names.status','=','1')->get();

             $ot_section_parts = ot_section_part::leftjoin('ot_packages_sections','ot_section_parts.OT_PS_ID','ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names','ot_packages_sections.part_id','ot_parts_names.part_id')->
             where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('ot_packages_sections.status', '=', '1')->where('ot_section_parts.status', '=', '1')->orderby('QUESTION_FROMP', 'ASC')->get();

             if ($ot_test_qpackages->SKILL_ID == 1) {
                 return view('Candidate.Listening', compact('ot_packages_sections','ot_section_parts','tn','id2','TEST_ID','TEST_R_ID','i','j','time','IDT','MT','ST','max','min','Test_kind','Answer_kind','c_date'));
              }
             elseif ($ot_test_qpackages->SKILL_ID == 2) {
                 if ($id3==2) {
                     $kind = 1;
                     return view('Candidate.Reading', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'kind', 'i','j','time','IDT','MT','ST','max','min','Test_kind','Answer_kind','c_date'));
                 }
                  elseif ($id3==1) {
                     $kind = 2;
                     $ot_section_parts2 = ot_section_part::leftjoin('ot_packages_sections', 'ot_section_parts.OT_PS_ID', 'ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->
                     where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('HTML_READINGS', '=', '')->where('ot_packages_sections.status', '=', '1')->where('ot_section_parts.status', '=', '1')->orderby('QUESTION_FROMP', 'ASC')->get();
                     return view('Candidate.Reading', compact('ot_packages_sections', 'ot_section_parts', 'ot_section_parts2', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'kind', 'i','j','time','IDT','MT','ST','max','min','Test_kind','Answer_kind','c_date'));
                 }
             }
             elseif ($ot_test_qpackages->SKILL_ID == 3) {
                 return view('Candidate.Writing', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'i', 'time', 'IDT', 'MT', 'ST','Writing_code'));
             }
             elseif ($ot_test_qpackages->SKILL_ID == 4) {
                return view('Candidate.Speaking', compact('ot_packages_sections','ot_section_parts','tn','id2','TEST_ID','TEST_R_ID','i','j','time','IDT','MT','ST'));
              }
         }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store_r(Request $request)
    {
        $USER_ID = Auth::user()->id;
        $USER_FN = Auth::user()->fname;
        $USER_LN = Auth::user()->lname;
        $TEST_ID = $request->input('TESTID');
        $TEST_R_ID = $request->input('TESTRID');
        $QPACKAGE = $request->input('ID2');
        $tn=$request->input('tn');
        $IDT=$request->input('IDT');
        $MT=$request->input('mt');
        $ST=$request->input('st');

        $c_date = date("Y-m-d");

        $kind=0;
        $i=1;
        $J=1;
        $OVERALLGRADE=0;
        $endt_kind=1;

        global  $skill;
        global  $skillr;
        global  $skills;
        global  $skillw;
        $skill=1;
        $skillr=2;
        $skills=4;
        $max =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$QPACKAGE)->where('status','=','1')->max('QUESTION_TOS');
        $min =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$QPACKAGE)->where('status','=','1')->min('QUESTION_FROMS');

                for ($i = $min; $i <= $max; $i++) {
                    $num = (string)$i;
//                    if ($Answer_kind==1)
                        $ans = "QR".$num;
  //                  elseif ($Answer_kind==2)
  //                      $ans = "QRA".$num;

                    $ot_user_answers_packages = new ot_user_answers_package();
                    $ot_user_answers_packages->USER_ID = $USER_ID;
                    $ot_user_answers_packages->TESTS_ID = $TEST_ID;
                    $ot_user_answers_packages->TEST_REGISTER_ID = $TEST_R_ID;
                    $ot_user_answers_packages->TEST_U_START_ID = $IDT;
                    $ot_user_answers_packages->PACKAGES_ID = $QPACKAGE;
                    $ot_user_answers_packages->QUESTION_NUMBER = $i;
                    $ot_user_answers_packages->ANSWER =$request->get($ans);
                    $ot_user_answers_packages->STATUS = 1;
                    $ot_user_answers_packages->save();
                }
        //--------end of for
        //--------------grade

        $c_ans = ot_user_answers_package::leftjoin('ot_answers_packages', function ($join) {$join->on('ot_user_answers_packages.PACKAGES_ID', '=', 'ot_answers_packages.PACKAGES_ID')->on('ot_user_answers_packages.QUESTION_NUMBER','=','ot_answers_packages.QUESTION_NUMBER');})->
        leftjoin('ot_questions_packages','ot_answers_packages.PACKAGES_ID','=','ot_questions_packages.QUESTIONS_PACKAGES_ID')->where('USER_ID','=',$USER_ID)->where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('TEST_U_START_ID','=',$IDT)->where('skill_id','=',2)->whereNotNull('ot_user_answers_packages.ANSWER')->
        whereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER')
//        ->orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER2')->orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER3')
         ->count();

        $grade = ot_test_grade::where([['SKILL_ID','=',2],['MAIN_TEST_ID','=',$MT],['SUBGROUP_TEST_ID','=',$ST]])->where('QUESTION_FROM','<=',$c_ans)->where('QUESTION_TO','>=',$c_ans)->max('grade');

        $ot_user_answer_skills = new ot_user_answer_skill();
        $ot_user_answer_skills->TEST_U_START_ID = $IDT;
        $ot_user_answer_skills->SKILL_ID = 2;
        $ot_user_answer_skills->END_DATE=date("Y-m-d");
        $ot_user_answer_skills->END_TIME=date("h:i:s");
        $ot_user_answer_skills->CORRECT_ANSWER = $c_ans;
        $ot_user_answer_skills->GRADE = $grade;
        $ot_user_answer_skills->Comment = '';
        $ot_user_answer_skills->save();
        $TUAS = $ot_user_answer_skills->TEST_U_ANS_SKILL_ID;
        //-----------------end of

        //------ next skill

        $ot_test_qpackages  = ot_test_qpackage::leftjoin('ot_questions_packages', 'ot_test_qpackages.Q_PACKAGES_ID', '=', 'ot_questions_packages.QUESTIONS_PACKAGES_ID')->
        leftjoin('ot_test_skills', function ($join) {$join->on('ot_questions_packages.MAINTESTS_ID', '=', 'ot_test_skills.MAINTEST_ID')->on('ot_questions_packages.SKILL_ID','=','ot_test_skills.SKILL_ID');})->
        where('ot_test_qpackages.TEST_ID','=',$TEST_ID)->where('ot_test_qpackages.status','=','1')->where('ot_test_skills.status','=','1')->where('ot_questions_packages.status','=','1')->
        where('ot_test_skills.SKILL_ID','!=',$skill)->where('ot_test_skills.SKILL_ID','!=',$skillr)->where('ot_test_skills.SKILL_ID','!=',$skillw)->where('ot_test_skills.SKILL_ID','!=',$skills)->
        orderby('ot_test_skills.ORDERS', 'ASC')->first();

        if (!$ot_test_qpackages)
        {

            $OVERALLGRADE= ot_user_answer_skill::where('TEST_U_START_ID','=',$IDT)->where('status','=','1')->avg('grade');
            //$OVERALLGRADE=$ot_user_answer_skills->c_avg;

            if (($OVERALLGRADE-floor($OVERALLGRADE))==0.25)
                $OVERALLGRADE=($OVERALLGRADE+0.25);
            if (($OVERALLGRADE-floor($OVERALLGRADE))==0.75)
                $OVERALLGRADE=($OVERALLGRADE+0.25);

            $level = ot_cefr_score::leftjoin('ot_cefr_levels','ot_cefr_scores.OT_CEFR_LEVEL_ID','ot_cefr_levels.OT_CEFR_LEVEL_ID')->where('MAIN_TEST_ID','=',$MT)->where('SCORE_FROM','<=',$OVERALLGRADE)->where('SCORE_TO','>=',$OVERALLGRADE)->max('level');

            $ot_test_user_starts = ot_test_user_start::find($IDT);
            $ot_test_user_starts->END_DATE=date("Y-m-d");
            $ot_test_user_starts->END_TIME=date("h:i:s");
            $ot_test_user_starts->OEVRALL_SCORE=$OVERALLGRADE;
            $ot_test_user_starts->CEFR_LEVEL=$level;
            $ot_test_user_starts->save();


            //------------------- insert part_ans and Qkind ans
            $ot_user_answers_packages1 = ot_user_answers_package::leftjoin('ot_answers_packages', function ($join) {$join->on('ot_user_answers_packages.PACKAGES_ID', '=', 'ot_answers_packages.PACKAGES_ID')->on('ot_user_answers_packages.QUESTION_NUMBER','=','ot_answers_packages.QUESTION_NUMBER');})->
            leftjoin('ot_questions_packages','ot_answers_packages.PACKAGES_ID','=','ot_questions_packages.QUESTIONS_PACKAGES_ID')->leftjoin('ot_packages_sections','ot_answers_packages.PACKAGES_ID','=','ot_packages_sections.QUESTIONS_PACKAGES_ID')->
            where('USER_ID','=',$USER_ID)->where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('TEST_U_START_ID','=',$IDT)->
            whereraw("ot_answers_packages.QUESTION_NUMBER between QUESTION_FROMS and QUESTION_TOS")->
            whereNotNull('ot_user_answers_packages.ANSWER')->
            whereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER')->
//            orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER2')->orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER3)')->
            groupBy('part_id')->groupBy('skill_id')->
            groupby('ts')->selectRaw('count(*) as c1 ,part_id,skill_id,(ot_packages_sections.QUESTION_TOS-ot_packages_sections.QUESTION_FROMS+1)as ts')->get();

            foreach ($ot_user_answers_packages1 as $user_answers_packages1) {
                $ot_user_answer_skills_parts = new ot_user_answer_skills_part();
                $ot_user_answer_skills_parts->TEST_U_ANS_SKILL_ID = $TUAS;
                $ot_user_answer_skills_parts->TEST_U_START_ID = $IDT;
                $ot_user_answer_skills_parts->SKILL_ID = $user_answers_packages1->skill_id;
                $ot_user_answer_skills_parts->PART_ID = $user_answers_packages1->part_id;
                $ot_user_answer_skills_parts->CORRECT_ANSWER = $user_answers_packages1->c1;
                $ot_user_answer_skills_parts->QUESTION_NUMBERS = $user_answers_packages1->ts;
                $ot_user_answer_skills_parts->STATUS = 1;
                $ot_user_answer_skills_parts->save();
            }

            $ot_user_answers_packages2 = ot_user_answers_package::leftjoin('ot_answers_packages', function ($join) {$join->on('ot_user_answers_packages.PACKAGES_ID', '=', 'ot_answers_packages.PACKAGES_ID')->on('ot_user_answers_packages.QUESTION_NUMBER','=','ot_answers_packages.QUESTION_NUMBER');})->
            leftjoin('ot_questions_packages','ot_answers_packages.PACKAGES_ID','=','ot_questions_packages.QUESTIONS_PACKAGES_ID')->leftjoin('ot_packages_sections','ot_answers_packages.PACKAGES_ID','=','ot_packages_sections.QUESTIONS_PACKAGES_ID')->
            leftjoin('ot_section_parts','ot_packages_sections.OT_PS_ID','=','ot_section_parts.OT_PS_ID')->
            where('USER_ID','=',$USER_ID)->where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('TEST_U_START_ID','=',$IDT)->
            whereraw("ot_answers_packages.QUESTION_NUMBER between QUESTION_FROMP and QUESTION_TOP")->
            whereNotNull('ot_user_answers_packages.ANSWER')->
            whereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER')->
//            orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER2')->orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER3')->
            groupBy('QUESTION_TYPE_ID')->groupBy('Part_id')->groupby('skill_id')->
            groupby('ts')->selectRaw('count(*) as c2  ,part_id,skill_id,QUESTION_TYPE_ID,(ot_section_parts.QUESTION_TOP-ot_section_parts.QUESTION_FROMP+1) as ts')->orderby('skill_id','ASC')->orderby('part_id','ASC')->get();

            foreach ($ot_user_answers_packages2 as $user_answers_packages2){
                $ot_user_answer_skills_qts = new ot_user_answer_skills_qt();
                $ot_user_answer_skills_qts->TEST_U_ANS_SKILL_ID = $TUAS;
                $ot_user_answer_skills_qts->TEST_U_START_ID =$IDT;
                $ot_user_answer_skills_qts->SKILL_ID = $user_answers_packages2->skill_id ;
                $ot_user_answer_skills_qts->PART_ID = $user_answers_packages2->part_id ;
                $ot_user_answer_skills_qts->QUESTION_TYPE_ID = $user_answers_packages2->QUESTION_TYPE_ID ;
                $ot_user_answer_skills_qts->CORRECT_ANSWER = $user_answers_packages2->c2 ;
                $ot_user_answer_skills_qts->QUESTION_NUMBERS = $user_answers_packages2->ts;
                $ot_user_answer_skills_qts->STATUS = 1;
                $ot_user_answer_skills_qts->save();
            }

            return view('Candidate.Test_end', compact('tn','TEST_ID','TEST_R_ID','USER_FN','USER_LN','endt_kind'));
        }
        else {
            $id2=$ot_test_qpackages->QUESTIONS_PACKAGES_ID;
            $id3=$ot_test_qpackages->SUBGROUP_TEST_ID;
            $time=$ot_test_qpackages->TOTAL_TEST_TIME;

            $max =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$id2)->where('status','=','1')->max('QUESTION_TOS');
            $min =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$id2)->where('status','=','1')->min('QUESTION_FROMS');

            $ot_packages_sections = ot_packages_section::leftjoin('ot_parts_names','ot_packages_sections.part_id','ot_parts_names.part_id')->where('QUESTIONS_PACKAGES_ID','=',$id2)->where('ot_packages_sections.status','=','1')->where('ot_parts_names.status','=','1')->get();

            $ot_section_parts = ot_section_part::leftjoin('ot_packages_sections','ot_section_parts.OT_PS_ID','ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names','ot_packages_sections.part_id','ot_parts_names.part_id')->
            where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('ot_packages_sections.status', '=', '1')->where('ot_section_parts.status', '=', '1')->orderby('ot_packages_sections.part_id', 'ASC')->get();

            if ($ot_test_qpackages->SKILL_ID == 1) {
                return view('Candidate.Listening', compact('ot_packages_sections','ot_section_parts','tn','id2','TEST_ID','TEST_R_ID','i','j','time','IDT','MT','ST','max','min','Test_kind','Answer_kind','c_date'));
            }
            elseif ($ot_test_qpackages->SKILL_ID == 2) {
                if ($id3==2) {
                    $kind = 1;
                    return view('Candidate.Reading', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'kind', 'i','j','time','IDT','MT','ST','max','min','Test_kind','Answer_kind','c_date'));
                }
                elseif ($id3==1) {
                    $kind = 2;
                    $ot_section_parts2 = ot_section_part::leftjoin('ot_packages_sections', 'ot_section_parts.OT_PS_ID', 'ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->
                    where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('HTML_READINGS', '=', '')->where('ot_packages_sections.status', '=', '1')->where('ot_section_parts.status', '=', '1')->orderby('QUESTION_FROMP', 'ASC')->get();
                    return view('Candidate.Reading', compact('ot_packages_sections', 'ot_section_parts', 'ot_section_parts2', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'kind', 'i','j','time','IDT','MT','ST','max','min','Test_kind','Answer_kind','c_date'));
                }
            }
            elseif ($ot_test_qpackages->SKILL_ID == 3) {
                return view('Candidate.Writing', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'i', 'time', 'IDT', 'MT', 'ST','Writing_code'));
            } elseif ($ot_test_qpackages->SKILL_ID == 4) {
                return view('Candidate.Speaking', compact('ot_packages_sections','ot_section_parts','tn','id2','TEST_ID','TEST_R_ID','i','j','time','IDT','MT','ST'));
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store_w(Request $request)
    {
        $USER_ID = Auth::user()->id;
        $USER_FN = Auth::user()->fname;
        $USER_LN = Auth::user()->lname;
        $TEST_ID = $request->input('TESTID');
        $TEST_R_ID = $request->input('TESTRID');
        $QPACKAGE = $request->input('ID2');
        $tn=$request->input('tn');
        $IDT=$request->input('IDT');
        $MT=$request->input('mt');
        $ST=$request->input('st');

        $c_date = date("Y-m-d");

        $kind=0;
        $i=1;
        $j=1;
        $OVERALLGRADE=0;
        $endt_kind=1;

        global  $skill;
        global  $skillr;
        global  $skills;
        global  $skillw;
        $skill=1;
        $skillr=2;
        $skillw=3;
        $skills=4;
        $max =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$QPACKAGE)->where('status','=','1')->max('QUESTION_TOS');
        $min =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$QPACKAGE)->where('status','=','1')->min('QUESTION_FROMS');

                for ($i = $min; $i <= $max; $i++) {
                    $num = (string)$i;
                    $ans = "QW".$num;
                    $file = "wfile".$num;
                    $ot_user_answers_packages = new ot_user_answers_package();
                    $ot_user_answers_packages->USER_ID = $USER_ID;
                    $ot_user_answers_packages->TESTS_ID = $TEST_ID;
                    $ot_user_answers_packages->TEST_REGISTER_ID = $TEST_R_ID;
                    $ot_user_answers_packages->TEST_U_START_ID = $IDT;
                    $ot_user_answers_packages->PACKAGES_ID = $QPACKAGE;
                    $ot_user_answers_packages->QUESTION_NUMBER = $i;
                    $ot_user_answers_packages->ANSWER =$request->get($ans);
                    $ot_user_answers_packages->STATUS = 1;
                    $ot_user_answers_packages->save();
                }
        //--------end of for
        /*        if ($request->hasFile('wfile1')) {
            $files = $request->file('wfile1');
            $filename = $files->getClientOriginalName();
            $fileext = $files->getClientOriginalExtension();
            $filename = $filename+'.'+$fileext;
            $location = storage_path('app/public/documents/');
            $files->move($location,$filename);
        }*/

        /*        if ($request->hasFile('wfile2')) {
            $files = $request->file('wfile2');
            $filename = $files->getClientOriginalName();
            $fileext = $files->getClientOriginalExtension();
            $filename = $filename+'.'+$fileext;
            $location = storage_path('app/public/documents/');
            $files->move($location,$filename);
        }*/

        $ot_test_qpackages  = ot_test_qpackage::leftjoin('ot_questions_packages', 'ot_test_qpackages.Q_PACKAGES_ID', '=', 'ot_questions_packages.QUESTIONS_PACKAGES_ID')->
        leftjoin('ot_test_skills', function ($join) {$join->on('ot_questions_packages.MAINTESTS_ID', '=', 'ot_test_skills.MAINTEST_ID')->on('ot_questions_packages.SKILL_ID','=','ot_test_skills.SKILL_ID');})->
        where('ot_test_qpackages.TEST_ID','=',$TEST_ID)->where('ot_test_qpackages.status','=','1')->where('ot_test_skills.status','=','1')->where('ot_questions_packages.status','=','1')->
        where('ot_test_skills.SKILL_ID','!=',$skill)->where('ot_test_skills.SKILL_ID','!=',$skillr)->where('ot_test_skills.SKILL_ID','!=',$skillw)->where('ot_test_skills.SKILL_ID','!=',$skills)->
        orderby('ot_test_skills.ORDERS', 'ASC')->first();

        if (!$ot_test_qpackages)
        {

            /*            $OVERALLGRADE= ot_user_answer_skill::where('TEST_U_START_ID','=',$IDT)->where('status','=','1')->avg('grade');

            if (($OVERALLGRADE-floor($OVERALLGRADE))==0.25)
                $OVERALLGRADE=($OVERALLGRADE+0.25);
            if (($OVERALLGRADE-floor($OVERALLGRADE))==0.75)
                $OVERALLGRADE=($OVERALLGRADE+0.25);

            $level = ot_cefr_score::leftjoin('ot_cefr_levels','ot_cefr_scores.OT_CEFR_LEVEL_ID','ot_cefr_levels.OT_CEFR_LEVEL_ID')->where('MAIN_TEST_ID','=',$MT)->where('SCORE_FROM','<=',$OVERALLGRADE)->where('SCORE_TO','>=',$OVERALLGRADE)->max('level');*/

            $ot_test_user_starts = ot_test_user_start::find($IDT);
            $ot_test_user_starts->END_DATE=date("Y-m-d");
            $ot_test_user_starts->END_TIME=date("h:i:s");
//            $ot_test_user_starts->OEVRALL_SCORE=$OVERALLGRADE;
//            $ot_test_user_starts->CEFR_LEVEL=$level;
            $ot_test_user_starts->save();
            return view('Candidate.Test_end', compact('tn','TEST_ID','TEST_R_ID','USER_FN','USER_LN','endt_kind'));
        }
        else {
            $id2=$ot_test_qpackages->QUESTIONS_PACKAGES_ID;
            $id3=$ot_test_qpackages->SUBGROUP_TEST_ID;
            $time=$ot_test_qpackages->TOTAL_TEST_TIME;

            $max =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$id2)->where('status','=','1')->max('QUESTION_TOS');
            $min =ot_packages_section::where('QUESTIONS_PACKAGES_ID','=',$id2)->where('status','=','1')->min('QUESTION_FROMS');

            $ot_packages_sections = ot_packages_section::leftjoin('ot_parts_names','ot_packages_sections.part_id','ot_parts_names.part_id')->where('QUESTIONS_PACKAGES_ID','=',$id2)->where('ot_packages_sections.status','=','1')->where('ot_parts_names.status','=','1')->get();

            $ot_section_parts = ot_section_part::leftjoin('ot_packages_sections','ot_section_parts.OT_PS_ID','ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names','ot_packages_sections.part_id','ot_parts_names.part_id')->
            where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('ot_packages_sections.status', '=', '1')->where('ot_section_parts.status', '=', '1')->orderby('ot_packages_sections.part_id', 'ASC')->get();

            if ($ot_test_qpackages->SKILL_ID == 1) {
                return view('Candidate.Listening', compact('ot_packages_sections','ot_section_parts','tn','id2','TEST_ID','TEST_R_ID','i','j','time','IDT','MT','ST','max','min','Test_kind','Answer_kind','c_date'));
            }
            elseif ($ot_test_qpackages->SKILL_ID == 2) {
                if ($id3==2) {
                    $kind = 1;
                    return view('Candidate.Reading', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'kind', 'i','j','time','IDT','MT','ST','max','min','Test_kind','Answer_kind','c_date'));
                }
                elseif ($id3==1) {
                    $kind = 2;
                    $ot_section_parts2 = ot_section_part::leftjoin('ot_packages_sections', 'ot_section_parts.OT_PS_ID', 'ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->
                    where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('HTML_READINGS', '=', '')->where('ot_packages_sections.status', '=', '1')->where('ot_section_parts.status', '=', '1')->orderby('QUESTION_FROMP', 'ASC')->get();
                    return view('Candidate.Reading', compact('ot_packages_sections', 'ot_section_parts', 'ot_section_parts2', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'kind', 'i','j','time','IDT','MT','ST','max','min','Test_kind','Answer_kind','c_date'));
                }
            }
            elseif ($ot_test_qpackages->SKILL_ID == 3) {
                return view('Candidate.Writing', compact('ot_packages_sections', 'ot_section_parts', 'tn', 'id2', 'TEST_ID', 'TEST_R_ID', 'i', 'time', 'IDT', 'MT', 'ST','Writing_code'));
            } elseif ($ot_test_qpackages->SKILL_ID == 4) {
                return view('Candidate.Speaking', compact('ot_packages_sections','ot_section_parts','tn','id2','TEST_ID','TEST_R_ID','i','j','time','IDT','MT','ST'));
            }
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store_s(Request $request)
    {
        $USER_ID = Auth::user()->id;
        $USER_FN = Auth::user()->fname;
        $USER_LN = Auth::user()->lname;
        $TEST_ID = $request->input('TESTID');
        $TEST_R_ID = $request->input('TESTRID');
        $QPACKAGE = $request->input('ID2');
        $tn=$request->input('tn');
        $IDT=$request->input('IDT');
        $MT=$request->input('mt');
        $ST=$request->input('st');
        $endt_kind=1;

        $ot_test_user_starts = ot_test_user_start::find($IDT);
        $ot_test_user_starts->Speaking_end_date=date("Y-m-d");
        $ot_test_user_starts->Speaking_end_time=date("h:i:s");
        $ot_test_user_starts->save();

            return view('Candidate.Test_end', compact('tn','TEST_ID','TEST_R_ID','USER_FN','USER_LN','endt_kind'));
        }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_level(Request $request)
    {
        $USER_ID = Auth::user()->id;
        $TEST_ID =$request->input('test_id');
        $tn=$request->input('tn');
        $MT=$request->input('mt');
        $ST=$request->input('st');
        //----------test register
        $ot_test_registers = new ot_test_register();
        $ot_test_registers->USER_ID = $USER_ID;
        $ot_test_registers->TESTS_ID = $request->get('test_id');
        $ot_test_registers->REGISTER_DATE = date("Y-m-d h:i:s");
        $ot_test_registers->STATUS = 3;
        $ot_test_registers->bank_type = '-';
        $ot_test_registers->cash = 0;
        $ot_test_registers->OrderId = '0';
        $ot_test_registers->Amount = '0';
        $ot_test_registers->SystemTraceNo = '0';
        $ot_test_registers->RetrivalRefNo = '0';
        $ot_test_registers->ResCode = '0';
        $ot_test_registers->ResCode_Description = '0';
        $ot_test_registers->save();
        $test_r_id = $ot_test_registers->TEST_REGISTER_ID;

        //---------test_user_start
        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            //check ip from share internet
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            //to check ip is pass from proxy
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else
            $ipAddress = $_SERVER['REMOTE_ADDR'];

        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Internet Explorer';
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $browser = 'Mozilla Firefox';
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $browser = 'Google Chrome';
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $browser = 'Apple Safari';
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Opera';
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $browser = 'Netscape';
        }

        $ot_test_user_starts = new ot_test_user_start();
        $ot_test_user_starts->TEST_REGISTER_ID = $test_r_id;
        $ot_test_user_starts->TEST_ID = $TEST_ID;
        $ot_test_user_starts->USER_ID = $USER_ID;
        $ot_test_user_starts->START_DATE = date("Y-m-d");
        $ot_test_user_starts->START_TIME = date("h:i:s");
        $ot_test_user_starts->IPADRESS = $ipAddress;
        $ot_test_user_starts->BROWSER_NAME = $browser;
        $ot_test_user_starts->Test_kind = 2;
        $ot_test_user_starts->Answer_kind =1 ;
        $ot_test_user_starts->STATUS = 3;
        $ot_test_user_starts->save();
        $IDT = $ot_test_user_starts->ID;
        $c_date = date("Y-m-d");

        $ot_test_qpackages = ot_test_qpackage::leftjoin('ot_questions_packages', 'ot_test_qpackages.Q_PACKAGES_ID', '=', 'ot_questions_packages.QUESTIONS_PACKAGES_ID')->
        leftjoin('ot_test_skills', function ($join) {
            $join->on('ot_questions_packages.MAINTESTS_ID', '=', 'ot_test_skills.MAINTEST_ID')->on('ot_questions_packages.SKILL_ID', '=', 'ot_test_skills.SKILL_ID');
        })->where('ot_test_qpackages.TEST_ID', '=', $TEST_ID)->where('ot_test_qpackages.status', '=', '2')->where('ot_test_skills.status', '=', '2')->where('ot_questions_packages.status', '=', '2')->
        where('ot_test_skills.SKILL_ID', '=','5')->orderby('ot_test_skills.ORDERS', 'ASC')->first();

        $id2 = $ot_test_qpackages->QUESTIONS_PACKAGES_ID;
        $id3 = $ot_test_qpackages->SUBGROUP_TEST_ID;
        $time = $ot_test_qpackages->TOTAL_TEST_TIME;

        $max = ot_packages_section::where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('status', '=', '2')->max('QUESTION_TOS');
        $min = ot_packages_section::where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('status', '=', '2')->min('QUESTION_FROMS');

        $ot_packages_sections = ot_packages_section::leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('ot_packages_sections.status', '=', '2')->where('ot_parts_names.status', '=', '1')->get();

        $ot_section_parts = ot_section_part::leftjoin('ot_packages_sections', 'ot_section_parts.OT_PS_ID', 'ot_packages_sections.OT_PS_ID')->leftjoin('ot_parts_names', 'ot_packages_sections.part_id', 'ot_parts_names.part_id')->
        where('QUESTIONS_PACKAGES_ID', '=', $id2)->where('ot_packages_sections.status', '=', '2')->where('ot_section_parts.status', '=', '2')->orderby('QUESTION_FROMP', 'ASC')->get();

        if ($ot_test_qpackages->SKILL_ID == 5) {
            return view('Candidate.Test_level', compact('ot_packages_sections', 'ot_section_parts', 'tn','MT','ST','id2', 'TEST_ID', 'test_r_id', 'time', 'IDT', 'max', 'min','c_date'));
        }
        else
        {
            return view('Candidate.Error_page');
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_Levels(Request $request)
    {
        $USER_ID = Auth::user()->id;
        $USER_FN = Auth::user()->fname;
        $USER_LN = Auth::user()->lname;
        $TEST_ID = $request->input('TESTID');
        $TEST_R_ID = $request->input('TESTRID');
        $QPACKAGE = $request->input('ID2');
        $IDT = $request->input('IDT');
        $tn = $request->input('tn');
        $MT = $request->input('mt');
        $ST = $request->input('st');
        $c_date = date("Y-m-d");
        $i = 1;
        $J = 1;
        $OVERALLGRADE = 0;
        $c_ans = 0;
        $endt_kind = 2;

        $ot_test_user_starts = ot_test_user_start::where('TEST_REGISTER_ID', '=', $TEST_R_ID)->where('USER_ID', '=', $USER_ID)->where('START_DATE', '=', $c_date)->whereNotNull('END_DATE')->first();
        if (!$ot_test_user_starts) {

            $max = ot_packages_section::where('QUESTIONS_PACKAGES_ID', '=', $QPACKAGE)->where('status', '=', '2')->max('QUESTION_TOS');
            $min = ot_packages_section::where('QUESTIONS_PACKAGES_ID', '=', $QPACKAGE)->where('status', '=', '2')->min('QUESTION_FROMS');

            for ($i = $min; $i <= $max; $i++) {
                $num = (string)$i;
                $ans = "QLT" . $num;

                $ot_user_answers_packages = new ot_user_answers_package();
                $ot_user_answers_packages->USER_ID = $USER_ID;
                $ot_user_answers_packages->TESTS_ID = $TEST_ID;
                $ot_user_answers_packages->TEST_REGISTER_ID = $TEST_R_ID;
                $ot_user_answers_packages->TEST_U_START_ID = $IDT;
                $ot_user_answers_packages->PACKAGES_ID = $QPACKAGE;
                $ot_user_answers_packages->QUESTION_NUMBER = $i;
                $ot_user_answers_packages->ANSWER = $request->get($ans);
                $ot_user_answers_packages->STATUS = 2;
                $ot_user_answers_packages->save();
            }
            //--------end of for
            //--------------grade

            $c_ans = ot_user_answers_package::leftjoin('ot_answers_packages', function ($join) {
                $join->on('ot_user_answers_packages.PACKAGES_ID', '=', 'ot_answers_packages.PACKAGES_ID')->on('ot_user_answers_packages.QUESTION_NUMBER', '=', 'ot_answers_packages.QUESTION_NUMBER');
            })->
            leftjoin('ot_questions_packages', 'ot_answers_packages.PACKAGES_ID', '=', 'ot_questions_packages.QUESTIONS_PACKAGES_ID')->where('USER_ID', '=', $USER_ID)->where('TEST_REGISTER_ID', '=', $TEST_R_ID)->where('TEST_U_START_ID', '=', $IDT)->where('skill_id', '=', 5)->whereNotNull('ot_user_answers_packages.ANSWER')->whereColumn('ot_user_answers_packages.ANSWER', 'ot_answers_packages.ANSWER')->
            orwhereColumn('ot_user_answers_packages.ANSWER', 'ot_answers_packages.ANSWER2')->orwhereColumn('ot_user_answers_packages.ANSWER', 'ot_answers_packages.ANSWER3')->count();

            $grade = ot_test_grade::where([['SKILL_ID', '=', '5'], ['MAIN_TEST_ID', '=', $MT], ['SUBGROUP_TEST_ID', '=', $ST]])->where('QUESTION_FROM', '<=', $c_ans)->where('QUESTION_TO', '>=', $c_ans)->max('grade');

            $ot_user_answer_skills = new ot_user_answer_skill();
            $ot_user_answer_skills->TEST_U_START_ID = $IDT;
            $ot_user_answer_skills->SKILL_ID = 5;
            $ot_user_answer_skills->END_DATE = date("Y-m-d");
            $ot_user_answer_skills->END_TIME = date("h:i:s");
            $ot_user_answer_skills->CORRECT_ANSWER = $c_ans;
            $ot_user_answer_skills->GRADE = $grade;
            $ot_user_answer_skills->STATUS = 2;
            $ot_user_answer_skills->Comment = '';
            $ot_user_answer_skills->save();

            $OVERALLGRADE = ot_user_answer_skill::where('TEST_U_START_ID', '=', $IDT)->where('status', '=', '2')->avg('grade');

            $level = ot_cefr_score::leftjoin('ot_cefr_levels', 'ot_cefr_scores.OT_CEFR_LEVEL_ID', 'ot_cefr_levels.OT_CEFR_LEVEL_ID')->where('MAIN_TEST_ID', '=', $MT)->where('SCORE_FROM', '<=', $OVERALLGRADE)->where('SCORE_TO', '>=', $OVERALLGRADE)->max('level');
            $comment = ot_cefr_score::leftjoin('ot_cefr_levels', 'ot_cefr_scores.OT_CEFR_LEVEL_ID', 'ot_cefr_levels.OT_CEFR_LEVEL_ID')->where('MAIN_TEST_ID', '=', $MT)->where('SCORE_FROM', '<=', $OVERALLGRADE)->where('SCORE_TO', '>=', $OVERALLGRADE)->max('comment');

            $ot_test_user_starts = ot_test_user_start::find($IDT);
            $ot_test_user_starts->END_DATE = date("Y-m-d");
            $ot_test_user_starts->END_TIME = date("h:i:s");
            $ot_test_user_starts->OEVRALL_SCORE = $OVERALLGRADE;
            $ot_test_user_starts->CEFR_LEVEL = $level;
            $ot_test_user_starts->save();
            //-----------------end of
            return view('Candidate.Test_end', compact('TEST_ID', 'tn', 'TEST_R_ID', 'USER_FN', 'USER_LN', 'OVERALLGRADE', 'level', 'endt_kind', 'max', 'c_ans', 'comment'));
        }
        else {
            return view('Candidate.Error_page');
        }
    }


/*    function listenAudio($fileName)
  {
        $file = Storage::disk('audio')->get($fileName);
        return (new Response($file, 200));gd lk
   }*/

    function put_speaking_files($files,$path,$fileName)
    {
        $path = $files->storeAs($path, $fileName);
        $path = Storage::disk($path)->putFile($path, $files);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Appointment_store(Request $request)
    {

        if (!empty($_SERVER['HTTP_CLIENT_IP']))
            //check ip from share internet
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
            //to check ip is pass from proxy
            $ipAddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else
            $ipAddress = $_SERVER['REMOTE_ADDR'];

        $u_agent = $_SERVER['HTTP_USER_AGENT'];

        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Internet Explorer';
        }
        elseif(preg_match('/Firefox/i',$u_agent))
        {
            $browser = 'Mozilla Firefox';
        }
        elseif(preg_match('/Chrome/i',$u_agent))
        {
            $browser = 'Google Chrome';
        }
        elseif(preg_match('/Safari/i',$u_agent))
        {
            $browser = 'Apple Safari';
        }
        elseif(preg_match('/Opera/i',$u_agent))
        {
            $browser = 'Opera';
        }
        elseif(preg_match('/Netscape/i',$u_agent))
        {
            $browser = 'Netscape';
        }

        $USER_ID = Auth::user()->id;
        $TEST_R_ID = $request->input('test_r_id');
        $TEST_ID = $request->input('test_id');
        $T_DATE = $request->input('c_date');
        $T_DAY = $request->input('c_day');
        $T_TIME= $request->input('inlineRadioOptions');
        $W_DAY = $request->input('w_days');
        $SH_DATE= $request->input('sh_date');
        $T_TIMES = "`".$T_TIME."`";
        //---------------
        $ot_test_user_starts = ot_test_user_start::where('TEST_REGISTER_ID','=',$TEST_R_ID)->where('TEST_ID','=',$TEST_ID)->where('USER_ID','=',$USER_ID)->first();
        if (!$ot_test_user_starts)
            $TEST_REGISTER_ID='0';
            else
          $TEST_REGISTER_ID= $ot_test_user_starts->ID;
        //--------------
        $ot_speaking_schedules= ot_speaking_schedule::leftjoin('ot_speaking_schedules_details','ot_speaking_schedules.SCHEDULES_ID','=','ot_speaking_schedules_details.SCHEDULES_ID')->where('DAY_OF_WEEK','=',$T_DAY)->
        orderby('FROM_TIME','ASC')->first();
        $Teach_ID=$ot_speaking_schedules->USER_ID;
        //*************
        $ot_speaking_appointment = new ot_speaking_appointments();
        $ot_speaking_appointment->USER_ID = $USER_ID;
        $ot_speaking_appointment->TEST_ID = $TEST_ID;
        $ot_speaking_appointment->TEST_REGISTER_ID = $TEST_R_ID;
        $ot_speaking_appointment->TEST_U_START_ID = $TEST_REGISTER_ID;
        $ot_speaking_appointment->TEACHER_ID = $Teach_ID;
        $ot_speaking_appointment->TAKEN_DATE= $T_DATE;
        $ot_speaking_appointment->DAY_OF_WEEK= $W_DAY;
        $ot_speaking_appointment->TAKEN_DATE_SH= $SH_DATE;
        $ot_speaking_appointment->TAKEN_TIME=$T_TIME;
        $ot_speaking_appointment->STATUS = 1;
        $ot_speaking_appointment->IPADRESS = $ipAddress;
        $ot_speaking_appointment->BROWSER_NAME = $browser;
        $ot_speaking_appointment->save();
        //************  Send sms to user
        $Mobile = Auth::user()->Mobile;
        $fn = Auth::user()->fname;
        $ln = Auth::user()->lname;
        $Message = $fn . " " . $ln . " عزیز " . PHP_EOL . "تاریخ آزمون Speaking" . "**" . $W_DAY . "-" . $SH_DATE ."  ساعت " . $T_TIME . " می باشد" ;
//        $this->send_sms($Mobile, $USER_ID, $Message);

        //************  Send sms to teacher
        $Users = User::find($Teach_ID);
        $Mobile = $Users->Mobile;
        $Message =  " تاریخ آزمون Speaking" . " کاربر" . $W_DAY . "-" . $SH_DATE ."  ساعت " . $T_TIME . " می باشد" ;
//        $this->send_sms($Mobile, $Teach_ID, $Message);
          $KIND=1;
        return view ('Candidate.Speaking_Information_page',compact('W_DAY','SH_DATE','T_TIME','T_DATE','KIND'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Appointment_Start(Request $request)
    {
        $TEST_R_ID = $request->input('test_r_id');
        $TEST_ID = $request->input('test_id');

        $c_date= date('yyyy-mm-dd');
        $select= false;
        return view ('Candidate.Speaking_Appointment',compact('c_date','select','TEST_R_ID','TEST_ID'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function Appointment_Time(Request $request)
     {
         require_once 'jdf.php';
         $KIND=1;
         $TEST_R_ID = $request->input('test_r_id');
         $TEST_ID = $request->input('test_id');
         $C_DATE = $request->input('c_date');
         $C_DATES = "".$C_DATE."";
         $dayofweek = date('w', strtotime($C_DATE));
         $dayofweeks = date('l', strtotime($C_DATE));
         //------ shmasi date
         $arr_parts = explode('-', $C_DATE);
         $gYear  = $arr_parts[0];
         $gMonth = $arr_parts[1];
         $gDay   = $arr_parts[2];
         $current_jdate = gregorian_to_jalali($gYear, $gMonth, $gDay, '/');
         $ftime=0;
         $ttime=0;
         $duration=0;
         //-----------
         switch ($dayofweek)
         {
             case 0:
                 $days= 'یک شنبه';
                 break;
             case 1:
                 $days= 'دو شنبه';
                 break;
             case 2:
                 $days= 'سه شنبه';
                 break;
             case 3:
                 $days= 'چهار شنبه';
                 break;
             case 4:
                 $days= 'پنج شنبه';
                 break;
             case 5:
                 $days= 'جمعه';
                 break;
             case 6:
                 $days= 'شنبه';
                 break;
         }
         //*******************
        $ot_speaking_schedules= ot_speaking_schedule::leftjoin('ot_speaking_schedules_details','ot_speaking_schedules.SCHEDULES_ID','=','ot_speaking_schedules_details.SCHEDULES_ID')->where('DAY_OF_WEEK','=',$dayofweek)->
        where('FROM_DATE','<=',$C_DATES)->where('TO_DATE','>=',$C_DATES)->orderby('FROM_TIME','ASC')->get();

        $ot_speaking_appointments = ot_speaking_appointments::where('TAKEN_DATE','=',$C_DATE)->where('STATUS','=','1')->get();
        if ($ot_speaking_appointments->isEmpty())
            $KIND=1;
        else
            $KIND=2;

        return view ('Candidate.Speaking_Time_Appointment',compact('ot_speaking_schedules','ot_speaking_appointments','TEST_R_ID','TEST_ID','C_DATE','dayofweek','dayofweeks','current_jdate','days','ftime','ttime','duration','KIND'));
    }


    public function send_sms($mobile, $Userid, $message)
    {
        //-----------------send sms
        $clients = new \nusoap_client('http://mihansmscenter.com/webservice/?wsdl', 'wsdl');
        $clients->decodeUTF8(false);

        //send a message to a number
        $res = $clients->call('send', array(
            'username' => config('app.S_userName'),
            'password' => config('app.S_userPassword'),
            'to' => $mobile,
            'from' => config('app.S_sms_number'),
            'message' => $message,
            'send_time' => 'null'
        ));

        $ot_send_sms = new ot_send_sms();
        $ot_send_sms->USER_ID = $Userid;
        $ot_send_sms->RECEPTOR = $mobile;
        $ot_send_sms->TEXT = $message;
        $ot_send_sms->RESULT = $res['status'];
        $ot_send_sms->IDENTIFIER = $res['identifier'];
        $ot_send_sms->SENT_DATE = date("Y-m-d");
        $ot_send_sms->SENT_TIME = date("h:i:s");
        $ot_send_sms->save();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $KIND = 2;
        $ot_speaking_appointment = ot_speaking_appointments::find($id);
        $SH_DATE=$ot_speaking_appointment->TAKEN_DATE_SH ;
        $T_TIME=$ot_speaking_appointment->TAKEN_TIME ;
        $W_DAY=$ot_speaking_appointment->DAY_OF_WEEK;
        $Teach_ID=$ot_speaking_appointment->TEACHER_ID;
        $T_DATE = $ot_speaking_appointment->TAKEN_DATE;
        $ot_speaking_appointment->STATUS = 2;
        $ot_speaking_appointment->save();
        //************  Send sms to user
        $Mobile = Auth::user()->Mobile;
        $fn = Auth::user()->fname;
        $ln = Auth::user()->lname;
        $Message = $fn . " " . $ln . " عزیز " . PHP_EOL . " آزمون Speaking" . "**" . $W_DAY . "-" . $SH_DATE ."  ساعت " . $T_TIME . "توسط شما حذف گردید" .PHP_EOL . "لطفا تاریخ و ساعت دیگری را جهت آزمون انتخاب نمایید.";
//        $this->send_sms($Mobile, $USER_ID, $Message);
        //************  Send sms to teacher
        $Users = User::find($Teach_ID);
        $Mobile = $Users->Mobile;
        $Message =  "  آزمون Speaking" . "تاریخ " .  $W_DAY . "-"  . $SH_DATE ."  ساعت " . $T_TIME . "توسط کاربر حذف گردید." ;
//        $this->send_sms($Mobile, $Teach_ID, $Message);

        return view ('Candidate.Speaking_Information_page',compact('W_DAY','SH_DATE','T_TIME','T_DATE','KIND'));

    }

}
