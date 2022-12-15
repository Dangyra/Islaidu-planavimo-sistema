@extends('layouts.header')

@section('content')
        
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
<!-- Main content -->
        <div class="content">
          <div class="container-fluid">
              <!-- Breadcrumbs-->
              <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                      <a href="{{ route('dashboard') }}">Pradžia</a>
                  </li>
                  <li class="breadcrumb-item active">Ataskaita</li>
              </ol>

              <div class="row">
                  <div class="col-xl-6 offset-xl-3 col-sm-12 mb-3">
                      <ul class="list-group">
                          <li class="list-group-item bg-info text-center text-white">
                              <span>Mėnesio ataskaita</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              Bendros pajamos
                              <span class="badge badge-primary badge-pill incomeValue">{{ number_format($incomes, 2) }}€</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              Bendros išlaidos
                              <span class="badge badge-danger badge-pill expenseValue">{{ number_format($expenses, 2) }}€</span>
                          </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                            Bendri mokesčiai
                            <span class="badge badge-danger badge-pill billValue">{{ number_format($bills, 2) }}€</span>
                        </li>
                          <li class="list-group-item d-flex justify-content-between align-items-center">
                              Balansas
                              <span class="badge badge-primary badge-pill">{{ number_format($balance, 2) }}€</span>
                          </li>
                      </ul>
                  </div>

              </div>
              <!-- Icon Cards-->
              <div class="row">

                  <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-primary o-hidden h-100">
                          <div class="card-body">
                              <div class="card-body-icon">
                                  <i class="fas fa-fw fa-table"></i>
                              </div>
                              <div class="mr-5">Santrauka</div>
                          </div>
                          <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('summary.summary') }}"  class="card-footer text-white clearfix small z-1" href="#">
                              <span class="float-left">Peržiūrėti</span>
                              <span class="float-right">
                                  <i class="fas fa-angle-right"></i>
                              </span>
                          </a>
                      </div>
                  </div>

                  <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-success o-hidden h-100">
                          <div class="card-body">
                              <div class="card-body-icon">
                                  <i class="fas fa-fw fas fa-euro-sign"></i>
                              </div>
                              <div class="mr-5">{{ App\Models\Incomes::where('user_id', Auth::user()->id)->count() }} Pajamos</div>
                          </div>
                          <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('incomes.incomes') }}"  class="card-footer text-white clearfix small z-1" href="#">
                              <span class="float-left">Peržiūrėti</span>
                              <span class="float-right">
                                  <i class="fas fa-angle-right"></i>
                              </span>
                          </a>
                      </div>
                  </div>

                  <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-danger o-hidden h-100">
                          <div class="card-body">
                              <div class="card-body-icon">
                                  <i class="fas fa-fw fa-money-bill"></i>
                              </div>
                              <div class="mr-5">{{ App\Models\Expense::where('user_id', Auth::user()->id)->count() }} išlaidos</div>
                          </div>
                          <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('expenses.expenses') }}" href="#">
                              <span class="float-left">Peržiūrėti</span>
                              <span class="float-right">
                                  <i class="fas fa-angle-right"></i>
                              </span>
                          </a>
                      </div>
                  </div>

                  <div class="col-xl-3 col-sm-6 mb-3">
                      <div class="card text-white bg-info o-hidden h-100">
                          <div class="card-body">
                              <div class="card-body-icon">
                                  <i class="fas fa-fw fa-sticky-note"></i>
                              </div>
                              <div>{{ App\Models\Bill::where('user_id', Auth::user()->id)->count() }} Mokesčiai</div>
                          </div>
                          <a class="nav-link text-white text-center card-footer clearfix small z-1" href="{{ route('bills.bills') }}"  class="card-footer text-white clearfix small z-1" href="#">
                              <span class="float-left">Peržiūrėti</span>
                              <span class="float-right">
                                  <i class="fas fa-angle-right"></i>
                              </span>
                          </a>
                      </div>
                  </div>
              </div>
          </div>
        </div>
       
          @endsection

          {{-- @push('js')
              <script src="{{ asset('dashboard/vendor/chart/chart.min.js') }}"></script>
              <script>
                  //Income expense Pie Chart
                  var ctx = document.getElementById("incomeExpenseChart");
                  var income = $(".incomeValue").html();
                  var expense = $(".expenseValue").html();
                  var incomeExpenseChart = new Chart(ctx, {
                      type: 'pie',
                      data: {
                          labels: ["Income", "Expense"],
                          datasets: [{
                          data: [income, expense],
                          backgroundColor: ['#007bff', '#dc3545'],
                          }],
                      },
                  });
              </script>
          @endpush --}}

          