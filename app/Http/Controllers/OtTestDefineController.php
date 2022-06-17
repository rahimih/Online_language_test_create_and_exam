<?php

namespace App\Http\Controllers;

use App\ot_questions_packages;
use App\ot_test_define;
use App\ot_main_test;
use App\ot_institute_name;
use App\ot_subgroup_test;
use App\ot_skill_type;
use App\ot_test_qpackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtTestDefineController extends Controller
{
     /**
       * @param  int  $insertedId
       * @param  int  $OpenForm
      */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $C_institude=  Auth::user()->Anestutude_Id;
        if ( Auth::user()->kindusers =1)
        {
            $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
            leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
            leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
            where('ot_test_defines.STATUS','=','1')->
            get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME']);
            // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        }
        elseif ( Auth::user()->kindusers >1)
        {
            $ot_test_defines = ot_test_define::leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
            leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
            leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
            where('ANESTITUDE_ID', '=', $C_institude)->where('ot_test_defines.STATUS','=','1')->
            get(['ot_test_defines.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME']);
            // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        }

        return view('Admin.Test_define.Test_Defines', compact('ot_test_defines'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $C_institude=  Auth::user()->Anestutude_Id;
        $OpenForm=1;
        $ot_main_tests = ot_main_test::where('status','!=' ,'2')->get();
        $ot_subgroup_tests = ot_subgroup_test::where('status','=' ,'1')->get();
        $ot_skill_types = ot_skill_type::where('status','=' ,'1')->where('HAVE_EXAM','=' ,'1')->get();
        if ( Auth::user()->kindusers =1) {
            $ot_institute_names = ot_institute_name::where('status', '=', '1')->get();
        }
        if ( Auth::user()->kindusers >1) {
            $ot_institute_names = ot_institute_name::where('status', '=', '1')->where('ID','=',$C_institude)->get();
        }

         return view('Admin.Test_define.Test_Defines_r',compact('OpenForm','ot_main_tests'),compact('ot_subgroup_tests','ot_institute_names','ot_skill_types'));

    }

    public function data(Request $request){

        if($request->has('MAINTEST_ID')){
            $parentId = $request->get('MAINTEST_ID');
            $data = ot_subgroup_test ::where('MAIN_TEST_ID',$parentId)->get();
            return ['success'=>true,'data'=>$data];
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
        $OpenForm=1;
        global $insertedId;

        $request->validate([
            'TESTS_NAME' => ['required', 'string', 'max:255','unique:ot_test_defines'],
            'START_DATE_VIEW' => ['required', 'date'],
            'END_DATE_VIEW' => ['required', 'date'],
//            'START_TIME' => ['required', 'Time'],
            'test_cost_R'=> ['required', 'digits_between:0,5000000'],
            'test_cost_U'=> ['required', 'digits_between:0,900'],
        ]);

        $ot_test_defines = new ot_test_define();
        $ot_test_defines->TESTS_NAME=$request->get('TESTS_NAME');
        $ot_test_defines->INSTITUTE_ID=$request->get('INSTITUTE_ID');
        $ot_test_defines->MAIN_TEST_ID=$request->get('MAIN_TEST_ID');
        $ot_test_defines->SUBGROUP_TEST_ID=$request->get('SUBGROUP_TEST_ID');
        $ot_test_defines->START_DATE_VIEW=$request->get('START_DATE_VIEW');
        $ot_test_defines->END_DATE_VIEW=$request->get('END_DATE_VIEW');
        $ot_test_defines->START_TIME=$request->get('START_TIME');
        $ot_test_defines->test_cost_R=$request->get('test_cost_R');
        $ot_test_defines->test_cost_U=$request->get('test_cost_U');
        $ot_test_defines->save();

        $insertedId = $ot_test_defines->TESTS_ID;
        $Institude_Id = $ot_test_defines->INSTITUTE_ID;
        $maintestId = $ot_test_defines->MAIN_TEST_ID;
        $subgrouptest_Id = $ot_test_defines->SUBGROUP_TEST_ID;

        //---------------
        $ot_questions_packages1 = ot_questions_packages::where('status','=' ,'1')->where('SKILL_ID','=' ,'1')->where('INSTITUTE_ID','=' ,$Institude_Id)->where('MAINTESTS_ID','=' ,$maintestId)->where('SUBGROUP_TEST_ID','=' ,$subgrouptest_Id)->get();
        $ot_questions_packages2 = ot_questions_packages::where('status','=' ,'1')->where('SKILL_ID','=' ,'2')->where('INSTITUTE_ID','=' ,$Institude_Id)->where('MAINTESTS_ID','=' ,$maintestId)->where('SUBGROUP_TEST_ID','=' ,$subgrouptest_Id)->get();
        $ot_questions_packages3 = ot_questions_packages::where('status','=' ,'1')->where('SKILL_ID','=' ,'3')->where('INSTITUTE_ID','=' ,$Institude_Id)->where('MAINTESTS_ID','=' ,$maintestId)->where('SUBGROUP_TEST_ID','=' ,$subgrouptest_Id)->get();
        $ot_questions_packages4 = ot_questions_packages::where('status','=' ,'1')->where('SKILL_ID','=' ,'4')->where('INSTITUTE_ID','=' ,$Institude_Id)->where('MAINTESTS_ID','=' ,$maintestId)->where('SUBGROUP_TEST_ID','=' ,$subgrouptest_Id)->get();

        return view('Admin.Test_define.Test_Packages_Skill',compact('OpenForm','insertedId','ot_questions_packages1','ot_questions_packages2','ot_questions_packages3','ot_questions_packages4'));
//        return back()->withStatus(__('Test successfully created.'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request,$insertedId)
    {
           $OpenForm=1;
           $skills='';

        if ($request->get('LISTENING')>0) {
            $ot_test_qpackages = new ot_test_qpackage();
            $ot_test_qpackages->TEST_ID = $insertedId;
            $ot_test_qpackages->SKILL_ID = 1;
            $ot_test_qpackages->Q_PACKAGES_ID = $request->get('LISTENING');
            $ot_test_qpackages->save();
            $skills='LISTENING';
        }
        if ($request->get('READING')>0) {
            $ot_test_qpackages = new ot_test_qpackage();
            $ot_test_qpackages->TEST_ID = $insertedId;
            $ot_test_qpackages->SKILL_ID = 2;
            $ot_test_qpackages->Q_PACKAGES_ID = $request->get('READING');
            $ot_test_qpackages->save();
            if ($skills=='')
             $skills= 'READING';
            else
             $skills=$skills+ ' / READING';
        }

        if ($request->get('WRITING')>0) {
            $ot_test_qpackages = new ot_test_qpackage();
            $ot_test_qpackages->TEST_ID = $insertedId;
            $ot_test_qpackages->SKILL_ID = 3;
            $ot_test_qpackages->Q_PACKAGES_ID = $request->get('WRITING');
            $ot_test_qpackages->save();
            if ($skills=='')
             $skills= 'WRITING';
            else
             $skills=$skills+ ' / WRITING';
        }

        if ($request->get('SPEAKING')>0) {
            $ot_test_qpackages = new ot_test_qpackage();
            $ot_test_qpackages->TEST_ID = $insertedId;
            $ot_test_qpackages->SKILL_ID = 4;
            $ot_test_qpackages->Q_PACKAGES_ID = $request->get('SPEAKING');
            $ot_test_qpackages->save();
            if ($skills=='')
             $skills=' SPEAKING';
            else
             $skills=$skills+ ' / SPEAKING';
        }

        $ot_test_defines = ot_test_define::find($insertedId);
        $ot_test_defines->SKILLS=$skills;
        $ot_test_defines->save();

        return back()->withStatus(__('Test successfully created.'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\ot_test_define  $ot_test_define
     * @return \Illuminate\Http\Response
     */
    public function show(ot_test_define $ot_test_define)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $OpenForm=2;
        $ot_test_defines = ot_test_define::find($id);
        $ot_main_tests = ot_main_test::where('status','!=' ,'2')->get();
        $ot_subgroup_tests = ot_subgroup_test::where('status','=' ,'1')->get();
        if ( Auth::user()->kindusers =1) {
            $ot_institute_names = ot_institute_name::where('status', '=', '1')->get();
        }
        if ( Auth::user()->kindusers >1) {
            $ot_institute_names = ot_institute_name::where('status', '=', '1') and where('ID','=','$C_institude')->get();
        }

        return view('Admin.Test_define.Test_Defines_r',compact('ot_test_defines','id'),compact('OpenForm','ot_main_tests','ot_subgroup_tests','ot_institute_names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $OpenForm=2;
        $request->validate([
            'TESTS_NAME' => ['required', 'string', 'max:255'],
//            'INSTITUTE_ID' => ['required', 'string', 'max:255'],
//            'MAIN_TEST_ID' => ['required', 'string', 'max:255'],
//            'SUBGROUP_TEST_ID' => ['required', 'string', 'max:255'],
            'START_DATE_VIEW' => ['required', 'date'],
            'END_DATE_VIEW' => ['required', 'date'],
//            'START_TIME' => ['required', 'time'],
            'test_cost_R'=> ['required', 'digits_between:0,5000000'],
            'test_cost_U'=> ['required', 'digits_between:0,900'],
        ]);

        $ot_test_defines = ot_test_define::find($id);
        //----------
        $insertedId = $ot_test_defines->TESTS_ID;
        $Institude_Id = $ot_test_defines->INSTITUTE_ID;
        $maintestId = $ot_test_defines->MAIN_TEST_ID;
        $subgrouptest_Id = $ot_test_defines->SUBGROUP_TEST_ID;
        //-----------
        $ot_test_defines->TESTS_NAME=$request->get('TESTS_NAME');
//        $ot_test_defines->INSTITUTE_ID=$request->get('INSTITUTE_ID');
//        $ot_test_defines->MAIN_TEST_ID=$request->get('MAIN_TEST_ID');
//        $ot_test_defines->SUBGROUP_TEST_ID=$request->get('SUBGROUP_TEST_ID');
        $ot_test_defines->START_DATE_VIEW=$request->get('START_DATE_VIEW');
        $ot_test_defines->END_DATE_VIEW=$request->get('END_DATE_VIEW');
        $ot_test_defines->START_TIME=$request->get('START_TIME');
        $ot_test_defines->test_cost_R=$request->get('test_cost_R');
        $ot_test_defines->test_cost_U=$request->get('test_cost_U');
        $ot_test_defines->save();
        //---------------
/*        $ot_questions_packages1 = ot_questions_packages::where('status','=' ,'1')->where('SKILL_ID','=' ,'1')->where('INSTITUTE_ID','=' ,$Institude_Id)->where('MAINTESTS_ID','=' ,$maintestId)->where('SUBGROUP_TEST_ID','=' ,$subgrouptest_Id)->get();
        $ot_questions_packages2 = ot_questions_packages::where('status','=' ,'1')->where('SKILL_ID','=' ,'2')->where('INSTITUTE_ID','=' ,$Institude_Id)->where('MAINTESTS_ID','=' ,$maintestId)->where('SUBGROUP_TEST_ID','=' ,$subgrouptest_Id)->get();
        $ot_questions_packages3 = ot_questions_packages::where('status','=' ,'1')->where('SKILL_ID','=' ,'3')->where('INSTITUTE_ID','=' ,$Institude_Id)->where('MAINTESTS_ID','=' ,$maintestId)->where('SUBGROUP_TEST_ID','=' ,$subgrouptest_Id)->get();
        $ot_questions_packages4 = ot_questions_packages::where('status','=' ,'1')->where('SKILL_ID','=' ,'4')->where('INSTITUTE_ID','=' ,$Institude_Id)->where('MAINTESTS_ID','=' ,$maintestId)->where('SUBGROUP_TEST_ID','=' ,$subgrouptest_Id)->get();

        $ot_test_qpackages1 = ot_test_qpackage::where('status','=' ,'1')->where('SKILL_ID','=' ,'1')->where('TEST_ID','=' ,$insertedId)->where('Q_PACKAGES_ID','>','0')->take(1)->get();
        $ot_test_qpackages2 = ot_test_qpackage::where('status','=' ,'1')->where('SKILL_ID','=' ,'2')->where('TEST_ID','=' ,$insertedId)->where('Q_PACKAGES_ID','>','0')->take(1)->get();
        $ot_test_qpackages3 = ot_test_qpackage::where('status','=' ,'1')->where('SKILL_ID','=' ,'3')->where('TEST_ID','=' ,$insertedId)->where('Q_PACKAGES_ID','>','0')->take(1)->get();
        $ot_test_qpackages4 = ot_test_qpackage::where('status','=' ,'1')->where('SKILL_ID','=' ,'4')->where('TEST_ID','=' ,$insertedId)->where('Q_PACKAGES_ID','>','0')->take(1)->get();*/

//        return view('Admin.Test_define.Test_Packages_Skill',compact('OpenForm','insertedId','ot_questions_packages1','ot_questions_packages2','ot_questions_packages3','ot_questions_packages4','ot_test_qpackages1','ot_test_qpackages2','ot_test_qpackages3','ot_test_qpackages4'));

        return back()->withStatus(__('Test successfully Updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ot_test_defines = ot_test_define::destroy($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update2(Request $request,$id)
    {
        $OpenForm=2;
        if ($request->get('LISTENING')>0) {
            $ot_test_qpackages = new ot_test_qpackage();
            $ot_test_qpackages->TEST_ID = $insertedId;
            $ot_test_qpackages->SKILL_ID = 1;
            $ot_test_qpackages->Q_PACKAGES_ID = $request->get('LISTENING');
            $ot_test_qpackages->save();
        }
        if ($request->get('READING')>0) {
            $ot_test_qpackages = new ot_test_qpackage();
            $ot_test_qpackages->TEST_ID = $insertedId;
            $ot_test_qpackages->SKILL_ID = 2;
            $ot_test_qpackages->Q_PACKAGES_ID = $request->get('READING');
            $ot_test_qpackages->save();
        }

        if ($request->get('WRITING')>0) {
            $ot_test_qpackages = new ot_test_qpackage();
            $ot_test_qpackages->TEST_ID = $insertedId;
            $ot_test_qpackages->SKILL_ID = 3;
            $ot_test_qpackages->Q_PACKAGES_ID = $request->get('WRITING');
            $ot_test_qpackages->save();
        }

        if ($request->get('SPEAKING')>0) {
            $ot_test_qpackages = new ot_test_qpackage();
            $ot_test_qpackages->TEST_ID = $insertedId;
            $ot_test_qpackages->SKILL_ID = 4;
            $ot_test_qpackages->Q_PACKAGES_ID = $request->get('SPEAKING');
            $ot_test_qpackages->save();
        }

        return back()->withStatus(__('Test successfully created.'));
    }


}
