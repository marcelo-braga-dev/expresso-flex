<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinatarioRecebedor extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =
    [
        'pacotes_id',
        'recebedor',
        'nome',
        'documento',
        'obsevacoes',
        'img_pacote',
    ];
}
