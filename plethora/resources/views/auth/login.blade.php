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

    @if(session('success'))
    <div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            {{session('success')}}
    </div>
    @endif

    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Extra ordinary Reach. Extra ordinary Results</p>

        <form action="{{ route('phradmin.login.submit') }}" method="post">
            {{ csrf_field() }}
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="username" name = "username" value = "{{ old('username') }}">

            @if($errors->has('username'))
            <span class = "help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
            @endif

        </div>
        <div class="form-group has-feedback">
            <input type="password" class="form-control" placeholder="password" name = "password">
            @if($errors->has('username'))
            <span class = "help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="row" style = "margin-top:30px;">
            <!-- /.col -->
            <div class="col-xs-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
            <!-- /.col -->
            <div class="col-xs-6 col-xs-offset-4" style = "margin-top:30px;">
                <div class="checkbox icheck">
                    <label>
                    <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                        <input type="checkbox" name = "remember_me">
                    </div> Remember Me
                    </label>
                </div>
            </div>
        </div>
        </form>

    </div>
    <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- Admin footer -->
    @include('admin.layouts.ad_footer')

</body>

</html>