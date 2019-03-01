@extends('layouts.admin')

@section('content')

    <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Gestão de Usuários</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <ul class="products-list product-list-in-box">
                    @forelse($data as $z)
                    <li class="item">
                        <div class="product-img">
                            <img class="img-circle" src="@if($z->foto_perfil == null) {{asset ('img/sem-foto.png')}} @else {{$z->foto_perfil}} @endif">
                        </div>
                        <div class="product-info">
                            <a href="javascript:void(0)" class="product-title">{{$z->name}} {{$z->sobrenome}} - <span class="label label-primary">@if($z->tipo_id == 1) Administrador @elseif($z->tipo_id == 2) Pessoa Física @elseif($z->tipo_id == 3) Logista @endif</span>

                                <span class="label label-@if($z->status == 1)success @elseif($z->status == 0)warning @elseif($z->status == 3)danger @endif pull-right">
                                    @if($z->status == 1) Ativado @elseif($z->status == 0) Desativado @elseif($z->status == 3) Banido @endif
                                </span></a>
                            <span class="product-description">
                                <p> Cadastrado em :<b>{{$z->created_at or ''}}</b> </p>
                                @if($z->premium == 1)
                                    <a class="cor_black" style="border-radius:5px;padding: 10px 20px;background-color: #c596ff;border:2px solid #f4f4f4" href="#">Premium</a> |
                                @endif
                                @if($z->status == '0')

                                    <a href="{{url ('painel/user')}}/{{$z->id}}/update?status=1"><span class="label label-success">Ativar</span></a> |
                                    <a href="{{url ('painel/user')}}/{{$z->id}}/delete" class="delete"><span class="label label-danger">Deletar</span></a>
                                @elseif($z->status == '1')
                                    <a href="{{url ('painel/user')}}/{{$z->id}}/update?status=0"><span class="label bg-purple">Banir</span></a> |
                                    <a href="{{url ('painel/user')}}/{{$z->id}}/update?status=2"><span class="label label-warning">Desativar</span></a>
                                    {{--
                                    <a class="cor_black" style="padding: 10px 20px;background-color: #ffc863;border:1px solid #e5e5e5" href="{{url ('anuncio')}}/{{$z->id}}/edit">Pendente</a> |
                                    --}}
                                @elseif($z->status == '0')
                                    <a href="{{url ('painel/user')}}/{{$z->id}}/update?status=1"><span class="label label-success">Ativar</span></a> |
                                @endif
                                @if($z->status == '2')
                                    <a href="{{url ('painel/user')}}/{{$z->id}}/update?status=1"><span class="label label-success">Ativar</span></a> |
                                    <a href="{{url ('painel/user')}}/{{$z->id}}/delete" class="delete"><span class="label label-danger">Deletar</span></a>
                                @endif
                            </span>
                        </div>
                    </li>
                    @empty
                        Não há registro!
                @endforelse
                </ul>
            </div>
            <div class="box-footer text-center">

            </div>
        </div>
    </div>

@endsection