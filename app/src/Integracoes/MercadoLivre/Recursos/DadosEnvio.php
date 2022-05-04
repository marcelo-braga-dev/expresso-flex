<?php

namespace App\src\Integracoes\MercadoLivre\Recursos;

use App\src\Integracoes\MercadoLivre\Requisicoes\DadosRequisicao;
use App\src\Integracoes\MercadoLivre\Requisicoes\RequisicaoGet;

class DadosEnvio
{
    public function executar(DadosRequisicao $dadosRequisicao)
    {
        $link = 'https://api.mercadolibre.com/shipments/' . $dadosRequisicao->codigo;
        try {
            $requisicao = new RequisicaoGet();
            return $requisicao->executar($dadosRequisicao, $link);
        } catch (\DomainException $exception) {
            throw new \DomainException($exception->getMessage());
        }
    }
}
