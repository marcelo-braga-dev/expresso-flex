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

    public function criar($idPacote, $status, $regiao, $preco)
    {
        $this->newQuery()
        ->create([
            'user_id' => id_usuario_atual(),
            'pacotes_id' => $idPacote,
            'status' => $status,
            'regiao' => $regiao,
            'value' => $preco
        ]);
    }
}
