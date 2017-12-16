@extends('layouts.app')

@section('content')
<h3>Categoria Selecionada  <a href="{{url('categoria')}}">Voltar</a></h3>
<hr>
Total de Anuncios <b>
{{\App\Models\Anuncio::where('categoria_id', $data->id)->count()}}</b> para categoria <b>{{$data->nome}}</b>
<h2>Anuncios para categoria {{$data->nome}}</h2>
<ul>
    @forelse($data->anuncios as $z)

        <a href="../anuncio/{{$z->id}}"><img src="{{$z->fotos->base64 or ''}}" alt="Imagem" width="200"></a>
        <br/>
        <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a>
        {{$z->descricao}}
        <hr>
         @empty
        Sem registro!!
    @endforelse
</ul>

@endsection