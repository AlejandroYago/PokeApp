@extends('admin.base')
@section ('content')

<div class="page-wrapper">
<!-- HEADER MOBILE-->
@include('headermobile')
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
@include('sidebar-admin')
<!-- END MENU SIDEBAR-->
<div class="page-container">
<!-- HEADER DESKTOP-->
@include('header-admin')
<!-- HEADER DESKTOP-->
<div class="main-content">




<h1>Pokedex</h1>


 
<div class="col-md-4">
    @foreach($pokeunicos as $pokeunico)
    @if($pokeunico->user->id == auth()->user()->id)
    
    
    <div class="card">
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class=" mx-auto d-block" src="{{ url('storage/img/' . $pokeunico->pokemon->img) }}" alt="Card image cap">
                <h5 class="text-sm-center mt-2 mb-1">{{ $pokeunico->pokemon->nombre}}</h5>
                <div class="location text-sm-center">
                    {{ $pokeunico->pokemon->tipo->nombre }}
                </div>
                <div class="location text-sm-center">
                    Peso: {{ $pokeunico->peso }}
                </div>
                <div class="location text-sm-center">
                    Altura: {{ $pokeunico->altura }}
                </div>
                
                @if($pokeunico->gender != null)
                <div class="location text-sm-center">
                    Genero: {{ $pokeunico->gender->nombre }}
                </div>
                @else
                <div class="location text-sm-center">
                    Genero: Sin valor
                </div>
                @endif
                
                @if($pokeunico->ability != null)
                <div class="location text-sm-center">
                    Habilidad: {{ $pokeunico->ability->nombre }}
                </div>
                @else
                <div class="location text-sm-center">
                    Habilidad: Sin valor
                </div>
                @endif
                <div class="location text-sm-center">
                    Entrenador: {{ $pokeunico->user->name }}
                </div>
            </div>
            <hr>
            
        </div>
        <div class="card-footer">
            <strong class="card-title mb-3">{{ $pokeunico->apodo}}</strong>
            <br>
            <a href="{{url('pokedex/' . $pokeunico->id . '/edit')}}">
                <button type="button" class="btn btn-primary">
                  Edita este pokemon
                </button>
            </a>
        </div>
    </div>
    @endif
    @endforeach
</div>


</div>
</div>


@endsection