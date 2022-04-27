<?php

namespace App\src\Integracoes\MercadoLivre\ImportacaoExcel;

class UploadArquivoExcel
{
    public function upload($request)
    {
        if ($request->hasFile('arquivo')) {
            $file = $request->file('arquivo');
            if ($file->isValid()) {
                return $this->armazenaArquivo($file);
            }
        }
        throw new \DomainException('Arquivo não encontrado');
    }

    public function deletar(string $path)
    {
        unlink($path);
    }

    private function armazenaArquivo($file)
    {
        $extension = $file->getClientOriginalExtension();
        if ($extension != 'xlsx') throw new \DomainException('Arquivo Inválido');

        return $file->move(storage_path('importacao'), uniqid() . '.' . $extension);
    }
}
