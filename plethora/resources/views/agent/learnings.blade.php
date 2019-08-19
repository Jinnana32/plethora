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
    @include('landing.layouts.agent_navigation')

 <!-- Header -->
 @include('public.layout.pub_agent_masthead')

 <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
    <div class="container">
      <div class="row">



          <div class="col-md-12" style = "margin-top:3em;">
              <div class = "col-md-12  col-form-header">
                <div class="dot-header"></div>
                <span>Trainings</span>
              </div>
              <hr/>

              <div class = "row">

                @foreach ($trainings as $training)
                 <div class="col-md-6 phr-progress-card">
                    <div class="phr-profile-card">
                        <div class = "col-md-12  col-form-header" style = "padding-left: 0; font-size: 0.8em;">
                            <span>{{ $training->header }}</span>
                        </div>

                        <table class = "table">
                          <tbody>
                              <tr>
                                  <td><Strong>What:</strong></td>
                                  <td>{{ $training->content }}</td>
                                </tr>
                            <tr>
                                <td><Strong>Time:</strong></td>
                                <td>{{ $training->time}} A.M</td>
                            </tr>
                            <tr>
                              <td><Strong>Date:</strong></td>
                              <td>{{ $training->date }}</td>
                            </tr>
                            <tr>
                                <td><Strong>Where:</strong></td>
                                <td>{{ $training->venue . ", " . $training->place }}</td>
                              </tr>
                          </tbody>
                        </table>

                    </div>
                  </div>
                @endforeach

              </div>

          </div>

        <div class="col-md-12">
            <div class = "col-md-12  col-form-header">
              <div class="dot-header"></div>
              <span>Webinars</span>
            </div>
            <hr/>

            <div class = "row">

              <style>
                .phr-webinar-item {
                  margin-bottom: 6em;
                }
                .phr-webinar-item > iframe {
                  width: 100%;
                  height: 100%;
                }
              </style>

              @foreach ($webinars as $webinar)
              <div class = "col-md-4 phr-webinar-item">
                  <h4>{{ $webinar->title }}</h4>
                  <p>{{ $webinar->content_description }}</p>
                  <iframe class = "yt-video-frame" src="{{ $webinar->youtube_link }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
              </div>
              @endforeach

            </div>

        </div>

      </div>
    </div>
</section>

    <!-- Admin header -->
    @include('landing.layouts.footer')

    <script>
      $(document).ready(function(){
        $(".yt-video-frame").each(function(){
        //var head = $(this).contents()
        console.log("Iframe content", $(this).contents())
        /*var css = '<style type="text/css">' +
          'div.ytp-chrome-top-buttons{display:none}; ' +
          '</style>';
          $(this).append(css);
          console.log("append")
          })*/

      })

      })

    </script>

</body>
</html>
