<?php

namespace App\Http\Controllers;

use App\ot_institute_name;
use Illuminate\Http\Request;

class InstituteController extends Controller
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
        $ot_institute_names = ot_institute_name::all()->toArray();
        return view('Admin.Definitions.Institute', compact('ot_institute_names'));
//        where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
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
        return view('Admin.Definitions.Institute_r',compact('OpenForm'));
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
             'INSTITUTE_NAME' => ['required', 'string', 'max:255'],
             'MANAGER_NAME' => ['required', 'string', 'max:255'],
             'ADDRESS' => ['required', 'string', 'max:255'],
             'MOBILE' => ['required','numeric', 'digits:11'],
             'PHONE' => ['required','numeric', 'digits:11'],
        ]);

        $ot_institute_names  = new ot_institute_name();
        $ot_institute_names->INSTITUTE_NAME=$request->get('INSTITUTE_NAME');
        $ot_institute_names->INSTITUTE_CODE=$request->get('INSTITUTE_CODE');
        $ot_institute_names->MANAGER_NAME =$request->get('MANAGER_NAME');
        $ot_institute_names->ADDRESS=$request->get('ADDRESS');
        $ot_institute_names->PHONE=$request->get('PHONE');
        $ot_institute_names->MOBILE=$request->get('MOBILE');
        $ot_institute_names->COMMENT=$request->get('COMMENT');
        $ot_institute_names->save();
        return back()->withStatus(__(' Institute successfully Created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ot_questions_type  $ot_questions_type
     * @return \Illuminate\Http\Response
     */
    public function show(ot_questions_type $ot_questions_type)
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
        $ot_institute_names = ot_institute_name::find($id);
        return view('Admin.Definitions.Institute_r',compact('ot_institute_names','id'),compact('OpenForm'));
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
            'INSTITUTE_NAME' => ['required', 'string', 'max:255'],
            'MANAGER_NAME' => ['required', 'string', 'max:255'],
            'ADDRESS' => ['required', 'string', 'max:255'],
            'MOBILE' => ['required','numeric', 'digits:11'],
            'PHONE' => ['required','numeric', 'digits:11'],
        ]);

        $ot_institute_names = ot_institute_name::find($id);
        $ot_institute_names->INSTITUTE_NAME=$request->get('INSTITUTE_NAME');
        $ot_institute_names->INSTITUTE_CODE=$request->get('INSTITUTE_CODE');
        $ot_institute_names->MANAGER_NAME =$request->get('MANAGER_NAME');
        $ot_institute_names->ADDRESS=$request->get('ADDRESS');
        $ot_institute_names->PHONE=$request->get('PHONE');
        $ot_institute_names->MOBILE=$request->get('MOBILE');
        $ot_institute_names->COMMENT=$request->get('COMMENT');
        $ot_institute_names->save();
        return back()->withStatus(__('Institute successfully updated.'));
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
        $ot_institute_names = ot_institute_name::destroy($id);
    }


}
