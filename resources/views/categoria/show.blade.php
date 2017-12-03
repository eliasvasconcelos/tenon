
<h3>{{$data->nome}}</h3>


<li>
    @forelse($data as $z)
        {{$data->categoria_id}}
         @empty
    @endforelse
</li>