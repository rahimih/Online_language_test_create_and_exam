@extends('layouts.I_app', ['activePage' => 'My Referrals', 'titlePage' => __('My Referrals')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">My Referral Users</h4>
                            <p class="card-category"> Here you can view Referral Users</p>
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
                                    <tr>
                                        <th>
                                            MAIN TEST
                                        </th>
                                        <th>
                                            SUBGROUP NAME
                                        </th>
                                        <th>
                                            COUNT
                                        </th>

                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_uers_introduces_codes as $uers_introduces_codes)
                                        <tr>
                                            <td>{{$uers_introduces_codes['TYPE']}}</td>
                                            <td>{{$uers_introduces_codes['SUBGROUP_TEST_NAME']}}</td>
                                            <td>{{$uers_introduces_codes['cn']}}</td>
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
