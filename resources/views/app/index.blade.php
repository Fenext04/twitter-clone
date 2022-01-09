@extends("layouts.app")
@section("content")



  <div class="container mt-5">
	<div class="row pt-2">
		
		<div class="col-md-3">

			<div class="perfil">
				<div class="perfilTopo">

				</div>

				<div class="perfilPainel">
					
					<div class="row mt-2 mb-2">
						<div class="col mb-2">
							<span class="perfilPainelNome">
							  {{Auth::user()->name}}
							</span>
						</div>
					</div>

					<div class="row mb-2">

						<div class="col">
							<span class="perfilPainelItem">Tweets</span><br />
							<span class="perfilPainelItemValor">
								{{$quantidade_tweets}}
							</span>
						</div>

						<div class="col">
							<span class="perfilPainelItem">Seguindo</span><br />
							<span class="perfilPainelItemValor">
								
							</span>
						</div>

						<div class="col">
							<span class="perfilPainelItem">Seguidores</span><br />
							<span class="perfilPainelItemValor">
								
							</span>
						</div>

					</div>

				</div>
			</div>

		</div>

		<div class="col-md-6">
			<div class="row mb-2">
				<div class="col tweetBox">
					<form method="post" action="{{route("tweet.store")}}">
            @csrf
						<textarea class="form-control" name="tweet" id="exampleFormControlTextarea1" rows="3"></textarea>
						
						<div class="col mt-2 d-flex justify-content-end">
							<button type="submit" class="btn btn-primary">Tweet</button>
						</div>
            @error('tweet')
              
              <p class="text-danger">
                {{$errors->first("tweet")}}
              </p>
              
              
            @enderror
					</form>
				</div>
			</div>
	
				@foreach ($tweets as $tweet)
          <div class="row tweet">
					<div class="col">
						<p><strong>{{$tweet->usuarios->name}}</strong> <small><span class="text text-muted">{{$tweet->created_at}}</span></small></p>
						<p>{{$tweet->tweet}}</p>
						<br />
						
							@if($tweet->id_usuario == Auth::user()->id)
								<form method="post" action="{{route("tweet.destroy",["tweet" => $tweet->id])}}">
								@csrf
								@method("DELETE")
									<div class="col d-flex justify-content-end">
										<button type="submit" class="btn btn-danger"><small>Remover</small></button>
									</div>
								</form>
							@endif
					</div>
          
				</div>
            
        @endforeach
        
			


		</div>


		<div class="col-md-3">
			<div class="quemSeguir">
				<span class="quemSeguirTitulo">Quem seguir</span><br />
				<hr />
				<a href="{{route("usuarios.index")}}" class="quemSeguirTxt">Procurar por pessoas conhecidas</a>
			</div>
		</div>

	</div>

@endsection