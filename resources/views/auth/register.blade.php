@extends('layouts.app')

@section('content')
    <main class="conteudo">
        <section id="default2">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}

                <h1 class="text-center">Cadastre-se</h1>
                <p class="text-muted text-center">Simples e rápido ;)</p>
            <section id="login_left">
                <label for="name" class="form-texto">Nome</label>
                <input type="text" name="name" pattern="[a-zA-Z\s]+$" class="form-control" placeholder="ex: João Ferreira">
                <br />
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
                <label for="name" class="form-texto">E-mail</label>
                <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="meunome@email.com">
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label form-texto">Senha</label>

                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>

                <label for="password-confirm" class="col-md-4 control-label form-texto">Confirmar Senha</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                {{-- <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                     <label for="name" class="col-md-4 control-label">Name</label>

                     <div class="col-md-6">
                         <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                     </div>
                 </div>

                 <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                     <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                     <div class="col-md-6">
                         <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                     </div>
                 </div>--}}

            </section>

            <section id="login_right">

                        <div class="form-group{{ $errors->has('tipo_id') ? ' has-error' : '' }}">
                            <label for="tipo_user" class="col-md-4 control-label form-texto">Tipo de Conta</label>

                            <select id="tipo_id" name="tipo_id"  value="{{ old('tipo_id') }}" class="form-control" onchange="exibir_ocultar(this)">
                                <option value="" id="select" selected>Selecione</option>
                                <option value="2">Pessoa Física</option>
                                <option value="3">Pessoa Jurídica</option>
                            </select>
                            @if ($errors->has('tipo_id'))
                                <span class="help-block">
                            <strong>{{ $errors->first('tipo_id') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="text-center" id="alert_pf" style="margin-bottom:10px;padding:20px;background-color: #63d3f8;border:1px solid #18aecb">
                            Pessoa física pode fazer até 5 anúncios :)
                        </div>
                        <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}" id="cpf">
                            <label for="cpf" class="col-md-4 control-label form-texto">Cpf</label>

                            <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}">

                            @if ($errors->has('cpf'))
                                <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}" id="cnpj">
                            <label for="cnpj" class="col-md-4 control-label form-texto">Cnpj</label>

                            <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}">

                            @if ($errors->has('cnpj'))
                                <span class="help-block">
                            <strong>{{ $errors->first('cnpj') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('razao') ? ' has-error' : '' }}" id="razao">
                            <label for="razao" class="col-md-4 control-label form-texto">Razão Social</label>

                            <input id="razao" type="text" class="form-control" name="razao" value="{{ old('razao') }}">

                            @if ($errors->has('razao'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('razao') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('loja') ? ' has-error' : '' }}" id="loja">
                            <label for="loja" class="col-md-4 control-label form-texto">Minha Loja</label>

                            <input id="loja" type="text" class="form-control" name="loja_link" value="{{ old('loja') }}">

                            @if ($errors->has('loja'))
                                <span class="help-block">
                            <strong>{{ $errors->first('loja') }}</strong>
                        </span>
                            @endif
                        </div>

                <input id="loja" type="text" class="form-control" hidden name="rand_link" value="{{ old('loja') }}">

                <button type="submit" class="btn btn-secondary px-4">
                    Criar Conta
                </button>
            </section>
            </form>
        </section>
    </main>
@endsection
