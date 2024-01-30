@extends('master')
@section('title')
    Create user
@endsection

@section('content')
   
    <div class="row">
        <div class="col-lg-12">
            <div class="card" id="user-list">
                <div class="card-header border-0">
                    <div class="d-flex align-items-center">
                        <h5 class="card-title mb-0 flex-grow-1">@if(isset($user))
                                Edit
                            @else
                                Create
                            @endif User</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        @foreach ($errors->all() as $error)
                            <span class="fs-10 text-danger">{{ $error }}</span><br/>
                        @endforeach
                    </div>
                    <form action="{{route('users.save')}}" method="post" onsubmit="return validateforminputs(this)">
                        <input type="hidden" name="user[id]" value="{{isset($user)?$user->id:''}}">
                        @csrf
                        <div class="row mb-1">
                            <div class="col-md-3">
                                <div>
                                    <label for="username" class="form-label">Username</label>
                                    <input id="username" type="text" name="user[username]" class="form-control" required placeholder="username"
                                           value="{{isset($user)?$user->username:''}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div>
                                    <label for="fname" class="form-label">First name</label>
                                    <input id="fname" type="text" name="user[fname]" class="form-control" required placeholder="first name"
                                           value="{{isset($user)?$user->fname:''}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <label for="mname" class="form-label">Middle name</label>
                                    <input id="mname" type="text" name="user[mname]" class="form-control" required placeholder="middle name"
                                           value="{{isset($user)?$user->mname:''}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <label for="lname" class="form-label">Last name</label>
                                    <input id="lname" type="text" name="user[lname]" class="form-control" required placeholder="Last name"
                                           value="{{isset($user)?$user->lname:''}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <label for="email" class="form-label">Email</label>
                                    <input id="email" type="email" name="user[email]" class="form-control" placeholder="email" value="{{isset($user)?$user->email:''}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <label for="mobileno" class="form-label">Mobile no</label>
                                    <input id="mobileno" type="text" name="user[mobileno]" class="form-control" placeholder="Mobile no"
                                           value="{{isset($user)?$user->mobileno:''}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div>
                                    <label for="dob" class="form-label">DOB</label>
                                    <input id="dob" type="date" name="user[dob]" class="form-control" required max="{{date('Y-m-d')}}"
                                           value="{{isset($user)?$user->dob:''}}">
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div>
                                    <label for="citizenship" class="form-label">Citizenship</label>
                                    <input id="citizenship" type="text" name="user[citizenship]" class="form-control" placeholder="Citizenship"
                                           value="{{isset($user)?$user->citizenship:''}}">
                                </div>
                            </div>
                          
                        </div>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-success btn-load btn-lg save-btn">
                                 <span class="d-flex align-items-center">
                                     <span class="spinner-border flex-shrink-0 me-2 save-spinner" role="status" style="display: none"></span>
                                     <span class="flex-grow-1">Save</span>
                                 </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection
@section('script')
    <script>
        function validateforminputs(form) {
            $(form).find('.save-spinner').show();
            $(form).find('.save-btn').prop('disabled', true);
        }
    </script>
@endsection
