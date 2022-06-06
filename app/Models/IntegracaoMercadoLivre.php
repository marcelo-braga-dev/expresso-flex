<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntegracaoMercadoLivre extends Model
{
    use HasFactory;

    protected $fillable =
        [
            'user_id',
            'seller_id',
            'status',
            'loja',
            'access_token',
            'refresh_token',
            'expires_in',
            'scope',
            'token_type',
        ];

    public function token($sellerId)
    {
        return $this->newQuery()
            ->where('seller_id', '=', $sellerId)
            ->first();
    }
}
