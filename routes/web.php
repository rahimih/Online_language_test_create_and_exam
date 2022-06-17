<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('MainPage.Mainpage');
});

Route::get('/about', function () {
    return view('MainPage.About_us');
});

Route::get('/Mock', function () {
    return view('MainPage.Mock_Test');
});

Route::get('/Learning', function () {
    return view('MainPage.Learning');
});

Route::get('/Mentoring', function () {
    return view('MainPage.Mentoring');
});

Route::get('/Webinar', function () {
    return view('MainPage.Webinar');
});

Route::get('/Download', function () {
    return view('MainPage.Download');
});

Auth::routes();
//Auth::routes(['verify' => true]);

Route::get('/Dashboard', 'HomeController@index')->name('Dashboard');

Route::group(['middleware' => 'auth'], function () {
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::get('eprofile', ['as' => 'profile.edit_e', 'uses' => 'ProfileController@edit_e']);
    Route::get('iprofile', ['as' => 'profile.edit_i', 'uses' => 'ProfileController@edit_i']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
//-----------
    Route::get('profiles', ['as' => 'profiles.edit', 'uses' => 'ProfilesController@edit']);
    Route::put('profiles', ['as' => 'profiles.update', 'uses' => 'ProfilesController@update']);
    Route::put('profiles/password', ['as' => 'profiles.password', 'uses' => 'ProfilesController@password']);

    //    institutes
    Route::resource('Institute', 'InstituteController', ['except' => ['show']]);
    //users
    Route::resource('User', 'UsersController', ['except' => ['show']]);
    route::put('User/{User}/password',['as' => 'Users.password', 'uses' => 'UsersController@Passwords']);
    //language
    Route::resource('language', 'LanguageTypeController', ['except' => ['show']]);
    //main test
    Route::resource('M_Test', 'MainTestController', ['except' => ['show']]);
    //parts_names
    Route::resource('parts_name', 'PartsNameController', ['except' => ['show']]);
     //QUESTION TYPE
    Route::resource('Question_type', 'OtQuestionsTypeController', ['except' => ['show']]);
    //SKILL TYPE
    Route::resource('Skill_type', 'OtSkillTypeController', ['except' => ['show']]);
    //SUBGROUPTEST TYPE
    Route::resource('Subgroup_Test', 'OtSubgroupTestController', ['except' => ['show']]);
    //Test Skill
    Route::resource('Test_skill', 'OtTestSkillController', ['except' => ['show']]);
    //Test Skill
    Route::resource('Test_part', 'OtTestPartController', ['except' => ['show']]);
    //Test Grades
    Route::resource('Test_Grade', 'OtTestGradeController', ['except' => ['show']]);
    //Test Define
    Route::resource('Tests', 'OtTestDefineController', ['except' => ['show']]);
    Route::post('Tests/{Tests}/step2', ['as' => 'Tests.step2', 'uses' => 'OtTestDefineController@store2']);
    Route::put('Tests', ['as' => 'Tests.update2', 'uses' => 'OtTestDefineController@update2']);

    //questions
    //QUESTION PACKAGE
    Route::resource('Q_Package', 'OtQuestionsPackagesController', ['except' => ['show']]);
    Route::get('Q_Package/answer/{Q_Package}', ['as' => 'Q_Package.answer', 'uses' => 'OtQuestionsPackagesController@answer']);
    Route::post('Q_Package/answer/{Q_Package}', ['as' => 'Q_Package.answers', 'uses' => 'OtQuestionsPackagesController@answers']);
    Route::put('Q_Package/update_answer/{Q_Package}', ['as' => 'Q_Package.update_answer', 'uses' => 'OtQuestionsPackagesController@update_answer']);
    //QUESTION PACKAGE CREATE
    Route::get('QP_Creator/{QP_Creator}', ['as' => 'QP_Creator.select', 'uses' => 'OtPackagesSectionController@select']);
    Route::get('QP_Creators/step2', ['as' => 'QP_Creator.step2', 'uses' => 'OtPackagesSectionController@step2']);
    Route::get('QP_Creators/step3', ['as' => 'QP_Creator.step3', 'uses' => 'OtPackagesSectionController@step3']);
    Route::get('QP_Creators/step4', ['as' => 'QP_Creator.step4', 'uses' => 'OtPackagesSectionController@step4']);
    Route::resource('QP_Creator', 'OtPackagesSectionController', ['except' => ['show']]);

//    //SECTION-PART
//    Route::get('QS_Creators', ['as' => 'QS_Creator.PreviousPage', 'uses' => 'OtSectionPartController@PreviousPage']);
//    Route::resource('QS_Creator', 'OtSectionPartController', ['except' => ['show']]);
//    //PART-QUESTIONS
//    Route::resource('QPT_Creator', 'OtPartQuestionController', ['except' => ['show']]);

//CANDIDATE
    Route::get('factor/{factor}', ['as' => 'Test_Register.Register', 'uses' => 'OtTestRegisterController@Register']);
    Route::get('Select_Test', ['as' => 'Test_Register.Select_Test', 'uses' => 'OtTestRegisterController@Select_Test']);
    Route::get('Passed_Test', ['as' => 'Test_Register.Passed_Test', 'uses' => 'OtTestRegisterController@Passed_Test']);
    Route::get('Test_Registered', ['as' => 'Test_Register.index', 'uses' => 'OtTestRegisterController@index']);
    Route::get('Test_Registers/{p1}/{p2}', ['as' => 'Test_Register.index_r', 'uses' => 'OtTestRegisterController@index_r']);
    Route::get('Test_Registers', ['as' => 'Test_Register.index_d', 'uses' => 'OtTestRegisterController@index_d']);
    Route::get('Speaking_Test', ['as' => 'Test_Register.Speaking_Test', 'uses' => 'OtTestRegisterController@Speaking_Test']);
    Route::get('Writing_Registers/{p1}/{p2}', ['as' => 'Test_Register.index_w', 'uses' => 'OtTestRegisterController@index_w']);
    Route::get('Writing_Registers', ['as' => 'Test_Register.index_ws', 'uses' => 'OtTestRegisterController@index_ws']);
    Route::get('Writing_files', ['as' => 'Test_Register.Writing_files', 'uses' => 'OtTestRegisterController@Writing_files']);

    Route::post('Test_Register', ['as' => 'Test_Register.store', 'uses' => 'OtTestRegisterController@store']);
    //bank
    Route::post('verify', ['as' => 'Test_Register.verify', 'uses' => 'OtTestRegisterController@verify']);

    Route::get('Test_Level', ['as' => 'Test_Register.index_l', 'uses' => 'OtTestRegisterController@index_l']);
    Route::get('LevelResult', ['as' => 'Test_Register.LevelResult', 'uses' => 'OtTestRegisterController@LevelResult']);
    Route::get('LevelTest/{p1}', ['as' => 'Test_Register.LevelTest', 'uses' => 'OtTestRegisterController@LevelTest']);
    Route::post('LevelStart', ['as' => 'Level_Start.store', 'uses' => 'OtTestUserStartController@store_level']);
    Route::post('LevelStarts', ['as' => 'Level_Start.stores', 'uses' => 'OtTestUserStartController@store_Levels']);


    Route::get('Starts/{p1}/{p2}', ['as' => 'Test_Start.Confirm', 'uses' => 'OtTestUserStartController@Confirm']);
    Route::get('Speaking_Start/{p1}/{p2}', ['as' => 'Speaking_Start.Confirm', 'uses' => 'OtTestUserStartController@SpeakingConfirm']);
    Route::get('writing_cs_Start', ['as' => 'writing_cs_Start.Confirm', 'uses' => 'OtTestUserStartController@WritingConfirm']);
    Route::post('Start', ['as' => 'Test_Start.store', 'uses' => 'OtTestUserStartController@store']);
    //--------speaking_appointment
    Route::post('Speaking_Start_Appointment', ['as' => 'Speaking.StartAppointment', 'uses' => 'OtTestUserStartController@Appointment_Start']);
    Route::get('Speaking_Appointments/{p1}', ['as' => 'Speaking_Appointments.edit', 'uses' => 'OtTestUserStartController@edit']);
    Route::post('Speaking_Time_Appointment', ['as' => 'Speaking.TimeAppointment', 'uses' => 'OtTestUserStartController@Appointment_Time']);
    Route::post('Speaking_Appointment', ['as' => 'Speaking.Appointment', 'uses' => 'OtTestUserStartController@Appointment_store']);
    //-------------
    Route::post('writing_store', ['as' => 'Test_Start.writing_store', 'uses' => 'OtTestUserStartController@writing_store']);
    Route::post('speaking_store', ['as' => 'Test_Start.speaking_store', 'uses' => 'OtTestUserStartController@speaking_store']);
    Route::post('Start_1', ['as' => 'Test_Start.store_l', 'uses' => 'OtTestUserStartController@store_l']);
    Route::post('Start_2', ['as' => 'Test_Start.store_r', 'uses' => 'OtTestUserStartController@store_r']);
    Route::post('Start_3', ['as' => 'Test_Start.store_w', 'uses' => 'OtTestUserStartController@store_w']);
    Route::post('Start_4', ['as' => 'Test_Start.store_s', 'uses' => 'OtTestUserStartController@store_s']);

    route::get('TRF_Reports',['as' => 'TRF.index','uses' => 'OtUserAnswerSkillController@index']);
    route::get('TRF_print',['as' => 'TRF.print','uses' => 'OtUserAnswerSkillController@print']);
    route::get('TRF_Pdf',['as' => 'TRF.pdf','uses' => 'OtUserAnswerSkillController@pdf']);
    route::get('TRF_Email',['as' => 'TRF.email','uses' => 'OtUserAnswerSkillController@email']);
    route::get('TRF_Report/{TRF_Report}',['as' => 'TRF.Report','uses' => 'OtUserAnswerSkillController@Report']);
    route::get('ans',['as' => 'answersheet','uses' => 'OtTestUserStartController@answer_sheet']);

    //EXAMINER
    Route::resource('WRITING_SERVICES', 'OtWritingCorectionsFileController', ['except' => ['show']]);
    route::get('WR_print',['as' => 'WRITING_SERVICES.print','uses' => 'OtWritingCorectionsFileController@print']);
    route::get('WR_Pdf',['as' => 'WRITING_SERVICES.pdf','uses' => 'OtWritingCorectionsFileController@pdf']);
    route::get('WR_Email',['as' => 'WRITING_SERVICES.email','uses' => 'OtWritingCorectionsFileController@email']);
    Route::get('WRITING_SERVICE',['as' => 'WRITING_SERVICES.index_c','uses' => 'OtWritingCorectionsFileController@index_c']);
    Route::get('WRITING_VIEW',['as' => 'WRITING_SERVICES.index_wv','uses' => 'OtWritingCorectionsFileController@index_wv']);
    Route::get('downloads/{P1}', ['as' => 'WRITING_SERVICES.download_file', 'uses' => 'OtWritingCorectionsFileController@download_file']);
    Route::get('download/{P1}', ['as' => 'WRITING_SERVICES.download_files', 'uses' => 'OtWritingCorectionsFileController@download_files']);
    Route::get('comment/{P1}', ['as' => 'WRITING_SERVICES.comment', 'uses' => 'OtWritingCorectionsFileController@comment']);
    Route::get('Resaults/{P1}', ['as' => 'WRITING_SERVICES.Resaults', 'uses' => 'OtWritingCorectionsFileController@Resaults']);
   //--------
    Route::resource('SPEAKING_SERVICES', 'OtSpeakingCorrection', ['except' => ['show']]);
    Route::get('SPEAKING_VIEW',['as' => 'SPEAKING_SERVICES.index_sv','uses' => 'OtSpeakingCorrection@index_sv']);


    //CHART
    Route::resource('CHARTS', 'UserChartController');
    Route::get('WCS_show/{P1}/{P2}/{P3}', ['as' => 'CHART_VIEW.WCS_show', 'uses' => 'UserChartController@WCS_show']);
    Route::get('WCSP_show/{P1}/{P2}/{P3}', ['as' => 'CHART_VIEW.WCSP_show', 'uses' => 'UserChartController@WCSP_show']);
    Route::get('Test_show/{P2}/{P3}', ['as' => 'CHART_VIEW.Test_show', 'uses' => 'UserChartController@Test_show']);
    Route::get('Test_show_l/{P2}/{P3}', ['as' => 'CHART_VIEW.Test_show_l', 'uses' => 'UserChartController@Test_show_l']);
    route::get('Index_P',['as' => 'CHARTS.Index_P','uses' => 'UserChartController@index_p']);
    route::get('Index_T',['as' => 'CHARTS.Index_T','uses' => 'UserChartController@index_t']);
    route::get('Index_TL',['as' => 'CHARTS.Index_TL','uses' => 'UserChartController@index_tl']);

    //--------Instructors
    Route::get('Referrals',['as' => 'Referrals.index','uses' => 'OtUuerIntroducesCodeController@index']);
    Route::get('applicant_Result',['as' => 'applicant_Result.index_r','uses' => 'OtUuerIntroducesCodeController@index_r']);
    Route::get('applicant_Result/{p1}/{P2}/{P3}',['as' => 'applicant_Result.show','uses' => 'OtUuerIntroducesCodeController@show']);


    /*Route::get('/getaudio/{fileName}', [
        'as' => 'audio',
        'uses' => 'OtTestUserStartController@listenAudio'
    ]);*/

});


