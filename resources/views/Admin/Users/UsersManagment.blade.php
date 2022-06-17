@extends('layouts.A_app', ['activePage' => 'Users Management', 'titlePage' => __('Users Management')])
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Users</h4>
                            <p class="card-category"> Here you can manage Users</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                    <a href="{{ route('User.create') }}" class="btn btn-sm btn-primary">Add Users</a>
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
                                            FIRST NAME
                                        </th>
                                        <th>
                                            LAST NAME
                                        </th>
                                        <th>
                                            EMAIL
                                        </th>
                                        <th>
                                            MOBILE
                                        </th>
                                        <th>
                                            INSTITUTE NAME
                                        </th>
                                        <th>
                                            ACCESS LEVEL
                                        </th>
                                        <th>
                                            STATUS
                                        </th>
                                        <th>
                                            CREATION DATE
                                        </th>
                                        <th class="text-right">
                                            Actions
                                        </th>
                                    </tr></thead>
                                    <tbody>
                                    @foreach($ot_users as $USERS)
                                        @switch($USERS->User_status)
                                        @case(1)
                                        @php $role='active' @endphp
                                        @break
                                        @case(2)
                                        @php $role='Inactive' @endphp
                                        @break
                                        @default
                                        @endswitch
                                        <tr>
                                            <td>{{$USERS['id']}}</td>
                                            <td>{{$USERS['fname']}}</td>
                                            <td>{{$USERS['lname']}}</td>
                                            <td>{{$USERS['email']}}</td>
                                            <td>{{$USERS['Mobile']}}</td>
                                            <td>{{$USERS['INSTITUTE_NAME']}}</td>
                                            <td>{{$USERS['USERKIND_DESC']}}</td>
                                            <td>{{$role}}</td>
                                            <td>{{$USERS['created_at']}}</td>
                                         <td>
                                              <td class="td-actions text-right">
                                                <a rel="tooltip" class="btn btn-success btn-link" href="{{action('UsersController@edit', $USERS['id'])}}" data-original-title="" title="">
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
