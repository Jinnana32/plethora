

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
    @include('landing.layouts.navigation')

  <!-- Header -->
  <header class="sub-masthead">
        <div class="container">
            <div class="row">
                <div class="col-md-1 sub-mast-back" style = "font-size:2rem;">
                    <a href = "{{ url("/") }}"><i class = "fa fa-angle-left"></i></a>
                </div>
                <div class="col-md-6 sub-mast-text">
                    <h1>Find an Agent</h1>
                </div>
            </div>
        </div>
      </header>

  <section style = "background-color:#f3f3f3;padding-top:5em;padding-bottom:10em;" id="gallery">
        <div class="container">
          <div class="row">

            <div class="col-md-5" style="text-align:center;">
                <h3>Look for an agent you may know</h3>
                <div class="phr-line"></div>
                <form>
                        <div class="form-group">
                                <input type="text" class="form-control" id = "agent_name" required/>
                        </div>
                        <button  type = "button" class = "btn btn-success btnFindAgent">Search</button>
                        </form>
            </div>
            <div class="col-md-2" style="text-align:center;">
                <div style="width:1px; height: 100px;; background:#d3d3d3; margin: 0 auto;"></div>
                <h5 style = "padding-top: 1.5em;padding-bottom:1.5em;">Or</h5>
                <div style="width:1px; height:100px; background:#d3d3d3; margin: 0 auto;"></div>
            </div>
            <div class="col-md-5" style="text-align:center;">
                    <h3>Contact Us Directly</h3>
                    <div class="phr-line"></div>
                    <h5><i class="fa fa-inbox"></i> plethorahomes@gmail.com</h5>
                    <p>Email</p>
                    <h5><i class="fa fa-phone"></i> 0921-7298-758</h5>
                    <p>Mobile</p>
            </div>

          </div>
        </div>
      </section>

    <!-- Admin header -->
    @include('landing.layouts.footer')
    <!-- Admin header -->
    @include('landing.layouts.scripts')

    <script>
    $(document).ready(function(){
        $(".btnFindAgent").click(function(){
            window.location = window.location.href + "/" + $("#agent_name").val()
        })
    })
    </script>
</body>
</html>
