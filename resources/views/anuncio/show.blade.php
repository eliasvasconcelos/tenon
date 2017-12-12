@extends('layouts.app')

@section('content')
        <a href="../anuncio">Voltar</a>
@if($data->premium == 1)
        <h2>Anuncio premium</h2>
        <p>// ID do Anúncio : <b>{{$data->id}}</b></p>
        <p>// Titulo do Anúncio : <b>{{$data->titulo}}</b></p>
        <p>// <b>
                        @if($data->user->tipo_id == '2')
                                Sou Pessoa Jurídica
                        @elseif($data->user->tipo_id == '3')
                                Sou Pessoa Física
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
        <p>// Album : <b>{{$anuncio_foto->fotos}}</b></p>

@else
        <h2>Anuncio normal</h2>
        <p>// ID do Anúncio : <b>{{$data->id}}</b></p>
        <p>// Titulo do Anúncio : <b>{{$data->titulo}}</b></p>
        <p>// <b>
                        @if($data->user->tipo_id == '2')
                                Sou Pessoa Jurídica
                        @elseif($data->user->tipo_id == '3')
                                Sou Pessoa Física
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
@endif
@endsection