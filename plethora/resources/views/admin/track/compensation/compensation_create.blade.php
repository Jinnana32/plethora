@extends('admin.main')

@section('content')
<div class="row">

<div class = "col-xs-12">

    <form id = "compensationForm">
    <div class = "container">
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
                                        Compensation form
                                        <br/>
                                        <small>add new abode to company listings</small>
                                        </h1>
                                    </section>
                        </div>

                        <div class="col-xs-5" style = "text-align: right;padding-right:3%;margin-top:1%;">
                                <section class="content-header">
                                    <button class = "btn btn-primary compensation_add"> Save compensation</button>
                                </section>
                        </div>


                    </div>
                </div>
            </div><!-- ./Header Row -->

<section class="content">
<div class="row">

<div class="col-md-12">


        <div class = "row">

        <div class = "col-xs-12 col-form-header">
                <div class="dot-header"></div>
                <span>Client</span>
        </div>

        <div class="col-xs-6">
                <div class="form-group">
                        <label for="exampleInputEmail1">First name</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name = "first_name" required/>
                </div>
        </div>

        <div class="col-xs-6">
                <div class="form-group">
                        <label for="exampleInputEmail1">Last name </label>
                        <input type="text" class="form-control" id="exampleInputEmail1" name = "last_name" required/>
                </div>
        </div>

        <div class = "col-xs-12 col-form-header">
                <div class="dot-header"></div>
                <span>Commission</span>
        </div>

        <div class="col-xs-6">
            <div class="form-group">
                    <label for="exampleInputEmail1">Commission rate</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" value = "6" name = "commission_rate" required/>
            </div>
        </div>

        <div class="col-xs-6">
                <div class="form-group">
                        <label for="exampleInputEmail1">Amount Released</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" name = "amount_release" required/>
                </div>
        </div>

        <div class="col-xs-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Withholding Tax</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name = "with_holding_tax" required/>
                        </div>
                </div>

        <div class = "col-xs-6">
                <div class="form-group form-group-select">
                        <label for="exampleInputEmail1">Status</label>
                        <select class="form-control" name = "status" id = "status">
                            <option>Booked</option>
                            <option>Good</option>
                            <option>Critical</option>
                            <option>Forfeited</option>
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
        </div>

        <div class = "col-xs-12 col-form-header">
                <div class="dot-header"></div>
                <span>Agent information</span>
        </div>

        <div class="col-xs-6">
                <div class="form-group">
                        <label for="exampleInputEmail1">Search Agent </label>
                        <input type="text" class="form-control" id="tvSearchAgent" required/>
                </div>
        </div>

        <div class="col-xs-12" id = "searchAgentTrash">
                <div class = "phr-empty-trash">
                        <i class = "fa fa-inbox"></i>
                        <p>No available sub-brandings<p>
                </div>
        </div>

        <div class="col-xs-12" id="searchAgentTable" style = "display:none;">
                <table class="table" role="grid" aria-describedby="example2_info" >
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Position</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">First name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Last name</th>
                        </tr>
                        </thead>
                        <tbody class = "searchAgentBody">
                        </tbody>
                </table>
                <input type="hidden" class="form-control" id="tvAgentId" name = "agent_id"/>
        </div>

        <div class = "col-xs-12 col-form-header">
                <div class="dot-header"></div>
                <span>Abode information</span>
        </div>

        <div class="col-xs-4">
                <div class="form-group form-group-select">
                        <label for="exampleInputEmail1">Developers</label>
                        <select class="form-control" id = "phrDevelopers">

                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            </div>

            <div class = "col-xs-4 phr-form-category-branding" style = "display:block;">
                <div class="form-group form-group-select">
                        <label for="exampleInputEmail1">Brandings</label>
                        <select class="form-control" id = "phrBrandings">
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                </div>
            </div>

            <div class = "col-xs-4 phr-form-category-project">
                    <div class="form-group form-group-select">
                            <label for="exampleInputEmail1">Choose project</label>
                            <select class="form-control" id = "phrProjects">
                            </select>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
            </div>

            <div class = "col-xs-12" id = "searchAbodeTrash">
                <div class = "phr-empty-trash" >
                        <i class = "fa fa-inbox"></i>
                        <p>No available sub-brandings<p>
                </div>
            </div>

            <div class = "col-xs-12" id="searchAbodeTable" style = "display:none;">
                    <table class="table" id = "breakdownTable" role="grid" aria-describedby="example2_info" >
                            <thead>
                            <tr role="row">
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Model/Unit</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Category</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Address</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Contract Price</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Selling Price</th>
                            </tr>
                            </thead>
                            <tbody class = "searchAbodeBody">
                            </tbody>
                    </table>
                    <input type="hidden" class="form-control" id="tvAbodeId" name = "abode_id"/>
            </div>

            <div class="col-xs-6">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Net Selling Price</label>
                                <input type="number" class="form-control" id="netSellingPrice" name = "current_net_selling"/>
                        </div>
        </div>


        </div> <!-- end of row -->

        </form>
    </div>
</div>

<div class="col-md-4" style = "height:500px;">

</div>

</div><!-- </row> -->
</section><!-- </content> -->

</section><!-- Content Section> -->

<script>
    $(document).ready(function(){
        // Setup for abode
        var tvSearchAgent = $("#tvSearchAgent")
        var searchAgentTrash = $('#searchAgentTrash')
        var searchAgentTable = $('#searchAgentTable')
        var searchAgentBody = $('.searchAgentBody')

        var compensationForm = $("#compensationForm")
        var compensation_add = $(".compensation_add")

        tvSearchAgent.keyup(function(){
                var searchQuery = $(this).val()
        if(searchQuery !== ""){
            var url = "{{ url('/api/v1/admin/search/agents') }}/?search_query=" + searchQuery
            PhrService.getNoLoading(url, {}, function(resp){
                   var rows = "";
                   for(index in resp){
                        rows += makeRow(resp[index].id, "selectAgents",makeCol([
                                resp[index].position,
                                resp[index].first_name,
                                resp[index].last_name,

                        ]))
                   }
                   searchAgentBody.html(rows)
                   hideView(searchAgentTrash)
                   showView(searchAgentTable)
            })
        }else{
                hideView(searchAgentTable)
                showView(searchAgentTrash)
        }

        })

        compensationForm.submit(function(e){
               e.preventDefault()
               var compensation =  $(compensationForm).serializeObject();
               console.log(compensation)
               var url = "{{ url('/api/v1/admin/compensation') }}"
               PhrService.post(url, compensation, function(resp){
                   hideLoading()
                   resetField(compensationForm)
                   showSuccess("Success", "Compensation Was added to the system");
                })
        })

        $(document).on("click", ".selectAgents", function(){
                $(".selectAgents").each(function(key, value){
                        $(value).removeClass("clicked")
                })

                $(this).addClass("clicked")
                $("#tvAgentId").val($(this).attr("id"))
        })

        $(document).on("click", ".selectAbodes", function(){
                $(".selectAbodes").each(function(key, value){
                        $(value).removeClass("clicked")
                })

                var rowIndex = $('.searchAbodeBody tr').index($(this).closest('tr'));

                $(this).addClass("clicked")
                $("#netSellingPrice").val(abodes[rowIndex].net_selling_price)
                $("#tvAbodeId").val($(this).attr("id"))
        })

        var phrBrandWrapper = $(".phr-form-category-branding");
        var phrProjectWrapper = $(".phr-form-category-project");
        var initialProjectContent = phrProjectWrapper.html();
        var initialProjectWithBrand;
        var phrBrandings = $("#phrBrandings");
        var phrProjects = $("#phrProjects");
        var dev_brandings = [];
        var decoyForm = $("#decoy_form");
        var dev_projects = [];
        var abodes = [];

        // Render the developers
        getDevelopers()

        $(document).on("change", "#phrDevelopers", function(){
                var index = $(this).prop("selectedIndex");
                showBranding(index);
                showProjects(index);
                getModels()
            })

            $(document).on("change", "#phrBrandings", function(){
                var dev = $("#phrDevelopers").prop("selectedIndex");
                var brand = $(this).val()
                showProjectByBrand(dev, brand);
                getModels()
            })

            $(document).on("change", "#phrProjects", function(){
                getModels()
            })

            function getModels(){
                var dev_id = $("#phrDevelopers").val()
                var brand_id = $("#phrBrandings").val()
                var proj_id = $("#phrProjects").val()
                var url = "{{ url('/api/v1/admin/search/abodes') }}/?dev_id="+ dev_id +"&brand_id="+ brand_id +"&proj_id=" + proj_id
                PhrService.getNoLoading(url, {}, function(resp){
                        var rows = "";
                        console.log(resp)
                        if(resp.length > 0){
                                abodes = resp
                                for(index in resp){
                                        rows += makeRow(resp[index].id, "selectAbodes",makeCol([
                                                resp[index].display_name,
                                                resp[index].category,
                                                resp[index].address,
                                                resp[index].total_contract_price,
                                                resp[index].net_selling_price,

                                        ]))
                                }
                                $(".searchAbodeBody").html(rows)
                                hideView($("#searchAbodeTrash"))
                                showView($("#searchAbodeTable"))
                        }else{
                                hideView($("#searchAbodeTable"))
                                showView($("#searchAbodeTrash"))
                        }

                })
            }

            function showBranding(index){
                var brands = dev_brandings[index];

                if(brands.length > 0){
                    phrBrandWrapper.css("display", "block");
                    var options = "<option value = '0'>Any</option>"
                    for(var x = 0; x < brands.length; x++){
                        var brand = brands[x];
                        options += "<option value = '" + brand.id + "'>"+ brand.name +"</option>"
                    }
                    phrBrandings.html(options)
                }else{
                    phrBrandWrapper.css("display", "none");
                }
            }

            function showProjects(index){
                phrProjectWrapper.html(initialProjectContent);
                var projects = dev_projects[index];
                if(projects.length >= 1){
                    var options = ""
                    for(var x = 0; x < projects.length; x++){
                        var project = projects[x];
                        options += "<option value = '" + project.id + "'>"+ project.name +"</option>"
                    }
                    $("#phrProjects").html(options)
                }else{
                    phrProjectWrapper.html("<strong>No projects yet</strong>")
                }
                getModels()
            }

            function showProjectByBrand(dev, brand){
                phrProjectWrapper.html(initialProjectContent);
                var projects = dev_projects[dev];
                if(projects.length >= 1){
                    var options = ""
                    for(var x = 0; x < projects.length; x++){
                        var project = projects[x];
                        if(brand == 0){
                            options += "<option value = '" + project.id + "'>"+ project.name +"</option>"
                        }else{
                            if(project.sub_brand_id == brand){
                                options += "<option value = '" + project.id + "'>"+ project.name +"</option>"
                            }
                        }
                    }
                    if(options == ""){
                        phrProjectWrapper.html("<strong>No projects yet</strong>")
                    }else{
                        $("#phrProjects").html(options)
                    }
                }else{
                    phrProjectWrapper.html("<strong>No projects yet</strong>")
                }
            }

            function getDevelopers(){
                showLoading();
                var developerOptions = $("#phrDevelopers")
                var url = "{{ url('/api/v1/admin/developers') }}"
                PhrService.get(url, {}, function(resp){
                   hideLoading()
                   var options = ""
                   var developers = resp.developers;

                   for(var x = 0; x < developers.length; x++){
                        var dev_brands = developers[x].branding;
                        var dev = developers[x].developer;
                        var projects = developers[x].projects;
                        options += "<option value = '" + dev.id + "'>"+ dev.name +"</option>"
                        dev_brandings.push(dev_brands);
                        dev_projects.push(projects);
                   }

                   developerOptions.html(options)
                   showBranding(0);
                   showProjects(0);
                })
            }

    })
</script>

@endsection