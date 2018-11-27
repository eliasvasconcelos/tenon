@extends('layouts.limpo')
@section('content')
    <div class="bg_login"></div>
    <section id="destaque" style="position: absolute;
top: 0; bottom: 1;
left: 0; right: 0;width:50%;color:#000;">
                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <section id="login">
                        <h1 class="text-center">Minha Conta</h1>

                        <p class="text-muted text-center">Faça login em sua conta</p><br />

                        <label for="name" class="form-texto">Email :</label>
                        <input type="text" name="email" class="form-control" placeholder="Digite seu email">

                        <label for="name" class="form-texto">Senha :</label>
                        <input type="password" name="password" id="password" placeholder="Digite sua senha" class="form-control">
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

                        <button type="submit" id="bota" class="btn btn-secondary px-4 right">Entrar</button>
                        <a href="{{ route('password.request') }}">Esqueceu sua senha?</a><br />
                        <br />
                        <p class="text-center"><a href="{{ route('register') }}">Criar conta</a></p>

                    </section>

                </form>
        </section>

@endsection
