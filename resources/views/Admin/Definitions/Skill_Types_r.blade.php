@extends('layouts.A_app', ['activePage' => 'Skill', 'titlePage' => __('SKILL TYPE')])
@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{ route('Skill_type.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Register Skill Type ') }}</h4>
                <p class="card-category">{{ __('Skill Type information') }}</p>
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
                            <a href="{{ route('Skill_type.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>

                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('SKILL TYPE') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('SKILL_TYPE') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('SKILL_TYPE') ? ' is-invalid' : '' }}" name="SKILL_TYPE" id="input-SKILL_TYPE" type="text" required="true" aria-required="true"/>
                      @if ($errors->has('SKILL_TYPE'))
                        <span id="SKILL_TYPE-error" class="error text-danger" for="input-SKILL_TYPE">{{ $errors->first('SKILL_TYPE') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('EXAM KIND') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('HAVE_EXAM') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('HAVE_EXAM') ? ' is-invalid' : '' }}" name="HAVE_EXAM" id="input-HAVE_EXAM" type="dropdown" placeholder="{{ __('EXAM KIND') }}"  required >
                                    <option value="{{1}}">YES</option>
                                    <option value="{{0}}">NO</option>
                                </select>
                            </div>
                            @if ($errors->has('HAVE_EXAM'))
                                <span id="HAVE_EXAM-error" class="error text-danger" for="input-HAVE_EXAM">{{ $errors->first('HAVE_EXAM') }}</span>
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
                <form method="post" action="{{action('OtSkillTypeController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update Skill Type ') }}</h4>
                            <p class="card-category">{{ __('Skill Type information') }}</p>
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
                                    <a href="{{ route('Skill_type.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('SKILL TYPE') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('SKILL_TYPE') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('SKILL_TYPE') ? ' is-invalid' : '' }}" name="SKILL_TYPE" id="input-SKILL_TYPE" type="text"  placeholder="{{ __('SKILL_TYPE') }}" value="{{$ot_skill_types->SKILL_TYPE}}" required="true" aria-required="true"/>
                                        @if ($errors->has('SKILL_TYPE'))
                                            <span id="SKILL_TYPE-error" class="error text-danger" for="input-SKILL_TYPE">{{ $errors->first('SKILL_TYPE') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('EXAM KIND') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('HAVE_EXAM') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('HAVE_EXAM') ? ' is-invalid' : '' }}" name="HAVE_EXAM" id="input-HAVE_EXAM" type="dropdown" placeholder="{{ __('EXAM KIND') }}"  required >
                                                <option value="{{1}}"  @if($ot_skill_types->HAVE_EXAM==1) selected @endif>YES</option>
                                                <option value="{{0}}"  @if($ot_skill_types->HAVE_EXAM==0) selected @endif>NO</option>

                                            </select>
                                        </div>
                                        @if ($errors->has('HAVE_EXAM'))
                                            <span id="HAVE_EXAM-error" class="error text-danger" for="input-HAVE_EXAM">{{ $errors->first('HAVE_EXAM') }}</span>
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
