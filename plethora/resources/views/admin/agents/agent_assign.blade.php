@extends('admin.main')

@section('content')

     <!-- Header Row -->
    <div class="row">

        <div class = "col-xs-12">
            <div class="row">

                <div class="col-xs-1">
                            <div class = "content-header">
                                <a href = "{{ url()->previous() }}" style = "font-size: 2em;color:black;">
                                    <i class = "fa fa-angle-left"></i>
                                </a>
                            </div>
                        </div>

                <div class="col-xs-6 form-col-header" >
                    <section class="content-header form-content-header">
                                <h1>
                                Verify and Assign Agent
                                <br/>
                                <small>Assign agent to the respective upline</small>
                                </h1>
                            </section>
                </div>

                <div class="col-xs-5" style = "text-align: right;padding-right:3%;margin-top:1%;">
                        <section class="content-header">
                            <button id = "{{ $user->id }}" class = "btn btn-primary phr_verify"> Verify Agent</button>
                        </section>
                    </div>


            </div>
        </div>
    </div><!-- ./Header Row -->

    <!-- Content Section -->
    <section class="content content-form">

        <div class="row">
            <div class="col-xs-12">

                    <div class = "col-xs-12 col-form-header">
                            <div class="dot-header"></div>
                            <span>Uplines</span>
                        </div>

                        <div class="col-xs-4">
                                <div class="form-group form-group-select">
                                        <label for="exampleInputEmail1">Choose a Upline for {{ $user->username }}</label>
                                        <select id = "phr_referrer" class="form-control" name = "company_position" id = "phrPositionChange">
                                                        <option value = "4">Plethora (Company)</option>
                                                @foreach ($uplines as $upline)
                                                        <option value = "{{ $upline["id"] }}">{{ $upline["name"] }} ({{ $upline["position"] }})</option>
                                                @endforeach
                                        </select>
                                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                                </div>
                        </div>

            </div>
        </div><!-- </row> -->

    </section><!-- Content Section> -->

@endsection

@section('page-script')
    <script>
        $(document).ready(function(){
                var verify_btn = $(".phr_verify");
            verify_btn.click(function(){

                var user_id = $(this).attr("id")
                var referrer_id = $("#phr_referrer").val()

                PhrService.post("{{ url('/api/v1/admin/approveOrDecline') }}", {
                ref_id: referrer_id,
                user_id: user_id,
                status: 1
                },
                function(data){
                        hideLoading()

                        bootbox.alert({
                        size: "small",
                        title: "Success",
                        message: "Agent was verified",
                        callback: function(){
                        window.location = "{{ url("") }}/phradmin/pending_agents"
                        }
                        })
                })

            })
        })
    </script>
@endsection