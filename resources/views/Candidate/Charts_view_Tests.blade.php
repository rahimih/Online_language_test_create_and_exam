@extends('layouts.C_app', ['activePage' => 'chart1', 'titlePage' => __('نمودارهای وضعیت آزمون ها')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($ot_test_user_starts as $test_user_starts)
                            <div class="col-md-5 ml-auto mr-auto">
                                    <div class="card card-chart text-left">
                                        <div class="card-header card-header-info text-center" data-header-animation="false">
                                            <h4 class="card-title">{{$test_user_starts->TYPE}}</h4>
                                            <hr>
                                            <h4 class="category">{{$test_user_starts->SUBGROUP_TEST_NAME}}</h4>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="card-actions">
                                                @if ($OpenForm==1)
                                                 <a  rel="tooltip"  class="btn btn-info btn-link" href="{{action('UserChartController@Test_show',[$test_user_starts['MAIN_TEST_ID'],$test_user_starts['SUBGROUP_TEST_ID']])}}" title="انتخاب">
                                                 @endif
                                                @if ($OpenForm==2)
                                                  <a  rel="tooltip"  class="btn btn-info btn-link" href="{{action('UserChartController@Test_show_l',[$test_user_starts['MAIN_TEST_ID'],$test_user_starts['SUBGROUP_TEST_ID']])}}" title="انتخاب">
                                                 @endif
                                                        <i class="material-icons">verified_user</i>
                                                    </a>
                                            </div>
                                            @if ($OpenForm==1)
                                             <a href="{{action('UserChartController@Test_show',[$test_user_starts['MAIN_TEST_ID'],$test_user_starts['SUBGROUP_TEST_ID']])}}" class="btn btn-round btn-info">SELECT</a>
                                            @endif
                                            @if ($OpenForm==2)
                                             <a href="{{action('UserChartController@Test_show_l',[$test_user_starts['MAIN_TEST_ID'],$test_user_starts['SUBGROUP_TEST_ID']])}}" class="btn btn-round btn-info">SELECT</a>
                                            @endif

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
                                        <h5t> شما تاکنون در آزمونی ثبت نام نکرده اید. </h5t>
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


