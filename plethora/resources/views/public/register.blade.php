<!DOCTYPE html>
<html>
<head>

  <!-- Admin header -->
  @include('admin.layouts.ad_header')

</head>

    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="hold-transition skin-blue-light sidebar-mini phr-login">

        <div class="login-box">
    <div class="login-logo">
        <a href="#" class = "phr-login-header"><b>Plethora</b> Homes Realty</a>
    </div>

    @if($errors->has('unauthorized'))
        <div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $errors->first('unauthorized') }}
        </div>
    @endif

    @if($errors->has('alreadyexist'))
        <div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $errors->first('alreadyexist') }}
        </div>
    @endif

    @if($errors->has('referral_error'))
        <div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{ $errors->first('referral_error') }}
        </div>
    @endif

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Registration form</p>

        <form action="{{ route('register.submit') }}" method="post">
            {{ csrf_field() }}

        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="First name" name = "firstname" value = "{{ old('firstname') }}">
            @if($errors->has('firstname'))
            <span class = "help-block">
                <strong>{{ $errors->first('firstname') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Last name" name = "lastname" value = "{{ old('lastname') }}">
            @if($errors->has('lastname'))
            <span class = "help-block">
                <strong>{{ $errors->first('lastname') }}</strong>
            </span>
            @endif
        </div>

        <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Username" name = "username" value = "{{ old('username') }}">
                @if($errors->has('username'))
                <span class = "help-block">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>
                @endif
            </div>

        <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name = "password">
                @if($errors->has('password'))
                <span class = "help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
        </div>

        <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Referral Link" name = "referral_link">
                @if($errors->has('referral_link'))
                <span class = "help-block">
                    <strong>{{ $errors->first('referral_link') }}</strong>
                </span>
                @endif
        </div>

        <div class="row" style = "margin-top:30px;">
            <!-- /.col -->
            <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
            </div>

            <div class="col-xs-12 text-center" style = "margin-top:30px;">
                    <a href = "{{ url("login") }}">Login form</a>
            </div>
        </div>
        </form>

    </div>
    <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <a href = "{{ url("/") }}"><i class = "fa fa-angle-left"></i> Back to site</a>
            </div>
        </div>
    </div>

    <!-- Admin footer -->
    @include('admin.layouts.ad_footer')

</body>

</html>