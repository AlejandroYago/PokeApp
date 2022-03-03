<aside class="menu-sidebar d-none d-lg-block">
<div class="logo">
    <a href="{{ url('user-zone')}}">
        @if(auth()->user()->rol=='admin')
        <h2>Admin Zone</h2>
        @else
        <h2>User Zone</h2>
        @endif
    </a>
</div>
<div class="menu-sidebar__content js-scrollbar1">
    <nav class="navbar-sidebar">
        <ul class="list-unstyled navbar__list">
            <li>
                <a href="{{ url('poke-index') }}">
                    
                    <i class="fas fa-chart-bar"></i>Pokemon index</a>
            </li>
            @if(auth()->user()->rol=='admin')
            <li>
                
                <a href="create">
                    <i class="fas fa-table"></i>Crear tipo pokemon</a>
            </li>
            <li>
                <a href="{{ url('poke-index/create')}}">
                    <i class="far fa-check-square"></i>Crear Pokemon</a>
            </li>
            <li>
                <a href="{{ url('createG/create') }}">
                    <i class="fas fa-calendar-alt"></i>Crear Genero Pokemon</a>
            </li>
            <li>
                <a href="{{ url('createA/create') }}">
                    <i class="fas fa-map-marker-alt"></i>Crear habilidad Pokemon</a>
            </li>
            @endif
            <li>
                <a href="{{ url('pokedex') }}">
                    <i class="fas fa-map-marker-alt"></i>Mis Pokemons</a>
            </li>
        </ul>
    </nav>
</div>
</aside>