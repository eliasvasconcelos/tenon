
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

<h3>Categoria Selecionada -> {{$data->nome}}</h3>

<ul>
    @forelse($data->anuncios as $z)
        <li>
                <a href="../anuncio/{{$z->id}}">{{$z->titulo}}</a>
        </li>
         @empty
    @endforelse
</ul>
