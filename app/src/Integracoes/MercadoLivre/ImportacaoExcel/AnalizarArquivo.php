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
        $sessao = [];
        $coluna = [];


        foreach ($rows as $row) {
            if (empty($sessao)) {
                $sessao = $this->getSessao($row);
            }

            if (empty($coluna)) {
                $coluna = $this->indices($row, $sessao);
            }

            if (!empty($coluna)) {

                $dados[] = [
                    'codigo' => $row[$coluna['codigo']],
                    'status' => $row[$coluna['status']],
                    'metodo_entrega' => $row[$coluna['metodo_entrega']],
                    'destinatario' => [
                        'nome' => $row[$coluna['nome']],
                        'documento' => $row[$coluna['documento']],
                    ],
                    'endereco' => [
                        'cep' => $row[$coluna['cep']],
                        'endereco' => $row[$coluna['endereco']],
                        'cidade' => $row[$coluna['cidade']],
                        'estado' => $row[$coluna['estado']]
                    ]
                ];
                unset($dados[0]);
            }
        }

        if (empty($dados)) modalErro('Não há pacote para importar');

        return $dados;
    }

    private function getSessao($row): array
    {
        if ($row[0] != 'Vendas') return [];
        $sessao = [];

        foreach ($row as $index2 => $col) {
            if ($col) {
                $ini = $index2;
                $tag = $col;
                $i = 0;

                $sessao[$col] = [
                    'inicio' => $index2,
                    'fim' => $i,
                ];
            }
            $sessao[$tag]['fim'] = $i + $ini;
            $i++;
        }

        return $sessao;
    }

    private function indices($cols, $sessao)
    {
        if ($cols[0] != 'N.º de venda') return [];
        $dados = [];

        $campos = [
            'Vendas' => [
                'codigo' => 'N.º de venda',
                'status' => 'Status'
            ],
            'Envios' => [
                'metodo_entrega' => 'Forma de entrega',
            ],
            'Compradores' => [
                'nome' => 'Comprador',
                'documento' => 'CPF',
                'cep' => 'CEP',
                'endereco' => 'Endereço',
                'cidade' => 'Cidade',
                'estado' => 'Status'
            ]
        ];

        foreach ($cols as $index => $col) {
            foreach ($sessao as $indexSessao => $s) {
                if ($index >= $s['inicio'] && $index <= $s['fim']) {

                    foreach ($campos as $indexCampo => $campo) {
                        if ($indexCampo == $indexSessao) {
                            if (in_array($col, $campo)) {
                                $key = array_search($col, $campo);
                                $dados[$key] = $index;
                            }
                        }
                    }
                }
            }
        }

        return $dados;
    }

    private function cabecalho()
    {
        //foreach ($cols as $index => $col) {
        //    foreach ($sessao as $indexSessao => $s) {
        //        if ($index >= $s['inicio'] && $index <= $s['fim']) {
        //            $sdv[$indexSessao]
        //            [] =
        //                $col;
        //        }
        //    }
        //}
    }
}
