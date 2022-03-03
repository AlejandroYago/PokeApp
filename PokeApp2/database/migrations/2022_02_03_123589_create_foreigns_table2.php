<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            $table->bigInteger('tipo_id')->unsigned()->nullable();
            //$table->bigInteger('pokeunico_id')->unsigned()->nullable();
            
            
            $table->foreign('tipo_id')->references('id')->on('tipoPokemon');
            //$table->foreign('pokeunico_id')->references('id')->on('pokeunico');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pokemon', function (Blueprint $table) {
            //
        });
    }
}
