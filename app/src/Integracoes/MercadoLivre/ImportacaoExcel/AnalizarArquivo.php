<?php

namespace App\src\Integracoes\MercadoLivre\ImportacaoExcel;

use Shuchkin\SimpleXLSX;

class AnalizarArquivo
{
    public function executar(string $path)
    {
        $xlsx = SimpleXLSX::parse($path);
        $rows = $xlsx->rows();

        $dados = [];

        foreach ($rows as $index => $row) {
            if ($index >= 3)
                $dados[] = [
                    'codigo' => $row[0],
                    'status' => $row[2],
                    'metodo_entrega' => $row[27],
                    'destinatario' => [
                        'nome' => $row[20],
                        'documento' => $row[21],
                    ],
                    'endereco' => [
                        'cep' => $row[25],
                        'endereco' => $row[22],
                        'cidade' => $row[23],
                        'estado' => $row[24]
                    ]
                ];
        }

        if (empty($dados)) modalErro('Não há pacote para importar');

        return $dados;
    }
}
