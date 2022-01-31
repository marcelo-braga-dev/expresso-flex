<?php

namespace App\src\Pacotes\Origens\Pacotes;

use App\Models\Etiquetas;
use App\src\Pacotes\CadastrarPacote;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\Status\Coletado;

class CadastrarPacotesExrpessoFlex
{
    private string $origem = 'origem_expresso_flex';
    private $etiqueta;
    private int $idColeta;

    public function __construct(int $idEtiqueta, int $idColeta)
    {
        $this->etiqueta = $this->getEtiqueta($idEtiqueta);
        $this->idColeta = $idColeta;
    }

    private function getEtiqueta($id)
    {
        return Etiquetas::query()->where('id', '=', $id)->first();
    }

    public function cadastrar()
    {
        $coleta = $this->getColeta();

        $destinatario = $this->getDestinatario();

        $endereco = $this->getEndereco();

        $pacote = new CadastrarPacote($coleta, $destinatario, $endereco, $this->etiqueta->rastreio);
        $pacote->cadastrar();
    }

    private function getColeta(): Coleta
    {
        return new Coleta(id_usuario_atual(), $this->idColeta);
    }

    private function getDestinatario(): Destinatario
    {
        return new Destinatario($this->etiqueta->destinatarios_id,
            $this->etiqueta->user_id, null, new Coletado(), $this->origem);
    }

    private function getEndereco(): Endereco
    {
        return new Endereco($this->etiqueta->enderecos_id);
    }
}
