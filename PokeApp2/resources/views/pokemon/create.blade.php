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
    

                                <div class="card">
                                    <div class="card-header">
                                        <strong>Crear</strong> Pokemon
                                    </div>
                                    <div class="card-body card-block">
                                        <form action="{{url('poke-index')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
                                            @csrf
                                            @method('POST')
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Nombre Pokemon:</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="text" id="text-input" name="nombre" placeholder="Introduce el nombre del pokemon" class="form-control">
                                                    <small class="form-text text-muted">Introduce el nombre del pokemon</small>
                                                </div>
                                            </div>
                                            
                                            
                                            
                                            
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Tipo</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    
                                                    
                                                    <select name="tipo_id" id="select" class="form-control">
                                                    @foreach($tipos as $tipo)
                                                        <option value="{{ $tipo->id }}">{{ $tipo->nombre }}</option>
                                                    @endforeach
                                                    </select>
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
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                    </div>
                                        </form>
                                    </div>
                                   
                                </div>
                                
                          





@endsection