@extends('admin.auth-base')
@section('csslogin')
<link rel="stylesheet" href="{{ url('assets/css/login.css') }}" type="text/css" />
@endsection
@section('content')



    
        <div class="wrapper">
            <div class="logo"> <img src="{{ url('assets/img/pokelogin.png') }}" alt=""> </div>
            <div class="text-center mt-4 name"> PokeApp </div>
                

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                          @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                          @endif

                            <div class="col-md-6">
                               <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span>  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Introduce tu email"> </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">


                            <div class="col-md-6">
                               <div class="form-field d-flex align-items-center"> <span class="fas fa-key"></span> <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Introduce contraseña"> </div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recuerdame
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn mt-3">
                                    Iniciar Sesion
                                </button>

                                @if (Route::has('password.request'))
                                   <div class="text-center fs-6"> <a href="{{ route('password.request') }}">
                                        ¿Olvidaste tu contraseña?
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="col-md-6 offset-md-4">
                        ¿No tienes cuenta?
                        
                        <a href="{{ route('register') }}"> ¡Registrate! </a>    
                    </div>
                </div>
            
        </div>
    

@endsection
