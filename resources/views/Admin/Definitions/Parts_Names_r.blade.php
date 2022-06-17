@extends('layouts.A_app', ['activePage' => 'Parts', 'titlePage' => __('Register Parts')])

@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{ route('parts_name.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Register PART ') }}</h4>
                <p class="card-category">{{ __('PARTS information') }}</p>
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
                            <a href="{{ route('parts_name.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>

                <div class="row">
                  <label class="col-sm-3 col-form-label">{{ __('PART NAME') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('PARTS_NAME') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('PARTS_NAME') ? ' is-invalid' : '' }}" name="PARTS_NAME" id="input-PARTS_NAME" type="text" required="true" aria-required="true"/>
                      @if ($errors->has('PARTS_NAME'))
                        <span id="PARTS_NAME-error" class="error text-danger" for="input-PARTS_NAME">{{ $errors->first('PARTS_NAME') }}</span>
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
                <form method="post" action="{{action('PartsNameController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update PART ') }}</h4>
                            <p class="card-category">{{ __('PART information') }}</p>
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
                                    <a href="{{ route('parts_name.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>

                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('PART NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('PARTS_NAME') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('PARTS_NAME') ? ' is-invalid' : '' }}" name="PARTS_NAME" id="input-PARTS_NAME" type="text"  placeholder="{{ __('PARTS_NAME') }}" value="{{$ot_parts_names->PARTS_NAME}}" required="true" aria-required="true"/>
                                        @if ($errors->has('PARTS_NAME'))
                                            <span id="PARTS_NAME-error" class="error text-danger" for="input-PARTS_NAME">{{ $errors->first('PARTS_NAME') }}</span>
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
