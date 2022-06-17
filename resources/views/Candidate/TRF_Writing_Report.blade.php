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
                    <a href="{{ route('WRITING_SERVICES.print') }}" class="btn btn-sm btn-info">Print</a>
                    <a href="{{ route('WRITING_SERVICES.pdf') }}" class="btn btn-sm btn-info">Pdf</a>
                    <a href="{{ route('WRITING_SERVICES.email') }}" class="btn btn-sm btn-info">Email</a>
                    <a href="{{ route('WRITING_SERVICES.index_c') }}" class="btn btn-sm btn-info">Return</a>
                </div>

            </div>

            <div class="row">
                <i><img style="width:120px" src="{{ asset('material') }}/img/logo_m.jpg"></i>
            </div>

            @foreach($ot_test_user_starts as $ot_test_users)
                <h3  class="card-title text-black">{{$ot_test_users->TYPE}} Service  </h3>
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
                        <label class="col-sm-3 col-form-label text-dark">{{ __('TEST RESULTS') }}</label>
                    </div>
            @endforeach
              <div class="row">
                  <div class="col">
                <div class="table-responsive">
                    <table class="table table-striped w-auto text-center">
                        <thead class=" text-primary">
                        <tr>
                            <th>
                                Level Name
                            </th>
                            <th>
                                Band
                            </th>
                </tr></thead>
                <tbody>
                @foreach($ot_skill_level_grades as $skill_level_grades)
                    <tr>
                        <td>{{$skill_level_grades->level_name}}</td>
                        <td>{{$skill_level_grades->GRADE}}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
                </div>
                  </div>
                      <div class="col-6">
                          <div class="chart-container" style="position: relative; height:40vh; width:30vw">
                              {!! $chart_w->container() !!}
                          </div>

                          <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

                          {!! $chart_w->script() !!}
                      </div>
                  </div>
                    <hr>
             @foreach($ot_writing_corections_files as $writing_corections_files)
                    <div class="row">
                        <div class="col-7">
                        <label class=" col-form-label text-info">{{ __('Estimated Band Score:') }}  {{$writing_corections_files->GRADE}} </label>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-8">
                        <label class="col-8 col-form-label text-dark">{{ __('Comments:') }}</label>
                        </div>
                        </div>
                    <div class="row">
                        <div class="col-8">
                        <label class="col-sm-8 col-form-label text-info">{{$writing_corections_files->COMMENTS}}</label>
                        </div>
                    </div>
            @endforeach
                    <hr>

             @foreach($ot_skill_level_grades as $skill_level_grades)
                    <div class="row">
                        <div class="col-8">
                        <label class="col-sm-8 col-form-label text-dark">{{$skill_level_grades->level_name}} : {{$skill_level_grades->GRADE}} </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                        <label class="col-sm-8 col-form-label text-info">{{$skill_level_grades->COMMENT}}</label>
                        </div>
                    </div>
                    <hr>
                @endforeach

            </div>
        </div>
    </div>
            </div>
        </div>
    </div>
</body>

