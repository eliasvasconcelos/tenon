<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AnuncioFoto extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['anuncio_id', 'base64'];

    public function anuncio()
    {
        return $this->hasOne(Anuncio::class, 'id', 'anuncio_id');
    }
}
