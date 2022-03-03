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
            <strong>Añade Un Nuevo Tipo Pokemon</strong>
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
            <form action="{{ url('create') }}" method="post" class="form-horizontal">
                @csrf
                @method('POST')
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Tipo Pokemon</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="nombre" name="nombre" placeholder="Introduce un tipo de pokemon " class="form-control">
                        <small class="form-text text-muted">Introduce un tipo pokemon</small>
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