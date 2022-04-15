<?php

namespace App\src\MercadoLivre;

use App\Models\MetaValues;

class ChavesAPI
{
    private string $app_id;
    private string $client_secret;
    private string $url_retorno;
    private MetaValues $metaValue;

    public function __construct()
    {
        $this->metaValue = new MetaValues();
        $this->setAppId();
        $this->setClientSecret();
        $this->setUrlRetorno();
    }

    public function getAppId(): string
    {
        return $this->app_id;
    }

    public function setAppId(): void
    {
        $this->app_id = $this->metaValue->value('ml_app_id');
    }

    public function getClientSecret(): string
    {
        return $this->client_secret;
    }

    public function setClientSecret(): void
    {
        $this->client_secret = $this->metaValue->value('ml_client_secret');
    }

    public function getUrlRetorno(): string
    {
        return $this->url_retorno;
    }

    public function setUrlRetorno(): void
    {
        $this->url_retorno = $this->metaValue->value('ml_url_retorno');
    }


}
