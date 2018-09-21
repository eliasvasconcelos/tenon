@extends('layouts.app')

@section('content')
    <main class="conteudo">
    <div class="info_cfg">
        @if(auth()->user()->tipo_id == "2" || auth()->user()->tipo_id == "3")
            <h1 style="font-size: 2em">Meus Anuncios</h1>
            <ul class="menu_u" style="margin-top:-25px;">
                <li class="text-right">
                    <a title="Configurações" class="botao cor_black" href="{{url('user')}}/{{auth()->user()->id}}/configuracao"><i class="fa fa-cog  fa-lg"></i> &nbsp; Configurações </a>
                </li>
            </ul>
        @endif
    </div>

        <section id="leiloes">
            <div class="perfil_user_cat left cor_black" style="width: 20%;padding:10px">
                <h3>Total de Anuncios</h3>
                <a href="{{url('user')}}/{{auth()->user()->id}}/configuracao">
                    <p  style="margin:20px">
                        <h5 style="color: #000;background-color: #96caff;padding: 9px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;">
                    <span style="background-color: #f5f5f5;padding: 10px;margin:0px 5px;">
                        <b>
                            <i class="fa fa-cog" style="font-size:18px;color: #000"></i>
                        </b>
                    </span>Configurações</h5>
                    </p>
                </a>
                <a href="{{url('user')}}/{{auth()->user()->id}}/perfil">
                <p style="margin:20px">
                    <h5 style="color: #000;background-color: #96caff;padding: 9px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;">
                    <span style="background-color: #f5f5f5;padding: 10px;margin:0px 5px;"><b>
                            <i class="fa fa-user" style="font-size:18px;color: #000"></i>
                        </b></span>Perfil</h5>
                </p>
                </a>
                <a href="{{url('user')}}/{{auth()->user()->id}}/endereco">
                <p style="margin:20px">
                    <h5 style="color: #000;background-color: #96caff;padding: 9px 0px 10px 0px ;margin:3px 0px 3px 0px;border-radius:3px;">
                    <span style="background-color: #f5f5f5;padding: 10px;margin:0px 5px;"><b>
                            <i class="fa fa-user" style="font-size:18px;color: #000"></i>
                        </b></span>Endereço</h5>
                </p>
                </a>
            </div>
          {{--  {{\Request::getRequestUri()}} <br>
            {{\Request::fullUrl()}} <br>--}}
            <div class="perfil_user_anuncio right cor_black" style="width: 80%;padding:10px">
            @if(Request::path() == 'user/2/configuracao')
                <div id="config">aaaaaaa</div>
            @elseif(Request::path() == 'user/2/endereco')
                <div class="sub_anuncio"><i class="fa fa-clock-o" style="font-size:18px"></i> Endereço </div>
                <aside id="endereco" class="anuncios">
                    <form id="form-endereco">
                        {!! csrf_field() !!}
                        <div class="descricao_anuncio">
                            <input type="text" class="form-control" placeholder="rua" name="rua" value="{{$endereco->rua}}">
                            <input type="text" class="form-control" placeholder="cep" name="cep" value="{{$endereco->cep}}">
                            <a class="btn btn-success" onclick="save2('endereco', '{{url('user')}}/{{$endereco->id}}');">
                                <i class="fa fa-save"></i> Salvar
                            </a>
                        </div>
                    </form>

                </aside>
            @elseif(Request::path() == 'user/2/perfil')
                <div class="sub_anuncio"><i class="fa fa-clock-o" style="font-size:18px"></i> Anúncios Pendentes</div>
                <aside id="perfil" class="anuncios">
                    <form id="form-user">
                        {!! csrf_field() !!}
                        <div class="user_anuncio fade">
                            <img type="button" id="img_click" style="border:2px dashed #ccc;padding:2px; cursor:pointer;" src="@if($data->avatar == null) {{asset ('img/sem-foto.png')}} @else {{$data->avatar}} @endif">
                        </div>
                        <div class="descricao_anuncio" style="margin-left:170px">
                            <br/>
                            <input type="file" id="imagem_base64" name="avatar" class="file" style="display: none">
                            <input type="hidden" id="avatar" required="required" name="avatar" value="">
                            <input type="text" class="form-control" placeholder="name" name="name" value="{{$data->name}}">
                            <input type="text" class="form-control" placeholder="email" name="email" value="{{$data->email}}">
                            <a class="btn btn-success" onclick="save('user', '{{url('user')}}/{{$data->id}}');">
                                <i class="fa fa-save"></i> Salvar
                            </a>
                        </div>
                    </form>

                </aside>
            @endif


            </div>
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
                        document.getElementById("avatar").value = e.target.result;
                    });

                    FR.readAsDataURL(this.files[0]);
                } else {
                    document.getElementById("img_click").src = "{{asset('img/sem_imagem.png')}}";
                    document.getElementById("avatar").value = "";
                    $("#erro_imagem").css("display", "block");
                }
            }
        });
    </script>
@endsection