@extends('layouts.C_app', ['activePage' => 'Register Test', 'titlePage' => __('پرداخت')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <form method="post" action="{{route('Test_Register.store') }}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('POST')
                        <div class="card ">
                            <div class="card-header card-header-info">
                                <h4 class="card-title">{{ __('پرداخت اینترنتی ') }}</h4>
                                <p class="card-category">{{ __('اطلاعات فاکتور') }}</p>
                            </div>
                            <div class="card-body ">
                                @if (session('status'))
                                <div class="row">
                                        <div class="col-sm-12">
                                            <div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <span>{{ session('status') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                               <hr style="width:100%;text-align:left;margin-left:0">
                                    <div class="row">
                                        <label class="col-sm-12 col-form-label-f text-dark"> {{__('باتوجه به عدم امکان عودت مبلغ سرویس پس از خرید، لطفا پیش از پرداخت، در انتخاب آزمون مورد نظر دقت کافی داشته باشید')}} </label>
                                    </div>
                                    <hr style="width:100%;text-align:left;margin-left:0">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('نام') }}</label>
                                        <div class="col-sm-8">
                                            <label class="col-sm-12 col-form-label-f text-info">  {{ Auth::user()->fname }}  {{ Auth::user()->lname }} </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('شناسه اشتراک') }}</label>
                                        <div class="col-sm-8">
                                            <label class="col-sm-12 col-form-label-f text-info">  000{{ Auth::user()->id }}  </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('تاریخ ثبت نام') }}</label>
                                        <div class="col-sm-8">
                                            @php
                                                $mydate= getdate();
                                            @endphp
                                            <label class="col-sm-12 col-form-label-f text-info"> {{$mydate['weekday']}},{{$mydate['mday']}} {{$mydate['month']}} {{$mydate['year']}} - {{$mydate['hours']}} : {{$mydate['minutes']}} </label>
                                        </div>
                                    </div>
                                    <hr style="width:100%;text-align:left;margin-left:0">
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('جزییات فاکتور') }}</label>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('نوع آزمون') }}</label>
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('نام آزمون') }}</label>
                                        <label class="col-sm-4 col-form-label-f text-dark">{{ __('هزینه آزمون (ریال)') }}</label>
                                    </div>
                            @foreach($ot_test_defines as $test_defines)
                                <div class="row">
                                        <div class="col-sm-4">
                                            <label class="col-sm-12 col-form-label-f text-info">  {{$test_defines->TYPE}} /  {{$test_defines->SUBGROUP_TEST_NAME}} </label>
                                        </div>
                                        <div class="col-sm-4">
                                        <label class="col-sm-12 col-form-label-f text-info"> {{$test_defines->TESTS_NAME}} </label>
                                    </div>
                                        <div class="col-sm-4">
                                        @php
                                            $res=$test_defines->test_cost_R;
                                            $res2= number_format($res);
                                        @endphp
                                        <label class="col-sm-12 col-form-label-f text-info"> {{$res2}} ریال </label>
                                    </div>
                                    </div>

                                <input name="test_id" id="input-test_id" value="{{$test_defines->TESTS_ID}}"    type="text" hidden="true" readonly="true" />
                                <input name="COST_R"  id="input-COST_R"  value="{{$test_defines->test_cost_R}}" type="text" hidden="true" readonly="true" />
                                <input name="COST_U"  id="input-COST_U"  value="{{$test_defines->test_cost_U}}" type="text" hidden="true" readonly="true" />
                                <input name="kinds"  id="input-kinds"  value="{{$test_defines->status}}" type="text" hidden="true" readonly="true" />

                              @endforeach

                                    <hr style="width:100%;text-align:left;margin-left:0">

                                  <div class="row">
                                      <div class="col-6">
                                          <div style="width:300px;height:175px;padding:8px;border:3px solid lightblue;">
                                          <div class="row">
                                              <label class="col-sm-4 col-form-label-f text-dark">{{ __('پیش فاکتور') }}</label>
                                          </div>
                                          <div class="row">
                                              <label class="col-sm-4 col-form-label-f text-dark">{{ __('قیمت') }}</label>
                                              <label class="col-sm-5 col-form-label-f text-info">  {{$res2}} ریال </label>
                                          </div>
                                          <div class="row">
                                              <label class="col-sm-4 col-form-label-f text-dark">{{ __('تخفیف') }}</label>
                                              <label class="col-sm-5 col-form-label-f text-info"> {{__('0')}} ریال </label>
                                          </div>
                                          <div class="row">
                                              <label class="col-sm-4 col-form-label-f text-dark">{{ __('قابل پرداخت') }}</label>
                                              <label class="col-sm-5 col-form-label-f text-info">  {{$res2}} ریال </label>
                                          </div>
                                          </div>
                                      </div>
                                      <div style="width:320px;height:175px;padding:8px;border:3px solid lightblue;">
                                    <div class="col">
                                    <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label text-dark">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Mellat" checked > &nbsp;&nbsp;&nbsp; بانک ملت
                                            <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                        </label>
                                        <img style="width:70px" src="{{ asset('material') }}/img/mellat.png">
                                    </div>
                                    </div>
                                    <div class="col">
                                      <div class="form-check form-check-radio form-check-inline">
                                        <label class="form-check-label">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="Master" disabled>  &nbsp;&nbsp;&nbsp;  Master Card
                                            <span class="circle">
                                            <span class="check"></span>
                                            </span>
                                        </label>
                                          <img style="width:80px" src="{{ asset('material') }}/img/mastercard-m.png">
                                    </div>
                                     </div>
                                      </div>
                                  </div>
                                    <div class="row">
                                        <label class="col-sm-12 col-form-label-f text-dark">{{ __('می‌­توانید با در اختیار داشتن هر یک از کارت‌­های عضو شبکه شتاب و از طریق درگاه­‌ پرداخت نسبت به واریز وجه پیش فاکتور اقدام نمایید.') }}</label>
                                    </div>

                        </div>
                            <div class="card-footer ml-auto mr-auto left ">
                                <button type="submit" class="btn btn-round-f btn-info"> <strong> {{ __('پرداخت / ثبت نام') }} </strong> </button>
                            </div>


        </div>
      </div>
    </div>
  </div>
@endsection
