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
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        
                        <!-- User Profile -->
                        <form class="card user-profile" style="width: 610px;" method="POST" action="{{ url('/profile') }}" enctype="multipart/form-data">

                            {{ csrf_field() }}

                            {{ method_field('PUT') }}

                            <div class="card-header">
                                <h4 class="float-left mb-0 mt-2">Naudotojo informacija</h4>
                            </div>

                            <div class="card-body pb-0 pt-0">
                                @if ($errors->any())
                                    <div class="alert alert-danger mb-0 mt-3">
                                        <h4 class="font-weight-bold">profilio atnaujinimas nepavyko!</h4>
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                            </div>
                            
                            @if(config('laravelextendeduser.profile.avatar') !== false)
                            <div class="card-body border-bottom">
                                <!-- Image -->
                                <div class="user-profile-image">
                                    <div class="user-profile-image--default" style="">
                                        <i class='fas fa-user-circle' style='font-size:160px;'></i>
                                    </div>
                                </div>
                            </div>
                            @endif

                            <div class="card-header">
                                <h5 class="float-left mb-0 mt-1 w-100 text-center">
                                    <span class="text-info">{{ $user->email }}</span> <small class="text-muted font-italic">(Privatus)</small>
                                </h5>
                            </div>

                            <div class="card-body">
                                <div class="form-group row pt-3">
                                    <label for="name" class="col-sm-4 col-form-label text-sm-right">
                                        Vardas <small class="text-danger font-italic">(Privaloma)</small>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ (old()) ? old('name') : $user->name }}">
                                    </div>
                                </div>
                                <div class="form-group row pt-3">
                                    <label for="name" class="col-sm-4 col-form-label text-sm-right">
                                        Pavardė <small class="text-danger font-italic">(Privaloma)</small>
                                    </label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="surname" name="surname" value="{{ (old()) ? old('surname') : $user->surname }}">
                                    </div>
                                </div>
                                
                            
                                <!-- Emails -->
                                <div class="dynamic-form-fields">
                                @if($emails =  (old()) ? old('emails') : ( (isset($user->profile['emails'])) ? $user->profile['emails'] : null ))
                                    @foreach($emails as $key => $email)
                                    <div class="form-group row dynamic-form-field">
                                        @unless($key)
                                        <label class="col-sm-4 col-form-label text-sm-right">Email</label>
                                        @else
                                        <label class="col-sm-4 col-form-label text-sm-right"></label>
                                        @endunless
                                        <div class="col">
                                            <input type="text" class="form-control" name="{{ 'emails['.$key.']' }}" 
                                            value="{{ $email }}">
                                        </div>  
                                        <div class="col-auto pl-0">
                                            @unless($key)
                                            <button type="button" class="btn btn-success add-new-field-button" onclick="addNewField(event, 'emails')" 
                                            {{ (count($emails) > 2) ? 'disabled' : 'enabled' }}>
                                                +
                                            </button>
                                            @else
                                            <button type="button" class="btn btn-danger remove-field-button" onclick="deleteField(event)">
                                                -
                                            </button>
                                            @endunless
                                        </div>
                                    </div>
                                    @endforeach
                                @else
                                    <div class="form-group row dynamic-form-field">
                                        <label class="col-sm-4 col-form-label text-sm-right">El.paštas</label>
                                        <div class="col">
                                            <input type="text" class="form-control" name="emails[0]">
                                        </div>  
                                        <div class="col-auto pl-0">
                                            <button type="button" class="btn btn-success add-new-field-button" onclick="addNewField(event, 'emails')">
                                                +
                                            </button>
                                        </div>
                                    </div>
                                @endif
                                </div>
                            
                            <div class="card-footer">
                                <div class="btn-group float-right text-uppercase" role="group">
                                    <a href="{{ route('profile') }}" class="btn btn-secondary btn-100">Atšaukti</a>
                                    <button type="button" class="btn btn-success btn-100 text-uppercase" onclick="submitForm(event)">Išsaugoti</button>
                                </div>
                            </div>
                        </form>
                        <!-- /User Profile -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</body>
</html>