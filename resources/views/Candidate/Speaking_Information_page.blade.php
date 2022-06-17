<!DOCTYPE html>
<html lang="en">
<head>
    <title>L-TESTS / Writing corrections service</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

</head>
<body style="background-color:white;">
<div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                            <div class="row">
                                <div class="card">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title">{{ __('Speaking Test ') }}</h4>
                                        <p class="card-category">{{ __('Confirm information') }}</p>
                                    </div>
                                    <div class="card-body ">
                                        <nav aria-label="breadcrumb" role="navigation">
                                            <ol class="breadcrumb">
                                                <button type="button" id="button1" class="btn btn-danger col-3">Information</button>
                                            </ol>
                                        </nav>
                                        <hr>
                                      @if($KIND==1)
                                        <div class="row">
                                            <div class="col">
                                                <label class="col-sm-12 col-form-label-f text-dark text-right" >کاربر گرامی :</label>
                                                <label class="col-sm-12 col-form-label-f text-dark text-right" > تاریخ آزمون Speaking شما به شرح زیر می باشد</label>
                                                <label class="col-sm-12 col-form-label-f text-dark text-right" >   تاریخ : {{$W_DAY}}-{{$SH_DATE}}  </label>
                                                <label class="col-sm-12 col-form-label-f text-dark text-right" >   ساعت : {{$T_TIME}} </label>
                                            </div>
                                        </div>
                                      @endif
                                      @if($KIND==2)
                                            <div class="row">
                                                <div class="col">
                                                    <label class="col-sm-12 col-form-label-f text-dark text-right" >کاربر گرامی :</label>
                                                    <label class="col-sm-12 col-form-label-f text-dark text-right" >  آزمون Speaking زیر توسط شما حذف گردید </label>
                                                    <label class="col-sm-12 col-form-label-f text-dark text-right" >   تاریخ : {{$W_DAY}}-{{$SH_DATE}}  </label>
                                                    <label class="col-sm-12 col-form-label-f text-dark text-right" >   ساعت : {{$T_TIME}} </label>
                                                    <label class="col-sm-12 col-form-label-f text-dark text-right" >   لطفا تاریخ و ساعت دیگری را جهت آزمون انتخاب نمایید </label>
                                                </div>
                                            </div>
                                        @endif


                                    </div>
                                    <div class="card-footer text-muted">
                                        <a href="{{ route('Dashboard') }}" class="btn btn-danger btn-round center">RETURN</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                </div>
            </div>
</body>
</html>

