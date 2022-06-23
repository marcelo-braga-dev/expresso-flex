<x-layout menu="importacao" submenu="importados">
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9 p-1 mb-6">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Etiquetas Importadas</h4>
                    </div>
                </div>
            </div>
            <div class="card-body p-2">
                @foreach ($etiquetas as $etiqueta)
                    <div class="card shadow-sm p-3 mb-2">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12">
                                <p class="mb-0">
                                    <i class="fas fa-user mr-2 text-primary"></i>
                                    <b>{{ get_destinatario_pacote($etiqueta->destinatarios_id)->nome }}</b>
                                </p>

                                <p class="mb-0">
                                    <i class="fas fa-map-marker-alt mr-2 text-danger"></i>
                                    {{ get_endereco($etiqueta->enderecos_id) }}
                                </p>
                                <div class="row">
                                    <div class="col-md-auto">
                                        <p class="text-sm mb-0">
                                            <i class="fas fa-qrcode mr-2"></i>
                                            {{ $etiqueta->rastreio }}
                                        </p>
                                    </div>
                                    <div class="col-md-auto">
                                        <p class="text-sm mb-0">
                                            <i class="far fa-calendar-alt"></i>
                                            {{ date('d/m/Y H:i', strtotime($etiqueta->created_at)) }}
                                        </p>
                                    </div>
                                    <div class="col-md-auto">
                                        <p class="text-sm mb-0">
                                            <i class="fas fa-store"></i>
                                            Mercado Livre
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (!count($etiquetas))
                    <div class="row">
                        <div class="col-auto mx-auto text-muted pt-4 text-center">
                            <small class="text-muted d-block">
                                Não há pacotes importados.
                            </small>
                        </div>
                    </div>
                @endif
                <div class="row justify-content-center py-3">
                    <div class="col-auto">{{ $etiquetas }}</div>
                </div>
            </div>
        </div>
    </div>
</x-layout>



