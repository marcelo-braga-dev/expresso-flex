<x-layout menu="entregas" submenu="realizar">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <x-entregadores.botoes-header-entregador categoria="entregas"></x-entregadores.botoes-header-entregador>
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white mb-0">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto mb-2">
                        <h4 class="card-title text-uppercase mb-0">Pacotes para Entregar</h4>
                    </div>
                    <div class="col-auto text-right">
                        <div class="row text-right align-items-center">
                            <div class="col-auto">
                                <div class="form-group m-0 pt-2">
                                    <div class="input-group input-group-alternative input-group-merge bg-white">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">
                                                <i class="fas fa-search"></i>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" id="search-list"
                                               placeholder="Pesquisar...">
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto d-none d-md-block">
                                <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                    <i class="fas fa-box"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-1 p-md-3">
                <div class="row">
                    <div class="col-12 pt-2">
                        @foreach ($pacotes as $pacote)
                            <div class="card shadow mb-3 info-search">
                                <div class="row justify-content-between align-items-center row-clickable p-3">
                                    <div class="col-md-12">
                                        <p class="mb-0">
                                            <i class="fas fa-user mr-2 text-primary"></i>
                                            {{ get_destinatario_pacote($pacote->destinatario)->nome }}
                                        </p>

                                        <p class="mb-0">
                                            <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                            {{ get_endereco($pacote->endereco) }}
                                        </p>

                                        <p class="text-sm mb-0">
                                            <i class="fas fa-qrcode mr-2"></i>
                                            {{ get_origem_pacote($pacote->origem) }}
                                            @if (!empty($pacote->codigo))
                                                <b> #{{ $pacote->codigo }}</b>
                                            @else
                                                <b> {{ $pacote->rastreio }}</b>
                                            @endif
                                        </p>

                                        <a class="btn btn-link p-1"
                                           href="{{ route('entregadores.entregas.show',  $pacote->id) }}">
                                            Vou pra lá
                                        </a>
                                    </div>
                                </div>
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
    <style>
        .btn-flutuante-2 {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 120px;
            right: 40px;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 1px 1px 2px #888;
            z-index: 1000;
        }
    </style>
    <a class="btn-flutuante-2 btn-success btn-camera"
       href="{{ route('entregadores.qrcode', [route('entregadores.qrcode.identificar-pacote-entrega', ['user_id' => id_usuario_atual()]),
                url()->current()]) }}"
       style="display: none">
        <i style="margin-top:14px" class="fas fa-shipping-fast"></i>
    </a>

    <x-elements.camera-botao-flutuante
        operacao="{{ route('entregadores.qrcode.checkin-pacote', ['user_id' => id_usuario_atual()]) }}"
        retorno="{{ url()->current() }}"></x-elements.camera-botao-flutuante>
</x-layout>
