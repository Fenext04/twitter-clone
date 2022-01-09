<?php

namespace App\Http\Controllers;
use App\Models\Tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quantidade_tweets = Tweet::where("id_usuario",Auth::user()->id)->count();
        $tweets = Tweet::orderByDesc("created_at")->get();
        return view("app.index",compact("tweets","quantidade_tweets"));
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
        $regras = [
            "tweet" => "required|min:5|max:280"
        ];

        $feedback = [
            "required" => "Preencha um texto pata tweetar.",
            "min" => "O texto deve conter no mínimo 5 letras.",
            "max" => "O texto deve conter no máximo 280 letras."
        ];

        $request->validate($regras,$feedback);
        $tweet = new Tweet();

        $tweet->id_usuario = Auth::user()->id;
        $tweet->tweet = $request->tweet;
        $tweet->save();
        return redirect()->route("tweet.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        return redirect()->route("tweet.index");

    }
}
