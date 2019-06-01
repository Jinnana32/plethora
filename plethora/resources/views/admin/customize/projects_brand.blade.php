@extends('admin.main')

@section('content')

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    {{ $brand->name }} Projects
                                    <br/>
                                    <small>Manage Developer Projects</small>
                                    </h1>
                                </section>
                    </div>
                    <div class="col-xs-6 text-right" style = "padding-top:2rem;padding-right:5rem;">
                            <button class = "btn btn-warning" data-toggle="modal" data-target="#add_dev">
                                    Add new Project <i class="fa fa-plus"></i>
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

                <div class="col-md-12">
                        @if (sizeof($projects) < 1)
                        @include('dialog.empty_dialog')
                        @else
                    <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Project</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Developer</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Branding</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>
                                            {{ $project["project"]->id }}
                                        </td>
                                        <td>
                                            {{ $project["project"]->name }}
                                        </td>
                                        <td>
                                            {{ $developer->name }}
                                        </td>
                                        <td>
                                            {{ $project["sub_developer"] }}
                                        </td>
                                        <td>
                                            <i class = "fa fa-edit phr-edit-project" name = "{{ $project["project"]->name  }}" id = "{{ $project["project"]->id  }}" data-toggle="modal" data-target="#edit_project"></i>
                                            <i class = "fa fa-trash phr-remove-project"  name = "{{ $project["project"]->name  }}" id = "{{ $project["project"]->id  }}"></i>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                    @endif
                </div>

            </div><!-- </row> -->
        </section><!-- </content> -->

        <div class="modal" tabindex="-1" role="dialog" id = "add_dev">
                <form action="{{ route("phradmin.add_project.submit") }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Project</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                                <div class="row">
                                    <div class = "col-md-12  col-form-header">
                                            <div class="dot-header"></div>
                                            <span>Project Info</span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Project</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name = "proj_name" required/>
                                                <input type="hidden" id="exampleInputEmail1" value = "{{ $developer->id }}" name = "dev_id" required/>
                                                <input type="hidden" id="exampleInputEmail1" value = "{{ $brand->id }}" name = "brand_id" required/>
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

            <div class="modal" tabindex="-1" role="dialog" id = "add_branding">
                    <form action="{{ route("phradmin.add_branding.submit") }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add New Branding</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class = "col-md-12  col-form-header">
                                            <div class="dot-header"></div>
                                            <span>Sub Brand Info</span>
                                    </div>

                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Upload image</label>
                                                <input type="file" id="exampleInputEmail1" name = "brand_image" required/>
                                                <input type="hidden" id="add_dev_id" name = "dev_id" required/>
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Branding</label>
                                                <input type="text" class="form-control" id="exampleInputEmail1" name = "brand_name" required/>
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

            <div class="modal" tabindex="-1" role="dialog" id = "edit_project">
                    <form action="{{ route("phradmin.update_project.submit") }}" method = "POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Edit Project</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                    <div class="row">
                                        <div class = "col-md-12  col-form-header">
                                                <div class="dot-header"></div>
                                                <span>Update Project info</span>
                                        </div>

                                        <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">Re-Upload image</label>
                                                    <input type="file" id="exampleInputEmail1" name = "proj_image"/>
                                                    <input type="hidden" id="edit_proj_id" name = "proj_id"/>
                                                </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Project Name</label>
                                                    <input type="text" class="form-control" id="edit_proj_name" name = "proj_name" required/>
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
                    $(document).on('click', '.phr-edit-project', function(){
                        var projName = $(this).attr("name");
                        var projId = $(this).attr("id");
                        $('#edit_proj_id').val(projId);
                        $("#edit_proj_name").val(projName);
                    })

                    // Remove developer
                    $(document).on('click', '.phr-remove-project', function(){
                        var projName = $(this).attr("name");
                        var projId = $(this).attr("id");
                        bootbox.confirm("Are you sure you want to remove "+ projName +"?", function(willDelete){
                            if(willDelete){
                                window.location = window.location.href + "/remove/" + projId + "/" + projName
                            }
                        })
                    })
                })
            </script>

@endsection
