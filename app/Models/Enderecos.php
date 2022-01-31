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
            'longitude'
        ];

    public function cadastrar(Endereco $dados)
    {
        $endereco = $this->newQuery()
            ->create([
                'cep' => $dados->getCep(),
                'rua' => $dados->getRua(),
                'numero' => $dados->getNumero(),
                'complemento' => $dados->getComplemento(),
                'bairro' => $dados->getBairro(),
                'cidade' => $dados->getCidade(),
                'estado' => $dados->getEstado(),
                'latitude' => $dados->getLatitude(),
                'longitude' => $dados->getLongitude(),
            ]);

        return $endereco->id;
    }
}
