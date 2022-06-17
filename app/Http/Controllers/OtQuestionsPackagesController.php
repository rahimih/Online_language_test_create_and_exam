<?php

namespace App\Http\Controllers;

use App\ot_answers_package;
use App\ot_questions_packages;
use App\ot_main_test;
use App\ot_skill_type;
use App\ot_institute_name;
use App\ot_subgroup_test;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OtQuestionsPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $C_institude
     */
    public function index()
    {
       $C_institude=  Auth::user()->Anestutude_Id;
        if ( Auth::user()->kindusers =1)
        {
            $ot_questions_packages = ot_questions_packages::leftjoin('ot_main_tests', 'ot_questions_packages.MAINTESTS_ID', '=', 'ot_main_tests.MAINTEST_ID')->
            leftjoin('ot_skill_types', 'ot_questions_packages.SKILL_ID', '=', 'ot_skill_types.SKILL_ID')->
            leftjoin('ot_institute_names', 'ot_questions_packages.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
            leftjoin('ot_subgroup_tests', 'ot_questions_packages.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
            where('ot_questions_packages.STATUS','=','1')->
            get(['ot_questions_packages.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'SKILL_TYPE', 'QUESTIONS_COUNT', 'TOTAL_TEST_TIME']);
            // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        }
        elseif ( Auth::user()->kindusers >1)
        {
            $ot_questions_packages = ot_questions_packages::leftjoin('ot_main_tests', 'ot_questions_packages.MAINTESTS_ID', '=', 'ot_main_tests.MAINTEST_ID')->
            leftjoin('ot_skill_types', 'ot_questions_packages.SKILL_ID', '=', 'ot_skill_types.SKILL_ID')->
            leftjoin('ot_institute_names', 'ot_questions_packages.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
            leftjoin('ot_subgroup_tests', 'ot_questions_packages.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
            where('INSTITUTE_ID', '=', $C_institude)->where('ot_questions_packages.STATUS','=','1')->
            get(['ot_questions_packages.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'SKILL_TYPE', 'QUESTIONS_COUNT', 'TOTAL_TEST_TIME']);
            // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        }

        return view('Admin.Test_define.Questions_Packages', compact('ot_questions_packages'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $OpenForm
     */
    public function create()
    {
        $OpenForm=1;
        $ot_main_tests = ot_main_test::where('status','=' ,'1')->get();
        $ot_skill_types = ot_skill_type::where('status','=' ,'1')->get();
        $ot_subgroup_tests = ot_subgroup_test::where('status','=' ,'1')->get();
        if ( Auth::user()->kindusers =1) {
            $ot_institute_names = ot_institute_name::where('status', '=', '1')->get();
        }
        if ( Auth::user()->kindusers >1) {
            $ot_institute_names = ot_institute_name::where('status', '=', '1') and where('ID','=','$C_institude')->get();
        }

        return view('Admin.Test_define.Questions_Packages_r',compact('OpenForm','ot_main_tests'),compact('ot_skill_types','ot_subgroup_tests','ot_institute_names'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'QUESTIONS_PACKAGES_NAME' => ['required', 'string', 'max:255'],
            'INSTITUTE_ID' => ['required', 'string', 'max:255'],
            'MAINTESTS_ID' => ['required', 'string', 'max:255'],
            'SUBGROUP_TEST_ID' => ['required', 'string', 'max:255'],
            'SKILL_ID' => ['required', 'string', 'max:255'],
            'QUESTIONS_COUNT' => ['required', 'digits_between:0,100'],
            'TOTAL_TEST_TIME' => ['required', 'digits_between:0,200'],
        ]);

        $ot_questions_packages = new ot_questions_packages();
        $ot_questions_packages->QUESTIONS_PACKAGES_NAME=$request->get('QUESTIONS_PACKAGES_NAME');
        $ot_questions_packages->INSTITUTE_ID=$request->get('INSTITUTE_ID');
        $ot_questions_packages->MAINTESTS_ID=$request->get('MAINTESTS_ID');
        $ot_questions_packages->SUBGROUP_TEST_ID=$request->get('SUBGROUP_TEST_ID');
        $ot_questions_packages->SKILL_ID=$request->get('SKILL_ID');
        $ot_questions_packages->QUESTIONS_COUNT=$request->get('QUESTIONS_COUNT');
        $ot_questions_packages->TOTAL_TEST_TIME=$request->get('TOTAL_TEST_TIME');
        $ot_questions_packages->save();
        return back()->withStatus(__('Question Package  successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ot_questions_packages  $ot_questions_packages
     * @return \Illuminate\Http\Response
     */
    public function show(ot_questions_packages $ot_questions_packages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $OpenForm
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $OpenForm=2;
        $ot_questions_packages = ot_questions_packages::find($id);
        $ot_main_tests = ot_main_test::where('status','=' ,'1')->get();
        $ot_skill_types = ot_skill_type::where('status','=' ,'1')->get();
        $ot_subgroup_tests = ot_subgroup_test::where('status','=' ,'1')->get();
        if ( Auth::user()->kindusers =1) {
            $ot_institute_names = ot_institute_name::where('status', '=', '1')->get();
        }
        if ( Auth::user()->kindusers >1) {
            $ot_institute_names = ot_institute_name::where('status', '=', '1') and where('ID','=','$C_institude')->get();
        }

        return view('Admin.Test_define.Questions_Packages_r',compact('ot_questions_packages','id'),compact('OpenForm','ot_main_tests','ot_skill_types','ot_subgroup_tests','ot_institute_names'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'QUESTIONS_PACKAGES_NAME' => ['required', 'string', 'max:255'],
            'INSTITUTE_ID' => ['required', 'string', 'max:255'],
            'MAINTESTS_ID' => ['required', 'string', 'max:255'],
            'SUBGROUP_TEST_ID' => ['required', 'string', 'max:255'],
            'SKILL_ID' => ['required', 'string', 'max:255'],
            'QUESTIONS_COUNT' => ['required', 'digits_between:0,100'],
            'TOTAL_TEST_TIME' => ['required', 'digits_between:0,200'],
        ]);

        $ot_questions_packages = ot_questions_packages::find($id);
        $ot_questions_packages->QUESTIONS_PACKAGES_NAME=$request->get('QUESTIONS_PACKAGES_NAME');
        $ot_questions_packages->INSTITUTE_ID=$request->get('INSTITUTE_ID');
        $ot_questions_packages->MAINTESTS_ID=$request->get('MAINTESTS_ID');
        $ot_questions_packages->SUBGROUP_TEST_ID=$request->get('SUBGROUP_TEST_ID');
        $ot_questions_packages->SKILL_ID=$request->get('SKILL_ID');
        $ot_questions_packages->QUESTIONS_COUNT=$request->get('QUESTIONS_COUNT');
        $ot_questions_packages->TOTAL_TEST_TIME=$request->get('TOTAL_TEST_TIME');
        $ot_questions_packages->save();
        return back()->withStatus(__('Question Package  successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ot_questions_packages = ot_questions_packages::destroy($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function answer($id)
    {
       $ot_answers_package = ot_answers_package::where('PACKAGES_ID','=',$id)->orderby('QUESTION_NUMBER')->get();
        if ($ot_answers_package->isempty()) {
            $kind = 1;
            $i = 1;
            $j = 1;
            $ot_questions_packages = ot_questions_packages::leftjoin('ot_main_tests', 'ot_questions_packages.MAINTESTS_ID', '=', 'ot_main_tests.MAINTEST_ID')->
            leftjoin('ot_skill_types', 'ot_questions_packages.SKILL_ID', '=', 'ot_skill_types.SKILL_ID')->
            leftjoin('ot_institute_names', 'ot_questions_packages.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
            leftjoin('ot_subgroup_tests', 'ot_questions_packages.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
            where('QUESTIONS_PACKAGES_ID', '=', $id)->first();

            $j = ($ot_questions_packages->QUESTIONS_COUNT) / 2;
            return view('Admin.Test_define.Answer_Package', compact('ot_questions_packages','id', 'i', 'j','kind'));
        }
        else {
            $kind = 2;
            $i = 1;
            $j = 1;
            $ot_questions_packages = ot_questions_packages::leftjoin('ot_main_tests', 'ot_questions_packages.MAINTESTS_ID', '=', 'ot_main_tests.MAINTEST_ID')->
            leftjoin('ot_skill_types', 'ot_questions_packages.SKILL_ID', '=', 'ot_skill_types.SKILL_ID')->
            leftjoin('ot_institute_names', 'ot_questions_packages.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
            leftjoin('ot_subgroup_tests', 'ot_questions_packages.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
            where('QUESTIONS_PACKAGES_ID', '=', $id)->first();
            $j = ($ot_questions_packages->QUESTIONS_COUNT) / 2;
            return view('Admin.Test_define.Answer_Package', compact('ot_questions_packages', 'ot_answers_package', 'id', 'i', 'j', 'kind'));
        }

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   public function answers(Request $request, $id)
    {
        /*$request->validate([
            'answer' => ['required'],
        ]);*/

        $ot_questions_packages = ot_questions_packages::where('QUESTIONS_PACKAGES_ID','=' ,$id)->first();
        $j=$ot_questions_packages->QUESTIONS_COUNT;
        for ($i = 1; $i <= $j; $i++)
        {
            $ans1 = "QL1_" . $i;
            $ans2 = "QL2_" . $i;
            $ans3 = "QL3_" . $i;
            $ot_answers_packages = new ot_answers_package();
            $ot_answers_packages->PACKAGES_ID = $id;
            $ot_answers_packages->QUESTION_NUMBER = $i;
            $ot_answers_packages->ANSWER = $request->get($ans1);
            $ot_answers_packages->ANSWER2 = $request->get($ans2);
            $ot_answers_packages->ANSWER3 = $request->get($ans3);
            $ot_answers_packages->save();
        }
            return back()->withStatus(__('Answer Question Package successfully Registered.'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update_answer(Request $request, $id)
    {
        $i=1;
        $ot_questions_packages = ot_questions_packages::where('QUESTIONS_PACKAGES_ID','=' ,$id)->first();
        $j=$ot_questions_packages->QUESTIONS_COUNT;
        for ($i = 1; $i <= $j; $i++) {
            $ot_answers_package = ot_answers_package::where('PACKAGES_ID', '=', $id)->where('QUESTION_NUMBER', '=', $i)->first();
            $id2 = ($ot_answers_package->OT_ANS_PACK_ID);
            $ans1 = "QL1_" . $i;
            $ans2 = "QL2_" . $i;
            $ans3 = "QL3_" . $i;
            $ot_answers_packages = ot_answers_package::find($id2);
            $ot_answers_packages->PACKAGES_ID = $id;
            $ot_answers_packages->QUESTION_NUMBER = $i;
            $ot_answers_packages->ANSWER = $request->get($ans1);
            $ot_answers_packages->ANSWER2 = $request->get($ans2);
            $ot_answers_packages->ANSWER3 = $request->get($ans3);
            $ot_answers_packages->save();
        }
            return back()->withStatus(__('Answer Question Package  successfully updated.'));

    }
    }
