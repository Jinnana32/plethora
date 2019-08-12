<header class="sub-masthead">
    <div class="container">
            <div class="row">
              <div class="col-md-1 sub-mast-back" style = "font-size:2rem;">
              </div>
              <div class="col-md-3 sub-mast-text phr-agent-image-wrapper" style = "margin-top:-30px;">
                  <div class = "phr-profile-image-edit">
                    <img class = "phr-agent-image" src = "{{ url("") }}/plethora/storage/app/public/agents/{{ $agent['image'] }}" />
                    <button class = "phr-profile-image" data-toggle="modal" data-target="#edit_profile_image"><i class = "fa fa-edit"></i></button>
                  </div>
              </div>
              <div class="col-md-8 sub-mast-text sub-mast-info">
                  <p><h2 class = "edit-name">{{ $agent["name"] }}</h2></p>
                  <p class = "edit-address">{{ $agent["address"] }}</p>
                  <p><i class = "fa fa-phone"></i> <span class = "edit-contact">{{ $agent["contact"] }}</span></p>
                  <p><i class = "fa fa-envelope"></i> <span class = "edit-email">{{ $agent["email"] }}</span></p>
                  <p><h5 style = "font-size:0.8em!important;">My Public Profile: <a href = "{{ url("") }}/agent/{{ $agent["referral_link"] }}" target = "_blank" style = "color:orange;cursor:pointer;">{{ url("") }}/agent/{{ $agent["referral_link"] }}</a> <i class = "fa fa-copy fappy" name = "{{ url("") }}/agent/{{ $agent["referral_link"] }}" style = "font-size:1.5em;cursor:pointer;"></i></h5></p>

                 <a href = "{{ url("") }}/agent/{{ Auth::user()->id }}/profile" style = "color:white;"><i class = "fa fa-edit profile-edit"></i></a>
               </div>

            </div>
          </div>
</header>

<div class="modal" tabindex="-1" role="dialog" id = "edit_profile_image">
  <form action="{{ route("phradmin.update_profile_image.submit") }}" method = "POST" enctype="multipart/form-data">
      {{ csrf_field() }}
      <div class="modal-dialog" role="document">
          <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title">Your Profile</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
              <form action="">
                  <div class="row">
                      <div class = "col-md-12  col-form-header">
                              <div class="dot-header"></div>
                              <span>Edit image</span>
                      </div>

                      <div class="col-md-12">
                              <div class="form-group">
                                  <label for="exampleInputEmail1">Upload image</label>
                                  <input type="file" id="exampleInputEmail1" name = "agent_image"/>
                                  <input type="hidden" id="user_id" value = "{{ Auth::user()->id }}" name = "user_id"/>
                              </div>
                      </div>
                  </div>
              </form>
          </div>
          <div class="modal-footer">
              <button class="btn btn-primary">Continue</button>
          </div>
          </div>
      </div>
  </form>
</div>