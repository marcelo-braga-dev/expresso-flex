<?php

namespace App\Models;

use App\src\Etiquetas\Etiqueta;
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

    public function salvar(Etiqueta $dados)
    {
        $novo = new Novo();

        DB::beginTransaction();
        try {
            $etiqueta = $this->newQuery()
                ->create([
                    'user_id' => $dados->idUsuario,
                    'rastreio' => $dados->rastreio,
                    'status' => $novo->getStatus(),
                    'destinatarios_id' => $dados->idDestinatario,
                    'enderecos_id' => $dados->idEndereco,
                    'lojas_id' => $dados->loja,
                    'origem' => $dados->origem
                ]);

            DB::commit();

            session()->flash('sucesso', 'Etiqueta(s) cadastrada com sucesso.');

            return $etiqueta->id;
        } catch (QueryException $e) {
            DB::rollback();
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
            ->where([
                ['origem', '=', $origem],
                ['user_id', '=', id_usuario_atual()]
            ])->paginate(10);
    }
}
