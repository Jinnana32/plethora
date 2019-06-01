<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Admin header -->
    @include('public.layout.pub_agent_header')

    <!-- Genealogy Graph -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {packages:["orgchart"]});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Name');
        data.addColumn('string', 'Manager');
        data.addColumn('string', 'ToolTip');

        data.addRows([
          [{v:'Plethora',
              f:'Plethora<div style="color:green; font-style:italic">President</div>'},
               '', 'Company'],
          [{v:'Broker 1', f:'Broker 1<div style="color:red; font-style:italic">Broker</div>'},
           'Plethora', 'Broker'],
           [{v:'Broker 2', f:'Broker 2<div style="color:red; font-style:italic">Broker</div>'},
           'Plethora', 'Broker'],
           [{v:'Division 1', f:'Division 1<div style="color:red; font-style:italic">Division</div>'},
           'Broker 1', 'Broker'],
           [{v:'Division 2', f:'Division 2<div style="color:red; font-style:italic">Division</div>'},
           'Broker 1', 'Broker'],
           [{v:'Division 3', f:'Division 3<div style="color:red; font-style:italic">Division</div>'},
           'Broker 2', 'Broker'],
           [{v:'Division 4', f:'Division 4<div style="color:red; font-style:italic">Division</div>'},
           'Broker 2', 'Broker'],
           [{v:'Unit 1', f:'Unit 1<div style="color:red; font-style:italic">Unit</div>'},
           'Division 1', 'Broker'],
           [{v:'Unit 2', f:'Unit 2<div style="color:red; font-style:italic">Unit</div>'},
           'Unit 1', 'Broker'],
           [{v:'Unit 3', f:'Unit 3<div style="color:red; font-style:italic">Unit</div>'},
           'Division 4', 'Broker'],
           [{v:'Unit 4', f:'Unit 4<div style="color:red; font-style:italic">Unit</div>'},
           'Unit 3', 'Broker'],
        ]);

        var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));

        chart.draw(data, {allowHtml:true});
      }
   </script> <!-- End Genealogy graph -->

   <style>
   .google-visualization-orgchart-node {
    border:0;
    background-color: #fff;
    background: #fff;
    color: #4b4b4b;;
   }
   </style>

</head>

<body id="page-top">

  <!-- Admin header -->
  @include('public.layout.pub_agent_nav')

  <!-- Header -->
  @include('public.layout.pub_agent_masthead')

  <section style = "background-color:#f3f3f3;padding-top:40px;padding-bottom:40px;" id="gallery">
        <div class="container">
          <div class="row">

            <!-- Admin header -->
            @include('public.layout.pub_agent_inner_nav')

            <div class="col-md-9">
              <div class = "col-md-12  col-form-header">
                <div class="dot-header"></div>
                <span>Genealogy</span>
              </div>
              <hr/>

              <div id="chart_div"></div>
            </div>

          </div>
        </div>
 </section>

  <!-- Admin header -->
  @include('public.layout.pub_footer')
</body>
</html>
