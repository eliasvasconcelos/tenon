<br>
<ul>
        @forelse($categoria as $z)
                <li style="display:inline;border:1px solid #ccc;padding:10px"><a href="categoria/{{$z->id}}">{{$z->nome}}</a></li>
        @empty
        <li>Não há registro!</li>
        @endforelse
</ul>

<h2>Anuncio Premium</h2>
<ul>
        @forelse($anuncioP as $z)
            <h3>{{$z->titulo}}</h3>
            <p><a href="anuncio/{{$z->id}}">{{$z->id}}</a> //{{$z->descricao}}</p>
            <b>Eu sou Premium</b> - criado em {{$z->created_at}}...ID PREMIUM = {{$z->premium}}
            <hr>
        @empty
        <li>Não há registro!</li>
        @endforelse
</ul>

<h2>Anuncio Normal</h2>
<ul>
        @forelse($anuncio as $z)
                <h3>{{$z->titulo}}</h3>
                <p><a href="anuncio/{{$z->id}}">{{$z->id}}</a> //{{$z->descricao}} </p>
                <b>Eu sou Normal</b> - criado em {{$z->created_at}}...ID PREMIUM = {{$z->premium}}
                <hr>
        @empty
                <li>Não há registro!</li>
        @endforelse
</ul>