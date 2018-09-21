@extends('layouts.app')

@section('content')

    <main class="conteudo">
        <div class="nome_cat">
            <img src="img/arrow.png" alt="" class="left top_5" width="40px">
            \\ categorias
        </div>
        <div class="thumb">
            <i class="fa fa-home fa-1x"></i><a href="#"> Home</a> <i class="fa fa-angle-right fa-1x"></i>
            <a href="#">Categoria</a> <i class="fa fa-angle-right fa-1x"></i> <b>Nome
                <span class="right" style="margin:5px 10px "><i class="fa fa-sort-amount-desc fa-1x"></i> Mostrando
                    Total Anuncios</span>
        </div>
        <section id="destaque">
            <div class="top_esq">
                <form action="?pagina=resultado" method="post">
                    <input type="text" placeholder="Pesquise aqui..." class="campo_pes">
                    <button name="botao" class="botao_res"><i class="fa fa-search fa-lg"></i></button>
                </form>
                <div class="pesquisa_avancada">
                    <h3><i class="fa fa-angle-down fa-1x"></i> Filtro Rápido</h3>
                    <h2><i class="fa fa-angle-right fa-1x"></i> SubCategoria </h2>
                    <div class="lista_cat">
                        <ul>
                            {{--<li> <a href="#" class="b"><i class="fa fa-paw fa-2x"></i> Animal </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-file-picture-o fa-2x"></i> Artesanato </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-graduation-cap fa-2x"></i> Curso </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-map fa-2x"></i> Equitação </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-camera-retro fa-2x"></i> Eventos </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-home fa-2x"></i> Imóveis </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-truck fa-2x"></i> Maquinário</p> </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-leaf fa-2x"></i> Mudas </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-lemon-o fa-2x"></i> <p> Sementes </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-shopping-basket fa-2x"></i> Suprimentos </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-scissors fa-2x"></i> Vestimentas </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-car fa-2x"></i> Veículos </a></li>--}}
                            <li> <a href="#" class="b"><i class="fa fa-angle-right fa-1x"></i> Animal </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-angle-right fa-1x"></i> Artesanato </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-angle-right fa-1x"></i> Curso </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-angle-right fa-1x"></i> Equitação </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-angle-right fa-1x"></i> Eventos </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-angle-right fa-1x"></i> Imóveis </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-angle-right fa-1x"></i> Maquinário</p> </a></li>
                            <li> <a href="#" class="b"><i class="fa fa-angle-right fa-1x"></i> Mudas </a></li>
                        </ul>
                    </div>
                </div>
                {{--<div class="pesquisa_avancada">
                    Mais filtros
                </div>--}}
            </div>
            <div class="top_dir">
                <select class="listagem">
                    <option value="all" selected>
                        Estado
                    </option>
                    @forelse(\App\Models\Uf::orderBy('id')->get() as $z)
                        <option value="{{$z->sigla}}">{{$z->uf}}</option>
                    @empty
                        <li class="cor_black">Sem Categoria</li>
                    @endforelse
                </select>
                <select class="listagem c">
                    <option value="all" selected>
                        Cidade
                    </option>
                    <option value="">Nome</option>
                </select>
               {{-- <select class="listagem right">
                    <option value="all" selected>Filtrar por Data</option>
                    <option value="">por Hora</option>
                    <option value="">por Valor</option>
                    <option value="">por Visualizações</option>
                </select>--}}
                {{--<select class="listagem right">
                    <option value="all" selected>Compartilhar</option>
                    <option value="">Facebook</option>
                    <option value="">Twitter</option>
                    <option value="">Youtube</option>
                    <option value="">Outros</option>
                </select>--}}
            </div>
            <section class="content">
                <div class="premium">
                    <h2 class="cabeca"><i class="fa fa-arrow-right fa-1x"></i> Anuncie Aqui</h2>
                    <div class="premium_an">
                        <a href="#">
                            <img src="img/lojas/windows.jpg" style="border:1px solid #ccc;border-radius: 3px; width: 114px; height:85px;">
                            <span class="tag_an">Vendo 20 camelos prontos para o abate</span>
                        </a>
                    </div>
                    <div class="premium_an">
                        <a href="#">
                            <img src="img/lojas/youtube.jpg" style="border:1px solid #ccc;border-radius: 3px; width: 114px; height:85px;">
                            <span class="tag_an">Vendo 20 camelos prontos para o abate</span>
                        </a>
                    </div>
                    <div class="premium_an">
                        <a href="#">
                            <img src="img/lojas/android.jpg" style="border:1px solid #ccc;border-radius: 3px; width: 114px; height:85px;">
                            <span class="tag_an">Vendo 20 camelos prontos para o abate</span>
                        </a>
                    </div>
                </div>
            </section>
            <section class="content">
                <aside class="anuncios_ads">
                    Anuncio ADS
                    <p>728 x 90</p>
                </aside>
                @forelse($result as $z => $value)
                    <aside class="anuncios">
                        <div class="foto_anuncio">
                           <a href="{{url('anuncio')}}/{{$value->id}}"> <img src="{{$value->fotos->base64 or '../img/image.jpeg'}}" width="200" height="146" alt="">
                           </a>
                        </div>
                        <section class="desc_anuncio">
                            <h3 style="font-weight: 600;">{{$value->titulo}}</h3>
                            <p class="descricao_anuncio">{{str_limit($value->descricao, 100)}}</p>
                            <p><i class="fa fa-map-marker fa-1x "></i> {{$value->uf->uf or ''}}-{{$value->uf->sigla or ''}}, Brasil</span></p>
                            <span class="cat_anuncio">Categoria</span> <a href="{{url("categoria")}}/{{$value->categoria->id or ''}}"><span class="cat_anuncio">{{$value->categoria->nome or ''}}</span></a>
                            <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> {{$value->created_at->format('d/m/ Y')}}</p></date>
                        </section>
                        <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                        <p class="view">Visitas: 115</p>
                        <price class="valor_produto">
                            <h1>R$35.000,00</h1>
                        </price>
                        <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                        <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                    </aside>
                @empty
                    <aside class="anuncios_ads">
                        Nenhum resultado!!
                    </aside>
                @endforelse
                <aside class="anuncios_ads">
                    Anuncio ADS
                    <p>728 x 90</p>
                </aside>
                <div class="carregar">
                    @if($result)
                        @if($result->links())
                            {!! $result->links() !!}
                        @else

                        @endif
                    @endif
                </div>
            </section>
        </section>
    </main>
{{--
    <main class="conteudo">
        <section id="default">
@forelse($result as $z => $value)
    <a href="{{url ("anuncio/$value->id")}}"><img src="{{$value->fotos->base64 or ''}}" alt="Imagem" width="250"></a>
<br />

<a href="{{url ("anuncio/$value->id")}}"><h3 class="cor_black">{{$value->titulo}}</h3></a> // {{$value->descricao}}
<br />Postado por: <b>{{$value->user->name or ''}}</b>
<br />Data: <b>{{$value->user->created_at or ''}}</b>
<hr>
    @empty
        Sem resultado!!

@endforelse
        </section>
    </main>--}}
@endsection