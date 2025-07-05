<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituicao extends Authenticatable
{
    use HasFactory;
    use HasApiTokens, Notifiable;
    protected $table = "instituicao";
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
        'crn_responsavel',
        'status_recebimento',
    ];
    protected $hidden = ['senha'];
}
