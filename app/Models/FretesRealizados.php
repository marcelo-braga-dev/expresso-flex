<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FretesRealizados extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'pacotes_id',
        'entregador',
        'status',
        'regiao',
        'value'
    ];
}
