<?php

namespace App\Http\Controllers;

use App\ot_user_answers_package;
use Illuminate\Http\Request;

class OtUserAnswersPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
/*        $request->validate([
            'MAINTEST_ID' => ['required', 'string', 'max:255'],
            'SKILL_ID' => ['required', 'string', 'max:255'],
            'PART_ID' => ['required', 'string', 'max:255'],
        ]);*/

        $ot_user_answers_packages = new ot_user_answers_package();
        $ot_user_answers_packages->USER_ID=$request->get('USER_ID');
        $ot_user_answers_packages->TESTS_ID=$request->get('TESTS_ID');
        $ot_user_answers_packages->PACKAGES_ID=$request->get('PACKAGES_ID');
        $ot_user_answers_packages->QUESTION_NUMBER=$request->get('QUESTION_NUMBER');
        $ot_user_answers_packages->ANSWER=$request->get('ANSWER');
        $ot_user_answers_packages->save();
        return back()->withStatus(__('Test Part successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ot_user_answers_package  $ot_user_answers_package
     * @return \Illuminate\Http\Response
     */
    public function show(ot_user_answers_package $ot_user_answers_package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ot_user_answers_package  $ot_user_answers_package
     * @return \Illuminate\Http\Response
     */
    public function edit(ot_user_answers_package $ot_user_answers_package)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ot_user_answers_package  $ot_user_answers_package
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ot_user_answers_package $ot_user_answers_package)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ot_user_answers_package  $ot_user_answers_package
     * @return \Illuminate\Http\Response
     */
    public function destroy(ot_user_answers_package $ot_user_answers_package)
    {
        //
    }
}
