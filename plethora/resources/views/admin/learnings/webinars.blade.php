@extends('admin.main')

@section('content')

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    Company Webinars
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
                    <a data-toggle="modal" data-target="#add_webinar"><button class = "btn btn-warning">
                        Add new Webinar <i class="fa fa-plus"></i>
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
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Video</th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Title</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($webinars as $webinar)
                                    <tr>
                                        <td><iframe src="{{ $webinar->youtube_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>
                                        <td>{{ $webinar->title }}</td>
                                        <td>{{ $webinar->content_description }}</td>
                                @endforeach

                            </tbody>
                            </table>

            </div>
        </div><!-- </row> -->
    </section><!-- </content> -->


    <div class="modal" tabindex="-1" role="dialog" id = "add_webinar">
            <form action="{{ route("phradmin.add_webinar.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Webinar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Add Webinar</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Title</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name = "title" required/>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Description</label>
                                        <textarea name="description" class = "form-control" id="" cols="10" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Video Link</label>
                                            <input type="text" class="form-control videoLink" id="exampleInputEmail1" name = "yt_link" required/>
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

    <script>
        $(document).ready(function(){

        })
    </script>

@endsection
