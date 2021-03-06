<x-layout menu="financeiro" submenu="financeiro-clientes">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Histórico de Pagamentos</h4>
                        <p class="mb-1"><b>Cliente:</b> {{ get_nome_usuario($id) }}</p>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($fretes as $frete)
                        <li
                            class="list-group-item d-flex justify-content-between align-items-center px-4 row-clickable">
                            <div class="row">
                                <div class="col-12 col-md-auto pt-2">
                                    <span>{{ converterMes($frete['mes']) . '/' . $frete['ano'] }}</span>
                                </div>
                                <div class="col-auto">
                                    <small>
                                        <table>
                                            <tr>
                                                <td>Em aberto:</td>
                                                <td>
                                                    R$ @if (!empty($frete['aberto']))
                                                        {{ number_format($frete['aberto']['valor'], 2, ',', '.') }}
                                                    @else 0,00 @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Valor Pago:</td>
                                                <td>
                                                    R$ @if (!empty($frete['pago']))
                                                        {{ number_format($frete['pago']['valor'], 2, ',', '.') }}
                                                    @else 0,00 @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Total a pagar: &nbsp;</td>
                                                <td>
                                                    R$ @if (!empty($frete['total']) && $frete['total'] > 0)
                                                        {{ number_format($frete['total'], 2, ',', '.') }}
                                                    @else 0,00 @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </small>
                                </div>
                            </div>
                            <a class="btn btn-link p-0 btn-sm"
                               href="{{ route('admins.financeiros.quinzena', ['id' => $id, 'mes' => $frete['mes'], 'ano' => $frete['ano'] ]) }}">
                                Detalhes
                            </a>
                        </li>
                    @endforeach
                </ul>

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
