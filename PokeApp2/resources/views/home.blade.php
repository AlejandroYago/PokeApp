@extends('admin.home-base')
@section('csslogin')
<link rel="stylesheet" href="{{ url('assets/css/home.css') }}" type="text/css" />
@endsection

@section('content')
@if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<div class="slider__warpper">
  <div class="flex__container flex--pikachu flex--active" data-slide="1">
    
    <div class="flex__item flex__item--left">
      <div class="flex__content">
        
        
        @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500">Inicio</a>
                    
                    <a href="{{ url('user-zone') }}" class="text-sm text-gray-700 dark:text-gray-500">Area usuario</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Iniciar Sesion</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Registrarse</a>
                    @endif
                @endauth
            </div>
        @endif
        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                Cerrar sesion
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
        
        
        <p class="text--sub">PokeApp</p>
        <h1 class="text--big">¡Bienvenido!</h1>
        <p class="text--normal">Aquí empieza tu aventura Pokemon</p>
      </div>
      <p class="text__background">Pikachu</p>
    </div>
    <div class="flex__item flex__item--right"></div>
    <img class="pokemon__img" src="{{url('assets/img/Pikachu.png')}}" />
  </div>
  
 
  
  
</div>

@endsection