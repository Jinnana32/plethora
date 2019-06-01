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
                <h2 style = "float:right;">Plethora Homes Realty &copy; 2019</h2>
            </div>
        </div>
    </footer>