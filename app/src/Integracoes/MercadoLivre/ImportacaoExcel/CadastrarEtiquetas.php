<?php

namespace App\src\Integracoes\MercadoLivre\ImportacaoExcel;

use App\Models\Etiquetas;
use App\Models\Pacotes;
use App\src\Etiquetas\Etiqueta;
use App\src\Etiquetas\ExpressoFlex\EnderecoDestinatario;
use App\src\Pacotes\Destinatarios\CadastrarDestinatario;

class CadastrarEtiquetas
{
    private string $origem = 'mercado_livre';

    public function cadastrar(array $dados, $loja)
    {
        $qtdPacotes = 0;
        $error = 0;

        foreach ($dados as $index => $dado) {
            if ($dado['importar']) {
                if ($this->isExists($dado['rastreio'])) {

                    $etiqueta = new Etiqueta();
                    $etiqueta->rastreio = $dado['rastreio'];
                    $etiqueta->idUsuario = id_usuario_atual();
                    $etiqueta->loja = $loja;
                    $etiqueta->origem = $this->origem;

                    try {
                        $etiqueta->idEndereco = $this->getEndereco($dado['endereco']);

                        $dadosDestinatario = $dado['destinatario'];
                        $destinatario = new CadastrarDestinatario($dadosDestinatario['nome'], null, $dadosDestinatario['documento']);
                        $etiqueta->idDestinatario = $destinatario->cadastrar();

                        $etiquetas = new Etiquetas();
                        $res = $etiquetas->salvar($etiqueta);

                        if ($res) $qtdPacotes++;
                    } catch (\TypeError $e) {
                        $error++;
                    }
                } else $dados[$index]['existe'] = true;
            }
        }

        return $dados;
    }

    private function getEndereco($dados)
    {
        $endereco = new EnderecoDestinatario();
        $endereco->cep($dados['cep']);
        $endereco->enderecoCompleto($dados['endereco']);
        $endereco->cidade($dados['cidade']);
        $endereco->estado($dados['estado']);

        return $endereco->salvar();
    }

    private function isExists($rastreio): bool
    {
        return !(new Etiquetas())->newQuery()
            ->where('rastreio', '=', $rastreio)
            ->exists();
    }
}
