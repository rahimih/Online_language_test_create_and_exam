@extends('layouts.A_app', ['activePage' => 'TestSkill', 'titlePage' => __('Test skills')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Test skills</h4>
                            <p class="card-category"> Here you can manage Test skills</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Test_skill.create') }}" class="btn btn-sm btn-primary">Add TEST skills</a>
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
                                            ORDERS
                                        </th>
                                        <th>
                                            SECTION NUMBERS
                                        </th>
                                        <th>
                                            QUESTION NUMBERS
                                        </th>
                                        <th>
                                            TIME PERIOD(m)
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>

                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_test_skills as $test_skills)
                                        <tr>
                                            <td>{{$test_skills['TEST_SKILL_ID']}}</td>
                                            <td>{{$test_skills['TYPE']}}</td>
                                            <td>{{$test_skills['SKILL_TYPE']}}</td>
                                            <td>{{$test_skills['ORDERS']}}</td>
                                            <td>{{$test_skills['Section_Numbers']}}</td>
                                            <td>{{$test_skills['Question_Numbers']}}</td>
                                            <td>{{$test_skills['Time_Period']}}</td>
                                            <td>{{$test_skills['created_at']}}</td>
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtTestSkillController@edit', $test_skills['TEST_SKILL_ID'])}}" data-original-title="" title="">
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
