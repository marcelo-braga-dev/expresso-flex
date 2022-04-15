<?php

namespace App\src\Integracoes\MercadoLivre\AutenticarAutorizar;

use App\Models\MetaValues;

class DadosIntegracao
{
    private string $urlIntegracao = 'ml_url_integracao';
    private string $appId = 'ml_app_id';
    private string $urlRetorno = 'ml_url_retorno';
    private string $clientSecret = 'ml_client_secret';
    private string $urlNotificacao = 'ml_url_notificacao';

    public function getUrlIntegracao(): string
    {
        $meta = new MetaValues();
        return $meta->value($this->urlIntegracao);
    }

    public function getAppId(): string
    {
        $meta = new MetaValues();
        return $meta->value($this->appId);
    }

    public function setAppId(string $appId): void
    {
        $meta = new MetaValues();
        $meta->updateValue($this->appId, $appId);
    }

    public function getUrlRetorno(): string
    {
        return route('mercadolivre.integracao.autenticacao');
    }

    public function getClientSecret(): string
    {
        $meta = new MetaValues();
        return $meta->value($this->clientSecret);
    }

    public function setClientSecret(string $clientSecret): void
    {
        $meta = new MetaValues();
        $meta->updateValue($this->clientSecret, $clientSecret);
    }

    public function getUrlNotificacao(): string
    {
        return route('mercadolivre.integracao.notificacao');
    }
}
