<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProdutoModel extends Model
{
    public $timestamps = false;

    protected $table = "produtos";
    protected $primaryKey = "id";
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'imagem',
    ];
}
