<!DOCTYPE html>
<html lang="en">
<head>
    <title>ANSWER SHEET</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token()}}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
{{--    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />--}}

</head>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
{{--                <form method="post"  id="regForm" action="{{route('Test_Start.store_l') }}" autocomplete="off" class="form-horizontal">--}}
{{--                    @csrf--}}
{{--                    @method('POST')--}}

                    <div class="row">
                        <div class="card">
                            <div class="card-body">

                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"></h4>
                                    </div>
                                    <div class="card-body">
                                        <i><img style="width:120px" src="{{ asset('material') }}/img/logo_m.jpg"></i>
                                        <div class="row">
                                        <table border="2" cellpadding="2" cellspacing="2" style="height:62px; width:700px">
                                            <tbody>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                        </div>

                                        <h4 style="text-align:center">{{ ('Listening and Reading Answer Sheet') }}</h4>
                                        <hr />

                                        <div class="row">
                                            <h5>{{ __('Centre number:') }}</h5>
                                        </div>

                                        <div class="row">
                                            <h5>{{ __('Full Name:') }}</h5>
                                             &nbsp;&nbsp;&nbsp;&nbsp;
                                                <h5>  {{ Auth::user()->fname }}  {{ Auth::user()->lname }} </h5>
                                        </div>

                                        <div class="row">
                                            <h5>{{ __('Test Date:') }}</h5>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <h5>  {{$cdate}}  </h5>
                                        </div>

                                        <div class="row">
                                            <h5>{{ __('Day') }}</h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        @for($i=1;$i<=31;$i++)
                                                <label for="d{{$i}}">{{$i}}</label> &nbsp;&nbsp;
                                            @endfor
                                        </div>

                                        <div class="row">
                                            <h5>{{ __('Month') }}</h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @for($i=1;$i<=12;$i++)
                                                <label for="m{{$i}}">{{$i}}</label> &nbsp;&nbsp;
                                            @endfor

                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <h5>{{ __('Year') }}</h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            @for($i=20;$i<=30;$i++)
                                                <label for="y{{$i}}">{{$i}}</label> &nbsp;&nbsp;
                                            @endfor
                                        </div>

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header card-header-warning">
                                        <h4 class="card-title text-center"> Listening  </h4>
                                    </div>
                                    <div class="card-body">
                                        <table align="left" border="2" cellpadding="2" cellspacing="2" style="width:700px">
                                            <tbody>
                                            @for($i=1;$i<=$j;$i++)
                                            <tr>
                                                <td style="text-align:center">
                                                    <h5>{{$i}}</h5>
                                                </td>
                                                <td>
                                                    <div class="col-12 text-right">
                                                        <input type="text" name=QL{{$j}}  value="" class="form-control">
                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    &#10003; {{$i}}  X
                                                </td>
                                                <td style="text-align:center">
                                                    <h5>{{$i+20}}</h5>

                                                </td>
                                                <td>
                                                    <div class="col-12 text-right">
                                                        <input type="text" name=QL{{$i+20}}  value="" class="form-control">
                                                    </div>
                                                </td>
                                                <td style="text-align:center">
                                                    &#10003; {{$i+20}}  X
                                                </td>
                                            </tr>
                                            @endfor
                                            </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="card text-right">
                                    <div class="card-body">
                                    <button type="button" class="btn btn-warning">Submit</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>



                               </div>
                            </div>
                        </div>
                    </div>
{{--                </form>--}}
</body>
</html>
