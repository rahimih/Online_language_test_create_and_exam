<!DOCTYPE html>
<html lang="en">
<head>
    <title>Speaking Test Appointment</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />


</head>

<body style="background-color:white;">
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">

                    <form method="post"  id="regForm" action="{{route('Speaking.StartAppointment') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('POST')

                        <div class="row">
                                <div class="card ">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Speaking Test Appointment ') }}</h4>
                                        <p class="card-category">{{ __('Information') }}</p>
                                    </div>
                                    <div class="card-body ">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-danger col-3">Information</button>
                                                <button type="button" id="button2" class="btn btn-link col-2 disabled" aria-disabled="true">Select Date</button>
                                                <button type="button" id="button3" class="btn btn-link col-2 disabled" aria-disabled="true">Select Time</button>
                                            </ol>
                                        </nav>
                                        <hr>

                                        @foreach($ot_test_registers as $test_registers)

                                            <div class="row">
                                                <div class="col">
                                                    <label class="col-sm-12 col-form-label text-info" >{{ __('TEST NAME:') }} {{$test_registers->TESTS_NAME}} </label>
                                                </div>
                                                <div class="col">
                                                    <label class="col-sm-12 col-form-label text-info" >{{ __('TEST KIND:') }} {{$test_registers->TYPE}} /  {{$test_registers->SUBGROUP_TEST_NAME}} </label>
                                                </div>
                                            </div>
                                            <hr>

                                            @foreach($ot_test_qpackages as $test_qpackages)
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="col-sm-8">
                                                            <label class="col-sm-12 col-form-label text-info"> {{$test_qpackages->SKILL_TYPE}}  </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="col-sm-10">
                                                            <label class="col-sm-12 col-form-label text-info"> {{$test_qpackages->Question_Numbers}} Questions </label>
                                                        </div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="col-sm-8">
                                                            <label class="col-sm-12 col-form-label text-info"> {{$test_qpackages->Time_Period}} Minutes  </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @endforeach
                                        <hr>

                                        <input name="test_r_id" id="input-test_id" value="{{$test_registers->TEST_REGISTER_ID}}"  type="text" hidden="true" readonly="true"/>
                                        <input name="test_id" id="input-test_id" value="{{$test_registers->TESTS_ID}}" type="text" hidden="true" readonly="true"/>

                                    </div>
                                </div>
                            </div>

                        <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                                <button type="submit" class="btn btn-info btn-round" id="nxtBtn" >{{ __('Next') }}</button>
                            </div>
                  </form>

                  </div>
                </div>
            </div>
        </div>
<!--=================================-->
</body>
</html>

