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
                <a href="{{ route('expenses.expenses') }}">Išlaidos</a>
            </li>
            <li class="breadcrumb-item active">Naujų išlaidų pridėjimas</li>
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
                    <div class="card-header">Pridėti naujas išlaidas</div>
                    <div class="card-body">
                        <form action="{{ route('expenses.storeExpenses') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="subcategory_id">Išlaidų pavadinimas</label>
                                    <select id="subcategory_id" class="form-control" placeholder="Išlaidų pavadinimas" required="required" autofocus="autofocus" name="subcategory_id">
                                        @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>                           
                                        @endforeach
                                    </select>                                
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="category_id">Kategorija</label>
                                    <select id="category_id" class="form-control" placeholder="Kategorijos pavadinimas" required="required" autofocus="autofocus" name="category_id">
                                        @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->category_name }}</option>                           
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="expense_amount">Suma</label>
                                    <input type="number" step="any" min="0.01" id="expense_amount" class="form-control" placeholder="Suma" required="required" name="expense_amount">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <label for="expense_date">Pridėjimo data</label>
                                    <input type="date" id="expense_date" class="form-control" placeholder="" required="required" name="expense_date" value="{{ date('Y-m-d') }}">
                                </div>
                            </div>
                            <div class="float-right">
                                <a href="{{ route('expenses.expenses') }}" class="btn btn-success">Grįžti</a>
                                <button type="submit" class="btn btn-primary">Išsaugoti</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/ui/1.11.3/jquery-ui.min.js"></script>
    <script>
        $('.date').datepicker({
            autoclose: true,
            dateFormat: "yy-mm-dd"
        });
    </script>
</body>
</html>