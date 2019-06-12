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
    @include('landing.layouts.agent_navigation')

 <!-- Header -->
 @include('public.layout.pub_agent_masthead')

 <section style = "background-color:#f3f3f3;padding-bottom:10em;" id="gallery">
       <div class="container">
         <div class="row">

           <div class="col-md-12">
               <div class = "col-md-12  col-form-header">
                 <div class="dot-header"></div>
                 <span>My listings</span>
               </div>
               <hr/>

               <div class="col-md-12 text-right" style = "margin-bottom:2rem;">
                       <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/find_list"><button class = "btn btn-default create-agent-btn"> Find Abodes</button></a>
               </div>

               <div class="col-md-12">
                    <div class="phr-property-wrap">
                            @foreach ($abodes as $abode)
                                <div class="phr-property-item">
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
                                            <a href = "{{ url("abode") }}/{{ $abode["current"]->id }}"><h2 class = "twin-left">{{ $abode["current"]->display_name }}</h2></a>
                                            <h2 class = "twin-right">{{ $abode["current"]->date }}</h2>
                                        </div>
                                        <div class = "clearfix"></div>
                                        <p class = "phr-monthly">{{ $abode["current"]->monthly_payment }}/monthly</p>
                                        <p class = "phr-category">({{ $abode["category"] }})</p>
                                        <p class = "phr-address">{{ $abode["location"] }}, {{ $abode["current"]->address }}</p>
                                        <ul>
                                            @foreach ($abode["features"] as $feature)
                                                <li>{{ $feature["feature"] }}: {{ $feature["value"] }}</li>
                                            @endforeach
                                        </ul>
                                </div>
                            @endforeach
                    </div>
               </div>

           </div>

         </div>
       </div>
       <div style="clear:both;"></div>
</section>



    <!-- Admin header -->
    @include('landing.layouts.footer')

</body>
</html>
