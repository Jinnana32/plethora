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

        <!-- Admin header -->
        @include('public.layout.pub_agent_inner_nav')

        <div class="col-md-9">
            <div class="row">

              <div class="col-md-12 phr-progress-card">
                <div class="phr-profile-card">
                    <div class = "col-md-12  col-form-header">
                        <div class="dot-header"></div>
                        <span>My genealogy</span>
                      </div>

                      <table class = "table table-striped table-bordered" style = "font-size:0.7em;">
                        <thead>
                          <tr>
                            <th>Upline</th>
                            <th>Upline position</th>
                            <th>My position</th>
                            <th>Is Unit</th>
                            <th>Unit Position</th>
                            <th>Hierarchy</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Rodora X</td>
                            <td>Broker</td>
                            <td>Division Manager</td>
                            <td>No</td>
                            <td>N/A</td>
                            <td>
                              <a href="#">
                                <button class = "btn btn-small btn-default">View hierarchy</button>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                </div>
              </div>



            </div>

        </div>

      </div>
    </div>
</section>

    <!-- Admin header -->
    @include('landing.layouts.footer')

</body>
</html>
