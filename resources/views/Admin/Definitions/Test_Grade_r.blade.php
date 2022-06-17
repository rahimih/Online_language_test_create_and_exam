@extends('layouts.A_app', ['activePage' => 'TestGrade', 'titlePage' => __('Test Grades')])
@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('Test_Grade.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                  <h4 class="card-title">{{ __('Update Test Grades ') }}</h4>
                  <p class="card-category">{{ __('Test Grades information') }}</p>
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
                            <a href="{{ route('Test_Grade.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
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
                        <label class="col-sm-3 col-form-label">{{ __('SUBGROUP TEST NAME') }}</label>
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
                        <label class="col-sm-3 col-form-label">{{ __('QUESTION FROM') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('QUESTION_FROM') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('QUESTION_FROM') ? ' is-invalid' : '' }}" name="QUESTION_FROM" id="input-QUESTION_FROM" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('QUESTION_FROM'))
                                    <span id="QUESTION_FROM-error" class="error text-danger" for="input-QUESTION_FROM">{{ $errors->first('QUESTION_FROM') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('QUESTION TO') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('QUESTION_TO') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('QUESTION_TO') ? ' is-invalid' : '' }}" name="QUESTION_TO" id="input-QUESTION_TO" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('QUESTION_TO'))
                                    <span id="QUESTION_TO-error" class="error text-danger" for="input-QUESTION_TO">{{ $errors->first('QUESTION_TO') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('GRADE') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('GRADE') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('GRADE') ? ' is-invalid' : '' }}" name="GRADE" id="input-GRADE" type="text" required="true" aria-required="true"/>
                                @if ($errors->has('GRADE'))
                                    <span id="GRADE-error" class="error text-danger" for="input-GRADE">{{ $errors->first('GRADE') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('DATE FROM') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('DATE_FROM') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('DATE_FROM') ? ' is-invalid' : '' }}" name="DATE_FROM" id="input-DATE_FROM" type="date" required="true" aria-required="true"/>
                                @if ($errors->has('DATE_FROM'))
                                    <span id="DATE_FROM-error" class="error text-danger" for="input-DATE_FROM">{{ $errors->first('DATE_FROM') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('DATE TO') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('DATE_TO') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('DATE_TO') ? ' is-invalid' : '' }}" name="DATE_TO" id="input-DATE_TO" type="date" required="true" aria-required="true"/>
                                @if ($errors->has('DATE_TO'))
                                    <span id="DATE_TO-error" class="error text-danger" for="input-DATE_TO">{{ $errors->first('DATE_TO') }}</span>
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
                <form method="post" action="{{action('OtTestGradeController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update Test Grades ') }}</h4>
                            <p class="card-category">{{ __('Test Grades information') }}</p>
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
                                    <a href="{{ route('Test_Grade.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('MAIN_TEST_ID ') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('MAIN_TEST_ID ') ? ' is-invalid' : '' }}" name="MAIN_TEST_ID" id="input-MAINTESTS_ID" type="dropdown" placeholder="{{ __('MAIN TEST NAME') }}"  required >
                                                @foreach($ot_main_tests as $ot_maintests)
                                                    <option value="{{$ot_maintests->MAINTEST_ID}}"@if($ot_maintests->MAINTEST_ID==$ot_test_grades->MAIN_TEST_ID ) selected @endif>{{$ot_maintests->TYPE}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('MAIN_TEST_ID'))
                                            <span id="MAIN_TEST_ID-error" class="error text-danger" for="input-MAIN_TEST_ID">{{ $errors->first('MAIN_TEST_ID') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('SUBGROUP TEST NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('SUBGROUP_TEST_ID ') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('SUBGROUP_TEST_ID ') ? ' is-invalid' : '' }}" name="SUBGROUP_TEST_ID" id="input-SUBGROUP_TEST_ID" type="dropdown" placeholder="{{ __('SUBGROUP TEST NAME') }}"  required >
                                                @foreach($ot_subgroup_tests as $subgroup_tests)
                                                    <option value="{{$subgroup_tests->SUBGROUP_TEST_ID}}" @if($subgroup_tests->SUBGROUP_TEST_ID==$ot_test_grades->SUBGROUP_TEST_ID ) selected @endif>{{$subgroup_tests->SUBGROUP_TEST_NAME}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('SUBGROUP_TEST_ID'))
                                            <span id="SUBGROUP_TEST_ID-error" class="error text-danger" for="input-SUBGROUP_TEST_ID">{{ $errors->first('SUBGROUP_TEST_ID') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('SKILL NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('SKILL_ID ') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('SKILL_ID ') ? ' is-invalid' : '' }}" name="SKILL_ID" id="input-SKILL_ID" type="dropdown" placeholder="{{ __('SKILL NAME') }}"  required >
                                                @foreach($ot_skill_types as $skill_types)
                                                    <option value="{{$skill_types->SKILL_ID}}" @if($skill_types->SKILL_ID==$ot_test_grades->SKILL_ID ) selected @endif>{{$skill_types->SKILL_TYPE}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('SKILL_ID'))
                                            <span id="SKILL_ID-error" class="error text-danger" for="input-SKILL_ID">{{ $errors->first('SKILL_ID') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('QUESTION FROM') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('QUESTION_FROM') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('QUESTION_FROM') ? ' is-invalid' : '' }}" name="QUESTION_FROM" id="input-QUESTION_FROM" type="text"  placeholder="{{ __('QUESTION FROM') }}" value="{{$ot_test_grades->QUESTION_FROM}}" required="true" aria-required="true"/>
                                            @if ($errors->has('QUESTION_FROM'))
                                                <span id="QUESTION_FROM-error" class="error text-danger" for="input-QUESTION_FROM">{{ $errors->first('QUESTION_FROM') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('QUESTION TO') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('QUESTION_TO') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('QUESTION_TO') ? ' is-invalid' : '' }}" name="QUESTION_TO" id="input-QUESTION_TO" type="text" placeholder="{{ __('QUESTION TO') }}" value="{{$ot_test_grades->QUESTION_TO}}" required="true" aria-required="true"/>
                                            @if ($errors->has('QUESTION_TO'))
                                                <span id="QUESTION_TO-error" class="error text-danger" for="input-QUESTION_TO">{{ $errors->first('QUESTION_TO') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('GRADE') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('GRADE') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('GRADE') ? ' is-invalid' : '' }}" name="GRADE" id="input-GRADE" type="text" placeholder="{{ __('GRADE') }}" value="{{$ot_test_grades->GRADE}}" required="true" aria-required="true"/>
                                            @if ($errors->has('GRADE'))
                                                <span id="GRADE-error" class="error text-danger" for="input-GRADE">{{ $errors->first('GRADE') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('DATE FROM') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('DATE_FROM') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('DATE_FROM') ? ' is-invalid' : '' }}" name="DATE_FROM" id="input-DATE_FROM" type="date" placeholder="{{ __('DATE FROM') }}" value="{{$ot_test_grades->DATE_FROM}}" required="true" aria-required="true"/>
                                            @if ($errors->has('DATE_FROM'))
                                                <span id="DATE_FROM-error" class="error text-danger" for="input-DATE_FROM">{{ $errors->first('DATE_FROM') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('DATE TO') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('DATE_TO') ? ' has-danger' : '' }}">
                                            <input class="form-control{{ $errors->has('DATE_TO') ? ' is-invalid' : '' }}" name="DATE_TO" id="input-DATE_TO" type="date" placeholder="{{ __('DATE TO') }}" value="{{$ot_test_grades->DATE_TO}}" required="true" aria-required="true"/>
                                            @if ($errors->has('DATE_TO'))
                                                <span id="DATE_TO-error" class="error text-danger" for="input-DATE_TO">{{ $errors->first('DATE_TO') }}</span>
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
