@extends('layouts.header')

@section('content')

<h3 class="page-title">Diagramos</h3>

<!-- Chart -->
<div class="row">
    <div class="col-lg-12">
        <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-chart-pie"></i>
            Pajamų ir išlaidų diagramos</div>

            <div class="container" style="margin-top: 50px;">
              <div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Pajamų diagrama</h3>
                    </div>
                    <div class="panel-body" align="center">
                      <div id="donut_chart"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script type="text/javascript" src="https://code.highcharts.com/highcharts.js"></script>
            <script type="text/javascript" src="https://code.highcharts.com/modules/exporting.js"></script>
            <script type="text/javascript">
              $(document).ready(function(){
                var incomeData = <?php echo json_encode($incomeData); ?>;
                var options = {
                  chart : {
                    renderTo : 'donut_chart',
                    plotBackgroundColor : null,
                    plotBorderWidth : null,
                    plotShadow : false,
                  },
                  title :{
                    text:'Pajamos'
                  },
                  tooltip:{
                    pointFormat : '{series.name}: <b> {point.percentage}%</b>',
                    percentageDecimals:1,
                  },
                  plotOptions:{
                    pie:{
                      allowPointSelect:true,
                      cursor:'pointer',
                      dataLabels:{
                        enabled:true,
                        color:'#000000',
                        connectColor:'#000000',
                        formatter:function(){
                          return '<b>' + this.point.name + '</b>: ' + this.percentage + '%';
                        }
                      }
                    }
                  },
                  series:[{
                    type:'pie',
                    name:'incomeData'
                  }]
                }
                myarray = [];
                $.each(incomeData, function(index, val) {
                   myarray[index] = [val.income_title,val.count];
                });
                options.series[0].data = myarray;
                chart = new Highcharts.Chart(options);
              });
            </script>

    </div>
</div>
@endsection