<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Admin header -->
    @include('public.layout.pub_header')
    <link rel="stylesheet" href="{{ url("vendor/css/phr-listing.css") }}">

    <style>
        .team-member {
            margin-bottom: 50px;
            text-align: center;
            background-color: #fff;
            border: 0;
            border-radius: 10px;
            padding: 30px 20px 20px;
        }

        .team-member h4 {
            color: #404040;
        }

        .team-member p {
            color: #505050 !important;
        }
    </style>

</head>

<body id="page-top">

  <!-- PHR dialogs -->
  @include('dialog.phr_dialogs')


 <!-- Navigation -->
 <nav class="navbar phr-dark navbar-expand-lg navbar-light fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger" href="#page-top"><span style = "color: #fea30acc">Plethora</span> Realty Homes</a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="{{ url("/") }}">Home</a>
              </li>

                <li class="nav-item">
                        <a style = "border: 1px solid #c2c2c2;
                        border-top: 0;
                        padding: 1rem 1rem 0.5rem;
                        margin-top: 0;
                        border-bottom-left-radius: 10px;
                        border-bottom-right-radius: 10px;" class="nav-link js-scroll-trigger" href="{{ url("register") }}">Register Form</a>
                </li>
            </ul>
          </div>
        </div>
      </nav>

  <!-- Header -->
  <header class="sub-masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-1 sub-mast-back" style = "font-size:2rem;">
                    <a href = "{{ url("/") }}"><i class = "fa fa-angle-left"></i></a>
                </div>
                <div class="col-md-6 sub-mast-text">
                    <h1>Login</h1>
                </div>
            </div>
        </div>
      </header>

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
                                            <i class="fa fa-eye password_toggle" aria-hidden="true" style = "top:30%"></i>
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
  @include('public.layout.pub_footer')

</body>
</html>
