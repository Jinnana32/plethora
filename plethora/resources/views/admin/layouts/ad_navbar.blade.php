<header class="main-header">

        <!-- Logo -->
        <a href="{{ url("phradmin/dashboard") }}" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini">
              <img src="{{ url("vendor/img/phr-logo-image.jpg") }}" style = "width:50%;height:50%;"/>
          </span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">
            <img src="{{ url("vendor/img/phr-logo-image.jpg") }}" style = "width:20%;height:20%;"/>
            <span style = "font-size:0.8em;">Plethora Homes Realty</span>
          </span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="{{ url("logout") }}">Logout <i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>

        </nav>
      </header>