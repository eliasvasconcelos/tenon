@extends('layouts.app')

@section('content')

    <main class="conteudo">
        <div class="nome_cat">
            <img src="img/arrow.png" alt="" class="left top_5" width="40px">
            \\ categorias
        </div><div class="thumb">
            <i class="fa fa-home fa-1x"></i><a href="#"> Home</a> <i class="fa fa-angle-right fa-1x"></i> <a href="#">Animais</a>
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
                            <!--                    <li> <a href="#" class="b"><i class="fa fa-paw fa-2x"></i> Animal </a></li>
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
                                                <li> <a href="#" class="b"><i class="fa fa-car fa-2x"></i> Veículos </a></li>-->
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
                <div class="pesquisa_avancada">
                    Mais filtros
                </div>
            </div>
            <div class="top_dir">
                <select class="listagem">
                    <option value="all" selected>
                        País
                    </option>
                </select>
                <select class="listagem">
                    <option value="all" selected>
                        Estado
                    </option>
                    <option value="AC">Acre</option>
                    <option value="AL">Alagoas</option>
                    <option value="AP">Amapá</option>
                    <option value="AM">Amazonas</option>
                    <option value="BA">Bahia</option>
                    <option value="CE">Ceará</option>
                    <option value="DF">Distrito Federal</option>
                    <option value="ES">Espirito Santo</option>
                    <option value="GO">Goiás</option>
                    <option value="MA">Maranhão</option>
                    <option value="MT">Mato Grosso</option>
                    <option value="MS">Mato Grosso do Sul</option>
                    <option value="MG">Minas Gerais</option>
                    <option value="PA">Pará</option>
                    <option value="PB">Paraiba</option>
                    <option value="PR">Paraná</option>
                    <option value="PE">Pernambuco</option>
                    <option value="PI">Piauí</option>
                    <option value="RJ">Rio de Janeiro</option>
                    <option value="RN">Rio Grande do Norte</option>
                    <option value="RS">Rio Grande do Sul</option>
                    <option value="RO">Rondônia</option>
                    <option value="RR">Roraima</option>
                    <option value="SC">Santa Catarina</option>
                    <option value="SP">São Paulo</option>
                    <option value="SE">Sergipe</option>
                    <option value="TO">Tocantis</option>
                </select>
                <select class="listagem c">
                    <option value="all" selected>
                        Cidade
                    </option>
                    <option value="">Nome</option>
                    <option value="">Nome</option>
                    <option value="">Nome</option>
                    <option value="">Nome</option>
                    <option value="">Nome</option>
                </select>
                <select class="listagem">
                    <option value="all" selected>Filtrar por Data</option>
                    <option value="">por Hora</option>
                    <option value="">por Valor</option>
                    <option value="">por Visualizações</option>
                </select>
                <select class="listagem">
                    <option value="all" selected>Compartilhar</option>
                    <option value="">Facebook</option>
                    <option value="">Twitter</option>
                    <option value="">Youtube</option>
                    <option value="">Outros</option>
                </select>
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
                @forelse($result as $z => $value)
                    <aside class="anuncios">
                        <div class="foto_anuncio">
                           <a href="{{url('anuncio')}}/{{$value->id}}"> <img src="{{$value->fotos->base64 or ''}}" width="200" height="146" alt="">
                           </a></div>
                        <section class="desc_anuncio">
                            <h3 style="font-weight: 600;">{{$value->titulo}}</h3>
                            <p class="descricao_anuncio">{{$value->descricao}}</p>
                            <p><i class="fa fa-map-marker fa-1x "></i> {{$value->uf->uf or ''}}-{{$value->uf->sigla or ''}}, Brasil</span></p>
                            <span class="cat_anuncio">Categoria</span>
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
                    Sem resultado!!

                @endforelse

                {{--<aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_02.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600;">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$35.000</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>
                <aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_03.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600; color:#333333">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$395.000</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>--}}
                {{--<aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_01.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600;">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$15.000,00</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>
                <aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_01.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600;">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$325.000,000</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>--}}
                <aside class="anuncios_ads">
                    Anuncio ADS
                    <p>728 x 90</p>
                </aside>
                {{--<aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_01.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600;">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$5.000,000</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>
                <aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_01.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600;">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$50,000</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>
                <aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_01.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600;">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$3.000</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>
                <aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_01.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600;">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$35,00</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>
                <aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_01.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600;">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$35.000</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>
                <aside class="anuncios">
                    <div class="foto_anuncio">
                        <img src="img/upload/anuncio_01.jpg" alt="">
                    </div>
                    <section class="desc_anuncio">
                        <h3 style="font-weight: 600;">Fazenda lagoa da serra</h3>
                        <p class="descricao_anuncio">Por incrível que pareça, não se trata da primeira vez que um sistema de inteligência artificial ..</p>
                        <p><i class="fa fa-map-marker fa-1x "></i> Vitória - ES, Brasil</span></p>
                        <span class="cat_anuncio">Categoria</span>
                        <date class="data_anuncio"><i class="fa fa-calendar-check-o fa-2x data_post"></i>Postado em<p> 07 Jan,2017</p></date>
                    </section>
                    <i class="fa fa-share-alt-square fa-2x anuncio_icon"></i>
                    <p class="view">Visitas: 115</p>
                    <price class="valor_produto">
                        <h1>R$35.000,000</h1>
                    </price>
                    <p class="chat_anun"><i class="fa fa-comments-o fa-2x"></i> Chat</p>
                    <p class="offer_anun">Ver oferta <i class="fa fa-angle-right fa-1x"></i> </p>
                </aside>--}}
                <div class="carregar">
                    <a href=""><p>Carregar mais</p></a>
{{--
                    @if($result)
                        @if($result->links())
                            {!! $result->links() !!}
                        @else

                        @endif
                    @endif--}}
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