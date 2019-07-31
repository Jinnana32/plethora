<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
</head>

<body id="page-top">

    <!-- Plethora headline -->
    <div class = "phr-headline">
        <div class="container text-right">
            <span><i class="fa fa-inbox"></i> plethorahomes@gmail.com</span>
            <span><i class="fa fa-phone"></i> 0921-7298-758</span>
        </div>
    </div>

    <!-- Plethora Navigation -->
    @include('landing.layouts.navigation')

    <!-- Plethora Hero -->
     <!-- Header -->
  <header class="sub-masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-1 sub-mast-back" style = "font-size:2rem;">
                    <a href = "{{ url("/") }}"><i class = "fa fa-angle-left"></i></a>
                </div>
                <div class="col-md-6 sub-mast-text">
                    <h1 style = "font-size: 1.8em !important;">Find Developers from {{ $location->location }}</h1>
                </div>
            </div>
        </div>
      </header>

    <style>
            .phr-dev-wrap {
                width:33%;
                float:left;
                position: relative;
                margin-right:3px;
                margin-bottom:3px;
            }
            .phr-dev-wrap img{
                width:100%;
                height:250px;
            }

            .phr-dev-wrap img:hover {
                transform: skew(45deg)
            }

            .phr-dev-wrap div {
                padding-top:5%;
                position: absolute;
                top:0;
                left:0;
                right:0;
                bottom:0;
                background-color:rgba(0,0,0,0.5);
                text-align: center;
            }

            .phr-dev-wrap div h2{
                padding-top:50%;
                font-size:1em;
                color:#fff;
            }

            .phr-dev-header {
                background-color:#27ae60;
                display:inline;
                border: 1px solid #27ae60;
                padding: 3px 10px;
                border-top-right-radius: 10px;
            }

            .phr-dev-header > img {
                width:24px;
                height:24px;
            }

            .phr-dev-header > span {
                font-size: 1em;
                color:white;
            }

            .phr-dev-line {
                min-height: 3px;
                background-color:#27ae60;
            }

        </style>

    <div class="row">
            <div class="col-md-12">
                <div class="container text-center phr-properties" style = "margin-bottom: 3em;">
                        <h2>Our Partners</h2>
                        <div class="phr-line"></div>
                </div>
                <div class = "container">
                    <input type = "hidden" id = "{{ $location->id }}" class = "location_id" />
                    @foreach ($devs_array as $developer)
                        <div class="phr-dev-wrap project_click" id = "{{ $developer->id }}">
                            <img src="{{ url("") }}/plethora/storage/app/public//developers/{{ $developer->image }}" class="img-responsive">
                            <div class="phr-fade-block">
                                <h2>{{ $developer->name }}</h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
    </div>

    <div style = "clear:both;margin-top:10em;"></div>

    <!-- Admin header -->
    @include('landing.layouts.footer')
    <!-- Admin header -->
    @include('landing.layouts.scripts')

    <script>
        $(document).ready(function(){
            $(document).on("click", ".project_click", function(){
                var developerId = $(this).attr("id");
                var locationId = $(".location_id").attr("id");
                window.location = window.location.href + "/" + developerId + "/projects"
            })
        })
    </script>

</body>
</html>
