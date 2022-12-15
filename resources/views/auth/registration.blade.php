<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registracija</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="">Registruotis</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">

      <form action="{{ route('register-user') }}" method="post">
        @if (Session::has('success'))
            <div class="alert alert-success">{{Session::get('success') }}</div>
        @endif
        @if (Session::has('fail'))
            <div class="alert alert-danger">{{Session::get('fail') }}</div>
        @endif
        @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Vardas" name="name" value="{{ old('name') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          <span class="text-danger">@error('name') {{ $message }} @enderror</span>
        </div>
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Pavardė" name="surname" value="{{ old('surname') }}">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
            <span class="text-danger">@error('surname') {{ $message }} @enderror</span>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="El.paštas" name="email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          <span class="text-danger">@error('email') {{ $message }} @enderror</span>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Slaptažodis" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          <span class="text-danger">@error('password') {{ $message }} @enderror</span>
        </div>
        <div class="row">
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block" style="width: auto">Registruotis</button>
          </div>
        </div>
      </form>
      <a href="login" class="text-center">Jau turiu paskyrą? Prisijunk čia</a>
    </div>
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
