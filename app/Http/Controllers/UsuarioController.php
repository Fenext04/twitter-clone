<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::where('id', '<>',Auth::user()->id)->get();
       return view("app.mostrar-usuarios",compact("usuarios"));
    }
}
