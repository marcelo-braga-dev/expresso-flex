<?php

namespace App\src\Pacotes;

use App\src\Pacotes\Status\Base;
use App\src\Pacotes\Status\Coletado;
use App\src\Pacotes\Status\DestinatarioAusente;
use App\src\Pacotes\Status\EntregaCanceladaCliente;
use App\src\Pacotes\Status\EntregaCanceladaEntregador;
use App\src\Pacotes\Status\EntregaFinalizado;
use App\src\Pacotes\Status\EntregaIniciado;
use App\src\Pacotes\Status\PerdidoEntregador;

class StatusPacotes
{
    public function status(): array
    {
        $base = new Base();
        $coletado = new Coletado();
        $destinatarioAusente = new DestinatarioAusente();
        $entregaCanceladaCliente = new EntregaCanceladaCliente();
        $entregaCanceladaEntregador = new EntregaCanceladaEntregador();
        $entregaFinalizada = new EntregaFinalizado();
        $entregaIniciado = new EntregaIniciado();
        $perdidoEntregador = (new PerdidoEntregador());

        return [
            $base->getStatus() => $base->getNomeStatus(),
            $coletado->getStatus() => $coletado->getNomeStatus(),
            $destinatarioAusente->getStatus() => $destinatarioAusente->getNomeStatus(),
            $entregaCanceladaCliente->getStatus() => $entregaCanceladaCliente->getNomeStatus(),
            $entregaCanceladaEntregador->getStatus() => $entregaCanceladaEntregador->getNomeStatus(),
            $entregaFinalizada->getStatus() => $entregaFinalizada->getNomeStatus(),
            $entregaIniciado->getStatus() => $entregaIniciado->getNomeStatus(),
            $perdidoEntregador->getStatus() => $perdidoEntregador->getNomeStatus(),
        ];
    }

    public function statusAtivo()
    {
        $coletado = new Coletado();
        $base = new Base();
        $entregaIniciado = new EntregaIniciado();

        return [
            $coletado->getStatus(),
            $base->getStatus(),
            $entregaIniciado->getStatus(),
        ];
    }

    public function coleta()
    {
        $base = new Base();
        $coletado = new Coletado();

        return [
            $base->getStatus(),
            $coletado->getStatus()
        ];
    }

    public function entrega()
    {
        $iniciado = (new EntregaIniciado())->getStatus();
        $finalizado = (new EntregaFinalizado())->getStatus();
        $destinatarioAusente = (new DestinatarioAusente())->getStatus();
        $entregaCanceladaCliente = (new EntregaCanceladaCliente())->getStatus();
        $entregaCanceladaEntregador = (new EntregaCanceladaEntregador())->getStatus();
        $perdidoEntregador = (new PerdidoEntregador())->getStatus();

        return [
            $iniciado,
            $finalizado,
            $destinatarioAusente,
            $entregaCanceladaCliente,
            $entregaCanceladaEntregador,
            $perdidoEntregador
        ];
    }
}
