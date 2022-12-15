@extends('layouts.header')
@section('content')
    <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('report.report') }}">Ataskaita</a>
            </li>
            <li class="breadcrumb-item active">Santrauka</li>
        </ol>        
         <div class="row">
        	<div class="col-xl-6 offset-xl-3 col-sm-12 mb-3">
        		<ul class="list-group">
				  <li class="list-group-item d-flex bg-info text-white justify-content-center align-items-center">
				    Visi duomenys
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Bendros pajamos
				    <span class="badge badge-primary badge-pill">{{ number_format($inc_total, 2) }}€</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Bendros išlaidos
				    <span class="badge badge-danger badge-pill">{{ number_format($exp_total, 2) }}€</span>
				  </li> 
                  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Bendri mokesčiai
				    <span class="badge badge-danger badge-pill">{{ number_format($bll_total, 2) }}€</span>
				  </li>
				  <li class="list-group-item d-flex justify-content-between align-items-center">
				    Balansas
				    <span class="badge badge-primary badge-pill">{{ number_format($profit, 2) }}€</span>
				  </li>
				</ul>
        	</div>
        </div>
        {{-- 
        <div class="row">
            @foreach($results as $result)
                <div class="col-xl-4 col-sm-6 mb-3">
                    <div class="card text-white {{($result['type'] == 'income')? 'bg-info':'bg-danger'}} o-hidden h-100">
                        <div class="card-header">
                            <span class="float-left text-dark">{{($result['type'] == 'income')? $result['income_date']:$result['bills_date']}}</span>
                        </div>
                        <div class="card-body">
                            <div class="card-body-icon mt-5">
                                <i class="fas fa-fw {{($result['type'] == 'income')? 'fas fa-euro-sign':'fa-money-bill'}} "></i>
                            </div>
                            <div>{{($result['type'] == 'income')? $result['income_title']:$result[ 'bills_title' ]}}</div>
                            <div class="font-weight-bold text-dark">{{($result['type'] == 'income')? '€ '.$result['income_amount']: '€ '.$result['bills_amount']}}</div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div> --}}

        {{-- {!! Form::open(['method' => 'get']) !!}
            <div class="row">
                <div class="col-xs-1 col-md-1 form-group">
                    {!! Form::label('year','Year',['class' => 'control-label']) !!}
                    {!! Form::select('y', array_combine(range(date("Y"), 1900), range(date("Y"), 1900)), old('y', Request::get('y', date('Y'))), ['class' => 'form-control']) !!}
                </div>
                <div class="col-xs-2 col-md-2 form-group">
                    {!! Form::label('month','Month',['class' => 'control-label']) !!}
                    {!! Form::select('m', cal_info(0)['months'], old('m', Request::get('m', date('m'))), ['class' => 'form-control']) !!}
                </div>
                <div class="col-xs-4">
                    <label class="control-label">&nbsp;</label><br>
                    {!! Form::submit('Select month',['class' => 'btn btn-primary']) !!}
                </div>
            </div> --}}
    
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th class="bg-info">Pajamos</th>
                                <th class="bg-info">{{ number_format($inc_total, 2) }}€</th>
                            </tr>
                        @foreach($inc_summary as $inc)
                            <tr>
                                <th>{{ $inc['name'] }}</th>
                                <td>{{ number_format($inc['income_amount'], 2) }}€</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th class="bg-danger">Išlaidos</th>
                                <th class="bg-danger">{{ number_format($exp_total, 2) }}€</th>
                            </tr>
                        @foreach($exp_summary as $inc)
                            <tr>
                                <th>{{ $inc['name'] }}</th>
                                <td>{{ number_format($inc['expense_amount'], 2) }}€</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-striped">
                            <tr>
                                <th class="bg-danger">Mokesčiai</th>
                                <th class="bg-danger">{{ number_format($bll_total, 2) }}€</th>
                            </tr>
                        @foreach($bll_summary as $inc)
                            <tr>
                                <th>{{ $inc['name'] }}</th>
                                <td>{{ number_format($inc['bills_amount'], 2) }}€</td>
                            </tr>
                        @endforeach
                        </table>
                    </div>
                </div>
            </div>

    </div>
@endsection