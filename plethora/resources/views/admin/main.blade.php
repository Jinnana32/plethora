<!DOCTYPE html>
<html>
<head>

  <!-- Admin header -->
  @include('admin.layouts.ad_header')

</head>

<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">

    <!-- Admin Navbar -->
    @include('admin.layouts.ad_navbar')

    <!-- Admin Sidebar -->
    @include('admin.layouts.ad_sidebar')

    <div class = "content-wrapper">
        @yield('content')
    </div>

   <!-- PHR dialogs -->
   @include('dialog.phr_dialogs')

    <!-- Admin footer -->
    @include('admin.layouts.ad_footer')
    @yield('page-script')

</div>
</body>

</html>