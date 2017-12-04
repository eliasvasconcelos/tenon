@if($data->premium == 1)
        <h2>Anuncio premium -> <a href="{{url('../anuncio')}}">Voltar</a></h2>
        <p>// ID do Anúncio : <b>{{$data->id}}</b></p>
        <p>// Titulo do Anúncio : <b>{{$data->titulo}}</b></p>
        <p>// Anunciante :
                <b>
                        <a href="../perfil/{{$data->user_id}}">
                                {{$data->user->name or ''}}
                        </a> :
                        @if($data->user->tipo->nome == 'PJ' or '')
                                eu sou Pessoa Jurídica
                        @else
                                eu sou Pessoa Física
                        @endif
                </b>
        </p>
        <p>// Categoria Postada : <b><a href="../categoria/{{$data->categoria_id}}">{{$data->categoria->nome or ''}}</a></b></p>
        <p>// Descrição do Anuncio : <b>{{$data->descricao}}</b></p>
        <p>// Estado : <b><a href="../estado/{{$data->uf_id}}">{{$data->uf->uf or ''}} - {{$data->uf->sigla or ''}}</a></b></p>
        <p>// Criado em : <b>{{$data->created_at}}</b></p>
        <p>// Atualizado em : <b>{{$data->updated_at}}</b></p>

@else
        <h2>Anuncio normal -> <a href="{{url('../anuncio')}}">Voltar</a></h2>
        <p>// ID do Anúncio : <b>{{$data->id}}</b></p>
        <p>// Titulo do Anúncio : <b>{{$data->titulo}}</b></p>
        <p>// Anunciante :
                <b>
                        <a href="../perfil/{{$data->user_id}}">
                                {{$data->user->name or ''}}
                        </a> :
                        @if($data->user->tipo->nome == 'PJ' or '')
                                eu sou Pessoa Jurídica
                        @else
                                eu sou Pessoa Física
                        @endif
                </b>
        </p>        <p>// Categoria Postada : <b><a href="../categoria/{{$data->categoria_id}}">{{$data->categoria->nome or ''}}</a></b></p>
        <p>// Descrição do Anuncio : <b>{{$data->descricao}}</b></p>
        <p>// Estado : <b><a href="../estado/{{$data->uf_id}}">{{$data->uf->uf or ''}} - {{$data->uf->sigla or ''}}</a></b></p>
        <p>// Criado em : <b>{{$data->created_at}}</b></p>
        <p>// Atualizado em : <b>{{$data->updated_at}}</b></p>
@endif