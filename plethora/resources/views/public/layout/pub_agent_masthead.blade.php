<header class="sub-masthead">
    <div class="container">
            <div class="row">
              <div class="col-md-1 sub-mast-back" style = "font-size:2rem;">
              </div>
              <div class="col-md-3 sub-mast-text phr-agent-image-wrapper" style = "margin-top:-30px;">
                  <img class = "phr-agent-image" src = "{{ $agent['image'] }}" />
              </div>
              <div class="col-md-8 sub-mast-text sub-mast-info">
                  <p><h2 class = "edit-name">{{ $agent["name"] }}</h2></p>
                  <p class = "edit-address">{{ $agent["address"] }}</p>
                  <p><i class = "fa fa-phone"></i> <span class = "edit-contact">{{ $agent["contact"] }}</span></p>
                  <p><i class = "fa fa-envelope"></i> <span class = "edit-email">{{ $agent["email"] }}</span></p>
                  <p><h5 style = "font-size:0.8em!important;">My Public Profile: <a href = "{{ url("") }}/agent/{{ $agent["referral_link"] }}" target = "_blank" style = "color:orange;cursor:pointer;">{{ url("") }}/agent/{{ $agent["referral_link"] }}</a> <i class = "fa fa-copy fappy" name = "{{ url("") }}/agent/{{ $agent["referral_link"] }}" style = "font-size:1.5em;cursor:pointer;"></i></h5></p>
                  <p><h5 style = "font-size:0.8em!important;">My Referral Link: <a href = "{{ url("") }}/register/{{ $agent["referral_link"] }}" target = "_blank" style = "color:orange;cursor:pointer;" class = "edit-link">{{ url("") }}/register/{{ $agent["referral_link"] }}</a> <i class = "fa fa-copy fappy" name = "{{ url("") }}/register/{{ $agent["referral_link"] }}" style = "font-size:1.5em;cursor:pointer;"></i></h5></p>

                 <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/profile" style = "color:white;"><i class = "fa fa-edit profile-edit"></i></a>
               </div>

            </div>
          </div>
</header>
