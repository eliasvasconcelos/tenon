<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comentario extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['user_id', 'anuncio_id', 'titulo', 'mensagem', 'status_id'];

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}