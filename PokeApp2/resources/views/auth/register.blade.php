@extends('admin.auth-base')
@section('csslogin')
<link rel="stylesheet" href="{{ url('assets/css/login.css') }}" type="text/css" />
@endsection
@section('content')


<div class="wrapper">
            <div class="logo"> <img src="{{ url('assets/img/pokelogin.png') }}" alt=""> </div>
            <div class="text-center mt-4 name"> PokeApp </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">


                            <div class="col-md-6">
                               <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span> <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Introduce tu nombre"> </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            

                            <div class="col-md-6">
                                <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span><input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Introduce tu email"></div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            

                            <div class="col-md-6">
                                <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span><input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Introduce una contraseña"></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">


                            <div class="col-md-6">
                                <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span><input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Introduzca de nuevo la contraseña"></div>
                            </div>
                        </div>
                        
                        <div class="row mb-3">


                            <div class="col-md-6">
                                <div class="form-field d-flex align-items-center"> <span class="far fa-user"></span><input id="archivo" type="file" class="form-control" name="archivo" required  accept=".jpg, .jpeg, .png" enctype="multipart/form-data"></div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn mt-3">
                                    Iniciar Sesion
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <div class="col-md-6 offset-md-4">
                        ¿Ya tienes cuenta?
                        
                        <a href="{{ route('login') }}"> ¡Inicia sesion! </a>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
