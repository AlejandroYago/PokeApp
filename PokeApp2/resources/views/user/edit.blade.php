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
                    

                    <div class="card">
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
                            <hr>
                            <div class="card-text text-sm-center">
                                
                                
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
        
        <div class="card">
    <div class="card-header">
        <strong>Editar</strong> Usuario
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
        <form action="{{url('user-zone/' . $user->id)}}" method="post" enctype="multipart/form-data" class="form-horizontal">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Nombre usuario:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="text" id="text-input" name="name" value="{{old('name', $user->name) }}" class="form-control">
                    <small class="form-text text-muted">Edita el nombre del usuario</small>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Email usuario:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="email" id="text-input" name="email" value="{{ old('email', $user->email)}}" class="form-control">
                    <small class="form-text text-muted">Edita el email</small>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Cambiar contraseña:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="text-input" name="password"  class="form-control">
                    
                    <small class="form-text text-muted">Edita la contraseña</small>
                </div>
            </div>
            
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Introduzca de nuevo la contraseña:</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="password" id="text-input" name="password_confirmation" class="form-control">
                    
                    <small class="form-text text-muted">Edita la contraseña</small>
                </div>
            </div>
            @if(auth()->user()->rol == ('admin'))
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="text-input" class=" form-control-label">Introduzca el rol:</label>
                </div>
                <div class="col-12 col-md-9">
                    <select name="rol" id="select" class="form-control">
                        
                        <option value="admin">admin</option>
                        <option value="user">user</option>
 
                    </select>
                    <small class="form-text text-muted">Edita el rol</small>
                </div>
            </div>
            @endif

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
                        