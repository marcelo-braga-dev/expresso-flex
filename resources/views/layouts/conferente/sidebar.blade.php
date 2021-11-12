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

        @include('layouts.entregadores.navbar.navbar-mb')

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
                <!-- Cliente -->
                <li class="nav-item">
                    <!-- Checkin -->
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-status" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-status">
                        <i class="fas fa-sign-in-alt text-principal"></i>
                        <span class="nav-link-text text-principal">Check-in</span>
                    </a>
                    <div class="collapse show" id="navbar-status">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('conferente.checkin.pacotes') }}">
                                    Check-in de Pacotes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4" href="{{ route('conferente.checkin.pacotes-base') }}">
                                    Pacotes na Base
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="dropdown-divider"></div>
                    
                    <!-- Pacotes -->
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-pacotes" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-pacotes">
                        <i class="fas fa-box text-principal"></i>
                        <span class="nav-link-text text-principal">Pacotes</span>
                    </a>
                    <div class="collapse show" id="navbar-pacotes">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4"
                                    href="{{ route('conferente.pacotes.pacotes-sob-coleta') }}">
                                    Pacotes sendo Coletados
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4"
                                    href="{{ route('conferente.pacotes.pacotes-sob-entrega') }}">
                                    Pacotes sendo Entregue
                                </a>
                            </li>                          
                        </ul>
                    </div>   

                    <div class="dropdown-divider"></div>

                    <!-- Historico -->
                    <a class="nav-link p-0 ml-3 m-2" href="#navbar-historico" data-toggle="collapse" role="button"
                        aria-expanded="true" aria-controls="navbar-historico">
                        <i class="fas fa-history text-principal"></i>
                        <span class="nav-link-text text-principal">Historico</span>
                    </a>
                    <div class="collapse show" id="navbar-historico">
                        <ul class="nav nav-sm flex-column">                        
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4"
                                    href="{{ route('conferente.pacotes.historico') }}">
                                    Histórico de Pacotes
                                </a>
                            </li>                           
                        </ul>
                        <ul class="nav nav-sm flex-column">                        
                            <li class="nav-item">
                                <a class="nav-link ml-1 pl-4"
                                    href="{{ route('conferente.solicitacoes.historico') }}">
                                    Histórico de Solicitações
                                </a>
                            </li>                           
                        </ul>
                    </div>                    
                </li>
            </ul>
        </div>
    </div>
</nav>
