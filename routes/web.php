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

Route::get('/', ["App\Http\Controllers\Auth\LoginController","showLoginForm"])->name("visitante.index");

Auth::routes();

Route::resource("tweet","App\Http\Controllers\TweetController")->middleware("verificar.login");

Route::get("/usuarios",["App\Http\Controllers\UsuarioController","index"])->name("usuarios.index");

Route::get('/cadastrar', function () {
    return view('auth.register');
})->name("visitante.cadastro");
