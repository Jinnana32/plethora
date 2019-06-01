@extends('admin.main')

@section('content')

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    Property Features
                                    <br/>
                                    <small>Manage features of your properties</small>
                                    </h1>
                                </section>
                    </div>
                    <div class="col-xs-6 text-right" style = "padding-top:2rem;padding-right:5rem;">
                            <button class = "btn btn-warning" data-toggle="modal" data-target="#add_feature">
                                    Add new feature <i class="fa fa-plus"></i>
                            </button>
                    </div>

                </div>
            </div>
        </div> <!-- Page Tag Header -->

        <section class="content" style = "margin-top:2rem;">
                <div class="row">

                <div class="col-md-4" style = "margin-bottom:2rem;">

                </div>

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

                <div class="col-md-12">
                        @if (sizeof($features) < 1)
                        @include('dialog.empty_dialog')
                        @else
                    <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Feature</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Display Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Has Options</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($features as $feature)
                                    <tr>
                                        <td>{{ $feature->id }}</td>
                                        <td>{{ $feature->feature }}</td>
                                        <td>{{ $feature->display_name }}</td>
                                        <td>
                                            @if ($feature->has_options == 1)
                                                Yes
                                            @else
                                                No
                                            @endif
                                        </td>
                                        <td>
                                            <i class = "fa fa-trash phr-remove-feature" name = "{{ $feature->feature }}" id = "{{ $feature->id }}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </table>
                            @endif
                </div>

                </div><!-- </row> -->
                </section><!-- </content> -->


                <div class="modal" tabindex="-1" role="dialog" id = "add_feature">
                        <form action="{{ route("phradmin.add_feature.submit") }}" method = "POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Feature</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                        <div class="row">
                                            <div class = "col-md-12  col-form-header">
                                                    <div class="dot-header"></div>
                                                    <span>Feature Info</span>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                        <label for="exampleInputEmail1">Feature</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "feature_name" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                        <label for="exampleInputEmail1">Display Name</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "display_name" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                    <div class="form-group form-group-select">
                                                            <label for="exampleInputEmail1">Has Options</label>
                                                            <select class="form-control" name = "has_options">
                                                                    <option value = "1">Yes</option>
                                                                    <option value = "0">No</option>
                                                            </select>
                                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
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
                $(document).on('click', '.phr-remove-feature', function(){
                    var feat_id = $(this).attr("id");
                    var feat_name = $(this).attr("name");
                    bootbox.confirm("Are you sure you want to remove this Feature?", function(willDelete){
                        if(willDelete){
                            window.location = window.location.href + "/remove/"+ feat_id + "/" + feat_name
                        }
                    })
                })
            })
        </script>

@endsection
