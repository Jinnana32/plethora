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
    @include('landing.layouts.agent_navigation')

    <!-- Plethora Hero -->
    @include('landing.layouts.abode_search')

 <section style = "background-color:#fff;padding-bottom:10em;padding-top:2em;" id="gallery">
       <div class="container">
         <div class="row">
               <div class="col-md-12">
                   @if ($showAbodes == 0)
                   <div class = "empty_brand">
                        <i class = "fa fa-inbox"></i>
                        <p>This list feels empty. Please search for a abode<p>
                    </div>
                   @else
                    @if(sizeof($abodes) < 1)
                    <div class = "empty_brand">
                        <i class = "fa fa-inbox"></i>
                        <p>No record found<p>
                    </div>
                    @else
                    <div class="phr-property-wrap">
                            @foreach ($abodes as $abode)
                                <div class="phr-property-find-item">
                                        <img class = "phr-catalog-developer" src = "{{ url("") }}/plethora/storage/app/public/developers/{{ $abode["dev_image"] }}" />
                                        @if ($abode["has_brand"] != 0)
                                            <img class = "phr-catalog-branding" src = "{{ url("") }}/plethora/storage/app/public/brandings/{{ $abode["branding_image"] }}" />
                                        @endif
                                        @if ($abode["current"]->image != "")
                                        <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $abode["current"]->image }}">
                                        @else
                                        <img src="{{ url("") }}/vendor/img/temp_image.png">
                                        @endif
                                            <div class = "phr-twin-header">
                                                <a href = "{{ url("abode") }}/{{ $abode["current"]->id }}" target = "_blank"><h2 class = "twin-left">{{ $abode["current"]->display_name }}</h2></a>
                                                <h2 class="twin-right">{{ date("M d, Y", strtotime($abode["current"]->date)) }}</h2>
                                            </div>
                                            <div class = "clearfix"></div>
                                            <p class="phr-monthly">
                                                    @if ($abode["current"]->monthly_payment < 1) Price Not Indicated
                                                    @else
                                                        &#8369 {{ number_format($abode["current"]->monthly_payment) }}/monthly
                                                    @endif </p>
                                                    <p class="phr-category">({{ $abode["category"] }})</p>
                                            <p class = "phr-address">
                                                @if($abode["current"]->street_barangay != "")
                                                {{ $abode["current"]->street_barangay }}
                                                @endif
                                                @if($abode["current"]->sublocation != "")
                                                ,{{ $abode["current"]->sublocation }},
                                                @endif
                                                {{ $abode["location"] }}
                                            </p>
                                            <ul>
                                                @foreach (array_slice($abode["features"], 0, 4) as $feature)
                                                    <li>{{ $feature["feature"] }}: {{ $feature["value"] }}</li>
                                                @endforeach
                                            </ul>
                                            <a class = "btn btn-info btn-sm" href="{{ url("abode") }}/{{ $abode["current"]->id }}" target="_blank"> View Details</a>
                                    </div>
                            @endforeach
                    </div>
                        @endif
                    @endif
               </div>

         </div>
       </div>
       <div style="clear:both;"></div>
</section>



    <!-- Admin header -->
    @include('landing.layouts.footer')

    <!-- Admin header -->
    @include('landing.layouts.abode_search_script')

    <script>
        $(document).ready(function(){
            $(document).on("submit", "#searchAbode", function(e){
                e.preventDefault()
                var options = []
                var searchQuery = $(this).serializeObject();
                console.log(searchQuery)
                $("#searchAbode")[0].submit()
            })
        })
    </script>

</body>
</html>
