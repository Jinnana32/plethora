<!DOCTYPE html>
<html lang="en">

<head>
     <!-- Admin header -->
     @include('landing.layouts.header')
</head>

<body id="page-top">

  <!-- PHR dialogs -->
  @include('dialog.phr_dialogs')


  <!-- Plethora Navigation -->
  @include('landing.layouts.headline')

<!-- Plethora Navigation -->
@include('landing.layouts.navigation')

  <!-- Plethora Hero -->
  <div class="phr-hero-slim">
      <div class = "container phr-hero-container">

      </div>
      </div>

  <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:180px;" id="gallery">
        <div class="container">
          <form id = "create_agent_form" method="POST">
          <div class="row">

                <form action="{{ route('login.submit') }}" method="POST">
                        {{ csrf_field() }}

                    <div class="col-md-6 offset-3">

                    <div class = "col-md-12">
                            <div class="col-md-12">

                                    @if($errors->has('unauthorized'))
                                        <div class="alert alert-warning alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{ $errors->first('unauthorized') }}
                                        </div>
                                    @endif

                                    @if(session('success'))
                                    <div class="alert alert-success alert-dismissible">
                                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                            {{session('success')}}
                                    </div>
                                    @endif

                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Username</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1" name = "username" required/>

                                            @if($errors->has('username'))
                                            <span class = "help-block">
                                                <strong>{{ $errors->first('username') }}</strong>
                                            </span>
                                            @endif

                                    </div>
                            </div>
                    </div>

                    <div class = "col-md-12">
                            <div class="col-md-12">
                                    <div class="form-group form-group-select">
                                            <label for="exampleInputEmail1">Password</label>
                                            <input type="password" class="form-control phr_password" id="exampleInputEmail1" name = "password" required/>
                                            <i class="fa fa-eye password_toggle" aria-hidden="true"></i>
                                            @if($errors->has('username'))
                                            <span class = "help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                            @endif
                                    </div>
                            </div>
                    </div>

                    <!-- /.col -->
                    <div class="col-md-12" style = "margin-top:30px;">
                          <div class="col-md-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                          </div>
                    </div>

                    </div>
                    </form>

          </div>
         </form>
        </div>
      </section>


 <!-- Admin header -->
 @include('landing.layouts.footer')

 <script>
                var password_toggle = $(".password_toggle");
                            password_toggle.click(function(){
                                var phr_password = $(".phr_password");
                                if(phr_password.attr("type") == "password"){
                                    phr_password.attr("type", "text")
                                }else{
                                    phr_password.attr("type", "password")
                                }
                            })
               </script>

</body>
</html>
