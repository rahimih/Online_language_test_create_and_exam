@extends('layouts.C_app', ['activePage' => 'Result Test', 'titlePage' => __('کارنامه تعیین سطح')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">کارنامه</h4>
                            <p class="card-category"> مشاهده کارنامه های آزمون تعیین سطح</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 text-right">
                                    <input type="text" name="search" value="" class="form-control justify-content-end " placeholder="جستجو...">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped w-auto">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            ردیف
                                        </th>
                                        <th>
                                            نام تست
                                        </th>
                                        <th>
                                            نام موسسه
                                        </th>
                                        <th>
                                            گروه تست
                                        </th>
                                        <th>
                                            زیر گروه تست
                                        </th>
                                        <th>
                                             تاریخ
                                        </th>
                                        <th>
                                            ساعت
                                        </th>
                                        <th>
                                           تعداد سوالات صحیح
                                        </th>
                                        <th>
                                            سطح
                                        </th>
                                        <th>

                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_test_user_starts as $ot_test_user)
                                        <tr>
                                            <td>{{$num}}</td>
                                            <td>{{$ot_test_user['TESTS_NAME']}}</td>
                                            <td>{{$ot_test_user['INSTITUTE_NAME']}}</td>
                                            <td>{{$ot_test_user['TYPE']}}</td>
                                            <td>{{$ot_test_user['SUBGROUP_TEST_NAME']}}</td>
                                            <td>{{$ot_test_user['START_DATE']}}</td>
                                            <td>{{$ot_test_user['START_TIME']}}</td>
                                            <td>{{$ot_test_user['CORRECT_ANSWER']}}</td>
                                            <td>{{$ot_test_user['CEFR_LEVEL']}}</td>
                                        </tr>

                                        @php
                                            $num=$num+1;
                                        @endphp

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
