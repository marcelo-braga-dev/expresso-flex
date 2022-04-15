<?php

namespace App\src\Integracoes\MercadoLivre\Requisicoes;

class DadosRequisicao
{
    public int $codigo;
    public int $senderId;
    public string $accessToken;
    public $updatedAt;
    public int $expiresIn;
    public int $sellerId;
    public string $refreshToken;
}
