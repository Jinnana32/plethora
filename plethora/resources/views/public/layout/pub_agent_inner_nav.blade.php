 <!-- Agent navbar -->
 <div class="col-md-3">
        <div class = "phr-card">
            <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/listings"><button class = "btn btn-{{ $status == "listing" ? "primary" : "default" }} btn-block">My Listings</button></a>
            <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/progression"><button class = "btn btn-{{ $status == "progress" ? "primary" : "default" }} btn-block">Progression</button></a>
            <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/learnings"><button class = "btn btn-{{ $status == "learning" ? "primary" : "default" }} btn-block">Learnings</button></a>
            <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/businesscard"><button class = "btn btn-{{ $status == "business" ? "primary" : "default" }} btn-block">Business Card</button></a>
            <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/inbox"><button class = "btn btn-{{ $status == "inbox" ? "primary" : "default" }} btn-block">Inbox</button></a>
            <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/faqs"><button class = "btn btn-{{ $status == "faq" ? "primary" : "default" }} btn-block">FAQs</button></a>
        </div>
</div>