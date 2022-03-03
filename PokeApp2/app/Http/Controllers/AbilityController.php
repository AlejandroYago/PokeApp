<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class AbilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['habilidades']= Ability::all();
        
        return view('ability.createA', $data);
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
        
        $data['habilidades']= Ability::all();
        
        return view('ability.createA', $data);
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
        
        $data['habilidades'] = Ability::all();
        
        $ability= new Ability($request->all());
        
        try{
            $result=$ability->save();
            $data['message']= 'La habilidad ha sido creada correctamente. ¿Desea Crear Otra?';
        }catch(\Exception $e){
            $data['message']= 'La habilidad no ha podido ser creada';
            $result = false;
        }
        
        return redirect('createA')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function show(Ability $ability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function edit(Ability $ability, $id)
    {
        
        if($this->extraerRol()=='user'){
            return view('404');
        }
       $data['habilidad']= Ability::find($id);
       
       return view('ability.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ability  $ability
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
        
        
        $habilidad= Ability::find($id);
        
        
        $data['nombre']= $request->input('nombre');
        
            
            
        try{
            $habilidad->update($data);
            $data['message']= 'La habilidad ha sido editada correctamente';
        }catch(\Exception $e){
            $data['message']= 'La habilidad no ha podido ser editada';
            return redirect()->back()->with($data);
        }
        
        return redirect('user-zone')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ability  $ability
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ability $ability, $id)
    {
         $habilidad= Ability::find($id);
    
         
         DB::update('update pokeunico set habilidad_id = null where habilidad_id = :id', ['id' => $id]);
         $habilidad->delete();
         
         return redirect('user-zone');
    }
}
