@extends('layouts.C_app', ['activePage' => 'Register Test', 'titlePage' => __('ثبت نام آزمون ')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($ot_test_defines as $test_defines)
                                <div class="col-md-5 ml-auto mr-auto">
                                    <div class="card card-chart text-left">
                                        <div class="card-header card-header-danger text-center" data-header-animation="true">
                                            <h4 class="card-title">{{$test_defines->INSTITUTE_NAME}}</h4>
                                            <p class="category">{{$test_defines->TYPE}} /  {{$test_defines->SUBGROUP_TEST_NAME}}</p>
                                            <p class="category">{{$test_defines->TESTS_NAME}}</p>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="card-actions">
                                                    <a  rel="tooltip"  class="btn btn-success btn-link" href="{{action('OtTestRegisterController@Register',$test_defines['TESTS_ID'])}}" title="ثبت نام">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                            </div>

                                            <a href="{{action('OtTestRegisterController@Register',$test_defines['TESTS_ID'])}}" class="btn btn-round btn-danger">REGISTER</a>

                                            <h4 class="card-title blockquote text-left">Skills</h4>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="text-info text-left">
                                                        {!!$test_defines->SKILLS!!}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer text-left ">
                                            <div class="stats">
                                                @php
                                                $res=$test_defines->test_cost_R;
                                                $res2= number_format($res);
                                                @endphp
                                                    هزینه آزمون  {{$res2}} ریال
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @php
                                $i=$i+1
                            @endphp
                            @endforeach
                         @if ($i==0)
                                <div class="col-md-8 ml-auto mr-auto">
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title text-center">Information</h4>
                                    </div>
                                    <div class="card-body text-center">
                                         <h5t> کاربر گرامی </h5t>
                                        <h5t> آزمونی جهت ثبت نام موجود نمی باشد. </h5t>
                                    </div>
                                </div>
                                </div>

                         @endif
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection


