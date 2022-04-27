<?php

namespace App\src\Integracoes\MercadoLivre\ImportacaoExcel;

use App\Models\Etiquetas;
use App\src\Etiquetas\Etiqueta;
use App\src\Etiquetas\ExpressoFlex\EnderecoDestinatario;
use App\src\Pacotes\Destinatarios\CadastrarDestinatario;

class CadastrarEtiquetas
{
    private string $origem = 'mercado_livre';

    public function cadastrar(array $dados, $loja)
    {
        $qtdPacotes = 0;

        foreach ($dados as $dado) {
            if ($this->statusImportaveis($dado['status'])) {
                $etiqueta = new Etiqueta();
                $etiqueta->rastreio = $dado['codigo'];
                $etiqueta->idUsuario = id_usuario_atual();
                $etiqueta->loja = $loja;
                $etiqueta->origem = $this->origem;

                $etiqueta->idEndereco = $this->getEndereco($dado['endereco']);

                $dadosDestinatario = $dado['destinatario'];
                $destinatario = new CadastrarDestinatario($dadosDestinatario['nome'], null, $dadosDestinatario['documento']);
                $etiqueta->idDestinatario = $destinatario->cadastrar();

                $etiquetas = new Etiquetas();
                $res = $etiquetas->salvar($etiqueta);

                if ($res) $qtdPacotes++;
            }
        }

        if ($qtdPacotes) return modalSucesso("Foram cadastrados $qtdPacotes com sucesso!");
        modalErro('Nenhum pacote foi cadastrado.');
    }

    private function statusImportaveis($status): bool
    {
        return $status == 'Etiqueta impressa' ||
            $status == 'Pronto para coleta' ||
            $status == 'Etiqueta pronta para imprimir';
    }

    private function getEndereco($dados)
    {
        $endereco = new EnderecoDestinatario();
        $endereco->cep($dados['cep']);
        $endereco->enderecoCompleto($dados['endereco']);
        $endereco->cidade($dados['cidade']);
        $endereco->estado($dados['cidade']);

        return $endereco->salvar();
    }
}
