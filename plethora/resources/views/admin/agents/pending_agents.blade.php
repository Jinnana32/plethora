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

                            <div class = "content-header">
                            <form action="#" method="get" class="sidebar-form" style = "margin: 10px 10px 10px">
                                    <div class="input-group" style = "background-color:white;">
                                    <input type="text" name="q" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                            <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                                            <i class="fa fa-search"></i>
                                            </button>
                                    </span>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>

    <section class="content">
            <div class="row">

            <div class="col-xs-4 col-xs-offset-8" style = "text-align:right;padding-right:2%;">
                <a href = "{{ url("phradmin/agents/create") }}"><button class = "btn btn-warning">
                    Create new Agent <i class="fa fa-plus"></i>
                </button></a>
            </div>

            <div class="col-xs-12">
                    <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th></th>
                                <th class="sorting_asc" tabindex="0" aria-controls="example2"  aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Referred By</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Email</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Platform(s): activate to sort column ascending">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Engine version: activate to sort column ascending">Contact</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="CSS grade: activate to sort column ascending">Facebook</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach ($agents as $agent)
                            <tr role="row" class="odd">
                                    <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-flat bg-teal dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                  <span><i class="fa fa-ellipsis-h"></i></span>
                                                  <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                  <li class = "phr_verify" id = "{{ $agent["referral_id"] }},{{ $agent["user_id"] }}">Approve</a></li>
                                                  <li class="divider"></li>
                                                  <li class = "phr_verify" id = "{{ $agent["referral_id"] }},{{ $agent["user_id"] }}">Reject</a></li>
                                                </ul>
                                              </div>
                                        </td>
                                    <td class="sorting_1">{{ $agent['name'] }}</td>
                                    <td>{{ $agent['referral'] }}</td>
                                    <td>{{ $agent['email'] }}</td>
                                    <td>{{ $agent['address'] }}</td>
                                    <td>{{ $agent['contact'] }}</td>
                                    <td>{{ $agent['facebook'] }}</td>
                                </tr>
                            @endforeach

                            </tbody>
                            </table>


            </div>
        </div><!-- </row> -->
    </section><!-- </content> -->

    <script>
        $(document).ready(function(){
            var verify_btn = $(".phr_verify");
            verify_btn.click(function(){
                var ids = $(this).attr("id").split(",")
                var referrer_id = ids[0]
                var user_id = ids[1]
                var status = $(this).html().toLowerCase()
                var status_code = (status == "approve") ? 1 : 2;

                if(referrer_id == 0){
                    window.location = "{{ url("") }}/phradmin/pending_agents/assign/" + user_id
                }else{
                    PhrService.post("{{ url('/api/v1/admin/approveOrDecline') }}", {
                        ref_id: referrer_id,
                        user_id: user_id,
                        status: status_code
                    },
                    function(data){
                            hideLoading()

                            bootbox.alert({
                            size: "small",
                            title: "Success",
                            message: "Agent was " + status,
                            callback: function(){
                                window.location = "{{ url("") }}/phradmin/pending_agents"
                            }
                            })
                    })
                }

            })
        })
    </script>

@endsection
