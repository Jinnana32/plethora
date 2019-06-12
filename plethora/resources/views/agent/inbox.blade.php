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

 <!-- Header -->
 @include('public.layout.pub_agent_masthead')

 <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
            <div class = "col-md-12  col-form-header">
              <div class="dot-header"></div>
              <span>My inbox</span>
            </div>
            <hr/>
        </div>

      </div>
    </div>
</section>


    <!-- Admin header -->
    @include('landing.layouts.footer')

</body>
</html>
