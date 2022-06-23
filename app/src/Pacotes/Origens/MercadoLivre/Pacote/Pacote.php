<?php

namespace App\src\Pacotes\Origens\MercadoLivre\Pacote;

use App\Models\Pacotes;

class Pacote
{
    private string $origem;

    public function __construct(string $origem)
    {
        $this->origem = $origem;
    }

    public function cadastrar($dados)
    {
        if ($this->verificarDuplicidade($dados['id'])) {
            throw new \DomainException('Pacote já cadastrado.');
        }

        $etiqueta = new PacoteImportado($dados['id'], $this->origem);
        if ($etiqueta->verificar()) {
            return $etiqueta->cadastrar($dados, $this->origem);
        }
        return (new CadastrarPacote())->cadastrar($dados, $this->origem);
    }

    private function verificarDuplicidade($codigo): bool
    {
        return (new Pacotes())->newQuery()
            ->where([
                ['codigo', '=', $codigo],
                ['origem', '=', $this->origem]
            ])->exists();
    }
}
