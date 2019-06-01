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

    <!-- Plethora Hero -->
    <div class="phr-hero-slim">
    <div class = "container phr-hero-container">

    </div>
    </div>

    <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
            <div class="container">
              <div class="row">

                <!-- Admin header -->
                <div class="col-md-3">
                        <div class = "phr-card">
                            <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/listings"><button class = "btn btn-{{ $status == "listing" ? "primary" : "default" }} btn-block">Back to Listings</button></a>
                        </div>
                </div>

                <div class="col-md-9">
                    <div class = "col-md-12  col-form-header">
                      <div class="dot-header"></div>
                      <span>Find listings</span>
                    </div>
                    <hr/>

                    <div class="col-md-12 text-right" style = "margin-bottom:2rem;">
                            <button class = "btn btn-default create-agent-btn"> Find Abodes</button>
                    </div>

                    <div class="col-md-12">
                        <div class="listings-container list-layout">
                            @foreach ($abodes as $abode)

                            <div class="listing-item">

                                    <a href="#" class="listing-img-container" style="height: 326px;">
                                        <div class="listing-img-content">
                                            <span class="listing-price">₱ {{ $abode->monthly_payment }} / Month</span>
                                        </div>
                                        <div class="listing-carousel gay owl-carousel owl-theme" style="opacity: 1; display: block;">
                                            <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 552px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px);"><div class="owl-item" style="width: 276px;"><div><img src="{{ str_replace("/public", "", url("")) }}/storage/app/public/abode/{{ $abode->image }}" height="250px" style="height: 326px;"></div></div></div></div>
                                        <div class="owl-controls clickable" style="display: none;"><div class="owl-pagination"><div class="owl-page active"><span class=""></span></div></div><div class="owl-buttons"><div class="owl-prev"></div><div class="owl-next"></div></div></div></div>
                                    </a>

                                    <div class="listing-content col-md-12">
                                        <div class="listing-title">
                                            <h4><a href="#">{{ $abode->project_name }}</a></h4>
                                            <b> {{ Illuminate\Support\Facades\DB::table("category")->where("id", $abode->category)->first()->category }}</b> (Category)<br>
                                            <i class="fa fa-map-marker"></i>
                                            {{ $abode->location }} <br>
                                            <span><i class="fa fa-calendar-o"></i> Mar. 15, 2017</span> <br>
                                            <span><i class="fa fa-home"></i> {{ $abode->model_unit }} {{ $abode->unit_id }}</span>
                                            <a class="details button border" href="{{ url("abode") }}/{{ $abode->id }}" target="_blank" style="right:0px; top: 38%;">Details</a>
                                            <a class="details button border" href="{{ url("agent") }}/{{ $abode->id }}/tags/{{ $agent["username"] }}" style="right:0px; top: 70%;">Tag Me</a>
                                        </div>

                                        <ul class="listing-features" style="padding: 10px 0px 24px 20px;">

                                            <li title="Lot Area">
                                                    <span>
                                                        <i class="fa fa-map"></i>
                                                        2000 sqm
                                                    </span>
                                                </li>
                                            <li>
                                                <span>
                                                    <img src="{{ url("vendor/img/listing.png") }}" width="20" style="margin-right: 10px;margin-top: -3px">
                                                    {{ $abode->bedrooms }}
                                                </span>
                                                </li>
                                                <li>
                                                    <span>
                                                        <img src="{{ url("vendor/img/listing-2.png") }}" width="20" style="margin-right: 10px;margin-top: -3px">
                                                        {{ $abode->no_of_toilets }}
                                                    </span>

                                                </li>
                                            <li>
                                                <span>
                                                        <i class="fa fa-eye"></i>
                                                    1261
                                                </span>
                                            </li>

                                        </ul>

                                        <div class="listing-footer gay">
                                            <!-- span data-toggle="tooltip" style="margin-top: 15px; display:block; cursor: pointer;" onclick="setRate(3198)" data-placement="top" title="Save Listing" id="titleFave">
                                                <i id="star3198" class="fa fa-star-o"></i> Save
                                            </span -->
                                        </div>

                                    </div>

                                </div>

                            @endforeach

                    </div>
                    </div>

                </div>

              </div>
            </div>
     </section>

    <!-- Admin header -->
    @include('landing.layouts.footer')

</body>
</html>
