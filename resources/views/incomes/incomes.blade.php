@extends('layouts.header')

@section('content')

        <!-- Main content -->
        <div class="content">
          <div class="container-fluid">

            @if (session()->has('success'))
            <div class="alert alert-success">
              {{ session()->get('success') }}
            </div>
            @endif

            <div class="d-flex justify-content-end mb-2">
              <a href="{{ route('incomes.createIncomes') }}" class="btn btn-success" style='font-size:18px'>Pridėti pajamas <i class='far fa-money-bill-alt'></i></a>
            </div>
            <div class="card card-default">
              <div class="card-header bg-info">Pajamos</div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                      <th>Pajamų pavadinimas</th>
                      <th>Suma</th>
                      <th>Data</th>
                      <th>Redaguoti</th>
                      <th>Ištrinti</th>
                    </thead>
                    <tbody>
                      @foreach ($incomes as $key=>$income)
                      <tr>
                        <td>{{ $income->income_title }}</td>
                        <td>{{ $income->income_amount }}€</td>
                        <td>{{ $income->income_date }}</td>
                        <td>
                          <a href="{{ route('incomes.editIncomes',$income->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                          <td>
                            <form style="margin: 0px 0 0px 10px; min-height: 20px;" action="{{ route('incomes.deleteIncomes', $income->id) }}" method="POST">
                            @csrf
                            {{ method_field('delete') }}
                            <button type="submit"  class="btn btn-sm btn-danger show_confirm" data-toggle="tooltip" title='Delete'><i class="fa fa-trash"></i></button>
                            </form>
                          </td>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
            </div>

          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script type="text/javascript">
             $('.show_confirm').click(function(event) {
                  var form =  $(this).closest("form");
                  var name = $(this).data("name");
                  event.preventDefault();
                  swal({
                      title: `Ar tikrai norite ištrinti šį įrašą?`,
                      text: "Jei ištrinsite tai įrašas išnyks amžiams.",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      form.submit();
                    }
                  });
              });
        </script>
@endsection