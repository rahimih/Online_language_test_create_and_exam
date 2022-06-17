<?php

namespace App\Http\Controllers;

use App\ot_main_test;
use App\ot_subgroup_test;
use Illuminate\Http\Request;

class OtSubgroupTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ot_subgroup_tests = ot_subgroup_test::leftjoin('ot_main_tests','ot_subgroup_tests.MAIN_TEST_ID','=','ot_main_tests.MAINTEST_ID')->where('ot_subgroup_tests.STATUS','=','1')->
        get(['ot_subgroup_tests.SUBGROUP_TEST_ID','ot_subgroup_tests.created_at','TYPE','SUBGROUP_TEST_NAME']);
        // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        return view('Admin.Definitions.SubGroup_Test', compact('ot_subgroup_tests'));

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
        $ot_main_tests = ot_main_test:: where('status','=' ,'1')->get();
        return view('Admin.Definitions.SubGroup_test_r',compact('OpenForm','ot_main_tests'));

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
        $request->validate([
            'MAIN_TEST_ID' => ['required', 'string', 'max:255'],
            'SUBGROUP_TEST_NAME' => ['required', 'string', 'max:255'],
        ]);

        $ot_subgroup_tests = new ot_subgroup_test();
        $ot_subgroup_tests->MAIN_TEST_ID=$request->get('MAIN_TEST_ID');
        $ot_subgroup_tests->SUBGROUP_TEST_NAME=$request->get('SUBGROUP_TEST_NAME');
        $ot_subgroup_tests->STATUS = 1;
        $ot_subgroup_tests->save();
        return back()->withStatus(__('SubGroup Test successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
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
        $ot_subgroup_tests = ot_subgroup_test::find($id);
        $ot_Main_tests = ot_main_test:: where('status','=' ,'1')->get();
        return view('Admin.Definitions.SubGroup_test_r',compact('ot_subgroup_tests','id'),compact('OpenForm','ot_Main_tests'));

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
            'MAIN_TEST_ID' => ['required', 'string', 'max:255'],
            'SUBGROUP_TEST_NAME' => ['required', 'string', 'max:255'],
        ]);

        $ot_subgroup_tests = ot_subgroup_test::find($id);
        $ot_subgroup_tests->MAIN_TEST_ID=$request->get('MAIN_TEST_ID');
        $ot_subgroup_tests->SUBGROUP_TEST_NAME=$request->get('SUBGROUP_TEST_NAME');
        $ot_subgroup_tests->save();
        return back()->withStatus(__('SubGroup Test successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function destroy()
    {
        $ot_subgroup_tests = ot_subgroup_test::destroy($id);
    }
}
