<?php

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

Route::post("/logar",["App\Http\Controllers\Auth\LoginController","login"])->name("login");
Auth::routes();

Route::get('/',function(){
    return view("auth.login");
});

Route::get('/login', function () {
    return view('auth.login');
})->name("visitante.login");

Route::get('/cadastrar', function () {
    return view('auth.register');
})->name("visitante.cadastro");


Route::middleware("verificar.login")->prefix("/twitter-clone")->group(function () {
    Route::resource("tweet","App\Http\Controllers\TweetController");
    Route::post("/usuario-seguidor/{id_usuario}", ["App\Http\Controllers\UsuarioSeguidorController","deixarSeguir"])->name("usuario-seguidor.deixar-seguir");
    Route::resource("usuario-seguidor", "App\Http\Controllers\UsuarioSeguidorController");
    
    
});





