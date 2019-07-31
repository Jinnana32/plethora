
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
                                                                        <td>&#8369 {{ number_format($abode["total_contract_price"]) }}</td>
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

                                            <h3>Amortization Calculator</h3>
                                            <form id = "mortrage_calculator">
                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Contract Price</label>
                                                    <input type="number" class="form-control" id="principal" name = "project_name" required/>
                                            </div>

                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Downpayment</label>
                                                    <input type="number" class="form-control" id="downpayment" name = "project_name" required/>
                                            </div>

                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Loan Term (In months)</label>
                                                    <select id = "terms" class="form-control" name = "loan_terms">
                                                                <option value = "6">6 (half a year)</option>
                                                                <option value = "12">12 (a year)</option>
                                                                <option value = "24">24 (two years)</option>
                                                                <option value = "36">36 (three years)</option>
                                                                <option value = "48">48 (four years)</option>
                                                                <option value = "60">60 (five years)</option>
                                                            </select>
                                            </div>

                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Interest (%)</label>
                                                    <input type="number" class="form-control" id="interest" name = "project_name" required/>
                                            </div>

                                            <div class="form-group">
                                                        <h6>First Payment</h6>
                                                        <label for="emailAddress">Month</label>
                                                        <select id = "m_net" class="form-control" name = "loan_terms">
                                                            <option value = "1">January</option>
                                                            <option value = "2">Febuary</option>
                                                            <option value = "3">March</option>
                                                            <option value = "4">April</option>
                                                            <option value = "5">May</option>
                                                            <option value = "6">June</option>
                                                            <option value = "7">July</option>
                                                            <option value = "8">August</option>
                                                            <option value = "9">Sept</option>
                                                            <option value = "10">Oct</option>
                                                            <option value = "11">November</option>
                                                            <option value = "12">December</option>
                                                        </select>


                                                        <label for="emailAddress">Day</label>
                                                        <select id = "d_net" class="form-control" name = "loan_terms">
                                                            <option value = "1">1</option>
                                                            <option value = "2">2</option>
                                                            <option value = "3">3</option>
                                                            <option value = "4">4</option>
                                                            <option value = "5">5</option>
                                                            <option value = "6">6</option>
                                                            <option value = "7">7</option>
                                                            <option value = "8">8</option>
                                                            <option value = "9">9</option>
                                                            <option value = "10">10</option>
                                                            <option value = "11">11</option>
                                                            <option value = "12">12</option>
                                                            <option value = "13">13</option>
                                                            <option value = "14">14</option>
                                                            <option value = "15">15</option>
                                                            <option value = "16">16</option>
                                                            <option value = "17">17</option>
                                                            <option value = "18">18</option>
                                                            <option value = "19">19</option>
                                                            <option value = "20">20</option>
                                                            <option value = "21">21</option>
                                                            <option value = "22">22</option>
                                                            <option value = "23">23</option>
                                                            <option value = "24">24</option>
                                                            <option value = "25">25</option>
                                                            <option value = "26">26</option>
                                                            <option value = "27">27</option>
                                                            <option value = "28">28</option>
                                                            <option value = "29">29</option>
                                                            <option value = "30">30</option>
                                                            <option value = "31">31</option>
                                                        </select>

                                                        <label for="emailAddress">Year</label>
                                                        <select id = "y_net" class="form-control" name = "loan_terms">
                                                            <option value = "2019">2019</option>
                                                            <option value = "2020">2020</option>
                                                            <option value = "2021">2021</option>
                                                            <option value = "2022">2022</option>
                                                            <option value = "2023">2023</option>
                                                            <option value = "2024">2024</option>
                                                            <option value = "2025">2025</option>
                                                            <option value = "2026">2026</option>
                                                            <option value = "2027">2027</option>
                                                            <option value = "2028">2028</option>
                                                            <option value = "2029">2029</option>
                                                            <option value = "2030">2030</option>
                                                        </select>
                                                      </div>
                                            <button class = "btn btn-info btn-block calculateLoan">Calculate</button>
                                            </form>

                                            <div class="modal" tabindex="-1" role="dialog" id = "add_feature">

                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Amortization schedule</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">

                                                                        <div class="row" id = "schedule_box" style = "padding: 2em;">
                                                                        </div>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button class="btn btn-primary" data-dismiss="modal" aria-label="Close">Done</button>
                                                                </div>
                                                                </div>
                                                            </div>

                                                    </div>


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
    <script src="{{ url("vendor/js/date.js") }}"></script>
    <script src="{{ url("vendor/js/dateformat.js") }}"></script>

    @if(session('success'))
    <script>
        (function(){
            showSnackbar("inboxMessage")
        })()
    </script>
    @endif

    <script>
    $(document).ready(function() {

        var calculateBtn = $(".calculateLoan");

        $("#mortrage_calculator").submit(function(e){
                e.preventDefault()
                getValues();
                $("#add_feature").modal("show");
        })

        calculateBtn.click(function(){

        });

        function getValues() {
        //button click gets values from inputs
        var principal = parseFloat($("#principal").val());
        var downpayment = parseFloat($("#downpayment").val());

        var m_net = $("#m_net").val();
        var d_net = $("#d_net").val();
        var y_net = $("#y_net").val();

        var first_payment = m_net + "/" + d_net + "/" + y_net;

        var balance = principal - downpayment;

        var interestRate = (parseFloat($("#interest").val()) / 100.0);

        var terms = parseInt($("#terms").val());

        //set the div string
        var sched_box = $("#schedule_box");

        //in case of a re-calc, clear out the div!
        sched_box.html("");

        sched_box.html(amort(balance, interestRate, terms,first_payment));
        }

        /**
         * Amort function:
         * Calculates the necessary elements of the loan using the supplied user input
         * and then displays each months updated amortization schedule on the page
         */
        function amort(balance, interestRate, terms,first_payment) {

        var curr_date = new Date(first_payment);

        //Calculate the per month interest rate
        var monthlyRate = interestRate / 12;

        //Calculate the payment
        var payment =
        balance * (monthlyRate / (1 - Math.pow(1 + monthlyRate, -terms)));

        //begin building the return string for the display of the amort table
        var result =
        "<h5>Loan Contract</h5>" +
        "<table class = 'table table-striped'><tr><td>Remaining to pay:</td><td> &#8369 " +
        balance.toLocaleString('en') +
        "</td></tr>" +
        "<tr><td>Interest rate: </td><td>" +
        (interestRate * 100) +
        "%</td></tr>" +
        "<tr><td>Number of months: </td><td>" +
        terms +
        "</td></tr>" +
        "<tr><td>Monthly payment:</td><td> &#8369 " +
        payment.toLocaleString('en') +
        "</td></tr>" +
        "<tr><td> Total paid:</td><td> &#8369 " +
        (payment * terms).toLocaleString('en') +
        "</td></tr></table><br/><br/>";

        result += "<h5>Loan schedule</h5>"
        //add header row for table to return string
        result +=
        "<table class = 'table table-striped'><tr><th>Month #</th><th>Balance</th>" +
        "<th>Interest</th><th>Principal</th>";

        /**
         * Loop that calculates the monthly Loan amortization amounts then adds
         * them to the return string
         */
        for (var count = 0; count < terms; ++count) {
        //in-loop interest amount holder
        var interest = 0;

        //in-loop monthly principal amount holder
        var monthlyPrincipal = 0;

        //start a new table row on each loop iteration
        result += "<tr>";

        //display the month number in col 1 using the loop count variable
        result += "<td>" + curr_date.toString("MMM d,yyyy") + "</td>";

        //code for displaying in loop balance
        result += "<td> &#8369 " + balance.toLocaleString('en'); + "</td>";

        //calc the in-loop interest amount and display
        interest = balance * monthlyRate;
        result += "<td> &#8369 " + interest.toFixed(2) + "</td>";

        //calc the in-loop monthly principal and display
        monthlyPrincipal = payment - interest;
        result += "<td> &#8369 " + monthlyPrincipal.toLocaleString('en'); + "</td>";

        //end the table row on each iteration of the loop
        result += "</tr>";

        //update the balance for each loop iteration
        balance = balance - monthlyPrincipal;

        curr_date = curr_date.addMonths(1);
        }

        //Final piece added to return string before returning it - closes the table
        result += "</table>";

        //returns the concatenated string to the page
        return result;
        }

        function validateInputs(value) {
        //some code here to validate inputs
        if (value == null || value == "") {
        return false;
        } else {
        return true;
        }
        }

        });

    </script>

</body>
</html>
