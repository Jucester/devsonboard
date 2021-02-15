<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Rutas protegidas

Route::group(['middleware' => ['auth', 'verified']], function(){

    // Dashboard de vacantes
    // Ruta para la vista de guardar y almacenar en la DB
    Route::get('/vacantes', 'App\Http\Controllers\VacanteController@index')->name('vacantes.index');
    Route::get('/vacantes/create', 'App\Http\Controllers\VacanteController@create')->name('vacantes.create');
    Route::post('/vacantes', 'App\Http\Controllers\VacanteController@store')->name('vacantes.store');

    // Subir imagen
    Route::post('/vacantes/imagen', 'App\Http\Controllers\VacanteController@imagen')->name('vacantes.imagen');
    // Borrar imagen
    Route::post('/vacantes/borrarImagen', 'App\Http\Controllers\VacanteController@borrarImagen')->name('vacantes.borrar');
});


// Muestra los trabajos para cualquier usuario o visitante
Route::get('/vacantes/{vacante}', 'App\Http\Controllers\VacanteController@show')->name('vacantes.show');


