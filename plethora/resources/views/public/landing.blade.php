<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Admin header -->
    @include('public.layout.pub_header')

    <style>
    .gal {


	-webkit-column-count: 3; /* Chrome, Safari, Opera */
    -moz-column-count: 3; /* Firefox */
    column-count: 3;


	}
	.gal img{ width: 100%; padding: 7px 0;}
@media (max-width: 500px) {

		.gal {


	-webkit-column-count: 1; /* Chrome, Safari, Opera */
    -moz-column-count: 1; /* Firefox */
    column-count: 1;


	}

	}</style>

</head>

<body id="page-top">

  <!-- Admin header -->
  @include('public.layout.pub_nav')

  <!-- Header -->
  <header class="masthead">
    <div class="container d-flex h-100 align-items-center">
      <div class="mx-auto text-center">
        <h1 class="mx-auto my-0 text-uppercase">Plethora Homes</h1>
        <h2 class="text-white-50 mx-auto mt-2 mb-5">It’s tangible, it’s solid, it’s beautiful. It’s artistic, from our standpoint, and We just love real estate</h2>
        <a href="#abode" class="btn btn-primary js-scroll-trigger">Get Started</a>
      </div>
    </div>
  </header>

  <!-- About Section -->
  <section id="abode" class="about-section text-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <h2 class="text-white mb-4">Find your new Abode</h2>
          <hr style = "background-color:#515151;"/>
          <p class="text-white mb-4">If you don't own a home, buy one now</p>
          <div class="row">

                <div class="col-md-4">
                    <div class="form-group form-group-select">
                        <label for="exampleInputEmail1" style = "color:#fff;">Category</label>
                        <select class="form-control" name = "dev_id" id = "phrDevelopers">
                                <option value = "1">Condominium</option>
                                <option value = "1">Apartment</option>
                                <option value = "1">House</option>
                                <option value = "1">Studio</option>
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group form-group-select">
                        <label for="exampleInputEmail1" style = "color:#fff;">Location</label>
                        <select class="form-control" name = "dev_id" id = "phrDevelopers">
                                <option value = "1">Jaro</option>
                                <option value = "1">Mandurriao</option>
                                <option value = "1">Molo</option>
                                <option value = "1">City Proper</option>
                                <option value = "1">Lapaz</option>
                                <option value = "1">Arevalo</option>
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-md-2" style = "padding-top:4.5%;">
                    <a href = "{{ url("abode") }}"><button class = "btn btn-primary">Find abode</button></a>
                </div>

          </div>
          </div>
      </div>
      <img src="img/ipad.png" class="img-fluid" alt="">
    </div>
  </section>

     <!-- About Section -->
     <section id="phr-about" class="phr-about-section text-center">
            <div class="container d-flex h-100 align-items-center">
                <div class="row">
                    <div class="col-md-6">
                            <h1 style = "color: #c0c0c0;"class="mx-auto my-0 text-uppercase">Plethora Homes</h1>
                            <h2 style = "font-size: 1.25rem;" class="text-white-50 mx-auto mt-2 mb-5">It’s tangible, it’s solid, it’s beautiful. It’s artistic, from our standpoint, and We just love real estate</h2>

                    </div>
                    <div class="col-md-6" style = "padding-top:3rem;">
                            <a href="#" style = "color:#FEA30A;background-color:rgba(0, 0, 0, 0.5);padding:10px 20px;">More About Us</a>
                    </div>
                </div>
            </div>
        </section>

        <section  style = "background: linear-gradient(to bottom,#161616 0,rgba(22,22,22,.7) 75%,rgba(22,22,23,.5) 100%);padding: 200px;"  id="agent">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-12 text-center">
                      <h2 class="section-heading text-uppercase" style = "color:#fff">Find an Agent</h2>
                      <h3 class="section-subheading text-muted" style = "color:#f3f3f3">Choose from our list of trust worthy agents</h3>
                    </div>
                  </div>
                  <div class="row">

                    @foreach ($agents as $agent)
                    <div class="col-sm-4">
                        <div class="team-member">
                          <img class="mx-auto rounded-circle" src="{{ $agent["image"] }}" alt="">
                          <h4>{{ $agent["name"] }}</h4>
                          <p class="text-muted">{{ $agent["position"] }}</p>
                          <ul class="list-inline social-buttons">
                            <li class="list-inline-item">
                              <i class = "fa fa-contact"></i> {{ $agent["contact"] }}
                            </li>
                            <li class="list-inline-item">
                                <i class = "fa fa-envelope"></i> {{ $agent["email"] }}
                            </li>
                            <li class="list-inline-item" style = "font-size:0.7em;">
                                plethorarealtyhomes.com/agent/{{ $agent["referral_link"] }}
                            </li>
                            </ul>
                            <a href = "{{ url("") }}/agent/{{ $agent["referral_link"] }}"><button style = "margin-top:20px;" class = "btn btn-info">View Profile</button></a>
                        </div>
                      </div>
                    @endforeach

                  </div>

                  <div class="col-md-12 text-center">
                      <a href="{{ url("agents") }}" style = "color:#FEA30A;background-color:rgba(0, 0, 0, 0.5);padding:10px 20px;">View all Agents</a>
                  </div>

                </div>
              </section>


               <!-- About Section -->
     <section id="phr-updates-section" class="phr-updates-section text-center">
        <div class="container d-flex h-100 align-items-center">
            <div class="row">
                <div class="col-md-6">
                        <h1 style = "color: #c0c0c0;"class="mx-auto my-0 text-uppercase">Newest Listing</h1>
                        <h2 style = "font-size: 1.25rem;" class="text-white-50 mx-auto mt-2 mb-5">It’s tangible, it’s solid, it’s beautiful. It’s artistic, from our standpoint, and We just love real estate</h2>

                </div>
                <div class="col-md-6" style = "padding-top:3rem;">
                        <a href="{{ url("abode") }}" style = "color:#FEA30A;background-color:rgba(0, 0, 0, 0.5);padding:10px 20px;">View All Listings</a>
                </div>

                <div class="col-md-12" style = "padding-top:3rem;">
                    <div class="row phr-listing-updates">
                      @foreach ($abodes as $abode)
                      <div class="col-md-4">
                          <a href = "{{ url("abode") }}/{{ $abode->id }}" style = "cursor:pointer;"><button>View listing</button></a>
                          <img style = "width:100%;height:100%" src="{{ $abode->image }}" alt="">
                      </div>
                      @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>


  <section style = "background-color:#f3f3f3;padding: 200px;" id="gallery">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                  <h2 class="section-heading text-uppercase">Gallery</h2>
                  <h3 class="section-subheading text-muted">See our latest updates and newest projects</h3>
                </div>
              </div>
            <div class="row">
                <hr>

                  <div class="gal">

                  <img src="https://preview.ibb.co/i0PmHk/1.jpg" alt="">

                    <img src="https://preview.ibb.co/mWpE3Q/2.jpg" alt="">

                      <img src="https://preview.ibb.co/i0PmHk/1.jpg" alt="">

                      <img src="https://preview.ibb.co/mysOxk/3.jpg" alt="">



                      <img src="https://preview.ibb.co/i0PmHk/1.jpg" alt="">
                        <img src="https://preview.ibb.co/mWpE3Q/2.jpg" alt="">

                      <img src="https://preview.ibb.co/i0PmHk/1.jpg" alt="">

                        <img src="https://preview.ibb.co/mysOxk/3.jpg" alt="">

                  </div>

                </div>
                </div>
        </div>
      </section>

  <!-- Contact Section -->
  <section class="contact-section bg-black" id = "contact">
    <div class="container">

      <div class="row">

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fa fa-inbox text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Address</h4>
              <hr class="my-4">
              <div class="small text-black-50">Iloilo City</div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fa fa-envelope text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Email</h4>
              <hr class="my-4">
              <div class="small text-black-50">
                <a href="#">plethorahomes@gmail.com</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
          <div class="card py-4 h-100">
            <div class="card-body text-center">
              <i class="fa fa-phone text-primary mb-2"></i>
              <h4 class="text-uppercase m-0">Phone</h4>
              <hr class="my-4">
              <div class="small text-black-50">+1 (555) 902-8832</div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- Admin header -->
  @include('public.layout.pub_footer')

</body>
</html>
