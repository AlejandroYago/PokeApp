<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PokedexController;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TipoPokemonController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\AbilityController;
use App\Http\Controllers\PokeUnicoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VerificationController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();
Auth::routes(['verify'=>true]);

Route::group(['middleware' => ['auth', 'active_user']], function() {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
    Route::put('user-zone/block/{id}', [App\Http\Controllers\UserController::class, 'block'])->name('user-zone');
    Route::put('user-zone/unblock/{id}', [App\Http\Controllers\UserController::class, 'unblock'])->name('user-zone');
    Route::resource('user-zone', UserController::class);
    Route::resource('poke-index', PokemonController::class);
    Route::resource('create', TipoPokemonController::class);
    Route::resource('createG', GenderController::class);
    Route::resource('createA', AbilityController::class);
    Route::resource('pokedex', PokeUnicoController::class);
    Route::get('/search/', [App\Http\Controllers\SearchController::class, 'search'])->name('search');
    Route::get('user-zone', [App\Http\Controllers\UserController::class, 'indexSorting'])->name('admin-zone');
});


