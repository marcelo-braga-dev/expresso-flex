<meta http-equiv="refresh" content="5">
<x-layout menu="checkin" submenu="checkin-pacotes">
    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary">
            <div class="card-header bg-white mb-0">
                <div class="row justify-content-between align-items-center border-bottom pb-3 mb-3">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Pacotes sendo Coletados</h4>
                    </div>
                    <div class="col-auto text-left">
                        <a class="btn btn-primary btn-sm" href="{{ route('conferentes.checkin.index') }}">Voltar</a>
                    </div>
                </div>
                <div class="row border-bottom pb-3 mb-3">
                    <div class="col">
                        <i class="fas fa-motorcycle"></i>
                        {{ get_nome_usuario($id) }}
                    </div>
                </div>
                <div class="row pt-3 justify-content-between">
                    <div class="col-auto">
                        Faltam <span class=""><b>{{ count($pacotes) }}</b></span> pacotes.
                    </div>
                    <div class="col-auto text-warning btn-camera" style="display: none">
                        <button class="btn btn-warning btn-sm link-btn-flutuante-1">
                            <i class="fas fa-camera"></i>
                            Camera
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                <ul class="list-group list-group-flush">
                    @foreach ($pacotes as $pacote)
                        <li class="list-group-item row-clickable">
                            <div class="row d-flex justify-content-between align-items-center">
                                <div class="col-12 col-md-10">
                                    <p class="mb-0">
                                        <i class="fas fa-user mr-2 text-primary"></i>
                                        <b>{{ get_destinatario_pacote($pacote->destinatario)->nome }}</b>
                                    </p>
                                    <p class="mb-0">
                                        <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                        {{ get_endereco($pacote->endereco) }}
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
                                </div>
                                <div class="col-12 col-md-2 text-right">
                                    <a class="small pl-5" href="{{ route('conferentes.pacote.show', $pacote->id) }}">
                                        Detalhes
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                @if ($pacotes->isEmpty())
                    <div class="col-auto text-center p-3">
                        <small>Não há histórico de pacotes.</small>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <x-elements.camera-botao-flutuante
        operacao="{{ route('conferentes.qrcode.checkin-pacote', ['user_id' => id_usuario_atual()]) }}"
        retorno="{{ url()->current() }}"></x-elements.camera-botao-flutuante>
</x-layout>
