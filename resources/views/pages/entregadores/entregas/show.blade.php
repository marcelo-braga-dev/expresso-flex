<x-layout menu="entregas" submenu="realizar">
    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card card-stats border shadow-sm">
            <div class="card-header">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <small class="badge badge-warning">
                            <i class="fas fa-shipping-fast"></i> Entrega de Pacotes
                        </small>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('entregadores.entregas.index') }}">
                            Voltar
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-1 p-md-3">
                <div class="card">

                    <div class="row justify-content-between align-items-center m-3">
                        <div class="pt-3">
                            <div class="row">
                                <div class="col-1"></div>
                                <div class="col-auto"><h5>Destinatário:</h5></div>
                            </div>
                            <p>
                                <i class="fas fa-user mr-2"></i>
                                <b>{{ get_destinatario_pacote($pacote->destinatario)->nome }}</b>
                            </p>
                            <p>
                                <i class="fas fa-phone mr-2"></i>
                                {{ get_destinatario_pacote($pacote->destinatario)->telefone }}
                            </p>
                        </div>
                        <div>
                            <button class="icon btn btn-success rounded-circle icon-shape">
                                <span class="btn-inner--icon">
                                    <i class="fas fa-user"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 pt-2">
                        <div class="card p-3">
                            {{--<?php--}}
                            {{--$latitude = get_endereco($pacote->endereco, true)->latitude;--}}
                            {{--$longitude = get_endereco($pacote->endereco, true)->longitude;--}}
                            {{--?>--}}
                            {{--@if (!empty($latitude) && !empty($longitude))--}}
                            {{--    <div class="row m-1 mb-4">--}}
                            {{--        <div id="map-default" class="map-canvas" data-lat="{{ $latitude }}"--}}
                            {{--             data-lng="{{ $longitude }}" style="height: 250px;"></div>--}}
                            {{--    </div>--}}
                            {{--@endif--}}

                            <div class="row mb-3">
                                <div class="col-1 text-center">
                                    <p class="mb-1">
                                        <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                    </p>
                                </div>
                                <div class="col-10">
                                    <h5>Endereço:</h5>
                                    <p class="h3">
                                        {{ get_endereco($pacote->endereco) }}
                                    </p>
                                </div>
                            </div>

                            <div class="row justify-content-center mb-3">
                                <div class="col-8">
                                    <a class="btn btn-success btn-block"
                                       href="{{ route('entregadores.entregas.edit', $pacote->id) }}">
                                        Entregar Pacote
                                    </a>
                                </div>
                            </div>

                            <div class="row justify-content-center">
                                <div class="col-8">
                                    <a class="btn btn-link btn-block text-danger btn-sm"
                                       href="{{ route('entregadores.entrega.cancelar', ['id' => $pacote->id]) }}">
                                        Não consegui fazer a entrega
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 pt-2">
                        <div class="card mb-3">
                            <div class="row justify-content-between align-items-center m-3">
                                <div class="pt-3">
                                    <p>
                                        <i class="fas fa-box mr-2"></i>
                                        {{ $pacote->rastreio }}
                                    </p>
                                    <p>
                                        <i class="fas fa-store mr-2"></i>
                                        {{ get_origem_pacote($pacote->origem) }}
                                    </p>
                                    @if (!empty($pacote->codigo))
                                        <p>
                                            <i class="fas fa-qrcode mr-2"></i>
                                            {{ $pacote->codigo }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi-BQBa6v16dcttIhXi-lTq9PGFoCH3cI"></script>

</x-layout>
