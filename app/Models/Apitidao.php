<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apitidao extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['nome', 'categoria_id', 'sigla'];

    public function categoria()
    {
        return $this->hasOne($this, 'id', 'categoria_id');
    }
    public function anuncios()
    {
        return $this->hasMany(Anuncio::class, 'id', 'id');
    }
}
