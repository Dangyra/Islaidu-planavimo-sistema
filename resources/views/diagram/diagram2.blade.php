@extends('layouts.header')

@section('content')
<div class="card-body">
    <div class="card card-danger">
        <div class="card-header">
          <h3 class="card-title">Pajamų ir išlaidų diagrama</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body" style="width: 500px; height:500px; ">
         <div id="container3"></div>
         <script src="https://code.highcharts.com/highcharts.js"></script>
         <script>
          var incomeData=<?php echo json_encode($incomeData)?>;
          var expenseData=<?php echo json_encode($expenseData)?>;
          Highcharts.chart('container3',{
            chart:{
              type:"column"
            },
            title:{
              text:"Pajamos ir išlaidos"
            },
            xAxis:{
              categories:['2022-12-01','2022-12-02','2022-12-12','2022-12-14']
            },
            yAxis:{
              title:{
                text:"Pajamos ir išlaidos"
              }
            },
            series:[{
              name:"pajamos",
              data:incomeData
            },{
              name:"išlaidos",
              data:expenseData
            }],
          });
          </script>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection