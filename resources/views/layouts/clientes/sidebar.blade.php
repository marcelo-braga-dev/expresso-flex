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

        @include('layouts.entregadores.navbar.navbar-mb')

        <div class="collapse navbar-collapse" id="sidenav-collapse-main">

            <!-- Mobile -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="{{ route('home') }}">
                            <img src="/assets/img/brand/logo-x256.png">
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

                <!-- Cliente -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-coletas" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-coletas">
                        <i class="fas fa-shipping-fast text-principal"></i>
                        {{-- <i class="fas fa-box"></i> --}}
                        <span class="nav-link-text text-principal">Coletas</span>
                    </a>
                    <div class="collapse show" id="navbar-coletas">
                        <ul class="nav nav-sm flex-column">
                            {{-- <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1"
                                    href="{{ route('cliente.coleta.solicitar-coleta') }}">
                                    Solicitar Coleta
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1"
                                    href="{{ route('cliente.coleta.historico-coleta') }}">
                                    Histórico de Coletas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1"
                                    href="{{ route('cliente.coleta.pontos-de-coleta') }}">
                                    Seus Pontos de Coleta
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1" href="{{ route('cliente.perfil.qrcode-usuario') }}">
                                    QrCode Pontos de Coleta
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
                        <i class="fas fa-box text-principal"></i>
                        <span class="nav-link-text text-principal">Pacotes</span>
                    </a>
                    <div class="collapse show" id="navbar-pacotes">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1"
                                    href="{{ route('cliente.etiqueta.todas-etiquetas') }}">
                                    Etiquetas Expresso Flex
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1" href="{{ route('cliente.pacotes.pesquisar') }}">
                                    Pesquisar Pacote
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1" href="{{ route('cliente.pacotes.historico') }}">
                                    Histórico de Pacotes
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- Integrações -->
                <li class="nav-item">
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-integracoes" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-integracoes">
                        <i class="fas fa-link text-principal"></i>
                        <span class="nav-link-text text-principal">Integrações</span>
                    </a>
                    <div class="collapse show" id="navbar-integracoes">
                        <ul class="nav nav-sm flex-column">
                            {{-- <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1" href="{{ route('mercadolivre.nova-conta') }}">
                                    Vincular Mercado Livre
                                </a>
                            </li> --}}
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1" href="{{ route('mercadolivre.todas-contas') }}">
                                    Contas Mercado Livre
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <div class="dropdown-divider"></div>

                <!-- Financeiro -->
                <li class="nav-item">
                    <span class="nav-link p-0 ml-3 m-2" href="#navbar-entregas" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-entregas">
                        <i class="fas fa-dollar-sign text-principal"></i>
                        <span class="nav-link-text text-principal">Financeiro</span>
                    </span>
                    <div class="collapse show" id="navbar-entregas">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1"
                                    href="{{ route('cliente.financeiro.pagamentos') }}">
                                    Pagamentos
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                {{-- <div class="dropdown-divider"></div>

                <!-- Sua conta -->
                <li class="nav-item">
                    <span class="nav-link p-0 ml-3 m-2" href="#navbar-entregas" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-entregas">
                        <i class="fas fa-user text-principal"></i>
                        <span class="nav-link-text text-principal">Perfil</span>
                    </span>
                    <div class="collapse show" id="navbar-entregas">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4 p-1"
                                    href="{{ route('cliente.perfil.qrcode-usuario') }}">
                                    Seu ID QrCode
                                </a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>
