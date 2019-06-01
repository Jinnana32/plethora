@extends('admin.main')

@section('content')
<div class="row">

<div class = "col-xs-12">
    <div class="row">

        <div class="col-xs-6">
            <section class="content-header">
                        <h1>
                        Agents
                        <br/>
                        <small>List of all your company agents</small>
                        </h1>
                    </section>
        </div>
        <div class="col-xs-6">
        </div>

    </div>

<section class="content">
<div class="row">

<div class="col-md-4">
<button class = "btn btn-warning" data-toggle="modal" data-target="#feature_dialog">
    Add new feature <i class="fa fa-plus"></i>
</button>
</div>

<div class="col-md-12">
</div>

<div class="col-md-4">
    <table id="example2" class="table" role="grid" aria-describedby="example2_info">
            <thead>
            <tr role="row">
                <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">id</th>
                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Category</th>
                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Feature</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($cats as $cat)
                    <tr>
                        <td>{{ $cat["id"]}}</td>
                        <td>{{ $cat["category"] }}</td>
                        <td>
                            <ul>
                                @foreach ($cat["features"] as $feature)
                                    <li>{{ $feature["feature"] }}</li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>


</div>

</div><!-- </row> -->
</section><!-- </content> -->

</section><!-- Content Section> -->

<div class="modal" tabindex="-1" role="dialog" id = "feature_dialog">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title success-dialog-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body success-dialog-message">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Okay</button>
            </div>
            </div>
        </div>
</div>

@endsection