@extends('layouts.app')

@section('content')
<h2>Anuncio</h2>
{{\App\Models\Anuncio::count()}}
Anuncios na Plataforma <br />
@forelse($anuncio as $z)
    <a href="anuncio/{{$z->id}}"><img src="  {{$z->fotos->base64 or ''}} " alt="Imagem" width="250"></a>
        <br />
        <a href="anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}
        <br />Postado por: <b>{{$z->user->name or ''}}</b>
        <br />Data: <b>{{$z->user->created_at or ''}}</b>
    <br/>
    <hr>
@empty
   Não há registro!
@endforelse

@if($anuncio)
    @if($anuncio->links())
        {!! $anuncio->links() !!}
    @else

    @endif
@endif
@endsection