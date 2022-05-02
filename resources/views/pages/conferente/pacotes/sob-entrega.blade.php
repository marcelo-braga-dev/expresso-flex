<x-layout menu="pacotes" submenu="sendo-entregue">

    <div class="header bg-principal bg-height-top"></div>

    <!-- Page content -->
    <div class="container-fluid mt--9">
        <div class="card bg-secondary">
            <div class="card-header bg-white mb-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h4 class="card-title text-uppercase mb-0">Pacotes sendo Entregues</h4>
                    </div>
                    <div class="col-auto">
                        <div class="icon icon-shape bg-primary text-white rounded-circle shadow">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body p-1">
                @if (count($entregadores))
                    <div class="row">
                        <div class="col-md-4">
                            <div class="nav-wrapper">
                                <h5>Entregadores</h5>
                                <ul class="nav nav-pills nav-fill flex-column flex-md-row" role="tablist">
                                    <?php $aba = true; ?>
                                    @foreach ($entregadores as $entregador)
                                        <li class="nav-item mb-2">
                                            <a class="nav-link mb-sm-3 mb-md-0 @if ($aba) active @endif"
                                               id="tabs-entregador-{{ $entregador['id_entregador'] }}-tab"
                                               data-toggle="tab"
                                               href="#tabs-entregador-{{ $entregador['id_entregador'] }}" role="tab"
                                               aria-controls="tabs-entregador-{{ $entregador['id_entregador'] }}"
                                               aria-selected="true">
                                                {{ get_dados_usuario($entregador['id_entregador'])->name }}
                                            </a>
                                        </li>
                                        <?php $aba = false; ?>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h5 class="pt-3">Pacotes</h5>
                            <div class="card shadow">
                                <div class="card-body p-1">
                                    <div class="tab-content" id="myTabContent">
                                        <?php $aba = true; ?>
                                        @foreach ($entregadores as $entregador)
                                            <div class="tab-pane fade @if ($aba) show active @endif"
                                                 id="tabs-entregador-{{ $entregador['id_entregador'] }}" role="tabpanel"
                                                 aria-labelledby="tabs-entregador--tab">
                                                <ul class="list-group list-group-flush">
                                                    @foreach ($entregador['pacotes'] as $pacote)

                                                        @include('layouts.componentes.list-pacotes', [
                                                        'link' => 'conferentes.pacote.show',
                                                        'data' => true ]
                                                        )

                                                    @endforeach
                                                </ul>
                                            </div>
                                            <?php $aba = false; ?>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-auto mx-auto p-2 text-sm">Não há pacotes sendo entregues.</div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-layout>
