@extends('layouts.A_app', ['activePage' => 'Tests', 'titlePage' => __('Test Defines')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Test Define</h4>
                            <p class="card-category"> Here you can manage Tests</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Tests.create') }}" class="btn btn-sm btn-primary">Add Test</a>
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
                                            TESTS NAME
                                        </th>
                                        <th>
                                            INSTITUTE NAME
                                        </th>
                                        <th>
                                            MAIN TEST
                                        </th>
                                        <th>
                                            SUBGROUP NAME
                                        </th>
                                        <th>
                                            START DATE
                                        </th>
                                        <th>
                                            END DATE
                                        </th>
                                        <th>
                                            Cost IRR
                                        </th>
                                        <th>
                                            Cost €
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_test_defines as $test_defines)
                                        <tr>
                                            <td>{{$test_defines['TESTS_ID']}}</td>
                                            <td>{{$test_defines['TESTS_NAME']}}</td>
                                            <td>{{$test_defines['INSTITUTE_NAME']}}</td>
                                            <td>{{$test_defines['TYPE']}}</td>
                                            <td>{{$test_defines['SUBGROUP_TEST_NAME']}}</td>
                                            <td>{{$test_defines['START_DATE_VIEW']}}</td>
                                            <td>{{$test_defines['END_DATE_VIEW']}}</td>
                                            <td>{{$test_defines['test_cost_R']}}</td>
                                            <td>{{$test_defines['test_cost_U']}}</td>
                                            <td>{{$test_defines['created_at']}}</td>
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtTestDefineController@edit', $test_defines['TESTS_ID'])}}" data-original-title="" title="">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                            {{--<td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtQuestionsPackagesController@edit', $questions_packages['QUESTIONS_PACKAGES_ID'])}}" data-original-title="" title="">
                                                    <i class="material-icons">check_circle</i>
                                                    <div class="ripple-container"></div>
                                                </a>
                                            </td>--}}
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
