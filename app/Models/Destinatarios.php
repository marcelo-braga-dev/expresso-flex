<?php

namespace App\Models;

use App\src\Pacotes\Destinatarios\Destinatario;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinatarios extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nome',
        'telefone',
        'cpf'
    ];

    public function cadastrar(Destinatario $destinatario)
    {
        $destinatario = $this->newQuery()
            ->create([
                'nome' => $destinatario->getNome(),
                'telefone' => $destinatario->getTelefone(),
                'cpf' => $destinatario->getDocumento()
            ]);

        return $destinatario->id;
    }

    public function getDestinatario(int $id)
    {
        return $this->newQuery()
            ->where('id', '=', $id)
            ->first();
    }
}
