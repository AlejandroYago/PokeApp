<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\tipoPokemon;
use App\Models\Gender;
use App\Models\Ability;
use App\Models\User;
use App\Models\pokeUnico;
use Illuminate\Support\Facades\Validator;
use DB;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data['pokemons']= Pokemon::all();
        $data['tipos']= tipoPokemon::all();
        
        $data['generos']= Gender::all();
        $data['habilidades']= Ability::all();


        
        
        return view('pokemon.index', $data);
    }
    
    function extraerRol(){
        
        
        $user=Auth()->user()->rol;
        
        return $user;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if($this->extraerRol()=='user'){
            return view('404');
        }
        
        
        
        $data['tipos']= tipoPokemon::all();
        $data['pokemons']= Pokemon::all();
        $data['img']= 'nombreArchivo';
        
        return view('pokemon.create', $data);
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
        
            "nombre"    => "required|string|min:2|max:150",
            "tipo_id"   => "integer|exists:tipoPokemon,id",     
            "img"       => 'required|image|mimes:jpg,png,jpeg,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',
            
        
        ];
        
        $message=[
            'nombre.required'   => "Por favor introduce el nombre del pokemon",
            'nombre.string'     => "El nombre debe ser una string",
            'nombre.min'        => "El nombre debe tener al menos 2 caracteres",
            'nombre.max'        => "El nombre debe tener como maximo 150 caracteres",
            
            'tipo_id'           => "El tipo aunque se muestre como texto, debe ser un integer",
            'tipo_id.exists'    => "El tipo seleccionado no existe",
            
            'img.required'      => "Por favor introduce una imagen para este pokemon",
            'img.image'         => "La imagen debe ser una imagen",
            'img.mimes'         => "La imagen debe tener uno de los siguientes formatos: jpg, png, jpeg, svg",
            'img.max'           => "La imagen debe pesar 2048 kb como maximo",
            'img.dimensions'    => "La imagen es demasiado grande o demasiado pequeña",
            
           
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if($validator->messages()->messages()){
           
            return back()
                ->withInput()
                ->withErrors($validator->messages());
        }
        
        
        
        $data['tipos']= tipoPokemon::all();
        $data['pokemons']= Pokemon::all();
        
       $input = 'img';
       
       $pokemon = new Pokemon($request->all());
       
       
        //dd($pokemon);
        
        try{
            $result=$pokemon->save();
            
            if($request->hasFile($input)){

                        $archivo = $request->file($input);
                        
                        $nombre = $archivo->getClientOriginalName();
                            
                        
                                $nombrefinal=$this->createId().'.'.$archivo->getClientOriginalExtension();
                                $data['img']=$nombrefinal; 
                                
                               
                                
                                DB::update('update pokemon set img = :nombreArchivo where id = :id', ['nombreArchivo' => $data['img'],'id' => $pokemon->id]);
                               
                                //dd($data);
                                $pokemon->img = $nombrefinal;
                                
                                $archivo->storeAs('public/img', $data['img']);//lo metes en el storage
                                
                                
                                
                      }
        }catch(\Exception $e){
            $result = false;
        }
        

        //dd($pokemon->img);
        //dd($data);
        return redirect('poke-index')->with($data);
    }
    
    public function createId(){
        $x = 0;
        $y = 5;
        $Strings = '0123456789abcdefghijklmnopqrstuvwxyz';
        $random =substr(str_shuffle($Strings), $x, $y);
        $id = uniqid($random,true);
        return $id;
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon, $id)
    {
        if($this->extraerRol()=='user'){
            return view('404');
        }
        
        
        
        $data['tipos']= tipoPokemon::all();
        $data['pokemons']= Pokemon::all();
        $data['pokemon']= Pokemon::find($id);
        $data['img']= 'nombreArchivo';
        
        return view('pokemon.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        
        $rules=[

            "nombre"    => "required|string|min:2|max:150",
            "tipo_id"   => "integer|exists:tipoPokemon,id",
            'img'       => 'image|mimes:jpg,png,jpeg,svg|max:2048|dimensions:min_width=100,min_height=100,max_width=2000,max_height=2000',


        ];

        $message=[
            'nombre.required'   => "Por favor introduce el nombre del pokemon",
            'nombre.string'     => "El nombre debe ser una string",
            'nombre.min'        => "El nombre debe tener al menos 2 caracteres",
            'nombre.max'        => "El nombre debe tener como maximo 150 caracteres",

            'tipo_id'           => "El tipo aunque se muestre como texto, debe ser un integer",
            'tipo_id.exists'    => "El tipo seleccionado no existe",

 
            'img.image'         => "La imagen debe ser una imagen",
            'img.mimes'         => "La imagen debe tener uno de los siguientes formatos: jpg, png, jpeg, svg",
            'img.max'           => "La imagen debe pesar 2048 kb como maximo",
            'img.dimensions'    => "La imagen es demasiado grande o demasiado pequeña",


        ];

        $validator = Validator::make($request->all(), $rules, $message);

        if($validator->messages()->messages()){

            return back()
                ->withInput()
                ->withErrors($validator->messages());
        }
        $pokemon= Pokemon::find($id);
        
        $input="img";
    
    
        try{
            $data['tipo']= $request->input('tipo_id');
            $data['nombre']= $request->input('nombre');
            
            
            if($request->hasFile($input)){  
              
               $img = $request->img;
                       
                        
                        
               if( Storage::exists('/public/img/' . $pokemon->img)){
               
                   Storage::delete('/public/img/' . $pokemon->img);
                
               }
               
             
                  
                    $nombre = $img->getClientOriginalName();
                    $data=[];
                    
                    $data['nombreArchivo']= $this->createId().'.'.$img->getClientOriginalExtension();
                    $data['nombreImagen']= $img->getClientOriginalName();
                    DB::update('update pokemon set img = :nombreArchivo where id = :id', ['nombreArchivo' => $data['nombreArchivo'],'id' => $pokemon->id]);
                    
                   
                $img->storeAs('public/img', $data['nombreArchivo']);
                
                
                
        }
            $data['tipo_id']= $request->input('tipo_id');
            $data['nombre']= $request->input('nombre');
   
            $pokemon->update($data);
        
        }catch(\Exception $e){

            $result = false;
        }
        
        return redirect('poke-index')->with($data);
    }
    
    
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon, $id)
    {
        $pokemon= Pokemon::find($id);
        $tipoid= $pokemon->tipo_id;
        
        DB::update('update pokemon set tipo_id = null where tipo_id = :id', ['id' => $tipoid]);
        
        $pokemon->delete();
        
        return redirect('user-zone');
    }
}
