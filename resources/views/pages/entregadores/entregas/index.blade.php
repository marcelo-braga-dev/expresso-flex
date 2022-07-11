<x-layout menu="entregas" submenu="realizar">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 px-1 mb-6">
        <x-entregadores.botoes-header-entregador categoria="entregas"></x-entregadores.botoes-header-entregador>
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col-9">
                        <small class="badge badge-warning">
                            <i class="fas fa-shipping-fast"></i> Entrega de Pacotes
                        </small>
                        <h3 class="mb-0 text-principal">Pacotes para Entrega</h3>
                    </div>
                    <div class="col-3 text-right">
                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-auto">
                        <div class="form-group m-0 pt-2">
                            <div class="input-group input-group-alternative input-group-merge bg-white">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">
                                    <i class="fas fa-search"></i>
                                </span>
                                </div>
                                <input type="text" class="form-control" id="search-list" placeholder="Pesquisar...">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row pt-3 justify-content-end btn-camera" style="display: none">
                    <div class="col-6 text-warning">
                        <button class="btn btn-warning btn-sm link-btn-flutuante-1">
                            <i class="fas fa-plus-circle"></i>
                            Adicionar Pacote
                        </button>
                    </div>
                </div>

            </div>
            <div class="card-body p-0 p-md-3">
                <div class="row">
                    <div class="col-12 pt-2">
                        @foreach ($pacotes as $pacote)
                            <div class="card shadow mb-3 p-3 info-search row-clickable small">
                                <div class="row">
                                    <div class="col-1 text-right">
                                        <i class="fas fa-user text-primary"></i>
                                    </div>
                                    <div class="col-10 pl-2">
                                        {{ get_destinatario_pacote($pacote->destinatario)->nome }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 text-right">
                                        <i class="fas fa-qrcode"></i>
                                    </div>
                                    <div class="col-10 pl-2">
                                        {{ get_origem_pacote($pacote->origem) }} -
                                        @if (!empty($pacote->codigo))
                                            <b> #{{ $pacote->codigo }}</b>
                                        @else
                                            <b> {{ $pacote->rastreio }}</b>
                                        @endif
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-1 text-right">
                                        <i class="fas fa-map-marker-alt text-danger"></i>
                                    </div>
                                    <div class="col-10 pl-2">
                                        {{ get_endereco($pacote->endereco) }}
                                    </div>
                                </div>
                                <a class="btn btn-link p-1 text-right btn-sm"
                                   href="{{ route('entregadores.entregas.show',  $pacote->id) }}">
                                    Vou pra lá
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>

                @if ($pacotes->isEmpty())
                    <div class="row justify-content-center mb-3">
                        <div class="col-auto">
                            <small class="text-muted">
                                Não há pacotes cadastrados para entregar.
                            </small>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    <x-elements.camera-botao-flutuante
        operacao="{{ route('entregadores.qrcode.checkin-pacote', ['user_id' => id_usuario_atual()]) }}"
        retorno="{{ url()->current() }}" icon="fas fa-plus"></x-elements.camera-botao-flutuante>
</x-layout>
