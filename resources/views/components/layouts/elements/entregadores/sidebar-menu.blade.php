<div class="collapse navbar-collapse" id="sidenav-collapse-main">

    <!-- Mobile -->
    <div class="navbar-collapse-header d-md-none">
        <div class="row">
            <div class="col-6 collapse-brand">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets') }}/img/brand/logo-x256.png" alt="logo">
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
        <!-- Coletas -->
        <li class="nav-item border-bottom py-2">
            <a class="nav-link p-0 ml-3 m-2" href="#navbar-coletas" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="navbar-coletas">
                <i class="fas fa-dolly text-principal"></i>
                <span class="nav-link-text text-principal">Coletas</span>
            </a>
            <div class="collapse  @if (MENU === 'coletas') show @endif" id="navbar-coletas">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'solicitacoes') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('entregadores.coletas.index') }}">
                            Solicitações de Coletas
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Entregas -->
        <li class="nav-item border-bottom py-2">
                    <span class="nav-link p-0 ml-3 m-2" href="#navbar-entregas" data-toggle="collapse" role="button"
                          aria-expanded="true" aria-controls="navbar-entregas">
                        <i class="fas fa-shipping-fast text-principal"></i>
                        <span class="nav-link-text text-principal">Entregas</span>
                    </span>
            <div class="collapse  @if (MENU === 'entregas') show @endif" id="navbar-entregas">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'realizar') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('entregadores.entregas.index') }}">
                            Entregas para Realizar
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Historicos -->
        <li class="nav-item border-bottom py-2">
            <span class="nav-link p-0 ml-3 m-2" href="#navbar-historico" data-toggle="collapse" role="button"
                  aria-expanded="true" aria-controls="navbar-historico">
                <i class="fas fa-clock text-principal"></i>
                <span class="nav-link-text text-principal">Historicos</span>
            </span>
            <div class="collapse  @if (MENU === 'historico') show @endif" id="navbar-historico">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'historico-pacotes') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('entregadores.pacotes.historico') }}">
                            Histórico de Pacotes
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'historico-coletas') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('entregadores.coletas.historico-coleta') }}">
                            Histórico de Coletas
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Financeiro -->
        <li class="nav-item border-bottom py-2">
            <span class="nav-link p-0 ml-3 m-2" href="#navbar-financeiro" data-toggle="collapse" role="button"
                  aria-expanded="true" aria-controls="navbar-financeiro">
                <i class="fas fa-dollar-sign text-principal"></i>
                <span class="nav-link-text text-principal">Financeiro</span>
            </span>
            <div class="collapse  @if (MENU === 'financeiro') show @endif" id="navbar-financeiro">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'financeiro-pagamentos') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('entregadores.financeiro.receber') }}">
                            Pagamentos
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item border-bottom py-2">
            <span class="nav-link p-0 ml-3 m-2" href="#navbar-perfil" data-toggle="collapse" role="button"
                  aria-expanded="true" aria-controls="navbar-perfil">
                <i class="fas fa-user text-principal"></i>
                <span class="nav-link-text text-principal">Perfil</span>
            </span>
            <div class="collapse  @if (MENU === 'perfil') show @endif" id="navbar-perfil">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'perfil-pagamentos') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('entregadores.perfil.edit', id_usuario_atual()) }}">
                            Sua conta
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
