<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
      <style>
        .phr-card {
            height:100%;
            background-color: #fff;
            box-shadow: 0 1px 14px rgba(0,0,0,0.09);
            padding:10% 5%;
        }
        .phr-agent-image {
            width: 200px;
            height: 200px;
            border-radius: 100%;
        }
        .sub-mast-info {
            background: rgba(0,0,0,0.5);
            padding-left:2rem;
            padding-top:20px;
            margin-top:-2rem;
            border-radius: 10px;
            position: relative;
        }

        .phr-star-holder {
            position: absolute;
            right:1rem;
            top:1rem;
        }

        .phr-star-holder .checked {
            color:yellow;
        }
      </style>
</head>

<body id="page-top">

     <!-- Plethora Navigation -->
     @include('landing.layouts.headline')

    <!-- Plethora Navigation -->
    @include('landing.layouts.navigation')

  <!-- Header -->
  <header class="sub-masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-1 sub-mast-back" style = "font-size:2rem;">
                    <a href = "{{ url("/") }}"><i class = "fa fa-angle-left"></i></a>
                </div>
                <div class="col-md-3 sub-mast-text" style = "margin-top:-30px;">
                    <img class = "phr-agent-image" src = "{{ $agent["image"] }}" />
                </div>
                <div class="col-md-8 sub-mast-text sub-mast-info">
                    <h2>{{ $agent["name"] }}</h2>
                    <p>{{ $agent["address"] }}</p>
                    <p><i class = "fa fa-phone"></i> {{ $agent["contact"] }}</p>
                    <p><i class = "fa fa-envelope"></i> {{ $agent["email"] }}</p>
                </div>
            </div>
        </div>
      </header>

      <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
            <div class="container">
              <div class="row">

                <div class="col-md-8">
                    <h4>My listings</h4>
                    <hr/>
                    <div class="phr-property-wrap" style = "margin-top:2em;">
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
                                    <p class = "phr-category">({{ $abode["category"] }})</p>
                                    <p class = "phr-address">{{ $abode["location"] }}, {{ $abode["current"]->address }}</p>
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

                <div class="col-md-4">
                    <div class = "phr-card">

                        <h3>Contact</h3>
                        <p>{{ $agent["name"] }}</p>

                        <form>
                        <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                        </div>

                        <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                        </div>

                        <div class="form-group">
                                <label for="exampleInputEmail1">Message</label>
                                <textarea class = "form-control" name="message" id="1" cols="10" rows="10"></textarea>
                        </div>

                        <button class = "btn btn-primary btn-block">Submit</button>
                        </form>
                    </div>
                </div>

              </div>
            </div>
          </section>


    <!-- Admin header -->
    @include('landing.layouts.footer')

</body>
</html>
