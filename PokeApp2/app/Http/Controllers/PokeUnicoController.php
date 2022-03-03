<?php

namespace App\Http\Controllers;

use App\Models\pokeUnico;
use App\Models\tipoPokemon;
use App\Models\Gender;
use App\Models\Ability;
use App\Models\Pokemon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class PokeUnicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     
     
    public function index(Request $request)
    {
        $data['pokeunicos']= pokeUnico::all();
        $data['tipos']= tipoPokemon::all();
        $data['generos']= Gender::all();
        $data['habilidades'] = Ability::all();
        $data['pokemons']= Pokemon::all();
        
       

        return view('pokeunico.pokedex' , $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['pokeunicos']= pokeUnico::all();
        $data['tipos']= tipoPokemon::all();
        $data['generos']= Gender::all();
        $data['habilidades'] = Ability::all();
        $data['pokemons']= Pokemon::all();

        return view('pokemon.index' , $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $rules=[
        
            "apodo"                 => "required|string|min:2|max:150",
            "peso"                  => "required|gte:1|lte:999|integer",
            "altura"                => "required|gte:0.1|lte:999.99|numeric",
            "genero_id"             => "required|exists:gender,id|integer",
            "habilidad_id"          => "required|exists:ability,id|integer",
            "pokemon_id"            => "required|exists:pokemon,id|integer",
            
            
        
        ];
        
        $message=[
            'apodo.required'        => "Por favor introduce un apodo",
            'apodo.string'          => "El apodo debe de ser un string",
            'apodo.min'             => "El apodo tiene que tener como minimo 2 caracteres",
            'apodo.max'             => "El apodo debe tener como maximo 150 caracteres",
            
            'peso.required'         => "Por favor introduce el peso de tu pokemon",
            'peso.gte'              => "El peso del pokemon debe ser mayor o igual que 1",
            'peso.lte'              => "El peso del pokemon debe ser inferior o igual que 999",
            'peso.integer'          => "El peso del pokemon tiene que ser un numero",
            
            'altura.required'       => "Por favor introduce la altura de tu pokemon",
            'altura.gte'            => "La altura de tu pokemon debe ser mayor o igual que 0.1",
            'altura.lte'            => "La altura de tu pokemon debe ser menor o igual que 999.99",
            
            'genero_id.required'    => "Por favor introduce un genero de pokemon",
            'genero_id.exists'      => "El genero que ha introducido no existe",
            'genero.integer'        => "El genero aunque se muestra como un texto debe ser un integer",
            
            'habilidad_id.required' => "Por favor introduce una habilidad pokemon",
            'habilidad_id.exists'   => "La habilidad introducida no existe",
            'habilidad_id.integer'  => "La habilidad aunque se muestra como un texto debe ser un integer",
            
            'pokemon_id.required'   => "Por favor introduce el pokemon que quieres capturar",
            'pokemon_id.exists'     => "El pokemon introducido no existe",
            'pokemon_id.integer'    => "El pokemon aunque se muestra como texto debe ser un integer",
           
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if($validator->messages()->messages()){
           
            return back()
                ->withInput()
                ->withErrors($validator->messages());
        }
        
        $data['pokeunicos']= pokeUnico::all();
        $data['tipos']= tipoPokemon::all();
        $data['generos']= Gender::all();
        $data['habilidades'] = Ability::all();
        
        $data['pokemons']= Pokemon::all();
        
        $pokeUnico = new pokeUnico($request->all());
        
        
        
        //dd($pokeUnico);
        try{
            $mensaje['message']='El pokemon'. $pokeUnico->nombre . 'ha sido capturado correctamente';
            $pokeUnico->user_id= auth()->user()->id;
            $result=$pokeUnico->save();
        }catch(\Exception $e){
            $mensaje['message']='El pokemon no ha podido ser capturado';
            $mensaje['type']= 'danger';
            $result = false;
        }
        
        return redirect('pokedex')->with($data, $mensaje);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pokeUnico  $pokeUnico
     * @return \Illuminate\Http\Response
     */
    public function show(pokeUnico $pokeUnico)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pokeUnico  $pokeUnico
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data['pokeunico']= pokeUnico::find($id);
        $data['tipos']= tipoPokemon::all();
        $data['generos']= Gender::all();
        $data['habilidades'] = Ability::all();
        $data['pokemons']= Pokemon::all();
        // $data['pokeunico']=$pokeUnico;
       

        return view('pokeunico.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pokeUnico  $pokeUnico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $rules=[
        
            "apodo"                 => "required|string|min:2|max:150",
            "peso"                  => "required|gte:1|lte:999|integer",
            "altura"                => "required|gte:0.1|lte:999.99|numeric",
            "genero_id"             => "exists:gender,id|integer",
            "habilidad_id"          => "exists:ability,id|integer",
            
            
            
        
        ];
        
        $message=[
            'apodo.required'        => "Por favor introduce un apodo",
            'apodo.string'          => "El apodo debe de ser un string",
            'apodo.min'             => "El apodo tiene que tener como minimo 2 caracteres",
            'apodo.max'             => "El apodo debe tener como maximo 150 caracteres",
            
            'peso.required'         => "Por favor introduce el peso de tu pokemon",
            'peso.gte'              => "El peso del pokemon debe ser mayor o igual que 1",
            'peso.lte'              => "El peso del pokemon debe ser inferior o igual que 999",
            'peso.integer'          => "El peso del pokemon tiene que ser un numero",
            
            'altura.required'       => "Por favor introduce la altura de tu pokemon",
            'altura.gte'            => "La altura de tu pokemon debe ser mayor o igual que 0.1",
            'altura.lte'            => "La altura de tu pokemon debe ser menor o igual que 999.99",
            
            'genero_id.required'    => "Por favor introduce un genero de pokemon",
            'genero_id.exists'      => "El genero que ha introducido no existe",
            'genero.integer'        => "El genero aunque se muestra como un texto debe ser un integer",
            
            'habilidad_id.exists'   => "La habilidad introducida no existe",
            'habilidad_id.integer'  => "La habilidad aunque se muestra como un texto debe ser un integer",
            
            
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if($validator->messages()->messages()){
           
            return back()
                ->withInput()
                ->withErrors($validator->messages());
        }
        
        $data['pokeunico']= pokeUnico::find($id);
        $pokeUnico= $data['pokeunico'];
        try{
            $mensaje['message']='El pokemon'. $pokeUnico->nombre . 'ha sido editado correctamente';
            $pokeUnico->user_id=auth()->user()->id;
            $result=$pokeUnico->update($request->all());
        }catch(\Exception $e){
            $mensaje['message']='El pokemon no ha sido editado correctamente';
            $mensaje['type']= 'danger';
            $result = false;
        }
        
        return redirect('pokedex')->with($data, $mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\pokeUnico  $pokeUnico
     * @return \Illuminate\Http\Response
     */
    public function destroy(pokeUnico $pokeUnico, $id)
    {
        $pokeUnico= pokeUnico::find($id);
        
        $pokeUnico->delete();
        
        return redirect('user-zone');
    }
}
