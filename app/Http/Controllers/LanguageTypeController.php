<?php

namespace App\Http\Controllers;

use App\ot_language_type;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Validator;
//use Illuminate\Auth\Events\Registered;

class LanguageTypeController extends Controller
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
        $ot_language_types = ot_language_type::all()->toArray();
        // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        return view('Admin.Definitions.Language_types', compact('ot_language_types'));

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
        return view('Admin.Definitions.Language_types_r',compact('OpenForm'));
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
            'LANGUAGE_NAME' => ['required', 'string', 'max:255'],
        ]);
        $ot_language_types = new ot_language_type();
        $ot_language_types->LANGUAGE_NAME=$request->get('LANGUAGE_NAME');
        $ot_language_types->save();
        return back()->withStatus(__('LANGUAGE successfully Created.'));
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
        $ot_language_types = ot_language_type::find($id);
        return view('Admin.Definitions.Language_types_r',compact('ot_language_types','id'),compact('OpenForm'));
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
        //
        $request->validate([
            'LANGUAGE_NAME' => ['required', 'string', 'max:255'],
        ]);
        $ot_language_types = ot_language_type::find($id);
        $ot_language_types->LANGUAGE_NAME=$request->get('LANGUAGE_NAME');
        $ot_language_types->save();
        return back()->withStatus(__('LANGUAGE successfully updated.'));
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
        $ot_language_types = ot_language_type::destroy($id);
    }

}
