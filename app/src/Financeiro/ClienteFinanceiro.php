<?php

namespace App\src\Financeiro;

use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;

class ClienteFinanceiro
{
    public function getModel(string $valor, string $desc)
    {    // https://www.mercadopago.com.br/developers/panel/credentials    
        SDK::setAccessToken('APP_USR-4953992378764962-102015-3f2465b6af6767ea427c99f488378aa5-184946958');
        
        $preference = new Preference();

        // Cria um item na preferência
        $item = new Item();
        $item->title = $desc;
        $item->quantity = 1;
        $item->unit_price = $valor;
        $preference->items = array($item);
        $preference->save();

        return $preference->id;
    }
}
