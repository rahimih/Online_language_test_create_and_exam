@extends('layouts.A_app', ['activePage' => 'Questions_t', 'titlePage' => __('Question Type')])

@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{ route('Question_type.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Register Question Type ') }}</h4>
                <p class="card-category">{{ __('Question Type information') }}</p>
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
                            <a href="{{ route('Question_type.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>

                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('QUESTION TYPE') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('QUESTIONS_TYPE') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('QUESTIONS_TYPE') ? ' is-invalid' : '' }}" name="QUESTIONS_TYPE" id="input-QUESTIONS_TYPE" type="text" required="true" aria-required="true"/>
                      @if ($errors->has('QUESTIONS_TYPE'))
                        <span id="QUESTIONS_TYPE-error" class="error text-danger" for="input-QUESTIONS_TYPE">{{ $errors->first('QUESTIONS_TYPE') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('HEADER') }}</label>
                        <div class="col-sm-6">
                            <div class="form-group{{ $errors->has('HEADER') ? ' has-danger' : '' }}">
                                <textarea rows="5" cols="40" dir="ltr" class="form-control{{ $errors->has('HEADER') ? ' is-invalid' : '' }}" name="HEADER" id="input-HEADER" type="text" required="false" aria-required="false"></textarea>
                                @if ($errors->has('HEADER'))
                                    <span id="HEADER-error" class="error text-danger" for="input-HEADER">{{ $errors->first('HEADER') }}</span>
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
                <form method="post" action="{{action('OtQuestionsTypeController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update Question Type ') }}</h4>
                            <p class="card-category">{{ __('Question Type information') }}</p>
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
                                    <a href="{{ route('Question_type.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('QUESTIONS TYPE') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('QUESTIONS_TYPE') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('QUESTIONS_TYPE') ? ' is-invalid' : '' }}" name="QUESTIONS_TYPE" id="input-QUESTIONS_TYPE" type="text"  placeholder="{{ __('QUESTIONS TYPE') }}" value="{{$ot_questions_types->QUESTIONS_TYPE}}" required="true" aria-required="true"/>
                                        @if ($errors->has('QUESTIONS_TYPE'))
                                            <span id="QUESTIONS_TYPE-error" class="error text-danger" for="input-QUESTIONS_TYPE">{{ $errors->first('QUESTIONS_TYPE') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('HEADER') }}</label>
                                    <div class="col-sm-6">
                                        <div class="form-group{{ $errors->has('HEADER') ? ' has-danger' : '' }}">
                                            <textarea rows="5" cols="40" dir="ltr" class="form-control{{ $errors->has('HEADER') ? ' is-invalid' : '' }}" name="HEADER" id="input-HEADER" type="text" required="false" aria-required="false">
                                            {!! $ot_questions_types->HEADER !!}
                                            </textarea>
                                            @if ($errors->has('HEADER'))
                                                <span id="HEADER-error" class="error text-danger" for="input-HEADER">{{ $errors->first('HEADER') }}</span>
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
