<?php

namespace App\src\MercadoLivre;

use App\Models\IntegracaoMercadoLivre;
use App\Models\Meta;
use App\Models\MetaValues;
use GuzzleHttp\Client;
use PHPUnit\Exception;

class AutenticacaoAutorizacaoMercadoLivre
{
    public function __construct()
    {
        $this->getChavesApi();
    }

    // Pega as chaves no banco de dados
    private function getChavesApi()
    {
        $meta = Meta::find(4);

        $this->client_id =  $meta->findMetaValue('app_id', $meta);
        $this->client_secret =  $meta->findMetaValue('client_secret', $meta);
        $this->redirect_uri =  $meta->findMetaValue('url_retorno', $meta);
    }

    // Retorna o link de integracao com o Mercado Livre
    public function urlAutorizacao()
    {
        $metas = new MetaValues();

        $idCliente = $this->client_id;
        $urlRetorno = route('mercadolivre.integracao.autenticacao');

        $url =
            'https://auth.mercadolivre.com.br/authorization?response_type=code&client_id=' .
            $idCliente .
            '&redirect_uri=' .
            $urlRetorno;

        return $url;
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
                    'client_id' => $this->client_id,
                    'client_secret' => $this->client_secret,
                    'code' => $code,
                    'redirect_uri' => $this->redirect_uri,
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

        $exist = $integracao->query()->where('seller_id', '=', $dados['user_id'])->get('seller_id');

        if ($exist->isEmpty()) {
            $integracao->user_id = id_usuario_atual();
            $integracao->seller_id = $dados['user_id'];
            $integracao->access_token = $dados['access_token'];
            $integracao->refresh_token = $dados['refresh_token'];
            $integracao->expires_in = $dados['expires_in'];
            $integracao->scope = $dados['scope'];
            $integracao->token_type = $dados['token_type'];

            $integracao->push();

            session()->flash('sucesso', 'Conta vinculada com sucesso.');
            return;
        }

        session()->flash('erro', 'Conta Mercado Livre #' . $dados['user_id'] . ' já está cadastrada.');
    }

    // Ronova as chaves de autenticacao
    public function renovarAutenticacao(string $sellerId)
    {
        $client = new Client();
        $integracao = new IntegracaoMercadoLivre();

        $chaves = $integracao->query()
            ->where('seller_id', '=', $sellerId)
            ->first();

        $res = $client->request(
            'POST',
            'https://api.mercadolibre.com/oauth/token?' .
                'grant_type=refresh_token' .
                '&client_id=' . $this->client_id .
                '&client_secret=' . $this->client_secret .
                '&refresh_token=' . $chaves->refresh_token
        );

        $json = $res->getBody();
        $dados = json_decode($json, true);

        $integracao
            ->where('seller_id', '=', $sellerId)
            ->update(
                [
                    'access_token' => $dados['access_token'],
                    'refresh_token' => $dados['refresh_token'],
                    'expires_in' => $dados['expires_in']
                ]
            );

        return $dados['access_token'];
    }
}
