@extends('layouts.app')

@section('content')
    <main class="conteudo">

        <div class="nome_cat">
            <img src="../../img/arrow.png" alt="" class="left top_5" width="40px">
            Membro desde
        </div>
        <div class="thumb">
            <i class="fa fa-home fa-1x"></i><a href="#"> Home</a> <i class="fa fa-angle-right fa-1x"></i>
            <a href="#">{{$data->categoria->nome or ''}}</a> <i class="fa fa-angle-right fa-1x"></i> <b>Nome
                <span class="right" style="margin:5px 10px "> {{date( 'd/m/Y' , strtotime($data->user->created_at))}}</span>
        </div>
        @if($data->user->tipo_id == 4)
        <section id="leiloes">
            <div class="user_anuncio fade" style="width:160px">
                    <a href="{{url('user')}}/{{$data->id}}">
                      {{--   <img src="{{$value->fotos->base64 or '../img/image.jpeg'}}" alt="Imagem">
                          --}}
                        <img src="@if($data->user->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$data->user->foto_perfil}} @endif">
                    </a>
            </div>
            <div class="descricao_anuncio" style="margin-left:170px">
                    <h3>Olá, sou {{$data->user->name}}</h3>
                    <br><br><br><br><br>
                    <a href="{{url('user')}}/{{$data->user->id}}" class="cor_black">
                    <span style="background-color:#f5f5f5;border:1px dotted #eee;padding:5px 20px;">
                     Minha Loja
                    </span>
                    </a>
            </div>
        </section>
    @endif
{{--
        <section id="default2" style="background: url('http://www.ncsolucoes.com.br//wp-content/uploads/2017/03/agro_business.jpg') fixed center;">
--}}<!-- Fotorama -->
        <section id="default2">
            <div class="img_anuncio left">
                @if($data->premium == 1)
                    <div class="fotorama" data-width="100%" data-autoplay="true" data-loop="true" data-shuffle="true" data-fit="contain" data-arrows="false" data-trackpad="false" data-swipe="false" data-transition="crossfade" data-ratio="16/9" data-click="true" data-allowfullscreen="true" data-nav="thumbs">
                        @forelse($data->album as $z)
                            <img src="{{url('app/media/anuncio')}}/{{$z->base64 or 'image.jpeg'}}" alt="Imagem">
                        @empty
                        @endforelse
                    </div>
                @elseif($data->premium == 0)
                    <div class="fotorama" data-width="100%" data-autoplay="true" data-loop="true" data-shuffle="true" data-fit="contain" data-arrows="false" data-trackpad="false" data-swipe="false" data-transition="crossfade" data-ratio="16/9" data-click="true" data-allowfullscreen="true" data-nav="thumbs">
                        @forelse($data->album as $z)
                            <img src="{{url('app/media/anuncio')}}/{{$z->base64 or 'image.jpeg'}}" alt="Imagem">
                        @empty
                            <img src="{{url('app/media/anuncio')}}/{{'image.jpeg'}}" alt="Imagem">
                        @endforelse
                    </div>
                @endif
                <section id="default">
                    <p>// Descrição : <b>{{$data->descricao->descricao->descricao or ''}}</b></p>
                </section>

            </div>
            @if($data->status_pagamento == 1)
            <div class="wrapper">

                <div class="ribbon-wrapper-green">

                    <div class="ribbon-green"><i class="fa fa-star"></i> </div>

                </div>

            </div>
            @endif
        <div class="premium_anuncio right" style="width: 35%;padding: 20px 30px">

            @if($data->status_pagamento == 1)
                <h2 style="text-transform:uppercase;font-weight: normal">{{$data->titulo}} [{{$data->id}}]</h2>
                <h4>
                    <p><a class="cor_black" href="../estado/{{$data->uf_id}}">{{$data->uf->uf or ''}} - {{$data->uf->sigla or ''}}</a></p>
                </h4>

                <p style="font-size: 11px;"> (Anúncio publicado em {{date( 'd/m/Y' , strtotime($data->created_at))}})</p>
                <br/>
                <br/>
                <p>
                    Preço
                </p>
                <h1>{{$data->descricao->valor or ''}}</h1>
            {{--<p>//<b>
                @if($data->user->tipo_id == "2" || $data->user->tipo_id == "4")
                    Sou Pessoa Jurídica
                @elseif($data->user->tipo_id == '3')
                    Sou Pessoa Física
                @elseif($data->user->tipo_id == '1')
                    Sou da Equipe
                @endif
            </b>
            </p>--}}
           {{-- <p>// Anunciante :
                <b>
                    <a href="../user/{{$data->user_id}}">
                        {{$data->user->name or ''}}
                    </a>
                </b>
            </p>--}}
                <br/>
            @if(Auth::user())
                @if(($data)->user->telefone == 0)
                    <button class="btn" type="button">
                        <b>Contato Indisponível</b>
                    </button>
                @else
                    <button class="btn" type="button">
                        <span class="badge">{{$data->user->telefone or ''}}</span>
                    </button>
                @endif
            @else
                <button class="btn" type="button">
                    Contato
                </button>
            @endif

            @elseif($data->premium == 0)
                <h2 style="text-transform:uppercase;font-weight: normal">{{$data->titulo}} [{{$data->id}}]</h2>
                <h4>
{{--
                    <p><a class="cor_black" href="../estado/{{$data->uf->sigla}}">{{$data->uf->uf or ''}} - {{$data->uf->sigla or ''}}</a></p>
--}}
                </h4>
                <p style="font-size: 11px;"> (Anúncio publicado em {{date( 'd/m/Y' , strtotime($data->created_at))}})</p>
                <br/>
                <br/>
                <p>
                    Preço
                </p>
                <h1 style="">
                    <h1>{{$data->descricao->valor or ''}}</h1>
                </h1>
                <br/>
            @if(Auth::user())
                @if(auth()->user()->id == $data->user->id)
                    <a href="{{$data->id}}/edit" class="btn" style="background-color: #14c18b;border: 1px solid #63d3f8;" type="button">
                        Editar Anúncio
                    </a>
                    <br>
                    <br>
                @endif
            @endif
                @if(Auth::user())
                    @if(($data)->user->telefone == 0)
                        <button class="btn" type="button">
                            Contato Indisponível
                        </button>
                    @else
                        <button class="btn" type="button">
                            <span class="badge">{{$data->user->telefone or ''}}</span>
                        </button>
                    @endif
                    @else
                    <button class="btn" type="button">
                        Contato
                    </button>
                @endif
            @endif
        </div>
            <div class="premium_anuncio right" style="width: 35%;padding: 20px 30px">
                @if($data->status_pagamento == 1)
                    // Categoria : <a href="../categoria/{{$data->categoria_id}}" class="cor_black">{{$data->categoria->nome or ''}}</a>

                    {{--<p>//<b>
                        @if($data->user->tipo_id == "2" || $data->user->tipo_id == "4")
                            Sou Pessoa Jurídica
                        @elseif($data->user->tipo_id == '3')
                            Sou Pessoa Física
                        @elseif($data->user->tipo_id == '1')
                            Sou da Equipe
                        @endif
                    </b>
                    </p>--}}
                    {{-- <p>// Anunciante :
                         <b>
                             <a href="../user/{{$data->user_id}}">
                                 {{$data->user->name or ''}}
                             </a>
                         </b>
                     </p>--}}{{--
                    @if(Auth::user())
                        @if(($data)->user->email == 0)
                            <p>// Email  : <b>{{$data->user->email}}</b></p>
                        @endif
                    @endif--}}
                @elseif($data->status_pagamento == 0)
                   {{-- <p>// Anunciante :
                        <b>
                            <a href="../user/{{$data->user->name}}" class="cor_black">
                                {{$data->user->name or ''}}
                            </a>
                        </b>
                    </p>--}}
                    // Categoria : <a href="../categoria/{{$data->categoria_id}}" class="cor_black">{{$data->categoria->nome or ''}}</a>

                    {{--<p>//<b>
                        @if($data->user->tipo_id == "2" || $data->user->tipo_id == "4")
                            Sou Pessoa Jurídica
                        @elseif($data->user->tipo_id == '3')
                            Sou Pessoa Física
                        @elseif($data->user->tipo_id == '1')
                            Sou da Equipe
                        @endif
                    </b>
                    </p>--}}
                    {{-- <p>// Anunciante :
                         <b>
                             <a href="../user/{{$data->user_id}}">
                                 {{$data->user->name or ''}}
                             </a>
                         </b>
                     </p>--}}{{--
                    @if(Auth::user())
                        @if(($data)->user->email == 0)
                            <p>// Email  : <b>{{$data->user->email}}</b></p>
                        @endif
                    @endif--}}
                @endif
            </div>
        </section>

        <section id="destaque">
            <h2 class="text-center" id="comentario">Comentários</h2>
            <hr class="style12">
            @forelse($data->comentarios->where('anuncio_id', $data->id)->get() as $z)
                <div class="comentario left" style="padding:20px;">
                    <img src="{{url('img')}}/{{$z->user->avatar or ''}}"  class="left" style="position: absolute;height: 40px;background-color: #ca195a">
                    <div class="contcoment left" style="width:960px;margin-left:50px;">
                        <h4 class="left">{{$z->user->name or ''}} - </h4> <h6 class="left">perguntou em {{$z->created_at->format('d/m/Y')}} às {{$z->created_at->format('H:i')}}</h6>
                        <br><span style="">{{nl2br($z->mensagem)}}</span>
                    </div>
                </div>
                @empty
            @endforelse

            <form id="form-comentario">
            {{ csrf_field() }}
                <input type="hidden" name="tp" value="{{$data->id}}">
                <section id="login">
                    <label for="name"></label>
                    <textarea type="text" rows="7" name="mensagem" class="form-control" placeholder="Qual a sua pergunta?"></textarea>
                    <a class="btn btn-success" onclick="save('comentario', '{{url('anuncio')}}/{{$data->id}}/comentario');"><i class="fa fa-save"></i>
                        Enviar Comentário
                    </a>
                </section>
            </form>
        </section>

        <section id="destaque">
            <h1 class="fontzero">Nossos Produtos em Destaque</h1>

            <span class="titulo">
                <h3>
                    <i class="fa fa-bullhorn fa-1x"></i> Anúncios Relacionados
                </h3>
            </span>

            <hr class="style12">
            @forelse(\App\Models\Anuncio::where('status_id', 1)->where('categoria_id', $data->categoria->id)->orderByRaw('RAND()')->take(4)->get() as $z => $value)
                <article class="item">
                    <h2 class="fontzero">Outros Anuncios</h2>

                    <p class="sub_artigo">{{$value->titulo}}
                    </p>
                    <div class="foto fade" style="width:250px;height: 160px;">
                        <a href="{{url('anuncio')}}/{{$value->id}}">
                            {{--   <img src="{{$value->fotos->base64 or '../img/image.jpeg'}}" alt="Imagem">
                              --}}
                        <span class="hidden" style="display: none">{{$aa = 0}}</span>
                        @forelse($value->album as $x)
                            @if($x->base64 == null)
                            @else
                                <span class="hidden" style="display: none">{{$aa = 1}}</span>
                                    <img src="{{url('app/media/anuncio')}}/{{$x->base64 or 'image.jpeg'}}" alt="Imagem">
                                @break
                            @endif
                        @empty
{{--
                            <img src="{{url('app/media/anuncio')}}/{{'image.jpeg'}}" alt="Imagem">
--}}
                            @endforelse
                        @if($aa == 0)
                                <img src="{{url('app/media/anuncio')}}/{{'image.jpeg'}}" alt="Imagem">
                        @endif
                         </a>
                    </div>
                    <p class="preco">
                        {{$data->descricao->valor or ''}}
                        <span class="cor_black" style="font-size:13px;"> /animal  </span>
                    </p>
                    <p class="desc_artigo">
                        {{$data->descricao->descricao->descricao or ''}}
                    </p>
                    <div class="data">
                        <date><i class="fa fa-calendar"></i> {{$value->created_at->format('d/m/Y')}}</date>
                        <span class="estado">
                        <span class="cor_black">{{$value->uf->uf or 'Estado'}} - {{$value->uf->sigla or 'Cidade'}}</span> <i class="fa fa-map-marker fa-1x"></i>
                    </span>
                    </div>
                </article>
            @empty
                    <p class="text-center cor_black">
                        Não há registro!
                    </p>
            @endforelse
        </section>
    </main>
    <link  href="{{asset ('css')}}/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
    <script src="{{asset ('js')}}/fotorama.js"></script> <!-- 16 KB -->
    <script>
    function save(form, link) {
    var dataForm = $('#form-' + form).serialize();
    var id = $("#" + form + "_id").val();
    var metodo;
    if (id > 0) {
    metodo = 'PUT';
    link = link + '/' + id;
    } else {
    metodo = 'PUT';
    }
    ajax(link, metodo, dataForm);
    }

    function ajax(link, metodo, dataForm) {
    jQuery.ajax({
    url: link,
    data: dataForm,
    cache: false,
    method: metodo,
    }).done(function (data) {
        if(window.top==window) {
            setTimeout(location.href = "{{url("anuncio")}}/{{$data->id}}");
        };
    }).fail(function () {
    });
    }
    </script>
@endsection