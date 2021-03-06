<style>
    .text-principal {
        color: #4b4b4b !important;
    }
</style>
<div class="collapse navbar-collapse" id="sidenav-collapse-main">
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
        <!-- Cliente -->
        <li class="nav-item border-bottom py-2">
            <a class="nav-link p-0 ml-3 m-2" href="#navbar-coletas" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="navbar-coletas">
                <i class="fas fa-shipping-fast text-principal"></i>
                <span class="nav-link-text text-principal">Coletas</span>
            </a>
            <div class="collapse @if (MENU === 'coletas') show @endif" id="navbar-coletas">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'pacotes-sob-entrega') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.coletas.sob-entrega.index') }}">
                            Pacotes sendo Entregue
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'historico') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.coletas.historicos.index') }}">
                            Hist??rico de Coletas
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Lojas -->
        <li class="nav-item border-bottom py-2">
            <a class="nav-link p-0 ml-3 m-2" href="#navbar-lojas" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="navbar-lojas">
                <i class="fas fa-store text-principal"></i>
                <span class="nav-link-text text-principal">Pontos de Coleta</span>
            </a>
            <div class="collapse @if (MENU === 'lojas') show @endif" id="navbar-lojas">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'pontos') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.lojas.index') }}">
                            Seus Pontos de Coleta
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'qr-code') active @endif">
                        <a class="nav-link pl-5" href="{{ route('clientes.lojas.qrcode') }}">
                            QrCode Pontos de Coleta
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Etiquetas -->
        <li class="nav-item border-bottom py-2">
            <a class="nav-link p-0 ml-3 m-2" href="#navbar-etiquetas" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="navbar-etiquetas">
                <i class="fas fa-file-pdf text-principal"></i>
                <span class="nav-link-text text-principal">Etiquetas ExpressoFlex</span>
            </a>
            <div class="collapse @if (MENU === 'etiquetas') show @endif" id="navbar-etiquetas">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'para-imprimir') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.etiquetas.expressoflex.index') }}">
                            Etiquetas para Imprimir
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'gerar') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.etiquetas.expressoflex.create') }}">
                            Gerar Etiqueta
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'historico') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.etiquetas.historico.index') }}">
                            Hist??rico
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Importacao -->
        <li class="nav-item border-bottom py-2">
            <a class="nav-link p-0 ml-3 m-2" href="#navbar-importacao" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="navbar-importacao">
                <i class="fas fa-file-upload text-principal"></i>
                <span class="nav-link-text text-principal">Importa????o de Pacotes</span>
            </a>
            <div class="collapse @if (MENU === 'importacao') show @endif" id="navbar-importacao">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'importados') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.importacoes.pacotes.index') }}">
                            Pacotes Importados
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'mercado-livre') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.importacoes.mercadolivre.index') }}">
                            Importac??o Mercado Livre
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Pacotes -->
        <li class="nav-item border-bottom py-2">
            <a class="nav-link p-0 ml-3 m-2" href="#navbar-pacotes" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="navbar-pacotes">
                <i class="fas fa-box text-principal"></i>
                <span class="nav-link-text text-principal">Pacotes</span>
            </a>
            <div class="collapse @if (MENU === 'pacotes') show @endif" id="navbar-pacotes">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'pesquisar') active @endif">
                        <a class="nav-link pl-5" href="{{ route('clientes.pacotes.pesquisar.index') }}">
                            Pesquisar Pacote
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'historico') active @endif">
                        <a class="nav-link pl-5" href="{{ route('clientes.pacotes.historico.index') }}">
                            Hist??rico de Pacotes
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Integra????es -->
        <li class="nav-item border-bottom py-2">
            <a class="nav-link p-0 ml-3 m-2" href="#navbar-integracoes" data-toggle="collapse" role="button"
               aria-expanded="true" aria-controls="navbar-integracoes">
                <i class="fas fa-link text-principal"></i>
                <span class="nav-link-text text-principal">Integra????es</span>
            </a>
            <div class="collapse @if (MENU === 'integracoes') show @endif" id="navbar-integracoes">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'mercado-livre') active @endif">
                        <a class="nav-link pl-5" href="{{ route('clientes.integracoes.mercadolivre.index') }}">
                            Contas Mercado Livre
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Financeiro -->
        <li class="nav-item border-bottom py-2">
            <span class="nav-link p-0 ml-3 m-2" href="#navbar-entregas" data-toggle="collapse" role="button"
                  aria-expanded="true" aria-controls="navbar-entregas">
                <i class="fas fa-dollar-sign text-principal"></i>
                <span class="nav-link-text text-principal">Financeiro</span>
            </span>
            <div class="collapse @if (MENU === 'financeiro') show @endif" id="navbar-entregas">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'financeiro-pagamentos') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.financeiro.index') }}">
                            Pagamentos
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <!-- Sua conta -->
        <li class="nav-item border-bottom py-2">
            <span class="nav-link p-0 ml-3 m-2" href="#navbar-perfil" data-toggle="collapse" role="button"
                  aria-expanded="true" aria-controls="navbar-perfil">
                <i class="fas fa-user text-principal"></i>
                <span class="nav-link-text text-principal">Perfil</span>
            </span>
            <div class="collapse @if (MENU === 'perfil') show @endif" id="navbar-perfil">
                <ul class="nav nav-sm flex-column">
                    <li class="nav-item @if (SUBMENU === 'perfil-editar') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.perfil.index') }}">
                            Editar Perfil
                        </a>
                    </li>
                    <li class="nav-item @if (SUBMENU === 'alterar-senha') active @endif">
                        <a class="nav-link pl-5"
                           href="{{ route('clientes.senha.index') }}">
                            Alterar Senha
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</div>
