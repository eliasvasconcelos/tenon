@extends('layouts.app')

@section('content')

    <div class="center info_cfg">
        @auth
            @if(auth()->user()->id == $data->tipo_id)
                @if($data->tipo_id == "2" || $data->tipo_id == "3")
                    <h1 style="font-size: 2em">Meus Anuncios</h1>
                @endif
            @endif

            <h1 style="font-size: 2em">Meu Perfil</h1>
            <ul class="menu_u" style="margin-top:-25px;">
                <li class="text-right">
                    <a title="Assinatura" class="botao cor_black" href="?pg=assinatura"><i class="fa fa-star fa-lg"></i> &nbsp; Assinatura </a>|

                    <a title="Depoimento" class="botao cor_black" href="?pg=feedback"><i class="fa fa-list-alt  fa-lg"></i> &nbsp; Feedback </a>|

                    <a title="Leilão" class="botao cor_black" href="?pg=leilao"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a>|

                    <a title="Configurações" class="botao cor_black" href="{{url('user')}}/{{$data->name}}/edit"><i class="fa fa-cog  fa-lg"></i> &nbsp; Configurações </a>

                </li>
            </ul>

        @endauth
    </div>

    <main class="conteudo">

        <section id="leiloes">
                <div class="user_anuncio">
                    <img src="@if($data->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$data->foto_perfil}} @endif">
                </div>
                <div class="descricao_anuncio" style="margin-left:170px">
                    <form id="form-user">
                        {!! csrf_field() !!}
                        <br/>
                        <input type="text" class="form-control" name="name" value="{{$data->name}}">
                        <input type="text" class="form-control" name="sobrenome" value="{{$data->sobrenome}}">
                        <input type="text" class="form-control" name="email" value="{{$data->email}}">
                        <input type="text" class="form-control" name="password" value="">
                        <input type="text" class="form-control" name="cpf" value="{{$data->cpf}}">
                        <input type="text" class="form-control" name="cnpj" value="{{$data->cnpj}}">
                        <input type="text" class="form-control" name="telefone" value="{{$data->telefone}}">
                        <input type="text" class="form-control" name="status" value="{{$data->status}}">
                        <input type="text" class="form-control" name="loja_link" value="{{$data->loja_link}}">
                        <input type="text" class="form-control" name="razao" value="{{$data->razao}}">
                        <a class="btn btn-success" onclick="save('user', '{{url('user')}}');">
                            <i class="fa fa-save"></i> Salvar
                        </a>
                    </form>
                </div>
        </section>
    </main>
    <script>
        var link = "{{url('user')}}/{{$data->id}}";

        function save(form, link) {
            var dataForm = $('#form-' + form).serialize();
            var metodo = 'PUT';
            ajax(link, metodo, dataForm);
        }

        function ajax(link, metodo, dataForm) {
            jQuery.ajax({
                url: link,
                data: dataForm,
                cache: false,
                method: metodo,
            }).done(function (data) {

            }).fail(function () {

            });
        }
    </script>
@endsection