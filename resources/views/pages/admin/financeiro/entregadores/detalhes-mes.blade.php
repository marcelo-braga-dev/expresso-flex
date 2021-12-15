@extends('layouts.admin', ['title' => 'Histórico de Pacotes', 'menu_suspenso' => 'financeiro'])

@section('content')
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="row">
            <div class="col-md-5">
                {{-- Faturamento --}}
                <div class="card card-stats mb-3">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Valor a pagar
                                </h5>
                                <small class="text-warning d-block"><b>
                                    {{ $fretes['quinzena'] }}° Quinzena de
                                    {{ $fretes['mes'] . '/' . $fretes['ano'] }}</b>
                                </small>
                                <span class="h2 font-weight-bold mb-0">
                                    R$ {{ number_format($fretes['faturamento']['aberto'], 2, ',', '.') }}
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-1 mb-0 text-sm">
                            <span class="text-nowrap d-block">
                                <b>Valores Pagos:</b> R$ {{ number_format($fretes['faturamento']['pago'], 2, ',', '.') }}
                            </span>
                            <span class="text-nowrap">
                                <b>Faturamento Total:</b> R$
                                {{ number_format($fretes['faturamento']['total'], 2, ',', '.') }}
                            </span>
                        </p>
                    </div>
                </div>

                {{-- Pagamento --}}
                <div class="card card-stats mb-3">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Confirmar Pagamemnto
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    R$ {{ number_format($fretes['faturamento']['aberto'], 2, ',', '.') }}
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <p>Clique no botão abaixo para confirmar o pagamento da
                                    {{ $fretes['quinzena'] }}° Quinzena de {{ $fretes['mes'] . '/' . $fretes['ano'] }}.
                                </p>
                                <form method="POST"
                                    action="{{ route('admin.financeiro.entregador.pagamento-dinheiro') }}">
                                    @csrf @method('put')
                                    <input type="hidden" name="id" value="{{ $user }}">
                                    <input type="hidden" name="quinzena" value="{{ $fretes['quinzena'] }}">
                                    <input type="hidden" name="mes" value="{{ $fretes['mes'] }}">
                                    <input type="hidden" name="ano" value="{{ $fretes['ano'] }}">
                                    <button class="btn btn-success">Confirmar Pagamento</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Tabela -->
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white mb-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-uppercase mb-0">Faturamento Diário</h4>
                                <p class="mb-0">{{ get_nome_usuario($user) }}</p>
                                <small class="mb-0">
                                    Data: {{ $fretes['mes'] . '/' . $fretes['ano'] }} -
                                    {{ $fretes['quinzena'] }}° quinzena
                                </small>
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
                                        <th>Total do Dia</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody class="list">
                                    @if (!empty($fretes['dias']))
                                        @foreach ($fretes['dias'] as $dia => $frete)
                                            <tr>
                                                <th scope="row">
                                                    {{ $dia . '/' . $fretes['mes'] . '/' . $fretes['ano'] }}
                                                </th>
                                                <td>
                                                    R$ {{ number_format($frete, 2, ',', '.') }}
                                                </td>
                                                <td class="text-right">
                                                    <a href="/">Detalhes</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
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
            </div>
            {{-- <div class="col-md-4">
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
            </div> --}}
            {{-- <div class="col-md-4">
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
            </div> --}}
        </div>
        @include('layouts.footers.auth')
    </div>

@endsection
