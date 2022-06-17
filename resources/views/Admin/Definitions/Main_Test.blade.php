@extends('layouts.A_app', ['activePage' => 'MainT', 'titlePage' => __('Register Main Tests')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Main Tests</h4>
                            <p class="card-category"> Here you can manage Tests</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('M_Test.create') }}" class="btn btn-sm btn-primary">Add Test</a>
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
                                            LANGUAGE_NAME
                                        </th>
                                        <th>
                                            MAIN TEST NAME
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_main_tests as $main_tests)
                                        <tr>
                                            <td>{{$main_tests['MAINTEST_ID']}}</td>
                                            <td>{{$main_tests['LANGUAGE_NAME']}}</td>
                                            <td>{{$main_tests['TYPE']}}</td>
                                            <td>{{$main_tests['created_at']}}</td>
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('MainTestController@edit', $main_tests['MAINTEST_ID'])}}" data-original-title="" title="">
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
