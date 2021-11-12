@extends('layouts.admin', ['title' => 'Histórico de Pacotes', 'menu_suspenso' => 'financeiro'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-stats mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Valores em Aberto
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    R$ {{ $total['valor_receber'] }}
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-1 mb-0 text-sm">
                            <span class="text-nowrap d-block"><b>Valores Pagos:</b> R$ {{ $total['valor_pago'] }}</span>
                            <span class="text-nowrap"><b>Total:</b> R$ {{ $total['valor_total'] }}</span>
                        </p>                       
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stats mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Faturamento Mensal</h5>
                                <span class="h2 font-weight-bold mb-0">
                                    R$ {{ $total['valor_total'] }}
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-1 mb-0 text-sm">
                            <span class="text-nowrap d-block"><b>São Paulo:</b> R$ {{ $total['valor_sp'] }}</span>
                            <span class="text-nowrap"><b>Grande São Paulo:</b> R$ {{ $total['valor_g_sp'] }}</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stats mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Total de Pacotes</h5>
                                <span class="h2 font-weight-bold mb-0">
                                    {{ $total['total_pacotes'] }} <span class="small font-weight-normal">pacotes</span>
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                    <i class="fas fa-boxes"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-1 mb-0 text-sm">
                            <span class="text-nowrap d-block"><b>São Paulo:</b> {{ $total['pacotes_sp'] }} pacotes</span>
                            <span class="text-nowrap"><b>Grande São Paulo:</b> {{ $total['pacotes_g_sp'] }}
                                pacotes</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabela -->
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Pacotes</h4>
                        <p class="mb-0">{{ get_nome_usuario($user) }}</p>
                        <small class="mb-0">Período: {{ $fretes['mes'] . '/' . $fretes['ano'] }}</small>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ url()->previous() }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush text-center">
                        <thead class="thead-light">
                            <tr>
                                <th>Data</th>
                                <th>São Paulo</th>
                                <th>Grande São Paulo</th>
                                <th>Total</th>
                                <th>Valor</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody class="list">
                            @foreach ($fretes['pacotes'] as $frete)
                                <?php $count = 0;
                                $total = 0; ?>
                                <tr>
                                    <th scope="row">
                                        {{ $frete['dia'] . '/' . $fretes['mes'] . '/' . $fretes['ano'] }}
                                    </th>
                                    <td>
                                        @if (empty($frete['sao_paulo'])) 0
                                        @else {{ count($frete['sao_paulo']) }}
                                            <?php $count += count($frete['sao_paulo']); ?>
                                        @endif
                                    </td>
                                    <td>
                                        @if (empty($frete['grande_sao_paulo']))
                                            0
                                        @else {{ count($frete['grande_sao_paulo']) }}
                                            <?php $count += count($frete['grande_sao_paulo']); ?>
                                        @endif
                                    </td>
                                    <td>
                                        {{ $count }}
                                    </td>
                                    <td>
                                        R$ {{ number_format($frete['valor_total'], 2, ',', '.') }}
                                    </td>
                                    <td class="text-right"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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

        @include('layouts.footers.auth')
    </div>

@endsection
