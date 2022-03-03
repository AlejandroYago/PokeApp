<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gender extends Model
{
    use HasFactory;
    
    protected $table='gender';
    
    protected $fillable=['nombre'];
    
    // public function pokeunico(){
    //     return $this->belongsTo('App\Models\pokeUnico', 'pokeunico_id');
    // }


}
