<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
            aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="/assets/img/brand/logo-x256.png" class="navbar-brand-img" alt="...">
        </a>

        @include('layouts.admin.navbar.navbar-mb')

        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

            <!-- Mobile -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('argon') }}/img/brand/blue.png">
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
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-examples" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-examples">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Usuários</span>
                    </a>
                    <div class="collapse" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.usuarios.clientes.tabela') }}">
                                    Clientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.usuarios.entregadores.tabela') }}">
                                    Entregadores
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.usuarios.conferentes.tabela') }}">
                                    Conferente
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.usuarios.admin.tabela') }}">
                                    Administrador
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- Conferente -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-conferente" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-status">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Mercado Livre</span>
                    </a>
                    <div class="collapse" id="navbar-conferente">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link"
                                    href="{{ route('admin.mercadolivre.contas-sincronizadas') }}">
                                    Contas Sincronizadas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.mercadolivre.conta-sincronizada') }}">
                                    Conta Principal
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- Fretes -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-conferente" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-status">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Fretes</span>
                    </a>
                    <div class="collapse" id="navbar-conferente">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.fretes.tabela-clientes') }}">
                                    Tabela de Preços
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- Configurações -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-conferente" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-status">
                        <i class="ni ni-fat-add text-principal"></i>
                        <span class="nav-link-text text-principal">Configurações</span>
                    </a>
                    <div class="collapse" id="navbar-conferente">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.config.config-geral') }}">
                                    Configurações Gerais
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
