<?php

namespace App\Http\Controllers;

use App\ot_parts_name;
use Illuminate\Http\Request;

class PartsNameController extends Controller
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
        $ot_parts_names = ot_parts_name::all()->toArray();
//        where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        return view('Admin.Definitions.Parts_Names', compact('ot_parts_names'));
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
        return view('Admin.Definitions.Parts_Names_r',compact('OpenForm'));
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
            'PARTS_NAME' => ['required', 'string', 'max:255'],
        ]);
        $ot_parts_names = new ot_parts_name();
        $ot_parts_names->PARTS_NAME=$request->get('PARTS_NAME');
        $ot_parts_names->save();
        return back()->withStatus(__('PARTS NAME successfully Created.'));
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
        $OpenForm=2;
        $ot_parts_names = ot_parts_name::find($id);
        return view('Admin.Definitions.Parts_Names_r',compact('ot_parts_names','id'),compact('OpenForm'));
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
            'PARTS_NAME' => ['required', 'string', 'max:255'],
        ]);

        $ot_parts_names = ot_parts_name::find($id);
        $ot_parts_names->PARTS_NAME=$request->get('PARTS_NAME');
        $ot_parts_names->save();
        return back()->withStatus(__('PARTS NAME successfully updated.'));
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
        $ot_parts_names = ot_parts_name::destroy($id);
    }


}
