@extends('admin.main')

@section('content')
    <section class="content">
        <div class="row">

                <div class="col-md-12">
                        @if($errors->has('error'))
                            <div class="alert alert-warning alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{ $errors->first('error') }}
                            </div>
                        @endif

                        @if(session('success'))
                        <div class="alert alert-success alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                {{session('success')}}
                        </div>
                        @endif
                    </div>

                <div class="col-xs-12">
                        <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">Admin Access</h3>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <button class = "btn btn-primary" data-toggle="modal" data-target="#add_users">Create new Account</button>

                                    <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">User</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Used by</th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Access type</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($user_info as $user)
                                                    <tr>
                                                        <td>{{ $user["user_name"] }}</td>
                                                        <td>{{ $user["first_name"] }} {{ $user["last_name"] }}</td>
                                                        <td>
                                                            @foreach ($types as $type)
                                                                @if ($user["type"] == $type->id)
                                                                    {{ $type->type }}
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            </table>
                                </div>
                                <!-- /.box-body -->
                              </div>
                </div>
        </div>
    </section>

    <div class="modal" tabindex="-1" role="dialog" id = "add_users">
            <form action="{{ route("phradmin.add_user.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Add User Access</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name = "username" required/>
                                    </div>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">First Name</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name = "first_name" required/>
                                    </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Last Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "last_name" required/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                            <div class="form-group form-group-select">
                                                    <label for="exampleInputEmail1">Access Type</label>
                                                    <select id = "phr_referrer" class="form-control" name = "type">
                                                        @foreach ($types as $type)
                                                            <option value = "{{ $type->id }}">{{ $type->type }}</option>
                                                        @endforeach
                                                    </select>
                                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                                            </div>
                                    </div>
                                </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Continue</button>
                </div>
                </div>
            </div>
            </form>
    </div>

@endsection

