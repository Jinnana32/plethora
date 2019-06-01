@extends('admin.main')

@section('content')
<div class="row">

<div class = "col-xs-12">
    <div class="row">

        <div class="col-xs-6">
            <section class="content-header">
                        <h1>
                        Milestones
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

<div class="col-md-12">
    <div class = "container">
        @foreach ($milestones as $milestone)
        <div id = "{{ $milestone->user_id }}" class="col-md-3 phr-dev-item get_com_breakdown" data-toggle="modal" data-target="#compensation_breakdown">
                <div class = "phr-dev-wrapper">
                    <div class="phr-dev-item-header" style = "height:100%;text-align:center;padding-top:1em;padding-bottom:1em;">
                        <img src="{{ url('/vendor/img/jisooyaa.jpg') }}" style = "border-radius:50%; height:160px; width:160px;">
                    </div>

                    <div class="phr-dev-item-body" style = "text-align: center;padding:0.5em 0.8em;">
                        <h3>{{ $milestone->first_name }} {{ $milestone->last_name }}</h3>
                        <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                                <tbody>
                                        <tr>
                                            <td>Milestone:</td>
                                            <td style = "font-size:1.2em;"><strong>{{ $milestone->total_milestone }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Position:</td>
                                            <td>{{ $milestone->position }}</td>
                                        </tr>
                                </tbody>
                        </table>
                    </div>

                </div>
            </div>
        @endforeach


    </div>
</div>

<div class="col-md-4">

</div>

</div><!-- </row> -->
</section><!-- </content> -->

</section><!-- Content Section> -->

<div class="modal" tabindex="-1" role="dialog" id = "compensation_breakdown">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compensation Breakdown</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Client Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Project Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Model Name</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Selling Price</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Percent Share</th>
                                <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Commission Revenue</th>
                            </tr>
                            </thead>
                            <tbody class = "com_breakdown_modal">
                            </tbody>
                    </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Okay</button>
            </div>
            </div>
        </div>
    </div>

    <script>
            $(document).ready(function(){

                $(document).on("click", '.get_com_breakdown', function(){
                   var agent_id = $(this).attr("id")
                   var url = "{{ url('/api/v1/admin/breakdown/milestone/list') }}/?agent_id=" + agent_id
                   PhrService.get(url, {}, function(resp){
                                var rows = "";
                                console.log(resp)
                                var breakdown = resp.milestone
                                for(index in breakdown){
                                        rows += makeRow("", "",makeCol([
                                            breakdown[index].client_name,
                                            breakdown[index].name,
                                            breakdown[index].display_name,
                                            breakdown[index].net_selling_price,
                                            breakdown[index].percent_sharing  + "%",
                                            breakdown[index].com_receive,
                                        ]))
                                }
                                $(".com_breakdown_modal").html(rows)
                        })
                })

            })
        </script>

@endsection