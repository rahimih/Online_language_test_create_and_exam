<?php

namespace App\Http\Controllers;

use App\ot_main_test;
use App\ot_skill_type;
use App\ot_test_skill;
use Illuminate\Http\Request;

class OtTestSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ot_test_skills = ot_test_skill::leftjoin('ot_main_tests','ot_test_skills.MAINTEST_ID','=','ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_skill_types','ot_test_skills.SKILL_ID','=','ot_skill_types.SKILL_ID')->where('ot_test_skills.STATUS','=','1')->
        get(['ot_test_skills.*','TYPE','SKILL_TYPE']);
        // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        return view('Admin.Definitions.TestSkill', compact('ot_test_skills'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     * @param  int  $OpenForm
     */
    public function create()
    {
        $OpenForm=1;
        $ot_main_tests = ot_main_test::where('status','=' ,'1')->get();
        $ot_skill_types = ot_skill_type::where('status','=' ,'1')->get();
        return view('Admin.Definitions.TestSkill_r',compact('OpenForm','ot_main_tests'),compact('ot_skill_types'));
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
            'MAINTEST_ID' => ['required', 'string', 'max:255'],
            'SKILL_ID' => ['required', 'string', 'max:255'],
            'Section_Numbers' => ['required', 'digits_between:0,20'],
            'Question_Numbers' => ['required', 'digits_between:0,200'],
            'Time_Period' => ['required','digits_between:0,600'],
            'ORDERS' => ['required','digits_between:0,20'],
        ]);

        $ot_test_skills = new ot_test_skill();
        $ot_test_skills->MAINTEST_ID=$request->get('MAINTEST_ID');
        $ot_test_skills->SKILL_ID=$request->get('SKILL_ID');
        $ot_test_skills->ORDERS=$request->get('ORDERS');
        $ot_test_skills->Section_Numbers=$request->get('Section_Numbers');
        $ot_test_skills->Question_Numbers=$request->get('Question_Numbers');
        $ot_test_skills->Time_Period=$request->get('Time_Period');
        $ot_test_skills->save();
        return back()->withStatus(__('Test Skill successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ot_test_skill  $ot_test_skill
     * @return \Illuminate\Http\Response
     */
    public function show(ot_test_skill $ot_test_skill)
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
        $ot_test_skills = ot_test_skill::find($id);
        $ot_main_tests = ot_main_test:: where('status','=' ,'1')->get();
        $ot_skill_types = ot_skill_type::where('status','=' ,'1')->get();
        return view('Admin.Definitions.TestSkill_r',compact('ot_test_skills','id'),compact('OpenForm','ot_main_tests','ot_skill_types'));
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
        $request->validate([
            'MAINTEST_ID' => ['required', 'string', 'max:255'],
            'SKILL_ID' => ['required', 'string', 'max:255'],
            'Section_Numbers' => ['required', 'digits_between:0,20'],
            'Question_Numbers' => ['required', 'digits_between:0,200'],
            'Time_Period' => ['required','digits_between:0,600'],
            'ORDERS' => ['required','digits_between:0,20'],

        ]);

        $ot_test_skills = ot_test_skill::find($id);
        $ot_test_skills->MAINTEST_ID=$request->get('MAINTEST_ID');
        $ot_test_skills->SKILL_ID=$request->get('SKILL_ID');
        $ot_test_skills->ORDERS=$request->get('ORDERS');
        $ot_test_skills->Section_Numbers=$request->get('Section_Numbers');
        $ot_test_skills->Question_Numbers=$request->get('Question_Numbers');
        $ot_test_skills->Time_Period=$request->get('Time_Period');
        $ot_test_skills->save();
        return back()->withStatus(__('Test Skill successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ot_test_skills = ot_test_skill::destroy($id);
    }
}
