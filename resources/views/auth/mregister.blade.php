<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <title> ONLINE LANGUAGE TESTS/REGISTER USER </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="Online Language Tests">
    <meta name="keywords" content="Mock online">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

</head>

<body>
<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(m_page/images/register.jpeg);" data-stellar-background-ratio="0.1">
    <div class="overlay"></div>
    <div class="container">
        {!! app('captcha')->render($lang = null); !!}
        <div class="row justify-content-center">
            <div class="col-md-4 py-2 px-md-7">
                <div class="py-md-5">
                    <div class="heading-section heading-section-white ftco-animate mb-2 text-center">
                        <div class="row">
                            <div class="col-8">
                                <a  href="/">
                                    <i><img style="width:120px" src="{{ asset('material') }}/img/logo_m.png" href="/" ></i>
                                </a>
                            </div>
                        </div>
                        <h5 class="mb-12 text-right text-white text-center"><strong> WELCOME TO ONLINE LANGUAGE TESTS </strong></h5>
{{--                        <h5 class="mb-4 text-right text-black"><strong>مشخصات کاربر </strong></h5>--}}
                    </div>
                    <form method="post" class="appointment-form ftco-animate" action="{{ route('register') }}" >
                        @csrf


                        <div class="card text-center">
                            <div class="card-header card-header-danger">
                                <h4 class="card-title">Register</h4>
                            </div>
                     <div class="card-body text-center">

                        @if (Session::has('error'))
                        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                            <strong> {!! session()->get('error') !!} </strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        @endif

                        <div class="row">
                        <div class="col-5">
                        <label class="col-sm-3 col-form-label-f text-black"> <strong> {{ __('نام') }} </strong> </label>
                        </div>
                        <div class="col-5">
                        <div class="d-md-flex text-black">
                            <div class="form-group">
                                <input id="fname"  type="text"  class="form-control  @error('fname') is-invalid @enderror" name="fname" value="{{ old('fname') }}" required autocomplete="First Name" autofocus placeholder="نام">

                                @error('fname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-5">
                        <label class="col-sm-3 col-form-label-f text-black"> <strong> {{ __('فامیل') }} </strong> </label>
                        </div>
                        <div class="col-5">
                        <div class="d-md-flex text-black">
                            <div class="form-group">
                                <input id="lname"  type="text" class="form-control  @error('lname') is-invalid @enderror" name="lname" value="{{ old('lname') }}" required autocomplete="Last Name" autofocus placeholder="نام خانوادگی">

                                @error('lname')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-5">
                         <label class="col-sm-3 col-form-label-f text-black"> <strong> {{ __('سن') }} </strong> </label>
                        </div>
                        <div class="col-5">
                        <div class="d-md-flex text-black">
                            <div class="form-group">
                                <input id="age"  type="number"  min="10"  max="99"   class="form-control  @error('age') is-invalid @enderror" name="age" value="{{ old('age') }}" required  autofocus placeholder="سن">
                                @error('age')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-5">
                        <label class="col-sm-3 col-form-label-f text-black"> <strong> {{ __('نام کاربری') }} </strong> </label>
                        </div>
                        <div class="col-5">
                        <div class="d-md-flex text-black">
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="Email Adress" autofocus placeholder="نام کاربری / ایمیل">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-5">
                        <label class="col-sm-3 col-form-label-f text-black"> <strong> {{ __('موبایل') }} </strong> </label>
                        </div>
                        <div class="col-5">
                        <div class="d-md-flex text-black">
                            <div class="form-group">
                                <input id="Mobile" type="tel" class="form-control @error('Mobile') is-invalid @enderror" name="Mobile" value="{{ old('Mobile') }}" required autocomplete="Mobile" autofocus placeholder="موبایل">

                                @error('Mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-5">
                        <label class="col-sm-3 col-form-label-f text-black"> <strong> {{ __('کد معرف') }} </strong> </label>
                        </div>
                        <div class="col-5">
                        <div class="d-md-flex text-black">
                            <div class="form-group">
                                <input id="token" type="text" maxlength="6" class="form-control @error('token') is-invalid @enderror" name="token" pattern="[A-Za-z]{2}[0-9]{4}"   value="{{ old('token') }}"  autofocus placeholder="کد معرف">

                                @error('token')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ 'توکن وارد شده اشتباه هست' }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-5">
                        <label class="col-sm-3 col-form-label-f text-black"> <strong> {{ __('رمز عبور') }} </strong> </label>
                        </div>
                        <div class="col-5">
                        <div class="d-md-flex text-black">
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="رمز عبور">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="row">
                        <div class="col-5">
                        <label class="col-sm-3 col-form-label-f text-black"> <strong> {{ __('تکرار رمز') }} </strong> </label>
                        </div>
                        <div class="col-5">
                        <div class="d-md-flex text-black">
                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required  placeholder="تکرار رمز عبور">

                            </div>
                        </div>
                        </div>
                        </div>

                        <div class="d-md-flex text-black">
                            <div class="form-group ml-md-4">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit"  class="btn btn-danger btn-round py-3 px-7">
                                        {{ __('تایید و ثبت اطلاعات') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                     </div>
                     </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
