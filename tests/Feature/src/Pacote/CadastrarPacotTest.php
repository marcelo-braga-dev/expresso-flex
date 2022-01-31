<?php

namespace Tests\Feature\src\Pacote;

use App\src\Pacotes\CadastrarPacote;
use App\src\Pacotes\Info\Coleta;
use App\src\Pacotes\Info\Destinatario;
use App\src\Pacotes\Info\Endereco;
use App\src\Pacotes\Status\Novo;
use Tests\TestCase;

class CadastrarPacotTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cadastrar_pacote()
    {
        $entregador = 1;
        $coleta = 2;
        $descricao = 'pacote teste';
        $destinatario = 3;
        $endereco = 4;
        $cep = 5;
        $cliente = 1;
        $codigo = 7;
        $status = new Novo();
        $origem = 'expressoFlex';

        $coleta = new Coleta($entregador, $coleta, $descricao);
        $destinatario = new Destinatario($destinatario, $cliente, $codigo, $status, $origem);
        $endereco = new Endereco($endereco, $cep);

        $cadastrarPacote = new CadastrarPacote(
            $coleta, $destinatario, $endereco
        );

        $cadastrarPacote->cadastrar();

        $this->assertTrue(true);
    }
}
