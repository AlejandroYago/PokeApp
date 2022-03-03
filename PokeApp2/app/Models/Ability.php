<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use HasFactory;
    
    protected $table='ability';
    
    protected $fillable=['nombre'];
    
    // public function pokeunico(){
    //     return $this->belongsTo('App\Models\pokeUnico', 'pokeunico_id');
    // }
}
