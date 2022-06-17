<?php

namespace App\Http\Controllers;

use App\ot_test_part;
use App\ot_main_test;
use App\ot_skill_type;
USE App\ot_parts_name;
use Illuminate\Http\Request;

class OtTestPartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $OpenForm
     */
    public function index()
    {
        $ot_test_parts = ot_test_part::leftjoin('ot_main_tests','ot_test_parts.MAINTEST_ID','=','ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_skill_types','ot_test_parts.SKILL_ID','=','ot_skill_types.SKILL_ID')->
        leftjoin('ot_parts_names','ot_test_parts.PART_ID','=','ot_parts_names.PART_ID')->
        get(['ot_test_parts.*','TYPE','SKILL_TYPE','PARTS_NAME']);
        // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        return view('Admin.Definitions.TestPart', compact('ot_test_parts'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $OpenForm=1;
        $ot_main_tests = ot_main_test::where('status','=' ,'1')->get();
        $ot_skill_types = ot_skill_type::where('status','=' ,'1')->get();
        $ot_parts_names = ot_parts_name::where('status','=' ,'1')->get();
        return view('Admin.Definitions.TestPart_r',compact('OpenForm','ot_main_tests'),compact('ot_skill_types','ot_parts_names'));
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
            'PART_ID' => ['required', 'string', 'max:255'],

        ]);
        $ot_test_parts = new ot_test_part();
        $ot_test_parts->MAINTEST_ID=$request->get('MAINTEST_ID');
        $ot_test_parts->SKILL_ID=$request->get('SKILL_ID');
        $ot_test_parts->PART_ID=$request->get('PART_ID');
        $ot_test_parts->save();
        return back()->withStatus(__('Test Part successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ot_test_part  $ot_test_part
     * @return \Illuminate\Http\Response
     */
    public function show(ot_test_part $ot_test_part)
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
        $ot_test_parts = ot_test_part::find($id);
        $ot_main_tests = ot_main_test:: where('status','=' ,'1')->get();
        $ot_skill_types = ot_skill_type::where('status','=' ,'1')->get();
        $ot_parts_names = ot_parts_name::where('status','=' ,'1')->get();
        return view('Admin.Definitions.TestPart_r',compact('ot_test_parts','id'),compact('OpenForm','ot_main_tests','ot_skill_types','ot_parts_names'));

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
            'MAINTEST_ID' => ['required', 'string', 'max:255'],
            'SKILL_ID' => ['required', 'string', 'max:255'],
            'PART_ID' => ['required', 'string', 'max:255'],

        ]);

        $ot_test_parts = ot_test_part::find($id);
        $ot_test_parts->MAINTEST_ID=$request->get('MAINTEST_ID');
        $ot_test_parts->SKILL_ID=$request->get('SKILL_ID');
        $ot_test_parts->PART_ID=$request->get('PART_ID');
        $ot_test_parts->save();
        return back()->withStatus(__('Test part successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ot_test_parts = ot_test_part::destroy($id);
    }
}
