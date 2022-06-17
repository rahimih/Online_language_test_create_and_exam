@extends('layouts.A_app', ['activePage' => 'Institute', 'titlePage' => __('Institute')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Institute</h4>
                            <p class="card-category"> Here you can manage Institute</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Institute.create') }}" class="btn btn-sm btn-primary">Add Institute</a>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2 text-right">
                                    <input type="text" name="search" value="" class="form-control justify-content-end " placeholder="Search...">
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table table-striped w-auto">
                                    <thead class=" text-primary">
                                    <tr><th>
                                            ID
                                        </th>
                                        <th>
                                             NAME
                                        </th>
                                        <th>
                                             CODE
                                        </th>
                                        <th>
                                            MANAGER
                                        </th>
                                        <th>
                                            ADDRESS
                                        </th>
                                        <th>
                                            PHONE
                                        </th>
                                        <th>
                                            MOBILE
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_institute_names as $institute)
                                        <tr>
                                            <td>{{$institute['ID']}}</td>
                                            <td>{{$institute['INSTITUTE_NAME']}}</td>
                                            <td>{{$institute['INSTITUTE_CODE']}}</td>
                                            <td>{{$institute['MANAGER_NAME']}}</td>
                                            <td>{{$institute['ADDRESS']}}</td>
                                            <td>{{$institute['PHONE']}}</td>
                                            <td>{{$institute['MOBILE']}}</td>
                                            <td>{{$institute['created_at']}}</td>

{{--                                            <td><a href="{{action('InstituteController@index', $institute['INSTITUTE_ID'])}}" class="btn btn-warning">Edit</a></td>--}}
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('InstituteController@edit', $institute['ID'])}}" data-original-title="" title="">
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
