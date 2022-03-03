<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pokeUnico extends Model
{
    use HasFactory;
    
    protected $table = 'pokeunico';
    
    protected $fillable = ['apodo', 'peso', 'altura', 'genero_id', 'habilidad_id','pokemon_id','user_id'];
    
    // public function pokedex(){
    //     return $this->belongsToMany('App\Models\Pokedex', 'pokedex_id');
    // }
    
    public function gender(){
        return $this->belongsTo('App\Models\Gender','genero_id');
    }
    
    public function ability(){
        return $this->belongsTo('App\Models\Ability','habilidad_id');
    }
    
    public function pokemon(){
        return $this->belongsTo('App\Models\Pokemon','pokemon_id');
    }
    
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
