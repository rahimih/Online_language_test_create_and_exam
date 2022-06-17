@extends('layouts.A_app', ['activePage' => 'MainT', 'titlePage' => __('Register Main Tests')])
@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('M_Test.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Register Main Tests ') }}</h4>
                <p class="card-category">{{ __('Main Tests information') }}</p>
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
                            <a href="{{ route('M_Test.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('LANGUAGE NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('LANGUAGES_ID') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('LANGUAGES_ID') ? ' is-invalid' : '' }}" name="LANGUAGES_ID" id="input-LANGUAGES_ID" type="dropdown" placeholder="{{ __('LANGUAGE_NAME') }}"  required >
                                    @foreach($ot_language_types as $languagetype)
                                        <option value="{{$languagetype->LANGUAGE_ID}}">{{$languagetype->LANGUAGE_NAME}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('LANGUAGES_ID'))
                                <span id="LANGUAGES_ID-error" class="error text-danger" for="input-LANGUAGES_ID">{{ $errors->first('LANGUAGES_ID') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('TYPE') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('TYPE') ? ' is-invalid' : '' }}" name="TYPE" id="input-TYPE" type="text" required="true" aria-required="true"/>
                      @if ($errors->has('TYPE'))
                        <span id="TYPE-error" class="error text-danger" for="input-TYPE">{{ $errors->first('TYPE') }}</span>
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
                <form method="post" action="{{action('MainTestController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update Main Tests ') }}</h4>
                            <p class="card-category">{{ __('Main Tests information') }}</p>
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
                                    <a href="{{ route('M_Test.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>

                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('LANGUAGE NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('LANGUAGES_ID') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('LANGUAGES_ID') ? ' is-invalid' : '' }}" name="LANGUAGES_ID" id="input-LANGUAGES_ID" type="dropdown" placeholder="{{ __('LANGUAGE NAME') }}"  value="{{ old('LANGUAGES_ID', $ot_maintests->LANGUAGES_ID) }}" required >
                                                @foreach($ot_language_types as $languagetype)
                                                    <option value="{{$languagetype->LANGUAGE_ID}}" @if($languagetype->LANGUAGES_ID==$ot_maintests->LANGUAGE_ID) selected @endif>{{$languagetype->LANGUAGE_NAME}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('LANGUAGES_ID'))
                                                <span id="LANGUAGES_ID-error" class="error text-danger" for="input-LANGUAGES_ID">{{ $errors->first('LANGUAGES_ID') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('TYPE') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('TYPE') ? ' is-invalid' : '' }}" name="TYPE" id="input-TYPE" type="text"  placeholder="{{ __('TYPE') }}" value="{{$ot_maintests->TYPE}}" required="true" aria-required="true"/>
                                        @if ($errors->has('TYPE'))
                                            <span id="TYPE-error" class="error text-danger" for="input-TYPE">{{ $errors->first('TYPE') }}</span>
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
