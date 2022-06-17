@extends('layouts.A_app', ['activePage' => 'Tests', 'titlePage' => __('Test Defines')])
@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('Tests.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                  <h4 class="card-title">{{ __('Create Test ') }}</h4>
                  <p class="card-category">{{ __('Test information') }}</p>
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
                            <a href="{{ route('Tests.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('TESTS NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('TESTS_NAME') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('TESTS_NAME') ? ' is-invalid' : '' }}" name="TESTS_NAME" id="input-TESTS_NAME" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('TESTS_NAME'))
                                    <span id="TESTS_NAME-error" class="error text-danger" for="input-TESTS_NAME">{{ $errors->first('TESTS_NAME') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('INSTITUTE NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('INSTITUTE_ID ') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('INSTITUTE_ID ') ? ' is-invalid' : '' }}" name="INSTITUTE_ID" id="input-INSTITUTE_ID" type="dropdown" placeholder="{{ __('INSTITUTE NAME') }}"  required >
                                    @foreach($ot_institute_names as $institute_names)
                                        <option value="{{$institute_names->ID}}">{{$institute_names->INSTITUTE_NAME}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('INSTITUTE_ID'))
                                <span id="INSTITUTE_ID-error" class="error text-danger" for="input-INSTITUTE_ID">{{ $errors->first('INSTITUTE_ID') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('MAIN_TEST_ID ') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('MAIN_TEST_ID ') ? ' is-invalid' : '' }}" name="MAIN_TEST_ID" id="input-MAIN_TEST_ID" type="dropdown" placeholder="{{ __('MAIN TEST NAME') }}"  required >
                                    @foreach($ot_main_tests as $ot_maintests)
                                        <option value="{{$ot_maintests->MAINTEST_ID}}">{{$ot_maintests->TYPE}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('MAIN_TEST_ID'))
                                <span id="MAIN_TEST_ID-error" class="error text-danger" for="input-MAIN_TEST_ID">{{ $errors->first('MAIN_TEST_ID') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('SUBGROUP NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('SUBGROUP_TEST_ID ') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('SUBGROUP_TEST_ID ') ? ' is-invalid' : '' }}" name="SUBGROUP_TEST_ID" id="input-SUBGROUP_TEST_ID" type="dropdown" placeholder="{{ __('SUBGROUP TEST NAME') }}"  required >
                                    @foreach($ot_subgroup_tests as $subgroup_tests)
                                        <option value="{{$subgroup_tests->SUBGROUP_TEST_ID}}">{{$subgroup_tests->SUBGROUP_TEST_NAME}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('SUBGROUP_TEST_ID'))
                                <span id="SUBGROUP_TEST_ID-error" class="error text-danger" for="input-SUBGROUP_TEST_ID">{{ $errors->first('SUBGROUP_TEST_ID') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('START DATE') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('START_DATE_VIEW') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('START_DATE_VIEW') ? ' is-invalid' : '' }}" name="START_DATE_VIEW" id="input-START_DATE_VIEW" type="date" required="true" aria-required="true"/>
                                @if ($errors->has('START_DATE_VIEW'))
                                    <span id="START_DATE_VIEW-error" class="error text-danger" for="input-START_DATE_VIEW">{{ $errors->first('START_DATE_VIEW') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('END DATE') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('END_DATE_VIEW') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('END_DATE_VIEW') ? ' is-invalid' : '' }}" name="END_DATE_VIEW" id="input-END_DATE_VIEW" type="date" required="true" aria-required="true"/>
                                @if ($errors->has('END_DATE_VIEW'))
                                    <span id="END_DATE_VIEW-error" class="error text-danger" for="input-END_DATE_VIEW">{{ $errors->first('END_DATE_VIEW') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('START Time') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('START_TIME') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('START_TIME') ? ' is-invalid' : '' }}" name="START_TIME" id="input-START_TIME" type="time" required="true" aria-required="true"/>
                                @if ($errors->has('START_TIME'))
                                    <span id="START_TIME-error" class="error text-danger" for="input-START_TIME">{{ $errors->first('START_TIME') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('Cost IRR') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('test_cost_R') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('test_cost_R') ? ' is-invalid' : '' }}" name="test_cost_R" id="input-test_cost_R" type="number" required="true" aria-required="true"/>
                                @if ($errors->has('test_cost_R'))
                                    <span id="test_cost_R-error" class="error text-danger" for="input-test_cost_R">{{ $errors->first('test_cost_R') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('Cost €') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('test_cost_U') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('test_cost_U') ? ' is-invalid' : '' }}" name="test_cost_U" id="input-test_cost_U" type="number" required="true" aria-required="true"/>
                                @if ($errors->has('test_cost_U'))
                                    <span id="test_cost_U-error" class="error text-danger" for="input-test_cost_U">{{ $errors->first('test_cost_U') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>


              </div>
              <div class="card-footer ml-auto mr-auto left ">
                <button type="submit" class="btn btn-info">{{ __('Next') }}</button>
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
                <form method="post" action="{{action('OtTestDefineController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update Test ') }}</h4>
                            <p class="card-category">{{ __('Test information') }}</p>
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
                                    <a href="{{ route('Tests.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>


                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('TESTS NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('TESTS_NAME') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('TESTS_NAME') ? ' is-invalid' : '' }}" name="TESTS_NAME" id="input-TESTS_NAME" type="text" placeholder="{{ __('TESTS NAME') }}" value="{{$ot_test_defines->TESTS_NAME}}" required="true" aria-required="true"/>
                                        @if ($errors->has('TESTS_NAME'))
                                            <span id="TESTS_NAME-error" class="error text-danger" for="input-TESTS_NAME">{{ $errors->first('TESTS_NAME') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('INSTITUTE NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('INSTITUTE_ID ') ? ' has-danger' : '' }}">
                                        <select class="form-control{{ $errors->has('INSTITUTE_ID ') ? ' is-invalid' : '' }}" name="INSTITUTE_ID" id="input-INSTITUTE_ID" type="dropdown" placeholder="{{ __('INSTITUTE NAME') }}"  required >
                                            @foreach($ot_institute_names as $institute_names)
                                                <option value="{{$institute_names->ID}}" @if($institute_names->ID==$ot_test_defines->INSTITUTE_ID ) selected @endif>{{$institute_names->INSTITUTE_NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('INSTITUTE_ID'))
                                        <span id="INSTITUTE_ID-error" class="error text-danger" for="input-INSTITUTE_ID">{{ $errors->first('INSTITUTE_ID') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('MAIN_TEST_ID ') ? ' has-danger' : '' }}">
                                        <select class="form-control{{ $errors->has('MAIN_TEST_ID ') ? ' is-invalid' : '' }}" name="MAIN_TEST_ID" id="input-MAIN_TEST_ID" type="dropdown"  disabled="true" required >
                                            @foreach($ot_main_tests as $ot_maintests)
                                                <option value="{{$ot_maintests->MAINTEST_ID}}"@if($ot_maintests->MAINTEST_ID==$ot_test_defines->MAIN_TEST_ID ) selected @endif>{{$ot_maintests->TYPE}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('MAIN_TEST_ID'))
                                        <span id="MAIN_TEST_ID-error" class="error text-danger" for="input-MAIN_TEST_ID">{{ $errors->first('MAIN_TEST_ID') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('SUBGROUP NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('SUBGROUP_TEST_ID ') ? ' has-danger' : '' }}">
                                        <select class="form-control{{ $errors->has('SUBGROUP_TEST_ID ') ? ' is-invalid' : '' }}" name="SUBGROUP_TEST_ID" id="input-SUBGROUP_TEST_ID" type="dropdown" disabled="true" required >
                                            @foreach($ot_subgroup_tests as $subgroup_tests)
                                                <option value="{{$subgroup_tests->SUBGROUP_TEST_ID}}" @if($subgroup_tests->SUBGROUP_TEST_ID==$ot_test_defines->SUBGROUP_TEST_ID ) selected @endif>{{$subgroup_tests->SUBGROUP_TEST_NAME}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('SUBGROUP_TEST_ID'))
                                        <span id="SUBGROUP_TEST_ID-error" class="error text-danger" for="input-SUBGROUP_TEST_ID">{{ $errors->first('SUBGROUP_TEST_ID') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('START DATE') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('START_DATE_VIEW') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('START_DATE_VIEW') ? ' is-invalid' : '' }}" name="START_DATE_VIEW" id="input-START_DATE_VIEW" type="date" value="{{$ot_test_defines->START_DATE_VIEW}}" required="true" aria-required="true"/>
                                        @if ($errors->has('START_DATE_VIEW'))
                                            <span id="START_DATE_VIEW-error" class="error text-danger" for="input-START_DATE_VIEW">{{ $errors->first('START_DATE_VIEW') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('END DATE') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('END_DATE_VIEW') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('END_DATE_VIEW') ? ' is-invalid' : '' }}" name="END_DATE_VIEW" id="input-END_DATE_VIEW" type="date" value="{{$ot_test_defines->END_DATE_VIEW}}" required="true" aria-required="true"/>
                                        @if ($errors->has('END_DATE_VIEW'))
                                            <span id="END_DATE_VIEW-error" class="error text-danger" for="input-END_DATE_VIEW">{{ $errors->first('END_DATE_VIEW') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('START Time') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('START_TIME') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('START_TIME') ? ' is-invalid' : '' }}" name="START_TIME" id="input-START_TIME" type="time" value="{{$ot_test_defines->START_TIME}}" required="true" aria-required="true"/>
                                        @if ($errors->has('START_TIME'))
                                            <span id="START_TIME-error" class="error text-danger" for="input-START_TIME">{{ $errors->first('START_TIME') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('Cost IRR') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('test_cost_R') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('test_cost_R') ? ' is-invalid' : '' }}" name="test_cost_R" id="input-test_cost_R" type="number" value="{{$ot_test_defines->test_cost_R}}" required="true" aria-required="true"/>
                                        @if ($errors->has('test_cost_R'))
                                            <span id="test_cost_R-error" class="error text-danger" for="input-test_cost_R">{{ $errors->first('test_cost_R') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('Cost €') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('test_cost_U') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('test_cost_U') ? ' is-invalid' : '' }}" name="test_cost_U" id="input-test_cost_U" type="number" value="{{$ot_test_defines->test_cost_U}}" required="true" aria-required="true"/>
                                        @if ($errors->has('test_cost_U'))
                                            <span id="test_cost_U-error" class="error text-danger" for="input-test_cost_U">{{ $errors->first('test_cost_U') }}</span>
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
