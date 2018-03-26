@extends('layouts.app')
@section('content')
    <main class="conteudo">
        <!--Inicio Destaque-->
            <div class="nome_cat">
                <img src="img/arrow.png" alt="" class="left top_5" width="40px">
                \\ categorias
            </div>
        @if(Auth::user())
            <div class="cor_black @if(\App\Models\Anuncio::where('user_id', auth()->user()->id)->count() == 0) notify @else notify2 @endif">
                @if(\App\Models\Anuncio::where('user_id', auth()->user()->id)->get())
                    @if(\App\Models\Anuncio::where('user_id', auth()->user()->id)->count() == 0)
                        Ei, <b>{{Auth::user()->name}}<b> crie agora seu primeiro anúncio é Grátis
                        @else
                        Você possui {{\App\Models\Anuncio::where('user_id', auth()->user()->id)->count()}} Publicados na plataforma
                    @endif
                @endif
            </div>
        @endif
            <section id="destaque">
                <h1 class="fontzero">Nossos Produtos em Destaque</h1>

            <span class="titulo">
                <h3>
                    <i class="fa fa-star fa-1x"></i> Em Destaque
                </h3>
            </span>

            <hr class="style12"></hr>
            @forelse($anuncioP as $z)
            <article class="item">
                <h2 class="fontzero">Destaque 1</h2>

                <p class="sub_artigo">
                    {{$z->titulo}}
                </p>
                <a href="{{url('anuncio')}}/{{$z->id}}">
                   <img class="foto fade" width="250" height="160" src="{{$z->fotos->base64 or ''}}" alt="Imagem">
                </a>
                <p class="preco">
                    R$ 2,000.000
                <span class="cor_black" style="font-size:13px;">
                    /animal
                </span>
                </p>
                <p class="desc_artigo">
                    {{str_limit($z->descricao, 60)}}
                </p>
                <div class="data">
                    <date><i class="fa fa-calendar"></i> {{$z->created_at->format('d/m/ Y')}}</date>
                    <span class="estado">
                        <a class="cor_black" href="{{url('estado')}}/{{$z->uf->sigla or ''}}">{{$z->uf->uf or ''}}-{{$z->uf->sigla or ''}}</a> <i class="fa fa-map-marker fa-1x"></i>
                    </span>
                </div>
            </article>
            @empty
                <p class="text-center cor_black">
                    Não há registro!
                </p>
            @endforelse

        </section>
        <!--Fim Destaque-->
        <!--Inicio Leilões-->
        {{--<section id="leiloes">

            <span class="titulo"><h3><i class="fa fa-legal fa-1x"></i> leilões ativos</h3></span>



            <article class="item">
                <span class="title">Lote : #035985
                        <p style="color:#383232;margin-left:10px">200 Cabeça de Gado Nelore</p>
                </span>
                <a  href="#">
                    <center><img class="foto" src="img/upload/l1.png" alt="Imagem"></center>
                </a>
                <div class="data">
                    <div class="conteudo">
                        <p class="hour">13:00H  <i class="fa fa-clock-o fa-1x"></i></p> <p class="enc">Encerramento: <br /> <date class="data_c">24/03/2017</date></p>                                </div>
                </div>
            </article>

            <article class="item">
                <span class="title">Lote : #035985
                        <p style="color:#383232;margin-left:10px">200 Cabeça de Gado Nelore</p>
                </span>
                <a  href="#">
                    <center><img class="foto" src="img/upload/l2.png" alt="Imagem"></center>
                </a>
                <div class="data">
                    <div class="conteudo">
                        <p class="hour">13:00H  <i class="fa fa-clock-o fa-1x"></i></p> <p class="enc">Encerramento: <br /> <date class="data_c">24/03/2017</date></p>                                </div>
                </div>
            </article>


            <article class="item">
                <span class="title">Lote : #035985
                        <p style="color:#383232;margin-left:10px">200 Cabeça de Gado Nelore</p>
                </span>
                <a  href="#">
                    <center><img class="foto" src="img/upload/l3.png" alt="Imagem"></center>
                </a>
                <div class="data">
                    <div class="conteudo">
                        <p class="hour">13:00H  <i class="fa fa-clock-o fa-1x"></i></p> <p class="enc">Encerramento: <br /> <date class="data_c">24/03/2017</date></p>                                </div>
                </div>
            </article>

            <article class="item v">
                <span class="title">Lote : #035985
                        <p style="color:#383232;margin-left:10px">200 Cabeça de Gado Nelore</p>
                </span>
                <a  href="#">
                    <center><img class="foto" src="img/upload/l4.png" alt="Imagem"></center>
                </a>
                <div class="data">
                    <div class="conteudo">
                        <p class="hour">13:00H  <i class="fa fa-clock-o fa-1x"></i></p> <p class="enc">Encerramento: <br /> <date class="data_c">24/03/2017</date></p>                                </div>
                </div>
            </article>

        </section>--}}
        <!--Fim Leilões-->
        <!--Inicio Ultimos Anuncios-->
        <section id="destaque">

            <span class="titulo">
                <h3>
                    <i class="fa fa-bullhorn fa-lg"></i> últimos anúncios
                </h3>
            </span>

            <hr class="style12">

            @forelse($anuncio as $z)
                <article class="item">
                    <h2 class="fontzero">Destaque 1</h2>

                    <p class="sub_artigo">
                        {{$z->titulo}}
                    </p>
                    <a href="{{url('anuncio')}}/{{$z->id}}">
                        <img class="foto fade" width="250" height="160" src="{{$z->fotos->base64 or ''}}" alt="Imagem">
                    </a>
                    <p class="preco">
                        R$ 2,000.000
                        <span class="cor_black" style="font-size:13px;">
                    /animal
                </span>
                    </p>
                    <p class="desc_artigo">
                        {{str_limit($z->descricao, 60)}}
                    </p>
                    <div class="data">
                        <date><i class="fa fa-calendar"></i> {{$z->created_at->format('d/m/ Y')}}</date>
                        <span class="estado">
                        <a class="cor_black" href="{{url('estado')}}/{{$z->uf->sigla or ''}}">{{$z->uf->uf or ''}}-{{$z->uf->sigla or ''}}</a> <i class="fa fa-map-marker fa-1x"></i>
                    </span>
                    </div>
                </article>
            @empty
                <p class="text-center cor_black">
                    Não há registro!
                </p>
            @endforelse
        </section>
        <!--Fim Ultimos Anuncios-->
        <section id="lojas">
            <h1 style="color:#000;text-transform: uppercase">// lojas oficiais</h1>
            <div class="tamanho">
                @forelse($lojas as $z)
                <figure class="img">
                    <a href="{{url('user')}}/{{$z->id}}"><img src="{{$z->foto_perfil or ''}}" width="200" height="146"  title="Loja" class="fade"></a>
                </figure>
                @empty

                @endforelse
            </div>
        </section>
        <!--        <section id="depoimentos">
                        <h1 style="color:#000; text-transform: uppercase;font-size: 17px;">// depoimentos</h1>
                        <hr class="style1">
                        <div class="bg">
                            <div class="depo_bg">
                                <div class="pessoa"></div>
                                <blockquote class="texto">
                                    <center>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        incididunt ut labore et dolore magna aliqua. Ut enim ad
        quis nostrud exercitation ullamco laboris. </p>
                                        <h2 style="color: #1d67bb;font-size: 18px;font-weight: normal;">Elias Vasconcelos</h2>
                            ———— <cite>Agricultor</cite> ————

                                    </center>
                            </blockquote>
                            </div><div class="depo_bg v">
                                <div class="pessoa"></div>
                                <blockquote class="texto">
                                    <center>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        incididunt ut labore et dolore magna aliqua. Ut enim ad
        quis nostrud exercitation ullamco laboris.</p>
                                        <h2 style="color: #1d67bb;font-size: 18px;font-weight: normal;">Elias Vasconcelos</h2>
                            ———— <cite>Agricultor</cite> ————

                                    </center>
                            </blockquote>
                            </div><div class="depo_bg v">
                                <div class="pessoa"></div>
                                <blockquote class="texto">
                                    <center>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
        incididunt ut labore et dolore magna aliqua. Ut enim ad
        quis nostrud exercitation ullamco laboris.</p>
                                        <h2 style="color: #1d67bb;font-size: 18px;font-weight: normal;">Elias Vasconcelos</h2>
                            ———— <cite>Agricultor</cite> ————

                                    </center>
                            </blockquote>
                            </div>
                        </div>
                </section> -->


        {{--<section id="ads">
            <p>publicidade</p>1140 x 130
        </section>--}}
    </main>

   {{-- <section id="compartilhar">
        <div class="bg">
            <div class="width">
                <h1>COMPARTILHE</h1><br />
                <p>Aproveite para aumentar a visibilidade do seu anúncio
                    compartilhe na WEB com os seus amigos ;)</p><br /><br />
                <span class="novo_anuncio">
		            <a href="?pg=login">criar anúncio grátis</a>
	            </span>
            </div>
        </div>
    </section>--}}
    {{--<div class="arrow_share">
        <img src="img/arrow_share.png" alt="">
    </div>--}}

    {{--@if(auth()->user())
        {{ Auth::user()->name }}<br/>
        você tem {{auth()->user()->anuncios->count()}}
    @else
        Ben vindo <b>VISITANTE</b>
    @endif--}}

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

@endsection
