<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
</head>

<body id="page-top">

    <!-- Plethora headline -->
    <div class = "phr-headline">
        <div class="container text-right">
            <span><i class="fa fa-inbox"></i> plethorahomes@gmail.com</span>
            <span><i class="fa fa-phone"></i> 0921-7298-758</span>
        </div>
    </div>

    <!-- Plethora Navigation -->
    @include('landing.layouts.agent_navigation')

    <!-- Plethora Hero -->
    @include('landing.layouts.abode_search')

    <section style = "background-color:#fff;padding-top:40px;padding-bottom:15em;" id="gallery">
            <div class="container">
              <div class="row">
                <div class="col-md-12">
                </div>
              </div>
            </div>
     </section>

    <!-- Admin header -->
    @include('landing.layouts.footer')
    @include('landing.layouts.abode_search_script')

</body>
</html>
