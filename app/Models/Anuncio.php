<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anuncio extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'categoria_id', 'titulo', 'descricao', 'uf_id', 'premium'];

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }

    public function uf()
    {
        return $this->hasOne(Uf::class, 'id', 'uf_id');
    }
}
