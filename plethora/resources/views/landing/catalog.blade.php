<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Admin header -->
    @include('landing.layouts.header')
</head>

<body id="page-top">

    <!-- Plethora headline -->
    <div class="phr-headline">
        <div class="container text-right">
            <span><i class="fa fa-inbox"></i> plethorahomes@gmail.com</span>
            <span><i class="fa fa-phone"></i> 0921-7298-758</span>
        </div>
    </div>

    <!-- Plethora Navigation -->
    @include('landing.layouts.navigation')

    <!-- Plethora Hero -->
    <section style="background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="form-group form-group-select">
                        <label for="exampleInputEmail1" style="color:#3d3d3d;">Category</label>
                        <select class="form-control" name="dev_id" id="phrCategory">
                            <option value = "0">Any</option>
                            @foreach ($categories as $category)
                                <option value = "{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-group-select">
                        <label for="exampleInputEmail1" style="color:#3d3d3d;">Location</label>
                        <select class="form-control" name="dev_id" id="phrDevelopers">
                            <option value = "0">Any</option>
                            @foreach ($locations as $location)
                                <option value = "{{ $location->id }}">{{ $location->location }}</option>
                            @endforeach
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group form-group-select">
                        <label for="exampleInputEmail1" style="color:#3d3d3d;">Developer</label>
                        <select class="form-control" name="dev_id" id="phrDevelopers">
                            <option value = "0">Any</option>
                            @foreach ($developers as $developer)
                                <option value = "{{ $developer->id }}">{{ $developer->name }}</option>
                            @endforeach
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
                </div>

                <div class="col-md-6" style="padding-top:1%;">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Monthly Budget</label>
                        <div id="down_payment_slider"></div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" style = "font-size:0.8em;color:gray;">Minimum</label>
                                <input class="form-control" style="display: block;width: 100%;" type="number"
                                    id="down-input-select" min="200" max="1000" step="1" id="down-input-number">
                            </div>
                            <div class="col-md-6">
                                <label for="exampleInputEmail1" style = "font-size:0.8em;color:gray;">Maximum</label>
                                <input class="form-control" style="display: block;width: 100%;" type="number" min="200"
                                    max="1000" step="1" id="down-input-number">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12" id = "collapseOptions">
                    <a data-toggle="collapse" data-parent="#collapseOptions" href="#optionsPanel" style = "color:mediumseagreen;">More options <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <div id = "optionsPanel" class = "row collapse phr-form-category-options" style = "margin-top:10px;">
                        <span>No options to show. Category filter 'Any'</span>
                    </div>
                </div>

                <div class="col-md-12" style="padding-top:1%;">
                    <a href="{{ url("") }}/catalog"><button class="btn btn-primary">Find abode</button></a>
                </div>

            </div>
        </div>
    </section>


    <div class="row">
        <div class="col-md-12">
            <div class="container">
                <div class="phr-property-wrap">
                    @foreach ($abodes as $abode)
                    <div class="phr-property-item" style="margin-top:4em;">
                        <img class="phr-catalog-developer"
                            src="{{ url("") }}/plethora/storage/app/public/developers/{{ $abode["dev_image"] }}" />
                        @if ($abode["has_brand"] != 0)
                        <img class="phr-catalog-branding"
                            src="{{ url("") }}/plethora/storage/app/public/brandings/{{ $abode["branding_image"] }}" />
                        @endif
                        @if ($abode["current"]->image != "")
                        <img src="{{ url("") }}/plethora/storage/app/public/abode/{{ $abode["current"]->image }}">
                        @else
                        <img src="http://localhost/plethora/public/vendor/img/temp_image.png">
                        @endif
                        <div class="phr-twin-header">
                            <a href="{{ url("abode") }}/{{ $abode["current"]->id }}">
                                <h2 class="twin-left">{{ $abode["current"]->display_name }}</h2>
                            </a>
                            <h2 class="twin-right">{{ date("M d, Y", strtotime($abode["current"]->date)) }}</h2>
                        </div>
                        <div class="clearfix"></div>
                        <p class="phr-monthly">
                            @if ($abode["current"]->monthly_payment < 1) Contact Selling Agent @else
                                {{ $abode["current"]->monthly_payment }}/monthly @endif </p> <p class="phr-category">
                                ({{ $abode["category"] }})</p>
                        <p class="phr-address">{{ $abode["location"] }}, {{ $abode["current"]->address }}</p>
                        <ul>
                            @foreach (array_slice($abode["features"], 0, 4) as $feature)
                            <li>{{ $feature["feature"] }}: {{ $feature["value"] }}</li>
                            @endforeach
                            <li><a style="padding:0;" href="{{ url("abode") }}/{{ $abode["current"]->id }}">More...</a>
                            </li>
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div style="clear:both;margin-top:10em;"></div>

    <!-- Admin header -->
    @include('landing.layouts.footer')
    <!-- Admin header -->
    @include('landing.layouts.scripts')

    <script>
        $(document).ready(function () {
            var searchCatalog = $(".searchCatalog");

            searchCatalog.click(function (e) {
                var locId = $("#location_id").val();
                var devId = $("#developer_id").val();
                var catId = $("#category_id").val();
                window.location = "{{ url("") }}" + "/catalog/search/" + catId + "/" + locId + "/" + devId
            });

            $(document).on("change", "#phrCategory", function(){
                var catId = $(this).val()
                getCategoryOption(catId);
            })

            function getCategoryOption(category_id){
                if(category_id == 0){
                    var optionContent = "No options to show. Category filter 'Any'";
                    CategoryOptionsWrapper.html(optionContent)
                }else{
                    var CategoryOptionsWrapper = $(".phr-form-category-options");
                    var url = "{{ url('/api/v1/admin/category/options/filtered') }}/" + category_id
                    PhrService.get(url, {}, function(resp){
                    hideLoading()
                    $(".modal-backdrop").css("display", "none");
                    var optionContent = "No options to show. Category filter 'Any'";
                    var features = resp.units.feats;
                    var options = resp.units.opts;
                    console.log("Requested", url)
                    if(features.length > 0) optionContent = ""
                    for(var x = 0; x < features.length; x++){
                            if(features[x][0].has_options == 1){
                            optionContent += makeSelectableFields(features[x][0].id,features[x][0].display_name, options[x])
                            }/*else{
                            optionContent += makeGenericFields(features[x][0].id,features[x][0].display_name)
                            }*/
                    }

                    CategoryOptionsWrapper.html(optionContent)
                    })
                }
            }

            function makeSelectableFields(id, label, options){
                var selectableField = '<div class="col-md-4">' +
                        '<div class="form-group form-group-select">' +
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

        })
    </script>

</body>

</html>