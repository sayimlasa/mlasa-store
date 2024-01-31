@extends('master')
@section('title')
Role List
@endsection
@section('content')
@slot('li_1')
Branches
@endslot
@slot('title')
list
@endslot


<div class="row">
    <div class="col-lg-12">
        <div class="card" id="user-list">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Branch</h5>
                    <div class="flex-shrink-0">
                        <div class="d-flex gap-2 flex-wrap">

                            <a href="{{route('branches.create')}}" class="btn btn-success"><i class="ri-add-line align-bottom me-1"></i> Create Branch</a>

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
                                <th>Branch Name</th>
                                 
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($count=1)
                            @foreach($branches as $branch)
                            <tr>
                                <td>{{$count++}}</td>
                                <td>{{$branch->name}}</td>  
                                <td>
                                    <nav class="navbar navbar-expand navbar ">
                                        <div class="container-fluid">
                                            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                                <ul class="navbar-nav">
                                                    <li class="nav-item dropdown">
                                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            Action
                                                        </a>
                                                        <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDarkDropdownMenuLink">
                                                            <li><a class="dropdown-item" href="{{ route('branches.create', ['branchid'=>$branch->id]) }}"><i class="ri-pencil-line"></i> edit</a></li>
                                                            <li>
                                                                <form action="{{ route('branches.destroy',$branch->id) }}" method="post">
                                                                    @csrf
                                                                    <button class="dropdown-item"><i class="ri-lock-unlock-line"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </li>

                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </nav>

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
<!--end row-->
@endsection
@section('script')
@endsection