<div class = "phr-head-navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-2 phr-header">
                <img class = "img-responsive" src="{{ url("/vendor/img/phr-logo.jpg") }}">
            </div>
            <div class="col-md-8">
                <ul class = "phr-header-nav">
                    <li><a href = "{{ url("/") }}">Home</a></li>
                    <li><a href = "#">About</a></li>
                    <li><a href = "{{ url("/catalog") }}">Catalog</a></li>
                    <li>Updates</li>
                    <li><a href = "{{ url("/developers") }}">Developers</a></li>
                    <li><a href = "{{ url("/agents") }}">Find an Agent</a></li>
                </ul>
            </div>
            <div class="col-md-2 phr-header-sign">
                    <a href="{{ url("login") }}" class = "btn btn-sm btn-block btn-primary">Sign in/Sign Up</a>
            </div>
        </div>
    </div>
</div>