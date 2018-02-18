@extends('layouts.app')

@section('content')
    <main class="conteudo">
        <section id="default2">
            <section id="login">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="login">
                        <h1 class="text-center">Minha Conta</h1>

                        <p class="text-muted text-center">Faça login em sua conta</p><br />

                        <label for="name">Email</label>
                        <input type="text" name="email" id="email" class="form-control" required value="Digite seu email">

                        <label for="name">Senha</label>
                        <input type="password" name="password" id="password" class="form-control">
                        @if ($errors->has('email'))
                            <div class="error">
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                        @if ($errors->has('password'))
                            <div class="error">
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
    {{--
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
    --}}

                        <button type="submit" class="btn btn-secondary px-4 right">Entrar</button>
                        <a href="{{ route('password.request') }}">Esqueceu sua senha?</a><br />
                        <br />
                        <p class="text-center"><a href="{{ route('register') }}">Criar conta</a></p>


                    </div>
                </form>
            </section>
        </section>
    </main>

@endsection
