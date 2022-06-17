@extends('layouts.C_app', ['activePage' => 'Test Report', 'titlePage' => __('کارنامه')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">کارنامه</h4>
                            <p class="card-category">مشاهده کارنامه های آزمون</p>
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
                                            نمره کل
                                        </th>
                                        <th>
                                            سطح
                                        </th>
                                        <th>

                                        </th>
                                        <th class="text-right">
                                            عملیات
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_test_user_starts as $ot_test_user)
                                        <tr>
                                            <td>{{$ot_test_user['ID']}}</td>
                                            <td>{{$ot_test_user['TESTS_NAME']}}</td>
                                            <td>{{$ot_test_user['INSTITUTE_NAME']}}</td>
                                            <td>{{$ot_test_user['TYPE']}}</td>
                                            <td>{{$ot_test_user['SUBGROUP_TEST_NAME']}}</td>
                                            <td>{{$ot_test_user['START_DATE']}}</td>
                                            <td>{{$ot_test_user['START_TIME']}}</td>
                                            <td>{{$ot_test_user['OEVRALL_SCORE']}}</td>
                                            <td>{{$ot_test_user['CEFR_LEVEL']}}</td>
                                            <td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtUserAnswerSkillController@Report', $ot_test_user['ID'])}}" data-original-title="" title="">
                                                    <i class="material-icons">edit</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>
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
