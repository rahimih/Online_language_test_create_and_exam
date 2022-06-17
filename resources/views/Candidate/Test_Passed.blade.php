@extends('layouts.C_app', ['activePage' => 'Passed Test', 'titlePage' => __('آزمون های تکمیل شده')])
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
                                        <a  rel="tooltip"  class="btn btn-info btn-link" href="{{action('OtUserAnswerSkillController@Report',$test_registers['ID'])}}" title="کارنامه">
                                            <i class="material-icons">edit</i>
                                        </a>
                                    </div>

                                    <a href="{{action('OtUserAnswerSkillController@Report',$test_registers['ID'])}}" class="btn btn-round btn-info">Report</a>

                                    <h4 class="card-title blockquote text-left">Skills</h4>
                                    <div class="row">
                                      <div class="col">
                                        <div class="text-info text-left">
                                    {!!$test_registers->SKILLS!!}
                                    </div>
                                   </div>
{{--                                        <div class="col">
                                                <i><img style="width:100px" src="{{ asset('material') }}/img/passed.png"></i>
                                        </div>--}}
                                    </div>
                                 </div>
                                    <div class="card-footer">
                                    <div class="stats">
                                         Passed Date  {{$test_registers->END_DATE}}/{{$test_registers->END_TIME}}
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
                                           <h5t> شما تاکنون در هیچ آزمونی شرکت نکرده اید </h5t>
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



