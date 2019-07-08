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

    <div class="row" style = "margin-top:10%;">
        <div class="col-md-4">
                <div class="phr-search-form" style = "top:0;">
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

        <div class="col-md-7">
            <div class="container">
                    <div class="phr-property-wrap">
                            @foreach ($abodes as $abode)
                                <div class="phr-property-item" style = "margin-top:2em;">
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
    </div>
    </div>

    <div style = "clear:both;margin-top:10em;"></div>

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
                window.location = "{{ url("") }}" + "/catalog/search/" + catId + "/" + locId + "/" + devId
            });
        })
    </script>

</body>
</html>
