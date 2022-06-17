@extends('layouts.A_app', ['activePage' => 'Package', 'titlePage' => __('Question Packages')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Question Packages</h4>
                            <p class="card-category"> Here you can manage Question Packages</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Q_Package.create') }}" class="btn btn-sm btn-primary">Add Question Packages</a>
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
                                            PACKAGES NAME
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
                                            SKILL NAME
                                        </th>
                                        <th>
                                             QUESTIONS COUNT
                                        </th>
                                        <th>
                                            TIME PERIOD(m)
                                        </th>
{{--                                        <th>--}}
{{--                                            CREATION DATE--}}
{{--                                        </th>--}}
                                        <th class="text-center">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_questions_packages as $questions_packages)
                                        <tr>
                                            <td>{{$questions_packages['QUESTIONS_PACKAGES_ID']}}</td>
                                            <td>{{$questions_packages['QUESTIONS_PACKAGES_NAME']}}</td>
                                            <td>{{$questions_packages['INSTITUTE_NAME']}}</td>
                                            <td>{{$questions_packages['TYPE']}}</td>
                                            <td>{{$questions_packages['SUBGROUP_TEST_NAME']}}</td>
                                            <td>{{$questions_packages['SKILL_TYPE']}}</td>
                                            <td>{{$questions_packages['QUESTIONS_COUNT']}}</td>
                                            <td>{{$questions_packages['TOTAL_TEST_TIME']}}</td>
{{--                                            <td>{{$questions_packages['created_at']}}</td>--}}
                                     <td>
                                        <td class="td-actions">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtQuestionsPackagesController@edit', $questions_packages['QUESTIONS_PACKAGES_ID'])}}" data-original-title="" title="edit">
                                                <i class="material-icons">edit</i>
                                                <div class="ripple-container"></div>
                                            </a>
                                        </td>
                                            <td class="td-actions">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtQuestionsPackagesController@answer', $questions_packages['QUESTIONS_PACKAGES_ID'])}}" data-original-title="" title="answers">
                                                    <i class="material-icons">check_circle</i>
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
