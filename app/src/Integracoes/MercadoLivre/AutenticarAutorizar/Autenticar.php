<?php

namespace App\src\Integracoes\MercadoLivre\AutenticarAutorizar;

class Autenticar extends DadosIntegracao
{
    public function getUrl(): string
    {
        $idCliente = $this->getAppId();
        $urlRetorno = $this->getUrlRetorno();

        return 'https://auth.mercadolivre.com.br/authorization?response_type=code&client_id=' .
            $idCliente . '&redirect_uri=' . $urlRetorno;
    }
}
