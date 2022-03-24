<div class="collapse navbar-collapse" id="sidenav-collapse-main">
    <!-- Mobile -->
    <div class="navbar-collapse-header d-md-none">
        <div class="row">
            <div class="col-6 collapse-brand">
                <a href="{{ route('home') }}">
                    <img src="{{ asset('assets') }}/img/brand/logo-x256.png">
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
            <div class="collapse @if (MENU === 'usuarios') show @endif" id="navbar-usuarios">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'usuarios-clientes') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.usuarios.clientes.index') }}">
                            Clientes
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'usuarios-entregadores') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.usuarios.entregadores.index') }}">
                            Entregadores
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'usuarios-conferentes') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.usuarios.conferentes.index') }}">
                            Conferentes
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'usuarios-admins') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.usuarios.admins.index') }}">
                            Administradores
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
            <div class="collapse @if (MENU === 'integracoes') show @endif" id="navbar-mercado-livre">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'integracoes-mercadolivre') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('admins.integracoes.clientes.mercadolivre.index') }}">
                            Contas Mercado Livre
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'integracoes-mercadolivre-expressoflex') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.integracoes.admins.mercadolivre.index') }}">
                            Conta Expresso Flex
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
            <div class="collapse @if (MENU === 'pacotes') show @endif" id="navbar-pacotes">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'pacotes-coleta') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.pacotes.sob_coleta') }}">
                            Sendo Coletados
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'pacotes-base') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.pacotes.base') }}">
                            Na Base
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'pacotes-entregue') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.pacotes.sob_entrega') }}">
                            Sendo Entregue
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'pacotes-clientes') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.pacotes.historico.clientes.index') }}">
                            Por Cliente
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'pacotes-historico') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.pacotes.historico.index') }}">
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
            <div class="collapse @if (MENU === 'coletas') show @endif" id="navbar-coletas">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'coletas-historicos') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.coletas.historico') }}">
                            Histórico de Coletas
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'coletas-configs') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.coletas.config.index') }}">
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
            <div class="collapse @if (MENU === 'financeiro') show @endif" id="navbar-financeiro">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'financeiro-clientes') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.financeiros.index') }}">
                            Clientes
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'financeiro-entregadores') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.financeiros.entregadores.index') }}">
                            Entregadores
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'financeiro-mercadopago') active @endif">
                        <a class="nav-link pl-5" href="{{ route('admins.integracoes.admins.mercadopago.index') }}">
                            Conta Mercado Pago
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
