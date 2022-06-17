<?php

namespace App\Http\Controllers;

use App\ot_questions_type;
use Illuminate\Http\Request;

class OtQuestionsTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ot_questions_types = ot_questions_type::all()->toArray();
//        where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        return view('Admin.Definitions.Question_Types', compact('ot_questions_types'));

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
        return view('Admin.Definitions.Question_Types_r',compact('OpenForm'));
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
            'QUESTIONS_TYPE' => ['required', 'string', 'max:255'],
        ]);

        $ot_questions_types = new ot_questions_type();
        $ot_questions_types->QUESTIONS_TYPE=$request->get('QUESTIONS_TYPE');
        $ot_questions_types->HEADER=$request->get('HEADER');
        $ot_questions_types->save();
        return back()->withStatus(__('QUESTION TYPE successfully Created.'));
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
        $ot_questions_types = ot_questions_type::find($id);
        return view('Admin.Definitions.Question_Types_r',compact('ot_questions_types','id'),compact('OpenForm'));
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
            'QUESTIONS_TYPE' => ['required', 'string', 'max:255'],
        ]);

        $ot_questions_types = ot_questions_type::find($id);
        $ot_questions_types->QUESTIONS_TYPE=$request->get('QUESTIONS_TYPE');
        $ot_questions_types->HEADER=$request->get('HEADER');
        $ot_questions_types->save();
        return back()->withStatus(__('QUESTION TYPE successfully updated.'));
//        return redirect (route('parts_names.show')) ;
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
        $ot_questions_types = ot_questions_type::destroy($id);
    }
}
