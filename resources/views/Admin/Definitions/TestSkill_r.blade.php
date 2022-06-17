@extends('layouts.A_app', ['activePage' => 'TestSkill', 'titlePage' => __('Test skills')])
@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('Test_skill.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Register Test skills ') }}</h4>
                <p class="card-category">{{ __('Test skills information') }}</p>
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
                    <div class="row">
                        <div class="col-12 text-right">
                            <a href="{{ route('Test_skill.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('MAINTEST_ID ') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('MAINTEST_ID ') ? ' is-invalid' : '' }}" name="MAINTEST_ID" id="input-MAINTEST_ID" type="dropdown" placeholder="{{ __('MAIN TEST NAME') }}"  required >
                                    @foreach($ot_main_tests as $ot_maintests)
                                        <option value="{{$ot_maintests->MAINTEST_ID}}">{{$ot_maintests->TYPE}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('MAINTEST_ID'))
                                <span id="MAINTEST_ID-error" class="error text-danger" for="input-MAINTEST_ID">{{ $errors->first('MAINTEST_ID') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('SKILL NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('SKILL_ID ') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('SKILL_ID ') ? ' is-invalid' : '' }}" name="SKILL_ID" id="input-SKILL_ID" type="dropdown" placeholder="{{ __('SKILL NAME') }}"  required >
                                    @foreach($ot_skill_types as $skill_types)
                                        <option value="{{$skill_types->SKILL_ID}}">{{$skill_types->SKILL_TYPE}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('SKILL_ID'))
                                <span id="SKILL_ID-error" class="error text-danger" for="input-SKILL_ID">{{ $errors->first('SKILL_ID') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('ORDERS') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('ORDERS') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('ORDERS') ? ' is-invalid' : '' }}" name="ORDERS" id="input-ORDERS" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('ORDERS'))
                                    <span id="ORDERS-error" class="error text-danger" for="input-ORDERS">{{ $errors->first('ORDERS') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('SECTION NUMBERS') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('Section_Numbers') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('Section_Numbers') ? ' is-invalid' : '' }}" name="Section_Numbers" id="input-Section_Numbers" type="text" required="true" aria-required="true"/>
                      @if ($errors->has('Section_Numbers'))
                        <span id="Section_Numbers-error" class="error text-danger" for="input-Section_Numbers">{{ $errors->first('Section_Numbers') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('QUESTION NUMBERS') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('Question_Numbers') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('Question_Numbers') ? ' is-invalid' : '' }}" name="Question_Numbers" id="input-Question_Numbers" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('Question_Numbers'))
                                    <span id="Question_Numbers-error" class="error text-danger" for="input-Question_Numbers">{{ $errors->first('Question_Numbers') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('TIME PERIOD (minutes)') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('Time_Period') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('Time_Period') ? ' is-invalid' : '' }}" name="Time_Period" id="input-Time_Period" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('Time_Period'))
                                    <span id="Time_Period-error" class="error text-danger" for="input-Time_Period">{{ $errors->first('Time_Period') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info">{{ __('Register') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@break
@case(2)
{{--edit    --}}
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <form method="post" action="{{action('OtTestSkillController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update Test Skills ') }}</h4>
                            <p class="card-category">{{ __('Test Skills information') }}</p>
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
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Test_skill.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>

                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('MAINTEST_ID') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('MAINTEST_ID') ? ' is-invalid' : '' }}" name="MAINTEST_ID" id="input-MAINTEST_ID" type="dropdown" placeholder="{{ __('MAIN TEST NAME') }}"  value="{{ old('MAINTEST_ID', $ot_test_skills->MAINTEST_ID) }}" required >
                                                @foreach($ot_main_tests as $ot_maintests)
                                                    <option value="{{$ot_maintests->MAINTEST_ID}}" @if($ot_maintests->MAINTEST_ID==$ot_test_skills->MAINTEST_ID ) selected @endif>{{$ot_maintests->TYPE}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('MAINTEST_ID'))
                                                <span id="MAINTEST_ID-error" class="error text-danger" for="input-MAINTEST_ID">{{ $errors->first('MAINTEST_ID') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('SKILL NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('SKILL_ID') ? ' has-danger' : '' }}">
                                        <select class="form-control{{ $errors->has('SKILL_ID') ? ' is-invalid' : '' }}" name="SKILL_ID" id="input-SKILL_ID" type="dropdown" placeholder="{{ __('SKILL NAME') }}"  value="{{ old('SKILL_ID', $ot_test_skills->SKILL_ID) }}" required >
                                            @foreach($ot_skill_types as $skill_types)
                                              <option value="{{$skill_types->SKILL_ID}}" @if($skill_types->SKILL_ID==$ot_test_skills->SKILL_ID ) selected @endif>{{$skill_types->SKILL_TYPE}}</option>
                                            @endforeach
                                        </select>
                                    @if ($errors->has('SKILL_ID'))
                                            <span id="SKILL_ID-error" class="error text-danger" for="input-SKILL_ID">{{ $errors->first('SKILL_ID') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('ORDERS') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('ORDERS') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('ORDERS') ? ' is-invalid' : '' }}" name="ORDERS" id="input-ORDERS" type="text" placeholder="{{ __('ORDERS') }}" value="{{$ot_test_skills->ORDERS}}" required="true" aria-required="true"/>
                                            @if ($errors->has('ORDERS'))
                                                <span id="ORDERS-error" class="error text-danger" for="input-ORDERS">{{ $errors->first('ORDERS') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('SECTION NUMBERS') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Section_Numbers') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Section_Numbers') ? ' is-invalid' : '' }}" name="Section_Numbers" id="input-Section_Numbers" type="text" placeholder="{{ __('SECTION NUMBERS') }}" value="{{$ot_test_skills->Section_Numbers}}" required="true" aria-required="true"/>
                                            @if ($errors->has('Section_Numbers'))
                                                <span id="Section_Numbers-error" class="error text-danger" for="input-Section_Numbers">{{ $errors->first('Section_Numbers') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('QUESTION NUMBERS') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Question_Numbers') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Question_Numbers') ? ' is-invalid' : '' }}" name="Question_Numbers" id="input-Question_Numbers" type="text" placeholder="{{ __('QUESTION NUMBERS') }}" value="{{$ot_test_skills->Question_Numbers}}" required="true" aria-required="true"/>
                                            @if ($errors->has('Question_Numbers'))
                                                <span id="Question_Numbers-error" class="error text-danger" for="input-Question_Numbers">{{ $errors->first('Question_Numbers') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('TIME PERIOD (minutes)') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('Time_Period') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('Time_Period') ? ' is-invalid' : '' }}" name="Time_Period" id="input-Question_Numbers" type="text" placeholder="{{ __('TIME PERIOD') }}" value="{{$ot_test_skills->Time_Period}}" required="true" aria-required="true"/>
                                            @if ($errors->has('Time_Period'))
                                                <span id="Time_Period-error" class="error text-danger" for="input-Time_Period">{{ $errors->first('Time_Period') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-info">{{ __('Update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@break
@endswitch
@endsection
