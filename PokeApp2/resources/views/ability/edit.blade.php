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
<div class="col-lg-6">
    <div class="card">
        <div class="card-header">
            <strong>Edita Una Habilidad Pokemon</strong>
        </div>
        @if(isset($message))
            {{$message}}
        @endif
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
            <form action="{{ url('createA/' . $habilidad->id ) }}" method="post" class="form-horizontal">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Habilidad Pokemon</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nombre" name="nombre" value="{{old('nombre', $habilidad->nombre)}}" class="form-control">
                        <small class="form-text text-muted">Introduce una habilidad pokemon</small>
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
            </div>
            
@endsection