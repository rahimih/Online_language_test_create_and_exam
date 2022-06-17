@extends('layouts.A_app', ['activePage' => 'Questions', 'titlePage' => __('Question Creator')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Question Packages</h4>
                            <p class="card-category"> Here you can manage Question Packages</p>
                        </div>
                        <div class="card-body">

                            <nav aria-label="breadcrumb" role="navigation">
                                <ol class="breadcrumb">
                                    <button type="button" class="btn btn-danger col-3">Package</button>
                                    <button type="button" class="btn btn-link col-2 disabled" aria-disabled="true">Section</button>
                                    <button type="button" class="btn btn-link col-2 disabled" aria-disabled="true">Part</button>
                                    <button type="button" class="btn btn-link col-2 disabled" aria-disabled="true">Question</button>
                                </ol>
                            </nav>


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
                                            CREATION DATE
                                        </th>
                                        <th class="text-right">
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
                                            <td>{{$questions_packages['created_at']}}</td>
                                     <td>
                                            <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtPackagesSectionController@select', $questions_packages['QUESTIONS_PACKAGES_ID'])}}" data-original-title="" title="">
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
