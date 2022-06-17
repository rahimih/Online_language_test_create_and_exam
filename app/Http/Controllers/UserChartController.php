<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\ot_skill_level_grade;
use App\ot_test_user_start;
use App\ot_user_answer_skill;
use App\ot_writing_corections_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserChartController extends Controller
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
        $i=0;
        $OpenForm=1;
        $ot_writing_corections_files = ot_writing_corections_file::leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_writing_corections_files.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_writing_corections_files.status','=','2')->
        where('ot_writing_corections_files.USER_ID','=',$USER_ID)->groupby('PART_NUMBER','ot_test_defines.MAIN_TEST_ID','ot_test_defines.SUBGROUP_TEST_ID','TYPE','SUBGROUP_TEST_NAME')->get(['PART_NUMBER','ot_test_defines.MAIN_TEST_ID','ot_test_defines.SUBGROUP_TEST_ID','TYPE','SUBGROUP_TEST_NAME']);

        return view('Candidate.Charts_view', compact('ot_writing_corections_files','i','OpenForm'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_p()
    {
        //
        $USER_ID = Auth::user()->id;
        $i=0;
        $OpenForm=2;
        $ot_writing_corections_files = ot_writing_corections_file::leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_writing_corections_files.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_writing_corections_files.status','=','2')->
        where('ot_writing_corections_files.USER_ID','=',$USER_ID)->groupby('PART_NUMBER','ot_test_defines.MAIN_TEST_ID','ot_test_defines.SUBGROUP_TEST_ID','TYPE','SUBGROUP_TEST_NAME')->get(['PART_NUMBER','ot_test_defines.MAIN_TEST_ID','ot_test_defines.SUBGROUP_TEST_ID','TYPE','SUBGROUP_TEST_NAME']);

        return view('Candidate.Charts_view', compact('ot_writing_corections_files','i','OpenForm'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_t()
    {
        //
        $USER_ID = Auth::user()->id;
        $i=0;
        $OpenForm=1;
                $ot_test_user_starts = ot_test_user_start::leftjoin('ot_test_registers','ot_test_user_starts.TEST_REGISTER_ID','=','ot_test_registers.TEST_REGISTER_ID')->
                leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_registers.TESTS_ID')->
                leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
                leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_test_user_starts.status','=','1')->
                where('ot_test_registers.status','=','2')->where('ot_test_registers.USER_ID','=',$USER_ID)->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('ot_main_tests.status','=','1')->
//                distinct()->orderby('TYPE', 'ASC')->get(['TYPE', 'SUBGROUP_TEST_NAME','ot_subgroup_tests.SUBGROUP_TEST_ID']);
                 groupby('ot_test_defines.MAIN_TEST_ID','ot_test_defines.SUBGROUP_TEST_ID','TYPE','SUBGROUP_TEST_NAME')->get(['ot_test_defines.MAIN_TEST_ID','ot_test_defines.SUBGROUP_TEST_ID','TYPE','SUBGROUP_TEST_NAME']);

        return view('Candidate.Charts_view_Tests', compact('ot_test_user_starts','i','OpenForm'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_tl()
    {
        //
        $USER_ID = Auth::user()->id;
        $i=0;
        $OpenForm=2;
        $ot_test_user_starts = ot_test_user_start::leftjoin('ot_test_registers','ot_test_user_starts.TEST_REGISTER_ID','=','ot_test_registers.TEST_REGISTER_ID')->
        leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_registers.TESTS_ID')->
        leftjoin('ot_main_tests', 'ot_test_defines.MAIN_TEST_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_subgroup_tests', 'ot_test_defines.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->where('ot_test_user_starts.status','=','1')->
        where('ot_test_registers.status','=','2')->where('ot_test_registers.USER_ID','=',$USER_ID)->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('ot_main_tests.status','=','1')->
//                distinct()->orderby('TYPE', 'ASC')->get(['TYPE', 'SUBGROUP_TEST_NAME','ot_subgroup_tests.SUBGROUP_TEST_ID']);
        groupby('ot_test_defines.MAIN_TEST_ID','ot_test_defines.SUBGROUP_TEST_ID','TYPE','SUBGROUP_TEST_NAME')->get(['ot_test_defines.MAIN_TEST_ID','ot_test_defines.SUBGROUP_TEST_ID','TYPE','SUBGROUP_TEST_NAME']);

        return view('Candidate.Charts_view_Tests', compact('ot_test_user_starts','i','OpenForm'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id,$id2,$id3
     * @return \Illuminate\Http\Response
     */
    public function WCS_show($id1,$id2,$id3)
    {
        //
        $USER_ID = Auth::user()->id;
        $OpenForm=1;
        $chart1 = ot_writing_corections_file::leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_writing_corections_files.TESTS_ID')->
        where('ot_writing_corections_files.status','=','2')->where('ot_writing_corections_files.USER_ID','=',$USER_ID)->where('PART_NUMBER','=',$id1)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        get(['SEND_DATE','GRADE']);

        $chart = new UserChart();
        $chart->labels($chart1->pluck('SEND_DATE'));
        $chart->dataset(' SCORE ', 'bar',$chart1->pluck('GRADE'))->options([
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
       //----------------
        $chart2 = new UserChart();
        $chart2->labels($chart1->pluck('SEND_DATE'));
        $chart2->dataset(' SCORE ', 'line',$chart1->pluck('GRADE'))->options([
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

        return view('Candidate.Chart',compact('chart','chart2','OpenForm'));


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id,$id2,$id3
     * @return \Illuminate\Http\Response
     */
    public function Test_show($id2,$id3)
    {
        //
        $USER_ID = Auth::user()->id;

        $chart1= ot_user_answer_skill::leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_user_starts.TEST_ID')->
        where('ot_test_user_starts.status','=','1')->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_user_answer_skills.SKILL_ID','=','1')->get(['START_DATE','ot_user_answer_skills.GRADE']);

        $chart_a = new UserChart();
        $chart_a->labels($chart1->pluck('START_DATE'));
        $chart_a->dataset(' LISTENING SCORE ', 'bar',$chart1->pluck('GRADE'))->options([
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

        $chart2= ot_user_answer_skill::leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_user_starts.TEST_ID')->
        where('ot_test_user_starts.status','=','1')->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_user_answer_skills.SKILL_ID','=','2')->get(['START_DATE','ot_user_answer_skills.GRADE']);

        $chart_b = new UserChart();
        $chart_b->labels($chart2->pluck('START_DATE'));
        $chart_b->dataset(' READING SCORE ', 'bar',$chart2->pluck('GRADE'))->options([
            'fill' => 'true',
            'borderColor' => 'white' ,
            'backgroundColor' =>   [
                'rgba(255, 152, 0, 0.6)',
                'rgba(29, 233, 182, 0.6)',
                'rgba(216, 27, 96, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(84, 110, 122, 0.6)',
                'rgba(156, 39, 176, 0.6)'] ,
            'responsive' => 'true',
        ]);
        //--------------------

        $chart3= ot_user_answer_skill::leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_user_starts.TEST_ID')->
        where('ot_test_user_starts.status','=','1')->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_user_answer_skills.SKILL_ID','=','3')->get(['START_DATE','ot_user_answer_skills.GRADE']);

        $chart_c = new UserChart();
        $chart_c->labels($chart3->pluck('START_DATE'));
        $chart_c->dataset(' WRITING SCORE ', 'bar',$chart3->pluck('GRADE'))->options([
            'fill' => 'true',
            'borderColor' => 'white' ,
            'backgroundColor' =>   [
                'rgba(156, 39, 176, 0.6)',
                'rgba(84, 110, 122, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(216, 27, 96, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(29, 233, 182, 0.6)'] ,
            'responsive' => 'true',
        ]);
        //--------------------

        $chart4= ot_user_answer_skill::leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_user_starts.TEST_ID')->
        where('ot_test_user_starts.status','=','1')->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_user_answer_skills.SKILL_ID','=','4')->get(['START_DATE','ot_user_answer_skills.GRADE']);

        $chart_d = new UserChart();
        $chart_d->labels($chart4->pluck('START_DATE'));
        $chart_d->dataset('SPEAKING SCORE ', 'bar',$chart4->pluck('GRADE'))->options([
            'fill' => 'true',
            'borderColor' => 'white' ,
            'backgroundColor' =>   [
                'rgba(29, 233, 182, 0.6)',
                'rgba(156, 39, 176, 0.6)',
                'rgba(84, 110, 122, 0.6)',
                'rgba(255, 152, 0, 0.6)',
                'rgba(3, 169, 244, 0.6)',
                'rgba(216, 27, 96, 0.6)'] ,
            'responsive' => 'true',
        ]);
        //--------------------


        return view('Candidate.Chart_TS',compact('chart_a','chart_b','chart_c','chart_d'));


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id,$id2,$id3
     * @return \Illuminate\Http\Response
     */
    public function Test_show_l($id2,$id3)
    {
        //
        $USER_ID = Auth::user()->id;

        $chart1= ot_user_answer_skill::leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_user_starts.TEST_ID')->
        where('ot_test_user_starts.status','=','1')->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_user_answer_skills.SKILL_ID','=','1')->get(['START_DATE','ot_user_answer_skills.GRADE']);

        $chart_a = new UserChart();
        $chart_a->labels($chart1->pluck('START_DATE'));
        $chart_a->dataset(' LISTENING SCORE ', 'line',$chart1->pluck('GRADE'))->options([
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

        $chart2= ot_user_answer_skill::leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_user_starts.TEST_ID')->
        where('ot_test_user_starts.status','=','1')->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_user_answer_skills.SKILL_ID','=','2')->get(['START_DATE','ot_user_answer_skills.GRADE']);

        $chart_b = new UserChart();
        $chart_b->labels($chart2->pluck('START_DATE'));
        $chart_b->dataset(' READING SCORE ', 'line',$chart2->pluck('GRADE'))->options([
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

        $chart3= ot_user_answer_skill::leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_user_starts.TEST_ID')->
        where('ot_test_user_starts.status','=','1')->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_user_answer_skills.SKILL_ID','=','3')->get(['START_DATE','ot_user_answer_skills.GRADE']);

        $chart_c = new UserChart();
        $chart_c->labels($chart3->pluck('START_DATE'));
        $chart_c->dataset(' WRITING SCORE ', 'line',$chart3->pluck('GRADE'))->options([
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

        $chart4= ot_user_answer_skill::leftjoin('ot_test_user_starts','TEST_U_START_ID','=','ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_test_user_starts.TEST_ID')->
        where('ot_test_user_starts.status','=','1')->where('ot_test_user_starts.USER_ID','=',$USER_ID)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_user_answer_skills.SKILL_ID','=','4')->get(['START_DATE','ot_user_answer_skills.GRADE']);

        $chart_d = new UserChart();
        $chart_d->labels($chart4->pluck('START_DATE'));
        $chart_d->dataset('SPEAKING SCORE ', 'line',$chart4->pluck('GRADE'))->options([
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


        return view('Candidate.Chart_TS',compact('chart_a','chart_b','chart_c','chart_d'));


    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id,$id2,$id3
     * @return \Illuminate\Http\Response
     */
    public function WCSP_show($id1,$id2,$id3)
    {
        //
        $USER_ID = Auth::user()->id;
        $OpenForm=2;

        $chart1 = ot_skill_level_grade::leftjoin('ot_writing_corections_files','ot_writing_corections_files.WRITING_FILES_ID','=','ot_skill_level_grades.WRITING_FILES_ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_writing_corections_files.TESTS_ID')->
        leftjoin('ot_skill_level_relations','ot_skill_level_grades.skill_level_relation_id','=','ot_skill_level_relations.skill_level_relation_id')->leftjoin('ot_skill_levels','ot_skill_levels.skill_level_id','=','ot_skill_level_relations.skill_level_id')->
        where('skill_id','=','3')->where('ot_writing_corections_files.status','=','2')->where('ot_writing_corections_files.USER_ID','=',$USER_ID)->where('PART_NUMBER','=',$id1)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_skill_levels.skill_level_id','=','1')->get(['SEND_DATE','ot_skill_level_grades.GRADE','abs_name']);

        $chart_a = new UserChart();
        $chart_a->labels($chart1->pluck('SEND_DATE'));
        $chart_a->dataset('Task achievement SCORE ', 'bar',$chart1->pluck('GRADE'))->options([
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

        //----------------

        $chart2 = ot_skill_level_grade::leftjoin('ot_writing_corections_files','ot_writing_corections_files.WRITING_FILES_ID','=','ot_skill_level_grades.WRITING_FILES_ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_writing_corections_files.TESTS_ID')->
        leftjoin('ot_skill_level_relations','ot_skill_level_grades.skill_level_relation_id','=','ot_skill_level_relations.skill_level_relation_id')->leftjoin('ot_skill_levels','ot_skill_levels.skill_level_id','=','ot_skill_level_relations.skill_level_id')->
        where('skill_id','=','3')->where('ot_writing_corections_files.status','=','2')->where('ot_writing_corections_files.USER_ID','=',$USER_ID)->where('PART_NUMBER','=',$id1)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_skill_levels.skill_level_id','=','2')->get(['SEND_DATE','ot_skill_level_grades.GRADE','abs_name']);

        $chart_b = new UserChart();
        $chart_b->labels($chart2->pluck('SEND_DATE'));
        $chart_b->dataset(' Coherence and cohesion SCORE ', 'bar',$chart2->pluck('GRADE'))->options([
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

        //----------------

        $chart3 = ot_skill_level_grade::leftjoin('ot_writing_corections_files','ot_writing_corections_files.WRITING_FILES_ID','=','ot_skill_level_grades.WRITING_FILES_ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_writing_corections_files.TESTS_ID')->
        leftjoin('ot_skill_level_relations','ot_skill_level_grades.skill_level_relation_id','=','ot_skill_level_relations.skill_level_relation_id')->leftjoin('ot_skill_levels','ot_skill_levels.skill_level_id','=','ot_skill_level_relations.skill_level_id')->
        where('skill_id','=','3')->where('ot_writing_corections_files.status','=','2')->where('ot_writing_corections_files.USER_ID','=',$USER_ID)->where('PART_NUMBER','=',$id1)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_skill_levels.skill_level_id','=','3')->get(['SEND_DATE','ot_skill_level_grades.GRADE','abs_name']);

        $chart_c = new UserChart();
        $chart_c->labels($chart3->pluck('SEND_DATE'));
        $chart_c->dataset('Lexical resource SCORE ', 'bar',$chart3->pluck('GRADE'))->options([
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

        //----------------

        $chart4 = ot_skill_level_grade::leftjoin('ot_writing_corections_files','ot_writing_corections_files.WRITING_FILES_ID','=','ot_skill_level_grades.WRITING_FILES_ID')->leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_writing_corections_files.TESTS_ID')->
        leftjoin('ot_skill_level_relations','ot_skill_level_grades.skill_level_relation_id','=','ot_skill_level_relations.skill_level_relation_id')->leftjoin('ot_skill_levels','ot_skill_levels.skill_level_id','=','ot_skill_level_relations.skill_level_id')->
        where('skill_id','=','3')->where('ot_writing_corections_files.status','=','2')->where('ot_writing_corections_files.USER_ID','=',$USER_ID)->where('PART_NUMBER','=',$id1)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
        where('ot_skill_levels.skill_level_id','=','4')->get(['SEND_DATE','ot_skill_level_grades.GRADE','abs_name']);

        $chart_d = new UserChart();
        $chart_d->labels($chart4->pluck('SEND_DATE'));
        $chart_d->dataset('Grammatical range and accuracy SCORE ', 'bar',$chart4->pluck('GRADE'))->options([
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


        return view('Candidate.Chart_P',compact('chart_a','chart_b','chart_c','chart_d','OpenForm'));


    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
