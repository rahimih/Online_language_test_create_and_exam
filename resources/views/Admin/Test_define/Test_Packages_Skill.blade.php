@extends('layouts.A_app', ['activePage' => 'Tests', 'titlePage' => __('Test Defines')])
@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{action('OtTestDefineController@store2',$insertedId)}}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                  <h4 class="card-title">{{ __('Create Test') }}</h4>
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
{{--                    <div class="row">
                        <div class="col-12 text-right">
                            <a href="{{ route('Tests.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>--}}

                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('LISTENING') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('LISTENING') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('LISTENING') ? ' is-invalid' : '' }}" name="LISTENING" id="input-LISTENING" type="dropdown"  required >
                                    <option value="0">NONE</option>
                                    @foreach($ot_questions_packages1 as $questions_packages1)
                                        <option value="{{$questions_packages1->QUESTIONS_PACKAGES_ID}}">{{$questions_packages1->QUESTIONS_PACKAGES_NAME}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('LISTENING'))
                                <span id="LISTENING-error" class="error text-danger" for="input-LISTENING">{{ $errors->first('LISTENING') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('READING') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('READING') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('READING') ? ' is-invalid' : '' }}" name="READING" id="input-READING" type="dropdown"  required >
                                    <option value="0">NONE</option>
                                    @foreach($ot_questions_packages2 as $questions_packages2)
                                        <option value="{{$questions_packages2->QUESTIONS_PACKAGES_ID}}">{{$questions_packages2->QUESTIONS_PACKAGES_NAME}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('READING'))
                                <span id="READING-error" class="error text-danger" for="input-READING">{{ $errors->first('READING') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('WRITING') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('WRITING ') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('WRITING ') ? ' is-invalid' : '' }}" name="WRITING" id="input-WRITING" type="dropdown"  required >
                                    <option value="0">NONE</option>
                                    @foreach($ot_questions_packages3 as $questions_packages3)
                                        <option value="{{$questions_packages3->QUESTIONS_PACKAGES_ID}}">{{$questions_packages3->QUESTIONS_PACKAGES_NAME}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('WRITING'))
                                <span id="WRITING-error" class="error text-danger" for="input-WRITING">{{ $errors->first('WRITING') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('SPEAKING') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('SPEAKING') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('SPEAKING') ? ' is-invalid' : '' }}" name="SPEAKING" id="input-SPEAKING" type="dropdown"  required >
                                    <option value="0">NONE</option>
                                    @foreach($ot_questions_packages4 as $questions_packages4)
                                        <option value="{{$questions_packages4->QUESTIONS_PACKAGES_ID}}">{{$questions_packages4->QUESTIONS_PACKAGES_NAME}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('SPEAKING'))
                                <span id="SPEAKING-error" class="error text-danger" for="input-SPEAKING">{{ $errors->first('SPEAKING') }}</span>
                            @endif
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
                <form method="post" action="{{action('OtTestDefineController@update2',$insertedId)}}" autocomplete="off" class="form-horizontal">
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

                         {{--   <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Tests.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>--}}

                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('LISTENING') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('LISTENING') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('LISTENING') ? ' is-invalid' : '' }}" name="LISTENING" id="input-LISTENING" type="dropdown"  required >
                                                <option value="0">NONE</option>
                                                @foreach($ot_questions_packages1 as $questions_packages1)
                                                    @if ($ot_test_qpackages1->count()>0)
                                                    <option value="{{$questions_packages1->QUESTIONS_PACKAGES_ID}}" @if($questions_packages1->QUESTIONS_PACKAGES_ID==$ot_test_qpackages1->Q_PACKAGES_ID) selected @endif>{{$questions_packages1->QUESTIONS_PACKAGES_NAME}}</option>
                                                    @else
                                                    <option value="{{$questions_packages1->QUESTIONS_PACKAGES_ID}}">{{$questions_packages1->QUESTIONS_PACKAGES_NAME}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('LISTENING'))
                                            <span id="LISTENING-error" class="error text-danger" for="input-LISTENING">{{ $errors->first('LISTENING') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('READING') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('READING') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('READING') ? ' is-invalid' : '' }}" name="READING" id="input-READING" type="dropdown"  required >
                                                <option value="0">NONE</option>
                                                @foreach($ot_questions_packages2 as $questions_packages2)
                                                    @if ($ot_test_qpackages2->count()>0)
                                                        <option value="{{$questions_packages2->QUESTIONS_PACKAGES_ID}}" @if($questions_packages2->QUESTIONS_PACKAGES_ID==$ot_test_qpackages2->Q_PACKAGES_ID) selected @endif>{{$questions_packages2->QUESTIONS_PACKAGES_NAME}}</option>
                                                    @else
                                                        <option value="{{$questions_packages2->QUESTIONS_PACKAGES_ID}}">{{$questions_packages2->QUESTIONS_PACKAGES_NAME}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('READING'))
                                            <span id="READING-error" class="error text-danger" for="input-READING">{{ $errors->first('READING') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('WRITING') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('WRITING ') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('WRITING ') ? ' is-invalid' : '' }}" name="WRITING" id="input-WRITING" type="dropdown"  required >
                                                <option value="0">NONE</option>
                                                @foreach($ot_questions_packages3 as $questions_packages3)
                                                    @if ($ot_test_qpackages3->count()>0)
                                                        <option value="{{$questions_packages3->QUESTIONS_PACKAGES_ID}}" @if($questions_packages3->QUESTIONS_PACKAGES_ID==$ot_test_qpackages3->Q_PACKAGES_ID) selected @endif>{{$questions_packages3->QUESTIONS_PACKAGES_NAME}}</option>
                                                    @else
                                                        <option value="{{$questions_packages3->QUESTIONS_PACKAGES_ID}}">{{$questions_packages3->QUESTIONS_PACKAGES_NAME}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('WRITING'))
                                            <span id="WRITING-error" class="error text-danger" for="input-WRITING">{{ $errors->first('WRITING') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('SPEAKING') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('SPEAKING') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('SPEAKING') ? ' is-invalid' : '' }}" name="SPEAKING" id="input-SPEAKING" type="dropdown"  required >
                                                <option value="0">NONE</option>
                                                @foreach($ot_questions_packages4 as $questions_packages4)
                                                    @if ($ot_test_qpackages4->count()>0)
                                                        <option value="{{$questions_packages4->QUESTIONS_PACKAGES_ID}}" @if($questions_packages4->QUESTIONS_PACKAGES_ID==$ot_test_qpackages4->Q_PACKAGES_ID) selected @endif>{{$questions_packages4->QUESTIONS_PACKAGES_NAME}}</option>
                                                    @else
                                                        <option value="{{$questions_packages4->QUESTIONS_PACKAGES_ID}}">{{$questions_packages4->QUESTIONS_PACKAGES_NAME}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        @if ($errors->has('SPEAKING'))
                                            <span id="SPEAKING-error" class="error text-danger" for="input-SPEAKING">{{ $errors->first('SPEAKING') }}</span>
                                        @endif
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
