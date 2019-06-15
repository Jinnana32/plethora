
<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
      <link rel="stylesheet" href="{{ url("vendor/css/phr-listing.css") }}">

    <style>
        .team-member {
            margin-bottom: 50px;
            text-align: center;
            background-color: #fff;
            border: 0;
            border-radius: 10px;
            padding: 30px 20px 20px;
        }

        .team-member h4 {
            color: #404040;
        }

        .team-member p {
            color: #505050 !important;
        }
        .phr-card {
            height:100%;
            background-color: #fff;
            box-shadow: 0 1px 14px rgba(0,0,0,0.09);
            padding:10% 5%;
        }
        .phr-agent-image {
            width: 200px;
            height: 200px;
            border-radius: 100%;
        }
        .sub-mast-info {
            background: rgba(0,0,0,0.5);
            padding-left:2rem;
            padding-top:20px;
            margin-top:-2rem;
            border-radius: 10px;
            position: relative;
        }

        .phr-star-holder {
            position: absolute;
            right:1rem;
            top:1rem;
        }

        .phr-star-holder .checked {
            color:yellow;
        }
    </style>
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
                            <a href = "{{ url("/") }}" style = "color:white;font-size:1em;"><i class = "fa fa-angle-left"></i></a>
                        </div>
                        <div class="col-md-6 sub-mast-text">
                            <h1>{{ $abode->display_name }}</h1>
                        </div>
                    </div>
                </div>
              </header>

              <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
                    <div class="container">
                      <div class="row">

                        <div class="col-md-8">
                            <h2>Abode Details</h2>

                            <div class="row">

                                        <div class="col-md-12">
                                                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                                                        <!-- Indicators -->
                                                                        <ol class="carousel-indicators">
                                                                          @foreach ($images as $key => $image)
                                                                          <li data-target="#myCarousel" data-slide-to="{{ $key }}"></li>
                                                                          @endforeach
                                                                        </ol>

                                                                        <!-- Wrapper for slides -->
                                                                        <div class="carousel-inner">
                                                                          @foreach ($images as $image)
                                                                          <div class="item">
                                                                              <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $image->image }}" alt="Chicago" style = "width:100% !important; height:300px !important;" class = "img-responsive">
                                                                          </div>
                                                                          @endforeach
                                                                        </div>

                                                                        <!-- Left and right controls -->
                                                                        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                                                          <span class="glyphicon glyphicon-chevron-left"></span>
                                                                          <span class="sr-only">Previous</span>
                                                                        </a>
                                                                        <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                                                          <span class="glyphicon glyphicon-chevron-right"></span>
                                                                          <span class="sr-only">Next</span>
                                                                        </a>
                                                                      </div>
                                        </div>

                                        <div class = "col-xs-12 col-form-header">
                                                <div class="dot-header"></div>
                                                <span>Project Related</span>
                                        </div>

                                        <div class="col-md-12">
                                                <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                                                        <tbody>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Developer:</td>
                                                                        <td>{{ $developer->name }}</td>
                                                                </tr>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Project Name:</td>
                                                                        <td>{{ $abode->project_name }}</td>
                                                                </tr>
                                                        </tbody>
                                                        </table>
                                                </div>

                                        <div class = "col-xs-12 col-form-header">
                                                <div class="dot-header"></div>
                                                <span>Listing</span>
                                        </div>

                                        <div class="col-md-12">
                                                <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                                                        <tbody>
                                                            <tr role="row" class="odd">
                                                                    <td class="sorting_1">Category:</td>
                                                                    <td>{{ $abode->category }}</td>
                                                            </tr>
                                                            <tr role="row" class="odd">
                                                                    <td class="sorting_1">Location:</td>
                                                                    <td>{{ $abode->location }}</td>
                                                            </tr>
                                                        </tbody>
                                                        </table>
                                        </div>

                                        <div class = "col-xs-12 col-form-header">
                                                <div class="dot-header"></div>
                                                <span>Pricing</span>
                                        </div>

                                        <div class="col-md-12">
                                                <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                                                        <tbody>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Monthly Payment:</td>
                                                                        <td>{{ $abode["monthly_payment"] }}</td>
                                                                </tr>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Total Contract Price:</td>
                                                                        <td>{{ $abode["total_contract_price"] }}</td>
                                                                </tr>
                                                                <tr role="row" class="odd">
                                                                        <td class="sorting_1">Net Selling Price:</td>
                                                                        <td>{{ $abode["net_selling_price"] }}</td>
                                                                </tr>
                                                        </tbody>
                                                        </table>
                                        </div>

                                    </div>



                        </div>

                        <div class="col-md-4">

                        <div class="row">
                                <div class="col-md-12">
                                        <div class = "phr-card">
                                        <h3>Contact</h3>
                                                <form action="{{ route("inbox.message.submit") }}" method = "POST">
                                                {{ csrf_field() }}
                                                <div class="form-group">
                                                        <label for="exampleInputEmail1">Email</label>
                                                        <input type="email" class="form-control" id="exampleInputEmail1" name = "email_address" required/>
                                                </div>

                                                <div class="form-group">
                                                                <label for="exampleInputEmail1">Mobile Number</label>
                                                                <input type="number" class="form-control" id="exampleInputEmail1" name = "mobile_number" required/>
                                                </div>

                                                <div class="form-group">
                                                        <label for="exampleInputEmail1">Name</label>
                                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "name" required/>
                                                        <input type="hidden" class="form-control" value = "{{ $abode->id }}" id="exampleInputEmail1" name = "abode_id"/>
                                                </div>

                                                <div class="form-group">
                                                        <label for="exampleInputEmail1">Message</label>
                                                        <textarea class = "form-control" name="message" id="1" cols="10" rows="10"></textarea>
                                                </div>

                                                <button class = "btn btn-primary btn-block">Submit</button>
                                                </form>
                                        </div>
                                </div>
                        </div>

                        <div class="row" style = "margin-top:30px;">
                            <div class="col-md-12">
                                    <div class = "phr-card">

                                            <h3>Mortrage Calculator</h3>
                                            <form>
                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Contract Pice</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" value = "5700005" name = "project_name" required/>
                                            </div>

                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Downpayment</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                                            </div>

                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Loan Term</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                                            </div>

                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Interest</label>
                                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "project_name" required/>
                                            </div>

                                            <button class = "btn btn-info btn-block">Calculate</button>
                                            </form>
                                        </div>
                            </div>
                        </div>

                        </div>

                      </div>
                    </div>

                    <style>
                                /* The snackbar - position it at the bottom and in the middle of the screen */
                                #inboxMessage {
                                visibility: hidden; /* Hidden by default. Visible on click */
                                min-width: 250px; /* Set a default minimum width */
                                margin-left: -125px; /* Divide value of min-width by 2 */
                                background-color: #333; /* Black background color */
                                color: #fff; /* White text color */
                                text-align: center; /* Centered text */
                                border-radius: 2px; /* Rounded borders */
                                padding: 16px; /* Padding */
                                position: fixed; /* Sit on top of the screen */
                                z-index: 1; /* Add a z-index if needed */
                                left: 50%; /* Center the snackbar */
                                bottom: 30px; /* 30px from the bottom */
                                }

                                /* Show the snackbar when clicking on a button (class added with JavaScript) */
                                #inboxMessage.show {
                                visibility: visible; /* Show the snackbar */
                                /* Add animation: Take 0.5 seconds to fade in and out the snackbar.
                                However, delay the fade out process for 2.5 seconds */
                                -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
                                animation: fadein 0.5s, fadeout 0.5s 2.5s;
                                }

                                /* Animations to fade the snackbar in and out */
                                @-webkit-keyframes fadein {
                                from {bottom: 0; opacity: 0;}
                                to {bottom: 30px; opacity: 1;}
                                }

                                @keyframes fadein {
                                from {bottom: 0; opacity: 0;}
                                to {bottom: 30px; opacity: 1;}
                                }

                                @-webkit-keyframes fadeout {
                                from {bottom: 30px; opacity: 1;}
                                to {bottom: 0; opacity: 0;}
                                }

                                @keyframes fadeout {
                                from {bottom: 30px; opacity: 1;}
                                to {bottom: 0; opacity: 0;}
                                }
                            </style>
                            <!-- The actual snackbar -->
                            <div id="inboxMessage">Your request was sent!</div>
                  </section>
    <!-- Admin header -->
    @include('landing.layouts.footer')

    @if(session('success'))
    <script>
        (function(){
            showSnackbar("inboxMessage")
        })()
    </script>
    @endif

</body>
</html>
