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

    <!-- Plethora headline -->
    <div class = "phr-headline">
        <div class="container text-right">
            <span><i class="fa fa-inbox"></i> plethorahomes@gmail.com</span>
            <span><i class="fa fa-phone"></i> 0921-7298-758</span>
        </div>
    </div>

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
                    <p><a href= "{{ url("") }}/register/{{ $agent["referral_link"] }}"><h5 style = "font-size:0.8em!important;">Check my referral link</h5></a></p>

                </div>
            </div>
        </div>
      </header>

      <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
            <div class="container">
              <div class="row">

                <div class="col-md-8">
                    <h2>My listings</h2>
                    <div class="phr-property-wrap">
                        @foreach ($abodes as $abode)
                               @if ($abode !== null)
                               <div class="phr-property-item phr-catalog-item">
                                    <img class = "phr-catalog-developer" src = "{{ url("") }}/plethora/storage/app/public/developers/{{ $abode->dev_image }}" />
                                    @if ($abode->has_brand != 0)
                                        <img class = "phr-catalog-branding" src = "{{ url("") }}/plethora/storage/app/public/brandings/{{ $abode->branding_image }}" />
                                    @endif
                                    @if ($abode->image != "")
                                    <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $abode->image }}">
                                    @else
                                    <img src="http://localhost/plethora/public/vendor/img/temp_image.png">
                                    @endif
                                        <div class = "phr-twin-header">
                                            <h2 class = "twin-left">{{ $abode->display_name }}</h2>
                                            <h2 class = "twin-right">{{ $abode->date }}</h2>
                                        </div>
                                        <div class = "clearfix"></div>
                                        <p class = "phr-monthly">{{ $abode->monthly_payment }}/monthly</p>
                                        <p class = "phr-category">({{ $abode["category"] }})</p>
                                        <p class = "phr-address">{{ $abode["location"] }}, {{ $abode->address }}</p>
                                        <ul>

                                        </ul>
                                </div>
                                <div style = "clear:both;"></div>
                               @endif
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
