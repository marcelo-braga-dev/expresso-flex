<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--8">
        <div class="row">
            {{-- Coletas --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
{{--                                <h5 class="card-title text-uppercase text-muted mb-0">Coletas</h5>--}}
                                <span class="pt-2 h2 font-weight-bold mb-0 d-block">
                                    Coletas
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-dolly"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-info" href="{{ route('entregadores.coletas.index') }}">
                            Ir para Coletas
                        </a>
                    </div>
                </div>
            </div>

            {{-- Entregas --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
{{--                                <h5 class="card-title text-uppercase text-muted mb-0">--}}
{{--                                    Entregas--}}
{{--                                </h5>--}}
                                <span class="pt-2 h2 font-weight-bold mb-0 d-block">
                                    Entregas
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success" href="{{ route('entregadores.entregas.index') }}">
                            Ir para Entregas
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Coletas
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Abrir Solicitação de Coleta
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-shopping-basket"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-warning" href="{{ route('entregadores.coletas.create') }}">
                            Ver Entregas
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
