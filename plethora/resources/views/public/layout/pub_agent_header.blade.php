<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Plethora Realty Homes</title>
<meta http-equiv="Content-Security-Policy" content="frame-ancestors https://web.facebook.com">
<!-- Bootstrap core CSS -->
<link href="{{ url("css/bootstrap.min.css") }}" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="{{ url("vendor/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

 <!-- Custom styles for this template -->
 <link href="{{ url("vendor/css/agency.css") }}" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="{{ url("vendor/css/grayscale.min.css") }}" rel="stylesheet">

<link rel="stylesheet" href="{{ url("vendor/css/plethora-public.css") }}"/>

<style>
  .form-group.form-group-select {
          position:relative;
  }

  .form-group.form-group-select > i {
      position: absolute;
      right: 5%;
      top: 58%;
      font-size:1.2em;
      color:#FEA30A;
      font-weight: bold;
  }

  select.form-control {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
      padding: 10px 10px 10px 10px;
      background-size: 30px;
      color: #555;
      font-size: 14px;
      height: 40px;
  }

  .form-control {
      border-radius: 10px;
      border-color: #ebebeb;
      padding-top: 20px;
      padding-bottom: 20px;
  }

  .form-control:focus {
  border-color:#FEA30A;
  }

  .form-group label {
      font-size: .9em;
      font-weight: lighter;
      padding-left: 5px;
  }


  .phr-listing-updates div {
    overflow: hidden;
    position: relative;
    text-align: center;
  }

  .phr-listing-updates div button {
    width: 150px;
    position: absolute;
    bottom: 20px;
    left:50%;
    margin-left:-75px;
    background-color: rgba(0,0,0,0.7);
    border:0;
    color:#fff;
    font-weight: 300;
    padding: 10px 0;
  }


#phr-about {
    position: relative;
    width: 100%;
    height: auto;
    min-height: 50rem;
    padding: 15rem 0;
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.3)), color-stop(75%, rgba(22, 22, 22, 0.7)), to(#161616)), url("https://images.pexels.com/photos/279719/pexels-photo-279719.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
    background: linear-gradient(to bottom, rgba(22, 22, 22, 0.3) 0%, rgba(22, 22, 22, 0.7) 75%, #161616 100%), url("https://images.pexels.com/photos/279719/pexels-photo-279719.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260");
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}

#phr-updates-section {
  position: relative;
    width: 100%;
    height: auto;
    min-height: 50rem;
    padding: 15rem 0;
    background: -webkit-gradient(linear, left top, left bottom, from(rgba(22, 22, 22, 0.3)), color-stop(75%, rgba(22, 22, 22, 0.7)), to(#161616)), url("https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500");
    background: linear-gradient(to bottom, rgba(22, 22, 22, 0.3) 0%, rgba(22, 22, 22, 0.7) 75%, #161616 100%), url("https://images.pexels.com/photos/276724/pexels-photo-276724.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500");
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
}

.btn {
  -webkit-box-shadow: none!important;
	-moz-box-shadow: none!important;
  box-shadow: none !important;
  margin:0 !important;
  padding: 0.8rem 2rem;
}

.btn-default {
    background-color: #fff;
    border: 0;
    border-radius: 0 !important;
    padding: 10px 15px;
}

.btn-block {
    padding: 1.2rem 2rem !important;
}

.btn-default:hover {
  background-color: #FEA30A;
  color:#fff;
}

.btn-primary {
    background-color: #ee9501;
    border: 0;
    padding: 10px 15px;
    border-radius: 0 !important;
}

</style>


<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      xfbml            : true,
      version          : 'v3.2'
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
  page_id="1021835851537559"
  theme_color="#FEA30A"
  logged_in_greeting="Hi! How can we help you?"
  logged_out_greeting="Hi! How can we help you?">
</div>

<div class="fb-customerchat"
 page_id="1021835851537559">
</div>


<link rel="stylesheet" href="{{ url("vendor/css/phr-listing.css") }}">

    <style>
        .phr-agent-image {
            width: 200px;
            height: 200px;
            border-radius: 100%;
        }

        .sub-masthead {
            padding: 7rem 0 1.5rem;
        }

        .sub-mast-info {
            background: rgba(0,0,0,0.5);
            padding-left:2rem;
            margin-top:-2rem;
            border-radius: 10px;
        }

        .sub-mast-info > p {
            line-height: 1.2px;
        }

        .profile-edit {
            position: absolute;
            right: 1rem;
            top:1rem;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .profile-edit:hover {
            color:orange;
        }

        .phr-card {
            height:100%;
            background-color: #fff;
            box-shadow: 0 1px 14px rgba(0,0,0,0.09);
            padding:10% 0   ;
        }

        .phr-profile-card {
            height:100%;
            background-color: #fff;
            box-shadow: 0 1px 14px rgba(0,0,0,0.09);
            padding:2% 2%;
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

<script>
</script>