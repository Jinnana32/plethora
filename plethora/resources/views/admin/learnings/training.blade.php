@extends('admin.main')

@section('content')

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    Company Trainings
                                    <br/>
                                    <small>Add new training materials for your agents</small>
                                    </h1>
                                </section>
                    </div>

                </div>
            </div>
        </div> <!-- Page Tag Header -->

    <section class="content">
            <div class="row">



            <div class="col-xs-4 col-xs-offset-8" style = "text-align:right;padding-right:2%;">
                <a data-toggle="modal" data-target="#add_training"><button class = "btn btn-warning">
                    Add new Trainings <i class="fa fa-plus"></i>
                </button></a>
            </div>

            <div class = "col-md-12">
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
            </div>


            <div class="col-xs-12" style = "margin-top:2em;">
                    <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Title</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Message</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Venue</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Platform(s): activate to sort column ascending">Time</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Engine version: activate to sort column ascending">Date</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($trainings as $training)
                                <tr>
                                    <td>{{ $training->header }}</td>
                                    <td>{{ $training->content }}</td>
                                    <td>{{ $training->venue }}</td>
                                    <td>{{ $training->place }}</td>
                                    <td>{{ $training->time }}</td>
                                    <td>{{ $training->date }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>

            </div>
        </div><!-- </row> -->
    </section><!-- </content> -->

    <div class="modal" tabindex="-1" role="dialog" id = "add_training">
            <form action="{{ route("phradmin.add_training.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Training</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Add Training</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name = "header" required/>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Content</label>
                                        <textarea name="content" class = "form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Venue</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name = "venue" required/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Address</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name = "place" required/>
                                        </div>
                                    </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Date</label>
                                            <input type="date" class="form-control" id="exampleInputEmail1" name = "date" required/>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Time</label>
                                        <input type="time" class="form-control" id="exampleInputEmail1" name = "time" required/>
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
