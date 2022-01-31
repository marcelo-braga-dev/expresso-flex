<?php

namespace App\Models;

use App\src\Coletas\AceitarColeta;
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

    public function criar(AceitarColeta $dados)
    {
        $this->newQuery()
            ->create([
                'user_id' => $dados->idUsuario,
                'cep' => $dados->cep,
                'entregador' => $dados->entregador,
                'loja' => $dados->idLoja,
                'status' => $dados->status
            ]);
    }

    public function coleta(int $id)
    {
        return $this->newQuery()->find($id);
    }

    public function aletarStatus(int $id, string $status)
    {
        $this->newQuery()
            ->where('id', '=', $id)
            ->update([
                'status' => $status
            ]);
    }

}
