<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Uf extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['uf', 'sigla'];

    public function uf()
    {
        return $this->hasOne(Uf::class, 'id', 'uf_id');
    }

}
