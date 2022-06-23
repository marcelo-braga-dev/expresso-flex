<?php

namespace App\Models;

use App\src\Coletas\AbrirColeta;
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

    public function criar(AbrirColeta $dados)
    {
        return $this->newQuery()
            ->create([
                'user_id' => $dados->getIdUsuario(),
                'cep' => $dados->getCep(),
                'entregador' => $dados->getEntregador(),
                'loja' => $dados->getIdLoja(),
                'status' => $dados->getStatus()
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
