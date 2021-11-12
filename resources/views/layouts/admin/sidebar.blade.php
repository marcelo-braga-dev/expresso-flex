<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="/assets/img/brand/logo-x256.jpg" class="navbar-brand-img" alt="...">
        </a>

        @include('layouts.admin.navbar.navbar-mb')

        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

            <!-- Mobile -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="/assets/img/brand/logo-x256.jpg">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                            data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                            aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Menu Principal -->
            <ul class="navbar-nav">

                <!-- Usuarios -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-usuarios" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-usuarios">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Usuários</span>
                    </a>
                    <div class="collapse usuarios" id="navbar-usuarios">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.usuarios.clientes.tabela') }}">
                                    Clientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.usuarios.entregadores.tabela') }}">
                                    Entregadores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.usuarios.conferentes.tabela') }}">
                                    Conferente
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.usuarios.admin.tabela') }}">
                                    Administrador
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- mercado-livre -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-mercado-livre" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-mercado-livre">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Integração</span>
                    </a>
                    <div class="collapse mercado_livre" id="navbar-mercado-livre">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4"
                                    href="{{ route('admin.mercadolivre.contas-sincronizadas') }}">
                                    Contas Sincronizadas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.mercadolivre.conta-sincronizada') }}">
                                    Conta Principal
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- Fretes -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-fretes" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-fretes">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Fretes</span>
                    </a>
                    <div class="collapse fretes" id="navbar-fretes">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.fretes.tabela', ['cliente']) }}">
                                    Preços para Clientes
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.fretes.tabela', ['entregador']) }}">
                                    Comissão dos Entregadores
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- Pacotes -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-pacotes" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-pacotes">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Pacotes</span>
                    </a>
                    <div class="collapse pacotes" id="navbar-pacotes">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.pacotes.historico') }}">
                                    Histórico de Pacotes
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- Coletas -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-coletas" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-status">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Coletas</span>
                    </a>
                    <div class="collapse coletas" id="navbar-coletas">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.coletas.historico') }}">
                                    Histórico de Coletas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.coletas.config') }}">
                                    Configurações
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- Financeiro -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-financeiro" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-financeiro">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Financeiro</span>
                    </a>
                    <div class="collapse financeiro" aba="financeiro" id="navbar-financeiro">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.financeiro.cliente') }}">
                                    Clientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.financeiro.entregadores') }}">
                                    Entregadores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('admin.financeiro.conta-mercadopago') }}">
                                    Conta Mercado Pago
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
