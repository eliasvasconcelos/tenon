<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['rua', 'cep', 'bairro', 'casa', 'numero', 'user_id', 'uf_id', 'logradouro'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'id');
    }
}
