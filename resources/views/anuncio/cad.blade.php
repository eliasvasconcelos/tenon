@extends('layouts.app')

@section('content')
    @if(Auth::user())
        @forelse(\App\Models\Endereco::where('id', auth()->user()->id)->where('rua', null)->get() as $z)
            @if($z->rua == null)
           <div class="center info_cfg">
                <div class="cor_black notify">
                    Desculpe, <b>{{Auth::user()->name}}</b> atualize suas informações para poder postar anúncio, é rápido :(
                    <p>
                        <a href="#" class="cor_black">
                            <b> Clique Aqui  </b>
                        </a>
                    </p>
                </div>
           </div>
            @endif
        @empty
            <div class="center info_cfg">
                    <div class="cor_black notify2">
                        <b>{{Auth::user()->name}}</b> lembre-se, de sempre manter seus dados atualizados, para melhor contato!!
                    </div>
                <h1 style="font-size: 2em">Novo Anúncio</h1>
                <ul class="menu_u" style="margin-top:-25px;">
                    <li class="text-right">
                        <a title="Assinatura" class="botao cor_black" href="?pg=assinatura"><i class="fa fa-star fa-lg"></i> &nbsp; Assinatura </a>|

                        <a title="Depoimento" class="botao cor_black" href="?pg=feedback"><i class="fa fa-list-alt  fa-lg"></i> &nbsp; Feedback </a>|

                        <a title="Leilão" class="botao cor_black" href="?pg=leilao"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a>|

                        <a title="Configurações" class="botao cor_black" href="?pg=configuracoes"><i class="fa fa-cog  fa-lg"></i> &nbsp; Configurações </a>

                    </li>
                </ul>
            </div>
            <main class="conteudo">
                <section id="default2">
                    <h3 class="text-center">Qual Categoria?
                    </h3>
                    <ul id="sub1">
                        @foreach(\App\Models\Categoria::where('categoria_id', 0)->get() as $z)
                            <li style="display: inline-table; margin-left: 10px; padding: 20px; background: #ccc; color: #000; border-radius: 6px; cursor: pointer;"
                                {{--
                                                        id="{{$z->id}}" onclick="captura({{$z->id}}, 2)">{{$z->nome}}</li>
                                --}}                        id="{{$z->id}}" onclick="captura({{$z->id}},2)">{{$z->nome}}</li>

                        @endforeach
                    </ul>
                    @for($i=2; $i<=100; $i++)
                        <ul id="sub{{$i}}">

                        </ul>
                    @endfor
                    <form id="form-anuncio" class="form" style="display: none;"><br/>
                        {!! csrf_field() !!}
                        <input type="hidden" id="categoria_id" name="categoria_id" value="">
                        <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}">
                        <input type="file" id="imagem_base64" name="base64" class="file" style="display: none">
                        <input type="hidden" id="base64" name="base64" value="">

                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Titulo</div>
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Descricao</div>
                                    <textarea rows="5" class="form-control" id="descricao" name="descricao" placeholder="Ex: alguma coisa.."></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Localização</div>

                                    <select  class="form-control" name="uf_id" id="uf_id">
                                        @forelse(\App\Models\Uf::all() as $z)
                                            @if($z->id == auth()->user()->id)
                                                <option value="{{$z->id}}"
                                                        selected>{{$z->uf}}</option>
                                            @else
                                                <option value="{{$z->id}}">{{$z->uf}}</option>
                                            @endif
                                        @empty
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            {{--<div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Preço</div>
                                    <input type="text" class="form-control" id="preco" name="preco" placeholder="0">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Por:</div>
                                    <select class="form-control">
                                        <option value="audi">Selecione</option>
                                        <option value="volvo">Animal</option>
                                        <option value="saab">Dese(s)</option>
                                        <option value="mercedes">Cobertura(s)</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <input type="checkbox"> Negociar Valor
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Informações Genealógicas</div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Pai:</div>
                                    <input type="text" class="form-control" id="pai" name="pai" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Mãe:</div>
                                    <input type="text" class="form-control" id="mae" name="mae" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Avô paterno:</div>
                                    <input type="text" class="form-control" id="avo_paterno" name="avo_paterno" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Avó paterna:</div>
                                    <input type="text" class="form-control" id="avo_paterna" name="avo_paterna" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Avô materno:</div>
                                    <input type="text" class="form-control" id="avo_materno" name="avo_materno" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Avó materno:</div>
                                    <input type="text" class="form-control" id="avo_materna" name="avo_materna" placeholder="">
                                </div>
                            </div>--}}

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">Imagem de destaque:</div>
                                </div>
                            </div>

                            <img type="button" id="img_click" style="border:2px dashed #ccc;padding:2px; cursor:pointer;" height="135" src="{{asset ('img/sem_imagem.png')}}">

                        </div>
                        <a class="btn btn-success" onclick="save('anuncio', '{{url('anuncio')}}');"><i
                                    class="fa fa-save"></i>
                            Salvar
                        </a>
                    </form>

                    <script>
                        function captura(id, ul) {
                            var metodo = 'GET';
                            var link = '{{url('api/categoria/search')}}/' + id;
                            ajax2(link, metodo, ul, id);
                            return false;
                        }

                        function save(form, link) {
                            var dataForm = $('#form-' + form).serialize();
                            var metodo = 'POST';
                            ajax(link, metodo, dataForm);
                        }

                        function ajax(link, metodo, dataForm) {
                            jQuery.ajax({
                                url: link,
                                data: dataForm,
                                cache: false,
                                method: metodo,
                            }).done(function (data) {
                                if ($("#titulo").val() == "") {
                                    $("#erro").css("display", "block");
                                    return false;
                                }else{
                                    $("#erro").css("display", "block");
                                }
                                if ($("#descricao").val() == "") {
                                    alert("Descrição Obrigatória");
                                    return false;
                                }
                                $("#sucesso").css("display", "block");
                                refresh();
                            }).fail(function () {

                            });
                        }

                        function ajax2(link, metodo, ul, id) {
                            jQuery.ajax({
                                url: link,
                                cache: false,
                                method: metodo,
                            }).done(function (data) {
                                for (var j = ul; j <= 100; j++) {
                                    jQuery("#sub" + j).html("");
                                    jQuery("#sub" + (j - 1) + " li").css("background", "#ccc");
                                    jQuery("#sub" + (j - 1) + " li").css("color", "#000");
                                }
                                jQuery("#form-anuncio").fadeOut();
                                jQuery("#form-anuncio #name").val("");
                                jQuery("#form-anuncio #categoria_id").val("");
                                if (data == "") {
                                    jQuery("#" + id).css("background", "#07A68E");
                                    jQuery("#" + id).css("color", "#FFF");
                                    jQuery("#form-anuncio").fadeIn();
                                    jQuery("#form-anuncio #name").val(jQuery("#" + id).html());
                                    jQuery("#form-anuncio #categoria_id").val(id);
                                } else {
                                    jQuery("#" + id).css("background", "#07A68E");
                                    jQuery("#" + id).css("color", "#FFF");
                                    jQuery.each(data, function (i, val) {
                                        if (i == 0) {
                                            jQuery("#sub" + ul).html('<li style="display: inline-table; margin 10px;  padding: 20px;background: #ccc; color: #000; border-radius: 6px; cursor: pointer;" id="' + val.id + '" onclick="captura(' + val.id + ', ' + (ul + 1) + ')">' + val.nome + '</li>');
                                        } else {
                                            jQuery("#sub" + ul).append('<li style="display: inline-table; margin: 10px; padding: 20px; background: #ccc; color: #000; border-radius: 6px; cursor: pointer;" id="' + val.id + '" onclick="captura(' + val.id + ', ' + (ul + 1) + ')">' + val.nome + '</li>');
                                        }
                                    });
                                }
                            }).fail(function () {
                            });
                        }
                    </script>

                    <script>
                        //JS que carrega o UPLOAD
                        $(document).on('click', '.browse', function () {
                            var file = $(this).parent().parent().parent().find('.file');
                            file.trigger('click');
                        });
                        /*
                                        $(document).on('change', '.file', function () {
                                            $(this).parent().find('#texto_arquivo_base64_on').val($(this).val().replace(/C:\\fakepath\\/i, ''));
                                        });*/

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
                                        document.getElementById("base64").value = e.target.result;
                                    });

                                    FR.readAsDataURL(this.files[0]);
                                } else {
                                    document.getElementById("img_click").src = "{{asset('img/sem_imagem.png')}}";
                                    document.getElementById("base64").value = "";
                                    $("#erro_imagem").css("display", "block");
                                }
                            }
                        });


                        function refresh() {
                            window.location.reload();
                        }
                    </script>
                </section>
            </main>
        @endforelse
    @endif

@endsection
