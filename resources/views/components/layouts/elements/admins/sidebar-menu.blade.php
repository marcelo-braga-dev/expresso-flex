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
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.usuarios.clientes.index') }}">
                            Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.usuarios.entregadores.index') }}">
                            Entregadores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.usuarios.conferentes.index') }}">
                            Conferente
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.usuarios.admins.index') }}">
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
                           href="{{ route('admins.integracoes.clientes.mercadolivre.index') }}">
                            Contas Mercado Livre
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.integracoes.admins.mercadolivre.index') }}">
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
            <div class="collapse pacotes" id="navbar-pacotes">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.pacotes.sob_coleta') }}">
                            Sendo Coletados
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.pacotes.base') }}">
                            Na Base
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.pacotes.sob_entrega') }}">
                            Sendo Entregue
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.pacotes.historico.clientes.index') }}">
                            Por Cliente
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.pacotes.historico.index') }}">
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
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.coletas.historico') }}">
                            Histórico de Coletas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.coletas.config.index') }}">
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
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.financeiros.index') }}">
                            Clientes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.financeiros.entregadores.index') }}">
                            Entregadores
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link ml-1 pl-4" href="{{ route('admins.integracoes.admins.mercadopago.index') }}">
                            Conta Mercado Pago
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
