<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LojasClientes extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'status',
        'nome',
        'celular',
        'endereco'
    ];

    public function cadastrar(int $user_id, string $nome, string $celular, int $endereco)
    {
        $this->newQuery()
            ->create([
                'user_id' => $user_id,
                'nome' => $nome,
                'celular' => $celular,
                'endereco' => $endereco
            ]);
    }

    public function loja(int $id)
    {
        return print_pre($this->newQuery()
            ->find($id));
    }

    public function desativar(int $id)
    {
        $this->newQuery()
            ->where('id', '=', $id)
            ->where('user_id', '=', id_usuario_atual())
            ->update(['status' => false]);
    }

    public function getLojas(int $id)
    {
        return $this->newQuery()
            ->where('user_id', '=', $id)
            ->get();
    }
}
