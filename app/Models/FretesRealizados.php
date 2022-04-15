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

    public function cadastrar($idUsuario, $idPacote, $idEntregador, $status, $regiao, $value)
    {
        $this->newQuery()
            ->create([
                'user_id' => $idUsuario,
                'pacotes_id' => $idPacote,
                'entregador' => $idEntregador,
                'status' => $status,
                'regiao' => $regiao,
                'value' => $value
            ]);
    }
}
