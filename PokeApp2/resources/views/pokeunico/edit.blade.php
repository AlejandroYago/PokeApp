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
            
        </div>
    </div>
    @endif
   
   
</div>


<div class="card">
    <div class="card-header">
        <strong>Editar</strong> Pokemon
    </div>
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
    <div class="card-body card-block">
        <form action="{{url('pokedex/' . $pokeunico->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Apodo Pokemon:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="apodo" value="{{ old('apodo', $pokeunico->apodo) }}" class="form-control">
                    <small class="form-text text-muted">Edita el apodo del pokemon</small>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Peso Pokemon:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="text-input" name="peso" value="{{ old('peso', $pokeunico->peso) }}" class="form-control">
                    <small class="form-text text-muted">Edita el peso del pokemon</small>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Altura Pokemon:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="number" id="text-input" name="altura" value="{{ old('altura', $pokeunico->altura) }}" class="form-control">
                    <small class="form-text text-muted">Edita la altura del pokemon</small>
                </div>
            </div>
            
            
            
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Genero:</label>
                </div>
                <div class="col-12 col-md-9">
                    
                    @if($pokeunico->gender != null)
                    <select name="genero_id" id="select" class="form-control">
                    @foreach($generos as $genero)
                        <option value="{{ old('id', $genero->id) }}" selected>{{ old('nombre', $genero->nombre)}}</option>
                    @endforeach
                    </select>
                    @else
                        <p>No hay generos implementados aun</p>
                    @endif
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="select" class=" form-control-label">Habilidad:</label>
                </div>
                <div class="col-12 col-md-9">
                    
                    @if($pokeunico->ability != null)
                    <select name="habilidad_id" id="select" class="form-control">
                    @foreach($habilidades as $habilidad)
                        <option value="{{ $habilidad->id }}">{{ $habilidad->nombre }}</option>
                    @endforeach
                    </select>
                    @else
                      
                        <p>Esta habilidad ha sido eliminada</p>
                    @endif
                </div>
            </div>
            
            
            
            
            
            
            

             <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
    </div>
        </form>
    </div>
   
</div>


</div>
</div>


@endsection