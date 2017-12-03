<h1>Anuncio</h1>
<ul>
    @forelse($anuncio as $z)
        <li><a href="anuncio/{{$z->id}}">{{$z->titulo}}</a> // {{$z->descricao}}</li>
    @empty
    <li>Não há registro!</li>
    @endforelse
</ul>