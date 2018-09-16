<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anuncio extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'categoria_id', 'titulo', 'descricao', 'uf_id', 'status_pagamento', 'status_id','revisao','preco','tipo'];

    public function categoria()
    {
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }

    public function uf()
    {
        return $this->hasOne(Uf::class, 'id', 'uf_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function fotos()
    {
        return $this->hasOne(AnuncioFoto::class, 'anuncio_id', 'id');
    }

    public function album()
    {
        return $this->hasMany(AnuncioFoto::class, 'anuncio_id', 'id');
    }
}
