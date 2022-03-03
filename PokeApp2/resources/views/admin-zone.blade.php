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

<!-- MAIN CONTENT-->
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="overview-wrap">
                        <h2 class="title-1">overview</h2>
                        <button class="au-btn au-btn-icon au-btn--blue">
                            <i class="zmdi zmdi-plus"></i>add item</button>
                    </div>
                </div>
            </div>
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-account-o"></i>
                                </div>
                                <div class="text">
                                    <h2>10368</h2>
                                    <span>members online</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-shopping-cart"></i>
                                </div>
                                <div class="text">
                                    <h2>388,688</h2>
                                    <span>items solid</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-calendar-note"></i>
                                </div>
                                <div class="text">
                                    <h2>1,086</h2>
                                    <span>this week</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="overview-item overview-item--c4">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon">
                                    <i class="zmdi zmdi-money"></i>
                                </div>
                                <div class="text">
                                    <h2>$1,060,386</h2>
                                    <span>total earnings</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart4"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="au-card recent-report">
                        <div class="au-card-inner">
                            <h3 class="title-2">recent reports</h3>
                            <div class="chart-info">
                                <div class="chart-info__left">
                                    <div class="chart-note">
                                        <span class="dot dot--blue"></span>
                                        <span>products</span>
                                    </div>
                                    <div class="chart-note mr-0">
                                        <span class="dot dot--green"></span>
                                        <span>services</span>
                                    </div>
                                </div>
                                <div class="chart-info__right">
                                    <div class="chart-statis">
                                        <span class="index incre">
                                            <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                        <span class="label">products</span>
                                    </div>
                                    <div class="chart-statis mr-0">
                                        <span class="index decre">
                                            <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                        <span class="label">services</span>
                                    </div>
                                </div>
                            </div>
                            <div class="recent-report__chart">
                                <canvas id="recent-rep-chart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="au-card chart-percent-card">
                        <div class="au-card-inner">
                            <h3 class="title-2 tm-b-5">char by %</h3>
                            <div class="row no-gutters">
                                <div class="col-xl-6">
                                    <div class="chart-note-wrap">
                                        <div class="chart-note mr-0 d-block">
                                            <span class="dot dot--blue"></span>
                                            <span>products</span>
                                        </div>
                                        <div class="chart-note mr-0 d-block">
                                            <span class="dot dot--red"></span>
                                            <span>services</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="percent-chart">
                                        <canvas id="percent-chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <h2 class="title-1 m-b-25">Todos los usuarios</h2>
                    <div class="table-responsive table--no-card m-b-40">
                        <table class="table table-borderless table-striped table-earning">
                            <thead>
                                <tr>
                                    <th>@sortablelink('fecha_inicio', 'Fecha Inicio')</th>
                                    <th>@sortablelink('id', 'ID')</th>
                                    <th>@sortablelink('name', 'Nombre')</th>
                                    <th>@sortablelink('email', 'Email')</th>
                                    <th class="text-right">Pokemons Capturados</th>
                                    <th class="text-right">Mostrar</th>
                                    <th class="text-right">Editar</th>
                                    <th class="text-right">Banear</th>
                                    <th class="text-right">Desbanear</th>
                                    <th class="text-right">Borrar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                
                                @if($user->blocked_at != null)
                                <tr style="background-color: #FA6E6E !important">
                                @else
                                <tr>
                                @endif
                                    <td>{{ $user->fecha_inicio}}</td>
                                    <td>{{ $user->id}}</td>
                                    <td>{{ $user->name}}</td>
                                    <td class="text-right">{{ $user->email}}</td>
                                    @php
                                        $cont=0;
                                            foreach($pokeunicos as $pokeunico){
                                                if($pokeunico->user->id == $user->id){
                                                    $cont++;
                                                }
                                            }
                                    @endphp 
                                    <td class="text-right"> {{$cont;}} </td>
                                    <td class="text-right">
                                        <a href="{{ url('user-zone/' . $user->id) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-person" viewBox="0 0 16 16">
                                              <path d="M12 1a1 1 0 0 1 1 1v10.755S12 11 8 11s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h8zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                                              <path d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ url('user-zone/' . $user->id . '/edit') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                            </svg>
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <form action="{{url('user-zone/block/' . $user->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-slash-circle-fill" viewBox="0 0 16 16">
                                                  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.646-2.646a.5.5 0 0 0-.708-.708l-6 6a.5.5 0 0 0 .708.708l6-6z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    
                                    <td class="text-right">
                                        <form action="{{url('user-zone/unblock/' . $user->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-slash-circle" viewBox="0 0 16 16">
                                                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                  <path d="M11.354 4.646a.5.5 0 0 0-.708 0l-6 6a.5.5 0 0 0 .708.708l6-6a.5.5 0 0 0 0-.708z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    
                                    <td class="text-right">
                                        <form action="{{url('user-zone/' . $user->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                  <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                    
                                </tr>
                                
                                @endforeach
                                {!! $users->appends(Request::except('page'))->render() !!}
                            </tbody>
                        </table>
                    </div>
                </div>
                
                
                <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Pokedex</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Pokemon</th>
                                                <th>Tipo</th>
                                                <th>Apodo</th>
                                                <th class="text-right">Peso</th>
                                                <th class="text-right">Altura</th>
                                                <th class="text-right">Habilidad</th>
                                                <th class="text-right">Genero</th>
                                                <th class="text-right">Editar</th>
                                                <th class="text-right">Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            @foreach($pokeunicos as $pokeunico)
                                            
                                            @if($pokeunico->user->id == auth()->user()->id)
                                            <tr>
                                                <td>{{$pokeunico->pokemon->nombre}}</td>
                                                @if($pokeunico->pokemon->tipo != null)
                                                <td class="text-right">{{ $pokeunico->pokemon->tipo->nombre}}</td>
                                                @else
                                                <td class="text-right"> Sin valor </td>
                                                @endif
                                                <td>{{$pokeunico->apodo}}</td>
                                                <td class="text-right">{{ $pokeunico->peso }}</td>
                                                <td class="text-right">{{ $pokeunico->altura }}</td>
                                                @if($pokeunico->ability != null)
                                                <td class="text-right">{{ $pokeunico->ability->nombre }}</td>
                                                @else
                                                <td class="text-right"> Sin valor </td>
                                                @endif
                                                @if($pokeunico->gender != null)
                                                <td class="text-right">{{ $pokeunico->gender->nombre }}</td>
                                                @else
                                                <td class="text-right"> Sin valor </td>
                                                @endif
                                                <td class="text-right">
                                                    <a href="{{ url('pokedex/' . $pokeunico->id . '/edit') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <form action="{{url('pokedex/' . $pokeunico->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <button type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            
                                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Habilidades</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th class="text-right">Editar</th>
                                                <th class="text-right">Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            @foreach($habilidades as $habilidad)
                                            
                                            
                                            <tr>
                                                <td>{{$habilidad->nombre}}</td>
                                                <td class="text-right">
                                                    <a href="{{ url('createA/' . $habilidad->id . '/edit') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <form action="{{url('createA/' . $habilidad->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <button type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Generos</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th class="text-right">Editar</th>
                                                <th class="text-right">Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            @foreach($generos as $genero)
                                            
                                            
                                            <tr>
                                                <td>{{$genero->nombre}}</td>
                                                <td class="text-right">
                                                    <a href="{{ url('createG/' . $genero->id . '/edit') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <form action="{{url('createG/' . $genero->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <button type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                            
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Pokemon</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Tipo</th>
                                                <th>Img</th>
                                                <th class="text-right">Editar</th>
                                                <th class="text-right">Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            @foreach($pokemons as $pokemon)
                                            
                                            
                                            <tr>
                                                <td>{{$pokemon->nombre}}</td>
                                                @if($pokemon->tipo != null)
                                                <td class="text-right">{{ $pokemon->tipo->nombre}}</td>
                                                @else
                                                <td class="text-right"> Sin valor </td>
                                                @endif
                                                <td style="padding:0; width:20%"><img src="{{ url('storage/img/' . $pokemon->img) }}" style="width:50px; height:50px; background-size:cover;"></td>
                                                <td class="text-right">
                                                    <a href="{{ url('poke-index/' . $pokemon->id . '/edit') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <form action="{{url('poke-index/' . $pokemon->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <button type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            
                            <div class="col-lg-9">
                                <h2 class="title-1 m-b-25">Tipos Pokemon</h2>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th class="text-right">Editar</th>
                                                <th class="text-right">Borrar</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            
                                            
                                            @foreach($tipos as $tipo)
                                            
                                            
                                            <tr>
                                                <td>{{$tipo->nombre}}</td>
                                                <td class="text-right">
                                                    <a href="{{ url('create/' . $tipo->id . '/edit') }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                        </svg>
                                                    </a>
                                                </td>
                                                <td class="text-right">
                                                    <form action="{{url('create/' . $tipo->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        
                                                        <button type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                                              <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        
                                            @endforeach
                                            
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                <div class="col-lg-3">
                    <h2 class="title-1 m-b-25">Top countries</h2>
                    <div class="au-card au-card--bg-blue au-card-top-countries m-b-40">
                        <div class="au-card-inner">
                            <div class="table-responsive">
                                <table class="table table-top-countries">
                                    <tbody>
                                        <tr>
                                            <td>United States</td>
                                            <td class="text-right">$119,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>Australia</td>
                                            <td class="text-right">$70,261.65</td>
                                        </tr>
                                        <tr>
                                            <td>United Kingdom</td>
                                            <td class="text-right">$46,399.22</td>
                                        </tr>
                                        <tr>
                                            <td>Turkey</td>
                                            <td class="text-right">$35,364.90</td>
                                        </tr>
                                        <tr>
                                            <td>Germany</td>
                                            <td class="text-right">$20,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>France</td>
                                            <td class="text-right">$10,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>Australia</td>
                                            <td class="text-right">$5,366.96</td>
                                        </tr>
                                        <tr>
                                            <td>Italy</td>
                                            <td class="text-right">$1639.32</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                        <div class="au-card-title" style="background-image:url('assets/img/bg-title-01.jpg');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="zmdi zmdi-account-calendar"></i>26 April, 2018</h3>
                            <button class="au-btn-plus">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </div>
                        <div class="au-task js-list-load">
                            <div class="au-task__title">
                                <p>Tasks for John Doe</p>
                            </div>
                            <div class="au-task-list js-scrollbar3">
                                <div class="au-task__item au-task__item--danger">
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="#">Meeting about plan for Admin Template 2018</a>
                                        </h5>
                                        <span class="time">10:00 AM</span>
                                    </div>
                                </div>
                                <div class="au-task__item au-task__item--warning">
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="#">Create new task for Dashboard</a>
                                        </h5>
                                        <span class="time">11:00 AM</span>
                                    </div>
                                </div>
                                <div class="au-task__item au-task__item--primary">
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="#">Meeting about plan for Admin Template 2018</a>
                                        </h5>
                                        <span class="time">02:00 PM</span>
                                    </div>
                                </div>
                                <div class="au-task__item au-task__item--success">
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="#">Create new task for Dashboard</a>
                                        </h5>
                                        <span class="time">03:30 PM</span>
                                    </div>
                                </div>
                                <div class="au-task__item au-task__item--danger js-load-item">
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="#">Meeting about plan for Admin Template 2018</a>
                                        </h5>
                                        <span class="time">10:00 AM</span>
                                    </div>
                                </div>
                                <div class="au-task__item au-task__item--warning js-load-item">
                                    <div class="au-task__item-inner">
                                        <h5 class="task">
                                            <a href="#">Create new task for Dashboard</a>
                                        </h5>
                                        <span class="time">11:00 AM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="au-task__footer">
                                <button class="au-btn au-btn-load js-load-btn">load more</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                        <div class="au-card-title" style="background-image:url('assets/img/bg-title-02.jpg');">
                            <div class="bg-overlay bg-overlay--blue"></div>
                            <h3>
                                <i class="zmdi zmdi-comment-text"></i>New Messages</h3>
                            <button class="au-btn-plus">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </div>
                        <div class="au-inbox-wrap js-inbox-wrap">
                            <div class="au-message js-list-load">
                                <div class="au-message__noti">
                                    <p>You Have
                                        <span>2</span>

                                        new messages
                                    </p>
                                </div>
                                <div class="au-message-list">
                                    <div class="au-message__item unread">
                                        <div class="au-message__item-inner">
                                            <div class="au-message__item-text">
                                                <div class="avatar-wrap">
                                                    <div class="avatar">
                                                        <img src="assets/img/icon/avatar-02.jpg" alt="John Smith">
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h5 class="name">John Smith</h5>
                                                    <p>Have sent a photo</p>
                                                </div>
                                            </div>
                                            <div class="au-message__item-time">
                                                <span>12 Min ago</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="au-message__item unread">
                                        <div class="au-message__item-inner">
                                            <div class="au-message__item-text">
                                                <div class="avatar-wrap online">
                                                    <div class="avatar">
                                                        <img src="assets/img/icon/avatar-03.jpg" alt="Nicholas Martinez">
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h5 class="name">Nicholas Martinez</h5>
                                                    <p>You are now connected on message</p>
                                                </div>
                                            </div>
                                            <div class="au-message__item-time">
                                                <span>11:00 PM</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="au-message__item">
                                        <div class="au-message__item-inner">
                                            <div class="au-message__item-text">
                                                <div class="avatar-wrap online">
                                                    <div class="avatar">
                                                        <img src="assets/img/icon/avatar-04.jpg" alt="Michelle Sims">
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h5 class="name">Michelle Sims</h5>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <div class="au-message__item-time">
                                                <span>Yesterday</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="au-message__item">
                                        <div class="au-message__item-inner">
                                            <div class="au-message__item-text">
                                                <div class="avatar-wrap">
                                                    <div class="avatar">
                                                        <img src="assets/img/icon/avatar-05.jpg" alt="Michelle Sims">
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h5 class="name">Michelle Sims</h5>
                                                    <p>Purus feugiat finibus</p>
                                                </div>
                                            </div>
                                            <div class="au-message__item-time">
                                                <span>Sunday</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="au-message__item js-load-item">
                                        <div class="au-message__item-inner">
                                            <div class="au-message__item-text">
                                                <div class="avatar-wrap online">
                                                    <div class="avatar">
                                                        <img src="assets/img/icon/avatar-04.jpg" alt="Michelle Sims">
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h5 class="name">Michelle Sims</h5>
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                </div>
                                            </div>
                                            <div class="au-message__item-time">
                                                <span>Yesterday</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="au-message__item js-load-item">
                                        <div class="au-message__item-inner">
                                            <div class="au-message__item-text">
                                                <div class="avatar-wrap">
                                                    <div class="avatar">
                                                        <img src="assets/img/icon/avatar-05.jpg" alt="Michelle Sims">
                                                    </div>
                                                </div>
                                                <div class="text">
                                                    <h5 class="name">Michelle Sims</h5>
                                                    <p>Purus feugiat finibus</p>
                                                </div>
                                            </div>
                                            <div class="au-message__item-time">
                                                <span>Sunday</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-message__footer">
                                    <button class="au-btn au-btn-load js-load-btn">load more</button>
                                </div>
                            </div>
                            <div class="au-chat">
                                <div class="au-chat__title">
                                    <div class="au-chat-info">
                                        <div class="avatar-wrap online">
                                            <div class="avatar avatar--small">
                                                <img src="assets/img/icon/avatar-02.jpg" alt="John Smith">
                                            </div>
                                        </div>
                                        <span class="nick">
                                            <a href="#">John Smith</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="au-chat__content">
                                    <div class="recei-mess-wrap">
                                        <span class="mess-time">12 Min ago</span>
                                        <div class="recei-mess__inner">
                                            <div class="avatar avatar--tiny">
                                                <img src="assets/img/icon/avatar-02.jpg" alt="John Smith">
                                            </div>
                                            <div class="recei-mess-list">
                                                <div class="recei-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                                <div class="recei-mess">Donec tempor, sapien ac viverra</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="send-mess-wrap">
                                        <span class="mess-time">30 Sec ago</span>
                                        <div class="send-mess__inner">
                                            <div class="send-mess-list">
                                                <div class="send-mess">Lorem ipsum dolor sit amet, consectetur adipiscing elit non iaculis</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="au-chat-textfield">
                                    <form class="au-form-icon">
                                        <input class="au-input au-input--full au-input--h65" type="text" placeholder="Type a message">
                                        <button class="au-input-icon">
                                            <i class="zmdi zmdi-camera"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="copyright">
                        <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>

@endsection