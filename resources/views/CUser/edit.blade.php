@extends('layouts.A_app', ['activePage' => 'profile', 'titlePage' => __('User Profile')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{ route('profile.update') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('put')

            <div class="card ">
              <div class="card-header card-header-info">
                <h4 class="card-title">{{ __('Edit Profile') }}</h4>
                <p class="card-category">{{ __('User information') }}</p>
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
                  <label class="col-sm-2 col-form-label">{{ __('First Name') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('fname') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('fname') ? ' is-invalid' : '' }}" name="fname" id="input-fname" type="text" placeholder="{{ __('First Name') }}" value="{{ old('fname', auth()->user()->fname) }}" required="true" aria-required="true"/>
                      @if ($errors->has('fname'))
                        <span id="name-error" class="error text-danger" for="input-fname">{{ $errors->first('fname') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Last Name') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('lname') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('lname') ? ' is-invalid' : '' }}" name="lname" id="input-lname" type="text" placeholder="{{ __('Last Name') }}" value="{{ old('lname', auth()->user()->lname) }}" required="true" aria-required="true"/>
                                @if ($errors->has('lname'))
                                    <span id="lname-error" class="error text-danger" for="input-lname">{{ $errors->first('lname') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Age') }}</label>
                    <div class="col-sm-7">
                        <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }}">
                            <input class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" name="age" id="input-age" type="text" placeholder="{{ __('Age') }}" value="{{ old('age', auth()->user()->age) }}" required="false" aria-required="false"/>
                            @if ($errors->has('age'))
                                <span id="age-error" class="error text-danger" for="input-age">{{ $errors->first('age') }}</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="row">
                        <label class="col-sm-2 col-form-label">{{ __('Mobile') }}</label>
                        <div class="col-sm-7">
                            <div class="form-group{{ $errors->has('Mobile') ? ' has-danger' : '' }}">
                                <input class="form-control{{ $errors->has('Mobile') ? ' is-invalid' : '' }}" name="Mobile" id="input-Mobile" type="text" placeholder="{{ __('Mobile') }}" value="{{ old('Mobile', auth()->user()->Mobile) }}" required="true" aria-required="true"/>
                                @if ($errors->has('Mobile'))
                                    <span id="Mobile-error" class="error text-danger" for="input-Mobile">{{ $errors->first('Mobile') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" required />
                      @if ($errors->has('email'))
                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-info">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
        <div class="col-md-8">
          <form method="post" action="{{ route('profile.password') }}" class="form-horizontal">
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
                  <label class="col-sm-2 col-form-label" for="input-current-password">{{ __('Current Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('old_password') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('old_password') ? ' is-invalid' : '' }}" input type="password" name="old_password" id="input-current-password" placeholder="{{ __('Current Password') }}" value="" required />
                      @if ($errors->has('old_password'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('old_password') }}</span>
                      @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <label class="col-sm-2 col-form-label" for="input-password">{{ __('New Password') }}</label>
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
                  <label class="col-sm-2 col-form-label" for="input-password-confirmation">{{ __('Confirm New Password') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group">
                      <input class="form-control" name="password_confirmation" id="input-password-confirmation" type="password" placeholder="{{ __('Confirm New Password') }}" value="" required />
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
@endsection
