<x-layout menu="financeiro" submenu="financeiro-pagamentos">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 mb-6">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-stats mb-3">
                    <div class="card-body" style="background-color: white !important">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Valores a Receber
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    R$ {{ convertFloatToMoney($valores['receber']) }}
                                </span>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-hand-holding-usd"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-1 mb-0 text-sm">
                            <span class="text-nowrap d-block">
                                <b>Valores Pagos:</b> R$ {{ convertFloatToMoney($valores['pago']) }}
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-stats mb-3">
                    <div class="card-body" style="background-color: white !important">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Faturamento Quinzenal</h5>
                                <span class="h2 font-weight-bold mb-0">
                                    R$ {{ convertFloatToMoney($valores['pago'] + $valores['receber']) }}
                                </span>
                            </div>
                            <div class="col-3">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-1 mb-0 text-sm">
                            {{--                            <span class="text-nowrap d-block"><b>São Paulo:</b> R$ {{ $valores['valor_sp'] }}</span>--}}
                            {{--                            <span class="text-nowrap"><b>Grande São Paulo:</b> R$ {{ $valores['valor_g_sp'] }}</span>--}}
                        </p>
                    </div>
                </div>
            </div>
{{--            <div class="col-md-4">--}}
{{--                <div class="card card-stats mb-3">--}}
{{--                    <div class="card-body" style="background-color: white !important">--}}
{{--                        <div class="row">--}}
{{--                            <div class="col">--}}
{{--                                <h5 class="card-title text-uppercase text-muted mb-0">Total de Pacotes</h5>--}}
{{--                                <span class="h2 font-weight-bold mb-0">--}}
{{--                                    {{ $total['total_pacotes'] }} <span class="small font-weight-normal">pacotes</span>--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                            <div class="col-auto">--}}
{{--                                <div class="icon icon-shape bg-orange text-white rounded-circle shadow">--}}
{{--                                    <i class="fas fa-boxes"></i>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <p class="mt-1 mb-0 text-sm">--}}
{{--                            <span class="text-nowrap d-block">--}}
{{--                                <b>São Paulo:</b> {{ $total['pacotes_sp'] }} pacotes--}}
{{--                            </span>--}}
{{--                            <span class="text-nowrap">--}}
{{--                                <b>Grande São Paulo:</b> {{ $total['pacotes_g_sp'] }} pacotes--}}
{{--                            </span>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

        <!-- Tabela -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white mb-0">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <h4 class="card-title text-uppercase mb-0">Faturamento</h4>
                                <p class="mb-0">Período: {{$mes . '/' . $ano}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush text-center">
                                <thead class="thead-light">
                                <tr>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach ($faturamentos as $data=>$faturamento)
                                    <tr>
                                        <th>{{ $data }}</th>
                                        <td>R$ {{ $faturamento }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if (empty($faturamentos))
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
            <div class="col-md-8 mb-3">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white mb-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h4 class="card-title text-uppercase mb-0">Pacotes</h4>
                                <p class="mb-0">Período: {{$mes . '/' . $ano}}</p>
                            </div>
                            <div class="col-auto">
                                <a class="btn btn-primary btn-sm" href="{{url()->previous()}}">Voltar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush text-center">
                                <thead class="thead-light">
                                <tr>
                                    <th>Data</th>
                                    <th>Código</th>
                                    <th>Região</th>
                                    <th>Pagamento</th>
                                    <th>Valor</th>
                                </tr>
                                </thead>
                                <tbody class="list">
                                @foreach ($entregas as $entrega)
                                    <tr>
                                        <th scope="row">
                                            {{ date('d/m/y', strtotime($entrega->created_at)) }}
                                        </th>
                                        <td>{{ getRastreioPeloId($entrega->pacotes_id)  }}</td>
                                        <td>
                                            @if ($entrega->regiao == 'sao_paulo') São Paulo @endif
                                            @if ($entrega->regiao == 'grande_sao_paulo') Grande São Paulo @endif
                                        </td>
                                        <td>{{ ucfirst($entrega->status) }}</td>
                                        <td>R$ {{ convertFloatToMoney($entrega->value) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        @if ($entregas->isEmpty())
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
        </div>
    </div>
</x-layout>
