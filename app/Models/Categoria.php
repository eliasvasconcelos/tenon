<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['nome', 'categoria_id'];

    public function categoria()
    {
        return $this->hasOne($this, 'id', 'categoria_id');
    }
}
