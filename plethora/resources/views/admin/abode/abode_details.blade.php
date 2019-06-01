@extends('admin.main')

@section('content')
<div class="row">

<div class = "col-xs-12">
    <div class="row">

        <div class="col-xs-6">
            <section class="content-header">
                        <h1>
                        {{ $abodes["current"]->display_name }}
                        <br/>
                        <small>Abode information</small>
                        </h1>
                    </section>
        </div>
        <div class="col-xs-6">
        </div>

    </div>

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

<div class="col-md-6">

        @if(sizeof($abodes["images"]) < 1)
        <div class = "col-md-12" style = "margin-bottom:1em;">
            <button class = "btn btn-info btnAddImage" data-toggle="modal" data-target="#add_image">Add Image</button>
        </div>
        @include('dialog.empty_dialog')
        @else
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            @foreach ($abodes["images"] as $key => $image)
            <li data-target="#myCarousel" data-slide-to="{{ $key }}"></li>
            @endforeach
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            @foreach ($abodes["images"] as $image)
            <div class="item">
                <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $image->image }}" alt="Chicago" style = "width:100% !important; height:300px !important;" class = "img-responsive">
            </div>
            @endforeach
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

        <div class = "row" style = "margin-top:2em;">
            <div class = "col-md-12" style = "margin-bottom:0.5em;">
                <button class = "btn btn-info btnAddImage" data-toggle="modal" data-target="#add_image">Add Image</button>
            </div>
            @foreach ($abodes["images"] as $image)
            <div class = "col-md-4"  style = "margin-top:1em;">
                <div style = "position:relative;">
                    <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $image->image }}" alt="Chicago" style = "width:100% !important; height:150px !important;" class = "img-thumbnail">
                    <button style = "position:absolute; top: -5px; right:5px;border-radius:50%;" id = "{{ $image->id }}" class = "btn btn-danger btnRemoveImage"><i class = "fa fa-trash"></i></button>
                </div>
            </div>
            @endforeach
        </div>
        @endif

</div>

<div class = "col-md-3">
    <h3>Features</h3>
    <ul>
        @foreach ($abodes["features"] as $feature)
        <li>{{ $feature["feature"] }}: {{ $feature["value"] }}</li>
        @endforeach
    </ul>

</div>

</div><!-- </row> -->
</section><!-- </content> -->

</section><!-- Content Section> -->

<div class="modal" tabindex="-1" role="dialog" id = "add_image">
        <form action="{{ route("phradmin.add_abode_image.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Add abode image</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload image</label>
                                        <input type="file" id="exampleInputEmail1" name = "abode_image" required/>
                                        <input type="hidden" id="abode_id" name = "abode_id" required/>
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
        $(".carousel-inner").children().first().addClass("active")
        $(".carousel-indicators").children().first().addClass("active")

        $(".btnAddImage").click(function(){
            var abode_id = "{{ $abodes['current']->id }}"
            $("#abode_id").val(abode_id)
        })

         // Remove developer
        $(document).on('click', '.btnRemoveImage', function(){
            var imageId = $(this).attr("id");
            bootbox.confirm("Are you sure you want to remove this image?", function(willDelete){
                if(willDelete){
                    window.location = window.location.href + "/remove/" + imageId
                }
            })
        })
    })
</script>

@endsection