@extends('layouts.app')

@section('content')
    <main class="conteudo">
        <section id="default2">
            <section id="login">
                <h1 class="text-center">Relembrar Senha</h1>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <div class="login">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Endereço de E-Mail</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" placeholder="ex: email@meusite.com" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-secondary">
                                        Enviar Link de Redefinição
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
            </section>
        </section>
    </main>
@endsection
