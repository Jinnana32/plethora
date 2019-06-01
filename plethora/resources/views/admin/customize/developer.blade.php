@extends('admin.main')

@section('content')

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    Developers
                                    <br/>
                                    <small>Manage features of your properties</small>
                                    </h1>
                                </section>
                    </div>
                    <div class="col-xs-6 text-right" style = "padding-top:2rem;padding-right:5rem;">
                            <button class = "btn btn-warning" data-toggle="modal" data-target="#add_dev">
                                    Add new Developer <i class="fa fa-plus"></i>
                            </button>
                    </div>

                </div>
            </div>
        </div> <!-- Page Tag Header -->

        <section class="content" style = "margin-top:2rem;">
            <div class="row" style = "padding:20px;">

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

                @if (sizeof($developers) < 1)
                    @include('dialog.empty_dialog')
                @else
                    @foreach ($developers as $developer)
                    <div class="col-md-3 phr-dev-item">
                            <div class = "phr-dev-wrapper">
                                <div class="phr-dev-item-header">

                                    <img src="{{ url("") }}/plethora/storage/app/public/developers/{{ $developer['dev']->image }}" class="img-responsive">
                                    <div class="phr-fade-block">
                                        <h2>{{ $developer['dev']->name }}</h2>
                                    </div>

                                    <div class="phr-dev-actions">
                                        <a class = "phr-edit-dev" href="{{ url("phradmin/customize") }}/developer/{{ $developer['dev']->id }}/projects">View projects</a>
                                        <i class = "fa fa-edit phr-edit-dev" name = "{{ $developer['dev']->id }}" id = "{{ $developer['dev']->name }}" data-toggle="modal" data-target="#edit_developer"></i>
                                        <i class = "fa fa-trash phr-remove-dev" name = "{{ $developer['dev']->name }}" id = "{{ $developer['dev']->id }}"></i>
                                    </div>

                                </div>

                                <div class="phr-dev-item-body">
                                    <h6 class="text-center" style = "margin:0;padding-top:10px;color:#404040;">SUB BRANDING</h6>
                                    <ul>
                                        @if($developer['has_brands'])
                                            @foreach ($developer["brands"] as $brand)
                                                <li>
                                                    <img src="{{ url("") }}/plethora/storage/app/public/brandings/{{ $brand->image }}">
                                                    <h3>{{ $brand->name }}</h3>
                                                    <div class="phr-dev-body-action">
                                                        <a class = "phr-edit-dev" href="{{ url("phradmin/customize") }}/developer/{{ $developer['dev']->id }}/brand/{{ $brand->id }}/projects">View projects</a>
                                                        <i class = "fa fa-edit phr-edit-brand" name = "{{ $brand->name }}" id = "{{ $brand->id }}" data-toggle="modal" data-target="#edit_branding"></i>
                                                        <i class = "fa fa-trash phr-remove-brand" name = "{{ $brand->name }}" id = "{{ $brand->id }}"></i>
                                                    </div>
                                                </li>
                                            @endforeach
                                        @else
                                            <li class = "phr-empty-trash">
                                                <i class = "fa fa-inbox"></i>
                                                <p>No available sub-brandings<p>
                                            </li>
                                        @endif
                                    </ul>
                                    <div style = "clear:both;"></div>
                                    <div class="phr-view-more">
                                        @if ($developer['has_brands'])
                                            @if (sizeof($developer["brands"]) >= 2 )
                                                <i class = "fa fa-eye"></i>
                                            @endif
                                        @endif
                                    <i class = "fa fa-plus phr-add-brand" id = "{{ $developer["dev"]->id }}" data-toggle="modal" data-target="#add_branding"></i>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif

            </div><!-- </row> -->
        </section><!-- </content> -->

    <!-- PHR dialogs -->
    @include('dialog.developer_dialogs')

    <script src = "{{ url("js/controller/DeveloperController.js") }}"></script>

@endsection
