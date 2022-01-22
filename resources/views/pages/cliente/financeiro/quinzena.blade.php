<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Faturamento na Quinzena do Cliente</h4>
                        <p class="mb-1">{{ get_nome_usuario($user) }}</p>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush"><?php $i = 1; ?>
                    @foreach ($fretes['periodos'] as $frete)
                        <li class="list-group-item d-flex justify-content-between align-items-center px-4 info-list">
                            <div class="row">
                                <div class="col-auto pt-2">
                                    <span>{{ $fretes['mes'] . '/' . $fretes['ano'] }}</span>
                                </div>
                                <div class="col-auto pt-2">
                                    <h4>{{ $i }}º Quinzena</h4>
                                </div>
                                <div class="col-auto">
                                    <small>
                                        <table>
                                            <tr>
                                                <td>Faturamento Total: &nbsp; </td>
                                                <td>
                                                    <?php $total = $frete['aberto'] + $frete['pago']; ?>
                                                    R$ {{ number_format($total, 2, ',', '.') }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Valor Pago:</td>
                                                <td>
                                                    R$ @if (!empty($frete['pago']))
                                                    {{ number_format($frete['pago'], 2, ',', '.') }}
                                                    @else 0,00 @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Em aberto: </td>
                                                <td class="text-danger">
                                                    R$ @if (!empty($frete['aberto']))
                                                        {{ number_format($frete['aberto'], 2, ',', '.') }}
                                                    @else 0,00 @endif
                                                </td>
                                            </tr>
                                        </table>
                                    </small>
                                </div>
                            </div>
                            <a class="btn btn-link p-0 btn-sm"
                                href="{{ route('cliente.financeiro.pagamentos.detalhes-mensal', [
                                    'mes' => $fretes['mes'],
                                    'ano' => $fretes['ano'],
                                    'quinzena' => $i++,
                                    'id' => $user,
                                ]) }}">
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
