<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['generos']= Gender::all();
        
        return view('gender.createG', $data);
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
        
        $data['generos']= Gender::all();
        
        return view('gender.createG', $data);
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
        
        
        $data['generos'] = Gender::all();
        
        $gender= new Gender($request->all());
        
        try{
            $result=$gender->save();
            $data['message']= 'El genero se ha creado correctamente.  ¿Desea Introducir Otro';
        }catch(\Exception $e){
            $data['message']= 'El genero no se ha podido crear';
            $result = false;
        }
        
        return redirect('createG')->with($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function show(Gender $gender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function edit(Gender $gender, $id)
    {
        if($this->extraerRol()=='user'){
            return view('404');
        }
        $data['genero']= Gender::find($id);
        
        return view('gender.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gender  $gender
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
        
        
        $genero= Gender::find($id);
        
        
        $data['nombre']= $request->input('nombre');

            
            
        try{
            $genero->update($data);
            $data['message']= 'El genero se ha editado correctamente';
        }catch(\Exception $e){
            $data['message']= 'El genero no se ha podido editar';
            return redirect()->back()->with($data);
        }
        
        return redirect('user-zone')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gender  $gender
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gender $gender, $id)
    {
        $genero= Gender::find($id);
    
         
         DB::update('update pokeunico set genero_id = null where genero_id = :id', ['id' => $id]);
         $genero->delete();
         
         return redirect('user-zone');
    }
}
