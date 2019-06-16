@extends('admin.main')

@section('content')
<div class="row">

<div class = "col-xs-12">
    <div class="row">

        <div class="col-xs-6">
            <section class="content-header">
                        <h1>
                        Transactions & Agent Activity
                        <br/>
                        <small>Monitor agent Inquiries and transactions.</small>
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

<div class="col-md-12" style = "margin-top:2em;">
    <div class = "container">

        <style>
            .phr-logs {
                padding: 0.3em 1em;
                margin-bottom:0.2em;
            }
        </style>

            @foreach ($log_history as $history)
                <h2>{{ $history["date"] }}</h2>
                @foreach ($history["logs"] as $log)
                    @if ($log->type == "3")
                        <div class="callout callout-info phr-logs">
                                <p><strong>[{{ $log->time_created }}]</strong> {{ $log->log_message }}</p>
                        </div>
                    @else
                        <div class="callout callout-success phr-logs">
                                <p><strong>[{{ $log->time_created }}]</strong> {{ $log->log_message }}</p>
                        </div>
                    @endif
                @endforeach
            @endforeach
    </div>
</div>

<div class="col-md-4">

</div>

</div><!-- </row> -->
</section><!-- </content> -->

</section><!-- Content Section> -->

@endsection