@extends('layouts.C_app', ['activePage' => 'Level Test', 'titlePage' => __('تعیین سطح')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($ot_test_defines as $test_defines)
                                <div class="col-md-5 ml-auto mr-auto">
                                    <div class="card card-chart text-left">
                                        <div class="card-header card-header-info text-center" data-header-animation="true">
                                            <h4 class="card-title">{{$test_defines->INSTITUTE_NAME}}</h4>
                                            <p class="category">{{$test_defines->TYPE}} /  {{$test_defines->SUBGROUP_TEST_NAME}}</p>
                                            <p class="category">{{$test_defines->TESTS_NAME}}</p>

                                        </div>
                                        <div class="card-body text-center">
                                            <div class="card-actions">
                                                    <a  rel="tooltip"  class="btn btn-success btn-link" href="{{action('OtTestRegisterController@LevelTest',$test_defines['TESTS_ID'])}}" title="شروع آزمون">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                            </div>

{{--                                            <a href="{{action('OtTestRegisterController@LevelTest',$test_defines['TESTS_ID'])}}" class="card-link"> <h6>     --------------------     Start      -------------------  </h6> </a>--}}
                                            <a href="{{action('OtTestRegisterController@LevelTest',$test_defines['TESTS_ID'])}}" class="btn btn-round btn-info">Start</a>

                                            <h4 class="card-title blockquote text-center">آزمون تعیین سطح </h4>


                                        </div>
                                        <div class="card-footer text-right">
                                            <h6> مدت زمان پاسخگویی </h6>
                                            <div class="stats">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection


