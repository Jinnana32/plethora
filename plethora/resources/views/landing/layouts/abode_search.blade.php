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
                    <div id = "optionsPanel" class = "row collapse phr-form-category-options" style = "margin-top:10px;padding-bottom:2em;">
                        <span style = "padding-left:1.2em;">No options to show. Category filter 'Any'</span>
                    </div>
                </div>

                <div class="col-md-12" style="padding-top:1%;">
                    <a href="{{ url("") }}/catalog"><button class="btn btn-primary">Find abode</button></a>
                </div>

            </div>
        </div>
    </section>