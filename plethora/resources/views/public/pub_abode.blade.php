<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Admin header -->
    @include('public.layout.pub_header')
    <link href="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.js"></script>
    <link rel="stylesheet" href="{{ url("vendor/css/phr-listing.css") }}">

</head>

<body id="page-top">

  <!-- Admin header -->
  @include('public.layout.pub_subnav')

  <!-- Header -->
  <header class="sub-masthead">
    <div class="container">
        <div class="row">
            <div class="col-md-1 sub-mast-back" style = "font-size:2rem;">
                <a href = "{{ url("/") }}"><i class = "fa fa-angle-left"></i></a>
            </div>
            <div class="col-md-6 sub-mast-text">
                <h1>Find a new abode</h1>
            </div>
        </div>
    </div>
  </header>

  <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <h5 class="section-heading text-uppercase">Search</h5>
            </div>
          </div>
          <div class="row">

                <div class="col-md-3">
                        <div class="form-group form-group-select">
                            <label for="exampleInputEmail1" style = "color:#3d3d3d;">Category</label>
                            <select class="form-control" name = "dev_id" id = "phrDevelopers">
                                    <option value = "1">Bell flor</option>
                            </select>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group form-group-select">
                            <label for="exampleInputEmail1" style = "color:#3d3d3d;">Location</label>
                            <select class="form-control" name = "dev_id" id = "phrDevelopers">
                                    <option value = "1">Bell flor</option>
                            </select>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                                    <label for="exampleInputEmail1">No. of bedrooms</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                            </div>
                    </div>

                    <div class="col-md-3">
                            <div class="form-group">
                                        <label for="exampleInputEmail1">No. of toilet</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                                </div>
                    </div>

                    <div class="col-md-6" style = "padding-top:1%;">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Monthly Payment</label>
                        <div id="down_payment_slider"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <input class="form-control" style = "display: block;width: 100%;"  type="number" id="down-input-select" min="200" max="1000" step="1" id="down-input-number">
                            </div>
                            <div class="col-md-6" style = "text-align:right;">
                                <input class="form-control" style = "display: block;width: 100%;"  type="number" min="200" max="1000" step="1" id="down-input-number">
                            </div>
                        </div>
                            </div>
                    </div>

                    <div class="col-md-6" style = "padding-top:1%;">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Total Amount Price</label>
                            <div id="total_payment_slider"></div>
                            <div class="row">
                                <div class="col-md-6">
                                    <input class="form-control" style = "display: block;width: 100%;"  type="number" id="total-input-select" min="200" max="1000" step="1" id="total-input-number">
                                </div>
                                <div class="col-md-6" style = "text-align:right;">
                                    <input class="form-control" style = "display: block;width: 100%;" type="number" min="200" max="1000" step="1" id="total-input-number" value= "0">
                                </div>
                            </div>
                            </div>
                        </div>

                    <div class="col-md-2" style = "padding-top:1%;">
                        <a href = "{{ url("abode") }}"><button class = "btn btn-primary">Find abode</button></a>
                    </div>

          </div>
        </div>
      </section>

      <section style = "background-color:#fff;padding-top:40px;padding-bottom:40px;" id="gallery">

        <div class = "container">
            <div class="listings-container list-layout">


            </div>
        </div>
          </section>

  <!-- Admin header -->
  @include('public.layout.pub_footer')

  <script>

  </script>

</body>
</html>
