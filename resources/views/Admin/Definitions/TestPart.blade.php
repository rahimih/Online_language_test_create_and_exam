@extends('layouts.A_app', ['activePage' => 'TestPart', 'titlePage' => __('Test Parts')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Test Parts</h4>
                            <p class="card-category"> Here you can manage Test Parts</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Test_part.create') }}" class="btn btn-sm btn-primary">Add TEST Parts</a>
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
                                            MAIN TEST NAME
                                        </th>
                                        <th>
                                            SKILL NAME
                                        </th>
                                        <th>
                                            PART NAME
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>

                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_test_parts as $test_parts)
                                        <tr>
                                            <td>{{$test_parts['TEST_PART_ID']}}</td>
                                            <td>{{$test_parts['TYPE']}}</td>
                                            <td>{{$test_parts['SKILL_TYPE']}}</td>
                                            <td>{{$test_parts['PARTS_NAME']}}</td>
                                            <td>{{$test_parts['created_at']}}</td>
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtTestPartController@edit', $test_parts['TEST_PART_ID'])}}" data-original-title="" title="">
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
