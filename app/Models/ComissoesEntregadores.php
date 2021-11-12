<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComissoesEntregadores extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'user_id',
        'pacotes_id',
        'status',
        'regiao',
        'value'
    ];
}
