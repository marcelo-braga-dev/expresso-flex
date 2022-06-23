<?php

namespace App\src\Enderecos;

class RegiaoCep
{
    public function verificar(int $cep): string
    {
        if ($cep >= 1000000 && $cep <= 5999999 ||
            $cep >= 8000000 && $cep <= 8499999) {
            return 'sao_paulo';
        }
        return 'grande_sao_paulo';
    }
}
