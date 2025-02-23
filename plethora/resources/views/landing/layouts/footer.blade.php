<footer class = "phr-footer">
        <div class="container">
            <div class="phr-footer-item">
                <h2>Company</h2>
                <ul>
                    <li>About Us</li>
                    <li>Contact Us</li>
                    <li>Updates</li>
                </ul>
            </div>

            <div class="phr-footer-item">
                <h2>Properties</h2>
                <ul>

                    <a href = "{{ url("/catalog") }}" style = "color:#909090;"><li>Catalog</li></a>
                    <a href = "{{ url("/developers") }}" style = "color:#909090;"><li>Developers</li></a>

                </ul>
            </div>

            <div class="phr-footer-item">
                <h2>Find Agent</h2>
                <ul>
                    <a href = "{{ url("/agents") }}" style = "color:#909090;"><li>Our Agents</li></a>
                </ul>
            </div>

            <div class="phr-footer-item">
                <h2>Our Clients</h2>
                <ul>
                    <a href = "{{ url("/login") }}" style = "color:#909090;"><li>Sign In</li></a>
                    <a href = "{{ url("/register") }}" style = "color:#909090;"><li>Register</li></a>
                </ul>
            </div>

            <div class="phr-footer-item">
                <h2>Plethora Homes Realty</h2>
                <ul>
                    <li><i class="fa fa-inbox"></i><span>plethorahomes@gmail.com</span></li>
                    <li><span><i class="fa fa-phone"></i> 0921-7298-758</span></li>
                    <li><span><i class="fa fa-facebook"></i> Plethorahomes</span></li>
                </ul>
            </div>

            <div class="clearfix"></div>

            <hr style = "background:#808080;"/>



            <div class = "phr-credits">
                <img class = "img-responsive" src="{{ url("/vendor/img/phr-logo.jpg") }}" style = "width:150px;">
                <span id="siteseal"><script async type="text/javascript" src="https://seal.godaddy.com/getSeal?sealID=p4npwqLhu0z56ySDT3jj4SZVCMD56jHwBYlocGr3WcOjY8YlrA3IFz6f61PN"></script></span>
                <h2 style = "float:right;">Plethora Homes Realty &copy; 2019</h2>
            </div>
        </div>

        <style>
            /* The snackbar - position it at the bottom and in the middle of the screen */
            #snackbar {
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
            #snackbar.show {
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
        <div id="snackbar">Link was copied, you can paste this now client</div>

        <style>
                /* The snackbar - position it at the bottom and in the middle of the screen */
                #inquireMessage {
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
                #inquireMessage.show {
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
            <div id="inquireMessage">Thank you for your interest!</div>

    </footer>


<!-- Bootstrap core JavaScript -->
<script src="{{ url("vendor/jquery/dist/jquery.min.js") }}"></script>
<script src="{{ url("vendor/bootstrap/dist/js/bootstrap.min.js") }}"></script>
<script src="{{ url("vendor/jquery/dist/jquery.min.js") }}"></script>
<script src="{{ url("vendor/js/phrService.js") }}"></script>
<script src="{{ url("vendor/js/serialize-object.js") }}"></script>
<script src="{{ url("vendor/js/phrdialogs.js") }}"></script>
<script src="{{ url("vendor/js/jquery.print.js") }}"></script>
<script src="{{ url("vendor/bootstrap/dist/js/bootstrap.bundle.min.js") }}"></script>
<script src = "{{ url("vendor/js/printThis.js") }}"></script>

   <!-- DONT DO THIS AT HOME -->
    <script>
        function showSnackbar(element) {
        // Get the snackbar DIV
        var x = document.getElementById(element);

        // Add the "show" class to DIV
        x.className = "show";

        // After 3 seconds, remove the show class from DIV
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }

        function fallbackCopyTextToClipboard(text) {
   var textArea = document.createElement("textarea");
   textArea.value = text;
   document.body.appendChild(textArea);
   var y = $("html").scrollTop();
   textArea.focus();
   textArea.select();
   $("html, body").scrollTop(y);

   try {
      var successful = document.execCommand('copy');
      // var msg = successful ? 'successful' : 'unsuccessful';
      // console.log('Fallbackpying text command was ' + msg);
   } catch (err) {
      // console.error('Fallbackps, unable to copy', err);
   }

   document.body.removeChild(textArea);
}

            function copyTextToClipboard(text) {
              if (!navigator.clipboard) {
                fallbackCopyTextToClipboard(text);
                return;
              }
              navigator.clipboard.writeText(text).then(function() {
                showSnackbar("snackbar")
              }, function(err) {
                console.error('Async: Could not copy text: ', err);
              });
            }

            $(".fappy").click(function(){
              copyTextToClipboard($(this).attr("name"));
              console.log("Link was copied, you can paste this now client");
            })

        $(document).ready(function(){
            $(".phr-menu-item").click(function(){
                var mobileHead = $(".phr-head-mobile")
                if(mobileHead.hasClass("mobileOpen")){
                    mobileHead.removeClass("mobileOpen")
                }else{
                    mobileHead.addClass("mobileOpen")
                }
            })
            $(".carousel-inner").children().first().addClass("active")
            $(".carousel-indicators").children().first().addClass("active")
        })
      </script>



        @if(session('inquire'))
        <script>
        (function(){
        showSnackbar("inquireMessage")
        })()
        </script>
        @endif