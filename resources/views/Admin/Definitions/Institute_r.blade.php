@extends('layouts.A_app', ['activePage' => 'Institute', 'titlePage' => __('Institute')])

@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{ route('Institute.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Register Institute ') }}</h4>
                <p class="card-category">{{ __('Institute information') }}</p>
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
                            <a href="{{ route('Institute.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>

                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('INSTITUTE NAME') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('INSTITUTE_NAME') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('INSTITUTE_NAME') ? ' is-invalid' : '' }}" name="INSTITUTE_NAME" id="input-INSTITUTE_NAME" type="text" required="true" aria-required="true"/>
                      @if ($errors->has('INSTITUTE_NAME'))
                        <span id="INSTITUTE_NAME-error" class="error text-danger" for="input-INSTITUTE_NAME">{{ $errors->first('INSTITUTE_NAME') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('INSTITUTE CODE') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('INSTITUTE_CODE') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('INSTITUTE_NAME') ? ' is-invalid' : '' }}" name="INSTITUTE_CODE" id="input-INSTITUTE_CODE" type="text" />
                                @if ($errors->has('INSTITUTE_CODE'))
                                    <span id="INSTITUTE_CODE-error" class="error text-danger" for="input-INSTITUTE_CODE">{{ $errors->first('INSTITUTE_NAME') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('MANAGER NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('MANAGER_NAME') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('MANAGER_NAME') ? ' is-invalid' : '' }}" name="MANAGER_NAME" id="input-MANAGER_NAME" type="text"  required="true" aria-required="true"/>
                                @if ($errors->has('MANAGER_NAME'))
                                    <span id="MANAGER_NAME-error" class="error text-danger" for="input-MANAGER_NAME">{{ $errors->first('MANAGER_NAME') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('ADDRESS') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('ADDRESS') ? ' has-danger' : '' }}">
                        <input class="form-control{{ $errors->has('ADDRESS') ? ' is-invalid' : '' }}" name="ADDRESS" id="input-ADDRESS" type="text" />
                      @if ($errors->has('ADDRESS'))
                        <span id="ADDRESS-error" class="error text-danger" for="input-ADDRESS">{{ $errors->first('ADDRESS') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('PHONE') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('PHONE') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('PHONE') ? ' is-invalid' : '' }}" name="PHONE" id="input-PHONE" type="text" />
                                @if ($errors->has('PHONE'))
                                    <span id="PHONE-error" class="error text-danger" for="input-PHONE">{{ $errors->first('PHONE') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('MOBILE') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('MOBILE') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('MOBILE') ? ' is-invalid' : '' }}" name="MOBILE" id="input-MOBILE" type="text" />
                                @if ($errors->has('MOBILE'))
                                    <span id="MOBILE-error" class="error text-danger" for="input-MOBILE">{{ $errors->first('MOBILE') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('COMMENT') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('COMMENT') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('COMMENT') ? ' is-invalid' : '' }}" name="COMMENT" id="input-COMMENT" type="text" />
                                @if ($errors->has('COMMENT'))
                                    <span id="COMMENT-error" class="error text-danger" for="input-COMMENT">{{ $errors->first('COMMENT') }}</span>
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
                <form method="post" action="{{action('InstituteController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update Institute ') }}</h4>
                            <p class="card-category">{{ __('Institute information') }}</p>
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
                                    <a href="{{ route('Institute.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('INSTITUTE NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('INSTITUTE_NAME') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('INSTITUTE_NAME') ? ' is-invalid' : '' }}" name="INSTITUTE_NAME" id="input-INSTITUTE_NAME" type="text"  placeholder="{{ __('INSTITUTE_NAME') }}" value="{{$ot_institute_names->INSTITUTE_NAME}}" required="true" aria-required="true"/>
                                        @if ($errors->has('INSTITUTE_NAME'))
                                            <span id="INSTITUTE_NAME-error" class="error text-danger" for="input-INSTITUTE_NAME">{{ $errors->first('INSTITUTE_NAME') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('INSTITUTE CODE') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('INSTITUTE_CODE') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('INSTITUTE_NAME') ? ' is-invalid' : '' }}" name="INSTITUTE_CODE" id="input-INSTITUTE_CODE" type="text" placeholder="{{ __('INSTITUTE_CODE') }}" value="{{$ot_institute_names->INSTITUTE_CODE}}" />
                                        @if ($errors->has('INSTITUTE_CODE'))
                                            <span id="INSTITUTE_CODE-error" class="error text-danger" for="input-INSTITUTE_CODE">{{ $errors->first('INSTITUTE_NAME') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('MANAGER NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('MANAGER_NAME') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('MANAGER_NAME') ? ' is-invalid' : '' }}" name="MANAGER_NAME" id="input-MANAGER_NAME" type="text"  placeholder="{{ __('MANAGER_NAME') }}" value="{{$ot_institute_names->MANAGER_NAME}}" required="true" aria-required="true"/>
                                        @if ($errors->has('MANAGER_NAME'))
                                            <span id="MANAGER_NAME-error" class="error text-danger" for="input-MANAGER_NAME">{{ $errors->first('MANAGER_NAME') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('ADDRESS') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('ADDRESS') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('ADDRESS') ? ' is-invalid' : '' }}" name="ADDRESS" id="input-ADDRESS" type="text" placeholder="{{ __('ADDRESS') }}" value="{{$ot_institute_names->ADDRESS}}" />
                                        @if ($errors->has('ADDRESS'))
                                            <span id="ADDRESS-error" class="error text-danger" for="input-ADDRESS">{{ $errors->first('ADDRESS') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('PHONE') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('PHONE') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('PHONE') ? ' is-invalid' : '' }}" name="PHONE" id="input-PHONE" type="text" placeholder="{{ __('PHONE') }}" value="{{$ot_institute_names->PHONE}}" />
                                        @if ($errors->has('PHONE'))
                                            <span id="PHONE-error" class="error text-danger" for="input-PHONE">{{ $errors->first('PHONE') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('MOBILE') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('MOBILE') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('MOBILE') ? ' is-invalid' : '' }}" name="MOBILE" id="input-MOBILE" type="text"  placeholder="{{ __('MOBILE') }}" value="{{$ot_institute_names->MOBILE}}"/>
                                        @if ($errors->has('MOBILE'))
                                            <span id="MOBILE-error" class="error text-danger" for="input-MOBILE">{{ $errors->first('MOBILE') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('COMMENT') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('COMMENT') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('COMMENT') ? ' is-invalid' : '' }}" name="COMMENT" id="input-COMMENT" type="text" placeholder="{{ __('COMMENT') }}" value="{{$ot_institute_names->COMMENT}}" />
                                        @if ($errors->has('COMMENT'))
                                            <span id="COMMENT-error" class="error text-danger" for="input-COMMENT">{{ $errors->first('COMMENT') }}</span>
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
