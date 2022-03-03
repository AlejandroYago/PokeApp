<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\pokeUnico;
use App\Models\Ability;
use App\Models\Gender;
use App\Models\Pokemon;
use App\Models\tipoPokemon;

class SearchController extends Controller
{
    public function search(Request $request){

        $search = $request->input('search');
        $data['pokeunicos']= pokeUnico::all();
        $data['pokemons']= Pokemon::all();
        

        $users = User::query()
            ->where('name', 'LIKE', "%{$search}%")
            ->orWhere('email', 'LIKE', "%{$search}%")
            ->orWhere('rol', 'LIKE', "%{$search}%")
            ->get();
        
        $habilidades = Ability::query()
            ->where('nombre', 'LIKE', "%{$search}%")
            ->get();
            
        $generos = Gender::query()
            ->where('nombre', 'LIKE', "%{$search}%")
            ->get();
            
        $tipos = tipoPokemon::query()
            ->where('nombre', 'LIKE', "%{$search}%")
            ->get();
        
        $pokeunicos = pokeUnico::query()
            ->where('apodo', 'LIKE', "%{$search}%")
            ->orWhere('peso', 'LIKE', "%{$search}%")
            ->orWhere('altura', 'LIKE', "%{$search}%")
            ->get();
            
        $pokemons = Pokemon::query()
            ->where('nombre', 'LIKE', "%{$search}%")
            ->get();
        
        

        return view('search.search', compact('users','pokeunicos','habilidades','generos','tipos','pokemons'));
    }
}
