@extends('layouts.limpo')
@section('content')
    <div class="bg_login"></div>
        <section id="destaque" style="position: absolute;
top: 0; bottom: 1;
left: 0; right: 0;width:50%;color:#000;">
            <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                <div class="text-center">
                <h1 class="cadastro_login">Cadastre-se</h1>
                    <a href="login" class="text-muted">Já tem conta? Entre aqui</a>
                </div>
                {{ csrf_field() }}
                <section id="login">
                    <label for="name" class="form-texto">Nome</label>
                    <input type="hidden" name="profile">
                    <input type="text" name="name" pattern="[a-zA-Z\s]+$" class="form-control" placeholder="ex: João">
                    <br />
                    @if ($errors->has('name'))
                        <span style="float:left;color: #FFFFFF;background-color: #f86c6b;padding:10px; width:100%; border-color: #c7254e 1px solid">
                                <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
    {{--
                    <label for="name" class="form-texto">Sobre Nome</label>
                    <input type="text" name="sobrenome" pattern="[a-zA-Z\s]+$" class="form-control" placeholder="ex: Ferreira">
                    <br />
                    @if ($errors->has('name'))
                        <span style="float:left;color: #FFFFFF;background-color: #f86c6b;padding:10px; width:100%; border-color: #c7254e 1px solid">
                                <strong>{{ $errors->first('sobrenome') }}</strong>
                        </span>
                    @endif--}}
                    <label for="name" class="form-texto">E-mail</label>

                    <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" placeholder="meunome@email.com">
                    @if ($errors->has('email'))
                        <span style="float:left;color: #FFFFFF;background-color: #f86c6b;padding:10px; width:100%; border-color: #c7254e 1px solid">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label form-texto">Senha</label>

                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span style="float:left;color: #FFFFFF;background-color: #f86c6b;padding:10px; width:100%; border-color: #c7254e 1px solid">
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


                        {{--<div class="form-group{{ $errors->has('tipo_id') ? ' has-error' : '' }}">
                            <label for="tipo_user" class="col-md-4 control-label form-texto">Tipo de Conta</label>

                            <select id="tipo_id" name="tipo_id"  value="{{ old('tipo_id') }}" class="form-control" onchange="exibir_ocultar(this)">
                                <option id="select" selected>Selecione</option>
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
                                <span style="float:left;color: #FFFFFF;background-color: #f86c6b;padding:10px; width:100%; border-color: #c7254e 1px solid">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                            @endif
                        </div>

                        <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}" id="cnpj">
                            <label for="cnpj" class="col-md-4 control-label form-texto">Cnpj</label>

                            <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}">

                            @if ($errors->has('cnpj'))
                                <span style="float:left;color: #FFFFFF;background-color: #f86c6b;padding:10px; width:100%; border-color: #c7254e 1px solid">
                            <strong>{{ $errors->first('cnpj') }}</strong>
                        </span>
                            @endif
                        </div>--}}

                        <div class="form-group{{ $errors->has('telefone') ? ' has-error' : '' }}" id="razao">
                            <label for="razao" class="col-md-4 control-label form-texto">Telefone</label>

                            <input id="razao" type="text" class="form-control" name="telefone" value="{{ old('telefone') }}">

                            @if ($errors->has('telefone'))
                                <span style="float:left;color: #FFFFFF;background-color: #f86c6b;padding:10px; width:100%; border-color: #c7254e 1px solid">
                                    <strong>{{ $errors->first('telefone') }}</strong>
                                </span>
                            @endif
                        </div>
                <button type="submit" class="btn btn-secondary px-4">
                    Criar Conta
                </button>
            </section>
            </form>
        </section>
@endsection
