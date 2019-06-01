@extends('admin.main')

@section('content')
<div class="row">

<div class = "col-xs-12">
    <div class="row">

        <div class="col-xs-6">
            <section class="content-header">
                        <h1>
                        Abode listings
                        <br/>
                        <small>List of all your company abodes</small>
                        </h1>
                    </section>
        </div>
        <div class="col-xs-6">
            </div>
        </div>

    </div>

<section class="content">
<div class="row" style = "padding-bottom:20%;">

        <div class="col-md-12">
                @if($errors->has('error'))
                    <div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{ $errors->first('error') }}
                    </div>
                @endif

                @if(session('success'))
                <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session('success')}}
                </div>
                @endif
            </div>

<div class="col-xs-4 col-xs-offset-8" style = "text-align:right;padding-right:2%;margin-bottom:20px;">
        <a href = "{{ url("phradmin/abode/create") }}"><button class = "btn btn-warning">
            Create new abode <i class="fa fa-plus"></i>
        </button></a>
</div>

<div class="col-xs-12">
    <!-- div class="container">
            <div class="form-group">
                    <label for="propert_category">Search Project name, Model, Unit</label>
                    <input type="text" class = "form-control" >
            </div>
    </div -->
</div>

<div class="col-md-12" style = "margin-bottom:2%;">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                    <div class="form-group form-group-select">
                        <label for="propert_category">Category</label>
                        <br/>
                        <select class = "search-form" id = "category_id" name = "props_category">

                            @if(in_array('category', $filter_prompt))
                                @foreach ($filters as $filter)
                                    @if ($filter["filter"] == "Category")
                                        <option value = "{{ $filter["id"] }}">{{ $filter["property"] }}</option>
                                    @endif
                                @endforeach
                            @endif

                            <option value = "0">Any</option>
                            @foreach ($categories as $category)
                            <option value = "{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="form-group form-group-select">
                        <label for="propert_category">Property Location</label>
                        <br/>
                        <select class = "search-form" id = "location_id" name = "props_category">
                            @if(in_array('location', $filter_prompt))
                                @foreach ($filters as $filter)
                                    @if ($filter["filter"] == "Location")
                                    <option value = "{{ $filter["id"] }}">{{ $filter["property"] }}</option>
                                    @endif
                                @endforeach
                            @endif
                            <option value = "0">Any</option>
                            @foreach ($locations as $location)
                                <option value = "{{ $location->id }}">{{ $location->location }}</option>
                            @endforeach
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
            </div>
            <div class="col-md-3">
                    <div class="form-group form-group-select">
                        <label for="propert_category">Property Developer</label>
                        <br/>
                        <select class = "search-form" id = "developer_id" name = "props_category">
                            @if(in_array('developer', $filter_prompt))
                                @foreach ($filters as $filter)
                                    @if ($filter["filter"] == "Developer")
                                    <option value = "{{ $filter["id"] }}">{{ $filter["property"] }}</option>
                                    @endif
                                @endforeach
                            @endif
                            <option value = "0">Any</option>
                            @foreach ($developers as $developer)
                                <option value = "{{ $developer->id }}">{{ $developer->name }}</option>
                            @endforeach
                        </select>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </div>
            </div>
            <div class="col-md-3" style = "padding-top:2%;">
                    @if (sizeof($filters) > 0)
                    <button class = "btn btn-info btn-block filterAbode">Filter</button>
                    <button class = "btn btn-danger btn-block filterRemove">Remove Filter</button>
                    @else
                    <button class = "btn btn-info btn-block filterAbode">Filter</button>
                    @endif

            </div>

            <div class="col-md-12">
                @if (sizeof($filters) > 0)
                    <h6>Applied filters:</h6>
                    @foreach ($filters as $filter)
                        <span style = "padding:10px;" class = "label bg-{{ $filter["color"] }}">{{ $filter["filter"] }}: {{ $filter["property"] }}</span>
                    @endforeach
                @else
                    <span style = "color:#c3c3c3">No filters applied</span>
                @endif
            </div>

        </div>
    </div>
</div>

<div class="col-md-12">
        <div class="container">
                @if(sizeof($abodes) < 1)
                @include('dialog.empty_dialog')
                @else
                <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Preview</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Model/Unit</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Developer</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Category</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Address</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Pricing</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Features</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($abodes as $abode)
                                <tr>

                                    <td class = "phr-property-item" id = "{{ $abode["current"]->id }}">
                                        @if ($abode["current"]->image != "")
                                            <img  data-toggle="modal" data-target="#update_image" style = "width:92px;height:92px;" src="{{ url("") }}/plethora/storage/app/public/abode/{{ $abode["current"]->image }}">
                                        @else
                                            <img data-toggle="modal" data-target="#update_image" style = "width:92px;height:92px;" src="http://localhost/plethora/public/vendor/img/temp_image.png">
                                        @endif
                                    </td>
                                    <td onclick="window.location='{{ url('phradmin/abode') }}/{{ $abode['current']->id }}/details';">

                                        <span style = "color:#27ae60;font-size:1.2em;">{{ $abode["current"]->display_name }}</span>
                                    </td>
                                    <td style = "font-size:0.9em;">
                                        <img class = "phr-catalog-developer" src = "{{ url("") }}/plethora/storage/app/public/developers/{{ $abode["developer"]->image }}" style = "width:32px;height:32px;"/>
                                        {{ $abode["developer"]->name }}
                                        @if ($abode["has_brand"] != 0)
                                            <br/>
                                            <img class = "phr-catalog-branding" src = "{{ url("") }}/plethora/storage/app/public/brandings/{{ $abode["branding"]->image }}" />
                                            {{ $abode["branding"]->name }}
                                        @endif
                                    </td>
                                    <td><span class = "label bg-green">{{ $abode["category"] }}</span></td>
                                    <td>{{ $abode["location"] }}, {{ $abode["current"]->address }}</td>
                                    <td>
                                        <div class = "table-link" id = "{{ $abode["current"]->id }}" data-toggle="modal" data-target="#update_pricing"><i class = "fa fa-edit phr-edit-brand"></i> Quick Edit</div>
                                        <ul class = "phr-pricing">
                                            <li class = "contract_pricing" name = "{{ $abode["current"]->total_contract_price }}"><strong>Contract Price:</strong> <br/><span class = "money-format">{{ number_format($abode["current"]->total_contract_price) }}</span></li>
                                            <li class = "selling_pricing" name = "{{ $abode["current"]->net_selling_price }}"><strong>Net Selling Price:</strong> <br/><span class = "money-format">{{ number_format($abode["current"]->net_selling_price) }}</span></li>
                                            <li class = "monthly_pricing" name = "{{ $abode["current"]->monthly_payment }}"><strong>Monthly Price:</strong> <br/><span class = "money-format">{{ number_format($abode["current"]->monthly_payment) }}</span></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <div class = "table-link abode-options"><i class = "fa fa-edit phr-edit-brand" data-toggle="modal" data-target="#edit_branding"></i> Quick Edit</div>
                                        <ul>
                                            @foreach ($abode["features"] as $feature)
                                                <li>{{ $feature["feature"] }}: {{ $feature["value"] }}</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td style = "font-size:1.3em;">
                                        <i class = "fa fa-edit phr-edit-abode" id = "{{ $abode["current"]->id }}" data-toggle="modal" data-target="#update_abode"></i>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
                @endif
    </div>
</div>

</div><!-- </row> -->
</section><!-- </content> -->
</section><!-- Content Section> -->

<div class="modal" tabindex="-1" role="dialog" id = "update_image">
        <form action="{{ route("phradmin.update_abode_image.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Abode Image Info</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload image</label>
                                        <input type="file" id="exampleInputEmail1" name = "abode_image" required/>
                                        <input type="hidden" id="abode_id" name = "abode_id" required/>
                                    </div>
                            </div>

                        </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Continue</button>
                </div>
                </div>
            </div>
        </form>
    </div>


    <div class="modal" tabindex="-1" role="dialog" id = "update_pricing">
            <form action="{{ route("phradmin.update_abode_pricing.submit") }}" method = "POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Pricing</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Contract Price</label>
                                            <input class="form-control" type="hidden" id="abodeId" name = "abode_id" required/>
                                            <input class="form-control" type="text" id="contractPrice" name = "contract_price" required/>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Net Selling Price</label>
                                            <input class="form-control" type="text" id="sellingPrice" name = "selling_price" required/>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Monthly Price</label>
                                            <input class="form-control" type="text" id="monthlyPrice" name = "monthly_price" required/>
                                        </div>
                                </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Continue</button>
                    </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="modal" tabindex="-1" role="dialog" id = "update_features">
                <form action="{{ route("phradmin.update_abode_pricing.submit") }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update features</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        Cannot update for the moment.
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type = "button" class="btn btn-primary">Continue</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>


            <div class="modal" tabindex="-1" role="dialog" id = "update_abode">
                <form action="{{ route("phradmin.update_abode_details.submit") }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Abode Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Model/Unit</label>
                                            <input type="text" class="form-control" id="abode_model" name = "display_name"/>
                                            <input type="hidden" class="form-control" id="current_abode_id" name = "abode_id"/>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-select">
                                            <label for="exampleInputEmail1">Category</label>
                                            <select class="form-control" name = "category" id = "phrCategory">
                                            </select>
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group form-group-select">
                                            <label for="exampleInputEmail1">Location</label>
                                            <select class="form-control" name = "location" id = "phrLocation">
                                            </select>
                                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                                    </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Address</label>
                                            <input type="text" class="form-control" id="abode_address" name = "address"/>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Continue</button>
                        </div>
                        </div>
                    </div>
                </form>
            </div>


<script>

    $(document).ready(function(){

        $(document).on('click', '.phr-property-item', function(){
            $("#abode_id").val($(this).attr("id"))
        })

        $(document).on('click', '.table-link', function(){
            var abodeId = $(this).attr("id");
            var contractPrice = $(this).siblings(".phr-pricing").children(".contract_pricing").attr("name");
            var sellingPrice = $(this).siblings(".phr-pricing").children(".selling_pricing").attr("name");
            var monthlyPrice = $(this).siblings(".phr-pricing").children(".monthly_pricing").attr("name");

            $("#abodeId").val(abodeId);
            $("#contractPrice").val(contractPrice);
            $("#sellingPrice").val(sellingPrice);
            $("#monthlyPrice").val(monthlyPrice);
        })

        $(document).on('click', '.abode-options', function(){
            showLoading();
                var url = "{{ url('/api/v1/admin/developers') }}"
                PhrService.get(url, {}, function(resp){
                   hideLoading()
                   $("#update_features").modal("show")
                })
        })

        $(document).on("click", '.filterAbode', function(){
                var locId = $("#location_id").val();
                var devId = $("#developer_id").val();
                var catId = $("#category_id").val();
                window.location =  "{{ url('phradmin/abode') }}" + "/filter/" + catId + "/" + locId + "/" + devId
        });

        $(document).on("click", '.filterRemove', function(){
            window.location =  "{{ url('phradmin/abode') }}"
        })

        $(document).on('click', '.phr-edit-abode', function(){
            getCategory()
            getLocations()
            var abode_id = $(this).attr("id")
            $("#current_abode_id").val(abode_id)
            var url = "{{ url('/api/v1/admin/abode/details') }}/" + abode_id
            PhrService.get(url, {}, function(resp){
                   hideLoading()
                   $("#abode_model").val(resp.display_name)
                   $("#abode_address").val(resp.address)
            })
        })

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

        function getCategory(){
                var categoryOptions = $("#phrCategory")
                var url = "{{ url('/api/v1/admin/category') }}"
                PhrService.get(url, {}, function(resp){
                   hideLoading()
                   console.log(resp)
                   var options = ""
                   for(var x = 0; x < resp.categories.length; x++){
                        options += "<option value = '" + resp.categories[x].id + "'>"+ resp.categories[x].category +"</option>"
                   }
                   categoryOptions.html(options)
                })
        }

    })
</script>
@endsection