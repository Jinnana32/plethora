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
    <div class="phr-hero-slim">
    <div class = "container phr-hero-container">
     </div>
    </div>

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
            padding-top:5%;
            font-size:1.5em;
            color:#fff;
        }
    </style>

    <div class="container text-center" style = "margin-top:5%;margin-bottom:10%;">
            <h2>Our Developers</h2>
            <div class="phr-line"></div>
        <div class="row" style = "margin-top:2%;">
            @foreach ($developers as $developer)
                <div class="phr-dev-wrap" id = "{{ $developer->id }}">
                    <img src="{{ str_replace("/public", "", url("")) }}/storage/app/public/developers/{{ $developer->image }}" class="img-responsive">
                    <div class="phr-fade-block">
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    <!-- Admin header -->
    @include('landing.layouts.footer')
     <!-- Admin header -->
     @include('landing.layouts.scripts')

    <script>
        $(document).ready(function(){
            $(document).on("click", ".phr-dev-wrap", function(){
                var developer = $(this).attr("id");
                window.location = "{{ url("") }}" + "/catalog/search/" + 0 + "/" + 0 + "/" + developer
            })
        })
    </script>

</body>
</html>
