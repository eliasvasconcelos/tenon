<h1>Anuncio</h1>
<ul>
    @forelse($anuncio as $z)
        <li>{{$z->titulo}} // {{$z->descricao}}</li>
    @empty
        <li>Não há registro!</li>
    @endforelse
</ul>