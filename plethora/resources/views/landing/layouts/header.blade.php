<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Plethora Realty Homes</title>
<meta http-equiv="Content-Security-Policy" content="frame-ancestors https://web.facebook.com https://www.facebook.com">

<!-- Bootstrap core CSS -->
<link href="{{ url("css/bootstrap.min.css") }}" rel="stylesheet">
<!-- Custom fonts for this template -->
<link href="{{ url("vendor/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
<!-- Listings -->
<link rel="stylesheet" href="{{ url("vendor/css/phr-listing.css") }}">

<link rel="stylesheet" href="{{ url("vendor/css/plethora-public.css") }}"/>
<!-- Custom Css -->
<link rel="stylesheet" href="{{ url("vendor/css/revamp.min.css") }}"/>

<style>
.modal-backdrop {
  opacity: 0.5;
}
</style>

<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v4.0'
    });
  };

  (function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your customer chat code -->
<div class="fb-customerchat"
  attribution=setup_tool
  page_id="101544571196382"
  theme_color="#27ae60"
  logged_in_greeting="Welcome to plethora homes! How may i help you?"
  logged_out_greeting="Welcome to plethora homes! How may i help you?">
</div>

<div class="fb-customerchat"
page_id="101544571196382">
</div>

<style>
    .lead_gen {
      list-style: none;
      padding:0;
    }

    .lead_gen li {
      border: 1px solid blue;
      padding:2% 0;
      margin-bottom: 1rem;
      text-align:center;
      border-radius: 20px;
      cursor: pointer;
    }

    .lead_gen li:hover {
      background-color: blue;
      color:#fff;
    }
  </style>

  <div class="modal" tabindex="-1" role="dialog" id = "lead_generation">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Plethora homes realty</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body lead_body">
            <ul class = "lead_gen">
              <li class = "lead_action" id = "speak_agent">Can i speak to an agent?</li>
              <li class = "lead_action" id = "area_serve">What areas do you serve?</li>
              <li class = "lead_action" id = "sched_viewing">Can I Schedule a viewing?</li>
              <li class = "lead_action" id = "avail_props">Are there any new properties available?</li>
            </ul>
          </div>
        </div>
      </div>
  </div>

  <div class="lead-contact" style="display:none;">
    <form action="{{ route('inbox.inquiry.submit') }}" method="POST">
    {{ csrf_field() }}
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Message</label>
                <textarea id="" cols="20" rows="2" class = "form-control lead_message" name = "message"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Complete name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name = "name" required/>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <textarea name="" id="" cols="20" rows="5" class = "form-control" name = "address"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                    <label for="exampleInputEmail1">Contact number</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name = "contact" required/>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                    <label for="exampleInputEmail1">Facebook</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name = "email" required/>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </div>
    </form>
  </div>