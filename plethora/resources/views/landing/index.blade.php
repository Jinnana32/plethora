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
    <div class="phr-hero">
    <div class = "container phr-hero-container">
        <div class="phr-search-form">
            <h2>Search properties:</h2>
            <form action="">
                <div class="form-group">
                    <label for="propert_category">Property Category</label>
                    <br/>
                    <select class = "search-form" id = "category_id" name = "props_category">
                        <option value = "0">Any</option>
                        @foreach ($categories as $category)
                            <option value = "{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>

                <div class="form-group">
                    <label for="propert_category">Property Location</label>
                    <br/>
                    <select class = "search-form" id = "location_id" name = "props_category">
                        <option value = "0">Any</option>
                        @foreach ($locations as $location)
                            <option value = "{{ $location->id }}">{{ $location->location }}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>

                <div class="form-group">
                    <label for="propert_category">Property Developer</label>
                    <br/>
                    <select class = "search-form" id = "developer_id" name = "props_category">
                        <option value = "0">Any</option>
                        @foreach ($developers as $developer)
                            <option value = "{{ $developer->id }}">{{ $developer->name }}</option>
                        @endforeach
                    </select>
                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>

                <div class="form-group">
                    <button type = "button" class = "btn btn-primary btn-block searchCatalog">Search</button>
                </div>

            </form>
        </div>
    </div>
    </div>

    <!-- Plethora carousel -->
    <div class="container-fluid" style = "margin-top:1%;padding:0;padding-left:1%;">
        <div class="phr-carousel">

                @foreach ($locations as $location)
                <div class="carousel-item" id = "{{ $location->id }}">
                        <img src="{{ url("") }}/plethora/storage/app/public/developers/{{ $location->image }}" class="img-responsive">
                        <div class="phr-fade-block">
                            <h2>{{ $location->location }}</h2>
                        </div>

                    </div>
                @endforeach

        </div>
    </div>

    <div class="container text-center phr-properties">
        <h2>Recent Properties</h2>
        <div class="phr-line"></div>

        <div class="phr-property-wrap">
                @foreach ($abodes as $abode)
                    <div class="phr-property-item" style = "margin-top:4em;">
                        <img class = "phr-catalog-developer" src = "{{ url("") }}/plethora/storage/app/public/developers/{{ $abode["dev_image"] }}" />
                        @if ($abode["has_brand"] != 0)
                            <img class = "phr-catalog-branding" src = "{{ url("") }}/plethora/storage/app/public/brandings/{{ $abode["branding_image"] }}" />
                        @endif
                        @if ($abode["current"]->image != "")
                        <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $abode["current"]->image }}">
                        @else
                        <img src="http://localhost/plethora/public/vendor/img/temp_image.png">
                        @endif
                            <div class = "phr-twin-header">
                                <a href = "{{ url("abode") }}/{{ $abode["current"]->id }}"><h2 class = "twin-left">{{ $abode["current"]->display_name }}</h2></a>
                                <h2 class = "twin-right">{{ date("M d, Y", strtotime($abode["current"]->date)) }}</h2>
                            </div>
                            <div class = "clearfix"></div>
                            <p class = "phr-monthly">
                                @if ($abode["current"]->monthly_payment < 1)
                                Contact Selling Agent
                                @else
                                {{ $abode["current"]->monthly_payment }}/monthly
                                @endif
                            </p>
                            <p class = "phr-category">({{ $abode["category"] }})</p>
                            <p class = "phr-address">{{ $abode["location"] }}, {{ $abode["current"]->address }}</p>
                            <ul>
                                @foreach (array_slice($abode["features"], 0, 4) as $feature)
                                    <li>{{ $feature["feature"] }}: {{ $feature["value"] }}</li>
                                @endforeach
                                <li><a style = "padding:0;" href = "{{ url("abode") }}/{{ $abode["current"]->id }}">More...</a></li>
                            </ul>
                    </div>
                @endforeach
        </div>

    </div>

    <div style = "clear:both;"></div>
    <div class = "container text-center" style = "margin-top:5%;"><a href="{{ url("catalog") }}"><button class = "btn btn-primary">View All</button></a></div>

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
        </style>
 <div style = "clear:both;"></div>
    <div class="container text-center phr-properties">
            <h2>Our Partners</h2>
            <div class="phr-line"></div>
            <div class="row" style = "margin-top:5%;">
                @foreach ($developers as $developer)
                <div class="phr-dev-wrap location_click" id = "{{ $developer->id }}">
                        <img src="{{ url("") }}/plethora/storage/app/public//developers/{{ $developer->image }}" class="img-responsive">
                        <div class="phr-fade-block">
                            <h2>{{ $developer->name }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="clearfix"></div>


    <!-- Admin header -->
    @include('landing.layouts.footer')
    <!-- Admin header -->
    @include('landing.layouts.scripts')

    <script>
        $(document).ready(function(){
            var searchCatalog = $(".searchCatalog");

            searchCatalog.click(function(e){
                var locId = $("#location_id").val();
                var devId = $("#developer_id").val();
                var catId = $("#category_id").val();
                window.location = window.location.href + "catalog/search/" + catId + "/" + locId + "/" + devId
            });

            $(document).on("click", ".carousel-item", function(){
                var location = $(this).attr("id");
                window.location = window.location.href + location + "/developers"
            })

            $(document).on("click", ".location_click", function(){

                var developer = $(this).attr("id");
                window.location = window.location.href + "catalog/search/" + 0 + "/" + 0 + "/" + developer
            })

        })
    </script>

</body>
</html>
