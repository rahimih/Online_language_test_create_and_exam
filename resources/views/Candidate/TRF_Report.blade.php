<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>کارنامه</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />

</head>
<body>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9">
                    <div class="card">
            <div class="card-header card-header-icon card-header-rose">
                <div class="card-icon">
                    <i class="material-icons">content_copy</i>
                </div>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('TRF.print') }}" class="btn btn-sm btn-info">Print</a>
                    <a href="{{ route('TRF.pdf') }}" class="btn btn-sm btn-info">Pdf</a>
                    <a href="{{ route('TRF.email') }}" class="btn btn-sm btn-info">Email</a>
                    <a href="{{ route('TRF.index') }}" class="btn btn-sm btn-info">Return</a>
                </div>

            </div>

                <div class="row">
                <i><img style="width:120px" src="{{ asset('material') }}/img/logo_m.jpg"></i>
            </div>

            @foreach($ot_test_user_starts as $ot_test_users)
                <h3  class="card-title text-black">{{$ot_test_users->TYPE}} TEST  </h3>
                <p  style="text-align:left;" >Statement of Results </p>
                <p  style="text-align:left;" >{{$ot_test_users->SUBGROUP_TEST_NAME}} TRAINING  </p>
                <hr>

                    <div class="row">
                        <label class="col-sm-3 col-form-label text-dark">{{ __('CANDIDATE DETAIL') }}</label>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label class="col-sm-6 col-form-label text-dark">{{ __('FAMILY NAME') }}</label>
                        <input class="form-control text-info text-center" name="a4" id="input-a4" type="text" readonly="true" disabled="true" value=" {{ Auth::user()->lname }}"  />
                    </div>

                    <div class="col">
                        <label class="col-sm-6 col-form-label text-dark">{{ __('FIRST NAME') }}</label>
                        <input class="form-control text-info text-center" name="a5" id="input-a5" type="text"  readonly="true" disabled="true" value=" {{ Auth::user()->fname }}" />
                    </div>
                    <div class="col">
                        <label class="col-sm-6 col-form-label text-dark">{{ __('CANDIDATE ID') }}</label>
                        <input class="form-control text-info text-center" name="a6" id="input-a6" type="text"  readonly="true" disabled="true" value=" 000{{ Auth::user()->id }}" />
                    </div>
                    </div>
                    <div class="row">
                        <div class="col">
                        <label class="col-sm-6 col-form-label text-dark">{{ __('MOUDLE') }}</label>
                        <input class="form-control text-info text-center" name="a6" id="input-a6" type="text"  readonly="true" disabled="true" value=" {{$ot_test_users->SUBGROUP_TEST_NAME}}" />
                    </div>
                        <div class="col">
                        <label class="col-sm-6 col-form-label text-dark">{{ __('TEST TYPE') }}</label>
                        <input class="form-control text-info text-center" name="a6" id="input-a6" type="text"  readonly="true" disabled="true" value=" {{$ot_test_users->TYPE}}" />
                    </div>

                        <div class="col">
                        <label class="col-sm-6 col-form-label text-dark">{{ __('DATE') }}</label>
                        <input class="form-control text-info text-center" name="a3" id="input-a3" type="text"  readonly="true" disabled="true" value=" {{$ot_test_users->START_DATE}}" />
                    </div>
                    </div>

                    <hr>
                    <div class="row">
                        <label class="col-sm-3 col-form-label">{{ __('TEST RESULTS') }}</label>
                    </div>
                    <div class="row">
                    @foreach($ot_user_answer_skills as $ot_user_answer_s)
                            <div class="col">
                            <label class="col-6 col-form-label text-dark">{{$ot_user_answer_s->SKILL_TYPE}}  </label>
                            <div class="col-3 text-right">
                            <input class="form-control text-info text-center" name="7a" id="input-a7"  type="text" readonly="true" disabled="true" value=" {{$ot_user_answer_s->GRADE}}"  />
                            </div>
                            </div>
                    @endforeach
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                        <label class="col-6 col-form-label text-dark">{{ __('overall band score') }}</label>
                        <div class="col-3 text-right">
                          <input class="form-control text-info text-center" name="a8" id="input-a8" type="text"  readonly="true" disabled="true" value=" {{$ot_test_users->OEVRALL_SCORE}}" />
                        </div>
                    </div>
                    <div class="col">
                        <label class="col-6 col-form-label text-dark">{{ __('CEFR Level') }}</label>
                        <div class="col-3 text-right">
                        <input class="form-control text-info text-center" name="a9" id="input-a9" type="text"  readonly="true" disabled="true" value=" {{$ot_test_users->CEFR_LEVEL}}" />
                        </div>
                    </div>
                    </div>
                    <hr>
                   @endforeach

                <hr>
                <div class="row">
                    <div class="col">
                        <label class="col-6 col-form-label text-dark">{{ __('LISTENING') }}</label>
                        <div class="table-responsive">
                            <table class="table table-striped w-auto text-center">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        PART NAME
                                    </th>
                                    <th>
                                        CORRECT ANSWERS
                                    </th>
                                    <th>
                                        QUESTIONS
                                    </th>

                                </tr></thead>
                                <tbody>

                                @foreach($ot_user_answers_packages1 as $user_answers_packages1)
                                    @if($user_answers_packages1->skill_id==1)
                            <tr>
                                <td>{{$user_answers_packages1['parts_name']}}</td>
                                <td>{{$user_answers_packages1['c1']}}</td>
                                <td>{{$user_answers_packages1['ts']}}</td>

                            </tr>
                                   @endif
                            @endforeach
                            </tbody>
                            </table>
                    </div>


                </div>
                    <div class="col">
                        <label class="col-6 col-form-label text-dark">{{ __('READING') }}</label>
                        <div class="table-responsive">
                            <table class="table table-striped w-auto text-center">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        PART NAME
                                    </th>
                                    <th>
                                        CORRECT ANSWERS
                                    </th>
                                    <th>
                                        QUESTIONS
                                    </th>

                                </tr></thead>
                                <tbody>

                                @foreach($ot_user_answers_packages1 as $user_answers_packages1)
                                    @if($user_answers_packages1->skill_id==2)
                                        <tr>
                                            <td>{{$user_answers_packages1['parts_name']}}</td>
                                            <td>{{$user_answers_packages1['c1']}}</td>
                                            <td>{{$user_answers_packages1['ts']}}</td>

                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">

                        {!! $chart_a->container() !!}

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                        {!! $chart_a->script() !!}
                    </div>
                    <div class="col">

                        {!! $chart_b->container() !!}

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                        {!! $chart_b->script() !!}
                    </div>
                </div>
                <hr>

                <div class="row">
                    <div class="col">
                        <label class="col-6 col-form-label text-dark">{{ __('LISTENING') }}</label>
                        <div class="table-responsive">
                            <table class="table table-striped w-auto text-center">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        PART NAME
                                    </th>
                                    <th>
                                        QUESTION TYPE
                                    </th>
                                    <th>
                                        CORRECT ANSWERS
                                    </th>

                                </tr></thead>
                                <tbody>

                                @foreach($ot_user_answers_packages2 as $user_answers_packages2)
                                    @if($user_answers_packages2->skill_id==1)
                                        <tr>
                                            <td>{{$user_answers_packages2['parts_name']}}</td>
                                            <td>{{$user_answers_packages2['QUESTIONS_TYPE']}}</td>
                                            <td>{{$user_answers_packages2['c2']}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="col">
                        <label class="col-6 col-form-label text-dark">{{ __('READING') }}</label>
                        <div class="table-responsive">
                            <table class="table table-striped w-auto text-center">
                                <thead class=" text-primary">
                                <tr>
                                    <th>
                                        PART NAME
                                    </th>
                                    <th>
                                        QUESTION TYPE
                                    </th>
                                    <th>
                                        CORRECT ANSWERS
                                    </th>

                                </tr></thead>
                                <tbody>

                                @foreach($ot_user_answers_packages2 as $user_answers_packages2)
                                    @if($user_answers_packages2->skill_id==2)
                                        <tr>
                                            <td>{{$user_answers_packages2['parts_name']}}</td>
                                            <td>{{$user_answers_packages2['QUESTIONS_TYPE']}}</td>
                                            <td>{{$user_answers_packages2['c2']}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col">

                        {!! $chart_c->container() !!}

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                        {!! $chart_c->script() !!}
                    </div>
                    <div class="col">

                        {!! $chart_d->container() !!}

                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                        {!! $chart_d->script() !!}
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</body>

