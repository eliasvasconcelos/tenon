<form id="form-categoria" method="post" class="form"><br/>
    {!! csrf_field() !!}
    <input type="hidden" id="categoria_id" name="categoria_id" value="1">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="form-group">
            <div class="input-group">
                <div class="input-group-addon">Categoria</div>
                <input class="form-control" id="nome" name="nome" placeholder="Categoria" value="">
            </div>
        </div>
    </div>
    <input type="submit" value="enviar">
    <a class="btn btn-success" onclick="save('categoria', '{{url('categoria')}}');"><i
                class="fa fa-save"></i>
        Salvar
    </a>
</form>