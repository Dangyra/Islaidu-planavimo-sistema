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
              <a href="{{ route('subcategories.createSubcategory') }}" class="btn btn-success">Pridėti subkategoriją</a>
            </div>
            <div class="card card-default">
              <div class="card-header bg-info">Subkategorija</div>
                <div class="card-body">
                  <table class="table">
                    <thead>
                        <th>#</th>
                        <th>Subkategorijos pavadinimas</th>
                        <th>Data</th>
                        <th>Redaguoti</th>
                        <th>Ištrinti</th>
                    </thead>
                    <tbody>
                      @foreach ($subcategories as $key=>$subcategory)
                      <tr>
                        <th scope="row">{{ $subcategory->id }}</th>
                        <td>{{ $subcategory->subcategory_name }}</td>
                        <td>{{ $subcategory->date }}</td>
                        <td>
                          <a href="{{ route('subcategories.editSubcategory',$subcategory->id) }}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                          <td>
                            <form style="margin: 0px 0 0px 10px; min-height: 20px;" action="{{ route('subcategories.deleteSubcategory', $subcategory->id) }}" method="POST">
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