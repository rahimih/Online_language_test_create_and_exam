<?php

namespace App\Http\Controllers;

use App\ot_test_grade;
use App\ot_main_test;
use App\ot_skill_type;
use App\ot_subgroup_test;
use Illuminate\Http\Request;

class OtTestGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ot_test_grades = ot_test_grade::leftjoin('ot_main_tests', 'ot_test_grades.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_skill_types', 'ot_test_grades.SKILL_ID', '=', 'ot_skill_types.SKILL_ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_grades.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        get(['ot_test_grades.*', 'TYPE', 'SUBGROUP_TEST_NAME', 'SKILL_TYPE']);
        // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();

        return view('Admin.Definitions.Test_Grade', compact('ot_test_grades'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $OpenForm
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $OpenForm = 1;
        $ot_main_tests = ot_main_test::where('status', '=', '1')->get();
        $ot_skill_types = ot_skill_type::where('status', '=', '1')->get();
        $ot_subgroup_tests = ot_subgroup_test::where('status', '=', '1')->get();

        return view('Admin.Definitions.Test_Grade_r', compact('OpenForm', 'ot_main_tests'), compact('ot_skill_types', 'ot_subgroup_tests'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'MAIN_TEST_ID' => ['required', 'string', 'max:255'],
            'SUBGROUP_TEST_ID' => ['required', 'string', 'max:255'],
            'SKILL_ID' => ['required', 'string', 'max:255'],
            'QUESTION_FROM' => ['required', 'digits_between:0,100'],
            'QUESTION_TO' => ['required', 'digits_between:0,200'],
            'GRADE' => ['required'],
            'DATE_FROM' => ['required', 'date'],
            'DATE_TO' => ['required', 'date', 'after:FROM_DATE'],
        ]);

        $ot_test_grades = new ot_test_grade();
        $ot_test_grades->MAIN_TEST_ID = $request->get('MAIN_TEST_ID');
        $ot_test_grades->SUBGROUP_TEST_ID = $request->get('SUBGROUP_TEST_ID');
        $ot_test_grades->SKILL_ID = $request->get('SKILL_ID');
        $ot_test_grades->QUESTION_FROM = $request->get('QUESTION_FROM');
        $ot_test_grades->QUESTION_TO = $request->get('QUESTION_TO');
        $ot_test_grades->GRADE = $request->get('GRADE');
        $ot_test_grades->DATE_FROM = $request->get('DATE_FROM');
        $ot_test_grades->DATE_TO = $request->get('DATE_TO');
        $ot_test_grades->save();
        return back()->withStatus(__('Test Grade successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ot_test_grade $ot_test_grade
     * @return \Illuminate\Http\Response
     */
    public function show(ot_test_grade $ot_test_grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $OpenForm
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $OpenForm = 2;
        $ot_test_grades = ot_test_grade::find($id);
        $ot_main_tests = ot_main_test::where('status', '=', '1')->get();
        $ot_skill_types = ot_skill_type::where('status', '=', '1')->get();
        $ot_subgroup_tests = ot_subgroup_test::where('status', '=', '1')->get();
        return view('Admin.Definitions.Test_Grade_r', compact('ot_test_grades', 'id'), compact('OpenForm', 'ot_main_tests', 'ot_skill_types', 'ot_subgroup_tests'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'MAIN_TEST_ID' => ['required', 'string', 'max:255'],
            'SUBGROUP_TEST_ID' => ['required', 'string', 'max:255'],
            'SKILL_ID' => ['required', 'string', 'max:255'],
            'QUESTION_FROM' => ['required', 'digits_between:0,100'],
            'QUESTION_TO' => ['required', 'digits_between:0,200'],
            'GRADE' => ['required'],
            'DATE_FROM' => ['required', 'date'],
            'DATE_TO' => ['required', 'date', 'after:FROM_DATE'],
        ]);

        $ot_test_grades = ot_test_grade::find($id);
        $ot_test_grades->MAIN_TEST_ID = $request->get('MAIN_TEST_ID');
        $ot_test_grades->SUBGROUP_TEST_ID = $request->get('SUBGROUP_TEST_ID');
        $ot_test_grades->SKILL_ID = $request->get('SKILL_ID');
        $ot_test_grades->QUESTION_FROM = $request->get('QUESTION_FROM');
        $ot_test_grades->QUESTION_TO = $request->get('QUESTION_TO');
        $ot_test_grades->GRADE = $request->get('GRADE');
        $ot_test_grades->DATE_FROM = $request->get('DATE_FROM');
        $ot_test_grades->DATE_TO = $request->get('DATE_TO');
        $ot_test_grades->save();
        return back()->withStatus(__('Test Grade successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ot_test_grades = ot_test_grade::destroy($id);
    }
}
