@extends('layouts.A_app', ['activePage' => 'Questions_t', 'titlePage' => __('Question Type')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Question Types</h4>
                            <p class="card-category"> Here you can manage Question Types</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Question_type.create') }}" class="btn btn-sm btn-primary">Add Question Type</a>
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
                                            QUESTIONS TYPE
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>
                                        <th class="text-right">
                                            ACTION
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_questions_types as $questions_types)
                                        <tr>
                                            <td>{{$questions_types['QUESTION_ID']}}</td>
                                            <td>{{$questions_types['QUESTIONS_TYPE']}}</td>
                                            <td>{{$questions_types['created_at']}}</td>
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtQuestionsTypeController@edit', $questions_types['QUESTION_ID'])}}" data-original-title="" title="">
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
