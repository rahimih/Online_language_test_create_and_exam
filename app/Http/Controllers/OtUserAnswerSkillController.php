<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\ot_test_user_start;
use App\ot_user_answer_skill;
use App\ot_user_answer_skills_part;
use App\ot_user_answer_skills_qt;
use App\ot_user_answers_package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtUserAnswerSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $USER_ID = Auth::user()->id;
        $ot_test_user_starts = ot_test_user_start::leftjoin('ot_test_registers','ot_test_user_starts.TEST_REGISTER_ID','=','ot_test_registers.TEST_REGISTER_ID')->
        leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('ot_test_registers.status','=','2')->where('ot_test_registers.USER_ID','=',$USER_ID)->where('ot_test_user_starts.USER_ID','=',$USER_ID)->
        where('ot_main_tests.status','=','1')->get(['ot_test_defines.TESTS_NAME','ot_test_user_starts.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME']);

        return view('Candidate.TRF_View', compact('ot_test_user_starts'));
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ot_user_answer_skill  $ot_user_answer_skill
     * @return \Illuminate\Http\Response
     */
    public function show(ot_user_answer_skill $ot_user_answer_skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ot_user_answer_skill  $ot_user_answer_skill
     * @return \Illuminate\Http\Response
     */
    public function edit(ot_user_answer_skill $ot_user_answer_skill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ot_user_answer_skill  $ot_user_answer_skill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ot_user_answer_skill $ot_user_answer_skill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ot_user_answer_skill  $ot_user_answer_skill
     * @return \Illuminate\Http\Response
     */
    public function destroy(ot_user_answer_skill $ot_user_answer_skill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Report($id)
    {

        $USER_ID = Auth::user()->id;
        $ot_test_user_starts = ot_test_user_start::leftjoin('ot_test_registers','ot_test_user_starts.TEST_REGISTER_ID','=','ot_test_registers.TEST_REGISTER_ID')->
        leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_institute_names', 'ot_test_defines.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('ot_test_registers.status','=','2')->where('ot_test_registers.USER_ID','=',$USER_ID)->where('ot_test_user_starts.USER_ID','=',$USER_ID)->
        where('ot_test_user_starts.ID','=',$id)->get(['ot_test_defines.TESTS_NAME','ot_test_user_starts.*', 'INSTITUTE_NAME','INSTITUTE_CODE', 'TYPE', 'SUBGROUP_TEST_NAME']);

        $ot_user_answer_skills = ot_user_answer_skill::leftjoin('ot_skill_types','ot_user_answer_skills.SKILL_ID','=','ot_skill_types.SKILL_ID')->
        where('TEST_U_START_ID','=',$id)->get();

        $ot_user_answers_packages1 = ot_user_answer_skills_part::leftjoin('ot_parts_names','ot_user_answer_skills_parts.PART_ID','=','ot_parts_names.PART_ID')->
        leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->where('USER_ID','=',$USER_ID)->where('TEST_U_START_ID','=',$id)->get(['parts_name','CORRECT_ANSWER as c1','QUESTION_NUMBERS as ts','skill_id']);

        $ot_user_answers_packages2 = ot_user_answer_skills_qt::leftjoin ('ot_questions_types' ,'ot_user_answer_skills_qts.QUESTION_TYPE_ID','=','ot_questions_types.QUESTION_ID')->
        leftjoin('ot_parts_names','ot_user_answer_skills_qts.PART_ID','=','ot_parts_names.PART_ID')->
        leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->where('USER_ID','=',$USER_ID)->where('TEST_U_START_ID','=',$id)->get(['parts_name','QUESTIONS_TYPE','CORRECT_ANSWER as c2','skill_id']);

/*        $ot_user_answers_packages1 = ot_user_answers_package::leftjoin('ot_answers_packages', function ($join) {$join->on('ot_user_answers_packages.PACKAGES_ID', '=', 'ot_answers_packages.PACKAGES_ID')->on('ot_user_answers_packages.QUESTION_NUMBER','=','ot_answers_packages.QUESTION_NUMBER');})->
        leftjoin('ot_questions_packages','ot_answers_packages.PACKAGES_ID','=','ot_questions_packages.QUESTIONS_PACKAGES_ID')->leftjoin('ot_packages_sections','ot_answers_packages.PACKAGES_ID','=','ot_packages_sections.QUESTIONS_PACKAGES_ID')->
        leftjoin('ot_parts_names','ot_packages_sections.PART_ID','=','ot_parts_names.PART_ID')->
        where('USER_ID','=',$USER_ID)->where('TEST_U_START_ID','=',$id)->
        whereraw("ot_answers_packages.QUESTION_NUMBER between QUESTION_FROMS and QUESTION_TOS")->
        whereNotNull('ot_user_answers_packages.ANSWER')->
        whereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER')->
        orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER2')->orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER3')->
        groupBy('parts_name')->groupBy('skill_id')->groupBy('ot_parts_names.PART_ID')->
        groupby('ts')->selectRaw('count(*) as c1 ,parts_name,skill_id,(ot_packages_sections.QUESTION_TOS-ot_packages_sections.QUESTION_FROMS+1)as ts')->get();*/

/*        $ot_user_answers_packages2 = ot_user_answers_package::leftjoin('ot_answers_packages', function ($join) {$join->on('ot_user_answers_packages.PACKAGES_ID', '=', 'ot_answers_packages.PACKAGES_ID')->on('ot_user_answers_packages.QUESTION_NUMBER','=','ot_answers_packages.QUESTION_NUMBER');})->
        leftjoin('ot_questions_packages','ot_answers_packages.PACKAGES_ID','=','ot_questions_packages.QUESTIONS_PACKAGES_ID')->leftjoin('ot_packages_sections','ot_answers_packages.PACKAGES_ID','=','ot_packages_sections.QUESTIONS_PACKAGES_ID')->
        leftjoin('ot_section_parts','ot_packages_sections.OT_PS_ID','=','ot_section_parts.OT_PS_ID')->
        leftjoin ('ot_questions_types' ,'ot_section_parts.QUESTION_TYPE_ID','=','ot_questions_types.QUESTION_ID')->
        leftjoin('ot_parts_names','ot_packages_sections.PART_ID','=','ot_parts_names.PART_ID')->
        where('USER_ID','=',$USER_ID)->where('TEST_U_START_ID','=',$id)->
        whereraw("ot_answers_packages.QUESTION_NUMBER between QUESTION_FROMP and QUESTION_TOP")->
        whereNotNull('ot_user_answers_packages.ANSWER')->
//        where('ot_answers_packages.ANSWER','like','%,ot_user_answers_packages.ANSWER,%')->
        whereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER')->
        orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER2')->orwhereColumn('ot_user_answers_packages.ANSWER','ot_answers_packages.ANSWER3')->
        groupBy('QUESTION_TYPE_ID')->groupBy('Part_id')->groupby('skill_id')->groupby('QUESTIONS_TYPE')->groupby('parts_name')->
        selectRaw('count(*) as c2  ,ot_parts_names.part_id,parts_name,QUESTIONS_TYPE,skill_id')->orderby('skill_id','ASC')->orderby('part_id','ASC')->get();*/

        $chart1 = ot_user_answer_skills_part::leftjoin('ot_parts_names','ot_user_answer_skills_parts.PART_ID','=','ot_parts_names.PART_ID')->
        leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->where('USER_ID','=',$USER_ID)->where('TEST_U_START_ID','=',$id)->where('SKILL_ID','=','1')->
        get(['parts_name','CORRECT_ANSWER as c1','QUESTION_NUMBERS as ts','skill_id']);

        $chart_a = new UserChart();
        $chart_a->labels($chart1->pluck('parts_name'));
        $chart_a->dataset(' SCORE ', 'pie',$chart1->pluck('c1'))->options([
            'fill' => 'true',
            'borderColor' => 'white' ,
            'backgroundColor' =>   [
                'rgba(216, 27, 96, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(29, 233, 182, 0.6)',
                'rgba(156, 39, 176, 0.6)',
                'rgba(84, 110, 122, 0.6)'] ,
            'responsive' => 'true',
        ]);
        //--------------------
        $chart2 = ot_user_answer_skills_part::leftjoin('ot_parts_names','ot_user_answer_skills_parts.PART_ID','=','ot_parts_names.PART_ID')->
        leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->where('USER_ID','=',$USER_ID)->where('TEST_U_START_ID','=',$id)->where('SKILL_ID','=','2')->
        get(['parts_name','CORRECT_ANSWER as c1','QUESTION_NUMBERS as ts','skill_id']);

        $chart_b = new UserChart();
        $chart_b->labels($chart2->pluck('parts_name'));
        $chart_b->dataset(' SCORE ', 'pie',$chart2->pluck('c1'))->options([
            'fill' => 'true',
            'borderColor' => 'white' ,
            'backgroundColor' =>   [
                'rgba(216, 27, 96, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(29, 233, 182, 0.6)',
                'rgba(156, 39, 176, 0.6)',
                'rgba(84, 110, 122, 0.6)'] ,
            'responsive' => 'true',
        ]);

        //-------------------Questions
        $chart3 = ot_user_answer_skills_qt::leftjoin ('ot_questions_types' ,'ot_user_answer_skills_qts.QUESTION_TYPE_ID','=','ot_questions_types.QUESTION_ID')->
        leftjoin('ot_parts_names','ot_user_answer_skills_qts.PART_ID','=','ot_parts_names.PART_ID')->leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->where('USER_ID','=',$USER_ID)->
        where('SKILL_ID','=','1')->where('TEST_U_START_ID','=',$id)->get(['QUESTIONS_TYPE','CORRECT_ANSWER as c2','parts_name']);

        $chart_c = new UserChart();
        $chart_c->labels($chart3->pluck('QUESTIONS_TYPE'));
        $chart_c->dataset(' SCORE ', 'pie',$chart3->pluck('c2'))->options([
            'fill' => 'true',
            'borderColor' => 'white' ,
            'backgroundColor' =>   [
                'rgba(216, 27, 96, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(29, 233, 182, 0.6)',
                'rgba(156, 39, 176, 0.6)',
                'rgba(84, 110, 122, 0.6)'] ,
            'responsive' => 'true',
        ]);


        $chart4 = ot_user_answer_skills_qt::leftjoin ('ot_questions_types' ,'ot_user_answer_skills_qts.QUESTION_TYPE_ID','=','ot_questions_types.QUESTION_ID')->
        leftjoin('ot_parts_names','ot_user_answer_skills_qts.PART_ID','=','ot_parts_names.PART_ID')->leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->where('USER_ID','=',$USER_ID)->
        where('SKILL_ID','=','2')->where('TEST_U_START_ID','=',$id)->get(['QUESTIONS_TYPE','CORRECT_ANSWER as c2','parts_name']);

        $chart_d = new UserChart();
        $chart_d->labels($chart4->pluck('QUESTIONS_TYPE'));
        $chart_d->dataset(' SCORE ', 'pie',$chart4->pluck('c2'))->options([
            'fill' => 'true',
            'borderColor' => 'white' ,
            'backgroundColor' =>   [
                'rgba(216, 27, 96, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(29, 233, 182, 0.6)',
                'rgba(156, 39, 176, 0.6)',
                'rgba(84, 110, 122, 0.6)'] ,
            'responsive' => 'true',
        ]);


        return view('Candidate.TRF_Report', compact('ot_test_user_starts','ot_user_answer_skills','ot_user_answers_packages1','ot_user_answers_packages2','chart_a','chart_b','chart_c','chart_d'));

    }

    public function Print()
    {

    }

    public function pdf()
    {

    }

    public function Email()
    {

    }


}
