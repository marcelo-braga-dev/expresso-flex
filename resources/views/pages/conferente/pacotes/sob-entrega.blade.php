@extends('layouts.admin', ['title' => 'Pacotes sendo Entregues'])

@section('content')

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

                    <!-- Cria os Botoes com nome dos entregadores -->
                    <div class="nav-wrapper">
                        <ul class="nav nav-pills nav-fill flex-column flex-md-row" role="tablist">
                            <?php $aba = true; ?>
                            @foreach ($entregadores as $entregador)
                                <li class="nav-item mb-2">
                                    <a class="nav-link mb-sm-3 mb-md-0 @if ($aba) active @endif"
                                        id="tabs-entregador-{{ $entregador['id_entregador'] }}-tab" data-toggle="tab"
                                        href="#tabs-entregador-{{ $entregador['id_entregador'] }}" role="tab"
                                        aria-controls="tabs-entregador-{{ $entregador['id_entregador'] }}"
                                        aria-selected="true">
                                        {{ get_dados_usuario($entregador['id_entregador'])->nome }}
                                    </a>
                                </li>
                                <?php $aba = false; ?>
                            @endforeach
                        </ul>
                    </div>

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
                                                'link' => 'conferente.pacotes.info',
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

                @else
                    Não há pacotes sendo entregues.
                @endif

            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection
