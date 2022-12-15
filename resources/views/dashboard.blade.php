@extends('layouts.header')

@section('content')

        <div class="content">
          <div class="container-fluid">
           
            <div class="container">
              <div class="budget-section">
                <div class="budget col col-md col-sm">
                  <h2>Pajamos</h2>
                  <i class='fas fa-money-bill-alt' style='font-size:36px'></i>
                  <p class="amount"><span id="budgetAmount">{{ $data['incomes'] }}</span>€</p>
                </div>
                <div class="expenses col col-md col-sm">
                  <h2>Išlaidos</h2>
                  <i class='fas fa-money-check-alt' style='font-size:36px'></i>
                  <p class="exp-amount"><span id="expensesAmount">{{ $data['expenses'] }}</span>€</p>
                </div>
                <div class="bills col col-md col-sm">
                  <h2>Mokesčiai</h2>
                  <i class='fas fa-money-check' style='font-size:36px'></i>
                  <p class="exp-amount"><span id="expensesAmount">{{ $data['bills'] }}</span>€</p>
                </div>
                <div class="balance col col-md col-sm">
                  <h2>Balansas</h2>
                  <i class="fas fa-euro-sign" style='font-size:36px'></i>                  
                  <p class="amount bala"><span id="balanceAmount">{{ $data['balance'] }}</span>€</p>
                </div>
              </div>
            </div>
            <script src="dist/js/main.js"></script>
            <!--
            <h4>Norima sutaupyti</h4>
          -->

          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->

@endsection