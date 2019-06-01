@extends('admin.main')

@section('content')

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    Category
                                    <br/>
                                    <small>Manage features of your properties</small>
                                    </h1>
                                </section>
                    </div>
                    <div class="col-xs-6 text-right" style = "padding-top:2rem;padding-right:5rem;">
                            <button class = "btn btn-warning" data-toggle="modal" data-target="#add_category">
                                    Add new category <i class="fa fa-plus"></i>
                            </button>
                    </div>

                </div>
            </div>
        </div> <!-- Page Tag Header -->

        <section class="content" style = "margin-top:2rem;">
                <div class="row">

                <div class="col-md-4" style = "margin-bottom:2rem;"></div>

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

                <div class="col-md-12" style = "margin-bottom:10rem;">
                    @if (sizeof($categories) < 1)
                    @include('dialog.empty_dialog')
                    @else
                    @foreach ($categories as $category)
                    <div class = "col-md-12  col-form-header">
                            <div class="dot-header"></div>
                            <span>{{ $category["category"]->category }}</span>
                            <div style = "margin-left:2rem;font-size:1.3em;cursor:pointer;">
                                <i name = "{{ $category["category"]->category }}" id = "{{ $category["category"]->id }}" class = "fa fa-edit phr-edit-cat" data-toggle="modal" data-target="#edit_category"></i>
                                <i name = "{{ $category["category"]->category }}" id = "{{ $category["category"]->id }}" class = "fa fa-trash phr-remove-cat"></i>
                            </div>
                            <br/>
                            <span class = "phr-category-add-feature" id = "{{ $category["category"]->id }}" data-toggle="modal" data-target="#add_feature"><i class = "fa fa-plus"></i> Add feature</span>
                    </div>

                    @if (sizeof($category["features"]) > 0)
                        <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Feature</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Display Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Options</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category["features"] as $features)
                                <tr>
                                    <td>{{ $features["feats"][0]->id }}</td>
                                    <td>{{ $features["feats"][0]->feature }}</td>
                                    <td>{{ $features["feats"][0]->display_name }}</td>
                                    <td>
                                        <ul>
                                            @if ($features["feats"][0]->has_options == 1)
                                                <li style = "list-style: none;"><span class = "phr-category-add-option" id = "{{ $category["category"]->id }}" name = "{{ $features["feats"][0]->id }}" data-toggle="modal" data-target="#add_options"><i class = "fa fa-plus"></i> Add Options</span></li>
                                            @endif
                                            @if ($features["feats"][0]->has_options == 0)
                                                <li style = "list-style: none;">----------</li>
                                            @else
                                                @foreach ($features["options"] as $option)
                                                    <li class = "phr-option-list">
                                                        {{ $option->options }}
                                                        <div>
                                                            <i class = "fa fa-trash phr-category-remove-option" id = "{{ $option->id }}"></i>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </td>
                                    <td style = "font-size:1.2em;text-align:right;padding-right:10px;">
                                        <i class = "fa fa-trash phr-remove-feat" id = "{{ $category["category"]->id }}" name = "{{ $features["feats"][0]->id }}"></i>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @endforeach
                    @endif
                </div>

                </div><!-- </row> -->
                </section><!-- </content> -->

        <div class="modal" tabindex="-1" role="dialog" id = "add_category">
            <form action="{{ route("phradmin.add_category.submit") }}" method = "POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                            <div class="row">
                                <div class = "col-md-12  col-form-header">
                                        <div class="dot-header"></div>
                                        <span>Category info</span>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <label for="exampleInputEmail1">Category Name</label>
                                            <input type="text" class="form-control" name = "category" required/>
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

        <div class="modal" tabindex="-1" role="dialog" id = "edit_category">
                <form action="{{ route("phradmin.update_category.submit") }}" method = "POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class = "col-md-12  col-form-header">
                                            <div class="dot-header"></div>
                                            <span>Category info</span>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                                <label for="exampleInputEmail1">Category Name</label>
                                                <input type="text" id = "cat_name" class="form-control" name = "cat_name" required/>
                                                <input type="hidden" id = "cat_id" class="form-control" name = "cat_id" required/>
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

        <div class="modal" tabindex="-1" role="dialog" id = "add_feature">
                <form action="{{ route("phradmin.add_category_feature.submit") }}" method = "POST">
                    {{ csrf_field() }}
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Feature</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Feature</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Display Name</th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <input type="hidden" id = "add_category_id" name = "category_id">
                                                    @foreach ($sFeatures as $feature)
                                                        <tr>
                                                            <td>{{ $feature->id }}</td>
                                                            <td>{{ $feature->feature }}</td>
                                                            <td>{{ $feature->display_name }}</td>
                                                            <td>
                                                                <div class="form-group">
                                                                        <input type = "checkbox" value = "{{ $feature->id }}" name = "phr_features[]"/>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                        </table>
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

            <div class="modal" tabindex="-1" role="dialog" id = "add_options">
                    <form action="{{ route("phradmin.add_option.submit") }}" method = "POST">
                        {{ csrf_field() }}
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add Option</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <div class="row">
                                        <div class = "col-md-12  col-form-header">
                                                <div class="dot-header"></div>
                                                <span>Option info</span>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                    <label for="exampleInputEmail1">Option</label>
                                                    <input type="text" class="form-control" name = "option_name" required/>
                                                    <input type="hidden" class="form-control" name = "feat_id" id = "feat_id" required/>
                                                    <input type="hidden" class="form-control" name = "cat_id" id = "z_id" required/>
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

    <script src = "{{ url("js/controller/CategoryController.js") }}"></script>

@endsection
