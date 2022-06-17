<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <title> ONLINE LANGUAGE TESTS/LOGIN </title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="description" content="Online Language Tests">
    <meta name="keywords" content="Mock online">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <link rel="stylesheet" href="m_page/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="m_page/css/animate.css">
    <link rel="stylesheet" href="m_page/css/style.css">

</head>

<body>
<section class="ftco-section ftco-consult ftco-no-pt ftco-no-pb" style="background-image: url(m_page/images/register.jpeg);" data-stellar-background-ratio="0.1">
    <div class="overlay"></div>
    <div class="container">

        <div class="row justify-content-lg-start">

            <div class="col-md-3 py-md-5 px-md-7">
                <div class="py-md-5">
                    <div class="heading-section heading-section-black ftco-animate mb-2 text-left">
                        <h6 class="mb-12 text-right text-white text-center"><strong> WELCOME TO ONLINE LANGUAGE TESTS </strong></h6>
                        <h3 class="mb-4 text-right text-black"><strong>فراموشی رمز عبور </strong></h3>
                    </div>

                    <form method="POST" class="appointment-form ftco-animate" action="{{ route('profiles.reset') }}">
                        @csrf

                        <div class="row">
                            <label class="col-sm-4 col-form-label text-white"> <strong> {{ __(' تلفن همراه') }} </strong> </label>
                        <div class="d-md-flex">
                            <div class="form-group">
                                <input id="mobile" type="mobile"  class="form-control  @error('mobile') is-invalid @enderror" name="mobile"  required autocomplete="mobile"  autofocus placeholder="">

                                @error('mobile')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>
                        </div>


                        <div class="d-md-flex">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary py-3 px-5">
                                    <strong> {{ __('ارسال کد') }} </strong>
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>

        </div>

</section>

<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="m_page/js/jquery.min.js"></script>
<script src="m_page/js/jquery-migrate-3.0.1.min.js"></script>
<script src="m_page/js/bootstrap.min.js"></script>
<script src="m_page/js/jquery.easing.1.3.js"></script>
<script src="m_page/js/jquery.waypoints.min.js"></script>
<script src="m_page/js/jquery.stellar.min.js"></script>
<script src="m_page/js/owl.carousel.min.js"></script>
<script src="m_page/js/aos.js"></script>
<script src="m_page/js/scrollax.min.js"></script>
<script src="m_page/js/main.js"></script>

</body>
</html>
