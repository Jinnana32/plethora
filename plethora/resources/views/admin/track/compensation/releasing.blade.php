@extends('admin.main')

@section('content')
<div class="row">

<div class = "col-xs-12">
    <div class="row">

        <div class="col-xs-6">
            <section class="content-header">
                        <h1>
                        Releasing
                        <br/>
                        <small>List of all released payments</small>
                        </h1>
                    </section>
        </div>
        <div class="col-xs-6">
        </div>

    </div>

<section class="content">
<div class="row">

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

<div class = "col-md-8">

</div>

<div class="col-md-4 text-right" style = "padding-right:3em;">
<a class = "btn btn-warning" data-toggle="modal" data-target="#add_releasing">
    New Release <i class="fa fa-plus"></i>
</a>
</div>

<div class="col-md-12" style = "margin-top:2em;">
    <div class = "container">
            <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Date Received</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Amount Released</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Compensation Distribution</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach ($releases as $release)
                        <tr>
                            <td>{{ $release["release"]->date_create }}</td>
                            <td>{{ $release["release"]->amount_released }}</td>
                            <td>
                                <ul>
                                @foreach ($release["details"] as $details)
                                    <li>{{ $details->agent_name }} - {{ $details->amount_received }}</li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
            </table>
    </div>
</div>

<div class="col-md-4">

</div>

</div><!-- </row> -->
</section><!-- </content> -->

</section><!-- Content Section> -->

<div class="modal" tabindex="-1" role="dialog" id = "add_releasing">
        <div class="modal-dialog" role="document">
        <form action="{{ route("phradmin.add_releasing.submit") }}" method = "POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Payment Release</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                    <div class="row">
                            <div class = "col-md-12  col-form-header">
                                    <div class="dot-header"></div>
                                    <span>Release information</span>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                        <label for="exampleInputEmail1">Amount</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" name = "amount_release" required/>
                                        <input type="hidden" class="form-control" value = "{{ $com_id }}" name = "com_id"/>
                                </div>
                            </div>
                        </div>

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary">Continue</button>
            </div>
            </div>
        </form>
        </div>
    </div>

@endsection