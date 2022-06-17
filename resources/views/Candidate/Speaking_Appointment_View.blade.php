@extends('layouts.C_app', ['activePage' => 'Tests', 'titlePage' => __('Speaking Appointment')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Speaking Appointment</h4>
                            <p class="card-category"> Here you can manage Speaking Appointment</p>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-2 text-right">
                                    <input type="text" name="search" value="" class="form-control justify-content-end " placeholder="Search...">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped w-auto">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            ردیف
                                        </th>
                                        <th>
                                            نام آزمون
                                        </th>
                                        <th>
                                            نام موسسه
                                        </th>
                                        <th>
                                          نوع آزمون
                                        </th>
                                        <th>
                                            تاریخ آزمون (میلادی)
                                        </th>
                                        <th>
                                            تاریخ آزمون (شمسی)
                                        </th>
                                        <th>
                                            ساعت آزمون
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>

                                    @foreach($ot_speaking_appointments as $speaking_appointments)
                                        <tr>
                                            <td>{{$speaking_appointments['APPOINTMENT_ID']}}</td>
                                            <td>{{$speaking_appointments['TESTS_NAME']}}</td>
                                            <td>{{$speaking_appointments['INSTITUTE_NAME']}}</td>
                                            <td>{{$speaking_appointments['TYPE']}} / {{$speaking_appointments['SUBGROUP_TEST_NAME']}}</td>
                                            <td>{{$speaking_appointments['TAKEN_DATE']}}</td>
                                            <td>{{$speaking_appointments['DAY_OF_WEEK']}}-{{$speaking_appointments['TAKEN_DATE_SH']}}</td>
                                            <td>{{$speaking_appointments['TAKEN_TIME']}}</td>
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtTestUserStartController@edit', $speaking_appointments['APPOINTMENT_ID'])}}" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>

                                            <td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtTestUserStartController@edit', $speaking_appointments['APPOINTMENT_ID'])}}" data-original-title="" title="">
                                                    <i class="material-icons">check_circle</i>
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
