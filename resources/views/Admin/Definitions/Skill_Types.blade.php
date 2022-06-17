@extends('layouts.A_app', ['activePage' => 'Skill', 'titlePage' => __('SKILL TYPE')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">SKILL Types</h4>
                            <p class="card-category"> Here you can manage SKILL Types</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('Skill_type.create') }}" class="btn btn-sm btn-primary">Add SKILL Type</a>
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
                                            SKILL TYPE
                                        </th>
                                        <th>
                                            EXAM KIND
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>
                                        <th class="text-right">
                                            ACTION
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_skill_types as $skill_types)
                                        @switch($skill_types->HAVE_EXAM)
                                            @case(1)
                                            @php $role='YES' @endphp
                                            @break
                                            @case(2)
                                            @php $role='NO' @endphp
                                            @break
                                            @default
                                        @endswitch
                                        <tr>
                                            <td>{{$skill_types['SKILL_ID']}}</td>
                                            <td>{{$skill_types['SKILL_TYPE']}}</td>
                                            <td>{{$role}}</td>
{{--                                            <td>{{$skill_types['HAVE_EXAM']}}</td>--}}
                                            <td>{{$skill_types['created_at']}}</td>
                                     <td>
                                        <td class="td-actions text-right">
                                            <a rel="tooltip" class="btn btn-success btn-link" href="{{action('OtSkillTypeController@edit', $skill_types['SKILL_ID'])}}" data-original-title="" title="">
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
