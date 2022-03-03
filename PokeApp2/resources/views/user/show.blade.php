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
                                @php
                                    $cont=0;
                                        foreach($pokeunicos as $pokeunico){
                                            if($pokeunico->user->id == $user->id){
                                                $cont++;
                                            }
                                        }
                                @endphp 
                                Pokemons Capturados: {{ $cont; }}
                                    
                                
                            </div>
                        </div>
                    </div>

                    
                </div>
            </div>
        </div>
    </div>
</div>
                        