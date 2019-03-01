@extends('layouts.search')
@section('content')
    <main class="conteudo">
        <div class="nome_cat">
            <img src="img/arrow.png" alt="" class="left top_5" width="40px">
            \\ categorias
        </div>
        <div class="thumb"  style="height: 65px;">
            <i class="fa fa-home fa-1x"></i><a href="#"> Home</a> <i class="fa fa-angle-right fa-1x"></i>
            <a href="#">Categoria</a> <i class="fa fa-angle-right fa-1x"></i> <b>Nome
                <span class="right" style="margin:5px 10px "><i class="fa fa-sort-amount-desc fa-1x"></i> Mostrando
                    Total Anuncios</span>
        </div>
        <section id="destaque">
            <div class="top_esq">
                <form  id="form-anuncio">
                    <input type="text" name="titulo" value="{{request()->get('titulo')}}" placeholder="Pesquise aqui..." class="campo_pes">
                    <button class="botao_res"><i class="fa fa-search fa-lg"></i></button>
                    <div class="pesquisa_avancada">
                        <h3><i class="fa fa-angle-down fa-1x"></i> Filtro Rápido</h3>
                        <h2><i class="fa fa-angle-right fa-1x"></i> Categoria </h2>
                       {{-- <div class="lista_cat">
                            <ul>
                                @forelse(\App\Models\Categoria::where('categoria_id', 0)->orderBy('id')->get() as $z)
                                    <li>
                                        <a href="@if(isset($getArray['categoria'])) @else pesquisar?categoria={{$z->id}} @endif" class="b"><i class="fa fa-angle-right fa-1x"></i> {{$z->nome}} </a>
                                    </li>
                                @empty
                                @endforelse
                            </ul>
                        </div>--}}
                         <select class="listagem form-control" name="categoria" onChange="this.form.submit()">
                             @if(isset($getArray['categoria']))
                                 <option value="{{$getArray['categoria']}}">{{$getArray['categoria']}} </option>
                             @endif

                         @forelse(\App\Models\Categoria::orderBy('id')->where('categoria_id', 0)->get() as $z)
                                 <option value="{{$z->nome}}">{{$z->nome}} </option>
                             @empty
                             @endforelse
                         </select>
                        @if(isset($getArray['categoria']))
                            <br>
                        <h2><i class="fa fa-angle-right fa-1x"></i> Aptidão </h2>
                            <div style="margin-left:10px">
                                <br>
                                @if(isset($getArray['aptidao']))
                                {{--@forelse(\App\Models\Apitidao::where('categoria_nome', $getArray['categoria'])->get() as $z)
                                        <div>
                                            <input type="checkbox" onChange="this.form.submit()" id="{{$z->sigla}}" value="{{$z->sigla}}" name="{{$getArray['aptidao']}}" @if(isset($getArray['aptidao'])) checked @endif>
                                            <label for="{{$z->sigla}}">{{$z->nome}}</label>
                                        </div>
                                @empty
                                @endforelse--}}
                                <div>
                                    <input type="checkbox" id="corte" onChange="this.form.submit()" name="aptidao" value="corte" @if(isset($getArray['corte'])) checked @endif>
                                    <label for="nelore">Corte</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="leite" onChange="this.form.submit()" name="aptidao" value="leite" @if(isset($getArray['leite'])) checked @endif>
                                    <label for="brahman">Leite</label>
                                </div>
                                @endif
                            </div>
                            <br>
                        <h2><i class="fa fa-angle-right fa-1x"></i> Raça </h2>
                            <div style="margin-left:10px">
                                <br>
                                <div>
                                    <input type="checkbox" id="horns" onChange="this.form.submit()" name="nelore" @if(isset($getArray['nelore'])) checked @endif>
                                    <label for="nelore">Nelore</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="horns" onChange="this.form.submit()" name="brahman" @if(isset($getArray['brahman'])) checked @endif>
                                    <label for="brahman">Brahman</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="horns" onChange="this.form.submit()" name="girolando" @if(isset($getArray['girolando'])) checked @endif>
                                    <label for="girolando">Girolando</label>
                                </div>
                            </div>
                            <br>
                        <h2><i class="fa fa-angle-right fa-1x"></i> Idade </h2>
                            <div style="margin-left:10px">
                                <br>
                                <div>
                                    <input type="checkbox" id="horns" onChange="this.form.submit()" name="novilha" @if(isset($getArray['novilha'])) checked @endif>
                                    <label for="novilha">Novilha</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="horns" onChange="this.form.submit()" name="touro" @if(isset($getArray['touro'])) checked @endif>
                                    <label for="touro">Touro</label>
                                </div>
                                <div>
                                    <input type="checkbox" id="horns" onChange="this.form.submit()" name="vaca" @if(isset($getArray['vaca'])) checked @endif>
                                    <label for="vaca">vaca</label>
                                </div>
                            </div>
                            @elseif(isset($getArray['categoria']) == 2)
                            @elseif(isset($getArray['categoria']) == 3)
                            @endif
                        <div class="lista_cat">
                          {{--  @if(isset($getArray['categoria']))
                                @if($z->where('categoria_id', $getArray['categoria'])->get())
                                <ul>
                                    @forelse(\App\Models\Categoria::where('categoria_id', $getArray['categoria'])->orderBy('id')->get() as $f)
                                        <li><a href="pesquisar?categoria={{$z->id}}&sub={{$f->id}}" name="" class="b"><i class="fa fa-angle-right fa-1x"></i> {{$f->nome}} </a></li>
                                    @empty
                                    @endforelse
                                </ul>
                                @endif
                            @endif--}}
                            {{--<section style="float:left;width: 100%;padding:50px 100px;margin-top:40px;background-color: #f7f7f7;border-radius:3px;border:1px solid #f5f5f5">
                                <a class="btn btn-success" onclick="save('pesquisar', '{{url('pesquisar?')}}');"><i class="fa fa-save"></i>
                                    Salvar
                                </a>
                            </section>--}}
                            {{--<select class="listagem"  name="categoria" style="width: 100%" onChange="mudar()">
                                <option value="{{request()->get('categoria')}}"> Selecionar </option>
                                @forelse(\App\Models\Categoria::where('categoria_id', 0)->orderBy('id')->get() as $z)
                                    <option value="{{$z->id}}"> {{$z->nome}}</option>
                                @empty
                                @endforelse
                            </select>
                            <select name="sub" class="listagem"   style="width: 100%" onChange="enviar()">
                                <option value="{{request()->get('sub')}}">{{request()->get('sub')}}</option>
                                <option value="1"> {{$z->nome}} </option>
                            </select>
                            <div id="div_tipo">&nbsp;</div>--}}
                           {{-- <ul>
                                @forelse(\App\Models\Categoria::where('categoria_id', 0)->orderBy('id')->get() as $z)
                                    <li>
                                        <a href="pesquisar?categoria={{$z->id}}" class="b"><i class="fa fa-angle-right fa-1x"></i> {{$z->nome}} </a></li>
                                    @if(isset($getArray['categoria']) && $z->id == $getArray['categoria'])                                <ul>
                                        @forelse(\App\Models\Categoria::where('categoria_id', $z->id)->orderBy('id')->get() as $f)
                                            <li> <a href="pesquisar?categoria={{$f->id}}" class="b"><i class="fa fa-angle-right fa-1x"></i> {{$f->nome}} </a></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                    @endif
                                @empty
                                    <li class="cor_black">Sem Categoria</li>
                                @endforelse
                            </ul>--}}
                               {{-- <select  style="width: 100%" class="listagem" name="estado" onChange="enviar()">
                                    <option value="{{request()->get('estado')}}" selected>
                                        {{request()->get('estado')}}
                                    </option>
                                    @forelse(\App\Models\Uf::orderBy('id')->get() as $z)
                                        <option value="{{$z->sigla}}">{{$z->uf}}</option>
                                    @empty
                                        <li class="cor_black">Sem Categoria</li>
                                    @endforelse
                                </select>--}}
                        </div>
                        {{--<select class="listagem form-control" name="estado" onChange="estado()">
                            <option value="all" selected>
                                @if(isset($getArray['estado'])) {{$z->sigla}} @else Estado @endif
                            </option>
                            @forelse(\App\Models\Uf::orderBy('id')->get() as $z)
                                <option value="{{$z->sigla}}"> {{$z->uf}} </option>
                            @empty
                                <li class="cor_black">Sem Categoria</li>
                            @endforelse
                        </select>--}}
                    </div>
                </form>
                {{--<div class="pesquisa_avancada">
                    Mais filtros
                </div>--}}
            </div>

            <div class="top_dir">
               {{-- <select class="listagem" name="estado" onChange="estado()">
                    <option value="all" selected>
                        Estado
                    </option>
                    @forelse(\App\Models\Uf::orderBy('id')->get() as $z)
                        <option value="{{$z->sigla}}">{{$z->uf}}</option>
                    @empty
                        <li class="cor_black">Sem Categoria</li>
                    @endforelse
                </select>--}}
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

                @forelse($data as $z => $value)
                    <aside class="anuncios">
                        <div class="foto_anuncio">
{{--
                           <a href="{{url('anuncio')}}/{{$value->id}}"> <img src="{{url('app/media/anuncio')}}/{{$value->fotos->base64 or '../img/image.jpeg'}}" width="200" height="146" alt="">
                            </a>--}}
                            @forelse($value->album as $x)
                                @if($x->base64 == null)
                                @else
                                    <span class="hidden" style="display: none">{{$aa = 1}}</span>
                                    <img src="{{url('app/media/anuncio')}}/{{$x->base64 or 'image.jpeg'}}" alt="Imagem">
                                    @break
                                @endif
                            @empty
                            @endforelse
                            @if($aa == 0)
                                <img src="{{url('app/media/anuncio')}}/{{'image.jpeg'}}" alt="Imagem">
                            @endif
                        </div>
                        <section class="desc_anuncio">
                            <h3 style="font-weight: 600;">{{$value->titulo}}</h3>
                            <p class="descricao_anuncio">{{str_limit($value->descricao->descricao, 100)}}</p>
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
                   {{-- @if($result)
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
<script>
    function mudar(){
        if( document.pesquisa.categoria.value == 1 ){
            div_tipo.innerHTML = "<input type='checkbox' name='ck_box' value='A'>A <br><input type='checkbox' name='ck_box' value='B'>B";
        } else if( document.pesquisa.categoria.value == 2 ) {
            div_tipo.innerHTML = "<input type='checkbox' name='ck_box' value='V'>Vermelho <br><input type='checkbox' name='ck_box' value='A'>Azul";
        } else {
            div_tipo.innerHTML = "&nbsp;";
        }
    }

    function enviar(){
        document.pesquisa.submit();
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
