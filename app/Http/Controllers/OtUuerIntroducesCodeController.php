<?php

namespace App\Http\Controllers;

use App\Charts\UserChart;
use App\ot_uers_introduces_code;
use App\ot_user_answer_skill;
use App\ot_writing_corections_file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OtUuerIntroducesCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $User_id= Auth::user()->id;
        $ot_uers_introduces_codes = ot_uers_introduces_code::leftjoin('ot_users','USER_ID','=','ot_users.id')->leftjoin('ot_test_user_starts','ot_test_user_starts.USER_ID','=','ot_users.id')->
        leftjoin('ot_test_defines','ot_test_user_starts.TEST_ID','=','ot_test_defines.TESTS_ID')->leftjoin('ot_main_tests','ot_test_defines.MAIN_TEST_ID','=','ot_main_tests.MAINTEST_ID')->leftjoin('ot_subgroup_tests','ot_test_defines.SUBGROUP_TEST_ID','=','ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('INSTRUCTURES_ID','=',$User_id)->where('ot_uers_introduces_codes.STATUS','=','1')->where('ot_main_tests.STATUS','<>','2')->
        groupby('TYPE','SUBGROUP_TEST_NAME')->having('cn', '>', 0)->
        selectraw('count(ot_test_user_starts.ID) as cn,TYPE,SUBGROUP_TEST_NAME')->get();

        return view('Instructures.Referrals_Users',compact('ot_uers_introduces_codes'));

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_r()
    {
        //
        $User_id= Auth::user()->id;
        $ot_uers_introduces_codes = ot_uers_introduces_code::leftjoin('ot_users','USER_ID','=','ot_users.id')->leftjoin('ot_test_user_starts','ot_test_user_starts.USER_ID','=','ot_users.id')->
        leftjoin('ot_test_defines','ot_test_user_starts.TEST_ID','=','ot_test_defines.TESTS_ID')->leftjoin('ot_main_tests','ot_test_defines.MAIN_TEST_ID','=','ot_main_tests.MAINTEST_ID')->leftjoin('ot_subgroup_tests','ot_test_defines.SUBGROUP_TEST_ID','=','ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('INSTRUCTURES_ID','=',$User_id)->where('ot_uers_introduces_codes.STATUS','=','1')->where('ot_main_tests.STATUS','<>','2')->
        groupby('ot_users.id','ot_users.fname','ot_users.lname','ot_users.age','TYPE','SUBGROUP_TEST_NAME','ot_test_defines.MAIN_TEST_ID','ot_test_defines.SUBGROUP_TEST_ID')->having('cn', '>', 0)->
        selectraw('count(ot_test_user_starts.ID) as cn,ot_users.id,ot_users.fname,ot_users.lname,ot_users.age,TYPE,SUBGROUP_TEST_NAME,ot_test_defines.MAIN_TEST_ID,ot_test_defines.SUBGROUP_TEST_ID')->get();

        return view('Instructures.Applicant_results',compact('ot_uers_introduces_codes'));

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
     * @param  int  $id,$id2,$id3
     * @return \Illuminate\Http\Response
     */
    public function show($id,$id2,$id3)
    {
        //
        if ($id2==3)
        {
            $chart1 = ot_writing_corections_file::leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_writing_corections_files.TESTS_ID')->
            where('ot_writing_corections_files.status','=','2')->where('ot_writing_corections_files.USER_ID','=',$id)->where('PART_NUMBER','=',1)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
            get(['SEND_DATE','GRADE']);

            $chart = new UserChart();
            $chart->labels($chart1->pluck('SEND_DATE'));
            $chart->dataset('  PART 1 ', 'bar',$chart1->pluck('GRADE'))->options([
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
            $chart3 = ot_writing_corections_file::leftjoin('ot_test_defines','ot_test_defines.TESTS_ID','=','ot_writing_corections_files.TESTS_ID')->
            where('ot_writing_corections_files.status','=','2')->where('ot_writing_corections_files.USER_ID','=',$id)->where('PART_NUMBER','=',2)->where('MAIN_TEST_ID','=',$id2)->where('SUBGROUP_TEST_ID','=',$id3)->
            get(['SEND_DATE','GRADE']);

            $chart2 = new UserChart();
            $chart2->labels($chart3->pluck('SEND_DATE'));
            $chart2->dataset(' PART 2 ', 'bar',$chart3->pluck('GRADE'))->options([
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

            return view('Instructures.Chart_I',compact('chart','chart2'));
        }

       else {
           $chart1 = ot_user_answer_skill::leftjoin('ot_test_user_starts', 'TEST_U_START_ID', '=', 'ID')->leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_user_starts.TEST_ID')->
           where('ot_test_user_starts.status', '=', '1')->where('ot_test_user_starts.USER_ID', '=', $id)->where('MAIN_TEST_ID', '=', $id2)->where('SUBGROUP_TEST_ID', '=', $id3)->
           where('ot_user_answer_skills.SKILL_ID', '=', '1')->get(['START_DATE', 'ot_user_answer_skills.GRADE']);

           $chart_a = new UserChart();
           $chart_a->labels($chart1->pluck('START_DATE'));
           $chart_a->dataset(' LISTENING SCORE ', 'bar', $chart1->pluck('GRADE'))->options([
               'fill' => 'true',
               'borderColor' => 'white',
               'backgroundColor' => [
                   'rgba(216, 27, 96, 0.6)',
                   'rgba(3, 169, 244, 0.6)',
                   'rgba(255, 152, 0, 0.6)',
                   'rgba(29, 233, 182, 0.6)',
                   'rgba(156, 39, 176, 0.6)',
                   'rgba(84, 110, 122, 0.6)'],
               'responsive' => 'true',
           ]);
           //--------------------

           $chart2 = ot_user_answer_skill::leftjoin('ot_test_user_starts', 'TEST_U_START_ID', '=', 'ID')->leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_user_starts.TEST_ID')->
           where('ot_test_user_starts.status', '=', '1')->where('ot_test_user_starts.USER_ID', '=', $id)->where('MAIN_TEST_ID', '=', $id2)->where('SUBGROUP_TEST_ID', '=', $id3)->
           where('ot_user_answer_skills.SKILL_ID', '=', '2')->get(['START_DATE', 'ot_user_answer_skills.GRADE']);

           $chart_b = new UserChart();
           $chart_b->labels($chart2->pluck('START_DATE'));
           $chart_b->dataset(' READING SCORE ', 'bar', $chart2->pluck('GRADE'))->options([
               'fill' => 'true',
               'borderColor' => 'white',
               'backgroundColor' => [
                   'rgba(255, 152, 0, 0.6)',
                   'rgba(29, 233, 182, 0.6)',
                   'rgba(216, 27, 96, 0.6)',
                   'rgba(3, 169, 244, 0.6)',
                   'rgba(84, 110, 122, 0.6)',
                   'rgba(156, 39, 176, 0.6)'],
               'responsive' => 'true',
           ]);
           //--------------------

           $chart3 = ot_user_answer_skill::leftjoin('ot_test_user_starts', 'TEST_U_START_ID', '=', 'ID')->leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_user_starts.TEST_ID')->
           where('ot_test_user_starts.status', '=', '1')->where('ot_test_user_starts.USER_ID', '=', $id)->where('MAIN_TEST_ID', '=', $id2)->where('SUBGROUP_TEST_ID', '=', $id3)->
           where('ot_user_answer_skills.SKILL_ID', '=', '3')->get(['START_DATE', 'ot_user_answer_skills.GRADE']);

           $chart_c = new UserChart();
           $chart_c->labels($chart3->pluck('START_DATE'));
           $chart_c->dataset(' WRITING SCORE ', 'bar', $chart3->pluck('GRADE'))->options([
               'fill' => 'true',
               'borderColor' => 'white',
               'backgroundColor' => [
                   'rgba(156, 39, 176, 0.6)',
                   'rgba(84, 110, 122, 0.6)',
                   'rgba(3, 169, 244, 0.6)',
                   'rgba(216, 27, 96, 0.6)',
                   'rgba(255, 152, 0, 0.6)',
                   'rgba(29, 233, 182, 0.6)'],
               'responsive' => 'true',
           ]);
           //--------------------

           $chart4 = ot_user_answer_skill::leftjoin('ot_test_user_starts', 'TEST_U_START_ID', '=', 'ID')->leftjoin('ot_test_defines', 'ot_test_defines.TESTS_ID', '=', 'ot_test_user_starts.TEST_ID')->
           where('ot_test_user_starts.status', '=', '1')->where('ot_test_user_starts.USER_ID', '=', $id)->where('MAIN_TEST_ID', '=', $id2)->where('SUBGROUP_TEST_ID', '=', $id3)->
           where('ot_user_answer_skills.SKILL_ID', '=', '4')->get(['START_DATE', 'ot_user_answer_skills.GRADE']);

           $chart_d = new UserChart();
           $chart_d->labels($chart4->pluck('START_DATE'));
           $chart_d->dataset('SPEAKING SCORE ', 'bar', $chart4->pluck('GRADE'))->options([
               'fill' => 'true',
               'borderColor' => 'white',
               'backgroundColor' => [
                   'rgba(29, 233, 182, 0.6)',
                   'rgba(156, 39, 176, 0.6)',
                   'rgba(84, 110, 122, 0.6)',
                   'rgba(255, 152, 0, 0.6)',
                   'rgba(3, 169, 244, 0.6)',
                   'rgba(216, 27, 96, 0.6)'],
               'responsive' => 'true',
           ]);
           //--------------------


           return view('Instructures.Chart_ITS', compact('chart_a', 'chart_b', 'chart_c', 'chart_d'));
       }
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
