<?php

namespace App\Http\Controllers;

use App\ot_main_test;
use App\ot_language_type;
use Illuminate\Http\Request;

class MainTestController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ot_main_tests = ot_main_test::leftjoin('ot_language_types','ot_main_tests.LANGUAGES_ID','=','ot_language_types.LANGUAGE_ID')->where('ot_main_tests.STATUS','=','1')->get();
        // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        return view('Admin.Definitions.Main_Test', compact('ot_main_tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $OpenForm
     */
    public function create()
    {
        //
        $OpenForm=1;
        $ot_language_types = ot_language_type:: where('status','=' ,'1')->get();
        return view('Admin.Definitions.Main_test_r',compact('OpenForm','ot_language_types'));
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
            'LANGUAGES_ID' => ['required', 'string', 'max:255'],
            'TYPE' => ['required', 'string', 'max:255'],
        ]);

        $ot_main_tests = new ot_main_test();
        $ot_main_tests->LANGUAGES_ID=$request->get('LANGUAGES_ID');
        $ot_main_tests->TYPE=$request->get('TYPE');
        $ot_main_tests->STATUS= 1;
        $ot_main_tests->save();
        return back()->withStatus(__('Main Test successfully updated.'));
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
    //     * @param  \App\ot_questions_type  $ot_questions_type
     * @param  int  $OpenForm
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $OpenForm=2;
        $ot_maintests = ot_main_test::find($id);
        $ot_language_types = ot_language_type:: where('status','=' ,'1')->get();
        return view('Admin.Definitions.Main_test_r',compact('ot_maintests','id'),compact('OpenForm','ot_language_types'));

    }

    /**
     * Update the specified resource in storage.
     *
    //  * @param  \App\ot_questions_type  $ot_questions_type
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'LANGUAGES_ID' => ['required', 'string', 'max:255'],
            'TYPE' => ['required', 'string', 'max:255'],
        ]);

        $ot_main_tests = ot_main_test::find($id);
        $ot_main_tests->LANGUAGES_ID=$request->get('LANGUAGES_ID');
        $ot_main_tests->TYPE=$request->get('TYPE');
        $ot_main_tests->save();
        return back()->withStatus(__('Main Test successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
    //     * @param  \App\ot_questions_type  $ot_questions_type
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
        $ot_main_tests = ot_main_test::destroy($id);
    }


}
