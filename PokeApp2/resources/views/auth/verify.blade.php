@extends('admin.auth-base')
@section('csslogin')
<link rel="stylesheet" href="{{ url('assets/css/login.css') }}" type="text/css" />
@endsection
@section('content')
<div class="wrapper">
            <div class="logo"> <img src="{{ url('assets/img/pokelogin.png') }}" alt=""> </div>
            <div class="text-center mt-4 name"> PokeApp </div>
            <div class="card">
                <div class="card-header">Necesitas Verificar el correo</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    Te hemos enviado un link de verificacion. Si no te ha llegado prueba a volver a enviarlo
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">Pulsa aqui para volver a enviarlo</button>
                    </form>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                   <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Cerrar sesion
                                    </a>
            </div>
        </div>
    </div>
</div>
@endsection
