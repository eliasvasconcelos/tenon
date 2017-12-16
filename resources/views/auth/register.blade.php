@extends('layouts.app')

@section('content')
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-4 control-label">Name</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('tipo_id') ? ' has-error' : '' }}">
                <label for="tipo_user" class="col-md-4 control-label">Tipo de Conta</label>

                <div class="col-md-6">
                    <select id="tipo_id" name="tipo_id"  value="{{ old('tipo_id') }}" class="form-control">
                        <option value="3">Pessoa Jurídica</option>
                        <option value="2" selected>Pessoa Física</option>
                    </select>
                    @if ($errors->has('tipo_id'))
                        <span class="help-block">
                            <strong>{{ $errors->first('tipo_id') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group{{ $errors->has('cpf') ? ' has-error' : '' }}">
                <label for="cpf" class="col-md-4 control-label">Cpf</label>

                <div class="col-md-6">
                    <input id="cpf" type="text" class="form-control" name="cpf" value="{{ old('cpf') }}">

                    @if ($errors->has('cpf'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cpf') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('cnpj') ? ' has-error' : '' }}">
                <label for="cnpj" class="col-md-4 control-label">Cnpj</label>

                <div class="col-md-6">
                    <input id="cnpj" type="text" class="form-control" name="cnpj" value="{{ old('cnpj') }}">

                    @if ($errors->has('cnpj'))
                        <span class="help-block">
                            <strong>{{ $errors->first('cnpj') }}</strong>
                        </span>
                    @endif
                </div>
            </div>


            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-4 control-label">Password</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                        Register
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
