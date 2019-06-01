@extends('admin.main')

@section('content')

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    Locations
                                    <br/>
                                    <small>Manage features of your properties</small>
                                    </h1>
                                </section>
                    </div>
                    <div class="col-xs-6 text-right" style = "padding-top:2rem;padding-right:5rem;">
                            <button class = "btn btn-warning" data-toggle="modal" data-target="#add_location">
                                    Add new location <i class="fa fa-plus"></i>
                            </button>
                    </div>

                </div>
            </div>
        </div> <!-- Page Tag Header -->

        <section class="content" style = "margin-top:2rem;">
            <div class="row" style = "padding:20px;">

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

                @if (sizeof($locations) < 1)
                @include('dialog.empty_dialog')
                @else
                @foreach ($locations as $location)
                <div class="col-md-3 phr-dev-item">
                        <div class = "phr-dev-wrapper">
                            <div class="phr-dev-item-header">

                                <img src="{{ url("") }}/plethora/storage/app/public/developers/{{ $location->image }}" class="img-responsive">
                                <div class="phr-fade-block">
                                    <h2>{{ $location->location }}</h2>
                                </div>

                                <div class="phr-dev-actions">
                                    <i class = "fa fa-edit phr-edit-location" name = "{{ $location->location }}" id = "{{ $location->id }}" data-toggle="modal" data-target="#edit_location"></i>
                                    <i class = "fa fa-trash phr-remove-loc" name = "{{ $location->location }}" id = "{{ $location->id }}"></i>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach
                @endif

            </div><!-- </row> -->
        </section><!-- </content> -->

        <div class="modal" tabindex="-1" role="dialog" id = "add_location">
                <form action="{{ route("phradmin.add_location.submit") }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Location</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                                <div class="row">
                                    <div class = "col-md-12  col-form-header">
                                            <div class="dot-header"></div>
                                            <span>Location Info</span>
                                    </div>

                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Upload image</label>
                                                <input type="file" id="exampleInputEmail1" name = "location_image" required/>
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Location</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name = "location_name" required/>
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

            <div class="modal" tabindex="-1" role="dialog" id = "edit_location">
                    <form action="{{ route("phradmin.update_location.submit") }}" method = "POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Location</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    <div class="row">
                                        <div class = "col-md-12  col-form-header">
                                                <div class="dot-header"></div>
                                                <span>Update Location info</span>
                                        </div>

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Re-Upload image</label>
                                                    <input type="file" id="exampleInputEmail1" name = "location_image"/>
                                                    <input type="hidden" id="edit_location_id" name = "location_id"/>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Location</label>
                                                    <input type="text" class="form-control" id="edit_location_name" name = "location_name" required/>
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
            // Edit Developer
            $(document).on('click', '.phr-edit-location', function(){
                var locName = $(this).attr("id");
                var locId = $(this).attr("name");
                $('#edit_location_id').val(locName);
                $("#edit_location_name").val(locId);
            })

            // Remove developer
            $(document).on('click', '.phr-remove-loc', function(){
                var devId = $(this).attr("id");
                var devName = $(this).attr("name");
                bootbox.confirm("Are you sure you want to remove "+ devName +" as Location?", function(willDelete){
                    if(willDelete){
                        window.location = window.location.href + "/remove/" + devId + "/" + devName
                    }
                })
            })
        })
    </script>

@endsection
