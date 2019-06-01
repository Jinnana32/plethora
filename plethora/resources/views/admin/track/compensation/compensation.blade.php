@extends('admin.main')

@section('content')
<div class="row">

<div class = "col-xs-12">
    <div class="row">

        <div class="col-xs-6">
            <section class="content-header">
                        <h1>
                        Compensations
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

<div class = "col-md-8">
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

<div class="col-md-4 text-right" style = "padding-right:3em;">
<a class = "btn btn-warning" href = "{{ url("phradmin/track/compensation") }}/form/create">
    Compensation form <i class="fa fa-plus"></i>
</a>
</div>

<div class="col-md-12" style = "margin-top:2em;">
    <div class = "container">
            <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                    <thead>
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Client</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Mode/Project</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Agent Name</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Contract Price</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Net Selling Price</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Commission Rate</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Breakdown</th>
                        <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Releasing</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($compensations as $compensation)
                            <tr>
                                <td>{{ $compensation->client_name }}</td>
                                <td>{{ $compensation->model_name }} - {{ $compensation->project_name }}</td>
                                <td>{{ $compensation->agent_name }}</td>
                                <td>{{ $compensation->contract_price }}</td>
                                <td>{{ $compensation->selling_price }}</td>
                                <td>{{ $compensation->commission_rate }} %</td>
                                <td>{{ $compensation->status }}</td>
                                <td>
                                        <button id = "{{ $compensation->id }}" class = "btn btn-sm btn-primary get_com_breakdown"><i class = "fa fa-align-center"></i></button>
                                </td>
                                <td>
                                    <a href = "{{ url("phradmin/track/releasing") }}/{{ $compensation->id }}" class = "btn btn-sm btn-primary"><i class = "fa fa-align-center"></i></a>
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
                    <tbody>
                        <tr>
                            <td>Client Name:</td>
                            <td class = "data1"></td>
                        </tr>
                        <tr>
                            <td>Project Name:</td>
                            <td class = "data2"></td>
                        </tr>
                        <tr>
                            <td>Model Name:</td>
                            <td class = "data3"></td>
                        </tr>
                        <tr>
                            <td>Contract Price:</td>
                            <td class = "data4"></td>
                        </tr>

                        <tr>
                            <td>Selling Price:</td>
                            <td class = "data5"></td>
                        </tr>

                        <tr>
                            <td>Status:</td>
                            <td class = "data6"></td>
                        </tr>
                    </tbody>
                </table>

                <table id="example2" class="table" role="grid" aria-describedby="example2_info">
                        <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Agent Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Percent Share</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Commission Revenue</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Amount Rendered</th>
                            <th class="sorting" tabindex="0" aria-controls="example2"  aria-label="Browser: activate to sort column ascending">Balance</th>
                        </tr>
                        </thead>
                        <tbody class = "com_breakdown_modal">
                            @foreach ($compensations as $compensation)
                                <tr data-toggle="modal" data-target="#compensation_breakdown">
                                    <td>{{ $compensation->client_name }}</td>
                                    <td>{{ $compensation->project_name }}</td>
                                    <td>{{ $compensation->model_name }}</td>
                                    <td>{{ $compensation->agent_name }}</td>
                                    <td>{{ $compensation->contract_price }}</td>
                                </tr>
                            @endforeach
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
            var com_id = $(this).attr("id")
           var url = "{{ url('/api/v1/admin/breakdown/list') }}/?com_id=" + com_id
           PhrService.get(url, {}, function(resp){
                        var rows = "";
                        console.log(resp)
                        var com_info = resp.compensations[0];
                        var breakdown = resp.breakdown;

                        $(".data1").html(com_info.client_name)
                        $(".data2").html(com_info.project_name)
                        $(".data3").html(com_info.model_name)
                        $(".data4").html(com_info.contract_price)
                        $(".data5").html(com_info.selling_price)
                        $(".data6").html(com_info.status)

                        for(index in breakdown){
                                var breakdownName = breakdown[index].agent_name

                                if(breakdown[index].agent_id == com_info.agent_id){
                                    breakdownName = "<strong>" + breakdown[index].agent_name + "</strong> - (Selling Agent)"
                                }
                                rows += makeRow("", "",makeCol([
                                    breakdownName,
                                    breakdown[index].percent_sharing + "%",
                                    breakdown[index].com_receive,
                                    breakdown[index].amount_release,
                                    breakdown[index].balance,
                                ]))
                        }
                        $(".com_breakdown_modal").html(rows)

                        $("#compensation_breakdown").modal("show")
                })
        })

    })
</script>

@endsection