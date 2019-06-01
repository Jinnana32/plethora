<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Admin header -->
    @include('public.layout.pub_header')
    <link href="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/noUiSlider/8.5.1/nouislider.js"></script>
    <link rel="stylesheet" href="{{ url("vendor/css/phr-listing.css") }}">

    <style>
#input-select,
#input-number {
	padding: 7px;
	margin: 15px 5px 5px;
	width: 70px;
}

.noUi-horizontal {
    height: 10px;
    margin-bottom: 30px;
}
.noUi-horizontal .noUi-handle {
    width: 30px;
    height: 30px;
    left: -17px;
    top: -10px;
    border-radius: 50%;
    outline: 0;
}
    </style>

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

                @foreach ($abodes as $abode)

                <div class="listing-item">

                        <a href="#" class="listing-img-container" style="height: 326px;">
                            <div class="listing-img-content">
                                <span class="listing-price">₱ {{ $abode->monthly_payment }} / Month</span>
                            </div>
                            <div class="listing-carousel gay owl-carousel owl-theme" style="opacity: 1; display: block;">
                                <div class="owl-wrapper-outer"><div class="owl-wrapper" style="width: 552px; left: 0px; display: block; transition: all 0ms ease 0s; transform: translate3d(0px, 0px, 0px);"><div class="owl-item" style="width: 276px;"><div><img src="{{ $abode->image }} " height="250px" style="height: 326px;"></div></div></div></div>
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
                                <img style = "display:inline;width: 32px;height: 32px;border-radius: 100%;" src = "{{ \App\Models\PersonalInformation::where(['user_id' => $abode->assigned_to])->first()->image }}" />
                                <a href="#">
                                    {{ \App\Models\PersonalInformation::where(['user_id' => $abode->assigned_to])->first()->first_name }}
                                    {{ \App\Models\PersonalInformation::where(['user_id' => $abode->assigned_to])->first()->last_name }}
                                </a>
                                <!-- span data-toggle="tooltip" style="margin-top: 15px; display:block; cursor: pointer;" onclick="setRate(3198)" data-placement="top" title="Save Listing" id="titleFave">
                                    <i id="star3198" class="fa fa-star-o"></i> Save
                                </span -->
                            </div>

                        </div>

                    </div>

                @endforeach

                </div>

            </div>
          </section>

  <!-- Admin header -->
  @include('public.layout.pub_footer')

  <script>

    $(document).ready(function(){

        renderDownPayment();
        renderTotalPayment();

    function renderDownPayment(){
        var select = document.getElementById('down-input-select');

// Append the option elements
for ( var i = 200; i <= 1000; i++ ){

	var option = document.createElement("option");
		option.text = i;
		option.value = i;

	select.appendChild(option);
}


var html5Slider = document.getElementById('down_payment_slider');

noUiSlider.create(html5Slider, {
	start: [ 500, 800 ],
	connect: true,
	range: {
		'min': 200,
		'max': 1000
	}
});

var inputNumber = document.getElementById('down-input-number');

html5Slider.noUiSlider.on('update', function( values, handle ) {

	var value = values[handle];

	if ( handle ) {
		inputNumber.value = value * 1000;
	} else {
		select.value = Math.round(value);
	}
});

select.addEventListener('change', function(){
	html5Slider.noUiSlider.set([this.value, null]);
});

inputNumber.addEventListener('change', function(){
	html5Slider.noUiSlider.set([null, this.value]);
});
    }

    function renderTotalPayment(){
        var xselect = document.getElementById('total-input-select');

// Append the option elements
for ( var i = 200; i <= 1000; i++ ){

	var option = document.createElement("option");
		option.text = i;
		option.value = i;

	xselect.appendChild(option);
}


var xhtml5Slider = document.getElementById('total_payment_slider');

noUiSlider.create(xhtml5Slider, {
	start: [ 500, 800 ],
	connect: true,
	range: {
		'min': 200,
		'max': 1000
	}
});

var xinputNumber = document.getElementById('total-input-number');

xhtml5Slider.noUiSlider.on('update', function( values, handle ) {

	var value = values[handle];

	if ( handle ) {
		xinputNumber.value = value * 1000;
	} else {
		xselect.value = Math.round(value);
	}
});

xselect.addEventListener('change', function(){
	xhtml5Slider.noUiSlider.set([this.value, null]);
});

xinputNumber.addEventListener('change', function(){
	xhtml5Slider.noUiSlider.set([null, this.value]);
});
    }


})
  </script>

</body>
</html>
