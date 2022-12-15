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
                <a href="{{ route('incomes.incomes') }}">Pajamos</a>
            </li>
            <li class="breadcrumb-item active">Pajamų atnaujinimas</li>
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
                    <div class="card-header">Atnaujinti pajamas</div>
                    <div class="card-body">
                        <form action="{{ route('incomes.updateIncomes') }}" method="POST">
                            @csrf
                            <input type="hidden" name="income_id" value="{{ $income->id }}">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="income_title">Pajamų pavadinimas</label>
                                    <input type="text" id="income_title" class="form-control" placeholder="Pavadinimas" required="required" autofocus="autofocus" name="income_title" value="{{ $income->income_title }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="income_amount">Suma</label>
                                    <input type="number" step="any" min="0.01" id="income_amount" class="form-control" placeholder="Suma" required="required" name="income_amount" value="{{ $income->income_amount }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="income_date">Pridėjimo data</label>
                                    <input type="date" id="income_date" class="form-control" placeholder="" required="required" name="income_date" value="{{ $income->income_date }}">
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('incomes.incomes') }}" class="btn btn-success">Grįžti</a>
                                <button type="submit" class="btn btn-primary">Atnaujinti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>