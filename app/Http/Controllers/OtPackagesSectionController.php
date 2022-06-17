<?php

namespace App\Http\Controllers;

use App\ot_main_test;
use App\ot_packages_section;
use App\ot_questions_packages;
use App\ot_questions_type;
use App\ot_section_part;
use App\ot_skill_type;
use App\ot_subgroup_test;
use App\ot_test_part;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OtPackagesSectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $C_institude
     */
    public function index()
    {
        $C_institude=  Auth::user()->Anestutude_Id;
        $ot_questions_packages = ot_questions_packages::leftjoin('ot_main_tests', 'ot_questions_packages.MAINTESTS_ID', '=', 'ot_main_tests.MAINTEST_ID')->
        leftjoin('ot_skill_types', 'ot_questions_packages.SKILL_ID', '=', 'ot_skill_types.SKILL_ID')->
        leftjoin('ot_institute_names', 'ot_questions_packages.INSTITUTE_ID', '=', 'ot_institute_names.ID')->
        leftjoin('ot_subgroup_tests', 'ot_questions_packages.SUBGROUP_TEST_ID', '=', 'ot_subgroup_tests.SUBGROUP_TEST_ID')->
        where('INSTITUTE_ID', '=', $C_institude)->where('ot_questions_packages.STATUS','=','1')->
        get(['ot_questions_packages.*', 'INSTITUTE_NAME', 'TYPE', 'SUBGROUP_TEST_NAME', 'SKILL_TYPE', 'QUESTIONS_COUNT', 'TOTAL_TEST_TIME']);
        // where('fname','like' ,'%'.$search.'%') or where('lname','like' ,'%'.$search.'%') or where('email','like' ,'%'.$search.'%')or where('mobile','like' ,'%'.$search.'%')->get();

        return view('Admin.Test_define.Select_Questions_Packages',compact('ot_questions_packages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //---------save data

        $FILE_KIND = $request->input('SFILE_KIND');
        if ($FILE_KIND=='AUDIO')
        {
            $request->validate([
                'FILE_NAME' => ['required','mimes:mp3'],
            ]);
        }
        if ($FILE_KIND=='VIDEO')
        {
            $request->validate([
            'FILE_NAME' => ['required','mimes:mp4'],
            ]);
        }
        if ($FILE_KIND=='PDF')
        {
            $request->validate([
            'FILE_NAME' => ['required','mimes:pdf'],
            ]);
        }
        if ($FILE_KIND=='PICTURE')
        {
            $request->validate([
                'FILE_NAME' => ['required','mimes:jpg,jpeg'],
            ]);
        }

        $ot_packages_sections = new ot_packages_section();
        $ot_packages_sections->QUESTIONS_PACKAGES_ID=$request->get('QUESTIONS_PACKAGES_ID');
        $ot_packages_sections->PART_ID=$request->get('PART_ID');
        $ot_packages_sections->QUESTION_FROMS=$request->get('SQUESTION_FROM');
        $ot_packages_sections->QUESTION_TOS=$request->get('SQUESTION_TO');
        $ot_packages_sections->PART_COUNT=$request->get('PART_COUNT');
        $ot_packages_sections->FILE_KIND=$request->get('SFILE_KIND');

        $dname=$request->input('QUESTIONS_PACKAGES_ID');

        if ($request->hasFile('sfile')) {
            $music_file = $request->file('sfile');
            $filename = $music_file->getClientOriginalName();
            $fileext = $music_file->getClientOriginalExtension();
            $filename = $filename+'.'+$fileext;
            if ($FILE_KIND=='AUDIO')
            $location = public_path('AUDIO/' .$dname);
            if ($FILE_KIND=='VIDEO')
                $location = public_path('VIDEO/' .$dname);
            if ($FILE_KIND=='PDF')
                $location = public_path('PDF/' .$dname);
            if ($FILE_KIND=='PICTURE')
                $location = public_path('PICTURE/' .$dname);

            $music_file->move($location,$filename);
            $ot_packages_sections->FILE_NAME = $filename;
        }
        $ot_packages_sections->save();
        return back()->withStatus(__(' test successfully Created.'));
        //------------
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ot_packages_section  $ot_packages_section
     * @return \Illuminate\Http\Response
     */
    public function show(ot_packages_section $ot_packages_section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ot_packages_section  $ot_packages_section
     * @return \Illuminate\Http\Response
     */
    public function edit(ot_packages_section $ot_packages_section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ot_packages_section  $ot_packages_section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ot_packages_section $ot_packages_section)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ot_packages_section  $ot_packages_section
     * @return \Illuminate\Http\Response
     */
    public function destroy(ot_packages_section $ot_packages_section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $id
     * @param  string $packname
     * @param  int $maintest
     * @param int $skillid
     * @param int $pack_id
     */
    public function select($id)
    {
        $ot_questions_packages = ot_questions_packages::find($id);
        $packname= $ot_questions_packages->QUESTIONS_PACKAGES_NAME;
        $maintest = $ot_questions_packages->MAINTESTS_ID;
        $skillid = $ot_questions_packages-> SKILL_ID;
        $pack_id = $ot_questions_packages-> QUESTIONS_PACKAGES_ID;
        $subgroupid = $ot_questions_packages-> SUBGROUP_TEST_ID;
        $ot_test_parts = ot_test_part::leftjoin('ot_parts_names','ot_test_parts.part_id', '=' ,'ot_parts_names.part_id')->
        where('MAINTEST_ID','=',$maintest)->where('SKILL_ID', '=', $skillid)->where('ot_test_parts.status', '=', '1')->get();

        $ot_skill_types = ot_skill_type::find($skillid);
        $skillname = $ot_skill_types-> SKILL_TYPE;

        $ot_main_tests = ot_main_test::find($maintest);
        $maintestname = $ot_main_tests-> TYPE;

        $ot_questions_packages = ot_subgroup_test::find($subgroupid);
        $subgroupname= $ot_questions_packages->SUBGROUP_TEST_NAME;

        return view('Admin.Test_define.Sections_Creator',compact('pack_id','ot_test_parts'),compact('packname','skillname','maintestname','subgroupname'));
    }

    public function step2()
    {
//        return view('Test_define.Sections_Creator');
          return back("Admin.Test_define.Sections_Creator");
    }

    public function step3()
    {

        $ot_questions_types = ot_questions_type::where('status', '=', '1')->get();
        return view('Admin.Test_define.Parts_Creator',compact('ot_questions_types'));
    }

    public function step4()
    {
        return view('Admin.Test_define.Questions_Creator');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     * @param  int  $Qid
     * @param  string $Qheader
     */
    public static function question_header($Qid)
    {
        $ot_questions_types =ot_questions_type::find($Qid);
        $Qheader= $ot_questions_types->HEADER;
        return $Qheader;
    }

}
