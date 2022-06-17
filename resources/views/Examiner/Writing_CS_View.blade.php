@extends('layouts.E_app', ['activePage' => 'Writing Corrected List', 'titlePage' => __('Writing Corrected List')])
@section('content')
@switch($return)
@case(1)
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Writing Corrected View</h4>
                            <p class="card-category"> Here you can view Writing files</p>
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
                                            ID
                                        </th>
                                        <th>
                                            CANDIDATE NAME
                                        </th>
                                        <th>
                                            MAIN TEST
                                        </th>
                                        <th>
                                            SUBGROUP NAME
                                        </th>
                                        <th>
                                            PARTS NAME
                                        </th>
                                        <th>
                                            SEND DATE
                                        </th>
                                        <th>
                                            SEND TIME
                                        </th>
                                        <th>
                                            GRADE
                                        </th>

                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_writing_corections_files as $writing_corections_files)
                                        <tr>
                                            <td>{{$writing_corections_files['WRITING_FILES_ID']}}</td>
                                            <td>{{$writing_corections_files['fname']}} {{$writing_corections_files['lname']}}</td>
                                            <td>{{$writing_corections_files['TYPE']}}</td>
                                            <td>{{$writing_corections_files['SUBGROUP_TEST_NAME']}}</td>
                                            <td>{{$writing_corections_files['PARTS_NAME']}}</td>
                                            <td>{{$writing_corections_files['CORRECTION_SEND_DATE']}}</td>
                                            <td>{{$writing_corections_files['CORRECTION_SEND_TIME']}}</td>
                                            <td>{{$writing_corections_files['GRADE']}}</td>

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
@break
@case(2)
<br>
<br>
<br>
<div class="col-md-8 ml-auto mr-auto">
    <div class="card">
        <div class="card-header card-header-primary">
            <h4 class="card-title text-center">Information</h4>
        </div>
        <div class="card-body text-center">
            <h5t> Dear Examiner </h5t>
            <br>
            <h5t> You do not have access to this part. </h5t>
        </div>
    </div>
</div>
@break
@endswitch
@endsection
