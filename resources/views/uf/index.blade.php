<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<h2>Estados anuncios</h2>
<ul>
@forelse($data as $z)
        <li>
            <a href="../estado/{{$z->id}}">{{$z->uf}}</a>
        </li>
    @empty
    Nenhum estado cadastrado!!
@endforelse
</ul>