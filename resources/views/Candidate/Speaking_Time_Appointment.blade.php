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

                    <form method="post"  id="regForm" action="{{route('Speaking.Appointment') }}" autocomplete="off" class="form-horizontal">
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
                                                <button type="button" id="button1" class="btn btn-link col-2 disabled" aria-disabled="true">Information</button>
                                                <button type="button" id="button2" class="btn btn-link col-3 disabled" aria-disabled="true">Select Date</button>
                                                <button type="button" id="button3" class="btn btn-danger col-3">Select Time</button>
                                            </ol>
                                        </nav>
                                        <hr>

                                        <div class="row">
                                            <div class="col-2">
                                            </div>
                                            <div class="col-2">
                                            </div>
                                            <div class="col">
                                                <label class="col-sm-12 col-form-label-f text-info" >{{ __('تاریخ انتخابی:') }} {{$days}} - {{$current_jdate}} ********  ({{$dayofweeks}} - {{$C_DATE}})   </label>
                                            </div>
                                        </div>
                                        <hr>
                                        @foreach($ot_speaking_schedules as $speaking_schedules)
                                            @php
                                            $ftime = ($speaking_schedules->FROM_TIME);
                                            $ttime = ($speaking_schedules->TO_TIME);
                                            $duration = ($speaking_schedules->DURATION_TIME);
                                            $x=$ftime;
                                            $x = strtotime($x);
                                            $x = date("H:i", strtotime(  ' 0 minutes', $x));
                                            @endphp

                                            @if ($KIND==1)
                                            @while ($x<=$ttime)
                                                    <div class="row">
                                                        <div class="col">
                                                                <img style="width:25px" src="{{ asset('material') }}/img/tik.jpg">
                                                                <div class="form-check form-check-radio form-check-inline">
                                                                    <label class="form-check-label">
                                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value={{$x}} > {{$x}}
                                                                        <span class="circle">
                                                                        <span class="check"></span>
                                                                        </span>
                                                                    </label>
                                                                </div>
                                                        </div>
                                                        @php
                                                            $x = strtotime($x);
                                                            $x = date("H:i", strtotime($duration . ' minutes', $x));
                                                        @endphp
                                                        @if($x<=$ttime)
                                                            <div class="col">
                                                                    <img style="width:25px" src="{{ asset('material') }}/img/tik.jpg">
                                                                    <div class="form-check form-check-radio form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value={{$x}} > {{$x}}
                                                                            <span class="circle">
                                                                            <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                            </div>
                                                            @php
                                                                $x = strtotime($x);
                                                                $x = date("H:i", strtotime($duration . ' minutes', $x));
                                                            @endphp
                                                        @endif

                                                        @if($x<=$ttime)
                                                            <div class="col">
                                                                    <img style="width:25px" src="{{ asset('material') }}/img/tik.jpg">
                                                                    <div class="form-check form-check-radio form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value={{$x}} > {{$x}}
                                                                            <span class="circle">
                                                                            <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                            </div>
                                                            @php
                                                                $x = strtotime($x);
                                                                $x = date("H:i", strtotime($duration . ' minutes', $x));
                                                            @endphp
                                                        @endif

                                                        @if($x<=$ttime)
                                                            <div class="col">
                                                                    <img style="width:25px" src="{{ asset('material') }}/img/tik.jpg">
                                                                    <div class="form-check form-check-radio form-check-inline">
                                                                        <label class="form-check-label">
                                                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value={{$x}} > {{$x}}
                                                                            <span class="circle">
                                                                            <span class="check"></span>
                                                                            </span>
                                                                        </label>
                                                                    </div>
                                                            </div>
                                                            @php
                                                                $x = strtotime($x);
                                                                $x = date("H:i", strtotime($duration . ' minutes', $x));
                                                            @endphp
                                                        @endif

                                                    </div>
                                            @endwhile
                                            @endif

                                            @if ($KIND==2)
                                            @while ($x<=$ttime)
                                                @foreach($ot_speaking_appointments as $speaking_appointments)
                                                    @php
                                                    $y = strtotime($speaking_appointments->TAKEN_TIME);
                                                    $y = date("H:i", strtotime(  ' 0 minutes', $y));
                                                    @endphp
                                              <div class="row">
                                                <div class="col">
                                                 @if ($x==$y)
                                                        <img style="width:25px" src="{{ asset('material') }}/img/denied.png">
                                                        <div class="form-check form-check-radio form-check-inline">
                                                            <label class="form-check-label">
                                                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" disabled value={{$x}} > {{$x}}
                                                                <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                                            </label>
                                                        </div>
                                                  @else
                                                    <img style="width:25px" src="{{ asset('material') }}/img/tik.jpg">
                                                <div class="form-check form-check-radio form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value={{$x}} > {{$x}}
                                                        <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                                    </label>
                                                </div>
                                               @endif
                                            </div>
                                                @php
                                                    $x = strtotime($x);
                                                    $x = date("H:i", strtotime($duration . ' minutes', $x));
                                                @endphp
                                                @if($x<=$ttime)
                                                      <div class="col">
                                                          @if ($x==$y)
                                                              <img style="width:25px" src="{{ asset('material') }}/img/denied.png">
                                                              <div class="form-check form-check-radio form-check-inline">
                                                                  <label class="form-check-label">
                                                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" disabled value={{$x}} > {{$x}}
                                                                      <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                                                  </label>
                                                              </div>
                                                          @else
                                                              <img style="width:25px" src="{{ asset('material') }}/img/tik.jpg">
                                                              <div class="form-check form-check-radio form-check-inline">
                                                                  <label class="form-check-label">
                                                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value={{$x}} > {{$x}}
                                                                      <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                                                  </label>
                                                              </div>
                                                          @endif
                                                      </div>
                                                @php
                                                    $x = strtotime($x);
                                                    $x = date("H:i", strtotime($duration . ' minutes', $x));
                                                @endphp
                                                 @endif

                                                @if($x<=$ttime)
                                                      <div class="col">
                                                          @if ($x==$y)
                                                              <img style="width:25px" src="{{ asset('material') }}/img/denied.png">
                                                              <div class="form-check form-check-radio form-check-inline">
                                                                  <label class="form-check-label">
                                                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" disabled value={{$x}} > {{$x}}
                                                                      <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                                                  </label>
                                                              </div>
                                                          @else
                                                              <img style="width:25px" src="{{ asset('material') }}/img/tik.jpg">
                                                              <div class="form-check form-check-radio form-check-inline">
                                                                  <label class="form-check-label">
                                                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value={{$x}} > {{$x}}
                                                                      <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                                                  </label>
                                                              </div>
                                                          @endif
                                                      </div>
                                                @php
                                                    $x = strtotime($x);
                                                    $x = date("H:i", strtotime($duration . ' minutes', $x));
                                                @endphp
                                                @endif

                                                @if($x<=$ttime)
                                                      <div class="col">
                                                          @if ($x==$y)
                                                              <img style="width:25px" src="{{ asset('material') }}/img/denied.png">
                                                              <div class="form-check form-check-radio form-check-inline">
                                                                  <label class="form-check-label">
                                                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" disabled value={{$x}} > {{$x}}
                                                                      <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                                                  </label>
                                                              </div>
                                                          @else
                                                              <img style="width:25px" src="{{ asset('material') }}/img/tik.jpg">
                                                              <div class="form-check form-check-radio form-check-inline">
                                                                  <label class="form-check-label">
                                                                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value={{$x}} > {{$x}}
                                                                      <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                                                  </label>
                                                              </div>
                                                          @endif
                                                      </div>
                                                @php
                                                    $x = strtotime($x);
                                                    $x = date("H:i", strtotime($duration . ' minutes', $x));
                                                @endphp
                                                @endif

                                            </div>
                                             @endforeach
                                             @endwhile
                                            @endif

                                        <hr>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                        <input name="test_r_id" id="input-test_id" value="{{$TEST_R_ID}}" type="text" hidden="true" readonly="true"/>
                        <input name="test_id" id="input-test_id" value="{{$TEST_ID}}"  type="text" hidden="true" readonly="true"/>
                        <input name="c_date" id="c_date"  value="{{$C_DATE}}" type="text" hidden="true" readonly="true"/>
                        <input name="c_day" id="c_day"  value="{{$dayofweek}}" type="text" hidden="true" readonly="true"/>
                        <input name="w_days" id="w_days"  value="{{$days}}" type="text" hidden="true" readonly="true"/>
                        <input name="sh_date" id="sh_date"  value="{{$current_jdate}}" type="text" hidden="true" readonly="true"/>

                        <div class="card-footer ml-auto mr-auto float-right overflow-auto">
                                <button type="submit" class="btn btn-info btn-round" id="nxtBtn" >{{ __('Confirm') }}</button>
                            </div>

                    </form>

                  </div>
                </div>
            </div>
        </div>
<!--=================================-->
</body>
</html>

