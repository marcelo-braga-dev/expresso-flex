<x-layout>

    <div class="header bg-principal bg-height-top"></div>
    <div class="container-fluid mt--8">
        {{-- Usuarios --}}
        <div class="row">
            {{-- Clientes --}}
            <div class="col-md-4 mb-5">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Usuários
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Clientes
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{ route('admins.usuarios.clientes.index') }}">
                            Ver Clientes
                        </a>
                    </div>
                </div>
            </div>

            {{-- Entregadores --}}
            <div class="col-md-4 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Usuários
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Entregadores
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                    <i class="fas fa-motorcycle"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{ route('admins.usuarios.entregadores.index') }}">
                            Ver Entregadores
                        </a>
                    </div>
                </div>
            </div>

            {{-- Conferentes --}}
            <div class="col-md-4 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Usuários
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Conferentes
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="{{ route('admins.usuarios.conferentes.index') }}">
                            Ver Conferentes
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Integracao --}}
        <div class="row">
            {{-- Mercado Livre --}}
            <div class="col-md-4 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Integração
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Mercado Livre
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-yellow text-dark rounded-circle shadow">
                                    <i class="fas fa-link"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn bg-yellow text-dark"
                           href="{{ route('admin.mercadolivre.contas-sincronizadas') }}">
                            Ver Contas
                        </a>
                    </div>
                </div>
            </div>

        </div>

        {{-- Financeiro --}}
        <div class="row">
            {{-- Clientes --}}
            <div class="col-md-4 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Financeiro
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Clientes
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-warning text-white" href="{{ route('admins.financeiros.index') }}">
                            Ver Faturamentos
                        </a>
                    </div>
                </div>
            </div>

            {{-- Entregadores --}}
            <div class="col-md-4 mb-3">
                <div class="card card-stats shadow">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col">
                                <h5 class="card-title text-uppercase text-muted mb-0">
                                    Financeiro
                                </h5>
                                <span class="h2 font-weight-bold mb-0">
                                    Entregadores
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                    <i class="fas fa-dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-warning text-white" href="{{ route('admins.financeiros.entregadores.index') }}">
                            Ver Faturamentos
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
