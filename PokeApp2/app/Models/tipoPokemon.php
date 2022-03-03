<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipoPokemon extends Model
{
    use HasFactory;
    
    protected $table='tipoPokemon';
    
    protected $fillable=['nombre'];
    
    // public function pokemon(){
    //     return $this->belongsTo('App\Models\pokeUnico', 'pokemon_id');
    // }

}
