<?php

namespace App\src\Integracoes\MercadoLivre\AutenticarAutorizar;

use App\Models\IntegracaoMercadoLivre;
use App\src\Integracoes\MercadoLivre\Requisicoes\DadosRequisicao;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class Autorizar extends DadosIntegracao
{
    public function renovarAutorizacao(DadosRequisicao $dadosRequisicao)
    {
        $client = new Client();
        $integracao = new IntegracaoMercadoLivre();

        try {
            $resposta = $client->request(
                'POST',
                'https://api.mercadolibre.com/oauth/token?' .
                'grant_type=refresh_token' .
                '&client_id=' . $this->getAppId() .
                '&client_secret=' . $this->getClientSecret() .
                '&refresh_token=' . $dadosRequisicao->refreshToken
            );

            $json = $resposta->getBody();
            $dados = json_decode($json, true);

            $integracao->newQuery()
                ->where('seller_id', '=', $dadosRequisicao->sellerId)
                ->update([
                    'access_token' => $dados['access_token'],
                    'refresh_token' => $dados['refresh_token'],
                    'expires_in' => $dados['expires_in']
                ]);

            $dadosRequisicao->accessToken = $dados['access_token'];
        } catch (ClientException $e) {
            throw new \DomainException("Conexão com o Mercado Livre Inválido.");
        }

    }
}
