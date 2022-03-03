<?php

namespace App\Http\Controllers;

use App\Models\tipoPokemon;
use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class TipoPokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tipos']= tipoPokemon::all();
        return view('tipo.create');
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
        $data['tipo']= tipoPokemon::all();

        return view('tipo.create', $data);
    }
    function extraerRol(){
        
        
        $user=Auth()->user()->rol;
        
        return $user;
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
        
        ];
        
        $message=[
            
            'nombre.required'   => "Por favor introduce el nombre del tipo Pokemon",
            'nombre.string'     => "El nombre debe de ser de tipo string",
            'nombre.min'        => "El nombre debe tener al menos 2 caracteres",
            'nombre.max'        => "El nombre debe tener como maximo 150",
        
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if($validator->messages()->messages()){
           
            return back()
                ->withInput()
                ->withErrors($validator->messages());
        }
        
        $data['pokemons'] = Pokemon::all();
        $data['tipo']= tipoPokemon::all();
        $tipo = new tipoPokemon($request->all());
  
        try{
            $result=$tipo->save();
            $data['message']='El nuevo tipo pokemon ha sido creado correctamente. ¿Desea Introducir Otro?';
        }catch(\Exception $e){
            $result = false;
            $data['message']='El tipo pokemon no ha podido ser creado';
        }
        
        return view('tipo.create', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tipoPokemon  $tipoPokemon
     * @return \Illuminate\Http\Response
     */
    public function show(tipoPokemon $tipoPokemon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tipoPokemon  $tipoPokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(tipoPokemon $tipoPokemon, $id)
    {
        if($this->extraerRol()=='user'){
            return view('404');
        }
        $data['tipo']= tipoPokemon::find($id);
       
       return view('tipo.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tipoPokemon  $tipoPokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $rules=[
        
            "nombre"    => "required|string|min:2|max:150",
        
        ];
        
        $message=[
            
            'nombre.required'   => "Por favor introduce el nombre del tipo Pokemon",
            'nombre.string'     => "El nombre debe de ser de tipo string",
            'nombre.min'        => "El nombre debe tener al menos 2 caracteres",
            'nombre.max'        => "El nombre debe tener como maximo 150",
        
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if($validator->messages()->messages()){
           
            return back()
                ->withInput()
                ->withErrors($validator->messages());
        }
        
        
        $tipo= tipoPokemon::find($id);
        
        
        $data['nombre']= $request->input('nombre');

            
            
        try{
            $tipo->update($data);
            $data['message']='El tipo pokemon ha sido editado correctamente.';
        }catch(\Exception $e){
            $data['message']= 'El tipo pokemon no ha podido ser editado';
            return redirect()->back()->with($data);
        }
        
        return redirect('user-zone')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tipoPokemon  $tipoPokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(tipoPokemon $tipoPokemon, $id)
    {
        $tipo= tipoPokemon::find($id);
         
         DB::update('update pokemon set tipo_id = null where tipo_id = :id', ['id' => $id]);
        $tipo->delete();
        
        return redirect('user-zone');
    }
}
