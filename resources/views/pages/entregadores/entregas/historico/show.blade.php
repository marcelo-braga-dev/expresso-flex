<x-layout menu="entregas" submenu="historico-entregas">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-2">Histórico de Pacotes</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm"
                           href="{{ route('entregadores.entrega.historico.index') }}">Voltar</a>
                    </div>
                </div>
            </div>
            <div class="card-body p-0">
                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        @if (in_array($pacote->status, statusPacotesEntrega()))
                            <li class="list-group-item">
                                <div class="row d-flex justify-content-between align-items-center">
                                    <div class="col-12 col-md-10">
                                        <p class="mb-0">
                                            <i class="fas fa-user mr-2 text-primary"></i>
                                            <b>{{ get_destinatario_pacote($pacote->destinatario)->nome }}</b>
                                        </p>
                                        <p class="text-sm mb-0">
                                            <i class="fas fa-qrcode mr-2"></i>
                                            {{ get_origem_pacote($pacote->origem) }}
                                            @if (!empty($pacote->codigo))
                                                - <b>#{{ $pacote->codigo }}</b>
                                            @else
                                                - <b>{{ $pacote->rastreio }}</b>
                                            @endif
                                        </p>
                                        <p class="text-sm mb-0">
                                            <i class="fas fa-calendar-alt mr-2"></i>
                                            {{ date('d/m/y H:i', strtotime($pacote->created_at)) }}
                                        </p>
                                        @if ($pacote->status == $statusIniciado)
                                            <small class="text-primary">
                                                <i class="fas fa-shipping-fast"></i>
                                                Pacote em Trânsito ao Destinatário
                                            </small>
                                        @elseif($pacote->status == $statusFinalizado)
                                            <small class="text-success">
                                                <i class="fas fa-check"></i>
                                                Entrega finalizada
                                            </small>
                                        @else
                                            <small class="text-danger">
                                                <i class="fas fa-times"></i>
                                                {{ get_status_pacote($pacote->status) }}
                                            </small>
                                        @endif
                                    </div>
                                </div>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-layout>
