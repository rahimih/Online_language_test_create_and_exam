<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <title> ONLINE LANGUAGE TESTS/LOGIN </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="Online Language Tests">
    <meta name="keywords" content="Mock online">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="{{ asset('material') }}/css/material-dashboard-reg.css?v=2.1.1" rel="stylesheet" />

</head>

<body>

<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(m_page/images/register.jpeg); width:auto ; height: auto ; background-repeat: no-repeat "  data-stellar-background-ratio="0.1">
    <div class="overlay"></div>
    <div class="container">
        {!! app('captcha')->render($lang = null); !!}
        <div class="row justify-content-lg-start">
            <div class="col-md-4 py-md-5 px-md-7">
                <div class="py-md-5">
                    <div class="heading-section heading-section-black ftco-animate mb-2 text-left">
                        <div class="row">
                            <div class="col-10">
                                <a  href="/">
                                <i><img style="width:120px" src="{{ asset('material') }}/img/logo_m.png" ></i>
                                </a>
                            </div>
                        </div>
                        <h5 class="mb-12 text-right text-white text-center"><strong> WELCOME TO ONLINE LANGUAGE TESTS </strong></h5>
                        <hr>
                    </div>

                    <form method="POST" class="appointment-form ftco-animate" action="{{ route('login') }}">
                        @csrf


                        <div class="row">
                            <label class="col-sm-4 col-form-label-f text-white"> <strong> {{ __('نام کاربری') }} </strong> </label>
                        <div class="d-md-flex-r">
                            <div class="form-group">
                                <input id="email" type="email"  class="form-control  @error('email') is-invalid @enderror" name="email"  required autocomplete="email"  autofocus placeholder="">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 col-form-label-f text-white"> <strong> {{ __('رمز عبور') }} </strong> </label>
                        <div class="d-md-flex-r">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="" >

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                        <br>
                        <div class="row">
                        <div class="col-5">
                        @if (Route::has('password.request'))
                            <a class="btn-link_black" href="{{ route('password.request') }}">
                                <strong> {{ __('فراموشی رمز') }}   </strong>
                            </a>
                        @endif
                        </div>
                      <div class="col-3">
                        <a class="btn-link_black" href="{{ route('register') }}">
                            <strong> {{ __('ثبت نام') }}  </strong>
                        </a>
                      </div>
                    </div>
                        <br>
                        <div class="row">
                            <div class="col-3">
                            </div>
                            <div class="col-5">
                                <div class="d-md-flex-r">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-danger btn-round py-3 px-5">
                                            <strong> {{ __('ورود') }} </strong>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

                </form>

                </div>
            </div>
        </div>

        </div>

</section>
</body>
</html>
