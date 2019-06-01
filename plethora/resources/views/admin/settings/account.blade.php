@extends('admin.main')

@section('content')

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    Account Setting
                                    <br/>
                                    <small>Manage your account</small>
                                    </h1>
                                </section>
                    </div>

                </div>
            </div>
        </div> <!-- Page Tag Header -->

    <section class="content">
            <div class="row">

            <div class="col-xs-12">
                <div class="row">
                    @if($errors->has('wrong'))
                    <div class="container">
                        <div class="alert alert-warning alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{ $errors->first('wrong') }}
                        </div>
                    </div>
                    @endif

                    @if(session('success'))
                    <div class="container">
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('success')}}
                            </div>
                    </div>
                    @endif

                    <form action="{{ route("phradmin.update_username.submit") }}" method = "POST">
                        {{ csrf_field() }}
                        <div class="col-xs-4">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">User name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "username" value = "{{ $user->username }}" required/>
                                </div>
                        </div>
                        <div class="col-xs-4">
                                <button style = "margin-top:7%;" class = "btn btn-primary">Update Username</button>
                        </div>
                    </form>
                </div>

                <div class="row">
                    <form action="{{ route("phradmin.update_password.submit") }}" method = "POST">
                        {{ csrf_field() }}
                        <div class="col-xs-4">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">New Password</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "password" required/>
                                </div>
                        </div>
                        <div class="col-xs-4">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Re-enter New Password</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "re_password" required/>
                                </div>
                        </div>
                        <div class="col-xs-4">
                                <div class="form-group">
                                        <button style = "margin-top:7%;" class = "btn btn-primary">Update Pasword</button>
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!-- </row> -->
    </section><!-- </content> -->

@endsection
