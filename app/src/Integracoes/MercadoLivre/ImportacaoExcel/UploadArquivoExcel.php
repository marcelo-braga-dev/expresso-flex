<?php

namespace App\src\Integracoes\MercadoLivre\ImportacaoExcel;

class UploadArquivoExcel
{
    public function upload($file)
    {
        return $file->move(storage_path('importacao'), uniqid() . '.xlsx');
    }

    public function deletar(string $path)
    {
        unlink($path);
    }
}
