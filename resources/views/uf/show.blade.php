@extends('layouts.app')

@section('content')
<h2>Anuncios</h2>

    {{$data->uf}} - {{$data->sigla}}
        <br>
    Total de Anuncios <b>
    {{\App\Models\Anuncio::where('uf_id', $data->id)->count()}}</b> para <b>{{$data->uf}}</b>

<hr>
@forelse($anuncio as $z)

    <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
    <br/>
        <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}
        <br />Postado por: <b>{{$z->user->name or ''}}</b>
        <br />Data: <b>{{$z->user->created_at or ''}}</b>
        <img src="">
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