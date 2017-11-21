<h1>Anuncio</h1>
<ul>
        @forelse($anuncio as $z)
                <li>{{$z->titulo}} // {{$z->descricao}}</li>
        @empty
                <li>Não há registro!</li>
        @endforelse
</ul>

<h1>Categoria</h1>

<ul>
        @forelse($data as $z)
                <li>{{$z->nome}} // {{$z->created_at}}</li>
        @empty
                <li>Não há registro!</li>
        @endforelse
</ul>