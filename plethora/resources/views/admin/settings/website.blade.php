@extends('admin.main')

@section('content')

    <style>
input[type=checkbox]{
	height: 0;
	width: 0;
	visibility: hidden;
}

label {
	cursor: pointer;
	text-indent: -9999px;
	width: 100px;
	height: 55px;
	background: grey;
	display: block;
	border-radius: 100px;
	position: relative;
}

label:after {
	content: '';
    position: absolute;
    top:2px;
	left: 5px;
	width: 50px;
	height: 50px;
	background: #fff;
	border-radius: 90px;
	transition: 0.3s;
}

input:checked + label {
	background: #27ae60;
}

input:checked + label:after {
	left: calc(100% - 5px);
	transform: translateX(-100%);
}

label:active:after {
	width: 60px;
}

// centering
body {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 100vh;
}
    </style>

        <!-- Page Tag Header -->
        <div class="row">
            <div class = "col-xs-12">
                <div class="row">

                    <div class="col-xs-6">
                        <section class="content-header">
                                    <h1>
                                    Website Setting
                                    <br/>
                                    <small>Manage your website</small>
                                    </h1>
                                </section>
                    </div>

                </div>
            </div>
        </div> <!-- Page Tag Header -->

    <section class="content">
            <div class="row">
            @if(session('success'))
            <div class="container">
                <div class="alert alert-warning alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        {{session('success')}}
                </div>
            </div>
            @endif

            <div class="col-xs-12">
                <div class="container">
                    <div class="row">
                        <form action="{{ route("phradmin.update_website_status.submit") }}" method = "POST" id = "phr-website-form">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <h3>Disable/Enable Website</h3>
                                <input type="checkbox" onchange="$('#phr-website-form').submit();" id="switch" name = "web_status" @if ($status == "0")
                                    checked
                                @endif/><label for="switch">Toggle</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- </row> -->
    </section><!-- </content> -->

@endsection
