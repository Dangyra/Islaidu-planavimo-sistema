<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Išlaidų planavimas</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <link rel="stylesheet" href="dist/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <div class="container-fluid">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('bills.bills') }}">Mokesčiai</a>
            </li>
            <li class="breadcrumb-item active">Mokesčių atnaujinimas</li>
        </ol>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif
        <div class="row">
            <div class="col-xl-8 offset-2">
                <div class="card mx-auto mt-5">
                    <div class="card-header">Atnaujinti mokesčius</div>
                    <div class="card-body">
                        <form action="{{ route('bills.updateBills') }}" method="POST">
                            @csrf
                            <input type="hidden" name="bills_id" value="{{ $bill->id }}">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="bills_title">Mokesčių pavadinimas</label>
                                    <input type="text" id="bills_title" class="form-control" placeholder="Pavadinimas" required="required" autofocus="autofocus" name="bills_title" value="{{ $bill->bill_title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="bills_amount">Suma</label>
                                    <input type="number" step="any" min="0.01" id="bills_amount" class="form-control" placeholder="Suma" required="required" name="bills_amount" value="{{ $bill->bill_amount }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="bills_date">Pridėjimo data</label>
                                    <input type="date" id="bills_date" class="form-control" placeholder="" required="required" name="bills_date" value="{{ $bill->bill_date }}">
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('bills.bills') }}" class="btn btn-success">Grįžti</a>
                                <button type="submit" class="btn btn-primary">Atnaujinti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>