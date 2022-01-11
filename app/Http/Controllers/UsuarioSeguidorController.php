<?php

namespace App\Http\Controllers;

use App\Models\UsuarioSeguidor;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class UsuarioSeguidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = DB::table("usuarios")
        ->select("usuarios.id","usuarios.name",(DB::raw("(select count(*)
            from usuario_seguidores as us 
            where
            us.id_usuario =usuarios.id  and us.id_usuario_seguindo = ".Auth::user()->id.") AS seguindo_sn " )))
        ->where("usuarios.id","<>",Auth::user()->id)
        ->orderBy("usuarios.name")
        ->get();

        $quantidade_tweets = Tweet::where("id_usuario",Auth::user()->id)->count();
        $quantidadeSeguidores= UsuarioSeguidor::where("id_usuario",Auth::user()->id)->count();
        $quantidadeUsuariosSeguindo= UsuarioSeguidor::where("id_usuario_seguindo",Auth::user()->id)->count();
       
      return view("app.mostrar-usuarios",compact("usuarios","quantidadeSeguidores","quantidade_tweets","quantidadeUsuariosSeguindo"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UsuarioSeguidor::create($request->all());

        return redirect()->route("usuario-seguidor.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UsuarioSeguidor  $usuarioSeguidor
     * @return \Illuminate\Http\Response
     */
    public function show(UsuarioSeguidor $usuarioSeguidor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UsuarioSeguidor  $usuarioSeguidor
     * @return \Illuminate\Http\Response
     */
    public function edit(UsuarioSeguidor $usuarioSeguidor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UsuarioSeguidor  $usuarioSeguidor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UsuarioSeguidor $usuarioSeguidor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UsuarioSeguidor  $usuarioSeguidor
     * @return \Illuminate\Http\Response
     */
    public function destroy(UsuarioSeguidor $usuarioSeguidor)
    {
        $usuarioSeguidor->delete();
        
        
    }

    public function deixarSeguir($id_usuario){
        $usuarioSeguidor = UsuarioSeguidor::where("id_usuario",$id_usuario)
        ->where("id_usuario_seguindo",Auth::user()->id)->first();

       $this->destroy($usuarioSeguidor);
       return redirect()->route("usuario-seguidor.index");
    }

    
}
