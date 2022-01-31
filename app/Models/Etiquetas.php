<?php

namespace App\Models;

use App\src\Etiquetas\Status\Novo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etiquetas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rastreio',
        'status',
        'destinatarios_id',
        'enderecos_id',
        'lojas_id'
    ];

    public function salvar(int $idEndereco, int $idDestinatario, string $rastreio, int $cliente, int $loja)
    {
        $novo = new Novo();

        $etiqueta = $this->newQuery()
            ->create([
                'user_id' => $cliente,
                'rastreio' => $rastreio,
                'status' => $novo->getStatus(),
                'destinatarios_id' => $idDestinatario,
                'enderecos_id' => $idEndereco,
                'lojas_id' => $loja
            ]);

        return $etiqueta->id;
    }

    public function atualizarStatus(int $id, string $status)
    {
        $this->newQuery()
            ->where('id', '=', $id)
            ->update(['status' => $status]);
    }
}
