@extends('layouts.A_app', ['activePage' => 'Parts', 'titlePage' => __('Register Parts')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Parts</h4>
                            <p class="card-category"> Here you can manage Parts</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('parts_name.create') }}" class="btn btn-sm btn-primary">Add Parts</a>
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
                                            PARTS NAME
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>
                                        <th class="text-right">
                                            ACTION
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_parts_names as $parts_names)
                                        <tr>
                                            <td>{{$parts_names['PART_ID']}}</td>
                                            <td>{{$parts_names['PARTS_NAME']}}</td>
                                            <td>{{$parts_names['created_at']}}</td>
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('PartsNameController@edit', $parts_names['PART_ID'])}}" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
{{--                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{action('PartsNameController@destroy', $parts_names['PART_ID'])}}" data-original-title="" title="">--}}
{{--                                                    <i class="material-icons">delete</i>--}}
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
