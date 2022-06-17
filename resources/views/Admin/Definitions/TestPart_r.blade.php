@extends('layouts.A_app', ['activePage' => 'TestPart', 'titlePage' => __('Test Parts')])
@section('content')
@switch($OpenForm)
  @case(1)
    <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{route('Test_part.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('POST')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Register Test Parts ') }}</h4>
                <p class="card-category">{{ __('Test Parts information') }}</p>
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
                            <a href="{{ route('Test_part.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                        </div>
                    </div>

                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('MAINTEST_ID ') ? ' has-danger' : '' }}">
                                <select class="form-control{{ $errors->has('MAINTEST_ID ') ? ' is-invalid' : '' }}" name="MAINTEST_ID" id="input-MAINTEST_ID" type="dropdown" placeholder="{{ __('MAIN TEST NAME') }}"  required >
                                    @foreach($ot_main_tests as $ot_maintests)
                                        <option value="{{$ot_maintests->MAINTEST_ID}}">{{$ot_maintests->TYPE}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if ($errors->has('MAINTEST_ID'))
                                <span id="MAINTEST_ID-error" class="error text-danger" for="input-MAINTEST_ID">{{ $errors->first('MAINTEST_ID') }}</span>
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
                        <label class="col-sm-3 col-form-label">{{ __('PART NAME') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('PART_ID') ? ' has-danger' : '' }}">
                              <select class="form-control{{ $errors->has('PART_ID ') ? ' is-invalid' : '' }}" name="PART_ID" id="input-PART_ID" type="dropdown" placeholder="{{ __('PART NAME') }}"  required >
                                @foreach($ot_parts_names as $parts_names)
                                    <option value="{{$parts_names->PART_ID}}">{{$parts_names->PARTS_NAME}}</option>
                                    @endforeach
                              </select>
                                @if ($errors->has('PART_ID'))
                                    <span id="PART_ID-error" class="error text-danger" for="input-PART_ID">{{ $errors->first('PART_ID') }}</span>
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
                <form method="post" action="{{action('OtTestPartController@update',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card ">
                        <div class="card-header card-header-info">
                            <h4 class="card-title">{{ __('Update Test Parts ') }}</h4>
                            <p class="card-category">{{ __('Parts Skills information') }}</p>
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
                                    <a href="{{ route('Test_part.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                </div>
                            </div>

                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('MAIN TEST NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('MAINTEST_ID') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('MAINTEST_ID') ? ' is-invalid' : '' }}" name="MAINTEST_ID" id="input-MAINTEST_ID" type="dropdown" placeholder="{{ __('MAIN TEST NAME') }}"  value="{{ old('MAINTEST_ID', $ot_test_parts->MAINTEST_ID) }}" required >
                                                @foreach($ot_main_tests as $ot_maintests)
                                                    <option value="{{$ot_maintests->MAINTEST_ID}}" @if($ot_maintests->MAINTEST_ID==$ot_test_parts->MAINTEST_ID ) selected @endif>{{$ot_maintests->TYPE}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('MAINTEST_ID'))
                                                <span id="MAINTEST_ID-error" class="error text-danger" for="input-MAINTEST_ID">{{ $errors->first('MAINTEST_ID') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            <div class="row">
                                <label class="col-sm-3 col-form-label">{{ __('SKILL NAME') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('SKILL_ID') ? ' has-danger' : '' }}">
                                        <select class="form-control{{ $errors->has('SKILL_ID') ? ' is-invalid' : '' }}" name="SKILL_ID" id="input-SKILL_ID" type="dropdown" placeholder="{{ __('SKILL NAME') }}"  value="{{ old('SKILL_ID', $ot_test_parts->SKILL_ID) }}" required >
                                            @foreach($ot_skill_types as $skill_types)
                                              <option value="{{$skill_types->SKILL_ID}}" @if($skill_types->SKILL_ID==$ot_test_parts->SKILL_ID ) selected @endif>{{$skill_types->SKILL_TYPE}}</option>
                                            @endforeach
                                        </select>
                                    @if ($errors->has('SKILL_ID'))
                                            <span id="SKILL_ID-error" class="error text-danger" for="input-SKILL_ID">{{ $errors->first('SKILL_ID') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                    <label class="col-sm-3 col-form-label">{{ __('PART NAME') }}</label>
                                    <div class="col-sm-7">
                                        <div class="form-group{{ $errors->has('PART_ID') ? ' has-danger' : '' }}">
                                            <select class="form-control{{ $errors->has('PART_ID') ? ' is-invalid' : '' }}" name="PART_ID" id="input-PART_ID" type="dropdown" placeholder="{{ __('PART NAME') }}"  value="{{ old('PART_ID', $ot_test_parts->PART_ID) }}" required >
                                                @foreach($ot_parts_names as $parts_names)
                                                    <option value="{{$parts_names->PART_ID}}" @if($parts_names->PART_ID==$ot_test_parts->PART_ID ) selected @endif>{{$parts_names->PARTS_NAME}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('PART_ID'))
                                                <span id="PART_ID-error" class="error text-danger" for="input-PART_ID">{{ $errors->first('PART_ID') }}</span>
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
