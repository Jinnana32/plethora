<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Admin header -->
    @include('public.layout.pub_agent_header')
</head>

<body id="page-top">

  <!-- Admin header -->
  @include('public.layout.pub_agent_nav')

  <!-- Header -->
  @include('public.layout.pub_agent_masthead')

  <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
        <div class="container">
          <div class="row">

            <!-- Admin header -->
            @include('public.layout.pub_agent_inner_nav')

            <div class="col-md-9">
              <div class = "col-md-12  col-form-header">
                <div class="dot-header"></div>
                <span>My profile</span>
              </div>
              <hr/>


              <!-- Profile card -->
              <div class="col-md-12">
                <div class="phr-profile-card">
                    <form method = "POST">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input type="text" class="form-control" value = "{{ $agent["username"] }}" id="exampleInputEmail1" name = "first_name" required/>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name = "last_name" required/>
                            </div>
                        </div>


                        <div class="col-sm-12 text-right col-md-offset-6">
                            <button class = "btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
                </div>
              </div>

              <!-- Profile card -->
              <div class="col-md-12" style = "margin-top:20px;">
                    <div class="phr-profile-card">
                        <form method = "POST">
                        <div class="row">

                            <div class="col-sm-12">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Permanent Address</label>
                                            <input type="text" class="form-control" value = "{{ $agent["address"] }}" id="exampleInputEmail1" name = "last_name" required/>
                                    </div>
                            </div>

                            <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="email" class="form-control" value = "{{ $agent["email"] }}" id="exampleInputEmail1" name = "last_name" required/>
                                    </div>
                            </div>

                            <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Contact</label>
                                            <input type="text" class="form-control" value = "{{ $agent["contact"] }}" id="exampleInputEmail1" name = "last_name" required/>
                                    </div>
                            </div>

                            <div class="col-sm-6">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Referral link</label>
                                            <input type="text" class="form-control" value = "{{ $agent["referral_link"] }}" id="exampleInputEmail1" name = "last_name" required/>
                                    </div>
                            </div>

                            <div class="col-sm-12 text-right col-md-offset-6">
                                <button class = "btn btn-success">Update</button>
                            </div>
                        </div>
                    </form>
                    </div>
                  </div>


            </div><!-- End sidepanel(col-md-9) -->

              </div><!-- End row -->
        </div><!-- End container -->
 </section>

  <!-- Admin header -->
  @include('public.layout.pub_footer')
</body>
</html>
