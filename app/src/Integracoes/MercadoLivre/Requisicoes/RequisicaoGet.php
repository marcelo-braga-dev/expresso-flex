<?php

namespace App\src\Integracoes\MercadoLivre\Requisicoes;

use App\Models\IntegracaoMercadoLivre;
use App\src\Integracoes\MercadoLivre\AutenticarAutorizar\Autorizar;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RequisicaoGet
{
    public function executar(DadosRequisicao $dadosRequisicao, string $link)
    {
        $integracaoMercadoLivre = new IntegracaoMercadoLivre();
        $token = $integracaoMercadoLivre->token($dadosRequisicao->senderId);

        if (empty($token)) return null;

        $dadosRequisicao->accessToken = $token->access_token;
        $dadosRequisicao->updatedAt = $token->updated_at;
        $dadosRequisicao->expiresIn = $token->expires_in;
        $dadosRequisicao->sellerId = $token->seller_id;
        $dadosRequisicao->refreshToken = $token->refresh_token;

        $this->verificarValidadeToken($dadosRequisicao);

        try {
            $client = new Client();

            $res = $client->request('GET', $link, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $dadosRequisicao->accessToken,
                ]
            ]);

            $json = $res->getBody();
            return json_decode($json, true);

        } catch (ClientException | \DomainException $exception) {
            throw new \DomainException($exception->getMessage());
        }
    }

    private function verificarValidadeToken($dadosRequisicao)
    {
        $validade = strtotime($dadosRequisicao->updatedAt) + $dadosRequisicao->expiresIn;

        if (time() > $validade) {
            try {
                $autorizar = new Autorizar();
                $autorizar->renovarAutorizacao($dadosRequisicao);
            } catch (\DomainException $exception) {
                modalErro($exception->getMessage());
            }
        }
    }
}
