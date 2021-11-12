<?php

namespace App\src\MercadoLivre;

use App\Models\IntegracaoMercadoLivre;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

class RecursosApiMercadoLivre
{
    public function infoRemessa(string $idShipping, string $sellerId)
    {
        $link = 'https://api.mercadolibre.com/shipments/' . $idShipping;

        $resposta = $this->comunicacaoGetAPI($link, $sellerId);

        return $resposta;
    }

    public function teste()
    {
        
        $sellerId = '143063860';
        
        $link = 'https://api.mercadolibre.com/orders/search?seller=' . $sellerId;
        $link = 'https://api.mercadolibre.com/orders/4122599137/shipments';
        $link = 'https://api.mercadolibre.com/shipment_labels?shipment_ids=MLB1683859000&savePdf=Y';

        $resposta = $this->comunicacaoGetAPI($link, $sellerId);

        return $resposta;
    }

    private function comunicacaoGetAPI(string $link, int $sellerId)
    {
        $client = new Client();

        $integracao = new IntegracaoMercadoLivre();

        $chaves = $integracao->query()
            ->where('seller_id', '=', $sellerId)
            ->first();

        if (empty($chaves)) {
            session()->flash('erro', 'Conta Mercado Livre #'.$sellerId.' não encontrado.');
            return;
        }

        $token = $chaves['access_token'];
        $intervalo = $chaves->expires_in;

        $timeValidade = strtotime($chaves->updated_at) + $intervalo;

        if (time() > $timeValidade) {
            $autenticacao = new AutenticacaoAutorizacaoMercadoLivre();

            $token = $autenticacao->renovarAutenticacao($sellerId);
        }

        try {
            $res = $client->request('GET', $link, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                ]
            ]);

            $json = $res->getBody();
            $resposta = json_decode($json, true);

        } catch (ClientException $exception) {
            exit('Erro ao comunicar com o Mercado Livre.');
        }

        return $resposta;
    }


}
