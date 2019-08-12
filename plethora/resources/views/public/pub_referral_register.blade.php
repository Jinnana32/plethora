<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')
      <style>
            .team-member {
                margin-bottom: 50px;
                text-align: center;
                background-color: #fff;
                border: 0;
                border-radius: 10px;
                padding: 30px 20px 20px;
            }

            .team-member h4 {
                color: #404040;
            }

            .team-member p {
                color: #505050 !important;
            }
            .phr-agent-image {
                width: 50px;
                height: 50px;
                border-radius: 100%;
            }
            .sub-mast-info {
                background: rgba(0,0,0,0.5);
                padding-left:2rem;
                padding-top:20px;
                padding-bottom:20px;
                border-radius: 10px;
            }

            .phr-card {
                height:100%;
                background-color: #fff;
                box-shadow: 0 1px 14px rgba(0,0,0,0.09);
                padding:10% 5%;
            }

            .phr-star-holder {
                position: absolute;
                right:1rem;
                top:1rem;
            }

            .phr-star-holder .checked {
                color:yellow;
            }
        </style>
</head>

<body id="page-top">

    <!-- PHR dialogs -->
    @include('dialog.phr_dialogs')

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
                <div class="col-md-4 sub-mast-text">
                    <h1>Referral Form</h1>
                </div>
                <div class="col-md-7">

                        <div class="col-md-12 sub-mast-text sub-mast-info">
                                <h2><img class = "phr-agent-image" src = "{{ url("") }}/plethora/storage/app/public/agents/{{ $agent["image"] }}" /> {{ $agent["name"] }}</h2>
                                <p>{{ $agent["address"] }}</p>
                                <p><i class = "fa fa-phone"></i> {{ $agent["contact"] }}</p>
                                <p><i class = "fa fa-envelope"></i> {{ $agent["email"] }}</p>
                                <p><a href= "{{ url("") }}/agent/{{ $agent["referral_link"] }}"><h5 style = "font-size:0.8em!important;">Back to my profile</h5></a></p>
                        </div>
                </div>
        </div>
      </header>

  <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
        <div class="container">
          <form id = "create_agent_form" method="POST">
          <div class="row">

                <div class = "col-md-12 col-form-header">
                        <div class="dot-header"></div>
                        <span>Work</span>
                    </div>

                    <div class="col-md-6">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Your link - <span class = "agent_link">www.plethorahomes.com/</span>  <br/>Company Username </label>
                                    <input type="text" class="form-control agentlink_change" id="exampleInputEmail1" name = "username" required/>
                                    <input type="hidden" name = "referred_by" value = "{{ $agent["referred_by"] }}"/>
                            </div>
                    </div>

                    <div class="col-md-6" style="margin-top:1.2rem;">
                            <div class="form-group form-group-select">
                                    <img style = "width:200px;height:200px;display:none;" id = "phr_img_toggle"/>
                            </div>
                    </div>

                    <div class="col-md-6" style="margin-top:1.2rem;">
                            <div class="form-group form-group-select">
                                    <label for="exampleInputEmail1">Password</label>
                                    <input type="password" class="form-control phr_password" id="exampleInputEmail1" name = "password" required/>
                                    <i class="fa fa-eye password_toggle" aria-hidden="true"></i>
                            </div>
                    </div>

                <div class = "col-md-12 col-form-header">
                        <div class="dot-header"></div>
                        <span>Personal</span>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">First name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name = "first_name" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="exampleInputEmail1">Last name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name = "last_name" required/>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                            <label for="exampleInputEmail1">Middle name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name = "middle_initial" required/>
                    </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group form-group-select">
                                <label for="exampleInputEmail1">Name extension</label>
                                <select class="form-control" name = "name_suffix">
                                        <option value = ""></option>
                                        <option value = "Jr.">Jr.</option>
                                        <option value = "I">I</option>
                                        <option value = "II">II</option>
                                        <option value = "III">III</option>
                                        <option value = "IV">IV</option>
                                        <option value = "MSW">MSW</option>
                                        <option value = "PhD">PhD</option>
                                </select>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group form-group-select">
                                <label for="exampleInputEmail1">Gender</label>
                                <select class="form-control" name = "gender">
                                    <option value = "Male">Male</option>
                                    <option value = "Female">Female</option>
                                </select>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Birthday</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" name = "birthday" required/>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Citizenship</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name = "citizenship" required/>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group form-group-select">
                                <label for="exampleInputEmail1">Religion</label>
                                <select class="form-control" name = "religion">
                                        <option value = "Male">Roman Catholic</option>
                                        <option value = "Female">Protestant</option>
                                        <option value = "Female">Muslim</option>
                                        <option value = "Female">Iglesia ni Cristo</option>
                                        <option value = "Female">Baptist</option>
                                        <option value = "Female">Born Again</option>
                                    </select>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                </div>
                <div class="col-md-4">
                        <div class="form-group form-group-select">
                                <label for="exampleInputEmail1">Civil status</label>
                                <select class="form-control" name = "civil_status">
                                        <option value = "Male">Single</option>
                                        <option value = "Female">Married</option>
                                        <option value = "Female">Widowed</option>
                                        <option value = "Female">Separated</option>
                                        <option value = "Female">Divorced</option>
                                </select>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                </div>

                <div class = "col-md-12  col-form-header">
                        <div class="dot-header"></div>
                        <span>Contact</span>
                </div>

                <div class="col-md-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name = "email_address" required/>
                        </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                            <label for="exampleInputEmail1">Contact Number</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name = "contact_number" required/>
                    </div>
                </div>
                <div class="col-md-4" style="margin-top:-1.2rem;">
                    <div class="form-group">
                            <label for="exampleInputEmail1">Facebook  <br/> <span class = "facebook_account">www.facebook.com/</span> </label>
                            <input type="text" class="form-control facebook_change" id="exampleInputEmail1" name = "facebook_account" required/>
                    </div>
                </div>
                <div class="col-md-12">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Permanent Address</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name = "permanent_address" required/>
                        </div>
                </div>

          </div>
          <div class="row" style = "margin-top:2rem;">
            <div class="col-md-4">
                <div class="form-group">
                      <button class="btn btn-primary">Save Profile</button>
                </div>
            </div>
          </div>
         </form>
        </div>
      </section>


    <!-- Admin header -->
    @include('landing.layouts.footer')

    <script>
            $(function(){
             $(document).ready(function(){

                 // Submitting form data
                 var create_agent_form = $('#create_agent_form')
                 create_agent_form.on('submit', function(e){

                     e.preventDefault();
                     var agent_information = $(this).serializeObject();

                     // Append agent access_level
                     agent_information.access_level = "agent"

                     agent_information.verified = 0

                     $.ajax({
                         type: "POST",
                         url: "{{ url('/api/v1/register') }}",
                         data: JSON.stringify(agent_information),
                         contentType: 'application/json',
                         success: function(resp){
                             resetField(create_agent_form)
                             hideLoading()
                             showSuccess("Success", "You have been registered and waiting for verification");
                         },
                         error: function(err){
                             serviceOperator(err)
                             console.error("PHR ERROR: " , err)
                         }
                     })

                 })

                 var facebookChange = $(".facebook_change");
                 facebookChange.keyup(function(){
                     var fbAC = $(this).val();
                     $(".facebook_account").html("www.facebook.com/" + fbAC);
                 })

                 var agentLink = $(".agentlink_change");
                 agentLink.keyup(function(){
                     var fbAC = $(this).val();
                     $(".agent_link").html("www.plethorahomes.com/" + fbAC);
                 })

                 var password_toggle = $(".password_toggle");
                 password_toggle.click(function(){
                     var phr_password = $(".phr_password");
                     if(phr_password.attr("type") == "password"){
                         phr_password.attr("type", "text")
                     }else{
                         phr_password.attr("type", "password")
                     }
                 })

                 var phr_image = $(".phr_image");
                 var phr_img_toggle = $("#phr_img_toggle");
                 phr_image.on('change', function(){
                     if(phr_img_toggle.css("display") == "block"){
                         phr_img_toggle.css("display", "none")
                     }else{
                         phr_img_toggle.css("display", "block")
                         phr_img_toggle.attr("src", phr_image.val())
                     }
                 })

             })
         })
         </script>


</body>
</html>
