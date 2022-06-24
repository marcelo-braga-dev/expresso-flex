<?php

namespace App\src\Importacao;

use App\src\Integracoes\MercadoLivre\ImportacaoExcel\AnalizarArquivo;
use App\src\Integracoes\MercadoLivre\ImportacaoExcel\CadastrarEtiquetas;
use App\src\Integracoes\MercadoLivre\ImportacaoExcel\UploadArquivoExcel;

class ImportacaoMercadoLivre
{
    private $path;

    public function __construct()
    {
        $this->path = '';
    }

    public function cadastrar($request, $loja)
    {
        $dados = $this->read($request);
        $etiquetas = new CadastrarEtiquetas();

        return $etiquetas->cadastrar($dados, $loja);
    }

    private function read($request)
    {
        $uploadArquivoExcel = new UploadArquivoExcel();

        try {
            $this->path = $uploadArquivoExcel->upload($request);
            $analizarArquivo = new AnalizarArquivo();

            $dados = $analizarArquivo->executar($this->path);
            $uploadArquivoExcel->deletar($this->path);

            return $dados;
        } catch (\DomainException $e) {
            if ($this->path) $uploadArquivoExcel->deletar($this->path);
            throw new \DomainException($e->getMessage());
        }
    }
}
