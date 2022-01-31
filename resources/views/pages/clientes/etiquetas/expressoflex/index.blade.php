<x-layout>
    <div class="header bg-principal bg-height-top"></div>

    <div class="container-fluid mt--9">
        <div class="card bg-secondary shadow">
            <div class="card-header bg-white">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-1">Etiquetas para Imprimir</h4>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-primary" href="{{ route('clientes.etiquetas.expressoflex.create') }}">
                            Emitir Etiqueta
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                @foreach ($etiquetas as $etiqueta)
                    <div class="card shadow-sm p-3 mb-2">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 col-lg-10">
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
                                        <form method="POST"
                                              action="{{ route('clientes.etiquetas.expressoflex.update', $etiqueta->id) }}">
                                            @csrf @method('put')
                                            <button type="submit" class="btn btn-link btn-sm p-0">
                                                Marcar como impresso
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="d-none d-md-block text-center col-md-2">
                                <a href="{{ route('clientes.etiquetas.expressoflex.show', $etiqueta->id) }}"
                                   target="_blank">
                                    <i class="fas fa-file-pdf text-danger d-block" style="font-size: 28px"></i>
                                    <small class="d-block text-muted">
                                        Visualizar PDF
                                    </small>
                                </a>
                            </div>
                            <div class="d-md-none text-center col-md-2">
                                <small>Só é póssível imprimir etiquetas pelo computador.</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (!count($etiquetas))
                    <div class="row">
                        <div class="col-auto mx-auto text-muted pt-4 text-center">
                            <small class="text-muted d-block">
                                Não há etiquetas emitidas para imprimir.
                            </small>
                            <a class="btn btn-primary my-2"
                               href="{{ route('clientes.etiquetas.expressoflex.create') }}">
                                Emitir Etiqueta
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-layout>
