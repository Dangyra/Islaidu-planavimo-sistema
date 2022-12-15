@extends('layouts.header')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <!-- User Profile -->
            <div class="card user-profile" style="width: 474px;">
                <div class="card-header">
                    <h4 class="float-left mb-0 mt-2">Naudotojo informacija</h4>
                </div>

                <div class="card-body pb-0 pt-0">
                @if (session('status'))
                    <div class="alert alert-success mb-0 mt-3">
                        <strong>{{ session('status') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                </div>
                
                @if(config('laravelextendeduser.profile.avatar') !== false)
                <div class="card-body border-bottom">
                    <!-- Image -->
                    <div class="user-profile-image">
                        <div class="user-profile-image--default" style="">
                            <i class='fas fa-user-circle' style='font-size:160px;margin-left: 116px;'></i>
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
                   <div class="row mb-2">
                        <div class="col-sm-6 text-sm-right">Vardas</div>
                        <div class="col-sm-6 field-bg">
                            <span class="text-muted">{{ $user->name }}</span>
                        </div>
                    </div>
                    <div class="row  mb-2">
                        <div class="col-sm-6 text-sm-right">Pavardė</div>
                        <div class="col-sm-6 field-bg">
                            <span class="text-muted">{{ $user->surname }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/profile/edit') }}" class="btn btn-primary btn-100 float-right text-uppercase">Readaguoti profilį</a>
                </div>

            </div>
            <!-- /User Profile -->
            
        </div>
    </div>
</div>
@endsection