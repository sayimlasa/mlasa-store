@extends('master')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card" id="user-list">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Users</h5>
                    <div class="flex-shrink-0">
                        <div class="d-flex gap-2 flex-wrap">
                            <a href="{{route('users.create')}}" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Create User</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="" class="table nowrap align-middle table-sm table-hover table-bordered" style="width:100%;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Full name</th>
                                <th>Role</th>
                                <th>Age</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Citizenship</th>
                                <th>Address</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($count=1)
                            @foreach($users as $u)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$u->username}}</td>
                                <td>{{$u->fullname}}</td>
                                <td>{{$u->rolename}}</td>
                                <td>{{$u->gender}}</td>
                                <td>{{$u->email}}</td>
                                <td>{{$u->mobileno}}</td>
                                <td>{{$u->citizenship}}</td>
                                <td>{{$u->address}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-soft-dark btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                          
                                            <a class="dropdown-item" href="{{route('users.create',['userid'=>$u->id])}}"><i class="ri-pencil-line"></i> edit</a>
                                            <form action=" " method="post" class="m-0 p-0" onsubmit="return confirm('Do you want to reset this user password?\n New password: user123')">
                                                @csrf
                                                <input type="hidden" name="userid" value="{{$u->id}}">
                                                <button class="dropdown-item"><i class="ri-lock-unlock-line"></i> reset password
                                                </button>
                                            </form>
                                            
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!--end col-->
</div>
@endsection
<!--end row-->
 