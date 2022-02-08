<?php

namespace App\Models;

use App\src\Etiquetas\Status\Novo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class Etiquetas extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'rastreio',
        'status',
        'destinatarios_id',
        'enderecos_id',
        'lojas_id',
        'origem'
    ];

    public function salvar(int $idEndereco, int $idDestinatario, string $rastreio, int $cliente, int $loja, string $origem)
    {
        $novo = new Novo();

        DB::beginTransaction();
        try {
            $etiqueta = $this->newQuery()
                ->create([
                    'user_id' => $cliente,
                    'rastreio' => $rastreio,
                    'status' => $novo->getStatus(),
                    'destinatarios_id' => $idDestinatario,
                    'enderecos_id' => $idEndereco,
                    'lojas_id' => $loja,
                    'origem' => $origem
                ]);

            DB::commit();

            session()->flash('sucesso', 'Etiqueta(s) cadastrada com sucesso.');

            return $etiqueta->id;
        } catch (QueryException $e) {
            DB::rollback();
            if ($e->getCode() == 23000) session()->flash('erro', 'Etiqueta já cadastrado');
        }
    }

    public function atualizarStatus(int $id, string $status)
    {
        $this->newQuery()
            ->where('id', '=', $id)
            ->update(['status' => $status]);
    }

    public function origem(string $origem)
    {
        return $this->newQuery()
            ->where('origem', '=', $origem)
            ->get();
    }
}
