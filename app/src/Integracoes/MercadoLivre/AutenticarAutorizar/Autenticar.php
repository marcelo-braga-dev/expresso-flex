<?php

namespace App\src\Integracoes\MercadoLivre\AutenticarAutorizar;

use App\Models\IntegracaoMercadoLivre;
use App\src\MercadoLivre\RecursosApiMercadoLivre;
use GuzzleHttp\Client;
use PHPUnit\Exception;

class Autenticar extends DadosIntegracao
{
    public function getUrl(): string
    {
        $idCliente = $this->getAppId();
        $urlRetorno = $this->getUrlRetorno();

        return 'https://auth.mercadolivre.com.br/authorization?response_type=code&client_id=' .
            $idCliente . '&redirect_uri=' . $urlRetorno;
    }

    // Autentica a conta no Mercado Livre
    public function autenticar(string $code)
    {
        $client = new Client();

        try {
            $res = $client->request('POST', 'https://api.mercadolibre.com/oauth/token', [
                'headers' => [
                    'accept' => 'application/json',
                    'content-type' => 'application/x-www-form-urlencoded'
                ],
                'form_params' => [
                    'grant_type' => 'authorization_code',
                    'client_id' => $this->getAppId(),
                    'client_secret' => $this->getClientSecret(),
                    'code' => $code,
                    'redirect_uri' => $this->getUrlRetorno(),
                ]
            ]);

            $json = $res->getBody();
            $resposta = json_decode($json, true);

            $this->salvarDadosIntegracao($resposta);
        } catch (Exception $exception) {
            session()->flash('erro', 'Ocorreu um erro no cadastro da conta Mercado Livre.');
        }
    }

    // Salva no banco de dados as chaves
    private function salvarDadosIntegracao(array $dados)
    {
        $integracao = new IntegracaoMercadoLivre();
        $clsRecursosApi = new RecursosApiMercadoLivre();

        $exist = $integracao->query()
            ->where('seller_id', '=', $dados['user_id'])
            ->get(['seller_id', 'brand_name', 'nickname']);

        if ($exist->isEmpty()) {

            $integracao->user_id = id_usuario_atual();
            $integracao->seller_id = $dados['user_id'];
            $integracao->access_token = $dados['access_token'];
            $integracao->refresh_token = $dados['refresh_token'];
            $integracao->expires_in = $dados['expires_in'];
            $integracao->scope = $dados['scope'];
            $integracao->token_type = $dados['token_type'];

            $integracao->push();

            $info = $clsRecursosApi->getInfoContaMeLi($dados['user_id']);

            $integracao->nickname = $info['nickname'];
            $integracao->thumbnail = $info['thumbnail'];
            $integracao->brand_name = $info['brand_name'];

            $integracao->push();

            session()->flash('sucesso', "Conta {$info['nickname']} vinculada com sucesso.");
            return;
        }
print_pre($exist);
        session()->flash('erro', 'Conta Mercado Livre ' .
            $exist['brand_name'] .
            '(' . $exist['nickname'] . ')' .
            'já está cadastrada em nosso sistema.');
    }
}
