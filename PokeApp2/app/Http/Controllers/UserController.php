<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pokeUnico;
use App\Models\Ability;
use App\Models\Gender;
use App\Models\Pokemon;
use App\Models\tipoPokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     

    public function index(Request $request)
    {
        $data['users']= User::paginate(3);
        $data['habilidades']= Ability::all();
        $data['generos']= Gender::all();
        $data['pokemons']= Pokemon::all();
        $data['tipos']= tipoPokemon::all();
        $data['pokeunicos'] = pokeUnico::all();       
        
        
        
        if($this->extraerRol()=='user'){
            return view('user-zone', $data);
        }
        
        return view('admin-zone', $data);
        

    }
    
    public function indexSorting(){
        $users = User::sortable()->paginate(2);
        $data['habilidades']= Ability::all();
        $data['generos']= Gender::all();
        $data['pokemons']= Pokemon::all();
        $data['tipos']= tipoPokemon::all();
        $data['pokeunicos'] = pokeUnico::all(); 
        
        if($this->extraerRol()=='user'){
            return view('user-zone', $data);
        }
        return view('admin-zone', $data)->with('users', $users);
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['user']= User::find($id);
        $data['pokeunicos'] = pokeUnico::all();
        
        
        if(auth()->user()->rol != 'admin'){
            if(auth()->user()->id != $id){
                return view('404');
            }
        }
        
        
        return view('user.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $data['user']= User::find($id);
        if(auth()->user()->rol != 'admin'){
            if(auth()->user()->id != $id){
                return view('404');
            }
        }
        
        return view('user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $rules=[
        
            "name"                  => "required|string|min:2|max:150",
            "email"                 => "required|email:rfc",
            "rol"                   => "required|exists:users,rol|string",
            "password"              => "nullable|string|min:8",
            "password_confirmation" => "nullable|same:password",
        
        ];
        
        $message=[
            'name.required'             =>'No se puede actualizar el usuario a vacio',
            'nombre.string'             =>'El nombre debe de estar compuesto por una string',
            'nombre.min'                =>'El nombre es demasiado corto',
            'nombre.max'                =>'El nombre es demasiado largo',
            
            'email.required'            =>'No se puede actualizar el email a vacio',
            'email.email'               =>'Por favor introduce un email valido',
            
            'rol.required'              =>'No se puede actualizar el rol a vacio',
            'rol.exists'                =>'El rol que ha introducido no existe',
            'rol.string'                =>'El rol debe de ser un string',
            
            'password.string'           =>'La contraseña debe de ser un string',
            'password.min'              =>'La contraseña debe tener al menos 8 caracteres',
            
            'password_confirmation.same' =>'Esta contraseña no es igual a la anterior'
        ];
        
        $validator = Validator::make($request->all(), $rules, $message);
        
        if($validator->messages()->messages()){
           
            return back()
                ->withInput()
                ->withErrors($validator->messages());
        }
        
        
        $user= User::find($id);
        if($request->input('password') == '' ){
            
        }else{
            $data['password'] =  Hash::make($request->input('password'));
            $user->update($data);
        }
        
        $data['rol'] =  $request->input('rol');
        $data['name']= $request->input('name');
        $data['email']= $request->input('email');
        
        
        
        try{
            
            $mensaje['message']='El usuario'. $user->name . 'ha sido editado correctamente';
            $user->update($data);
        
        }catch(\Exception $e){
            $mensaje['message']='El usuario no ha podido ser editado';
            $mensaje['type']= 'danger';
            
            return redirect('user-zone/' . $user->id. '/edit')->with($mensaje);
            
        }
        return redirect('user-zone')->with($data, $mensaje);
        
        
    }
    function block(Request $request, $id){
        if($this->extraerRol()=='user'){
            return view('404');
        }
        $userid = $id;
        DB::update('update users set blocked_at = NOW() where id = :id', ['id' => $userid]);

        return redirect('user-zone');
    }
    
    function unblock(Request $request, $id){
        if($this->extraerRol()=='user'){
            return view('404');
        }
        $userid = $id;
        DB::update('update users set blocked_at = null where id = :id', ['id' => $userid]);

        return redirect('user-zone');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user= User::find($id);
        $userid= $id;
        if(auth()->user()->rol != 'admin'){
            
                return view('404');
            
        }
        DB::update('update users set deleted_at = NOW() where id = :id',['id' => $userid]);
        
        return redirect('user-zone');
    }
}
