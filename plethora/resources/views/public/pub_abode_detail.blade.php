
<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
      <link rel="stylesheet" href="{{ url("vendor/css/phr-listing.css") }}">
      <link rel="stylesheet" href="{{ url("vendor/css/abode-modal.css") }}">

    <style>
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

<body>


    <!-- Plethora Navigation -->
    @include('landing.layouts.headline')

   <!-- Plethora Navigation -->
   @include('landing.layouts.agent_navigation')

  <!-- Header -->
  <header class="sub-masthead" style = "height:400px;">
                <div class="container">
                </div>
    </header>



    <div class = "phr-abode-wrapper">
        <div class = "container-fluid phr-abode-details">
            <div class = "row">
            <!-- Propert details -->
            <div class = "col-md-8 col-xs-8" style = "padding-left:5%;">
                <h2>{{ $abodes["current"]->display_name }}</h2>
                <div>
                    <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $abodes["current"]->image }}" style="width:100%;" class = "modal-item">
                </div>

                <h5 style="margin-top:5%;">Property Details</h5>
                <hr/>
                <div class = "row">
                    <!-- Detail row -->
                    <div class = "col-md-6 col-xs-12 phr-abode-span">
                        <p><strong><span>Developer:</span></strong> <span>{{ $abodes["developer"]->name }}</span></p>
                        <p><strong><span>Project:</span></strong> <span>{{ $abodes["project"]->name }}</span></p>
                        <p><strong><span>Model:</span></strong> <span>{{ $abodes["current"]->display_name }}</span></p>
                        <p><strong><span>Address:</span></strong> <span>{{ $abodes["current"]->address }} {{ $abodes["location"] }}</span></p>
                    </div>
                    <div class = "col-md-6 col-xs-12 phr-abode-span">
                        <p><strong><span>Monthly Amortization:</span></strong> <span>
                                @if ($abodes["current"]->monthly_payment == 0)
                                Price not indicated
                                @else
                                &#8369 {{ number_format($abodes["current"]->monthly_payment) }}
                                @endif
                        </span></p>
                        <p><strong><span>Total Contract Price:</span></strong> <span>
                            @if ($abodes["current"]->total_contract_price == 0)
                            Price not indicated
                            @else
                            &#8369 {{ number_format($abodes["current"]->total_contract_price) }}
                            @endif
                        </span></p>
                    </div>
                </div>

                <h5 style="margin-top:5%;">Property Features</h5>
                <hr/>
                <div class = "row">
                    <!-- Detail row -->

                    @foreach ($abodes["features"] as $feature)
                    <div class = "col-md-6 col-xs-12 phr-abode-span">
                            <p><strong><span>{{ $feature["feature"] }}:</span></strong> <span>{{ $feature["value"] }}</span></p>
                        </div>
                    @endforeach
                </div>

                <h5 style="margin-top:10%;">Image Gallery</h5>
                <hr/>

                <div style="margin-top:4%;">
                    @if (sizeof($abodes["images"])  < 1)
                    <div class = "col-md-6 col-xs-12 phr-abode-span">
                            <p><span>No images to be shown</span></p>
                        </div>
                    @else
                        @foreach ($abodes["images"] as $image)
                        <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $image->image }}" style = "width:180px !important; height:150px !important;" class = "img-thumbnail modal-item">
                        @endforeach
                    @endif
                </div>

                <h5 style="margin-top:10%;">Tag Agents</h5>
                <hr/>

                <div class = "row">
                        <!-- Detail row -->
                        <div class = "col-md-6 col-xs-12 phr-abode-span">
                                @foreach ($abodes["tags"] as $tag)
                                <p><strong><span>{{ $tag["name"] }} </span></strong> <span><a href = "{{ url("") }}/agent/{{ $tag['link'] }}" style = "color:orange;cursor:pointer;text-decoration:underline;">Visit Agent Link</a></span></p>
                                @endforeach
                        </div>

                    </div>

        </div>

            <!-- Contact & Calculator -->
            <div class = "col-md-4 col-xs-4" style = "padding-right:5%;">
                            <hr style = "background-color:#27ae60;"/>
                            <h5>Contact</h5>
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
                                            <input type="hidden" class="form-control" value = "{{ $abodes["current"]->id }}" id="exampleInputEmail1" name = "abode_id"/>
                                    </div>

                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Message</label>
                                            <textarea class = "form-control" name="message" id="1" cols="10" rows="10"></textarea>
                                    </div>

                                    <button class = "btn btn-info">Submit</button>
                            </form>

                            <hr style = "background-color:#27ae60;margin-top:3em;"/>
                            <h5>Amortization Calculator</h5>
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
                                            <button class = "btn btn-info calculateLoan">Calculate</button>
                                            </form>
            </div>
        </div>
    </div>

    </div>

    <!-- The Modal -->
    <div id="phrModal" class="phr-modal">
        <!-- The Close Button -->
        <span class="close">&times;</span>

        <!-- Modal Content (The Image) -->
        <img class="phr-modal-content" id="phrModalImage">

    </div>

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

    <!-- Admin header -->
    @include('landing.layouts.footer')
    <script src="{{ url("vendor/js/date.js") }}"></script>
    <script src="{{ url("vendor/js/dateformat.js") }}"></script>
    <script src="{{ url("vendor/js/mortrage.js") }}"></script>
    <script src="{{ url("vendor/js/image-preview.js") }}"></script>

    @if(session('success'))
    <script>
        (function(){
            showSnackbar("inboxMessage")
        })()
    </script>
    @endif

</body>
</html>
