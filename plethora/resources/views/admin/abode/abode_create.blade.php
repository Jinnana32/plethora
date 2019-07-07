@extends('admin.main')

@section('content')


    <form id = "create_abode_form" method = "POST" enctype="multipart/form-data" style = "padding-bottom:20rem;">

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
                                Abode
                                <br/>
                                <small>add new abode to company listings</small>
                                </h1>
                            </section>
                </div>

                <div class="col-xs-5" style = "text-align: right;padding-right:3%;margin-top:1%;">
                        <section class="content-header">
                            <button class = "btn btn-primary create-agent-btn"> Save Abode information</button>
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
                            <span>Project Related</span>
                    </div>

                    <div class="col-xs-4">
                        <div class="form-group form-group-select">
                                <label for="exampleInputEmail1">Developers</label>
                                <select class="form-control" name = "dev_id" id = "phrDevelopers">

                                </select>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class = "col-xs-4 phr-form-category-branding" style = "display:none;">
                        <div class="form-group form-group-select">
                                <label for="exampleInputEmail1">Brandings</label>
                                <select class="form-control" name = "brand_id" id = "phrBrandings">
                                </select>
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>

                    <div class = "col-xs-4 phr-form-category-project">
                            <div class="form-group form-group-select">
                                    <label for="exampleInputEmail1">Choose project</label>
                                    <select class="form-control" name = "project_id" id = "phrProjects">
                                    </select>
                                    <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </div>
                    </div>

                    <div class="col-xs-12">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Display name (for Model Name, Unit Name)</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" name = "display_name" required/>
                            </div>
                    </div>

                    <div class = "col-xs-12 col-form-header">
                                <div class="dot-header"></div>
                                <span>Listing setup</span>
                        </div>

                        <div class="col-xs-4">
                                <div class="form-group form-group-select">
                                        <label for="exampleInputEmail1">Category</label>
                                        <select class="form-control" name = "category_id" id = "phrCategory">
                                        </select>
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </div>
                        </div>

                        <div class="col-xs-4">
                                <div class="form-group form-group-select">
                                        <label for="exampleInputEmail1">Location</label>
                                        <select class="form-control" name = "location_id" id = "phrLocation">

                                        </select>
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </div>
                        </div>

                        <div class="col-xs-4">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Address</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "address" required/>
                                </div>
                        </div>

                    <div class = "col-xs-12 col-form-header">
                            <div class="dot-header"></div>
                            <span>Unit info</span>
                    </div>

                    <!-- Category option -->
                    <div class = "col-xs-12 phr-form-category-options" style = "padding:0;">
                    </div>

                    <div class = "col-xs-12 col-form-header">
                            <div class="dot-header"></div>
                            <span>Pricing</span>
                    </div>

                    <div class="col-xs-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Total Contract Price</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "total_contract_price" required/>
                            </div>
                    </div>

                    <div class="col-xs-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Net Selling Price</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "net_selling_price" required/>
                            </div>
                    </div>

                    <div class="col-xs-4">
                            <div class="form-group">
                                    <label for="exampleInputEmail1">Monthly Amortization</label>
                                    <input type="number" class="form-control" id="exampleInputEmail1" name = "monthly_payment" required/>
                            </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="form-group">
                                <label for="exampleInputEmail1">Monthly Equity</label>
                                <input type="number" class="form-control" id="exampleInputEmail1" name = "monthly_equity" required/>
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

            var abodeForm = $("#create_abode_form")
            var phrBrandWrapper = $(".phr-form-category-branding");
            var phrProjectWrapper = $(".phr-form-category-project");
            var initialProjectContent = phrProjectWrapper.html();
            var initialProjectWithBrand;
            var phrBrandings = $("#phrBrandings");
            var phrProjects = $("#phrProjects");
            var dev_brandings = [];
            var decoyForm = $("#decoy_form");
            var dev_projects = [];

            // Render the developers
            getDevelopers()
            getCategory()
            getAgents()
            getLocations()

            abodeForm.on('submit', function(e){
                e.preventDefault()
                var options = [];
                var abode_information = $(this).serializeObject();

                $(".cat_options").each(function(index) {

                    // Get the check values
                    var isIncluded = $(this).siblings(".cat_include").is(':checked');

                    var feat_id = $(this).attr("id");
                    var opt_value = $(this).val();
                    options.push(feat_id + "," + opt_value + "," + isIncluded)
                });

                abode_information.options = options;

                console.log("Posted information", abode_information);

                PhrService.post("{{ url('/api/v1/admin/abode') }}", abode_information,
                function(data){
                        resetField(abodeForm)
                        hideLoading()
                        showSuccess("Success", "New abode was added!");
                })

            })

            $(document).on("change", ".cat_include", function(){
                var input =  $(this).siblings(".cat_options")
                var labelText = $(this).siblings(".cat_label")
                if($(this).is(":checked")){
                    input.prop('disabled', false);
                    labelText.css("color", "#000")
                }else{
                    input.prop('disabled', true);
                    labelText.css("color", "#ccc")
                }
            })

            $(document).on("change", "#phrDevelopers", function(){
                var index = $(this).prop("selectedIndex");
                showBranding(index);
                showProjects(index);
            })

            $(document).on("change", "#phrBrandings", function(){
                var dev = $("#phrDevelopers").prop("selectedIndex");
                var brand = $(this).val()
                showProjectByBrand(dev, brand);
            })

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

            $(document).on("change", "#phrCategory", function(){
                var catId = $(this).val()
                getCategoryOptions(catId);
            })

            function getCategory(){
                var categoryOptions = $("#phrCategory")
                var url = "{{ url('/api/v1/admin/category') }}"
                PhrService.get(url, {}, function(resp){
                   hideLoading()
                   getCategoryOptions(resp.categories[0].id)
                   var options = ""
                   for(var x = 0; x < resp.categories.length; x++){
                        options += "<option value = '" + resp.categories[x].id + "'>"+ resp.categories[x].category +"</option>"
                   }
                   categoryOptions.html(options)
                })
            }

            function makeSelectableField(id, label, options){
                var selectableField = '<div class="col-xs-4">' +
                        '<div class="form-group form-group-select">' +
                                '<input type = "checkbox" class = "cat_include" checked/>' +
                                '<label class = "cat_label" for="exampleInputEmail1">'+ label +'</label>'+
                                '<select class="form-control cat_options" id = "'+ id +'">';

                        for(var x = 0; x < options.length; x++){
                                selectableField += '<option value = "'+ options[x].options +'">'+ options[x].options +'</option>';
                        }

                 selectableField += '</select>'+
                                    '<i class="fa fa-angle-down" aria-hidden="true"></i>'+
                                    '</div></div>';
                return selectableField;
            }

            function makeGenericField(id, label){
                return '<div class="col-xs-4">' +
                            '<div class="form-group">' +
                                   '<input type = "checkbox" class = "cat_include" checked/>' +
                                   '<label class = "cat_label" for="exampleInputEmail1">'+ label +'</label>' +
                                    '<input type="text" class="form-control cat_options" id="'+ id +'" required/>' +
                            '</div>' +
                            '</div>';
            }

            function getCategoryOptions(category_id){
                var CategoryOptionsWrapper = $(".phr-form-category-options");
                var url = "{{ url('/api/v1/admin/category/options') }}/" + category_id
                PhrService.get(url, {}, function(resp){
                   hideLoading()
                   $(".modal-backdrop").css("display", "none");
                   var optionContent = "";
                   var features = resp.units.feats;
                   var options = resp.units.opts;
                   for(var x = 0; x < features.length; x++){
                        if(features[x][0].has_options == 1){
                          optionContent += makeSelectableField(features[x][0].id,features[x][0].display_name, options[x])
                        }else{
                          optionContent += makeGenericField(features[x][0].id,features[x][0].display_name)
                        }
                   }

                   CategoryOptionsWrapper.html(optionContent)

                })
            }

            function getAgents(){
                var agentOptions = $("#phrAgents")
                var url = "{{ url('/api/v1/admin/agents') }}"
                PhrService.get(url, {}, function(resp){
                   hideLoading()
                   var options = ""
                   for(var x = 0; x < resp.agents.length; x++){
                        options += "<option value = '" + resp.agents[x].user_id + "'>"+ resp.agents[x].name +"</option>"
                   }
                   agentOptions.html(options)
                })
            }

            function getLocations(){
                var agentOptions = $("#phrLocation")
                var url = "{{ url('/api/v1/admin/location') }}"
                PhrService.get(url, {}, function(resp){
                   hideLoading()
                   var options = ""
                   for(var x = 0; x < resp.locations.length; x++){
                        options += "<option value = '" + resp.locations[x].id + "'>"+ resp.locations[x].location +"</option>"
                   }
                   agentOptions.html(options)
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