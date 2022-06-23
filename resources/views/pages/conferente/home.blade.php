<x-layout>

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--8 mb-6">
        <div class="row">
            {{-- Coletas --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Check-in</h5>
                                <span class="h2 font-weight-bold mb-0 d-block">
                                    Check-in de Pacotes
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-orange text-white rounded-circle shadow">
                                    <i class="fas fa-sign-in-alt"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-warning" href="{{ route('conferentes.checkin.index') }}">
                            Realizar Check-in
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            {{-- Sendo Coletados --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">Pacotes</h5>
                                <span class="h2 font-weight-bold mb-0 d-block">
                                    Pacotes sendo Coletados
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                    <i class="fas fa-dolly"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{ route('conferentes.pacotes.pacotes-sob-coleta') }}">
                            Ver Pacotes
                        </a>
                    </div>
                </div>
            </div>

            {{-- Sendo Entregues --}}
            <div class="col-md-6 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Pacotes
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Pacotes sendo Entregues
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-shipping-fast"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-success" href="{{ route('conferentes.pacotes.pacotes-sob-entrega') }}">
                            Ver Pacotes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-layout>
