@extends('layouts.C_app', ['activePage' => 'Dashboard', 'titlePage' => __('داشبورد')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">leaderboard</i>
                            </div>
                            <p class="card-category"></p>
                            <h3 class="card-title-f">آزمون تعیین سطح</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">leaderboard</i>
                                <a href="Test_Level">شروع آزمون</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">wysiwyg</i>
                            </div>
                            <p class="card-category"></p>
                            <h3 class="card-title-f">ثبت نام در آزمون </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">wysiwyg</i>
                                <a href="Test_Registers"> ثبت نام</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">record_voice_over</i>
                            </div>
                            <p class="card-category"></p>
                            <h3 class="card-title-f">آزمون Speaking</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">record_voice_over</i>
                                <a href="Speaking_Test">شروع آزمون</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">article</i>
                            </div>
                            <p class="card-category"></p>
                            <h3 class="card-title-f">تصحیح Writing</h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-danger">article</i>
                                <a href="Writing_Registers">ارسال فایل</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
