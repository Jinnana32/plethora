 <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top"><span style = "color: #fea30acc">Plethora</span> Realty Homes</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">

          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#abode">Find abode</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#phr-about">About</a>
          </li>
          <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#agent">Agents</a>
            </li>
          <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#gallery">Gallery</a>
          </li>
            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contact">Contact us</a>
            </li>

            <li class="nav-item">
                    <a style = "border: 1px solid #c2c2c2;
                    border-top: 0;
                    padding: 1rem 1rem 0.5rem;
                    margin-top: 0;
                    border-bottom-left-radius: 10px;
                    border-bottom-right-radius: 10px;" class="nav-link js-scroll-trigger" href="{{ url("login") }}">Login/Register</a>
            </li>
        </ul>
      </div>
    </div>
  </nav>

  <style>
    .lead_gen {
      list-style: none;
      padding:0;
    }

    .lead_gen li {
      border: 1px solid blue;
      padding:2% 0;
      margin-bottom: 1rem;
      text-align:center;
      border-radius: 20px;
      cursor: pointer;
    }

    .lead_gen li:hover {
      background-color: blue;
      color:#fff;
    }
  </style>

  <div class="modal" tabindex="-1" role="dialog" id = "lead_generation">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Plethora homes realty</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body lead_body">
            <ul class = "lead_gen">
              <li class = "lead_action" id = "speak_agent">Can i speak to an agent?</li>
              <li class = "lead_action" id = "area_serve">What areas do you serve?</li>
              <li class = "lead_action" id = "sched_viewing">Can I Schedule a viewing?</li>
              <li class = "lead_action" id = "avail_props">Are there any new properties available?</li>
            </ul>
          </div>
        </div>
      </div>
  </div>

  <div class="lead-contact" style="display:none;">
    <div class="row">

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Message</label>
                <textarea id="" cols="20" rows="2" class = "form-control lead_message"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Complete name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" name = "first_name" required/>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label for="exampleInputEmail1">Address</label>
                <textarea name="" id="" cols="20" rows="5" class = "form-control"></textarea>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                    <label for="exampleInputEmail1">Contact number</label>
                    <input type="number" class="form-control" id="exampleInputEmail1" name = "last_name" required/>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                    <label for="exampleInputEmail1">Facebook</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name = "last_name" required/>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <button class="btn btn-primary btn-block">Submit</button>
            </div>
        </div>
    </div>
  </div>