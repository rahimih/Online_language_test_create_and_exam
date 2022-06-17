@extends('layouts.A_app', ['activePage' => 'SubGroup', 'titlePage' => __('SubGroup Tests')])
@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('Subgroup_Test.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Register SubGroup Tests ') }}</h4>
                <p class="card-category">{{ __('SubGroup Tests information') }}</p>
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
                            <a href="{{ route('Subgroup_Test.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
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
                    <div class="form-group{{ $errors->has('SUBGROUP_TEST_NAME') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('SUBGROUP_TEST_NAME') ? ' is-invalid' : '' }}" name="SUBGROUP_TEST_NAME" id="input-SUBGROUP_TEST_NAME" type="text" required="true" aria-required="true"/>
                      @if ($errors->has('SUBGROUP_TEST_NAME'))
                        <span id="SUBGROUP_TEST_NAME-error" class="error text-danger" for="input-SUBGROUP_TEST_NAME">{{ $errors->first('SUBGROUP_TEST_NAME') }}</span>
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
                <form method="post" action="{{action('OtSubgroupTestController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update SubGroup Tests ') }}</h4>
                            <p class="card-category">{{ __('SubGroup Tests information') }}</p>
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
                                    <a href="{{ route('Subgroup_Test.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>

                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('MAIN_TEST_ID') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('MAIN_TEST_ID') ? ' is-invalid' : '' }}" name="MAIN_TEST_ID" id="input-MAIN_TEST_ID" type="dropdown" placeholder="{{ __('MAIN TEST NAME') }}"  value="{{ old('MAIN_TEST_ID', $ot_subgroup_tests->MAIN_TEST_ID) }}" required >
                                                @foreach($ot_Main_tests as $ot_maintests)
                                                    <option value="{{$ot_maintests->MAINTEST_ID}}" @if($ot_maintests->MAINTEST_ID==$ot_subgroup_tests->MAIN_TEST_ID ) selected @endif>{{$ot_maintests->TYPE}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('MAIN_TEST_ID'))
                                                <span id="MAIN_TEST_ID-error" class="error text-danger" for="input-MAIN_TEST_ID">{{ $errors->first('MAIN_TEST_ID') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('SUBGROUP TEST NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('SUBGROUP_TEST_NAME') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('SUBGROUP_TEST_NAME') ? ' is-invalid' : '' }}" name="SUBGROUP_TEST_NAME" id="input-SUBGROUP_TEST_NAME" type="text"  placeholder="{{ __('SUBGROUP TEST NAME') }}" value="{{$ot_subgroup_tests->SUBGROUP_TEST_NAME}}" required="true" aria-required="true"/>
                                        @if ($errors->has('SUBGROUP_TEST_NAME'))
                                            <span id="SUBGROUP_TEST_NAME-error" class="error text-danger" for="input-SUBGROUP_TEST_NAME">{{ $errors->first('SUBGROUP_TEST_NAME') }}</span>
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
