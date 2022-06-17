@extends('layouts.C_app', ['activePage' => 'Results', 'titlePage' => __('لیست فایل های ارسالی جهت تصحیح رایتینگ')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">لیست فایل های ارسالی</h4>
                            <p class="card-category">مشاهده فایل های ارسالی و نتایج</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 text-right">
                                    <input type="text" name="search" value="" class="form-control justify-content-end " placeholder="جستجو...">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped w-auto text-center">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            ردیف
                                        </th>
                                        <th>
                                            نام تست
                                        </th>
                                        <th>
                                            گروه تست
                                        </th>
                                        <th>
                                             زیر گروه تست
                                        </th>
                                        <th>
                                            پارت
                                        </th>
                                        <th>
                                            تاریخ ارسال
                                        </th>
                                        <th>
                                            نمره کل
                                        </th>

                                        <th class="text-left">
                                            عملیات
                                        </th>

                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_writing_corections_files as $writing_corections_files)
                                        <tr>
                                            <td>{{$writing_corections_files['WRITING_FILES_ID']}}</td>
                                            <td>{{$writing_corections_files['TESTS_NAME']}}</td>
                                            <td>{{$writing_corections_files['TYPE']}}</td>
                                            <td>{{$writing_corections_files['SUBGROUP_TEST_NAME']}}</td>
                                            <td>{{$writing_corections_files['PARTS_NAME']}}</td>
                                            <td>{{$writing_corections_files['SEND_DATE']}}</td>
                                            <td>{{$writing_corections_files['GRADE']}}</td>
                                     <td>
                                        <td class="td-actions text-center">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtWritingCorectionsFileController@download_files', $writing_corections_files['WRITING_FILES_ID'])}}" data-original-title="دانلود فایل" title="دانلود فایل">
                                                <i class="material-icons">download</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                     </td>
                                    <td>
                                    <td class="td-actions text-center">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtWritingCorectionsFileController@Resaults', $writing_corections_files['WRITING_FILES_ID'])}}" data-original-title="مشاهده کارنامه" title="مشاهده کارنامه">
                                                    <i class="material-icons">article</i>
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
