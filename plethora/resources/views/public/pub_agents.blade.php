

<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
</head>

<body id="page-top">

     <!-- Plethora Navigation -->
     @include('landing.layouts.headline')

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
                @foreach ($agents as $agent)
                <div class="col-sm-4">
                    <div class="team-member">
                        <img class="mx-auto rounded-circle" src="{{ $agent["image"] }}" alt="">
                        <h4>{{ $agent["firstname"] }} {{ $agent["lastname"] }}</h4>
                        <p class="text-muted">{{ $agent["position"] }}</p>
                        <ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <i class = "fa fa-phone"></i> {{ $agent["contact"] }}
                        </li>
                        <li class="list-inline-item">
                            <i class = "fa fa-envelope"></i> {{ $agent["email"] }}
                        </li>
                        <li class="list-inline-item" style = "font-size:0.7em;">
                            {{ url("/agent") }}/{{ $agent["referral_link"] }}
                        </li>
                        </ul>
                        <a href = "{{ url("") }}/agent/{{ $agent["referral_link"] }}"><button style = "margin-top:20px;" class = "btn btn-info">View Profile</button></a>
            @endforeach

          </div>
        </div>
      </section>

    <!-- Admin header -->
    @include('landing.layouts.footer')


</body>
</html>
