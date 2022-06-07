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

    public function read($request)
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
            modalErro($e->getMessage());
            throw new \DomainException();
        }
    }

    public function armazenar($dados, $loja)
    {
        try {
            $etiquetas = new CadastrarEtiquetas();
            $etiquetas->cadastrar($dados, $loja);
        } catch (\DomainException $e) {
            modalErro($e->getMessage());
        }
    }
}
