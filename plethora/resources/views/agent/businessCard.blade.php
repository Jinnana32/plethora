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


 <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:30em;" id="gallery">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
            <div class = "col-md-12  col-form-header">
              <div class="dot-header"></div>
              <span>Create business card</span>
            </div>
            <hr/>

            <div class = "row">
                <div class="col-md-4">
                    <div class="form-group form-group-select">
                        <label for="exampleInputEmail1">Select Column Count</label>
                        <select class="form-control" name = "name_suffix">
                                <option value = "">2 Columns</option>
                                <option value = "">3 Columns</option>
                                <option value = "">4 Columns</option>
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
                </div>
                <div class="col-md-4">
                    <label for="exampleInputEmail1"></label>
                    <br/>
                    <button class = "btn btn-primary btnGenerateCard">Generate cards</button>
                </div>


                <div class = "col-md-12 biz-print-card">
                  <div class = "row">

                      <div class = "col-md-6">
                        <div class = "biz-card">
                            <div class = "biz-info-holder">
                                <div class = "biz-left">
                                    <img src = "{{ url("") }}/vendor/img/phr-logo.jpg" />

                                    <h5>Our Services</h5>
                                    <ul class = "biz-upper">
                                        <li>Buy/Sell/Rent</li>
                                        <li>Property Management</li>
                                        <li>Property Investment Advise</li>
                                        <li>Financial Management Adviser</li>
                                    </ul>
                                </div>
                                <div class = "biz-right">
                                    <h4>{{ ucwords($agent["name"]) }}</h4>
                                    <p>
                                        @if ($agent["position"] == "division" || $agent["position"] == "unit")
                                        {{ strtoupper($agent["position"] . " Manager") }}
                                        @else
                                        {{ strtoupper($agent["position"]) }}
                                        @endif
                                    </p>

                                    <p class = "biz-first"><strong>{{ $agent["prc_license"] }}</strong> <br/> PRC license</p>
                                    <p><strong>{{ $agent["contact"] }}</strong> <br/> Contact</p>
                                    <p><strong>{{ $agent["facebook_account"] }}</strong> <br/> Facebook account</p>
                                    <p><strong>{{ $agent["email"] }}</strong> <br/> Email Address</p>
                                    <p><strong>{{ url("") }}</strong> <br/> Website</p>

                                </div>
                            </div>

                            <ul class = "biz-bottom">
                                <li>ILOILO</li>
                                <li>BACOLOD</li>
                                <li>CEBU</li>
                                <li>DAVAO</li>
                                <li>MANILA</li>
                            </ul>
                        </div>
                      </div>

                      <div class = "col-md-6">
                            <div class = "biz-card">
                                <div class = "biz-info-holder">
                                    <div class = "biz-left">
                                        <img src = "{{ url("") }}/vendor/img/phr-logo.jpg" />

                                        <h5>Our Services</h5>
                                        <ul class = "biz-upper">
                                            <li>Buy/Sell/Rent</li>
                                            <li>Property Management</li>
                                            <li>Property Investment Advise</li>
                                            <li>Financial Management Adviser</li>
                                        </ul>
                                    </div>
                                    <div class = "biz-right">
                                        <h4>{{ ucwords($agent["name"]) }}</h4>
                                        <p>
                                            @if ($agent["position"] == "division" || $agent["position"] == "unit")
                                            {{ strtoupper($agent["position"] . " Manager") }}
                                            @else
                                            {{ strtoupper($agent["position"]) }}
                                            @endif
                                        </p>

                                        <p class = "biz-first"><strong>{{ $agent["prc_license"] }}</strong> <br/> PRC license</p>
                                        <p><strong>{{ $agent["contact"] }}</strong> <br/> Contact</p>
                                        <p><strong>{{ $agent["facebook_account"] }}</strong> <br/> Facebook account</p>
                                        <p><strong>{{ $agent["email"] }}</strong> <br/> Email Address</p>
                                        <p><strong>{{ url("") }}</strong> <br/> Website</p>

                                    </div>
                                </div>

                                <ul class = "biz-bottom">
                                    <li>ILOILO</li>
                                    <li>BACOLOD</li>
                                    <li>CEBU</li>
                                    <li>DAVAO</li>
                                    <li>MANILA</li>
                                </ul>
                            </div>
                          </div>
                  </div>
                </div>

            </div>

        </div>

      </div>
    </div>
</section>

    <!-- Admin header -->
    @include('landing.layouts.footer')

    <script>
        $(".btnGenerateCard").click(function(){
            $(".biz-print-card").print({
                    //Use Global styles
                    globalStyles : false,
                    //Add link with attrbute media=print
                    mediaPrint : false,
                    //Custom stylesheet
                    stylesheet : "{{ url('') }}/vendor/bootstrap/dist/css/bootstrap.min.css",
                    //Print in a hidden iframe
                    iframe : false,
                    //Add this at top
                    prepend : "<style>.biz-card {    font-size: 0.5em;    background: seagreen;    padding: 2em 0 0.5em;}.biz-info-holder {    display:flex;    padding: 0 0 1em;    justify-content: space-between;    background: white;}.biz-left {    width: 48%;    padding-left: 2em;}.biz-left > img {    width: 200px;    height: 100px;}.biz-left > h5 {    padding-left: 2em;    padding-top:1em;}.biz-right {    width: 50%;    text-align: center;    padding-top: 2em;}.biz-right > h4 {    margin-bottom: 0;}.biz-right > p {    font-size:1.2em;    margin-bottom: 0.5em;}.biz-first {    padding-top: 2em;}.biz-upper {    margin:0;    padding-left: 6em;}.biz-bottom {    list-style: none;    text-align: center;    display: flex;    justify-content: space-around;    margin:0;    padding: 1.2em 10em;}.biz-bottom > li {    font-size: 1.2em !important;    display: inline-block;    color:white;}</style>",
                    //Log to console when printing is done via a deffered callback
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
        })
    </script>

</body>
</html>
