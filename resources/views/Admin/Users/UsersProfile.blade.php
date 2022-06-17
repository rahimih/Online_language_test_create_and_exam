@extends('layouts.A_app', ['activePage' => 'Users Management', 'titlePage' => __('Users Profile')])
@section('content')
    @switch($OpenForm)
        @case(1)
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <form method="post" action="{{ route('User.store') }}" autocomplete="off" class="form-horizontal">
                            @csrf
                            @method('POST')

                            <div class="card ">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">{{ __('Register Users ') }}</h4>
                                    <p class="card-category">{{ __('Users information') }}</p>
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
                                            <a href="{{ route('User.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <label class="col-sm-3 col-form-label text-dark">{{ __('First Name') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('fname') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="input-fname" type="text" placeholder="{{ __('First Name') }}"  required="true" aria-required="true"/>
                                                    @if ($errors->has('fname'))
                                                        <span id="fname-error" class="error text-danger" for="input-fname">{{ $errors->first('fname') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <label class="col-sm-3 col-form-label text-dark">{{ __('Last Name') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('lname') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" id="input-lname" type="text" placeholder="{{ __('Last Name') }}" required="true" aria-required="true"/>
                                                    @if ($errors->has('lname'))
                                                        <span id="lname-error" class="error text-danger" for="input-lname">{{ $errors->first('lname') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <label class="col-sm-3 col-form-label text-dark">{{ __('Mobile') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('Mobile') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('Mobile') ? ' is-invalid' : '' }}" name="Mobile" id="input-Mobile" type="tel"  placeholder="{{ __('Mobile') }}" required="true" aria-required="true"/>
                                                    @if ($errors->has('Mobile'))
                                                        <span id="Mobile-error" class="error text-danger" for="input-Mobile">{{ $errors->first('Mobile') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <label class="col-sm-3 col-form-label text-dark">{{ __('Email') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}"  required />
                                                    @if ($errors->has('email'))
                                                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                            <label class="col-sm-3 col-form-label text-dark">{{ __('Age') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" id="input-age" type="number"  min="10"  max="99" placeholder="{{ __('Age') }}" required="true" aria-required="true"/>
                                                    @if ($errors->has('age'))
                                                        <span id="age-error" class="error text-danger" for="input-age">{{ $errors->first('age') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                            <label class="col-sm-3 col-form-label text-dark">{{ __('Anestutude Name') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('Anestutude_Id') ? ' has-danger' : '' }}">
                                                    <select class="form-control{{ $errors->has('Anestutude_Id') ? ' is-invalid' : '' }}" name="Anestutude_Id" id="input-Anestutude_Id" type="dropdown" placeholder="{{ __('Anestutude Name') }}"  required >
                                                        @foreach($ot_institute_names as $institute)
                                                        <option value="{{$institute->ID}}">{{$institute->INSTITUTE_NAME}}</option>
                                                    @endforeach
                                                    </select>
                                                </div>
                                                    @if ($errors->has('Anestutude_Id'))
                                                        <span id="Anestutude_Id-error" class="error text-danger" for="input-Anestutude_Id">{{ $errors->first('Anestutude_Id') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                    <div class="row">
                                            <label class="col-sm-3 col-form-label text-dark">{{ __('USERKIND ') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('kindusers') ? ' has-danger' : '' }}">
                                                    <select class="form-control{{ $errors->has('kindusers') ? ' is-invalid' : '' }}" name="kindusers" id="input-kindusers" type="dropdown" placeholder="{{ __('USERKIND') }}"  required >
                                                        @foreach($ot_users_kinds as $userkind)
                                                            <option value="{{$userkind->KINDUSER_ID}}">{{$userkind->USERKIND_DESC}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('kindusers'))
                                                    <span id="kindusers-error" class="error text-danger" for="input-kindusers">{{ $errors->first('kindusers') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    <div class="row">
                                            <label class="col-sm-3 col-form-label text-dark" for="input-password">{{ __(' Password') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __(' Password') }}" value="" required />
                                                    @if ($errors->has('password'))
                                                        <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <label class="col-sm-3 col-form-label text-dark" for="input-Confirm_password">{{ __(' Confirm Password') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('Confirm_password') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('Confirm_password') ? ' is-invalid' : '' }}" name="Confirm_password" id="input-Confirm_password" type="password" placeholder="{{ __(' Confirm Password') }}" value="" required />
                                                    @if ($errors->has('Confirm_password'))
                                                        <span id="Confirm_password-error" class="error text-danger" for="input-Confirm_password">{{ $errors->first('Confirm_password') }}</span>
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
                        <form method="post" action="{{action('UsersController@update',$id)}}" autocomplete="off" class="form-horizontal">
                            @csrf
                            @method('put')

                            <div class="card ">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">{{ __('Update Users ') }}</h4>
                                    <p class="card-category">{{ __('Users information') }}</p>
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
                                            <a href="{{ route('User.index') }}" class="btn btn-sm btn-info">BACK TO LIST</a>
                                        </div>
                                    </div>

                                    <div class="row">
                                            <label class="col-sm-3 col-form-label">{{ __('First Name') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('fname') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="input-fname" type="text" placeholder="{{ __('fName') }}" value="{{ old('fname', $Users->fname) }}" required="true" aria-required="true"/>
                                                    @if ($errors->has('fname'))
                                                        <span id="name-error" class="error text-danger" for="input-fname">{{ $errors->first('fname') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <label class="col-sm-3 col-form-label">{{ __('Last Name') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('lname') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" id="input-lname" type="text" placeholder="{{ __('lName') }}" value="{{ old('lname', $Users->lname) }}" required="true" aria-required="true"/>
                                                    @if ($errors->has('lname'))
                                                        <span id="lname-error" class="error text-danger" for="input-lname">{{ $errors->first('lname') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <label class="col-sm-3 col-form-label">{{ __('Mobile') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('Mobile') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('Mobile') ? ' is-invalid' : '' }}" name="Mobile" id="input-Mobile" type="text" placeholder="{{ __('Mobile') }}" value="{{ old('Mobile', $Users->Mobile) }}" required="true" aria-required="true"/>
                                                    @if ($errors->has('Mobile'))
                                                        <span id="Mobile-error" class="error text-danger" for="input-Mobile">{{ $errors->first('Mobile') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    <div class="row">
                                            <label class="col-sm-3 col-form-label">{{ __('Email') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', $Users->email) }}" required />
                                                    @if ($errors->has('email'))
                                                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    <div class="row">
                                            <label class="col-sm-3 col-form-label">{{ __('Anestutude Name') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('Anestutude_Id') ? ' has-danger' : '' }}">
                                                    <select class="form-control{{ $errors->has('Anestutude_Id') ? ' is-invalid' : '' }}" name="Anestutude_Id" id="input-Anestutude_Id" type="dropdown" placeholder="{{ __('Anestutude Name') }}"  value="{{ old('Anestutude_Id', $Users->Anestutude_Id) }}" required >
                                                        @foreach($ot_institute_names as $institute)
                                                            <option value="{{$institute->ID}}" @if($Users->Anestutude_Id==$institute->ID) selected @endif>{{$institute->INSTITUTE_NAME}}</option>
                                                        @endforeach
                                                    </select>
                                                @if ($errors->has('Anestutude_Id'))
                                                    <span id="Anestutude_Id-error" class="error text-danger" for="input-Anestutude_Id">{{ $errors->first('Anestutude_Id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                            <label class="col-sm-3 col-form-label">{{ __('USERKIND ') }}</label>
                                            <div class="col-sm-7">
                                                <div class="form-group{{ $errors->has('kindusers') ? ' has-danger' : '' }}">
                                                    <select class="form-control{{ $errors->has('kindusers') ? ' is-invalid' : '' }}" name="kindusers" id="input-kindusers" type="dropdown" placeholder="{{ __('USERKIND') }}"   value="{{ old('kindusers', $Users->kindusers) }}"  required >
                                                        @foreach($ot_users_kinds as $userkind)
                                                            <option value="{{$userkind->KINDUSER_ID}}" @if($Users->kindusers==$userkind->KINDUSER_ID) selected @endif>{{$userkind->USERKIND_DESC}}</option>
                                                        @endforeach
                                                    </select>
                                                @if ($errors->has('kindusers'))
                                                    <span id="kindusers-error" class="error text-danger" for="input-kindusers">{{ $errors->first('kindusers') }}</span>
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
                <div class="row">
                    <div class="col-md-8">
                        <form method="post" action="{{action('UsersController@Passwords',$id)}}" class="form-horizontal">
{{--                        <form method="post" action="{{ route('Users.password') }}" class="form-horizontal">--}}
                            @csrf
                            @method('put')

                            <div class="card ">
                                <div class="card-header card-header-info">
                                    <h4 class="card-title">{{ __('Change password') }}</h4>
                                    <p class="card-category">{{ __('Password') }}</p>
                                </div>
                                <div class="card-body ">
                                    @if (session('status_password'))
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="alert alert-success">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    <span>{{ session('status_password') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label" for="input-password">{{ __('New Password') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                                <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" id="input-password" type="password" placeholder="{{ __('New Password') }}" value="" required />
                                                @if ($errors->has('password'))
                                                    <span id="password-error" class="error text-danger" for="input-password">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label class="col-sm-3 col-form-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                        <div class="col-sm-7">
                                            <div class="form-group">
                                                <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm Password') }}" value="" required />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer ml-auto mr-auto">
                                    <button type="submit" class="btn btn-info">{{ __('Change password') }}</button>
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
