<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doador extends Authenticatable
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    protected $table = "doador";
    protected $fillable = [
        'cnpj',
        'nome',
        'email',
        'senha',
        'telefone',
        'cep',
        'logradouro',
        'complemento',
        'bairro',
        'cidade',
        'uf',
    ];

    protected $hidden = ['senha'];
}
