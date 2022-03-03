@extends('admin.base')
@section ('content')

<div class="page-wrapper">
<!-- HEADER MOBILE-->
@include('headermobile')
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
@include('sidebar-admin')
<!-- END MENU SIDEBAR-->

<!-- PAGE CONTAINER-->
<div class="page-container">
<!-- HEADER DESKTOP-->
@include('header-admin')
<!-- HEADER DESKTOP-->

<div class="main-content">
<div class="section__content section__content--p30">
<div class="container-fluid">
<div class="row">
<div class="col-md-4">

    @if($users->isNotEmpty() || $habilidades->isNotEmpty() || $generos->isNotEmpty() || $tipos->isNotEmpty() || $pokeunicos->isNotEmpty() || $pokemons->isNotEmpty())   
    @foreach ($users as $user)
    <div class="card">
        <h3>Usuarios</h3>
        <div class="card-header">
            <strong class="card-title mb-3">{{$user->name}}</strong>
        </div>
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class="mx-auto d-block" src="{{ asset('storage/img/'. $user->img) }}" alt="Card image cap">
                <h5 class="text-sm-center mt-2 mb-1">{{ $user->rol}}</h5>
                <div class="location text-sm-center">
                    Email: {{ $user->email}}</div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($habilidades as $habilidad)
    <div class="card">
        <h3>Habilidades</h3>
        <div class="card-header">
            <strong class="card-title mb-3">{{$habilidad->nombre}}</strong>
        </div>
    </div>
    @endforeach
    @foreach ($generos as $genero)
    <div class="card">
        <h3>Generos</h3>
        <div class="card-header">
            <strong class="card-title mb-3">{{$genero->nombre}}</strong>
        </div>
    </div>
    @endforeach
    @foreach ($tipos as $tipo)
    <div class="card">
        <h3>Tipos</h3>
        <div class="card-header">
            <strong class="card-title mb-3">{{$tipo->nombre}}</strong>
        </div>
    </div>
    @endforeach
    @foreach ($pokeunicos as $pokeunico)
    <div class="card">
        <h3>PokeUnicos</h3>
        <div class="card-header">
            <strong class="card-title mb-3">{{$pokeunico->apodo}}</strong>
        </div>
        <div class="card-body">
            <div class="mx-auto d-block">
                
                <div class="location text-sm-center">
                    Peso: {{$pokeunico->peso}}</div>
                    
                <div class="location text-sm-center">
                    Altura: {{$pokeunico->altura}}</div>
            </div>
        </div>
    </div>
    @endforeach
    @foreach ($pokemons as $pokemon)
    <div class="card">
        <h3>Pokemons</h3>
        <div class="card-header">
            <strong class="card-title mb-3">{{$pokemon->nombre}}</strong>
        </div>
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class="mx-auto d-block" src="{{ asset('storage/img/'. $pokemon->img) }}" alt="Card image cap">
                <h5 class="text-sm-center mt-2 mb-1">{{ $pokemon->tipo->nombre}}</h5>
                
            </div>
            
        </div>
    </div>
    @endforeach
    @else
    <div>
        <h2>No se encontro nada :(</h2>
    </div>
    @endif
    
</div>
</div>
</div>
</div>
</div>
@endsection