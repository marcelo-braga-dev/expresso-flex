<?php

namespace App\src\Enderecos;

class RegiaoCep
{
    public function verificar(int $cep): string
    {
        $key = 'grande_sao_paulo';

        if ($cep >= 1000000 && $cep <= 5999999) {
            $key = 'sao_paulo';
        }

        if ($cep >= '08000000' && $cep <= '08499999') {
            $key = 'sao_paulo';
        }

        return $key;
    }
}
