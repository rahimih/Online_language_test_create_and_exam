@extends('layouts.C_app', ['activePage' => 'Registered Test', 'titlePage' => __('آزمون های ثبت نام شده')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($ot_test_defines as $test_defines)
                                <div class="col-md-5 ml-auto mr-auto">
                                    <div class="card card-chart text-left">
                                        <div class="card-header card-header-danger text-center" data-header-animation="false">
                                            <h4 class="card-title">{{$test_defines->INSTITUTE_NAME}}</h4>
                                            <p class="category">{{$test_defines->TYPE}} /  {{$test_defines->SUBGROUP_TEST_NAME}}</p>
                                            <p class="category">{{$test_defines->TESTS_NAME}}</p>
                                        </div>
                                        <div class="card-body text-left">
                                            <h4 class="card-title blockquote text-left">Skills</h4>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="text-info">
                                                        {!!$test_defines->SKILLS!!}
                                                    </div>
                                                </div>
{{--
                                                <div class="col">
                                                        <i><img style="width:100px" src="{{ asset('material') }}/img/registered12.jpg"></i>
                                                </div>
--}}
                                            </div>

                                        </div>
                                        <div class="card-footer text-left">
                                            <div class="stats text-left">
{{--                                                <i class="material-icons">access_time</i> {{$test_defines->test_cost_R}} IRR  /  {{$test_defines->test_cost_U}} €--}}
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
                                        <h5t> شما تاکنون در هیچ آزمونی ثبت نام نکرده اید </h5t>
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


