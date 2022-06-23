<x-layout menu="financeiro" submenu="financeiro-pagamentos">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Faturamento na Quinzena do Cliente</h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0 bg-white">
                <div class="row p-3 align-items-center border-bottom row-clickable">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-2 pt-2">
                                <span>{{ converterMes($mes) . '/' . $ano }}</span>
                            </div>
                            <div class="col-md-3 pt-2">
                                <h4>1º Quinzena</h4>
                            </div>
                            <div class="col-md-6">
                                <table class="text-sm">
                                    <tr>
                                        <td>Faturamento Total: &nbsp;</td>
                                        <td>
                                            R$ {{ convertFloatToMoney($fretes['aberto_quinzena1'] + $fretes['pago_quinzena1']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Valor Pago:</td>
                                        <td>
                                            R$ {{ convertFloatToMoney($fretes['pago_quinzena1']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Em aberto:</td>
                                        <td class="text-danger">
                                            R$ {{ convertFloatToMoney($fretes['aberto_quinzena1']) }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-link p-0 btn-sm"
                           href="{{ route('entregadores.financeiro.historicos.show', [
                                                               'mes' => $mes,
                                                               'ano' => $ano,
                                                               'quinzena' => 1]) }}">
                            Detalhes
                        </a>
                    </div>
                </div>

                <div class="row p-3 align-items-center row-clickable">
                    <div class="col-md-10">
                        <div class="row">
                            <div class="col-md-2 pt-2">
                                <span>{{ converterMes($mes) . '/' . $ano }}</span>
                            </div>
                            <div class="col-md-3 pt-2">
                                <h4>2º Quinzena</h4>
                            </div>
                            <div class="col-md-6">
                                <table class="text-sm">
                                    <tr>
                                        <td>Faturamento Total: &nbsp;</td>
                                        <td>
                                            R$ {{ convertFloatToMoney($fretes['aberto_quinzena2'] + $fretes['pago_quinzena2']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Valor Pago:</td>
                                        <td>
                                            R$ {{ convertFloatToMoney($fretes['pago_quinzena2']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Em aberto:</td>
                                        <td class="text-danger">
                                            R$ {{ convertFloatToMoney($fretes['aberto_quinzena2']) }}
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-link p-0 btn-sm"
                           href="{{ route('entregadores.financeiro.historicos.show', [
                                                               'mes' => $mes,
                                                               'ano' => $ano,
                                                               'quinzena' => 2]) }}">
                            Detalhes
                        </a>
                    </div>
                </div>


                @if (empty($fretes))
                    <div class="row justify-content-center">
                        <div class="col-auto p-3">
                            <small class="text-muted">
                                Não há histórico de pagamentos
                            </small>
                        </div>
                    </div>
                @endif
            </div>
        </div>


    </div>
</x-layout>
