@extends('layouts.limpo')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@section('content')
    @if(Auth::user()->where('id', auth()->user()->id))
        @forelse(\App\Models\Endereco::where('id', auth()->user()->id)->where('rua', null)->get() as $z)
           {{-- @if($z->rua == null)
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
            @endif--}}
        @empty
            {{--<div class="center info_cfg">
                <h1 style="font-size: 2em">Novo Anúncio</h1>
                <ul class="menu_u" style="margin-top:-25px;">
                    <li class="text-right">
                       --}}{{-- <a title="Assinatura" class="botao cor_black" href="?pg=assinatura"><i class="fa fa-star fa-lg"></i> &nbsp; Assinatura </a>|

                        <a title="Depoimento" class="botao cor_black" href="?pg=feedback"><i class="fa fa-list-alt  fa-lg"></i> &nbsp; Feedback </a>|

                        <a title="Leilão" class="botao cor_black" href="?pg=leilao"><i class="fa fa-legal  fa-lg"></i> &nbsp; Leilão </a>|
--}}{{--
                        <a title="Configurações" class="botao cor_black" href="config"><i class="fa fa-cog  fa-lg"></i> &nbsp; Configurações </a>

                    </li>
                </ul>--}}{{--
                <div class="cor_black notify2" style="margin-top:10px;">
                    <b>{{Auth::user()->name}}</b> lembre-se, de sempre manter seus dados atualizados, para melhor contato!!
                </div>--}}{{--
            </div>--}}
            <main class="conteudo" id="anunciar">
                <section id="default2" style="padding:50px 100px;">
                    <h3 class="text-center">Qual Categoria?</h3>
                        <section style="width: 100%;padding:50px 100px;margin-top:40px;background-color: #f7f7f7;border-radius:3px;border:1px solid #f5f5f5">
                    <ul id="sub1" style="margin:auto;text-align: center">
                        @foreach(\App\Models\Categoria::where('categoria_id', 0)->get() as $z)
                            <li style="display: inline-table; margin-left: 10px; padding: 20px; background: #ccc; color: #000; border-radius: 6px; cursor: pointer;"
                                {{--
                                                        id="{{$z->id}}" onclick="captura({{$z->id}}, 2)">{{$z->nome}}</li>
                                --}}                    id="{{$z->id}}" onclick="captura({{$z->id}},2)">{{$z->nome}}</li>

                        @endforeach
                    </ul>
                    @for($i=2; $i<=100; $i++)
                        <ul id="sub{{$i}}" style="text-align: center">

                        </ul>
                    @endfor
                        </section>
                        <form id="form-anuncio" style="display: none;">
                            {!! csrf_field() !!}
                            <input type="hidden" id="categoria_id" name="categoria_id" value="">
                            <input type="hidden" id="user_id" name="user_id" value="{{auth()->user()->id}}">
                            <div id="imagem_base64"></div>
                            <div id="base64"></div>
                            <section style="width: 100%;padding:50px 0px;margin-top:40px;background-color: #f7f7f7;border-radius:3px;border:1px solid #f5f5f5">
                                <section style="width: 100%;padding: 0px 50px 0px">
                                    <h3>Titulo</h3>
                                    <input value="{{$data->titulo or ''}}" type="text" class="form-control" id="titulo" placeholder="Digite aqui.." name="titulo">
                                    <h3>Descrição</h3>
                                    <textarea rows="5" class="form-control" id="descricao" name="descricao" placeholder="Ex: alguma coisa..">{{$data->descricao or ''}}</textarea>
                                </section>
                                <section style="float:left;width: 100%;">
                                    <section style="float:left;width: 50%;padding:50px;margin-top:20px;background-color: #f7f7f7;">
                                        {{--
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Preço</div>
                                                    <input value="{{$data->preco or ''}}" type="text" required="required" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                                                </div>
                                            </div>
                                        --}}
                                        <h3>Preço</h3>
                                        <input name="valor" style="width: 100%;" type="text" id="valor" class="form-control" onblur="pesquisacep(this.value);">

                                    </section>
                                    <section style="float:right;width: 50%;padding:50px;margin-top:20px;background-color: #f7f7f7;">
                                        {{--
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <div class="input-group-addon">Preço</div>
                                                    <input value="{{$data->preco or ''}}" type="text" required="required" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                                                </div>
                                            </div>
                                        --}}
                                        <h3>Por</h3>
                                        <select name="tipo" class="form-control" style="padding: 6px;">
                                            <option value="">Selecione</option>
                                            <option value="Cabeça">Cabeça</option>
                                            <option value="Arroba">Arroba</option>
                                            <option value="Animal">Animal</option>
                                        </select>
                                    </section>
                                </section>

                            </section>
                            {{--<section style="float:left;width: 100%;padding:50px;margin-top:40px;background-color: #f7f7f7;">
                                    <h3 class="text-center">Localização</h3>
                                    <section style="float:left;width: 50%;padding:50px;margin-top:20px;">
                                        <input type="checkbox" name="vehicle1" value="Bike"> Usar meu Endereço<br>
                                        <input type="checkbox" name="vehicle1" value="Bike"> Novo Endereço<br>
                                            --}}{{--
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Preço</div>
                                                        <input value="{{$data->preco or ''}}" type="text" required="required" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                                                    </div>
                                                </div>
                                            --}}{{--
                                            <h3>CEP</h3>
                                            <input name="cep" style="width: 100%" placeholder="00-000-000" type="text" id="cep" class="form-control" onblur="pesquisacep(this.value);">
                                            <h3>Cidade</h3>
                                            <input name="cidade" style="width: 100%" type="text" id="cidade" class="form-control" disabled>
                                            <h3>Número</h3>
                                            <input name="cidade" style="width: 100%" type="text" id="cidade" class="form-control">
                                    </section>
                                    <section style="float:right;width: 50%;padding:50px;margin-top:20px;background-color: #f7f7f7;">
                                            --}}{{--
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">Preço</div>
                                                        <input value="{{$data->preco or ''}}" type="text" required="required" class="form-control" id="titulo" name="titulo" placeholder="Titulo">
                                                    </div>
                                                </div>
                                            --}}{{--
                                            <h3>Rua</h3>
                                            <input name="rua" style="width: 100%" type="text" id="rua" class="form-control" disabled>
                                            <h3>Bairro</h3>
                                            <input name="bairro" style="width: 100%" type="text" id="bairro" class="form-control" disabled>
                                            <h3>Estado</h3>
                                            <input name="uf" style="width: 100%" type="text" id="uf" class="form-control" disabled>
                                </section>
                            </section>--}}
                              {{--  <div style="float: left;width: 100%;">
                                            <h3>Localização</h3>
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
                                </div>--}}
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
                                <section style="float:left;width: 100%;padding:10px 50px 10px 100px;margin-top:40px;background-color: #f7f7f7;border-radius:3px;border:1px solid #f5f5f5">
                                    <h3>Imagem do Anúncio:</h3>
                                    <br>
                                    <div style="width: 100%;">
                                        <a class="btn btn-success" style="width: 170px;" id="add"><i class="fa fa-plus"></i>
                                            Adicionar
                                        </a>
                                    </div>
                                </section>
                                <section id="album" style="display:none;float:left;width: 100%;margin-top:5px;padding:0px 0px 10px 55px;background-color: #f7f7f7;border-radius:3px;border:1px solid #f5f5f5">
                                    <ol> </ol>
                                </section>
                                <section style="float:left;width: 100%;padding:50px 100px;margin-top:40px;background-color: #f7f7f7;border-radius:3px;border:1px solid #f5f5f5">
                                    <a class="btn btn-success" onclick="save('anuncio', '{{url('anuncio')}}');"><i class="fa fa-save"></i>
                                        Salvar
                                    </a>
                                </section>
                            <br>
                            <br>
                            <div class="text-center" id="sucesso" style="float:left;width:100%;display:none;margin-bottom:10px;padding:20px;background-color: #63d3f8;border:1px solid #olaecb">
                                Seu Anúncio foi cadastrado com sucesso!!
                            </div>
                        </form>
                    <script src="{{asset('js/edit.js')}}"></script>
                    <script src="https://www.geradordecep.com.br/assets/js/jquery.maskedinput-1.1.4.pack.js"></script>
                    <script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
                    <script>
                        function captura(id, ul) {
                            var metodo = 'GET';
                            var link = '{{url('api/categoria/search')}}/' + id;
                            ajax2(link, metodo, ul, id);
                            return false;
                        }

                        function save(form, link) {
                            var dataForm = $('#form-' + form).serialize();
                            var id = $("#" + form + "_id").val();
                            var metodo;
                            if (id > 0) {
                                metodo = 'PUT';
                                link = link + '/' + id;
                            } else {
                                metodo = 'POST';
                            }
                            ajax(link, metodo, dataForm);
                        }

                        function ajax(link, metodo, dataForm) {
                            jQuery.ajax({
                                url: link,
                                data: dataForm,
                                cache: false,
                                method: metodo,
                            }).done(function (data) {/*

                                if($("#valor").val() == null) {
                                    swal("Ops..", "Descricao Obrigatória", "alert");
                                }*/

                                swal("Pronto ;)!", "Anuncio criado com sucesso!!", "success");

                                /*if(window.top==window) {
                                    setTimeout(location.href = "{{url("")}}/user/{{Auth()->user()->profile}}/#pendente",150000);
                                }*/
                                var time = 3;

                                setInterval(function(){
                                    setTimeout(location.href = "{{url("")}}/user/{{Auth()->user()->profile}}/#pendente");
                                }, 1000);
                                @if(isset($data))
                                $("#editado").css("display", "block");
                                @else{{--
                                $("#sucesso").css("display", "block");--}}
                                @endif
                            }).fail(function () {
                                if($("#titulo").val()== "" || $("#descricao").val() == "" || $("#valor").val() == "" || $("#add").val() == ""){
                                    swal("Ops..", "Campos em branco ou inválidos", "warning");
                                }
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
                        $(document).ready(function(){
                            $("#cep").mask("99.999-999");
                        });
                        $('#valor').keyup(function(){
                            var v = $(this).val();
                            v=v.replace(/\D/g,'');
                            v=v.replace(/(\d{1,2})$/, ',$1');
                            v=v.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');
                            v = v != ''?'R$ '+v:'';
                            $(this).val(v);
                        });

                        function limpa_formulário_cep() {
                            //Limpa valores do formulário de cep.
                            document.getElementById('rua').value=("");
                            document.getElementById('bairro').value=("");
                            document.getElementById('cidade').value=("");
                            document.getElementById('uf').value=("");
                            document.getElementById('ibge').value=("");
                        }

                        function meu_callback(conteudo) {
                            if (!("erro" in conteudo)) {
                                //Atualiza os campos com os valores.
                                document.getElementById('rua').value=(conteudo.logradouro);
                                document.getElementById('bairro').value=(conteudo.bairro);
                                document.getElementById('cidade').value=(conteudo.localidade);
                                document.getElementById('uf').value=(conteudo.uf);
                            } //end if.
                            else {
                                //CEP não Encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        }

                        function pesquisacep(valor) {

                            //Nova variável "cep" somente com dígitos.
                            var cep = valor.replace(/\D/g, '');

                            //Verifica se campo cep possui valor informado.
                            if (cep != "") {

                                //Expressão regular para validar o CEP.
                                var validacep = /^[0-9]{8}$/;

                                //Valida o formato do CEP.
                                if(validacep.test(cep)) {

                                    //Preenche os campos com "..." enquanto consulta webservice.
                                    document.getElementById('rua').value="...";
                                    document.getElementById('bairro').value="...";
                                    document.getElementById('cidade').value="...";
                                    document.getElementById('uf').value="...";

                                    //Cria um elemento javascript.
                                    var script = document.createElement('script');

                                    //Sincroniza com o callback.
                                    script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                                    //Insere script no documento e carrega o conteúdo.
                                    document.body.appendChild(script);

                                } //end if.
                                else {
                                    //cep é inválido.
                                    limpa_formulário_cep();
                                    alert("Formato de CEP inválido.");
                                }
                            } //end if.
                            else {
                                //cep sem valor, limpa formulário.
                                limpa_formulário_cep();
                            }
                        };

                        var conta = 0;
                        $("#add").click(function(){
                            conta++;
                                if(conta<13)
                                $("ol").append('<img type="button" id="img_click_' + conta +'" style="margin-left:10px;margin-top:10px;border:2px dashed #ccc;padding:2px; cursor:pointer;" height="135" src="{{asset ('img/sem_imagem.png')}}">');
                                $("#imagem_base64").append('<input type="file" id="imagem_base64_' + conta +'" name="base64[]" class="file" style="display: none">');
                                $("#base64").append('<input type="hidden" id="base64_' + conta +'" required="required" name="base64[]" value="">');
                            if (conta != 13){
                                jQuery("#album").fadeIn();
                                $("#album").css("display", "block");
                            }
                        });
                        //JS que carrega o UPLOAD
                        $(document).on('click', '.browse', function () {
                            var file = $(this).parent().parent().parent().find('.file');
                            file.trigger('click');
                        });
                        /*
                            $(document).on('change', '.file', function () {
                            $(this).parent().find('#texto_arquivo_base64_on').val($(this).val().replace(/C:\\fakepath\\/i, ''));
                        });*/
                        $(document).on('click', '#img_click_1', function () {
                            $('#imagem_base64_1').click();
                        });
                        $(document).on('click', '#img_click_2', function () {
                            $('#imagem_base64_2').click();
                        });
                        $(document).on('click', '#img_click_3', function () {
                            $('#imagem_base64_3').click();
                        });
                        $(document).on('click', '#img_click_4', function () {
                            $('#imagem_base64_4').click();
                        });
                        $(document).on('click', '#img_click_5', function () {
                            $('#imagem_base64_5').click();
                        });
                        $(document).on('click', '#img_click_6', function () {
                            $('#imagem_base64_6').click();
                        });
                        $(document).on('click', '#img_click_7', function () {
                            $('#imagem_base64_7').click();
                        });
                        $(document).on('click', '#img_click_8', function () {
                            $('#imagem_base64_8').click();
                        });

                        $(document).on('change', '#imagem_base64_1', function () {
                            /*
                                                console.log($('#imagem_base64').val());
                                                console.log("ENTROU?");
                            */
/*
                            console.log(this.files);

                            console.log($('#imagem_base64_1').val());
                            console.log("ENTROU?");*/
                            if (this.files && this.files[0]) {

                                if (this.files[0].type == "image/png" || this.files[0].type == "image/jpeg" || this.files[0].type == "image/gif") {
                                    var FR = new FileReader();

                                    FR.addEventListener("load", function (e) {
                                        document.getElementById("img_click_1").src = e.target.result;
                                        document.getElementById("base64_1").value = e.target.result;
                                    });

                                    FR.readAsDataURL(this.files[0]);
                                } else {
                                    document.getElementById("img_click_1").src = "{{asset('img/sem_imagem.png')}}";
                                    document.getElementById("base64_1").value = "";
                                   /* $("#erro_imagem").css("display", "block");*/
                                    swal("Ops!", "Tipo de arquivo não permitido", "error")
                                }
                            }
                        });

                        $(document).on('change', '#imagem_base64_2', function () {
                            /*
                                                console.log($('#imagem_base64').val());
                                                console.log("ENTROU?");
                            */

                            console.log(this.files);
                            if (this.files && this.files[0]) {

                                if (this.files[0].type == "image/png" || this.files[0].type == "image/jpeg" || this.files[0].type == "image/gif") {
                                    /*$("#erro_imagem").css("display", "none");*/
                                    var FR = new FileReader();

                                    FR.addEventListener("load", function (e) {
                                        document.getElementById("img_click_2").src = e.target.result;
                                        document.getElementById("base64_2").value = e.target.result;
                                    });

                                    FR.readAsDataURL(this.files[0]);
                                } else {
                                    document.getElementById("img_click_2").src = "{{asset('img/sem_imagem.png')}}";
                                    document.getElementById("base64_2").value = "";
                                   /* $("#erro_imagem").css("display", "block");*/
                                }
                            }
                        });
                        $(document).on('change', '#imagem_base64_3', function () {
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
                                        document.getElementById("img_click_3").src = e.target.result;
                                        document.getElementById("base64_3").value = e.target.result;
                                    });

                                    FR.readAsDataURL(this.files[0]);
                                } else {
                                    document.getElementById("img_click_3").src = "{{asset('img/sem_imagem.png')}}";
                                    document.getElementById("base64_3").value = "";
                                    $("#erro_imagem").css("display", "block");
                                }
                            }
                        });
                        $(document).on('change', '#imagem_base64_4', function () {
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
                                        document.getElementById("img_click_4").src = e.target.result;
                                        document.getElementById("base64_4").value = e.target.result;
                                    });

                                    FR.readAsDataURL(this.files[0]);
                                } else {
                                    document.getElementById("img_click_4").src = "{{asset('img/sem_imagem.png')}}";
                                    document.getElementById("base64_4").value = "";
                                    $("#erro_imagem").css("display", "block");
                                }
                            }
                        });

                        $(document).on('change', '#imagem_base64_5', function () {
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
                                        document.getElementById("img_click_5").src = e.target.result;
                                        document.getElementById("base64_5").value = e.target.result;
                                    });

                                    FR.readAsDataURL(this.files[0]);
                                } else {
                                    document.getElementById("img_click_5").src = "{{asset('img/sem_imagem.png')}}";
                                    document.getElementById("base64_5").value = "";
                                    $("#erro_imagem").css("display", "block");
                                }
                            }
                        });

                    </script>
                </section>
            </main>
        @endforelse
    @endif

@endsection
