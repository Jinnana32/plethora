<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')

      <link href = "{{ url("vendor/css/businesscard.css") }}" rel="stylesheet" />
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
                <div class="col-md-4" style = "margin-bottom:30px;">
                    <label for="exampleInputEmail1"></label>
                    <br/>
                    <button class = "btn btn-primary btnGenerateCard">Download Business card</button>
                </div>

                <div class = "container biz-print-card">
                    <div class = "phr-call-card">
                            <div class = "phr-card-image">
                            <img src = "{{ url("") }}/vendor/img/phr-logo.jpg" />
                            </div>
                            <div class = "phr-card-header">
                            <h2>{{ strtoupper($agent["name"]) }}</h2>
                            <p>
                                @if($agent["position"] == "broker")
                                LICENSED REAL ESTATE BROKER
                                @elseif($agent["position"] == "division")
                                DIVISION MANAGER
                                @elseif($agent["position"] == "unit")
                                UNIT MANAGER
                                @endif
                            </p>
                            <p>
                                    @if($agent["position"] == "broker")
                                    {{ $agent["prc_license"] }}
                                    @endif
                            </p>
                            </div>
                            <div class="clearfix"></div>
                            <div class = "phr-call-card-footer">
                                <div class = "left">
                                    <p>{{ $agent["contact"] }}</p>
                                    <p>{{ $agent["facebook_account"] }}</p>
                                </div>
                                <div class = "right">
                                    <p><i class = "fa fa-map-marker"></i> {{ $agent["address"] }}</p>
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
                    stylesheet : "{{ url('vendor/css/businesscard.css') }}",
                    //Print in a hidden iframe
                    iframe : false,
                    //Log to console when printing is done via a deffered callback
                    deferred: $.Deferred().done(function() { console.log('Printing done', arguments); })
                });
        })

    </script>

</body>
</html>
