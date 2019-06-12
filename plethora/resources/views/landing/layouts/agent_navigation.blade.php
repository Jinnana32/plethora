<div class = "phr-head-navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-2 phr-header">
                <img class = "img-responsive" src="{{ url("/vendor/img/phr-logo.jpg") }}">
            </div>
            <div class="col-md-8">
                    <ul class = "phr-header-nav">
                        <li><a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/progression">Dashboard</a></li>
                        <li><a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/listings">My Listing</a></li>
                        <li><a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/learnings">Learnings</a></li>
                        <li><a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/businesscard">Business Card</a></li>
                        <li><a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/inbox">Inbox</a></li>
                        <li><a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/faqs">FAQs</a></li>
                    </ul>
                </div>
            <div class="col-md-2 phr-header-sign">
                    <a href="{{ url("login") }}" class = "btn btn-sm btn-block btn-primary">Logout</a>
            </div>
        </div>
    </div>
</div>
