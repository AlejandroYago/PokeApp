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
    
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¡Captura este Pokemon!</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          
        <form action="{{url('pokedex')}}" method="post">
            @csrf
            @method('POST')
            <input type="text" id="text-input" name="apodo" placeholder="Introduce un apodo para tu pokemon" class="form-control">
            <br>
            <input type="number" id="number-input" name="peso" placeholder="Introduce el peso de tu pokemon" class="form-control">
            <br>
            <input type="number" step="0.1" id="number-input" name="altura" placeholder="Introduce la altura de tu pokemon" class="form-control">
            <br>
            <select name="genero_id" id="select" class="form-control">
            @if(isset($generos))
            @foreach($generos as $genero)
                <option value="{{ $genero->id }}">{{ $genero->nombre }}</option>
            @endforeach
            @endif
            </select>
            <br>
            <select name="habilidad_id" id="select" class="form-control">
           @if(isset($habilidades))
            @foreach($habilidades as $habilidad)
            
                <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
              
             @endforeach
            @endif
            </select>
            <br>
            <select name="pokemon_id" id="select" class="form-control">
            @foreach($pokemons as $pokemon)
            
                <option value="{{ $pokemon->id }}">{{ $pokemon->nombre }}</option>
              
             @endforeach
            </select>
            <br>
            
            
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Capturarlo</button>
        </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


<h1>PokemonIndex</h1>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Capturar Pokemon
</button>
@if(Session::has('message'))
            <div class="alert alert-{{ session()->get('type') }}" role="alert" style="text-align:center;">
                {{ session()->get('message') }}
            </div>
            @endif
            
            @if ($errors->any())
             <div class="alert alert-danger">
             <ul>
             @foreach ($errors->all() as $error)<!--Esto es por si al introducirlo, he introducido varias cosas mal, pues que me alerte de todas-->
             <li>{{ $error }}</li>
             @endforeach
             </ul>
             </div>
          @endif

<div class="col-md-4">
    @foreach($pokemons as $pokemon)
    <div class="card">
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class=" mx-auto d-block" src="{{ url('storage/img/' . $pokemon->img) }}" alt="Card image cap">
                <h5 class="text-sm-center mt-2 mb-1">{{ $pokemon->nombre}}</h5>
                <div class="location text-sm-center">
                    <i class="fa fa-map-marker"></i>{{ $pokemon->tipo->nombre }}</div>
            </div>
            <hr>
            
        </div>
        
        <div class="card-footer">
            <strong class="card-title mb-3">Pokemon</strong>
            
        </div>
       
    </div>
    @endforeach

</div>

</div>
</div>


@endsection