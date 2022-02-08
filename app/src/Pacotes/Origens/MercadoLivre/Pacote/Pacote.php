<?php

namespace App\src\Pacotes\Origens\MercadoLivre\Pacote;

use App\Models\Pacotes;

class Pacote
{
    private PacoteImportado $etiqueta;
    private string $origem;

    public function __construct(string $origem)
    {
        $this->etiqueta = new PacoteImportado();
        $this->origem = $origem;
    }

    public function cadastrar($dados)
    {
        if ($this->verificarDuplicidade($dados['id'], $this->origem)) {
            session()->flash('erro', 'Pacote já cadastrado.');

            return;
        }

        if ($this->etiqueta->verificar($dados['id'], $this->origem)) {
            $this->etiqueta->cadastrar($dados, $this->origem);

            return;
        }

        $cadastrarPacote = new CadastrarPacote();
        $cadastrarPacote->cadastrar($dados, $this->origem);
    }

    private function verificarDuplicidade($codigo): bool
    {
        $pacotes = new Pacotes();

        return $pacotes->newQuery()
            ->where([
                ['codigo', '=', $codigo],
                ['origem', '=', $this->origem]
            ])->exists();
    }


}
