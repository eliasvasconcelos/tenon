<?php

namespace App;

use App\Models\Anuncio;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'tipo_id', 'cpf', 'cnpj', 'razao', 'telefone', 'foto_perfil', 'loja_link', 'endereco_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function anuncios()
    {
        return $this->hasMany(Anuncio::class,'user_id','id');
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class,'user_id', 'id');
    }
}
