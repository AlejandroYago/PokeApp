<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    
    protected $table='pokemon';
    
    protected $fillable=['nombre','tipo_id','img'];

    
    
    public function tipo(){
        return $this->belongsTo('App\Models\tipoPokemon','tipo_id');
    }
    
    public function pokeunico(){
        return $this->hasMany('App\Models\pokeUnico','pokemon_id');
    }
    
    
    

    
    
    
}