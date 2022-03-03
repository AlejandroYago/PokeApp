<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePokeUnicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pokeunico', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('apodo', 60);
            $table->integer('peso');
            $table->float('altura');
            $table->string('img')->nullable();
            
            //$table->bigInteger('pokedex_id')->unsigned();
            $table->bigInteger('habilidad_id')->unsigned()->nullable();
            $table->bigInteger('genero_id')->unsigned()->nullable();
            $table->bigInteger('pokemon_id')->unsigned()->nullable();
            $table->bigInteger('user_id')->unsigned();
            
            //$table->foreign('pokedex_id')->references('id')->on('pokedex');
            $table->foreign('habilidad_id')->references('id')->on('ability');
            $table->foreign('genero_id')->references('id')->on('gender');
            $table->foreign('pokemon_id')->references('id')->on('pokemon')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');
            
            
            

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pokeunico');
    }
}
