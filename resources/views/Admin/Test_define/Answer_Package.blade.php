<!DOCTYPE html>
<html lang="en">
<head>
    <title>ANSWER PACKAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
{{--    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />--}}

</head>
<body>
@switch($kind)
@case(1)
   <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="{{action('OtQuestionsPackagesController@answers',$id)}}" autocomplete="off" class="form-horizontal">
                    @csrf
                    @method('POST')
                    <div class="row">
                        <div class="card">
                            <div class="card-body">
                                <div class="card">
                                    <div class="card-header">
                                        <h4 class="card-title"></h4>
                                    </div>
                                    <div class="card-body">
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
                                        <i><img style="width:120px" src="{{ asset('material') }}/img/logo_m.jpg"></i>
                                        <h4 style="text-align:center"><strong> {{$ot_questions_packages['SKILL_TYPE']}} {{ (' ANSWER SHEET') }} </strong></h4>
                                        <h4 style="text-align:left"> <strong> {{$ot_questions_packages['QUESTIONS_PACKAGES_NAME']}} / {{$ot_questions_packages['TYPE']}} / {{$ot_questions_packages['SUBGROUP_TEST_NAME']}}  </strong> </h4>
                                        <hr />

                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-header card-header-info">
                                        <h4 class="card-title text-center"> {{$ot_questions_packages['SKILL_TYPE']}}  </h4>
                                    </div>

                                    <div class="card-body">
                                        <table align="left" border="2" cellpadding="2" cellspacing="2" style="width:1200px">
                                            <thead class=" text-primary">
                                            <tr><th>
                                                    QUESTION NUMBER
                                                </th>
                                                <th>
                                                    ANSWER1
                                                </th>
                                                <th>
                                                    ANSWER2
                                                </th>
                                                <th>
                                                    ANSWER3
                                                </th>
                                                <th>
                                                    QUESTION NUMBER
                                                </th>
                                                <th>
                                                    ANSWER1
                                                </th>
                                                <th>
                                                    ANSWER2
                                                </th>
                                                <th>
                                                    ANSWER3
                                                </th>
                                                 </tr></thead>

                                            <tbody>
                                            @for ($i = 1; $i <= $j; $i++)
                                            <tr>
                                                <td style="text-align:center">
                                                    <h5>{{$i}}</h5>
                                                </td>
                                                <td>
                                                    <div class="col-12 text-right">
                                                        <input type="text" name=QL1_{{$i}}  value="" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-12 text-right">
                                                        <input type="text" name=QL2_{{$i}}  value="" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-12 text-right">
                                                        <input type="text" name=QL3_{{$i}}  value="" class="form-control">
                                                    </div>
                                                </td>

                                                <td style="text-align:center">
                                                    <h5>{{$i+$j}}</h5>

                                                </td>
                                                <td>
                                                    <div class="col-12 text-right">
                                                        <input type="text" name=QL1_{{$i+$j}}  value="" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-12 text-right">
                                                        <input type="text" name=QL2_{{$i+$j}}  value="" class="form-control">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="col-12 text-right">
                                                        <input type="text" name=QL3_{{$i+$j}}  value="" class="form-control">
                                                    </div>
                                                </td>

                                            </tr>
                                        @endfor
                                      </tbody>
                                        </table>

                                    </div>
                                </div>

                                <div class="card text-right">
                                    <div class="card-body">
                                    <button type="submit" class="btn btn-info">Submit</button>
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
@break
@case(2)
   <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="{{action('OtQuestionsPackagesController@update_answer',$id)}}" autocomplete="off" class="form-horizontal">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title"></h4>
                                        </div>
                                        <div class="card-body">
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

                                            <i><img style="width:120px" src="{{ asset('material') }}/img/logo_m.jpg"></i>
                                                <h4 style="text-align:center"><strong> {{$ot_questions_packages['SKILL_TYPE']}} {{ (' ANSWER SHEET') }} </strong></h4>
                                             <h4 style="text-align:left"> <strong> {{$ot_questions_packages['QUESTIONS_PACKAGES_NAME']}} / {{$ot_questions_packages['TYPE']}} / {{$ot_questions_packages['SUBGROUP_TEST_NAME']}}  </strong> </h4>
                                            <hr />

                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header card-header-info">
                                            <h4 class="card-title text-center"> {{$ot_questions_packages['SKILL_TYPE']}}  </h4>
                                        </div>
                                        <div class="card-body">
                                            <table align="left" border="2" cellpadding="2" cellspacing="2" style="width:1200px">
                                                <thead class=" text-primary">
                                                <tr><th>
                                                        QUESTION NUMBER
                                                    </th>
                                                    <th>
                                                        ANSWER1
                                                    </th>
                                                    <th>
                                                        ANSWER2
                                                    </th>
                                                    <th>
                                                        ANSWER3
                                                    </th>
                                                </tr></thead>

                                                <tbody>
{{--                                                @for($i=1;$i<=$j;$i++)--}}
                                                    @php
                                                      $i=1;
                                                    @endphp
                                                    @foreach($ot_answers_package as $answers_package)
                                                        <tr>
                                                            <td style="text-align:center">
                                                                <h5>{{$i}}</h5>
                                                            </td>
                                                            <td>
                                                                <div class="col-12 text-right">
                                                                    <input class="form-control"  type="text"  value="{{$answers_package->ANSWER}}"  name=QL1_{{$i}} >
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-12 text-right">
                                                                    <input class="form-control"  type="text"  value="{{$answers_package->ANSWER2}}"  name=QL2_{{$i}} >
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-12 text-right">
                                                                    <input class="form-control"  type="text"  value="{{$answers_package->ANSWER3}}"  name=QL3_{{$i}} >
                                                                </div>
                                                            </td>


{{--
                                                            <td style="text-align:center">
                                                                <h5>{{$i+$j}}</h5>

                                                            </td>
                                                            <td>
                                                                <div class="col-12 text-right">
                                                                    <input class="form-control"  type="text"  value="{{$answers_package->ANSWER3}}"  name=QL1_{{$i+$j}} >
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-12 text-right">
                                                                    <input class="form-control"  type="text"  value="{{$answers_package->ANSWER3}}"  name=QL2_{{$i+$j}} >
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <div class="col-12 text-right">
                                                                    <input class="form-control"  type="text"  value="{{$answers_package->ANSWER3}}"  name=QL3_{{$i+$j}} >
                                                                </div>
                                                            </td>
--}}
                                                        </tr>
                                                        @php
                                                            $i=$i+1;
                                                        @endphp
                                                    @endforeach
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>

                                    <div class="card text-right">
                                        <div class="card-body">
                                            <button type="submit" class="btn btn-info">Submit</button>
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
@break
@endswitch
</body>
</html>
