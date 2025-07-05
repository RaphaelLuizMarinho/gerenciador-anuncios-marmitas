<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Refeicao extends Model
{
    use HasFactory;
    protected $table = "refeicao";
    protected $fillable = [
        'nome',
        'descricao',
        'quantidade',
        'data_fabricacao',
        'data_validade',
        'igredientes',
        'local_retirada',
        'modo_armazenamento',
    ];
}
