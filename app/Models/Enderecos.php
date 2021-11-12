<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =
        [
            'cep',
            'rua',
            'numero',
            'complemento',
            'bairro',
            'cidade',
            'estado',
            'latitude',
            'longitude'

        ];
}
