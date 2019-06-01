@extends('admin.main')

@section('content')

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    Company Webinars
                                    <br/>
                                    <small>Add new training materials for your agents</small>
                                    </h1>
                                </section>
                    </div>

                </div>
            </div>
        </div> <!-- Page Tag Header -->

    <section class="content">
            <div class="row">

            <div class="col-xs-4 col-xs-offset-8" style = "text-align:right;padding-right:2%;">
                <a href = "{{ url("phradmin/agents/create") }}"><button class = "btn btn-warning">
                    Add new Webinar <i class="fa fa-plus"></i>
                </button></a>
            </div>

            <div class="col-xs-12" style = "margin-top:2em;">
                    <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Title</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Description</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Youtube Link</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Sample training</td>
                                    <td>We will be having a training</td>
                                    <td><a target = "_blank" href = "https://www.youtube.com/watch?v=tE5FGuhltBU">https://www.youtube.com/watch?v=tE5FGuhltBU</a></td>
                                </tr>
                            </tbody>
                            </table>

            </div>
        </div><!-- </row> -->
    </section><!-- </content> -->

@endsection
