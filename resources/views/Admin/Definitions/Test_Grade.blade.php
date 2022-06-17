@extends('layouts.A_app', ['activePage' => 'TestGrade', 'titlePage' => __('Test Grades')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Test Grades</h4>
                            <p class="card-category"> Here you can manage Test Grades</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Test_Grade.create') }}" class="btn btn-sm btn-primary">Add  Test Grade</a>
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
                                            MAIN TEST
                                        </th>
                                        <th>
                                            SUBGROUP NAME
                                        </th>
                                        <th>
                                            SKILL NAME
                                        </th>
                                        <th>
                                            QUESTION FROM
                                        </th>
                                        <th>
                                            QUESTION TO
                                        </th>
                                        <th>
                                            GRADE
                                        </th>
                                        <th>
                                            DATE FROM
                                        </th>
                                        <th>
                                            DATE TO
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_test_grades as $test_grades)
                                        <tr>
                                            <td>{{$test_grades['TEST_GRADE_ID']}}</td>
                                            <td>{{$test_grades['TYPE']}}</td>
                                            <td>{{$test_grades['SUBGROUP_TEST_NAME']}}</td>
                                            <td>{{$test_grades['SKILL_TYPE']}}</td>
                                            <td>{{$test_grades['QUESTION_FROM']}}</td>
                                            <td>{{$test_grades['QUESTION_TO']}}</td>
                                            <td>{{$test_grades['GRADE']}}</td>
                                            <td>{{$test_grades['DATE_FROM']}}</td>
                                            <td>{{$test_grades['DATE_TO']}}</td>
                                            <td>{{$test_grades['created_at']}}</td>
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtTestGradeController@edit', $test_grades['TEST_GRADE_ID'])}}" data-original-title="" title="">
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
