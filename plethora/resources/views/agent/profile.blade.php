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

 <!-- Header -->
 @include('public.layout.pub_agent_masthead')

 <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
            <form  action="{{ route("edit_info.submit") }}" method = "POST">
            {{ csrf_field() }}
          <div class = "col-md-12  col-form-header">
            <div class="dot-header"></div>
            <span>My profile</span>
          </div>
          <hr/>

          <!-- Profile card -->
          <div class="col-md-12">
            <div class="phr-profile-card">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Username</label>
                            <input type="text" class="form-control" value = "{{ $agent["username"] }}" id="exampleInputEmail1" name = "username" required/>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">New password</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name = "password"/>
                                <input type="hidden" class="form-control" id="exampleInputEmail1" value = "{{ Auth::user()->id }}" name = "agent_id"/>
                        </div>
                    </div>
                </div>
            </div>
          </div>

          <!-- Profile card -->
          <div class="col-md-12" style = "margin-top:20px;">
                <div class="phr-profile-card">
                    <div class="row">

                        <div class="col-sm-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Permanent Address</label>
                                        <input type="text" class="form-control" value = "{{ $agent["address"] }}" id="exampleInputEmail1" name = "address" required/>
                                </div>
                        </div>

                        <div class="col-sm-6">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Email</label>
                                        <input type="email" class="form-control" value = "{{ $agent["email"] }}" id="exampleInputEmail1" name = "email" required/>
                                </div>
                        </div>

                        <div class="col-sm-6">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Contact</label>
                                        <input type="text" class="form-control" value = "{{ $agent["contact"] }}" id="exampleInputEmail1" name = "contact" required/>
                                </div>
                        </div>

                        <div class="col-sm-6">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Referral/Public link</label>
                                        <input type="text" class="form-control" value = "{{ $agent["referral_link"] }}" id="exampleInputEmail1" name = "referral_link" required/>
                                </div>
                        </div>

                        <div class="col-sm-12 text-right col-md-offset-6">
                            <button class = "btn btn-success">Update</button>
                        </div>
                    </div>
                </div>
              </div>


              <form>
        </div><!-- End sidepanel(col-md-9) -->

          </div><!-- End row -->
    </div><!-- End container -->


<style>
        /* The snackbar - position it at the bottom and in the middle of the screen */
        #editAccount {
        visibility: hidden; /* Hidden by default. Visible on click */
        min-width: 250px; /* Set a default minimum width */
        margin-left: -125px; /* Divide value of min-width by 2 */
        background-color: #333; /* Black background color */
        color: #fff; /* White text color */
        text-align: center; /* Centered text */
        border-radius: 2px; /* Rounded borders */
        padding: 16px; /* Padding */
        position: fixed; /* Sit on top of the screen */
        z-index: 1; /* Add a z-index if needed */
        left: 50%; /* Center the snackbar */
        bottom: 30px; /* 30px from the bottom */
        }

        /* Show the snackbar when clicking on a button (class added with JavaScript) */
        #editAccount.show {
        visibility: visible; /* Show the snackbar */
        /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
        However, delay the fade out process for 2.5 seconds */
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
        }

        /* Animations to fade the snackbar in and out */
        @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
        }

        @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
        }

        @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
        }

        @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
        }
    </style>
    <!-- The actual snackbar -->
    <div id="editAccount">You have updated successfully</div>
</section>

        <!-- Admin header -->
        @include('landing.layouts.footer')

        @if(session('success'))
        <script>
        (function(){
        showSnackbar("editAccount")
        })()
        </script>
        @endif

</body>
</html>
