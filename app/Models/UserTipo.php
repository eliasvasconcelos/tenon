<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserTipo extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'sobrenome', 'email', 'password', 'cpf', 'cnpj', 'telefone','foto_perfil','razao'];

}
