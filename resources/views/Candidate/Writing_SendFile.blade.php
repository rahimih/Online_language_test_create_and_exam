@extends('layouts.C_app', ['activePage' => 'Register Test', 'titlePage' => __('ثبت نام تصحیح Writing ')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($ot_writing_c_f_W as $writing_c_f_W)
                                <div class="col-md-5 ml-auto mr-auto">
                                    <div class="card card-chart text-left">
                                        <div class="card-header card-header-danger text-center" data-header-animation="true">
                                            <h4 class="card-title">{{$writing_c_f_W->INSTITUTE_NAME}}</h4>
                                            <h4 class="category">{{$writing_c_f_W->TYPE}} /  {{$writing_c_f_W->SUBGROUP_TEST_NAME}}</h4>
                                            <h4 class="category">{{$writing_c_f_W->TESTS_NAME}}</h4>
                                        </div>
                                        <div class="card-body text-center">
                                            <div class="card-actions">
                                                    <a  rel="tooltip"  class="btn btn-success btn-link" href="{{action('OtTestRegisterController@Register',$test_defines['TESTS_ID'])}}" title="ثبت نام">
                                                        <i class="material-icons">edit</i>
                                                    </a>
                                            </div>

                                            <a href="{{action('OtTestRegisterController@Register',$test_defines['TESTS_ID'])}}" class="btn btn-round btn-danger">REGISTER</a>

                                            <h4 class="card-title blockquote text-left">----------------------------------</h4>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="text-info text-left">
                                                        @if(($writing_c_f_W->WC1)>0)
                                                           Task 1 : {!!$writing_c_f_W->WC1!!}  /
                                                        @endif
                                                        @if(($writing_c_f_W->WC2)>0)
                                                           Task 2 : {!!$writing_c_f_W->WC2!!}
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="card-footer text-left">
                                            <div class="stats">
                                              ----------------
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @php
                                $i=$i+1
                            @endphp
                            @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>

@endsection


