@extends('layouts.A_app', ['activePage' => 'Package', 'titlePage' => __('Question Packages')])
@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('Q_Package.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                  <h4 class="card-title">{{ __('Update Question Packages ') }}</h4>
                  <p class="card-category">{{ __('Question Packages information') }}</p>
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
                            <a href="{{ route('Q_Package.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-4 col-form-label">{{ __('PACKAGES NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('QUESTIONS_PACKAGES_NAME') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('QUESTIONS_PACKAGES_NAME') ? ' is-invalid' : '' }}" name="QUESTIONS_PACKAGES_NAME" id="input-QUESTIONS_PACKAGES_NAME" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('QUESTIONS_PACKAGES_NAME'))
                                    <span id="QUESTIONS_PACKAGES_NAME-error" class="error text-danger" for="input-QUESTIONS_PACKAGES_NAME">{{ $errors->first('QUESTIONS_PACKAGES_NAME') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-4 col-form-label">{{ __('INSTITUTE NAME') }}</label>
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
                        <label class="col-sm-4 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('MAINTESTS_ID ') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('MAINTESTS_ID ') ? ' is-invalid' : '' }}" name="MAINTESTS_ID" id="input-MAINTESTS_ID" type="dropdown" placeholder="{{ __('MAIN TEST NAME') }}"  required >
                                    @foreach($ot_main_tests as $ot_maintests)
                                        <option value="{{$ot_maintests->MAINTEST_ID}}">{{$ot_maintests->TYPE}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('MAINTESTS_ID'))
                                <span id="MAINTESTS_ID-error" class="error text-danger" for="input-MAINTESTS_ID">{{ $errors->first('MAINTESTS_ID') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">{{ __('SUBGROUP TEST NAME') }}</label>
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
                        <label class="col-sm-4 col-form-label">{{ __('SKILL NAME') }}</label>
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
                        <label class="col-sm-4 col-form-label">{{ __('QUESTIONS COUNT') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('QUESTIONS_COUNT') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('QUESTIONS_COUNT') ? ' is-invalid' : '' }}" name="QUESTIONS_COUNT" id="input-QUESTIONS_COUNT" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('QUESTIONS_COUNT'))
                                    <span id="QUESTIONS_COUNT-error" class="error text-danger" for="input-QUESTIONS_COUNT">{{ $errors->first('QUESTIONS_COUNT') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-4 col-form-label">{{ __('TIME PERIOD (minutes)') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('TOTAL_TEST_TIME') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('TOTAL_TEST_TIME') ? ' is-invalid' : '' }}" name="TOTAL_TEST_TIME" id="input-TOTAL_TEST_TIME" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('TOTAL_TEST_TIME'))
                                    <span id="TOTAL_TEST_TIME-error" class="error text-danger" for="input-TOTAL_TEST_TIME">{{ $errors->first('TOTAL_TEST_TIME') }}</span>
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
                <form method="post" action="{{action('OtQuestionsPackagesController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update Question Packages ') }}</h4>
                            <p class="card-category">{{ __('Question Packages information') }}</p>
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
                                    <a href="{{ route('Q_Package.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>


                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('PACKAGES NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('QUESTIONS_PACKAGES_NAME') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('QUESTIONS_PACKAGES_NAME') ? ' is-invalid' : '' }}" name="QUESTIONS_PACKAGES_NAME" id="input-QUESTIONS_PACKAGES_NAME" type="text" placeholder="{{ __('PACKAGES NAME') }}" value="{{$ot_questions_packages->QUESTIONS_PACKAGES_NAME}}" required="true" aria-required="true"/>
                                            @if ($errors->has('QUESTIONS_PACKAGES_NAME'))
                                                <span id="QUESTIONS_PACKAGES_NAME-error" class="error text-danger" for="input-QUESTIONS_PACKAGES_NAME">{{ $errors->first('QUESTIONS_PACKAGES_NAME') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('INSTITUTE NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('INSTITUTE_ID ') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('INSTITUTE_ID ') ? ' is-invalid' : '' }}" name="INSTITUTE_ID" id="input-INSTITUTE_ID" type="dropdown" placeholder="{{ __('INSTITUTE NAME') }}"  required >
                                                @foreach($ot_institute_names as $institute_names)
                                                    <option value="{{$institute_names->ID}}" @if($institute_names->ID==$ot_questions_packages->INSTITUTE_ID ) selected @endif>{{$institute_names->INSTITUTE_NAME}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('INSTITUTE_ID'))
                                            <span id="INSTITUTE_ID-error" class="error text-danger" for="input-INSTITUTE_ID">{{ $errors->first('INSTITUTE_ID') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('MAINTESTS_ID ') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('MAINTESTS_ID ') ? ' is-invalid' : '' }}" name="MAINTESTS_ID" id="input-MAINTESTS_ID" type="dropdown" placeholder="{{ __('MAIN TEST NAME') }}"  required >
                                                @foreach($ot_main_tests as $ot_maintests)
                                                    <option value="{{$ot_maintests->MAINTEST_ID}}"@if($ot_maintests->MAINTEST_ID==$ot_questions_packages->MAINTESTS_ID ) selected @endif>{{$ot_maintests->TYPE}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('MAINTESTS_ID'))
                                            <span id="MAINTESTS_ID-error" class="error text-danger" for="input-MAINTESTS_ID">{{ $errors->first('MAINTESTS_ID') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('SUBGROUP TEST NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('SUBGROUP_TEST_ID ') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('SUBGROUP_TEST_ID ') ? ' is-invalid' : '' }}" name="SUBGROUP_TEST_ID" id="input-SUBGROUP_TEST_ID" type="dropdown" placeholder="{{ __('SUBGROUP TEST NAME') }}"  required >
                                                @foreach($ot_subgroup_tests as $subgroup_tests)
                                                    <option value="{{$subgroup_tests->SUBGROUP_TEST_ID}}" @if($subgroup_tests->SUBGROUP_TEST_ID==$ot_questions_packages->SUBGROUP_TEST_ID ) selected @endif>{{$subgroup_tests->SUBGROUP_TEST_NAME}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('SUBGROUP_TEST_ID'))
                                            <span id="SUBGROUP_TEST_ID-error" class="error text-danger" for="input-SUBGROUP_TEST_ID">{{ $errors->first('SUBGROUP_TEST_ID') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('SKILL NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('SKILL_ID ') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('SKILL_ID ') ? ' is-invalid' : '' }}" name="SKILL_ID" id="input-SKILL_ID" type="dropdown" placeholder="{{ __('SKILL NAME') }}"  required >
                                                @foreach($ot_skill_types as $skill_types)
                                                    <option value="{{$skill_types->SKILL_ID}}" @if($skill_types->SKILL_ID==$ot_questions_packages->SKILL_ID ) selected @endif>{{$skill_types->SKILL_TYPE}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('SKILL_ID'))
                                            <span id="SKILL_ID-error" class="error text-danger" for="input-SKILL_ID">{{ $errors->first('SKILL_ID') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('QUESTIONS COUNT') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('QUESTIONS_COUNT') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('QUESTIONS_COUNT') ? ' is-invalid' : '' }}" name="QUESTIONS_COUNT" id="input-QUESTIONS_COUNT" type="text" placeholder="{{ __('QUESTIONS COUNT') }}" value="{{$ot_questions_packages->QUESTIONS_COUNT}}" required="true" aria-required="true"/>
                                            @if ($errors->has('QUESTIONS_COUNT'))
                                                <span id="QUESTIONS_COUNT-error" class="error text-danger" for="input-QUESTIONS_COUNT">{{ $errors->first('QUESTIONS_COUNT') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-4 col-form-label">{{ __('TIME PERIOD (minutes)') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('TOTAL_TEST_TIME') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('TOTAL_TEST_TIME') ? ' is-invalid' : '' }}" name="TOTAL_TEST_TIME" id="input-TOTAL_TEST_TIME" type="text" placeholder="{{ __('TIME PERIOD') }}" value="{{$ot_questions_packages->TOTAL_TEST_TIME}}" required="true" aria-required="true"/>
                                            @if ($errors->has('TOTAL_TEST_TIME'))
                                                <span id="TOTAL_TEST_TIME-error" class="error text-danger" for="input-TOTAL_TEST_TIME">{{ $errors->first('TOTAL_TEST_TIME') }}</span>
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
