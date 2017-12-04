<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<h1>Anuncio</h1>
<ul>
    @forelse($anuncio as $z)
        <li><a href="anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}</li>
    @empty
    <li>Não há registro!</li>
    @endforelse
</ul>

@if($anuncio)
    @if($anuncio->links())
        {!! $anuncio->links() !!}
    @else

    @endif
@endif