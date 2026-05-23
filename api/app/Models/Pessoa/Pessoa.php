<?php

namespace App\Models\Pessoa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';

    protected $fillable = [
        'tipo',
        'nome_completo',
        'razao_social',
        'nome_fantasia',
        'cpf_cnpj',
        'email',
        'telefone',
        'whatsapp',
        'cep',
        'logradouro',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'status',
    ];
}
