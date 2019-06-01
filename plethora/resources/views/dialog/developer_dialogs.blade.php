<div class="modal" tabindex="-1" role="dialog" id = "add_dev">
        <form action="{{ route("phradmin.add_developer.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Developer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Developer Info</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload image</label>
                                        <input type="file" id="exampleInputEmail1" name = "dev_image" required/>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Developer</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "dev_name" required/>
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

    <div class="modal" tabindex="-1" role="dialog" id = "add_branding">
            <form action="{{ route("phradmin.add_branding.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Branding</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Sub Brand Info</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload image</label>
                                        <input type="file" id="exampleInputEmail1" name = "brand_image" required/>
                                        <input type="hidden" id="add_dev_id" name = "dev_id" required/>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Branding</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "brand_name" required/>
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

    <div class="modal" tabindex="-1" role="dialog" id = "edit_developer">
        <form action="{{ route("phradmin.update_developer.submit") }}" method = "POST" enctype="multipart/form-data">
                {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Developer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Update Developer info</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Re-Upload image</label>
                                        <input type="file" id="exampleInputEmail1" name = "dev_image"/>
                                        <input type="hidden" id="edit_dev_id" name = "dev_id"/>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Developer Name</label>
                                        <input type="text" class="form-control" id="edit_dev_name" name = "dev_name" required/>
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

    <div class="modal" tabindex="-1" role="dialog" id = "edit_branding">
        <form action="{{ route("phradmin.update_branding.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Branding</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Sub Brand Info</span>
                            </div>

                            <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Upload image</label>
                                        <input type="file" id="exampleInputEmail1" name = "brand_image"/>
                                        <input type="hidden" id="edit_brand_id" name = "brand_id"/>
                                    </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Branding</label>
                                        <input type="text" class="form-control" id="edit_brand_name" name = "brand_name" required/>
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
