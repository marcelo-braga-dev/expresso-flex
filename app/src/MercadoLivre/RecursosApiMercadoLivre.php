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

        $sellerId = '443790977';

        $link = 'https://api.mercadolibre.com/orders/search?seller=' . $sellerId;
        $link = 'https://api.mercadolibre.com/orders/4122599137/shipments';
        $link = 'https://api.mercadolibre.com/shipment_labels?shipment_ids=MLB1683859000&savePdf=Y';
        $link = 'https://api.mercadolibre.com/users/' . $sellerId;

        $res = $this->comunicacaoGetAPI($link, $sellerId);

        $dados['nickname'] = $res['nickname'];
        $dados['thumbnail'] = $res['thumbnail']['picture_url'];
        $dados['brand_name'] = $res['company']['brand_name'];

        print_pre($dados);
        ///return $resposta;
    }

    private function comunicacaoGetAPI(string $link, int $sellerId)
    {
        $client = new Client();

        $integracao = new IntegracaoMercadoLivre();

        $chaves = $integracao->query()
            ->where('seller_id', '=', $sellerId)
            ->first();

        if (empty($chaves)) {
            session()->flash('erro', 'Conta Mercado Livre #' . $sellerId . ' não encontrado.');
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

    public function getInfoContaMeLi($sellerId)
    {
        $dados = [];

        $link = 'https://api.mercadolibre.com/users/' . $sellerId;

        $res = $this->comunicacaoGetAPI($link, $sellerId);
        
        $dados['nickname'] = $res['nickname'];      
        $dados['thumbnail'] = !empty($res['thumbnail']) ? $res['thumbnail']['picture_url'] : '';
        $dados['brand_name'] = !empty($res['company']['brand_name']) ? $res['company']['brand_name'] : '';

        return $dados;
    }

    public function atualizarInfoContas()
    {
        $clsContas = new IntegracaoMercadoLivre();
        $contas = $clsContas->get('seller_id');

        foreach ($contas as $conta) {
            $dados = $this->getInfoContaMeLi($conta->seller_id);

            $clsContas->where('seller_id', '=', $conta->seller_id)
                ->update([
                    'nickname' => $dados['nickname'],
                    'thumbnail' => $dados['thumbnail'],
                    'brand_name' => $dados['brand_name']
                ]);

            usleep(1000);
        }

    }
}
