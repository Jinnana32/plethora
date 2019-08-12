<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Admin header -->
    @include('landing.layouts.header')
</head>

<body id="page-top">

    <!-- Plethora Navigation -->
    @include('landing.layouts.headline')

    <!-- Plethora Navigation -->
    @include('landing.layouts.navigation')

    @include('landing.layouts.abode_search')

    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="phr-property-wrap">
                    @foreach ($abodes as $abode)
                    <div class="phr-property-item" style="margin-top:4em;">
                        <img class="phr-catalog-developer"
                            src="{{ url("") }}/plethora/storage/app/public/developers/{{ $abode["dev_image"] }}" />
                        @if ($abode["has_brand"] != 0)
                        <img class="phr-catalog-branding"
                            src="{{ url("") }}/plethora/storage/app/public/brandings/{{ $abode["branding_image"] }}" />
                        @endif
                        @if ($abode["current"]->image != "")
                        <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $abode["current"]->image }}">
                        @else
                        <img src="http://localhost/plethora/public/vendor/img/temp_image.png">
                        @endif
                        <div class="phr-twin-header">
                            <a href="{{ url("abode") }}/{{ $abode["current"]->id }}">
                                <h2 class="twin-left">{{ $abode["current"]->display_name }}</h2>
                            </a>
                            <h2 class="twin-right">{{ date("M d, Y", strtotime($abode["current"]->date)) }}</h2>
                        </div>
                        <div class="clearfix"></div>
                        <p class="phr-monthly">
                            @if ($abode["current"]->monthly_payment < 1) Contact Selling Agent
                            @else
                                &#8369 {{ number_format($abode["current"]->monthly_payment) }}/monthly
                            @endif </p>
                            <p class="phr-category">({{ $abode["category"] }})</p>
                        <p class="phr-address">{{ $abode["location"] }}, {{ $abode["current"]->address }}</p>
                        <ul>
                            @foreach (array_slice($abode["features"], 0, 4) as $feature)
                            <li>{{ $feature["feature"] }}: {{ $feature["value"] }}</li>
                            @endforeach
                            <li><a style="padding:0;" href="{{ url("abode") }}/{{ $abode["current"]->id }}">More...</a>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div style="clear:both;margin-top:10em;"></div>

    <!-- Admin header -->
    @include('landing.layouts.footer')
    <!-- Admin header -->
    @include('landing.layouts.abode_search_script')


</body>

</html>