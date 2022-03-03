@extends('admin.auth-base')
@section('csslogin')
<link rel="stylesheet" href="{{ url('assets/css/login.css') }}" type="text/css" />
@endsection
@section('content')
            
            <div class="wrapper">
            <div class="logo"> <img src="{{ url('assets/img/pokelogin.png') }}" alt=""> </div>
            <div class="text-center mt-4 name"> PokeApp </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="row mb-3">
                            

                            <div class="col-md-6">
                                <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" placeholder="Introduce tu email" required autocomplete="email" autofocus></div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            

                            <div class="col-md-6">
                               <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Introduce una contraseña" required autocomplete="new-password"></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            

                            <div class="col-md-6">
                                <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span><input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Introduce de nuevo la contraseña" required autocomplete="new-password"></div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn mt-3">
                                    Reestablecer contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
   
@endsection
