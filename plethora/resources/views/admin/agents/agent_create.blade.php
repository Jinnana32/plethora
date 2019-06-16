@extends('admin.main')

@section('content')

    <form action="" method="post" id = "create_agent_form">
     <!-- Header Row -->
    <div class="row">

        <div class = "col-xs-12">
            <div class="row">

                <div class="col-xs-1">
                            <div class = "content-header">
                                <a href = "{{ url()->previous() }}" style = "font-size: 2em;color:black;">
                                    <i class = "fa fa-angle-left"></i>
                                </a>
                            </div>
                        </div>

                <div class="col-xs-6 form-col-header" >
                    <section class="content-header form-content-header">
                                <h1>
                                Agent Profile
                                <br/>
                                <small>create new agent information</small>
                                </h1>
                            </section>
                </div>

                <div class="col-xs-5" style = "text-align: right;padding-right:3%;margin-top:1%;">
                        <section class="content-header">
                            <button class = "btn btn-primary create-agent-btn"> Save Agent information</button>
                        </section>
                    </div>


            </div>
        </div>
    </div><!-- ./Header Row -->

    <!-- Content Section -->
    <section class="content content-form">

        <div class="row">
            <div class="col-xs-12">

                    <div class = "col-xs-12 col-form-header">
                            <div class="dot-header"></div>
                            <span>Work Related</span>
                        </div>

                        <div class="col-xs-4">
                                <div class="form-group form-group-select">
                                        <label for="exampleInputEmail1">Company Position</label>
                                        <select class="form-control" name = "company_position" id = "phrPositionChange">
                                                <option value = "broker">Broker</option>
                                                <option value = "division">Division Manager</option>
                                                <option value = "unit">Unit Manager</option>
                                        </select>
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </div>
                        </div>
                        <div class="col-xs-4">
                                <div class="form-group form-group-select">
                                        <label for="exampleInputEmail1">Upline Candidates</label>
                                        <select class="form-control" name = "upline_id" id = "phrUplines">
                                                <option value = "1">Bell flor</option>
                                        </select>
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </div>
                        </div>

                        <div class="col-xs-4">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Company Username</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "username" required/>
                                </div>
                        </div>

                    <div class = "col-xs-12 col-form-header">
                            <div class="dot-header"></div>
                            <span>Personal Related</span>
                    </div>

                    <div class="col-xs-4">
                        <div class="form-group">
                            <label for="exampleInputEmail1">First name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name = "first_name" required/>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Last name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name = "last_name" required/>
                        </div>
                    </div>
                    <div class="col-xs-4">
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
                    <div class="col-xs-4">
                            <div class="form-group form-group-select">
                                    <label for="exampleInputEmail1">Gender</label>
                                    <select class="form-control" name = "gender">
                                        <option value = "Male">Male</option>
                                        <option value = "Female">Female</option>
                                    </select>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </div>
                    </div>
                    <div class="col-xs-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Birthday</label>
                                    <input type="date" class="form-control" id="exampleInputEmail1" name = "birthday" required/>
                            </div>
                    </div>
                    <div class="col-xs-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Citizenship</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name = "citizenship" required/>
                            </div>
                    </div>
                    <div class="col-xs-4">
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
                    <div class="col-xs-4">
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

                    <div class = "col-xs-12  col-form-header">
                            <div class="dot-header"></div>
                            <span>Contact Related</span>
                    </div>

                    <div class="col-xs-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" name = "email_address" required/>
                            </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Contact Number</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name = "contact_number" required/>
                        </div>
                    </div>
                    <div class="col-xs-4">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Facebook </label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name = "facebook_account" placeholder="eg. www.facebook.com/plethorahomes" required/>
                        </div>
                    </div>
                    <div class="col-xs-4">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">PRC license</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "prc_license" placeholder="eg. www.facebook.com/plethorahomes" required/>
                                </div>
                            </div>
                    <div class="col-xs-8">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Permanent Address</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name = "permanent_address" required/>
                            </div>
                    </div>

            </div>
        </div><!-- </row> -->

    </section><!-- Content Section> -->
    </form>

@endsection

@section('page-script')
    <script>

        $(document).ready(function(){

            // Submitting form data
            var create_agent_form = $('#create_agent_form')
            create_agent_form.on('submit', function(e){

                e.preventDefault();
                var agent_information = $(this).serializeObject();

                // Append default password
                agent_information.password = agent_information.last_name

                // Append agent access_level
                agent_information.access_level = "agent"

                agent_information.verified = 1

                PhrService.post("{{ url('/api/v1/register') }}", agent_information,
                function(data){
                        resetField(create_agent_form)
                        hideLoading()
                        phr_img_toggle.css("display", "none")
                        showSuccess("Success", "New Agent was added!");
                })
            })

            var phrPositionChange = $("#phrPositionChange");
            var phrUplines = $("#phrUplines");


            // Executes on load to fetch current data
            renderPositions()

            phrPositionChange.on('change', function(){
                renderPositions()
            })

            function renderPositions(){
                var pos = phrPositionChange.val()
                var url = "{{ url('/api/v1/agent/genealogy/position/{pos}') }}".replace("{pos}", pos)
                PhrService.get(url, {}, function(resp){
                   hideLoading()

                   console.log(resp)
                   var options = ""
                   var genealogy = resp.genealogy
                   for(var x = 0; x < genealogy.length; x++){
                        var position = genealogy[x].position
                        var user = genealogy[x].user_info
                        options += "<option value = '" + user.user_id + "'>" + user.first_name + " " + user.last_name +" (" + position.position + ")</option>"
                   }
                   phrUplines.html(options)
                })
            }

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
    </script>
@endsection