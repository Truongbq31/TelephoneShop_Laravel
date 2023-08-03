@extends('templates.layoutAdmin')
@section('content')
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <!-- Details Start -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Profile Setting</h5>
                                    </div>
                                    <form method="POST" action="{{route('route_admin_editUsers', ['id'=>$user->id])}}" class="theme-form theme-form-2 mega-form">
                                        @csrf
                                        <div class="row">
                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Full Name</label>
                                                <div class="col-sm-10">
                                                    <input value="{{$user->name}}" name="name" class="form-control" type="text"
                                                           placeholder="Enter Your Full Name">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Enter Email
                                                    Address</label>
                                                <div class="col-sm-10">
                                                    <input value="{{$user->email}}" name="email" class="form-control" type="email"
                                                           placeholder="Enter Your Email Address">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">New Password</label>
                                                <div class="col-sm-10">
                                                    <input name="new_password" class="form-control" type="password"
                                                           placeholder="Enter Your New Password">
                                                </div>
                                            </div>

                                            <div class="mb-4 row align-items-center">
                                                <label class="form-label-title col-sm-2 mb-0">Confirm
                                                    New Password</label>
                                                <div class="col-sm-10">
                                                    <input name="confirm_new_password" class="form-control" type="password"
                                                           placeholder="Enter Your Confirm New Passowrd">
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Save</button>
                                    </form>
                                </div>
                            </div>
                            <!-- Details End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
