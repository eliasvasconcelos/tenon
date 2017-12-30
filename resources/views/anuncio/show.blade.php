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
                <a href="{{url('user')}}/{{$data->user->id}}" class="cor_black">
                    <span style="background-color:#f5f5f5;border:1px dotted #eee;padding:5px 20px;">
                     Meu perfil
                    </span>
                </a>
            </div>
        </section>
{{--
        <section id="default2" style="background: url('http://www.ncsolucoes.com.br//wp-content/uploads/2017/03/agro_business.jpg') fixed center;">
--}}
        <section id="default2">


        <div class="img_anuncio left">
            @if($data->premium == 1)
                    <h3>{{$data->titulo}}</h3>
                    <br />
                <a href="{{url ('anuncio')}}/{{$data->id}}">
                    <img src="{{$data->fotos->base64 or ''}}" alt="Imagem" class="img"  width="600"></a>

                <br /><br />
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
        <div class="bg_cinza right" style="width: 35%;padding: 20px 30px 40px">

            @if($data->premium == 1)
                <h3>Anuncio premium</h3>

                <p>// ID do Anúncio : <b>{{$data->id}}</b></p>
                <p>// Titulo do Anúncio : <b>{{$data->titulo}}</b></p>
                <p>// <b>
                    @if($data->user->tipo_id == "2" || $data->user->tipo_id == "4")
                        Sou Pessoa Jurídica
                    @elseif($data->user->tipo_id == '3')
                        Sou Pessoa Física
                    @elseif($data->user->tipo_id == '1')
                        Sou da Equipe
                    @endif
                </b>
            </p>
            <p>// Anunciante :
                <b>
                    <a href="../user/{{$data->user_id}}">
                        {{$data->user->name or ''}}
                    </a>
                </b>
            </p>
            <p>// Email  : <b>{{$data->user->email}}</b></p>
            <p>// Categoria Postada : <b><a href="../categoria/{{$data->categoria_id}}">{{$data->categoria->nome or ''}}</a></b></p>
            <p>// Descrição do Anuncio : <b>{{$data->descricao}}</b></p>
            <p>// Estado : <b><a href="../estado/{{$data->uf_id}}">{{$data->uf->uf or ''}} - {{$data->uf->sigla or ''}}</a></b></p>
            <p>// Criado em : <b>{{$data->created_at}}</b></p>
            <p>// Atualizado em : <b>{{$data->updated_at}}</b></p>
            @if(Auth::user())
                @if(($data)->user->telefone == 0)
                    <p> <b>Contato Indisponível</b></p>
                @else
                    <button class="btn btn-danger" type="button">
                        Contato <span class="badge">{{$data->user->telefone or ''}}</span>
                    </button>
                @endif
            @else
                <button class="btn btn-danger" type="button">
                    Contato
                </button>
            @endif

            @elseif($data->premium == 0)
                <h2>Anuncio normal</h2>

                <p>// ID do Anúncio : <b>{{$data->id}}</b></p>
                <p>// Titulo do Anúncio : <b>{{$data->titulo}}</b></p>
                <p>// <b>
                        @if($data->user->tipo_id == "2" || $data->user->tipo_id == "4")
                            Sou Pessoa Jurídica
                        @elseif($data->user->tipo_id == '3')
                            Sou Pessoa Física
                        @elseif($data->user->tipo_id == '1')
                            Sou da Equipe
                        @endif
                    </b>
                </p>
                <p>// Anunciante :
                    <b>
                        <a href="../user/{{$data->user_id}}">
                            {{$data->user->name or ''}}
                        </a>
                    </b>
                </p>
                <p>// Email  : <b>{{$data->user->email}}</b></p>
                <p>// Categoria Postada : <b><a href="../categoria/{{$data->categoria_id}}">{{$data->categoria->nome or ''}}</a></b></p>
                <p>// Descrição do Anuncio : <b>{{$data->descricao}}</b></p>
                <p>// Estado : <b><a href="../estado/{{$data->uf_id}}">{{$data->uf->uf or ''}} - {{$data->uf->sigla or ''}}</a></b></p>
                <p>// Criado em : <b>{{$data->created_at}}</b></p>
                <p>// Atualizado em : <b>{{$data->updated_at}}</b></p>
                @if(Auth::user())
                    @if(($data)->user->telefone == 0)
                        <p> <b>Contato Indisponível</b></p>
                    @else
                        <button class="btn btn-danger" type="button">
                            Contato <span class="badge">{{$data->user->telefone or ''}}</span>
                        </button>
                    @endif
                    @else
                    <button class="btn btn-danger" type="button">
                        Contato
                    </button>
                @endif
            @endif

        </div>

        </section>
    </main>
@endsection