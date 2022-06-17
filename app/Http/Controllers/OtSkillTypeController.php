<?php

namespace App\Http\Controllers;

use App\ot_skill_type;
use Illuminate\Http\Request;

class OtSkillTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $ot_skill_types = ot_skill_type::where('STATUS','=','1')->get();
//        where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();
        return view('Admin.Definitions.Skill_Types', compact('ot_skill_types'));

    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $OpenForm
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $OpenForm=1;
        return view('Admin.Definitions.Skill_Types_r',compact('OpenForm'));

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
            'SKILL_TYPE' => ['required', 'string', 'max:255'],
        ]);

        $ot_skill_types = new ot_skill_type();
        $ot_skill_types->SKILL_TYPE=$request->get('SKILL_TYPE');
        $ot_skill_types->HAVE_EXAM=$request->get('HAVE_EXAM');
        $ot_skill_types->save();
        return back()->withStatus(__('SKILL TYPE successfully Created.'));

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
     * @param  int  $OpenForm
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $OpenForm=2;
        $ot_skill_types = ot_skill_type::find($id);
        return view('Admin.Definitions.Skill_Types_r',compact('ot_skill_types','id'),compact('OpenForm'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'SKILL_TYPE' => ['required', 'string', 'max:255'],
        ]);

        $ot_skill_types = ot_skill_type::find($id);
        $ot_skill_types->SKILL_TYPE=$request->get('SKILL_TYPE');
        $ot_skill_types->HAVE_EXAM=$request->get('HAVE_EXAM');
        $ot_skill_types->save();
        return back()->withStatus(__('SKILL TYPE successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $id
     */
    public function destroy($id)
    {
        $ot_skill_types = ot_skill_type::destroy($id);
    }
}
