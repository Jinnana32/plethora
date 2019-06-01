@extends('admin.main')

@section('content')
<div class="row">

<div class = "col-xs-12">
    <div class="row">

        <div class="col-xs-6">
            <section class="content-header">
                        <h1>
                        Incentives
                        <br/>
                        <small>List of all your company agents</small>
                        </h1>
                    </section>
        </div>
        <div class="col-xs-6">
        </div>

    </div>

<section class="content">
<div class="row">

<div class="col-md-4" style = "padding-right:3em;">
<a class = "btn btn-warning" data-toggle="modal" data-target="#add_incentive">
    Add new incentive <i class="fa fa-plus"></i>
</a>
</div>

<div class="col-md-8" style = "padding-right:3em;">
        <h3>Recent Incentives</h3>
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

<div class="col-xs-4">
            <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Category</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Incentive</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Milestone</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($incentives as $incentive)
                            <tr>
                                <td>{{ $incentive->category }}</td>
                                <td>{{ $incentive->description }}</td>
                                <td>{{ $incentive->milestone_income }}</td>
                                <td>
                                        <i class = "fa fa-edit phr-edit-dev"  data-toggle="modal" data-target="#edit_developer"></i>
                                        <i class = "fa fa-trash phr-remove-brand" name = "{{ $incentive->description }}" id = "{{ $incentive->id }}"></i>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>
</div>

<div class="col-md-8">
        <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Incentive</th>
                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Agent name</th>
                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Date Reached</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($recent_incentives as $recents)
                        <tr>
                            <td>{{ $recents->description }}</td>
                            <td>{{ $recents->agent_name }}</td>
                            <td>{{ $recents->create_date }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
</div>

</div><!-- </row> -->
</section><!-- </content> -->

</section><!-- Content Section> -->

<div class="modal" tabindex="-1" role="dialog" id = "add_incentive">
        <form action="{{ route("phradmin.add_incentive.submit") }}" method = "POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Incentive</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="row">
                        <div class = "col-md-12  col-form-header">
                                <div class="dot-header"></div>
                                <span>Add Incentive Rule</span>
                        </div>

                        <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Category</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "category" required/>
                                </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name = "description" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Milestone threshold</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" name = "milestone" required/>
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

<div class="modal" tabindex="-1" role="dialog" id = "edit_branding">
        <form action="{{ route("phradmin.update_incentive.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Branding</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Sub Brand Info</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload image</label>
                                        <input type="file" id="exampleInputEmail1" name = "brand_image"/>
                                        <input type="hidden" id="edit_brand_id" name = "brand_id"/>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Branding</label>
                                        <input type="text" class="form-control" id="edit_brand_name" name = "brand_name" required/>
                                </div>
                            </div>
                        </div>
                    </form>
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
        // Add Brand
        $(document).on('click', '.phr-add-brand', function(){
            var devId = $(this).attr("id");
            $("#add_dev_id").val(devId);
        })

        // Edit Brand
        $(document).on('click', '.phr-edit-brand', function(){
            var brandName = $(this).attr("name");
            var brandID = $(this).attr("id");
            $('#edit_brand_id').val(brandID);
            $("#edit_brand_name").val(brandName);
        })

        // Remove brand
        $(document).on('click', '.phr-remove-brand', function(){
            var brandId = $(this).attr("id");
            var brandName = $(this).attr("name");

            bootbox.confirm("Are you sure you want to remove "+ brandName +" as Incentive?", function(willDelete){
                if(willDelete){
                    window.location = window.location.href + "/remove/" + brandId + "/" + brandName
                }
            })
        })

    })
</script>


@endsection