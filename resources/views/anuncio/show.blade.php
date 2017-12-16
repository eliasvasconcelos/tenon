@extends('layouts.app')

@section('content')

    @if($data->premium == 1)
        <div class="col-md-12">
            <div class="alert alert-info">
                Eu sou premium
            </div>
        </div>
    @endif
    <div class="col-md-6">
        <a href="{{url('anuncio')}}">Voltar</a>
        @if($data->premium == 1)
            <h2> <b>{{$data->titulo}}</b></h2>
            <br />
            <a href="{{url ('anuncio')}}/{{$data->id}}">
                <img src="{{$data->fotos->base64 or ''}}" alt="Imagem" class="img" width="450"></a>

            <br />
            <h2>Album de Fotos</h2>
            @forelse($data->album as $z)
                {{$z->album->base64 or ''}}
                <img src="{{$z->base64 or ''}}" alt="Imagem" height="100" width="150">
            @empty
            @endforelse

        @elseif($data->premium == 0)
            <h2> <b>{{$data->titulo}}</b></h2>
            <br />
            <a href="{{url ('anuncio')}}/{{$data->id}}">
                <img src="{{$data->fotos->base64 or ''}}" alt="Imagem" class="img" width="450"></a>
            <br />
            <h2>Album de Fotos</h2>
            @forelse($data->album as $z)
                {{$z->album->base64 or ''}}
                <img src="{{$z->base64 or ''}}" alt="Imagem" height="100" width="150">
            @empty
            @endforelse
        @endif

    </div>
    <div class="col-md-6">
        @if($data->premium == 1)
            <h2>Anuncio premium</h2>

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
            @if(($data)->user->telefone == 0)
                <p> <b>Contato Indisponível</b></p>
            @else
                <button class="btn btn-danger" type="button">
                    Contato <span class="badge">{{$data->user->telefone or ''}}</span>
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
            @if(($data)->user->telefone == 0)
                <p> <b>Contato Indisponível</b></p>
            @else
                <button class="btn btn-danger" type="button">
                    Contato <span class="badge">{{$data->user->telefone or ''}}</span>
                </button>
            @endif
        @endif

    </div>

@endsection