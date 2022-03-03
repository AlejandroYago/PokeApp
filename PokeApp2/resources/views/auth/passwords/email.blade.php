@extends('admin.auth-base')
@section('csslogin')
<link rel="stylesheet" href="{{ url('assets/css/login.css') }}" type="text/css" />
@endsection
@section('content')

<div class="wrapper">
            <div class="logo"> <img src="{{ url('assets/img/pokelogin.png') }}" alt=""> </div>
            <div class="text-center mt-4 name"> PokeApp </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                           

                            <div class="col-md-6">
                                <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Por favor introduce tu email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus></div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Enviar enlace
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="col-md-6 offset-md-4">
                        ¿Te acordaste de la contraseña?
                        
                        <a href="{{ route('login') }}"> ¡Inicia sesion! </a>    
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection
