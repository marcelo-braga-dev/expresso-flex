<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoRetiradas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'cep',
        'entregador',
        'loja',
        'status',
        'texto'
    ];
}
