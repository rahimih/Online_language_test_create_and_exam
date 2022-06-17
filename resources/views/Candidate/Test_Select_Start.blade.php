@extends('layouts.C_app', ['activePage' => 'Start Test', 'titlePage' => __('شروع آزمون')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                       <div class="row">
                        @foreach($ot_test_registers as $test_registers)
                        <div class="col-md-5 ml-auto mr-auto">
                            <div class="card card-chart text-left">
                                <div class="card-header card-header-info text-center" data-header-animation="true">
                                    <h4 class="card-title">{{$test_registers->INSTITUTE_NAME}}</h4>
                                    <p class="category">{{$test_registers->TYPE}} /  {{$test_registers->SUBGROUP_TEST_NAME}}</p>
                                    <p class="category">{{$test_registers->TESTS_NAME}}</p>

                                    <input name="test_r_id" id="input-test_id" value="{{$test_registers->TEST_REGISTER_ID}}"  type="text" hidden="true" readonly="true" />
                                    <input name="test_id" id="input-test_id" value="{{$test_registers->TESTS_ID}}"  type="text" hidden="true" readonly="true" />
                                    <input name="tn" id="input-tn" value="{{$test_registers->TESTS_NAME}}"  type="text" hidden="true" readonly="true" />
                                    <input name="mt" id="input-mt" value="{{$test_registers->MAINTEST_ID}}"  type="text" hidden="true" readonly="true" />
                                    <input name="st" id="input-st" value="{{$test_registers->SUBGROUP_TEST_ID}}"  type="text" hidden="true" readonly="true" />

                                </div>
                                <div class="card-body text-center">

                                        <div class="card-actions">
                                            <a  rel="tooltip"  class="btn btn-success btn-link" href="{{action('OtTestUserStartController@Confirm',[$test_registers['TEST_REGISTER_ID'],$test_registers['TESTS_ID']])}}" title="شروع آزمون">
                                         <i class="material-icons">edit</i>
                                            </a>
                                        </div>

                                    <a href="{{action('OtTestUserStartController@Confirm',[$test_registers['TEST_REGISTER_ID'],$test_registers['TESTS_ID']])}}" class="btn btn-round btn-info">START</a>

                                    <h4 class="card-title blockquote text-left">Skills</h4>
                                    <div class="row">
                                      <div class="col">
                                        <div class="text-info text-left">
                                    {!!$test_registers->SKILLS!!}
                                    </div>
                                   </div>
                                    </div>
                                 </div>
                                    <div class="card-footer text-left ">
                                    <div class="stats">
                                        <i class="material-icons">access_time</i> Registeration Date {{$test_registers->REGISTER_DATE}}
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
                                            <h5t> آزمونی جهت شروع موجود نمی باشد.لطفا جهت ثبت نام آزمون به بخش ثبت نام در آزمون مراجعه نمایید.  </h5t>
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



