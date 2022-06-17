<?php

namespace App\Http\Controllers;

use App\ot_main_test;
use App\ot_send_sms;
use App\ot_test_define;
use App\ot_test_qpackage;
use App\ot_test_register;
use App\ot_test_user_start;
use App\ot_writing_views;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades;

class OtTestRegisterController extends Controller
{

    //------------ view tests
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index_d()
    {
        //
        $USER_ID = Auth::user()->id;
        $i = 0;
        $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        leftjoin('ot_language_types', 'ot_main_tests.LANGUAGES_ID', '=', 'ot_language_types.LANGUAGE_ID')->where('ot_main_tests.status', '=', '1')->
        where('ot_test_defines.status', '=', '1')->whereNotIn('tests_id', function ($query) use ($USER_ID) {
            $query->select('tests_id')->from('ot_test_registers')->where('status', '=', '2')->where('USER_ID', '=', $USER_ID);
        })->
        distinct()->orderby('TYPE', 'ASC')->get(['TYPE', 'SUBGROUP_TEST_NAME', 'ot_test_defines.MAIN_TEST_ID', 'ot_test_defines.SUBGROUP_TEST_ID', 'LANGUAGE_NAME']);

        return view('Candidate.Test_Registers', compact('ot_test_defines', 'i'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $m_test
     * @param int $s_test
     * @return \Illuminate\Http\Response
     */
    public function index_r($m_test, $s_test)
    {
        //
        $USER_ID = Auth::user()->id;
        $i = 0;

        $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_test_defines.status', '=', '1')->
        whereNotIn('tests_id', function ($query) use ($USER_ID) {
            $query->select('tests_id')->from('ot_test_registers')->where('status', '=', '2')->where('USER_ID', '=', $USER_ID);
        })->
        where('ot_test_defines.MAIN_TEST_ID', '=', $m_test)->where('ot_test_defines.SUBGROUP_TEST_ID', '=', $s_test)->orderby('TYPE', 'ASC')->get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME']);

        return view('Candidate.Test_Register', compact('ot_test_defines', 'i'));
    }
    //------------- end of view test

    //--------- test registered
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $i = 0;
        $USER_ID = Auth::user()->id;

        $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        leftjoin('ot_test_registers', 'ot_test_defines.tests_id', '=', 'ot_test_registers.tests_id')->
        where('ot_test_registers.status', '=', '2')->where('USER_ID', '=', $USER_ID)->where('ot_test_defines.status', '=', '1')->
        orderby('TYPE', 'ASC')->get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'REGISTER_DATE']);

        return view('Candidate.Test_Registered', compact('ot_test_defines', 'i'));
    }

    //---------Writing corrections

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_ws()
    {
        //
        $USER_ID = Auth::user()->id;
        $i = 0;
        $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        leftjoin('ot_language_types', 'ot_main_tests.LANGUAGES_ID', '=', 'ot_language_types.LANGUAGE_ID')->where('ot_main_tests.status', '=', '3')->
        where('ot_test_defines.status', '=', '1')->
//        whereNotIn('tests_id',function($query) use ($USER_ID) {$query->select('tests_id')->from('ot_test_registers')->where('status','=','2')->where('USER_ID','=',$USER_ID);})->
        distinct()->orderby('TYPE', 'ASC')->get(['TYPE', 'SUBGROUP_TEST_NAME', 'ot_test_defines.MAIN_TEST_ID', 'ot_test_defines.SUBGROUP_TEST_ID', 'LANGUAGE_NAME']);

        return view('Candidate.Writing_Registers', compact('ot_test_defines', 'i'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $m_test
     * @param int $s_test
     * @return \Illuminate\Http\Response
     */
    public function index_w($m_test, $s_test)
    {
        //
        $USER_ID = Auth::user()->id;
        $i = 0;
        $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_main_tests.status', '=', '3')->
//        whereNotIn('tests_id',function($query) use ($USER_ID) {$query->select('tests_id')->from('ot_test_registers')->where('status','=','2')->where('USER_ID','=',$USER_ID);})->
        where('ot_test_defines.MAIN_TEST_ID', '=', $m_test)->where('ot_test_defines.SUBGROUP_TEST_ID', '=', $s_test)->orderby('TYPE', 'ASC')->get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME']);

        return view('Candidate.Writing_Register', compact('ot_test_defines', 'i'));
    }
    //---------end of Writing corrections


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $USER_ID = Auth::user()->id;
        $kinds = ($request->input('kinds'));
        $test_id = ($request->input('test_id'));
        $cdate = getdate(time());
        $i = 1;
        $j = 1;
        $k = 1;
        $c1 = 0;
        $c2 = 0;

        /** @var TYPE_NAME $test_id */
        if (($request->input('inlineRadioOptions')) == 'Mellat')
            $cash = $request->get('COST_R');
        if (($request->input('inlineRadioOptions')) == 'Master')
            $cash = $request->get('COST_U');
        $banktype = $request->input('inlineRadioOptions');
        if ($cash == 0)
            $status = 2;
        else
            $status = 1;

        $ot_test_registers = new ot_test_register();
        $ot_test_registers->USER_ID = $USER_ID;
        $ot_test_registers->TESTS_ID = $request->get('test_id');
        $ot_test_registers->REGISTER_DATE = date("Y-m-d h:i:s");
        $ot_test_registers->STATUS = $status;
        $ot_test_registers->bank_type = $request->get('inlineRadioOptions');
        $ot_test_registers->cash = $cash;
        $ot_test_registers->OrderId = '0';
        $ot_test_registers->Amount = '1';
        $ot_test_registers->SystemTraceNo = '0';
        $ot_test_registers->RetrivalRefNo = '0';
        $ot_test_registers->ResCode = '0';
        $ot_test_registers->ResCode_Description = '0';
        $ot_test_registers->save();
        $TRID = $ot_test_registers->TEST_REGISTER_ID;

        if ($cash == 0) {
            if ($kinds == 3) {
                $USER_ID = Auth::user()->id;
                $ot_test_register = ot_test_register::leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_registers.TESTS_ID')->
                leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
                leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
                leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_main_tests.status', '=', '3')->
                where('ot_test_registers.TEST_REGISTER_ID', '=', $TRID)->where('ot_test_registers.status', '=', '2')->where('ot_test_registers.USER_ID', '=', $USER_ID)->where('ot_test_registers.TESTS_ID', '=', $test_id)->
                get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'REGISTER_DATE', 'ot_test_registers.TEST_REGISTER_ID', 'ot_main_tests.MAINTEST_ID', 'ot_subgroup_tests.SUBGROUP_TEST_ID']);
                return view('Candidate.Writing_Correction_Start', compact('ot_test_register', 'i', 'j', 'k', 'c1', 'c2'));
            } else
                return redirect()->action('OtTestRegisterController@Select_Test');
        } else {
            if ($banktype == 'Mellat') {
                $orderId = $TRID;                                    //-- شناسه فاکتور
                $amount = $cash;                            //-- مبلغ به ریال
                $callBackUrl = "https://www.L-tests.ir/verify";    //-- لینک کال بک
                $localDate = date('Ymd');
                $localTime = date('Gis');
                $additionalData = "";
                $payerId = 0;
                // bank resault
                $B_kind = 0;
                $Error_code = 0;
                $SaleReferenceId = 0;
                $Comment = "";

                //-- تبدیل اطلاعات به آرایه برای ارسال به بانک
                $parameters = array(
                    'terminalId' => config('app.B_terminalId'),
                    'userName' => config('app.B_userName'),
                    'userPassword' => config('app.B_userPassword'),
                    'orderId' => $orderId,
                    'amount' => $amount,
                    'localDate' => $localDate,
                    'localTime' => $localTime,
                    'additionalData' => $additionalData,
                    'callBackUrl' => $callBackUrl,
                    'payerId' => $payerId
                );
                require_once('nusoap.php');
                $client = new \nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
                $namespace = 'http://interfaces.core.sw.bps.com/';
                $result = $client->call('bpPayRequest', $parameters, $namespace);

//-- بررسی وجود خطا
                if ($client->fault) {
                    //-- نمایش خطا
                    $Comment = "خطا در اتصال به وب سرویس بانک";
                    $Error_code = 0;
                    $SaleReferenceId = 0;
                    $B_kind = 0;
                    return view('Candidate.Bank_Transaction', compact('B_kind', 'Error_code', 'SaleReferenceId', 'Comment'));
                } else {
                    $err = $client->getError();

                    if ($err) {
                        //-- نمایش خطا
                        $Error_code = 0;
                        $SaleReferenceId = 0;
                        $B_kind = 0;
                        $Comment = $err;
                        return view('Candidate.Bank_Transaction', compact('B_kind', 'Error_code', 'SaleReferenceId', 'Comment'));
                    } else {
                        $res = explode(',', $result);
                        $ResCode = $res[0];

                        if ($ResCode == "0") {
                            //-- انتقال به درگاه پرداخت
                            echo "<form name='myform' action='https://bpm.shaparak.ir/pgwchannel/startpay.mellat' method='POST'><input type='hidden' id='RefId' name='RefId' value='{$res[1]}'></form><script type='text/javascript'>window.onload = formSubmit; function formSubmit() { document.forms[0].submit(); }</script>";
                        } else {
                            //-- نمایش خطا
                            $Error_code = 0;
                            $SaleReferenceId = 0;
                            $B_kind = 0;
                            $Comment = $result;
                            return view('Candidate.Bank_Transaction', compact('B_kind', 'Error_code', 'SaleReferenceId', 'Comment'));
                        }
                    }
                }

            }
            if ($banktype == 'Master') {
//                   return redirect("https://en-maktoob.yahoo.com");
            }
        }
        // }
        //  else {
        //      return back()->withStatus(__('This Test has already registered.'));
        //      }
    }


    /**
     * factor
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function Register($id)
    {

        $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where("ot_test_defines.TESTS_ID", "=", $id)->get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'ot_main_tests.status']);

        return view('Candidate.Factor', compact('ot_test_defines', 'id'));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Select_Test()
    {
        //
        $USER_ID = Auth::user()->id;
        $i = 0;
        $ot_test_registers = ot_test_register::leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('ot_test_registers.status', '=', '2')->where('ot_test_registers.USER_ID', '=', $USER_ID)->where('ot_test_defines.status', '=', '1')->
        whereNotIn('ot_test_registers.TEST_REGISTER_ID', function ($query) use ($USER_ID) {
            $query->select('TEST_REGISTER_ID')->from('ot_test_user_starts')->where('USER_ID', '=', $USER_ID);
        })->
        whereIn('ot_test_defines.TESTS_ID', function ($query) {
            $query->select('TEST_ID')->from('ot_test_qpackages')->where('SKILL_ID', '!=', '4');
        })->
        get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'REGISTER_DATE', 'ot_test_registers.TEST_REGISTER_ID', 'ot_main_tests.MAINTEST_ID', 'ot_subgroup_tests.SUBGROUP_TEST_ID']);

        return view('Candidate.Test_Select_Start', compact('ot_test_registers', 'i'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Speaking_Test()
    {
        //
        $USER_ID = Auth::user()->id;
        $i = 0;

        /*        $ot_test_registers = ot_test_register::leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('ot_test_registers.status', '=', '2')->where('ot_test_registers.USER_ID', '=', $USER_ID)->where('ot_test_defines.status', '=', '1')->
        whereNotIn('ot_test_registers.TEST_REGISTER_ID', function ($query) use ($USER_ID) {
            $query->select('TEST_REGISTER_ID')->from('ot_test_user_starts')->where('USER_ID', '=', $USER_ID)->where('Speaking_status', '=', '1');
        })->
        whereIn('ot_test_defines.TESTS_ID', function ($query) {
            $query->select('TEST_ID')->from('ot_test_qpackages')->where('SKILL_ID', '=', '4');
        })->
        get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'REGISTER_DATE', 'ot_test_registers.TEST_REGISTER_ID', 'ot_main_tests.MAINTEST_ID', 'ot_subgroup_tests.SUBGROUP_TEST_ID']);*/

        $ot_test_registers = ot_test_register::leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('ot_test_registers.status', '=', '2')->where('ot_test_registers.USER_ID', '=', $USER_ID)->where('ot_test_defines.status', '=', '1')->
        whereIn('ot_test_registers.TESTS_ID', function ($query) {
            $query->select('test_id')->from('ot_test_qpackages')->where('SKILL_ID', '=', '4');
        })->
        whereNotIn('ot_test_registers.TESTS_ID', function ($query) use ($USER_ID) {
            $query->select('TESTS_ID')->from('ot_speaking_corrections')->where('USER_ID', '=', $USER_ID)->where('status', '=', '1');
        })->
        get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'REGISTER_DATE', 'ot_test_registers.TEST_REGISTER_ID', 'ot_main_tests.MAINTEST_ID', 'ot_subgroup_tests.SUBGROUP_TEST_ID']);

        return view('Candidate.Speaking_Tests', compact('ot_test_registers', 'i'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Passed_Test()
    {
        //
        $i = 0;
        $USER_ID = Auth::user()->id;
        $ot_test_registers = ot_test_register::leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        leftjoin('ot_test_user_starts', 'ot_test_registers.TEST_REGISTER_ID', '=', 'ot_test_user_starts.TEST_REGISTER_ID')->where('ot_test_defines.status', '=', '1')->
        where('ot_test_registers.status', '=', '2')->where('ot_test_registers.USER_ID', '=', $USER_ID)->where('ot_test_user_starts.USER_ID', '=', $USER_ID)->where('ot_main_tests.status', '=', '1')->
        get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'START_DATE', 'REGISTER_DATE', 'ot_test_registers.TEST_REGISTER_ID', 'ot_main_tests.MAINTEST_ID', 'ot_subgroup_tests.SUBGROUP_TEST_ID', 'ot_test_user_starts.END_DATE', 'ot_test_user_starts.END_TIME', 'ot_test_user_starts.ID']);

        return view('Candidate.Test_Passed', compact('ot_test_registers', 'i'));
    }

    public function view_test()
    {
        $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        orderby('TYPE', 'ASC')->get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME']);

        return view('Mainpage', compact('ot_test_defines'));

    }

//    level test
    public function index_l()
    {
        $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('ot_test_defines.status', '=', '2')->orderby('TYPE', 'ASC')->get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME']);

        return view('Candidate.Test_Level_select', compact('ot_test_defines'));
    }

    public function LevelResult()
    {
        $USER_ID = Auth::user()->id;
        $num = 1;
        $ot_test_user_starts = ot_test_user_start::leftjoin('ot_test_registers', 'ot_test_user_starts.TEST_REGISTER_ID', '=', 'ot_test_registers.TEST_REGISTER_ID')->
        leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        leftjoin('ot_user_answer_skills', 'ot_test_user_starts.ID', '=', 'ot_user_answer_skills.TEST_U_START_ID')->
        where('ot_test_registers.status', '=', '3')->where('ot_test_registers.USER_ID', '=', $USER_ID)->where('ot_test_user_starts.USER_ID', '=', $USER_ID)->
        get(['ot_test_defines.TESTS_NAME', 'ot_test_user_starts.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'CORRECT_ANSWER']);

        return view('Candidate.Test_Level_View', compact('ot_test_user_starts', 'num'));
    }

    public function LevelTest($Tid1)
    {

        $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_test_defines.TESTS_ID', '=', $Tid1)->
        where('ot_test_defines.status', '=', '2')->orderby('TYPE', 'ASC')->get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME']);

        $ot_test_qpackages = ot_test_qpackage::leftjoin('ot_test_skills', 'ot_test_qpackages.SKILL_ID', '=', 'ot_test_skills.SKILL_ID')->leftjoin('ot_skill_types', 'ot_test_qpackages.SKILL_ID', '=', 'ot_skill_types.SKILL_ID')->where('ot_test_qpackages.TEST_ID', '=', $Tid1)->get();

        return view('Candidate.Test_Level_Start', compact('ot_test_defines', 'ot_test_qpackages'));
    }

    public function verify(Request $request)
    {

        $ResCode = (isset($_POST['ResCode']) && $_POST['ResCode'] != "") ? $_POST['ResCode'] : "";

        if ($ResCode == '0') {
            $client = new \nusoap_client('https://bpm.shaparak.ir/pgwchannel/services/pgw?wsdl');
            $namespace = 'http://interfaces.core.sw.bps.com/';
            $orderId = (isset($_POST['SaleOrderId']) && $_POST['SaleOrderId'] != "") ? $_POST['SaleOrderId'] : "";
            $verifySaleOrderId = (isset($_POST['SaleOrderId']) && $_POST['SaleOrderId'] != "") ? $_POST['SaleOrderId'] : "";
            $verifySaleReferenceId = (isset($_POST['SaleReferenceId']) && $_POST['SaleReferenceId'] != "") ? $_POST['SaleReferenceId'] : "";

            $parameters = array(
                'terminalId' => config('app.B_terminalId'),
                'userName' => config('app.B_userName'),
                'userPassword' => config('app.B_userPassword'),
                'orderId' => $orderId,
                'saleOrderId' => $verifySaleOrderId,
                'saleReferenceId' => $verifySaleReferenceId
            );

            $result = $client->call('bpVerifyRequest', $parameters, $namespace);

            if ($result == 0) {
                $result = $client->call('bpSettleRequest', $parameters, $namespace);

                if ($result == 0) {
                    //-- تمام مراحل پرداخت به درستی انجام شد.
                    $Error_code = 1;
                    $SaleReferenceId = $verifySaleReferenceId;
                    $B_kind = 1;
                    $Comment = "عملیات پرداخت با موفقیت انجام شد";
                    // ارسال پیام کوتاه
                    $Mobile = Auth::user()->Mobile;
                    $Userid = Auth::user()->id;
                    $fn = Auth::user()->fname;
                    $ln = Auth::user()->lname;
                    $Message = $fn . " " . $ln . " عزیز " . PHP_EOL . "از خرید شما متشکریم شماره پیگیری تراکنش: " . $verifySaleReferenceId;
                    $this->send_sms($Mobile, $Userid, $Message);
                    //------------------
                    // بروز رسانی تست
                    $ot_test_registers = ot_test_register::find($orderId);
                    $testid = $ot_test_registers->TESTS_ID;
                    $ot_test_registers->STATUS = 2;
                    $ot_test_registers->OrderId = $orderId;
                    $ot_test_registers->Amount = '0';
                    $ot_test_registers->SystemTraceNo = $verifySaleReferenceId;
                    $ot_test_registers->RetrivalRefNo = $verifySaleReferenceId;
                    $ot_test_registers->ResCode = '0';
                    $ot_test_registers->ResCode_Description = 'تایید تراکنش';
                    $ot_test_registers->save();
                    //----------------
                    $ot_test_defines = ot_test_define::find($testid);
                    $MAIN_TEST_ID = $ot_test_defines->MAIN_TEST_ID;
                    $ot_main_tests = ot_main_test::find($MAIN_TEST_ID);
                    $kinds = $ot_main_tests->STATUS;
                    //---------------
                    return view('Candidate.Bank_Transaction', compact('B_kind', 'Error_code', 'SaleReferenceId', 'Comment', 'kinds', 'orderId', 'testid'));
                } else {
                    $client->call('bpReversalRequest', $parameters, $namespace);
                    $Error_code = 0;
                    $SaleReferenceId = $verifySaleReferenceId;
                    $B_kind = 1;
                    //-- نمایش خطا
                    $error_msg = (isset($result) && $result != "") ? $result : "خطا در ثبت درخواست واریز وجه";
                    $Comment = 'تراکنش ناموفق - خطا در عملیات';
                    return view('Candidate.Bank_Transaction', compact('B_kind', 'Error_code', 'SaleReferenceId', 'Comment'));
                }
            } else {
                $client->call('bpReversalRequest', $parameters, $namespace);
                $Error_code = 0;
                $SaleReferenceId = $verifySaleReferenceId;
                $B_kind = 1;
                //-- نمایش خطا
                $error_msg = (isset($result) && $result != "") ? $result : "خطا در عملیات وریفای تراکنش";
                $Comment = 'تراکنش ناموفق - خطا در عملیات';
                return view('Candidate.Bank_Transaction', compact('B_kind', 'Error_code', 'SaleReferenceId', 'Comment'));
            }
        } else {
            $Error_code = 0;
            $SaleReferenceId = 0;
            $B_kind = 1;
            //-- نمایش خطا
            $error_msg = (isset($ResCode) && $ResCode != "") ? $ResCode : "تراکنش ناموفق";
            $Comment = 'تراکنش ناموفق';
            return view('Candidate.Bank_Transaction', compact('B_kind', 'Error_code', 'SaleReferenceId', 'Comment'));
        }


    }

    public function send_sms($mobile, $Userid, $message)
    {
        //-----------------send sms
//        require_once('nusoap.php');

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


    public function Writing_files()
    {
        $USER_ID = Auth::user()->id;
        $TRID = ot_test_register::leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        where('ot_test_registers.USER_ID', '=', $USER_ID)->where('ot_test_registers.STATUS', '=', '2')->where('ot_test_registers.ResCode', '=', '0')->where('ot_main_tests.STATUS', '=', '3')->
        orderby('TEST_REGISTER_ID', 'DESC')->first();

        $ot_test_register = ot_test_register::find($TRID);
        $test_id = $ot_test_register->TESTS_ID;
        $i = 1;
        $j = 1;
        $k = 1;
        $c1 = 0;
        $c2 = 0;
        $ot_test_register = ot_test_register::leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_main_tests.status', '=', '3')->
        where('ot_test_registers.TEST_REGISTER_ID', '=', $TRID)->where('ot_test_registers.status', '=', '2')->where('ot_test_registers.USER_ID', '=', $USER_ID)->where('ot_test_registers.TESTS_ID', '=', $test_id)->
        get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'REGISTER_DATE', 'ot_test_registers.TEST_REGISTER_ID', 'ot_main_tests.MAINTEST_ID', 'ot_subgroup_tests.SUBGROUP_TEST_ID']);
        return view('Candidate.Writing_Correction_Start', compact('ot_test_register', 'i', 'j', 'k', 'c1', 'c2'));
    }

/*    public function Send_Writing_files()
    {
      $USER_ID = Auth::user()->id;
      $i=0;
      $ot_writing_c_f_W = ot_writing_views::leftjoin('ot_test_def_view','ot_test_def_view.TESTS_ID','=','ot_writing_c_f_view.TESTS_ID')->
      leftjoin('ot_test_defines','ot_writing_c_f_view.TESTS_ID','=','ot_test_defines.TESTS_ID')->
      leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
      leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
      leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
      where('ot_writing_c_f_view.USER_ID','=',$USER_ID)->orderby('ot_writing_c_f_view.TESTS_ID', 'ASC')->
      get(['ot_writing_c_f_view.TESTS_ID','ot_writing_c_f_view.TEST_REGISTER_ID','INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME'])->
      selectraw('ot_test_def_view.Writing_corrections_part1 - ot_writing_c_f_view.PART_NUMBER_1 as WC1')->
      selectraw('ot_test_def_view.Writing_corrections_part2 - ot_writing_c_f_view.PART_NUMBER_2 as WC2');



      if (!$ot_writing_c_f_W)
      {
          return view('Candidate.Writing_SendFile', compact('ot_writing_c_f_W', 'i'));
      }
      else
      {

      }

    }*/
}


