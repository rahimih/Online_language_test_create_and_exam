@extends('layouts.I_app', ['activePage' => 'My applicant results', 'titlePage' => __('My applicant results')])
@section('content')
    <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">My applicant results </h4>
                        <p class="card-category"> Here you can view applicant results</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2 text-right">
                                <input type="text" name="search" value="" class="form-control justify-content-end " placeholder="Search...">
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped w-auto text-center">
                                <thead class=" text-primary">
                                <tr><th>
                                        CANDIDATE ID
                                    </th>
                                    <th>
                                        CANDIDATE NAME
                                    </th>
                                    <th>
                                        AGE
                                    </th>
                                    <th>
                                        MAIN TEST
                                    </th>
                                    <th>
                                        SUBGROUP NAME
                                    </th>
                                    <th class="text-right">
                                        Actions
                                    </th>

                                </tr></thead>
                                <tbody>
                                @foreach($ot_uers_introduces_codes as $uers_introduces_codes)
                                    <tr>
                                        <td>{{$uers_introduces_codes['id']}}</td>
                                        <td>{{$uers_introduces_codes['fname']}} {{$uers_introduces_codes['lname']}}</td>
                                        <td>{{$uers_introduces_codes['age']}}</td>
                                        <td>{{$uers_introduces_codes['TYPE']}}</td>
                                        <td>{{$uers_introduces_codes['SUBGROUP_TEST_NAME']}}</td>

                                        <td>
                                        <td class="td-actions text-left">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtUuerIntroducesCodeController@show', [$uers_introduces_codes['id'],$uers_introduces_codes['MAIN_TEST_ID'],$uers_introduces_codes['SUBGROUP_TEST_ID']])}}" data-original-title="Chart" title="Chart">
                                                <i class="material-icons">leaderboard</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
