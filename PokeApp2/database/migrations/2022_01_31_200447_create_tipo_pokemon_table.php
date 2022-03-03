<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoPokemonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipoPokemon', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nombre', 60)->unique();
            //$table->bigInteger('pokemon_id')->unsigned()->nullable();
            
            //$table->foreign('pokemon_id')->references('id')->on('pokemon');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoPokemon');
    }
}
