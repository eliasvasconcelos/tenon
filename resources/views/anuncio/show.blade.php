<a href="../anuncio">Voltar</a>
@if($data->premium == 1)
        <h2>Anuncio premium</h2>
        <p>// ID do Anúncio : <b>{{$data->id}}</b></p>
        <p>// Titulo do Anúncio : <b>{{$data->titulo}}</b></p>
        <p>// ID de Anunciante : <b><a href="../perfil/{{$data->user_id}}">{{$data->user_id}}</a></b></p>
        <p>// Categoria Postada : <b><a href="../categoria/{{$data->categoria_id}}">{{$data->categoria_id}}</a></b></p>
        <p>// Descrição do Anuncio : <b>{{$data->descricao}}</b></p>
        <p>// ID do Estado : <b><a href="../estado/{{$data->uf_id}}">{{$data->uf_id}}</a></b></p>
        <p>// Criado em : <b>{{$data->created_at}}</b></p>
        <p>// Atualizado em : <b>{{$data->updated_at}}</b></p>

@else
        <h2>Anuncio normal</h2>
        <p>// ID do Anúncio : <b>{{$data->id}}</b></p>
        <p>// Titulo do Anúncio : <b>{{$data->titulo}}</b></p>
        <p>// ID de Anunciante : <b><a href="../perfil/{{$data->user_id}}">{{$data->user_id}}</a></b></p>
        <p>// Categoria Postada : <b><a href="../categoria/{{$data->categoria_id}}">{{$data->categoria_id}}</a></b></p>
        <p>// Descrição do Anuncio : <b>{{$data->descricao}}</b></p>
        <p>// ID do Estado : <b><a href="../estado/{{$data->uf_id}}">{{$data->uf_id}}</a></b></p>
        <p>// Criado em : <b>{{$data->created_at}}</b></p>
        <p>// Atualizado em : <b>{{$data->updated_at}}</b></p>
@endif