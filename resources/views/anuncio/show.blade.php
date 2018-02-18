@extends('layouts.app')

@section('content')

    <main class="conteudo">
        <section id="leiloes">
            <div class="user_anuncio">
                <img src="@if($data->user->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$data->user->foto_perfil}} @endif">
            </div>
            <div class="descricao_anuncio" style="margin-left:170px">
                <h3>Olá, sou {{$data->user->name}}</h3>
            @if($data->user->tipo_id == "2" || $data->user->tipo_id == "4")
                Sou Pessoa Jurídica
            @elseif($data->user->tipo_id == '3')
                Sou Pessoa Física
            @elseif($data->user->tipo_id == '1')
                Sou da Equipe {{$data->user->id}} {{$data->user->tipo_id}}
            @endif
                <br />
                <br />
                <br />
                @if($data->user->tipo_id == "4")
                <a href="{{url('user')}}/{{$data->user->id}}" class="cor_black">
                    <span style="background-color:#f5f5f5;border:1px dotted #eee;padding:5px 20px;">
                     Meu perfil
                    </span>
                </a>
                @endif
            </div>
        </section>
{{--
        <section id="default2" style="background: url('http://www.ncsolucoes.com.br//wp-content/uploads/2017/03/agro_business.jpg') fixed center;">
--}}
        <section id="default2">


        <div class="img_anuncio left">
            @if($data->premium == 1)
                <h3>{{$data->titulo}}</h3><br />
                <a href="{{url ('anuncio')}}/{{$data->id}}"><img src="{{$data->fotos->base64 or ''}}" alt="Imagem" class="img"  width="600"></a><br /><br />
                @forelse($data->album as $z)
                    {{$z->album->base64 or ''}}
                <img src="{{$z->base64 or ''}}" alt="Imagem" height="100" width="150">
                @empty
            @endforelse
            @elseif($data->premium == 0)
                <h3>{{$data->titulo}}</h3>
                <br />
                <a href="{{url ('anuncio')}}/{{$data->id}}">
                    <img src="{{$data->fotos->base64 or ''}}" alt="Imagem" class="img" width="600"></a>
                <br /><br />
                @forelse($data->album as $z)
                    {{$z->album->base64 or ''}}
                    <img src="{{$z->base64 or ''}}" alt="Imagem" height="100" width="150">
                @empty
                @endforelse
            @endif
        </div>
        <div class=" premium_anuncio right" style="width: 35%;padding: 20px 30px">

            @if($data->premium == 1)
                <h2 style="text-transform:uppercase;font-weight: normal">{{$data->titulo}} [{{$data->id}}]</h2>
                <h4>
                    <p><a class="cor_black" href="../estado/{{$data->uf_id}}">{{$data->uf->uf or ''}} - {{$data->uf->sigla or ''}}</a></p>
                </h4>

                <p style="font-size: 11px;"> (Anúncio publicado em {{date( 'd/m/Y' , strtotime($data->created_at))}})</p>
                <br/>
                <br/>
            <p>
                Valor
            </p>
            <h1 style="">
R$ 2.000,00
            </h1>
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
                <h2>Anuncio normal</h2>
                <h2 style="text-transform:uppercase;font-weight: normal">{{$data->titulo}} [{{$data->id}}]</h2>
                <h4>
                    <p><a class="cor_black" href="../estado/{{$data->uf_id}}">{{$data->uf->uf or ''}} - {{$data->uf->sigla or ''}}</a></p>
                </h4>

                <p style="font-size: 11px;"> (Anúncio publicado em {{date( 'd/m/Y' , strtotime($data->created_at))}})</p>
                <br/>
                <br/>
                <p>
                    Valor
                </p>
                <h1 style="">
                    R$ 2.000,00
                </h1>
                <br/>
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

                @if($data->premium == 1)
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
                     </p>--}}
                    @if(Auth::user())
                        @if(($data)->user->email == 0)
                            <p>// Email  : <b>{{$data->user->email}}</b></p>
                        @endif
                    @endif
                    <p>// Descrição : <b>{{$data->descricao}}</b></p>
                @elseif($data->premium == 0)
                    <p>// Anunciante :
                        <b>
                            <a href="../user/{{$data->user_id}}" class="cor_black">
                                {{$data->user->name or ''}}
                            </a>
                        </b>
                    </p>
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
                     </p>--}}
                    @if(Auth::user())
                        @if(($data)->user->email == 0)
                            <p>// Email  : <b>{{$data->user->email}}</b></p>
                        @endif
                    @endif
                    <p>// Descrição : <b>{{$data->descricao}}</b></p>
                @endif
            </div>
        </section>

        <section id="destaque">
            <h1 class="fontzero">Nossos Produtos em Destaque</h1>

            <span class="titulo">
                <h3>
                    <i class="fa fa-bullhorn fa-1x"></i> Anúncios Relacionados
                </h3>
            </span>

            <hr class="style12">
            @forelse(\App\Models\Anuncio::where('categoria_id', $data->categoria->id)->orderByRaw('RAND()')->take(4)->get() as $z => $value)
                <article class="item">
                    <h2 class="fontzero">Outros Anuncios</h2>

                    <p class="sub_artigo">{{$value->titulo}}
                    </p>
                    <a href="{{url ('anuncio')}}/{{$value->id}}">
                        <img src="{{$value->fotos->base64 or ''}}" class="foto fade" width="250"src="" alt="Imagem">
                    </a>
                    <p class="preco">
                        R$ 2,000.000
                        <span class="cor_black" style="font-size:13px;"> /animal  </span>
                    </p>
                    <p class="desc_artigo">
                    </p>
                    <div class="data">
                        <date><i class="fa fa-calendar"></i> {{$value->created_at->format('d/m/ Y')}}</date>
                        <span class="estado">
                        <a class="cor_black">{{$value->uf->uf}} - {{$value->uf->sigla}}</a> <i class="fa fa-map-marker fa-1x"></i>
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
@endsection