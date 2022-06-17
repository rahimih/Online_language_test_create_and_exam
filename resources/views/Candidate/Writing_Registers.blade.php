@extends('layouts.C_app', ['activePage' => 'Register Test', 'titlePage' => __('تصحیح Writing / انتخاب نوع آزمون ')])
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
                                            <h4 class="card-title">{{$test_defines->LANGUAGE_NAME}}</h4>
                                            <h4 class="category">{{$test_defines->TYPE}}</h4>
                                            <h4 class="category">{{$test_defines->SUBGROUP_TEST_NAME}}</h4>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="card-actions">
                                                    <a  rel="tooltip"  class="btn btn-success btn-link" href="{{action('OtTestRegisterController@index_w',[$test_defines['MAIN_TEST_ID'],$test_defines['SUBGROUP_TEST_ID']])}}" title="انتخاب">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                            </div>

                                            <a href="{{action('OtTestRegisterController@index_w',[$test_defines['MAIN_TEST_ID'],$test_defines['SUBGROUP_TEST_ID']])}}" class="btn btn-round btn-danger">SELECT</a>
                                            <h4 class="card-title blockquote text-center">انتخاب نوع آزمون</h4>

                                        </div>
                                        <div class="card-footer text-left">
                                            <div class="stats">
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


