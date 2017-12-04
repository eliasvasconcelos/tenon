<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<h2>Buscar anuncios</h2>
<form action="{{url('pesquisa')}}" method="post">
    {!! csrf_field() !!}
    <input type="text" name="texto" placeholder="Digite aqui...">
    <select name="estado">@forelse($estado as $z)
            <option>{{$z->uf}}</option>
        @empty
            <option>Não há registro!</option>
        @endforelse
    </select>
    <select name="categoria">@forelse($categoria as $z)
            <option>{{$z->nome}}</option>
        @empty
            <option>Não há registro!</option>
        @endforelse
    </select>
    <input type="submit" value="buscar">
</form>
<br/>
<hr>
<h2>Categorias</h2>
<ul>
        @forelse($categoria as $z)
                <li style="display:inline;border:1px solid #ccc;padding:10px"><a href="categoria/{{$z->id}}">{{$z->nome}}</a></li>
        @empty
        <li>Não há registro!</li>
        @endforelse
</ul>
<br/>
<hr>
<h2>Anuncio Premium</h2>
<ul>
        @forelse($anuncioP as $z)
            <h3>{{$z->titulo}}</h3>
            <img src="">
            <p><a href="anuncio/{{$z->id}}">{{$z->id}}</a> //{{$z->descricao}}</p>
            <b>Eu sou Premium</b> - criado em {{$z->created_at}}...ID PREMIUM = {{$z->premium}}
            <hr>
        @empty
        <li>Não há registro!</li>
        @endforelse
</ul>
<br/>
<hr>
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