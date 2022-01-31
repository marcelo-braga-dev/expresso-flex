<?php

namespace App\src\Integracoes\MercadoPago;

use App\Models\MetaValues;

class DadosIntegracao
{
    private string $publicKey = 'mp_public_key';
    private string $privateKey = 'mp_private_key';

    public function getPublicKey(): string
    {
        $meta = new MetaValues();
        return $meta->value($this->publicKey);
    }

    public function setPublicKey(string $dados): void
    {
        $meta = new MetaValues();
        $meta->updateValue($this->publicKey, $dados);
    }

    public function getPrivateKey(): string
    {
        $meta = new MetaValues();
        return $meta->value($this->privateKey);
    }

    public function setPrivateKey(string $dados): void
    {
        $meta = new MetaValues();
        $meta->updateValue($this->privateKey, $dados);
    }
}
