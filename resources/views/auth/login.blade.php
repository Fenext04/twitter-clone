@extends("layouts.app")
@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-4">
                <div id="area_login">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <img class="mb-4" src="img/logo.png" alt="" width="72" height="57">
                        <h1 class="h3 mb-3 fw-normal">Login</h1>

                        <div class="form-floating">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" id="floatingInput" placeholder="name@example.com">
                             @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="email">Endereço de E-mail</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password">
                             @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                            <label for="Password">Senha</label>
                        </div>

                        
                        <button class="w-100 btn btn-lg btn-primary" id="botao_logar"type="submit">Entrar</button>
                        <div id="area_link_cadastro">
                            <a href="{{route("visitante.cadastro")}}" class="btn btn-info btn-sm text-white">Cadastrar-se </a>
                        </div>
                        <p class="mt-5 mb-3 text-muted">&copy; 2021 - Banco de Dados 1</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection