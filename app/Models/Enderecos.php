<?php

namespace App\Models;

use App\src\Enderecos\Endereco;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable =
        [
            'cep',
            'rua',
            'numero',
            'complemento',
            'bairro',
            'cidade',
            'estado',
            'latitude',
            'longitude',
            'endereco_completo'
        ];

    public function cadastrar(Endereco $dados)
    {
        $endereco = $this->newQuery()
            ->create($this->dados($dados));

        return $endereco->id;
    }

    public function atualizar(int $id, Endereco $dados)
    {
        $this->newQuery()
            ->findOrFail($id)
            ->update($this->dados($dados));
    }

    private function dados(Endereco $dados): array
    {
        return [
            'cep' => $dados->getCep(),
            'endereco_completo' => $dados->getEnderecoCompleto(),
            'rua' => $dados->getRua(),
            'numero' => $dados->getNumero(),
            'complemento' => $dados->getComplemento(),
            'bairro' => $dados->getBairro(),
            'cidade' => $dados->getCidade(),
            'estado' => $dados->getEstado(),
            'latitude' => $dados->getLatitude(),
            'longitude' => $dados->getLongitude(),
        ];
    }
}
