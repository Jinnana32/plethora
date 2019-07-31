<!DOCTYPE html>
<html lang="en">
<head>
      <!-- Admin header -->
      @include('landing.layouts.header')

      <style>
        .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }

  .dtHorizontalExampleWrapper {
max-width: 600px;
margin: 0 auto;
}
#dtHorizontalExample th, td {
white-space: nowrap;
}

table.dataTable thead .sorting:after,
table.dataTable thead .sorting:before,
table.dataTable thead .sorting_asc:after,
table.dataTable thead .sorting_asc:before,
table.dataTable thead .sorting_asc_disabled:after,
table.dataTable thead .sorting_asc_disabled:before,
table.dataTable thead .sorting_desc:after,
table.dataTable thead .sorting_desc:before,
table.dataTable thead .sorting_desc_disabled:after,
table.dataTable thead .sorting_desc_disabled:before {
bottom: .5em;
}
      </style>
</head>

<body id="page-top">

    <!-- Plethora headline -->
    <div class = "phr-headline">
        <div class="container text-right">
            <span><i class="fa fa-inbox"></i> plethorahomes@gmail.com</span>
            <span><i class="fa fa-phone"></i> 0921-7298-758</span>
        </div>
    </div>

    <!-- Plethora Navigation -->
    @include('landing.layouts.agent_navigation')

 <!-- Header -->
 @include('public.layout.pub_agent_masthead')

 <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
    <div class="container">
      <div class="row">

        <div class="col-md-12">
            <div class="row">

              <!-- Compensation -->
              <div class="col-md-12 phr-progress-card">
                  <div class="phr-profile-card">
                      <div class = "col-md-12  col-form-header">
                          <div class="dot-header"></div>
                          <span>Dashboard</span>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                              <div class="card-counter primary">
                                <i class="fa fa-code-fork"></i>
                                <span class="count-numbers">
                                  @if ($milestone != null)
                                  &#8369 {{ number_format($milestone->total_milestone) }}
                                  @else
                                  0
                                  @endif
                                </span>
                                <span class="count-name">Milestone</span>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="card-counter success">
                                <i class="fa fa-database"></i>
                                <span class="count-numbers">
                                  @if($earnings[0]->earning != null)
                                  &#8369 {{ number_format($earnings[0]->earning) }}
                                  @else
                                  0
                                  @endif
                                </span>
                                <span class="count-name">Earnings</span>
                              </div>
                            </div>

                            <div class="col-md-4">
                                <div class="card-counter danger">
                                  <i class="fa fa-ticket"></i>
                                  <span class="count-numbers">{{ sizeof($incentives) }}</span>
                                  <span class="count-name">Incentives</span>
                                </div>
                              </div>
                          </div>

                  </div>
                </div> <!-- Geneology -->

                <!-- Compensation -->
              <div class="col-md-8 phr-progress-card">
                  <div class="phr-profile-card">
                      <div class = "col-md-12  col-form-header">
                          <div class="dot-header"></div>
                          <span>Compensation details</span>
                        </div>

                        <table class = "table" style = "font-size:0.7em;">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Project</th>
                                <th>Commission</th>
                                <th>Balance</th>
                                <th>Status</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($compensations as $compensation)
                                <tr>
                                    <td>{{ $compensation->date_created }}</td>
                                    <td>{{ $compensation->developer_name }} {{ $compensation->project_name }}</td>
                                    <td>&#8369 {{ number_format($compensation->com_receive) }}</td>
                                    <td>&#8369 {{ number_format($compensation->balance) }}</td>
                                    <td>{{ $compensation->status }}</td>
                                </tr>
                              @endforeach
                            </tbody>
                        </table>

                  </div>
                </div> <!-- Geneology -->

                <!-- Compensation -->
              <div class="col-md-4 phr-progress-card">
                  <div class="phr-profile-card">
                      <div class = "col-md-12  col-form-header">
                          <div class="dot-header"></div>
                          <span>Incentives received</span>
                        </div>

                        <table class = "table" style = "font-size:0.7em;">
                            <thead>
                              <tr>
                                <th>Date</th>
                                <th>Category</th>
                                <th>Description</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($incentives as $incentive)
                                  <tr>
                                      <td>{{ $incentive->create_date }}</td>
                                      <td>{{ $incentive->category }}</td>
                                      <td>{{ $incentive->description }}</td>
                                  </tr>
                              @endforeach
                            </tbody>
                        </table>
                  </div>
                </div> <!-- Geneology -->

                <!-- Geneology -->
              <div class="col-md-12 phr-progress-card">
                  <div class="phr-profile-card">
                      <div class = "col-md-12  col-form-header">
                          <div class="dot-header"></div>
                          <span>Geneaology</span>
                        </div>
                        <div id="chart_div"></div>
                  </div>
                </div> <!-- Geneology -->

                 <!-- Compensation -->
              <div class="col-md-12 phr-progress-card">
                  <div class="phr-profile-card">
                      <div class = "col-md-12  col-form-header">
                          <div class="dot-header"></div>
                          <span>My Ledger</span>
                        </div>
                        <div  style = "overflow-x: scroll">
                        <table  id="dtHorizontalExample" class = "table" style = "font-size:0.7em;" width="100%">
                            <thead>
                              <tr>
                                <th>Buyer</th>
                                <th>Seller</th>
                                <th>Developer</th>
                                <th>Project Name</th>
                                <th>Model/Unit</th>
                                <th>Unit Number</th>
                                <th>Total Contract Price</th>
                                <th>Total Selling Price</th>
                                <th>Commission Rate</th>
                                <th>Commission Share</th>
                                <th>Total Commission</th>
                                <th>Commission Release</th>
                                <th>Reference Number</th>
                                <th>Date</th>
                                <th>Balance</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($compensations as $compensation)
                                <tr>
                                    <td>{{ $compensation->buyer_name }}</td>
                                    <td>{{ $compensation->seller_name }}</td>
                                    <td>{{ $compensation->developer_name }}</td>
                                    <td>{{ $compensation->project_name }}</td>
                                    <td>{{ $compensation->model_unit }}</td>
                                    <td>N/A</td>
                                    <td>&#8369 {{ number_format($compensation->total_contract_price) }}</td>
                                    <td>&#8369 {{ number_format($compensation->net_selling_price) }}</td>
                                    <td>{{ $compensation->commission_rate }}</td>
                                    <td>{{ $compensation->percent_sharing }}</td>
                                    <td>&#8369 {{ number_format($compensation->total_commission) }}</td>
                                    <td>&#8369 {{ number_format($compensation->commission_release) }}</td>
                                    <td>N/A</td>
                                    <td>{{ $compensation->date_created }}</td>
                                    <td>&#8369 {{ number_format($compensation->balance) }}</td>
                                </tr>
                              @endforeach

                            </tbody>
                        </table>
                        </div>
                  </div>
                </div> <!-- Geneology -->



            </div>

        </div>

      </div>
    </div>
</section>

    <!-- Admin header -->
    @include('landing.layouts.footer')


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">

  google.charts.load('current', {packages:["orgchart"]});
  google.charts.setOnLoadCallback(getGeneology);

  function drawChart(agents) {
    var data = new google.visualization.DataTable();
    var genTree = [];
    data.addColumn('string', 'Name');
    data.addColumn('string', 'Manager');
    data.addColumn('string', 'ToolTip');
    console.log(agents.length)

    for(var x = 0; x < agents.length; x++){
      var gen = [];
      gen.push({
        v: agents[x].username,
        f: agents[x].username + '<div style="color:green; font-style:italic">' + agents[x].position + '</div>'
      })
      gen.push((agents[x].upline_name == null) ? "" : agents[x].upline_name)
      gen.push(agents[x].position)
      genTree.push(gen)
    }

    data.addRows(genTree);
    var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
    chart.draw(data, {allowHtml:true});

  }

  function getGeneology(){
      var user_id = "{{ $agent['id'] }}"
      var url = "{{ url('') }}/api/v1/admin/geneology/" + user_id + "/list"
      $.ajax({
        type: "GET",
        url: url,
        data: {},
        success: function(resp){
          //console.log("shit")
          drawChart(resp)
        },
        error: function(err){
          console.log(err + " shit")
        }
      })
  }

  $(document).ready(function () {
$('#dtHorizontalExample').DataTable({
"scrollX": true
});
$('.dataTables_length').addClass('bs-select');
});

</script>

</body>


</html>
