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

                    <a title="Configurações" class="botao cor_black" href="{{url('user')}}/{{$data->id}}/edit"><i class="fa fa-cog  fa-lg"></i> &nbsp; Configurações </a>

                </li>
            </ul>

        @endauth
    </div>

    <main class="conteudo">
        <section id="leiloes">
            <form id="form-user">
                {!! csrf_field() !!}
                <div class="user_anuncio fade">
                        <img type="button" id="img_click" required="required" style="border:2px dashed #ccc;padding:2px; cursor:pointer;" src="@if($data->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$data->foto_perfil}} @endif">
                </div>
                <div class="descricao_anuncio" style="margin-left:170px">
                        <br/>
                        <input type="file" id="imagem_base64" name="foto_perfil" class="file" style="display: none">
                        <input type="hidden" id="foto_perfil" required="required" name="foto_perfil" value="">
                        <input type="text" class="form-control" placeholder="name" name="name" value="{{$data->name}}">
                        <input type="text" class="form-control" placeholder="sobrenome" name="sobrenome" value="{{$data->sobrenome}}">
                        <input type="text" class="form-control" placeholder="email" name="email" value="{{$data->email}}">
                        <input type="text" class="form-control" placeholder="cpf" name="cpf" value="{{$data->cpf}}">
                        <input type="text" class="form-control" placeholder="cnpj" name="cnpj" value="{{$data->cnpj}}">
                        <input type="text" class="form-control" placeholder="telefone" name="telefone" value="{{$data->telefone}}">
                        <input type="text" class="form-control" placeholder="status" name="status" value="{{$data->status}}">
                        <input type="text" class="form-control" placeholder="loja_link" name="loja_link" value="{{$data->loja_link}}">
                        <input type="text" class="form-control" placeholder="razao" name="razao" value="{{$data->razao}}">
                        <a class="btn btn-success" onclick="save('user', '{{url('user')}}/{{$data->id}}');">
                            <i class="fa fa-save"></i> Salvar
                        </a>
                </div>
            </form>
        </section>
    </main>
    <script>

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
                window.location.reload();
            }).fail(function () {

            });
        }
        $(document).on('click', '#img_click', function () {
            $('#imagem_base64').click();
        });
        $(document).on('change', '#imagem_base64', function () {
            /*
                                console.log($('#imagem_base64').val());
                                console.log("ENTROU?");
            */

            console.log(this.files);
            if (this.files && this.files[0]) {

                if (this.files[0].type == "image/png" || this.files[0].type == "image/jpeg" || this.files[0].type == "image/gif") {
                    $("#erro_imagem").css("display", "none");
                    var FR = new FileReader();

                    FR.addEventListener("load", function (e) {
                        document.getElementById("img_click").src = e.target.result;
                        document.getElementById("foto_perfil").value = e.target.result;
                    });

                    FR.readAsDataURL(this.files[0]);
                } else {
                    document.getElementById("img_click").src = "{{asset('img/sem_imagem.png')}}";
                    document.getElementById("foto_perfil").value = "";
                    $("#erro_imagem").css("display", "block");
                }
            }
        });
    </script>
@endsection