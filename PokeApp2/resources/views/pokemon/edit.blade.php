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



<div class="col-md-4">

    <div class="card">
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class=" mx-auto d-block" src="{{ url('storage/img/' . $pokemon->img) }}" alt="Card image cap">
                <h5 class="text-sm-center mt-2 mb-1">{{ $pokemon->nombre}}</h5>
                <div class="location text-sm-center">
               
                    @if($pokemon->tipo != null)
                        <i class="fa fa-map-marker"></i>{{ $pokemon->tipo->nombre }}</div>
                    @else
                        <i class="fa fa-map-marker"></i>Sin valor</div>
                    @endif
            </div>
            <hr>
            
        </div>
        
        <div class="card-footer">
            <strong class="card-title mb-3">Pokemon</strong>
        </div>
       
    </div>

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
            <form action="{{url('poke-index/' . $pokemon->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Nombre Pokemon:</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="nombre" value="{{ old('nombre', $pokemon->nombre)}}" class="form-control">
                        <small class="form-text text-muted">Introduce el nombre del pokemon</small>
                    </div>
                </div>
                
                
                
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="select" class=" form-control-label">Tipo</label>
                    </div>
                    <div class="col-12 col-md-9">
                        
                        
                        <select name="tipo_id" id="select" class="form-control">
                        @if(isset($tipos))
                        @foreach($tipos as $tipo)
                            <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                        @endforeach
                        </select>
                        @else
                            <p>No existen tipos aun</p>
                        @endif
                    </div>
                </div>
                
                
                
                
                
                
                
                
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="file-input" class=" form-control-label">File input</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="file" id="file-input" name="img" class="form-control-file" enctype="multipart/form-data">
                    </div>
                </div>
                 <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Enviar
            </button>
        </div>
            </form>
        </div>
       
    </div>
</div>
@endsection